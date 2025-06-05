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

// code snippets handler
add_action('init', 'RCP_execute_custom_snippets');
function RCP_execute_custom_snippets() {
	if ( is_admin() ) return;
//	if ( current_user_can('administrator') ) {
//	}

	$file_path = RCP_INCS . 'custom-snippets.php';

	if ( file_exists($file_path) ) {
		include_once $file_path;
	}
}


// check validate php code for code snippets handler
function RCP_validate_php_code($code) {
	$code = trim($code);

	if ( stripos($code, '<?php') !== false ) {
		$code = str_replace('<?php', '', $code);
	}

	$wrapped_code = "return function() {\n" . $code . "\n};";

	try {
		ob_start();
		$test_func = @eval($wrapped_code);
		ob_end_clean();

		if ( !is_callable($test_func) ) {
			return 'کد PHP دارای خطای سینتکسی است و ذخیره نشد.';
		}
	} catch (Throwable $e) {
		return 'خطا: ' . $e->getMessage();
	}

	return true;
}

// post type activator handler

function RCP_load_enabled_post_types() {
	$enabled = get_option('rcp_enabled_post_types', []);
	foreach ( $enabled as $slug ) {
		if ( $slug === 'products' && class_exists( 'WooCommerce' ) ) {
			continue; // جلوگیری از لود products در صورت فعال بودن ووکامرس
		}
		$file = RCP_INCS . 'post-types/' . $slug . '.php';
		if ( file_exists($file) ) {
			include_once $file;
		}
	}
}


add_action('plugins_loaded', 'RCP_load_enabled_modules');

// module management handler
function RCP_load_enabled_modules() {
	$modules = get_option('rcp_enabled_modules', []);
	if ( empty($modules) ) return;

	require_once RCP_INCS . 'module-management.php';

	foreach ( $modules as $module ) {
		$function = 'RCP_module_' . $module;
		if ( function_exists($function) ) {
			call_user_func($function);
		}
	}
}
