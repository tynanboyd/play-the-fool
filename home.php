<?php

    if (!defined('ABSPATH')) {
        exit;
    } // Exit if accessed directly

    global $paged;
    if (!isset($paged) || !$paged){
        $paged = 1;
    }

    get_header();

    $context = Timber::context();
    $context['post'] = new TimberPost();

    Timber::render('home.twig', $context);

    get_footer();
