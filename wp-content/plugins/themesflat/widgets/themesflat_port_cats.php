<?php

class Themesflat_Portfolio_Categories extends WP_Widget
{

    protected $defaults;

    function __construct() {
        $this->defaults = array(
            'title' 	=> 'Portfolio Categories',
            'style'  => 1
        );
        parent::__construct(
            'widget_portfolio_cats',
            esc_html__( 'Themesflat - Portfolio Categories', 'dirtywash' ),
            array(
                'classname'   => 'tfl-widget-portfolio-cats',
                'description' => esc_html__( 'Portfolio Categories.', 'dirtywash' )
            )
        );
    }

    function widget($args, $instance)
    {
        $instance = wp_parse_args( $instance, $this->defaults );
        extract( $instance );
        extract( $args );
        $style = $instance['style'];
        echo wp_kses_post( $before_widget );
        if (!empty($title)) echo wp_kses_post($before_title) . esc_html($title) . wp_kses_post($after_title);

        ?>

        <div class="wrap-portfolio-cats">
            <div class="tfl-categories">

                <?php
                $args = array(
                    'taxonomy' => 'portfolios_category',
                    'orderby' => 'name',
                    'order' => 'ASC'
                );

                $cats = get_categories($args);

                if (count($cats) > 0):
                    echo '<ul>';
                    foreach ($cats as $cat) {
                        ?>
                        <li class="cat-item">
                            <a href="<?php echo get_category_link($cat->term_id) ?>">
                                <?php echo $cat->name; ?>
                            </a>
                            <span class="tfl-categories-post-count tfl-font-style-regular"><?php echo $cat->count; ?></span>
                        </li>
                        <?php
                    }
                    echo '</ul>';

                else:
                    echo '<p>There are no categories in the section!</p>';
                endif;
                ?>

            </div>
        </div>

        <?php

        echo wp_kses_post( $after_widget );
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['style'] = strip_tags($new_instance['style']);
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance)
    {
        $instance = wp_parse_args( $instance, $this->defaults );
        $style = esc_attr($instance['style']);
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'dirtywash'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                   value="<?php echo esc_attr($instance['title']); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr('select_style'); ?>"><?php esc_html_e('Select Style:', 'dirtywash'); ?></label>
            <select class="widefat" id="<?php echo esc_attr('select_style'); ?>"
                    name="<?php echo esc_attr($this->get_field_name( 'style' )); ?>">
                <option value="1"<?php selected(empty($instance['style'])); ?>><?php esc_html_e('Style 1', 'dirtywash'); ?></option>
                <option value="2"<?php selected(($instance['style'] == 2)); ?>><?php esc_html_e('Style 2', 'dirtywash'); ?></option>
            </select>
        </p>
        <?php
    }
}

add_action('widgets_init', function () {
    register_widget('Themesflat_Portfolio_Categories');
});