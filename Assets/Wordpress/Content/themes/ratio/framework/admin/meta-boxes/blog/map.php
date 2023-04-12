<?php

$edgt_blog_categories = array();
$categories = get_categories();
foreach($categories as $category) {
    $edgt_blog_categories[$category->slug] = $category->name;
}

$blog_meta_box = ratio_edge_create_meta_box(
    array(
        'scope' => array('page'),
        'title' => esc_html__( 'Blog', 'ratio' ),
        'name' => 'blog_meta'
    )
);

    ratio_edge_create_meta_box_field(
        array(
            'name'        => 'edgtf_blog_category_meta',
            'type'        => 'selectblank',
            'label' => esc_html__( 'Blog Category', 'ratio' ),
            'description' => esc_html__( 'Choose category of posts to display (leave empty to display all categories)', 'ratio' ),
            'parent'      => $blog_meta_box,
            'options'     => $edgt_blog_categories
        )
    );

    ratio_edge_create_meta_box_field(
        array(
            'name'        => 'edgtf_show_posts_per_page_meta',
            'type'        => 'text',
            'label' => esc_html__( 'Number of Posts', 'ratio' ),
            'description' => esc_html__( 'Enter the number of posts to display', 'ratio' ),
            'parent'      => $blog_meta_box,
            'options'     => $edgt_blog_categories,
            'args'        => array("col_width" => 3)
        )
    );
	

