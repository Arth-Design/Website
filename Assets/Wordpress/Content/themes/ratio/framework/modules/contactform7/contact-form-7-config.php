<?php
if ( ! function_exists('ratio_edge_contact_form_map') ) {
	/**
	 * Map Contact Form 7 shortcode
	 * Hooks on vc_after_init action
	 */
	function ratio_edge_contact_form_map()
	{

		vc_add_param('contact-form-7', array(
			'type' => 'dropdown',
			'heading' => 'Style',
			'param_name' => 'html_class',
			'value' => array(
				esc_html__( 'Default', 'ratio' ) => 'default',
				esc_html__( 'Custom Style 1', 'ratio' ) => 'cf7_custom_style_1',
				esc_html__( 'Custom Style 2', 'ratio' ) => 'cf7_custom_style_2'
			),
			'description' => esc_html__( 'You can style each form element individually in Edge Options > Contact Form 7', 'ratio' )
		));

	}
	add_action('vc_after_init', 'ratio_edge_contact_form_map');
}
?>