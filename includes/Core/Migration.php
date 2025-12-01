<?php
/**
 * Migration Class.
 *
 * @package RedirectAfterLogout
 */

namespace REDALO\Core;

/**
 * Class Migration
 */
class Migration {

	/**
	 * Initialize migration.
	 *
	 * @return void
	 */
	public function init() {
		add_action( 'admin_init', array( $this, 'run_migration' ) );
	}

	/**
	 * Run migration logic.
	 *
	 * @return void
	 */
	public function run_migration() {
		if ( get_option( 'redalo_migrated' ) ) {
			return;
		}

		$settings = array();
		$migrated = false;

		// Migrate wpral_logout_redirect_url -> redalo_settings['logout_redirect_url'].
		$old_url = get_option( 'wpral_logout_redirect_url' );
		if ( false !== $old_url ) {
			$settings['logout_redirect_url'] = $old_url;
			// Explicitly set type to custom if migrating from old URL.
			$settings['redirect_type'] = 'custom';
			$migrated = true;
		}

		// Migrate wpral_use_safe_redirect -> redalo_settings['use_safe_redirect'].
		$old_safe = get_option( 'wpral_use_safe_redirect' );
		if ( false !== $old_safe ) {
			$settings['use_safe_redirect'] = $old_safe;
			$migrated = true;
		}

		if ( $migrated ) {
			update_option( 'redalo_settings', $settings );
		}

		update_option( 'redalo_migrated', true );
	}
}
