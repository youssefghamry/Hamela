<?php
add_action('init', 'themesflat_register_portfolio_post_type');
/**
 * Register project post type
 */
function themesflat_register_portfolio_post_type()
{
    /*Portfolios*/
    $portfolio_slug = get_theme_mod('portfolio_slug','portfolio');
    $labels = array(
        'name' => esc_html__( get_theme_mod('portfolio_name','portfolio'), 'dirtywash' ),
        'singular_name' => esc_html__('Portfolios', 'dirtywash'),
        'menu_name' => esc_html__('Portfolios', 'dirtywash'),
        'add_new' => esc_html__('New Portfolios', 'dirtywash'),
        'add_new_item' => esc_html__('Add New Portfolios', 'dirtywash'),
        'new_item' => esc_html__('New Portfolios Item', 'dirtywash'),
        'edit_item' => esc_html__('Edit Portfolios Item', 'dirtywash'),
        'view_item' => esc_html__('View Portfolios', 'dirtywash'),
        'all_items' => esc_html__('All Portfolios', 'dirtywash'),
        'search_items' => esc_html__('Search Portfolios', 'dirtywash'),
        'not_found' => esc_html__('No Portfolios Items Found', 'dirtywash'),
        'not_found_in_trash' => esc_html__('No Portfolios Items Found In Trash', 'dirtywash'),
        'parent_item_colon' => esc_html__('Parent Portfolios:', 'dirtywash')

    );
    $args = array(
        'labels' => $labels,
        'rewrite' => array('slug' => $portfolio_slug),
        'supports' => array('title', 'editor', 'thumbnail', 'comments', 'author', 'custom-fields', 'elementor'),
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true
    );
    register_post_type('portfolios', $args);
    flush_rewrite_rules();
}

add_filter('post_updated_messages', 'themesflat_portfolios_updated_messages');
/**
 * Portfolios update messages.
 */
function themesflat_portfolios_updated_messages($messages)
{
    global $post, $post_ID;
    $messages[esc_html__('portfolios')] = array(
        0 => '',
        1 => sprintf(esc_html__('Portfolios Updated. <a href="%s">View portfolios</a>', 'dirtywash'), esc_url(get_permalink($post_ID))),
        2 => esc_html__('Custom Field Updated.', 'dirtywash'),
        3 => esc_html__('Custom Field Deleted.', 'dirtywash'),
        4 => esc_html__('Portfolios Updated.', 'dirtywash'),
        5 => isset($_GET['revision']) ? sprintf(esc_html__('Portfolios Restored To Revision From %s', 'dirtywash'), wp_post_revision_title((int)$_GET['revision'], false)) : false,
        6 => sprintf(esc_html__('Portfolios Published. <a href="%s">View Portfolios</a>', 'dirtywash'), esc_url(get_permalink($post_ID))),
        7 => esc_html__('Portfolios Saved.', 'dirtywash'),
        8 => sprintf(esc_html__('Portfolios Submitted. <a target="_blank" href="%s">Preview Portfolios</a>', 'dirtywash'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
        9 => sprintf(esc_html__('Portfolios Scheduled For: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Portfolios</a>', 'dirtywash'), date_i18n(esc_html__('M j, Y @ G:i', 'dirtywash'), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
        10 => sprintf(esc_html__('Portfolios Draft Updated. <a target="_blank" href="%s">Preview Portfolios</a>', 'dirtywash'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
    );
    return $messages;
}

add_action('init', 'themesflat_register_portfolios_taxonomy');
/**
 * Register project taxonomy
 */
function themesflat_register_portfolios_taxonomy()
{
    /*Portfolios Categories*/
    $portfolio_cat_slug = 'portfolios_category';
    $labels = array(
        'name' => esc_html__('Portfolios Categories', 'dirtywash'),
        'singular_name' => esc_html__('Categories', 'dirtywash'),
        'search_items' => esc_html__('Search Categories', 'dirtywash'),
        'menu_name' => esc_html__('Categories', 'dirtywash'),
        'all_items' => esc_html__('All Categories', 'dirtywash'),
        'parent_item' => esc_html__('Parent Categories', 'dirtywash'),
        'parent_item_colon' => esc_html__('Parent Categories:', 'dirtywash'),
        'new_item_name' => esc_html__('New Categories Name', 'dirtywash'),
        'add_new_item' => esc_html__('Add New Categories', 'dirtywash'),
        'edit_item' => esc_html__('Edit Categories', 'dirtywash'),
        'update_item' => esc_html__('Update Categories', 'dirtywash'),
        'add_or_remove_items' => esc_html__('Add or remove Categories', 'dirtywash'),
        'choose_from_most_used' => esc_html__('Choose from the most used Categories', 'dirtywash'),
        'not_found' => esc_html__('No Categories found.'),
        'menu_name' => esc_html__('Categories'),
    );
    $args = array(
        'labels' => $labels,
        'rewrite' => array('slug' => $portfolio_cat_slug),
        'hierarchical' => true,
        'show_in_rest' => true,
    );
    register_taxonomy('portfolios_category', 'portfolios', $args);
    flush_rewrite_rules();
}

add_action('init', 'themesflat_register_portfolios_tag');
/**
 * Register tag taxonomy
 */
function themesflat_register_portfolios_tag()
{
    $portfolio_tag_slug = 'portfolios_tag';

    $labels = array(
        'name' => esc_html__('Portfolio Tags', 'dirtywash'),
        'singular_name' => esc_html__('Portfolio Tags', 'dirtywash'),
        'search_items' => esc_html__('Search Tags', 'dirtywash'),
        'all_items' => esc_html__('All Tags', 'dirtywash'),
        'new_item_name' => esc_html__('Add New Tag', 'dirtywash'),
        'add_new_item' => esc_html__('New Tag Name', 'dirtywash'),
        'edit_item' => esc_html__('Edit Tag', 'dirtywash'),
        'update_item' => esc_html__('Update Tag', 'dirtywash'),
        'menu_name' => esc_html__('Tags'),
    );
    $args = array(
        'labels' => $labels,
        'rewrite' => array('slug' => $portfolio_tag_slug),
        'hierarchical' => true,
        'show_in_rest' => true,
    );
    register_taxonomy('portfolios_tag', 'portfolios', $args);
    flush_rewrite_rules();
}
