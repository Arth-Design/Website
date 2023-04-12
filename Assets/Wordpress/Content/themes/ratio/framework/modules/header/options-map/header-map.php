<?php

if ( ! function_exists('ratio_edge_header_options_map') ) {

	function ratio_edge_header_options_map() {

		ratio_edge_add_admin_page(
			array(
				'slug' => '_header_page',
				'title' => esc_html__( 'Header', 'ratio' ),
				'icon' => 'fa fa-header'
			)
		);

		$panel_header = ratio_edge_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header',
				'title' => esc_html__( 'Header', 'ratio' )
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'radiogroup',
				'name' => 'header_type',
				'default_value' => 'header-standard',
				'label' => esc_html__( 'Choose Header Type', 'ratio' ),
				'description' => esc_html__( 'Select the type of header you would like to use', 'ratio' ),
				'options' => array(
					'header-standard' => array(
						'image' => EDGE_ROOT . '/framework/admin/assets/img/header-standard.png',
						'label' => esc_html__( 'Header Standard', 'ratio' )
					),
					'header-vertical' => array(
						'image' => EDGE_ROOT . '/framework/admin/assets/img/header-vertical.png',
						'label' => esc_html__( 'Header Vertical', 'ratio' )
					),
					'header-full-screen' => array(
						'image' => EDGE_ROOT . '/framework/admin/assets/img/header-full-screen.png',
						'label' => esc_html__( 'Header Full Screen', 'ratio' )
					),
					'header-slide-down' => array(
						'image' => EDGE_ROOT . '/framework/admin/assets/img/header-slide-down.png',
						'label' => esc_html__( 'Header Slide Down', 'ratio' )
					)
				),
				'args' => array(
					'use_images' => true,
					'hide_labels' => true,
					'dependence' => true,
					'show' => array(
						'header-standard' => '#edgtf_panel_header_standard,#edgtf_header_behaviour,#edgtf_panel_fixed_header,#edgtf_panel_sticky_header,#edgtf_panel_main_menu',
						'header-vertical' => '#edgtf_panel_header_vertical,#edgtf_panel_vertical_main_menu',
						'header-full-screen' => '#edgtf_panel_header_full_screen,#edgtf_header_behaviour,#edgtf_panel_fixed_header,#edgtf_panel_sticky_header,#edgtf_fullscreen_menu',
						'header-slide-down' => '#edgtf_panel_header_slide_down,#edgtf_header_behaviour,#edgtf_panel_fixed_header,#edgtf_panel_sticky_header,#edgtf_panel_slidedown_menu',
					),
					'hide' => array(
						'header-standard' => '#edgtf_panel_header_vertical,#edgtf_panel_vertical_main_menu,#edgtf_panel_header_full_screen,#edgtf_panel_slidedown_menu,#edgtf_panel_header_slide_down,#edgtf_fullscreen_menu',
						'header-vertical' => '#edgtf_panel_header_standard,#edgtf_header_behaviour,#edgtf_panel_fixed_header,#edgtf_panel_sticky_header,#edgtf_panel_main_menu,#edgtf_panel_header_full_screen,#edgtf_panel_slidedown_menu,#edgtf_panel_header_slide_down,#edgtf_fullscreen_menu',
						'header-full-screen' => '#edgtf_panel_header_standard,#edgtf_header_behaviour,#edgtf_panel_fixed_header,#edgtf_panel_sticky_header,#edgtf_panel_main_menu,#edgtf_panel_header_vertical,#edgtf_panel_vertical_main_menu,#edgtf_panel_slidedown_menu,#edgtf_panel_header_slide_down',
						'header-slide-down' => '#edgtf_panel_header_standard,#edgtf_panel_main_menu,#edgtf_panel_header_vertical,#edgtf_panel_vertical_main_menu, #edgtf_panel_header_full_screen,#edgtf_fullscreen_menu',
					)
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'select',
				'name' => 'header_behaviour',
				'default_value' => 'sticky-header-on-scroll-up',
				'label' => esc_html__( 'Choose Header behaviour', 'ratio' ),
				'description' => esc_html__( 'Select the behaviour of header when you scroll down to page', 'ratio' ),
				'options' => array(
					'sticky-header-on-scroll-up' => 'Sticky on scrol up',
					'sticky-header-on-scroll-down-up' => 'Sticky on scrol up/down',
					'fixed-on-scroll' => 'Fixed on scroll'
				),
                'hidden_property' => 'header_type',
                'hidden_value' => '',
                'hidden_values' => array('header-vertical','header-full-screen'),
				'args' => array(
					'dependence' => true,
					'show' => array(
						'sticky-header-on-scroll-up' => '#edgtf_panel_sticky_header',
						'sticky-header-on-scroll-down-up' => '#edgtf_panel_sticky_header',
						'fixed-on-scroll' => '#edgtf_panel_fixed_header'
					),
					'hide' => array(
						'sticky-header-on-scroll-up' => '#edgtf_panel_fixed_header',
						'sticky-header-on-scroll-down-up' => '#edgtf_panel_fixed_header',
						'fixed-on-scroll' => '#edgtf_panel_sticky_header',
					)
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'name' => 'top_bar',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__( 'Top Bar', 'ratio' ),
				'description' => esc_html__( 'Enabling this option will show top bar area', 'ratio' ),
				'parent' => $panel_header,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_top_bar_container"
				)
			)
		);

		$top_bar_container = ratio_edge_add_admin_container(array(
			'name' => 'top_bar_container',
			'parent' => $panel_header,
			'hidden_property' => 'top_bar',
			'hidden_value' => 'no'
		));

		ratio_edge_add_admin_field(
			array(
				'parent' => $top_bar_container,
				'type' => 'select',
				'name' => 'top_bar_layout',
				'default_value' => 'two-columns',
				'label' => esc_html__( 'Choose top bar layout', 'ratio' ),
				'description' => esc_html__( 'Select the layout for top bar', 'ratio' ),
				'options' => array(
					'two-columns' => esc_html__( 'Two columns', 'ratio' ),
					'three-columns' => esc_html__( 'Three columns', 'ratio' )
				),
				'args' => array(
					"dependence" => true,
					"hide" => array(
						"two-columns" => "#edgtf_top_bar_layout_container",
						"three-columns" => ""
					),
					"show" => array(
						"two-columns" => "",
						"three-columns" => "#edgtf_top_bar_layout_container"
					)
				)
			)
		);

		$top_bar_layout_container = ratio_edge_add_admin_container(array(
			'name' => 'top_bar_layout_container',
			'parent' => $top_bar_container,
			'hidden_property' => 'top_bar_layout',
			'hidden_value' => '',
			'hidden_values' => array("two-columns"),
		));

		ratio_edge_add_admin_field(
			array(
				'parent' => $top_bar_layout_container,
				'type' => 'select',
				'name' => 'top_bar_column_widths',
				'default_value' => '30-30-30',
				'label' => esc_html__( 'Choose column widths', 'ratio' ),
				'description' => '',
				'options' => array(
					'30-30-30' => esc_html__( '33% - 33% - 33%', 'ratio' ),
					'25-50-25' => esc_html__( '25% - 50% - 25%', 'ratio' )
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'name' => 'top_bar_in_grid',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__( 'Top Bar in grid', 'ratio' ),
				'description' => esc_html__( 'Set top bar content to be in grid', 'ratio' ),
				'parent' => $top_bar_container,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_top_bar_in_grid_container"
				)
			)
		);

		$top_bar_in_grid_container = ratio_edge_add_admin_container(array(
			'name' => 'top_bar_in_grid_container',
			'parent' => $top_bar_container,
			'hidden_property' => 'top_bar_in_grid',
			'hidden_value' => 'no'
		));

		ratio_edge_add_admin_field(array(
			'name' => 'top_bar_grid_background_color',
			'type' => 'color',
			'label' => esc_html__( 'Grid Background Color', 'ratio' ),
			'description' => esc_html__( 'Set grid background color for top bar', 'ratio' ),
			'parent' => $top_bar_in_grid_container
		));


		ratio_edge_add_admin_field(array(
			'name' => 'top_bar_grid_background_transparency',
			'type' => 'text',
			'label' => esc_html__( 'Grid Background Transparency', 'ratio' ),
			'description' => esc_html__( 'Set grid background transparency for top bar', 'ratio' ),
			'parent' => $top_bar_in_grid_container,
			'args' => array('col_width' => 3)
		));

		ratio_edge_add_admin_field(array(
			'name' => 'top_bar_background_color',
			'type' => 'color',
			'label' => esc_html__( 'Background Color', 'ratio' ),
			'description' => esc_html__( 'Set background color for top bar', 'ratio' ),
			'parent' => $top_bar_container
		));

		ratio_edge_add_admin_field(array(
			'name' => 'top_bar_background_transparency',
			'type' => 'text',
			'label' => esc_html__( 'Background Transparency', 'ratio' ),
			'description' => esc_html__( 'Set background transparency for top bar', 'ratio' ),
			'parent' => $top_bar_container,
			'args' => array('col_width' => 3)
		));

		ratio_edge_add_admin_field(array(
			'name' => 'top_bar_height',
			'type' => 'text',
			'label' => esc_html__( 'Top bar height', 'ratio' ),
			'description' => esc_html__( 'Enter top bar height (Default is 40px)', 'ratio' ),
			'parent' => $top_bar_container,
			'args' => array(
				'col_width' => 2,
				'suffix' => 'px'
			)
		));

		ratio_edge_add_admin_field(array(
			'name' => 'hide_top_bar_on_responsive',
			'type' => 'yesno',
			'default_value' => 'yes',
			'label' => esc_html__( 'Hide Top Bar on Responsive', 'ratio' ),
			'description' => esc_html__( 'Enabling this option you will hide top header area on responsive', 'ratio' ),
			'parent' => $top_bar_container,
		));

		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'select',
				'name' => 'header_style',
				'default_value' => '',
				'label' => esc_html__( 'Header Skin', 'ratio' ),
				'description' => esc_html__( 'Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'ratio' ),
				'options' => array(
					'' => '',
					'light-header' => esc_html__( 'Light', 'ratio' ),
					'dark-header' => esc_html__( 'Dark', 'ratio' )
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'yesno',
				'name' => 'enable_header_style_on_scroll',
				'default_value' => 'no',
				'label' => esc_html__( 'Enable Header Style on Scroll', 'ratio' ),
				'description' => esc_html__( 'Enabling this option, header will change style depending on row settings for dark/light style', 'ratio' ),
			)
		);


		$panel_header_standard = ratio_edge_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header_standard',
				'title' => esc_html__( 'Header Standard', 'ratio' ),
				'hidden_property' => 'header_type',
				'hidden_value' => '',
				'hidden_values' => array(
                    'header-vertical',
					'header-full-screen',
					'header-slide-down'
				)
			)
		);

		ratio_edge_add_admin_section_title(
			array(
				'parent' => $panel_header_standard,
				'name' => 'menu_area_title',
				'title' => esc_html__( 'Menu Area', 'ratio' )
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'yesno',
				'name' => 'menu_area_in_grid_header_standard',
				'default_value' => 'no',
				'label' => esc_html__( 'Header in grid', 'ratio' ),
				'description' => esc_html__( 'Set header content to be in grid', 'ratio' ),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_menu_area_in_grid_header_standard_container'
				)
			)
		);

		$menu_area_in_grid_header_standard_container = ratio_edge_add_admin_container(
			array(
				'parent' => $panel_header_standard,
				'name' => 'menu_area_in_grid_header_standard_container',
				'hidden_property' => 'menu_area_in_grid_header_standard',
				'hidden_value' => 'no'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $menu_area_in_grid_header_standard_container,
				'type' => 'color',
				'name' => 'menu_area_grid_background_color_header_standard',
				'default_value' => '',
				'label' => esc_html__( 'Grid Background color', 'ratio' ),
				'description' => esc_html__( 'Set grid background color for header area', 'ratio' ),
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $menu_area_in_grid_header_standard_container,
				'type' => 'text',
				'name' => 'menu_area_grid_background_transparency_header_standard',
				'default_value' => '',
				'label' => esc_html__( 'Grid background transparency', 'ratio' ),
				'description' => esc_html__( 'Set grid background transparency for header', 'ratio' ),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'color',
				'name' => 'menu_area_background_color_header_standard',
				'default_value' => '',
				'label' => esc_html__( 'Background color', 'ratio' ),
				'description' => esc_html__( 'Set background color for header', 'ratio' )
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'text',
				'name' => 'menu_area_background_transparency_header_standard',
				'default_value' => '',
				'label' => esc_html__( 'Background transparency', 'ratio' ),
				'description' => esc_html__( 'Set background transparency for header', 'ratio' ),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'text',
				'name' => 'menu_area_height_header_standard',
				'default_value' => '',
				'label' => esc_html__( 'Height', 'ratio' ),
				'description' => esc_html__( 'Enter header height (default is 60px)', 'ratio' ),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

        $panel_header_vertical = ratio_edge_add_admin_panel(
            array(
                'page' => '_header_page',
                'name' => 'panel_header_vertical',
                'title' => esc_html__( 'Header Vertical', 'ratio' ),
                'hidden_property' => 'header_type',
                'hidden_value' => '',
                'hidden_values' => array(
                    'header-standard',
					'header-full-screen',
					'header-slide-down'
                )
            )
        );

            ratio_edge_add_admin_field(array(
                'name' => 'vertical_header_background_color',
                'type' => 'color',
                'label' => esc_html__( 'Background Color', 'ratio' ),
                'description' => esc_html__( 'Set background color for vertical menu', 'ratio' ),
                'parent' => $panel_header_vertical
            ));

            ratio_edge_add_admin_field(array(
                'name' => 'vertical_header_transparency',
                'type' => 'text',
                'label' => esc_html__( 'Transparency', 'ratio' ),
                'description' => esc_html__( 'Enter transparency for vertical menu (value from 0 to 1)', 'ratio' ),
                'parent' => $panel_header_vertical,
                'args' => array(
                    'col_width' => 1
                )
            ));

            ratio_edge_add_admin_field(
                array(
                    'name' => 'vertical_header_background_image',
                    'type' => 'image',
                    'default_value' => '',
                    'label' => esc_html__( 'Background Image', 'ratio' ),
                    'description' => esc_html__( 'Set background image for vertical menu', 'ratio' ),
                    'parent' => $panel_header_vertical
                )
            );


		$panel_header_full_screen = ratio_edge_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header_full_screen',
				'title' => esc_html__( 'Header Full Screen', 'ratio' ),
				'hidden_property' => 'header_type',
				'hidden_value' => '',
				'hidden_values' => array(
					'header-standard',
					'header-vertical',
					'header-slide-down'
				)
			)
		);


		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'yesno',
				'name' => 'menu_area_in_grid_header_full_screen',
				'default_value' => 'no',
				'label' => esc_html__( 'Header in grid', 'ratio' ),
				'description' => esc_html__( 'Set header content to be in grid', 'ratio' ),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_menu_area_in_grid_header_standard_container'
				)
			)
		);



		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'color',
				'name' => 'menu_area_background_color_header_full_screen',
				'default_value' => '',
				'label' => esc_html__( 'Background color', 'ratio' ),
				'description' => esc_html__( 'Set background color for header', 'ratio' )
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'text',
				'name' => 'menu_area_background_transparency_header_full_screen',
				'default_value' => '',
				'label' => esc_html__( 'Background transparency', 'ratio' ),
				'description' => esc_html__( 'Set background transparency for header', 'ratio' ),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'text',
				'name' => 'menu_area_height_header_full_screen',
				'default_value' => '',
				'label' => esc_html__( 'Height', 'ratio' ),
				'description' => esc_html__( 'Enter header height (default is 60px)', 'ratio' ),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		$panel_header_slide_down = ratio_edge_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header_slide_down',
				'title' => esc_html__( 'Header Slide Down', 'ratio' ),
				'hidden_property' => 'header_type',
				'hidden_value' => '',
				'hidden_values' => array(
					'header-standard',
					'header-vertical',
					'header-full-screen'
				)
			)
		);


		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_header_slide_down,
				'type' => 'yesno',
				'name' => 'menu_area_in_grid_header_slide_down',
				'default_value' => 'no',
				'label' => esc_html__( 'Header in grid', 'ratio' ),
				'description' => esc_html__( 'Set header content to be in grid', 'ratio' ),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_menu_area_in_grid_header_standard_container'
				)
			)
		);



		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_header_slide_down,
				'type' => 'color',
				'name' => 'menu_area_background_color_header_slide_down',
				'default_value' => '',
				'label' => esc_html__( 'Background color', 'ratio' ),
				'description' => esc_html__( 'Set background color for header', 'ratio' )
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_header_slide_down,
				'type' => 'text',
				'name' => 'menu_area_background_transparency_header_slide_down',
				'default_value' => '',
				'label' => esc_html__( 'Background transparency', 'ratio' ),
				'description' => esc_html__( 'Set background transparency for header', 'ratio' ),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_header_slide_down,
				'type' => 'text',
				'name' => 'menu_area_height_header_slide_down',
				'default_value' => '',
				'label' => esc_html__( 'Height', 'ratio' ),
				'description' => esc_html__( 'Enter header height (default is 60px)', 'ratio' ),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		$panel_sticky_header = ratio_edge_add_admin_panel(
			array(
				'title' => esc_html__( 'Sticky Header', 'ratio' ),
				'name' => 'panel_sticky_header',
				'page' => '_header_page',
				'hidden_property' => 'header_behaviour',
				'hidden_values' => array(
					'fixed-on-scroll'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'name' => 'scroll_amount_for_sticky',
				'type' => 'text',
				'label' => esc_html__( 'Scroll Amount for Sticky', 'ratio' ),
				'description' => esc_html__( 'Enter scroll amount for Sticky Menu to appear (deafult is header height)', 'ratio' ),
				'parent' => $panel_sticky_header,
				'args' => array(
					'col_width' => 2,
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'name' => 'sticky_header_in_grid',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__( 'Sticky Header in grid', 'ratio' ),
				'description' => esc_html__( 'Set sticky header content to be in grid', 'ratio' ),
				'parent' => $panel_sticky_header,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_sticky_header_in_grid_container"
				)
			)
		);

		$sticky_header_in_grid_container = ratio_edge_add_admin_container(array(
			'name' => 'sticky_header_in_grid_container',
			'parent' => $panel_sticky_header,
			'hidden_property' => 'sticky_header_in_grid',
			'hidden_value' => 'no'
		));

		ratio_edge_add_admin_field(array(
			'name' => 'sticky_header_grid_background_color',
			'type' => 'color',
			'label' => esc_html__( 'Grid Background Color', 'ratio' ),
			'description' => esc_html__( 'Set grid background color for sticky header', 'ratio' ),
			'parent' => $sticky_header_in_grid_container
		));

		ratio_edge_add_admin_field(array(
			'name' => 'sticky_header_grid_transparency',
			'type' => 'text',
			'label' => esc_html__( 'Sticky Header Grid Transparency', 'ratio' ),
			'description' => esc_html__( 'Enter transparency for sticky header grid (value from 0 to 1)', 'ratio' ),
			'parent' => $sticky_header_in_grid_container,
			'args' => array(
				'col_width' => 1
			)
		));

		ratio_edge_add_admin_field(array(
			'name' => 'sticky_header_background_color',
			'type' => 'color',
			'label' => esc_html__( 'Background Color', 'ratio' ),
			'description' => esc_html__( 'Set background color for sticky header', 'ratio' ),
			'parent' => $panel_sticky_header
		));

		ratio_edge_add_admin_field(array(
			'name' => 'sticky_header_transparency',
			'type' => 'text',
			'label' => esc_html__( 'Sticky Header Transparency', 'ratio' ),
			'description' => esc_html__( 'Enter transparency for sticky header (value from 0 to 1)', 'ratio' ),
			'parent' => $panel_sticky_header,
			'args' => array(
				'col_width' => 1
			)
		));

		ratio_edge_add_admin_field(array(
			'name' => 'sticky_header_height',
			'type' => 'text',
			'label' => esc_html__( 'Sticky Header Height', 'ratio' ),
			'description' => esc_html__( 'Enter height for sticky header (default is 60px)', 'ratio' ),
			'parent' => $panel_sticky_header,
			'args' => array(
				'col_width' => 2,
				'suffix' => 'px'
			)
		));

		$group_sticky_header_menu = ratio_edge_add_admin_group(array(
			'title' => esc_html__( 'Sticky Header Menu', 'ratio' ),
			'name' => 'group_sticky_header_menu',
			'parent' => $panel_sticky_header,
			'description' => esc_html__( 'Define styles for sticky menu items', 'ratio' ),
		));

		$row1_sticky_header_menu = ratio_edge_add_admin_row(array(
			'name' => 'row1',
			'parent' => $group_sticky_header_menu
		));

		ratio_edge_add_admin_field(array(
			'name' => 'sticky_color',
			'type' => 'colorsimple',
			'label' => esc_html__( 'Text Color', 'ratio' ),
			'description' => '',
			'parent' => $row1_sticky_header_menu
		));

		ratio_edge_add_admin_field(array(
			'name' => 'sticky_hovercolor',
			'type' => 'colorsimple',
			'label' => esc_html__( 'Hover/Active color', 'ratio' ),
			'description' => '',
			'parent' => $row1_sticky_header_menu
		));

		$row2_sticky_header_menu = ratio_edge_add_admin_row(array(
			'name' => 'row2',
			'parent' => $group_sticky_header_menu
		));

		ratio_edge_add_admin_field(
			array(
				'name' => 'sticky_google_fonts',
				'type' => 'fontsimple',
				'label' => esc_html__( 'Font Family', 'ratio' ),
				'default_value' => '-1',
				'parent' => $row2_sticky_header_menu,
			)
		);

		ratio_edge_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'sticky_fontsize',
				'label' => esc_html__( 'Font Size', 'ratio' ),
				'default_value' => '',
				'parent' => $row2_sticky_header_menu,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'sticky_lineheight',
				'label' => esc_html__( 'Line height', 'ratio' ),
				'default_value' => '',
				'parent' => $row2_sticky_header_menu,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'type' => 'selectblanksimple',
				'name' => 'sticky_texttransform',
				'label' => esc_html__( 'Text transform', 'ratio' ),
				'default_value' => '',
				'options' => ratio_edge_get_text_transform_array(),
				'parent' => $row2_sticky_header_menu
			)
		);

		$row3_sticky_header_menu = ratio_edge_add_admin_row(array(
			'name' => 'row3',
			'parent' => $group_sticky_header_menu
		));

		ratio_edge_add_admin_field(
			array(
				'type' => 'selectblanksimple',
				'name' => 'sticky_fontstyle',
				'default_value' => '',
				'label' => esc_html__( 'Font Style', 'ratio' ),
				'options' => ratio_edge_get_font_style_array(),
				'parent' => $row3_sticky_header_menu
			)
		);

		ratio_edge_add_admin_field(
			array(
				'type' => 'selectblanksimple',
				'name' => 'sticky_fontweight',
				'default_value' => '',
				'label' => esc_html__( 'Font Weight', 'ratio' ),
				'options' => ratio_edge_get_font_weight_array(),
				'parent' => $row3_sticky_header_menu
			)
		);

		ratio_edge_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'sticky_letterspacing',
				'label' => esc_html__( 'Letter Spacing', 'ratio' ),
				'default_value' => '',
				'parent' => $row3_sticky_header_menu,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$panel_fixed_header = ratio_edge_add_admin_panel(
			array(
				'title' => esc_html__( 'Fixed Header', 'ratio' ),
				'name' => 'panel_fixed_header',
				'page' => '_header_page',
				'hidden_property' => 'header_behaviour',
				'hidden_values' => array('sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up')
			)
		);

		ratio_edge_add_admin_field(array(
			'name' => 'fixed_header_grid_background_color',
			'type' => 'color',
			'default_value' => '',
			'label' => esc_html__( 'Grid Background Color', 'ratio' ),
			'description' => esc_html__( 'Set grid background color for fixed header', 'ratio' ),
			'parent' => $panel_fixed_header
		));

		ratio_edge_add_admin_field(array(
			'name' => 'fixed_header_grid_transparency',
			'type' => 'text',
			'default_value' => '',
			'label' => esc_html__( 'Header Transparency Grid', 'ratio' ),
			'description' => esc_html__( 'Enter transparency for fixed header grid (value from 0 to 1)', 'ratio' ),
			'parent' => $panel_fixed_header,
			'args' => array(
				'col_width' => 1
			)
		));

		ratio_edge_add_admin_field(array(
			'name' => 'fixed_header_background_color',
			'type' => 'color',
			'default_value' => '',
			'label' => esc_html__( 'Background Color', 'ratio' ),
			'description' => esc_html__( 'Set background color for fixed header', 'ratio' ),
			'parent' => $panel_fixed_header
		));

		ratio_edge_add_admin_field(array(
			'name' => 'fixed_header_transparency',
			'type' => 'text',
			'label' => esc_html__( 'Header Transparency', 'ratio' ),
			'description' => esc_html__( 'Enter transparency for fixed header (value from 0 to 1)', 'ratio' ),
			'parent' => $panel_fixed_header,
			'args' => array(
				'col_width' => 1
			)
		));


		$panel_main_menu = ratio_edge_add_admin_panel(
			array(
				'title' => esc_html__( 'Main Menu', 'ratio' ),
				'name' => 'panel_main_menu',
				'page' => '_header_page',
                'hidden_property' => 'header_type',
                'hidden_values' => array(
					'header-vertical',
					'header-full-screen',
					'header-slide-down'
				)
			)
		);

		ratio_edge_add_admin_section_title(
			array(
				'parent' => $panel_main_menu,
				'name' => 'main_menu_area_title',
				'title' => esc_html__( 'Main Menu General Settings', 'ratio' )
			)
		);


		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'select',
				'name' => 'menu_item_icon_position',
				'default_value' => 'left',
				'label' => esc_html__( 'Icon Position in 1st Level Menu', 'ratio' ),
				'description' => esc_html__( 'Choose position of icon selected in Appearance->Menu->Menu Structure', 'ratio' ),
				'options' => array(
					'left' => esc_html__( 'Left', 'ratio' ),
					'top' => esc_html__( 'Top', 'ratio' )
				),
				'args' => array(
					'dependence' => true,
					'hide' => array(
						'left' => '#edgtf_menu_item_icon_position_container'
					),
					'show' => array(
						'top' => '#edgtf_menu_item_icon_position_container'
					)
				)
			)
		);

		$menu_item_icon_position_container = ratio_edge_add_admin_container(
			array(
				'parent' => $panel_main_menu,
				'name' => 'menu_item_icon_position_container',
				'hidden_property' => 'menu_item_icon_position',
				'hidden_value' => 'left'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $menu_item_icon_position_container,
				'type' => 'text',
				'name' => 'menu_item_icon_size',
				'default_value' => '',
				'label' => esc_html__( 'Icon Size', 'ratio' ),
				'description' => esc_html__( 'Choose position of icon selected in Appearance->Menu->Menu Structure', 'ratio' ),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'select',
				'name' => 'menu_item_style',
				'default_value' => 'small_item',
				'label' => esc_html__( 'Item Height in 1st Level Menu', 'ratio' ),
				'description' => esc_html__( 'Choose menu item height', 'ratio' ),
				'options' => array(
					'small_item' => esc_html__( 'Small', 'ratio' ),
					'large_item' => esc_html__( 'Big', 'ratio' )
				)
			)
		);

		$drop_down_group = ratio_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'drop_down_group',
				'title' => esc_html__( 'Main Dropdown Menu', 'ratio' ),
				'description' => esc_html__( 'Choose a color and transparency for the main menu background (0 = fully transparent, 1 = opaque)', 'ratio' )
			)
		);

		$drop_down_row1 = ratio_edge_add_admin_row(
			array(
				'parent' => $drop_down_group,
				'name' => 'drop_down_row1',
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $drop_down_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_background_color',
				'default_value' => '',
				'label' => esc_html__( 'Background Color', 'ratio' ),
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $drop_down_row1,
				'type' => 'textsimple',
				'name' => 'dropdown_background_transparency',
				'default_value' => '',
				'label' => esc_html__( 'Transparency', 'ratio' ),
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $drop_down_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_separator_color',
				'default_value' => '',
				'label' => esc_html__( 'Item Bottom Separator Color', 'ratio' ),
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $drop_down_row1,
				'type' => 'yesnosimple',
				'name' => 'enable_dropdown_separator_full_width',
				'default_value' => 'no',
				'label' => esc_html__( 'Item Separator Full Width', 'ratio' ),
			)
		);

		$drop_down_padding_group = ratio_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'drop_down_padding_group',
				'title' => esc_html__( 'Main Dropdown Menu Padding', 'ratio' ),
				'description' => esc_html__( 'Choose a top/bottom padding for dropdown menu', 'ratio' )
			)
		);

		$drop_down_padding_row = ratio_edge_add_admin_row(
			array(
				'parent' => $drop_down_padding_group,
				'name' => 'drop_down_padding_row',
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $drop_down_padding_row,
				'type' => 'textsimple',
				'name' => 'dropdown_top_padding',
				'default_value' => '',
				'label' => esc_html__( 'Top Padding', 'ratio' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $drop_down_padding_row,
				'type' => 'textsimple',
				'name' => 'dropdown_bottom_padding',
				'default_value' => '',
				'label' => esc_html__( 'Bottom Padding', 'ratio' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'select',
				'name' => 'menu_dropdown_appearance',
				'default_value' => 'default',
				'label' => esc_html__( 'Main Dropdown Menu Appearance', 'ratio' ),
				'description' => esc_html__( 'Choose appearance for dropdown menu', 'ratio' ),
				'options' => array(
					'dropdown-default' => esc_html__( 'Default', 'ratio' ),
					'dropdown-slide-from-bottom' => esc_html__( 'Slide From Bottom', 'ratio' ),
					'dropdown-slide-from-top' => esc_html__( 'Slide From Top', 'ratio' ),
					'dropdown-animate-height' => esc_html__( 'Animate Height', 'ratio' ),
					'dropdown-slide-from-left' => esc_html__( 'Slide From Left', 'ratio' )
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'text',
				'name' => 'dropdown_top_position',
				'default_value' => '',
				'label' => esc_html__( 'Dropdown position', 'ratio' ),
				'description' => esc_html__( 'Enter value in percentage of entire header height', 'ratio' ),
				'args' => array(
					'col_width' => 3,
					'suffix' => '%'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'yesno',
				'name' => 'enable_wide_menu_background',
				'default_value' => 'yes',
				'label' => esc_html__( 'Enable Full Width Background for Wide Dropdown Type', 'ratio' ),
				'description' => esc_html__( 'Enabling this option will show full width background for wide dropdown type', 'ratio' ),
			)
		);

		$first_level_group = ratio_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'first_level_group',
				'title' => esc_html__( '1st Level Menu', 'ratio' ),
				'description' => esc_html__( 'Define styles for 1st level in Top Navigation Menu', 'ratio' )
			)
		);

		$first_level_row1 = ratio_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row1'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'colorsimple',
				'name' => 'menu_color',
				'default_value' => '',
				'label' => esc_html__( 'Text Color', 'ratio' ),
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'colorsimple',
				'name' => 'menu_hovercolor',
				'default_value' => '',
				'label' => esc_html__( 'Hover Text Color', 'ratio' ),
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'colorsimple',
				'name' => 'menu_activecolor',
				'default_value' => '',
				'label' => esc_html__( 'Active Text Color', 'ratio' ),
			)
		);

		$first_level_row2 = ratio_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row2',
				'next' => true
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'colorsimple',
				'name' => 'menu_text_background_color',
				'default_value' => '',
				'label' => esc_html__( 'Text Background Color', 'ratio' ),
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'colorsimple',
				'name' => 'menu_hover_background_color',
				'default_value' => '',
				'label' => esc_html__( 'Hover Text Background Color', 'ratio' ),
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'colorsimple',
				'name' => 'menu_active_background_color',
				'default_value' => '',
				'label' => esc_html__( 'Active Text Background Color', 'ratio' ),
			)
		);

		$first_level_row3 = ratio_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row3',
				'next' => true
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row3,
				'type' => 'colorsimple',
				'name' => 'menu_light_hovercolor',
				'default_value' => '',
				'label' => esc_html__( 'Light Menu Hover Text Color', 'ratio' ),
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row3,
				'type' => 'colorsimple',
				'name' => 'menu_light_activecolor',
				'default_value' => '',
				'label' => esc_html__( 'Light Menu Active Text Color', 'ratio' ),
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row3,
				'type' => 'colorsimple',
				'name' => 'menu_light_border_color',
				'default_value' => '',
				'label' => esc_html__( 'Light Menu Border Hover/Active Color', 'ratio' ),
			)
		);

		$first_level_row4 = ratio_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row4',
				'next' => true
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row4,
				'type' => 'colorsimple',
				'name' => 'menu_dark_hovercolor',
				'default_value' => '',
				'label' => esc_html__( 'Dark Menu Hover Text Color', 'ratio' ),
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row4,
				'type' => 'colorsimple',
				'name' => 'menu_dark_activecolor',
				'default_value' => '',
				'label' => esc_html__( 'Dark Menu Active Text Color', 'ratio' ),
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row4,
				'type' => 'colorsimple',
				'name' => 'menu_dark_border_color',
				'default_value' => '',
				'label' => esc_html__( 'Dark Menu Border Hover/Active Color', 'ratio' ),
			)
		);

		$first_level_row5 = ratio_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row5',
				'next' => true
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'fontsimple',
				'name' => 'menu_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__( 'Font Family', 'ratio' ),
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'textsimple',
				'name' => 'menu_fontsize',
				'default_value' => '',
				'label' => esc_html__( 'Font Size', 'ratio' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'textsimple',
				'name' => 'menu_hover_background_color_transparency',
				'default_value' => '',
				'label' => esc_html__( 'Hover Background Color Transparency', 'ratio' ),
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'textsimple',
				'name' => 'menu_active_background_color_transparency',
				'default_value' => '',
				'label' => esc_html__( 'Active Background Color Transparency', 'ratio' ),
			)
		);

		$first_level_row6 = ratio_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row6',
				'next' => true
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row6,
				'type' => 'selectblanksimple',
				'name' => 'menu_fontstyle',
				'default_value' => '',
				'label' => esc_html__( 'Font Style', 'ratio' ),
				'options' => ratio_edge_get_font_style_array()
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row6,
				'type' => 'selectblanksimple',
				'name' => 'menu_fontweight',
				'default_value' => '',
				'label' => esc_html__( 'Font Weight', 'ratio' ),
				'options' => ratio_edge_get_font_weight_array()
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row6,
				'type' => 'textsimple',
				'name' => 'menu_letterspacing',
				'default_value' => '',
				'label' => esc_html__( 'Letter Spacing', 'ratio' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row6,
				'type' => 'selectblanksimple',
				'name' => 'menu_texttransform',
				'default_value' => '',
				'label' => esc_html__( 'Text Transform', 'ratio' ),
				'options' => ratio_edge_get_text_transform_array()
			)
		);

		$first_level_row7 = ratio_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row7',
				'next' => true
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row7,
				'type' => 'textsimple',
				'name' => 'menu_lineheight',
				'default_value' => '',
				'label' => esc_html__( 'Line Height', 'ratio' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row7,
				'type' => 'textsimple',
				'name' => 'menu_padding_left_right',
				'default_value' => '',
				'label' => esc_html__( 'Padding Left/Right', 'ratio' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row7,
				'type' => 'textsimple',
				'name' => 'menu_margin_left_right',
				'default_value' => '',
				'label' => esc_html__( 'Margin Left/Right', 'ratio' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_group = ratio_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'second_level_group',
				'title' => esc_html__( '2nd Level Menu', 'ratio' ),
				'description' => esc_html__( 'Define styles for 2nd level in Top Navigation Menu', 'ratio' )
			)
		);

		$second_level_row1 = ratio_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row1'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_color',
				'default_value' => '',
				'label' => esc_html__( 'Text Color', 'ratio' )
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_hovercolor',
				'default_value' => '',
				'label' => esc_html__( 'Hover/Active Color', 'ratio' )
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_background_hovercolor',
				'default_value' => '',
				'label' => esc_html__( 'Hover/Active Background Color', 'ratio' )
			)
		);

		$second_level_row2 = ratio_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row2',
				'next' => true
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__( 'Font Family', 'ratio' )
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_fontsize',
				'default_value' => '',
				'label' => esc_html__( 'Font Size', 'ratio' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_lineheight',
				'default_value' => '',
				'label' => esc_html__( 'Line Height', 'ratio' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_padding_top_bottom',
				'default_value' => '',
				'label' => esc_html__( 'Padding Top/Bottom', 'ratio' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_row3 = ratio_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row3',
				'next' => true
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_fontstyle',
				'default_value' => '',
				'label' => esc_html__( 'Font style', 'ratio' ),
				'options' => ratio_edge_get_font_style_array()
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_fontweight',
				'default_value' => '',
				'label' => esc_html__( 'Font weight', 'ratio' ),
				'options' => ratio_edge_get_font_weight_array()
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_letterspacing',
				'default_value' => '',
				'label' => esc_html__( 'Letter spacing', 'ratio' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_texttransform',
				'default_value' => '',
				'label' => esc_html__( 'Text Transform', 'ratio' ),
				'options' => ratio_edge_get_text_transform_array()
			)
		);

		$second_level_wide_group = ratio_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'second_level_wide_group',
				'title' => esc_html__( '2nd Level Wide Menu', 'ratio' ),
				'description' => esc_html__( 'Define styles for 2nd level in Wide Menu', 'ratio' )
			)
		);

		$second_level_wide_row1 = ratio_edge_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name' => 'second_level_wide_row1'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_color',
				'default_value' => '',
				'label' => esc_html__( 'Text Color', 'ratio' )
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_hovercolor',
				'default_value' => '',
				'label' => esc_html__( 'Hover/Active Color', 'ratio' )
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_background_hovercolor',
				'default_value' => '',
				'label' => esc_html__( 'Hover/Active Background Color', 'ratio' )
			)
		);

		$second_level_wide_row2 = ratio_edge_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name' => 'second_level_wide_row2',
				'next' => true
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_wide_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__( 'Font Family', 'ratio' )
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_fontsize',
				'default_value' => '',
				'label' => esc_html__( 'Font Size', 'ratio' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_lineheight',
				'default_value' => '',
				'label' => esc_html__( 'Line Height', 'ratio' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_padding_top_bottom',
				'default_value' => '',
				'label' => esc_html__( 'Padding Top/Bottom', 'ratio' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_wide_row3 = ratio_edge_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name' => 'second_level_wide_row3',
				'next' => true
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_fontstyle',
				'default_value' => '',
				'label' => esc_html__( 'Font style', 'ratio' ),
				'options' => ratio_edge_get_font_style_array()
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_fontweight',
				'default_value' => '',
				'label' => esc_html__( 'Font weight', 'ratio' ),
				'options' => ratio_edge_get_font_weight_array()
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_letterspacing',
				'default_value' => '',
				'label' => esc_html__( 'Letter spacing', 'ratio' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_texttransform',
				'default_value' => '',
				'label' => esc_html__( 'Text Transform', 'ratio' ),
				'options' => ratio_edge_get_text_transform_array()
			)
		);

		$third_level_group = ratio_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'third_level_group',
				'title' => esc_html__( '3nd Level Menu', 'ratio' ),
				'description' => esc_html__( 'Define styles for 3nd level in Top Navigation Menu', 'ratio' )
			)
		);

		$third_level_row1 = ratio_edge_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => 'third_level_row1'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_color_thirdlvl',
				'default_value' => '',
				'label' => esc_html__( 'Text Color', 'ratio' )
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_hovercolor_thirdlvl',
				'default_value' => '',
				'label' => esc_html__( 'Hover/Active Color', 'ratio' )
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_background_hovercolor_thirdlvl',
				'default_value' => '',
				'label' => esc_html__( 'Hover/Active Background Color', 'ratio' )
			)
		);

		$third_level_row2 = ratio_edge_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => 'third_level_row2',
				'next' => true
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_google_fonts_thirdlvl',
				'default_value' => '-1',
				'label' => esc_html__( 'Font Family', 'ratio' )
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_fontsize_thirdlvl',
				'default_value' => '',
				'label' => esc_html__( 'Font Size', 'ratio' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_lineheight_thirdlvl',
				'default_value' => '',
				'label' => esc_html__( 'Line Height', 'ratio' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_row3 = ratio_edge_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => 'third_level_row3',
				'next' => true
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_fontstyle_thirdlvl',
				'default_value' => '',
				'label' => esc_html__( 'Font style', 'ratio' ),
				'options' => ratio_edge_get_font_style_array()
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_fontweight_thirdlvl',
				'default_value' => '',
				'label' => esc_html__( 'Font weight', 'ratio' ),
				'options' => ratio_edge_get_font_weight_array()
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_letterspacing_thirdlvl',
				'default_value' => '',
				'label' => esc_html__( 'Letter spacing', 'ratio' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_texttransform_thirdlvl',
				'default_value' => '',
				'label' => esc_html__( 'Text Transform', 'ratio' ),
				'options' => ratio_edge_get_text_transform_array()
			)
		);


		/***********************************************************/
		$third_level_wide_group = ratio_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'third_level_wide_group',
				'title' => esc_html__( '3rd Level Wide Menu', 'ratio' ),
				'description' => esc_html__( 'Define styles for 3rd level in Wide Menu', 'ratio' )
			)
		);

		$third_level_wide_row1 = ratio_edge_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name' => 'third_level_wide_row1'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_color_thirdlvl',
				'default_value' => '',
				'label' => esc_html__( 'Text Color', 'ratio' )
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_hovercolor_thirdlvl',
				'default_value' => '',
				'label' => esc_html__( 'Hover/Active Color', 'ratio' )
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_background_hovercolor_thirdlvl',
				'default_value' => '',
				'label' => esc_html__( 'Hover/Active Background Color', 'ratio' )
			)
		);

		$third_level_wide_row2 = ratio_edge_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name' => 'third_level_wide_row2',
				'next' => true
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_wide_google_fonts_thirdlvl',
				'default_value' => '-1',
				'label' => esc_html__( 'Font Family', 'ratio' )
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_fontsize_thirdlvl',
				'default_value' => '',
				'label' => esc_html__( 'Font Size', 'ratio' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_lineheight_thirdlvl',
				'default_value' => '',
				'label' => esc_html__( 'Line Height', 'ratio' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_wide_row3 = ratio_edge_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name' => 'third_level_wide_row3',
				'next' => true
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_fontstyle_thirdlvl',
				'default_value' => '',
				'label' => esc_html__( 'Font style', 'ratio' ),
				'options' => ratio_edge_get_font_style_array()
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_fontweight_thirdlvl',
				'default_value' => '',
				'label' => esc_html__( 'Font weight', 'ratio' ),
				'options' => ratio_edge_get_font_weight_array()
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_letterspacing_thirdlvl',
				'default_value' => '',
				'label' => esc_html__( 'Letter spacing', 'ratio' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_texttransform_thirdlvl',
				'default_value' => '',
				'label' => esc_html__( 'Text Transform', 'ratio' ),
				'options' => ratio_edge_get_text_transform_array()
			)
		);

        $panel_vertical_main_menu = ratio_edge_add_admin_panel(
            array(
                'title' => esc_html__( 'Vertical Main Menu', 'ratio' ),
                'name' => 'panel_vertical_main_menu',
                'page' => '_header_page',
                'hidden_property' => 'header_type',
                'hidden_values' => array(
					'header-standard',
					'header-full-screen',
					'header-slide-down'
				)
            )
        );

        $drop_down_group = ratio_edge_add_admin_group(
            array(
                'parent' => $panel_vertical_main_menu,
                'name' => 'vertical_drop_down_group',
                'title' => esc_html__( 'Main Dropdown Menu', 'ratio' ),
                'description' => esc_html__( 'Set a style for dropdown menu', 'ratio' )
            )
        );

        $vertical_drop_down_row1 = ratio_edge_add_admin_row(
            array(
                'parent' => $drop_down_group,
                'name' => 'edgtf_drop_down_row1',
            )
        );

        ratio_edge_add_admin_field(
            array(
                'parent' => $vertical_drop_down_row1,
                'type' => 'colorsimple',
                'name' => 'vertical_dropdown_background_color',
                'default_value' => '',
                'label' => esc_html__( 'Background Color', 'ratio' ),
            )
        );

        $group_vertical_first_level = ratio_edge_add_admin_group(array(
            'name'			=> 'group_vertical_first_level',
            'title' => esc_html__( '1st level', 'ratio' ),
            'description' => esc_html__( 'Define styles for 1st level menu', 'ratio' ),
            'parent'		=> $panel_vertical_main_menu
        ));

            $row_vertical_first_level_1 = ratio_edge_add_admin_row(array(
                'name'		=> 'row_vertical_first_level_1',
                'parent'	=> $group_vertical_first_level
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_1st_color',
                'default_value'	=> '',
                'label' => esc_html__( 'Text Color', 'ratio' ),
                'parent'		=> $row_vertical_first_level_1
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_1st_hover_color',
                'default_value'	=> '',
                'label' => esc_html__( 'Hover/Active Color', 'ratio' ),
                'parent'		=> $row_vertical_first_level_1
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_1st_fontsize',
                'default_value'	=> '',
                'label' => esc_html__( 'Font Size', 'ratio' ),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_first_level_1
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_1st_lineheight',
                'default_value'	=> '',
                'label' => esc_html__( 'Line Height', 'ratio' ),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_first_level_1
            ));

            $row_vertical_first_level_2 = ratio_edge_add_admin_row(array(
                'name'		=> 'row_vertical_first_level_2',
                'parent'	=> $group_vertical_first_level,
                'next'		=> true
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_1st_texttransform',
                'default_value'	=> '',
                'label' => esc_html__( 'Text Transform', 'ratio' ),
                'options'		=> ratio_edge_get_text_transform_array(),
                'parent'		=> $row_vertical_first_level_2
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'fontsimple',
                'name'			=> 'vertical_menu_1st_google_fonts',
                'default_value'	=> '-1',
                'label' => esc_html__( 'Font Family', 'ratio' ),
                'parent'		=> $row_vertical_first_level_2
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_1st_fontstyle',
                'default_value'	=> '',
                'label' => esc_html__( 'Font Style', 'ratio' ),
                'options'		=> ratio_edge_get_font_style_array(),
                'parent'		=> $row_vertical_first_level_2
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_1st_fontweight',
                'default_value'	=> '',
                'label' => esc_html__( 'Font Weight', 'ratio' ),
                'options'		=> ratio_edge_get_font_weight_array(),
                'parent'		=> $row_vertical_first_level_2
            ));

            $row_vertical_first_level_3 = ratio_edge_add_admin_row(array(
                'name'		=> 'row_vertical_first_level_3',
                'parent'	=> $group_vertical_first_level,
                'next'		=> true
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_1st_letter_spacing',
                'default_value'	=> '',
                'label' => esc_html__( 'Letter Spacing', 'ratio' ),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_first_level_3
            ));

        $group_vertical_second_level = ratio_edge_add_admin_group(array(
            'name'			=> 'group_vertical_second_level',
            'title' => esc_html__( '2nd level', 'ratio' ),
            'description' => esc_html__( 'Define styles for 2nd level menu', 'ratio' ),
            'parent'		=> $panel_vertical_main_menu
        ));

            $row_vertical_second_level_1 = ratio_edge_add_admin_row(array(
                'name'		=> 'row_vertical_second_level_1',
                'parent'	=> $group_vertical_second_level
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_2nd_color',
                'default_value'	=> '',
                'label' => esc_html__( 'Text Color', 'ratio' ),
                'parent'		=> $row_vertical_second_level_1
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_2nd_hover_color',
                'default_value'	=> '',
                'label' => esc_html__( 'Hover/Active Color', 'ratio' ),
                'parent'		=> $row_vertical_second_level_1
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_2nd_fontsize',
                'default_value'	=> '',
                'label' => esc_html__( 'Font Size', 'ratio' ),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_second_level_1
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_2nd_lineheight',
                'default_value'	=> '',
                'label' => esc_html__( 'Line Height', 'ratio' ),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_second_level_1
            ));

            $row_vertical_second_level_2 = ratio_edge_add_admin_row(array(
                'name'		=> 'row_vertical_second_level_2',
                'parent'	=> $group_vertical_second_level,
                'next'		=> true
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_2nd_texttransform',
                'default_value'	=> '',
                'label' => esc_html__( 'Text Transform', 'ratio' ),
                'options'		=> ratio_edge_get_text_transform_array(),
                'parent'		=> $row_vertical_second_level_2
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'fontsimple',
                'name'			=> 'vertical_menu_2nd_google_fonts',
                'default_value'	=> '-1',
                'label' => esc_html__( 'Font Family', 'ratio' ),
                'parent'		=> $row_vertical_second_level_2
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_2nd_fontstyle',
                'default_value'	=> '',
                'label' => esc_html__( 'Font Style', 'ratio' ),
                'options'		=> ratio_edge_get_font_style_array(),
                'parent'		=> $row_vertical_second_level_2
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_2nd_fontweight',
                'default_value'	=> '',
                'label' => esc_html__( 'Font Weight', 'ratio' ),
                'options'		=> ratio_edge_get_font_weight_array(),
                'parent'		=> $row_vertical_second_level_2
            ));

            $row_vertical_second_level_3 = ratio_edge_add_admin_row(array(
                'name'		=> 'row_vertical_second_level_3',
                'parent'	=> $group_vertical_second_level,
                'next'		=> true
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_2nd_letter_spacing',
                'default_value'	=> '',
                'label' => esc_html__( 'Letter Spacing', 'ratio' ),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_second_level_3
            ));

        $group_vertical_third_level = ratio_edge_add_admin_group(array(
            'name'			=> 'group_vertical_third_level',
            'title' => esc_html__( '3rd level', 'ratio' ),
            'description' => esc_html__( 'Define styles for 3rd level menu', 'ratio' ),
            'parent'		=> $panel_vertical_main_menu
        ));

            $row_vertical_third_level_1 = ratio_edge_add_admin_row(array(
                'name'		=> 'row_vertical_third_level_1',
                'parent'	=> $group_vertical_third_level
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_3rd_color',
                'default_value'	=> '',
                'label' => esc_html__( 'Text Color', 'ratio' ),
                'parent'		=> $row_vertical_third_level_1
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_3rd_hover_color',
                'default_value'	=> '',
                'label' => esc_html__( 'Hover/Active Color', 'ratio' ),
                'parent'		=> $row_vertical_third_level_1
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_3rd_fontsize',
                'default_value'	=> '',
                'label' => esc_html__( 'Font Size', 'ratio' ),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_third_level_1
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_3rd_lineheight',
                'default_value'	=> '',
                'label' => esc_html__( 'Line Height', 'ratio' ),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_third_level_1
            ));

            $row_vertical_third_level_2 = ratio_edge_add_admin_row(array(
                'name'		=> 'row_vertical_third_level_2',
                'parent'	=> $group_vertical_third_level,
                'next'		=> true
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_3rd_texttransform',
                'default_value'	=> '',
                'label' => esc_html__( 'Text Transform', 'ratio' ),
                'options'		=> ratio_edge_get_text_transform_array(),
                'parent'		=> $row_vertical_third_level_2
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'fontsimple',
                'name'			=> 'vertical_menu_3rd_google_fonts',
                'default_value'	=> '-1',
                'label' => esc_html__( 'Font Family', 'ratio' ),
                'parent'		=> $row_vertical_third_level_2
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_3rd_fontstyle',
                'default_value'	=> '',
                'label' => esc_html__( 'Font Style', 'ratio' ),
                'options'		=> ratio_edge_get_font_style_array(),
                'parent'		=> $row_vertical_third_level_2
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_3rd_fontweight',
                'default_value'	=> '',
                'label' => esc_html__( 'Font Weight', 'ratio' ),
                'options'		=> ratio_edge_get_font_weight_array(),
                'parent'		=> $row_vertical_third_level_2
            ));

            $row_vertical_third_level_3 = ratio_edge_add_admin_row(array(
                'name'		=> 'row_vertical_third_level_3',
                'parent'	=> $group_vertical_third_level,
                'next'		=> true
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_3rd_letter_spacing',
                'default_value'	=> '',
                'label' => esc_html__( 'Letter Spacing', 'ratio' ),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_third_level_3
            ));

		$panel_slidedown_menu = ratio_edge_add_admin_panel(
			array(
				'title' => esc_html__( 'Slide Down Menu', 'ratio' ),
				'name' => 'panel_slidedown_menu',
				'page' => '_header_page',
				'hidden_property' => 'header_type',
				'hidden_values' => array(
					'header-vertical',
					'header-full-screen',
					'header-standard'
				)
			)
		);


		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_slidedown_menu,
				'type' => 'selectblank',
				'name' => 'slidedown_alignment',
				'default_value' => '',
				'label' => esc_html__( 'Slide Down Menu Alignment', 'ratio' ),
				'description' => esc_html__( 'Choose alignment for slidedown menu content', 'ratio' ),
				'options' => array(
					"left" => esc_html__( "Left", 'ratio' ),
					"center" => esc_html__( "Center", 'ratio' ),
					"right" => esc_html__( "Right", 'ratio' )
				)
			)
		);

		$background_group = ratio_edge_add_admin_group(
			array(
				'parent' => $panel_slidedown_menu,
				'name' => 'background_group',
				'title' => esc_html__( 'Background', 'ratio' ),
				'description' => esc_html__( 'Select a background color and transparency for Slide Down Menu (0 = fully transparent, 1 = opaque)', 'ratio' )

			)
		);

		$background_group_row = ratio_edge_add_admin_row(
			array(
				'parent' => $background_group,
				'name' => 'background_group_row'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $background_group_row,
				'type' => 'colorsimple',
				'name' => 'slidedown_menu_background_color',
				'default_value' => '',
				'label' => esc_html__( 'Background Color', 'ratio' )
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $background_group_row,
				'type' => 'textsimple',
				'name' => 'slidedown_menu_background_transparency',
				'default_value' => '',
				'label' => esc_html__( 'Transparency (values:0-1)', 'ratio' )
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_slidedown_menu,
				'type' => 'image',
				'name' => 'slidedown_menu_background_image',
				'default_value' => '',
				'label' => esc_html__( 'Background Image', 'ratio' ),
				'description' => esc_html__( 'Choose a background image for Slide Down Menu background', 'ratio' )
			)
		);

//1st level style group
		$first_level_style_group = ratio_edge_add_admin_group(
			array(
				'parent' => $panel_slidedown_menu,
				'name' => 'first_level_style_group',
				'title' => esc_html__( '1st Level Style', 'ratio' ),
				'description' => esc_html__( 'Define styles for 1st level in Slide Down Menu', 'ratio' )
			)
		);

		$first_level_style_row1 = ratio_edge_add_admin_row(
			array(
				'parent' => $first_level_style_group,
				'name' => 'first_level_style_row1'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'slidedown_menu_color',
				'default_value' => '',
				'label' => esc_html__( 'Text Color', 'ratio' ),
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'slidedown_menu_hover_color',
				'default_value' => '',
				'label' => esc_html__( 'Hover Text Color', 'ratio' ),
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'slidedown_menu_active_color',
				'default_value' => '',
				'label' => esc_html__( 'Active Text Color', 'ratio' ),
			)
		);

		$first_level_style_row2 = ratio_edge_add_admin_row(
			array(
				'parent' => $first_level_style_group,
				'name' => 'first_level_style_row2'
			)
		);


		$first_level_style_row3 = ratio_edge_add_admin_row(
			array(
				'parent' => $first_level_style_group,
				'name' => 'first_level_style_row3'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row3,
				'type' => 'fontsimple',
				'name' => 'slidedown_menu_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__( 'Font Family', 'ratio' ),
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row3,
				'type' => 'textsimple',
				'name' => 'slidedown_menu_fontsize',
				'default_value' => '',
				'label' => esc_html__( 'Font Size', 'ratio' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row3,
				'type' => 'textsimple',
				'name' => 'slidedown_menu_lineheight',
				'default_value' => '',
				'label' => esc_html__( 'Line Height', 'ratio' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$first_level_style_row4 = ratio_edge_add_admin_row(
			array(
				'parent' => $first_level_style_group,
				'name' => 'first_level_style_row4'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row4,
				'type' => 'selectblanksimple',
				'name' => 'slidedown_menu_fontstyle',
				'default_value' => '',
				'label' => esc_html__( 'Font Style', 'ratio' ),
				'options' => ratio_edge_get_font_style_array()
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row4,
				'type' => 'selectblanksimple',
				'name' => 'slidedown_menu_fontweight',
				'default_value' => '',
				'label' => esc_html__( 'Font Weight', 'ratio' ),
				'options' => ratio_edge_get_font_weight_array()
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row4,
				'type' => 'textsimple',
				'name' => 'slidedown_menu_letterspacing',
				'default_value' => '',
				'label' => esc_html__( 'Letter Spacing', 'ratio' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row4,
				'type' => 'selectblanksimple',
				'name' => 'slidedown_menu_texttransform',
				'default_value' => '',
				'label' => esc_html__( 'Text Transform', 'ratio' ),
				'options' => ratio_edge_get_text_transform_array()
			)
		);

//2nd level style group
		$second_level_style_group = ratio_edge_add_admin_group(
			array(
				'parent' => $panel_slidedown_menu,
				'name' => 'second_level_style_group',
				'title' => esc_html__( '2nd Level Style', 'ratio' ),
				'description' => esc_html__( 'Define styles for 2nd level in Slide Down Menu', 'ratio' )
			)
		);

		$second_level_style_row1 = ratio_edge_add_admin_row(
			array(
				'parent' => $second_level_style_group,
				'name' => 'second_level_style_row1'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'slidedown_menu_color_2nd',
				'default_value' => '',
				'label' => esc_html__( 'Text Color', 'ratio' ),
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'slidedown_menu_hover_color_2nd',
				'default_value' => '',
				'label' => esc_html__( 'Hover Text Color', 'ratio' ),
			)
		);

		$second_level_style_row2 = ratio_edge_add_admin_row(
			array(
				'parent' => $second_level_style_group,
				'name' => 'second_level_style_row2'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row2,
				'type' => 'fontsimple',
				'name' => 'slidedown_menu_google_fonts_2nd',
				'default_value' => '-1',
				'label' => esc_html__( 'Font Family', 'ratio' ),
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row2,
				'type' => 'textsimple',
				'name' => 'slidedown_menu_fontsize_2nd',
				'default_value' => '',
				'label' => esc_html__( 'Font Size', 'ratio' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row2,
				'type' => 'textsimple',
				'name' => 'slidedown_menu_lineheight_2nd',
				'default_value' => '',
				'label' => esc_html__( 'Line Height', 'ratio' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_style_row3 = ratio_edge_add_admin_row(
			array(
				'parent' => $second_level_style_group,
				'name' => 'second_level_style_row3'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'slidedown_menu_fontstyle_2nd',
				'default_value' => '',
				'label' => esc_html__( 'Font Style', 'ratio' ),
				'options' => ratio_edge_get_font_style_array()
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'slidedown_menu_fontweight_2nd',
				'default_value' => '',
				'label' => esc_html__( 'Font Weight', 'ratio' ),
				'options' => ratio_edge_get_font_weight_array()
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row3,
				'type' => 'textsimple',
				'name' => 'slidedown_menu_letterspacing_2nd',
				'default_value' => '',
				'label' => esc_html__( 'Letter Spacing', 'ratio' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'slidedown_menu_texttransform_2nd',
				'default_value' => '',
				'label' => esc_html__( 'Text Transform', 'ratio' ),
				'options' => ratio_edge_get_text_transform_array()
			)
		);

		$third_level_style_group = ratio_edge_add_admin_group(
			array(
				'parent' => $panel_slidedown_menu,
				'name' => 'third_level_style_group',
				'title' => esc_html__( '3rd Level Style', 'ratio' ),
				'description' => esc_html__( 'Define styles for 3rd level in Slide Down Menu', 'ratio' )
			)
		);

		$third_level_style_row1 = ratio_edge_add_admin_row(
			array(
				'parent' => $third_level_style_group,
				'name' => 'third_level_style_row1'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'slidedown_menu_color_3rd',
				'default_value' => '',
				'label' => esc_html__( 'Text Color', 'ratio' ),
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'slidedown_menu_hover_color_3rd',
				'default_value' => '',
				'label' => esc_html__( 'Hover Text Color', 'ratio' ),
			)
		);

		$third_level_style_row2 = ratio_edge_add_admin_row(
			array(
				'parent' => $third_level_style_group,
				'name' => 'second_level_style_row2'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row2,
				'type' => 'fontsimple',
				'name' => 'slidedown_menu_google_fonts_3rd',
				'default_value' => '-1',
				'label' => esc_html__( 'Font Family', 'ratio' ),
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row2,
				'type' => 'textsimple',
				'name' => 'slidedown_menu_fontsize_3rd',
				'default_value' => '',
				'label' => esc_html__( 'Font Size', 'ratio' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row2,
				'type' => 'textsimple',
				'name' => 'slidedown_menu_lineheight_3rd',
				'default_value' => '',
				'label' => esc_html__( 'Line Height', 'ratio' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_style_row3 = ratio_edge_add_admin_row(
			array(
				'parent' => $third_level_style_group,
				'name' => 'second_level_style_row3'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'slidedown_menu_fontstyle_3rd',
				'default_value' => '',
				'label' => esc_html__( 'Font Style', 'ratio' ),
				'options' => ratio_edge_get_font_style_array()
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'slidedown_menu_fontweight_3rd',
				'default_value' => '',
				'label' => esc_html__( 'Font Weight', 'ratio' ),
				'options' => ratio_edge_get_font_weight_array()
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row3,
				'type' => 'textsimple',
				'name' => 'slidedown_menu_letterspacing_3rd',
				'default_value' => '',
				'label' => esc_html__( 'Letter Spacing', 'ratio' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'slidedown_menu_texttransform_3rd',
				'default_value' => '',
				'label' => esc_html__( 'Text Transform', 'ratio' ),
				'options' => ratio_edge_get_text_transform_array()
			)
		);



		$icon_colors_group = ratio_edge_add_admin_group(
			array(
				'parent' => $panel_slidedown_menu,
				'name' => 'slidedown_menu_icon_colors_group',
				'title' => esc_html__( 'Slide Down Menu Icon Style', 'ratio' ),
				'description' => esc_html__( 'Define styles for Slide Down Menu Icon', 'ratio' )
			)
		);

		$icon_colors_row1 = ratio_edge_add_admin_row(
			array(
				'parent' => $icon_colors_group,
				'name' => 'icon_colors_row1'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $icon_colors_row1,
				'type' => 'colorsimple',
				'name' => 'slidedown_menu_icon_color',
				'label' => esc_html__( 'Color', 'ratio' ),
			)
		);
		ratio_edge_add_admin_field(
			array(
				'parent' => $icon_colors_row1,
				'type' => 'colorsimple',
				'name' => 'slidedown_menu_icon_hover_color',
				'label' => esc_html__( 'Hover Color', 'ratio' ),
			)
		);

	}

	add_action( 'ratio_edge_options_map', 'ratio_edge_header_options_map', 4);

}