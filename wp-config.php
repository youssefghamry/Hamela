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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'Hamela' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'oDEOiX`t%zY*7ipQ2+rVm(ei{=)WPqC/Sg_q;(K5gHXo2vY~cdRxQ;};XK#5[+zI' );
define( 'SECURE_AUTH_KEY',  'i6$Os|1_SP@I2e;`80]rg_qJ/w%lbz BzT&^.>EY=(DQj`F,R2<@wq>;Wbz=|o=,' );
define( 'LOGGED_IN_KEY',    'PXM,F<kcwpWXkPz$ogh%<EPE;#DW(F|~=!YXK>yBWdy*y fr/cID%Am|yO0n^>0r' );
define( 'NONCE_KEY',        'TN~QGSavy98Y.DXIrk)nK!VaB7AOF{%xM1/[e{oo[`f`csrv*e>]UN0I(Vu^#X_;' );
define( 'AUTH_SALT',        'RW3%n%01aD^s@b|8IkU+*!jNQ[K%W#M{fkfhtle!%0Y|%5p^)RBbGEmC(2Tn47&}' );
define( 'SECURE_AUTH_SALT', '$/~R^g_N1s]5Hn=83a.;lb4*WP4c.`<dghQT#o[M$F7kg!Dax_G|TQ1M#O=|Xh6Q' );
define( 'LOGGED_IN_SALT',   '[|ulHkza!_bAFd&_YAp<B)hO!kX{OY:xu n9Q89d6K=h1*A1`z0(!kh WXWEBvYj' );
define( 'NONCE_SALT',       'ceymK@1fJHg([N^Ilm4+s7?C*jsA95.-aBySW4VNq?zwxeC#g`7Cx~&sFH<a.a{P' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_Hamela';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
