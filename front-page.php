<?php get_header(); ?>




<div class="container">
    <div id="carousel">
        <?php
        query_posts('post_per_page=3');
        while (have_posts()) : the_post(); ?>
            <div>
                <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large')[0] ?? null; ?>
                <img class="img-fluid post-thumbnail" src="<?= $image; ?>" alt="<?php the_title(); ?>">
            </div>
        <?php endwhile; ?>
    </div>
    <?php 
    // annule la requete precedente et retrouver le contenue de la page d'accueil
    wp_reset_query(); // Toujours le faire après une requete "custom"
    the_content(); ?>
</div>









<?php get_footer(); ?>