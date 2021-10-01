<?php
/** Register new taxonomy "" for cpt "Campaigns" */
add_action( 'init', 'create_campaigns_taxonomies' );

function create_campaigns_taxonomies()
{

    register_taxonomy('campaign_scope', array('campaigns'), array(
        'hierarchical' => true,
        'labels' => array(
            'name' => _x('Company scopes', 'taxonomy general name'),
            'singular_name' => _x('company scope', 'taxonomy singular name'),
            'search_items' => __('Search company scope'),
            'all_items' => __('All company scopes'),
            'parent_item' => __('Parent company scope'),
            'parent_item_colon' => __('Parent company scope:'),
            'edit_item' => __('Edit company scope'),
            'update_item' => __('Update company scope'),
            'add_new_item' => __('Add New company scopes'),
            'new_item_name' => __('New company scope Name'),
            'menu_name' => __('Company scopes'),
        ),
        'show_ui' => true,
        'query_var' => true,
    ));
};

/** Register new post type "Campaigns" */

add_action('init', 'campaigns_cpt_init');
function campaigns_cpt_init(){
    register_post_type('campaigns', array(
        'labels'             => array(
            'name'               => 'Companies',
            'singular_name'      => 'Company',
            'add_new'            => 'Add new',
            'add_new_item'       => 'Add new company',
            'edit_item'          => 'Edit company',
            'new_item'           => 'New  company',
            'view_item'          => 'View  company',
            'search_items'       => 'Find  company',
            'not_found'          => 'No companies found',
            'not_found_in_trash' => 'No companies found in the basket',
            'parent_item_colon'  => '',
            'menu_name'          => 'Companies'

        ),

        'menu_icon'             => 'dashicons-admin-multisite',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title','editor','author','thumbnail','comments')
    ) );
}