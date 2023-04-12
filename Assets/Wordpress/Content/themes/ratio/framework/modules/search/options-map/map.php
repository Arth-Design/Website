<?php

if ( ! function_exists('ratio_edge_search_options_map') ) {

	function ratio_edge_search_options_map() {

		ratio_edge_add_admin_page(
			array(
				'slug' => '_search_page',
				'title' => esc_html__( 'Search', 'ratio' ),
				'icon' => 'fa fa-search'
			)
		);

		$search_panel = ratio_edge_add_admin_panel(
			array(
				'title' => esc_html__( 'Search', 'ratio' ),
				'name' => 'search',
				'page' => '_search_page'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'select',
				'name'			=> 'search_type',
				'default_value'	=> 'search-covers-header',
				'label' => esc_html__( 'Select Search Type', 'ratio' ),
				'description' => esc_html__( "Choose a type of Select search bar", 'ratio' ),
				'options' 		=> array(
					'search-covers-header' => esc_html__( 'Search Covers Header', 'ratio' ),
					'fullscreen-search' => esc_html__( 'Fullscreen Search', 'ratio' )
				),
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'select',
				'name'			=> 'search_icon_pack',
				'default_value'	=> 'simple_line_icons',
				'label' => esc_html__( 'Search Icon Pack', 'ratio' ),
				'description' => esc_html__( 'Choose icon pack for search icon', 'ratio' ),
				'options'		=> ratio_edge_icon_collections()->getIconCollectionsExclude(array('linea_icons', 'dripicons'))
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'yesno',
				'name'			=> 'search_in_grid',
				'default_value'	=> 'yes',
				'label' => esc_html__( 'Search area in grid', 'ratio' ),
				'description' => esc_html__( 'Set search area to be in grid', 'ratio' ),
			)
		);

		ratio_edge_add_admin_section_title(
			array(
				'parent' 	=> $search_panel,
				'name'		=> 'initial_header_icon_title',
				'title' => esc_html__( 'Initial Search Icon in Header', 'ratio' )
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'text',
				'name'			=> 'header_search_icon_size',
				'default_value'	=> '',
				'label' => esc_html__( 'Icon Size', 'ratio' ),
				'description' => esc_html__( 'Set size for icon', 'ratio' ),
				'args'			=> array(
					'col_width' => 3,
					'suffix'	=> 'px'
				)
			)
		);

		$search_icon_color_group = ratio_edge_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title' => esc_html__( 'Icon Colors', 'ratio' ),
				'description' => esc_html__( 'Define color style for icon', 'ratio' ),
				'name'		=> 'search_icon_color_group'
			)
		);

		$search_icon_color_row = ratio_edge_add_admin_row(
			array(
				'parent'	=> $search_icon_color_group,
				'name'		=> 'search_icon_color_row'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'	=> $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_search_icon_color',
				'label' => esc_html__( 'Color', 'ratio' )
			)
		);
		ratio_edge_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_search_icon_hover_color',
				'label' => esc_html__( 'Hover Color', 'ratio' )
			)
		);
		ratio_edge_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_light_search_icon_color',
				'label' => esc_html__( 'Light Header Icon Color', 'ratio' )
			)
		);
		ratio_edge_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_light_search_icon_hover_color',
				'label' => esc_html__( 'Light Header Icon Hover Color', 'ratio' )
			)
		);

		$search_icon_color_row2 = ratio_edge_add_admin_row(
			array(
				'parent'	=> $search_icon_color_group,
				'name'		=> 'search_icon_color_row2',
				'next'		=> true
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $search_icon_color_row2,
				'type'		=> 'colorsimple',
				'name'		=> 'header_dark_search_icon_color',
				'label' => esc_html__( 'Dark Header Icon Color', 'ratio' )
			)
		);
		ratio_edge_add_admin_field(
			array(
				'parent' => $search_icon_color_row2,
				'type'		=> 'colorsimple',
				'name'		=> 'header_dark_search_icon_hover_color',
				'label' => esc_html__( 'Dark Header Icon Hover Color', 'ratio' )
			)
		);


		$search_icon_background_group = ratio_edge_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title' => esc_html__( 'Icon Background Style', 'ratio' ),
				'description' => esc_html__( 'Define background style for icon', 'ratio' ),
				'name'		=> 'search_icon_background_group'
			)
		);

		$search_icon_background_row = ratio_edge_add_admin_row(
			array(
				'parent'	=> $search_icon_background_group,
				'name'		=> 'search_icon_background_row'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $search_icon_background_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_background_color',
				'default_value'	=> '',
				'label' => esc_html__( 'Background Color', 'ratio' ),
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $search_icon_background_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_background_hover_color',
				'default_value'	=> '',
				'label' => esc_html__( 'Background Hover Color', 'ratio' ),
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'yesno',
				'name'			=> 'enable_search_icon_text',
				'default_value'	=> 'no',
				'label' => esc_html__( 'Enable Search Icon Text', 'ratio' ),
				'description' => esc_html__( 'Enable this option to show Search text next to search icon in header', 'ratio' ),
				'args'			=> array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_enable_search_icon_text_container'
				)
			)
		);

		$enable_search_icon_text_container = ratio_edge_add_admin_container(
			array(
				'parent'			=> $search_panel,
				'name'				=> 'enable_search_icon_text_container',
				'hidden_property'	=> 'enable_search_icon_text',
				'hidden_value'		=> 'no'
			)
		);

		$enable_search_icon_text_group = ratio_edge_add_admin_group(
			array(
				'parent'	=> $enable_search_icon_text_container,
				'title' => esc_html__( 'Search Icon Text', 'ratio' ),
				'name'		=> 'enable_search_icon_text_group',
				'description' => esc_html__( 'Define Style for Search Icon Text', 'ratio' )
			)
		);

		$enable_search_icon_text_row = ratio_edge_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_text_color',
				'label' => esc_html__( 'Text Color', 'ratio' ),
				'default_value'	=> ''
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_text_color_hover',
				'label' => esc_html__( 'Text Hover Color', 'ratio' ),
				'default_value'	=> ''
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_fontsize',
				'label' => esc_html__( 'Font Size', 'ratio' ),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_lineheight',
				'label' => esc_html__( 'Line Height', 'ratio' ),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$enable_search_icon_text_row2 = ratio_edge_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row2',
				'next'		=> true
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_texttransform',
				'label' => esc_html__( 'Text Transform', 'ratio' ),
				'default_value'	=> '',
				'options'		=> ratio_edge_get_text_transform_array()
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'fontsimple',
				'name'			=> 'search_icon_text_google_fonts',
				'label' => esc_html__( 'Font Family', 'ratio' ),
				'default_value'	=> '-1',
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_fontstyle',
				'label' => esc_html__( 'Font Style', 'ratio' ),
				'default_value'	=> '',
				'options'		=> ratio_edge_get_font_style_array(),
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_fontweight',
				'label' => esc_html__( 'Font Weight', 'ratio' ),
				'default_value'	=> '',
				'options'		=> ratio_edge_get_font_weight_array(),
			)
		);

		$enable_search_icon_text_row3 = ratio_edge_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row3',
				'next'		=> true
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row3,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_letterspacing',
				'label' => esc_html__( 'Letter Spacing', 'ratio' ),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_icon_spacing_group = ratio_edge_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title' => esc_html__( 'Icon Spacing', 'ratio' ),
				'description' => esc_html__( 'Define padding and margins for Search icon', 'ratio' ),
				'name'		=> 'search_icon_spacing_group'
			)
		);

		$search_icon_spacing_row = ratio_edge_add_admin_row(
			array(
				'parent'	=> $search_icon_spacing_group,
				'name'		=> 'search_icon_spacing_row'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_padding_left',
				'default_value'	=> '',
				'label' => esc_html__( 'Padding Left', 'ratio' ),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_padding_right',
				'default_value'	=> '',
				'label' => esc_html__( 'Padding Right', 'ratio' ),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_margin_left',
				'default_value'	=> '',
				'label' => esc_html__( 'Margin Left', 'ratio' ),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_margin_right',
				'default_value'	=> '',
				'label' => esc_html__( 'Margin Right', 'ratio' ),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		ratio_edge_add_admin_section_title(
			array(
				'parent' 	=> $search_panel,
				'name'		=> 'search_form_title',
				'title' => esc_html__( 'Search Bar', 'ratio' )
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'color',
				'name'			=> 'search_background_color',
				'default_value'	=> '',
				'label' => esc_html__( 'Background Color', 'ratio' ),
				'description' => esc_html__( 'Choose a background color for Select search bar', 'ratio' )
			)
		);

		$search_input_text_group = ratio_edge_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title' => esc_html__( 'Search Input Text', 'ratio' ),
				'description' => esc_html__( 'Define style for search text', 'ratio' ),
				'name'		=> 'search_input_text_group'
			)
		);

		$search_input_text_row = ratio_edge_add_admin_row(
			array(
				'parent'	=> $search_input_text_group,
				'name'		=> 'search_input_text_row'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $search_input_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_text_color',
				'default_value'	=> '',
				'label' => esc_html__( 'Text Color', 'ratio' ),
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $search_input_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_text_fontsize',
				'default_value'	=> '',
				'label' => esc_html__( 'Font Size', 'ratio' ),
				'args'			=> array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $search_input_text_row,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_text_texttransform',
				'default_value'	=> '',
				'label' => esc_html__( 'Text Transform', 'ratio' ),
				'options'		=> ratio_edge_get_text_transform_array()
			)
		);

		$search_input_text_row2 = ratio_edge_add_admin_row(
			array(
				'parent'	=> $search_input_text_group,
				'name'		=> 'search_input_text_row2'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $search_input_text_row2,
				'type'			=> 'fontsimple',
				'name'			=> 'search_text_google_fonts',
				'default_value'	=> '-1',
				'label' => esc_html__( 'Font Family', 'ratio' ),
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $search_input_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_text_fontstyle',
				'default_value'	=> '',
				'label' => esc_html__( 'Font Style', 'ratio' ),
				'options'		=> ratio_edge_get_font_style_array(),
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $search_input_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_text_fontweight',
				'default_value'	=> '',
				'label' => esc_html__( 'Font Weight', 'ratio' ),
				'options'		=> ratio_edge_get_font_weight_array()
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $search_input_text_row2,
				'type'			=> 'textsimple',
				'name'			=> 'search_text_letterspacing',
				'default_value'	=> '',
				'label' => esc_html__( 'Letter Spacing', 'ratio' ),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);


		ratio_edge_add_admin_section_title(
			array(
				'parent' 	=> $search_panel,
				'name'		=> 'initial_header_fullscreen_title',
				'title' => esc_html__( 'Fullscreen Search', 'ratio' )
			)
		);

		$search_label_text_group = ratio_edge_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title' => esc_html__( 'Search Label Text', 'ratio' ),
				'description' => esc_html__( 'Define style for search label text', 'ratio' ),
				'name'		=> 'search_label_text_group'
			)
		);

		$search_label_text_row = ratio_edge_add_admin_row(
			array(
				'parent'	=> $search_label_text_group,
				'name'		=> 'search_label_text_row'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $search_label_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_label_text_color',
				'default_value'	=> '',
				'label' => esc_html__( 'Text Color', 'ratio' ),
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $search_label_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_label_text_fontsize',
				'default_value'	=> '',
				'label' => esc_html__( 'Font Size', 'ratio' ),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $search_label_text_row,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_label_text_texttransform',
				'default_value'	=> '',
				'label' => esc_html__( 'Text Transform', 'ratio' ),
				'options'		=> ratio_edge_get_text_transform_array()
			)
		);

		$search_label_text_row2 = ratio_edge_add_admin_row(
			array(
				'parent'	=> $search_label_text_group,
				'name'		=> 'search_label_text_row2',
				'next'		=> true
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $search_label_text_row2,
				'type'			=> 'fontsimple',
				'name'			=> 'search_label_text_google_fonts',
				'default_value'	=> '-1',
				'label' => esc_html__( 'Font Family', 'ratio' ),
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $search_label_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_label_text_fontstyle',
				'default_value'	=> '',
				'label' => esc_html__( 'Font Style', 'ratio' ),
				'options'		=> ratio_edge_get_font_style_array()
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $search_label_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_label_text_fontweight',
				'default_value'	=> '',
				'label' => esc_html__( 'Font Weight', 'ratio' ),
				'options'		=> ratio_edge_get_font_weight_array()
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $search_label_text_row2,
				'type'			=> 'textsimple',
				'name'			=> 'search_label_text_letterspacing',
				'default_value'	=> '',
				'label' => esc_html__( 'Letter Spacing', 'ratio' ),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_icon_group = ratio_edge_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title' => esc_html__( 'Search Icon', 'ratio' ),
				'description' => esc_html__( 'Define style for search icon', 'ratio' ),
				'name'		=> 'search_icon_group'
			)
		);

		$search_icon_row = ratio_edge_add_admin_row(
			array(
				'parent'	=> $search_icon_group,
				'name'		=> 'search_icon_row'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $search_icon_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_color',
				'default_value'	=> '',
				'label' => esc_html__( 'Icon Color', 'ratio' ),
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $search_icon_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_hover_color',
				'default_value'	=> '',
				'label' => esc_html__( 'Icon Hover Color', 'ratio' ),
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $search_icon_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_size',
				'default_value'	=> '',
				'label' => esc_html__( 'Icon Size', 'ratio' ),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_bottom_border_group = ratio_edge_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title' => esc_html__( 'Search Bottom Border', 'ratio' ),
				'description' => esc_html__( 'Define style for Search text input bottom border (for Fullscreen search type)', 'ratio' ),
				'name'		=> 'search_bottom_border_group'
			)
		);

		$search_bottom_border_row = ratio_edge_add_admin_row(
			array(
				'parent'	=> $search_bottom_border_group,
				'name'		=> 'search_icon_row'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $search_bottom_border_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_border_color',
				'label' => esc_html__( 'Border Color', 'ratio' ),
				'default_value'	=> ''
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent'		=> $search_bottom_border_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_border_focus_color',
				'label' => esc_html__( 'Border Focus Color', 'ratio' ),
				'default_value'	=> ''
			)
		);

	}

	add_action('ratio_edge_options_map', 'ratio_edge_search_options_map', 15);

}