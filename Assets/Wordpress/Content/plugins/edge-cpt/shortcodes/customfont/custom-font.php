<?php
namespace RatioEdge\Modules\Shortcodes\CustomFont;

use RatioEdge\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class CustomFont
 */
class CustomFont implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'edgtf_custom_font';

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
				'name' => esc_html__('Edge Custom Font', 'edge-cpt'),
				'base' => $this->getBase(),
				'category' => 'by EDGE',
				'icon' => 'icon-wpb-custom-font extended-custom-icon',
				'allowed_container_element' => 'vc_row',
				'params' => array(
					array(
						"type" => "dropdown",
						"heading" => "Custom Font Tag",
						"param_name" => "custom_font_tag",
						"value" => array(
							"" => "",
							"h2" => "h2",
							"h3" => "h3",
							"h4" => "h4",
							"h5" => "h5",
							"h6" => "h6",
							"p" => "p",
							"div" => "div",
						)
					),
					array(
						"type" => "textfield",
						"heading" => "Font family",
						"param_name" => "font_family",
						"value" => ""
					),
					array(
						"type" => "textfield",
						"heading" => "Font size (px)",
						"param_name" => "font_size",
						"value" => ""
					),
					array(
						"type" => "textfield",
						"heading" => "Line height (px)",
						"param_name" => "line_height",
						"value" => ""
					),
					array(
						"type" => "dropdown",
						"heading" => "Font Style",
						"param_name" => "font_style",
						"value" => ratio_edge_get_font_style_array(),
						"description" => ""
					),
					array(
						"type" => "dropdown",
						"heading" => "Font weight",
						"param_name" => "font_weight",
						"value" => ratio_edge_get_font_weight_array(),
						"save_always" => true
					),
					array(
						"type" => "textfield",
						"heading" => "Letter Spacing (px)",
						"param_name" => "letter_spacing",
						"value" => ""
					),
					array(
						"type" => "dropdown",
						"heading" => "Text transform",
						"param_name" => "text_transform",
						"value" => ratio_edge_get_text_transform_array(),
						"description" => ""
					),
					array(
						"type" => "dropdown",
						"heading" => "Text decoration",
						"param_name" => "text_decoration",
						"value" => array(
							"None" => "",
							"Underline" => "underline",
							"Overline" => "overline",
							"Line Through" => "line-through"
						),
						"description" => ""
					),
					array(
						"type" => "colorpicker",
						"heading" => "Color",
						"param_name" => "color",
						"description" => ""
					),
					array(
						"type" => "dropdown",
						"heading" => "Text Align",
						"param_name" => "text_align",
						"value" => array(
							"" => "",
							"Left" => "left",
							"Center" => "center",
							"Right" => "right",
							"Justify" => "justify"
						),
						"description" => ""
					),
					array(
						"type" => "textarea",
						"heading" => "Content",
						"param_name" => "content_custom_font",
						"value" => "Custom Font Content",
						"description" => "",
						"save_always" => true
					),
					array(
						'type'        => 'textfield',
						'heading'     => 'Link',
						'param_name'  => 'link',
						'admin_label' => true
					),
					array(
						'type'        => 'dropdown',
						'heading'     => 'Link Target',
						'param_name'  => 'target',
						'value'       => array(
							'Self'  => '_self',
							'Blank' => '_blank'
						),
						'admin_label' => true
					),
					array(
						"type" => "dropdown",
						"heading" => "Enable Type Out Effect",
						"param_name" => "type_out_effect",
						"value" => array(
							"No" => "no",
							"Yes" => "yes",
						),
						"description" => "Adds a type out effect at the end of the custom font content."
					),
					array(
						"type" => "textfield",
						"heading" => "Typed Phrase 1",
						"param_name" => "typed_ending_1",
						"value" => "",
						"description" => "",
						'dependency' => Array('element' => 'type_out_effect', 'value' => array('yes'))
					),
					array(
						"type" => "textfield",
						"heading" => "Typed Phrase 2",
						"param_name" => "typed_ending_2",
						"value" => "",
						"description" => "",
						'dependency' => array('element' => 'typed_ending_1', 'not_empty' => true)
					),
					array(
						"type" => "textfield",
						"heading" => "Typed Phrase 3",
						"param_name" => "typed_ending_3",
						"value" => "",
						"description" => "",
						'dependency' => array('element' => 'typed_ending_2', 'not_empty' => true)
					),
					array(
						"type" => "colorpicker",
						"heading" => "Typed Phrase Color",
						"param_name" => "typed_ending_color",
						"description" => "",
						'dependency' => Array('element' => 'typed_ending_1', 'not_empty' => true)
					)
				)
		) );
	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @return string
	 */
	public function render($atts, $content = null) {

		$args = array(
			'custom_font_tag'		=> 'div',
			'font_family'			=> '',
			'font_size'				=> '',
			'line_height'			=> '',
			'font_style'			=> '',
			'font_weight'			=> '',
			'letter_spacing'		=> '',
			'text_transform'		=> '',
			'text_decoration'		=> '',
			'text_align'			=> '',
			'color'					=> '',
			'content_custom_font'	=> '',
			'link'					=> '',
			'target'				=> '_self',
			'type_out_effect'		=> '',
			'typed_ending_1'		=> '',
			'typed_ending_color'	=> '',
			'typed_ending_2'		=> '',
			'typed_ending_3'		=> ''
		);

		$params = shortcode_atts($args, $atts);

		$params['custom_font_style'] = $this->getCustomFontStyle($params);
		$params['custom_font_tag'] = $this->getCustomFontTag($params,$args);
		$params['custom_font_data'] = $this->getCustomFontData($params,$args);
		$params['typed_ending_style'] = $this->getTypedEndingStyle($params);

		//Get HTML from template
		$html = ratio_edge_get_shortcode_module_template_part('templates/custom-font-template', 'customfont', '', $params);

		return $html;

	}

	/**
	 * Return Style for Custom Font
	 *
	 * @param $params
	 * @return string
	 */
	private function getCustomFontStyle($params) {
		$custom_font_style = array();

		if ($params['font_family'] !== '') {
			$custom_font_style[] = 'font-family: '.$params['font_family'];
		}

		if ($params['font_size'] !== '') {
			$font_size = strstr($params['font_size'], 'px') ? $params['font_size'] : $params['font_size'].'px';
			$custom_font_style[] = 'font-size: '.$font_size;
		}

		if ($params['line_height'] !== '') {
			$line_height = strstr($params['line_height'], 'px') ? $params['line_height'] : $params['line_height'].'px';
			$custom_font_style[] = 'line-height: '.$line_height;
		}

		if ($params['font_style'] !== '') {
			$custom_font_style[] = 'font-style: '.$params['font_style'];
		}

		if ($params['font_weight'] !== '') {
			$custom_font_style[] = 'font-weight: '.$params['font_weight'];
		}

		if ($params['letter_spacing'] !== '') {
			$letter_spacing = strstr($params['letter_spacing'], 'px') ? $params['letter_spacing'] : $params['letter_spacing'].'px';
			$custom_font_style[] = 'letter-spacing: '.$letter_spacing;
		}

		if ($params['text_transform'] !== '') {
			$custom_font_style[] = 'text-transform: '.$params['text_transform'];
		}

		if ($params['text_decoration'] !== '') {
			$custom_font_style[] = 'text-decoration: '.$params['text_decoration'];
		}

		if ($params['text_align'] !== '') {
			$custom_font_style[] = 'text-align: '.$params['text_align'];
		}

		if ($params['color'] !== '') {
			$custom_font_style[] = 'color: '.$params['color'];
		}

		return implode(';', $custom_font_style);
	}

	/**
	 * Return Style for Typed Ending
	 *
	 * @param $params
	 * @return string
	 */
	private function getTypedEndingStyle($params) {
		$typed_ending_style = array();

		if ($params['typed_ending_color'] !== '') {
			$typed_ending_style[] = 'color: '.$params['typed_ending_color'];
		}

		return implode(';', $typed_ending_style);
	}

	/**
	 * Return Custom Font Tag. If provided heading isn't valid get the default one
	 *
	 * @param $params
	 * @return string
	 */
	private function getCustomFontTag($params,$args) {
		$tag_array = array('h2', 'h3', 'h4', 'h5', 'h6','p','div');
		return (in_array($params['custom_font_tag'], $tag_array)) ? $params['custom_font_tag'] : $args['custom_font_tag'];
	}

	/**
	 * Return Custom Font Data Attr
	 *
	 * @param $params
	 * @return string
	 */
	private function getCustomFontData($params) {
		$data_array = array();

		if ($params['font_size'] !== '') {
			$data_array[] = 'data-font-size= '.$params['font_size'];
		}

		if ($params['line_height'] !== '') {
			$data_array[] = 'data-line-height= '.$params['line_height'];
		}
		return implode(' ', $data_array);
	}
}