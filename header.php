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
        wp_title('-', true, 'right') ;?> <?php bloginfo('name');?>
    </title>

    
</head>
<body>
    <div class="container">

    