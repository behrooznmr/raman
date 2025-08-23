<?php
date_default_timezone_set( 'Asia/Tehran' );

define( 'RA_VER', filemtime( get_template_directory() . '/assets/css/front.css' ) );
define( 'RA_DIR', get_template_directory() );
define( 'RA_URI', get_template_directory_uri() );
define( 'RA_TEMPLATE', trailingslashit( RA_DIR ) . 'template-parts/' );
define( 'RA_ASSETS', trailingslashit( RA_URI ) . 'assets/' );
define( 'RA_INCS', trailingslashit( RA_DIR ) . 'includes/' );

$includes = array(
	'post-types',
	'price',
	'metabox',
	'snippets',
	'class-wp-bootstrap-navwalker',
);
foreach ( $includes as $file ) {
	$path = RA_INCS . $file . '.php';
	if ( file_exists( $path ) ) {
		require_once wp_normalize_path( $path );
	}
}

function raman_theme_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'widgets' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'automatic-feed-links' );

	register_nav_menus( [
		'main-menu' => __( 'Main Menu', 'raman' ),
	] );

	add_image_size( 'raman-post-thumb', 400, 216, true );
}
add_action( 'after_setup_theme', 'raman_theme_setup' );

function raman_theme_scripts() {
	wp_enqueue_style( 'raman-style', get_stylesheet_uri(), [], RA_VER );

	wp_enqueue_style( 'bootstrap', RA_ASSETS . 'css/bootstrap.rtl.min.css', [], '5.3' );
	wp_enqueue_script( 'bootstrap', RA_ASSETS . 'js/bootstrap.bundle.min.js', [ 'jquery' ], '5.3', true );

	wp_enqueue_style( 'swiper', RA_ASSETS . 'css/swiper-bundle.min.css', [], '11.0' );
	wp_enqueue_script( 'swiper', RA_ASSETS . 'js/swiper-bundle.min.js', [], '11.0', false );

	wp_enqueue_style( 'raman-front', RA_ASSETS . 'css/front.css', ['bootstrap', 'swiper'], RA_VER );
	wp_enqueue_script( 'raman-front', RA_ASSETS . 'js/front.js', [ 'jquery', 'swiper', 'bootstrap' ], RA_VER, true );

	wp_localize_script( 'raman-front', 'ra_object', [
		'ajax_url' => admin_url( 'admin-ajax.php' ),
		'nonce'    => wp_create_nonce( 'ra_ajax_nonce' )
	] );

	wp_enqueue_style( 'raman-custom', RA_ASSETS . 'css/custom.css', ['raman-front'], RA_VER );
	wp_enqueue_script( 'raman-custom', RA_ASSETS . 'js/custom.js', [ 'jquery', 'raman-front' ], RA_VER, true );
}
add_action( 'wp_enqueue_scripts', 'raman_theme_scripts' );

function raman_admin_enqueue_scripts() {
	wp_enqueue_style( 'raman-admin', RA_ASSETS . 'css/admin.css', [], RA_VER );
	wp_enqueue_script( 'raman-admin', RA_ASSETS . 'js/admin.js', [ 'jquery' ], RA_VER, true );
}
add_action( 'admin_enqueue_scripts', 'raman_admin_enqueue_scripts' );

/*add_action( 'wp_print_scripts', function() {
	global $wp_scripts;
	echo '<pre>';
	print_r( wp_list_pluck( $wp_scripts->queue, null ) );
	echo '</pre>';
});*/