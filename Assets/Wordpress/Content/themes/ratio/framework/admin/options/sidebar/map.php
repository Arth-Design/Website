<?php

if ( ! function_exists('ratio_edge_sidebar_options_map') ) {

	function ratio_edge_sidebar_options_map() {

		ratio_edge_add_admin_page(
			array(
				'slug'  => '_sidebar_page',
				'title' => esc_html__( 'Sidebar', 'ratio' ),
				'icon'  => 'fa fa-indent'
			)
		);

		$panel_widgets = ratio_edge_add_admin_panel(
			array(
				'page'  => '_sidebar_page',
				'name'  => 'panel_widgets',
				'title' => esc_html__( 'Widgets', 'ratio' )
			)
		);

		/**
		 * Navigation style
		 */
		ratio_edge_add_admin_field(array(
			'type'			=> 'color',
			'name'			=> 'sidebar_background_color',
			'default_value'	=> '',
			'label' => esc_html__( 'Sidebar Background Color', 'ratio' ),
			'description' => esc_html__( 'Choose background color for sidebar', 'ratio' ),
			'parent'		=> $panel_widgets
		));

		$group_sidebar_padding = ratio_edge_add_admin_group(array(
			'name'		=> 'group_sidebar_padding',
			'title' => esc_html__( 'Padding', 'ratio' ),
			'parent'	=> $panel_widgets
		));

		$row_sidebar_padding = ratio_edge_add_admin_row(array(
			'name'		=> 'row_sidebar_padding',
			'parent'	=> $group_sidebar_padding
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'sidebar_padding_top',
			'default_value'	=> '',
			'label' => esc_html__( 'Top Padding', 'ratio' ),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_sidebar_padding
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'sidebar_padding_right',
			'default_value'	=> '',
			'label' => esc_html__( 'Right Padding', 'ratio' ),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_sidebar_padding
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'sidebar_padding_bottom',
			'default_value'	=> '',
			'label' => esc_html__( 'Bottom Padding', 'ratio' ),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_sidebar_padding
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'sidebar_padding_left',
			'default_value'	=> '',
			'label' => esc_html__( 'Left Padding', 'ratio' ),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_sidebar_padding
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'select',
			'name'			=> 'sidebar_alignment',
			'default_value'	=> '',
			'label' => esc_html__( 'Text Alignment', 'ratio' ),
			'description' => esc_html__( 'Choose text aligment', 'ratio' ),
			'options'		=> array(
				'left' => esc_html__( 'Left', 'ratio' ),
				'center' => esc_html__( 'Center', 'ratio' ),
				'right' => esc_html__( 'Right', 'ratio' )
			),
			'parent'		=> $panel_widgets
		));

	}

	add_action( 'ratio_edge_options_map', 'ratio_edge_sidebar_options_map', 9);

}