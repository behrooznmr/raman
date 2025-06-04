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
function RCP_render_option_boxes($exclude_page = '') {
	$boxes = [
		'custom-css-js'         => ['icon' => 'javascript.png', 'label' => 'Custom CSS & JS'],
		'post-type-activator'   => ['icon' => 'javascript.png', 'label' => 'Post Type Activator'],
		'rcp-code-snippets'     => ['icon' => 'php.png',         'label' => 'Code Snippets'],
		'rcp-module-management' => ['icon' => 'javascript.png', 'label' => 'Module Management'],
	];

	echo '<div class="option-box-wrapper">';
	foreach ( $boxes as $slug => $info ) {
		if ( $slug === $exclude_page ) continue;
		echo '<a class="option-item" href="?page=' . esc_attr($slug) . '">
                <img width="35px" src="' . RCP_ASSETS . 'image/' . esc_attr($info['icon']) . '"> ' .
		     esc_html($info['label']) .
		     '</a>';
	}
	echo '</div>';
}

function RCP_render_header() {
	?>
    <div class="option-page-header">
        <div class="img-title-wrapper">
            <img width="57px" src="<?php echo RCP_ASSETS . 'image/logo.png'; ?>">
            <div class="title-desc-wrapper">
                <div class="option-page-title">تنظیمات اختصاصی سایت</div>
                <div class="option-page-desc">آژانس خلاقیت رامان</div>
                <div class="option-page-ver">1.2.0</div>
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
function RCP_render_settings_page() {
	?>
    <div class="option-page-wrapper">
        <div class="option-page-header">
            <div class="img-title-wrapper">
                <img width="57px" src="<?php echo RCP_ASSETS . 'image/logo.png'; ?>">
                <div class="title-desc-wrapper">
                    <div class="option-page-title"> تنظیمات اختصاصی سایت</div>
                    <div class="option-page-desc">آژانس خلاقیت رامان</div>
                    <div class="option-page-ver">1.2.0</div>
                </div>
            </div>
            <div class="contact-info">
                <div class="contact-info-item">
                    <img style="opacity: 0.6" width="14" src="<?php echo RCP_ASSETS . 'image/internet.png'; ?>" alt="">
                    <a href="https://raman.agency">www.Raman.agency</a>
                </div>
                <div class="contact-info-item">
                    <img width="14" src="<?php echo RCP_ASSETS . 'image/call.png'; ?>" alt="">
                    <a href="tel:09158243494">09158243494</a>
                </div>
                <div class="contact-info-item">
                    <img width="14" src="<?php echo RCP_ASSETS . 'image/chat.png'; ?>" alt="">
                    <a href="https://t.me/b_nematmorad">Telegram</a>
                </div>
            </div>
        </div>

        <div class="option-divider"></div>

        <div class="option-box-wrapper">
            <a class="option-item" href="?page=custom-css-js"><img width="35px"
                                                                   src="<?php echo RCP_ASSETS . 'image/javascript.png'; ?>">Custom
                CSS & JS</a>
            <a class="option-item" href="?page=post-type-activator"><img width="35px"
                                                                         src="<?php echo RCP_ASSETS . 'image/javascript.png'; ?>">Post
                Type Activator</a>
            <a class="option-item" href="?page=rcp-code-snippets"><img width="35px"
                                                                       src="<?php echo RCP_ASSETS . 'image/php.png'; ?>">Code
                Snippets</a>
            <a class="option-item" href="?page=custom-css-js"><img width="35px"
                                                                   src="<?php echo RCP_ASSETS . 'image/javascript.png'; ?>">Dashboard
                Fonts</a>
            <a class="option-item" href="?page=rcp-module-management"><img width="35px"
                                                                           src="<?php echo RCP_ASSETS . 'image/javascript.png'; ?>">Module
                Management</a>
        </div>
    </div>
    <div>

    </div>
	<?php
}

function RCP_render_css_js_page() {
	$fields = [
		'RCP_css_global'  => 'Global CSS',
		'RCP_css_desktop' => 'Desktop CSS',
		'RCP_css_tablet'  => 'Tablet CSS',
		'RCP_css_mobile'  => 'Mobile CSS',
		'RCP_custom_js'   => 'Custom JS'
	];

	if ( isset( $_GET['status'] ) && $_GET['status'] === 'success' ) {
		echo '<div class="notice notice-success is-dismissible"><p>Settings Saved.</p></div>';
	}

	echo '
    <div class="option-page-wrapper">
    <div class="option-page-header">
        <div class="img-title-wrapper">
            <img width="57px" src="' . RCP_ASSETS . 'image/logo.png">
            <div class="title-desc-wrapper">
                <div class="option-page-title">تنظیمات اختصاصی سایت</div>
                <div class="option-page-desc">آژانس خلاقیت رامان</div>
            </div>
        </div>
            <div class="contact-info">
                <div class="contact-info-item">
                    <img style="opacity: 0.6" width="14" src="'. RCP_ASSETS . 'image/internet.png" alt="">
                    <a href="https://raman.agency">www.Raman.agency</a>
                </div>
                <div class="contact-info-item">
                    <img width="14" src="'. RCP_ASSETS . 'image/call.png" alt="">
                    <a href="tel:09158243494">09158243494</a>
                </div>
                <div class="contact-info-item">
                    <img width="14" src="'. RCP_ASSETS . 'image/chat.png" alt="">
                    <a href="https://t.me/b_nematmorad">Telegram</a>
                </div>
            </div>
        </div>

        <div class="option-divider"></div>
   
    
    <div class="custom-css-js-wrapper wrap">
        <h1>Custom CSS & JS</h1>
        <form method="post">
    ';
	wp_nonce_field( 'RCP_save', 'RCP_nonce' );

	foreach ( $fields as $key => $label ) {
		$val  = get_option( $key, '' );
		$mode = strpos( $key, 'js' ) !== false ? 'javascript' : 'css';

		echo "<h2>{$label}</h2>";
		echo "<textarea name='{$key}' data-editor='{$mode}' rows='10' class='large-text code'>" . esc_textarea( $val ) . "</textarea>";
	}

	echo '<p><input type="submit" name="RCP_submit" class="button button-primary" value="Save Settings"></p>';
	echo '</form></div></div>';
}

// code snippets html render
function RCP_render_code_snippets_page() {
	if ( ! current_user_can( 'administrator' ) ) {
		wp_die( 'شما دسترسی لازم برای مشاهده این صفحه را ندارید.' );
	}

	$file_path = RCP_INCS . 'custom-snippets.php';
	$code      = file_exists( $file_path ) ? file_get_contents( $file_path ) : '';
	$error_msg = '';
	if ( isset( $_POST['RCP_submit_snippets'] ) && check_admin_referer( 'RCP_save_snippets', 'RCP_nonce_snippets' ) ) {
		if ( current_user_can( 'administrator' ) ) {
			$new_code   = wp_unslash( $_POST['RCP_custom_snippets'] );
			$validation = RCP_validate_php_code( $new_code );

			if ( $validation === true ) {
				file_put_contents( $file_path, "<?php\n" . $new_code );
				$code = "<?php\n" . $new_code;
				echo '<div class="notice notice-success is-dismissible"><p>All Codes Saved.</p></div>';
			} else {
				$error_msg = $validation;
			}
		} else {
			$error_msg = 'شما دسترسی لازم برای این عملیات را ندارید.';
		}
	}
	echo '
    <div class="option-page-wrapper">
        <div class="option-page-header">
        <div class="img-title-wrapper">
            <img width="57px" src="' . RCP_ASSETS . 'image/logo.png">
            <div class="title-desc-wrapper">
                <div class="option-page-title">تنظیمات اختصاصی سایت</div>
                <div class="option-page-desc">آژانس خلاقیت رامان</div>
            </div>
        </div>
            <div class="contact-info">
                <div class="contact-info-item">
                    <img style="opacity: 0.6" width="14" src="'. RCP_ASSETS . 'image/internet.png" alt="">
                    <a href="https://raman.agency">www.Raman.agency</a>
                </div>
                <div class="contact-info-item">
                    <img width="14" src="'. RCP_ASSETS . 'image/call.png" alt="">
                    <a href="tel:09158243494">09158243494</a>
                </div>
                <div class="contact-info-item">
                    <img width="14" src="'. RCP_ASSETS . 'image/chat.png" alt="">
                    <a href="https://t.me/b_nematmorad">Telegram</a>
                </div>
            </div>
        </div>
        <div class="option-divider"></div>
   
    <div class="wrap"><h1>PHP Code Snippets</h1><form method="post">';
	wp_nonce_field( 'RCP_save_snippets', 'RCP_nonce_snippets' );

	if ( ! empty( $error_msg ) ) {
		echo '<div class="notice notice-error is-dismissible"><p>' . esc_html( $error_msg ) . '</p></div>';
	}

	echo '<textarea name="RCP_custom_snippets" data-editor="php" rows="20" class="large-text code" style="font-family: monospace;">' . esc_textarea( str_replace( '<?php', '', $code ) ) . '</textarea>';
	echo '<p class="description">کدهای PHP اینجا وارد می‌شن و در فایل مجزا ذخیره می‌شن. لطفاً کدها را با دقت وارد کنید.</p>';
	echo '<p><input type="submit" name="RCP_submit_snippets" class="button button-primary" value="ذخیره کدها"></p>';
	echo '</form></div></div>';
}

// post type activator html render
function RCP_render_post_type_activator_page() {
	if ( ! current_user_can( 'administrator' ) ) {
		wp_die( 'شما دسترسی لازم برای مشاهده این صفحه را ندارید.' );
	}

	$options    = get_option( 'rcp_enabled_post_types', [] );
	$post_types = [
		'products' => 'Products Post Type ',
		'projects' => 'Projects Post Type',
		'services' => 'Services Post Type',
		'news'     => 'News Post Type',
	];

	if ( isset( $_POST['RCP_save_post_types'] ) && check_admin_referer( 'RCP_save_post_types', 'RCP_nonce_post_types' ) ) {
		$options = isset( $_POST['rcp_post_types'] ) ? array_map( 'sanitize_text_field', $_POST['rcp_post_types'] ) : [];
		update_option( 'rcp_enabled_post_types', $options );
		echo '<div class="notice notice-success is-dismissible"><p>Settings Saved.</p></div>';
	}
	echo '
    <div class="option-page-wrapper">
       <div class="option-page-header">
        <div class="img-title-wrapper">
            <img width="57px" src="' . RCP_ASSETS . 'image/logo.png">
            <div class="title-desc-wrapper">
                <div class="option-page-title">تنظیمات اختصاصی سایت</div>
                <div class="option-page-desc">آژانس خلاقیت رامان</div>
            </div>
        </div>
            <div class="contact-info">
                <div class="contact-info-item">
                    <img style="opacity: 0.6" width="14" src="'. RCP_ASSETS . 'image/internet.png" alt="">
                    <a href="https://raman.agency">www.Raman.agency</a>
                </div>
                <div class="contact-info-item">
                    <img width="14" src="'. RCP_ASSETS . 'image/call.png" alt="">
                    <a href="tel:09158243494">09158243494</a>
                </div>
                <div class="contact-info-item">
                    <img width="14" src="'. RCP_ASSETS . 'image/chat.png" alt="">
                    <a href="https://t.me/b_nematmorad">Telegram</a>
                </div>
            </div>
        </div>
        <div class="option-divider"></div>
         <div class="wrap"><h1>Post Type Activator</h1><form method="post">';
	wp_nonce_field( 'RCP_save_post_types', 'RCP_nonce_post_types' );

	foreach ( $post_types as $key => $label ) {
		$checked = in_array( $key, $options ) ? 'checked' : '';
		echo "<p><label><input type='checkbox' name='rcp_post_types[]' value='{$key}' {$checked}> {$label}</label></p>";
	}

	echo '<p><input type="submit" name="RCP_save_post_types" class="button button-primary" value="Save Settings"></p>';
	echo '</form></div></div>';
}

function RCP_render_module_management_page() {
	if ( ! current_user_can( 'administrator' ) ) {
		wp_die( 'شما دسترسی ندارید.' );
	}

	$modules = [
		'classic_editor'  => 'Active Classic Editor',
		'classic_widgets' => 'Active Classic Widgets',
		'disable_XML'     => 'Disable XML',
		// add feature
		// 'some_feature' => 'favorite description',
	];

	$saved_modules = get_option( 'rcp_enabled_modules', [] );

	if ( isset( $_POST['RCP_save_modules'] ) && check_admin_referer( 'RCP_save_modules', 'RCP_nonce_modules' ) ) {
		$saved_modules = isset( $_POST['rcp_modules'] ) ? array_map( 'sanitize_text_field', $_POST['rcp_modules'] ) : [];
		update_option( 'rcp_enabled_modules', $saved_modules );
		echo '<div class="notice notice-success is-dismissible"><p>Settings Savedند.</p></div>';
	}
	echo '
    <div class="option-page-wrapper">
       <div class="option-page-header">
        <div class="img-title-wrapper">
            <img width="57px" src="' . RCP_ASSETS . 'image/logo.png">
            <div class="title-desc-wrapper">
                <div class="option-page-title">تنظیمات اختصاصی سایت</div>
                <div class="option-page-desc">آژانس خلاقیت رامان</div>
            </div>
        </div>
            <div class="contact-info">
                <div class="contact-info-item">
                    <img style="opacity: 0.6" width="14" src="'. RCP_ASSETS . 'image/internet.png" alt="">
                    <a href="https://raman.agency">www.Raman.agency</a>
                </div>
                <div class="contact-info-item">
                    <img width="14" src="'. RCP_ASSETS . 'image/call.png" alt="">
                    <a href="tel:09158243494">09158243494</a>
                </div>
                <div class="contact-info-item">
                    <img width="14" src="'. RCP_ASSETS . 'image/chat.png" alt="">
                    <a href="https://t.me/b_nematmorad">Telegram</a>
                </div>
            </div>
        </div>
        <div class="option-divider"></div>
   
	<div class="wrap"><h1>Module Management</h1><form method="post">';
	wp_nonce_field( 'RCP_save_modules', 'RCP_nonce_modules' );

	foreach ( $modules as $key => $label ) {
		$checked = in_array( $key, $saved_modules ) ? 'checked' : '';
		echo "<p><label><input type='checkbox' name='rcp_modules[]' value='{$key}' {$checked}> {$label}</label></p>";
	}

	echo '<p><input type="submit" name="RCP_save_modules" class="button button-primary" value="Save Settings"></p>';
	echo '</form></div></div>';
}
