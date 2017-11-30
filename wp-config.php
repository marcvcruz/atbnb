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
define('DB_NAME', 'atbnb');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost:8889');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '9hrbr5nxclzeg7pgqxppiz4rpf4mqtu3yg07cmvv4y47v84bxvrwlwpoha6iyhvs');
define('SECURE_AUTH_KEY',  'i49idktyia88nfefqyawuoggeckqv2rkdkd6mt55m9pkwwlhdfvkhqqxougv2it8');
define('LOGGED_IN_KEY',    '23nbkadokmk8orvlvq5de42o7tfyzhgf43ghbjbbrht94xaxk9bcvtcc9z5kun0v');
define('NONCE_KEY',        'p8a12eouzzxsdup7tlavh8mqntomcg5jlkaahlbwkehiythpfgq4nsa9drn38qcl');
define('AUTH_SALT',        'yu8fsknqftyn5ctlhkg03yazbwnucc7fkyojxjgz5qt3kujkn4e8godhrcnduzz3');
define('SECURE_AUTH_SALT', '2bbikcplrcbjgod0h30z15ra6xxnnqv7vif7jxcgpcdcnjp1ifce777fzzugfevk');
define('LOGGED_IN_SALT',   'e6mwvogwc2bj0lndnc3nazmdmuu7qrgyaubthj9zixhis5cvlptnuoh54683xgkg');
define('NONCE_SALT',       'uwehhvizpld2kklllat33e0wag2wa0gr4myja2invdguj9e5ihj9mmt5tbp7ayva');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'atbnb_';

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
define( 'WP_MEMORY_LIMIT', '1024G' );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

# Disables all core updates. Added by SiteGround Autoupdate:
define( 'WP_AUTO_UPDATE_CORE', false );
