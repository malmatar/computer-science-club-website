<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'neiuhost_wpcss');

/** MySQL database username */
define('DB_USER', 'neiuhost_wpcss');

/** MySQL database password */
define('DB_PASSWORD', '89S7pPrald');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'e1ejjgdgzx0soux9zi9kb4vmsivcmmgaejjxohmhe7zedipxckm5hle3l4zl3oyx');
define('SECURE_AUTH_KEY',  'aj0jsptclk7o7zsrtsg7cjcn8thj5j5cyiwwyhxdwbzoqqamtqzcwabttcqyjv8r');
define('LOGGED_IN_KEY',    'vodsdtfdyjw6wnbtt54rqufcpa7klkwtcgfh66fomggt6yhamxqzydbgkf6mogry');
define('NONCE_KEY',        'ngo4z12usesc1l6e8njgtthyfhytvh7iudxzjzligxvfjaqfhbqp5bjrittf2uid');
define('AUTH_SALT',        'mjw4r8ibjkvcctd1yy1rtvvjvghhg7apuhcyqdr36fklmfllrrbttdrn2c9dfp7n');
define('SECURE_AUTH_SALT', 'dpfrw4bxbvejjzteox4qenapfvi5izwtvc7hsevuyj1vsord31cyzrbwmg9jsrfp');
define('LOGGED_IN_SALT',   'g4xb11cypjmdinrcor3j6zfsfwrr25jonrsqpp7vqgrn4m2oojjofxz5uocskkyc');
define('NONCE_SALT',       'vtdhqrxnkyss28obnkkczskocume6amzrqcvtiop8lxjeuxl23sg1vuc8u2xr9cn');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define ('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
