<?php
class Price_Settings_Page {

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'wph_create_settings' ) );
		add_action( 'admin_init', array( $this, 'wph_setup_sections' ) );
		add_action( 'admin_init', array( $this, 'wph_setup_fields' ) );
	}

	public function wph_create_settings() {
		$page_title = 'نرخ خدمات';
		$menu_title = 'نرخ خدمات';
		$capability = 'manage_options';
		$slug = 'Price';
		$callback = array($this, 'wph_settings_content');
		$icon = 'dashicons-money-alt';
		$position = 2;
		add_menu_page($page_title, $menu_title, $capability, $slug, $callback, $icon, $position);

	}

	public function wph_settings_content() { ?>
		<div class="wrap">
			<h1>نرخ خدمات طراحی سایت و سئو رامان</h1>
			<?php settings_errors(); ?>
			<form method="POST" action="options.php">
				<?php
				settings_fields( 'Price' );
				do_settings_sections( 'Price' );
				submit_button();
				?>
			</form>
		</div> <?php
	}

	public function wph_setup_sections() {
		add_settings_section( 'Price_section', '', array(), 'Price' );
	}



	public function wph_setup_fields() {

		$fields = array(

			array(
				'section' => 'Price_section',
				'label' => 'قیمت طراحی سایت پلن اقتصادی',
				'id' => 'wd_low_price',
				'type' => 'text',
			),
			array(
				'section' => 'Price_section',
				'label' => 'قیمت طراحی سایت پلن استاندارد',
				'id' => 'wd_med_price',
				'type' => 'text',
			),
			array(
				'section' => 'Price_section',
				'label' => 'قیمت طراحی سایت پلن حرفه ای',
				'id' => 'wd_pro_price',
				'type' => 'text',
			),
			array(
				'section' => 'Price_section',
				'label' => 'داندانپزشکی پلن اقتصادی',
				'id' => 'wd_dent_low_price',
				'type' => 'text',
			),
			array(
				'section' => 'Price_section',
				'label' => 'داندانپزشکی پلن استاندارد',
				'id' => 'wd_dent_med_price',
				'type' => 'text',
			),
			array(
				'section' => 'Price_section',
				'label' => 'داندانپزشکی پلن حرفه ای',
				'id' => 'wd_dent_pro_price',
				'type' => 'text',
			),
			array(
				'section' => 'Price_section',
				'label' => 'املاک پلن اقتصادی',
				'id' => 'wd_estate_low_price',
				'type' => 'text',
			),
			array(
				'section' => 'Price_section',
				'label' => 'املاک پلن استاندارد',
				'id' => 'wd_estate_med_price',
				'type' => 'text',
			),
			array(
				'section' => 'Price_section',
				'label' => 'املاک پلن حرفه ای',
				'id' => 'wd_estate_pro_price',
				'type' => 'text',
			),
			array(
				'section' => 'Price_section',
				'label' => ' لندینگ پیج پلن 1',
				'id' => 'lp_low_price',
				'type' => 'text',
			),
			array(
				'section' => 'Price_section',
				'label' => ' لندینگ پیج پلن 2',
				'id' => 'lp_pro_price',
				'type' => 'text',
			),
			array(
				'section' => 'Price_section',
				'label' => ' کانفیگ سرعت پلن 1',
				'id' => 'speed_low_price',
				'type' => 'text',
			),
			array(
				'section' => 'Price_section',
				'label' => '  کانفیگ سرعت پلن 2',
				'id' => 'speed_pro_price',
				'type' => 'text',
			),
			array(
				'section' => 'Price_section',
				'label' => 'کانفیگ امنیت',
				'id' => 'security_price',
				'type' => 'text',
			),
			array(
				'section' => 'Price_section',
				'label' => 'کانفیگ AMP',
				'id' => 'amp_price',
				'type' => 'text',
			),
			array(
				'section' => 'Price_section',
				'label' => 'کانفیگ سئو',
				'id' => 'seo_conf_price',
				'type' => 'text',
			),
			array(
				'section' => 'Price_section',
				'label' => 'قیمت سئو پلن A',
				'id' => 'seo_plana_price',
				'type' => 'text',
			),
			array(
				'section' => 'Price_section',
				'label' => 'قیمت سئو پلن B',
				'id' => '_seo_planb_price',
				'type' => 'text',
			),
			array(
				'section' => 'Price_section',
				'label' => 'قیمت سئو پلن C',
				'id' => 'seo_planc_price',
				'type' => 'text',
			)
		);
		foreach( $fields as $field ){
			add_settings_field( $field['id'], $field['label'], array( $this, 'wph_field_callback' ), 'Price', $field['section'], $field );
			register_setting( 'Price', $field['id'] );
		}
	}
	public function wph_field_callback( $field ) {
		$value = get_option( $field['id'] );
		$placeholder = '';
		if ( isset($field['placeholder']) ) {
			$placeholder = $field['placeholder'];
		}
		switch ( $field['type'] ) {


			default:
				printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" />',
					$field['id'],
					$field['type'],
					$placeholder,
					$value
				);
		}
		if( isset($field['desc']) ) {
			if( $desc = $field['desc'] ) {
				printf( '<p class="description">%s </p>', $desc );
			}
		}
	}

}
new price_Settings_Page();

function srm_elementor_get_option( $attr ) {
	$args = shortcode_atts( array(
		'option_name' => '',
	), $attr );

	return get_option( $args['option_name'] );
}

add_shortcode( 'get_option_shortcode', 'srm_elementor_get_option' );



