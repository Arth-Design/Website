<?php

if ( ! function_exists('ratio_edge_blog_options_map') ) {

	function ratio_edge_blog_options_map() {

		ratio_edge_add_admin_page(
			array(
				'slug' => '_blog_page',
				'title' => esc_html__( 'Blog', 'ratio' ),
				'icon' => 'fa fa-files-o'
			)
		);

		/**
		 * Blog Lists
		 */

		$custom_sidebars = ratio_edge_get_custom_sidebars();

		$panel_blog_lists = ratio_edge_add_admin_panel(
			array(
				'page' => '_blog_page',
				'name' => 'panel_blog_lists',
				'title' => esc_html__( 'Blog Lists', 'ratio' )
			)
		);

		ratio_edge_add_admin_field(array(
			'name'        => 'blog_list_type',
			'type'        => 'select',
			'label' => esc_html__( 'Blog Layout for Archive Pages', 'ratio' ),
			'description' => esc_html__( 'Choose a default blog layout', 'ratio' ),
			'default_value' => 'standard',
			'parent'      => $panel_blog_lists,
			'options'     => array(
				'standard' => esc_html__( 'Blog: Standard', 'ratio' ),
				'masonry' => esc_html__( 'Blog: Masonry', 'ratio' ),
				'masonry-full-width' => esc_html__( 'Blog: Masonry Full Width', 'ratio' ),
				'standard-whole-post' => esc_html__( 'Blog: Standard Whole Post', 'ratio' )
			)
		));

		ratio_edge_add_admin_field(array(
			'name'        => 'archive_sidebar_layout',
			'type'        => 'select',
			'label' => esc_html__( 'Archive and Category Sidebar', 'ratio' ),
			'description' => esc_html__( 'Choose a sidebar layout for archived Blog Post Lists and Category Blog Lists', 'ratio' ),
			'parent'      => $panel_blog_lists,
			'options'     => array(
				'default' => esc_html__( 'No Sidebar', 'ratio' ),
				'sidebar-33-right' => esc_html__( 'Sidebar 1/3 Right', 'ratio' ),
				'sidebar-25-right' => esc_html__( 'Sidebar 1/4 Right', 'ratio' ),
				'sidebar-33-left' => esc_html__( 'Sidebar 1/3 Left', 'ratio' ),
				'sidebar-25-left' => esc_html__( 'Sidebar 1/4 Left', 'ratio' ),
			)
		));


		if(count($custom_sidebars) > 0) {
			ratio_edge_add_admin_field(array(
				'name' => 'blog_custom_sidebar',
				'type' => 'selectblank',
				'label' => esc_html__( 'Sidebar to Display', 'ratio' ),
				'description' => esc_html__( 'Choose a sidebar to display on Blog Post Lists and Category Blog Lists. Default sidebar is Sidebar Page', 'ratio' ),
				'parent' => $panel_blog_lists,
				'options' => ratio_edge_get_custom_sidebars()
			));
		}

		ratio_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'pagination',
				'default_value' => 'yes',
				'label' => esc_html__( 'Pagination', 'ratio' ),
				'parent' => $panel_blog_lists,
				'description' => esc_html__( 'Enabling this option will display pagination links on bottom of Blog Post List', 'ratio' ),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_edgtf_pagination_container'
				)
			)
		);

		$pagination_container = ratio_edge_add_admin_container(
			array(
				'name' => 'edgtf_pagination_container',
				'hidden_property' => 'pagination',
				'hidden_value' => 'no',
				'parent' => $panel_blog_lists,
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $pagination_container,
				'type' => 'text',
				'name' => 'blog_page_range',
				'default_value' => '',
				'label' => esc_html__( 'Pagination Range limit', 'ratio' ),
				'description' => esc_html__( 'Enter a number that will limit pagination to a certain range of links', 'ratio' ),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		ratio_edge_add_admin_field(array(
			'name'        => 'masonry_pagination',
			'type'        => 'select',
			'label' => esc_html__( 'Pagination on Masonry', 'ratio' ),
			'description' => esc_html__( 'Choose a pagination style for Masonry Blog List', 'ratio' ),
			'parent'      => $pagination_container,
			'options'     => array(
				'standard' => esc_html__( 'Standard', 'ratio' ),
				'load-more' => esc_html__( 'Load More', 'ratio' ),
				'infinite-scroll' => esc_html__( 'Infinite Scroll', 'ratio' )
			),
			
		));
		ratio_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'enable_load_more_pag',
				'default_value' => 'no',
				'label' => esc_html__( 'Load More Pagination on Other Lists', 'ratio' ),
				'parent' => $pagination_container,
				'description' => esc_html__( 'Enable Load More Pagination on other lists', 'ratio' ),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'masonry_filter',
				'default_value' => 'no',
				'label' => esc_html__( 'Masonry Filter', 'ratio' ),
				'parent' => $panel_blog_lists,
				'description' => esc_html__( 'Enabling this option will display category filter on Masonry and Masonry Full Width Templates', 'ratio' ),
				'args' => array(
					'col_width' => 3
				)
			)
		);		
		ratio_edge_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'number_of_chars',
				'default_value' => '',
				'label' => esc_html__( 'Number of Words in Excerpt', 'ratio' ),
				'parent' => $panel_blog_lists,
				'description' => esc_html__( 'Enter a number of words in excerpt (article summary)', 'ratio' ),
				'args' => array(
					'col_width' => 3
				)
			)
		);
		ratio_edge_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'standard_number_of_chars',
				'default_value' => '',
				'label' => esc_html__( 'Standard Type Number of Words in Excerpt', 'ratio' ),
				'parent' => $panel_blog_lists,
				'description' => esc_html__( 'Enter a number of words in excerpt (article summary)', 'ratio' ),
				'args' => array(
					'col_width' => 3
				)
			)
		);
		ratio_edge_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'masonry_number_of_chars',
				'default_value' => '',
				'label' => esc_html__( 'Masonry Type Number of Words in Excerpt', 'ratio' ),
				'parent' => $panel_blog_lists,
				'description' => esc_html__( 'Enter a number of words in excerpt (article summary)', 'ratio' ),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		/**
		 * Blog Single
		 */
		$panel_blog_single = ratio_edge_add_admin_panel(
			array(
				'page' => '_blog_page',
				'name' => 'panel_blog_single',
				'title' => esc_html__( 'Blog Single', 'ratio' )
			)
		);


		ratio_edge_add_admin_field(array(
			'name'        => 'blog_single_sidebar_layout',
			'type'        => 'select',
			'label' => esc_html__( 'Sidebar Layout', 'ratio' ),
			'description' => esc_html__( 'Choose a sidebar layout for Blog Single pages', 'ratio' ),
			'parent'      => $panel_blog_single,
			'options'     => array(
				'default' => esc_html__( 'No Sidebar', 'ratio' ),
				'sidebar-33-right' => esc_html__( 'Sidebar 1/3 Right', 'ratio' ),
				'sidebar-25-right' => esc_html__( 'Sidebar 1/4 Right', 'ratio' ),
				'sidebar-33-left' => esc_html__( 'Sidebar 1/3 Left', 'ratio' ),
				'sidebar-25-left' => esc_html__( 'Sidebar 1/4 Left', 'ratio' ),
			),
			'default_value'	=> 'default'
		));


		if(count($custom_sidebars) > 0) {
			ratio_edge_add_admin_field(array(
				'name' => 'blog_single_custom_sidebar',
				'type' => 'selectblank',
				'label' => esc_html__( 'Sidebar to Display', 'ratio' ),
				'description' => esc_html__( 'Choose a sidebar to display on Blog Single pages. Default sidebar is Sidebar', 'ratio' ),
				'parent' => $panel_blog_single,
				'options' => ratio_edge_get_custom_sidebars()
			));
		}

		ratio_edge_add_admin_field(array(
			'name'          => 'blog_single_title_in_title_area',
			'type'          => 'yesno',
			'label' => esc_html__( 'Show Post Title in Title Area', 'ratio' ),
			'description' => esc_html__( 'Enabling this option will show post title in title area on single post pages', 'ratio' ),
			'parent'        => $panel_blog_single,
			'default_value' => 'no'
		));

		ratio_edge_add_admin_field(array(
			'name'          => 'blog_single_comments',
			'type'          => 'yesno',
			'label' => esc_html__( 'Show Comments', 'ratio' ),
			'description' => esc_html__( 'Enabling this option will show comments on your page.', 'ratio' ),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		ratio_edge_add_admin_field(array(
			'name'			=> 'blog_single_related_posts',
			'type'			=> 'yesno',
			'label' => esc_html__( 'Show Related Posts', 'ratio' ),
			'description' => esc_html__( 'Enabling this option will show related posts on your single post.', 'ratio' ),
			'parent'        => $panel_blog_single,
			'default_value' => 'no'
		));

		ratio_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_single_navigation',
				'default_value' => 'no',
				'label' => esc_html__( 'Enable Prev/Next Single Post Navigation Links', 'ratio' ),
				'parent' => $panel_blog_single,
				'description' => esc_html__( 'Enable navigation links through the blog posts (left and right arrows will appear)', 'ratio' ),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_edgtf_blog_single_navigation_container'
				)
			)
		);

		$blog_single_navigation_container = ratio_edge_add_admin_container(
			array(
				'name' => 'edgtf_blog_single_navigation_container',
				'hidden_property' => 'blog_single_navigation',
				'hidden_value' => 'no',
				'parent' => $panel_blog_single,
			)
		);

		ratio_edge_add_admin_field(
			array(
				'type'        => 'yesno',
				'name' => 'blog_navigation_through_same_category',
				'default_value' => 'no',
				'label' => esc_html__( 'Enable Navigation Only in Current Category', 'ratio' ),
				'description' => esc_html__( 'Limit your navigation only through current category', 'ratio' ),
				'parent'      => $blog_single_navigation_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_author_info',
				'default_value' => 'no',
				'label' => esc_html__( 'Show Author Info Box', 'ratio' ),
				'parent' => $panel_blog_single,
				'description' => esc_html__( 'Enabling this option will display author name and descriptions on Blog Single pages', 'ratio' ),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_edgtf_blog_single_author_info_container'
				)
			)
		);

		$blog_single_author_info_container = ratio_edge_add_admin_container(
			array(
				'name' => 'edgtf_blog_single_author_info_container',
				'hidden_property' => 'blog_author_info',
				'hidden_value' => 'no',
				'parent' => $panel_blog_single,
			)
		);

		ratio_edge_add_admin_field(
			array(
				'type'        => 'yesno',
				'name' => 'blog_author_info_email',
				'default_value' => 'no',
				'label' => esc_html__( 'Show Author Email', 'ratio' ),
				'description' => esc_html__( 'Enabling this option will show author email', 'ratio' ),
				'parent'      => $blog_single_author_info_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

	}

	add_action( 'ratio_edge_options_map', 'ratio_edge_blog_options_map', 12);

}











