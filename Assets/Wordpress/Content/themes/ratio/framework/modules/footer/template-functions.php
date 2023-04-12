<?php

if (!function_exists('ratio_edge_register_footer_sidebar')) {

	function ratio_edge_register_footer_sidebar() {

		register_sidebar(array(
			'id' => 'footer_column_1',
			'name'          => esc_html__( 'Footer Top Column 1', 'ratio' ),
			'description'   => esc_html__( 'Widgets added here will appear in the first column of top footer area', 'ratio' ),
			'before_widget' => '<div id="%1$s" class="widget edgtf-footer-column-1 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="edgtf-footer-widget-title">',
			'after_title' => '</h5>'
		));

		register_sidebar(array(
			'id' => 'footer_column_2',
			'name'          => esc_html__( 'Footer Top Column 2', 'ratio' ),
			'description'   => esc_html__( 'Widgets added here will appear in the second column of top footer area', 'ratio' ),
			'before_widget' => '<div id="%1$s" class="widget edgtf-footer-column-2 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="edgtf-footer-widget-title">',
			'after_title' => '</h5>'
		));

		register_sidebar(array(
			'id' => 'footer_column_3',
			'name'          => esc_html__( 'Footer Top Column 3', 'ratio' ),
			'description'   => esc_html__( 'Widgets added here will appear in the third column of top footer area', 'ratio' ),
			'before_widget' => '<div id="%1$s" class="widget edgtf-footer-column-3 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="edgtf-footer-widget-title">',
			'after_title' => '</h5>'
		));

		register_sidebar(array(
			'id' => 'footer_column_4',
			'name'          => esc_html__( 'Footer Top Column 4', 'ratio' ),
			'description'   => esc_html__( 'Widgets added here will appear in the fourth column of top footer area', 'ratio' ),
			'before_widget' => '<div id="%1$s" class="widget edgtf-footer-column-4 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="edgtf-footer-widget-title">',
			'after_title' => '</h5>'
		));

		register_sidebar(array(
			'name' => esc_html__( 'Footer Bottom', 'ratio' ),
			'id' => 'footer_text',
			'description'   => esc_html__( 'Widgets added here will appear in the footer bottom text area', 'ratio' ),
			'before_widget' => '<div id="%1$s" class="widget edgtf-footer-text %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="edgtf-footer-widget-title">',
			'after_title' => '</h4>'
		));

		register_sidebar(array(
			'name'          => esc_html__( 'Footer Bottom Left', 'ratio' ),
			'id'            => 'footer_bottom_left',
			'description'   => esc_html__( 'Widgets added here will appear in the left side of footer bottom area', 'ratio' ),
			'before_widget' => '<div id="%1$s" class="widget edgtf-footer-bottom-left %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="edgtf-footer-widget-title">',
			'after_title' => '</h4>'
		));

		register_sidebar(array(
			'name'          => esc_html__( 'Footer Bottom Right', 'ratio' ),
			'id'            => 'footer_bottom_right',
			'description'   => esc_html__( 'Widgets added here will appear in the right side of footer bottom area', 'ratio' ),
			'before_widget' => '<div id="%1$s" class="widget edgtf-footer-bottom-left %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="edgtf-footer-widget-title">',
			'after_title' => '</h4>'
		));

	}

	add_action('widgets_init', 'ratio_edge_register_footer_sidebar');

}

if ( ! function_exists( 'ratio_edge_is_footer_top_enabled' ) ) {
	function ratio_edge_is_footer_top_enabled() {
		$footer_top_flag = false;
		
		//check value from options and meta field on current page
		$option_flag = true;
		if ( ratio_edge_options()->getOptionValue( 'show_footer_top' ) == "no" ) {
			$option_flag = false;
		}
		
		//check footer columns.If they are empty, disable footer top
		$columns_flag = false;
		for ( $i = 1; $i <= 4; $i ++ ) {
			$footer_columns_id = 'footer_column_' . $i;
			if ( is_active_sidebar( $footer_columns_id ) ) {
				$columns_flag = true;
				break;
			}
		}
		
		if ( $option_flag && $columns_flag ) {
			$footer_top_flag = true;
		}
		
		return $footer_top_flag;
	}
}

if ( ! function_exists( 'ratio_edge_is_footer_bottom_enabled' ) ) {
	function ratio_edge_is_footer_bottom_enabled() {
		$footer_bottom_flag = false;
		
		//check value from options and meta field on current page
		$option_flag = true;
		if ( ratio_edge_options()->getOptionValue( 'show_footer_bottom' ) == "no" ) {
			$option_flag = false;
		}
		
		if ( $option_flag && ( is_active_sidebar( 'footer_text' ) || is_active_sidebar( 'footer_bottom_left' ) || is_active_sidebar( 'footer_bottom_right' ) ) ) {
			$footer_bottom_flag = true;
		}
		
		return $footer_bottom_flag;
	}
}

if (!function_exists('ratio_edge_get_footer')) {
	/**
	 * Loads footer HTML
	 */
	function ratio_edge_get_footer() {
		
		$parameters = array();
		$id = ratio_edge_get_page_id();
		$parameters['footer_classes'] = ratio_edge_get_footer_classes($id);
		$parameters['display_footer_top'] = ratio_edge_is_footer_top_enabled();
		$parameters['display_footer_bottom'] = ratio_edge_is_footer_bottom_enabled();
		
		ratio_edge_get_module_template_part('templates/footer', 'footer', '', $parameters);
	}
}

if (!function_exists('ratio_edge_get_content_bottom_area')) {
	/**
	 * Loads content bottom area HTML with all needed parameters
	 */
	function ratio_edge_get_content_bottom_area() {

		$parameters = array();

		//Current page id
		$id = ratio_edge_get_page_id();

		//is content bottom area enabled for current page?
		$parameters['content_bottom_area'] = ratio_edge_get_meta_field_intersect('enable_content_bottom_area');
		if ($parameters['content_bottom_area'] == 'yes') {
			//Sidebar for content bottom area
			$parameters['content_bottom_area_sidebar'] = ratio_edge_get_meta_field_intersect('content_bottom_sidebar_custom_display');
			//Content bottom area in grid
			$parameters['content_bottom_area_in_grid'] = ratio_edge_get_meta_field_intersect('content_bottom_in_grid');
			//Content bottom area background color
			$parameters['content_bottom_background_color'] = 'background-color: '.ratio_edge_get_meta_field_intersect('content_bottom_background_color');
		}

		ratio_edge_get_module_template_part('templates/parts/content-bottom-area', 'footer', '', $parameters);

	}

}

if (!function_exists('ratio_edge_get_footer_top')) {
	/**
	 * Return footer top HTML
	 */
	function ratio_edge_get_footer_top() {

		$parameters = array();

		$parameters['footer_top_border'] = ratio_edge_get_footer_top_border();
		$parameters['footer_top_border_in_grid'] = (ratio_edge_options()->getOptionValue('footer_top_border_in_grid') == 'yes') ? 'edgtf-in-grid' : '';
		$parameters['footer_in_grid'] = (ratio_edge_options()->getOptionValue('footer_in_grid') == 'yes') ? true : false;
		$parameters['footer_top_classes'] = ratio_edge_footer_top_classes();
		$parameters['footer_top_columns'] = ratio_edge_options()->getOptionValue('footer_top_columns');

		ratio_edge_get_module_template_part('templates/parts/footer-top', 'footer', '', $parameters);

	}
	
}

if (!function_exists('ratio_edge_get_footer_bottom')) {
	/**
	 * Return footer bottom HTML
	 */
	function ratio_edge_get_footer_bottom() {

		$parameters = array();

		$parameters['footer_bottom_border'] = ratio_edge_get_footer_bottom_border();
		$parameters['footer_bottom_border_in_grid'] = (ratio_edge_options()->getOptionValue('footer_bottom_border_in_grid') == 'yes') ? 'edgtf-in-grid' : '';
		$parameters['footer_in_grid'] = (ratio_edge_options()->getOptionValue('footer_in_grid') == 'yes') ? true : false;
		$parameters['footer_bottom_columns'] = ratio_edge_options()->getOptionValue('footer_bottom_columns');
		$parameters['footer_bottom_border_bottom'] = ratio_edge_get_footer_bottom_bottom_border();

		ratio_edge_get_module_template_part('templates/parts/footer-bottom', 'footer', '', $parameters);

	}

}

//Functions for loading sidebars

if (!function_exists('ratio_edge_get_footer_sidebar_25_25_50')) {

	function ratio_edge_get_footer_sidebar_25_25_50() {
		ratio_edge_get_module_template_part('templates/sidebars/sidebar-three-columns-25-25-50', 'footer');
	}

}

if (!function_exists('ratio_edge_get_footer_sidebar_50_25_25')) {

	function ratio_edge_get_footer_sidebar_50_25_25() {
		ratio_edge_get_module_template_part('templates/sidebars/sidebar-three-columns-50-25-25', 'footer');
	}

}

if (!function_exists('ratio_edge_get_footer_sidebar_four_columns')) {

	function ratio_edge_get_footer_sidebar_four_columns() {
		ratio_edge_get_module_template_part('templates/sidebars/sidebar-four-columns', 'footer');
	}

}

if (!function_exists('ratio_edge_get_footer_sidebar_three_columns')) {

	function ratio_edge_get_footer_sidebar_three_columns() {
		ratio_edge_get_module_template_part('templates/sidebars/sidebar-three-columns', 'footer');
	}

}

if (!function_exists('ratio_edge_get_footer_sidebar_two_columns')) {

	function ratio_edge_get_footer_sidebar_two_columns() {
		ratio_edge_get_module_template_part('templates/sidebars/sidebar-two-columns', 'footer');
	}

}

if (!function_exists('ratio_edge_get_footer_sidebar_one_column')) {

	function ratio_edge_get_footer_sidebar_one_column() {
		ratio_edge_get_module_template_part('templates/sidebars/sidebar-one-column', 'footer');
	}

}

if (!function_exists('ratio_edge_get_footer_bottom_sidebar_three_columns')) {

	function ratio_edge_get_footer_bottom_sidebar_three_columns() {
		ratio_edge_get_module_template_part('templates/sidebars/sidebar-bottom-three-columns', 'footer');
	}

}

if (!function_exists('ratio_edge_get_footer_bottom_sidebar_two_columns')) {

	function ratio_edge_get_footer_bottom_sidebar_two_columns() {
		ratio_edge_get_module_template_part('templates/sidebars/sidebar-bottom-two-columns', 'footer');
	}

}

if (!function_exists('ratio_edge_get_footer_bottom_sidebar_one_column')) {

	function ratio_edge_get_footer_bottom_sidebar_one_column() {
		ratio_edge_get_module_template_part('templates/sidebars/sidebar-bottom-one-column', 'footer');
	}

}

