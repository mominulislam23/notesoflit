<?php
function lifestyle_blog_enqueue_child_styles() {
    $parent_style = 'lifestyle-magazine-style';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style(
        'lifestyle-blog',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'bootstrap', $parent_style ),
        wp_get_theme()->get('Version') );


}
add_action( 'wp_enqueue_scripts', 'lifestyle_blog_enqueue_child_styles' );