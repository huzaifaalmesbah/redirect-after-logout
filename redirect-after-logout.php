<?php
/**
 * Plugin Name: Redirect After Logout
 * Description: Redirects the user to a custom URL after logging out.
 * Author: Huzaifa Al Mesbah
 * Author URI: https://profiles.wordpress.org/huzaifaalmesbah/
 * Text Domain: redirect-after-logout
 * Domain Path: /languages
 * License: GPLv2 or later
 * Requires at least: 5.6
 * Tested up to: 6.5
 * Requires PHP: 7.0
 * Version: 1.1
 *
 * @package RedirectAfterLogout
 */

// Prevent direct access to the file.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Load plugin textdomain.
 */
function wpral_load_textdomain() {
	load_plugin_textdomain( 'redirect-after-logout', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

add_action( 'plugins_loaded', 'wpral_load_textdomain' );

// Include the settings and functions files.
require_once plugin_dir_path( __FILE__ ) . 'includes/settings.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/functions.php';
