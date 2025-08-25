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
add_action('after_setup_theme', function () {
	register_nav_menus([
		'raman_primary_menu'        => __('منوی اختصاصی رامان', 'ra'),
		'megamenu_col_1' => __('ستون یک مگامنوی اختصاصی', 'ra'),
		'megamenu_col_2' => __('ستون دو مگامنوی اختصاصی', 'ra'),
		'megamenu_col_3' => __('ستون سه مگامنوی اختصاصی', 'ra'),
	]);
});

// field mega menu
add_action('wp_nav_menu_item_custom_fields', function ($item_id, $item, $depth, $args) {
	if ((int) $depth !== 0) {
		return; // فقط سطح-اول
	}
	$is_mega = get_post_meta($item_id, '_ra_is_megamenu', true) === '1';
	?>
    <div class="field-ra-is-megamenu description description-wide" style="margin-top:8px;border-top:1px dashed #ccd0d4;padding-top:8px;">
        <label for="edit-menu-item-ra-is-megamenu-<?php echo esc_attr($item_id); ?>">
            <input type="checkbox"
                   id="edit-menu-item-ra-is-megamenu-<?php echo esc_attr($item_id); ?>"
                   name="ra_is_megamenu[<?php echo esc_attr($item_id); ?>]"
                   value="1" <?php checked($is_mega, true); ?> />
			<?php esc_html_e('فعال کردن مگامنو (برای این آیتم سطح-اول)', 'ra'); ?>
        </label>
        <p class="description" style="margin:6px 0 0;color:#666;">
            با فعال‌کردن، زیرمنوهای این آیتم نادیده گرفته می‌شود و در فرانت‌اند یک دراپ‌داون عریض با ۳ ستون نشان داده خواهد شد که محتوایش از سه جایگاه فهرست «ستون‌های مگامنو» خوانده می‌شود.
        </p>
    </div>
	<?php
}, 10, 4);

add_action('wp_update_nav_menu_item', function ($menu_id, $menu_item_db_id, $args) {
	$val = isset($_POST['ra_is_megamenu'][$menu_item_db_id]) ? '1' : '0';
	update_post_meta($menu_item_db_id, '_ra_is_megamenu', $val);
}, 10, 3);


/**
 * Walker سفارشی:
 * - اگر آیتم سطح-اول تیک مگامنو داشته باشد:
 *   1) زیرمنوهای خودش نمایش داده نشود (Skip children)
 *   2) یک کانتینر عریض با 3 ستون نمایش داده شود.
 * - اگر تیک نخورده بود: رفتار عادی وردپرس (زیرمنو ساده).
 */
class RA_Megamenu_Walker extends Walker_Nav_Menu {
	// برای تشخیص اینکه در کدام سطح-اول قرار داریم و آیا مگامنوست
	protected $current_top_is_mega = false;
	protected $current_top_id = 0;
	protected $skip_children_for = []; // لیست آیتم‌های سطح-اول که باید بچه‌هایشان نادیده گرفته شود

	/**
	 * پیش از رندر هر المنت، تشخیص دهیم آیا آیتم مگامنو است؛
	 * اگر بود، بچه‌های آن را از رندر حذف کنیم.
	 */
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
		$is_mega = get_post_meta( $element->ID, '_ra_is_megamenu', true ) === '1';
		if ( $depth === 0 ) {
			// سطح-اول
			$this->current_top_id      = $element->ID;
			$this->current_top_is_mega = $is_mega;
			if ( $is_mega ) {
				// بچه‌ها را حذف کنیم تا start_el آنها صدا نشود
				if ( ! empty( $children_elements[ $element->ID ] ) ) {
					$this->skip_children_for[ $element->ID ] = $children_elements[ $element->ID ];
					$children_elements[ $element->ID ]       = [];
				}
			}
		}
		parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}

	/**
	 * جلوگیری از تولید <ul class="sub-menu"> برای آیتم‌های مگامنو
	 */
	public function start_lvl( &$output, $depth = 0, $args = null ) {
		if ( $depth === 0 && $this->current_top_is_mega ) {
			// هیچی: زیرمنوی عادی را برای این آیتم نشان نمی‌دهیم
			return;
		}
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul class=\"sub-menu\">\n";
	}

	public function end_lvl( &$output, $depth = 0, $args = null ) {
		if ( $depth === 0 && $this->current_top_is_mega ) {
			return;
		}
		$indent = str_repeat( "\t", $depth );
		$output .= "$indent</ul>\n";
	}

	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$is_mega = ( $depth === 0 ) ? ( get_post_meta( $item->ID, '_ra_is_megamenu', true ) === '1' ) : false;

		$classes   = empty( $item->classes ) ? [] : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		if ( $depth === 0 && $is_mega ) {
			$classes[] = 'ra-has-mega';
		}

		$class_names = $classes ? ' class="' . esc_attr( implode( ' ', array_filter( $classes ) ) ) . '"' : '';

		$output .= '<li' . $class_names . '>';

		// لینک آیتم
		$atts           = [];
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target ) ? $item->target : '';
		$atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
		$atts['href']   = ! empty( $item->url ) ? $item->url : '';
		if ( $depth === 0 && $is_mega ) {
			$atts['class']         = 'ra-mega-toggle'; // برای JS موبایل
			$atts['aria-expanded'] = 'false';
		}

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value      = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$title       = apply_filters( 'the_title', $item->title, $item->ID );
		$item_output = $args->before ?? '';
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . $title . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after ?? '';

		$output .= $item_output;

		// اگر این آیتم مگامنوست، سه ستون را رندر کنیم
		if ( $depth === 0 && $is_mega ) {
			$col1 = wp_nav_menu( [
				'theme_location' => 'megamenu_col_1',
				'container'      => false,
				'menu_class'     => 'ra-mega-col-list',
				'fallback_cb'    => '__return_empty_string',
				'echo'           => false,
				'depth'          => 1,
			] );
			$col2 = wp_nav_menu( [
				'theme_location' => 'megamenu_col_2',
				'container'      => false,
				'menu_class'     => 'ra-mega-col-list',
				'fallback_cb'    => '__return_empty_string',
				'echo'           => false,
				'depth'          => 1,
			] );
			$col3 = wp_nav_menu( [
				'theme_location' => 'megamenu_col_3',
				'container'      => false,
				'menu_class'     => 'ra-mega-col-list',
				'fallback_cb'    => '__return_empty_string',
				'echo'           => false,
				'depth'          => 1,
			] );

			// کانتینر عریض مگامنو
			$output .= '<div class="ra-megamenu" role="group" aria-label="' . esc_attr( $title ) . '">';
			$output .= '  <div class="ra-mega-grid">';
			$output .= '    <div class="ra-mega-col ra-mega-col-1">' . $col1 . '</div>';
			$output .= '    <div class="ra-mega-col ra-mega-col-2">' . $col2 . '</div>';
			$output .= '    <div class="ra-mega-col ra-mega-col-3">' . $col3 . '</div>';
			$output .= '  </div>';
			$output .= '</div>';
		}
	}

	public function end_el( &$output, $item, $depth = 0, $args = null ) {
		$output .= "</li>\n";
	}
}
function ra_render_main_menu() {
	wp_nav_menu([
		'theme_location' => 'raman_primary_menu',
		'container'      => 'nav',
		'container_class'=> 'ra-nav',
		'menu_class'     => 'ra-menu', // ul class
		'fallback_cb'    => false,
		'walker'         => new RA_Megamenu_Walker(),
		'depth'          => 3, // برای آیتم‌های غیرمگا، زیرمنو ساده کار کند
	]);
}
