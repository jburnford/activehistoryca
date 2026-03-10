<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information by
 * visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', getenv('DB_NAME') ?: 'activehistoryca');
/** MySQL database username */
define('DB_USER', getenv('DB_USER') ?: 'activehistoryca');
/** MySQL database password */
define('DB_PASSWORD', getenv('DB_PASSWORD') ?: 'CHANGE_ME');
define('WP_ALLOW_REPAIR', true);
/** MySQL hostname */
define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');
/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
/**#@+
 * Authentication Unique Keys.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         getenv('AUTH_KEY')         ?: 'put-your-unique-phrase-here');
define('SECURE_AUTH_KEY',  getenv('SECURE_AUTH_KEY')  ?: 'put-your-unique-phrase-here');
define('LOGGED_IN_KEY',    getenv('LOGGED_IN_KEY')    ?: 'put-your-unique-phrase-here');
define('NONCE_KEY',        getenv('NONCE_KEY')        ?: 'put-your-unique-phrase-here');
/**#@-*/
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';
if (! defined('WP_DEBUG') ) { define( 'WP_DEBUG', true ); } // line added by the MyKinsta
define('WP_DEBUG_DISPLAY', false);
define('WP_DEBUG_LOG', true);
/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', '');
/* Multisite */
define( 'WP_ALLOW_MULTISITE', true );
define( 'MULTISITE', true );
define( 'SUBDOMAIN_INSTALL', false );
define( 'DOMAIN_CURRENT_SITE', 'activehistory.ca' );
define( 'PATH_CURRENT_SITE', '/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );
define( 'AUTH_SALT',        getenv('AUTH_SALT')        ?: 'put-your-unique-phrase-here' );
define( 'SECURE_AUTH_SALT', getenv('SECURE_AUTH_SALT') ?: 'put-your-unique-phrase-here' );
define( 'LOGGED_IN_SALT',   getenv('LOGGED_IN_SALT')   ?: 'put-your-unique-phrase-here' );
define( 'NONCE_SALT',       getenv('NONCE_SALT')       ?: 'put-your-unique-phrase-here' );
/* That's all, stop editing! Happy blogging. */
/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
