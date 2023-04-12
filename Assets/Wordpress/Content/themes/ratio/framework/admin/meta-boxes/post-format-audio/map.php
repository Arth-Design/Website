<?php

/*** Audio Post Format ***/

$audio_post_format_meta_box = ratio_edge_create_meta_box(
	array(
		'scope' =>	array('post'),
		'title' => esc_html__( 'Audio Post Format', 'ratio' ),
		'name' 	=> 'post_format_audio_meta'
	)
);

ratio_edge_create_meta_box_field(
	array(
		'name'        => 'edgtf_post_audio_link_meta',
		'type'        => 'text',
		'label' => esc_html__( 'Link', 'ratio' ),
		'description' => esc_html__( 'Enter audion link', 'ratio' ),
		'parent'      => $audio_post_format_meta_box,

	)
);
