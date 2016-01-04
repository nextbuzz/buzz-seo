<?php

/*
  Plugin Name: LengthOfRope SEO
  Plugin URI: http://www.lengthofrope.nl
  Description: This might become a simple WordPress SEO plugin someday. Currently in active development.
  Version: 0.0.1
  Author: LengthOfRope
  Author URI: https://github.com/lengthofrope/
  License: MIT
  Text Domain: lor-seo
 */

// Set the folder of this plugin
if (!defined('LORSEO_DIR')) {
    define('LORSEO_VERSION', '0.0.1');
    define('LORSEO_DIR', plugin_dir_path(__FILE__));
    define('LORSEO_DIR_REL', dirname(plugin_basename(__FILE__)));
}

// Make sure we don't expose any info if called directly
if (!function_exists('add_action')) {
    echo 'Silence is golden.';
    exit;
}

// Load the autoloader
require_once 'vendor/autoload.php';

// Load our application
if (class_exists('\LengthOfRope\SEO\App')) {
    new \LengthOfRope\SEO\App();
}