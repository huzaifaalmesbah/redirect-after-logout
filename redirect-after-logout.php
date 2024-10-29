<?php
/**
 * Plugin Name: Redirect After Logout
 * Description: Redirects the user to a custom URL after logging out of WordPress.
 * Author: Huzaifa Al Mesbah
 * Author URI: https://www.linkedin.com/in/huzaifaalmesbah
 * Text Domain: redirect-after-logout
 * Domain Path: /languages
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Version: 1.0.4
 *
 * @package RedirectAfterLogout
 */

// Prevent direct access to the file.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Define plugin path, URL, and basename.
define( 'RAL_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'RAL_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'RAL_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

/**
 * Load plugin textdomain.
 */
function wpral_load_textdomain() {
	load_plugin_textdomain( 'redirect-after-logout', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

add_action( 'plugins_loaded', 'wpral_load_textdomain' );

// Include the settings and functions files.
require_once RAL_PLUGIN_PATH . 'includes/settings.php';
require_once RAL_PLUGIN_PATH . 'includes/functions.php';

/**
 * Adds a link to the plugin settings page to the list of links.
 *
 * @param array $links An array of links.
 * @return array The modified array of links.
 */
function wpral_add_plugin_settings_link( $links ) {
	$settings_link = '<a href="' . admin_url( 'options-general.php?page=wpral-redirect-settings' ) . '">' . esc_html__( 'Settings', 'redirect-after-logout' ) . '</a>';
	array_push( $links, $settings_link );
	return $links;
}

add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'wpral_add_plugin_settings_link' );
