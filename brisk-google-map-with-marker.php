<?php
/**
* Plugin Name: Brisk Google Map With Marker
* Description: Create Google Maps in a minute with Brisk Google Map With Marker WordPress plugin add google map with shortcode
* Version: 1.0.0
* Requires PHP: 7.0
* Author: Briskstar Technologies LLP
* License: GPL v2 or later
**/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! defined( 'BGMWM_PLUGIN_FILE' ) ) {
    define( 'BGMWM_PLUGIN_FILE', __FILE__ );
}

// Enable error reporting in development
if(getenv('WPAE_DEV')) {
    error_reporting(E_ALL ^ E_DEPRECATED );
    ini_set('display_errors', 1);
}

// Include the main BriskGoogleMapWithMarker class.

require_once __DIR__ . '/includes/class-briskgooglemap-autoloader.php';
Briskgooglemap_Autoloader::register();


/* ***************************** HOOK INTO WP *************************** */
$spl_autoload_exists = function_exists( 'spl_autoload_register' );
if ( ! wp_installing() && $spl_autoload_exists  ) {
    add_action('plugins_loaded', 'BGMWM');
}

// phpcs:ignore WordPress.NamingConventions.ValidFunctionName.FunctionNameInvalid
function BGMWM() { 
    return BriskGoogleMapWithMarker::instance();
}
?>