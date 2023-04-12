<?php

if ( ! function_exists( 'ratio_edge_register_widgets' ) ) {
	function ratio_edge_register_widgets() {
		$widgets = array(
			'RatioEdgeLatestPosts',
			'RatioEdgeSearchOpener',
			'RatioEdgeSideAreaOpener',
			'RatioEdgeStickySidebar',
			'RatioEdgeSocialIconWidget',
			'RatioEdgeSeparatorWidget'
		);
		
		if ( edgt_core_theme_installed() && ratio_edge_is_woocommerce_installed() ) {
			$widgets[] = 'RatioEdgeWoocommerceDropdownCart';
		}
		
		sort( $widgets );
		
		foreach ( $widgets as $widget ) {
			register_widget( $widget );
		}
	}
	
	add_action( 'widgets_init', 'ratio_edge_register_widgets' );
}