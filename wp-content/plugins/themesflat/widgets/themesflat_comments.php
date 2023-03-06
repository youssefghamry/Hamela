<?php


// Exit if accessed directly
if (!defined('ABSPATH')) exit;

class TFL_Comments_Widget extends WP_Widget {

    /**
     * Sets up the widgets
     */
    function __construct() {

        // Set up the widget options.
        $widget_options = array(
            'classname'   => 'widget_recent_comments tfl_comments_widget',
            'description' => esc_html__('A custom recent comments widget with extra features.', 'themesflat'),
            'customize_selective_refresh' => true
        );

        // Control the width and height
        $control_options = array(
            'width' => 450
        );

        // Create the widget
        parent::__construct(
            'tfl-widget',                                                 // $this->id_base
            esc_html__('TFL Recent Comments', 'themesflat'), // $this->name
            $widget_options,                                              // $this->widget_options
            $control_options                                              // $this->control_options
        );
        $this->alt_option_name = 'tfl_widget';

        // Inline default style
        if (is_active_widget(false, false, $this->id_base)) {
            add_action('wp_head', array($this, 'tfl_style'));
        }

        // Flush cache
        add_action('comment_post', array($this, 'flush_widget_cache'));
        add_action('edit_comment', array($this, 'flush_widget_cache'));
        add_action('transition_comment_status', array($this, 'flush_widget_cache'));
    }

    /**
     * Default style
     */
    public function tfl_style() {
        /**
         * Filter the default widget styles.
         */
        if (!current_theme_supports('widgets') || !apply_filters('tfl_use_default_style', true, $this->id_base))
            return;
        ?>
        <style type="text/css">
            .tfl-li {
                overflow: hidden;
            }

            .tfl-avatar.rounded .avatar {
                border-radius: 50%;
            }

            .tfl-avatar.square .avatar {
                border-radius: 0;
            }

            .tfl-comment-excerpt {
                display: block;
                line-height: 1.2;
                margin-bottom: 8px;
            }
        </style>
        <?php
    }

    /**
     * Flush cache
     */
    public function flush_widget_cache() {
        wp_cache_delete('tfl_widget', 'widget');
    }



    /**
     * Sets up the default arguments.
     */
    function tfl_get_default_args() {

        $defaults = array(
            'title'         => esc_attr__('Recent Comments', 'themesflat'),
            'title_url'     => '',
            'post_type'     => 'post',
            'limit'         => 2,
            'offset'        => '',
            'order'         => 'DESC',
            'exclude_pings' => 0,
            'avatar'        => 0,
            'avatar_size'   => 55,
            'avatar_type'   => 'rounded',
            'excerpt'       => 0,
            'excerpt_limit' => 50,
            'css_class'     => '',
        );

        // Allow plugins/themes developer to filter the default arguments.
        return apply_filters('tfl_default_args', $defaults);
    }

    /**
     * Generates the recent comments markup.
     */
    function tfl_get_recent_comments($args, $id) {

        // Set up a default, empty variable.
        $html = '';

        // Merge the input arguments and the defaults.
        $args = wp_parse_args($args, $this->tfl_get_default_args());

        // Extract the array to allow easy use of variables.
        extract($args);

        // Allow devs to hook in stuff before the recent comments.
        do_action('tfl_before_loop_' . $id);

        // Recent comments query.
        $comments = $this->tfl_get_comments($args, $id);

        if (is_array($comments) && $comments) :

            if ($args['avatar']) {$args['css_class'] = 'has-avatars';}

            $html = '<ul class="tfl-ul ' . (!empty($args['css_class']) ? '' . sanitize_html_class($args['css_class']) . '' : '') . '">';

            foreach ($comments as $comment) :

                $html .= '<li class="recentcomments tfl-li">';

                if ($args['avatar']) :
                    $html .= '<a class="comment-link tfl-comment-link wrap-avatar" href="' . esc_url(get_comment_link($comment->comment_ID)) . '">';
                    $html .= '<span class="comment-avatar tfl-avatar ' . sanitize_html_class($args['avatar_type']) . '">' . get_avatar($comment->comment_author_email, $args['avatar_size']) . '</span>';
                    $html .= '</a>';
                endif;

                $html .= '<div class="tfl-comment-content">';

                $html .= '<span class="tfl-comment-title">';
                /* translators: comments widget: 1: comment author, 4: post link */
                $html .= '<a class="comment-link tfl-comment-link" href="' . esc_url(get_comment_link($comment->comment_ID)) . '">' . get_the_title($comment->comment_post_ID) . '</a>';
                $html .= '</span>';


                if ($args['excerpt']) :
                    $html .= '<span class="comment-excerpt tfl-comment-excerpt">' . wp_html_excerpt($comment->comment_content, absint($args['excerpt_limit']), '&hellip;') . '</span>';
                endif;

                $html .= '<span class="comment-author-link tfl-author-link"><i class="fas fa-user"></i>';
                $html .= get_comment_author_link($comment->comment_ID);
                $html .= '</span>';
                $html .= '</div>';

                $html .= '</li>';

            endforeach;

            $html .= '</ul>';

        endif;

        // Allow devs to hook in stuff after the recent comments.
        do_action('tfl_after_loop_' . $id);

        // Return the comments markup.
        return $html;
    }

    /**
     * The recent comments query.
     */
    function tfl_get_comments($args, $id) {

        // Arguments
        $query = array(
            'number'      => $args['limit'],
            'offset'      => $args['offset'],
            'order'       => $args['order'],
            'post_status' => 'publish',
            'post_type'   => $args['post_type'],
            'status'      => 'approve'
        );

        if ($args['exclude_pings'] == 1) {
            $query['type__not_in'] = array('pings');
        }

        // Allow plugins/themes developer to filter the default comment query.
        $query = apply_filters('tfl_comments_args_' . $id, $query);

        // Get the comments.
        $comments = get_comments($query);

        return $comments;
    }


    /**
     * Outputs the widget based on the arguments input through the widget controls
     */
    function widget($args, $instance) {
        extract($args);

        /**
         * Widget cache
         */
        $cache = array();
        if (!$this->is_preview()) {
            $cache = wp_cache_get('tfl_widget', 'widget');
        }
        if (!is_array($cache)) {
            $cache = array();
        }
        if (!isset($args['widget_id'])) {
            $args['widget_id'] = $this->id;
        }
        if (isset($cache[$args['widget_id']])) {
            echo $cache[$args['widget_id']];
            return;
        }

        // Get the recent comments.
        $comments = $this->tfl_get_recent_comments($instance, $this->id);

        // Check if comments exist
        if ($comments) {

            // Output the theme's $before_widget wrapper.
            echo $before_widget;

            // If both title and title url is not empty, display it.
            if (!empty($instance['title_url']) && !empty($instance['title'])) {
                echo $before_title . '<a href="' . esc_url($instance['title_url']) . '" title="' . esc_attr($instance['title']) . '">' . apply_filters('widget_title',  $instance['title'], $instance, $this->id_base) . '</a>' . $after_title;

                // If the title not empty, display it.
            } elseif (!empty($instance['title'])) {
                echo $before_title . apply_filters('widget_title',  $instance['title'], $instance, $this->id_base) . $after_title;
            }

            // Get the recent comments.
            echo $comments;

            // Close the theme's widget wrapper.
            echo $after_widget;
        }

        if (!$this->is_preview()) {
            $cache[$args['widget_id']] = $comments;
            wp_cache_set('tfl_widget', $cache, 'widget');
        }
    }

    /**
     * Updates the widget control options for the particular instance of the widget
     */
    function update($new_instance, $old_instance) {

        $instance                  = $old_instance;
        $instance['title']         = strip_tags($new_instance['title']);
        $instance['title_url']     = esc_url_raw($new_instance['title_url']);
        $instance['limit']         = (int)($new_instance['limit']);
        $instance['offset']        = (int)($new_instance['offset']);
        $instance['order']         = esc_attr($new_instance['order']);
        $instance['post_type']     = esc_attr($new_instance['post_type']);
        $instance['exclude_pings'] = isset($new_instance['exclude_pings']) ? (bool) $new_instance['exclude_pings'] : 0;
        $instance['avatar']        = isset($new_instance['avatar']) ? (bool) $new_instance['avatar'] : 0;
        $instance['avatar_size']   = (int)($new_instance['avatar_size']);
        $instance['avatar_type']   = esc_attr($new_instance['avatar_type']);
        $instance['excerpt']       = isset($new_instance['excerpt']) ? (bool) $new_instance['excerpt'] : false;
        $instance['excerpt_limit'] = (int)($new_instance['excerpt_limit']);
        $instance['css_class']     = sanitize_html_class($new_instance['css_class']);

        $this->flush_widget_cache();

        $alloptions = wp_cache_get('alloptions', 'options');
        if (isset($alloptions['tfl_widget'])) {
            delete_option('tfl_widget');
        }

        return $instance;
    }

    /**
     * Displays the widget control options in the Widgets admin screen.
     */
    function form($instance) {

        // Merge the user-selected arguments with the defaults.
        $instance = wp_parse_args((array) $instance, $this->tfl_get_default_args());

        // Extract the array to allow easy use of variables.
        extract($instance);

?>

        <div class="tfl-options">

            <div class="tfl-options__wrapper">

                <div class="tfl-options__option">
                    <p>
                        <label for="<?php echo $this->get_field_id('title'); ?>">
                            <?php esc_html_e('Title', 'themesflat'); ?>
                        </label>
                        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
                    </p>

                    <p>
                        <label for="<?php echo $this->get_field_id('title_url'); ?>">
                            <?php esc_html_e('Title URL', 'themesflat'); ?>
                        </label>
                        <input class="widefat" id="<?php echo $this->get_field_id('title_url'); ?>" name="<?php echo $this->get_field_name('title_url'); ?>" type="text" value="<?php echo esc_url($instance['title_url']); ?>" />
                    </p>

                    <p>
                        <label for="<?php echo $this->get_field_id('css_class'); ?>">
                            <?php esc_html_e('CSS Class', 'themesflat'); ?>
                        </label>
                        <input class="widefat" id="<?php echo $this->get_field_id('css_class'); ?>" name="<?php echo $this->get_field_name('css_class'); ?>" type="text" value="<?php echo sanitize_html_class($instance['css_class']); ?>" />
                    </p>

                </div>

                <div class="tfl-options__option">

                    <p>
                        <label for="<?php echo $this->get_field_id('post_type'); ?>">
                            <?php esc_html_e('Post Type', 'themesflat'); ?>
                        </label>
                        <select class="widefat" id="<?php echo $this->get_field_id('post_type'); ?>" name="<?php echo $this->get_field_name('post_type'); ?>">
                            <option value=""><?php esc_html_e('All', 'themesflat'); ?></option>
                            <?php foreach (get_post_types(array('public' => true), 'objects') as $post_type) { ?>
                                <option value="<?php echo esc_attr($post_type->name); ?>" <?php selected($instance['post_type'], $post_type->name); ?>><?php echo esc_html($post_type->labels->singular_name); ?></option>
                            <?php } ?>
                        </select>
                    </p>

                    <p>
                        <label for="<?php echo $this->get_field_id('limit'); ?>">
                            <?php esc_html_e('Number of comments to show', 'themesflat'); ?>
                        </label>
                        <input class="widefat" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" type="number" step="1" min="-1" value="<?php echo (int)($instance['limit']); ?>" />
                    </p>

                    <p>
                        <label for="<?php echo $this->get_field_id('offset'); ?>">
                            <?php esc_html_e('Offset', 'themesflat'); ?>
                        </label>
                        <input class="widefat" id="<?php echo $this->get_field_id('offset'); ?>" name="<?php echo $this->get_field_name('offset'); ?>" type="number" step="1" min="0" value="<?php echo (int)($instance['offset']); ?>" />
                        <small><?php esc_html_e('Number of comments to skip', 'themesflat'); ?></small>
                    </p>

                    <p>
                        <label for="<?php echo $this->get_field_id('order'); ?>">
                            <?php esc_html_e('Show', 'themesflat'); ?>
                        </label>
                        <select class="widefat" id="<?php echo $this->get_field_id('order'); ?>" name="<?php echo $this->get_field_name('order'); ?>" style="width:100%;">
                            <option value="DESC" <?php selected($instance['order'], 'DESC'); ?>><?php esc_html_e('Newer comments first', 'themesflat') ?></option>
                            <option value="ASC" <?php selected($instance['order'], 'ASC'); ?>><?php esc_html_e('Older comments first', 'themesflat') ?></option>
                        </select>
                    </p>

                    <p>
                        <input id="<?php echo $this->get_field_id('exclude_pings'); ?>" name="<?php echo $this->get_field_name('exclude_pings'); ?>" type="checkbox" <?php checked($instance['exclude_pings']); ?> />
                        <label for="<?php echo $this->get_field_id('exclude_pings'); ?>">
                            <?php esc_html_e('Exclude pingback and trackback', 'themesflat'); ?>
                        </label>
                    </p>

                </div>

                <div class="tfl-options__option">

                    <p>
                        <input class="checkbox" type="checkbox" <?php checked($instance['avatar'], 1); ?> id="<?php echo $this->get_field_id('avatar'); ?>" name="<?php echo $this->get_field_name('avatar'); ?>" />
                        <label for="<?php echo $this->get_field_id('avatar'); ?>">
                            <?php esc_html_e('Display Avatar', 'themesflat'); ?>
                        </label>
                    </p>

                    <p>
                        <label for="<?php echo $this->get_field_id('avatar_size'); ?>">
                            <?php esc_html_e('Avatar Size', 'themesflat'); ?>
                        </label>
                        <input class="widefat" id="<?php echo $this->get_field_id('avatar_size'); ?>" name="<?php echo $this->get_field_name('avatar_size'); ?>" type="number" step="1" min="-1" value="<?php echo (int)($instance['avatar_size']); ?>" />
                    </p>

                    <p>
                        <label for="<?php echo $this->get_field_id('avatar_type'); ?>">
                            <?php esc_html_e('Avatar Type', 'themesflat'); ?>
                        </label>
                        <select class="widefat" id="<?php echo $this->get_field_id('avatar_type'); ?>" name="<?php echo $this->get_field_name('avatar_type'); ?>" style="width:100%;">
                            <option value="rounded" <?php selected($instance['avatar_type'], 'rounded'); ?>><?php esc_html_e('Rounded', 'themesflat') ?></option>
                            <option value="square" <?php selected($instance['avatar_type'], 'square'); ?>><?php esc_html_e('Square', 'themesflat') ?></option>
                        </select>
                    </p>

                </div>

                <div class="tfl-options__option">

                    <p>
                        <input id="<?php echo $this->get_field_id('excerpt'); ?>" name="<?php echo $this->get_field_name('excerpt'); ?>" type="checkbox" <?php checked($instance['excerpt']); ?> />
                        <label for="<?php echo $this->get_field_id('excerpt'); ?>">
                            <?php esc_html_e('Display Comment Excerpt', 'themesflat'); ?>
                        </label>
                    </p>

                    <p>
                        <label for="<?php echo $this->get_field_id('excerpt_limit'); ?>">
                            <?php esc_html_e('Excerpt Length', 'themesflat'); ?>
                        </label>
                        <input class="widefat" id="<?php echo $this->get_field_id('excerpt_limit'); ?>" name="<?php echo $this->get_field_name('excerpt_limit'); ?>" type="number" step="1" min="0" value="<?php echo (int)($instance['excerpt_limit']); ?>" />
                    </p>

                </div>

            </div>

        </div><!-- .tfl-options -->

<?php


    }
}


add_action('widgets_init', function () {
    register_widget('TFL_Comments_Widget');
});