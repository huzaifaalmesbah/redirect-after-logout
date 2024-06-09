<?php
/**
 * Functions for Redirect After Logout plugin.
 *
 * @package RedirectAfterLogout
 */

/**
 * Redirects the user to a custom URL after logging out.
 *
 * @return void
 */
function wpral_redirect_after_logout() {
	// Get the custom redirect URL from the plugin settings.
	$redirect_url      = get_option( 'wpral_logout_redirect_url', '' );
	$use_safe_redirect = get_option( 'wpral_use_safe_redirect', true );

	// If the redirect URL is not empty, proceed with redirection.
	if ( ! empty( $redirect_url ) ) {
		// Apply filter to allow further customization.
		$redirect_url = apply_filters( 'wpral_logout_redirect_url', $redirect_url );

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

add_action( 'wp_logout', 'wpral_redirect_after_logout' );
