<?php

if ( ! function_exists('ratio_edge_footer_options_map') ) {
	/**
	 * Add footer options
	 */
	function ratio_edge_footer_options_map() {

		ratio_edge_add_admin_page(
			array(
				'slug' => '_footer_page',
				'title' => esc_html__( 'Footer', 'ratio' ),
				'icon' => 'fa fa-sort-amount-asc'
			)
		);

		$footer_panel = ratio_edge_add_admin_panel(
			array(
				'title' => esc_html__( 'Footer', 'ratio' ),
				'name' => 'footer',
				'page' => '_footer_page'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'uncovering_footer',
				'default_value' => 'no',
				'label' => esc_html__( 'Uncovering Footer', 'ratio' ),
				'description' => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'ratio' ),
				'parent' => $footer_panel,
			)
		);

		ratio_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'footer_in_grid',
				'default_value' => 'yes',
				'label' => esc_html__( 'Footer in Grid', 'ratio' ),
				'description' => esc_html__( 'Enabling this option will place Footer content in grid', 'ratio' ),
				'parent' => $footer_panel,
			)
		);

		ratio_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'show_footer_top',
				'default_value' => 'yes',
				'label' => esc_html__( 'Show Footer Top', 'ratio' ),
				'description' => esc_html__( 'Enabling this option will show Footer Top area', 'ratio' ),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_show_footer_top_container'
				),
				'parent' => $footer_panel,
			)
		);

		$show_footer_top_container = ratio_edge_add_admin_container(
			array(
				'name' => 'show_footer_top_container',
				'hidden_property' => 'show_footer_top',
				'hidden_value' => 'no',
				'parent' => $footer_panel
			)
		);

		ratio_edge_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_top_columns',
				'default_value' => '4',
				'label' => esc_html__( 'Footer Top Columns', 'ratio' ),
				'description' => esc_html__( 'Choose number of columns for Footer Top area', 'ratio' ),
				'options' => array(
					'1' => esc_html__( '1', 'ratio' ),
					'2' => esc_html__( '2', 'ratio' ),
					'3' => esc_html__( '3', 'ratio' ),
					'5' => esc_html__( '3(25%+25%+50%)', 'ratio' ),
					'6' => esc_html__( '3(50%+25%+25%)', 'ratio' ),
					'4' => esc_html__( '4', 'ratio' )
				),
				'parent' => $show_footer_top_container,
			)
		);

		ratio_edge_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_top_columns_alignment',
				'default_value' => '',
				'label' => esc_html__( 'Footer Top Columns Alignment', 'ratio' ),
				'description' => esc_html__( 'Text Alignment in Footer Columns', 'ratio' ),
				'options' => array(
					'left' => esc_html__( 'Left', 'ratio' ),
					'center' => esc_html__( 'Center', 'ratio' ),
					'right' => esc_html__( 'Right', 'ratio' )
				),
				'parent' => $show_footer_top_container,
			)
		);

		ratio_edge_add_admin_field(
			array(
				'name'          => 'footer_top_background_image',
				'type'          => 'image',
				'label' => esc_html__( 'Background Image', 'ratio' ),
				'description' => esc_html__( 'Choose an image to be displayed in background', 'ratio' ),
				'parent'        => $show_footer_top_container
			)
		);

		ratio_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'show_footer_bottom',
				'default_value' => 'yes',
				'label' => esc_html__( 'Show Footer Bottom', 'ratio' ),
				'description' => esc_html__( 'Enabling this option will show Footer Bottom area', 'ratio' ),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_show_footer_bottom_container'
				),
				'parent' => $footer_panel,
			)
		);

		$show_footer_bottom_container = ratio_edge_add_admin_container(
			array(
				'name' => 'show_footer_bottom_container',
				'hidden_property' => 'show_footer_bottom',
				'hidden_value' => 'no',
				'parent' => $footer_panel
			)
		);


		ratio_edge_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_bottom_columns',
				'default_value' => '2',
				'label' => esc_html__( 'Footer Bottom Columns', 'ratio' ),
				'description' => esc_html__( 'Choose number of columns for Footer Bottom area', 'ratio' ),
				'options' => array(
					'1' => esc_html__( '1', 'ratio' ),
					'2' => esc_html__( '2', 'ratio' ),
					'3' => esc_html__( '3', 'ratio' )
				),
				'parent' => $show_footer_bottom_container,
			)
		);

	}

	add_action( 'ratio_edge_options_map', 'ratio_edge_footer_options_map', 10);

}