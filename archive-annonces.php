<?php get_header(); ?>

<h1>Mes annonces</h1>

<div class="mb-4">
    <?php
    // Le hide empty affiche les villes même sans annonces
    //var_dump(get_terms('city', ['hide_empty' => false]))
    $cities = get_terms('city', ['hide_empty' => false]);

    foreach ($cities as $city) { ?>
        <button class="btn btn-primary filter-city" data-city=".<?=$city->slug?>"><?= $city->name ?></button>
    <?php } ?>

    <button class="btn btn-light filter-city" data-city="*">Voir tout</button>

</div>

<div class="row annonces">
    <?php while (have_posts()) : the_post(); ?>
        <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large')[0] ?? null; ?>
        <div class="col-lg-3 col-md-6 col-12 <?= get_the_terms($post->ID, 'city')[0]->slug ?> bg-dark">
       
            <div class="card  m-3 bg-dark">

                <img class="card-img-top" src="<?= $image; ?>" alt="<?php the_title(); ?>">

                <div class="card-body bg-dark">
                    <p class="mb-0">
                        <?= get_post_meta($post->ID, 'Baths', false)[0] ?? 0; ?> Baths - <?= get_post_meta($post->ID, 'Beds', false)[0] ?? 0 ?>Beds
                    </p>
                    <h5 class="card-title text-center ">
                        <?php the_title(); ?>
                    </h5>


                    <p class="mb-0">Price: $<?= number_format(get_post_meta($post->ID, 'Price', false)[0], 2); ?></p>
                    <?php
                    $stars = get_post_meta($post->ID, 'Note', true);


                    for ($i = 0; $i < 5; $i++) { ?>
                        <span class="star <?= ($i >= $stars) ?: 'green'; ?>">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z"></path>
                            </svg>
                        </span>
                    <?php } ?>



                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>

<?php get_footer(); ?>