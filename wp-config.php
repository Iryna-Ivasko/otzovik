<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'otzovik' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define('AUTH_KEY',         'ZD&/|]JzyMymPH#8HZeq!(wjoH|h[g]P+2a?hjkL-a,b+@nB5V}l})x7 mlYlX%,');
define('SECURE_AUTH_KEY',  'T(if=7`n|Uw{=H+fs[ipA3b8^C|pqBuMvc+C3l;LP&GMTmoa/h{5tO[Fl0e4S!d4');
define('LOGGED_IN_KEY',    ']apI[D++E:YgG^sg6Ll %|&G&->c+I{9e7C0)+)iK$_j5Bc;pRX3|I0sg0o1|OH4');
define('NONCE_KEY',        'p}-F;,Q/CDm3TH 34uRa57oo _-BbeJ9lPh@,w-KkNFKxQVeY9w&_?!:b^-,N6dN');
define('AUTH_SALT',        '+ ) c9KWeeR-R}Gt%6Z*;lPLi}&2TYnT+(jDP~0sYS]fH@/z@BTv/n!qf{o>fpNu');
define('SECURE_AUTH_SALT', '+@i|_G t@bbWUN2]VH/#mu.FJwKH4=|-QoE{o}fJ1F4X*Q99z<@j@+WeQ#uHb]?.');
define('LOGGED_IN_SALT',   '9f0_i8L@a$+HHZn-xp5%H-5^1D?5Sd([ZRmrSlq+!jy,YV+?#R}KKIlz&h&F^Ad_');
define('NONCE_SALT',       '6!AW=fE{*bw$p7;)?94}8F:IF06tpjt{kk+P7dJ3|uHV[.6>{jOQVy--U|ohJW1_');

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
