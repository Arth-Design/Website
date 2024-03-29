<?php

if ( ! function_exists('ratio_edge_logo_options_map') ) {

	function ratio_edge_logo_options_map() {

		ratio_edge_add_admin_page(
			array(
				'slug' => '_logo_page',
				'title' => esc_html__( 'Logo', 'ratio' ),
				'icon' => 'fa fa-coffee'
			)
		);

		$panel_logo = ratio_edge_add_admin_panel(
			array(
				'page' => '_logo_page',
				'name' => 'panel_logo',
				'title' => esc_html__( 'Logo', 'ratio' )
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_logo,
				'type' => 'yesno',
				'name' => 'hide_logo',
				'default_value' => 'no',
				'label' => esc_html__( 'Hide Logo', 'ratio' ),
				'description' => esc_html__( 'Enabling this option will hide logo image', 'ratio' ),
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "#edgtf_hide_logo_container",
					"dependence_show_on_yes" => ""
				)
			)
		);

		$hide_logo_container = ratio_edge_add_admin_container(
			array(
				'parent' => $panel_logo,
				'name' => 'hide_logo_container',
				'hidden_property' => 'hide_logo',
				'hidden_value' => 'yes'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'name' => 'logo_image',
				'type' => 'image',
				'default_value' => EDGE_ASSETS_ROOT."/img/logo.png",
				'label' => esc_html__( 'Logo Image - Default', 'ratio' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'ratio' ),
				'parent' => $hide_logo_container
			)
		);

		ratio_edge_add_admin_field(
			array(
				'name' => 'logo_image_dark',
				'type' => 'image',
				'default_value' => EDGE_ASSETS_ROOT."/img/logo_black.png",
				'label' => esc_html__( 'Logo Image - Dark', 'ratio' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'ratio' ),
				'parent' => $hide_logo_container
			)
		);

		ratio_edge_add_admin_field(
			array(
				'name' => 'logo_image_light',
				'type' => 'image',
				'default_value' => EDGE_ASSETS_ROOT."/img/logo_white.png",
				'label' => esc_html__( 'Logo Image - Light', 'ratio' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'ratio' ),
				'parent' => $hide_logo_container
			)
		);

		ratio_edge_add_admin_field(
			array(
				'name' => 'logo_image_sticky',
				'type' => 'image',
				'default_value' => EDGE_ASSETS_ROOT."/img/logo.png",
				'label' => esc_html__( 'Logo Image - Sticky', 'ratio' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'ratio' ),
				'parent' => $hide_logo_container
			)
		);

		ratio_edge_add_admin_field(
			array(
				'name' => 'logo_image_mobile',
				'type' => 'image',
				'default_value' => EDGE_ASSETS_ROOT."/img/logo.png",
				'label' => esc_html__( 'Logo Image - Mobile', 'ratio' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'ratio' ),
				'parent' => $hide_logo_container
			)
		);


		ratio_edge_add_admin_field(
			array(
				'parent' => $hide_logo_container,
				'type' => 'image',
				'name' => 'slidedown_logo',
				'default_value' => EDGE_ASSETS_ROOT."/img/logo_slide_down.png",
				'label' => esc_html__( 'Logo in Slide Down Menu', 'ratio' ),
				'description' => esc_html__( 'Place logo for slidedown menu overlay', 'ratio' ),
			)
		);
	}

	add_action( 'ratio_edge_options_map', 'ratio_edge_logo_options_map', 2);

}