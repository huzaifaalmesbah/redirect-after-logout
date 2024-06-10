<?php
/**
 * Settings for Redirect After Logout plugin.
 *
 * @package RedirectAfterLogout
 */

/**
 * Register settings page for the plugin.
 */
function wpral_register_settings_page() {
	add_submenu_page(
		'options-general.php',
		__( 'Logout Redirect', 'redirect-after-logout' ),
		__( 'Logout Redirect', 'redirect-after-logout' ),
		'manage_options',
		'wpral-redirect-settings',
		'wpral_render_settings_page'
	);
}

add_action( 'admin_menu', 'wpral_register_settings_page' );

/**
 * Render settings page content.
 */
function wpral_render_settings_page() {
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Logout Redirect', 'redirect-after-logout' ); ?></h1>
		<form method="post" action="options.php">
			<?php
			settings_fields( 'wpral_settings_group' );
			do_settings_sections( 'wpral-redirect-settings' );
			submit_button();
			?>
		</form>
	</div>
	<?php
}

/**
 * Register settings and fields.
 */
function wpral_register_settings() {
	register_setting( 'wpral_settings_group', 'wpral_logout_redirect_url', 'esc_url' );
	register_setting( 'wpral_settings_group', 'wpral_use_safe_redirect' );

	add_settings_section(
		'wpral_settings_section',
		__( 'Logout Redirect Settings', 'redirect-after-logout' ),
		null,
		'wpral-redirect-settings'
	);

	add_settings_field(
		'wpral_logout_redirect_url',
		__( 'Redirect URL', 'redirect-after-logout' ),
		'wpral_render_redirect_url_field',
		'wpral-redirect-settings',
		'wpral_settings_section'
	);

	add_settings_field(
		'wpral_use_safe_redirect',
		__( 'Safe Redirect', 'redirect-after-logout' ),
		'wpral_render_use_safe_redirect_field',
		'wpral-redirect-settings',
		'wpral_settings_section'
	);
}

add_action( 'admin_init', 'wpral_register_settings' );

/**
 * Render the redirect URL field.
 */
function wpral_render_redirect_url_field() {
	$redirect_url = get_option( 'wpral_logout_redirect_url', '' );
	?>
	<input type="url" name="wpral_logout_redirect_url" value="<?php echo esc_url( $redirect_url ); ?>" class="regular-text">
	<p class="description"><?php esc_html_e( 'Enter the URL where users should be redirected after logging out. Leave empty to not redirect.', 'redirect-after-logout' ); ?></p>
	<?php
}

/**
 * Render the use safe redirect field.
 */
function wpral_render_use_safe_redirect_field() {
	$use_safe_redirect = get_option( 'wpral_use_safe_redirect', true );
	?>
	<input type="checkbox" name="wpral_use_safe_redirect" value="1" <?php checked( $use_safe_redirect, true ); ?>>
	<p class="description"><?php esc_html_e( 'Check this box to make sure the redirect is safe and only goes to the same site. Uncheck if you want to allow redirects to any URL.', 'redirect-after-logout' ); ?></p>
	<?php
}
?>
