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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'biuro_senatora' );

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
define( 'AUTH_KEY',         'W~QcW3-n[:4HS19sONL&X58IUa*vO<9upjq_*d?lGXLX,_%KaMe#r~U:7YW8|E+&' );
define( 'SECURE_AUTH_KEY',  'jsOZ-RYn7s_P6[<hg`7H*1gnmSUGh%t[G4{tEV#n-6y1A_I/dVKLJbxKF-rNwhbq' );
define( 'LOGGED_IN_KEY',    'S>EQ1mupbc~nkC}tv_cdna/DSRa|@56.So<IKtXPbZ%dyV-x=7,8]fhPd[9f>e%7' );
define( 'NONCE_KEY',        'XJp6tI^LjJmTo[`f/%rJg`f!!/4TQAT03(NXv~2[~f~Ig?@Ko[ya((v{GK>~I 1R' );
define( 'AUTH_SALT',        'wP+4U2+%ETI}R*UyD,16Kak)4Kvo!Zb-Cc~roAt$d!wjM>#q?r?C6u+h=(A=drx)' );
define( 'SECURE_AUTH_SALT', ']@pwK*wvpj}~=j4pao5=<2,[2pcuEs|L5[kZT%_<tas$N9ZDQ30p2:,WJ3e=Fpc]' );
define( 'LOGGED_IN_SALT',   'j`ERy#%%D{^0FEHN8MiZq]-h8SSSJi`;u[I^{bZV/8~pF+}~ieB%Gz,<xTQ),PNh' );
define( 'NONCE_SALT',       'gf[[_oW;mE*MeLaJ<4W.Qph%&GvF}WI`T_0LAhMeR8anz9r$l*E:{)C2^Fz,Cjz4' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
