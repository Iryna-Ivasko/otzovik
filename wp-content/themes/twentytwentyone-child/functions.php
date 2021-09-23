<?php
// Faster then @import
add_action( 'wp_enqueue_scripts', 'twentytwentyone_theme_scripts' );
function twentytwentyone_theme_scripts() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}