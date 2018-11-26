<?php

/**

 * The base configuration for WordPress

 *

 * The wp-config.php creation script uses this file during the

 * installation. You don't have to use the web site, you can

 * copy this file to "wp-config.php" and fill in the values.

 *

 * This file contains the following configurations:

 *

 * * MySQL settings

 * * Secret keys

 * * Database table prefix

 * * ABSPATH

 *

 * @link https://codex.wordpress.org/Editing_wp-config.php

 *

 * @package WordPress

 */



// ** MySQL settings - You can get this info from your web host ** //

/** The name of the database for WordPress */

define('DB_NAME', getenv('DBNAME'));



/** MySQL database username */

define('DB_USER', getenv('DBUSER'));



/** MySQL database password */

define('DB_PASSWORD', getenv('DBPASSWORD'));



/** MySQL hostname */

define('DB_HOST', getenv('DBHOST'));



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

define('AUTH_KEY',         '19593bf75bff20d4b4f28dcc2ecd7969dc17a2d5');

define('SECURE_AUTH_KEY',  '54fc3c55b5f831cbbaa7e67a415dd665a8e391e5');

define('LOGGED_IN_KEY',    'adcb4dd4177ba62e9fa15d3e9a8fa9c1905b4476');

define('NONCE_KEY',        '9cf60541f7e0986f0790785c8e732e2cbe3b1130');

define('AUTH_SALT',        '9b8d5fbeae6c9e6225fe35db3fa8fd875eea4d37');

define('SECURE_AUTH_SALT', '1508b683c0bb2fced4c7483850a0beacad561c1f');

define('LOGGED_IN_SALT',   'de78eab6c48ff0936b102b398d45f35bc21a02ae');

define('NONCE_SALT',       '87163150ee330afe8e33ffead3acfbf9b3a82ddb');

define('WP_ALLOW_MULTISITE', true);

/**#@-*/



/**

 * WordPress Database Table prefix.

 *

 * You can have multiple installations in one database if you give each

 * a unique prefix. Only numbers, letters, and underscores please!

 */

$table_prefix  = 'wp_';

/*
 * Handle multi domain into single instance of wordpress installation
 */
define('WP_SITEURL', 'https://' . $_SERVER['SERVER_NAME']);
define('WP_HOME', 'https://' . $_SERVER['SERVER_NAME']);
define('DOMAIN_CURRENT_SITE', $_SERVER['HTTP_HOST']);
#define('WP_SITEURL', 'https://helpcenter.valuekeep.com');
#define('WP_HOME', 'https://helpcenter.valuekeep.com');
#if ($_SERVER['HTTP_HOST'] == 'vki-helpcenter.valuekeep.com') {
#    define('WP_SITEURL', 'https://vki-helpcenter.valuekeep.com');
#    define('WP_HOME',    'https://vki-helpcenter.valuekeep.com');
#} else {
#    define('WP_SITEURL', 'https://helpcenter.valuekeep.com');
#    define('WP_HOME',    'https://helpcenter.valuekeep.com');
#}

/**

 * For developers: WordPress debugging mode.

 *

 * Change this to true to enable the display of notices during development.

 * It is strongly recommended that plugin and theme developers use WP_DEBUG

 * in their development environments.

 *

 * For information on other constants that can be used for debugging,

 * visit the Codex.

 *

 * @link https://codex.wordpress.org/Debugging_in_WordPress

 */

define('WP_DEBUG', false);



// If we're behind a proxy server and using HTTPS, we need to alert Wordpress of that fact
// see also http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}

/* That's all, stop editing! Happy blogging. */



/** Absolute path to the WordPress directory. */

if ( !defined('ABSPATH') )

	define('ABSPATH', dirname(__FILE__) . '/');



/** Sets up WordPress vars and included files. */

require_once(ABSPATH . 'wp-settings.php');


