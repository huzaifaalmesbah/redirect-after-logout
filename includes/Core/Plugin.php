<?php
/**
 * Main Plugin Class.
 *
 * @package RedirectAfterLogout
 */

namespace REDALO\Core;

require_once REDALO_PLUGIN_PATH . 'includes/Admin/Settings.php';
require_once REDALO_PLUGIN_PATH . 'includes/Api/SettingsController.php';

use REDALO\Admin\Settings;
use REDALO\Frontend\Redirect;

/**
 * Class Plugin
 */
class Plugin {

	/**
	 * Instance of this class.
	 *
	 * @var object
	 */
	private static $instance = null;

	/**
	 * Return an instance of this class.
	 *
	 * @return object A single instance of this class.
	 */
	public static function get_instance() {
		// If the single instance hasn't been set, set it now.
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Initialize the plugin.
	 *
	 * @return void
	 */
	public function run() {
		// Initialize Migration.
		$migration = new Migration();
		$migration->init();

		// Initialize Settings.
		$settings = new \REDALO\Admin\Settings();
		$settings->init();

		// Initialize API.
		$api = new \REDALO\Api\SettingsController();
		$api->init();

		// Initialize Redirect Logic.
		$redirect = new Redirect();
		$redirect->init();
	}
}
