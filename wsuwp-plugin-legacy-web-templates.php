<?php
/**
 * Plugin Name: WSUWP Plugin Legacy Web Templates
 * Plugin URI: https://github.com/wsuwebteam/wsuwp-plugin-legacy-web-templates
 * Description: Describe the plugin
 * Version: 0.0.1
 * Requires PHP: 7.3
 * Author: Washington State University, Danial Bleile
 * Author URI: https://web.wsu.edu/
 * Text Domain: wsuwp-plugin-legacy-web-templates
 */


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'WSUWPPLUGINWEBTEMPLATEVERSION', '0.0.1' );

add_action( 'after_setup_theme', 'wsuwp_plugin_legacy_web_template_init' );

function wsuwp_plugin_legacy_web_template_init() {

	// Initiate plugin
	require_once __DIR__ . '/includes/plugin.php';

}
