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
define( 'DB_NAME', 'alex' );

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
define( 'AUTH_KEY',         'px_KyXO23YEk#wxBo:tjmWg,]hP5V#~S_P6!r}bbrPLuY{bGkm`0D 4Usjv%&RTJ' );
define( 'SECURE_AUTH_KEY',  'F`?>3`J*YUC[N2PorgL_)(UOq!s5%TCfx<~2UV#Eo&2=i/:O+y>OF;h/xFk[st8P' );
define( 'LOGGED_IN_KEY',    'qe?V[-gNL _}A~&0<]iQK$URe^.H@e~.4.2v`u:aRnmu_._MefM<}5Sc)<xc NK:' );
define( 'NONCE_KEY',        '+Xff m$ed*1ou%9H!0Z!*R#g0r `_{[ df[|3z ~E43h#q3G$d21>;L*xgM}PE+#' );
define( 'AUTH_SALT',        'J4Zxh^uYZR;U#Yb{,f=I1[?X+T!.k^E$z*ff#Ta~lz|Ef+WdQ]%*{o$lu0w6Xe67' );
define( 'SECURE_AUTH_SALT', 'N`21Uj0#Mr,+$ j!8IGmqT$R.@1Fd0,4:7N/IUWzg>d,~Lf~/;Q]N;Pdc{C/wIn7' );
define( 'LOGGED_IN_SALT',   'Z* FTNy3zG,9`Pi<I[nARm<e7YS!w*:6xWlVKxhm0~9M5+F/Lm65p_9G2vK,HY3Y' );
define( 'NONCE_SALT',       'aplse+RfG9H{8<IULtK;rQr*4fQ!Id{zB=*B<-V+lkMtwx6vl2g05~dq_lmHy;^L' );

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
define( 'WP_DEBUG', true );
// log debug info
// define( 'WP_DEBUG_LOG', true );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
