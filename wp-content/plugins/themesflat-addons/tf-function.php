<?php
if (!function_exists('tf_header_enabled')) {
    function tf_header_enabled()
    {
        $header_id = ThemesFlat_Addons::get_settings('type_header', '');
        $status = false;

        if ('' !== $header_id) {
            $status = true;
        }

        return apply_filters('tf_header_enabled', $status);
    }
}

if (!function_exists('tf_footer_enabled')) {
    function tf_footer_enabled()
    {
        $header_id = ThemesFlat_Addons::get_settings('type_footer', '');
        $status = false;

        if ('' !== $header_id) {
            $status = true;
        }

        return apply_filters('tf_footer_enabled', $status);
    }
}

if (!function_exists('get_header_content')) {
    function get_header_content()
    {
        $tf_get_header_id = ThemesFlat_Addons::tf_get_header_id();
        $frontend = new \Elementor\Frontend;
        echo $frontend->get_builder_content_for_display($tf_get_header_id);
    }
}

function tfl_get_template_part($template_name, $args = null, $return = false)
{
    $template_file = $template_name . '.php';
    $default_folder = plugin_dir_path(__FILE__) . 'templates/';
    // Allow the user to place the templates in a different folder than the default addons-for-elementor/ folder
    $theme_folder = apply_filters('tfl_templates_folder', dirname(plugin_basename(__FILE__)));
    /* Look for the file in the theme */
    $template = locate_template($theme_folder . '/' . $template_file);
    if (!$template) {
        $template = $default_folder . $template_file;
    }
    if ($args && is_array($args)) {
        extract($args);
    }
    if ($return) {
        ob_start();
    }
    if (file_exists($template)) {
        include $template;
    }
    if ($return) {
        return ob_get_clean();
    }
    return null;
}

/**
 * Get Post Categories
 */
if (!function_exists('tfl_get_categories_id')) {
    function tfl_get_categories_id($taxonomy)
    {


        $terms = get_terms(array(
            'taxonomy' => $taxonomy,
            'hide_empty' => true,
        ));
        $options = array();
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $options[$term->term_id] = $term->name;
            }
        }
//        var_dump($options);
        return $options;
    }
}


/**
 * Get Post Categories
 */
if (!function_exists('tfl_get_categories')) {
    function tfl_get_categories($taxonomy)
    {
        $terms = get_terms(array(
            'taxonomy' => $taxonomy,
            'hide_empty' => true,
        ));
        $options = array();
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $options[$term->slug] = $term->name;
            }
        }
        return $options;
    }
}

/*
 * All Post Name
 * return array
 */
if (!function_exists('tfl_get_all_posts')) {
    function tfl_get_all_posts($post_type = 'post')
    {
        $options = array();
        $options = ['0' => esc_html__('None', 'papr-elements')];
        $tfl_post = array('posts_per_page' => -1, 'post_type' => $post_type);
        $tfl_post_terms = get_posts($tfl_post);
        if (!empty($tfl_post_terms) && !is_wp_error($tfl_post_terms)) {
            foreach ($tfl_post_terms as $term) {
                $options[$term->ID] = $term->post_title;
            }
            return $options;
        }
    }
}

/**
 * Get all types of post.
 */
if (!function_exists('tfl_get_all_types_post')) {
    function tfl_get_all_types_post($post_type)
    {
        $posts_args = get_posts(array(
            'post_type' => $post_type,
            'orderby' => 'date',
            'order' => 'DESC',
            'post_status' => 'publish',
            'posts_per_page' => -1,
        ));

        $posts = array();

        if (!empty($posts_args) && !is_wp_error($posts_args)) {
            foreach ($posts_args as $post) {
                $posts[$post->ID] = $post->post_title;
            }
        }

        return $posts;
    }
}


/**
 * Post Orderby Options
 */
if (!function_exists('tfl_get_orderby_options')) {
    function tfl_get_orderby_options()
    {
        $orderby = array(
            'ID' => 'Post ID',
            'author' => 'Post Author',
            'title' => 'Title',
            'date' => 'Date',
            'modified' => 'Last Modified Date',
            'parent' => 'Parent Id',
            'rand' => 'Random',
            'comment_count' => 'Comment Count',
            'menu_order' => 'Menu Order',
        );
        return $orderby;
    }
}


function tfl_get_query_args($posttype, $taxonomy, $settings)
{

    if (get_query_var('paged')) {
        $paged = get_query_var('paged');
    } else if (get_query_var('page')) {
        $paged = get_query_var('page');
    } else {
        $paged = 1;
    }

    $category_list = '';
    if (!empty($settings['category'])) {
        $category_list = implode(", ", $settings['category']);
    }
    $category_list_value = explode(" ", $category_list);


    $exclude_category_list = '';
    if (!empty($settings['exclude_category'])) {
        $exclude_category_list = implode(", ", $settings['exclude_category']);
    }
    $exclude_category_list_value = explode(" ", $exclude_category_list);


    $posts_per_page = (!empty($settings['posts_per_page'])) ? $settings['posts_per_page'] : '-1';
    $orderby = (!empty($settings['orderby'])) ? $settings['orderby'] : 'post_date';
    $order = (!empty($settings['order'])) ? $settings['order'] : 'desc';
    $offset_value = (!empty($settings['offset'])) ? $settings['offset'] : '0';


    // number
    $off = (!empty($offset_value)) ? $offset_value : 0;
    $offset = $off + (($paged - 1) * $posts_per_page);
    $p_ids = array();


    // Post in
    $post_in = $settings['post__in'];
    if ($post_in >= 1 && !empty($post_in)) {
        $post_in_ids = implode(', ', $post_in);
    } else {
        $post_in_ids = '';
    }
    $in_posts = explode(',', $post_in_ids);

    $args = array(
        'post_type' => $posttype,
        'post_status' => 'publish',
        'posts_per_page' => $posts_per_page,
        'orderby' => $orderby,
        'order' => $order,
        'offset' => $offset,
        'paged' => $paged,
        'category__not_in' => $exclude_category_list_value,
    );

    // ignore_sticky_posts and manually Exclude
    $sticky = get_option('sticky_posts');
    if (!empty($settings['ignore_sticky_posts']) && $settings['ignore_sticky_posts'] == 'yes') {
        $args['ignore_sticky_posts'] = 1;

        if (!empty($settings['post__not_in'])) {
            $post__not_in = $settings['post__not_in'];
            $posts_not_in = array_merge($post__not_in, $sticky);
            $args['post__not_in'] = $posts_not_in;
        } else {
            $args['post__not_in'] = $sticky;
        }

    } else {
        if (!empty($settings['post__not_in'])) {
            $post__not_in = $settings['post__not_in'];
            $args['post__not_in'] = $post__not_in;
        }
    }

    // show_sticky_posts and manually Exclude
    if (!empty($settings['show_only_sticky_posts']) && $settings['show_only_sticky_posts'] == 'yes') {
        $args['ignore_sticky_posts'] = 1;
        // post__in
        if ("0" != $in_posts && !empty($settings['post__in'])) {
            $posts_in = array_merge($in_posts, $sticky);
            $args['post__in'] = $posts_in;
        } else {
            $args['post__in'] = $sticky;
        }
    } else {
        // post__in
        if ("0" != $in_posts && !empty($settings['post__in'])) {
            $args['post__in'] = $in_posts;
        }
    }


    if (!empty($settings['category'])) {
        $args['tax_query'][] = [
            'taxonomy' => $taxonomy,
            'field' => 'slug',
            'terms' => $category_list_value,
        ];
    }


    if (!empty($exclude_category_list_value) && ($posttype != 'post')) {
        $args['tax_query'][] = [
            'taxonomy' => $taxonomy,
            'terms' => $exclude_category_list_value,
            'field' => 'id',
            'operator' => 'NOT IN',
        ];
    }

    return $args;
}