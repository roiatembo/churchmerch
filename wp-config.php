<?php
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
define( 'DB_NAME', 'churchmerch_wp229' );

/** Database username */
define( 'DB_USER', 'churchmerch_wp229' );

/** Database password */
define( 'DB_PASSWORD', '(vDS4e78p)6]!b]R' );

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
define( 'AUTH_KEY',         '0adzvfzz7msa0d1xwzpqhrfea5cea6sqojedizwj7htzvhqinegx0wydxpt7vkxp' );
define( 'SECURE_AUTH_KEY',  'zsntfwuhulzezzhorkzowkucaeclns7zc8dga5niu2crhzmoqt1cu4qqyk53zurp' );
define( 'LOGGED_IN_KEY',    'ufm430aol0s8xysaxb5gubeyjdfnlupzcz1ada6tsq2cb157ljgyvp64x8drznoq' );
define( 'NONCE_KEY',        'w7yx7erlhpon5f6am8t6bavsoyw58xcgoooqkss4pwalp8l4hitkkrnqh5wjzztx' );
define( 'AUTH_SALT',        'hbknrqouufvamatssws7asmlsj4sngedgy7wjykmnt5mg0qkbecd7xyu2tq1nhab' );
define( 'SECURE_AUTH_SALT', 'alt8khpagwsneokujkudfxvxe9gsc8ocxcoxhed2pcmrbz3qx08alxomrsvsyoa8' );
define( 'LOGGED_IN_SALT',   '5gpcj5x78svkktrednyahayptt7ngz04a1pwhlheqgk3duh3ehbn0lfv6rnq9eb9' );
define( 'NONCE_SALT',       'gw0a6zkw6ngcmiqekobfs1mrijc1ywkrw511rm9budc8rphipj1osagapcaqutgf' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpvs_';

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
