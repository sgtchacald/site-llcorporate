<?php
/*
Plugin Name: Infotek Core
Plugin URI: https://themeforest.net/user/gramentheme/portfolio
Description: Plugin to contain short codes and custom post types of the Infotek theme.
Author: Gramentheme
Author URI: https://gramentheme.com/
Version: 1.0.0
Text Domain: infotek-core
*/


/**
 * If this file is called directly, abort.
 * @package infotek
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


/**
 * Plugin directory path
 * @package infotek
 * @since 1.0.0
 */
define( 'INFOTEK_CORE_ROOT_PATH', plugin_dir_path( __FILE__ ) );
define( 'INFOTEK_CORE_ROOT_URL', plugin_dir_url( __FILE__ ) );
define( 'INFOTEK_CORE_SELF_PATH', 'infotek-core/infotek-core.php' );
define( 'INFOTEK_CORE_VERSION', '2.0.1' );
define( 'INFOTEK_CORE_INC', INFOTEK_CORE_ROOT_PATH .'/inc');
define( 'INFOTEK_CORE_LIB', INFOTEK_CORE_ROOT_PATH .'/lib');
define( 'INFOTEK_CORE_ELEMENTOR', INFOTEK_CORE_ROOT_PATH .'/elementor');
define( 'INFOTEK_CORE_DEMO_IMPORT', INFOTEK_CORE_ROOT_PATH .'/demo-import');
define( 'INFOTEK_CORE_ADMIN', INFOTEK_CORE_ROOT_PATH .'/admin');
define( 'INFOTEK_CORE_ADMIN_ASSETS', INFOTEK_CORE_ROOT_URL .'admin/assets');
define( 'INFOTEK_CORE_WP_WIDGETS', INFOTEK_CORE_ROOT_PATH .'/wp-widgets');
define( 'INFOTEK_CORE_ASSETS', INFOTEK_CORE_ROOT_URL .'assets/');
define( 'INFOTEK_CORE_CSS', INFOTEK_CORE_ASSETS .'css');
define( 'INFOTEK_CORE_JS', INFOTEK_CORE_ASSETS .'js');
define( 'INFOTEK_CORE_IMG', INFOTEK_CORE_ASSETS .'img');


/**
 * Load additional helpers functions
 * @package infotek
 * @since 1.0.0
 */
if (!function_exists('infotek_core')){
	require_once INFOTEK_CORE_INC .'/theme-core-helper-functions.php';
	if (!function_exists('infotek_core')){
		function infotek_core(){
			return class_exists('Infotek_Core_Helper_Functions') ? new Infotek_Core_Helper_Functions() : false;
		}
	}
}
//ob flash
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );


/**
 * Load Codestar Framework Functions
 * @package infotek
 * @since 1.0.0
 */
if ( !infotek_core()->is_infotek_active()) {
	if ( file_exists( INFOTEK_CORE_ROOT_PATH . '/inc/csf-functions.php' ) ) {
		require_once INFOTEK_CORE_ROOT_PATH . '/inc/csf-functions.php';
	}
}



/**
 * Core Plugin Init
 * @package infotek
 * @since 1.0.0
 */
if ( file_exists( INFOTEK_CORE_ROOT_PATH . '/inc/theme-core-init.php' ) ) {
	require_once INFOTEK_CORE_ROOT_PATH . '/inc/theme-core-init.php';
}