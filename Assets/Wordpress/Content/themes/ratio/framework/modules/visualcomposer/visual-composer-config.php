<?php

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if(function_exists('vc_set_as_theme')) {
	vc_set_as_theme(true);
}

/**
 * Change path for overridden templates
 */
if(function_exists('vc_set_shortcodes_templates_dir')) {
	$dir = EDGE_ROOT_DIR . '/vc-templates';
	vc_set_shortcodes_templates_dir( $dir );
}

if ( ! function_exists('ratio_edge_configure_visual_composer') ) {
	/**
	 * Configuration for Visual Composer
	 * Hooks on vc_after_init action
	 */
	function ratio_edge_configure_visual_composer() {

		/**
		 * Removing shortcodes
		 */
		vc_remove_element("vc_wp_search");
		vc_remove_element("vc_wp_meta");
		vc_remove_element("vc_wp_recentcomments");
		vc_remove_element("vc_wp_calendar");
		vc_remove_element("vc_wp_pages");
		vc_remove_element("vc_wp_tagcloud");
		vc_remove_element("vc_wp_custommenu");
		vc_remove_element("vc_wp_text");
		vc_remove_element("vc_wp_posts");
		vc_remove_element("vc_wp_links");
		vc_remove_element("vc_wp_categories");
		vc_remove_element("vc_wp_archives");
		vc_remove_element("vc_wp_rss");
		vc_remove_element("vc_teaser_grid");
		vc_remove_element("vc_button");
		vc_remove_element("vc_cta_button");
		vc_remove_element("vc_cta_button2");
		vc_remove_element("vc_message");
		vc_remove_element("vc_tour");
		vc_remove_element("vc_progress_bar");
		vc_remove_element("vc_pie");
		vc_remove_element("vc_posts_slider");
		vc_remove_element("vc_toggle");
		vc_remove_element("vc_images_carousel");
		vc_remove_element("vc_posts_grid");
		vc_remove_element("vc_carousel");
		vc_remove_element("vc_gmaps");
		vc_remove_element("vc_cta");
		vc_remove_element("vc_round_chart");
		vc_remove_element("vc_line_chart");
		vc_remove_element("vc_tta_accordion");
		vc_remove_element("vc_tta_tour");
		vc_remove_element("vc_tta_tabs");
		vc_remove_element("vc_separator");
		vc_remove_element("vc_section");

		/**
		 * Remove unused parameters
		 */
		if (function_exists('vc_remove_param')) {
			vc_remove_param('vc_row', 'full_width');
			vc_remove_param('vc_row', 'full_height');
			vc_remove_param('vc_row', 'content_placement');
			vc_remove_param('vc_row', 'video_bg');
			vc_remove_param('vc_row', 'video_bg_url');
			vc_remove_param('vc_row', 'video_bg_parallax');
			vc_remove_param('vc_row', 'parallax');
			vc_remove_param('vc_row', 'parallax_image');
			vc_remove_param('vc_row', 'parallax_speed_video');
			vc_remove_param('vc_row', 'parallax_speed_bg');
			vc_remove_param('vc_row', 'gap');
			vc_remove_param('vc_row', 'columns_placement');
			vc_remove_param('vc_row', 'equal_height');
                        vc_remove_param('vc_text_separator', 'add_icon');
                        vc_remove_param('vc_text_separator', 'vc_icon');
                        vc_remove_param('vc_text_separator', 'i_icon_material');
                        vc_remove_param('vc_text_separator', 'i_icon_monosocial');
                        vc_remove_param('vc_text_separator', 'i_type');
                        vc_remove_param('vc_text_separator', 'i_icon_fontawesome');
                        vc_remove_param('vc_text_separator', 'i_icon_openiconic');
                        vc_remove_param('vc_text_separator', 'i_icon_typicons');
                        vc_remove_param('vc_text_separator', 'i_icon_entypo');
                        vc_remove_param('vc_text_separator', 'i_icon_linecons');
                        vc_remove_param('vc_text_separator', 'i_color');
                        vc_remove_param('vc_text_separator', 'i_custom_color');
                        vc_remove_param('vc_text_separator', 'i_background_color');
                        vc_remove_param('vc_text_separator', 'i_background_style');
                        vc_remove_param('vc_text_separator', 'i_custom_background_color');
                        vc_remove_param('vc_text_separator', 'i_size');
                        vc_remove_param('vc_text_separator', 'i_css_animation');

			vc_remove_param('vc_row_inner', 'content_placement');
			vc_remove_param('vc_row_inner', 'equal_height');
			vc_remove_param('vc_row_inner', 'gap');
		}

	}

	add_action('vc_after_init', 'ratio_edge_configure_visual_composer');

}


if ( ! function_exists('ratio_edge_configure_visual_composer_grid_elemets') ) {

	/**
	 * Configuration for Visual Composer for Grid Elements
	 * Hooks on vc_after_init action
	 */

	function ratio_edge_configure_visual_composer_grid_elemets() {

		/**
		 * Remove Grid Elements if grid elements disabled
		 */
		vc_remove_element('vc_basic_grid');
		vc_remove_element('vc_media_grid');
		vc_remove_element('vc_masonry_grid');
		vc_remove_element('vc_masonry_media_grid');
		vc_remove_element('vc_icon');
		vc_remove_element('vc_button2');
		vc_remove_element("vc_custom_heading");


		/**
		 * Remove unused parameters from grid elements
		 */
		if (function_exists('vc_remove_param')) {
			vc_remove_param('vc_basic_grid', 'button_style');
			vc_remove_param('vc_basic_grid', 'button_color');
			vc_remove_param('vc_basic_grid', 'button_size');
			vc_remove_param('vc_basic_grid', 'filter_color');
			vc_remove_param('vc_basic_grid', 'filter_style');
			vc_remove_param('vc_media_grid', 'button_style');
			vc_remove_param('vc_media_grid', 'button_color');
			vc_remove_param('vc_media_grid', 'button_size');
			vc_remove_param('vc_media_grid', 'filter_color');
			vc_remove_param('vc_media_grid', 'filter_style');
			vc_remove_param('vc_masonry_grid', 'button_style');
			vc_remove_param('vc_masonry_grid', 'button_color');
			vc_remove_param('vc_masonry_grid', 'button_size');
			vc_remove_param('vc_masonry_grid', 'filter_color');
			vc_remove_param('vc_masonry_grid', 'filter_style');
			vc_remove_param('vc_masonry_media_grid', 'button_style');
			vc_remove_param('vc_masonry_media_grid', 'button_color');
			vc_remove_param('vc_masonry_media_grid', 'button_size');
			vc_remove_param('vc_masonry_media_grid', 'filter_color');
			vc_remove_param('vc_masonry_media_grid', 'filter_style');
			vc_remove_param('vc_basic_grid', 'paging_color');
			vc_remove_param('vc_basic_grid', 'arrows_color');
			vc_remove_param('vc_media_grid', 'paging_color');
			vc_remove_param('vc_media_grid', 'arrows_color');
			vc_remove_param('vc_masonry_grid', 'paging_color');
			vc_remove_param('vc_masonry_grid', 'arrows_color');
			vc_remove_param('vc_masonry_media_grid', 'paging_color');
			vc_remove_param('vc_masonry_media_grid', 'arrows_color');
		}
	}
	add_action('vc_after_init', 'ratio_edge_configure_visual_composer_grid_elemets');
}


if ( ! function_exists('ratio_edge_configure_visual_composer_frontend_editor') ) {
	/**
	 * Configuration for Visual Composer FrontEnd Editor
	 * Hooks on vc_after_init action
	 */
	function ratio_edge_configure_visual_composer_frontend_editor() {

		/**
		 * Remove frontend editor
		 */
		if(function_exists('vc_disable_frontend')){
			vc_disable_frontend();
		}

	}
	add_action('vc_after_init', 'ratio_edge_configure_visual_composer_frontend_editor');
}


if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_Edgtf_Elements_Holder extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_Edgtf_Elements_Holder_Item extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_Edgtf_Tabs extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_Edgtf_Tab extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_Edgtf_Accordion extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_Edgtf_Accordion_Tab extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_Edgtf_Crossfade_Slider extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_Edgtf_Pricing_Tables extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_Edgtf_Process_Holder extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_Edgtf_Vertical_Split_Slider extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_Edgtf_Vertical_Split_Slider_Left_Panel extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_Edgtf_Vertical_Split_Slider_Right_Panel extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_Edgtf_Vertical_Split_Slider_Content_Item extends WPBakeryShortCodesContainer {}
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_Edgtf_Pricing_Table extends WPBakeryShortCode {}
	class WPBakeryShortCode_Edgtf_Process_Item extends WPBakeryShortCode {}
}

/*** Row ***/
if ( ! function_exists('ratio_edge_vc_row_map') ) {
	/**
	 * Map VC Row shortcode
	 * Hooks on vc_after_init action
	 */
	function ratio_edge_vc_row_map()
	{

		$animations = array(
			esc_html__( 'No animation', 'ratio' ) => '',
			esc_html__( 'Elements Shows From Left Side', 'ratio' ) => 'edgtf-element-from-left',
			esc_html__( 'Elements Shows From Right Side', 'ratio' ) => 'edgtf-element-from-right',
			esc_html__( 'Elements Shows From Top Side', 'ratio' ) => 'edgtf-element-from-top',
			esc_html__( 'Elements Shows From Bottom Side', 'ratio' ) => 'edgtf-element-from-bottom',
			esc_html__( 'Elements Shows From Fade', 'ratio' ) => 'edgtf-element-from-fade'
		);

		vc_add_param('vc_row', array(
			'type' => 'dropdown',
			'class' => '',
			'heading' => esc_html__( 'Row Type', 'ratio' ),
			'param_name' => 'row_type',
			'value' => array(
				esc_html__( 'Row', 'ratio' ) => 'row',
				esc_html__( 'Parallax', 'ratio' ) => 'parallax'
			)
		));

		vc_add_param('vc_row', array(
			'type' => 'dropdown',
			'class' => '',
			'heading' => esc_html__( 'Content Width', 'ratio' ),
			'param_name' => 'content_width',
			'value' => array(
				esc_html__( 'Full Width', 'ratio' ) => 'full-width',
				esc_html__( 'In Grid', 'ratio' ) => 'grid'
			)
		));

		vc_add_param('vc_row', array(
			'type' => 'dropdown',
			'class' => '',
			'heading' => esc_html__( 'Header Style', 'ratio' ),
			'param_name' => 'header_style',
			'value' => array(
				esc_html__( 'Default', 'ratio' ) => '',
				esc_html__( 'Light', 'ratio' ) => 'edgtf-light-header',
				esc_html__( 'Dark', 'ratio' ) => 'edgtf-dark-header'
			),
			'dependency' => Array('element' => 'row_type', 'value' => array('row', 'parallax'))
		));
		vc_add_param('vc_row', array(
			'type' => 'textfield',
			'class' => '',
			'heading' => esc_html__( 'Anchor ID', 'ratio' ),
			'param_name' => 'anchor',
			'value' => '',
			'description' => esc_html__( 'For example home', 'ratio' )
		));
		vc_add_param('vc_row', array(
			'type' => 'dropdown',
			'class' => '',
			'heading' => esc_html__( 'Content Aligment', 'ratio' ),
			'param_name' => 'content_aligment',
			'value' => array(
				esc_html__( 'Left', 'ratio' ) => 'left',
				esc_html__( 'Center', 'ratio' ) => 'center',
				esc_html__( 'Right', 'ratio' ) => 'right'
			)
		));

		vc_add_param('vc_row', array(
			'type' => 'dropdown',
			'class' => '',
			'heading' => esc_html__( 'Video Background', 'ratio' ),
			'value' => array(
				esc_html__( 'No', 'ratio' ) => '',
				esc_html__( 'Yes', 'ratio' ) => 'show_video'
			),
			'param_name' => 'video',
			'description' => '',
			'dependency' => Array('element' => 'row_type', 'value' => array('row'))
		));

		vc_add_param('vc_row', array(
			'type' => 'dropdown',
			'class' => '',
			'heading' => esc_html__( 'Video Overlay', 'ratio' ),
			'value' => array(
				esc_html__( 'No', 'ratio' ) => '',
				esc_html__( 'Yes', 'ratio' ) => 'show_video_overlay'
			),
			'param_name' => 'video_overlay',
			'description' => '',
			'dependency' => Array('element' => 'video', 'value' => array('show_video'))
		));

		vc_add_param('vc_row', array(
			'type' => 'attach_image',
			'class' => '',
			'heading' => esc_html__( 'Video Overlay Image (pattern)', 'ratio' ),
			'value' => '',
			'param_name' => 'video_overlay_image',
			'description' => '',
			'dependency' => Array('element' => 'video_overlay', 'value' => array('show_video_overlay'))
		));

		vc_add_param('vc_row', array(
			'type' => 'textfield',
			'class' => '',
			'heading' => esc_html__( 'Video Background (webm) File URL', 'ratio' ),
			'value' => '',
			'param_name' => 'video_webm',
			'description' => '',
			'dependency' => Array('element' => 'video', 'value' => array('show_video'))
		));

		vc_add_param('vc_row', array(
			'type' => 'textfield',
			'class' => '',
			'heading' => esc_html__( 'Video Background (mp4) file URL', 'ratio' ),
			'value' => '',
			'param_name' => 'video_mp4',
			'description' => '',
			'dependency' => Array('element' => 'video', 'value' => array('show_video'))
		));

		vc_add_param('vc_row', array(
			'type' => 'textfield',
			'class' => '',
			'heading' => esc_html__( 'Video Background (ogv) file URL', 'ratio' ),
			'value' => '',
			'param_name' => 'video_ogv',
			'description' => '',
			'dependency' => Array('element' => 'video', 'value' => array('show_video'))
		));

		vc_add_param('vc_row', array(
			'type' => 'attach_image',
			'class' => '',
			'heading' => esc_html__( 'Video Preview Image', 'ratio' ),
			'value' => '',
			'param_name' => 'video_image',
			'description' => '',
			'dependency' => Array('element' => 'video', 'value' => array('show_video'))
		));

		vc_add_param("vc_row", array(
			'type' => 'dropdown',
			'class' => '',
			'heading' => esc_html__( 'Full Screen Height', 'ratio' ),
			'param_name' => 'full_screen_section_height',
			'value' => array(
				esc_html__( 'No', 'ratio' ) => 'no',
				esc_html__( 'Yes', 'ratio' ) => 'yes'
			),
			'save_always' => true,
			'dependency' => Array('element' => 'row_type', 'value' => array('parallax'))
		));

		vc_add_param('vc_row', array(
			'type' => 'dropdown',
			'class' => '',
			'heading' => esc_html__( 'Vertically Align Content In Middle', 'ratio' ),
			'param_name' => 'vertically_align_content_in_middle',
			'value' => array(
				esc_html__( 'No', 'ratio' ) => 'no',
				esc_html__( 'Yes', 'ratio' ) => 'yes'
			),
			'dependency' => array('element' => 'full_screen_section_height', 'value' => 'yes')
		));

		vc_add_param('vc_row', array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Icon Scroll Down ', 'ratio' ),
			'param_name' => 'icon_scroll_down',
			"value" => array(
				esc_html__( 'No', 'ratio' ) => 'no',
				esc_html__( 'Yes', 'ratio' ) => 'yes'
			),
			'description' => '',
			'dependency' => array('element' => 'full_screen_section_height', 'value' => 'yes')

		));

		vc_add_param('vc_row', array(
			'type' => 'textfield',
			'class' => '',
			'heading' => esc_html__( 'Section Height', 'ratio' ),
			'param_name' => 'section_height',
			'value' => '',
			'dependency' => Array('element' => 'full_screen_section_height', 'value' => array('no'))
		));

		vc_add_param('vc_row', array(
			'type' => 'attach_image',
			'class' => '',
			'heading' => esc_html__( 'Parallax Background image', 'ratio' ),
			'value' => '',
			'param_name' => 'parallax_background_image',
			'description' => esc_html__( 'Please note that for parallax row type, background image from Design Options will not work so you should to fill this field', 'ratio' ),
			'dependency' => Array('element' => 'row_type', 'value' => array('parallax'))
		));

		vc_add_param('vc_row', array(
			'type' => 'textfield',
			'class' => '',
			'heading' => esc_html__( 'Parallax speed', 'ratio' ),
			'param_name' => 'parallax_speed',
			'value' => '',
			'dependency' => Array('element' => 'row_type', 'value' => array('parallax'))
		));


		vc_add_param('vc_row', array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'CSS Animation', 'ratio' ),
			'param_name' => 'css_animation',
			'value' => $animations,
			'description' => '',
			'dependency' => Array('element' => 'row_type', 'value' => array('row'))
		));

		vc_add_param('vc_row', array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Transition delay (ms)', 'ratio' ),
			'param_name' => 'transition_delay',
			'admin_label' => true,
			'value' => '',
			'description' => '',
			'dependency' => array('element' => 'css_animation', 'not_empty' => true)

		));

		vc_add_param('vc_row', array(
			'type' => 'dropdown',
			'group' => esc_html__( 'Design Options', 'ratio' ),
			'heading' => esc_html__( 'Background Gradient', 'ratio' ),
			'param_name' => 'background_gradient',
			'value' => array(
				esc_html__( 'No', 'ratio' ) => 'no',
				esc_html__( 'Yes', 'ratio' ) => 'yes'
			)
		));

		vc_add_param('vc_row', array(
				'type'        => 'colorpicker',
				'heading' => esc_html__( 'Gradient First Color', 'ratio' ),
				'param_name'  => 'gradient_first_color',
				'group' => esc_html__( 'Design Options', 'ratio' ),
				'dependency' => array('element' => 'background_gradient', 'value' => 'yes')
		));

		vc_add_param('vc_row', array(
				'type'        => 'colorpicker',
				'heading' => esc_html__( 'Gradient Second Color', 'ratio' ),
				'param_name'  => 'gradient_second_color',
				'group' => esc_html__( 'Design Options', 'ratio' ),
				'dependency' => array('element' => 'background_gradient', 'value' => 'yes')
		));

		/*** Row Inner ***/

		vc_add_param('vc_row_inner', array(
			'type' => 'dropdown',
			'class' => '',
			'heading' => esc_html__( 'Row Type', 'ratio' ),
			'param_name' => 'row_type',
			'value' => array(
				esc_html__( 'Row', 'ratio' ) => 'row',
				esc_html__( 'Parallax', 'ratio' ) => 'parallax'
			)
		));

		vc_add_param('vc_row_inner', array(
			'type' => 'dropdown',
			'class' => '',
			'heading' => esc_html__( 'Content Width', 'ratio' ),
			'param_name' => 'content_width',
			'value' => array(
				esc_html__( 'Full Width', 'ratio' ) => 'full-width',
				esc_html__( 'In Grid', 'ratio' ) => 'grid'
			)
		));

		vc_add_param("vc_row_inner", array(
			'type' => 'dropdown',
			'class' => '',
			'heading' => esc_html__( 'Full Screen Height', 'ratio' ),
			'param_name' => 'full_screen_section_height',
			'value' => array(
				esc_html__( 'No', 'ratio' ) => 'no',
				esc_html__( 'Yes', 'ratio' ) => 'yes'
			),
			'save_always' => true,
			'dependency' => Array('element' => 'row_type', 'value' => array('parallax'))
		));

		vc_add_param('vc_row_inner', array(
			'type' => 'dropdown',
			'class' => '',
			'heading' => esc_html__( 'Vertically Align Content In Middle', 'ratio' ),
			'param_name' => 'vertically_align_content_in_middle',
			'value' => array(
				esc_html__( 'No', 'ratio' ) => 'no',
				esc_html__( 'Yes', 'ratio' ) => 'yes'
			),
			'dependency' => array('element' => 'full_screen_section_height', 'value' => 'yes')
		));

		vc_add_param('vc_row_inner', array(
			'type' => 'textfield',
			'class' => '',
			'heading' => esc_html__( 'Section Height', 'ratio' ),
			'param_name' => 'section_height',
			'value' => '',
			'dependency' => Array('element' => 'full_screen_section_height', 'value' => array('no'))
		));

		vc_add_param('vc_row_inner', array(
			'type' => 'attach_image',
			'class' => '',
			'heading' => esc_html__( 'Parallax Background image', 'ratio' ),
			'value' => '',
			'param_name' => 'parallax_background_image',
			'description' => esc_html__( 'Please note that for parallax row type, background image from Design Options will not work so you should to fill this field', 'ratio' ),
			'dependency' => Array('element' => 'row_type', 'value' => array('parallax'))
		));

		vc_add_param('vc_row_inner', array(
			'type' => 'textfield',
			'class' => '',
			'heading' => esc_html__( 'Parallax speed', 'ratio' ),
			'param_name' => 'parallax_speed',
			'value' => '',
			'dependency' => Array('element' => 'row_type', 'value' => array('parallax'))
		));
		vc_add_param('vc_row_inner', array(
			'type' => 'dropdown',
			'class' => '',
			'heading' => esc_html__( 'Content Aligment', 'ratio' ),
			'param_name' => 'content_aligment',
			'value' => array(
				esc_html__( 'Left', 'ratio' ) => 'left',
				esc_html__( 'Center', 'ratio' ) => 'center',
				esc_html__( 'Right', 'ratio' ) => 'right'
			)
		));

		vc_add_param('vc_row_inner', array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'CSS Animation', 'ratio' ),
			'param_name' => 'css_animation',
			'admin_label' => true,
			'value' => $animations,
			'description' => '',
			'dependency' => Array('element' => 'row_type', 'value' => array('row'))

		));

		vc_add_param('vc_row_inner', array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Transition delay (ms)', 'ratio' ),
			'param_name' => 'transition_delay',
			'admin_label' => true,
			'value' => '',
			'description' => '',
			'dependency' => Array('element' => 'row_type', 'value' => array('row'))

		));

		vc_add_param('vc_row_inner', array(
			'type'        => 'dropdown',
			'heading' => esc_html__( 'Enable Row Overlap?', 'ratio' ),
			'param_name'  => 'enable_row_overlap',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'No', 'ratio' ) => 'no',
				esc_html__( 'Yes', 'ratio' ) => 'yes'
			),
			'description' => '',
			'dependency'  => Array('element' => 'row_type', 'value' => array('row'))
		));

		vc_add_param('vc_row_inner', array(
			'type'        => 'dropdown',
			'heading' => esc_html__( 'Overlap Size', 'ratio' ),
			'param_name'  => 'overlap_size',
			'value'       => array(
				esc_html__( 'Large', 'ratio' ) => 'large',
				esc_html__( 'Small', 'ratio' ) => 'small'
			),
			'dependency'  => Array('element' => 'enable_row_overlap', 'value' => array('yes'))
		));

		vc_add_param('vc_row_inner', array(
			'type'        => 'dropdown',
			'heading' => esc_html__( 'Use Row as a Box?', 'ratio' ),
			'param_name'  => 'use_row_box',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'No', 'ratio' ) => 'no',
				esc_html__( 'Yes', 'ratio' ) => 'yes'
			),
			'description' => '',
			'dependency'  => Array('element' => 'enable_row_overlap', 'value' => array('yes'))
		));

		vc_add_param('vc_row_inner', array(
			'type' => 'dropdown',
			'group' => esc_html__( 'Design Options', 'ratio' ),
			'heading' => esc_html__( 'Background Gradient', 'ratio' ),
			'param_name' => 'background_gradient',
			'value' => array(
				esc_html__( 'No', 'ratio' ) => 'no',
				esc_html__( 'Yes', 'ratio' ) => 'yes'
			)
		));

		vc_add_param('vc_row_inner', array(
			'type'        => 'colorpicker',
			'heading' => esc_html__( 'Gradient First Color', 'ratio' ),
			'param_name'  => 'gradient_first_color',
			'group' => esc_html__( 'Design Options', 'ratio' ),
			'dependency' => array('element' => 'background_gradient', 'value' => 'yes')
		));

		vc_add_param('vc_row_inner', array(
			'type'        => 'colorpicker',
			'heading' => esc_html__( 'Gradient Second Color', 'ratio' ),
			'param_name'  => 'gradient_second_color',
			'group' => esc_html__( 'Design Options', 'ratio' ),
			'dependency' => array('element' => 'background_gradient', 'value' => 'yes')
		));
	}

	add_action('vc_after_init', 'ratio_edge_vc_row_map');
}
