<?php
/**
 * Settings Controller Class.
 *
 * @package RedirectAfterLogout
 */

namespace REDALO\Api;

/**
 * Class SettingsController
 */
class SettingsController {

	/**
	 * Initialize the controller.
	 */
	public function init() {
		add_action( 'rest_api_init', array( $this, 'register_routes' ) );
	}

	/**
	 * Register REST API routes.
	 */
	public function register_routes() {
		register_rest_route(
			'redalo/v1',
			'/settings',
			array(
				array(
					'methods'             => 'GET',
					'callback'            => array( $this, 'get_settings' ),
					'permission_callback' => array( $this, 'check_permissions' ),
				),
				array(
					'methods'             => 'POST',
					'callback'            => array( $this, 'update_settings' ),
					'permission_callback' => array( $this, 'check_permissions' ),
				),
			)
		);

		register_rest_route(
			'redalo/v1',
			'/roles',
			array(
				'methods'             => 'GET',
				'callback'            => array( $this, 'get_roles' ),
				'permission_callback' => array( $this, 'check_permissions' ),
			)
		);
	}

	/**
	 * Check permissions.
	 */
	public function check_permissions() {
		return current_user_can( 'manage_options' );
	}

	/**
	 * Get roles via REST API.
	 */
	public function get_roles() {
		global $wp_roles;
		return rest_ensure_response( $wp_roles->roles );
	}

	/**
	 * Get settings via REST API.
	 */
	public function get_settings() {
		$settings = get_option( 'redalo_settings', array() );
		
		// Ensure defaults.
		$defaults = array(
			'redirect_type'       => 'custom',
			'logout_redirect_url' => '',
			'use_safe_redirect'   => true,
			'role_redirects'      => array(),
		);
		
		$settings = wp_parse_args( $settings, $defaults );

		return rest_ensure_response( $settings );
	}

	/**
	 * Update settings via REST API.
	 *
	 * @param \WP_REST_Request $request Request object.
	 */
	public function update_settings( $request ) {
		$params = $request->get_json_params();
		$sanitized = $this->sanitize_settings( $params );
		
		update_option( 'redalo_settings', $sanitized );
		
		return rest_ensure_response( $sanitized );
	}

	/**
	 * Sanitize settings array.
	 *
	 * @param array $input Array of settings.
	 * @return array Sanitized array.
	 */
	public function sanitize_settings( $input ) {
		$sanitized_input = array();

		if ( isset( $input['redirect_type'] ) ) {
			$sanitized_input['redirect_type'] = sanitize_text_field( $input['redirect_type'] );
		}

		if ( isset( $input['logout_redirect_url'] ) ) {
			$sanitized_input['logout_redirect_url'] = esc_url_raw( $input['logout_redirect_url'] );
		}

		if ( isset( $input['use_safe_redirect'] ) ) {
			$sanitized_input['use_safe_redirect'] = true;
		} else {
			$sanitized_input['use_safe_redirect'] = false;
		}

		if ( isset( $input['role_redirects'] ) && is_array( $input['role_redirects'] ) ) {
			foreach ( $input['role_redirects'] as $key => $value ) {
				$sanitized_input['role_redirects'][ sanitize_text_field( $key ) ] = esc_url_raw( $value );
			}
		}

		return $sanitized_input;
	}
}
