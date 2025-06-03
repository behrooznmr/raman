<?php
defined( 'ABSPATH' ) || exit;

add_action('admin_menu', 'RCP_add_settings_menu');
function RCP_add_settings_menu() {
	add_menu_page('تنظیمات سایت', 'تنظیمات سایت', 'manage_options', 'rcp-site-settings', 'RCP_render_settings_page', 'dashicons-admin-generic', 80);
	add_submenu_page('rcp-site-settings', 'Custom CSS/JS', 'Custom CSS/JS', 'manage_options', 'custom-css-js', 'RCP_render_css_js_page');
}

function RCP_render_settings_page() {
	?>
	<div class="option-page-wrapper">
		<div class="">
			<div class="img-title-wrapper">
                <img width="57px" src="<?php echo RCP_ASSETS . 'image/logo.png'; ?>">
                <div class="title-desc-wrapper">
                    <div class="option-page-title"> تنظیمات اختصاصی سایت</div>
                    <div class="option-page-desc">آژانس خلاقیت رامان</div>
                </div>
            </div>
            <div class="option-divider"></div>
			<div class="option-box-wrapper">
					<a class="option-item" href="?page=custom-css-js"><img width="35px" src="<?php echo RCP_ASSETS . 'image/javascript.png'; ?>">Custom CSS & JS</a>
                    <a class="option-item" href="?page=custom-css-js"><img width="35px" src="<?php echo RCP_ASSETS . 'image/javascript.png'; ?>">Post Type Activator</a>
                    <a class="option-item" href="?page=custom-css-js"><img width="35px" src="<?php echo RCP_ASSETS . 'image/javascript.png'; ?>">Code Snippets</a>
                    <a class="option-item" href="?page=custom-css-js"><img width="35px" src="<?php echo RCP_ASSETS . 'image/javascript.png'; ?>">Dashboard Fonts</a>
                    <a class="option-item" href="?page=custom-css-js"><img width="35px" src="<?php echo RCP_ASSETS . 'image/javascript.png'; ?>">Module Management</a>
			</div>
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

	if ( isset($_GET['status']) && $_GET['status'] === 'success' ) {
		echo '<div class="notice notice-success is-dismissible"><p>تنظیمات ذخیره شد.</p></div>';
	}

	echo '<div class="custom-css-js-wrapper wrap"><h1>Custom CSS & JS</h1><form method="post">';
	wp_nonce_field('RCP_save', 'RCP_nonce');

	foreach ( $fields as $key => $label ) {
		$val  = get_option($key, '');
		$mode = strpos($key, 'js') !== false ? 'javascript' : 'css';

		echo "<h2>{$label}</h2>";
		echo "<textarea name='{$key}' data-editor='{$mode}' rows='10' class='large-text code'>" . esc_textarea($val) . "</textarea>";
	}

	echo '<p><input type="submit" name="RCP_submit" class="button button-primary" value="ذخیره تنظیمات"></p>';
	echo '</form></div>';
}





