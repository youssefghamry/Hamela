<?php


// Exit if accessed directly
class TFL_Posts_Formatted extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'tfl-posts-formatted';
    }

    public function get_title()
    {
        return __('TFL Posts Formatted', 'themesflat');
    }

    public function get_icon()
    {
        return 'eicon-post-list';
    }

    public function get_categories()
    {
        return array('themesflat_addons');
    }

    public function get_custom_help_url()
    {
        return 'https://themesflatelementor.com/docs/themesflat-addons/core-addons/posts-addon/';
    }

    public function get_script_depends()
    {
        return ['tfl-waypoints', 'tfl-frontend-scripts'];
    }

    public function get_style_depends()
    {
        return ['tfl-animate-styles', 'tfl-frontend-styles', 'tfl-posts-styles'];
    }

    protected function register_controls()
    {
        //general
        $this->start_controls_section('section_posts', [
            'label' => __('General', 'themesflat'),
        ]);
        $this->add_control('style', [
            'type' => \Elementor\Controls_Manager::SELECT,
            'label' => __('Choose Style', 'themesflat'),
            'default' => 'style1',
            'options' => [
                'style1' => __('Style 1', 'themesflat'),
            ],
        ]);

        $this->end_controls_section();


        //heading
        $title = 'Title 1';
        $default_title_tag = 'h2';
        $align = 'text-left';
        $this->start_controls_section(
            'tfl_section_title',
            [
                'label' => esc_html__('Section Title', 'blogar'),
            ]
        );
        $this->add_control(
            'tfl_title',
            [
                'label' => esc_html__('Title', 'blogar'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => $title,
                'placeholder' => esc_html__('Type Heading Text', 'blogar'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'tfl_title_tag',
            [
                'label' => esc_html__('Title HTML Tag', 'blogar'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title' => esc_html__('H1', 'blogar'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2' => [
                        'title' => esc_html__('H2', 'blogar'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3' => [
                        'title' => esc_html__('H3', 'blogar'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4' => [
                        'title' => esc_html__('H4', 'blogar'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5' => [
                        'title' => esc_html__('H5', 'blogar'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6' => [
                        'title' => esc_html__('H6', 'blogar'),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => $default_title_tag,
                'toggle' => false,
            ]
        );
        $this->add_responsive_control(
                'tfl_align',
                [
                    'label' => esc_html__( 'Alignment', 'blogar' ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'text-left' => [
                            'title' => esc_html__( 'Left', 'blogar' ),
                            'icon' => 'fa fa-align-left',
                        ],
                        'text-center' => [
                            'title' => esc_html__( 'Center', 'blogar' ),
                            'icon' => 'fa fa-align-center',
                        ],
                        'text-right' => [
                            'title' => esc_html__( 'Right', 'blogar' ),
                            'icon' => 'fa fa-align-right',
                        ],
                    ],
                    'default' => $align,
                    'toggle' => true,
                ]
            );
        $this->end_controls_section();
        
        //query
        $taxonomy = 'category';
        $control_name = null;
        $post_type = 'post';
        $posts_per_page = '6';
        $offset = '0';
        $orderby = 'date';
        $order = 'desc';

        $this->start_controls_section(
            'tfl_query',
            [
                'label' => sprintf(esc_html__('%s Query', 'blogar'), $control_name),
            ]
        );

        $this->add_control(
            'category',
            [
                'label' => esc_html__('Category', 'blogar'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => tfl_get_categories($taxonomy),
                'label_block' => true
            ]
        );
        $this->add_control(
            'exclude_category',
            [
                'label' => esc_html__('Exclude Category', 'blogar'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => tfl_get_categories_id($taxonomy),
                'label_block' => true
            ]
        );
        $this->add_control(
            'post__in',
            [
                'type'    => \Elementor\Controls_Manager::SELECT2,
                'label'   => esc_html__( 'Select post manually', 'blogar' ),
                'label_block' => true,
                'multiple' => true,
                'options' => tfl_get_all_posts(),
            ]
        );
        $this->add_control(
            'post__not_in',
            [
                'label' => esc_html__('Exclude post', 'blogar'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => tfl_get_all_types_post($post_type),
                'multiple' => true,
                'label_block' => true
            ]
        );
        $this->add_control(
            'post_format',
            [
                'label' =>esc_html__('Select Post Format', 'blogar'),
                'type'      => \Elementor\Controls_Manager::SELECT2,
                'options' => [
                    'post-format-standard' => esc_html__( 'Standard', 'blogar' ),
                    'post-format-audio' => esc_html__( 'Audio', 'blogar' ),
                    'post-format-video' => esc_html__( 'Video', 'blogar' ),
                    'post-format-gallery' => esc_html__( 'Gallery', 'blogar' ),
                    'post-format-link' => esc_html__( 'Link', 'blogar' ),
                    'post-format-quote' => esc_html__( 'Quote', 'blogar' ),
                ],
                'default' => [],
                'label_block' => true,
                'multiple'  => true,
            ]
        );
        $this->add_control(
            'posts_per_page',
            [
                'label' => esc_html__('Posts Per Page', 'blogar'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => $posts_per_page,
            ]
        );
        $this->add_control(
            'offset',
            [
                'label' => esc_html__('Offset', 'blogar'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => $offset,
            ]
        );
        $this->add_control(
            'orderby',
            [
                'label' => esc_html__('Order By', 'blogar'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => tfl_get_orderby_options(),
                'default' => $orderby,

            ]
        );
        $this->add_control(
            'order',
            [
                'label' => esc_html__('Order', 'blogar'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'asc' => esc_html__('Ascending', 'blogar'),
                    'desc' => esc_html__('Descending', 'blogar'),
                ],
                'default' => $order,

            ]
        );
        $this->add_control(
            'ignore_sticky_posts',
            [
                'label' => esc_html__( 'Ignore sticky posts', 'blogar' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'blogar' ),
                'label_off' => esc_html__( 'No', 'blogar' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'show_only_sticky_posts',
            [
                'label' => esc_html__( 'Show only sticky posts', 'blogar' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'blogar' ),
                'label_off' => esc_html__( 'No', 'blogar' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->end_controls_section();

        //meta
        $this->start_controls_section(
            '_post_lists_meta',
            [
                'label' => esc_html__('Post Meta', 'blogar'),
            ]
        );
        $this->add_control(
            'show_category',
            [
                'label' => esc_html__( 'Show Category', 'blogar' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'blogar' ),
                'label_off' => esc_html__( 'No', 'blogar' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'show_thumb',
            [
                'label' => esc_html__( 'Show Thumbnail', 'blogar' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'blogar' ),
                'label_off' => esc_html__( 'No', 'blogar' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'show_desc',
            [
                'label' => esc_html__( 'Show Description', 'blogar' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'blogar' ),
                'label_off' => esc_html__( 'No', 'blogar' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'show_date',
            [
                'label' => esc_html__( 'Show Date', 'blogar' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'blogar' ),
                'label_off' => esc_html__( 'No', 'blogar' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
//        $this->add_control(
//            'show_read_time',
//            [
//                'label' => esc_html__( 'Show Read Time', 'blogar' ),
//                'type' => \Elementor\Controls_Manager::SWITCHER,
//                'label_on' => esc_html__( 'Yes', 'blogar' ),
//                'label_off' => esc_html__( 'No', 'blogar' ),
//                'return_value' => 'yes',
//                'default' => 'yes',
//            ]
//        );
//        $this->add_control(
//            'show_author_avatar',
//            [
//                'label' => esc_html__( 'Show Author Avatar', 'blogar' ),
//                'type' => \Elementor\Controls_Manager::SWITCHER,
//                'label_on' => esc_html__( 'Yes', 'blogar' ),
//                'label_off' => esc_html__( 'No', 'blogar' ),
//                'return_value' => 'yes',
//                'default' => 'yes',
//            ]
//        );
//        $this->add_control(
//            'show_author_name',
//            [
//                'label' => esc_html__( 'Show Author Name', 'blogar' ),
//                'type' => \Elementor\Controls_Manager::SWITCHER,
//                'label_on' => esc_html__( 'Yes', 'blogar' ),
//                'label_off' => esc_html__( 'No', 'blogar' ),
//                'return_value' => 'yes',
//                'default' => 'yes',
//            ]
//        );
//        $this->add_control(
//            'show_social_share',
//            [
//                'label' => esc_html__( 'Show Social Share', 'blogar' ),
//                'type' => \Elementor\Controls_Manager::SWITCHER,
//                'label_on' => esc_html__( 'Yes', 'blogar' ),
//                'label_off' => esc_html__( 'No', 'blogar' ),
//                'return_value' => 'yes',
//                'default' => 'yes',
//            ]
//        );

        $this->add_control(
            'show_pagination',
            [
                'label' => esc_html__( 'Show Pagination', 'blogar' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'blogar' ),
                'label_off' => esc_html__( 'No', 'blogar' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->end_controls_section();

        //extra
//        $this->start_controls_section(
//            '_post_lists_extra',
//            [
//                'label' => esc_html__('Extra Options', 'blogar'),
//            ]
//        );
//        $this->add_group_control(
//            \Elementor\Group_Control_Image_Size::get_type(),
//            [
//                'name' => 'post_lists_size',
//                'default' => 'medium',
//                'exclude' => ['custom'],
//                'separator' => 'none',
//            ]
//        );
//        $this->add_control(
//            'custom-height',
//            [
//                'label' => esc_html__('Height', 'blogar'),
//                'type' => \Elementor\Controls_Manager::SLIDER,
//                'size_units' => ['px', '%'],
//                'range' => [
//                    'px' => [
//                        'min' => 0,
//                        'max' => 1500,
//                        'step' => 1,
//                    ],
//                    '%' => [
//                        'min' => 0,
//                        'max' => 100,
//                    ],
//                ],
//                'selectors' => [
//                    '{{WRAPPER}} .content-block.post-list-view .post-thumbnail a img, {{WRAPPER}} .content-block.post-list-view .post-thumbnail' => 'height: {{SIZE}}{{UNIT}};'
//                ],
//            ]
//        );

//        $this->end_controls_section();

    
        
        //style
        $control_selector = '.wrap-blog-articles';
        $this->start_controls_section(
            'tfl_styling',
            [
                'label' => esc_html__('Section Title', 'blogar'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'tfl_color',
            [
                'label' => esc_html__('Color', 'blogar'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector.' .post-formatted-section-title ' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tfl_typography',
                'label' => esc_html__('Typography', 'blogar'),
                'selector' => '{{WRAPPER}} '. $control_selector.' .post-formatted-section-title ',
            ]
        );
        $this->add_responsive_control(
            'tfl_padding',
            [
                'label' => esc_html__('Padding', 'blogar'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'tfl_margin',
            [
                'label' => esc_html__('Margin', 'blogar'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();
        
        
        //background
        $this->start_controls_section(
            'tfl_extra_styling',
            [
                'label' => esc_html__('Extra Style', 'blogar'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'tfl_extra_background',
                'label' => esc_html__('Background', 'blogar'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} ' . $control_selector,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'tfl_extra_border',
                'label' => esc_html__( 'Border', 'blogar' ),
                'selector' => '{{WRAPPER}} ' . $control_selector,
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'tfl_extra_padding',
            [
                'label' => esc_html__('Padding', 'blogar'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'tfl_extra_margin',
            [
                'label' => esc_html__('Margin', 'blogar'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();




    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $settings = apply_filters('tfl_posts_' . $this->get_id() . '_settings', $settings);
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
//        $settings['posts_per_page'] = 6;
        $settings['paged'] = $paged;
        $args['settings'] = $settings;
        $args['widget_instance'] = $this;
        tfl_get_template_part("posts-fomartted/{$settings['style']}", $args);
    }

    protected function content_template()
    {
    }

}