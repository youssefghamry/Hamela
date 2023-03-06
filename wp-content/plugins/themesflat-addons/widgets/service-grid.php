<?php


// Exit if accessed directly
class TFL_Service_Grid extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'tfl-services-grid';
    }

    public function get_title()
    {
        return __('Services Grid', 'themesflat');
    }

    public function get_icon()
    {
        return 'eicon-archive';
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
        $control_selector = '.tfl-services-grid';
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
                'style2' => __('Style 2', 'themesflat'),
                'style3' => __('Style 3', 'themesflat'),
                'style4' => __('Style 4', 'themesflat'),
            ],
        ]);

        $this->add_control(
            'tfl_bg_color_item',
            [
                'label' => esc_html__('Background Color', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector .' .services-item .service-item-inner' => 'background: {{VALUE}} !important;',
                    '{{WRAPPER}} ' . $control_selector .' .service-grid.style2 .service-item-inner' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'tfl_item_padding',
            [
                'label' => esc_html__('Padding', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector .' .services-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();


        //heading
        $default_title_tag = 'h2';
        $align = 'text-left';
        $this->start_controls_section(
            'tfl_section_title_label',
            [
                'label' => esc_html__('Section Title', 'themesflat-addons'),
            ]
        );
        $this->add_control(
            'tfl_section_title',
            [
                'label' => esc_html__('Title', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
                'placeholder' => esc_html__('Type Heading Text', 'themesflat-addons'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'tfl_section_title_tag',
            [
                'label' => esc_html__('Title HTML Tag', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title' => esc_html__('H1', 'themesflat-addons'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2' => [
                        'title' => esc_html__('H2', 'themesflat-addons'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3' => [
                        'title' => esc_html__('H3', 'themesflat-addons'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4' => [
                        'title' => esc_html__('H4', 'themesflat-addons'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5' => [
                        'title' => esc_html__('H5', 'themesflat-addons'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6' => [
                        'title' => esc_html__('H6', 'themesflat-addons'),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => $default_title_tag,
                'toggle' => false,
            ]
        );

        $this->add_responsive_control(
                'tfl_section_title_align',
                [
                    'label' => esc_html__( 'Alignment', 'themesflat-addons' ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'text-left' => [
                            'title' => esc_html__( 'Left', 'themesflat-addons' ),
                            'icon' => 'fa fa-align-left eicon-text-align-left',
                        ],
                        'text-center' => [
                            'title' => esc_html__( 'Center', 'themesflat-addons' ),
                            'icon' => 'fa fa-align-center eicon-text-align-center',
                        ],
                        'text-right' => [
                            'title' => esc_html__( 'Right', 'themesflat-addons' ),
                            'icon' => 'fa fa-align-right eicon-text-align-right',
                        ],
                    ],
                    'default' => $align,
                    'toggle' => true,
                ]
            );


        $this->add_control(
            'tfl_section_title_color',
            [
                'label' => esc_html__('Color', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector .' .section-title' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tfl_section_title_typography',
                'label' => esc_html__('Typography', 'themesflat-addons'),
                'selector' => '{{WRAPPER}} ' . $control_selector .' .section-title',
            ]
        );

        $this->add_responsive_control(
            'tfl_section_title_padding',
            [
                'label' => esc_html__('Padding', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector .' .section-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'tfl_section_title_margin',
            [
                'label' => esc_html__('Margin', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector .' .section-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );








        $this->end_controls_section();
        
        //query
        $taxonomy = 'services_category';
        $control_name = 'Service';
        $post_type = 'services';
        $posts_per_page = '8';
        $offset = '0';
        $orderby = 'date';
        $order = 'desc';

        $this->start_controls_section(
            'tfl_query',
            [
                'label' => sprintf(esc_html__('%s Query', 'themesflat-addons'), $control_name),
            ]
        );

        $this->add_control(
            'category',
            [
                'label' => esc_html__('Category', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => tfl_get_categories($taxonomy),
                'label_block' => true
            ]
        );
        $this->add_control(
            'exclude_category',
            [
                'label' => esc_html__('Exclude Category', 'themesflat-addons'),
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
                'label'   => esc_html__( 'Select post manually', 'themesflat-addons' ),
                'label_block' => true,
                'multiple' => true,
                'options' => tfl_get_all_posts('services'),
            ]
        );
        $this->add_control(
            'post__not_in',
            [
                'label' => esc_html__('Exclude post', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => tfl_get_all_types_post($post_type),
                'multiple' => true,
                'label_block' => true
            ]
        );
        $this->add_control(
            'post_format',
            [
                'label' =>esc_html__('Select Post Format', 'themesflat-addons'),
                'type'      => \Elementor\Controls_Manager::SELECT2,
                'options' => [
                    'post-format-standard' => esc_html__( 'Standard', 'themesflat-addons' ),
                    'post-format-audio' => esc_html__( 'Audio', 'themesflat-addons' ),
                    'post-format-video' => esc_html__( 'Video', 'themesflat-addons' ),
                    'post-format-gallery' => esc_html__( 'Gallery', 'themesflat-addons' ),
                    'post-format-link' => esc_html__( 'Link', 'themesflat-addons' ),
                    'post-format-quote' => esc_html__( 'Quote', 'themesflat-addons' ),
                ],
                'default' => [],
                'label_block' => true,
                'multiple'  => true,
            ]
        );
        $this->add_control(
            'posts_per_page',
            [
                'label' => esc_html__('Posts Per Page', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => $posts_per_page,
            ]
        );
        $this->add_control(
            'offset',
            [
                'label' => esc_html__('Offset', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => $offset,
            ]
        );
        $this->add_control(
            'orderby',
            [
                'label' => esc_html__('Order By', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => tfl_get_orderby_options(),
                'default' => $orderby,

            ]
        );
        $this->add_control(
            'order',
            [
                'label' => esc_html__('Order', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'asc' => esc_html__('Ascending', 'themesflat-addons'),
                    'desc' => esc_html__('Descending', 'themesflat-addons'),
                ],
                'default' => $order,

            ]
        );

        $this->end_controls_section();

        //meta
        $this->start_controls_section(
            '_post_lists_meta',
            [
                'label' => esc_html__('Post Meta', 'themesflat-addons'),
            ]
        );


        $this->add_control(
            'show_read_more',
            [
                'label' => esc_html__( 'Show Read More', 'themesflat-addons' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'themesflat-addons' ),
                'label_off' => esc_html__( 'No', 'themesflat-addons' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_icon',
            [
                'label' => esc_html__( 'Show Icon', 'themesflat-addons' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'themesflat-addons' ),
                'label_off' => esc_html__( 'No', 'themesflat-addons' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_desc',
            [
                'label' => esc_html__( 'Show description', 'themesflat-addons' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'themesflat-addons' ),
                'label_off' => esc_html__( 'No', 'themesflat-addons' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_pagination',
            [
                'label' => esc_html__( 'Show Pagination', 'themesflat-addons' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'themesflat-addons' ),
                'label_off' => esc_html__( 'No', 'themesflat-addons' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->end_controls_section();

        //extra
        $this->start_controls_section(
            '_post_lists_extra',
            [
                'label' => esc_html__('Extra Options', 'themesflat-addons'),
            ]
        );
        $this->add_control(
            'grid_columns',
            [
                'label' => esc_html__('Grid Columns', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    2 => esc_html__('2', 'themesflat-addons'),
                    3 => esc_html__('3', 'themesflat-addons'),
                    4 => esc_html__('4', 'themesflat-addons'),
                ],
                'default' => 4,

            ]
        );



        $this->add_control(
            'description_text',
            [
                'label' => 'Description',
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => '',
            ]
        );


        $this->end_controls_section();

    
        
        //style
        $this->start_controls_section(
            'tfl_styling',
            [
                'label' => esc_html__('Item', 'themesflat-addons'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control('title_settings', [
            'label' => __('Title', 'themesflat'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);


        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tfl_item_title_typography',
                'label' => esc_html__('Typography', 'themesflat-addons'),
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_family' => [
                        'default' => 'Oswald',
                    ],
                    'font_size' => [
                        'default' => [
                            'unit' => 'px',
                            'size' => '16',
                        ],
                    ],
                    'font_weight' => [
                        'default' => '500',
                    ],
                    'line_height' => [
                        'default' => [
                            'unit' => 'px',
                            'size' => '20',
                        ],
                    ],
                    'text_transform' => [
                        'default' => '',
                    ],
                    'letter_spacing' => [
                        'default' => [
                            'unit' => 'px',
                            'size' => '0',
                        ],
                    ],
                ],
                'selector' => '{{WRAPPER}} ' . $control_selector.' .service-item-inner .box-item .title-box a',
            ]
        );

        $this->add_control(
            'tfl_title_detail_color',
            [
                'label' => esc_html__('Detail Color', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector.' .services-item .service-item-inner .box-item .title-box:before' => 'background: {{VALUE}} !important;',
                ],
            ]
        );



        //nomal tab
        $this->start_controls_tabs('title_tabs');

        $this->start_controls_tab(
            'normal_tab',
            [
                'label' => esc_html__( 'Normal', 'themesflat-elementor' ),
            ]
        );

        $this->add_control(
            'tfl_title_color',
            [
                'label' => esc_html__('Color', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector.' .service-item-inner .box-item .title-box a' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->end_controls_tab();

        //end - nomal tab

        //hover tab
        $this->start_controls_tab(
            'hover_tab',
            [
                'label' => esc_html__( 'Hover', 'themesflat-elementor' ),
            ]
        );

        $this->add_control(
            'tfl_title_hover_color',
            [
                'label' => esc_html__('Color', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector.' .service-item-inner .box-item .title-box a:hover' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();
        //end - hover tab

        $this->add_responsive_control(
            'tfl_padding',
            [
                'label' => esc_html__('Padding', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector.' .services-item .service-item-inner .box-item .title-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'tfl_margin',
            [
                'label' => esc_html__('Margin', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector .' .services-item .service-item-inner .box-item .title-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control('desc_settings', [
            'label' => __('Description', 'themesflat'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tfl_desc_typography',
                'label' => esc_html__('Typography', 'themesflat-addons'),
                'selector' => '{{WRAPPER}} ' . $control_selector.' .services-item .service-item-inner .box-item .content-post',
            ]
        );

        $this->add_control(
            'tfl_desc_color',
            [
                'label' => esc_html__('Color', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector.' .services-item .service-item-inner .box-item .content-post' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'tfl_desc_padding',
            [
                'label' => esc_html__('Padding', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector.' .services-item .service-item-inner .box-item .content-post' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'tfl_desc_margin',
            [
                'label' => esc_html__('Margin', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector .' .services-item .service-item-inner .box-item .content-post' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );


        $this->end_controls_section();
        
        
        //background
        $this->start_controls_section(
            'tfl_extra_styling',
            [
                'label' => esc_html__('Extra Style', 'themesflat-addons'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'tfl_extra_border',
                'label' => esc_html__( 'Border', 'themesflat-addons' ),
                'selector' => '{{WRAPPER}} ' . $control_selector,
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'tfl_extra_padding',
            [
                'label' => esc_html__('Padding', 'themesflat-addons'),
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
                'label' => esc_html__('Margin', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );


        $this->add_control('divider_settings', [
            'label' => __('Divider', 'themesflat'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_control(
            'tfl_divider_color',
            [
                'label' => esc_html__('Divider Color', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector.' .services-item .service-item-inner .divider-left:before' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'tfl_divider_bg_color',
            [
                'label' => esc_html__('Divider BG Color', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector.' .services-item .service-item-inner .divider-left:after' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control('readmore_settings', [
            'label' => __('Readmore', 'themesflat'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_control(
            'tfl_readmore_text',
            [
                'label' => esc_html__('Readmore Text', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '<i class="fas fa-chevron-right"></i>',
                'label_block' => true,
            ]
        );



        $type = 'readmore';
        $this->start_controls_tabs($type.'_tabs');
        //nomal tab
        $this->start_controls_tab(
            $type.'_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'themesflat-elementor' ),
            ]
        );

        $this->add_control(
            'tfl_readmore_color',
            [
                'label' => esc_html__('Color', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector.' .services-item .service-item-inner .box-item .readmore' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'tfl_readmore_bg_color',
            [
                'label' => esc_html__('BG Color', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector.' .services-item .service-item-inner .box-item .readmore' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $this->end_controls_tab();
        //end - nomal tab

        //hover tab
        $this->start_controls_tab(
            $type.'_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'themesflat-elementor' ),
            ]
        );

        $this->add_control(
            'tfl_readmore_hover_color',
            [
                'label' => esc_html__('Color', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector.' .services-item .service-item-inner .box-item .readmore:hover' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'tfl_readmore_bg_hover_color',
            [
                'label' => esc_html__('BG Color', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector.' .services-item .service-item-inner .box-item .readmore:hover' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $this->end_controls_tab();
        //end - hover tab
        $this->end_controls_tabs();


        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();


        $settings = apply_filters('tfl_services_' . $this->get_id() . '_settings', $settings);
        $settings['excerpt_lenght'] = 30;
        $args['settings'] = $settings;

        $args['widget_instance'] = $this;

        tfl_get_template_part("service-grid/{$settings['style']}", $args);
    }

    protected function content_template()
    {
    }

}