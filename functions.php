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
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/node_modules/slick-carousel/slick/slick.min.js', [], false, true);

    // Isotope JS
    wp_enqueue_script('isotope', get_template_directory_uri() . '/node_modules/isotope-layout/dist/isotope.pkgd.min.js', [], false, true);


    // On integre le  JS de bootstrap
    // Le dernier parametre true permet de mettre la balise script dans le footer et non dans le body
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', [], false, true);

    // Notre script JS
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/script.js', ['jquery'], false, true);
}

add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

// Ajout des images à la une
add_theme_support('post-thumbnails');

// Ajouter un emplacement de menu
register_nav_menu('main-menu', 'Menu Principal');

// Ajout du logo
add_theme_support('custom-logo');

// Ajout sidebar pour le footer 
register_sidebar([
    'id' => 'footer-1',
    'name' => 'footer 1',
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>'
]);
register_sidebar(['id' => 'footer-2', 'name' => 'footer 2']);
register_sidebar(['id' => 'footer-3', 'name' => 'footer 3']);
register_sidebar(['id' => 'footer-4', 'name' => 'footer 4']);

/**
 * Register Custom Navigation Walker
 */
function register_navwalker()
{
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');


function register_my_cpt()
{


    register_post_type('project', [
        'label' => 'Projets',
        'labels' => [
            'name' => 'Projets',
            'singular_name' => 'Projet',
            'all_items' => 'Tous les projets',
            'add_new_item' => 'Ajouter un projet',
            'edit_item' => 'Éditer le projet',
            'new_item' => 'Nouveau projet',
            'view_item' => 'Voir le projet',
            'search_items' => 'Rechercher parmi les projets',
            'not_found' => 'Pas de projet trouvé',
            'not_found_in_trash' => 'Pas de projet dans la corbeille'
        ],
        'public' => true,
        'supports' => ['title', 'editor', 'author', 'thumbnail', 'custom-fields'],
        'has_archive' => true,
        'show_in_rest' => true, // Si on veut activer Gutenberg
        'menu_icon' => 'dashicons-portfolio'
    ]);

    register_post_type('annonces', [
        'label' => 'Annonces',
        'labels' => [
            'name' => 'Annonces',
            'singular_name' => 'Annonce',
            'all_items' => 'Toutes les annonces',
            'add_new_item' => 'Ajouter une annonce',
            'edit_item' => 'Éditer l\'annonce',
            'new_item' => 'Nouvelle annonce',
            'view_item' => 'Voir l\'annonce',
            'search_items' => 'Rechercher parmi les annonce',
            'not_found' => 'Pas d\'annonce trouvée',
            'not_found_in_trash' => 'Pas d\'annonce dans la corbeille'
        ],
        'public' => true,
        'supports' => ['title', 'editor', 'author', 'thumbnail', 'custom-fields'],
        'has_archive' => true,
        'show_in_rest' => true, // Si on veut activer Gutenberg
        'menu_icon' => 'dashicons-format-chat'
    ]);

    register_taxonomy('property-type', 'annonces', [

        'labels' => [
            'name' => 'Types',
            'singular_name' => 'Type',
            'all_items' => 'Tous les types',
            'edit_item' => 'Éditer le type',
            'view_item' => 'Voir le type',
            'update_item' => 'Mettre à jour le type',
            'add_new_item' => 'Ajouter un type',
            'new_item_name' => 'Nouveau type',
            'search_items' => 'Rechercher parmi les types',
            'popular_items' => 'Types les plus utilisés'
        ],
        'hierarchical' => true,
        'show_in_rest' => true, // Pour Gutenberg
    ]);

    //les villes
    register_taxonomy('city', 'annonces', [
        'labels' => [
            'name' => 'Villes',
            'singular_name' => 'Villes',
            'all_items' => 'Toutes les villes',
            'edit_item' => 'Éditer la ville',
            'view_item' => 'Voir la ville',
            'update_item' => 'Mettre à jour la ville',
            'add_new_item' => 'Ajouter une ville',
            'new_item_name' => 'Nouvelle ville',
            'search_items' => 'Rechercher parmi les villes',
            'popular_items' => 'Villes les plus utilisés'
        ],
        'hierarchical' => true,
        'show_in_rest' => true, // Pour Gutenberg
    ]);
}

add_action('init', 'register_my_cpt');


/**
 * Annonces immo
 *
 * - Créer un nouveau custom post type pour les annonces immo
 * - Créer quelques annonces immo (https://workcation.netlify.app/)
 * - Intégrer la page d'archives des annonces immo (Pas de tri par ville mais toutes les annonces pour l'instant)
 * - On a 4 champs customs: Bed, Bath, Price et Note.
 * - Bonus et idéalement: on créera une taxonomy Type pour ranger chaque annonce dans son type de bien
 *   Studio, T2, T3, T4, Maison... Ce qui apparaitra à la place du PLUS sur la maquette.
 */
