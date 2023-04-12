<?php

if ( ! function_exists('ratio_edge_title_options_map') ) {

	function ratio_edge_title_options_map() {

		ratio_edge_add_admin_page(
			array(
				'slug' => '_title_page',
				'title' => esc_html__( 'Title', 'ratio' ),
				'icon' => 'fa fa-list-alt'
			)
		);

		$panel_title = ratio_edge_add_admin_panel(
			array(
				'page' => '_title_page',
				'name' => 'panel_title',
				'title' => esc_html__( 'Title Settings', 'ratio' )
			)
		);

		ratio_edge_add_admin_field(
			array(
				'name' => 'show_title_area',
				'type' => 'yesno',
				'default_value' => 'yes',
				'label' => esc_html__( 'Show Title Area', 'ratio' ),
				'description' => esc_html__( 'This option will enable/disable Title Area', 'ratio' ),
				'parent' => $panel_title,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_show_title_area_container"
				)
			)
		);

		$show_title_area_container = ratio_edge_add_admin_container(
			array(
				'parent' => $panel_title,
				'name' => 'show_title_area_container',
				'hidden_property' => 'show_title_area',
				'hidden_value' => 'no'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'name' => 'title_front_page',
				'type' => 'text',
				'default_value' => '',
				'label' => esc_html__( 'Title on Default Front Page', 'ratio' ),
				'description' => esc_html__( 'Define a title for your front page if your front page settings (in Settings > Reading) are set to display your latest posts instead of a static page.', 'ratio' ),
				'parent' => $show_title_area_container,
			)
		);

		ratio_edge_add_admin_field(
			array(
				'name' => 'title_in_grid',
				'type' => 'yesno',
				'default_value' => 'yes',
				'label' => esc_html__( 'Title Area in Grid', 'ratio' ),
				'description' => esc_html__( 'Set titl content to be in grid', 'ratio' ),
				'parent' => $show_title_area_container,
			)
		);



		ratio_edge_add_admin_field(
			array(
				'name' => 'title_area_type',
				'type' => 'select',
				'default_value' => 'standard',
				'label' => esc_html__( 'Title Area Type', 'ratio' ),
				'description' => esc_html__( 'Choose title type', 'ratio' ),
				'parent' => $show_title_area_container,
				'options' => array(
					'standard' => esc_html__( 'Standard', 'ratio' ),
					'breadcrumb' => esc_html__( 'Breadcrumb', 'ratio' )
				),
				'args' => array(
					"dependence" => true,
					"hide" => array(
						"standard" => "",
						"breadcrumb" => "#edgtf_title_area_type_container"
					),
					"show" => array(
						"standard" => "#edgtf_title_area_type_container",
						"breadcrumb" => ""
					)
				)
			)
		);

		$title_area_type_container = ratio_edge_add_admin_container(
			array(
				'parent' => $show_title_area_container,
				'name' => 'title_area_type_container',
				'hidden_property' => 'title_area_type',
				'hidden_value' => '',
				'hidden_values' => array('breadcrumb'),
			)
		);

		ratio_edge_add_admin_field(
			array(
				'name' => 'title_area_enable_breadcrumbs',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__( 'Enable Breadcrumbs', 'ratio' ),
				'description' => esc_html__( 'This option will display Breadcrumbs in Title Area', 'ratio' ),
				'parent' => $title_area_type_container,
			)
		);

		ratio_edge_add_admin_field(
			array(
				'name' => 'title_area_enable_separator',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__( 'Enable Separator', 'ratio' ),
				'description' => esc_html__( 'This option will display Separator in Title Area', 'ratio' ),
				'parent' => $title_area_type_container,
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_title_area_separator_container'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'name' => 'title_area_animation',
				'type' => 'select',
				'default_value' => 'no',
				'label' => esc_html__( 'Animations', 'ratio' ),
				'description' => esc_html__( 'Choose an animation for Title Area', 'ratio' ),
				'parent' => $show_title_area_container,
				'options' => array(
					'no' => esc_html__( 'No Animation', 'ratio' ),
					'right-left' => esc_html__( 'Text right to left', 'ratio' ),
					'left-right' => esc_html__( 'Text left to right', 'ratio' )
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'name' => 'title_area_vertial_alignment',
				'type' => 'select',
				'default_value' => 'header_bottom',
				'label' => esc_html__( 'Vertical Alignment', 'ratio' ),
				'description' => esc_html__( 'Specify title vertical alignment', 'ratio' ),
				'parent' => $show_title_area_container,
				'options' => array(
					'header_bottom' => esc_html__( 'From Bottom of Header', 'ratio' ),
					'window_top' => esc_html__( 'From Window Top', 'ratio' )
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'name' => 'title_area_content_alignment',
				'type' => 'select',
				'default_value' => 'left',
				'label' => esc_html__( 'Horizontal Alignment', 'ratio' ),
				'description' => esc_html__( 'Specify title horizontal alignment', 'ratio' ),
				'parent' => $show_title_area_container,
				'options' => array(
					'left' => esc_html__( 'Left', 'ratio' ),
					'center' => esc_html__( 'Center', 'ratio' ),
					'right' => esc_html__( 'Right', 'ratio' )
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'name'			=> 'title_area_text_size',
				'type'			=> 'select',
				'default_value'	=> 'small',
				'label' => esc_html__( 'Text Size', 'ratio' ),
				'description' => esc_html__( 'Choose a default Title size', 'ratio' ),
				'parent'		=> $show_title_area_container,
				'options'		=> array(
						'small' => esc_html__( 'Small', 'ratio' ),
						'medium' => esc_html__( 'Medium', 'ratio' ),
						'large' => esc_html__( 'Large', 'ratio' ),
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'name' => 'title_area_background_color',
				'type' => 'color',
				'label' => esc_html__( 'Background Color', 'ratio' ),
				'description' => esc_html__( 'Choose a background color for Title Area', 'ratio' ),
				'parent' => $show_title_area_container
			)
		);

		ratio_edge_add_admin_field(
			array(
				'name' => 'title_area_background_image',
				'type' => 'image',
				'label' => esc_html__( 'Background Image', 'ratio' ),
				'description' => esc_html__( 'Choose an Image for Title Area', 'ratio' ),
				'parent' => $show_title_area_container
			)
		);

		ratio_edge_add_admin_field(
			array(
				'name' => 'title_area_background_image_responsive',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__( 'Background Responsive Image', 'ratio' ),
				'description' => esc_html__( 'Enabling this option will make Title background image responsive', 'ratio' ),
				'parent' => $show_title_area_container,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "#edgtf_title_area_background_image_responsive_container",
					"dependence_show_on_yes" => ""
				)
			)
		);

		$title_area_background_image_responsive_container = ratio_edge_add_admin_container(
			array(
				'parent' => $show_title_area_container,
				'name' => 'title_area_background_image_responsive_container',
				'hidden_property' => 'title_area_background_image_responsive',
				'hidden_value' => 'yes'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'name' => 'title_area_background_image_parallax',
				'type' => 'select',
				'default_value' => 'no',
				'label' => esc_html__( 'Background Image in Parallax', 'ratio' ),
				'description' => esc_html__( 'Enabling this option will make Title background image parallax', 'ratio' ),
				'parent' => $title_area_background_image_responsive_container,
				'options' => array(
					'no' => esc_html__( 'No', 'ratio' ),
					'yes' => esc_html__( 'Yes', 'ratio' ),
					'yes_zoom' => esc_html__( 'Yes, with zoom out', 'ratio' )
				)
			)
		);

		ratio_edge_add_admin_field(array(
			'name' => 'title_area_height',
			'type' => 'text',
			'label' => esc_html__( 'Height', 'ratio' ),
			'description' => esc_html__( 'Set a height for Title Area', 'ratio' ),
			'parent' => $title_area_background_image_responsive_container,
			'args' => array(
				'col_width' => 2,
				'suffix' => 'px'
			)
		));

		ratio_edge_add_admin_field(
			array(
				'name' => 'title_area_border_bottom',
				'type' => 'yesno',
				'default_value' => 'yes',
				'label' => esc_html__( 'Enable Border Bottom', 'ratio' ),
				'description' => esc_html__( 'This option will display Border Bottom in Title Area', 'ratio' ),
				'parent' => $show_title_area_container
			)
		);

		$panel_typography = ratio_edge_add_admin_panel(
			array(
				'page' => '_title_page',
				'name' => 'panel_title_typography',
				'title' => esc_html__( 'Typography', 'ratio' )
			)
		);

		$group_page_title_styles = ratio_edge_add_admin_group(array(
			'name'			=> 'group_page_title_styles',
			'title' => esc_html__( 'Title', 'ratio' ),
			'description' => esc_html__( 'Define styles for page title', 'ratio' ),
			'parent'		=> $panel_typography
		));

		$row_page_title_styles_1 = ratio_edge_add_admin_row(array(
			'name'		=> 'row_page_title_styles_1',
			'parent'	=> $group_page_title_styles
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'page_title_color',
			'default_value'	=> '',
			'label' => esc_html__( 'Text Color', 'ratio' ),
			'parent'		=> $row_page_title_styles_1
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_title_fontsize',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Size', 'ratio' ),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_title_styles_1
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_title_lineheight',
			'default_value'	=> '',
			'label' => esc_html__( 'Line Height', 'ratio' ),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_title_styles_1
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_title_texttransform',
			'default_value'	=> '',
			'label' => esc_html__( 'Text Transform', 'ratio' ),
			'options'		=> ratio_edge_get_text_transform_array(),
			'parent'		=> $row_page_title_styles_1
		));

		$row_page_title_styles_2 = ratio_edge_add_admin_row(array(
			'name'		=> 'row_page_title_styles_2',
			'parent'	=> $group_page_title_styles,
			'next'		=> true
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'fontsimple',
			'name'			=> 'page_title_google_fonts',
			'default_value'	=> '-1',
			'label' => esc_html__( 'Font Family', 'ratio' ),
			'parent'		=> $row_page_title_styles_2
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_title_fontstyle',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Style', 'ratio' ),
			'options'		=> ratio_edge_get_font_style_array(),
			'parent'		=> $row_page_title_styles_2
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_title_fontweight',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Weight', 'ratio' ),
			'options'		=> ratio_edge_get_font_weight_array(),
			'parent'		=> $row_page_title_styles_2
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_title_letter_spacing',
			'default_value'	=> '',
			'label' => esc_html__( 'Letter Spacing', 'ratio' ),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_title_styles_2
		));

		$group_page_subtitle_styles = ratio_edge_add_admin_group(array(
			'name'			=> 'group_page_subtitle_styles',
			'title' => esc_html__( 'Subtitle', 'ratio' ),
			'description' => esc_html__( 'Define styles for page subtitle', 'ratio' ),
			'parent'		=> $panel_typography
		));

		$row_page_subtitle_styles_1 = ratio_edge_add_admin_row(array(
			'name'		=> 'row_page_subtitle_styles_1',
			'parent'	=> $group_page_subtitle_styles
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'page_subtitle_color',
			'default_value'	=> '',
			'label' => esc_html__( 'Text Color', 'ratio' ),
			'parent'		=> $row_page_subtitle_styles_1
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_subtitle_fontsize',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Size', 'ratio' ),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_subtitle_styles_1
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_subtitle_lineheight',
			'default_value'	=> '',
			'label' => esc_html__( 'Line Height', 'ratio' ),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_subtitle_styles_1
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_subtitle_texttransform',
			'default_value'	=> '',
			'label' => esc_html__( 'Text Transform', 'ratio' ),
			'options'		=> ratio_edge_get_text_transform_array(),
			'parent'		=> $row_page_subtitle_styles_1
		));

		$row_page_subtitle_styles_2 = ratio_edge_add_admin_row(array(
			'name'		=> 'row_page_subtitle_styles_2',
			'parent'	=> $group_page_subtitle_styles,
			'next'		=> true
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'fontsimple',
			'name'			=> 'page_subtitle_google_fonts',
			'default_value'	=> '-1',
			'label' => esc_html__( 'Font Family', 'ratio' ),
			'parent'		=> $row_page_subtitle_styles_2
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_subtitle_fontstyle',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Style', 'ratio' ),
			'options'		=> ratio_edge_get_font_style_array(),
			'parent'		=> $row_page_subtitle_styles_2
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_subtitle_fontweight',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Weight', 'ratio' ),
			'options'		=> ratio_edge_get_font_weight_array(),
			'parent'		=> $row_page_subtitle_styles_2
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_subtitle_letter_spacing',
			'default_value'	=> '',
			'label' => esc_html__( 'Letter Spacing', 'ratio' ),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_subtitle_styles_2
		));

		$group_page_breadcrumbs_styles = ratio_edge_add_admin_group(array(
			'name'			=> 'group_page_breadcrumbs_styles',
			'title' => esc_html__( 'Breadcrumbs', 'ratio' ),
			'description' => esc_html__( 'Define styles for page breadcrumbs', 'ratio' ),
			'parent'		=> $panel_typography
		));

		$row_page_breadcrumbs_styles_1 = ratio_edge_add_admin_row(array(
			'name'		=> 'row_page_breadcrumbs_styles_1',
			'parent'	=> $group_page_breadcrumbs_styles
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'page_breadcrumb_color',
			'default_value'	=> '',
			'label' => esc_html__( 'Text Color', 'ratio' ),
			'parent'		=> $row_page_breadcrumbs_styles_1
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_breadcrumb_fontsize',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Size', 'ratio' ),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_breadcrumbs_styles_1
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_breadcrumb_lineheight',
			'default_value'	=> '',
			'label' => esc_html__( 'Line Height', 'ratio' ),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_breadcrumbs_styles_1
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_breadcrumb_texttransform',
			'default_value'	=> '',
			'label' => esc_html__( 'Text Transform', 'ratio' ),
			'options'		=> ratio_edge_get_text_transform_array(),
			'parent'		=> $row_page_breadcrumbs_styles_1
		));

		$row_page_breadcrumbs_styles_2 = ratio_edge_add_admin_row(array(
			'name'		=> 'row_page_breadcrumbs_styles_2',
			'parent'	=> $group_page_breadcrumbs_styles,
			'next'		=> true
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'fontsimple',
			'name'			=> 'page_breadcrumb_google_fonts',
			'default_value'	=> '-1',
			'label' => esc_html__( 'Font Family', 'ratio' ),
			'parent'		=> $row_page_breadcrumbs_styles_2
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_breadcrumb_fontstyle',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Style', 'ratio' ),
			'options'		=> ratio_edge_get_font_style_array(),
			'parent'		=> $row_page_breadcrumbs_styles_2
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_breadcrumb_fontweight',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Weight', 'ratio' ),
			'options'		=> ratio_edge_get_font_weight_array(),
			'parent'		=> $row_page_breadcrumbs_styles_2
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_breadcrumb_letter_spacing',
			'default_value'	=> '',
			'label' => esc_html__( 'Letter Spacing', 'ratio' ),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_breadcrumbs_styles_2
		));

		$row_page_breadcrumbs_styles_3 = ratio_edge_add_admin_row(array(
			'name'		=> 'row_page_breadcrumbs_styles_3',
			'parent'	=> $group_page_breadcrumbs_styles,
			'next'		=> true
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'page_breadcrumb_hovercolor',
			'default_value'	=> '',
			'label' => esc_html__( 'Hover/Active Color', 'ratio' ),
			'parent'		=> $row_page_breadcrumbs_styles_3
		));

	}

	add_action( 'ratio_edge_options_map', 'ratio_edge_title_options_map', 6);

}