=== Redirect After Logout ===
Contributors: huzaifaalmesbah, rejaulalomkhan  
Tags: logout, redirect, redirect url, custom redirect, wordpress-logout
Requires at least: 5.6  
Tested up to: 6.6.2  
Requires PHP: 7.0
Stable tag: 1.0.4
License: GPLv2 or later  
License URI: http://www.gnu.org/licenses/gpl-2.0.html  

A simple plugin to redirect users to a custom URL after they log out of WordPress.

== Description ==

[Live Demo](https://tastewp.org/plugins/redirect-after-logout/)

The **Redirect After Logout** plugin allows WordPress site admins to define a custom URL to redirect users to after they log out. Users can be redirected to internal or external URLs, with the option to enable a safe redirect that limits redirection to your domain for added security.

**Key Features:**
- Customizable redirect URL after logout.
- Safe redirect option to limit redirection to URLs within your site.
- Easy settings page to manage redirection.
- No redirection if the URL is left empty.
- Translation support for multiple languages.

== Why Choose Redirect After Logout? ==

The **Redirect After Logout** plugin offers a simple yet powerful solution to control where users are redirected after logging out of your WordPress site. Here’s why it stands out:

1. **Customizable Redirection:**
   You have full control over where users land after they log out. Whether it’s a custom thank-you page, the homepage, or an external URL, you decide the destination.

2. **Safe Redirection Option:**
   For added security, you can enable the **Safe Redirect** option, ensuring users are only redirected to URLs within your website domain, protecting them from being sent to harmful or unauthorized sites.

3. **Easy to Use:**
   The plugin offers an intuitive settings page in the WordPress admin area where you can easily set up your custom redirect URL without any coding knowledge required.

4. **No Redirect if URL is Empty:**
   If you don’t want users to be redirected, simply leave the URL field empty. The plugin will ensure they remain on the default WordPress logout page.

5. **Translation Ready:**
   The plugin is fully translation-ready, making it accessible to a global audience. You can translate it into multiple languages with ease.

6. **Lightweight and Efficient:**
   The plugin is built to be lightweight, ensuring it doesn’t slow down your site or affect your site’s performance.

7. **Supports All Themes:**
   Whether you're using a custom theme or a popular WordPress theme, this plugin will work seamlessly without conflicts.

8. **Regular Updates and Support:**
   We are committed to keeping the plugin updated and compatible with the latest version of WordPress. Our support team is always available to help with any issues or questions you may have.

== Installation ==

= Plugin Installation Method: =

1. Go to the WordPress dashboard.
2. Navigate to **Plugins > Add New**.
3. Search for "Redirect After Logout".
4. Click on the **Install** button.
5. Activate the plugin after installation.

= Installation via Zip File: =

1. Download the **Redirect After Logout** plugin zip file.
2. Go to **Plugins > Add New > Upload Plugin**.
3. Upload `redirect-after-logout.zip` and click **Install**.
4. Activate the plugin once installation is complete.

= Plugin Configuration: =

1. Go to **Settings > Logout Redirect** in your WordPress dashboard.
2. Enter the desired URL for redirection after logout.
3. (Optional) Check the **Safe Redirect** box to restrict redirection to your site domain.
4. Save changes.

== Upgrade Notice ==

= Upgrading from an Older Version: =

1. Go to the **Plugins** section in your WordPress dashboard.
2. If a new version of the plugin is available, click the **Update Now** button.
3. After the update is complete, review the settings at **Settings > Logout Redirect** to ensure the redirect URL and options are correctly configured.

== Frequently Asked Questions ==

= How do I change the redirect URL? =

Navigate to **Settings > Logout Redirect** in the WordPress admin area, and enter your custom redirect URL. Leave the field empty to disable redirection.

= Can I enable redirection only within my domain? =

Yes, check the **Safe Redirect** option in the settings to ensure users are redirected to URLs within your site only.

= Can I leave the redirect URL blank? =  
Yes, if you leave the redirect URL blank, users will not be redirected to any page after logging out. They will remain on the default WordPress logout page.

= Can I redirect users to an external URL? =  
Yes, you can redirect users to any external URL by entering it in the settings. However, if you want to restrict the redirection to your domain, enable the **Safe Redirect** option.

= Does the plugin work with custom login URLs? =  
Yes, the plugin works with custom login/logout URLs created by other plugins or custom development, as long as the logout action is recognized by WordPress.

= How can I translate this plugin into another language? =  
This plugin is translation-ready. You can use any translation plugin or software (e.g., Loco Translate or Poedit) to translate it into your preferred language.

= Does this plugin collect any data? =

The plugin integrates with **Appsero SDK** for telemetry data collection, but only after the user grants permission. Data collection is completely optional and no data is collected by default.

= Can I disable the Appsero telemetry data collection? =  
Yes, data collection is completely optional and only starts when a user explicitly grants permission. If you choose not to allow it, no telemetry data will be collected.

= Will this plugin slow down my site? =  
No, the **Redirect After Logout** plugin is lightweight and optimized to run efficiently without affecting your site’s performance.

= How do I uninstall the plugin? =  
To uninstall the plugin, simply go to **Plugins > Installed Plugins**, find **Redirect After Logout**, and click **Deactivate**. You can then click **Delete** to remove it from your site.

= Can I copy and paste the redirect URL? =  
Yes, you can easily copy and paste any URL into the **Redirect URL** field in the plugin settings.

= Is there a shortcode available to trigger logout? =  
No, the plugin currently does not include a shortcode. However, it works seamlessly with the default WordPress logout action.

== Screenshots ==

1. Admin settings page to customize redirect URL and enable safe redirect.
2. Safe redirect option checkbox.

== Check out our other Plugins ==

- **[Smart Password Protect](https://wordpress.org/plugins/smart-password-protect/)** - Secure your WordPress site with password protection and IP whitelisting.
- **[Random Quote](https://wordpress.org/plugins/random-quote/)** - Display a random quote on your site to inspire visitors.
- **[Redirect After Logout](https://wordpress.org/plugins/redirect-after-logout/)** - Redirect users to a custom page after logging out for enhanced user experience.
- **[Product Spotlight Badge](https://wordpress.org/plugins/product-spotlight-badge/)** - Highlight special products with a customizable spotlight badge on your WooCommerce store.
- **[User First Kit](https://wordpress.org/plugins/user-first-kit/)** - Enhance your site's user experience with a toolkit designed to prioritize user engagement and interaction.

== Changelog ==

= 1.0.4 =
* Removed Appsero SDK.
* Removed composer.json from production.

= 1.0.3 =
* Integrated Appsero SDK for optional telemetry data collection.
* Organized and updated the readme file for better clarity and structure.

= 1.0.2 =
* Version update (Tested up to WordPress 6.6.2).

= 1.0.1 =
* Added settings page for customizing the redirect URL.
* Added an option to choose whether the redirect should be limited to your site (safe redirect) or allow any URL.
* Improved security and adherence to WordPress coding standards.
* Added translation support.

= 1.0 =
* Initial release.
