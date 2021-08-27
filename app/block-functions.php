<?php

/**
 * Filter the allowed blocks in the Gutenberg editor
 *
 * @param $allowed_blocks
 * @param $post
 * @return array
 */
function found_allowed_block_types($allowed_blocks, $post)
{

    $allowed_blocks = [
        'core/image',
        'core/audio',
        'core/buttons',
        'core/paragraph',
        // 'core/columns',
        'core/separator',
        'core/heading',
        'core/list',
        'core/html',
        'core/gallery',
        'core/quote',
        'core/pullquote',
        'core/file',
        'core/freeform', // classic editor
        'core-embed/youtube',
        'core-embed/vimeo',
        'gravityforms/form',
        'acf/advertisement',
    ];

    if ($post->post_type === 'page') {
        $allowed_blocks[] = 'acf/hero';
        $allowed_blocks[] = 'acf/blog-posts';
        $allowed_blocks[] = 'acf/newsletter-form';
        $allowed_blocks[] = 'acf/lightbox-gallery';
        $allowed_blocks[] = 'acf/event';
        $allowed_blocks[] = 'acf/staff';
        $allowed_blocks[] = 'acf/short-film';
        $allowed_blocks[] = 'acf/responsive-embed';
    }

    return $allowed_blocks;
}
add_filter( 'allowed_block_types', 'found_allowed_block_types', 10, 2 );

/**
 * Wrap core blocks with content-block and container/row/column divs
 *
 * @param $block_content
 * @param $block
 * @return string
 */
function wrap_core_blocks( $block_content, $block ) {
    $core_block = strpos($block['blockName'], 'core');
    $core_open = '<section class="content-block content-block--core"><div class="container"><div class="row"><div class="col-12 col-lg-10">';
    $core_close = '</div></div></div></section>';

    if ($core_block !== false) {
        $block_content = $core_open . $block_content . $core_close;
    }
    if ( null === $block['blockName'] && ! empty( $block_content ) && ! ctype_space( $block_content ) ) {
        $block_content = $core_open . $block_content . $core_close;
    }
    return $block_content;
}
add_filter( 'render_block', 'wrap_core_blocks', 10, 2 );
