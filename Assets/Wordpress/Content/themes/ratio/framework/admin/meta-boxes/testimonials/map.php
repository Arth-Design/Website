<?php

//Testimonials

$testimonial_meta_box = ratio_edge_create_meta_box(
    array(
        'scope' => array('testimonials'),
        'title' => esc_html__( 'Testimonial', 'ratio' ),
        'name' => 'testimonial_meta'
    )
);

    ratio_edge_create_meta_box_field(
        array(
            'name'        	=> 'edgtf_testimonial_title',
            'type'        	=> 'text',
            'label' => esc_html__( 'Title', 'ratio' ),
            'description' => esc_html__( 'Enter testimonial title', 'ratio' ),
            'parent'      	=> $testimonial_meta_box,
        )
    );


    ratio_edge_create_meta_box_field(
        array(
            'name'        	=> 'edgtf_testimonial_author',
            'type'        	=> 'text',
            'label' => esc_html__( 'Author', 'ratio' ),
            'description' => esc_html__( 'Enter author name', 'ratio' ),
            'parent'      	=> $testimonial_meta_box,
        )
    );

    ratio_edge_create_meta_box_field(
        array(
            'name'        	=> 'edgtf_testimonial_author_position',
            'type'        	=> 'text',
            'label' => esc_html__( 'Job Position', 'ratio' ),
            'description' => esc_html__( 'Enter job position', 'ratio' ),
            'parent'      	=> $testimonial_meta_box,
        )
    );

    ratio_edge_create_meta_box_field(
        array(
            'name'        	=> 'edgtf_testimonial_text',
            'type'        	=> 'text',
            'label' => esc_html__( 'Text', 'ratio' ),
            'description' => esc_html__( 'Enter testimonial text', 'ratio' ),
            'parent'      	=> $testimonial_meta_box,
        )
    );