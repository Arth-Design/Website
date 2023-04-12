<?php

if ( ! function_exists('ratio_edge_portfolio_options_map') ) {

	function ratio_edge_portfolio_options_map() {

		ratio_edge_add_admin_page(array(
			'slug'  => '_portfolio',
			'title' => esc_html__( 'Portfolio', 'ratio' ),
			'icon'  => 'fa fa-camera-retro'
		));

		$panel = ratio_edge_add_admin_panel(array(
			'title' => esc_html__( 'Portfolio Single', 'ratio' ),
			'name'  => 'panel_portfolio_single',
			'page'  => '_portfolio'
		));

		ratio_edge_add_admin_field(array(
			'name'        => 'portfolio_single_template',
			'type'        => 'select',
			'label' => esc_html__( 'Portfolio Type', 'ratio' ),
			'default_value'	=> 'small-images',
			'description' => esc_html__( 'Choose a default type for Single Project pages', 'ratio' ),
			'parent'      => $panel,
			'options'     => array(
				'small-images' => esc_html__( 'Portfolio small images', 'ratio' ),
				'small-slider' => esc_html__( 'Portfolio small slider', 'ratio' ),
				'big-images' => esc_html__( 'Portfolio big images', 'ratio' ),
				'big-slider' => esc_html__( 'Portfolio big slider', 'ratio' ),
				'small-masonry' => esc_html__( 'Portfolio small masonry', 'ratio' ),
				'big-masonry' => esc_html__( 'Portfolio big masonry', 'ratio' ),
				'gallery' => esc_html__( 'Portfolio gallery', 'ratio' ),
                'split-screen' => esc_html__( 'Portfolio split screen', 'ratio' ),
                'full-screen-slider' => esc_html__( 'Portfolio full screen slider', 'ratio' ),
				'custom' => esc_html__( 'Portfolio custom', 'ratio' ),
				'full-width-custom' => esc_html__( 'Portfolio full width custom', 'ratio' ),
			)
		));

        ratio_edge_add_admin_field(array(
            'name'          => 'portfolio_single_show_related',
            'type'          => 'yesno',
            'label' => esc_html__( 'Show Related Items', 'ratio' ),
            'description' => esc_html__( 'Enabling this option will display related items on Single Project pages.', 'ratio' ),
            'parent'        => $panel,
            'default_value' => 'yes'
        ));
        
		ratio_edge_add_admin_field(array(
			'name'          => 'portfolio_single_lightbox_images',
			'type'          => 'yesno',
			'label' => esc_html__( 'Lightbox for Images', 'ratio' ),
			'description' => esc_html__( 'Enabling this option will turn on lightbox functionality for projects with images.', 'ratio' ),
			'parent'        => $panel,
			'default_value' => 'yes'
		));

		ratio_edge_add_admin_field(array(
			'name'          => 'portfolio_single_lightbox_videos',
			'type'          => 'yesno',
			'label' => esc_html__( 'Lightbox for Videos', 'ratio' ),
			'description' => esc_html__( 'Enabling this option will turn on lightbox functionality for YouTube/Vimeo projects.', 'ratio' ),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		ratio_edge_add_admin_field(array(
			'name'          => 'portfolio_single_hide_categories',
			'type'          => 'yesno',
			'label' => esc_html__( 'Hide Categories', 'ratio' ),
			'description' => esc_html__( 'Enabling this option will disable category meta description on Single Projects.', 'ratio' ),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		ratio_edge_add_admin_field(array(
			'name'          => 'portfolio_single_hide_date',
			'type'          => 'yesno',
			'label' => esc_html__( 'Hide Date', 'ratio' ),
			'description' => esc_html__( 'Enabling this option will disable date meta on Single Projects.', 'ratio' ),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		ratio_edge_add_admin_field(array(
			'name'          => 'portfolio_single_comments',
			'type'          => 'yesno',
			'label' => esc_html__( 'Show Comments', 'ratio' ),
			'description' => esc_html__( 'Enabling this option will show comments on your page.', 'ratio' ),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		ratio_edge_add_admin_field(array(
			'name'          => 'portfolio_single_sticky_sidebar',
			'type'          => 'yesno',
			'label' => esc_html__( 'Sticky Side Text', 'ratio' ),
			'description' => esc_html__( 'Enabling this option will make side text sticky on Single Project pages', 'ratio' ),
			'parent'        => $panel,
			'default_value' => 'yes'
		));

		ratio_edge_add_admin_field(array(
			'name'          => 'portfolio_single_hide_pagination',
			'type'          => 'yesno',
			'label' => esc_html__( 'Hide Pagination', 'ratio' ),
			'description' => esc_html__( 'Enabling this option will turn off portfolio pagination functionality.', 'ratio' ),
			'parent'        => $panel,
			'default_value' => 'no',
			'args' => array(
				'dependence' => true,
				'dependence_hide_on_yes' => '#edgtf_navigate_same_category_container'
			)
		));

		$container_navigate_category = ratio_edge_add_admin_container(array(
			'name'            => 'navigate_same_category_container',
			'parent'          => $panel,
			'hidden_property' => 'portfolio_single_hide_pagination',
			'hidden_value'    => 'yes'
		));

		ratio_edge_add_admin_field(array(
			'name'            => 'portfolio_single_nav_same_category',
			'type'            => 'yesno',
			'label' => esc_html__( 'Enable Pagination Through Same Category', 'ratio' ),
			'description' => esc_html__( 'Enabling this option will make portfolio pagination sort through current category.', 'ratio' ),
			'parent'          => $container_navigate_category,
			'default_value'   => 'no'
		));

		ratio_edge_add_admin_field(array(
			'name'        => 'portfolio_single_numb_columns',
			'type'        => 'select',
			'label' => esc_html__( 'Number of Columns', 'ratio' ),
			'default_value' => 'three-columns',
			'description' => esc_html__( 'Enter the number of columns for Portfolio Gallery type', 'ratio' ),
			'parent'      => $panel,
			'options'     => array(
				'two-columns' => esc_html__( '2 columns', 'ratio' ),
				'three-columns' => esc_html__( '3 columns', 'ratio' ),
				'four-columns' => esc_html__( '4 columns', 'ratio' )
			)
		));

		ratio_edge_add_admin_field(array(
			'name'        => 'portfolio_single_slug',
			'type'        => 'text',
			'label' => esc_html__( 'Portfolio Single Slug', 'ratio' ),
			'description' => esc_html__( 'Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect)', 'ratio' ),
			'parent'      => $panel,
			'args'        => array(
				'col_width' => 3
			)
		));

	}

	add_action( 'ratio_edge_options_map', 'ratio_edge_portfolio_options_map', 13);

}