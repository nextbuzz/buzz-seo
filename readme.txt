=== Plugin Name ===
Contributors: lengthofrope, nextbuzz
Donate link: http://www.nextbuzz.nl/
Tags: seo
Requires at least: 4.1
Tested up to: 4.5.3
Stable tag: 0.8.3
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

= Can I disable the metaboxes in the admin interface for a certain post type? =

All non-public post types do not show the metaboxes on the admin pages. It is also possible to disable the metaboxes
for public post-types by using a filter:

`
<?php
add_filter('buzz-seo-disable-posttype', function($posttypes) {
    $posttypes[] = 'customposttypeslug';
    return $posttypes;
});
?>
`

= Can I change the name of the admin ui menu? =

Yes, this is possible by using the following filter:

`
<?php
add_filter('buzz-seo-menu-name', function($current_name) {
    return 'SEO';
});
?>
`

== Changelog ==

= 0.8.3 =
* Fix: issue with multilingual sites using Polylang/ WPML.

= 0.8.2 =
* Add: updater scripts enhancement to allow database changes in the future
* Update: make CPT meta's (title, description e.d) translatable
* Fix: archive document title beïng overridden by the first single in the resultset.

= 0.8.1 =
* Fix: redirection does not work if page has extension
* Fix: if a 404 is converted to a 301 you cannot change the redirect URI

= 0.8.0 =
* Add: warning if WordPress does not allow indexing in readingsettings
* Add: warning if permalink settings are in default value
* Add: 404 overview support to setup redirections manually
* Add: auto redirection support
* Update: enhanche POT generation and translations.
* Update: add trailing slashes on redirects
* Update: when refreshing admin page, make sure the currently active tab is reopened
* Fix: cannot change the request uri in 301 table
* Fix: disable some features that do not work with permalink settings in default value
* Fix: redirects do not work if not managing 404 errors.
* Fix: structured data issue if no excerpt is available
* Fix: save posted content in admin before the loop

= 0.7.10 =
* Add: filter to allow removing the interface for certain post types

= 0.7.9 =
* Add: filter to change menu name in admin panel
* Remove: check for updates in plugin list

= 0.7.8 =
* Fix: addJSONLDToLoop does not return content in StructuredData which results in unexpected behaviour
* Fix: Javascript error backend when adding small images
* Fix: Remove all structured data metabox code, since it does not work properly
* Add: Remove hentry class on items containing structured data

= 0.7.7 =
* Add: Add site name for search results in structured data
* Update: Move most structured data to the loop to prevent a lot of queries early on in the WP initialization process
* Update: Recommend featured image for articles, instead of requireing
* Update: Enhance support for structured data

= 0.7.6 =
* Add advanced tracking options to Google Analytics code
* Fix: metaboxes are no longer loaded on non-post-type editing screens
* Fix: Github updater does not work in PHP 7

= 0.7.5 =
* Added Person structured data
* Fixed metaboxes are no longer visible on non-public post types
* Added Google Analytics and Google Webmaster Code support

= 0.7.4 =
* Updated to 3.0 branch of GitHub updater
* Reduced the plugin footprint by removing classes we don't use
* Added Organization structured data

= 0.7.3 =
* Fixed an issue when no checkboxes were selected in structured data

= 0.7.2 =
* Fixed an issue with the github updater
* Added support for metabox notices
* Added more creative works (structured data)
* Added new translations

= 0.7.1 =
* Add admin interface for HTML cleanup
* Updated translations

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

