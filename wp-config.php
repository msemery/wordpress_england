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
define('DB_NAME', 'tandgweb_marion');

/** MySQL database username */
define('DB_USER', 'tandgweb_marion');

/** MySQL database password */
define('DB_PASSWORD', 'TU!mJ{a_1yAB');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'A4h1R)C!|6Ps#L6a[)aq+$fsl9.GKrt`|5mJFs&pN,z~?/f8N(0h3ZlU-m}uS{)^');
define('SECURE_AUTH_KEY',  '^a-Uj4e4l9:O*KP-z?pZh)V+[T@9_Cd:,{HaE<`i|@Tt)%X5DW%>53ey~ZyMFVnZ');
define('LOGGED_IN_KEY',    'Yy*MjFF(>GmRiR:Hy:^7(Xr]kS>(Jb~v?dft]a~>TS::<f@H3q1*e1 ePbBXb7@u');
define('NONCE_KEY',        '{r7NMI9q4C&Pow7vVz|y6CwHXW)CsXs~yO#JK-U,eb*$4k)Nqbeb=l3dr*eSl@;F');
define('AUTH_SALT',        'kN85sMwVC~t7 B&rSjmk~j#Ul@R z.o^nCk#B0VTbRkC+a`jxP*i7r3}>cadtTgI');
define('SECURE_AUTH_SALT', '/^`tsct`HC_Y}-VD6w%L4E7Ilz j68.z?}O/xC<EnjYGA%;;VKj]-qg%rg&cMQ8k');
define('LOGGED_IN_SALT',   'Z]G@!&QwS)me4>LNfaCsMY^]z8?yX 8VX tNERFjP#f|!A<7</?/2kRpb<nE$K}C');
define('NONCE_SALT',       'Q,ONylHl-2w_n:6u~85FQ-d/qm5(]#QEDpA)dR <2hJV?p:v>G[h0T=U`kx;(Lh5');

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
