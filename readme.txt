=== Plugin Name ===
Contributors: lengthofrope, nextbuzz
Donate link: http://www.nextbuzz.nl/
Tags: seo
Requires at least: 4.1
Tested up to: 4.5-beta
Stable tag: 0.7.0
License: MIT
License URI: https://opensource.org/licenses/MIT

This is a WordPress SEO plugin. It covers the basics of SEO optimization.

== Description ==

This plugin is currently in active development and in a useable state, but note until we reach version 1.0 things might
break after updating!

== Installation ==

This section describes how to install the Buzz SEO plugin and get it working.

1. Get the latest release from github (https://github.com/nextbuzz/buzz-seo/releases)
2. Upload the plugin files to the `/wp-content/plugins/buzz-seo` directory.
3. Activate the plugin through the 'Plugins' screen in WordPress
4. Use the `Buzz SEO` screen to configure the plugin


== Frequently Asked Questions ==

= Why can't I find this plugin in the WordPress plugin repository? =

We as a development team use GitHub for all our opensource projects. WordPress only provides an SVN repository to host
the plugins. Since we stopped using SVN ages ago, we cannot be found on the WordPress plugin repository.

= Do you support automatic updates? =

Yes, once installed, the plugin checks the GitHub repository and updates the plugin from there.

= I found a bug! =

Please report it on our GitHub issue tracker (https://github.com/nextbuzz/buzz-seo/issues) so we can check into it and
try to solve it in a future release.

== Changelog ==

= 0.7.0 =
* Add: Possibility to cleanup the HTML head section.
* Fix: Saving permalinks did not work when enabling/ disabling sitemap.
* Update: translations.

= 0.6.8 =
* Update translations.

= 0.6.7 =
* Still figuring out how the updater works exactly. Nothing else.

= 0.6.6 =
* Fixed another issue with the sitemap generator if no items where selected.

= 0.6.5 =
* Fixed an issue with the sitemap generator if no items where selected.

= 0.6.4 =
* Messed up the previous release

= 0.6.3 =
* Fixed the stable tag

= 0.6.2 =
* Fixed an issue when activating the plugin
* Added a notice if the active WordPress Theme still uses the old `wp_title()` to generate the document title.
* Added the GitHub Updater

= 0.6.1 =
* Removed some unneeded files

= 0.6.0 =
* Added basic support for structured data

= 0.5.0 =
* Added WP 4.1 document title support
* Added support for custom archives
* Added support for xml sitemaps

= 0.0.3 =
* Added support for canonical links

= 0.0.2 =
* Added basic templating for this plugin

= 0.0.1 =
* Initial setup of the project

== Upgrade Notice ==

= 0.0.2 =
Added basic templating for this plugin

= 0.0.1 =
Initial setup of the project

