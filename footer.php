<?php

if ( function_exists( 'elementor_theme_do_location' ) && elementor_theme_do_location( 'footer' ) ) {

} else {
	get_template_part( 'template-parts/footer' );
}

