<?php

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly


/**

** EVENTS

**/

add_filter( 'manage_event_posts_columns', 'ptf_filter_posts_columns' );
function ptf_filter_posts_columns( $columns ) {
  $columns = [
'cb' => $columns['cb'],
'title' => __( 'Title' ),
'year' => __( 'Festival Year' ),
'category' => __( 'Category' ),
];
  return $columns;
}


add_action( 'manage_event_posts_custom_column', 'ptf_event_column', 10, 2);
function ptf_event_column( $column, $post_id ) {
  // Image column
  if ( 'year' === $column ) {
    $term_list = get_the_terms( $post_id, 'event_year' );
    if ($term_list !== false) {
        foreach($term_list as $term_single) {
             echo $term_single->name;
        }
      } else {
        echo "-";
      }
    }
  if ( 'category' === $column ) {
    $term_list = get_the_terms( $post_id, 'event_category' );
    if ($term_list !== false) {
        foreach($term_list as $term_single) {
             echo $term_single->name;
        }
    } else {
        echo "-";
    }
  }
}
