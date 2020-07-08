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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'boosta' );

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
define( 'AUTH_KEY',         'q/2s@v0o,*Lg1^J)G#WU-Ne*boT%,Mm?,_Tx3Sr#7;?x)^0$_bGl4eq^7uPdh|C{' );
define( 'SECURE_AUTH_KEY',  '/sQui[E1,@$b+=:`J[0gJK4;(a5- pr1<uUT*!&^, k?>/%_*m}P9)9zsm]|adpQ' );
define( 'LOGGED_IN_KEY',    'O-cZNa2G ;t+3Od<BZRBywUKq?XW)B|MOtrOP9wHm`S5>C,xu~2)@TJe+V)+w;Hv' );
define( 'NONCE_KEY',        'Ps53[b~Hhs4S g~)r`:l3wBS/7#2^O0VYD,fLba^_EYVQs#f.Bk>,-}MNZ`x!DFS' );
define( 'AUTH_SALT',        'bSN=+#x-n$PpZPYgaFXRn,Ghf2e*Jx`<:Rd<|3so!l^w2[&m+%S]A!jgwT-HOYf@' );
define( 'SECURE_AUTH_SALT', ';%JYRnk rSJtD,02T#Xc(vkS~EcJ_MGN 4#wYes]D*]D&M|XIl6o?l0dbTK_f38L' );
define( 'LOGGED_IN_SALT',   '2%;@L+r@nY,n%vG?j+-KipLq7g 4}V?Ch,g.,|zl6mQDni*,;cn*[?.99@]{_cDx' );
define( 'NONCE_SALT',       'uYE)(#F1U/[rc#kz-D:9C&SsyNfd3]$q^&YEbei{bn0( @*j68PO:8QObrdkV^JZ' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
