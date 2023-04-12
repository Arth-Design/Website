<?php

$custom_sidebars = ratio_edge_get_custom_sidebars();

$sidebar_meta_box = ratio_edge_create_meta_box(
    array(
        'scope' => array('page', 'portfolio-item', 'post'),
        'title' => esc_html__( 'Sidebar', 'ratio' ),
        'name' => 'sidebar_meta'
    )
);

    ratio_edge_create_meta_box_field(
        array(
            'name'        => 'edgtf_sidebar_meta',
            'type'        => 'select',
            'label' => esc_html__( 'Layout', 'ratio' ),
            'description' => esc_html__( 'Choose the sidebar layout', 'ratio' ),
            'parent'      => $sidebar_meta_box,
            'options'     => array(
						'' => esc_html__( 'Default', 'ratio' ),
						'no-sidebar' => esc_html__( 'No Sidebar', 'ratio' ),
						'sidebar-33-right' => esc_html__( 'Sidebar 1/3 Right', 'ratio' ),
						'sidebar-25-right' => esc_html__( 'Sidebar 1/4 Right', 'ratio' ),
						'sidebar-33-left' => esc_html__( 'Sidebar 1/3 Left', 'ratio' ),
						'sidebar-25-left' => esc_html__( 'Sidebar 1/4 Left', 'ratio' ),
					)
        )
    );

if(count($custom_sidebars) > 0) {
    ratio_edge_create_meta_box_field(array(
        'name' => 'edgtf_custom_sidebar_meta',
        'type' => 'selectblank',
        'label' => esc_html__( 'Choose Widget Area in Sidebar', 'ratio' ),
        'description' => esc_html__( 'Choose Custom Widget area to display in Sidebar', 'ratio' ),
        'parent' => $sidebar_meta_box,
        'options' => $custom_sidebars
    ));
}
