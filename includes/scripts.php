<?php

defined( 'ABSPATH' ) || exit;


//update_option('RCP_custom_code_last_modified', time());
//
//define( 'RCP_VERSION', get_option('RCP_custom_code_last_modified', '1.0.0') );

define( 'RCP_VERSION',rand(9,9999));
// Frontend Scripts
add_action( 'wp_enqueue_scripts', 'RCP_enqueue_front_assets', 9999 );
function RCP_enqueue_front_assets() {
	wp_enqueue_style( 'RCP-front-css', RCP_ASSETS . 'css/front.css', [], RCP_VERSION );
	wp_enqueue_style( 'RCP-custom-css', RCP_ASSETS . 'css/custom.css', [], RCP_VERSION );
	wp_enqueue_script( 'RCP-front-js', RCP_ASSETS . 'js/front.js', ['jquery'], RCP_VERSION, true );
	wp_enqueue_script( 'RCP-custom-js', RCP_ASSETS . 'js/custom.js', ['jquery'], RCP_VERSION, true );
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
	wp_enqueue_script('wp-theme-plugin-editor');
	wp_enqueue_style('wp-codemirror');
	wp_enqueue_script('RCP-codemirror-init', RCP_ASSETS . 'js/codemirror-init.js', ['jquery', 'wp-codemirror'], null, true);

	wp_enqueue_style( 'RCP-admin-css', RCP_ASSETS . 'css/admin.css', [], RCP_VERSION );
	wp_enqueue_script( 'RCP-admin-js', RCP_ASSETS . 'js/admin.js', ['jquery'], RCP_VERSION, true );

}
