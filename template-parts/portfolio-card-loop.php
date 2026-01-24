<?php

defined('ABSPATH') || exit;
?>
<div class="col-12 col-md-6 col-lg-3">
    <article class="portfolio-card">


        <a href="<?php the_permalink(); ?>" class="portfolio-card-link" aria-label="<?php the_title_attribute(); ?>"></a>

        <div class="portfolio-image">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('medium_large', ['class' => 'img-fluid']); ?>
            <?php endif; ?>
        </div>

        <div class="portfolio-overlay">
            <div class="portfolio-loop-content">
                <h2 class="portfolio-title">
                    <a href="<?php the_permalink(); ?>">
			            <?php the_title(); ?>
                    </a>
                </h2>
                <p class="portfolio-excerpt">
		            <?php echo wp_trim_words(get_the_excerpt(), 18); ?>
                </p>
            </div>
            <span class="portfolio-arrow">

                <svg xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" viewBox="0 0 24 24" fill="none"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M17 17L7 7M7 7V16M7 7H16" stroke="#05f36f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></g></svg>
            </span>
        </div>

    </article>
</div>
