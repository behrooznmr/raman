<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
    <div class="site-branding">
        <?php if ( has_custom_logo() ) {
            the_custom_logo();
        } else {
            echo '<h1>' . get_bloginfo('name') . '</h1>';
        } ?>
    </div>
    <nav>
        <?php wp_nav_menu(['theme_location' => 'main-menu']); ?>
    </nav>
</header>
