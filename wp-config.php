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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         'lu*^VCurjy= +<v-$3j0HP0/ >mq(Mm^B(n0pgD2Gf!Ds9Hc0=;`{uadc[&X?:[J' );
define( 'SECURE_AUTH_KEY',  '<y=fQk;T/_!?2n&u-8ED.^V/4kE:v}_^_Hk5Sd^6C<O!to>+Ka*OI;/IK!#=I?Br' );
define( 'LOGGED_IN_KEY',    'Ta/RR2f2q;IB%+Gy3QF9ReR]B2$5AWJAls9>G4|(!GLE*a%sG$Rd!qS{K47,z#=*' );
define( 'NONCE_KEY',        '1zj&mFd8OoT9@J}lB$xUIC7]g3Z-u<dUWPX|BW%:9qTkxXB-8V4b<y{j_1F[NYn^' );
define( 'AUTH_SALT',        'vsR;fUS,VN7QQuh F%qT?}HO6$|Ru#p(Z)2wt:`=p=g&[]2u!a22<ld~2kwKZ;65' );
define( 'SECURE_AUTH_SALT', ';^jjX?(>5^$C@..`7(65W(?R{8.W|t!{72wNPt%E,8ge[Gil%8j.0>W3md1[!Tg=' );
define( 'LOGGED_IN_SALT',   'GF%X[ke?rXGVym@<v2evpwr6)f`+|ER2JZ:56FEuuVl5]*7vgCh:-`?F|5{D.J_I' );
define( 'NONCE_SALT',       'zuZ,wi3Y*[`:|Mx3+]k5w^8Mpq#E/T!3ndveC 2^sK1A+BiU%/C5Cudg,%VZg@5x' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
