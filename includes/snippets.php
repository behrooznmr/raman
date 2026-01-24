<?php

defined( 'ABSPATH' ) || exit;
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
    if(!is_404()){
	?>
    <div id="preloader">
        <div class="loader">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 66 66" height="150px" width="150px" class="spinner">
                <circle stroke="url(#gradient)" r="30" cy="33" cx="33" stroke-width="0.3" fill="transparent"
                        class="path"></circle>
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
}
//add_action( 'wp_body_open', 'add_loading_page', 1 );

//gravity form customize error
add_filter( 'gform_validation', 'change_specific_field_validation_message' );
function change_specific_field_validation_message( $validation_result ) {

	$form = $validation_result['form'];

	$target_form_id  = 10;
	$target_field_id = 1;

	if ( $form['id'] == $target_form_id ) {
		foreach ( $form['fields'] as &$field ) {
			if ( $field->id == $target_field_id && $field->failed_validation ) {
				$field->validation_message = 'لطفاً برای دریافت مشاوره، شماره تلفن خود را وارد کنید.';
				break;
			}
		}
	}

	return $validation_result;
}

function convert_persian_to_english_numbers( $string ) {
	$persian_digits = array( '۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹' );
	$arabic_digits  = array( '٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩' );
	$english_digits = array( '0', '1', '2', '3', '4', '5', '6', '7', '8', '9' );

	$string = str_replace( $persian_digits, $english_digits, $string );
	$string = str_replace( $arabic_digits, $english_digits, $string );

	return $string;
}

add_filter( 'gform_validation', 'advanced_mobile_validation_fixed' );
function advanced_mobile_validation_fixed( $validation_result ) {

	$form = $validation_result['form'];

	$target_form_id  = 10;
	$target_field_id = 1;

	if ( $form['id'] == $target_form_id ) {
		foreach ( $form['fields'] as &$field ) {
			if ( $field->id == $target_field_id ) {

				$value = rgpost( "input_{$field->id}" );

				if ( empty( $value ) ) {
					continue;
				}

				$english_number = convert_persian_to_english_numbers( $value );

				if ( ! ctype_digit( $english_number ) ) {
					$field->failed_validation      = true;
					$field->validation_message     = 'لطفاً فقط عدد برای شماره موبایل وارد کنید.';
					$validation_result['is_valid'] = false;
				} else {
					$length = strlen( $english_number );

					if ( $length < 11 ) {
						$field->failed_validation      = true;
						$field->validation_message     = 'تعداد ارقام شماره موبایل وارد شده کم است. لطفاً مجدد بررسی کنید.';
						$validation_result['is_valid'] = false;
					} elseif ( $length > 11 ) {
						$field->failed_validation      = true;
						$field->validation_message     = 'تعداد ارقام شماره موبایل وارد شده زیاد است. لطفاً مجدد بررسی کنید.';
						$validation_result['is_valid'] = false;
					} elseif ( substr( $english_number, 0, 2 ) !== '09' ) {
						$field->failed_validation      = true;
						$field->validation_message     = 'شماره موبایل باید با 09 شروع شود.';
						$validation_result['is_valid'] = false;
					}
				}

				break;
			}
		}
	}

	return $validation_result;
}

//disable note
if ( is_admin_bar_showing() ) {
	add_action( 'admin_bar_menu', function ( $wp_admin_bar ) {
		$wp_admin_bar->remove_node( 'elementor_notes' );
	}, 201 );
}

//register elementor widget
function register_raman_en_title_widget( $widgets_manager ) {
	require_once( get_template_directory() . '/template-parts/raman-en-title-widget.php' );
	$widgets_manager->register( new \Raman_En_Title_Widget() );
}
add_action( 'elementor/widgets/register', 'register_raman_en_title_widget' );

