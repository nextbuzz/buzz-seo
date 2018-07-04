<?php

/*
  Plugin Name: Buzz SEO
  Plugin URI: https://github.com/nextbuzz/buzz-seo
  Description: This is a WordPress SEO plugin. It covers the basics of SEO optimization. Requires PHP 5.3+ and WP 4.1+
  Version: 0.11.3.4
  Author: Next Buzz BV
  Author URI: https://www.nextbuzz.nl
  License: MIT
  Text Domain: buzz-seo
 */

// Set the folder of this plugin
if (!defined('BUZZSEO_DIR')) {
    define('BUZZSEO_VERSION', '0.11.3.4');
    define('BUZZSEO_FILE', __FILE__);
    define('BUZZSEO_DIR', plugin_dir_path(__FILE__));
    define('BUZZSEO_DIR_REL', dirname(plugin_basename(__FILE__)));
}

// Make sure we don't expose any info if called directly
if (!function_exists('add_action')) {
    echo 'Silence is golden.';
    exit;
}

// Check wordpress version
if (isset($wp_version) && version_compare($wp_version, '4.4.0', '>=') && version_compare(PHP_VERSION, '5.3.0', '>=')) {
    // Load the autoloader
    require_once 'vendor/autoload.php';

    // Load our application
    if (class_exists('\NextBuzz\SEO\App')) {
        \NextBuzz\SEO\App::getInstance();
    }
} else {
    // Output a nag error on admin interface
    add_action('admin_notices', function() {
        echo '<div class="error"><p>Plugin Buzz SEO is enabled but doesn\'t work since WP or PHP version requirements are not met. Buzz SEO <strong>requires</strong> at least <strong>WP 4.4.0</strong> and <strong>PHP 5.3.0</strong>.</p></div>';
    });
}
