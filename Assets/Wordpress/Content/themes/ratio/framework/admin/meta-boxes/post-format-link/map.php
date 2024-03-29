<?php

/*** Link Post Format ***/

$link_post_format_meta_box = ratio_edge_create_meta_box(
	array(
		'scope' => array('post'),
		'title' => esc_html__( 'Link Post Format', 'ratio' ),
		'name' => 'post_format_link_meta'
	)
);

ratio_edge_create_meta_box_field(
	array(
		'name'        => 'edgtf_post_link_link_meta',
		'type'        => 'text',
		'label' => esc_html__( 'Link', 'ratio' ),
		'description' => esc_html__( 'Enter link', 'ratio' ),
		'parent'      => $link_post_format_meta_box,

	)
);

