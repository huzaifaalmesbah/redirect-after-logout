<?php
/**
 * Settings Class.
 *
 * @package RedirectAfterLogout
 */

namespace REDALO\Admin;

/**
 * Class Settings
 */
class Settings {

	/**
	 * Initialize settings.
	 *
	 * @return void
	 */
	public function init() {
		add_action( 'admin_menu', array( $this, 'register_settings_page' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_assets' ) );
		add_filter( 'plugin_action_links_' . REDALO_PLUGIN_BASENAME, array( $this, 'add_plugin_action_links' ) );
	}

	/**
	 * Enqueue assets for the settings page.
	 *
	 * @param string $hook Current admin page hook.
	 */
	public function enqueue_assets( $hook ) {
		if ( 'settings_page_redalo-redirect-settings' !== $hook ) {
			return;
		}

		$asset_file = REDALO_PLUGIN_PATH . 'build/index.asset.php';

		if ( ! file_exists( $asset_file ) ) {
			return;
		}

		$asset = require $asset_file;

		wp_enqueue_script(
			'redalo-settings-script',
			REDALO_PLUGIN_URL . 'build/index.js',
			$asset['dependencies'],
			$asset['version'],
			true
		);

		wp_enqueue_style(
			'redalo-settings-style',
			REDALO_PLUGIN_URL . 'build/index.css',
			array( 'wp-components' ),
			$asset['version']
		);

		wp_localize_script(
			'redalo-settings-script',
			'redaloSettings',
			array(
				'apiUrl' => esc_url_raw( rest_url( 'redalo/v1/settings' ) ),
				'nonce'  => wp_create_nonce( 'wp_rest' ),
			)
		);
	}

	/**
	 * Register settings page for the plugin.
	 */
	public function register_settings_page() {
		add_submenu_page(
			'options-general.php',
			__( 'Logout Redirect', 'redirect-after-logout' ),
			__( 'Logout Redirect', 'redirect-after-logout' ),
			'manage_options',
			'redalo-redirect-settings',
			array( $this, 'render_settings_page' )
		);
	}

	/**
	 * Render settings page content.
	 */
	public function render_settings_page() {
		require_once REDALO_PLUGIN_PATH . 'templates/admin/settings-page.php';
	}

	/**
	 * Adds a settings link to the plugin's action links on the plugins page.
	 *
	 * @param array $links Array of plugin action links.
	 * @return array Modified array of plugin action links.
	 */
	public function add_plugin_action_links( $links ) {
		if ( ! is_array( $links ) ) {
			$links = array();
		}
		
		$settings_link = sprintf(
			'<a href="%s">%s</a>',
			esc_url( admin_url( 'options-general.php?page=redalo-redirect-settings' ) ),
			esc_html__( 'Settings', 'redirect-after-logout' )
		);
		
		array_unshift( $links, $settings_link ); // Add settings first in the list
		
		return $links;
	}
}
