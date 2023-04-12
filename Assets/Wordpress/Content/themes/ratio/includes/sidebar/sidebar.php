<?php

if(!function_exists('ratio_edge_register_sidebars')) {
    /**
     * Function that registers theme's sidebars
     */
    function ratio_edge_register_sidebars() {

        register_sidebar(array(
	        'name'          => esc_html__( 'Sidebar', 'ratio' ),
	        'id'            => 'sidebar',
	        'description'   => esc_html__( 'Default Sidebar area. In order to display this area you need to enable sidebar layout through global theme options or on page meta box options.', 'ratio' ),
	        'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="edgtf-widget-title">',
            'after_title' => '</h4>'
        ));

    }

    add_action('widgets_init', 'ratio_edge_register_sidebars');
}

if(!function_exists('ratio_edge_add_support_custom_sidebar')) {
    /**
     * Function that adds theme support for custom sidebars. It also creates RatioEdgeSidebar object
     */
    function ratio_edge_add_support_custom_sidebar() {
        add_theme_support('RatioEdgeSidebar');
        if (get_theme_support('RatioEdgeSidebar')) new RatioEdgeSidebar();
    }

    add_action('after_setup_theme', 'ratio_edge_add_support_custom_sidebar');
}
