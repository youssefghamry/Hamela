<?php


// Exit if accessed directly
class TFL_Portfolio_Grid extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'tfl-portfolio-grid';
    }

    public function get_title()
    {
        return __('TFL Portfolio Grid', 'themesflat');
    }

    public function get_icon()
    {
        return 'eicon-gallery-grid';
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
        return ['tfl-waypoints', 'tfl-frontend-scripts', 'tf-main'];
    }

    public function get_style_depends()
    {
        return ['tfl-animate-styles', 'tfl-frontend-styles'];
    }

    protected function register_controls()
    {
        //general
        $this->start_controls_section('section_portfolios', [
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
        $control_selector = '.tfl-portfolios-grid';
        $default_title_tag = 'h2';
        $align = 'text-left';
        $this->start_controls_section(
            'tfl_section_title',
            [
                'label' => esc_html__('Section Title', 'themesflat-addons'),
            ]
        );
        $this->add_control(
            'tfl_title',
            [
                'label' => esc_html__('Title', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
                'placeholder' => esc_html__('Type Heading Text', 'themesflat-addons'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'tfl_title_tag',
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
                'tfl_align',
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
            'tfl_color',
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
                'name' => 'tfl_typography',
                'label' => esc_html__('Typography', 'themesflat-addons'),
//                'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} ' . $control_selector .' .section-title',
            ]
        );

        $this->add_responsive_control(
            'tfl_padding',
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
            'tfl_margin',
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
        $taxonomy = 'portfolios_category';
        $control_name = 'Porfolio';
        $post_type = 'portfolios';
        $posts_per_page = '6';
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
                'options' => tfl_get_all_posts($post_type),
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

        $this->add_control(
            'ignore_sticky_posts',
            [
                'label' => esc_html__( 'Ignore sticky posts', 'themesflat-addons' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'themesflat-addons' ),
                'label_off' => esc_html__( 'No', 'themesflat-addons' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'show_only_sticky_posts',
            [
                'label' => esc_html__( 'Show only sticky posts', 'themesflat-addons' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'themesflat-addons' ),
                'label_off' => esc_html__( 'No', 'themesflat-addons' ),
                'return_value' => 'yes',
                'default' => 'no',
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
            'show_category',
            [
                'label' => esc_html__( 'Show Category', 'themesflat-addons' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'themesflat-addons' ),
                'label_off' => esc_html__( 'No', 'themesflat-addons' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_thumb',
            [
                'label' => esc_html__( 'Show Thumbnail', 'themesflat-addons' ),
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
        $this->add_group_control(
            \Elementor\Group_Control_Image_Size::get_type(),
            [
                'name' => 'portfolio_thumbnail',
                'default' => 'themesflat-portfolios',
                'exclude' => ['custom'],
                'separator' => 'none',
            ]
        );
//        $this->add_control(
//            'custom-height',
//            [
//                'label' => esc_html__('Height', 'themesflat-addons'),
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



        $this->add_control(
            'columns',
            [
                'label' => esc_html__('Columns', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '3' => esc_html__('3', 'themesflat-addons'),
                    '4' => esc_html__('4', 'themesflat-addons'),
                    '5' => esc_html__('5', 'themesflat-addons'),
                ],
                'default' => '3',

            ]
        );

        $this->end_controls_section();

        //Filter
        $this->start_controls_section(
            'filter_portfolio',
            [
                'label' => esc_html__('Filter', 'themesflat-addons'),
            ]
        );

        $this->add_control(
            'show_filter',
            [
                'label' => esc_html__( 'Filter', 'themesflat-elementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'themesflat-elementor' ),
                'label_off' => esc_html__( 'Hide', 'themesflat-elementor' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control( 
            'filter_category_order',
            [
                'label' => esc_html__( 'Filter Order', 'themesflat-elementor' ),
                'type'  => \Elementor\Controls_Manager::TEXT,   
                'description' => esc_html__( 'Filter Slug Categories Order Split By ","', 'themesflat-elementor' ),
                'default' => '',
                'label_block' => true,  
                'condition' => [
                    'show_filter' => 'yes',
                ],          
            ]
        );

        $this->add_group_control( 
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'filter_typography',
                'label' => esc_html__( 'Typography', 'themesflat-elementor' ),
                'selector' => '{{WRAPPER}} .portfolio-filter li a',
                'condition' => [
                    'show_filter' => 'yes',
                ],
            ]
        ); 

        $this->add_control( 
            'filter_color',
            [
                'label' => esc_html__( 'Color', 'themesflat-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .portfolio-filter li a' => 'color: {{VALUE}}',               
                ],
                'condition' => [
                    'show_filter' => 'yes',
                ],
            ]
        );

        $this->add_control( 
            'filter_bgcolor',
            [
                'label' => esc_html__( 'Background Color', 'themesflat-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .portfolio-filter li a' => 'background-color: {{VALUE}}; border-color: {{VALUE}}',          
                ],
                'condition' => [
                    'show_filter' => 'yes',
                ],
            ]
        );

        $this->add_control( 
            'filter_color_hover',
            [
                'label' => esc_html__( 'Color Hover & Active', 'themesflat-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffa800',
                'selectors' => [
                    '{{WRAPPER}} .portfolio-filter li a:hover' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .portfolio-filter li.active a' => 'border-color: {{VALUE}}',                
                ],
                'condition' => [
                    'show_filter' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();
        
        //style
//        $control_selector = null;
        $this->start_controls_section(
            'tfl_styling',
            [
                'label' => esc_html__('Item Box', 'themesflat-addons'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tfl_item_title_typography',
                'label' => esc_html__('Title Typography', 'themesflat-addons'),
                'selector' => '{{WRAPPER}} ' . $control_selector .' .portfolio-items .portfolio-item .portfolio-content .portfolio-content-inner .entry-title a',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tfl_item_cat_typography',
                'label' => esc_html__('Categories Typography', 'themesflat-addons'),
                'selector' => '{{WRAPPER}} ' . $control_selector .' .portfolio-items .portfolio-item .portfolio-content .portfolio-content-inner .cat a',
            ]
        );



        $type = 'item_title';
        $this->start_controls_tabs($type.'_tabs');
        //nomal tab
        $this->start_controls_tab(
            $type.'_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'themesflat-elementor' ),
            ]
        );

        $this->add_control(
            'tfl_item_title_color',
            [
                'label' => esc_html__('Title Color', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector.' .portfolio-items .portfolio-item .portfolio-content .portfolio-content-inner .entry-title a' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'tfl_item_cat_color',
            [
                'label' => esc_html__('Categories Color', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector.' .portfolio-items .portfolio-item .portfolio-content .portfolio-content-inner .cat a' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'tfl_box_bg_color',
            [
                'label' => esc_html__('Box Background', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector.' .portfolio-items .portfolio-item .portfolio-content' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'tfl_detail_color',
            [
                'label' => esc_html__('Detail Color', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector.' .portfolio-items .portfolio-item .portfolio-content .portfolio-content-inner .entry-title .small-detail' => 'background: {{VALUE}} !important;',
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
            'tfl_item_title_hover_color',
            [
                'label' => esc_html__('Title Color', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector.' .portfolio-items .portfolio-item:hover .portfolio-content .portfolio-content-inner .entry-title a' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'tfl_item_cat_hover_color',
            [
                'label' => esc_html__('Categories Color', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector.' .portfolio-items .portfolio-item:hover .portfolio-content .portfolio-content-inner .cat a' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'tfl_box_bg_hover_color',
            [
                'label' => esc_html__('Box Background', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector.' .portfolio-items .portfolio-item:hover .portfolio-content' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'tfl_detail_hover_color',
            [
                'label' => esc_html__('Detail Color', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ' . $control_selector.' .portfolio-items .portfolio-item:hover .portfolio-content .portfolio-content-inner .entry-title .small-detail' => 'background: {{VALUE}} !important;',
                ],
            ]
        );










        $this->end_controls_tab();
        //end - hover tab
        $this->end_controls_tabs();


        $this->add_control(
            'show_right_detail',
            [
                'label' => esc_html__( 'Show Right Detail', 'themesflat-addons' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'themesflat-addons' ),
                'label_off' => esc_html__( 'No', 'themesflat-addons' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );



//
//        $this->add_control(
//            'tfl_color',
//            [
//                'label' => esc_html__('Color', 'themesflat-addons'),
//                'type' => \Elementor\Controls_Manager::COLOR,
//                'selectors' => [
//                    '{{WRAPPER}} ' . $control_selector => 'color: {{VALUE}} !important;',
//                ],
//            ]
//        );


//
//        $this->add_group_control(
//            \Elementor\Group_Control_Typography::get_type(),
//            [
//                'name' => 'tfl_typography',
//                'label' => esc_html__('Typography', 'themesflat-addons'),
//                'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
//                'selector' => '{{WRAPPER}} ' . $control_selector,
//            ]
//        );
//        $this->add_responsive_control(
//            'tfl_padding',
//            [
//                'label' => esc_html__('Padding', 'themesflat-addons'),
//                'type' => \Elementor\Controls_Manager::DIMENSIONS,
//                'size_units' => ['px', '%', 'em'],
//                'selectors' => [
//                    '{{WRAPPER}} ' . $control_selector => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
//                ],
//                'separator' => 'before',
//            ]
//        );
//        $this->add_responsive_control(
//            'tfl_margin',
//            [
//                'label' => esc_html__('Margin', 'themesflat-addons'),
//                'type' => \Elementor\Controls_Manager::DIMENSIONS,
//                'size_units' => ['px', '%', 'em'],
//                'selectors' => [
//                    '{{WRAPPER}} ' . $control_selector => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
//                ],
//                'separator' => 'before',
//            ]
//        );
//        $this->end_controls_section();
        
        
        //background
//        $this->start_controls_section(
//            'tfl_extra_styling',
//            [
//                'label' => esc_html__('Extra Style', 'themesflat-addons'),
//                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
//            ]
//        );
//        $this->add_group_control(
//            \Elementor\Group_Control_Background::get_type(),
//            [
//                'name' => 'tfl_extra_background',
//                'label' => esc_html__('Background', 'themesflat-addons'),
//                'types' => ['classic', 'gradient', 'video'],
//                'selector' => '{{WRAPPER}} ' . $control_selector,
//            ]
//        );
//        $this->add_group_control(
//            \Elementor\Group_Control_Border::get_type(),
//            [
//                'name' => 'tfl_extra_border',
//                'label' => esc_html__( 'Border', 'themesflat-addons' ),
//                'selector' => '{{WRAPPER}} ' . $control_selector,
//                'separator' => 'before',
//            ]
//        );
//
//        $this->add_responsive_control(
//            'tfl_extra_padding',
//            [
//                'label' => esc_html__('Padding', 'themesflat-addons'),
//                'type' => \Elementor\Controls_Manager::DIMENSIONS,
//                'size_units' => ['px', '%', 'em'],
//                'selectors' => [
//                    '{{WRAPPER}} ' . $control_selector => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
//                ],
//                'separator' => 'before',
//            ]
//        );
//        $this->add_responsive_control(
//            'tfl_extra_margin',
//            [
//                'label' => esc_html__('Margin', 'themesflat-addons'),
//                'type' => \Elementor\Controls_Manager::DIMENSIONS,
//                'size_units' => ['px', '%', 'em'],
//                'selectors' => [
//                    '{{WRAPPER}} ' . $control_selector => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
//                ],
//                'separator' => 'before',
//            ]
//        );

        $this->end_controls_section();




    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();


        $settings = apply_filters('tfl_posts_' . $this->get_id() . '_settings', $settings);
        $args['settings'] = $settings;
        $args['widget_instance'] = $this;
        tfl_get_template_part("portfolio-grid/{$settings['style']}", $args);
    }

    protected function content_template()
    {
    }

}