<?php

defined( 'ABSPATH' ) || exit;

/***
 * 1-add template parts shortcode
 ***/
add_shortcode( 'raman_shortcode', 'ra_get_template_shortcode' );

function ra_get_template_shortcode( $atts )
{
	$atts = shortcode_atts( array(
		'name' => '',
		'type' => '',
	), $atts );

	$name = esc_attr( $atts['name'] );
	$type = esc_attr( $atts['type'] );

	ob_start();

	$template = RA_TEMPLATE . $name . '.php';

	if ( file_exists( $template ) ) {
		include wp_normalize_path( $template );
	}

	return ob_get_clean();
}
