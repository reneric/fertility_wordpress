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
 
// Include local configuration
if (file_exists(dirname(__FILE__) . '/local-config.php')) {
	include(dirname(__FILE__) . '/local-config.php');
}

// Global DB config
if (!defined('DB_NAME')) {
	define('DB_NAME', 'fertility_wp');
}
if (!defined('DB_USER')) {
	define('DB_USER', 'root');
}
if (!defined('DB_PASSWORD')) {
	define('DB_PASSWORD', 'root');
}
if (!defined('DB_HOST')) {
	define('DB_HOST', 'localhost');
}

/** Database Charset to use in creating database tables. */
if (!defined('DB_CHARSET')) {
	define('DB_CHARSET', 'utf8');
}

/** The Database Collate type. Don't change this if in doubt. */
if (!defined('DB_COLLATE')) {
	define('DB_COLLATE', '');
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'ulZ?Q7Ovv`T@wtw}4[cA$i=p-B%6nWvagFO{C1RhwfkPr!oM#o+IvsR7}^1DjIxy');
define('SECURE_AUTH_KEY',  'Z&e%wz<C`*rnXUl#!mSzf4Lg@r76JrMw7>RCV!=is+|GET_m$>pt2-qXS/wrBO[l');
define('LOGGED_IN_KEY',    'dLs5nb.0_zjP4N*8)_WE%h-|67oEY,&E-aT%8(rY5XY-2#[maj7f%g-rx+Bgpbg,');
define('NONCE_KEY',        'FJLv_an~euG&~|v[>1)]f#gmY3`#hN;^]Tyt/t$]_E>w+E;1_SDF&bYYvFqxZU66');
define('AUTH_SALT',        ':eBp@? o%g6gn%+xW*>aus)f%o{r_h%o,KgG~bM*YS:M}|=u2.Nvnr~QwoQLO=|I');
define('SECURE_AUTH_SALT', 'e17}Wzx.%6:,;&<{!3O+oLov<;PXn*xZnb$.0CK|O.<*@9)5--un_r(K24WV%{wP');
define('LOGGED_IN_SALT',   '0rG<2^}q}><l1?N/+w0MY<S-y|$yIGUde66?RhgqM#OY~ ++X=^x@SfKd2]0X+HK');
define('NONCE_SALT',       '*+APdbhGX#}Lv,-uzG-`~x/1hAkqtO+re}eDwXo9i];+3PI3|N@c;lS2pR/7lAHQ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
if (!defined('WP_DEBUG')) {
	define('WP_DEBUG', false);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
