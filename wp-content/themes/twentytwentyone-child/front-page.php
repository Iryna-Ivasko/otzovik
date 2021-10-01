<?php get_header();
while (have_posts()) : the_post();

    $top_banner_sub_title = get_field('top_banner_sub_title');
    $top_banner_description = get_field('top_banner_description');
    $top_banner_image = get_field('top_banner_image');
    $top_banner_image_url = $top_banner_image['sizes']['top-bar-image'];
    if ($top_banner_sub_title && $top_banner_image_url): ?>
        <section class="section section--top-banner">
            <div class="row align-middle  align-center">
                <div class="column small-8 medium-5 large-6">
                    <?php if ($top_banner_image_url): ?>
                        <div class="img-wrap">
                            <img class="img " src="<?= $top_banner_image_url; ?>"
                                 alt="top banner image">
                        </div>
                    <?php endif; ?>
                </div>
                <div class="column small-12 medium-7 large-6">
                    <?php if ($top_banner_sub_title || $top_banner_description): ?>
                        <div class="text-wrap">
                            <?php if ($top_banner_sub_title): ?>
                                <h1 class="section__title"><strong><?= $top_banner_sub_title ?></strong></h1>
                            <?php endif; ?>
                            <?php if ($top_banner_description): ?>
                                <div class="section__description"><?= $top_banner_description ?></div>
                            <?php endif; ?>
                            <a href="javascript:void(0)" class="add-company">Добавить</a>
                        </div>
                    <?php endif; ?>
                    <?php get_template_part('template-parts/campaigns/campaigns-search-form') ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <section class="section section--campaigns">
        <div class="row column">
            <div class="campaigns-wrapper js-campaigns-wrapper">
                <?php get_template_part('template-parts/campaigns/campaigns-breadcrumb') ?>
                <?php get_template_part('template-parts/campaigns/campaigns-tax-filter') ?>
                <div class="response-wrapper">
                    <span class="js-spinner spinner"></span>
                    <div class="js-response"></div>
                </div>
            </div>
        </div>
    </section>
<?php endwhile;
get_footer(); ?>