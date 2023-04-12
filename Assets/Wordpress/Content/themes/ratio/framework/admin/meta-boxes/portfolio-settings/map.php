<?php

if(!function_exists('ratio_edge_map_portfolio_settings')) {
    function ratio_edge_map_portfolio_settings() {
        $meta_box = ratio_edge_create_meta_box(array(
            'scope' => 'portfolio-item',
            'title' => esc_html__( 'Portfolio Settings', 'ratio' ),
            'name'  => 'portfolio_settings_meta_box'
        ));

        ratio_edge_create_meta_box_field(array(
            'name'        => 'edgtf_portfolio_single_template_meta',
            'type'        => 'select',
            'label' => esc_html__( 'Portfolio Type', 'ratio' ),
            'description' => esc_html__( 'Choose a default type for Single Project pages', 'ratio' ),
            'parent'      => $meta_box,
            'options'     => array(
                '' => esc_html__( 'Default', 'ratio' ),
                'small-images' => esc_html__( 'Portfolio small images', 'ratio' ),
                'small-slider' => esc_html__( 'Portfolio small slider', 'ratio' ),
                'big-images' => esc_html__( 'Portfolio big images', 'ratio' ),
                'big-slider' => esc_html__( 'Portfolio big slider', 'ratio' ),
                'gallery' => esc_html__( 'Portfolio gallery', 'ratio' ),
                'split-screen' => esc_html__( 'Portfolio split screen', 'ratio' ),
                'full-screen-slider'=> 'Portfolio full screen slider',
                'small-masonry' => esc_html__( 'Portfolio small masonry', 'ratio' ),
                'big-masonry' => esc_html__( 'Portfolio big masonry', 'ratio' ),
                'custom' => esc_html__( 'Portfolio custom', 'ratio' ),
                'full-width-custom' => esc_html__( 'Portfolio full width custom', 'ratio' ),
            )
        ));

        $all_pages = array();
        $pages     = get_pages();
        foreach($pages as $page) {
            $all_pages[$page->ID] = $page->post_title;
        }

        ratio_edge_create_meta_box_field(array(
            'name'        => 'portfolio_single_back_to_link',
            'type'        => 'select',
            'label' => esc_html__( 'Back To Link', 'ratio' ),
            'description' => esc_html__( 'Choose Back To page to link from portfolio Single Project page', 'ratio' ),
            'parent'      => $meta_box,
            'options'     => $all_pages
        ));

        ratio_edge_create_meta_box_field(array(
            'name'        => 'portfolio_external_link',
            'type'        => 'text',
            'label' => esc_html__( 'Portfolio External Link', 'ratio' ),
            'description' => esc_html__( 'Enter URL to link from Portfolio List page', 'ratio' ),
            'parent'      => $meta_box,
            'args'        => array(
                'col_width' => 3
            )
        ));

        ratio_edge_create_meta_box_field(array(
            'name'        => 'portfolio_masonry_dimenisions',
            'type'        => 'select',
            'label' => esc_html__( 'Dimensions for Masonry', 'ratio' ),
            'description' => esc_html__( 'Choose image layout when it appears in Masonry type portfolio lists', 'ratio' ),
            'parent'      => $meta_box,
            'options'     => array(
                'default' => esc_html__( 'Default', 'ratio' ),
                'large_width' => esc_html__( 'Large width', 'ratio' ),
                'large_height' => esc_html__( 'Large height', 'ratio' ),
                'large_width_height' => esc_html__( 'Large width/height', 'ratio' )
            )
        ));
    }

    add_action('ratio_edge_meta_boxes_map', 'ratio_edge_map_portfolio_settings');
}