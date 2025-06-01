<?php
defined('ABSPATH') || exit;

// افزودن منو به پنل ادمین
add_action('admin_menu', 'myplugin_add_custom_menu');
function myplugin_add_custom_menu() {
	add_menu_page(
		'تنظیمات سایت',
		'تنظیمات سایت',
		'manage_options',
		'raman-cp-main',
		'RCP_main_page_callback',
		'dashicons-image-filter',
		1
	);

	add_submenu_page(
		'raman-cp-main',
		'Custom CSS/JS',
		'Custom CSS/JS',
		'manage_options',
		'RCP-custom-code',
		'RCP_render_custom_code_page'
	);
}

// رندر صفحه Custom CSS/JS
function RCP_render_custom_code_page() {
	// پردازش ذخیره‌سازی فرم
	if (isset($_POST['rcp_custom_code_submit']) && check_admin_referer('rcp_custom_code_save', 'rcp_custom_code_nonce')) {
		update_option('RCP_css_desktop', wp_unslash($_POST['RCP_css_desktop']));
		update_option('RCP_css_tablet', wp_unslash($_POST['RCP_css_tablet']));
		update_option('RCP_css_mobile', wp_unslash($_POST['RCP_css_mobile']));
		update_option('RCP_custom_js', wp_unslash($_POST['RCP_custom_js']));
		echo '<div class="updated"><p>تنظیمات با موفقیت ذخیره شد.</p></div>';
	}

	// دریافت مقادیر فعلی از گزینه‌ها
	$custom_css_desktop = get_option('RCP_css_desktop', '');
	$custom_css_tablet = get_option('RCP_css_tablet', '');
	$custom_css_mobile = get_option('RCP_css_mobile', '');
	$custom_js = get_option('RCP_custom_js', '');
	?>

    <div class="wrap">
        <h1>Custom CSS & JS</h1>
        <form method="post">
			<?php wp_nonce_field('rcp_custom_code_save', 'rcp_custom_code_nonce'); ?>

            <h2>CSS - دسکتاپ</h2>
            <textarea id="css_desktop" name="RCP_css_desktop" rows="10" class="large-text code"><?php echo esc_textarea($custom_css_desktop); ?></textarea>

            <h2>CSS - تبلت</h2>
            <textarea id="css_tablet" name="RCP_css_tablet" rows="10" class="large-text code"><?php echo esc_textarea($custom_css_tablet); ?></textarea>

            <h2>CSS - موبایل</h2>
            <textarea id="css_mobile" name="RCP_css_mobile" rows="10" class="large-text code"><?php echo esc_textarea($custom_css_mobile); ?></textarea>

            <h2>JavaScript</h2>
            <textarea id="js_code" name="RCP_custom_js" rows="10" class="large-text code"><?php echo esc_textarea($custom_js); ?></textarea>

            <p><input type="submit" name="rcp_custom_code_submit" class="button-primary" value="ذخیره تغییرات"></p>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const editors = [];

            // مقداردهی اولیه CodeMirror برای هر textarea
            editors.push(CodeMirror.fromTextArea(document.getElementById('css_desktop'), {
                mode: 'css',
                lineNumbers: true
            }));
            editors.push(CodeMirror.fromTextArea(document.getElementById('css_tablet'), {
                mode: 'css',
                lineNumbers: true
            }));
            editors.push(CodeMirror.fromTextArea(document.getElementById('css_mobile'), {
                mode: 'css',
                lineNumbers: true
            }));
            editors.push(CodeMirror.fromTextArea(document.getElementById('js_code'), {
                mode: 'javascript',
                lineNumbers: true
            }));

            // انتقال محتوای ویرایشگر به textareaها قبل از ارسال فرم
            document.querySelector('form').addEventListener('submit', function () {
                document.getElementById('css_desktop').value = editors[0].getValue();
                document.getElementById('css_tablet').value = editors[1].getValue();
                document.getElementById('css_mobile').value = editors[2].getValue();
                document.getElementById('js_code').value = editors[3].getValue();
            });
        });
    </script>
	<?php
}

// صفحه اصلی تنظیمات
function RCP_main_page_callback() {
	echo '<div class="wrap"><h1>به تنظیمات سایت خوش آمدید</h1></div>';
}

// بارگذاری فایل‌های CodeMirror
add_action('admin_enqueue_scripts', 'RCP_admin_enqueue_cm_scripts');
function RCP_admin_enqueue_cm_scripts() {
	wp_enqueue_style('css-codemirror', trailingslashit(RCP_ASSETS) . 'css/codemirror.min.css');
	wp_enqueue_script('js-codemirror', trailingslashit(RCP_ASSETS) . 'js/codemirror.min.js', array(), true);
	wp_enqueue_script('css-js-codemirror', trailingslashit(RCP_ASSETS) . 'js/css.min.js', array('js-codemirror'), true);
	wp_enqueue_script('javascript-codemirror', trailingslashit(RCP_ASSETS) . 'js/javascript.min.js', array('js-codemirror'), true);
}