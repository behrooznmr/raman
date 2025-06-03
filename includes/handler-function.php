<?php
add_action( 'admin_init', 'RCP_handle_save_codes' );
function RCP_handle_save_codes() {
	if ( isset( $_POST['RCP_submit'] ) && check_admin_referer( 'RCP_save', 'RCP_nonce' ) ) {

		$css_global  = sanitize_textarea_field( $_POST['RCP_css_global']  ?? '' );
		$css_desktop = sanitize_textarea_field( $_POST['RCP_css_desktop'] ?? '' );
		$css_tablet  = sanitize_textarea_field( $_POST['RCP_css_tablet']  ?? '' );
		$css_mobile  = sanitize_textarea_field( $_POST['RCP_css_mobile']  ?? '' );
		$custom_js   = $_POST['RCP_custom_js'] ?? '';

		update_option( 'RCP_css_global', wp_unslash( $css_global ) );
		update_option( 'RCP_css_desktop', wp_unslash( $css_desktop ) );
		update_option( 'RCP_css_tablet', wp_unslash( $css_tablet ) );
		update_option( 'RCP_css_mobile', wp_unslash( $css_mobile ) );
		update_option( 'RCP_custom_js', wp_unslash( $custom_js ) );
		update_option( 'RCP_custom_code_last_modified', time() );

		$css = "/* Global CSS */\n{$css_global}\n\n";
		$css .= "/* Desktop */\n@media (min-width:1025px){\n{$css_desktop}\n}\n\n";
		$css .= "/* Tablet */\n@media (min-width:768px) and (max-width:1024px){\n{$css_tablet}\n}\n\n";
		$css .= "/* Mobile */\n@media (max-width:767px){\n{$css_mobile}\n}";

		file_put_contents( RCP_DIR . 'assets/css/custom.css', $css );
		file_put_contents( RCP_DIR . 'assets/js/custom.js', $custom_js );

		wp_redirect( admin_url( 'admin.php?page=custom-css-js&status=success' ) );
		exit;
	}
}
