<?php
// =================================================
// Turn off errors. Local configs can overwrite this
// =================================================
ini_set( 'display_errors', 0 );
define( 'WP_DEBUG_DISPLAY', false );

// ===================================================
// Load database info and local development parameters
// ===================================================
if ( file_exists( dirname( __FILE__ ) . '/local-config.php' ) ) {
	define( 'WP_LOCAL_DEV', true );
	include( dirname( __FILE__ ) . '/local-config.php' );
} else {
	define( 'WP_LOCAL_DEV', false );
	define( 'DB_NAME', '%%DB_NAME%%' );
	define( 'DB_USER', '%%DB_USER%%' );
	define( 'DB_PASSWORD', '%%DB_PASSWORD%%' );
	define( 'DB_HOST', '%%DB_HOST%%' );
}

// ========================
// Custom Content Directory
// ========================
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/public' );
define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/public' );

// ================================================
// You almost certainly do not want to change these
// ================================================
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

// ==============================================================
// Salts, for security
// Grab these from: https://api.wordpress.org/secret-key/1.1/salt
// ==============================================================
define('AUTH_KEY',         'T2,js~Uy([+q@&;W|ill-.B_R>29K[1g!:]_i]|6e4:{aYemb$nvl+[>]s$#}$B*');
define('SECURE_AUTH_KEY',  'Opp?c/G{<z~BFBF{h55xI-T?vcj$Qr|~s C/{9cO~On9L4S._n?Fg o](,ks.E!8');
define('LOGGED_IN_KEY',    'mq-#a;ER8/K+<:i1vNWJp_$X~z3QAsA{~~}*tN|!qSo]38.n@|4u ,1JIBtIo*s7');
define('NONCE_KEY',        'u{1I&l+^H(}=YsF|HH,R^Uz}YPf3rl2El+1(XjgkryXPy6w8R`&D;-kXOhNtU]qU');
define('AUTH_SALT',        'A;+Mv1;G]+w#L=sP-9V{[Gt:i._->)p7#k00|fPq4R+0%H&$^zWC{]qDu.*xf U6');
define('SECURE_AUTH_SALT', 'bh3W[`=tkCW}RB.  9+Zb b960X%gJCPGt!j$NNy-()8AVE~C2KKsAPPi?-Q+VBB');
define('LOGGED_IN_SALT',   '41A@IHx,vQMM5fo2M{.+-:<*5(#0s-EjI2C%15j-Id]u0j/SAl@cCNAxLer-:u^A');
define('NONCE_SALT',       'z+t@6QM~=rV3Stx$],xC{MW^/hJ8-PIH eFXImMu?1#X/de(N|3=sW,crUr_ac3k');

// ==============================================================
// Table prefix
// Change this if you have multiple installs in the same database
// ==============================================================
$table_prefix  = 'wpcv_';

// ================================
// Language
// Leave blank for American English
// ================================
define( 'WPLANG', '' );

// =================================================================
// Debug mode
// Debugging? Enable these. Can also enable them in local-config.php
// =================================================================
// define( 'SAVEQUERIES', true );
// define( 'WP_DEBUG', true );

// ======================================
// Load a Memcached config if we have one
// ======================================
if ( file_exists( dirname( __FILE__ ) . '/memcached.php' ) )
	$memcached_servers = include( dirname( __FILE__ ) . '/memcached.php' );

// ===========================================================================================
// This can be used to programatically set the stage when deploying (e.g. production, staging)
// ===========================================================================================
// define( 'WP_STAGE', '%%WP_STAGE%%' );
// define( 'STAGING_DOMAIN', '%%WP_STAGING_DOMAIN%%' ); // Does magic in WP Stack to handle staging domain rewriting

// ===================
// Bootstrap WordPress
// ===================
if ( !defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/cms/' );
require_once( ABSPATH . 'wp-settings.php' );