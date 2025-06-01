<?php

defined( 'ABSPATH' ) || exit;
update_option('RCP_css_desktop', $_POST['RCP_css_desktop']);
update_option('RCP_css_tablet', $_POST['RCP_css_tablet']);
update_option('RCP_css_mobile', $_POST['RCP_css_mobile']);
update_option('RCP_custom_js', $_POST['RCP_custom_js']);
update_option('RCP_custom_code_last_modified', time());

define( 'RCP_VERSION', get_option('RCP_custom_code_last_modified', '1.0.0') );
/**
 * Frontend Assets
 */
add_action( 'wp_enqueue_scripts', 'RCP_enqueue_scripts' , 9999999 );
function RCP_enqueue_scripts() {


	wp_enqueue_style( 'RCP-front-css', trailingslashit( RCP_ASSETS ) . 'css/front.css', array() , RCP_VERSION  );
	wp_enqueue_style( 'RCP-custom-css', trailingslashit( RCP_ASSETS ) . 'css/custom.css', array() , RCP_VERSION  );

	wp_enqueue_script( 'RCP-front-js', trailingslashit( RCP_ASSETS ) . "js/front.js", array('jquery'), RCP_VERSION , true );
	wp_localize_script( 'RCP-front-js', 'rcp_object_values', array(
		'ajax_url' => admin_url( 'admin-ajax.php' ) ,
		'nonce'    => wp_create_nonce( 'ajax-action-nonce' )
	) );
	wp_enqueue_script( 'RCP-custom-js', trailingslashit( RCP_ASSETS ) . "js/custom.js", array('jquery'), RCP_VERSION, true );
}
//
/**
 * Backend Assets
 */
add_action( 'admin_enqueue_scripts', 'RCP_admin_enqueue_scripts');
function RCP_admin_enqueue_scripts() {

	wp_enqueue_style( 'RCP-admin-css', trailingslashit( RCP_ASSETS ) . 'css/admin.css', array()  , RCP_VERSION);
    wp_enqueue_script( 'RCP-admin-js', trailingslashit( RCP_ASSETS ) . 'js/admin.js', array('jquery'), RCP_VERSION, true );
}