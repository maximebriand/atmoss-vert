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
define( 'DB_NAME', 'atmossvert' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'BPQg*e:S4%}4{2MKyO1<Ht<g,g{/JAKBM~yXw_H_I!%i;@{^}<0BWEP/=elaV6.(' );
define( 'SECURE_AUTH_KEY',  '9?.fY$+4<m_{6FvVpL~{=?+0tGfN{E|<ApTk%k#POQl;5u4]vSid4E}9r`@q`WyS' );
define( 'LOGGED_IN_KEY',    'tW7qlThLLe1Mp0JiFo9 AS%.D/YIhmi-vbtUl`TMJMX,udl@aNHWKR+E8j>G!T$[' );
define( 'NONCE_KEY',        'Wb(t+DqtCQg,ez1n6r4RBujOfqc^E.7p-G5q[GH-@+>aOv7X^v3nWS58CmHNX334' );
define( 'AUTH_SALT',        'O^45hEIqAB*O)]Pf;l$w6iMi2kdZ@j}Q&|X#;lIdBm[W,9M Wi>l@?l9Mq4:m^+3' );
define( 'SECURE_AUTH_SALT', 'Od!FPeTGfO.$zssJQYS0@C/kLmsjcr(Uhr6FG^G &EE4|X6rjd3(gSi drY:xO3g' );
define( 'LOGGED_IN_SALT',   '>u[e<{WYwHg+(4O1~K-HN$r#tXbIFt`OpGQwNKC6M;_K!h|4a(g~IKgwXjMA~&v:' );
define( 'NONCE_SALT',       'VjO6f&~zItT[DP{HjJfOePa=}w{j6+9$VEfGf,  v>o?_Hvm,VCC*3L<XE968Y9[' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ml_';

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
