<?php
add_action('wp_ajax_campaigns_filter', 'ii_campaigns_filter_function'); // wp_ajax_{ACTION HERE}
add_action('wp_ajax_nopriv_campaigns_filter', 'ii_campaigns_filter_function');

function ii_campaigns_filter_function()
{
    $paged = (isset($_POST['currentPage'])) ? $_POST['currentPage'] : 1;
    $args = array(
        'meta_key' => 'campaign_rating',
        'orderby' => 'meta_value_num',// we will sort campaigns by rating
        'order' => 'DESC',// ASC or DESC
        'post_status' => 'publish',// just published campaigns
        'showposts' => 12,
        'paged' => $paged
    );

    // for search
    if (isset($_POST['searchText']) & !empty($_POST['searchText']))
        $args += array(
            's' => esc_attr($_POST['searchText']),
        );

    // for taxonomies
    if (isset($_POST['category_filter']) & !empty($_POST['category_filter']))
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'campaign_scope',
                'field' => 'id',
                'terms' => $_POST['category_filter']
            )
        );

    $query = new WP_Query($args);

    if ($query->have_posts()) :?>
        <div class="campaigns">
            <?php while ($query->have_posts()): $query->the_post();
                $campaign_id = $query->post->ID; ?>
                <div class="campaigns__item">
                    <div class="item">
                        <a class="item__img js-campaign-link campaign-link" href="<?= $query->post->guid ?>">
                            <?php $image_id = get_post_thumbnail_id($query->post->ID);
                            if ($image_id): ?>
                                <?= wp_get_attachment_image($image_id, 'campaign-logo', '',
                                    array('class' => 'img',
                                        'title' => $query->post->post_title,)
                                );
                            endif; ?>
                        </a>
                        <div class="item__title">
                            <a class="js-campaign-link link" href="<?= $query->post->guid ?>">
                                <?= $query->post->post_title ?>
                            </a>
                        </div>
                        <?php if ($campaign_price = get_field('campaign_price', $campaign_id)): ?>
                            <div class="item__price">Starting at $ <?= str_replace('.', ",", $campaign_price); ?></div>
                        <?php endif; ?>
                        <?php if ($campaign_rating = get_field('campaign_rating', $campaign_id)): ?>
                            <div class="item__rating">
                                <div class="stars">
                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                        <?php if ($campaign_rating >= $i): ?>
                                            <img class="stars__item"
                                                 src="<?= get_stylesheet_directory_uri() . '/assets/img/star.svg' ?>"
                                                 alt="star">
                                        <?php else: ?>
                                            <img class="stars__item empty"
                                                 src="<?= get_stylesheet_directory_uri() . '/assets/img/empty-star.svg' ?>"
                                                 alt="empty star">
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                    <div class="stars__title">
                                        <?= number_format($campaign_rating, 1) . ' (' . rand(30, 150) . ')' ?>
                                    </div>
                                </div>
                            </div>

                        <?php endif; ?>

                    </div>
                </div>

            <?php endwhile; ?>
        </div>
        <div class="campaigns-pagination">
            <div class="paged">
                <?= ($paged < 10) ? '0' . $paged . ' / ' : $paged . ' / ' ?>
                <?= ($query->max_num_pages < 10) ? '0' . $query->max_num_pages : $query->max_num_pages ?>
            </div>
            <button type="button" class="pag-btn pag-btn--prev js-pag-btn" <?= ($paged == 1) ? 'disabled' : '' ?>
                    will-be-current="<?= ($paged > 1) ? $paged - 1 : false ?>"
                <?= ($paged > 1) ? '' : 'disabled' ?>>
            </button>
            <button type="button"
                    class="pag-btn pag-btn--next js-pag-btn" <?= ($paged >= $query->max_num_pages) ? 'disabled' : '' ?>
                    will-be-current="<?= ($paged >= $query->max_num_pages) ? false : $paged + 1 ?>"
                <?= ($paged >= $query->max_num_pages) ? 'disabled' : '' ?>>
            </button>
        </div>
        <?php wp_reset_postdata();
    else :?>
    <div class="no-found">Компаний не найдено</div>
    <?php endif;

    die();
}