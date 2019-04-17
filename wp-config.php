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
define( 'AUTH_KEY',         'CLJyW)YN-^g/MN9$m/yc81({R}sQ9k^P$@M!ukj(l[!0aiiUPCvhZKEoO7ymShI(' );
define( 'SECURE_AUTH_KEY',  'y;pMP|U,(0ojv6=Tfw+qJM5f(ttw~3ri,h9cp]-/_jC&/^gTx]%%|Sdv1RW*<D|s' );
define( 'LOGGED_IN_KEY',    '(^2N^Kb_5>I6fX*pB(YDtyR&cw:/Y(=iqg3~cJ5fkb%p3oYD8EdNrwAt_TcG([:m' );
define( 'NONCE_KEY',        '}9]M [ZzOX~~H.=r>$|qlmvEf=C%0nYw?Xtc-w.XD|^HO@*.Cw3S0:ocT{VR*#sm' );
define( 'AUTH_SALT',        'URpZ),rdj3>N{S}2lrE4rIiLLVWrN4D<p7&dvDq9p@8v`%,r0/g@InvABw:4uu=/' );
define( 'SECURE_AUTH_SALT', '|6Ty;`$1^*MG,{CN4iL~Zfyz^Wjj0F9r6Y4o@:>;]4!.CwFSz[>a{F}d^zeuha9.' );
define( 'LOGGED_IN_SALT',   '`bb_V!Lbs^. >c4<}tm0K3fGp?Qzg{Y!N&*/Jt`?h#?#tJgj_a <@+$4{lEj.ZBK' );
define( 'NONCE_SALT',       'c31-Twv2v/ZDbRM{JZ8w{XZzhIW CZ46El*gh~|W`JIbLW`VTzRH|)4LA?61#V<T' );

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
