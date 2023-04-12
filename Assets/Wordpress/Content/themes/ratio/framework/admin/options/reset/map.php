<?php

if ( ! function_exists('ratio_edge_reset_options_map') ) {
	/**
	 * Reset options panel
	 */
	function ratio_edge_reset_options_map() {

		ratio_edge_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => esc_html__( 'Reset', 'ratio' ),
				'icon'  => 'fa fa-retweet'
			)
		);

		$panel_reset = ratio_edge_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => esc_html__( 'Reset', 'ratio' )
			)
		);

		ratio_edge_add_admin_field(array(
			'type'	=> 'yesno',
			'name'	=> 'reset_to_defaults',
			'default_value'	=> 'no',
			'label' => esc_html__( 'Reset to Defaults', 'ratio' ),
			'description' => esc_html__( 'This option will reset all Edge Options values to defaults', 'ratio' ),
			'parent'		=> $panel_reset
		));

	}

	add_action( 'ratio_edge_options_map', 'ratio_edge_reset_options_map', 21 );

}