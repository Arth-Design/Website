<?php

if ( ! function_exists('ratio_edge_contact_form_7_options_map') ) {

	function ratio_edge_contact_form_7_options_map() {

		ratio_edge_add_admin_page(array(
			'slug'	=> '_contact_form7_page',
			'title' => esc_html__( 'Contact Form 7', 'ratio' ),
			'icon'	=> 'fa fa-envelope-o'
		));

		$panel_contact_form_style_1 = ratio_edge_add_admin_panel(array(
			'page'	=> '_contact_form7_page',
			'name'	=> 'panel_contact_form_style_1',
			'title' => esc_html__( 'Custom Style 1', 'ratio' )
		));

		//Text Typography

		$typography_text_group = ratio_edge_add_admin_group(array(
			'name'			=> 'typography_text_group',
			'title' => esc_html__( 'Form Text Typography', 'ratio' ),
			'description' => esc_html__( 'Setup typography for form elements text', 'ratio' ),
			'parent'		=> $panel_contact_form_style_1
		));

		$typography_text_row1 = ratio_edge_add_admin_row(array(
			'name'		=> 'typography_text_row1',
			'parent'	=> $typography_text_group
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $typography_text_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_text_color',
			'default_value'	=> '',
			'label' => esc_html__( 'Text Color', 'ratio' ),
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $typography_text_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_focus_text_color',
			'default_value'	=> '',
			'label' => esc_html__( 'Focus Text Color', 'ratio' ),
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $typography_text_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_text_font_size',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Size', 'ratio' ),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $typography_text_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_text_line_height',
			'default_value'	=> '',
			'label' => esc_html__( 'Line Height', 'ratio' ),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		$typography_text_row2 = ratio_edge_add_admin_row(array(
			'name'		=> 'typography_text_row2',
			'next'		=> true,
			'parent'	=> $typography_text_group
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $typography_text_row2,
			'type'			=> 'fontsimple',
			'name'			=> 'cf7_style_1_text_font_family',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Family', 'ratio' ),
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $typography_text_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_1_text_font_style',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Style', 'ratio' ),
			'options'		=>  ratio_edge_get_font_style_array()
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $typography_text_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_1_text_font_weight',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Weight', 'ratio' ),
			'options'		=> ratio_edge_get_font_weight_array()
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $typography_text_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_1_text_text_transform',
			'default_value'	=> '',
			'label' => esc_html__( 'Text Transform', 'ratio' ),
			'options'		=> ratio_edge_get_text_transform_array()
		));

		$typography_text_row3 = ratio_edge_add_admin_row(array(
			'name'		=> 'typography_text_row3',
			'next'		=> true,
			'parent'	=> $typography_text_group
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $typography_text_row3,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_text_letter_spacing',
			'default_value'	=> '',
			'label' => esc_html__( 'Letter Spacing', 'ratio' ),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Labels Typography

		$typography_label_group = ratio_edge_add_admin_group(array(
			'name'			=> 'typography_label_group',
			'title' => esc_html__( 'Form Label Typography', 'ratio' ),
			'description' => esc_html__( 'Setup typography for form elements label', 'ratio' ),
			'parent'		=> $panel_contact_form_style_1
		));

		$typography_label_row1 = ratio_edge_add_admin_row(array(
			'name'		=> 'typography_label_row1',
			'parent'	=> $typography_label_group
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $typography_label_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_label_color',
			'default_value'	=> '',
			'label' => esc_html__( 'Text Color', 'ratio' ),
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $typography_label_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_label_font_size',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Size', 'ratio' ),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $typography_label_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_label_line_height',
			'default_value'	=> '',
			'label' => esc_html__( 'Line Height', 'ratio' ),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $typography_label_row1,
			'type'			=> 'fontsimple',
			'name'			=> 'cf7_style_1_label_font_family',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Family', 'ratio' ),
		));

		$typography_label_row2 = ratio_edge_add_admin_row(array(
			'name'		=> 'typography_label_row2',
			'next'		=> true,
			'parent'	=> $typography_label_group
		));


		ratio_edge_add_admin_field(array(
			'parent'		=> $typography_label_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_1_label_font_style',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Style', 'ratio' ),
			'options'		=>  ratio_edge_get_font_style_array()
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $typography_label_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_1_label_font_weight',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Weight', 'ratio' ),
			'options'		=> ratio_edge_get_font_weight_array()
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $typography_label_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_1_label_text_transform',
			'default_value'	=> '',
			'label' => esc_html__( 'Text Transform', 'ratio' ),
			'options'		=> ratio_edge_get_text_transform_array()
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $typography_label_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_label_letter_spacing',
			'default_value'	=> '',
			'label' => esc_html__( 'Letter Spacing', 'ratio' ),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Form Elements Background and Border

		$background_border_group = ratio_edge_add_admin_group(array(
			'name'			=> 'background_border_group',
			'title' => esc_html__( 'Form Elements Background and Border', 'ratio' ),
			'description' => esc_html__( 'Setup form elements background and border style', 'ratio' ),
			'parent'		=> $panel_contact_form_style_1
		));

		$background_border_row1 = ratio_edge_add_admin_row(array(
			'name'		=> 'background_border_row1',
			'parent'	=> $background_border_group
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $background_border_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_background_color',
			'default_value'	=> '',
			'label' => esc_html__( 'Background Color', 'ratio' )
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $background_border_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_background_transparency',
			'default_value'	=> '',
			'label' => esc_html__( 'Background Transparency', 'ratio' ),
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $background_border_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_focus_background_color',
			'default_value'	=> '',
			'label' => esc_html__( 'Focus Background Color', 'ratio' )
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $background_border_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_focus_background_transparency',
			'default_value'	=> '',
			'label' => esc_html__( 'Focus Background Transparency', 'ratio' )
		));

		$background_border_row2 = ratio_edge_add_admin_row(array(
			'name'		=> 'background_border_row2',
			'next'		=> true,
			'parent'	=> $background_border_group
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $background_border_row2,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_border_color',
			'default_value'	=> '',
			'label' => esc_html__( 'Border Color', 'ratio' )
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $background_border_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_border_transparency',
			'default_value'	=> '',
			'label' => esc_html__( 'Border Transparency', 'ratio' ),
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $background_border_row2,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_focus_border_color',
			'default_value'	=> '',
			'label' => esc_html__( 'Focus Border Color', 'ratio' )
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $background_border_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_focus_border_transparency',
			'default_value'	=> '',
			'label' => esc_html__( 'Focus Border Transparency', 'ratio' )
		));

		$background_border_row3 = ratio_edge_add_admin_row(array(
			'name'		=> 'background_border_row3',
			'next'		=> true,
			'parent'	=> $background_border_group
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $background_border_row3,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_border_width',
			'default_value'	=> '',
			'label' => esc_html__( 'Border Width', 'ratio' ),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $background_border_row3,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_border_radius',
			'default_value'	=> '',
			'label' => esc_html__( 'Border Radius', 'ratio' ),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Form Elements Padding

		$padding_group = ratio_edge_add_admin_group(array(
			'name'			=> 'padding_group',
			'title' => esc_html__( 'Elements Padding', 'ratio' ),
			'description' => esc_html__( 'Setup form elements padding', 'ratio' ),
			'parent'		=> $panel_contact_form_style_1
		));

		$padding_row = ratio_edge_add_admin_row(array(
			'name'		=> 'padding_row',
			'parent'	=> $padding_group
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $padding_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_padding_top',
			'default_value'	=> '',
			'label' => esc_html__( 'Padding Top', 'ratio' ),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $padding_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_padding_right',
			'default_value'	=> '',
			'label' => esc_html__( 'Padding Right', 'ratio' ),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $padding_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_padding_bottom',
			'default_value'	=> '',
			'label' => esc_html__( 'Padding Bottom', 'ratio' ),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $padding_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_padding_left',
			'default_value'	=> '',
			'label' => esc_html__( 'Padding Left', 'ratio' ),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Form Elements Margin

		$margin_group = ratio_edge_add_admin_group(array(
			'name'			=> 'margin_group',
			'title' => esc_html__( 'Elements Margin', 'ratio' ),
			'description' => esc_html__( 'Setup form elements margin', 'ratio' ),
			'parent'		=> $panel_contact_form_style_1
		));

		$margin_row = ratio_edge_add_admin_row(array(
			'name'		=> 'margin_row',
			'parent'	=> $margin_group
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $margin_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_margin_top',
			'default_value'	=> '',
			'label' => esc_html__( 'Margin Top', 'ratio' ),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $margin_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_margin_bottom',
			'default_value'	=> '',
			'label' => esc_html__( 'Margin Bottom', 'ratio' ),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Textarea

		ratio_edge_add_admin_field(array(
			'parent'		=> $panel_contact_form_style_1,
			'type'			=> 'text',
			'name'			=> 'cf7_style_1_textarea_height',
			'default_value'	=> '',
			'label' => esc_html__( 'Textarea Height', 'ratio' ),
			'description' => esc_html__( 'Enter height for textarea form element', 'ratio' ),
			'args'			=> array(
				'col_width' => '3',
				'suffix' => 'px'
			)
		));

		// Button Typography

		$button_typography_group = ratio_edge_add_admin_group(array(
			'name'			=> 'button_typography_group',
			'title' => esc_html__( 'Button Typography', 'ratio' ),
			'description' => esc_html__( 'Setup button text typography', 'ratio' ),
			'parent'		=> $panel_contact_form_style_1
		));

		$button_typography_row1 = ratio_edge_add_admin_row(array(
			'name'		=> 'button_typography_row1',
			'parent'	=> $button_typography_group
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_typography_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_button_color',
			'default_value'	=> '',
			'label' => esc_html__( 'Text Color', 'ratio' )
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_typography_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_button_hover_color',
			'default_value'	=> '',
			'label' => esc_html__( 'Text Hover Color', 'ratio' )
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_typography_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_button_font_size',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Size', 'ratio' ),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_typography_row1,
			'type'			=> 'fontsimple',
			'name'			=> 'cf7_style_1_button_font_family',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Family', 'ratio' )
		));

		$button_typography_row2 = ratio_edge_add_admin_row(array(
			'name'		=> 'button_typography_row2',
			'next'		=> true,
			'parent'	=> $button_typography_group
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_typography_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_1_button_font_style',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Style', 'ratio' ),
			'options'		=> ratio_edge_get_font_style_array()
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_typography_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_1_button_font_weight',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Weight', 'ratio' ),
			'options'		=> ratio_edge_get_font_weight_array()
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_typography_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_1_button_text_transform',
			'default_value'	=> '',
			'label' => esc_html__( 'Text Transform', 'ratio' ),
			'options'		=> ratio_edge_get_text_transform_array()
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_typography_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_button_letter_spacing',
			'default_value'	=> '',
			'label' => esc_html__( 'Letter Spacing', 'ratio' ),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Button Background

		$button_background_group = ratio_edge_add_admin_group(array(
			'name'			=> 'button_background_border_group',
			'title' => esc_html__( 'Button Background', 'ratio' ),
			'description' => esc_html__( 'Setup button background style', 'ratio' ),
			'parent'		=> $panel_contact_form_style_1
		));

		$button_background_row1 = ratio_edge_add_admin_row(array(
			'name'		=> 'button_background_row1',
			'parent'	=> $button_background_group
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_background_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_button_background_color',
			'default_value'	=> '',
			'label' => esc_html__( 'Background Color', 'ratio' )
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_background_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_button_background_transparency',
			'default_value'	=> '',
			'label' => esc_html__( 'Background Transparency', 'ratio' ),
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_background_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_button_background_sec_color',
			'default_value'	=> '',
			'label' => esc_html__( 'Background Second (Gradient) Color', 'ratio' )
		));

		$button_background_row2 = ratio_edge_add_admin_row(array(
			'name'		=> 'button_background_row2',
			'next'		=> true,
			'parent'	=> $button_background_group
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_background_row2,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_button_hover_bckg_color',
			'default_value'	=> '',
			'label' => esc_html__( 'Background Hover Color', 'ratio' )
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_background_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_button_hover_bckg_transparency',
			'default_value'	=> '',
			'label' => esc_html__( 'Background Hover Transparency', 'ratio' )
		));

		// Button Border

		$button_border_group = ratio_edge_add_admin_group(array(
			'name'			=> 'button_border_group',
			'title' => esc_html__( 'Button Border', 'ratio' ),
			'description' => esc_html__( 'Setup button border style', 'ratio' ),
			'parent'		=> $panel_contact_form_style_1
		));

		$button_border_row1 = ratio_edge_add_admin_row(array(
			'name'		=> 'button_border_row1',
			'next'		=> true,
			'parent'	=> $button_border_group
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_border_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_button_border_color',
			'default_value'	=> '',
			'label' => esc_html__( 'Border Color', 'ratio' )
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_border_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_button_border_transparency',
			'default_value'	=> '',
			'label' => esc_html__( 'Border Transparency', 'ratio' ),
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_border_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_button_hover_border_color',
			'default_value'	=> '',
			'label' => esc_html__( 'Border Hover Color', 'ratio' )
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_border_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_button_hover_border_transparency',
			'default_value'	=> '',
			'label' => esc_html__( 'Border Hover Transparency', 'ratio' )
		));

		$button_border_row2 = ratio_edge_add_admin_row(array(
			'name'		=> 'button_border_row2',
			'next'		=> true,
			'parent'	=> $button_border_group
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_border_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_button_border_width',
			'default_value'	=> '',
			'label' => esc_html__( 'Border Width', 'ratio' ),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_border_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_button_border_radius',
			'default_value'	=> '',
			'label' => esc_html__( 'Border Radius', 'ratio' ),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Button Height

		ratio_edge_add_admin_field(array(
			'parent'		=> $panel_contact_form_style_1,
			'type'			=> 'text',
			'name'			=> 'cf7_style_1_button_height',
			'default_value'	=> '',
			'label' => esc_html__( 'Button Height', 'ratio' ),
			'description' => esc_html__( 'Insert form button height', 'ratio' ),
			'args'			=> array(
				'col_width' => '3',
				'suffix' => 'px'
			)
		));

		// Button Padding

		ratio_edge_add_admin_field(array(
			'parent'		=> $panel_contact_form_style_1,
			'type'			=> 'text',
			'name'			=> 'cf7_style_1_button_padding',
			'default_value'	=> '',
			'label' => esc_html__( 'Button Left/Right Padding', 'ratio' ),
			'description' => esc_html__( 'Enter value for button left and right padding', 'ratio' ),
			'args'			=> array(
				'col_width' => '3',
				'suffix' => 'px'
			)
		));

		$panel_contact_form_style_2 = ratio_edge_add_admin_panel(array(
			'page'	=> '_contact_form7_page',
			'name'	=> 'panel_contact_form_style_2',
			'title' => esc_html__( 'Custom Style 2', 'ratio' )
		));

		//Text Typography

		$typography_text_group = ratio_edge_add_admin_group(array(
			'name'			=> 'typography_text_group',
			'title' => esc_html__( 'Form Text Typography', 'ratio' ),
			'description' => esc_html__( 'Setup typography for form elements text', 'ratio' ),
			'parent'		=> $panel_contact_form_style_2
		));

		$typography_text_row1 = ratio_edge_add_admin_row(array(
			'name'		=> 'typography_text_row1',
			'parent'	=> $typography_text_group
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $typography_text_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_text_color',
			'default_value'	=> '',
			'label' => esc_html__( 'Text Color', 'ratio' ),
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $typography_text_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_focus_text_color',
			'default_value'	=> '',
			'label' => esc_html__( 'Focus Text Color', 'ratio' ),
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $typography_text_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_text_font_size',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Size', 'ratio' ),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $typography_text_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_text_line_height',
			'default_value'	=> '',
			'label' => esc_html__( 'Line Height', 'ratio' ),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		$typography_text_row2 = ratio_edge_add_admin_row(array(
			'name'		=> 'typography_text_row2',
			'next'		=> true,
			'parent'	=> $typography_text_group
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $typography_text_row2,
			'type'			=> 'fontsimple',
			'name'			=> 'cf7_style_2_text_font_family',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Family', 'ratio' ),
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $typography_text_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_2_text_font_style',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Style', 'ratio' ),
			'options'		=>  ratio_edge_get_font_style_array()
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $typography_text_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_2_text_font_weight',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Weight', 'ratio' ),
			'options'		=> ratio_edge_get_font_weight_array()
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $typography_text_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_2_text_text_transform',
			'default_value'	=> '',
			'label' => esc_html__( 'Text Transform', 'ratio' ),
			'options'		=> ratio_edge_get_text_transform_array()
		));

		$typography_text_row3 = ratio_edge_add_admin_row(array(
			'name'		=> 'typography_text_row3',
			'next'		=> true,
			'parent'	=> $typography_text_group
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $typography_text_row3,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_text_letter_spacing',
			'default_value'	=> '',
			'label' => esc_html__( 'Letter Spacing', 'ratio' ),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Labels Typography

		$typography_label_group = ratio_edge_add_admin_group(array(
			'name'			=> 'typography_label_group',
			'title' => esc_html__( 'Form Label Typography', 'ratio' ),
			'description' => esc_html__( 'Setup typography for form elements label', 'ratio' ),
			'parent'		=> $panel_contact_form_style_2
		));

		$typography_label_row1 = ratio_edge_add_admin_row(array(
			'name'		=> 'typography_label_row1',
			'parent'	=> $typography_label_group
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $typography_label_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_label_color',
			'default_value'	=> '',
			'label' => esc_html__( 'Text Color', 'ratio' ),
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $typography_label_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_label_font_size',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Size', 'ratio' ),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $typography_label_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_label_line_height',
			'default_value'	=> '',
			'label' => esc_html__( 'Line Height', 'ratio' ),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $typography_label_row1,
			'type'			=> 'fontsimple',
			'name'			=> 'cf7_style_2_label_font_family',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Family', 'ratio' ),
		));

		$typography_label_row2 = ratio_edge_add_admin_row(array(
			'name'		=> 'typography_label_row2',
			'next'		=> true,
			'parent'	=> $typography_label_group
		));


		ratio_edge_add_admin_field(array(
			'parent'		=> $typography_label_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_2_label_font_style',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Style', 'ratio' ),
			'options'		=>  ratio_edge_get_font_style_array()
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $typography_label_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_2_label_font_weight',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Weight', 'ratio' ),
			'options'		=> ratio_edge_get_font_weight_array()
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $typography_label_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_2_label_text_transform',
			'default_value'	=> '',
			'label' => esc_html__( 'Text Transform', 'ratio' ),
			'options'		=> ratio_edge_get_text_transform_array()
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $typography_label_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_label_letter_spacing',
			'default_value'	=> '',
			'label' => esc_html__( 'Letter Spacing', 'ratio' ),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Form Elements Background and Border

		$background_border_group = ratio_edge_add_admin_group(array(
			'name'			=> 'background_border_group',
			'title' => esc_html__( 'Form Elements Background and Border', 'ratio' ),
			'description' => esc_html__( 'Setup form elements background and border style', 'ratio' ),
			'parent'		=> $panel_contact_form_style_2
		));

		$background_border_row1 = ratio_edge_add_admin_row(array(
			'name'		=> 'background_border_row1',
			'parent'	=> $background_border_group
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $background_border_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_background_color',
			'default_value'	=> '',
			'label' => esc_html__( 'Background Color', 'ratio' )
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $background_border_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_background_transparency',
			'default_value'	=> '',
			'label' => esc_html__( 'Background Transparency', 'ratio' ),
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $background_border_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_focus_background_color',
			'default_value'	=> '',
			'label' => esc_html__( 'Focus Background Color', 'ratio' )
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $background_border_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_focus_background_transparency',
			'default_value'	=> '',
			'label' => esc_html__( 'Focus Background Transparency', 'ratio' )
		));

		$background_border_row2 = ratio_edge_add_admin_row(array(
			'name'		=> 'background_border_row2',
			'next'		=> true,
			'parent'	=> $background_border_group
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $background_border_row2,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_border_color',
			'default_value'	=> '',
			'label' => esc_html__( 'Border Color', 'ratio' )
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $background_border_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_border_transparency',
			'default_value'	=> '',
			'label' => esc_html__( 'Border Transparency', 'ratio' ),
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $background_border_row2,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_focus_border_color',
			'default_value'	=> '',
			'label' => esc_html__( 'Focus Border Color', 'ratio' )
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $background_border_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_focus_border_transparency',
			'default_value'	=> '',
			'label' => esc_html__( 'Focus Border Transparency', 'ratio' )
		));

		$background_border_row3 = ratio_edge_add_admin_row(array(
			'name'		=> 'background_border_row3',
			'next'		=> true,
			'parent'	=> $background_border_group
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $background_border_row3,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_border_width',
			'default_value'	=> '',
			'label' => esc_html__( 'Border Width', 'ratio' ),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $background_border_row3,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_border_radius',
			'default_value'	=> '',
			'label' => esc_html__( 'Border Radius', 'ratio' ),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Form Elements Padding

		$padding_group = ratio_edge_add_admin_group(array(
			'name'			=> 'padding_group',
			'title' => esc_html__( 'Elements Padding', 'ratio' ),
			'description' => esc_html__( 'Setup form elements padding', 'ratio' ),
			'parent'		=> $panel_contact_form_style_2
		));

		$padding_row = ratio_edge_add_admin_row(array(
			'name'		=> 'padding_row',
			'parent'	=> $padding_group
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $padding_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_padding_top',
			'default_value'	=> '',
			'label' => esc_html__( 'Padding Top', 'ratio' ),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $padding_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_padding_right',
			'default_value'	=> '',
			'label' => esc_html__( 'Padding Right', 'ratio' ),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $padding_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_padding_bottom',
			'default_value'	=> '',
			'label' => esc_html__( 'Padding Bottom', 'ratio' ),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $padding_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_padding_left',
			'default_value'	=> '',
			'label' => esc_html__( 'Padding Left', 'ratio' ),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Form Elements Margin

		$margin_group = ratio_edge_add_admin_group(array(
			'name'			=> 'margin_group',
			'title' => esc_html__( 'Elements Margin', 'ratio' ),
			'description' => esc_html__( 'Setup form elements margin', 'ratio' ),
			'parent'		=> $panel_contact_form_style_2
		));

		$margin_row = ratio_edge_add_admin_row(array(
			'name'		=> 'margin_row',
			'parent'	=> $margin_group
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $margin_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_margin_top',
			'default_value'	=> '',
			'label' => esc_html__( 'Margin Top', 'ratio' ),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $margin_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_margin_bottom',
			'default_value'	=> '',
			'label' => esc_html__( 'Margin Bottom', 'ratio' ),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Textarea

		ratio_edge_add_admin_field(array(
			'parent'		=> $panel_contact_form_style_2,
			'type'			=> 'text',
			'name'			=> 'cf7_style_2_textarea_height',
			'default_value'	=> '',
			'label' => esc_html__( 'Textarea Height', 'ratio' ),
			'description' => esc_html__( 'Enter height for textarea form element', 'ratio' ),
			'args'			=> array(
				'col_width' => '3',
				'suffix' => 'px'
			)
		));

		// Button Typography

		$button_typography_group = ratio_edge_add_admin_group(array(
			'name'			=> 'button_typography_group',
			'title' => esc_html__( 'Button Typography', 'ratio' ),
			'description' => esc_html__( 'Setup button text typography', 'ratio' ),
			'parent'		=> $panel_contact_form_style_2
		));

		$button_typography_row1 = ratio_edge_add_admin_row(array(
			'name'		=> 'button_typography_row1',
			'parent'	=> $button_typography_group
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_typography_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_button_color',
			'default_value'	=> '',
			'label' => esc_html__( 'Text Color', 'ratio' )
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_typography_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_button_hover_color',
			'default_value'	=> '',
			'label' => esc_html__( 'Text Hover Color', 'ratio' )
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_typography_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_button_font_size',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Size', 'ratio' ),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_typography_row1,
			'type'			=> 'fontsimple',
			'name'			=> 'cf7_style_2_button_font_family',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Family', 'ratio' )
		));

		$button_typography_row2 = ratio_edge_add_admin_row(array(
			'name'		=> 'button_typography_row2',
			'next'		=> true,
			'parent'	=> $button_typography_group
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_typography_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_2_button_font_style',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Style', 'ratio' ),
			'options'		=> ratio_edge_get_font_style_array()
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_typography_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_2_button_font_weight',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Weight', 'ratio' ),
			'options'		=> ratio_edge_get_font_weight_array()
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_typography_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_2_button_text_transform',
			'default_value'	=> '',
			'label' => esc_html__( 'Text Transform', 'ratio' ),
			'options'		=> ratio_edge_get_text_transform_array()
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_typography_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_button_letter_spacing',
			'default_value'	=> '',
			'label' => esc_html__( 'Letter Spacing', 'ratio' ),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Button Background

		$button_background_group = ratio_edge_add_admin_group(array(
			'name'			=> 'button_background_group',
			'title' => esc_html__( 'Button Background', 'ratio' ),
			'description' => esc_html__( 'Setup button background style', 'ratio' ),
			'parent'		=> $panel_contact_form_style_2
		));

		$button_background_row1 = ratio_edge_add_admin_row(array(
			'name'		=> 'button_background_row1',
			'parent'	=> $button_background_group
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_background_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_button_background_color',
			'default_value'	=> '',
			'label' => esc_html__( 'Background Color', 'ratio' )
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_background_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_button_background_transparency',
			'default_value'	=> '',
			'label' => esc_html__( 'Background Transparency', 'ratio' ),
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_background_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_button_background_sec_color',
			'default_value'	=> '',
			'label' => esc_html__( 'Background Second (Gradient) Color', 'ratio' )
		));

		$button_background_row2 = ratio_edge_add_admin_row(array(
			'name'		=> 'button_background_row2',
			'next'		=> true,
			'parent'	=> $button_background_group
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_background_row2,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_button_hover_bckg_color',
			'default_value'	=> '',
			'label' => esc_html__( 'Background Hover Color', 'ratio' )
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_background_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_button_hover_bckg_transparency',
			'default_value'	=> '',
			'label' => esc_html__( 'Background Hover Transparency', 'ratio' )
		));

		// Button Border

		$button_border_group = ratio_edge_add_admin_group(array(
			'name'			=> 'button_border_group',
			'title' => esc_html__( 'Button Border', 'ratio' ),
			'description' => esc_html__( 'Setup button border style', 'ratio' ),
			'parent'		=> $panel_contact_form_style_2
		));

		$button_border_row1 = ratio_edge_add_admin_row(array(
			'name'		=> 'button_border_row1',
			'parent'	=> $button_border_group
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_border_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_button_border_color',
			'default_value'	=> '',
			'label' => esc_html__( 'Border Color', 'ratio' )
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_border_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_button_border_transparency',
			'default_value'	=> '',
			'label' => esc_html__( 'Border Transparency', 'ratio' ),
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_border_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_button_hover_border_color',
			'default_value'	=> '',
			'label' => esc_html__( 'Border Hover Color', 'ratio' )
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_border_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_button_hover_border_transparency',
			'default_value'	=> '',
			'label' => esc_html__( 'Border Hover Transparency', 'ratio' )
		));

		$button_border_row2 = ratio_edge_add_admin_row(array(
			'name'		=> 'button_border_row2',
			'next'		=> true,
			'parent'	=> $button_border_group
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_border_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_button_border_width',
			'default_value'	=> '',
			'label' => esc_html__( 'Border Width', 'ratio' ),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		ratio_edge_add_admin_field(array(
			'parent'		=> $button_border_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_button_border_radius',
			'default_value'	=> '',
			'label' => esc_html__( 'Border Radius', 'ratio' ),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Button Height

		ratio_edge_add_admin_field(array(
			'parent'		=> $panel_contact_form_style_2,
			'type'			=> 'text',
			'name'			=> 'cf7_style_2_button_height',
			'default_value'	=> '',
			'label' => esc_html__( 'Button Height', 'ratio' ),
			'description' => esc_html__( 'Insert form button height', 'ratio' ),
			'args'			=> array(
				'col_width' => '3',
				'suffix' => 'px'
			)
		));

		// Button Padding

		ratio_edge_add_admin_field(array(
			'parent'		=> $panel_contact_form_style_2,
			'type'			=> 'text',
			'name'			=> 'cf7_style_2_button_padding',
			'default_value'	=> '',
			'label' => esc_html__( 'Button Left/Right Padding', 'ratio' ),
			'description' => esc_html__( 'Enter value for button left and right padding', 'ratio' ),
			'args'			=> array(
				'col_width' => '3',
				'suffix' => 'px'
			)
		));

	}

	add_action( 'ratio_edge_options_map', 'ratio_edge_contact_form_7_options_map', 19);

}