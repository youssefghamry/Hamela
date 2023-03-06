<?php

/*
Widget Name: Heading
Description: Display one or more heading depicting a percentage value in a multi-column grid.
Author: ThemesFlat
Author URI: https://www.themesflatthemes.com
*/

// Exit if accessed directly
class TFL_Heading_Widget extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'tfl-heading';
    }

    public function get_title()
    {
        return __('TFL Heading', 'themesflat');
    }

    public function get_icon()
    {
        return 'eicon-heading';
    }

    public function get_categories()
    {
        return array('themesflat_addons');
    }

    public function get_custom_help_url()
    {
        return 'https://themesflatelementor.com/docs/themesflat-addons/core-addons/heading-addon/';
    }

    public function get_script_depends()
    {
        return ['tfl-waypoints', 'tfl-frontend-scripts'];
    }

    public function get_style_depends()
    {
        return ['tfl-animate-styles', 'tfl-frontend-styles', 'tfl-heading-styles'];
    }

    protected function register_controls()
    {
        $this->start_controls_section('section_heading', [
            'label' => __('Heading', 'themesflat'),
        ]);
        $this->add_control('style', [
            'type' => \Elementor\Controls_Manager::SELECT,
            'label' => __('Choose Style', 'themesflat'),
            'default' => 'style1',
            'options' => [
                'style1' => __('Style 1', 'themesflat'),
//                'style2' => __('Style 2', 'themesflat'),
            ],
        ]);
        $this->add_control('subtitle', [
            'type' => \Elementor\Controls_Manager::TEXT,
            'label' => __('Subheading', 'themesflat'),
            'label_block' => true,
            'default' => 'ABOUT US',
            'description' => __('A subtitle displayed above the title heading.', 'themesflat'),
            'dynamic' => [
                'active' => true,
            ],
        ]);

        $this->add_control('heading', [
            'type' => \Elementor\Controls_Manager::TEXT,
            'label' => __('Heading Title', 'themesflat'),
            'label_block' => true,
            'separator' => 'before',
            'default' => 'OUR 10 YEARS WORKING',
            'dynamic' => [
                'active' => true,
            ],
        ]);

        $this->add_control(
            'image_detail',
            [
                'label' => esc_html__('Image Detail', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => URL_THEMESFLAT_ADDONS . "assets/img/circle.png",
                ],
            ]
        );

        $this->add_control(
            'show_detail',
            [
                'label' => esc_html__( 'Show Detail', 'themesflat-addons' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'themesflat-addons' ),
                'label_off' => esc_html__( 'No', 'themesflat-addons' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );



        $this->add_control('heading_settings', [
            'label' => __('Settings', 'themesflat'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);
        $this->add_control('align', [
            'label' => __('Alignment', 'themesflat'),
            'type' => \Elementor\Controls_Manager::CHOOSE,
            'options' => [
                'left' => [
                    'title' => __('Left', 'themesflat'),
                    'icon' => 'fa fa-align-left eicon-text-align-left',
                ],
                'center' => [
                    'title' => __('Center', 'themesflat'),
                    'icon' => 'fa fa-align-center eicon-text-align-center',
                ],
                'right' => [
                    'title' => __('Right', 'themesflat'),
                    'icon' => 'fa fa-align-right eicon-text-align-right',
                ],
            ],
            'default' => 'center',
        ]);
        $this->end_controls_section();

        $this->start_controls_section('section_styling', [
            'label' => __('Title', 'themesflat'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);
        $this->add_control('title_tag', [
            'label' => __('Title HTML Tag', 'themesflat'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'h1' => __('H1', 'themesflat'),
                'h2' => __('H2', 'themesflat'),
                'h3' => __('H3', 'themesflat'),
                'h4' => __('H4', 'themesflat'),
                'h5' => __('H5', 'themesflat'),
                'h6' => __('H6', 'themesflat'),
                'div' => __('div', 'themesflat'),
            ],
            'default' => 'div',
        ]);
        $this->add_control('heading_color', [
            'label' => __('Heading Color', 'themesflat'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .tfl-heading .tfl-title' => 'color: {{VALUE}};',
            ],
        ]);
        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'heading_typography',
            'label' => __('Typography', 'themesflat'),
            'fields_options' => [
                'typography' => ['default' => 'yes'],
                'font_family' => [
                    'default' => 'Oswald',
                ],
                'font_size' => [
                    'default' => [
                        'unit' => 'px',
                        'size' => '32',
                    ],
                ],
                'font_weight' => [
                    'default' => '400',
                ],
                'line_height' => [
                    'default' => [
                        'unit' => 'px',
                        'size' => '42',
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
            'selector' => '{{WRAPPER}} .tfl-heading .tfl-title',
        ]);

        $this->add_responsive_control(
            'title_spacer',
            [
                'label' => esc_html__('Spacer', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0

                ],
                'selectors' => [
                    '{{WRAPPER}} .tfl-heading .tfl-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section('section_subtitle', [
            'label' => __('Subtitle', 'themesflat'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);
        $this->add_control('subtitle_color', [
            'label' => __('Color', 'themesflat'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tfl-heading .tfl-subtitle' => 'color: {{VALUE}};',
            ],
        ]);
        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'subtitle_typography',
            'selector' => '{{WRAPPER}} .tfl-heading .tfl-subtitle',
        ]);
        $this->add_responsive_control(
            'subtitle_spacer',
            [
                'label' => esc_html__('Spacer', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 4

                ],
                'selectors' => [
                    '{{WRAPPER}} .tfl-heading .tfl-subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $settings = apply_filters('tfl_heading_' . $this->get_id() . '_settings', $settings);
        $args['settings'] = $settings;
        $args['widget_instance'] = $this;
        tfl_get_template_part("heading/{$settings['style']}", $args);
    }

    protected function content_template()
    {
    }

}