<?php

/*** Video Post Format ***/

$video_post_format_meta_box = ratio_edge_create_meta_box(
	array(
		'scope' =>	array('post'),
		'title' => esc_html__( 'Video Post Format', 'ratio' ),
		'name' 	=> 'post_format_video_meta'
	)
);

ratio_edge_create_meta_box_field(
	array(
		'name'        => 'edgtf_video_type_meta',
		'type'        => 'select',
		'label' => esc_html__( 'Video Type', 'ratio' ),
		'description' => esc_html__( 'Choose video type', 'ratio' ),
		'parent'      => $video_post_format_meta_box,
		'default_value' => 'youtube',
		'options'     => array(
			'youtube' => esc_html__( 'Youtube', 'ratio' ),
			'vimeo' => esc_html__( 'Vimeo', 'ratio' ),
			'self' => esc_html__( 'Self Hosted', 'ratio' )
		),
		'args' => array(
		'dependence' => true,
		'hide' => array(
			'youtube' => '#edgtf_edgtf_video_self_hosted_container',
			'vimeo' => '#edgtf_edgtf_video_self_hosted_container',
			'self' => '#edgtf_edgtf_video_embedded_container'
		),
		'show' => array(
			'youtube' => '#edgtf_edgtf_video_embedded_container',
			'vimeo' => '#edgtf_edgtf_video_embedded_container',
			'self' => '#edgtf_edgtf_video_self_hosted_container')
	)
	)
);

$edgtf_video_embedded_container = ratio_edge_add_admin_container(
	array(
		'parent' => $video_post_format_meta_box,
		'name' => 'edgtf_video_embedded_container',
		'hidden_property' => 'edgtf_video_type_meta',
		'hidden_value' => 'self'
	)
);

$edgtf_video_self_hosted_container = ratio_edge_add_admin_container(
	array(
		'parent' => $video_post_format_meta_box,
		'name' => 'edgtf_video_self_hosted_container',
		'hidden_property' => 'edgtf_video_type_meta',
		'hidden_values' => array('youtube', 'vimeo')
	)
);



ratio_edge_create_meta_box_field(
	array(
		'name'        => 'edgtf_post_video_id_meta',
		'type'        => 'text',
		'label' => esc_html__( 'Video ID', 'ratio' ),
		'description' => esc_html__( 'Enter Video ID', 'ratio' ),
		'parent'      => $edgtf_video_embedded_container,

	)
);


ratio_edge_create_meta_box_field(
	array(
		'name'        => 'edgtf_post_video_image_meta',
		'type'        => 'image',
		'label' => esc_html__( 'Video Image', 'ratio' ),
		'description' => esc_html__( 'Upload video image', 'ratio' ),
		'parent'      => $edgtf_video_self_hosted_container,

	)
);

ratio_edge_create_meta_box_field(
	array(
		'name'        => 'edgtf_post_video_webm_link_meta',
		'type'        => 'text',
		'label' => esc_html__( 'Video WEBM', 'ratio' ),
		'description' => esc_html__( 'Enter video URL for WEBM format', 'ratio' ),
		'parent'      => $edgtf_video_self_hosted_container,

	)
);

ratio_edge_create_meta_box_field(
	array(
		'name'        => 'edgtf_post_video_mp4_link_meta',
		'type'        => 'text',
		'label' => esc_html__( 'Video MP4', 'ratio' ),
		'description' => esc_html__( 'Enter video URL for MP4 format', 'ratio' ),
		'parent'      => $edgtf_video_self_hosted_container,

	)
);

ratio_edge_create_meta_box_field(
	array(
		'name'        => 'edgtf_post_video_ogv_link_meta',
		'type'        => 'text',
		'label' => esc_html__( 'Video OGV', 'ratio' ),
		'description' => esc_html__( 'Enter video URL for OGV format', 'ratio' ),
		'parent'      => $edgtf_video_self_hosted_container,

	)
);