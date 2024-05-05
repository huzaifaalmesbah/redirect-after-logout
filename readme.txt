=== Redirect After Logout ===
Contributors: huzaifaalmesbah
Tags: logout, redirect, customization
Requires at least: 5.6
Tested up to: 6.5
Requires PHP: 7.0
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A simple plugin to redirect users to a custom URL after they log out of WordPress.

== Description ==

This plugin redirects users to a custom URL after they log out of WordPress. The redirect URL can be customized using a filter. By default, users are redirected to the Homepage.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.

== Frequently Asked Questions ==

* **How do I change the redirect URL?**
   You can use the `wpral_logout_redirect_url` filter to change the redirect URL

== Changelog ==

= 1.0 =
* Initial release.