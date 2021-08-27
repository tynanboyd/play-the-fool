<?php

    if (!defined('ABSPATH')) {
        exit;
    } // Exit if accessed directly

    get_header();

$templates = [ 'search.twig', 'archive.twig', 'index.twig' ];

$context          = Timber::context();
$context['title'] = 'You searched for ' . get_search_query();
$context['posts'] = new Timber\PostQuery();

Timber::render( $templates, $context );

get_footer();
