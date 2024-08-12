<?php
/**
 * Theme functions & definitations
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package infotek
 */

/**
 * Define Theme Folder Path & URL Constant
 * @package infotek
 * @since 1.0.0
 */

define('INFOTEK_THEME_ROOT', get_template_directory());
define('INFOTEK_THEME_ROOT_URL', get_template_directory_uri());
define('INFOTEK_INC', INFOTEK_THEME_ROOT . '/inc');
define('INFOTEK_THEME_SETTINGS', INFOTEK_INC . '/theme-settings');
define('INFOTEK_THEME_SETTINGS_IMAGES', INFOTEK_THEME_ROOT_URL . '/inc/theme-settings/images');
define('INFOTEK_TGMA', INFOTEK_INC . '/plugins/tgma');
define('INFOTEK_DYNAMIC_STYLESHEETS', INFOTEK_INC . '/theme-stylesheets');
define('INFOTEK_CSS', INFOTEK_THEME_ROOT_URL . '/assets/css');
define('INFOTEK_JS', INFOTEK_THEME_ROOT_URL . '/assets/js');
define('INFOTEK_ASSETS', INFOTEK_THEME_ROOT_URL . '/assets');
define('INFOTEK_DEV', true);


/**
 * Theme Initial File
 * @package infotek
 * @since 1.0.0
 */
if (file_exists(INFOTEK_INC . '/theme-init.php')) {
    require_once INFOTEK_INC . '/theme-init.php';
}


/**
 * Codester Framework Functions
 * @package infotek
 * @since 1.0.0
 */
if (file_exists(INFOTEK_INC . '/theme-cs-function.php')) {
    require_once INFOTEK_INC . '/theme-cs-function.php';
}


/**
 * Theme Helpers Functions
 * @package infotek
 * @since 1.0.0
 */
if (file_exists(INFOTEK_INC . '/theme-helper-functions.php')) {

    require_once INFOTEK_INC . '/theme-helper-functions.php';
    if (!function_exists('infotek')) {
        function infotek()
        {
            return class_exists('Infotek_Helper_Functions') ? new Infotek_Helper_Functions() : false;
        }
    }
}
/**
 * Nav menu fallback function
 * @since 1.0.0
 */
if (is_user_logged_in()) {
    function infotek_theme_fallback_menu()
    {
        get_template_part('template-parts/default', 'menu');
    }
}

// theme-color

if (file_exists(INFOTEK_INC . '/theme-color.php')) {
    require_once INFOTEK_INC . '/theme-color.php';
}

