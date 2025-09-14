<?php

defined( 'ABSPATH' ) || exit;

define( 'RCP_VERSION',rand(99,9999));

// Frontend Scripts
add_action( 'wp_enqueue_scripts', 'RCP_enqueue_front_assets', 9999 );
function RCP_enqueue_front_assets() {
	wp_enqueue_style( 'RCP-front-css', RCP_ASSETS . 'css/front.css', [], RCP_VERSION );
	wp_enqueue_script( 'RCP-front-js', RCP_ASSETS . 'js/front.js', ['jquery'], RCP_VERSION, true );

	$upload_dir = wp_upload_dir();
	$rcp_dir_path = $upload_dir['basedir'] . '/rcp-custom-codes';
	$rcp_dir_url  = $upload_dir['baseurl'] . '/rcp-custom-codes';

	$css_file_path = $rcp_dir_path . '/custom.css';
	$js_file_path  = $rcp_dir_path . '/custom.js';

	$css_file_url = $rcp_dir_url . '/custom.css';
	$js_file_url  = $rcp_dir_url . '/custom.js';

	$file_version = get_option('RCP_custom_code_last_modified', time());

	if ( file_exists($css_file_path) && filesize($css_file_path) > 0 ) {
		wp_enqueue_style( 'RCP-custom-css', $css_file_url, ['RCP-front-css'], $file_version );
	}

	if ( file_exists($js_file_path) && filesize($js_file_path) > 0 ) {
		wp_enqueue_script( 'RCP-custom-js', $js_file_url, ['jquery'], $file_version, true );
	}

	wp_localize_script( 'RCP-front-js', 'rcp_object_values', [
		'ajax_url' => admin_url( 'admin-ajax.php' ),
		'nonce'    => wp_create_nonce( 'ajax-action-nonce' )
	]);
}

// Backend Scripts
add_action( 'admin_enqueue_scripts', 'RCP_enqueue_admin_assets' );
function RCP_enqueue_admin_assets() {

	wp_enqueue_code_editor(['type' => 'text/css']);
	wp_enqueue_code_editor(['type' => 'application/javascript']);
	wp_enqueue_code_editor(['type' => 'application/x-httpd-php']);

	wp_enqueue_script('wp-theme-plugin-editor');
	wp_enqueue_style('wp-codemirror');
	wp_enqueue_script('RCP-codemirror-init', RCP_ASSETS . 'js/codemirror-init.js', ['jquery', 'wp-codemirror'], null, true);

	wp_enqueue_style( 'RCP-admin-css', RCP_ASSETS . 'css/admin.css', [], RCP_VERSION );
	wp_enqueue_script( 'RCP-admin-js', RCP_ASSETS . 'js/admin.js', ['jquery'], RCP_VERSION, true );
}