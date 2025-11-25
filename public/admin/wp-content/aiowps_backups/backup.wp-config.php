<?php

define( 'ITSEC_ENCRYPTION_KEY', 'W0ZQQEJBZ2JxMWNJWEdUdTtdWWc8WH1TV1VbOCRgIFdRTzoqNmttczMwQl9QRURVcSxISCNPckU2fV50aH4pZA==' );

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ice' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'password' );

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
define( 'AUTH_KEY',         'Z9DYUI.rQ)y)Q.%<g%+iF5HCCVXj$bF)}U`uEM3 R*FSAIsMuqH9kNE3vzogm]{r' );
define( 'SECURE_AUTH_KEY',  'Y@NfLQ)3-|]XgGoCe1>?GFq  uOG|O+}vF..[mAW3>*)XTo+lmE?egPU<DondFvp' );
define( 'LOGGED_IN_KEY',    '$k/F~*_jE#eaX*<zsZ{9Nh^$YLr5>KIlzx*#%MpK/7>e&cc51lBJoWwg0)Tyr>D?' );
define( 'NONCE_KEY',        'cDK;wswG5Z:t|#&wL[0kfcd:VX(2|LwaS`rnGNd9sCC{{BI#h/h*pY]9Q0G/|:4 ' );
define( 'AUTH_SALT',        '|JwxHp^CJSx~mpB=mENY;eK_pV 4x3KS3HBTF|j/wc~8!gn8yAu^:q9SKv}m!*Gq' );
define( 'SECURE_AUTH_SALT', 'q/Wi1HXf&WR-Bm50b$Qt8V^zWx4GjYR}MV@zJ~;|Yq4S*qoqn+;X f=/x-BHVYtg' );
define( 'LOGGED_IN_SALT',   '?%j[j$g@{ zK}EhX?p*b+Wwsr!z(+A @T9UR)cYOH5Zj%K*T7Z1(;>rJ*fv,@2?t' );
define( 'NONCE_SALT',       '+M)^vosbnL~G3CF69q>5#Z%mTiuvF/MHnC1v 7A5IM+4rR[v3w`K5$]uE%y0o2Vq' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'cms_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );
define('WP_DISABLE_USER_REGISTRATION', true);
/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

add_filter('xmlrpc_enabled', '__return_false');
add_filter('comments_open', '__return_false');
add_filter('pings_open', '__return_false');
add_filter('comments_array', '__return_empty_array');
add_filter( 'xmlrpc_methods', function( $methods ) {
    unset( $methods['pingback.ping'] );
    return $methods;
});
define('DISABLE_WP_CRON', true);
add_filter('rest_endpoints', function ($endpoints) {
    unset($endpoints['/wp/v2/users']);
    unset($endpoints['/wp/v2/users/(?P<id>[\d]+)']);
    return $endpoints;
});
add_filter( 'rest_authentication_errors', function( $result ) {
    if ( ! empty( $result ) ) {
        return $result;
    }
    if ( ! is_user_logged_in() ) {
        return new WP_Error('rest_disabled', 'REST API disabled.', array('status' => 403));
    }
    return $result;
});