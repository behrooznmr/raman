<?php
define('RA_VER', rand(99,99999));
define('RA_DIR', get_template_directory());
define('RA_URI', get_template_directory_uri());
define('RA_TEMPLATE', wp_normalize_path( RA_DIR . 'template-parts/' ) );
define('RA_ASSETS', trailingslashit( RA_URI . '/assets' ) );
define('RA_INCS', trailingslashit( RA_DIR . '/includes' ) );

$includes = array(

);

foreach ( $includes as $file ) {
	$ext = '.php';
	$file = RA_INCS . $file . $ext;
	if ( file_exists( $file ) ) {
		require_once wp_normalize_path( $file );
	}
}
function raman_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('widgets');
    add_theme_support('custom-logo');
    add_theme_support('automatic-feed-links');
    register_nav_menus([
        'main-menu' => 'Main Menu'
    ]);
}
add_action('after_setup_theme', 'raman_theme_setup');


function raman_theme_scripts() {
	wp_enqueue_style('raman-style', get_stylesheet_uri(), [], RA_VER);

	// bootstrap
	wp_enqueue_style('bootstrap', trailingslashit( RA_ASSETS ) . 'css/bootstrap.rtl.min.css');
	wp_enqueue_script('raman-bootstrap', trailingslashit( RA_ASSETS ) . 'js/bootstrap.bundle.min.js', array('jquery') ,'', true);

	//swiper
	wp_enqueue_style('swiper', trailingslashit( RA_ASSETS ) . 'css/swiper-bundle.min.css', array());
	wp_enqueue_script('js-swiper', trailingslashit( RA_ASSETS ) . 'js/swiper-bundle.min.js', array('jquery') ,'', true);

	// front scripts
    wp_enqueue_style('raman-front', trailingslashit( RA_ASSETS ) . 'css/front.css', array(), RA_VER);
	wp_enqueue_script('raman-front', trailingslashit( RA_ASSETS ) . 'js/front.js', array('jquery'), '', true);
	wp_localize_script( 'raman-front', 'ra_object', [
		'ajax_url' => admin_url('admin-ajax.php'),
		'nonce'    => wp_create_nonce('ra_ajax_nonce')
	]);

	// custom scripts
	wp_enqueue_style('raman-custom', RA_ASSETS . '/css/custom.css', [], RA_VER);
	wp_enqueue_script('raman-custom', trailingslashit( RA_ASSETS ) . 'js/custom.js', array('jquery'), RA_VER  , true);
}
add_action('wp_enqueue_scripts', 'raman_theme_scripts');

/**
 * Backend Assets
 */
function raman_admin_enqueue_scripts() {
    wp_enqueue_style( 'raman-admin', trailingslashit( RA_ASSETS ) . 'css/admin.css', array() );
    wp_enqueue_script( 'raman-admin', trailingslashit( RA_ASSETS ) . 'js/admin.js', array('jquery'), '1.0', true );
}
add_action( 'admin_enqueue_scripts', 'raman_admin_enqueue_scripts');