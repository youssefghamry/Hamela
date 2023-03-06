<?php
add_action('init', 'themesflat_register_services_post_type');
/**
  * Register project post type
*/
function themesflat_register_services_post_type() {
    $services_slug = get_theme_mod('services_slug','services');
    $labels = array(
        'name'                  => esc_html__( get_theme_mod('services_name','services'), 'dirtywash' ),
        'singular_name'         => esc_html__( 'Services', 'dirtywash' ),
        'menu_name'             => esc_html__( 'Services', 'dirtywash' ),
        'add_new'               => esc_html__( 'New Services', 'dirtywash' ),
        'add_new_item'          => esc_html__( 'Add New Services', 'dirtywash' ),
        'new_item'              => esc_html__( 'New Services Item', 'dirtywash' ),
        'edit_item'             => esc_html__( 'Edit Services Item', 'dirtywash' ),
        'view_item'             => esc_html__( 'View Services', 'dirtywash' ),
        'all_items'             => esc_html__( 'All Services', 'dirtywash' ),
        'search_items'          => esc_html__( 'Search Services', 'dirtywash' ),
        'not_found'             => esc_html__( 'No Services Items Found', 'dirtywash' ),
        'not_found_in_trash'    => esc_html__( 'No Services Items Found In Trash', 'dirtywash' ),
        'parent_item_colon'     => esc_html__( 'Parent Services:', 'dirtywash' ),
        'not_found'             => esc_html__( 'No Services found', 'dirtywash' ),
        'not_found_in_trash'    => esc_html__( 'No Services found in Trash', 'dirtywash' )

    );
    $args = array(
        'labels'      => $labels,
        'supports'    => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'elementor' ,'excerpt' ),
        'rewrite'       => array( 'slug' => $services_slug ),
        'public'      => true,   
        'show_in_rest' => true,  
        'has_archive' => true 
    );
    register_post_type( 'services', $args );
    flush_rewrite_rules();
}

add_filter( 'post_updated_messages', 'themesflat_services_updated_messages' );
/**
  * Services update messages.
*/
function themesflat_services_updated_messages ( $messages ) {
    Global $post, $post_ID;
    $messages[esc_html__( 'services' )] = array(
        0  => '',
        1  => sprintf( esc_html__( 'Services Updated. <a href="%s">View services</a>', 'dirtywash' ), esc_url( get_permalink( $post_ID ) ) ),
        2  => esc_html__( 'Custom Field Updated.', 'dirtywash' ),
        3  => esc_html__( 'Custom Field Deleted.', 'dirtywash' ),
        4  => esc_html__( 'Services Updated.', 'dirtywash' ),
        5  => isset( $_GET['revision']) ? sprintf( esc_html__( 'Services Restored To Revision From %s', 'dirtywash' ), wp_post_revision_title((int)$_GET['revision'], false)) : false,
        6  => sprintf( esc_html__( 'Services Published. <a href="%s">View Services</a>', 'dirtywash' ), esc_url( get_permalink( $post_ID ) ) ),
        7  => esc_html__( 'Services Saved.', 'dirtywash' ),
        8  => sprintf( esc_html__('Services Submitted. <a target="_blank" href="%s">Preview Services</a>', 'dirtywash' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
        9  => sprintf( esc_html__( 'Services Scheduled For: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Services</a>', 'dirtywash' ),date_i18n( esc_html__( 'M j, Y @ G:i', 'dirtywash' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
        10 => sprintf( esc_html__( 'Services Draft Updated. <a target="_blank" href="%s">Preview Services</a>', 'dirtywash' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
    );
    return $messages;
}

add_action( 'init', 'themesflat_register_services_taxonomy' );
/**
  * Register project taxonomy
*/
function themesflat_register_services_taxonomy() {
    /*Services Categories*/    
    $services_cat_slug = 'services_category'; 
    $labels = array(
        'name'                       => esc_html__( 'Services Categories', 'dirtywash' ),
        'singular_name'              => esc_html__( 'Categories', 'dirtywash' ),
        'search_items'               => esc_html__( 'Search Categories', 'dirtywash' ),
        'menu_name'                  => esc_html__( 'Categories', 'dirtywash' ),
        'all_items'                  => esc_html__( 'All Categories', 'dirtywash' ),
        'parent_item'                => esc_html__( 'Parent Categories', 'dirtywash' ),
        'parent_item_colon'          => esc_html__( 'Parent Categories:', 'dirtywash' ),
        'new_item_name'              => esc_html__( 'New Categories Name', 'dirtywash' ),
        'add_new_item'               => esc_html__( 'Add New Categories', 'dirtywash' ),
        'edit_item'                  => esc_html__( 'Edit Categories', 'dirtywash' ),
        'update_item'                => esc_html__( 'Update Categories', 'dirtywash' ),
        'add_or_remove_items'        => esc_html__( 'Add or remove Categories', 'dirtywash' ),
        'choose_from_most_used'      => esc_html__( 'Choose from the most used Categories', 'dirtywash' ),
        'not_found'                  => esc_html__( 'No Categories found.' ),
        'menu_name'                  => esc_html__( 'Categories' ),
    );
    $args = array(
        'labels'        => $labels,
        'rewrite'       => array('slug'=>$services_cat_slug),
        'hierarchical'  => true,
        'show_in_rest'  => true,
    );
    register_taxonomy( 'services_category', 'services', $args );
    flush_rewrite_rules();
}

