<?php
class InfoProjectMetaBox {

	private $screen = array('post', 'portfolio');

	private $info_fields = array(
		array('label' => 'موضوع وبسایت', 'id' => 'project_subject', 'type' => 'text'),
		array('label' => 'نوع وبسایت', 'id' => 'project_type', 'type' => 'text'),
		array('label' => 'امکانات اختصاصی', 'id' => 'project_feature', 'type' => 'textarea'),
		array('label' => 'لینک وبسایت', 'id' => 'project_url', 'type' => 'url'),

		array('label' => ' کد رنگ 1', 'id' => 'color_code1', 'type' => 'text'),
		array('label' => 'کد رنگ 2', 'id' => 'color_code2', 'type' => 'text'),
		array('label' => 'کد رنگ 3', 'id' => 'color_code3', 'type' => 'text'),
		array('label' => 'کد رنگ 4', 'id' => 'color_code4', 'type' => 'text'),
	);

	private $image_fields = array(
		array('label' => 'عکس دسکتاپ', 'id' => 'project_desktop_image', 'type' => 'image'),
		array('label' => 'عکس موبایل', 'id' => 'project_mobile_image', 'type' => 'image'),
	);

	public function __construct() {
		add_action('add_meta_boxes', array($this, 'add_meta_box'));
		add_action('save_post', array($this, 'save_fields'));
		add_action('admin_enqueue_scripts', array($this, 'enqueue_media_assets'));
	}

	public function enqueue_media_assets($hook) {
		if ('post.php' !== $hook && 'post-new.php' !== $hook) return;
		wp_enqueue_media();
	}

	public function add_meta_box() {
		foreach ($this->screen as $single_screen) {
			add_meta_box('InfoProjectMetabox', 'تنظیمات پروژه', array($this, 'meta_box_callback'), $single_screen, 'normal', 'high');
		}
	}

	public function meta_box_callback($post) {
		wp_nonce_field('project_settings_save_data', 'project_settings_nonce');
		?>
        <div class="project-settings-tabs">
            <ul class="nav-tab-wrapper">
                <li><a class="nav-tab nav-tab-active" href="#tab-project-info">اطلاعات پروژه</a></li>
                <li><a class="nav-tab" href="#tab-project-images">عکس‌های پروژه</a></li>
            </ul>
            <div class="tab-content-wrapper">
                <div id="tab-project-info" class="tab-content active">
                    <table class="form-table">
                        <tbody>
						<?php foreach ($this->info_fields as $field) :
							$meta_value = get_post_meta($post->ID, $field['id'], true);
							?>
                            <tr>
                                <th><label for="<?php echo esc_attr($field['id']); ?>"><?php echo esc_html($field['label']); ?></label></th>
                                <td>
									<?php switch ($field['type']) {
										case 'textarea':
											echo sprintf('<textarea class="large-text" id="%s" name="%s" rows="5">%s</textarea>', esc_attr($field['id']), esc_attr($field['id']), esc_textarea($meta_value));
											break;
										default:
											echo sprintf('<input class="regular-text" id="%s" name="%s" type="%s" value="%s">', esc_attr($field['id']), esc_attr($field['id']), esc_attr($field['type']), esc_attr($meta_value));
											break;
									} ?>
                                </td>
                            </tr>
						<?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div id="tab-project-images" class="tab-content">
                    <table class="form-table">
                        <tbody>
						<?php foreach ($this->image_fields as $field) :
							$image_url = get_post_meta($post->ID, $field['id'], true);
							?>
                            <tr>
                                <th><label for="<?php echo esc_attr($field['id']); ?>"><?php echo esc_html($field['label']); ?></label></th>
                                <td>
                                    <div class="image-uploader-wrapper">
                                        <input type="hidden" id="<?php echo esc_attr($field['id']); ?>" name="<?php echo esc_attr($field['id']); ?>" value="<?php echo esc_url($image_url); ?>">
                                        <div class="image-preview-wrapper" style="<?php echo empty($image_url) ? 'display:none;' : ''; ?>">
                                            <img class="image-preview" src="<?php echo esc_url($image_url); ?>" alt="Preview">
                                        </div>
                                        <button type="button" class="button button-primary upload-image-button">انتخاب عکس</button>
                                        <button type="button" class="button button-secondary remove-image-button" style="<?php echo empty($image_url) ? 'display:none;' : ''; ?>">حذف عکس</button>
                                    </div>
                                </td>
                            </tr>
						<?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
		<?php
	}

	public function save_fields($post_id) {
		if (!isset($_POST['project_settings_nonce']) || !wp_verify_nonce($_POST['project_settings_nonce'], 'project_settings_save_data')) return;
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
		if (!current_user_can('edit_post', $post_id)) return;

		$all_fields = array_merge($this->info_fields, $this->image_fields);

		foreach ($all_fields as $field) {
			if (isset($_POST[$field['id']])) {
				$value = $_POST[$field['id']];
				$sanitized_value = '';
				switch ($field['type']) {
					case 'url':
					case 'image':
						$sanitized_value = esc_url_raw($value);
						break;
					case 'textarea':
						$sanitized_value = sanitize_textarea_field($value);
						break;
					default:
						$sanitized_value = sanitize_text_field($value);
						break;
				}
				update_post_meta($post_id, $field['id'], $sanitized_value);
			} else {
				if ($field['type'] === 'checkbox') {
					delete_post_meta($post_id, $field['id']);
				}
			}
		}
	}
}

if (class_exists('InfoProjectMetaBox')) {
	new InfoProjectMetaBox();
}