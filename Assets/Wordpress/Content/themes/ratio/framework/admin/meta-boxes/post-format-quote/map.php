<?php

/*** Quote Post Format ***/

$quote_post_format_meta_box = ratio_edge_create_meta_box(
	array(
		'scope' =>	array('post'),
		'title' => esc_html__( 'Quote Post Format', 'ratio' ),
		'name' 	=> 'post_format_quote_meta'
	)
);

ratio_edge_create_meta_box_field(
	array(
		'name'        => 'edgtf_post_quote_text_meta',
		'type'        => 'text',
		'label' => esc_html__( 'Quote Text', 'ratio' ),
		'description' => esc_html__( 'Enter Quote text', 'ratio' ),
		'parent'      => $quote_post_format_meta_box,

	)
);
