<?php

/**
* The base configurations of the WordPress.
*
* This file has the following configurations: MySQL settings, Table Prefix,
* Secret Keys, WordPress Language, and ABSPATH. You can find more information
* by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
* wp-config.php} Codex page. You can get the MySQL settings from your web host.
*
* This file is used by the wp-config.php creation script during the
* installation. You don't have to use the web site, you can just copy this file
* to "wp-config.php" and fill in the values.
*
* @package WordPress
*/

// Define Environments


// this environment switcher needs some attention.  we should have something called prouction or live...

//define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/home/staging2/public_html/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
$environments = array(
    'development' => '.dev',
    'staging' => '.staging'
);
// Get Server name
$server_name = $_SERVER['SERVER_NAME'];

foreach($environments AS $key => $env){
    if(strstr($server_name, $env)){
        define('ENVIRONMENT', $key);
        break;
    }
}

// If no environment is set default to production
if(!defined('ENVIRONMENT')) define('ENVIRONMENT', 'staging');

define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] . '/');
define('WP_HOME',    'http://' . $_SERVER['SERVER_NAME']);
define('WP_CONTENT_DIR', $_SERVER['DOCUMENT_ROOT'] . '/wp-content');
define('WP_CONTENT_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/wp-content');

switch(ENVIRONMENT) {
    case 'development':

        define('DB_NAME', 'staging2_nyyimbyDB');
        define('DB_USER', 'root');
        define('DB_PASSWORD', 'root');
        define('DB_HOST', 'localhost');
        define('WP_DEBUG', false);
        //define('WP_HOME',    'http://newyorkyimby.com/');
        //define('WP_SITEURL', 'http://newyorkyimby.com/');
        break;

    case 'staging':

        define('DB_NAME', 'staging2_nyyimbyDB');
        define('DB_USER', 'staging2_nyyimby');
        define('DB_PASSWORD', 'WBDaODBy7x0nLnj');
        define('DB_HOST', 'localhost');
        define('WP_DEBUG', false);
        //define('WP_HOME',    'http://newyorkyimby.com/');
        //define('WP_SITEURL', 'http://newyorkyimby.com/');
        break;
}

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
* Authentication Unique Keys and Salts.
*
* Change these to different unique phrases!
* You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
* You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
*
* @since 2.6.0
*/
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

/**#@-*/

/**
* WordPress Database Table prefix.
*
* You can have multiple installations in one database if you give each a unique
* prefix. Only numbers, letters, and underscores please!
*/
$table_prefix  = 'e5lawmcquw_';

/**
* WordPress Localized Language, defaults to English.
*
* Change this to localize WordPress. A corresponding MO file for the chosen
* language must be installed to wp-content/languages. For example, install
* de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
* language support.
*/
define('WPLANG', '');

/**
* For developers: WordPress debugging mode.
*
* Change this to true to enable the display of notices during development.
* It is strongly recommended that plugin and theme developers use WP_DEBUG
* in their development environments.
*/
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

/** 
# define('WP_HOME','http://ny.dev/');
# define('WP_SITEURL','http://ny.dev/');
*/

define( 'FS_CHMOD_DIR', ( 0755 & ~ umask() ) );
define( 'FS_CHMOD_FILE', ( 0644 & ~ umask() ) );

define('W3TC_DYNAMIC_SECURITY', '577ef1154f3240ad5b9b413aa7346a1e');
