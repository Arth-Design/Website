<?php

$footer_meta_box = ratio_edge_create_meta_box(
    array(
        'scope' => array('page', 'portfolio-item', 'post'),
        'title' => esc_html__( 'Footer', 'ratio' ),
        'name' => 'footer_meta'
    )
);

    ratio_edge_create_meta_box_field(
        array(
            'name' => 'edgtf_disable_footer_meta',
            'type' => 'yesno',
            'default_value' => 'no',
            'label' => esc_html__( 'Disable Footer for this Page', 'ratio' ),
            'description' => esc_html__( 'Enabling this option will hide footer on this page', 'ratio' ),
            'parent' => $footer_meta_box,
        )
    );