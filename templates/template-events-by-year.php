<?php

    /*
    ** Template Name: Events by Year
    */

    if (!defined('ABSPATH')) {
        exit;
    } // Exit if accessed directly

    get_header();

    $context = Timber::context();
    $context['post'] = new TimberPost();

    $term = get_field('year');

    if (! $term ) {
        echo "Admin notice: select a year for this page.";
    } else {
        $year = $term->slug;

        // {# TODO: clean up query to avoid double query/loop #}
        $eventArgs = [
            'post_type' => 'event',
            'posts_per_page' => -1,
            'tax_query' => [
                'relation' => 'AND',
                [
                    'taxonomy' => 'event_year',
                    'field' => 'slug',
                    'terms' => [$year],
                ],
                [
                    'taxonomy' => 'event_category',
                    'field' => 'slug',
                    'terms' => 'headliner',
                ]
            ],
        ];

        $context['headliners'] = Timber::get_posts($eventArgs);

        $simpleQuery = [
            'relation' => 'AND',
            [
                'taxonomy' => 'event_year',
                'field' => 'slug',
                'terms' => [$year],
            ],
            [
                'taxonomy' => 'event_category',
                'field' => 'slug',
                'terms' => 'headliner',
                'operator' => 'NOT IN',
            ],
        ];

        $eventArgs['tax_query'] = $simpleQuery;

        $context['events'] = Timber::get_posts($eventArgs);
    }

    Timber::render('template-events-by-year.twig', $context);

    get_footer();
