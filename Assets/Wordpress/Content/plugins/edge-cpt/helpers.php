<?php

if(!function_exists('edgt_core_version_class')) {
    /**
     * Adds plugins version class to body
     * @param $classes
     * @return array
     */
    function edgt_core_version_class($classes) {
        $classes[] = 'edgt-core-'.EDGE_CORE_VERSION;

        return $classes;
    }

    add_filter('body_class', 'edgt_core_version_class');
}

if(!function_exists('edgt_core_theme_installed')) {
    /**
     * Checks whether theme is installed or not
     * @return bool
     */
    function edgt_core_theme_installed() {
        return defined('EDGE_ROOT');
    }
}

if (!function_exists('edgt_core_get_carousel_slider_array')){
    /**
     * Function that returns associative array of carousels,
     * where key is term slug and value is term name
     * @return array
     */
    function edgt_core_get_carousel_slider_array() {
        $carousels_array = array();
        $terms = get_terms('carousels_category');

        if (is_array($terms) && count($terms)) {
            $carousels_array[''] = '';
            foreach ($terms as $term) {
                $carousels_array[$term->slug] = $term->name;
            }
        }

        return $carousels_array;
    }
}

if ( ! function_exists( 'ratio_core_get_module_template_part' ) ) {
    /**
     * Loads module template part.
     *
     * @param string $module name of the module to load
     * @param string $template name of the template file
     * @param string $slug
     * @param array $params array of parameters to pass to template
     *
     * @return html
     */
    function ratio_core_get_module_template_part( $module, $template, $slug = '', $params = array() ) {

        //HTML Content from template
        $html          = '';
        $template_path = EDGE_CORE_ABS_PATH . '/' . $module . '/templates';

        $temp = $template_path . '/' . $template;

        if ( is_array( $params ) && count( $params ) ) {
            extract( $params );
        }

        $template = '';

        if ( ! empty( $temp ) ) {
            if ( ! empty( $slug ) ) {
                $template = "{$temp}-{$slug}.php";

                if ( ! file_exists( $template ) ) {
                    $template = $temp . '.php';
                }
            } else {
                $template = $temp . '.php';
            }
        }

        if ( $template ) {
            ob_start();
            include( $template );
            $html = ob_get_clean();
        }

        return $html;
    }
}

if ( ! function_exists( 'ratio_core_ajax_status' ) ) {
    /**
     * Function that return status from ajax functions
     */
    function ratio_core_ajax_status( $status, $message, $data = null ) {
        $response = array(
            'status'  => $status,
            'message' => $message,
            'data'    => $data
        );

        $output = json_encode( $response );

        exit( $output );
    }
}

if ( ! function_exists( 'ratio_core_is_revolution_slider_installed' ) ) {
    function ratio_core_is_revolution_slider_installed() {
        return class_exists( 'RevSliderFront' );
    }
}

if ( ! function_exists( 'ratio_core_is_woocommerce_installed' ) ) {
    /**
     * Function that checks if woocommerce is installed
     *
     * @return bool
     */
    function ratio_core_is_woocommerce_installed() {
        return function_exists( 'is_woocommerce' );
    }
}

if(!function_exists('edgt_core_get_carousel_slider_array_vc')) {
    /**
     * Function that returns array of carousels formatted for Visual Composer
     *
     * @return array array of carousels where key is term title and value is term slug
     *
     * @see edgt_core_get_carousel_slider_array
     */
    function edgt_core_get_carousel_slider_array_vc() {
        return array_flip(edgt_core_get_carousel_slider_array());
    }
}

if(!function_exists('edgt_core_get_shortcode_module_template_part')) {
	/**
	 * Loads module template part.
	 *
	 * @param string $shortcode name of the shortcode folder
	 * @param string $template name of the template to load
	 * @param string $slug
	 * @param array $params array of parameters to pass to template
	 *
	 * @see ratio_edge_get_template_part()
	 */
	function edgt_core_get_shortcode_module_template_part($shortcode,$template, $slug = '', $params = array()) {

		//HTML Content from template
		$html = '';
		$template_path = EDGE_CORE_CPT_PATH.'/'.$shortcode.'/shortcodes/templates';
		
		$temp = $template_path.'/'.$template;
		if(is_array($params) && count($params)) {
			extract($params);
		}
		
		$template = '';

		if($temp !== '') {
			if($slug !== '') {
				$template = "{$temp}-{$slug}.php";
			}
			$template = $temp.'.php';
		}
		if($template) {
			ob_start();
			include($template);
			$html = ob_get_clean();
		}

		return $html;
	}
}

if(!function_exists('edgt_core_set_portfolio_ajax_url')){
	/**
     * load themes ajax functionality
     * 
     */
	function edgt_core_set_portfolio_ajax_url() {
		echo '<script type="application/javascript">var edgtCoreAjaxUrl = "'.admin_url('admin-ajax.php').'"</script>';
	}
	add_action('wp_enqueue_scripts', 'edgt_core_set_portfolio_ajax_url');
	
}
/**
	 * Loads more function for portfolio.
	 *
	 */
if(!function_exists('edgt_core_portfolio_ajax_load_more')){
	
	function edgt_core_portfolio_ajax_load_more(){
	

	$return_obj = array();
	$shortcode_params = array();
	$activeFilterCat = '';
	if (!empty($_POST['type'])) {
        $shortcode_params['type'] = $_POST['type'];
    }
	if (!empty($_POST['columns'])) {
        $shortcode_params['columns'] = $_POST['columns'];
    }
	if (!empty($_POST['gridSize'])) {
        $shortcode_params['gridSize'] = $_POST['gridSize'];
    }
	if (!empty($_POST['orderBy'])) {
        $shortcode_params['order_by'] = $_POST['orderBy'];
    }
	if (!empty($_POST['order'])) {
        $shortcode_params['order'] = $_POST['order'];
    }
	if (!empty($_POST['number'])) {
        $shortcode_params['number'] = $_POST['number'];
    }
	if (!empty($_POST['imageSize'])) {
        $shortcode_params['image_size'] = $_POST['imageSize'];
    }
	if (!empty($_POST['filter'])) {
        $shortcode_params['filter'] = $_POST['filter'];
    }
	if (!empty($_POST['filterOrderBy'])) {
        $shortcode_params['filter_order_by'] = $_POST['filterOrderBy'];
    }
	if (!empty($_POST['category'])) {
        $shortcode_params['category'] = $_POST['category'];
    }
	if (!empty($_POST['selectedProjectes'])) {
        $shortcode_params['selected_projectes'] = $_POST['selectedProjectes'];
    }
	if (!empty($_POST['showLoadMore'])) {
        $shortcode_params['show_load_more'] = $_POST['showLoadMore'];
    }
	if (!empty($_POST['titleTag'])) {
        $shortcode_params['title_tag'] = $_POST['titleTag'];
    }
	if (!empty($_POST['nextPage'])) {
        $shortcode_params['next_page'] = $_POST['nextPage'];
    }
	if (!empty($_POST['activeFilterCat'])) {
        $shortcode_params['active_filter_cat'] = $_POST['activeFilterCat'];
    }
	
	$html = '';
	
	$port_list = new \EdgeCore\PostTypes\Portfolio\Shortcodes\PortfolioList();
	$query_array = $port_list->getQueryArray($shortcode_params);
	$query_results = new \WP_Query($query_array);

	if($query_results->have_posts()):			
		while ( $query_results->have_posts() ) : $query_results->the_post(); 

			$shortcode_params['current_id'] = get_the_ID();
			$shortcode_params['thumb_size'] = $port_list->getImageSize($shortcode_params);
			$shortcode_params['category_html'] = $port_list->getItemCategoriesHtml($shortcode_params);
			$shortcode_params['categories'] = $port_list->getItemCategories($shortcode_params);
            $shortcode_params['article_masonry_size'] = $port_list->getMasonrySize($shortcode_params);
            $shortcode_params['item_link'] = $port_list->getItemLink($shortcode_params);
			$shortcode_params['hover'] = $port_list->getHover($shortcode_params);
			$shortcode_params['images_html'] = $port_list->getItemImages($shortcode_params);

			$html .= edgt_core_get_shortcode_module_template_part('portfolio',$shortcode_params['type'], '', $shortcode_params);
			
		endwhile;
		else: 			
			$html .= '<p>'. __('Sorry, no posts matched your criteria.', 'edge-cpt') .'</p>';
		endif;
		
	$return_obj = array(
		'html' => $html,
	);

	
	echo json_encode($return_obj); exit;
}
}

add_action('wp_ajax_nopriv_edgt_core_portfolio_ajax_load_more', 'edgt_core_portfolio_ajax_load_more');
add_action( 'wp_ajax_edgt_core_portfolio_ajax_load_more', 'edgt_core_portfolio_ajax_load_more' );

add_filter( 'widget_text', 'do_shortcode' );

// Function for adding custom meta boxes hooked to default action

if ( class_exists( 'WP_Block_Type' ) && defined( 'EDGE_ROOT' ) ) {
	add_action( 'admin_head', 'ratio_edge_meta_box_add' );
} else {
	add_action( 'add_meta_boxes', 'ratio_edge_meta_box_add' );
}


if ( ! function_exists( 'ratio_edge_create_meta_box_handler' ) ) {
	function ratio_edge_create_meta_box_handler( $box, $key, $screen ) {
		add_meta_box(
			'edgtf-meta-box-'.$key,
			$box->title,
			'ratio_edge_render_meta_box',
			$screen,
			$box->context,
			$box->priority,
			array( 'box' => $box)
		);
	}
}