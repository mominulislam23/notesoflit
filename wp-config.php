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
define( 'DB_NAME', 'notesoflit_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'B;5f:-aU<14Bl m2g:D-hr]$T`tBcUw]0SXvE#mN3dT1^?R=[s;~iDxQo0OFCZpo' );
define( 'SECURE_AUTH_KEY',  ')g1mv8*Ax)C$DDdY|R[kZ0)goB.(1>Ej^SC*j0X[Km13(@DQ!CEL^BXhvr*:z[7 ' );
define( 'LOGGED_IN_KEY',    'LX)Me!%8[,?hFXmCHEN0eRG-U[wLy<hG/osL 0d;;u*,d!Jpqj+,-HgD&:}kakP;' );
define( 'NONCE_KEY',        'B!usozGYSwv74E^7_H!QkP$=N=kVhEYEb)YJkH?Sgc$ZnyHMs>9ZI$D4byb@7F&Q' );
define( 'AUTH_SALT',        'S_^MW7AeN0NZvD/YAQarrY7e#5CBSkt?D{~J7hq5bsMXD1#2cheaBTdRX,Ml38d*' );
define( 'SECURE_AUTH_SALT', 'C8j*UN$m[G3s9?lpEK`2 eP&-*pbjkz+>o3 R5;d  zW2]e$V6tSU0Ba_0<-#3J2' );
define( 'LOGGED_IN_SALT',   'Gdf*U1/MlR,c4odHtnmx;/F_dt~wfg}fe+-c*zjc3gS T:m4Uy#BDB7lnIKZf%Y ' );
define( 'NONCE_SALT',       'cL_U%-[A(<sT4c3W9aBO;f}[iI`8diObNP#v#_~A[$$n1/.gh6M1A>:I9{#^mD6n' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
