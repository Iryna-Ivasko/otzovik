<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
?>
<a class="site-logo" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
    <?php if (has_custom_logo()) : ?>
        <?php
        $custom_logo_id = get_theme_mod('custom_logo');
        $image = wp_get_attachment_image_src($custom_logo_id, 'full');
        ?>
        <img src="<?php echo $image[0] ?>" alt="<?php bloginfo('name'); ?>"/>
    <?php else : ?>
        <?php bloginfo('name'); ?>
    <?php endif ?>
</a>
<!-- .site-branding -->
