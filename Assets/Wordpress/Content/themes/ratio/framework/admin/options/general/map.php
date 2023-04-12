<?php

if ( ! function_exists('ratio_edge_general_options_map') ) {
    /**
     * General options page
     */
    function ratio_edge_general_options_map() {

        ratio_edge_add_admin_page(
            array(
                'slug'  => '',
                'title' => esc_html__( 'General', 'ratio' ),
                'icon'  => 'fa fa-institution'
            )
        );

        $panel_design_style = ratio_edge_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_design_style',
                'title' => esc_html__( 'Design Style', 'ratio' )
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'google_fonts',
                'type'          => 'font',
                'default_value' => '-1',
                'label' => esc_html__( 'Font Family', 'ratio' ),
                'description' => esc_html__( 'Choose a default Google font for your site', 'ratio' ),
                'parent' => $panel_design_style
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'additional_google_fonts',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__( 'Additional Google Fonts', 'ratio' ),
                'description'   => '',
                'parent'        => $panel_design_style,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#edgtf_additional_google_fonts_container"
                )
            )
        );

        $additional_google_fonts_container = ratio_edge_add_admin_container(
            array(
                'parent'            => $panel_design_style,
                'name'              => 'additional_google_fonts_container',
                'hidden_property'   => 'additional_google_fonts',
                'hidden_value'      => 'no'
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'additional_google_font1',
                'type'          => 'font',
                'default_value' => '-1',
                'label' => esc_html__( 'Font Family', 'ratio' ),
                'description' => esc_html__( 'Choose additional Google font for your site', 'ratio' ),
                'parent'        => $additional_google_fonts_container
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'additional_google_font2',
                'type'          => 'font',
                'default_value' => '-1',
                'label' => esc_html__( 'Font Family', 'ratio' ),
                'description' => esc_html__( 'Choose additional Google font for your site', 'ratio' ),
                'parent'        => $additional_google_fonts_container
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'additional_google_font3',
                'type'          => 'font',
                'default_value' => '-1',
                'label' => esc_html__( 'Font Family', 'ratio' ),
                'description' => esc_html__( 'Choose additional Google font for your site', 'ratio' ),
                'parent'        => $additional_google_fonts_container
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'additional_google_font4',
                'type'          => 'font',
                'default_value' => '-1',
                'label' => esc_html__( 'Font Family', 'ratio' ),
                'description' => esc_html__( 'Choose additional Google font for your site', 'ratio' ),
                'parent'        => $additional_google_fonts_container
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'additional_google_font5',
                'type'          => 'font',
                'default_value' => '-1',
                'label' => esc_html__( 'Font Family', 'ratio' ),
                'description' => esc_html__( 'Choose additional Google font for your site', 'ratio' ),
                'parent'        => $additional_google_fonts_container
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'first_color',
                'type'          => 'color',
                'label' => esc_html__( 'First Main Color', 'ratio' ),
                'description' => esc_html__( 'Choose the most dominant theme color. Default color is #d6ab60', 'ratio' ),
                'parent'        => $panel_design_style
            )
        );

		ratio_edge_add_admin_field(
			array(
				'name'          => 'gradient_first_color',
				'type'          => 'color',
				'label' => esc_html__( 'Gradient First Color', 'ratio' ),
				'description' => esc_html__( 'Choose first color for gradient. Default color is #c0954b', 'ratio' ),
				'parent'        => $panel_design_style
			)
		);

		ratio_edge_add_admin_field(
			array(
				'name'          => 'gradient_second_color',
				'type'          => 'color',
				'label' => esc_html__( 'Gradient Second Color', 'ratio' ),
				'description' => esc_html__( 'Choose second color for gradient. Default color is #e7bd74', 'ratio' ),
				'parent'        => $panel_design_style
			)
		);

        ratio_edge_add_admin_field(
            array(
                'name'          => 'page_background_color',
                'type'          => 'color',
                'label' => esc_html__( 'Page Background Color', 'ratio' ),
                'description' => esc_html__( 'Choose the background color for page content. Default color is #ffffff', 'ratio' ),
                'parent'        => $panel_design_style
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'selection_color',
                'type'          => 'color',
                'label' => esc_html__( 'Text Selection Color', 'ratio' ),
                'description' => esc_html__( 'Choose the color users see when selecting text', 'ratio' ),
                'parent'        => $panel_design_style
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'boxed',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__( 'Boxed Layout', 'ratio' ),
                'description'   => '',
                'parent'        => $panel_design_style,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#edgtf_boxed_container"
                )
            )
        );

        $boxed_container = ratio_edge_add_admin_container(
            array(
                'parent'            => $panel_design_style,
                'name'              => 'boxed_container',
                'hidden_property'   => 'boxed',
                'hidden_value'      => 'no'
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'page_background_color_in_box',
                'type'          => 'color',
                'label' => esc_html__( 'Page Background Color', 'ratio' ),
                'description' => esc_html__( 'Choose the page background color outside box.', 'ratio' ),
                'parent'        => $boxed_container
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'boxed_background_image',
                'type'          => 'image',
                'label' => esc_html__( 'Background Image', 'ratio' ),
                'description' => esc_html__( 'Choose an image to be displayed in background', 'ratio' ),
                'parent'        => $boxed_container
            )
        );

		ratio_edge_add_admin_field(
			array(
				'name'          => 'boxed_background_image_repeating',
				'type'          => 'select',
				'default_value' => 'no',
				'label' => esc_html__( 'Use Background Image as Pattern', 'ratio' ),
				'description' => esc_html__( 'Set this option to yes to use the background image as repeating pattern', 'ratio' ),
				'parent'        => $boxed_container,
				'options'       => array(
					'no' => esc_html__( 'No', 'ratio' ),
					'yes' => esc_html__( 'Yes', 'ratio' )
				)
			)
		);

        ratio_edge_add_admin_field(
            array(
                'name'          => 'boxed_background_image_attachment',
                'type'          => 'select',
                'default_value' => 'fixed',
                'label' => esc_html__( 'Background Image Behaviour', 'ratio' ),
                'description' => esc_html__( 'Choose background image behaviour', 'ratio' ),
                'parent'        => $boxed_container,
                'options'       => array(
                    'fixed' => esc_html__( 'Fixed', 'ratio' ),
                    'scroll' => esc_html__( 'Scroll', 'ratio' )
                )
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'initial_content_width',
                'type'          => 'select',
                'default_value' => '',
                'label' => esc_html__( 'Initial Width of Content', 'ratio' ),
                'description' => esc_html__( 'Choose the initial width of content which is in grid Applies to pages set to Default Template and rows set to In Grid', 'ratio' ),
                'parent'        => $panel_design_style,
                'options'       => array(
                    "" => esc_html__( "1300px - default", 'ratio' ),
                    "grid-1300" => esc_html__( "1300px", 'ratio' ),
                    "grid-1200" => esc_html__( "1200px", 'ratio' ),
                    "grid-1000" => esc_html__( "1000px", 'ratio' ),
                    "grid-800" => esc_html__( "800px", 'ratio' )
                )
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'preload_pattern_image',
                'type'          => 'image',
                'label' => esc_html__( 'Preload Pattern Image', 'ratio' ),
                'description' => esc_html__( 'Choose preload pattern image to be displayed until images are loaded ', 'ratio' ),
                'parent'        => $panel_design_style
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name' => 'element_appear_amount',
                'type' => 'text',
                'label' => esc_html__( 'Element Appearance', 'ratio' ),
                'description' => esc_html__( 'For animated elements, set distance (related to browser bottom) to start the animation', 'ratio' ),
                'parent' => $panel_design_style,
                'args' => array(
                    'col_width' => 2,
                    'suffix' => 'px'
                )
            )
        );

        $panel_settings = ratio_edge_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_settings',
                'title' => esc_html__( 'Settings', 'ratio' )
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'smooth_scroll',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__( 'Smooth Scroll', 'ratio' ),
                'description' => esc_html__( 'Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'ratio' ),
                'parent'        => $panel_settings
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'smooth_page_transitions',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__( 'Smooth Page Transitions', 'ratio' ),
                'description' => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links.', 'ratio' ),
                'parent'        => $panel_settings,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#edgtf_page_transitions_container"
                )
            )
        );

        $page_transitions_container = ratio_edge_add_admin_container(
            array(
                'parent'            => $panel_settings,
                'name'              => 'page_transitions_container',
                'hidden_property'   => 'smooth_page_transitions',
                'hidden_value'      => 'no'
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'smooth_pt_bgnd_color',
                'type'          => 'color',
                'label' => esc_html__( 'Page Loader Background Color', 'ratio' ),
                'parent'        => $page_transitions_container
            )
        );

        $group_pt_spinner_animation = ratio_edge_add_admin_group(array(
            'name'          => 'group_pt_spinner_animation',
            'title' => esc_html__( 'Loader Style', 'ratio' ),
            'description' => esc_html__( 'Define styles for loader spinner animation', 'ratio' ),
            'parent'        => $page_transitions_container
        ));

        $row_pt_spinner_animation = ratio_edge_add_admin_row(array(
            'name'      => 'row_pt_spinner_animation',
            'parent'    => $group_pt_spinner_animation
        ));

        ratio_edge_add_admin_field(array(
            'type'          => 'selectsimple',
            'name'          => 'smooth_pt_spinner_type',
            'default_value' => 'outline',
            'label' => esc_html__( 'Spinner Type', 'ratio' ),
            'parent'        => $row_pt_spinner_animation,
            'options'       => array(
                "outline" => esc_html__( "Outline", 'ratio' ),
                "pulse" => esc_html__( "Pulse", 'ratio' ),
                "double_pulse" => esc_html__( "Double Pulse", 'ratio' ),
                "cube" => esc_html__( "Cube", 'ratio' ),
                "rotating_cubes" => esc_html__( "Rotating Cubes", 'ratio' ),
                "stripes" => esc_html__( "Stripes", 'ratio' ),
                "wave" => esc_html__( "Wave", 'ratio' ),
                "two_rotating_circles" => esc_html__( "2 Rotating Circles", 'ratio' ),
                "five_rotating_circles" => esc_html__( "5 Rotating Circles", 'ratio' ),
                "atom" => esc_html__( "Atom", 'ratio' ),
                "clock" => esc_html__( "Clock", 'ratio' ),
                "mitosis" => esc_html__( "Mitosis", 'ratio' ),
                "lines" => esc_html__( "Lines", 'ratio' ),
                "fussion" => esc_html__( "Fussion", 'ratio' ),
                "wave_circles" => esc_html__( "Wave Circles", 'ratio' ),
                "pulse_circles" => esc_html__( "Pulse Circles", 'ratio' )
            )
        ));

        ratio_edge_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'smooth_pt_spinner_color',
            'default_value' => '',
            'label' => esc_html__( 'Spinner Color', 'ratio' ),
            'parent'        => $row_pt_spinner_animation
        ));

        ratio_edge_add_admin_field(
            array(
                'name'          => 'show_back_button',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label' => esc_html__( 'Show Back To Top Button', 'ratio' ),
                'description' => esc_html__( 'Enabling this option will display a Back to Top button on every page', 'ratio' ),
                'parent'        => $panel_settings
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'responsiveness',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label' => esc_html__( 'Responsiveness', 'ratio' ),
                'description' => esc_html__( 'Enabling this option will make all pages responsive', 'ratio' ),
                'parent'        => $panel_settings
            )
        );

        $panel_custom_code = ratio_edge_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_custom_code',
                'title' => esc_html__( 'Custom Code', 'ratio' )
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'custom_css',
                'type'          => 'textarea',
                'label' => esc_html__( 'Custom CSS', 'ratio' ),
                'description' => esc_html__( 'Enter your custom CSS here', 'ratio' ),
                'parent'        => $panel_custom_code
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'custom_js',
                'type'          => 'textarea',
                'label' => esc_html__( 'Custom JS', 'ratio' ),
                'description' => esc_html__( 'Enter your custom Javascript here', 'ratio' ),
                'parent'        => $panel_custom_code
            )
        );

        $panel_google_maps_api_key = ratio_edge_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'google_maps_api_key',
                'title' => esc_html__( 'Google Maps API key', 'ratio' )
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'google_maps_api_key',
                'type'          => 'text',
                'label' => esc_html__( 'Google Maps API key', 'ratio' ),
                'description' => esc_html__( 'Enter your Google Maps API key here', 'ratio' ),
                'parent'        => $panel_google_maps_api_key
            )
        );

    }

    add_action( 'ratio_edge_options_map', 'ratio_edge_general_options_map', 1);

}