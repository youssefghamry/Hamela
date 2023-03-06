<?php

// Exit if accessed directly
class TFL_Button_Widget extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'tfl-button';
    }

    public function get_title()
    {
        return __('TFL Button', 'themesflat');
    }

    public function get_icon()
    {
        return 'eicon-button';
    }

    public function get_categories()
    {
        return array('themesflat_addons');
    }

    public function get_custom_help_url()
    {
        return 'https://themesflatelementor.com/docs/themesflat-addons/core-addons/button-addon/';
    }

    public function get_script_depends()
    {
        return ['tfl-waypoints', 'tfl-frontend-scripts'];
    }

    public function get_style_depends()
    {
        return ['tfl-animate-styles', 'tfl-frontend-styles', 'tfl-button-styles'];
    }

    protected function register_controls()
    {
        $this->start_controls_section('section_button', [
            'label' => __('Button', 'themesflat'),
        ]);
        $this->add_control('style', [
            'type' => \Elementor\Controls_Manager::SELECT,
            'label' => __('Choose Style', 'themesflat'),
            'default' => 'style1',
            'options' => [
                'style1' => __('Style 1', 'themesflat'),
                'style2' => __('Style 2', 'themesflat'),
            ],
        ]);

        $this->add_control('button_icon', [
            'type' => \Elementor\Controls_Manager::TEXT,
            'label' => __('Button Icon', 'themesflat'),
            'label_block' => true,
            'separator' => 'before',
            'default' => '<i class="fas fa-plus"></i>',
            'dynamic' => [
                'active' => true,
            ],
        ]);

        $this->add_control('icon_color', [
            'label' => __('Icon Color', 'themesflat'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tfl-button a span.icon' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_control('icon_bg_color', [
            'label' => __('Icon Background', 'themesflat'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tfl-button .tfl-content-wrapper a:before' => 'background: {{VALUE}};',
            ],
        ]);

        $this->add_control('button_text', [
            'type' => \Elementor\Controls_Manager::TEXT,
            'label' => __('Button Text', 'themesflat'),
            'label_block' => true,
            'separator' => 'before',
            'default' => __('Button Text', 'themesflat'),
            'dynamic' => [
                'active' => true,
            ],
        ]);

        $this->add_control('link', [
            'label' => __('Link', 'elementor'),
            'type' => \Elementor\Controls_Manager::URL,
            'dynamic' => [
                'active' => true,
            ],
            'placeholder' => __('https://your-link.com', 'elementor'),
            'default' => [
                'url' => '#',
            ],
        ]);

        $this->add_responsive_control(
            'tfl_align',
            [
                'label' => esc_html__( 'Alignment', 'blogar' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'blogar' ),
                        'icon' => 'fa fa-align-left eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'blogar' ),
                        'icon' => 'fa fa-align-center eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'blogar' ),
                        'icon' => 'fa fa-align-right eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section('section_style', [
            'label' => __('Style', 'themesflat'),
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'heading_typography',
            'label' => __('Typography', 'themesflat'),
            'selector' => '{{WRAPPER}} .tfl-button .tfl-content-wrapper a',
        ]);

        //nomal tab
        $this->start_controls_tabs('button_tabs');

        $this->start_controls_tab(
            'button_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'themesflat-elementor' ),
            ]
        );

        $this->add_control('button_text_color', [
            'label' => __('Color', 'themesflat'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tfl-button .tfl-content-wrapper a span.text' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_control('button_bg_color', [
            'label' => __('Background Color', 'themesflat'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tfl-button .tfl-content-wrapper a' => 'background: {{VALUE}};',
            ],
        ]);

        $this->end_controls_tab();

        //hover tab
        $this->start_controls_tab(
            'button_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'themesflat-elementor' ),
            ]
        );

        $this->add_control('button_text_hover_color', [
            'label' => __('Color', 'themesflat'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tfl-button .tfl-content-wrapper a:hover span.text' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_control('button_hover_bg_color', [
            'label' => __('Background Color', 'themesflat'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tfl-button .tfl-content-wrapper a:hover' => 'background: {{VALUE}};',
            ],
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $settings = apply_filters('tfl_button_' . $this->get_id() . '_settings', $settings);
        $args['settings'] = $settings;
        $args['widget_instance'] = $this;
        tfl_get_template_part("button/{$settings['style']}", $args);
    }

    protected function content_template()
    {
    }

}