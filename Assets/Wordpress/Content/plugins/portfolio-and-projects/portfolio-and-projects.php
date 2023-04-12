<?php
/**
 * Plugin Name: Portfolio and Projects
 * Plugin URI: https://www.essentialplugin.com/wordpress-plugin/portfolio-and-projects/
 * Description: Display Portfolio OR Projects in a grid view. Also work with Gutenberg shortcode block.
 * Author: WP OnlineSupport, Essential Plugin
 * Text Domain: portfolio-and-projects
 * Domain Path: /languages/
 * Version: 1.3.4
 * Author URI: https://www.essentialplugin.com/wordpress-plugin/portfolio-and-projects/
 *
 * @package WordPress
 * @author WP OnlineSupport
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if( ! defined( 'WP_PAP_VERSION' ) ) {
	define( 'WP_PAP_VERSION', '1.3.4' ); // Version of plugin
}
if( !defined( 'WP_PAP_NAME' ) ) {
	define( 'WP_PAP_NAME', 'Portfolio and Projects' ); // Plugin name
}
if( ! defined( 'WP_PAP_DIR' ) ) {
	define( 'WP_PAP_DIR', dirname( __FILE__ ) ); // Plugin dir
}
if( ! defined( 'WP_PAP_URL' ) ) {
	define( 'WP_PAP_URL', plugin_dir_url( __FILE__ ) ); // Plugin url
}
if( ! defined( 'WP_PAP_POST_TYPE' ) ) {
	define( 'WP_PAP_POST_TYPE', 'wpos_portfolio' ); // Plugin post type
}
if( ! defined( 'WP_PAP_CAT' ) ) {
	define( 'WP_PAP_CAT', 'wppap_portfolio_cat' ); // Plugin post type
}
if( ! defined( 'WP_PAP_META_PREFIX' ) ) {
	define( 'WP_PAP_META_PREFIX', '_wp_pap_' ); // Plugin metabox prefix
}
if( ! defined( 'WP_PAP_SITE_LINK' ) ) {
	define('WP_PAP_SITE_LINK', 'https://www.essentialplugin.com'); // Plugin link
}
if( ! defined( 'WP_PAP_PLUGIN_BUNDLE_LINK' ) ) {
	define('WP_PAP_PLUGIN_BUNDLE_LINK','https://www.essentialplugin.com/wordpress-plugin/portfolio-and-projects/?utm_source=WP&utm_medium=Portfolio-and-Projects&utm_campaign=Bundle-Banner#wpos-epb'); // Plugin link
}
if( ! defined( 'WP_PAP_PLUGIN_LINK_UNLOCK' ) ) {
	define('WP_PAP_PLUGIN_LINK_UNLOCK','https://www.essentialplugin.com/wordpress-plugin/portfolio-and-projects/?utm_source=WP&utm_medium=Portfolio-and-Projects&utm_campaign=Features-PRO'); // Plugin link
}
if( ! defined( 'WP_PAP_PLUGIN_LINK_UPGRADE' ) ) {
	define('WP_PAP_PLUGIN_LINK_UPGRADE','https://www.essentialplugin.com/wordpress-plugin/portfolio-and-projects/?utm_source=WP&utm_medium=Portfolio-and-Projects&utm_campaign=Upgrade-PRO'); // Plugin Check link
}

/**
 * Load Text Domain
 * This gets the plugin ready for translation
 * 
 * @package Portfolio and Projects
 * @since 1.0.0
 */
function wp_pap_load_textdomain() {
	load_plugin_textdomain( 'portfolio-and-projects', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}
add_action('plugins_loaded', 'wp_pap_load_textdomain');

/**
 * Activation Hook
 * 
 * Register plugin activation hook.
 * 
 * @package Portfolio and Projects
 * @since 1.0.0
 */
register_activation_hook( __FILE__, 'wp_pap_install' );

/**
 * Deactivation Hook
 * 
 * Register plugin deactivation hook.
 * 
 * @package Portfolio and Projects
 * @since 1.0.0
 */
register_deactivation_hook( __FILE__, 'wp_pap_uninstall');

/**
 * Plugin Setup (On Activation)
 * 
 * Does the initial setup,
 * set default values for the plugin options.
 * 
 * @package Portfolio and Projects
 * @since 1.0.0
 */
function wp_pap_install() {
	
	// Register post type function
	wp_pap_register_post_type();

	// Register Taxonomies
	wppap_register_taxonomies();
	
	// IMP need to flush rules for custom registered post type
	flush_rewrite_rules();

	// Deactivate free version
	if( is_plugin_active('portfolio-and-projects-pro/portfolio-and-projects.php') ){
		add_action('update_option_active_plugins', 'wp_pap_deactivate_pro_version');
	}
}

/**
 * Plugin Setup (On Deactivation)
 * 
 * Delete  plugin options.
 * 
 * @package Portfolio and Projects
 * @since 1.0.0
 */
function wp_pap_uninstall() {
	
	// IMP need to flush rules for custom registered post type
	flush_rewrite_rules();
}

/**
 * Deactivate free plugin
 * 
 * @package Portfolio and Projects
 * @since 1.0
 */
function wp_pap_deactivate_pro_version() {
	deactivate_plugins('portfolio-and-projects-pro/portfolio-and-projects.php', true);
}

/**
 * Function to display admin notice of activated plugin.
 * 
 * @package Portfolio and Projects Pro
 * @since 1.0
 */
function wp_pap_admin_notice() {
	
	global $pagenow;

	$dir 				= WP_PLUGIN_DIR . '/portfolio-and-projects-pro/portfolio-and-projects.php';
	$notice_link		= add_query_arg( array('message' => 'wp-pap-plugin-notice'), admin_url('plugins.php') );
	$notice_transient	= get_transient( 'wp_pap_install_notice' );

	// If free plugin exist
	if( $notice_transient == false && file_exists($dir) && $pagenow == 'plugins.php' && current_user_can( 'install_plugins' ) ) {
		echo '<div class="updated notice" style="position:relative;">
				<p>
					<strong>'.__('Thank you for activating Portfolio and Projects', 'portfolio-and-projects').'</strong>.<br/>
					'.__('It looks like you had PRO version <strong>(<em>Portfolio and Projects Pro</em>)</strong> of this plugin activated. To avoid conflicts the extra version has been deactivated and we recommend you delete it.', 'portfolio-and-projects').'
				</p>
				<a href="'.esc_url( $notice_link ).'" class="notice-dismiss" style="text-decoration:none;"></a>
			</div>';
	}
}

// Action to display notice
add_action( 'admin_notices', 'wp_pap_admin_notice');

// Functions File
require_once( WP_PAP_DIR . '/includes/wp-pap-functions.php' );

// Plugin Post Type File
require_once( WP_PAP_DIR . '/includes/wp-pap-post-types.php' );

// Script File
require_once( WP_PAP_DIR . '/includes/class-wp-pap-script.php' );

// Admin Class File
require_once( WP_PAP_DIR . '/includes/admin/class-wp-pap-admin.php' );

// Shortcode File
require_once( WP_PAP_DIR . '/includes/shortcode/wp-pap-gallery-slider.php' );

/* Recommended Plugins Starts */
if ( is_admin() ) {
	require_once( WP_PAP_DIR . '/wpos-plugins/wpos-recommendation.php' );

	wpos_espbw_init_module( array(
							'prefix'	=> 'wp_pap',
							'menu'		=> 'edit.php?post_type='.WP_PAP_POST_TYPE,
							'position'	=> 4,
						));
}
/* Recommended Plugins Ends */

/* Plugin Analytics Data */
function wpos_analytics_anl65_load() {

	require_once dirname( __FILE__ ) . '/wpos-analytics/wpos-analytics.php';

	$wpos_analytics =  wpos_anylc_init_module( array(
							'id'            => 65,
							'file'          => plugin_basename( __FILE__ ),
							'name'          => 'Portfolio and Projects',
							'slug'          => 'portfolio-and-projects',
							'type'          => 'plugin',
							'menu'          => 'edit.php?post_type=wpos_portfolio',
							'text_domain'   => 'portfolio-and-projects',
						));

	return $wpos_analytics;
}

// Init Analytics
wpos_analytics_anl65_load();
/* Plugin Analytics Data Ends */