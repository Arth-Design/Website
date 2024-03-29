<?php

if ( ! function_exists('ratio_edge_social_options_map') ) {

	function ratio_edge_social_options_map() {

		ratio_edge_add_admin_page(
			array(
				'slug'  => '_social_page',
				'title' => esc_html__( 'Social Networks', 'ratio' ),
				'icon'  => 'fa fa-share-alt'
			)
		);

		/**
		 * Enable Social Share
		 */
		$panel_social_share = ratio_edge_add_admin_panel(array(
			'page'  => '_social_page',
			'name'  => 'panel_social_share',
			'title' => esc_html__( 'Enable Social Share', 'ratio' )
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_social_share',
			'default_value'	=> 'no',
			'label' => esc_html__( 'Enable Social Share', 'ratio' ),
			'description' => esc_html__( 'Enabling this option will allow social share on networks of your choice', 'ratio' ),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#edgtf_panel_social_networks, #edgtf_panel_show_social_share_on'
			),
			'parent'		=> $panel_social_share
		));

		$panel_show_social_share_on = ratio_edge_add_admin_panel(array(
			'page'  			=> '_social_page',
			'name'  			=> 'panel_show_social_share_on',
			'title' => esc_html__( 'Show Social Share On', 'ratio' ),
			'hidden_property'	=> 'enable_social_share',
			'hidden_value'		=> 'no'
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_social_share_on_post',
			'default_value'	=> 'no',
			'label' => esc_html__( 'Posts', 'ratio' ),
			'description' => esc_html__( 'Show Social Share on Blog Posts', 'ratio' ),
			'parent'		=> $panel_show_social_share_on
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_social_share_on_page',
			'default_value'	=> 'no',
			'label' => esc_html__( 'Pages', 'ratio' ),
			'description' => esc_html__( 'Show Social Share on Pages', 'ratio' ),
			'parent'		=> $panel_show_social_share_on
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_social_share_on_attachment',
			'default_value'	=> 'no',
			'label' => esc_html__( 'Media', 'ratio' ),
			'description' => esc_html__( 'Show Social Share for Images and Videos', 'ratio' ),
			'parent'		=> $panel_show_social_share_on
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_social_share_on_portfolio-item',
			'default_value'	=> 'no',
			'label' => esc_html__( 'Portfolio Item', 'ratio' ),
			'description' => esc_html__( 'Show Social Share for Portfolio Items', 'ratio' ),
			'parent'		=> $panel_show_social_share_on
		));

		if(ratio_edge_is_woocommerce_installed()){
			ratio_edge_add_admin_field(array(
				'type'			=> 'yesno',
				'name'			=> 'enable_social_share_on_product',
				'default_value'	=> 'no',
				'label' => esc_html__( 'Product', 'ratio' ),
				'description' => esc_html__( 'Show Social Share for Product Items', 'ratio' ),
				'parent'		=> $panel_show_social_share_on
			));
		}

		/**
		 * Social Share Networks
		 */
		$panel_social_networks = ratio_edge_add_admin_panel(array(
			'page'  			=> '_social_page',
			'name'				=> 'panel_social_networks',
			'title' => esc_html__( 'Social Networks', 'ratio' ),
			'hidden_property'	=> 'enable_social_share',
			'hidden_value'		=> 'no'
		));

		/**
		 * Facebook
		 */
		ratio_edge_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'facebook_title',
			'title' => esc_html__( 'Share on Facebook', 'ratio' )
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_facebook_share',
			'default_value'	=> 'no',
			'label' => esc_html__( 'Enable Share', 'ratio' ),
			'description' => esc_html__( 'Enabling this option will allow sharing via Facebook', 'ratio' ),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#edgtf_enable_facebook_share_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_facebook_share_container = ratio_edge_add_admin_container(array(
			'name'		=> 'enable_facebook_share_container',
			'hidden_property'	=> 'enable_facebook_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'facebook_icon',
			'default_value'	=> '',
			'label' => esc_html__( 'Upload Icon', 'ratio' ),
			'parent'		=> $enable_facebook_share_container
		));

		/**
		 * Twitter
		 */
		ratio_edge_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'twitter_title',
			'title' => esc_html__( 'Share on Twitter', 'ratio' )
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_twitter_share',
			'default_value'	=> 'no',
			'label' => esc_html__( 'Enable Share', 'ratio' ),
			'description' => esc_html__( 'Enabling this option will allow sharing via Twitter', 'ratio' ),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#edgtf_enable_twitter_share_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_twitter_share_container = ratio_edge_add_admin_container(array(
			'name'		=> 'enable_twitter_share_container',
			'hidden_property'	=> 'enable_twitter_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'twitter_icon',
			'default_value'	=> '',
			'label' => esc_html__( 'Upload Icon', 'ratio' ),
			'parent'		=> $enable_twitter_share_container
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'text',
			'name'			=> 'twitter_via',
			'default_value'	=> '',
			'label' => esc_html__( 'Via', 'ratio' ),
			'parent'		=> $enable_twitter_share_container
		));

		/**
		 * Google Plus
		 */
		ratio_edge_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'google_plus_title',
			'title' => esc_html__( 'Share on Google Plus', 'ratio' )
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_google_plus_share',
			'default_value'	=> 'no',
			'label' => esc_html__( 'Enable Share', 'ratio' ),
			'description' => esc_html__( 'Enabling this option will allow sharing via Google Plus', 'ratio' ),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#edgtf_enable_google_plus_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_google_plus_container = ratio_edge_add_admin_container(array(
			'name'		=> 'enable_google_plus_container',
			'hidden_property'	=> 'enable_google_plus_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'google_plus_icon',
			'default_value'	=> '',
			'label' => esc_html__( 'Upload Icon', 'ratio' ),
			'parent'		=> $enable_google_plus_container
		));

		/**
		 * Linked In
		 */
		ratio_edge_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'linkedin_title',
			'title' => esc_html__( 'Share on LinkedIn', 'ratio' )
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_linkedin_share',
			'default_value'	=> 'no',
			'label' => esc_html__( 'Enable Share', 'ratio' ),
			'description' => esc_html__( 'Enabling this option will allow sharing via LinkedIn', 'ratio' ),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#edgtf_enable_linkedin_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_linkedin_container = ratio_edge_add_admin_container(array(
			'name'		=> 'enable_linkedin_container',
			'hidden_property'	=> 'enable_linkedin_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'linkedin_icon',
			'default_value'	=> '',
			'label' => esc_html__( 'Upload Icon', 'ratio' ),
			'parent'		=> $enable_linkedin_container
		));

		/**
		 * Tumblr
		 */
		ratio_edge_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'tumblr_title',
			'title' => esc_html__( 'Share on Tumblr', 'ratio' )
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_tumblr_share',
			'default_value'	=> 'no',
			'label' => esc_html__( 'Enable Share', 'ratio' ),
			'description' => esc_html__( 'Enabling this option will allow sharing via Tumblr', 'ratio' ),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#edgtf_enable_tumblr_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_tumblr_container = ratio_edge_add_admin_container(array(
			'name'		=> 'enable_tumblr_container',
			'hidden_property'	=> 'enable_tumblr_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'tumblr_icon',
			'default_value'	=> '',
			'label' => esc_html__( 'Upload Icon', 'ratio' ),
			'parent'		=> $enable_tumblr_container
		));

		/**
		 * Pinterest
		 */
		ratio_edge_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'pinterest_title',
			'title' => esc_html__( 'Share on Pinterest', 'ratio' )
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_pinterest_share',
			'default_value'	=> 'no',
			'label' => esc_html__( 'Enable Share', 'ratio' ),
			'description' => esc_html__( 'Enabling this option will allow sharing via Pinterest', 'ratio' ),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#edgtf_enable_pinterest_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_pinterest_container = ratio_edge_add_admin_container(array(
			'name'				=> 'enable_pinterest_container',
			'hidden_property'	=> 'enable_pinterest_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'pinterest_icon',
			'default_value'	=> '',
			'label' => esc_html__( 'Upload Icon', 'ratio' ),
			'parent'		=> $enable_pinterest_container
		));

		/**
		 * VK
		 */
		ratio_edge_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'vk_title',
			'title' => esc_html__( 'Share on VK', 'ratio' )
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_vk_share',
			'default_value'	=> 'no',
			'label' => esc_html__( 'Enable Share', 'ratio' ),
			'description' => esc_html__( 'Enabling this option will allow sharing via VK', 'ratio' ),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#edgtf_enable_vk_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_vk_container = ratio_edge_add_admin_container(array(
			'name'				=> 'enable_vk_container',
			'hidden_property'	=> 'enable_vk_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		ratio_edge_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'vk_icon',
			'default_value'	=> '',
			'label' => esc_html__( 'Upload Icon', 'ratio' ),
			'parent'		=> $enable_vk_container
		));

		if(defined('EDGEF_TWITTER_FEED_VERSION')) {
            $twitter_panel = ratio_edge_add_admin_panel(array(
                'title' => esc_html__( 'Twitter', 'ratio' ),
                'name'  => 'panel_twitter',
                'page'  => '_social_page'
            ));

            ratio_edge_add_admin_twitter_button(array(
                'name'   => 'twitter_button',
                'parent' => $twitter_panel
            ));
        }

        if(defined('EDGEF_INSTAGRAM_FEED_VERSION')) {
            $instagram_panel = ratio_edge_add_admin_panel(array(
                'title' => esc_html__( 'Instagram', 'ratio' ),
                'name'  => 'panel_instagram',
                'page'  => '_social_page'
            ));

            ratio_edge_add_admin_instagram_button(array(
                'name'   => 'instagram_button',
                'parent' => $instagram_panel
            ));
        }
	}

	add_action( 'ratio_edge_options_map', 'ratio_edge_social_options_map', 17);
}