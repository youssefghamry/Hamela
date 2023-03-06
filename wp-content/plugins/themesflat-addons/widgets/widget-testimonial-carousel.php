<?php
class TFTestimonialCarousel_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-testimonial-carousel';
    }
    
    public function get_title() {
        return esc_html__( 'TF Testimonial', 'themesflat-elementor' );
    }

    public function get_icon() {
        return 'eicon-slider-push';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['owl-carousel','tf-testimonial'];
	}

	public function get_script_depends() {
		return ['owl-carousel','tf-testimonial'];
	}

	protected function register_controls() {
        // Start Carousel Setting        
			$this->start_controls_section( 
				'section_carousel',
	            [
	                'label' => esc_html__('Testimonial Carousel', 'themesflat-elementor'),
	            ]
	        );

	        $this->add_control(
				'testimonial_style',
				[
					'label' => esc_html__( 'Layout Style', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'style-1',
					'options' => [
						'style-1'  => esc_html__( 'Style 1', 'themesflat-elementor' ),
//						'style-2' => esc_html__( 'Style 2', 'themesflat-elementor' ),
					],
				]
			);	    

			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'image',
				[
					'label' => esc_html__( 'Choose Image', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => URL_THEMESFLAT_ADDONS."assets/img/quote.png",
					],
				]
			);

			$repeater->add_control(
				'name',
				[
					'label' => esc_html__( 'Name', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Kamrul Islam', 'themesflat-elementor' ),
					'placeholder' => esc_html__( 'Type your title here', 'themesflat-elementor' ),
				]
			);

			$repeater->add_control(
				'position',
				[
					'label' => esc_html__( 'Position', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Exclusive at UX/UI', 'themesflat-elementor' ),
					'placeholder' => esc_html__( 'Type your title here', 'themesflat-elementor' ),
				]
			);

			$repeater->add_control(
				'description',
				[
					'label' => esc_html__( 'Description', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::WYSIWYG,
					'rows' => 10,
					'default' => esc_html__( 'Pellentesque vel dolor consectetur, ate eros vitae, molestie felis. Vivamus orna reague lorem.', 'themesflat-elementor' ),
					'placeholder' => esc_html__( 'Type your description here', 'themesflat-elementor' ),
				]
			);


			$this->add_control( 
				'carousel_list',
					[					
						'type' => \Elementor\Controls_Manager::REPEATER,
						'fields' => $repeater->get_controls(),
						'default' => [
                            [],[],[],[],[],

						],
					]
				);
			
			$this->end_controls_section();
        // /.End Carousel	

        // Start Style        
			$this->start_controls_section( 
				'section_style',
	            [
	                'label' => esc_html__('Style', 'themesflat-elementor'),
	            ]
	        );	

	        $this->add_control(
				'h_general',
				[
					'label' => esc_html__( 'General', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::HEADING,
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border',
					'label' => esc_html__( 'Border', 'plugin-domain' ),
					'selector' => '{{WRAPPER}} .tf-testimonial-carousel .item-testimonial',
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'box_shadow',
					'label' => esc_html__( 'Box Shadow', 'plugin-domain' ),
					'selector' => '{{WRAPPER}} .tf-testimonial-carousel .item-testimonial, {{WRAPPER}} .tf-testimonial-carousel .owl-carousel .owl-stage-outer',
				]
			);

        $this->add_control(
            'detail_color',
            [
                'label' => esc_html__( 'Detail Color', 'themesflat-elementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffa800',
                'selectors' => [
                    '{{WRAPPER}} .tf-testimonial-carousel .item .name:before' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
				'background',
				[
					'label' => esc_html__( 'Background Color', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#FFFFFF',
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .item-testimonial' => 'background-color: {{VALUE}}',
					],
				]
			);
			$this->add_responsive_control(
				'padding',
				[
					'label' => esc_html__( 'Padding', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'default' => [
						'top' => '70',
						'right' => '20',
						'bottom' => '67',
						'left' => '30',
						'unit' => 'px',
						'isLinked' => false,
					],
					'selectors' => [
						'{{WRAPPER}}  .tf-testimonial-carousel .item-testimonial' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_responsive_control(
				'margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'default' => [
						'top' => '0',
						'right' => '0',
						'bottom' => '0',
						'left' => '0',
						'unit' => 'px',
						'isLinked' => false,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .item-testimonial' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_responsive_control(
				'border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'default' => [
						'top' => '0',
						'right' => '0',
						'bottom' => '0',
						'left' => '0',
						'unit' => 'px',
						'isLinked' => false,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .owl-carousel .owl-stage-outer' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

	        $this->add_control(
				'h_name',
				[
					'label' => esc_html__( 'Name', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'name_typography',
					'label' => esc_html__( 'Typography', 'themesflat-elementor' ),
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
				            'default' => '700',
				        ],
				        'line_height' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '27',
				            ],
				        ],
				        'text_transform' => [
							'default' => 'uppercase',
						],
						'letter_spacing' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '0',
				            ],
				        ],
				    ],
					'selector' => '{{WRAPPER}} .tf-testimonial-carousel .item .name',
				]
			);
			$this->add_control(
				'name_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#11161e',
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .item .name' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_responsive_control(
				'name_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'default' => [
						'top' => '0',
						'right' => '0',
						'bottom' => '0',
						'left' => '0',
						'unit' => 'px',
						'isLinked' => false,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .item .name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

        $this->add_responsive_control(
            'name_padding',
            [
                'label' => esc_html__( 'Padding', 'themesflat-elementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'default' => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '0',
                    'left' => '10',
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .tf-testimonial-carousel .item .name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

			$this->add_control(
				'h_position',
				[
					'label' => esc_html__( 'Position', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'position_typography',
					'label' => esc_html__( 'Typography', 'themesflat-elementor' ),
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
				                'size' => '18',
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
					'selector' => '{{WRAPPER}} .tf-testimonial-carousel .item .position',
				]
			);
			$this->add_control(
				'position_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#777',
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .item .position' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_responsive_control(
				'position_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'default' => [
						'top' => "3",
						'right' => "0",
						'bottom' => "0",
						'left' => "0",
						'unit' => 'px',
						'isLinked' => false,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .item .position' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

        $this->add_responsive_control(
            'position_padding',
            [
                'label' => esc_html__( 'Padding', 'themesflat-elementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'default' => [
                    'top' => "0",
                    'right' => "0",
                    'bottom' => "0",
                    'left' => "10",
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .tf-testimonial-carousel .item .position' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

			$this->add_control(
				'h_description',
				[
					'label' => esc_html__( 'Description', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'description_typography',
					'label' => esc_html__( 'Typography', 'themesflat-elementor' ),
					'fields_options' => [
				        'typography' => ['default' => 'yes'],
				        'font_family' => [
				            'default' => 'Oswald',
				        ],
				        'font_size' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '24',
				            ],
				        ],
				        'font_weight' => [
				            'default' => '300',
				        ],
				        'line_height' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '32',
				            ],
				        ],
				        'text_transform' => [
							'default' => '',
						],
                        'text_decoration' => [
                            'default' => 'underline',
                        ],
						'letter_spacing' => [
				            'default' => [
				                'unit' => 'px',
				                'size' => '0',
				            ],
				        ],
				    ],
					'selector' => '{{WRAPPER}} .tf-testimonial-carousel .item .description',
				]
			);
			$this->add_control(
				'description_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#11161e',
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .item .description' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_responsive_control(
				'description_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'default' => [
						'top' => "22",
						'right' => "0",
						'bottom' => "51",
						'left' => "0",
						'unit' => 'px',
						'isLinked' => false,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .item .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

	        $this->end_controls_section();
        // /.End Style

        // Start Setting        
			$this->start_controls_section( 
				'section_setting',
	            [
	                'label' => esc_html__('Setting', 'themesflat-elementor'),
	            ]
	        );	

			$this->add_control( 
				'carousel_loop',
				[
					'label' => esc_html__( 'Loop', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'On', 'themesflat-elementor' ),
					'label_off' => esc_html__( 'Off', 'themesflat-elementor' ),
					'return_value' => 'yes',
					'default' => 'yes',				
				]
			);

			$this->add_control( 
				'carousel_auto',
				[
					'label' => esc_html__( 'Auto Play', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'On', 'themesflat-elementor' ),
					'label_off' => esc_html__( 'Off', 'themesflat-elementor' ),
					'return_value' => 'yes',
					'default' => 'yes',				
				]
			);	

			$this->add_control(
				'carousel_spacer',
				[
					'label' => esc_html__( 'Spacer', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'min' => 0,
					'max' => 100,
					'step' => 1,
					'default' => 30,				
				]
			);

			$this->add_control( 
	        	'carousel_column_desk',
				[
					'label' => esc_html__( 'Columns Desktop', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => '3',
					'options' => [
						'1' => esc_html__( '1', 'themesflat-elementor' ),
						'2' => esc_html__( '2', 'themesflat-elementor' ),
						'3' => esc_html__( '3', 'themesflat-elementor' ),
						'4' => esc_html__( '4', 'themesflat-elementor' ),
					],				
				]
			);

			$this->add_control( 
	        	'carousel_column_tablet',
				[
					'label' => esc_html__( 'Columns Tablet', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => '1',
					'options' => [
						'1' => esc_html__( '1', 'themesflat-elementor' ),
						'2' => esc_html__( '2', 'themesflat-elementor' ),
						'3' => esc_html__( '3', 'themesflat-elementor' ),
						'4' => esc_html__( '4', 'themesflat-elementor' ),
						'5' => esc_html__( '5', 'themesflat-elementor' ),
						'6' => esc_html__( '6', 'themesflat-elementor' ),
					],				
				]
			);

			$this->add_control( 
	        	'carousel_column_mobile',
				[
					'label' => esc_html__( 'Columns Mobile', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => '1',
					'options' => [
						'1' => esc_html__( '1', 'themesflat-elementor' ),
						'2' => esc_html__( '2', 'themesflat-elementor' ),
						'3' => esc_html__( '3', 'themesflat-elementor' ),
						'4' => esc_html__( '4', 'themesflat-elementor' ),
						'5' => esc_html__( '5', 'themesflat-elementor' ),
						'6' => esc_html__( '6', 'themesflat-elementor' ),
					],				
				]
			);		
	        $this->end_controls_section();
        // /.End Setting

        // Start Arrow        
			$this->start_controls_section( 
				'section_arrow',
	            [
	                'label' => esc_html__('Arrow', 'themesflat-elementor'),
	            ]
	        );

	        $this->add_control( 
				'carousel_arrow',
				[
					'label' => esc_html__( 'Arrow', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-elementor' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-elementor' ),
					'return_value' => 'yes',
					'default' => 'no',				
					'description'	=> 'Just show when you have two slide',
					'separator' => 'before',
				]
			);

	        $this->add_control( 
				'carousel_prev_icon', [
	                'label' => esc_html__( 'Prev Icon', 'themesflat-elementor' ),
	                'type' => \Elementor\Controls_Manager::ICON,
	                'default' => 'fa fa-chevron-left',
	                'include' => [
						'fa fa-angle-double-left',
						'fa fa-angle-left',
						'fa fa-chevron-left',
						'fa fa-arrow-left',
					],  
	                'condition' => [                	
	                    'carousel_arrow' => 'yes',
	                ]
	            ]
	        );

	    	$this->add_control( 
	    		'carousel_next_icon', [
	                'label' => esc_html__( 'Next Icon', 'themesflat-elementor' ),
	                'type' => \Elementor\Controls_Manager::ICON,
	                'default' => 'fa fa-chevron-right',
	                'include' => [
						'fa fa-angle-double-right',
						'fa fa-angle-right',
						'fa fa-chevron-right',
						'fa fa-arrow-right',
					], 
	                'condition' => [                	
	                    'carousel_arrow' => 'yes',
	                ]
	            ]
	        );

	        $this->add_responsive_control( 
	        	'carousel_arrow_fontsize',
				[
					'label' => esc_html__( 'Font Size', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						]
					],
					'default' => [
						'unit' => 'px',
						'size' => 12,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next' => 'font-size: {{SIZE}}{{UNIT}};',
					],
					'condition' => [					
	                    'carousel_arrow' => 'yes',
	                ]
				]
			);

			$this->add_responsive_control( 
				'w_size_carousel_arrow',
				[
					'label' => esc_html__( 'Width', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 200,
							'step' => 1,
						]
					],
					'default' => [
						'unit' => 'px',
						'size' => 46,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next' => 'width: {{SIZE}}{{UNIT}};',
					],
					'condition' => [					
	                    'carousel_arrow' => 'yes',
	                ]
				]
			);

			$this->add_responsive_control( 
				'h_size_carousel_arrow',
				[
					'label' => esc_html__( 'Height', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 200,
							'step' => 1,
						]
					],
					'default' => [
						'unit' => 'px',
						'size' => 46,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
					],
					'condition' => [					
	                    'carousel_arrow' => 'yes',
	                ]
				]
			);	

			$this->add_responsive_control( 
				'carousel_arrow_horizontal_position_prev',
				[
					'label' => esc_html__( 'Horizontal Position Previous', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => -2000,
							'max' => 2000,
							'step' => 1,
						],
						'%' => [
							'min' => -100,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => '%',
						'size' => 0,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev' => 'left: {{SIZE}}{{UNIT}};',
					],
					'condition' => [					
	                    'carousel_arrow' => 'yes',
	                ]
				]
			);

			$this->add_responsive_control( 
				'carousel_arrow_horizontal_position_next',
				[
					'label' => esc_html__( 'Horizontal Position Next', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => -2000,
							'max' => 2000,
							'step' => 1,
						],
						'%' => [
							'min' => -100,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 0,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next' => 'right: {{SIZE}}{{UNIT}};',
					],
					'condition' => [					
	                    'carousel_arrow' => 'yes',
	                ]
				]
			);

			$this->add_responsive_control( 
				'carousel_arrow_vertical_position',
				[
					'label' => esc_html__( 'Vertical Position', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => -1000,
							'max' => 1000,
							'step' => 1,
						],
						'%' => [
							'min' => -100,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => '%',
						'size' => 50,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next' => 'top: {{SIZE}}{{UNIT}};',
					],
					'condition' => [					
	                    'carousel_arrow' => 'yes',
	                ]
				]
			);

			$this->start_controls_tabs( 
				'carousel_arrow_tabs',
				[
					'condition' => [
		                'carousel_arrow' => 'yes',	                
		            ]
				] );

				$this->start_controls_tab( 
					'carousel_arrow_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'themesflat-elementor' ),						
					]
				);

				$this->add_control( 
					'carousel_arrow_color',
		            [
		                'label' => esc_html__( 'Color', 'themesflat-elementor' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		                'default' => '#ffffff',
		                'selectors' => [
							'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next' => 'color: {{VALUE}}',
						],
						'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
		            ]
		        );

		        $this->add_control( 
		        	'carousel_arrow_bg_color',
		            [
		                'label' => esc_html__( 'Background Color', 'themesflat-elementor' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		                'default' => '#ffa800',
		                'selectors' => [
							'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next' => 'background-color: {{VALUE}};',
						],
						'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
		            ]
		        );	

		        $this->add_group_control( 
		        	\Elementor\Group_Control_Border::get_type(),
					[
						'name' => 'carousel_arrow_border',
						'label' => esc_html__( 'Border', 'themesflat-elementor' ),
						'selector' => '{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next',
						'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
					]
				);

				$this->add_responsive_control( 
					'carousel_arrow_border_radius',
		            [
		                'label' => esc_html__( 'Border Radius Previous', 'themesflat-elementor' ),
		                'type' => \Elementor\Controls_Manager::DIMENSIONS,
		                'size_units' => [ 'px', '%', 'em' ],
			            'default' => [
							'top' => "0",
							'right' => "0",
							'bottom' => "0",
							'left' => "0",
							'unit' => 'px',
							'isLinked' => true,
						],
		                'selectors' => [
		                    '{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		                ],
		                'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
		            ]
		        );

		        $this->end_controls_tab();

		        $this->start_controls_tab( 
			    	'carousel_arrow_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'themesflat-elementor' ),
					]
				);

		    	$this->add_control( 
		    		'carousel_arrow_color_hover',
		            [
		                'label' => esc_html__( 'Color', 'themesflat-elementor' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		                'default' => '#1F242C',
		                'selectors' => [
							'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next:hover' => 'color: {{VALUE}}',
						],
						'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
		            ]
		        );

		        $this->add_control( 
		        	'carousel_arrow_hover_bg_color',
		            [
		                'label' => esc_html__( 'Background Color', 'themesflat-elementor' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		                'default' => '#11161e',
		                'selectors' => [
							'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next:hover' => 'background-color: {{VALUE}};',
						],
						'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
		            ]
		        );

		        $this->add_group_control( 
		        	\Elementor\Group_Control_Border::get_type(),
					[
						'name' => 'carousel_arrow_border_hover',
						'label' => esc_html__( 'Border', 'themesflat-elementor' ),
						'selector' => '{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next:hover',
						'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
					]
				);

				$this->add_responsive_control( 
					'carousel_arrow_border_radius_hover',
		            [
		                'label' => esc_html__( 'Border Radius', 'themesflat-elementor' ),
		                'type' => \Elementor\Controls_Manager::DIMENSIONS,
		                'size_units' => [ 'px', '%', 'em' ],
		                'selectors' => [
		                    '{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		                ],
		                'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
		            ]
		        );

	       		$this->end_controls_tab();

	        $this->end_controls_tabs();

	        $this->end_controls_section();
        // /.End Arrow

        // Start Bullets        
			$this->start_controls_section( 
				'section_bullets',
	            [
	                'label' => esc_html__('Bullets', 'themesflat-elementor'),
	            ]
	        );

			$this->add_control( 
				'carousel_bullets',
	            [
	                'label'         => esc_html__( 'Bullets', 'themesflat-elementor' ),
	                'type'          => \Elementor\Controls_Manager::SWITCHER,
	                'label_on'      => esc_html__( 'Show', 'themesflat-elementor' ),
	                'label_off'     => esc_html__( 'Hide', 'themesflat-elementor' ),
	                'return_value'  => 'yes',
	                'default'       => 'yes',
	                'separator' => 'before',
	            ]
	        );        

			$this->add_responsive_control( 
				'carousel_bullets_horizontal_position',
				[
					'label' => esc_html__( 'Horizonta Offset', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 2000,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => '%',
						'size' => 50,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .owl-dots' => 'left: {{SIZE}}{{UNIT}};',
					],
					'condition' => [					
	                    'carousel_bullets' => 'yes',
	                ]
				]
			);

			$this->add_responsive_control( 
				'carousel_bullets_vertical_position',
				[
					'label' => esc_html__( 'Vertical Offset', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => -200,
							'max' => 1000,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => -82,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .owl-dots' => 'bottom: {{SIZE}}{{UNIT}};',
					],
					'condition' => [					
	                    'carousel_bullets' => 'yes',
	                ]
				]
			);

			$this->add_responsive_control( 
				'carousel_bullets_margin',
				[
					'label' => esc_html__( 'Spacing', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 50,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 10,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot' => 'margin: 0 {{SIZE}}{{UNIT}};',
					],
					'condition' => [
	                    'carousel_bullets' => 'yes',
	                ]
				]
			);

			$this->start_controls_tabs( 
				'carousel_bullets_tabs',
					[
						'condition' => [						
		                    'carousel_bullets' => 'yes',
		                ]
					] );
				$this->start_controls_tab( 
					'carousel_bullets_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'themesflat-elementor' ),						
					]
				);

				$this->add_responsive_control( 
		        	'w_size_carousel_bullets',
						[
							'label' => esc_html__( 'Width', 'themesflat-elementor' ),
							'type' => \Elementor\Controls_Manager::SLIDER,
							'size_units' => [ 'px' ],
							'range' => [
								'px' => [
									'min' => 0,
									'max' => 100,
									'step' => 1,
								]
							],
							'default' => [
								'unit' => 'px',
								'size' => 70,
							],
							'selectors' => [
								'{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot' => 'width: {{SIZE}}{{UNIT}};',
							],
							'condition' => [						
			                    'carousel_bullets' => 'yes',
			                ]
						]
				);			

				$this->add_responsive_control( 
					'h_size_carousel_bullets',
					[
						'label' => esc_html__( 'Height', 'themesflat-elementor' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px' ],
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 100,
								'step' => 1,
							]
						],
						'default' => [
							'unit' => 'px',
							'size' => 5,
						],
						'selectors' => [
							'{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
						],
						'condition' => [					
		                    'carousel_bullets' => 'yes',
		                ]
					]
				);

				$this->add_control( 
					'carousel_bullets_bg_color',
		            [
		                'label' => esc_html__( 'Background Color', 'themesflat-elementor' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		                'default' => '#11161e',
		                'selectors' => [
							'{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot' => 'background-color: {{VALUE}}',
						],
						'condition' => [
		                    'carousel_bullets' => 'yes',
		                ]
		            ]
		        );

		        $this->add_group_control( 
		        	\Elementor\Group_Control_Border::get_type(),
					[
						'name' => 'carousel_bullets_border',
						'label' => esc_html__( 'Border', 'themesflat-elementor' ),
						'selector' => '{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot',						
						'condition' => [
		                    'carousel_bullets' => 'yes',
		                ]
					]
				);

				$this->add_responsive_control( 
					'carousel_bullets_border_radius',
		            [
		                'label' => esc_html__( 'Border Radius', 'themesflat-elementor' ),
		                'type' => \Elementor\Controls_Manager::DIMENSIONS,
		                'size_units' => [ 'px', '%', 'em' ],
		                'default' => [
							'top' => '0',
							'right' => '0',
							'bottom' => '0',
							'left' => '0',
							'unit' => 'px',
							'isLinked' => true,
						],
		                'selectors' => [
		                    '{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		                ],
		                'condition' => [
		                    'carousel_bullets' => 'yes',
		                ]
		            ]
		        );

			    $this->end_controls_tab();

		        $this->start_controls_tab( 
		        	'carousel_bullets_hover_tab',
					[
						'label' => esc_html__( 'Active', 'themesflat-elementor' ),
					]
				);

				$this->add_responsive_control( 
		        	'w_size_carousel_bullets_active',
						[
							'label' => esc_html__( 'Width', 'themesflat-elementor' ),
							'type' => \Elementor\Controls_Manager::SLIDER,
							'size_units' => [ 'px' ],
							'range' => [
								'px' => [
									'min' => 0,
									'max' => 100,
									'step' => 1,
								]
							],
							'default' => [
								'unit' => 'px',
								'size' => 70,
							],
							'selectors' => [
								'{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot.active' => 'width: {{SIZE}}{{UNIT}};',
							],
							'condition' => [						
			                    'carousel_bullets' => 'yes',
			                ]
						]
				);

				$this->add_responsive_control( 
					'h_size_carousel_bullets_active',
					[
						'label' => esc_html__( 'Height', 'themesflat-elementor' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px' ],
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 100,
								'step' => 1,
							]
						],
						'default' => [
							'unit' => 'px',
							'size' => 5,
						],
						'selectors' => [
							'{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot.active' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
						],
						'condition' => [					
		                    'carousel_bullets' => 'yes',
		                ]
					]
				);

				$this->add_control( 
					'size_carousel_bullets_active_scale_hover',
					[
						'label' => esc_html__( 'Scale', 'themesflat-elementor' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px' ],
						'range' => [
							'px' => [
								'min' => 1,
								'max' => 2,
								'step' => 0.1,
							],
						],
						'default' => [
							'unit' => 'px',
							'size' => 1,
						],
						'selectors' => [
							'{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot.active, {{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot:hover' => 'transform: scale({{SIZE}});',
						],
					]
				);	

	        	$this->add_control( 
	        		'carousel_bullets_hover_bg_color',
		            [
		                'label' => esc_html__( 'Background Color', 'themesflat-elementor' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		                'default' => '#FFA800',
		                'selectors' => [
							'{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot.active' => 'background-color: {{VALUE}}',
						],
						'condition' => [
		                    'carousel_bullets' => 'yes',
		                ]
		            ]
		        );

	        	$this->add_group_control( 
	        		\Elementor\Group_Control_Border::get_type(),
					[
						'name' => 'carousel_bullets_border_hover',
						'label' => esc_html__( 'Border', 'themesflat-elementor' ),
						'selector' => '{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot.active',
						'condition' => [
		                    'carousel_bullets' => 'yes',
		                ]
					]
				);

				$this->add_responsive_control( 
					'carousel_bullets_border_radius_hover',
		            [
		                'label' => esc_html__( 'Border Radius', 'themesflat-elementor' ),
		                'type' => \Elementor\Controls_Manager::DIMENSIONS,
		                'size_units' => [ 'px', '%', 'em' ],
		                'selectors' => [
		                    '{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		                ],
		                'condition' => [
		                    'carousel_bullets' => 'yes',
		                ]
		            ]
		        );

				$this->end_controls_tab();

		    $this->end_controls_tabs();	

	        $this->end_controls_section();
        // /.End Bullets    
	    
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();
		
		$carousel_arrow = 'no-arrow';
		if ( $settings['carousel_arrow'] == 'yes' ) {
			$carousel_arrow = 'has-arrow';
		}

		$carousel_bullets = 'no-bullets';
		if ( $settings['carousel_bullets'] == 'yes' ) {
			$carousel_bullets = 'has-bullets';
		}

		?>
		<div class="tf-testimonial-carousel <?php echo esc_attr($settings['testimonial_style']) ?> <?php echo esc_attr($carousel_arrow); ?> <?php echo esc_attr($carousel_bullets); ?>" data-loop="<?php echo esc_attr($settings['carousel_loop']); ?>" data-auto="<?php echo esc_attr($settings['carousel_auto']); ?>" data-column="<?php echo esc_attr($settings['carousel_column_desk']); ?>" data-column2="<?php echo esc_attr($settings['carousel_column_tablet']); ?>" data-column3="<?php echo esc_attr($settings['carousel_column_mobile']); ?>" data-spacer="<?php echo esc_attr($settings['carousel_spacer']); ?>" data-prev_icon="<?php echo esc_attr($settings['carousel_prev_icon']) ?>" data-next_icon="<?php echo esc_attr($settings['carousel_next_icon']) ?>" data-arrow="<?php echo esc_attr($settings['carousel_arrow']) ?>" data-bullets="<?php echo esc_attr($settings['carousel_bullets']) ?>">
			<div class="owl-carousel owl-theme">
			<?php foreach ($settings['carousel_list'] as $carousel): ?>				
				<div class="item">

						<div class="item-testimonial">
                            <?php if(isset($carousel['image']['url'])): ?>
                                <div class="icon-quote">
                                    <img src="<?php echo esc_attr($carousel['image']['url']); ?>" alt="image">
                                </div>
                            <?php endif; ?>

							<div class="description"><?php echo sprintf( '%1$s', $carousel['description'] ); ?></div>
							<div class="wrap-author">				
								<div class="content">
									<div class="name"><?php echo esc_attr($carousel['name']); ?></div>
									<div class="position"><?php echo esc_attr($carousel['position']); ?></div>
								</div>
						</div>
						</div>
				</div>
			<?php endforeach;?>
			</div>
		</div>
		<?php	
	}

}