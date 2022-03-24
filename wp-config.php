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
define( 'DB_NAME', 'omnia' );

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
define( 'AUTH_KEY',         '=M-R#Adiwszy6yd;y.1zO8&D2 c$TbnLQJ`37trm=?T?t<c)tQ8=3]^&k;_9d(6L' );
define( 'SECURE_AUTH_KEY',  '6{6m50h^8WBq4NLZV-N4L|>b&ZmKf;/rIT*Wq3L=k ?jy8%s^ue,+fkf$W$vPJA1' );
define( 'LOGGED_IN_KEY',    'S1f6r23~$mfw,m=}u)tycA+8t$exw k_E#5VDK.!I9tA[/KWJy2@hLp(a_nydR,{' );
define( 'NONCE_KEY',        '#[c9#_oCAtTa7>pEDHjB9u(fuV1K*J@vo3)v}4rg7:Gue?rX[#EqGB!ovA:lX7%I' );
define( 'AUTH_SALT',        'd!/j9n8n!1fRT@TuEwL-EAs%@TNj,qzXo#:LxNaA;?F=+bv`wXru>fgkw|;3Y7n=' );
define( 'SECURE_AUTH_SALT', '0udbl^*AT/@LN|t;$$,4X#eWe>OIAG$!Y1EF6Z5Q+/1nf )FmFGqGPv7Nva!eu#T' );
define( 'LOGGED_IN_SALT',   'Pp#Slf)#jE9Y^Z2LV{h3LU@<da@|f=z_e5S2RK,4v<8zb8!pxMI:uZ*0.x)SS-H@' );
define( 'NONCE_SALT',       '2SL@X_Qwr4V[=7N-GGkpR.qp2_v&tAO<<HM]kUDM~CraEX%_ ;*)0wx@wg4MgsvW' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'om_';

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
