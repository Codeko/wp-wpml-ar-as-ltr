<?php
/**
 * Plugin Name: WP wpml as ltr
 * Description: Override 'ar' code language to be 'ltr'
 * Version: 1.0.0
 */

include_once('updater.php');

if (!defined('ABSPATH')) {
    exit;
}

if (is_admin()) { // note the use of is_admin() to double check that this is happening in the admin
    $config = array(
        'slug' => plugin_basename(__FILE__), // this is the slug of your plugin
        'proper_folder_name' => 'wp-wpml-ar-as-ltr', // this is the name of the folder your plugin lives in
        'api_url' => 'https://api.github.com/repos/Codeko/wp-wpml-ar-as-ltr', // the GitHub API url of your GitHub repo
        'raw_url' => 'https://raw.github.com/Codeko/wp-wpml-ar-as-ltr/main', // the GitHub raw url of your GitHub repo
        'github_url' => 'https://github.com/Codeko/wp-wpml-ar-as-ltr', // the GitHub url of your GitHub repo
        'zip_url' => 'https://github.com/Codeko/wp-wpml-ar-as-ltr/zipball/main', // the zip url of the GitHub repo
        'sslverify' => true, // whether WP should check the validity of the SSL cert when getting an update, see https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/2 and https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/4 for details
        'requires' => '6.4.1', // which version of WordPress does your plugin require?
        'tested' => '6.4.1', // which version of WordPress is your plugin tested up to?
        'readme' => 'README.md', // which file to use as the readme for the version number
        'access_token' => '', // Access private repositories by authorizing under Plugins > GitHub Updates when this example plugin is installed
    );
    new WP_GitHub_Updater($config);
}

function wp_wpml_ar_as_ltr_ar_is_argentine_filter()
{
    add_filter( 'wpml_rtl_languages_codes',  'wp_wpml_ar_as_ltr_filter_wpml_rtl_languages_codes');
}

function wp_wpml_ar_as_ltr_filter_wpml_rtl_languages_codes($array_codes){
    return [];
}

add_action('init', 'wp_wpml_ar_as_ltr_ar_is_argentine_filter');