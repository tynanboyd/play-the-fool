<?php

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

// ---------------------------
//  Taxonomies
// ---------------------------

/**
 * Registers `event_year` custom taxonomy.
 */
function register_event_year_taxonomy(): void
{
    register_taxonomy(
        'event_year',
        'event',
        [
            'hierarchical' => true,
            'public' => true,
            'labels' => [
                'name' => _x('Years', 'taxonomy general name', 'textdomain'),
                'singular_name' => _x('Year', 'taxonomy singular name', 'textdomain'),
                'search_items' => __('Search Years', 'textdomain'),
                'all_items' => __('All Years', 'textdomain'),
                'parent_item' => __('Parent Year', 'textdomain'),
                'parent_item_colon' => __('Parent Year:', 'textdomain'),
                'edit_item' => __('Edit Year', 'textdomain'),
                'update_item' => __('Update Year', 'textdomain'),
                'add_new_item' => __('Add New Year', 'textdomain'),
                'new_item_name' => __('New Year Name', 'textdomain'),
                'menu_name' => __('Years', 'textdomain'),
            ],
        ]
    );

    register_taxonomy(
        'event_category',
        'event',
        [
            'hierarchical' => false,
            'public' => true,
            'labels' => [
                'name' => _x('Categories', 'taxonomy general name', 'textdomain'),
                'singular_name' => _x('Category', 'taxonomy singular name', 'textdomain'),
                'search_items' => __('Search Categories', 'textdomain'),
                'all_items' => __('All Categories', 'textdomain'),
                'parent_item' => __('Parent Category', 'textdomain'),
                'parent_item_colon' => __('Parent Category:', 'textdomain'),
                'edit_item' => __('Edit Category', 'textdomain'),
                'update_item' => __('Update Category', 'textdomain'),
                'add_new_item' => __('Add New Category', 'textdomain'),
                'new_item_name' => __('New Category Name', 'textdomain'),
                'menu_name' => __('Categories', 'textdomain'),
            ],
        ]
    );
}
add_action('init', 'register_event_year_taxonomy');

// function story_taxonomy() {
//     /*
//     ** STORY TOPICS
//     */
//     $labels = array(
//         'name'                       => _x( 'Story Topics', 'Taxonomy General Name', 'textdomain' ),
//         'singular_name'              => _x( 'Story Topic', 'Taxonomy Singular Name', 'textdomain' ),
//         'menu_name'                  => __( 'Story Topics', 'textdomain' ),
//         'all_items'                  => __( 'All Topics', 'textdomain' ),
//         'parent_item'                => __( 'Parent Topic', 'textdomain' ),
//         'parent_item_colon'          => __( 'Parent Topic:', 'textdomain' ),
//         'new_item_name'              => __( 'New Topic Name', 'textdomain' ),
//         'add_new_item'               => __( 'Add New Topic', 'textdomain' ),
//         'edit_item'                  => __( 'Edit Topic', 'textdomain' ),
//         'update_item'                => __( 'Update Topic', 'textdomain' ),
//         'view_item'                  => __( 'View Topic', 'textdomain' ),
//         'separate_items_with_commas' => __( 'Separate topics with commas', 'textdomain' ),
//         'add_or_remove_items'        => __( 'Add or remove topics', 'textdomain' ),
//         'choose_from_most_used'      => __( 'Choose from the most used', 'textdomain' ),
//         'popular_items'              => __( 'Popular Topics', 'textdomain' ),
//         'search_items'               => __( 'Search Topics', 'textdomain' ),
//         'not_found'                  => __( 'Not Found', 'textdomain' ),
//         'no_terms'                   => __( 'No items', 'textdomain' ),
//         'items_list'                 => __( 'Items list', 'textdomain' ),
//         'items_list_navigation'      => __( 'Items list navigation', 'textdomain' ),
//     );
//     $args = array(
//         'labels'                     => $labels,
//         'hierarchical'               => true,
//         'public'                     => true,
//         'show_ui'                    => true,
//         'show_admin_column'          => true,
//         'show_in_nav_menus'          => true,
//         'show_tagcloud'              => true,
//         'show_in_rest' => true, // gutenberg support
//     );
//     register_taxonomy( 'event_category', ['event'] ), $args );
// }
