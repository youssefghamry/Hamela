<?php

class TFTeam_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'tfteam';
    }

    public function get_title()
    {
        return esc_html__('TF Team', 'themesflat-addons');
    }

    public function get_icon()
    {
        return 'eicon-person';
    }

    public function get_categories()
    {
        return ['themesflat_addons'];
    }

    protected function register_controls()
    {
        // Start Team Setting        
        $this->start_controls_section(
            'section_team',
            [
                'label' => esc_html__('Information Team', 'themesflat-addons'),
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__('Choose Image', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => URL_THEMESFLAT_ADDONS . "assets/img/member-demo1.jpg",
                ],
            ]
        );

        $this->add_control(
            'team_name',
            [
                'label' => esc_html__('Name', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Bin Nizam Galib',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'team_position',
            [
                'label' => esc_html__('Position', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Developer',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'team_description',
            [
                'label' => esc_html__('Short Description', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => '',
                'label_block' => true,
            ]
        );

        $this->end_controls_section();
        // /.End Team Setting

        // Start Team Social        
        $this->start_controls_section(
            'section_team_social',
            [
                'label' => esc_html__('Social', 'themesflat-addons'),
            ]
        );
        $this->add_control(
            'show_social',
            [
                'label' => esc_html__('Show Social', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'themesflat-addons'),
                'label_off' => esc_html__('Hide', 'themesflat-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'social_icon',
            [
                'label' => esc_html__('Social Icon', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'facebook-f',
                'options' => [
                    '500px' => esc_html__('500px', 'themesflat-addons'),
                    'apple' => esc_html__('Apple', 'themesflat-addons'),
                    'behance' => esc_html__('Behance', 'themesflat-addons'),
                    'bitbucket' => esc_html__('BitBucket', 'themesflat-addons'),
                    'codepen' => esc_html__('CodePen', 'themesflat-addons'),
                    'delicious' => esc_html__('Delicious', 'themesflat-addons'),
                    'deviantart' => esc_html__('DeviantArt', 'themesflat-addons'),
                    'digg' => esc_html__('Digg', 'themesflat-addons'),
                    'dribbble' => esc_html__('Dribbble', 'themesflat-addons'),
                    'envelope' => esc_html__('Email', 'themesflat-addons'),
                    'facebook-f' => esc_html__('Facebook', 'themesflat-addons'),
                    'flickr' => esc_html__('Flicker', 'themesflat-addons'),
                    'foursquare' => esc_html__('FourSquare', 'themesflat-addons'),
                    'github' => esc_html__('Github', 'themesflat-addons'),
                    'houzz' => esc_html__('Houzz', 'themesflat-addons'),
                    'instagram' => esc_html__('Instagram', 'themesflat-addons'),
                    'jsfiddle' => esc_html__('JS Fiddle', 'themesflat-addons'),
                    'linkedin' => esc_html__('LinkedIn', 'themesflat-addons'),
                    'medium' => esc_html__('Medium', 'themesflat-addons'),
                    'pinterest' => esc_html__('Pinterest', 'themesflat-addons'),
                    'product-hunt' => esc_html__('Product Hunt', 'themesflat-addons'),
                    'reddit' => esc_html__('Reddit', 'themesflat-addons'),
                    'slideshare' => esc_html__('Slide Share', 'themesflat-addons'),
                    'snapchat' => esc_html__('Snapchat', 'themesflat-addons'),
                    'soundcloud' => esc_html__('SoundCloud', 'themesflat-addons'),
                    'spotify' => esc_html__('Spotify', 'themesflat-addons'),
                    'stack-overflow' => esc_html__('StackOverflow', 'themesflat-addons'),
                    'tripadvisor' => esc_html__('TripAdvisor', 'themesflat-addons'),
                    'tumblr' => esc_html__('Tumblr', 'themesflat-addons'),
                    'twitch' => esc_html__('Twitch', 'themesflat-addons'),
                    'twitter' => esc_html__('Twitter', 'themesflat-addons'),
                    'vimeo' => esc_html__('Vimeo', 'themesflat-addons'),
                    'vk' => esc_html__('VK', 'themesflat-addons'),
                    'website' => esc_html__('Website', 'themesflat-addons'),
                    'whatsapp' => esc_html__('WhatsApp', 'themesflat-addons'),
                    'wordpress' => esc_html__('WordPress', 'themesflat-addons'),
                    'xing' => esc_html__('Xing', 'themesflat-addons'),
                    'yelp' => esc_html__('Yelp', 'themesflat-addons'),
                    'youtube' => esc_html__('YouTube', 'themesflat-addons'),
                    'google-plus-g' => esc_html__('Google', 'themesflat-addons'),
                ],
            ]
        );

        $repeater->add_control(
            'social_link',
            [
                'label' => esc_html__('Link', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'is_external' => 'true',
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com', 'themesflat-addons'),
            ]
        );

        $repeater->start_controls_tabs(
            'social_tabs'
        );

        $repeater->start_controls_tab(
            'social_normal_tab',
            [
                'label' => esc_html__('Normal', 'themesflat-addons'),
            ]
        );

        $repeater->add_control(
            'icon_background_color',
            [
                'label' => esc_html__('Background Color', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#E7E7E8',
                'selectors' => [
                    '{{WRAPPER}} .team-box-social {{CURRENT_ITEM}}.social' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $repeater->add_control(
            'icon_color',
            [
                'label' => esc_html__('Icon Color', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .team-box-social {{CURRENT_ITEM}}.social' => 'color: {{VALUE}};',
                ],
            ]
        );

        $repeater->end_controls_tab();

        $repeater->start_controls_tab(
            'social_hover_tab',
            [
                'label' => esc_html__('Hover', 'themesflat-addons'),
            ]
        );

        $repeater->add_control(
            'icon_background_color_hover',
            [
                'label' => esc_html__('Background Color', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#FFA800',
                'selectors' => [
                    '{{WRAPPER}} .team-box-social {{CURRENT_ITEM}}.social:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $repeater->add_control(
            'icon_color_hover',
            [
                'label' => esc_html__('Icon Color', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .team-box-social {{CURRENT_ITEM}}.social:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $repeater->end_controls_tab();

        $repeater->end_controls_tabs();

        $this->add_control(
            'social_icon_list',
            [
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'social_icon' => 'facebook',
                        'social_link' => ['url' => 'https://facebook.com/'],
                        'icon_background_color' => '#E7E7E8',
                        'icon_color' => '#11161E',
                        'icon_background_color_hover' => '#FFA800',
                    ],
                    [
                        'social_icon' => 'twitter',
                        'social_link' => ['url' => 'https://twitter.com/'],
                        'icon_background_color' => '#E7E7E8',
                        'icon_color' => '#11161E',
                        'icon_background_color_hover' => '#FFA800',
                    ],
                    [
                        'social_icon' => 'youtube',
                        'social_link' => ['url' => 'https://www.youtube.com/'],
                        'icon_background_color' => '#E7E7E8',
                        'icon_color' => '#11161E',
                        'icon_background_color_hover' => '#FFA800',
                    ],
                ],
                'title_field' => '<# print(social_icon.slice(0,1).toUpperCase() + social_icon.slice(1)) #>',
            ]
        );
        $this->end_controls_section();
        // /.End Team Social

        // Start Team General        
        $this->start_controls_section(
            'section_team_style',
            [
                'label' => esc_html__('General', 'themesflat-addons'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'style',
            [
                'label' => esc_html__('Style', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'style-1',
                'options' => [
                    'style-1' => esc_html__('Style 1 ( Default )', 'themesflat-addons'),
                ],
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' => esc_html__('Alignment', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'themesflat-addons'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'themesflat-addons'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'themesflat-addons'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .tf-team, {{WRAPPER}} .tf-team' => 'text-align: {{VALUE}};text-align: -webkit-{{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'padding',
            [
                'label' => esc_html__('Padding', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'default' => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '0',
                    'left' => '0',
                    'unit' => 'px',
                    'isLinked' => 'true',
                ],
                'selectors' => [
                    '{{WRAPPER}} .tf-team' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'margin',
            [
                'label' => esc_html__('Margin', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'default' => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '0',
                    'left' => '0',
                    'unit' => 'px',
                    'isLinked' => 'true',
                ],
                'selectors' => [
                    '{{WRAPPER}} .tf-team' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => esc_html__('Box Shadow', 'themesflat-addons'),
                'selector' => '{{WRAPPER}} .tf-team',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => esc_html__('Border', 'themesflat-addons'),
                'selector' => '{{WRAPPER}} .tf-team',
            ]
        );

        $this->add_responsive_control(
            'border_radius',
            [
                'label' => esc_html__('Border Radius', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .tf-team' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label' => esc_html__('Background Color', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .tf-team' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
        // /.End Team General

        // Start Avatar Style
        $this->start_controls_section(
            'section_style_image',
            [
                'label' => esc_html__('Avatar', 'themesflat-addons'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'image_width',
            [
                'label' => esc_html__('Width', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .tf-team .team-image' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .tf-team.style-3 .team-content' => 'width: calc( 100% - {{SIZE}}{{UNIT}} );',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_bottom_spacing',
            [
                'label' => esc_html__('Bottom Spacing', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tf-team .team-image' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'label' => esc_html__('Border', 'themesflat-addons'),
                'selector' => '{{WRAPPER}} .tf-team .team-image',
            ]
        );

        $this->add_responsive_control(
            'image_border_radius',
            [
                'label' => esc_html__('Border Radius', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .tf-team .team-image, {{WRAPPER}} .tf-team .team-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'image_padding',
            [
                'label' => esc_html__('Padding', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .tf-team .team-image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'image_margin',
            [
                'label' => esc_html__('Margin', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .tf-team .team-image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        // /.End Avatar Style

        // Start Content Style
        $this->start_controls_section(
            'section_team_content',
            [
                'label' => esc_html__('Content', 'themesflat-addons'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'content_padding',
            [
                'label' => esc_html__('Padding', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'default' => [
                    'top' => '25',
                    'right' => '0',
                    'bottom' => '35',
                    'left' => '0',
                    'unit' => 'px',
                    'isLinked' => 'false',
                ],
                'selectors' => [
                    '{{WRAPPER}} .tf-team .team-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_margin',
            [
                'label' => esc_html__('Margin', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .tf-team .team-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'content_box_shadow',
                'label' => esc_html__('Box Shadow', 'themesflat-addons'),
                'selector' => '{{WRAPPER}} .tf-team .team-content',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'content_border',
                'label' => esc_html__('Border', 'themesflat-addons'),
                'selector' => '{{WRAPPER}} .tf-team .team-content',
            ]
        );

        $this->add_responsive_control(
            'content_border_radius',
            [
                'label' => esc_html__('Border Radius', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .tf-team .team-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'content_background_color',
            [
                'label' => esc_html__('Background Color', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .tf-team .team-content' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'content_effect',
            [
                'label' => esc_html__('Effect', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'fade-in',
                'options' => [
                    'default' => esc_html__('Default', 'themesflat-addons'),
                    'fade-in' => esc_html__('Fade In', 'themesflat-addons'),
                    'fade-in-up' => esc_html__('Fade In Up', 'themesflat-addons'),
                    'fade-in-down' => esc_html__('Fade In Down', 'themesflat-addons'),
                    'fade-in-left' => esc_html__('Fade In Left', 'themesflat-addons'),
                    'fade-in-right' => esc_html__('Fade In Right', 'themesflat-addons'),
                ],
                'condition' => [
                    'style' => 'style-2',
                ]
            ]
        );

        $this->end_controls_section();
        // /.End Content Style

        // Start Name Position Description Style
        $this->start_controls_section(
            'section_style_name_position_description',
            [
                'label' => esc_html__('Name, Position & Description', 'themesflat-addons'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'name_html_tag',
            [
                'label' => esc_html__('Html Tag', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'h5',
                'options' => [
                    'h1' => esc_html__('H1', 'themesflat-addons'),
                    'h2' => esc_html__('H2', 'themesflat-addons'),
                    'h3' => esc_html__('H3', 'themesflat-addons'),
                    'h4' => esc_html__('H4', 'themesflat-addons'),
                    'h5' => esc_html__('H5', 'themesflat-addons'),
                    'h6' => esc_html__('H6', 'themesflat-addons'),
                ],
            ]
        );

        $this->add_control(
            'heading_name',
            [
                'label' => esc_html__('Name', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::HEADING,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'name_typography',
                'label' => esc_html__('Typography', 'themesflat-addons'),
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_family' => [
                        'default' => 'Oswald',
                    ],
                    'font_size' => [
                        'default' => [
                            'unit' => 'px',
                            'size' => '18',
                        ],
                    ],
                    'font_weight' => [
                        'default' => '600',
                    ],
                    'line_height' => [
                        'default' => [
                            'unit' => 'px',
                            'size' => '24',
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
                'selector' => '{{WRAPPER}} .tf-team .team-content .team-name',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'name_text_shadow',
                'label' => esc_html__('Text Shadow', 'themesflat-addons'),
                'selector' => '{{WRAPPER}} .tf-team .team-content .team-name',
            ]
        );

        $this->add_control(
            'name_color',
            [
                'label' => esc_html__('Color', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .tf-team .team-content .team-name' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'name_spacer',
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
                    'size' => 8

                ],
                'selectors' => [
                    '{{WRAPPER}} .tf-team .team-name' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'heading_position',
            [
                'label' => esc_html__('Position', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'position_typography',
                'label' => esc_html__('Typography', 'themesflat-addons'),
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_family' => [
                        'default' => 'Oswald',
                    ],
                    'font_size' => [
                        'default' => [
                            'unit' => 'px',
                            'size' => '14',
                        ],
                    ],
                    'font_weight' => [
                        'default' => '400',
                    ],
                    'line_height' => [
                        'default' => [
                            'unit' => 'px',
                            'size' => '24',
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
                'selector' => '{{WRAPPER}} .tf-team .team-position',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'position_text_shadow',
                'label' => esc_html__('Text Shadow', 'themesflat-addons'),
                'selector' => '{{WRAPPER}} .tf-team .team-position',
            ]
        );

        $this->add_control(
            'position_color',
            [
                'label' => esc_html__('Color', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .tf-team .team-position' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'position_spacer',
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
                    'size' => 10

                ],
                'selectors' => [
                    '{{WRAPPER}} .tf-team .team-position' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'heading_description',
            [
                'label' => esc_html__('Description', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => esc_html__('Typography', 'themesflat-addons'),
                'selector' => '{{WRAPPER}} .tf-team .team-desc',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'description_text_shadow',
                'label' => esc_html__('Text Shadow', 'themesflat-addons'),
                'selector' => '{{WRAPPER}} .tf-team .team-desc',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Color', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .tf-team .team-desc' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'description_spacer',
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
                    'size' => 10

                ],
                'selectors' => [
                    '{{WRAPPER}} .tf-team .team-desc' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        // /.End Name Position Description Style

        // Start Social Style
        $this->start_controls_section(
            'section_style_social',
            [
                'label' => esc_html__('Social', 'themesflat-addons'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'social_icon_size',
            [
                'label' => esc_html__('Font Size', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'unit' => 'px',
                    'size' => 14,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tf-team .team-box-social .social' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'social_padding',
            [
                'label' => esc_html__('Padding', 'themesflat-addons'),
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
                    'size' => 15,
                ],
                'selectors' => [
                    '{{WRAPPER}} .tf-team .team-box-social .social' => 'padding: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'socials_background_color',
            [
                'label' => esc_html__('Background Color', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .tf-team .team-image .outter-team-box-social .inner-team-box-social ul.team-box-social' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'social_spacer',
            [
                'label' => esc_html__('Spacer', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 5,
                ],
                'selectors' => [
                    '{{WRAPPER}} .tf-team .team-box-social .social' => 'margin: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .tf-team .team-box-social' => 'margin: 0px -{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'social_border',
                'label' => esc_html__('Border', 'themesflat-addons'),
                'selector' => '{{WRAPPER}} .tf-team .team-box-social .social',
            ]
        );

        $this->add_responsive_control(
            'social_border_radius',
            [
                'label' => esc_html__('Border Radius', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'default' => [
                    'top' => '50',
                    'right' => '50',
                    'bottom' => '50',
                    'left' => '50',
                    'unit' => '%',
                ],
                'selectors' => [
                    '{{WRAPPER}} .tf-team .team-box-social .social' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_control(
            'image_detail',
            [
                'label' => esc_html__('Image Detail', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => URL_THEMESFLAT_ADDONS . "assets/img/big-detail1.svg",
                ],
            ]
        );

        $this->end_controls_section();
        // /.End Social Style

    }

    protected function render($instance = [])
    {
        $settings = $this->get_settings_for_display();


        ?>
        <div class="tf-team <?php echo esc_attr($settings['style']) ?>">
            <div class="team-image">
                <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html($settings, 'full', 'image'); ?>
                <div class="image-overlay <?php //echo esc_attr($settings['image_overlay_effect']); ?>"></div>



                <?php if ($settings['show_social'] == 'yes') : ?>
                    <div class="outter-team-box-social">
                        <div class="inner-team-box-social">
                            <ul class="team-box-social <?php //echo esc_attr($settings['social_h_v']) ?> <?php //echo esc_attr($settings['social_h_v_align']) ?> ">
                                <?php
                                foreach ($settings['social_icon_list'] as $value) {
                                    $class_icon = 'social elementor-repeater-item-' . $value['_id'];
                                    ?>
                                    <li><a href="<?php echo esc_attr($value['social_link']['url']) ?>"
                                           class="<?php echo esc_attr($class_icon); ?>">
                                            <i class="fab fa-<?php echo esc_attr($value['social_icon']); ?>"></i>
                                        </a></li>
                                <?php } ?>

                            </ul>
                            <div class="big-detail">
                                <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html($settings, 'full', 'image_detail'); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>

            <div class="team-content <?php echo esc_attr($settings['content_effect']) ?>">
                <?php if ($settings['team_name'] != ''): ?>
                <<?php echo esc_attr($settings['name_html_tag']) ?>
                class="team-name"><?php echo esc_attr($settings['team_name']); ?></<?php echo esc_attr($settings['name_html_tag']) ?>
            >
            <?php endif ?>
            <?php if ($settings['team_position'] != ''): ?>
                <div class="team-position"><?php echo esc_attr($settings['team_position']); ?></div>
            <?php endif ?>
            <?php if ($settings['team_description'] != ''): ?>
                <div class="team-desc"><?php echo esc_attr($settings['team_description']); ?></div>
            <?php endif ?>
        </div>

        </div>
        <?php
    }

    protected function content_template()
    {
    }

}