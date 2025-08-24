<?php


//customize login page
function my_login_logo() { ?>
	<style type="text/css">
        body.login.js.login-action-login.wp-core-ui.rtl.locale-fa-ir{
            background-image: url("https://raman.agency/wp-content/uploads/2023/03/1-1-1.jpg");
            height:auto;
            width:100%;
            background-size: cover;
            background-repeat: no-repeat;

        }
        .login form {
            margin-top: 20px!important;
            margin-right: 0!important;
            padding: 26px 24px 34px!important;
            font-weight: 400;
            overflow: hidden;
            background: #ffffff24!important;
            border: 1px solid #496a57!important;
            box-shadow: 0 1px 3px rgb(0 0 0 / 4%)!important;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1)!important;
            backdrop-filter: blur(3.1px)!important;
            -webkit-backdrop-filter: blur(3.1px)!important;
            border: 1px solid rgba(255, 255, 255, 0.3)!important;
            border-radius:10px!important;
        }

        .language-switcher form{
            background: #ffffff00!important;
            border-radius:none!important;
            box-shadow: none!important;
            backdrop-filter: none!important;
            -webkit-backdrop-filter:none!important;
            border: none!important;
            border-radius:none!important;
        }
        .wp-core-ui .button-primary {
            background: #000000f0!important;
            border-color: #000000f0!important;
            transition: all 0.4s;
        }

        .login form .input, .login form input[type=checkbox], .login input[type=text] {
            background: #0b0b0bc2!important;
        }
        .wp-core-ui .button-primary:hover {
            background-color: #8b1717!important;
            border-color: #8b1717!important;
            transition: all 0.4s;
        }
        .wp-core-ui .button.button-large {
            padding: 0px 39px 3px 39px!important;
        }
        .login label {
            color: white;
        }
        input[type=text]#user_login{
            color: #ffffff!important;
        }
        #login h1 a, .login h1 a {
            background-image: url("https://raman.agency/wp-content/uploads/2021/03/cropped-222222.png");
            height:100px;
            width:100px;
            background-size: 100px 100px;
            background-repeat: no-repeat;
            padding-bottom: 30px;
        }
	</style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
// Add specific CSS class by filter
add_filter( 'body_class', 'my_class_names' );
function my_class_names( $classes ) {
	// add 'class-name' to the $classes array
	$classes[] = 'preloader-visible';
	// return the $classes array
	return $classes;
};

function itsme_disable_feed() {
	wp_die( __( 'No feed available, please visit the <a href="'. esc_url( home_url( '/' ) ) .'">homepage</a>!' ) );
}

add_action('do_feed', 'itsme_disable_feed', 1);
add_action('do_feed_rdf', 'itsme_disable_feed', 1);
add_action('do_feed_rss', 'itsme_disable_feed', 1);
add_action('do_feed_rss2', 'itsme_disable_feed', 1);
add_action('do_feed_atom', 'itsme_disable_feed', 1);
add_action('do_feed_rss2_comments', 'itsme_disable_feed', 1);
add_action('do_feed_atom_comments', 'itsme_disable_feed', 1);

remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );

/*remnove s.w.org links for speed*/
add_action( 'init', 'remove_dns_prefetch' );
function  remove_dns_prefetch () {
	remove_action( 'wp_head', 'wp_resource_hints', 2, 99 );
}

// register menu wo
function register_footer_menus() {
	register_nav_menus(
		array(
			'footer-column-1' => 'ستون اول فوتر',
			'footer-column-2' => 'ستون دوم فوتر',
			'footer-column-3' => 'ستون سوم فوتر',
			'footer-column-4' => 'ستون چهارم فوتر',
			'footer-copyright' => 'ردیف کپی رایت پایین سمت راست',
			'primary'         => __( 'منوی اصلی سایت' ),
			'mega_menu_col_1' => __( 'مگامنو - ستون اول'),
			'mega_menu_col_2' => __( 'مگامنو - ستون دوم' ),
			'mega_menu_col_3' => __( 'مگامنو - ستون سوم' ),
		)
	);
}
add_action('after_setup_theme', 'register_footer_menus');

//add custom cursor
function add_custom_cursor() {
	?>
    <div id="custom-cursor">
        <div class="cursor-dot"></div>
        <div class="cursor-ring">
            <div class="arrow-cursor-icon right">
                <svg width="28px" height="28px" viewBox="0 0 24 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 12H18M18 12L13 7M18 12L13 17" stroke="#fff" stroke-width="2"
                          stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
        </div>
    </div>
<?php
}
add_action('wp_body_open', 'add_custom_cursor');

//add loading anim
function add_loading_page() {
    ?>
    <div id="preloader">
        <div class="preloader-percentage">0%</div>
        <div class="line"></div>
    </div>
<?php
}
add_action('wp_body_open', 'add_loading_page',1);

//add mega menu feature
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
	?>
	<?php if ( $depth == 0 ) : ?>
        <p class="description description-wide">
            <label for="edit-menu-item-is-megamenu-<?php echo $item_id; ?>">
                <input type="checkbox" id="edit-menu-item-is-megamenu-<?php echo $item_id; ?>" name="menu_item_is_megamenu[<?php echo $item_id; ?>]" value="1" <?php checked( $is_megamenu, '1' ); ?> />
                <strong>مگامنو است؟</strong> (در صورت تیک زدن، این آیتم به یک مگامنو با سه ستون تبدیل می‌شود)
            </label>
        </p>
	<?php endif; ?>

    <div class="menu-item-image-wrapper description description-wide">
        <p><strong>تصویر منو</strong></p>
        <input type="hidden" class="custom-media-url" name="menu_item_image_url[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $menu_image_url ); ?>" />
        <img src="<?php echo esc_attr( $menu_image_url ); ?>" class="custom-media-image" style="<?php echo ( empty( $menu_image_url ) ? 'display:none;' : '' ); ?> max-width: 100px; height: auto; margin-top: 10px;" />
        <button type="button" class="button button-primary custom-media-button">انتخاب/آپلود تصویر</button>
        <button type="button" class="button button-secondary custom-media-remove" style="<?php echo ( empty( $menu_image_url ) ? 'display:none;' : '' ); ?>">حذف تصویر</button>
    </div>
	<?php
}
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