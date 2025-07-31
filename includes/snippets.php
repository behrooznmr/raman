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






