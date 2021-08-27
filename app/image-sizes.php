<?php

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

// ---------------------------
//  Image Sizes
// ---------------------------

// Add image sizes
// ---------------------------

add_image_size('banner_ad', 1088, 200, true);

// Name image sizes
// ---------------------------

function pd_custom_image_sizes($sizes) {
   return array_merge($sizes, [
       'Banner Ad' => __('Banner Ad - 1088px by 200px'),
   ]);
}
add_filter('image_size_names_choose', 'pd_custom_image_sizes');

function cc_mime_types($mimes) {
 $mimes['svg'] = 'image/svg+xml';
 return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
