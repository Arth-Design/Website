<?php

if ( ! function_exists('ratio_edge_error_404_options_map') ) {

	function ratio_edge_error_404_options_map() {

		ratio_edge_add_admin_page(array(
			'slug' => '__404_error_page',
			'title' => esc_html__( '404 Error Page', 'ratio' ),
			'icon' => 'fa fa-exclamation-triangle'
		));

		$panel_404_options = ratio_edge_add_admin_panel(array(
			'page' => '__404_error_page',
			'name'	=> 'panel_404_options',
			'title' => esc_html__( '404 Page Option', 'ratio' )
		));

		ratio_edge_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_title',
			'default_value' => '',
			'label' => esc_html__( 'Title', 'ratio' ),
			'description' => esc_html__( 'Enter title for 404 page', 'ratio' )
		));

		ratio_edge_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_text',
			'default_value' => '',
			'label' => esc_html__( 'Text', 'ratio' ),
			'description' => esc_html__( 'Enter text for 404 page', 'ratio' )
		));

		ratio_edge_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_back_to_home',
			'default_value' => '',
			'label' => esc_html__( 'Back to Home Button Label', 'ratio' ),
			'description' => esc_html__( 'Enter label for Back to Home button', 'ratio' )
		));

	}

	add_action( 'ratio_edge_options_map', 'ratio_edge_error_404_options_map', 18);

}