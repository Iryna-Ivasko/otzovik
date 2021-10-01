<div class="js-toggle-filter toggle-filter show-for-small-only"><span class="title">Фильтр</span></div>
<form action="<?= site_url() ?>/wp-admin/admin-ajax.php" method="POST" class="js-filter filter">
    <div class="categories">
        <div class="categories__item">
            <input id="category-all" type="radio" name="category_filter" value="all_campaigns"
                   class="parent-category js-category-input" parent-title="Все сферы компаний" checked>
            <label for="category-all">Все сферы кампаний</label>
        </div>
        <?php $scope_terms = get_terms(
            "campaign_scope",
            [
                'orderby' => "slug",
                'parent' => 0,
                'hide_empty' => true,
            ]
        ); ?>

        <?php foreach ($scope_terms as $scope_key => $scope_term) : ?>
            <div class="categories__item">
                <input id="category-<?= $scope_term->term_id ?>"  type="radio" name="category_filter"
                       value="<?= $scope_term->term_id; ?>" parent-title="<?= $scope_term->name; ?>"
                       class="parent-category js-category-input">
                <label for="category-<?= $scope_term->term_id ?>"><?= $scope_term->name; ?></label>
            </div>
            <?php $type_terms = get_terms(
                "campaign_scope",
                [
                    'orderby' => "slug",
                    'parent' => $scope_term->term_id,
                    'hide_empty' => false,
                ]
            );
            if ($type_terms) :?>
                <div class="children">
                    <?php foreach ($type_terms as $type_key => $type_term) : ?>
                        <div class="categories__item">
                            <input id="category-<?= $type_term->term_id ?>" type="radio"
                                   name="category_filter"
                                   value="<?= $type_term->term_id ?>" parent-title="<?= $scope_term->name; ?>" children-title="<?= $type_term->name ?>"
                                   class="js-category-input">
                            <label for="category-<?= $type_term->term_id ?>"><?= $type_term->name ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif;
        endforeach; ?>
    </div>
    <input type="hidden" name="action" value="campaigns_filter">
</form>
