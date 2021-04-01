<?php get_header(); ?>
<!-- Sur cette page on va récuperer l'image a la une de la page
On affiche cette image sur toute la largeur juste en dessous du menu
avec la hauteur fixe (300px)
par dessus l'image , on affiche le titre de la page (centré verticalement et horizontalement) -->


<div class="containerDevis">
    <?php
    // on recupère l'image à la une de l'article
    $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large')[0] ?? null;

    if ($image) { ?>
        <img class="img-fluid post-thumbnaill" src="<?= $image; ?>" alt="<?php the_title(); ?>">
    <?php } ?>


    <h1 class="titleDevis"><?php the_title() ?></h1>

</div>






<?php get_footer(); ?>