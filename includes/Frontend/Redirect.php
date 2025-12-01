<?php
/**
 * Redirect Class.
 *
 * @package RedirectAfterLogout
 */

namespace REDALO\Frontend;

/**
 * Class Redirect
 */
class Redirect {

	/**
	 * Initialize redirect logic.
	 *
	 * @return void
	 */
	public function init() {
		add_action( 'wp_logout', array( $this, 'handle_logout_redirect' ), 10, 1 );
	}

	/**
	 * Handle redirection after logout.
	 *
	 * @param int $user_id The ID of the user logging out.
	 * @return void
	 */
	public function handle_logout_redirect( $user_id ) {
		$settings = get_option( 'redalo_settings' );
		$redirect_url = '';

		// 1. Check for Role-Based Redirect.
		if ( ! empty( $user_id ) ) {
			$user = get_userdata( $user_id );
			if ( $user && ! empty( $user->roles ) ) {
				$role_redirects = isset( $settings['role_redirects'] ) ? $settings['role_redirects'] : array();
				foreach ( $user->roles as $role ) {
					if ( ! empty( $role_redirects[ $role ] ) ) {
						$redirect_url = $role_redirects[ $role ];
						break; // Use the first matching role redirect.
					}
				}
			}
		}

		// 2. If no role-based redirect, check General Settings.
		if ( empty( $redirect_url ) ) {
			$redirect_type = isset( $settings['redirect_type'] ) ? $settings['redirect_type'] : 'custom';

			switch ( $redirect_type ) {
				case 'home':
					$redirect_url = home_url();
					break;
				case 'current':
					// Attempt to get the referrer.
					$redirect_url = wp_get_referer();
					if ( ! $redirect_url && isset( $_SERVER['HTTP_REFERER'] ) ) {
						$redirect_url = esc_url_raw( wp_unslash( $_SERVER['HTTP_REFERER'] ) );
					}
					// Fallback to home if referrer is missing or invalid.
					if ( empty( $redirect_url ) ) {
						$redirect_url = home_url();
					}
					break;
				case 'custom':
				default:
					$redirect_url = isset( $settings['logout_redirect_url'] ) ? $settings['logout_redirect_url'] : '';
					break;
			}
		}

		$use_safe_redirect = isset( $settings['use_safe_redirect'] ) ? $settings['use_safe_redirect'] : true;

		// If the redirect URL is not empty, proceed with redirection.
		if ( ! empty( $redirect_url ) ) {
			// Apply filter to allow further customization.
			$redirect_url = apply_filters( 'redalo_logout_redirect_url', $redirect_url, $user_id );

			if ( $use_safe_redirect ) {
				// Use wp_safe_redirect() to ensure safe redirection.
				wp_safe_redirect( esc_url( $redirect_url ) );
			} else {
				// Use wp_redirect() for normal redirection.
				wp_redirect( esc_url( $redirect_url ) );
			}
			exit();
		}
	}
}
