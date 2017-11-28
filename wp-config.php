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
define('DB_NAME', 'beautify_pro');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '&!.a,1jv(-X2Prz>d^.+RoAuwlJ?s#-o0hn<[9):g~$wW $TIoX-V!3+E)7f-pr]');
define('SECURE_AUTH_KEY',  'i>&tns0C1-hrZ}X_;.O-pgD`+ +B3g8?|M@fhUpwH`E#L%wdgUj547uazs+]STd,');
define('LOGGED_IN_KEY',    '+|}bFPnyJ`d}U.n.$`G`9T$zLiBFp_hd+DVW-1]!tbcoG-{5X$kNk7r7K5T6%&V5');
define('NONCE_KEY',        'v^c.7~H?+m=jY ?yLX%G+6NniLGrz!bS-B2WXt|,6Ei<ZOZhkOV##|:n%*H+2(W1');
define('AUTH_SALT',        'lUS}9j%k:HQb7hpr8X:a,_6ZL4,5$@!d=U[0@ygl9.YhN:c<&1YK,3E:A{ny,`#e');
define('SECURE_AUTH_SALT', ';uIRiP4c|@JeE-fv.mQ[,R@&UbqTHbK=km!I4J|cSy:ZK]K2Wl5SuC__$II,fy|m');
define('LOGGED_IN_SALT',   'V[46s(+w5.,OhW<wDjCU(6,AVn|& ,HTtteE::*owX/-h4?c29f05NPp9;*-45.w');
define('NONCE_SALT',       'TlGInm_&-a?20Yf;oi?PM{+)2uF(5JPj.v+;,5}aX!u#f|pCzE+oA;wf+yUJr?W{');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
