<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>"> -->


    <?php
    // Ajoute les CSS de WordPress et des plugins
    wp_head(); ?>


    <title>
        <?php
        // Sur l'accueil: Agence Plaza
        //Sur A propos : A propos - Agence Plaza
        //Sur Demande de devis : Demande de devis - Agence Plaza
        wp_title('-', true, 'right') . bloginfo('name'); ?>
    </title>


</head>

<body>
    <!-- type de page actuelle  <h1><?php echo get_post_type(); ?></h1> -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= home_url();?>">
                <?php bloginfo('name'); ?>
                <span class="site-description"> <?php bloginfo('description'); ?> </span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php
            // On affiche le menu attaché à l'emplacement 'main-menu'
            wp_nav_menu([
                'theme_location' => 'main-menu',
                'depth' => 2, // profondeur du menu
                'container' => false, // On supprime la div générée par WP
                'container_class' => 'collapse navbar-collapse',
                'container_id' => 'navbarSupportedContent',
                'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0',
                'walker' => new WP_Bootstrap_Navwalker()
            ]); ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
            </div>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <div class="container">