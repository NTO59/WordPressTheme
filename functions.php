<?php

function my_theme_enqueue_styles()
{
    //href="styles/style.css?v=<?=  time()   ? >" => evite le cache du navigateur
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css', [], time());

    // On integre le  JS de bootstrap
    // LE dernier parametre true permet de mettre la balise script dans le footer et non dans le body
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', [], false, true);
}

add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

// Ajout des image à la une
add_theme_support('post-thumbnails');





