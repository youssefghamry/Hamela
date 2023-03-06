<?php
class TFPieChart_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tfpiechart';
    }
    
    public function get_title() {
        return esc_html__( 'TF Pie Chart', 'themesflat-addons' );
    }

    public function get_icon() {
        return 'fa fa-pie-chart';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_script_depends() {
        return ['tf-appear', 'tf-piechart'];
    }

	protected function register_controls() {
        // Start Setting
            $this->start_controls_section( 
                    'section_setting',
                    [
                        'label' => esc_html__('Setting', 'themesflat-addons'),
                    ]
                );

                $this->add_control(
                    'piechart_style',
                    [
                        'label' => esc_html__( 'Pie Chart Style', 'themesflat-addons' ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'simple',
                        'options' => [
                            'simple'  => esc_html__( 'Simple', 'themesflat-addons' ),
                            'withcontent' => esc_html__( 'With Content', 'themesflat-addons' ),
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'piechart_percentage',
                    [
                        'label' => esc_html__( 'Percentage', 'themesflat-addons' ),
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                        'default' => 50,
                    ]
                );

                $this->add_control(
                    'piechart_title',
                    [
                        'label' => esc_html__( 'Title', 'themesflat-addons' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__( 'Default title', 'themesflat-addons' ),
                        'placeholder' => esc_html__( 'Type your title here', 'themesflat-addons' ),
                        'label_block' => true,
                        'condition' => [
                            'piechart_style' => 'withcontent'
                        ]
                    ]
                );

                $this->add_control(
                    'piechart_description',
                    [
                        'label' => esc_html__( 'Description', 'themesflat-addons' ),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'rows' => 10,
                        'default' => esc_html__( 'Default description', 'themesflat-addons' ),
                        'placeholder' => esc_html__( 'Type your description here', 'themesflat-addons' ),
                        'label_block' => true,
                        'condition' => [
                            'piechart_style' => 'withcontent'
                        ]
                    ]
                );

            $this->end_controls_section();
        // /.End Setting

        // Start Style Chart
            $this->start_controls_section( 
                    'section_style_chart',
                    [
                        'label' => esc_html__('Chart', 'themesflat-addons'),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    ]
                );

            $this->add_responsive_control(
                'piechart_size',
                [
                    'label' => esc_html__( 'Piechart Size', 'themesflat-addons' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 100,
                            'max' => 250,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'size' => 150,
                    ],
                ]
            );
            $this->add_responsive_control(
                'piechart_border_size',
                [
                    'label' => esc_html__( 'Border Size', 'themesflat-addons' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 1,
                            'max' => 50,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 5,
                    ],
                ]
            );  

            $this->add_responsive_control(
                'piechart_line_color',
                [
                    'label' => esc_html__( 'Bar Color', 'themesflat-addons' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#000000',
                ]
            );

            $this->add_responsive_control(
                'piechart_bar_color_bg',
                [
                    'label' => esc_html__( 'Bar Background Color', 'themesflat-addons' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#f7f7f7',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'number_typography',
                    'label' => esc_html__( 'Typography', 'themesflat-addons' ),
                    'selector' => '{{WRAPPER}} .tf-pie-chart .pie-chart .percent',
                ]
            );

            $this->add_responsive_control(
                'number_color',
                [
                    'label' => esc_html__( 'Number Color', 'themesflat-addons' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#000000',
                    'selectors' => [
                        '{{WRAPPER}} .tf-pie-chart .pie-chart .percent' => 'color: {{VALUE}}',
                    ],
                ]
            );  

            $this->end_controls_section();
        // /.End Style Title

        // Start Style Title
            $this->start_controls_section( 
                    'section_style_title',
                    [
                        'label' => esc_html__('Title', 'themesflat-addons'),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                        'condition' => [
                            'piechart_style' => 'withcontent'
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'piechart_title_color',
                    [
                        'label' => esc_html__( 'Title Color', 'themesflat-addons' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .tf-piechart-title' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'piechart_title_typography',
                        'label' => esc_html__( 'Title Typography', 'themesflat-addons' ),
                        'selector' => '{{WRAPPER}} .tf-piechart-title',
                    ]
                );

                $this->add_responsive_control(
                    'piechart_title_margin',
                    [
                        'label' =>esc_html__( 'Title margin', 'themesflat-addons' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', 'em', '%' ],
                        'default' =>    [
                            'top' => '20',
                            'right' => '0',
                            'bottom' => '5',
                            'left' => '0',
                            'unit' => 'px',
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .tf-piechart-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

            $this->end_controls_section();
        // /.End Style Title

        // Start Style Description
            $this->start_controls_section( 
                    'section_style_description',
                    [
                        'label' => esc_html__('Description', 'themesflat-addons'),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                        'condition' => [
                            'piechart_style' => 'withcontent'
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'piechart_description_color',
                    [
                        'label' => esc_html__( 'Description Color', 'themesflat-addons' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .tf-piechart-description' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'piechart_description_typography',
                        'label' => esc_html__( 'Description Typography', 'themesflat-addons' ),
                        'selector' => '{{WRAPPER}} .tf-piechart-description',
                    ]
                );

            $this->end_controls_section();
        // /.End Style Description
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();		
		?>
        <div class="tf-pie-chart">
            <div class="pie-chart">
                <div class="chart-percent">
                    <span class="chart" data-percent="<?php echo esc_attr($settings['piechart_percentage']); ?>" data-width="<?php echo esc_attr($settings['piechart_border_size']['size']); ?>" data-size="<?php echo esc_attr($settings['piechart_size']['size']); ?>" data-color="<?php echo esc_attr($settings['piechart_line_color']); ?>" data-trackcolor="<?php echo esc_attr($settings['piechart_bar_color_bg']); ?>">
                        <span class="percent"></span>
                    </span>
                </div>
            </div>
            <?php if ($settings['piechart_style'] == 'withcontent'): ?>
                <div class="pie-chart-content">
                    <h2 class="tf-piechart-title"><?php echo esc_attr($settings['piechart_title']); ?></h2>
                    <p class="tf-piechart-description"><?php echo esc_attr($settings['piechart_description']); ?></p>
                </div>
            <?php endif; ?>
        </div>
        <?php
	}

	protected function content_template() {}

}