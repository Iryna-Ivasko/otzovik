<?php
/**
 * Register Menus
 *
 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus#Examples
 */

register_nav_menus(array(
    'footer-menu-1' => 'First footer menu',
    'footer-menu-2' => 'Second footer menu',
    'footer-menu-3' => 'Third footer menu',
));

/**
 * Footer menu 1
 *
 * @link http://codex.wordpress.org/Function_Reference/wp_nav_menu
 */
if (!function_exists('footer_menu_1')) {
    function footer_menu_1()
    {
        wp_nav_menu(array(
            'container' => false,
            'menu_class' => 'footer-menu menu footer-menu-1',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'theme_location' => 'footer-menu-1',
            'fallback_cb' => false,
            'walker' => '',
        ));
    }
}
/**
 * Footer menu 2
 *
 * @link http://codex.wordpress.org/Function_Reference/wp_nav_menu
 */
if (!function_exists('footer_menu_2')) {
    function footer_menu_2()
    {
        wp_nav_menu(array(
            'container' => false,
            'menu_class' => 'footer-menu menu footer-menu-2',
            'items_wrap' => '<ul id="%1$s" class="%2$s ">%3$s</ul>',
            'theme_location' => 'footer-menu-2',
            'fallback_cb' => false,
            'walker' => '',
        ));
    }
}
/**
 * Footer menu 3
 *
 * @link http://codex.wordpress.org/Function_Reference/wp_nav_menu
 */
if (!function_exists('footer_menu_3')) {
    function footer_menu_3()
    {
        wp_nav_menu(array(
            'container' => false,
            'menu_class' => 'footer-menu menu footer-menu-3',
            'items_wrap' => '<ul id="%1$s" class="%2$s ">%3$s</ul>',
            'theme_location' => 'footer-menu-2',
            'fallback_cb' => false,
            'walker' => '',
        ));
    }
}


