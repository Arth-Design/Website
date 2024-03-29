<?php

if ( ! function_exists('ratio_edge_parallax_options_map') ) {
	/**
	 * Parallax options page
	 */
	function ratio_edge_parallax_options_map()
	{

		$panel_parallax = ratio_edge_add_admin_panel(
			array(
				'page'  => '_elements_page',
				'name'  => 'panel_parallax',
				'title' => esc_html__( 'Parallax', 'ratio' )
			)
		);

		ratio_edge_add_admin_field(array(
			'type'			=> 'onoff',
			'name'			=> 'parallax_on_off',
			'default_value'	=> 'off',
			'label' => esc_html__( 'Parallax on touch devices', 'ratio' ),
			'description' => esc_html__( 'Enabling this option will allow parallax on touch devices', 'ratio' ),
			'parent'		=> $panel_parallax
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'text',
			'name'			=> 'parallax_min_height',
			'default_value'	=> '400',
			'label' => esc_html__( 'Parallax Min Height', 'ratio' ),
			'description' => esc_html__( 'Set a minimum height for parallax images on small displays (phones, tablets, etc.)', 'ratio' ),
			'args'			=> array(
				'col_width'	=> 3,
				'suffix'	=> 'px'
			),
			'parent'		=> $panel_parallax
		));

	}

	add_action( 'ratio_edge_options_elements_map', 'ratio_edge_parallax_options_map');
}