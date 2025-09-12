<?php


//customize login page
function my_login_logo() { ?>
    <style type="text/css">
        body.login.js.login-action-login.wp-core-ui.rtl.locale-fa-ir {
            background-image: url("https://raman.agency/wp-content/uploads/2023/03/1-1-1.jpg");
            height: auto;
            width: 100%;
            background-size: cover;
            background-repeat: no-repeat;

        }

        .login form {
            margin-top: 20px !important;
            margin-right: 0 !important;
            padding: 26px 24px 34px !important;
            font-weight: 400;
            overflow: hidden;
            background: #ffffff24 !important;
            border: 1px solid #496a57 !important;
            box-shadow: 0 1px 3px rgb(0 0 0 / 4%) !important;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1) !important;
            backdrop-filter: blur(3.1px) !important;
            -webkit-backdrop-filter: blur(3.1px) !important;
            border: 1px solid rgba(255, 255, 255, 0.3) !important;
            border-radius: 10px !important;
        }

        .language-switcher form {
            background: #ffffff00 !important;
            border-radius: none !important;
            box-shadow: none !important;
            backdrop-filter: none !important;
            -webkit-backdrop-filter: none !important;
            border: none !important;
            border-radius: none !important;
        }

        .wp-core-ui .button-primary {
            background: #000000f0 !important;
            border-color: #000000f0 !important;
            transition: all 0.4s;
        }

        .login form .input, .login form input[type=checkbox], .login input[type=text] {
            background: #0b0b0bc2 !important;
        }

        .wp-core-ui .button-primary:hover {
            background-color: #8b1717 !important;
            border-color: #8b1717 !important;
            transition: all 0.4s;
        }

        .wp-core-ui .button.button-large {
            padding: 0px 39px 3px 39px !important;
        }

        .login label {
            color: white;
        }

        input[type=text]#user_login {
            color: #ffffff !important;
        }

        #login h1 a, .login h1 a {
            background-image: url("https://raman.agency/wp-content/uploads/2021/03/cropped-222222.png");
            height: 100px;
            width: 100px;
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
}

;

function itsme_disable_feed() {
	wp_die( __( 'No feed available, please visit the <a href="' . esc_url( home_url( '/' ) ) . '">homepage</a>!' ) );
}

add_action( 'do_feed', 'itsme_disable_feed', 1 );
add_action( 'do_feed_rdf', 'itsme_disable_feed', 1 );
add_action( 'do_feed_rss', 'itsme_disable_feed', 1 );
add_action( 'do_feed_rss2', 'itsme_disable_feed', 1 );
add_action( 'do_feed_atom', 'itsme_disable_feed', 1 );
add_action( 'do_feed_rss2_comments', 'itsme_disable_feed', 1 );
add_action( 'do_feed_atom_comments', 'itsme_disable_feed', 1 );

remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );

/*remnove s.w.org links for speed*/
add_action( 'init', 'remove_dns_prefetch' );
function remove_dns_prefetch() {
	remove_action( 'wp_head', 'wp_resource_hints', 2, 99 );
}

// register menu wo
function register_raman_menus() {
	register_nav_menus(
		array(
			'raman_primary_menu' => __( 'منوی اصلی رامان', 'ra' ),
			'megamenu_col_1'     => __( 'ستون ۱ مگامنو', 'ra' ),
			'megamenu_col_2'     => __( 'ستون ۲ مگامنو', 'ra' ),
			'megamenu_col_3'     => __( 'ستون ۳ مگامنو', 'ra' ),
			'footer-column-1'  => 'ستون اول فوتر',
			'footer-column-2'  => 'ستون دوم فوتر',
			'footer-column-3'  => 'ستون سوم فوتر',
			'footer-column-4'  => 'ستون چهارم فوتر',
			'footer-copyright' => 'ردیف کپی رایت پایین سمت راست',

		)
	);
}

add_action( 'after_setup_theme', 'register_raman_menus' );

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

add_action( 'wp_body_open', 'add_custom_cursor' );

//add loading anim
function add_loading_page() {
	?>
    <div id="preloader">
        <div class="loader">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 66 66" height="150px" width="150px" class="spinner">
                <circle stroke="url(#gradient)" r="30" cy="33" cx="33" stroke-width="1" fill="transparent" class="path"></circle>
                <defs>
                    <linearGradient id="gradient">
                        <stop stop-opacity="1" stop-color="#fff" offset="0%"></stop>
                        <stop stop-opacity="0" stop-color="#fff" offset="100%"></stop>
                    </linearGradient>
                </defs>
            </svg>
            <div class="preloader-percentage">0%</div>
        </div>
    </div>
	<?php
}
add_action( 'wp_body_open', 'add_loading_page', 1 );
//mega menu


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


