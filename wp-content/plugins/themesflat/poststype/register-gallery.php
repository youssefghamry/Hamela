<?php
add_action('init', 'themesflat_register_gallery_post_type');
/**
  * Register gallery post type
*/
function themesflat_register_gallery_post_type() {
    $gallery_slug = 'gallery';

    $labels = array(
        'name'               => esc_html__( 'Gallery', 'dirtywash' ),
        'singular_name'      => esc_html__( 'Gallery Item', 'dirtywash' ),
        'add_new'            => esc_html__( 'Add New', 'dirtywash' ),
        'add_new_item'       => esc_html__( 'Add New Item', 'dirtywash' ),
        'new_item'           => esc_html__( 'New Item', 'dirtywash' ),
        'edit_item'          => esc_html__( 'Edit Item', 'dirtywash' ),
        'view_item'          => esc_html__( 'View Item', 'dirtywash' ),
        'all_items'          => esc_html__( 'All Items', 'dirtywash' ),
        'search_items'       => esc_html__( 'Search Items', 'dirtywash' ),
        'parent_item_colon'  => esc_html__( 'Parent Items:', 'dirtywash' ),
        'not_found'          => esc_html__( 'No items found.', 'dirtywash' ),
        'not_found_in_trash' => esc_html__( 'No items found in Trash.', 'dirtywash' )
    );

    $args = array(
        'labels'        => $labels,
        'rewrite'       => array( 'slug' => $gallery_slug ),
        'supports'      => array( 'title', 'thumbnail'  ),
        'public'        => true
    );

    register_post_type( 'gallery', $args );
}

add_filter( 'post_updated_messages', 'themesflat_gallery_updated_messages' );
/**
  * gallery update messages.
*/
function themesflat_gallery_updated_messages( $messages ) {
    $post             = get_post();
    $post_type        = get_post_type( $post );
    $post_type_object = get_post_type_object( $post_type );

    $messages['gallery'] = array(
        0  => '', // Unused. Messages start at index 1.
        1  => esc_html__( 'Gallery updated.', 'dirtywash' ),
        2  => esc_html__( 'Custom field updated.', 'dirtywash' ),
        3  => esc_html__( 'Custom field deleted.', 'dirtywash' ),
        4  => esc_html__( 'Gallery updated.', 'dirtywash' ),
        5  => isset( $_GET['revision'] ) ? sprintf( esc_html__( 'Gallery restored to revision from %s', 'dirtywash' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6  => esc_html__( 'Gallery published.', 'dirtywash' ),
        7  => esc_html__( 'Gallery saved.', 'dirtywash' ),
        8  => esc_html__( 'Gallery submitted.', 'dirtywash' ),
        9  => sprintf(
            esc_html__( 'Gallery scheduled for: <strong>%1$s</strong>.', 'dirtywash' ),
            date_i18n( esc_html__( 'M j, Y @ G:i', 'dirtywash' ), strtotime( $post->post_date ) )
        ),
        10 => esc_html__( 'Gallery draft updated.', 'dirtywash' )
    );
    return $messages;
}

add_action( 'init', 'themesflat_register_gallery_taxonomy' );
/**
  * Register gallery taxonomy
*/
function themesflat_register_gallery_taxonomy() {
    $cat_slug = 'gallery_category';

    $labels = array(
        'name'                       => esc_html__( 'Gallery Categories', 'dirtywash' ),
        'singular_name'              => esc_html__( 'Category', 'dirtywash' ),
        'search_items'               => esc_html__( 'Search Categories', 'dirtywash' ),
        'menu_name'                  => esc_html__( 'Categories', 'dirtywash' ),
        'all_items'                  => esc_html__( 'All Categories', 'dirtywash' ),
        'parent_item'                => esc_html__( 'Parent Category', 'dirtywash' ),
        'parent_item_colon'          => esc_html__( 'Parent Category:', 'dirtywash' ),
        'new_item_name'              => esc_html__( 'New Category Name', 'dirtywash' ),
        'add_new_item'               => esc_html__( 'Add New Category', 'dirtywash' ),
        'edit_item'                  => esc_html__( 'Edit Category', 'dirtywash' ),
        'update_item'                => esc_html__( 'Update Category', 'dirtywash' ),
        'add_or_remove_items'        => esc_html__( 'Add or remove categories', 'dirtywash' ),
        'choose_from_most_used'      => esc_html__( 'Choose from the most used categories', 'dirtywash' ),
        'not_found'                  => esc_html__( 'No Category found.', 'dirtywash' ),
        'menu_name'                  => esc_html__( 'Categories', 'dirtywash' ),
    );
    $args = array(
        'labels'        => $labels,
        'rewrite'       => array('slug'=>$cat_slug),
        'hierarchical'  => true,
    );
    register_taxonomy( 'gallery_category', 'gallery', $args );
}