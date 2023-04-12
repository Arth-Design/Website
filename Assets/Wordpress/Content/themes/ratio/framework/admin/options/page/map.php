<?php

if ( ! function_exists('ratio_edge_page_options_map') ) {

    function ratio_edge_page_options_map() {

        ratio_edge_add_admin_page(
            array(
                'slug'  => '_page_page',
                'title' => esc_html__( 'Page', 'ratio' ),
                'icon'  => 'fa fa-file-o'
            )
        );

        $custom_sidebars = ratio_edge_get_custom_sidebars();

        $panel_sidebar = ratio_edge_add_admin_panel(
            array(
                'page'  => '_page_page',
                'name'  => 'panel_sidebar',
                'title' => esc_html__( 'Design Style', 'ratio' )
            )
        );

        ratio_edge_add_admin_field(array(
            'name'        => 'page_sidebar_layout',
            'type'        => 'select',
            'label' => esc_html__( 'Sidebar Layout', 'ratio' ),
            'description' => esc_html__( 'Choose a sidebar layout for pages', 'ratio' ),
            'default_value' => 'default',
            'parent'      => $panel_sidebar,
            'options'     => array(
                'default' => esc_html__( 'No Sidebar', 'ratio' ),
                'sidebar-33-right' => esc_html__( 'Sidebar 1/3 Right', 'ratio' ),
                'sidebar-25-right' => esc_html__( 'Sidebar 1/4 Right', 'ratio' ),
                'sidebar-33-left' => esc_html__( 'Sidebar 1/3 Left', 'ratio' ),
                'sidebar-25-left' => esc_html__( 'Sidebar 1/4 Left', 'ratio' )
            )
        ));


        if(count($custom_sidebars) > 0) {
            ratio_edge_add_admin_field(array(
                'name' => 'page_custom_sidebar',
                'type' => 'selectblank',
                'label' => esc_html__( 'Sidebar to Display', 'ratio' ),
                'description' => esc_html__( 'Choose a sidebar to display on pages. Default sidebar is Sidebar', 'ratio' ),
                'parent' => $panel_sidebar,
                'options' => $custom_sidebars
            ));
        }

        ratio_edge_add_admin_field(array(
            'name'        => 'page_show_comments',
            'type'        => 'yesno',
            'label' => esc_html__( 'Show Comments', 'ratio' ),
            'description' => esc_html__( 'Enabling this option will show comments on your page', 'ratio' ),
            'default_value' => 'no',
            'parent'      => $panel_sidebar
        ));

    }

    add_action( 'ratio_edge_options_map', 'ratio_edge_page_options_map', 8);

}