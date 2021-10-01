<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
</main><!-- #main -->
</div><!-- #primary -->
</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <?php if (has_nav_menu('footer')) : ?>
        <nav aria-label="<?php esc_attr_e('Secondary menu', 'twentytwentyone'); ?>"
             class="footer-navigation footer-navigation--icons">
            <ul class="footer-navigation-wrapper">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'footer',
                        'items_wrap' => '%3$s',
                        'container' => false,
                        'depth' => 1,
                        'link_before' => '<span>',
                        'link_after' => '</span>',
                        'fallback_cb' => false,
                    )
                );
                ?>
            </ul><!-- .footer-navigation-wrapper -->
        </nav><!-- .footer-navigation -->
    <?php endif; ?>
    <div class="row column">
        <div class="site-info">
            <div class="site-info__name">
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
                <div class="copyright info-text">
                    All rights reserved. © <?= date('Y') ?>
                </div>
            </div><!-- .site-name -->
            <div class="site-info__nav">
                <?php if (has_nav_menu('footer-menu-1')) : ?>
                    <nav aria-label="First menu" class="footer-navigation">
                        <?php $menu_1_title = wp_get_nav_menu_name("footer-menu-1" );
                        if ($menu_1_title): ?>
                            <div class="footer-title"><?= $menu_1_title ; ?></div>
                        <?php endif; ?>
                        <?php wp_nav_menu(array(
                            'theme_location' => 'footer-menu-1',
                            'container' => false,
                            'menu_class' => 'footer__menu menu',
                        )); ?>
                    </nav>
                <?php endif; ?>
                <?php if (has_nav_menu('footer-menu-2')) : ?>
                    <nav aria-label="Second menu" class="footer-navigation">
                        <?php $menu_2_title = wp_get_nav_menu_name("footer-menu-2" );
                        if ($menu_2_title): ?>
                            <div class="footer-title"><?= $menu_2_title ; ?></div>
                        <?php endif; ?>
                        <?php wp_nav_menu(array(
                            'theme_location' => 'footer-menu-2',
                            'container' => false,
                            'menu_class' => 'footer__menu menu',
                        )); ?>
                    </nav>
                <?php endif; ?>
                <?php if (has_nav_menu('footer-menu-3')) : ?>
                    <nav aria-label="Third menu" class="footer-navigation">
                        <?php $menu_3_title = wp_get_nav_menu_name("footer-menu-3" );
                        if ($menu_3_title): ?>
                            <div class="footer-title"><?= $menu_3_title ; ?></div>
                        <?php endif; ?>
                        <?php wp_nav_menu(array(
                            'theme_location' => 'footer-menu-3',
                            'container' => false,
                            'menu_class' => 'footer__menu menu',
                        )); ?>
                    </nav>
                <?php endif; ?>
            </div> <!-- .site-nav-->

            <div class="site-info__subscribe">
                <div class="footer-title">Subscribe</div>
                <?php get_template_part('template-parts/footer/subscribe-form'); ?>
                <div class="info-text">Depending on the company, a user experience designer may need to be a jack of all trades</div>
            </div><!-- .powered-by -->

        </div><!-- .site-info -->
    </div>
</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
