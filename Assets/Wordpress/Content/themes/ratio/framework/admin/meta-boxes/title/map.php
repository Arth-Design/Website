<?php

$title_meta_box = ratio_edge_create_meta_box(
    array(
        'scope' => array('page', 'portfolio-item', 'post'),
        'title' => esc_html__( 'Title', 'ratio' ),
        'name' => 'title_meta'
    )
);

    ratio_edge_create_meta_box_field(
        array(
            'name' => 'edgtf_show_title_area_meta',
            'type' => 'select',
            'default_value' => '',
            'label' => esc_html__( 'Show Title Area', 'ratio' ),
            'description' => esc_html__( 'Disabling this option will turn off page title area', 'ratio' ),
            'parent' => $title_meta_box,
            'options' => array(
                '' => '',
                'no' => esc_html__( 'No', 'ratio' ),
                'yes' => esc_html__( 'Yes', 'ratio' )
            ),
            'args' => array(
                "dependence" => true,
                "hide" => array(
                    "" => "",
                    "no" => "#edgtf_edgtf_show_title_area_meta_container",
                    "yes" => ""
                ),
                "show" => array(
                    "" => "#edgtf_edgtf_show_title_area_meta_container",
                    "no" => "",
                    "yes" => "#edgtf_edgtf_show_title_area_meta_container"
                )
            )
        )
    );

    $show_title_area_meta_container = ratio_edge_add_admin_container(
        array(
            'parent' => $title_meta_box,
            'name' => 'edgtf_show_title_area_meta_container',
            'hidden_property' => 'edgtf_show_title_area_meta',
            'hidden_value' => 'no'
        )
    );

	ratio_edge_create_meta_box_field(
		array(
			'name' => 'edgtf_title_in_grid_meta',
			'type' => 'select',
			'default_value' => '',
			'label' => esc_html__( 'Title Area in Grid', 'ratio' ),
			'description' => esc_html__( 'Set titl content to be in grid', 'ratio' ),
			'parent' => $show_title_area_meta_container,
			'options' => array(
				'' => '',
				'no' => esc_html__( 'No', 'ratio' ),
				'yes' => esc_html__( 'Yes', 'ratio' )
			)
		)
	);

        ratio_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_type_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__( 'Title Area Type', 'ratio' ),
                'description' => esc_html__( 'Choose title type', 'ratio' ),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'standard' => esc_html__( 'Standard', 'ratio' ),
                    'breadcrumb' => esc_html__( 'Breadcrumb', 'ratio' )
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "standard" => "",
                        "standard" => "",
                        "breadcrumb" => "#edgtf_edgtf_title_area_type_meta_container"
                    ),
                    "show" => array(
                        "" => "#edgtf_edgtf_title_area_type_meta_container",
                        "standard" => "#edgtf_edgtf_title_area_type_meta_container",
                        "breadcrumb" => ""
                    )
                )
            )
        );

        $title_area_type_meta_container = ratio_edge_add_admin_container(
            array(
                'parent' => $show_title_area_meta_container,
                'name' => 'edgtf_title_area_type_meta_container',
                'hidden_property' => 'edgtf_title_area_type_meta',
                'hidden_value' => '',
                'hidden_values' => array('breadcrumb'),
            )
        );

            ratio_edge_create_meta_box_field(
                array(
                    'name' => 'edgtf_title_area_enable_breadcrumbs_meta',
                    'type' => 'select',
                    'default_value' => '',
                    'label' => esc_html__( 'Enable Breadcrumbs', 'ratio' ),
                    'description' => esc_html__( 'This option will display Breadcrumbs in Title Area', 'ratio' ),
                    'parent' => $title_area_type_meta_container,
                    'options' => array(
                        '' => '',
                        'no' => esc_html__( 'No', 'ratio' ),
                        'yes' => esc_html__( 'Yes', 'ratio' )
                    ),
                )
            );

		ratio_edge_create_meta_box_field(
			array(
				'name' => 'edgtf_title_area_enable_separator_meta',
				'type' => 'select',
				'default_value' => '',
				'label' => esc_html__( 'Enable Separator', 'ratio' ),
				'description' => esc_html__( 'This option will display Separator in Title Area', 'ratio' ),
				'parent' => $show_title_area_meta_container,
				'options' => array(
					'' => '',
					'no' => esc_html__( 'No', 'ratio' ),
					'yes' => esc_html__( 'Yes', 'ratio' )
				),
				'args' => array(
					"dependence" => true,
					"hide" => array(
						"" => "#edgtf_edgtf_title_area_separator_container_meta",
						"no" => "#edgtf_edgtf_title_area_separator_container_meta",
						"yes" => ""
					),
					"show" => array(
						"" => "",
						"no" => "",
						"yes" => "#edgtf_edgtf_title_area_separator_container_meta"

					)
				)
			)
		);

        ratio_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_animation_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__( 'Animations', 'ratio' ),
                'description' => esc_html__( 'Choose an animation for Title Area', 'ratio' ),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'no' => esc_html__( 'No Animation', 'ratio' ),
                    'right-left' => esc_html__( 'Text right to left', 'ratio' ),
                    'left-right' => esc_html__( 'Text left to right', 'ratio' )
                )
            )
        );

        ratio_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_vertial_alignment_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__( 'Vertical Alignment', 'ratio' ),
                'description' => esc_html__( 'Specify title vertical alignment', 'ratio' ),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'header_bottom' => esc_html__( 'From Bottom of Header', 'ratio' ),
                    'window_top' => esc_html__( 'From Window Top', 'ratio' )
                )
            )
        );

        ratio_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_content_alignment_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__( 'Horizontal Alignment', 'ratio' ),
                'description' => esc_html__( 'Specify title horizontal alignment', 'ratio' ),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'left' => esc_html__( 'Left', 'ratio' ),
                    'center' => esc_html__( 'Center', 'ratio' ),
                    'right' => esc_html__( 'Right', 'ratio' )
                )
            )
        );

		ratio_edge_create_meta_box_field(
			array(
				'name'			=> 'edgtf_title_area_text_size_meta',
				'type'			=> 'select',
				'default_value'	=> '',
				'label' => esc_html__( 'Text Size', 'ratio' ),
				'description' => esc_html__( 'Choose a default Title size', 'ratio' ),
				'parent'		=> $show_title_area_meta_container,
				'options'		=> array(
					'' => '',
					'small' => esc_html__( 'Small', 'ratio' ),
					'medium' => esc_html__( 'Medium', 'ratio' ),
					'large' => esc_html__( 'Large', 'ratio' )


				)
			)
		);

        ratio_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_text_color_meta',
                'type' => 'color',
                'label' => esc_html__( 'Title Color', 'ratio' ),
                'description' => esc_html__( 'Choose a color for title text', 'ratio' ),
                'parent' => $show_title_area_meta_container
            )
        );

        ratio_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_breadcrumb_color_meta',
                'type' => 'color',
                'label' => esc_html__( 'Breadcrumb Color', 'ratio' ),
                'description' => esc_html__( 'Choose a color for breadcrumb text', 'ratio' ),
                'parent' => $show_title_area_meta_container
            )
        );

        ratio_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_background_color_meta',
                'type' => 'color',
                'label' => esc_html__( 'Background Color', 'ratio' ),
                'description' => esc_html__( 'Choose a background color for Title Area', 'ratio' ),
                'parent' => $show_title_area_meta_container
            )
        );

        ratio_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_hide_background_image_meta',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__( 'Hide Background Image', 'ratio' ),
                'description' => esc_html__( 'Enable this option to hide background image in Title Area', 'ratio' ),
                'parent' => $show_title_area_meta_container,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "#edgtf_edgtf_hide_background_image_meta_container",
                    "dependence_show_on_yes" => ""
                )
            )
        );

        $hide_background_image_meta_container = ratio_edge_add_admin_container(
            array(
                'parent' => $show_title_area_meta_container,
                'name' => 'edgtf_hide_background_image_meta_container',
                'hidden_property' => 'edgtf_hide_background_image_meta',
                'hidden_value' => 'yes'
            )
        );

        ratio_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_background_image_meta',
                'type' => 'image',
                'label' => esc_html__( 'Background Image', 'ratio' ),
                'description' => esc_html__( 'Choose an Image for Title Area', 'ratio' ),
                'parent' => $hide_background_image_meta_container
            )
        );

        ratio_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_background_image_responsive_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__( 'Background Responsive Image', 'ratio' ),
                'description' => esc_html__( 'Enabling this option will make Title background image responsive', 'ratio' ),
                'parent' => $hide_background_image_meta_container,
                'options' => array(
                    '' => '',
                    'no' => esc_html__( 'No', 'ratio' ),
                    'yes' => esc_html__( 'Yes', 'ratio' )
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "" => "",
                        "no" => "",
                        "yes" => "#edgtf_edgtf_title_area_background_image_responsive_meta_container, #edgtf_edgtf_title_area_height_meta"
                    ),
                    "show" => array(
                        "" => "#edgtf_edgtf_title_area_background_image_responsive_meta_container, #edgtf_edgtf_title_area_height_meta",
                        "no" => "#edgtf_edgtf_title_area_background_image_responsive_meta_container, #edgtf_edgtf_title_area_height_meta",
                        "yes" => ""
                    )
                )
            )
        );

        $title_area_background_image_responsive_meta_container = ratio_edge_add_admin_container(
            array(
                'parent' => $hide_background_image_meta_container,
                'name' => 'edgtf_title_area_background_image_responsive_meta_container',
                'hidden_property' => 'edgtf_title_area_background_image_responsive_meta',
                'hidden_value' => 'yes'
            )
        );

            ratio_edge_create_meta_box_field(
                array(
                    'name' => 'edgtf_title_area_background_image_parallax_meta',
                    'type' => 'select',
                    'default_value' => '',
                    'label' => esc_html__( 'Background Image in Parallax', 'ratio' ),
                    'description' => esc_html__( 'Enabling this option will make Title background image parallax', 'ratio' ),
                    'parent' => $title_area_background_image_responsive_meta_container,
                    'options' => array(
                        '' => '',
                        'no' => esc_html__( 'No', 'ratio' ),
                        'yes' => esc_html__( 'Yes', 'ratio' ),
                        'yes_zoom' => esc_html__( 'Yes, with zoom out', 'ratio' )
                    )
                )
            );

        ratio_edge_create_meta_box_field(array(
            'name' => 'edgtf_title_area_height_meta',
            'type' => 'text',
            'label' => esc_html__( 'Height', 'ratio' ),
            'description' => esc_html__( 'Set a height for Title Area', 'ratio' ),
            'parent' => $show_title_area_meta_container,
            'args' => array(
                'col_width' => 2,
                'suffix' => 'px'
            )
        ));

		ratio_edge_create_meta_box_field(
			array(
				'name' => 'edgtf_title_area_border_bottom_meta',
				'type' => 'select',
				'default_value' => '',
				'label' => esc_html__( 'Enable Border Bottom', 'ratio' ),
				'description' => esc_html__( 'This option will display Border Bottom in Title Area', 'ratio' ),
				'parent' => $show_title_area_meta_container,
				'options' => array(
					'' => '',
					'no' => esc_html__( 'No', 'ratio' ),
					'yes' => esc_html__( 'Yes', 'ratio' )
				)
			)
		);

        ratio_edge_create_meta_box_field(array(
            'name' => 'edgtf_title_area_subtitle_meta',
            'type' => 'text',
            'default_value' => '',
            'label' => esc_html__( 'Subtitle Text', 'ratio' ),
            'description' => esc_html__( 'Enter your subtitle text', 'ratio' ),
            'parent' => $show_title_area_meta_container,
            'args' => array(
                'col_width' => 6
            )
        ));

        ratio_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_subtitle_color_meta',
                'type' => 'color',
                'label' => esc_html__( 'Subtitle Color', 'ratio' ),
                'description' => esc_html__( 'Choose a color for subtitle text', 'ratio' ),
                'parent' => $show_title_area_meta_container
            )
        );