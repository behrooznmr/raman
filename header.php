<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
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
if ( function_exists( 'elementor_theme_do_location' ) && elementor_theme_do_location( 'header' ) ) {

} else {

	get_template_part( 'template-parts/header' );
}
?>
