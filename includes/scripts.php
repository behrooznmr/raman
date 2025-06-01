<?php

defined( 'ABRAATH' ) || exit;
//define( 'RA_VERSION' , time() );
///**
// * Frontend Assets
// */
//add_action( 'wp_enqueue_scripts', 'RA_enqueue_scripts' , 9999999 );
//function raman_enqueue_scripts() {
//	/* Bootstrap */
//	/*wp_enqueue_style( 'RA-bs', trailingslashit( RA_ASSETS ) . 'css/bootstrap.rtl.min.css' );
//	wp_enqueue_script( 'RA-bs', trailingslashit( RA_ASSETS ) . "js/bootstrap.bundle.min.js", array('jquery'), RA_VERSION, true  );*/
//	wp_enqueue_style( 'RA-front', trailingslashit( RA_ASSETS ) . 'css/front.css', array() , rand( 999,9999999999) );
//	wp_enqueue_script( 'RA-front', trailingslashit( RA_ASSETS ) . "js/front.js", array('jquery'), rand( 999,9999999999), true );
//	wp_localize_script( 'RA-front', 'RA_values', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
//}
//
///**
// * Backend Assets
// */
//add_action( 'admin_enqueue_scripts', 'raman_admin_enqueue_scripts');
//function RA_admin_enqueue_scripts() {
//    wp_enqueue_style( 'ra-admin', trailingslashit( RA_ASSETS ) . 'css/admin.css', array() );
//    wp_enqueue_script( 'ra-admin', trailingslashit( RA_ASSETS ) . 'js/admin.js', array('jquery'), '1.0', true );
//}