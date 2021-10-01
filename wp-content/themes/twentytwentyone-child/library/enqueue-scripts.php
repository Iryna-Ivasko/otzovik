<?php
/**
 * Enqueue all styles and scripts
 *
 * Learn more about enqueue_script: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 * Learn more about enqueue_style: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_style }
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */


// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// BEGIN ENQUEUE PARENT ACTION

if (!function_exists('otzovic_theme_configurator_css')):
    function otzovic_theme_configurator_css()
    {
        wp_enqueue_style('main-css', trailingslashit(get_stylesheet_directory_uri()) . '/assets/css/app.css', array('twenty-twenty-one-style', 'twenty-twenty-one-style', 'twenty-twenty-one-print-style'));
        wp_enqueue_script('main-js', trailingslashit(get_stylesheet_directory_uri()) . '/assets/js/app.js', array('jquery'), '3.6.0', true);
    }

endif;
add_action('wp_enqueue_scripts', 'otzovic_theme_configurator_css', 10);

// END ENQUEUE PARENT ACTION

