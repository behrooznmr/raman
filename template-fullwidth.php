<?php
/* Template Name: Full Width */
get_header();
?>
<main style="width: 100%">
    <?php
    while ( have_posts() ) : the_post();
        the_content();
    endwhile;
    ?>
</main>
<?php get_footer(); ?>
