<?php

// namespace ThemesflatAddons\Widgets;

// use  Elementor\Widget_Base;
// use  Elementor\\Elementor\Controls_Manager;
// use  Elementor\Utils;
// use  Elementor\Scheme_Color;
// use  Elementor\Group_Control_Typography;
// use  Elementor\Scheme_Typography;

// if (!defined('ABSPATH')) {
//     exit;
// }

// Exit if accessed directly
class TFL_Author_Widget extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'tfl-author';
    }

    public function get_title()
    {
        return __('TFL Author', 'themesflat');
    }

    public function get_icon()
    {
        return 'eicon-user-circle-o';
    }

    public function get_categories()
    {
        return array('themesflat_addons');
    }

    public function get_custom_help_url()
    {
        return 'https://themesflatelementor.com/docs/themesflat-addons/core-addons/author-addon/';
    }

    public function get_script_depends()
    {
        return ['tfl-waypoints', 'tfl-frontend-scripts'];
    }

    public function get_style_depends()
    {
        return ['tfl-animate-styles', 'tfl-frontend-styles', 'tfl-author-styles'];
    }

    protected function register_controls()
    {
        $this->start_controls_section('section_author', [
            'label' => __('Author', 'themesflat'),
        ]);
        $this->add_control('style', [
            'type' => \Elementor\Controls_Manager::SELECT,
            'label' => __('Choose Style', 'themesflat'),
            'default' => 'style1',
            'options' => [
                'style1' => __('Style 1', 'themesflat'),
            ],
        ]);

//        $this->add_control('author_text', [
//            'type' => \Elementor\Controls_Manager::TEXT,
//            'label' => __('Author Text', 'themesflat'),
//            'label_block' => true,
//            'separator' => 'before',
//            'default' => __('Author Text', 'themesflat'),
//            'dynamic' => [
//                'active' => true,
//            ],
//        ]);
//
//        $this->add_control('link', [
//            'label' => __('Link', 'elementor'),
//            'type' => \Elementor\Controls_Manager::URL,
//            'dynamic' => [
//                'active' => true,
//            ],
//            'placeholder' => __('https://your-link.com', 'elementor'),
//            'default' => [
//                'url' => '#',
//            ],
//        ]);

        // $this->add_control('widget_animation', [
        //     "type" => \Elementor\Controls_Manager::SELECT,
        //     "label" => __("Animation Type", "themesflat"),
        //     'options' => tfl_get_animation_options(),
        //     'default' => 'none',
        // ]);
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $settings = apply_filters('tfl_author_' . $this->get_id() . '_settings', $settings);
        $args['settings'] = $settings;
        $args['widget_instance'] = $this;
        tfl_get_template_part("author/{$settings['style']}", $args);
    }

    protected function content_template()
    {
    }

}