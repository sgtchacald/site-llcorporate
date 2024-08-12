<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'll-corporate' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '7Mi3Bsz7NbY1gkhkvxhnzXcQ268YsZV8TveB1bqr2Hw4wZGjLAwo9NteHwYGba0H' );
define( 'SECURE_AUTH_KEY',  'ECKubZOmfmvsB5DMgwcPuComyfisHR4tZqiX1sAOsWIahmLwJVjtwYlW94CyG8yU' );
define( 'LOGGED_IN_KEY',    'J36SMOorUG9YoxtRgqPIebL2AnKg0IbWT5iy4CRnQP6HMgHVCxmreIUlT7ZzSf0G' );
define( 'NONCE_KEY',        'OrphmCYxz1LubZjXgjsCXJ8HCud5AyjqMIi07N9WfItfiaElv9qoWssJE0lz6mKt' );
define( 'AUTH_SALT',        'KH3jYdlzX4q28lYV2bkFXVx6PVMYLn6hCVhbbhqTDOfWIfc0IufY6nzmb3CDRRp8' );
define( 'SECURE_AUTH_SALT', 'LrGzLJefv5hlmnlL8gQPoJJ3wLGCiPSiHBRKszjd2YAloCokJo1ZXoK4rdK5GxeD' );
define( 'LOGGED_IN_SALT',   'QQ1YmyOlaoUR0PbQ80tJ9i6IyS9qKF1LBfRmvKAMpRYSTwlKD15WF9iscg76SEPq' );
define( 'NONCE_SALT',       '2Kmz0jV5YGIafWJNtgLJitdX6pWXy88qJltvKJrIOOU9EIUwl05k8YUVHBks0WA6' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
