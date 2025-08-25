<?php
date_default_timezone_set( 'Asia/Tehran' );

define( 'RA_VER', filemtime( get_template_directory() . '/assets/css/front.css' ) );
define( 'RA_DIR', get_template_directory() );
define( 'RA_URI', get_template_directory_uri() );
define( 'RA_TEMPLATE', trailingslashit( RA_DIR ) . 'template-parts/' );
define( 'RA_ASSETS', trailingslashit( RA_URI ) . 'assets/' );
define( 'RA_INCS', trailingslashit( RA_DIR ) . 'includes/' );

$includes = array(
	'post-types',
	'price',
	'metabox',
	'snippets',
	'class-wp-bootstrap-navwalker',
);
foreach ( $includes as $file ) {
	$path = RA_INCS . $file . '.php';
	if ( file_exists( $path ) ) {
		require_once wp_normalize_path( $path );
	}
}

function raman_theme_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'widgets' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'automatic-feed-links' );

	register_nav_menus( [
		'main-menu' => __( 'Main Menu', 'raman' ),
	] );

	add_image_size( 'raman-post-thumb', 400, 216, true );
}
add_action( 'after_setup_theme', 'raman_theme_setup' );

function raman_theme_scripts() {
	wp_enqueue_style( 'raman-style', get_stylesheet_uri(), [], RA_VER );

	wp_enqueue_style( 'bootstrap', RA_ASSETS . 'css/bootstrap.rtl.min.css', [], '5.3' );
	wp_enqueue_script( 'bootstrap', RA_ASSETS . 'js/bootstrap.bundle.min.js', [ 'jquery' ], '5.3', true );

	wp_enqueue_style( 'swiper', RA_ASSETS . 'css/swiper-bundle.min.css', [], '11.0' );
	wp_enqueue_script( 'swiper', RA_ASSETS . 'js/swiper-bundle.min.js', [], '11.0', false );

	wp_enqueue_style( 'raman-front', RA_ASSETS . 'css/front.css', ['bootstrap', 'swiper'], RA_VER );
	wp_enqueue_script( 'raman-front', RA_ASSETS . 'js/front.js', [ 'jquery', 'swiper', 'bootstrap' ], RA_VER, true );

	wp_localize_script( 'raman-front', 'ra_object', [
		'ajax_url' => admin_url( 'admin-ajax.php' ),
		'nonce'    => wp_create_nonce( 'ra_ajax_nonce' )
	] );

	wp_enqueue_style( 'raman-custom', RA_ASSETS . 'css/custom.css', ['raman-front'], RA_VER );
	wp_enqueue_script( 'raman-custom', RA_ASSETS . 'js/custom.js', [ 'jquery', 'raman-front' ], RA_VER, true );
}
add_action( 'wp_enqueue_scripts', 'raman_theme_scripts' );

function raman_admin_enqueue_scripts() {
	wp_enqueue_style( 'raman-admin', RA_ASSETS . 'css/admin.css', [], RA_VER );
	wp_enqueue_script( 'raman-admin', RA_ASSETS . 'js/admin.js', [ 'jquery' ], RA_VER, true );
}
add_action( 'admin_enqueue_scripts', 'raman_admin_enqueue_scripts' );

/*add_action( 'wp_print_scripts', function() {
	global $wp_scripts;
	echo '<pre>';
	print_r( wp_list_pluck( $wp_scripts->queue, null ) );
	echo '</pre>';
});*/


/*
function load_admin_media_files( $hook ) {
	if ( 'nav-menus.php' !== $hook ) {
		return;
	}
	wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'load_admin_media_files' );

function add_custom_fields_to_menu_items( $item_id, $item, $depth, $args ) {
	$is_megamenu = get_post_meta( $item_id, '_menu_item_is_megamenu', true );
	$menu_image_url = get_post_meta( $item_id, '_menu_item_image_url', true );
	*/?><!--
	<?php /*if ( $depth == 0 ) : */?>
		<p class="description description-wide">
			<label for="edit-menu-item-is-megamenu-<?php /*echo $item_id; */?>">
				<input type="checkbox" id="edit-menu-item-is-megamenu-<?php /*echo $item_id; */?>" name="menu_item_is_megamenu[<?php /*echo $item_id; */?>]" value="1" <?php /*checked( $is_megamenu, '1' ); */?> />
				<strong>مگامنو است؟</strong> (در صورت تیک زدن، این آیتم به یک مگامنو با سه ستون تبدیل می‌شود)
			</label>
		</p>
	<?php /*endif; */?>

	<div class="menu-item-image-wrapper description description-wide">
		<p><strong>تصویر منو</strong></p>
		<input type="hidden" class="custom-media-url" name="menu_item_image_url[<?php /*echo $item_id; */?>]" value="<?php /*echo esc_attr( $menu_image_url ); */?>" />
		<img src="<?php /*echo esc_attr( $menu_image_url ); */?>" class="custom-media-image" style="<?php /*echo ( empty( $menu_image_url ) ? 'display:none;' : '' ); */?> max-width: 100px; height: auto; margin-top: 10px;" />
		<button type="button" class="button button-primary custom-media-button">انتخاب/آپلود تصویر</button>
		<button type="button" class="button button-secondary custom-media-remove" style="<?php /*echo ( empty( $menu_image_url ) ? 'display:none;' : '' ); */?>">حذف تصویر</button>
	</div>
	--><?php
/*}
add_action( 'wp_nav_menu_item_custom_fields', 'add_custom_fields_to_menu_items', 10, 4 );

function save_custom_menu_item_fields( $menu_id, $menu_item_db_id, $args ) {
	if ( isset( $_POST['menu_item_is_megamenu'][$menu_item_db_id] ) ) {
		update_post_meta( $menu_item_db_id, '_menu_item_is_megamenu', '1' );
	} else {
		delete_post_meta( $menu_item_db_id, '_menu_item_is_megamenu' );
	}

	if ( isset( $_POST['menu_item_image_url'][$menu_item_db_id] ) ) {
		$image_url = esc_url_raw( $_POST['menu_item_image_url'][$menu_item_db_id] );
		update_post_meta( $menu_item_db_id, '_menu_item_image_url', $image_url );
	}
}
add_action( 'wp_update_nav_menu_item', 'save_custom_menu_item_fields', 10, 3 );
class Mega_Menu_Walker extends Walker_Nav_Menu {
	private $is_megamenu = false;

	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$item->is_megamenu = get_post_meta( $item->ID, '_menu_item_is_megamenu', true );
		$item->image_url = get_post_meta( $item->ID, '_menu_item_image_url', true );


		$this->is_megamenu = ( $depth === 0 && $item->is_megamenu == '1' );

		$li_classes = 'nav-item';
		if ( in_array( 'menu-item-has-children', $item->classes ) ) {
			$li_classes .= ' dropdown';
		}
		if ( $this->is_megamenu ) {
			$li_classes .= ' menu-large';
		}
		$output .= '<li class="' . esc_attr( $li_classes ) . '">';

		$a_atts = array(
			'title'  => ! empty( $item->attr_title ) ? $item->attr_title : '',
			'target' => ! empty( $item->target )     ? $item->target     : '',
			'rel'    => ! empty( $item->xfn )        ? $item->xfn        : '',
			'href'   => ! empty( $item->url )        ? $item->url        : '#',
			'class'  => 'nav-link'
		);

		if ( $depth === 0 && in_array( 'menu-item-has-children', $item->classes ) ) {
			$a_atts['class'] .= ' dropdown-toggle';
			$a_atts['data-bs-toggle'] = 'dropdown';
			$a_atts['role'] = 'button';
			$a_atts['aria-expanded'] = 'false';
		}

		if ($depth > 0) {
			$a_atts['class'] = 'dropdown-item';
		}

		$item_output = $args->before;
		$item_output .= '<a' . $this->build_attributes( $a_atts ) . '>';

		if ( ! empty( $item->image_url ) ) {
			$item_output .= '<img src="' . esc_url($item->image_url) . '" alt="' . esc_attr($item->title) . '" class="menu-item-image" style="margin-right: 8px; max-height: 20px; vertical-align: middle;" /> ';
		}

		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= $item_output;
	}

	public function start_lvl( &$output, $depth = 0, $args = null ) {
		if ( $this->is_megamenu ) {
			$output .= '<ul class="dropdown-menu megamenu"><div class="row">';
			$locations = ['mega_menu_col_1', 'mega_menu_col_2', 'mega_menu_col_3'];
			foreach ( $locations as $location ) {
				if ( has_nav_menu( $location ) ) {
					$output .= '<li class="col-lg-4 col-md-12">';
					ob_start();
					wp_nav_menu( array(
						'theme_location' => $location,
						'container'      => false,
						'items_wrap'     => '<ul>%3$s</ul>',
						'depth'          => 2,
						'walker'         => new Mega_Menu_Walker()
					) );
					$output .= ob_get_clean();
					$output .= '</li>';
				}
			}
		} else {
			$output .= '<ul class="dropdown-menu">';
		}
	}

	public function end_lvl( &$output, $depth = 0, $args = null ) {
		if ( $this->is_megamenu ) {
			$output .= '</div></ul>';
			$this->is_megamenu = false;
		} else {
			$output .= '</ul>';
		}
	}

	private function build_attributes( $attrs ) {
		$attributes = '';
		foreach ( $attrs as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}
		return $attributes;
	}

	public function display_element($element, &$children_elements, $max_depth, $depth, $args, &$output) {
		$is_megamenu_parent = ($depth === 0 && get_post_meta($element->ID, '_menu_item_is_megamenu', true) == '1');
		if ($is_megamenu_parent) {
			$element->has_children = true;
			$children_elements[$element->ID] = array();
		}
		parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
	}
}
function force_megamenu_walker( $args ) {
	if ( 'primary' == $args['theme_location'] ) {
		$args['walker'] = new Mega_Menu_Walker();
	}
	return $args;
}
add_filter( 'wp_nav_menu_args', 'force_megamenu_walker', 9999 );*/