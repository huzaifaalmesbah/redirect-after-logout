<?php
/**
 * Autoloader for the plugin.
 *
 * @package RedirectAfterLogout
 */

namespace REDALO;

/**
 * Class Autoloader
 */
class Autoloader {

	/**
	 * Run the autoloader.
	 *
	 * @return void
	 */
	public static function run() {
		spl_autoload_register( array( __CLASS__, 'autoload' ) );
	}

	/**
	 * Autoload classes.
	 *
	 * @param string $class_name Class name.
	 * @return void
	 */
	public static function autoload( $class_name ) {
		if ( strpos( $class_name, __NAMESPACE__ . '\\' ) !== 0 ) {
			return;
		}

		$relative_class = substr( $class_name, strlen( __NAMESPACE__ . '\\' ) );
		$file           = plugin_dir_path( dirname( __FILE__ ) ) . 'includes/' . str_replace( '\\', '/', $relative_class ) . '.php';

		if ( file_exists( $file ) ) {
			require_once $file;
		}
	}
}
