<?php

function theme_add_woocommerce_support()
{
    add_theme_support('woocommerce');
}

add_action('after_setup_theme', 'theme_add_woocommerce_support');

// use tease.twig
remove_action(
    'woocommerce_after_single_product_summary',
    'woocommerce_output_related_products',
    20
);

// For some reason, products in the loop don’t get the right context by default.
function timber_set_product($post)
{
    global $product;

    if (is_woocommerce()) {
        $product = wc_get_product($post->ID);
    }
}
