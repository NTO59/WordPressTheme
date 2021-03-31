<?php get_header(); ?>

<h1><?php bloginfo('name'); ?></h1>
<p><?php bloginfo('description'); ?></p>

<?php if (have_posts()) : // On verifie s'il y a des articles
    while (have_posts()) : the_post(); // On parcours chaque article 
        get_template_part('partials/content');
    endwhile;
endif; ?>

<?php get_footer(); ?>