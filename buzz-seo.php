<?php

/*
  Plugin Name: Buzz SEO
  Plugin URI: http://www.nextbuzz.nl
  Description: This might become a simple WordPress SEO plugin someday. Currently in active development.
  Version: 0.0.1
  Author: Next Buzz BV
  Author URI: https://github.com/nextbuzz/
  License: MIT
  Text Domain: buzz-seo
 */

// Set the folder of this plugin
if (!defined('BUZZSEO_DIR')) {
    define('BUZZSEO_VERSION', '0.0.1');
    define('BUZZSEO_DIR', plugin_dir_path(__FILE__));
    define('BUZZSEO_DIR_REL', dirname(plugin_basename(__FILE__)));
}

// Make sure we don't expose any info if called directly
if (!function_exists('add_action')) {
    echo 'Silence is golden.';
    exit;
}

// Load the autoloader
require_once 'vendor/autoload.php';

// Load our application
if (class_exists('\NextBuzz\SEO\App')) {
    \NextBuzz\SEO\App::getInstance();
}