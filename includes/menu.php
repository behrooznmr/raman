<?php
defined( 'ABSPATH' ) || exit;

// register menu wo
function register_raman_menus() {
	register_nav_menus(
		array(
			'raman_primary_menu' => __( 'منوی اصلی رامان', 'ra' ),
			'mobile-menu'        => __( 'منوی موبایل' ),
			'megamenu_col_1'     => __( 'ستون ۱ مگامنو', 'ra' ),
			'megamenu_col_2'     => __( 'ستون ۲ مگامنو', 'ra' ),
			'megamenu_col_3'     => __( 'ستون ۳ مگامنو', 'ra' ),
			'footer-column-1'    => 'ستون اول فوتر',
			'footer-column-2'    => 'ستون دوم فوتر',
			'footer-column-3'    => 'ستون سوم فوتر',
			'footer-column-4'    => 'ستون چهارم فوتر',
			'footer-copyright'   => 'ردیف کپی رایت پایین سمت راست',
			// نام جایگاه منو: منوی موبایل


		)
	);
}
add_action( 'after_setup_theme', 'register_raman_menus' );

add_action( 'wp_nav_menu_item_custom_fields', 'ra_add_megamenu_checkbox', 10, 4 );
function ra_add_megamenu_checkbox( $item_id, $item, $depth, $args ) {

	if ( $depth !== 0 ) {
		return;
	}

	$is_mega = get_post_meta( $item_id, '_ra_is_megamenu', true );

	?><p class="field-ra-is-megamenu description description-wide" style="margin:10px 0;"><label><input type="checkbox"
	                                                                                                    name="ra_is_megamenu[<?php echo esc_attr( $item_id ); ?>]"
	                                                                                                    value="1" <?php checked( $is_mega, '1' ); ?> /> <?php _e( 'فعال کردن مگامنو', 'ra' ); ?>
	</label></p><?php

}

add_action( 'wp_update_nav_menu_item', 'ra_save_megamenu_checkbox', 10, 2 );
function ra_save_megamenu_checkbox( $menu_id, $menu_item_db_id ) {

	$value = isset( $_POST['ra_is_megamenu'][ $menu_item_db_id ] ) ? '1' : '0';

	update_post_meta( $menu_item_db_id, '_ra_is_megamenu', $value );

}

global $ra_megamenus_data;
$ra_megamenus_data = [];
class RA_Column_Walker extends Walker_Nav_Menu {

	function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {

		$icon_html = '';

		foreach ( $item->classes as $class ) {
			if ( strpos( $class, 'icon-' ) === 0 ) {
				$icon_html = '<i class="ra-menu-icon ' . esc_attr( $class ) . '"></i> ';
				break;
			}
		}

		if ( $item->url === '#' ) {

			$output .= '<li class="ra-mega-list-item ra-mega-col-title">' . $icon_html . '<span>' . esc_html( $item->title ) . '</span>';

		} else {

			$output .= '<li class="ra-mega-list-item"><a href="' . esc_url( $item->url ) . '">' . $icon_html . '<span>' . esc_html( $item->title ) . '</span></a>';

		}

	}

	function end_el( &$output, $item, $depth = 0, $args = null ) {
		$output .= "</li>\n";
	}

}

class RA_Mega_Menu_Walker extends Walker_Nav_Menu {

	function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {

		global $ra_megamenus_data;

		$is_mega = get_post_meta( $item->ID, '_ra_is_megamenu', true ) === '1';

		if ( $depth === 0 && $is_mega ) {

			$item->classes[] = 'ra-has-mega';

			$ra_megamenus_data[ $item->ID ] = $this->build_megamenu_content();

		}

		$icon_html = '';

		foreach ( $item->classes as $class ) {
			if ( strpos( $class, 'icon-' ) === 0 ) {
				$icon_html = '<i class="ra-menu-icon ' . esc_attr( $class ) . '"></i> ';
				break;
			}
		}

		$args->link_before = $icon_html;

		parent::start_el( $output, $item, $depth, $args, $id );

	}

	function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {

		$is_mega = get_post_meta( $element->ID, '_ra_is_megamenu', true ) === '1';

		if ( $depth === 0 && $is_mega ) {

			parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );

			unset( $children_elements[ $element->ID ] );

		} else {

			parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );

		}

	}

	private function build_megamenu_content() {

		ob_start();

		?>
		<div class="ra-mega-grid">

		<div class="ra-mega-col"><?php wp_nav_menu( [
				'theme_location' => 'megamenu_col_1',
				'container'      => false,
				'walker'         => new RA_Column_Walker()
			] ); ?></div>

		<div class="ra-mega-col"><?php wp_nav_menu( [
				'theme_location' => 'megamenu_col_2',
				'container'      => false,
				'walker'         => new RA_Column_Walker()
			] ); ?></div>

		<div class="ra-mega-col"><?php wp_nav_menu( [
				'theme_location' => 'megamenu_col_3',
				'container'      => false,
				'walker'         => new RA_Column_Walker()
			] ); ?></div>

		</div><?php

		return ob_get_clean();

	}

}
function ra_render_main_menu() {

	wp_nav_menu( [

		'theme_location' => 'raman_primary_menu',

		'container' => 'nav',

		'container_class' => 'ra-nav',

		'menu_class' => 'ra-menu',

		'walker' => new RA_Mega_Menu_Walker(),

		'fallback_cb' => false,

	] );

}

add_filter( 'nav_menu_item_attributes', 'ra_add_megamenu_attribute', 10, 3 );
function ra_add_megamenu_attribute( $atts, $item, $args ) {

	if ( get_post_meta( $item->ID, '_ra_is_megamenu', true ) === '1' ) {

		$atts['data-megamenu-id'] = $item->ID;

	}

	return $atts;

}


add_action( 'wp_footer', 'ra_pass_megamenu_data_to_js', 5 );
function ra_pass_megamenu_data_to_js() {

	global $ra_megamenus_data;

	if ( empty( $ra_megamenus_data ) ) {
		return;
	}


	$json_data = wp_json_encode( [ 'menus' => $ra_megamenus_data ] );


	echo '<script type="text/javascript" id="ra-megamenu-data">';

	echo 'const raMegaData = ' . $json_data . ';';

	echo '</script>';

}