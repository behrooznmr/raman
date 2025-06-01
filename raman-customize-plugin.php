<?php
/**
 * Plugin Name: Raman Customize Plugin
 * Plugin URI:  https://raman.agency/
 * Description: تغییرات و کدهای ضروری پروژه
 * Author:      Behrooz Nematmorad
 * Author URI:  https://raman.agency/
 * Version:     1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Define Constants
 */

define( 'RCP_NAME', plugin_basename( __FILE__ ) );
define( 'RCP_DIR', plugin_dir_path( __FILE__ ) );
define( 'RCP_URI', plugin_dir_url( __FILE__ ) );
define( 'RCP_TEMPLATE', wp_normalize_path( RCP_DIR . 'template-parts/' ) );
define( 'RCP_ASSETS', trailingslashit( RCP_URI . 'assets' ) );
define( 'RCP_INCS', trailingslashit( RCP_DIR . 'includes' ) );


/**
 * Include Files
 */
$includes = array(
	'ajax',
    'scripts',
    'functions',
    'shortcodes',
	'post-types',
	'option-page',
);

foreach ( $includes as $file ) {
    $ext = '.php';
    $file = RCP_INCS . $file . $ext;
    if ( file_exists( $file ) ) {
        require_once wp_normalize_path( $file );
    }
}