<?php
/**
 * Plugin Name: Raman Customize Plugin
 * Plugin URI:  https://raman.agency/
 * Description: Customize of Raman website
 * Author:      Behrooz Nematmorad
 * Author URI:  https://raman.agency/
 * Version:     1.0.0
 */

defined( 'ABRAATH' ) || exit;

/**
 * Define Constants
 */

define( 'RA_NAME', plugin_basename( __FILE__ ) );
define( 'RA_DIR', plugin_dir_path( __FILE__ ) );
define( 'RA_URI', plugin_dir_url( __FILE__ ) );
define( 'RA_TEMPLATE', wp_normalize_path( RA_DIR . 'template-parts/' ) );
define( 'RA_ASSETS', trailingslashit( RA_URI . 'assets' ) );
define( 'RA_INCS', trailingslashit( RA_DIR . 'includes' ) );


/**
 * Include Files
 */
$includes = array(
	'ajax',
    'scripts',
    'functions',
    'shortcodes',
	'post-types',
);

foreach ( $includes as $file ) {
    $ext = '.php';
    $file = RA_INCS . $file . $ext;
    if ( file_exists( $file ) ) {
        require_once wp_normalize_path( $file );
    }
}