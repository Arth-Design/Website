<?php

if(!function_exists('ratio_edge_is_responsive_on')) {
    /**
     * Checks whether responsive mode is enabled in theme options
     * @return bool
     */
    function ratio_edge_is_responsive_on() {
        return ratio_edge_options()->getOptionValue('responsiveness') !== 'no';
    }
}

if ( ! function_exists( 'ratio_edge_get_button_html' ) ) {
	/**
	 * Calls button shortcode with given parameters and returns it's output
	 *
	 * @param $params
	 *
	 * @return mixed|string
	 */
	function ratio_edge_get_button_html( $params ) {
		$button_html = ratio_edge_execute_shortcode( 'edgtf_button', $params );
		$button_html = str_replace( "\n", '', $button_html );
		
		if ( empty( $button_html ) ) {
			$button_html = '<input type="submit" class="edgtf-btn edgtf-btn-medium edgtf-btn-solid edgtf-has-hover" value="' . esc_html( $params['text'] ) . '"/>';
		}
		
		return $button_html;
	}
}

if(!function_exists('ratio_edge_get_social_share_html')) {
	/**
	 * Calls button shortcode with given parameters and returns it's output
	 * @param $params
	 *
	 * @return mixed|string
	 */
	function ratio_edge_get_social_share_html($params = array()) {
		return ratio_edge_core_installed() ? ratio_edge_execute_shortcode('edgtf_social_share', $params) : '';
	}
}