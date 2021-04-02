<?php

function my_theme_enqueue_styles()
{
    // Google font => Montserrat
    wp_enqueue_style('Montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap');
    //slick CSS
    wp_enqueue_style('slick', get_template_directory_uri() . '/node_modules/slick-carousel/slick/slick.css',);
    wp_enqueue_style('slick-theme', get_template_directory_uri() . '/node_modules/slick-carousel/slick/slick-theme.css',);
    //href="styles/style.css?v=<?=  time()   ? >" => evite le cache du navigateur
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css', [], time());

    // Slick JS
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/node_modules/slick-carousel/slick/slick.min.js', [], false, true);

    // On integre le  JS de bootstrap
    // Le dernier parametre true permet de mettre la balise script dans le footer et non dans le body
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', [], false, true);
}

add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

// Ajout des images à la une
add_theme_support('post-thumbnails');

// Ajouter un emplacement de menu
register_nav_menu('main-menu', 'Menu Principal');

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );





