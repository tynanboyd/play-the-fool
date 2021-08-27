<?php

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

// ---------------------------
//  Add ACF init callback
// ---------------------------

function my_acf_init() {
    if (!function_exists('acf_register_block_type')) {
        return;
    }

    register_custom_acf_blocks();
}

add_action('acf/init', 'my_acf_init');

// ---------------------------
//  Add ACF block fields
// ---------------------------

/**
 * Render Options:
 * .php - to render a .php file, use 'render_template' property and provide path to file - do not use render_callback
 * .twig - if ACF block just needs twig file, use 'render_callback' => 'acf_block_render_callback'
 *      refer to /app/timber.php for details on file naming specifics
 */
function register_custom_acf_blocks() {

    acf_register_block_type([
        'name' => 'hero',
        'title' => __('Hero Banner'),
        'description' => __('A block for adding a full-width image with a headline and button.'),
        'render_callback' => 'acf_block_render_callback',
        'category' => 'common',
        'icon' => 'money',
        'keywords' => ['hero', 'banner'],
        'mode' => 'auto',
        'post_types' => ['page'],
    ]);

    acf_register_block_type([
        'name' => 'blog-posts',
        'title' => __('Blog Posts'),
        'description' => __('A block for adding a grid of blog posts'),
        'render_callback' => 'acf_block_render_callback',
        'category' => 'common',
        'icon' => 'format-aside',
        'keywords' => ['blog', 'posts', 'news'],
        'mode' => 'auto',
        'post_types' => ['page'],
    ]);

    acf_register_block_type([
        'name' => 'newsletter-form',
        'title' => __('Newsletter Signup Form'),
        'description' => __('A block for adding the newsletter code'),
        'render_callback' => 'acf_block_render_callback',
        'category' => 'common',
        'icon' => 'format-aside',
        'keywords' => ['newsletter', 'mailchimp'],
        'mode' => 'auto',
        'post_ty1pes' => ['page'],
    ]);

    acf_register_block_type([
        'name' => 'lightbox-gallery',
        'title' => __('Lightbox Gallery'),
        'description' => __('A gallery with a lightbox'),
        'render_callback' => 'acf_block_render_callback',
        'category' => 'common',
        'icon' => 'images-alt',
        'keywords' => ['lightbox', 'gallery'],
        'mode' => 'auto',
        'post_types' => ['page'],
    ]);

    acf_register_block_type([
        'name' => 'advertisement',
        'title' => __('Advertisement'),
        'description' => __('A configurable image block for ads'),
        'render_callback' => 'acf_block_render_callback',
        'category' => 'common',
        'icon' => 'megaphone',
        'keywords' => ['ad', 'advertisement'],
        'mode' => 'auto',
        'post_types' => ['page'],
    ]);

    acf_register_block_type([
        'name' => 'event',
        'title' => __('Event'),
        'description' => __('Display all the content for one event'),
        'render_callback' => 'acf_block_render_callback',
        'category' => 'common',
        'icon' => 'tickets-alt',
        'keywords' => ['event'],
        'mode' => 'auto',
        'post_types' => ['page'],
    ]);

    acf_register_block_type([
        'name' => 'staff',
        'title' => __('Staff'),
        'description' => __('Display a headshot and bio'),
        'render_callback' => 'acf_block_render_callback',
        'category' => 'common',
        'icon' => 'admin-users',
        'keywords' => ['staff', 'bio'],
        'mode' => 'auto',
        'post_types' => ['page'],
    ]);

    acf_register_block_type([
        'name' => 'short-film',
        'title' => __('Short Film'),
        'description' => __('Display an embedded video and a title'),
        'render_callback' => 'acf_block_render_callback',
        'category' => 'common',
        'icon' => 'video-alt',
        'keywords' => ['short', 'film', 'embed'],
        'mode' => 'auto',
        'post_types' => ['page'],
    ]);

    acf_register_block_type([
        'name' => 'responsive-embed',
        'title' => __('Responsive Embed'),
        'description' => __('Display an full-width embedded video'),
        'render_callback' => 'acf_block_render_callback',
        'category' => 'common',
        'icon' => 'video-alt2',
        'keywords' => ['responsive', 'youtube', 'vimeo', 'video', 'embed'],
        'mode' => 'auto',
        'post_types' => ['page'],
    ]);
}
