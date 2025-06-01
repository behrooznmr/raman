<?php get_header(); ?>
<main>
    <h1><?php the_archive_title(); ?></h1>
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            the_title('<h2>', '</h2>');
            the_excerpt();
        endwhile;
    else :
        echo '<p>مطلبی وجود ندارد.</p>';
    endif;
    ?>
</main>
<?php get_footer(); ?>
