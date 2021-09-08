<?php

$context = Timber::context();

$context['block'] = $block;
$context['is_preview'] = $is_preview;

// only query one post in the admin
if ($is_preview) {
    $postsPerPage = 1;
} else {
    $postsPerPage = -1;
}

$eventArgs = [
    'post_type' => 'event',
    'posts_per_page' => $postsPerPage,
    // 'meta_key'  => 'start_date',
    // 'orderby'   => 'meta_value_num',
    // 'order'     => 'DESC',
];

$taxQuery = [];

if( get_field('category') ) {
    // TODO: meta query by performance date
    $category = get_field('category');
    $taxQuery = [
        [
        'taxonomy' => 'event_category',
        'field' => 'term_id',
        'terms' => $category,
        ]
    ];
    $eventArgs['tax_query'] = $taxQuery;
    $context['events'] = Timber::get_posts($eventArgs);
}

if (function_exists('get_field')) {
    $context['fields'] = get_fields();
}
Timber::render('templates/template-parts/blocks/content-event-listing.twig', $context);
