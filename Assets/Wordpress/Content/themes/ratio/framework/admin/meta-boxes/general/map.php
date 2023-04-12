<?php

$general_meta_box = ratio_edge_create_meta_box(
    array(
        'scope' => array('page', 'portfolio-item', 'post'),
        'title' => esc_html__( 'General', 'ratio' ),
        'name' => 'general_meta'
    )
);


    ratio_edge_create_meta_box_field(
        array(
            'name' => 'edgtf_page_background_color_meta',
            'type' => 'color',
            'default_value' => '',
            'label' => esc_html__( 'Page Background Color', 'ratio' ),
            'description' => esc_html__( 'Choose background color for page content', 'ratio' ),
            'parent' => $general_meta_box
        )
    );
	
	ratio_edge_create_meta_box_field(
		array(
			'name' => 'edgtf_page_padding_meta',
			'type' => 'text',
			'default_value' => '',
			'label' => esc_html__( 'Page Padding', 'ratio' ),
			'description' => esc_html__( 'Insert padding in format 10px 10px 10px 10px', 'ratio' ),
			'parent' => $general_meta_box
		)
	);

    ratio_edge_create_meta_box_field(
        array(
            'name' => 'edgtf_page_slider_meta',
            'type' => 'text',
            'default_value' => '',
            'label' => esc_html__( 'Slider Shortcode', 'ratio' ),
            'description' => esc_html__( 'Paste your slider shortcode here', 'ratio' ),
            'parent' => $general_meta_box
        )
    );

    ratio_edge_create_meta_box_field(
        array(
            'name'        => 'edgtf_page_comments_meta',
            'type'        => 'selectblank',
            'label' => esc_html__( 'Show Comments', 'ratio' ),
            'description' => esc_html__( 'Enabling this option will show comments on your page', 'ratio' ),
            'parent'      => $general_meta_box,
            'options'     => array(
                'yes' => esc_html__( 'Yes', 'ratio' ),
                'no' => esc_html__( 'No', 'ratio' ),
            )
        )
    );

	$boxed_option      = ratio_edge_options()->getOptionValue('boxed');
	$boxed_default_dependency = array(
		'' => '#edgtf_boxed_container'
	);

	$boxed_show_array = array(
		'yes' => '#edgtf_boxed_container'
	);

	$boxed_hide_array = array(
		'no' => '#edgtf_boxed_container'
	);

	if($boxed_option === 'yes') {
		$boxed_show_array = array_merge($boxed_show_array, $boxed_default_dependency);
		$temp_boxed_no = array(
			'hidden_value' => 'no'
		);
	} else {
		$boxed_hide_array = array_merge($boxed_hide_array, $boxed_default_dependency);
		$temp_boxed_no = array(
			'hidden_values'   => array('','no')
		);
	}

	ratio_edge_create_meta_box_field(
		array(
			'name'          => 'edgtf_boxed_meta',
			'type'          => 'select',
			'label' => esc_html__( 'Boxed Layout', 'ratio' ),
			'description'   => '',
			'parent'        => $general_meta_box,
			'default_value' => '',
			'options'     => array(
				'' => esc_html__( 'Default', 'ratio' ),
				'yes' => esc_html__( 'Yes', 'ratio' ),
				'no' => esc_html__( 'No', 'ratio' )
			),
			'args' => array(
				"dependence" => true,
				'show'       => $boxed_show_array,
				'hide'       => $boxed_hide_array
			)
		)
	);

	$boxed_container = ratio_edge_add_admin_container_no_style(
		array_merge(
			array(
				'parent'            => $general_meta_box,
				'name'              => 'boxed_container',
				'hidden_property'   => 'edgtf_boxed_meta'
			),
			$temp_boxed_no
		)
	);

	ratio_edge_create_meta_box_field(
		array(
			'name'          => 'edgtf_page_background_color_in_box_meta',
			'type'          => 'color',
			'label' => esc_html__( 'Page Background Color', 'ratio' ),
			'description' => esc_html__( 'Choose the page background color outside box.', 'ratio' ),
			'parent'        => $boxed_container
		)
	);

	ratio_edge_create_meta_box_field(
		array(
			'name'          => 'edgtf_boxed_background_image_meta',
			'type'          => 'image',
			'label' => esc_html__( 'Background Image', 'ratio' ),
			'description' => esc_html__( 'Choose an image to be displayed in background', 'ratio' ),
			'parent'        => $boxed_container
		)
	);

	ratio_edge_create_meta_box_field(
		array(
			'name'          => 'edgtf_boxed_background_image_repeating_meta',
			'type'          => 'select',
			'default_value' => 'no',
			'label' => esc_html__( 'Use Background Image as Pattern', 'ratio' ),
			'description' => esc_html__( 'Set this option to yes to use the background image as repeating pattern', 'ratio' ),
			'parent'        => $boxed_container,
			'options'       => array(
				'no' => esc_html__( 'No', 'ratio' ),
				'yes' => esc_html__( 'Yes', 'ratio' )

			)
		)
	);

	ratio_edge_create_meta_box_field(
		array(
			'name'          => 'edgtf_boxed_background_image_attachment_meta',
			'type'          => 'select',
			'default_value' => 'fixed',
			'label' => esc_html__( 'Background Image Behaviour', 'ratio' ),
			'description' => esc_html__( 'Choose background image behaviour', 'ratio' ),
			'parent'        => $boxed_container,
			'options'       => array(
				'fixed' => esc_html__( 'Fixed', 'ratio' ),
				'scroll' => esc_html__( 'Scroll', 'ratio' )
			)
		)
	);