<?php
/**
 * Plugin Name: Raman Customize Plugin
 * Plugin URI:  https://raman.agency/
 * Description: تغییرات و کدهای ضروری پروژه
 * Author:      Behrooz Nematmorad
 * Author URI:  https://raman.agency/
 * Version:     1.3.2
 */

defined( 'ABSPATH' ) || exit;

define( 'RCP_NAME', plugin_basename( __FILE__ ) );
define( 'RCP_DIR', plugin_dir_path( __FILE__ ) );
define( 'RCP_URI', plugin_dir_url( __FILE__ ) );
define( 'RCP_TEMPLATE', wp_normalize_path( RCP_DIR . 'template-parts/' ) );
define( 'RCP_ASSETS', trailingslashit( RCP_URI . 'assets' ) );
define( 'RCP_INCS', trailingslashit( RCP_DIR . 'includes' ) );
define( 'RCP_VER' , '1.3.2');

$includes = array(
	'ajax',
	'scripts',
	'functions',
	'shortcodes',
	'post-types',
	'option-page',
	'handler-function',
	'custom-snippets',
	'updater'
);

foreach ( $includes as $file ) {
	$file_path = RCP_INCS . $file . '.php';
	if ( file_exists( $file_path ) ) {
		require_once wp_normalize_path( $file_path );
	}
}

register_deactivation_hook( __FILE__, 'rcp_on_deactivate' );

function rcp_on_deactivate() {
	$upload_dir = wp_upload_dir();
	$rcp_dir = $upload_dir['basedir'] . '/rcp-custom-codes';
	$css_file = $rcp_dir . '/custom.css';
	$js_file  = $rcp_dir . '/custom.js';

	if ( file_exists( $css_file ) ) {
		wp_delete_file( $css_file );
	}
	if ( file_exists( $js_file ) ) {
		wp_delete_file( $js_file );
	}

	if ( is_dir( $rcp_dir ) ) {
		if ( ! ( new \FilesystemIterator( $rcp_dir ) )->valid() ) {
			rmdir( $rcp_dir );
		}
	}
}