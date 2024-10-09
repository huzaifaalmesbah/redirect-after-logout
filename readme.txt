=== Redirect After Logout ===
Contributors: huzaifaalmesbah, rejaulalomkhan
Tags: logout, redirect, customization
Requires at least: 5.6
Tested up to: 6.6.1
Requires PHP: 7.0
Stable tag: 1.0.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A simple plugin to redirect users to a custom URL after they log out of WordPress.

== Description ==

[Live Demo](tastewp.org/plugins/redirect-after-logout/)

This plugin redirects users to a custom URL after they log out of WordPress. The redirect URL can be customized via a settings page in the WordPress admin area. If the redirect URL is left empty, users will not be redirected. You can also choose whether the redirect should be limited to your site (safe redirect) or allow any URL.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Go to Settings > Logout Redirect to customize the redirect URL and redirection type.

== Screenshots ==

1. Redirect After Logout Admin Settings.
2. Redirect After Logout Safe Redirect.

== Frequently Asked Questions ==

= How do I change the redirect URL? =

You can change the redirect URL by going to Settings > Logout Redirect in the WordPress admin area and entering your desired URL. If the field is left empty, users will not be redirected after logging out.

= How do I choose between safe redirect and normal redirect? =

You can choose whether the redirect should be limited to your site (safe redirect) or allow any URL by checking or unchecking the "Use Safe Redirect" checkbox in the settings page.

== Changelog ==
= 1.0.2 =
* Version Update (Tested up to).

= 1.0.1 =
* Added settings page for customizing the redirect URL.
* Added an option to choose whether the redirect should be limited to your site (safe redirect) or allow any URL.
* Improved security and adherence to WordPress coding standards.
* Added translation support.

= 1.0 =
* Initial release.
