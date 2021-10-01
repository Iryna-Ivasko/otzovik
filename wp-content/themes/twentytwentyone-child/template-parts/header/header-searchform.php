<?php
$twentytwentyone_unique_id = wp_unique_id('search-form-');

$twentytwentyone_aria_label = !empty($args['aria_label']) ? 'aria-label="' . esc_attr($args['aria_label']) . '"' : '';
?>
<form role="search" <?php echo $twentytwentyone_aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?>
      method="get" class="search-form search-form--header hide-for-small-only" action="<?php echo esc_url(home_url('/')); ?>">
    <input type="search" id="<?php echo esc_attr($twentytwentyone_unique_id); ?>" class="search-form__field"
           value="<?php echo get_search_query(); ?>" placeholder="search" name="s" required/>

    <button type="submit" class="search-form__submit" />
    <img src="<?= get_stylesheet_directory_uri().'/assets/img/search-min.png' ?>" alt="search" class="icon">
    </button>
</form>
