<?php

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

// ---------------------------
//  Add ACF options page
// ---------------------------

if (function_exists('acf_add_options_page')) {
    $settingsPage = acf_add_options_page([
        'page_title' => 'Site General Settings',
        'menu_title' => 'Site Settings',
        'position' => '2.56',
        'menu_slug' => 'site-general-settings',
        'redirect' => true,
    ]);
}
