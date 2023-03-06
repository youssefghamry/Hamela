<?php 
if(!function_exists('flat_get_post_page_content')){
    function flat_get_post_page_content( $slug ) {
        $content_post = get_posts(array(
            'name' => $slug,
            'posts_per_page' => 1,
            'post_type' => 'elementor_library',
            'post_status' => 'publish'
        ));
        if (array_key_exists(0, $content_post) == true) {
            $id = $content_post[0]->ID;
            return $id;
        }
    }
}

