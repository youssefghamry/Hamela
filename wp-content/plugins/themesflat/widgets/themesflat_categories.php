<?php

class Themesflat_Categories extends WP_Widget
{
    /**
     * Holds widget settings defaults, populated in constructor.
     *
     * @var array
     */
    protected $defaults;

    /**
     * Constructor
     *
     * @return Themesflat_Categories
     */
    function __construct()
    {
        $this->defaults = array(
            'title' => 'Categories',
            'count' => 10,
            'custom_ids' => '',
            'child_of' => 'false',
            'show_count' => 0,
            'show_more' => 0
        );


        parent::__construct(
            'widget_categories',
            esc_html__('Themesflat - Categories', 'dirtywash'),
            array(
                'classname' => 'tfl_widget_categories',
                'description' => esc_html__('Categories.', 'dirtywash')
            )
        );
    }

    /**
     * Display widget
     */
    function widget($args, $instance)
    {


        $instance = wp_parse_args($instance, $this->defaults);
        extract($instance);
        extract($args);

        if ($instance['show_more']) {
            $before_widget = str_replace("tfl_widget_categories", "tfl_widget_categories has-show-more", $before_widget);
        }

        echo wp_kses_post($before_widget);
        if (!empty($title)) echo wp_kses_post($before_title) . esc_html($title) . wp_kses_post($after_title); ?>
        <div class="tfl-categories">

            <ul>
                <?php if ($custom_ids != '') {
                    $categories_ids = explode(',', $custom_ids);
                    foreach ($categories_ids as $id) {
                        if (get_term_by('id', $id, 'category') == true) {
                            $term = (get_term_by('id', $id, 'category'));
                            printf('<li class="cat-item cat-item-%1$d"><a href="%2$s">%3$s</a></li>', $id, esc_url(get_term_link($term)), esc_attr($term->name));
                        }
                    }
                } else {
                    wp_list_categories('show_count=' . (bool)($show_count) . '&number=' . intval($count) . '&title_li=&child_of=' . intval($child_of) . '&include=' . esc_attr($custom_ids));
                }
                ?>
            </ul><!--/.tags -->

        </div>
        <?php
//         var_dump($show_more);
        if ($show_more != 0): ?>
            <hr>
            <div class="load-more-cats"><i class="fas fa-plus"></i><span
                        class="more"><?php esc_html_e('More Categories', 'tfl'); ?></span><span
                        class="less"><?php esc_html_e('Show Less', 'tfl'); ?></span></div>
        <?php endif; ?>

        <?php echo wp_kses_post($after_widget);
    }

    /**
     * Update widget
     */
    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['custom_ids'] = ($new_instance['custom_ids']);
        $instance['count'] = intval($new_instance['count']);
        $instance['child_of'] = intval($new_instance['child_of']);
        $instance['show_count'] = isset($new_instance['show_count']) ? (bool)$new_instance['show_count'] : false;
        $instance['show_more'] = isset($new_instance['show_more']) ? (bool)$new_instance['show_more'] : false;

        return $instance;
    }

    /**
     * Widget setting
     */
    function form($instance)
    {
        $instance = wp_parse_args($instance, $this->defaults);
        $show_count = isset($instance['show_count']) ? (bool)$instance['show_count'] : false;
        $show_more = isset($instance['show_more']) ? (bool)$instance['show_more'] : false;
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'dirtywash'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                   value="<?php echo esc_attr($instance['title']); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('count')); ?>"><?php esc_html_e('Count:', 'dirtywash'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('count')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('count')); ?>" type="text"
                   value="<?php echo intval($instance['count']); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('custom_ids')); ?>"><?php esc_html_e('Custom Categories By Ids- EX: 1,2,3', 'dirtywash'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('custom_ids')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('custom_ids')); ?>" type="text"
                   value="<?php echo esc_attr($instance['custom_ids']); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('child_of')); ?>"><?php esc_html_e('Child Of:', 'dirtywash'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('child_of')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('child_of')); ?>" type="text"
                   value="<?php echo intval($instance['child_of']); ?>">
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked($show_count); ?>
                   id="<?php echo esc_attr($this->get_field_id('show_count')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('show_count')); ?>"/>
            <label for="<?php echo esc_attr($this->get_field_id('show_count')); ?>"><?php esc_html_e('Show count?', 'dirtywash'); ?></label>
        </p>

        <p>
            <input class="checkbox" type="checkbox" <?php checked($show_more); ?>
                   id="<?php echo esc_attr($this->get_field_id('show_more')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('show_more')); ?>"/>
            <label for="<?php echo esc_attr($this->get_field_id('show_more')); ?>"><?php esc_html_e('Show more?', 'dirtywash'); ?></label>
        </p>
        <?php
    }
}

add_action('widgets_init', 'themesflat_register_categories');

/**
 * Register widget
 *
 * @return void
 * @since 1.0
 */
function themesflat_register_categories()
{
    register_widget('Themesflat_Categories');
}