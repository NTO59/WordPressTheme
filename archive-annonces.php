<?php get_header(); ?>

<h1>Mes annonces</h1>
<div class="row annonces ">
    <?php while (have_posts()) : the_post(); ?>
        <div class="col-lg-3 col-md-6 col-12 bg-dark">
            <div class="card  m-3 bg-dark">
                <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large')[0] ?? null; ?>

                <img class="card-img-top" src="<?= $image; ?>" alt="<?php the_title(); ?>">

                <div class="card-body bg-dark">
                    <p class="mb-0">
                        <?= get_post_meta($post->ID, 'Baths', true); ?> Baths . <?= get_post_meta($post->ID, 'Beds', true) ?>Beds
                    </p>
                    <h5 class="card-title text-center ">
                        <?php the_title(); ?>
                    </h5>


                    <p class="mb-0">Price: <?= get_post_meta($post->ID, 'Price', true); ?></p>
                    <?php
                    $stars = get_post_meta($post->ID, 'Note', true);

                    if ($stars != 0) {
                        for ($i = 0; $i < 5; $i++) {
                            if ($i < $stars) {
                                echo '<span mb-0>★</span>';
                            } else {
                                echo '<span mb-0>☆</span>';
                            }
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>

<?php get_footer(); ?>