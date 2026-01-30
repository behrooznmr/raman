<?php
add_action('add_meta_boxes', 'info_project_add_meta_box');
add_action('save_post', 'info_project_save_fields');
add_action('admin_enqueue_scripts', 'info_project_enqueue_media_assets');

function info_project_enqueue_media_assets($hook) {
    if ('post.php' !== $hook && 'post-new.php' !== $hook) return;
    wp_enqueue_media();
}

function info_project_add_meta_box() {
    $screens = array('post', 'portfolio');
    foreach ($screens as $screen) {
        add_meta_box('InfoProjectMetabox', 'تنظیمات پروژه', 'info_project_meta_box_callback', $screen, 'normal', 'high');
    }
}

function info_project_meta_box_callback($post) {
    wp_nonce_field('project_settings_save_data', 'project_settings_nonce');

    $fields = array(
        array('label' => 'موضوع وبسایت', 'id' => 'project_subject', 'type' => 'text'),
        array('label' => 'پلن/مدت زمان همکاری', 'id' => 'project_type', 'type' => 'text'),
        array('label' => 'ابزار استفاده شده', 'id' => 'project_feature', 'type' => 'textarea'),
        array('label' => 'لینک وبسایت', 'id' => 'project_url', 'type' => 'url'),
        array('label' => 'کد رنگ 1', 'id' => 'color_code1', 'type' => 'text'),
        array('label' => 'کد رنگ 2', 'id' => 'color_code2', 'type' => 'text'),
        array('label' => 'کد رنگ 3', 'id' => 'color_code3', 'type' => 'text'),
        array('label' => 'کد رنگ 4', 'id' => 'color_code4', 'type' => 'text'),
        array('label' => 'عکس دسکتاپ', 'id' => 'project_desktop_image', 'type' => 'image'),
        array('label' => 'عکس موبایل', 'id' => 'project_mobile_image', 'type' => 'image'),
    );
    ?>
    <style>
        .image-preview img { max-width: 180px; height: auto; display: block; margin-bottom: 10px; border: 1px solid #ccd0d4; border-radius: 4px; padding: 5px; background: #fff; }
        .project-field-row { margin-bottom: 15px; }
    </style>

    <table class="form-table">
        <tbody>
        <?php foreach ($fields as $field) :
            $meta_value = get_post_meta($post->ID, $field['id'], true); ?>
            <tr class="project-field-row">
                <th><label for="<?php echo esc_attr($field['id']); ?>"><?php echo esc_html($field['label']); ?></label></th>
                <td>
                    <?php if ($field['type'] === 'textarea') : ?>
                        <textarea class="large-text" id="<?php echo esc_attr($field['id']); ?>" name="<?php echo esc_attr($field['id']); ?>" rows="4"><?php echo esc_textarea($meta_value); ?></textarea>
                    <?php elseif ($field['type'] === 'image') : ?>
                        <div class="image-uploader-wrapper">
                            <input type="hidden" id="<?php echo esc_attr($field['id']); ?>" name="<?php echo esc_attr($field['id']); ?>" value="<?php echo esc_url($meta_value); ?>">
                            <div class="image-preview" style="<?php echo empty($meta_value) ? 'display:none;' : ''; ?>">
                                <img src="<?php echo esc_url($meta_value); ?>" alt="Preview">
                            </div>
                            <button type="button" class="button upload-image-button">انتخاب عکس</button>
                            <button type="button" class="button remove-image-button" style="<?php echo empty($meta_value) ? 'display:none;' : ''; ?>">حذف عکس</button>
                        </div>
                    <?php else : ?>
                        <input class="regular-text" id="<?php echo esc_attr($field['id']); ?>" name="<?php echo esc_attr($field['id']); ?>" type="<?php echo esc_attr($field['type']); ?>" value="<?php echo esc_attr($meta_value); ?>">
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <script>
    jQuery(document).ready(function($) {
        $('.upload-image-button').click(function(e) {
            e.preventDefault();
            var button = $(this);
            var custom_uploader = wp.media({
                title: 'انتخاب تصویر پروژه',
                button: { text: 'تایید تصویر' },
                multiple: false
            }).on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                button.siblings('input').val(attachment.url);
                button.siblings('.image-preview').show().find('img').attr('src', attachment.url);
                button.siblings('.remove-image-button').show();
            }).open();
        });

        $('.remove-image-button').click(function() {
            $(this).siblings('input').val('');
            $(this).siblings('.image-preview').hide();
            $(this).hide();
        });
    });
    </script>
    <?php
}

function info_project_save_fields($post_id) {
    if (!isset($_POST['project_settings_nonce']) || !wp_verify_nonce($_POST['project_settings_nonce'], 'project_settings_save_data')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    $fields = array('project_subject', 'project_type', 'project_feature', 'project_url', 'color_code1', 'color_code2', 'color_code3', 'color_code4', 'project_desktop_image', 'project_mobile_image');

    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
}

add_action('elementor/init', function() {

	if (!class_exists('\Elementor\Core\DynamicTags\Data_Tag')) return;

	class Project_Image_Dynamic_Tag extends \Elementor\Core\DynamicTags\Data_Tag {

		public function get_name() {
			return 'project-image-url';
		}

		public function get_group() {
			return 'site';
		}

		public function get_title() {
			return 'عکس پروژه (داینامیک)';
		}

		public function get_categories() {
			return [\Elementor\Modules\DynamicTags\Module::IMAGE_CATEGORY];
		}

		protected function register_controls() {
			$this->add_control('field_key', [
				'label' => 'انتخاب فیلد عکس',
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'project_desktop_image' => 'عکس دسکتاپ',
					'project_mobile_image' => 'عکس موبایل',
				],
				'default' => 'project_desktop_image',
			]);
		}

		public function get_value(array $options = []) {
			$field_key = $this->get_settings('field_key');
			$image_url = get_post_meta(get_the_ID(), $field_key, true);

			if (empty($image_url)) {
				return [];
			}

			$attachment_id = attachment_url_to_postid($image_url);

			return [
				'id' => $attachment_id,
				'url' => $image_url,
			];
		}
	}

	add_action('elementor/dynamic_tags/register', function($dynamic_tags) {
		$dynamic_tags->register(new Project_Image_Dynamic_Tag());
	});
});