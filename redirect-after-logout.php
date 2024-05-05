<?php
/**
 * Plugin Name: Redirect After Logout
 * Description: Redirects the user to a custom URL after logging out.
 * Author: Huzaifa Al Mesbah
 * Author URI: https://profiles.wordpress.org/huzaifaalmesbah/
 * Text Domain: redirect-after-logout
 * License: GPLv2 or later
 * Requires at least: 5.6
 * Tested up to: 6.5
 * Requires PHP: 7.0
 * Version: 1.0
 *
 */

/**
 * Redirects the user to a custom URL after logging out.
 *
 * This function applies a filter to allow customization of the redirect URL.
 * The filter name is 'wpral_logout_redirect_url' and the default value is the home URL.
 * The redirect URL is obtained by applying the filter to the default value.
 * The user is then redirected to the obtained URL using the wp_redirect() function.
 * Finally, the script execution is terminated using the exit() function.
 *
 * @return void
 */

function wpral_redirect_after_logout() {
    // Apply filter to allow customization of the redirect URL.
    $redirect_url = apply_filters( 'wpral_logout_redirect_url', home_url() ); 

    wp_redirect( $redirect_url );
    exit();
}
add_action( 'wp_logout', 'wpral_redirect_after_logout' ); 
