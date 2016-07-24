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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'allravetransportation');

/** MySQL database username */
define('DB_USER', 'allravetrans');

/** MySQL database password */
define('DB_PASSWORD', '5tBqundq');

/** MySQL hostname */
define('DB_HOST', 'mysql.allravetransportation.com');

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
define('AUTH_KEY',         'm8;Y~UP|5r`Em~6DbU(oPh:2hKCZ2hj^;YQ*9Y"3G`Lj#Oxwj963rO^u?i?0cu7d');
define('SECURE_AUTH_KEY',  'K6dZTQP0r7KZJ*SSt&^vQxPsJUJ"5dW|BID8SC@DhA:w@#q1E+eou!u1N5&?hxoe');
define('LOGGED_IN_KEY',    'qpdpuT~IvUZ+~*hAf*KW%ow&|P6Cz3`8Re%q9Gyp~(HL)g":rkr6gcy~6J&DIF!P');
define('NONCE_KEY',        ')~oVk%CVeu4+^@M/2%7*"n^9$a5W?*@ItLV_qnWk%)Ry)If*f$p9KSVd"0mjPwo7');
define('AUTH_SALT',        'K(l9)C)jBISwzES3zfnW8@LT!ZNHhuU|i;Tq6/67%hr4;ENn5)0rrdJ^7m?t"iuj');
define('SECURE_AUTH_SALT', 'rp?5IfY7PMI+_*Zo5gm|90IppykE4tshFQ4a|seO%:H*?stEfozw/j`N3!q@uhm+');
define('LOGGED_IN_SALT',   'R)lse/Gvzi!_|RTIkX"JEIsn1l@q^YlP:g(sy#DX|$CAN`znUZPOD&g`t51:)"Si');
define('NONCE_SALT',       'vw?A4W+(rQX3+My;J*_3NBlJ(6!Ide;r:`U`m"ofaJsEV&qh$0qh`8M79TYlsh;~');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = "wp_8f46dr_";

/**
 * Limits total Post Revisions saved per Post/Page.
 * Change or comment this line out if you would like to increase or remove the limit.
 */
define('WP_POST_REVISIONS',  10);

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

