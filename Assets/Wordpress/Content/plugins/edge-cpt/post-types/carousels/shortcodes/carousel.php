<?php
namespace EdgeCore\PostTypes\Carousels\Shortcodes;

use EdgeCore\Lib;

/**
 * Class Carousel
 * @package EdgeCore\PostTypes\Carousels\Shortcodes
 */
class Carousel implements Lib\ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base = 'edgtf_carousel';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * Returns base for shortcode
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Maps shortcode to Visual Composer. Hooked on vc_before_init
     *
     * @see edgt_core_get_carousel_slider_array_vc()
     */
    public function vcMap() {

        vc_map( array(
            'name' => 'Carousel',
            'base' => $this->base,
            'category' => 'by EDGE',
            'icon' => 'icon-wpb-carousel-slider extended-custom-icon',
            'allowed_container_element' => 'vc_row',
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'heading' => 'Carousel Slider',
                    'param_name' => 'carousel',
                    'value' => edgt_core_get_carousel_slider_array_vc(),
                    'description' => '',
                    'admin_label' => true
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => 'Order By',
                    'param_name' => 'orderby',
                    'value' => array(
                        '' => '',
                        'Title' => 'title',
                        'Date' => 'date'
                    ),
                    'description' => ''
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => 'Order',
                    'param_name' => 'order',
                    'value' => array(
                        '' => '',
                        'ASC' => 'ASC',
                        'DESC' => 'DESC',
                    ),
                    'description' => ''
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => 'Number of items showing',
                    'param_name' => 'number_of_items',
                    'value' => array(
                        '3' => '3',
                        '4' => '4',
                        '5' => '5',
                        '6' => '6'
                    ),
                    'admin_label' => true,
                    'description' => ''
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => 'Image Animation',
                    'param_name' => 'image_animation',
                    'value' => array(
                        'Image Change' => 'image-change',
                        'Underline' => 'underline'
                    ),
                    'admin_label' => true,
                    'description' => 'Note: Only on "Image Change" zoom image will be used'
                ),
                array(
                	'type' => 'colorpicker',
                	'heading' => 'Underline Color',
                	'param_name' => 'underline_color',
                	'dependency' => array('element' => 'image_animation', 'value' => array('underline')) 
            	),
                array(
                    'type' => 'dropdown',
                    'heading' => 'Show Arrows navigation?',
                    'param_name' => 'show_arrows_navigation',
                    'value' => array(
                        'Yes' => 'yes',
                        'No' => 'no',
                    ),
                    'admin_label' => true,
                    'description' => ''
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => 'Show Dots navigation?',
                    'param_name' => 'show_dots_navigation',
                    'value' => array(
                        'Yes' => 'yes',
                        'No' => 'no',
                    ),
                    'admin_label' => true,
                    'description' => ''
                )
            )
        ) );

    }

    /**
     * Renders shortcodes HTML
     *
     * @param $atts array of shortcode params
     * @param $content string shortcode content
     * @return string
     */
    public function render($atts, $content = null) {

        $args = array(
            'carousel' => '',
            'orderby' => 'date',
            'order' => 'ASC',
            'number_of_items' => '5',
            'image_animation' => 'image-change',
            'underline_color' => '',
            'show_arrows_navigation' => 'yes',
            'show_dots_navigation' => 'yes'
        );

        $params = shortcode_atts($args, $atts);
		$params['carousel_data_attributes'] = $this->getCarouselDataAttributes($params);

		extract($params);

        $html = '';

        if ($carousel !== '') {

            $html .= '<div class="edgtf-carousel-holder clearfix">';
            $html .= '<div class="edgtf-carousel edgtf-slick-slider-navigation-style" ' .  ratio_edge_get_inline_attrs($carousel_data_attributes) . '>';

            $args = array(
                'post_type' => 'carousels',
                'carousels_category' => $params['carousel'],
                'orderby' => $params['orderby'],
                'order' => $params['order'],
                'posts_per_page' => '-1'
            );

            $query = new \WP_Query($args);

            if ($query->have_posts()) {
                while($query->have_posts()) {
                    $query->the_post();
                    $carousel_item = $this->getCarouselItemData(get_the_ID(), $params);
					$carousel_item['underline'] = $this->getUnderlineHtml($params);
                    $html .= edgt_core_get_shortcode_module_template_part('carousels', 'carousel-template', '', $carousel_item);
                }
            }

            wp_reset_postdata();


            $html .= '</div>';
            $html .= '</div>';

        }

        return $html;
    }

    /**
     * Return all data that carousel needs, images, titles, links, etc
     *
     * @param $params
     * @return array
     */
    private function getCarouselItemData($item_id, $params) {

        $carousel_item = array();

        if (($meta_temp = get_post_meta($item_id, 'edgtf_carousel_image', true)) !== '') {
            $carousel_item['image'] = $meta_temp;
        } else {
            $carousel_item['image'] = '';
        }

        if ($params['image_animation'] == 'image-change' && ($meta_temp = get_post_meta($item_id, 'edgtf_carousel_hover_image', true)) !== '') {
            $carousel_item['hover_image'] = $meta_temp;
            $carousel_item['hover_class'] = 'edgtf-has-hover-image';
        } else {
            $carousel_item['hover_image'] = '';
            $carousel_item['hover_class'] = '';
        }

        if (($meta_temp = get_post_meta($item_id, 'edgtf_carousel_item_link', true)) != '') {
            $carousel_item['link'] = $meta_temp;
        } else {
            $carousel_item['link'] = '';
        }

        if (($meta_temp = get_post_meta($item_id, 'edgtf_carousel_item_target', true)) != '') {
            $carousel_item['target'] = $meta_temp;
        } else {
            $carousel_item['target'] = '_self';
        }

        $carousel_item['title'] = get_the_title();

        $carousel_item['carousel_image_classes'] = $this->getCarouselImageClasses($params);

        return $carousel_item;

    }

	/**
	 * Return CSS classes for carousel image
	 *
	 * @param $params
	 * @return array
	 */
	private function getCarouselImageClasses($params) {

		$carousel_image_classes = array();
		if($params['image_animation'] !== '') {
			$carousel_image_classes[] = 'edgtf-' . $params['image_animation'];
		}

		return implode(' ', $carousel_image_classes);

	}

	/**
	 * Return data attributes for carousel
	 *
	 * @param $params
	 * @return array
	 */
	private function getCarouselDataAttributes($params) {

		$carousel_data = array();

		if ($params['number_of_items'] !== '') {
			$carousel_data['data-items'] = $params['number_of_items'];
		}
		if ($params['show_arrows_navigation'] !== '') {
			$carousel_data['data-arrows-navigation'] = $params['show_arrows_navigation'];
		}
		if ($params['show_dots_navigation'] !== '') {
			$carousel_data['data-dots-navigation'] = $params['show_dots_navigation'];
		}

		return $carousel_data;

	}

	/**
	 * Return underline html for carousel image
	 *
	 * @param $params
	 * @return array
	 */
	private function getUnderlineHtml($params) {
		$underline = '';

		if ($params['image_animation'] == 'underline'){
			$style = '';
			if ($params['underline_color'] !== ''){
				$style = 'background-color:'.$params['underline_color'];
			}

			$underline .= '<span class="edgtf-carousel-underline" '.ratio_edge_get_inline_style($style).'></span>';
		}

		return $underline;

	}
}