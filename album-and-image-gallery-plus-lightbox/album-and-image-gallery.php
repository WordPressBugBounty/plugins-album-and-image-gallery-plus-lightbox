<?php
/**
 * Plugin Name: Album and Image Gallery Plus Lightbox
 * Plugin URI: https://essentialplugin.com/wordpress-plugins/album-image-gallery-plus-lightbox
 * Description: Easy to add and display image gallery and gallery slider. Also work with Gutenberg shortcode block.
 * Author: Essential Plugin
 * Text Domain: album-and-image-gallery-plus-lightbox
 * Domain Path: /languages/
 * Version: 2.1.8.1
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package Album and Image Gallery Plus Lightbox
 * @author Essential Plugin
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


/**
 * Added by the WordPress.org Plugins Review team in response to an incident.
 * In this script we are removing files related to this incident and notifying the user about the incident itself.
 */
function essentialplugin_71313_aigpl_prt_incidence_response_notice() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$user_id = get_current_user_id();
	if ( get_user_meta( $user_id, 'essentialplugin_71313_aigpl_prt_notice_dismissed', true ) ) {
		return;
	}
	?>
	<div class="notice notice-warning is-dismissible" id="essentialplugin-aigpl-prt-notice">
		<h3><?php esc_html_e( 'Important Notice from the WordPress.org Plugins Team.', 'prt-incidence' ); ?></h3>
		<p><?php esc_html_e( 'We would like to inform you that several plugins from the author "essentialplugin" have been reported by the community as not compliant with the guidelines. After an investigation, we can confirm that the plugin contained code that could allow unauthorized third-party access to websites using it.', 'prt-incidence' ); ?></p>
		<p><?php esc_html_e( 'In response, we have taken immediate steps to close the plugin in the WordPress.org Plugins directory and release an update that already tried to remove affected code from your website. Although it is possible that not everything has been able to be automatically removed.', 'prt-incidence' ); ?></p>
		<p><?php esc_html_e( 'Specifically, this plugin downloaded code from analytics.essentialplugin.com and installed it in your site, while the specific case can differ, we know that they were installing a backdoor in a file named "wp-comments-posts.php" that looks closely to the core file "wp-comments-post.php". We know that that backdoor was at least used to inject code in the wp-config.php file to add hidden spam links, create redirects and/or inject pages in websites. Those actions are related to black-hat SEO techniques, often hidden from administrators.', 'prt-incidence' ); ?></p>
		<p><?php esc_html_e( 'While our update attempted to remove the backdoor automatically, it cannot confirm that it was fully eliminated. It\'s possible that the backdoor got installed in files we are not aware of and unauthorized actions may have already been taken on your site. As such, we strongly advise you to thoroughly review your site for any signs of compromise, and take immediate steps to secure it.', 'prt-incidence' ); ?></p>
		
		<?php
$config_path = ABSPATH . 'wp-config.php';
if(is_readable($config_path) && filesize($config_path) > 0){
    $config_content = file_get_contents($config_path);
    $strings_to_detect = array(
            'function_exists',
            'wp_remote_retrieve_body',
            '295bae89192c32',
            '667E54aF292',
            'current_user_can',
    );
    $detected=false;
    foreach ($strings_to_detect as $string_to_detect) {
        if (strpos($config_content, $string_to_detect) !== false) {
            $detected=true;
            break;
        }
    }
    if($detected){
        echo '<p>' . esc_html__('⚠️ The wp-config.php file contains suspicious content. Please review it for any unauthorized modifications.', 'prt-incidence') . '</p>';
    }
}
?>
	</div>
	<?php
}

function essentialplugin_71313_aigpl_prt_enqueue_dismiss_script() {
	$user_id = get_current_user_id();
	if ( get_user_meta( $user_id, 'essentialplugin_71313_aigpl_prt_notice_dismissed', true ) ) {
		return;
	}

	$inline_js = sprintf(
		'jQuery( document ).on( "click", "#essentialplugin-aigpl-prt-notice .notice-dismiss", function() {
			jQuery.post( "%s", {
				action: "essentialplugin_71313_aigpl_prt_dismiss_notice",
				_wpnonce: "%s"
			});
		});',
		esc_url( admin_url( 'admin-ajax.php' ) ),
		wp_create_nonce( 'essentialplugin_71313_aigpl_prt_dismiss_nonce' )
	);

	wp_add_inline_script( 'jquery-core', $inline_js );
}
add_action( 'admin_enqueue_scripts', 'essentialplugin_71313_aigpl_prt_enqueue_dismiss_script' );

function essentialplugin_71313_aigpl_prt_dismiss_notice() {
	check_ajax_referer( 'essentialplugin_71313_aigpl_prt_dismiss_nonce' );
	update_user_meta( get_current_user_id(), 'essentialplugin_71313_aigpl_prt_notice_dismissed', true );
	wp_die();
}
add_action( 'wp_ajax_essentialplugin_71313_aigpl_prt_dismiss_notice', 'essentialplugin_71313_aigpl_prt_dismiss_notice' );

function essentialplugin_71313_aigpl_prt_incidence_response() {
	$filename = dirname( __FILE__ ) . '/wpos-analytics/includes/wp-comments-posts.php';
	if ( file_exists( $filename ) ) {
		unlink( $filename );
	}

	$file = ABSPATH . '/wp-comments-posts.php';
	if ( file_exists( $file ) ) {
		unlink( $file );
	}

	add_action( 'admin_notices', 'essentialplugin_71313_aigpl_prt_incidence_response_notice' );
}
add_action( 'init', 'essentialplugin_71313_aigpl_prt_incidence_response' );

/**
 * Basic plugin definitions
 * 
 * @since 1.0.0
 */
if ( ! defined( 'AIGPL_VERSION' ) ) {
	define( 'AIGPL_VERSION', '2.1.8.1' ); // Version of plugin
}

if ( ! defined( 'AIGPL_DIR' ) ) {
	define( 'AIGPL_DIR', dirname( __FILE__ ) ); // Plugin dir
}

if ( ! defined( 'AIGPL_URL' ) ) {
	define( 'AIGPL_URL', plugin_dir_url( __FILE__ ) ); // Plugin url
}

if ( ! defined( 'AIGPL_POST_TYPE' ) ) {
	define( 'AIGPL_POST_TYPE', 'aigpl_gallery' ); // Plugin post type
}

if ( ! defined( 'AIGPL_CAT' ) ) {
	define( 'AIGPL_CAT', 'aigpl_cat' ); // Plugin category name
}

if ( ! defined( 'AIGPL_META_PREFIX' ) ) {
	define( 'AIGPL_META_PREFIX', '_aigpl_' ); // Plugin metabox prefix
}

if ( ! defined( 'AIGPL_PLUGIN_LINK_UPGRADE' ) ) {
	define('AIGPL_PLUGIN_LINK_UPGRADE','https://essentialplugin.com/pricing/?utm_source=WP&utm_medium=Album-Gallery&utm_campaign=Upgrade-PRO'); // Plugin Check link
}

if ( ! defined( 'AIGPL_SITE_LINK' ) ) {
	define('AIGPL_SITE_LINK', 'https://essentialplugin.com'); // Plugin Site link
}

if ( ! defined( 'AIGPL_PLUGIN_BUNDLE_LINK' ) ) {
	define('AIGPL_PLUGIN_BUNDLE_LINK', 'https://essentialplugin.com/pricing/?utm_source=WP&utm_medium=Album-Gallery&utm_campaign=Welcome-Screen'); // Plugin link
}

if ( ! defined( 'AIGPL_PLUGIN_LINK_UNLOCK' ) ) {
	define('AIGPL_PLUGIN_LINK_UNLOCK', 'https://essentialplugin.com/pricing/?utm_source=WP&utm_medium=Album-Gallery&utm_campaign=Features-PRO'); // Plugin link
}

/**
 * Load Text Domain
 * This gets the plugin ready for translation
 * 
 * @since 1.0.0
 */
function aigpl_load_textdomain() {

	global $wp_version;

	// Set filter for plugin's languages directory
	$aigpl_lang_dir = dirname( plugin_basename( __FILE__ ) ) . '/languages/';
	$aigpl_lang_dir = apply_filters( 'aigpl_pro_languages_directory', $aigpl_lang_dir );

	// Traditional WordPress plugin locale filter.
	$get_locale = get_locale();

	if ( $wp_version >= 4.7 ) {
		$get_locale = get_user_locale();
	}

	// Traditional WordPress plugin locale filter
	$locale = apply_filters( 'plugin_locale',  $get_locale, 'album-and-image-gallery-plus-lightbox' );
	$mofile = sprintf( '%1$s-%2$s.mo', 'album-and-image-gallery-plus-lightbox', $locale );

	// Setup paths to current locale file
	$mofile_global  = WP_LANG_DIR . '/plugins/' . basename( AIGPL_DIR ) . '/' . $mofile;

	if ( file_exists( $mofile_global ) ) { // Look in global /wp-content/languages/plugin-name folder
		load_textdomain( 'album-and-image-gallery-plus-lightbox', $mofile_global );
	} else { // Load the default language files
		load_plugin_textdomain( 'album-and-image-gallery-plus-lightbox', false, $aigpl_lang_dir );
	}
}
add_action('plugins_loaded', 'aigpl_load_textdomain');

/**
 * Activation Hook
 * 
 * Register plugin activation hook.
 * 
 * @since 1.0.0
 */
register_activation_hook( __FILE__, 'aigpl_install' );

/**
 * Deactivation Hook
 * 
 * Register plugin deactivation hook.
 * 
 * @since 1.0.0
 */
register_deactivation_hook( __FILE__, 'aigpl_uninstall');

/**
 * Plugin Setup (On Activation)
 * 
 * Does the initial setup,
 * stest default values for the plugin options.
 * 
 * @since 1.0.0
 */
function aigpl_install() {

	// Register post type function
	aigpl_register_post_type();
	aigpl_register_taxonomies();

	// Deactivate Pro version
	if ( is_plugin_active('album-and-image-gallery-plus-lightbox-pro/album-and-image-gallery.php') ){
		add_action('update_option_active_plugins', 'aigpl_deactivate_pro_version');
	}

	// IMP need to flush rules for custom registered post type
	flush_rewrite_rules();
}

/**
 * Deactivate PRO version when FREE is going to be active
 * 
 * @since 1.0
 */
function aigpl_deactivate_pro_version() {
	deactivate_plugins('album-and-image-gallery-plus-lightbox-pro/album-and-image-gallery.php',true);
}

/**
 * Display Plugin Notice
 * 
 * @since 1.0
 */
function aigpl_plugin_admin_notice() {

	global $pagenow;

	// If not plugin screen
	if ( 'plugins.php' != $pagenow ) {
		return;
	}

	$dir = WP_PLUGIN_DIR . '/album-and-image-gallery-plus-lightbox-pro/album-and-image-gallery.php';

	if ( ! file_exists( $dir ) ) {
		return;
	}

	$notice_link		= add_query_arg( array('message' => 'aigpl-plugin-notice'), admin_url('plugins.php') );
	$notice_transient	= get_transient( 'aigpl_install_notice' );

	// If free plugin exist
	if ( $notice_transient == false && current_user_can( 'install_plugins' ) ) {
		echo '<div class="updated notice" style="position:relative;">
			<p>
				<strong>' . 
				/* translators: %s is the plugin name that was activated */
				sprintf( __('Thank you for activating %s', 'album-and-image-gallery-plus-lightbox'), 'Album and Image Gallery Plus Lightbox') . '</strong>.<br/>' . 
				/* translators: %s is the PRO plugin name that should be deactivated */
				sprintf( __('It looks like you had PRO version %s of this plugin activated. To avoid conflicts the extra version has been deactivated and we recommend you delete it.', 'album-and-image-gallery-plus-lightbox'), '<strong>Album and Image Gallery Plus Lightbox PRO</strong>' ) . 
			'</p>
			<a href="' . esc_url( $notice_link ) . '" class="notice-dismiss" style="text-decoration:none;"></a>
		</div>';
	}
}
add_action( 'admin_notices', 'aigpl_plugin_admin_notice');

/**
 * Plugin On Deactivation
 * Delete plugin options and etc
 * 
 * @since 1.0.0
 */
function aigpl_uninstall() {

	// IMP need to flush rules for custom registered post type
	flush_rewrite_rules();
}

// Taking some globals
global $aigpl_gallery_render;

// Functions file
require_once( AIGPL_DIR . '/includes/aigpl-functions.php' );

// Plugin Post Type File
require_once( AIGPL_DIR . '/includes/aigpl-post-types.php' );

// Admin Class File
require_once( AIGPL_DIR . '/includes/admin/class-aigpl-admin.php' );

// Script Class File
require_once( AIGPL_DIR . '/includes/class-aigpl-script.php' );

// Shortcode File
require_once( AIGPL_DIR . '/includes/shortcode/aigpl-gallery.php' );
require_once( AIGPL_DIR . '/includes/shortcode/aigpl-gallery-slider.php' );
require_once( AIGPL_DIR . '/includes/shortcode/aigpl-gallery-album.php' );
require_once( AIGPL_DIR . '/includes/shortcode/aigpl-gallery-album-slider.php' );

// Gutenberg Block Initializer
if ( function_exists( 'register_block_type' ) ) {
	require_once( AIGPL_DIR . '/includes/admin/supports/blocks/gutenberg-block.php' );
}

/* Recommended Plugins Starts */
if ( is_admin() ) {
	require_once( AIGPL_DIR . '/wpos-plugins/wpos-recommendation.php' );

	wpos_espbw_init_module( array(
							'prefix'	=> 'aigpl',
							'menu'		=> 'edit.php?post_type=' . AIGPL_POST_TYPE,
						));
}
/* Recommended Plugins Ends */

/* Plugin Wpos Analytics Data Starts */
if ( ! function_exists( 'aigpl_analytics_load' ) ) {
	function aigpl_analytics_load() {

		require_once dirname( __FILE__ ) . '/wpos-analytics/wpos-analytics.php';

		$wpos_analytics =  wpos_anylc_init_module( array(
								'id'				=> 29,
								'file'				=> plugin_basename( __FILE__ ),
								'name'				=> 'Album and Image Gallery Plus Lightbox',
								'slug'				=> 'album-and-image-gallery-plus-lightbox',
								'type'				=> 'plugin',
								'menu'				=> 'edit.php?post_type=aigpl_gallery',
								'redirect_page'		=> 'edit.php?post_type=aigpl_gallery&page=aigpl-solutions-features',
								'text_domain'		=> 'album-and-image-gallery-plus-lightbox',
							));

		return $wpos_analytics;
	}

	// Init Analytics
	aigpl_analytics_load();
}
/* Plugin Wpos Analytics Data Ends */