<?php
/**
 * Displays the site header.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

$wrapper_classes = 'site-header';
$wrapper_classes .= has_custom_logo() ? ' has-logo' : '';
$wrapper_classes .= (true === get_theme_mod('display_title_and_tagline', true)) ? ' has-title-and-tagline' : '';
$wrapper_classes .= has_nav_menu('primary') ? ' has-menu' : '';
?>

<header id="masthead" class="<?php echo esc_attr($wrapper_classes); ?>" role="banner">

    <div class="site-header__content">
        <?php get_template_part('template-parts/header/site-logo'); ?>
        <?php get_template_part('template-parts/header/header-searchform'); ?>
        <?php get_template_part('template-parts/header/site-nav'); ?>
        <?php get_template_part('template-parts/header/site-login'); ?>
    </div>

</header><!-- #masthead -->
