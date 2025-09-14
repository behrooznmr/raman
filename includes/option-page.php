<?php
defined( 'ABSPATH' ) || exit;

add_action( 'admin_menu', 'RCP_add_settings_menu' );
function RCP_add_settings_menu() {
	add_menu_page( 'تنظیمات سایت', 'تنظیمات سایت', 'manage_options', 'rcp-site-settings', 'RCP_render_settings_page', 'dashicons-admin-generic', 80 );
	add_submenu_page( 'rcp-site-settings', 'Custom CSS/JS', 'Custom CSS/JS', 'manage_options', 'custom-css-js', 'RCP_render_css_js_page' );
	add_submenu_page( 'rcp-site-settings', 'Code Snippets', 'Code Snippets', 'manage_options', 'rcp-code-snippets', 'RCP_render_code_snippets_page' );
	add_submenu_page( 'rcp-site-settings', 'Post Type Activator', 'Post Type Activator', 'manage_options', 'post-type-activator', 'RCP_render_post_type_activator_page' );
	add_submenu_page( 'rcp-site-settings', 'Module Management', 'Module Management', 'manage_options', 'rcp-module-management', 'RCP_render_module_management_page' );
}

function RCP_render_header() {
	?>
    <div class="option-page-header">
        <div class="img-title-wrapper">
            <img width="57px" src="<?php echo RCP_ASSETS . 'image/logo.png'; ?>">
            <div class="title-desc-wrapper">
                <div class="option-page-title">تنظیمات اختصاصی سایت</div>
                <div class="option-page-desc">آژانس خلاقیت رامان</div>
                <div class="option-page-ver"> <?php echo RCP_VER ?> </div>
            </div>
        </div>
        <div class="contact-info">
            <div class="contact-info-item">
                <img style="opacity: 0.6" width="14" src="<?php echo RCP_ASSETS . 'image/internet.png'; ?>">
                <a href="https://raman.agency">www.Raman.agency</a>
            </div>
            <div class="contact-info-item">
                <img width="14" src="<?php echo RCP_ASSETS . 'image/call.png'; ?>">
                <a href="tel:09158243494">09158243494</a>
            </div>
            <div class="contact-info-item">
                <img width="14" src="<?php echo RCP_ASSETS . 'image/chat.png'; ?>">
                <a href="https://t.me/b_nematmorad">Telegram</a>
            </div>
        </div>
    </div>
    <div class="option-divider"></div>
	<?php
}

function RCP_raman_ads_services(){
	?>
    <div class="ads-wrapper">
        <div class="services-wrapper">
            <div class="services-item">
                <img src="<?php echo RCP_ASSETS . 'image/store.jpg'; ?>" class="ads-ser-img">
                <div class="service-text-wrapper">
                    <div class="ads-ser-title"><div>طراحی اختصاصی</div> سایت فروشگاهی با امکانات سفارشی</div>
                    <a href="tel:09158243494" class="ads-ser-buy-btn">ثبت سفارش</a>
                    <a href="tel:09158243494" class="ads-ser-tel-btn">دریافت مشاوره رایگان</a>
                </div>
            </div>
            <div class="services-item">
                <img src="<?php echo RCP_ASSETS . 'image/speed.jpg'; ?>" class="ads-ser-img">
                <div class="service-text-wrapper">
                    <div class="ads-ser-title"><div>سرویس</div> افزایش سرعت سایت</div>
                    <a href="tel:09158243494" class="ads-ser-buy-btn">ثبت سفارش</a>
                    <a href="tel:09158243494" class="ads-ser-tel-btn">دریافت مشاوره رایگان</a>
                </div>
            </div>
            <div class="services-item">
                <img src="<?php echo RCP_ASSETS . 'image/security.webp'; ?>" class="ads-ser-img">
                <div class="service-text-wrapper">
                    <div class="ads-ser-title"><div>سرویس</div> افزایش امنیت سایت</div>
                    <a href="tel:09158243494" class="ads-ser-buy-btn">ثبت سفارش</a>
                    <a href="tel:09158243494" class="ads-ser-tel-btn">دریافت مشاوره رایگان</a>
                </div>
            </div>
        </div>
    </div>
	<?php
}

function RCP_render_settings_page() {
	echo '<div class="option-page-wrapper">';
	RCP_render_header();
	RCP_raman_ads_services();
	echo '<div class="option-box-wrapper">';
	$items = [
		'custom-css-js'         => ['icon' => 'javascript.png', 'label' => 'Custom CSS & JS'],
		'post-type-activator'   => ['icon' => 'javascript.png', 'label' => 'Post Type Activator'],
		'rcp-code-snippets'     => ['icon' => 'php.png',         'label' => 'Code Snippets'],
		'rcp-module-management' => ['icon' => 'javascript.png', 'label' => 'Module Management'],
	];
	foreach ( $items as $slug => $item ) {
		echo '<a class="option-item" href="?page=' . esc_attr( $slug ) . '"><img width="35px" src="' . RCP_ASSETS . 'image/' . esc_attr( $item['icon'] ) . '"> ' . esc_html( $item['label'] ) . '</a>';
	}
	echo '</div></div>';
}

function RCP_render_css_js_page() {
	$fields = [
		'RCP_css_global'  => 'Global CSS',
		'RCP_css_desktop' => 'Desktop CSS',
		'RCP_css_tablet'  => 'Tablet CSS',
		'RCP_css_mobile'  => 'Mobile CSS',
		'RCP_custom_js'   => 'Custom JS'
	];
	echo '<div class="option-page-wrapper">';
	RCP_render_header();
	echo '<div class="custom-css-js-wrapper wrap"><h1>Custom CSS & JS</h1><form method="post">';
	wp_nonce_field( 'RCP_save', 'RCP_nonce' );
	foreach ( $fields as $key => $label ) {
		$val  = get_option( $key, '' );
		$mode = strpos( $key, 'js' ) !== false ? 'javascript' : 'css';
		echo "<h2>{$label}</h2><textarea name='{$key}' data-editor='{$mode}' rows='10' class='large-text code'>" . esc_textarea( $val ) . "</textarea>";
	}
	echo '<p><input type="submit" name="RCP_submit" class="button button-primary" value="Save Settings"></p></form></div></div>';
}

function RCP_render_code_snippets_page() {
	if ( ! current_user_can( 'administrator' ) ) wp_die( 'شما دسترسی لازم برای مشاهده این صفحه را ندارید.' );
	$error_msg = '';
	if ( isset( $_POST['RCP_submit_snippets'] ) && check_admin_referer( 'RCP_save_snippets', 'RCP_nonce_snippets' ) ) {
		$raw_code = wp_unslash( $_POST['RCP_custom_snippets'] );
		$clean_code = preg_replace('/^\s*<\?(php)?|\?>\s*$/i', '', trim($raw_code));
		$validation = RCP_validate_php_code( $clean_code );
		if ( $validation === true ) {
			update_option('rcp_custom_snippets', $clean_code);
			echo '<div class="notice notice-success is-dismissible"><p>کدها با موفقیت ذخیره شدند.</p></div>';
		} else {
			$error_msg = $validation;
		}
	}
	$saved_code = get_option('rcp_custom_snippets', '');
	$display_code = $saved_code;
	if ( ! empty($saved_code) ) {
		$display_code = "<?php\n" . $saved_code;
	} else {
		$display_code = "<?php\n\n";
	}
	echo '<div class="option-page-wrapper">';
	RCP_render_header();
	echo '<div class="wrap"><h1>PHP Code Snippets</h1><form method="post">';
	wp_nonce_field( 'RCP_save_snippets', 'RCP_nonce_snippets' );
	if ( $error_msg ) echo '<div class="notice notice-error is-dismissible"><p>' . esc_html( $error_msg ) . '</p></div>';
	echo '<textarea name="RCP_custom_snippets" data-editor="php" rows="20" class="large-text code" style="font-family: monospace;">' . esc_textarea( $display_code ) . '</textarea>';
	echo '<p><input type="submit" name="RCP_submit_snippets" class="button button-primary" value="Save Settings"></p></form></div></div>';
}

function RCP_render_post_type_activator_page() {
	if ( ! current_user_can( 'administrator' ) ) wp_die( 'شما دسترسی لازم برای مشاهده این صفحه را ندارید.' );
	$options = get_option( 'rcp_enabled_post_types', [] );
	$post_types = [
		'products' => 'Products Post Type',
		'projects' => 'Projects Post Type',
		'services' => 'Services Post Type',
		'news'     => 'News Post Type',
	];
	$woocommerce_active = class_exists( 'WooCommerce' );
	$error_message = '';
	if ( isset( $_POST['RCP_save_post_types'] ) && check_admin_referer( 'RCP_save_post_types', 'RCP_nonce_post_types' ) ) {
		$submitted = isset( $_POST['rcp_post_types'] ) ? array_map( 'sanitize_text_field', $_POST['rcp_post_types'] ) : [];
		if ( $woocommerce_active && in_array( 'products', $submitted ) ) {
			$submitted = array_diff( $submitted, ['products'] );
			$error_message = 'به دلیل فعال بودن افزونه ووکامرس، امکان فعال‌سازی پست تایپ Products وجود ندارد.';
		}
		update_option( 'rcp_enabled_post_types', $submitted );
		echo '<div class="notice notice-success is-dismissible"><p>تنظیمات ذخیره شد.</p></div>';
		if ( $error_message ) {
			echo '<div class="notice notice-error is-dismissible"><p>' . esc_html( $error_message ) . '</p></div>';
		}
		$options = $submitted;
	}
	echo '<div class="option-page-wrapper">';
	RCP_render_header();
	echo '<div class="wrap"><h1>Post Type Activator</h1><form method="post">';
	wp_nonce_field( 'RCP_save_post_types', 'RCP_nonce_post_types' );
	foreach ( $post_types as $key => $label ) {
		$checked = in_array( $key, $options ) ? 'checked' : '';
		$disabled = '';
		$note = '';
		if ( $key === 'products' && $woocommerce_active ) {
			$disabled = 'disabled';
			$note = '<small style="color:red;"> (امکان فعال‌سازی وجود ندارد، زیرا ووکامرس فعال است)</small>';
		}
		echo "<p><label><input type='checkbox' name='rcp_post_types[]' value='{$key}' {$checked} {$disabled}> {$label}</label>{$note}</p>";
	}
	echo '<p><input type="submit" name="RCP_save_post_types" class="button button-primary" value="Save Settings"></p></form></div></div>';
}

function RCP_render_module_management_page() {
	if ( ! current_user_can( 'administrator' ) ) wp_die( 'شما دسترسی ندارید.' );
	$modules = [
		'classic_editor'  => 'Active Classic Editor',
		'classic_widgets' => 'Active Classic Widgets',
		'disable_XML'     => 'Disable XML',
	];
	$saved_modules = get_option( 'rcp_enabled_modules', [] );
	if ( isset( $_POST['RCP_save_modules'] ) && check_admin_referer( 'RCP_save_modules', 'RCP_nonce_modules' ) ) {
		$saved_modules = isset( $_POST['rcp_modules'] ) ? array_map( 'sanitize_text_field', $_POST['rcp_modules'] ) : [];
		update_option( 'rcp_enabled_modules', $saved_modules );
		echo '<div class="notice notice-success is-dismissible"><p>Settings Saved.</p></div>';
	}
	echo '<div class="option-page-wrapper">';
	RCP_render_header();
	echo '<div class="wrap"><h1>Module Management</h1><form method="post">';
	wp_nonce_field( 'RCP_save_modules', 'RCP_nonce_modules' );
	foreach ( $modules as $key => $label ) {
		$checked = in_array( $key, $saved_modules ) ? 'checked' : '';
		echo "<p><label><input type='checkbox' name='rcp_modules[]' value='{$key}' {$checked}> {$label}</label></p>";
	}
	echo '<p><input type="submit" name="RCP_save_modules" class="button button-primary" value="Save Settings"></p></form></div></div>';
}