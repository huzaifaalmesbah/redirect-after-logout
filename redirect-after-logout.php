<?php
/**
 * Plugin Name: Smart Logout Redirect
 * Description: Redirects the user to a custom URL after logging out of WordPress.
 * Author: Huzaifa Al Mesbah
 * Author URI: https://www.linkedin.com/in/huzaifaalmesbah
 * Text Domain: redirect-after-logout
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Version: 2.0.0-beta1
 *
 * @package RedirectAfterLogout
 */

// Prevent direct access to the file.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Define plugin path, URL, and basename.
define( 'REDALO_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'REDALO_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'REDALO_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

// Require Autoloader.
require_once REDALO_PLUGIN_PATH . 'includes/Autoloader.php';

// Run Autoloader.
REDALO\Autoloader::run();


/**
 * Initialize the plugin.
 */
function redalo_init() {
	REDALO\Core\Plugin::get_instance()->run();
}
redalo_init();
