<?php
class TFAccordion_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tfaccordion';
    }
    
    public function get_title() {
        return esc_html__( 'TF Accordion', 'themesflat-addons' );
    }

    public function get_icon() {
        return 'eicon-accordion';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

	protected function register_controls() {
        // Start Accordion        
			$this->start_controls_section( 
				'section_accordion',
	            [
	                'label' => esc_html__('Accordion', 'themesflat-addons'),
	            ]
	        );	

	    	$this->add_control( 'heading_icon',
				[
					'label' => esc_html__( 'Icon', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
				]
			);

			$this->add_control( 'icon_style',
				[
					'label' => esc_html__( 'Icon Style', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'none' => [
							'title' => esc_html__( 'None', 'themesflat-addons' ),
							'icon' => 'fa fa-ban',
						],
						'icon' => [
							'title' => esc_html__( 'Icon', 'themesflat-addons' ),
							'icon' => 'eicon-favorite',
						],
						'image' => [
							'title' => esc_html__( 'Image', 'themesflat-addons' ),
							'icon' => 'eicon-image',
						],
					],
					'default' => 'icon',
				]
			);	

			$this->add_control( 
				'icon_position',
				[
					'label' => esc_html__( 'Icon Position', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'icon_before',
					'options' => [
						'icon_before'  => esc_html__( 'Left', 'themesflat-addons' ),
						'icon_after' => esc_html__( 'Right', 'themesflat-addons' ),
						'icon_before_after' => esc_html__( 'Both side', 'themesflat-addons' ),
					],
				]
			);

			$this->add_control( 'icon_accodion',
				[
					'label' => esc_html__( 'Left Icon', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'fa4compatibility' => 'icon_accodion4',
					'default' => [
						'value' => 'fas fa-plus',
						'library' => 'fa-solid',
					],
					'condition' => [
	                    'icon_style' => 'icon',
	                    'icon_position' => ['icon_before', 'icon_before_after'],
	                ],
				]
			);

			$this->add_control( 'image_accodion',
				[
					'label' => esc_html__( 'Left Icon Image', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => URL_THEMESFLAT_ADDONS."assets/img/placeholder.jpg",
					],
					'condition' => [
	                    'icon_style' => 'image',
	                    'icon_position' => ['icon_before', 'icon_before_after'],
	                ],
				]
			);

			$this->add_control( 'icon_accodion_active',
				[
					'label' => esc_html__( 'Left Icon Active', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'fa4compatibility' => 'icon_accodion_active4',
					'default' => [
						'value' => 'fas fa-minus',
						'library' => 'fa-solid',
					],
					'condition' => [
	                    'icon_style' => 'icon',
	                    'icon_position' => ['icon_before', 'icon_before_after'],
	                ],
				]
			);

			$this->add_control( 'image_accodion_active',
				[
					'label' => esc_html__( 'Left Icon Image Active', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => URL_THEMESFLAT_ADDONS."assets/img/placeholder.jpg",
					],
					'condition' => [
	                    'icon_style' => 'image',
	                    'icon_position' => ['icon_before', 'icon_before_after'],
	                ],
				]
			);


			$this->add_control( 'icon_accodion_right',
				[
					'label' => esc_html__( 'Right Icon', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'fa4compatibility' => 'icon_accodion4_right',
					'default' => [
						'value' => 'fas fa-chevron-down',
						'library' => 'fa-solid',
					],
					'condition' => [
	                    'icon_style' => 'icon',
	                    'icon_position' => ['icon_after', 'icon_before_after'],
	                ],
				]
			);

			$this->add_control( 'image_accodion_right',
				[
					'label' => esc_html__( 'Right Icon Image', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => URL_THEMESFLAT_ADDONS."assets/img/placeholder.jpg",
					],
					'condition' => [
	                    'icon_style' => 'image',
	                    'icon_position' => ['icon_after', 'icon_before_after'],
	                ],
				]
			);

			$this->add_control( 'icon_accodion_right_active',
				[
					'label' => esc_html__( 'Right Icon Active', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'fa4compatibility' => 'icon_accodion_active4_right',
					'default' => [
						'value' => 'fas fa-chevron-up',
						'library' => 'fa-solid',
					],
					'condition' => [
	                    'icon_style' => 'icon',
	                    'icon_position' => ['icon_after', 'icon_before_after'],
	                ],
				]
			);

			$this->add_control( 'image_accodion_right_active',
				[
					'label' => esc_html__( 'Right Icon Image Active', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => URL_THEMESFLAT_ADDONS."assets/img/placeholder.jpg",
					],
					'condition' => [
	                    'icon_style' => 'image',
	                    'icon_position' => ['icon_after', 'icon_before_after'],
	                ],
				]
			);

	        $repeater = new \Elementor\Repeater();
	        	$repeater->add_control( 'set_active',
					[
						'label' => esc_html__( 'Set Active Item', 'themesflat-addons' ),
						'type' => \Elementor\Controls_Manager::SWITCHER,
						'label_on' => esc_html__( 'Yes', 'themesflat-addons' ),
						'label_off' => esc_html__( 'No', 'themesflat-addons' ),
						'return_value' => 'active',
						'default' => 'inactive',
					]
				);		        
		        $repeater->add_control( 'list_title', [
						'label' => esc_html__( 'Nav text', 'themesflat-addons' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Accordion' , 'themesflat-addons' ),
						'label_block' => true,
					]
				);
				$repeater->add_control( 'heading_content',
					[
						'label' => esc_html__( 'Content', 'themesflat-addons' ),
						'type' => \Elementor\Controls_Manager::HEADING,
						'separator' => 'before',
					]
				);
				$repeater->add_control( 'list_content_text_type',
					[
						'label' => esc_html__( 'Content type', 'themesflat-addons' ),
						'type' => \Elementor\Controls_Manager::SELECT,
						'default' => 'editor',
						'options' => [
							'editor'  => esc_html__( 'Editor', 'themesflat-addons' ),
							'template' => esc_html__( 'Template', 'themesflat-addons' ),
						],
					]
				);	
				$repeater->add_control( 'list_content', [
						'label' => esc_html__( 'Content text', 'themesflat-addons' ),
						'type' => \Elementor\Controls_Manager::WYSIWYG,
						'default' => esc_html__( 'Good strategy is the antidote to competition. Strategic thinking is the process of developing a strategy that defines your value proposition and your unique value chain. This process includes market and competitive research as well as an assessment of the company’s capabilities and the industry forces impacting it.' , 'themesflat-addons' ),
						'label_block' => true,
						'condition' => [
	                        'list_content_text_type' => 'editor',
	                    ],
					]
				);
				$repeater->add_control( 'list_content_template',
					[
						'label' => esc_html__( 'Choose Template', 'themesflat-addons' ),
						'type' => \Elementor\Controls_Manager::SELECT,
						'options' => ThemesFlat_Addons::tf_get_template_elementor(),
						'condition' => [
	                        'list_content_text_type' => 'template',
	                    ],
					]
				);
		        $this->add_control( 'accordion_list',
					[					
						'type' => \Elementor\Controls_Manager::REPEATER,
						'fields' => $repeater->get_controls(),
						'default' => [
							[	
								'set_active' => 'active',
								'list_title' => esc_html__( 'Strategy Development', 'themesflat-addons' ),
								'list_content' => esc_html__( 'Good strategy is the antidote to competition. Strategic thinking is the process of developing a strategy that defines your value proposition and your unique value chain. This process includes market and competitive research as well as an assessment of the company’s capabilities and the industry forces impacting it.', 'themesflat-addons' ),
							],
							[
								'set_active' => 'inactive',
								'list_title' => esc_html__( 'Strategic Plan Development', 'themesflat-addons' ),
								'list_content' => esc_html__( 'Good strategy is the antidote to competition. Strategic thinking is the process of developing a strategy that defines your value proposition and your unique value chain. This process includes market and competitive research as well as an assessment of the company’s capabilities and the industry forces impacting it.', 'themesflat-addons' ),
							],
							[
								'set_active' => 'inactive',
								'list_title' => esc_html__( 'Strategic Plan Execution', 'themesflat-addons' ),
								'list_content' => esc_html__( 'Good strategy is the antidote to competition. Strategic thinking is the process of developing a strategy that defines your value proposition and your unique value chain. This process includes market and competitive research as well as an assessment of the company’s capabilities and the industry forces impacting it.', 'themesflat-addons' ),
							],
						],
						'title_field' => '{{{ list_title }}}',
					]
				);

			$this->end_controls_section();
        // /.End Accordion		

		// Start General Style 
	        $this->start_controls_section( 
	        	'section_style_general',
	            [
	                'label' => esc_html__( 'General', 'themesflat-addons' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

	         $this->add_control(
				'wrap_align',
				[
					'label' => esc_html__( 'Alignment', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'left'    => [
							'title' => esc_html__( 'Left', 'themesflat-addons' ),
							'icon' => 'eicon-text-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'themesflat-addons' ),
							'icon' => 'eicon-text-align-center',
						],
						'right' => [
							'title' => esc_html__( 'Right', 'themesflat-addons' ),
							'icon' => 'eicon-text-align-right',
						],
						'justify' => [
							'title' => esc_html__( 'Justified', 'themesflat-addons' ),
							'icon' => 'eicon-text-align-justify',
						],
					],
					'default' => 'left',
					'selectors' => [
						'{{WRAPPER}} .tf-accordion' => 'text-align: {{VALUE}}',
					],
				]
			);
	        
	        $this->end_controls_section();    
	    // /.End General Style

	    // Start Item Style 
	        $this->start_controls_section( 
	        	'section_style_item',
	            [
	                'label' => esc_html__( 'Item', 'themesflat-addons' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

	        $this->add_responsive_control( 
				'item_padding',
				[
					'label' => esc_html__( 'Padding', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'default' => [
						'top' => '0',
						'right' => '0',
						'bottom' => '0',
						'left' => '0',
						'unit' => 'px',
						'isLinked' => 'false',
					],
					'selectors' => [
						'{{WRAPPER}} .tf-accordion .accordion-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control( 
				'item_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'default' => [
						'top' => '0',
						'right' => '0',
						'bottom' => '10',
						'left' => '0',
						'unit' => 'px',
						'isLinked' => 'false',
					],
					'selectors' => [
						'{{WRAPPER}} .tf-accordion .accordion-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);  

			$this->add_control( 'item_background',
				[
					'label' => esc_html__( 'Background Color', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-accordion .accordion-item' => 'background-color: {{VALUE}}',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'item_box_shadow',
					'label' => esc_html__( 'Box Shadow', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-accordion .accordion-item',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'item_border',
					'label' => esc_html__( 'Border', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-accordion .accordion-item',
				]
			);

			$this->add_control( 
				'item_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' , 'em' , '%' ],
					'selectors' => [
						'{{WRAPPER}} .tf-accordion .accordion-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			); 
	        
	        $this->end_controls_section();    
	    // /.End Item Style

        // Start Icon Style 
	        $this->start_controls_section( 
	        	'section_style_icon',
	            [
	                'label' => esc_html__( 'Icon', 'themesflat-addons' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

	        $this->add_responsive_control(
				'icon_size',
				[
					'label' => esc_html__( 'Icon Size', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 200,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 70,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-accordion .accordion-title .wrap-accordion-icon' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}}',
						'{{WRAPPER}} .tf-accordion .accordion-title .title-text' => 'width: calc(100% - {{SIZE}}{{UNIT}});',
						'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after .title-text' => 'width: calc(100% - 2 * {{SIZE}}{{UNIT}});',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'icon_border',
					'label' => esc_html__( 'Border', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-accordion .accordion-title .wrap-accordion-icon',
				]
			);

			$this->add_control( 
				'icon_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' , 'em' , '%' ],
					'selectors' => [
						'{{WRAPPER}} .tf-accordion .accordion-title .wrap-accordion-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			); 

	        $this->add_control(
				'heading_icon_left',
				[
					'label' => esc_html__( 'Icon Left', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
	                    'icon_position' => ['icon_before', 'icon_before_after'],
	                ],
				]
			);			

			$this->add_responsive_control(
				'icon_font_size',
				[
					'label' => esc_html__( 'Icon Font Size', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 20,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-accordion .accordion-title.icon_before .wrap-accordion-icon.wrap-accordion-icon-left' => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf-accordion .accordion-title.icon_before .wrap-accordion-icon.wrap-accordion-icon-left img' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after .wrap-accordion-icon.wrap-accordion-icon-left' => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after .wrap-accordion-icon.wrap-accordion-icon-left img' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
	                    'icon_position' => ['icon_before', 'icon_before_after'],
	                ],
				]
			);			

			$this->start_controls_tabs( 
				'icon_style_accordion', [
						'condition' => [
			                    'icon_position' => ['icon_before', 'icon_before_after'],
		                ], 
	                ]
				);

	        	$this->start_controls_tab( 
	        		'icon_style_normal_accordion',
					[
						'label' => esc_html__( 'Normal', 'themesflat-addons' ),
					] );	

	        		$this->add_control( 
						'icon_color',
						[
							'label' => esc_html__( 'Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#ffffff',
							'selectors' => [
								'{{WRAPPER}} .tf-accordion .accordion-title.icon_before .wrap-accordion-icon.wrap-accordion-icon-left' => 'color: {{VALUE}}',
								'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after .wrap-accordion-icon.wrap-accordion-icon-left' => 'color: {{VALUE}}',
							]
						]
					); 

					$this->add_control( 
						'icon_background_color',
						[
							'label' => esc_html__( 'Background Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#ffa800',
							'selectors' => [
								'{{WRAPPER}} .tf-accordion .accordion-title.icon_before .wrap-accordion-icon.wrap-accordion-icon-left' => 'background-color: {{VALUE}}',
								'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after .wrap-accordion-icon.wrap-accordion-icon-left' => 'background-color: {{VALUE}}',
							]
						]
					); 
					
				$this->end_controls_tab();

				$this->start_controls_tab( 
					'icon_style_hover_accordion',
					[
						'label' => esc_html__( 'Active', 'themesflat-addons' ),
					] );

					$this->add_control( 
						'icon_color_hover',
						[
							'label' => esc_html__( 'Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tf-accordion .accordion-title.icon_before.active .wrap-accordion-icon.wrap-accordion-icon-left' => 'color: {{VALUE}}',
								'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after.active .wrap-accordion-icon.wrap-accordion-icon-left' => 'color: {{VALUE}}',
							]
						]
					); 

					$this->add_control( 
						'icon_background_color_hover',
						[
							'label' => esc_html__( 'Background Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tf-accordion .accordion-title.icon_before.active .wrap-accordion-icon.wrap-accordion-icon-left' => 'background-color: {{VALUE}}',
								'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after.active .wrap-accordion-icon.wrap-accordion-icon-left' => 'background-color: {{VALUE}}',
							]
						]
					);	
										
				$this->end_controls_tab();

			$this->end_controls_tabs();

			$this->add_control(
				'heading_icon_right',
				[
					'label' => esc_html__( 'Icon Right', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
	                    'icon_position' => ['icon_after', 'icon_before_after'],
	                ],
				]
			);

			$this->add_responsive_control(
				'icon_font_size_right',
				[
					'label' => esc_html__( 'Icon Font Size', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 20,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-accordion .accordion-title.icon_after .wrap-accordion-icon.wrap-accordion-icon-right' => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after .wrap-accordion-icon.wrap-accordion-icon-right img' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
	                    'icon_position' => ['icon_after', 'icon_before_after'],
	                ],
				]
			);

			$this->start_controls_tabs( 
				'icon_style_right_accordion', [
						'condition' => [
		                    'icon_position' => ['icon_after', 'icon_before_after'],
		                ],
		            ]
				);

	        	$this->start_controls_tab( 
	        		'icon_style_right_normal_accordion',
					[
						'label' => esc_html__( 'Normal', 'themesflat-addons' ),
					] );	

	        		$this->add_control( 
						'icon_right_color',
						[
							'label' => esc_html__( 'Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#ffffff',
							'selectors' => [
								'{{WRAPPER}} .tf-accordion .accordion-title.icon_after .wrap-accordion-icon.wrap-accordion-icon-right' => 'color: {{VALUE}}',
								'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after .wrap-accordion-icon.wrap-accordion-icon-right' => 'color: {{VALUE}}',
							]
						]
					); 

					$this->add_control( 
						'icon_right_background_color',
						[
							'label' => esc_html__( 'Background Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#ffa800',
							'selectors' => [
								'{{WRAPPER}} .tf-accordion .accordion-title.icon_after .wrap-accordion-icon.wrap-accordion-icon-right' => 'background-color: {{VALUE}}',
								'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after .wrap-accordion-icon.wrap-accordion-icon-right' => 'background-color: {{VALUE}}',
							]
						]
					); 
					
				$this->end_controls_tab();

				$this->start_controls_tab( 
					'icon_style_right_hover_accordion',
					[
						'label' => esc_html__( 'Active', 'themesflat-addons' ),
					] );

					$this->add_control( 
						'icon_right_color_hover',
						[
							'label' => esc_html__( 'Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tf-accordion .accordion-title.icon_after.active .wrap-accordion-icon.wrap-accordion-icon-right' => 'color: {{VALUE}}',
								'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after.active .wrap-accordion-icon.wrap-accordion-icon-right' => 'color: {{VALUE}}',
							]
						]
					); 

					$this->add_control( 
						'icon_right_background_color_hover',
						[
							'label' => esc_html__( 'Background Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tf-accordion .accordion-title.icon_after.active .wrap-accordion-icon.wrap-accordion-icon-right' => 'background-color: {{VALUE}}',
								'{{WRAPPER}} .tf-accordion .accordion-title.icon_before_after.active .wrap-accordion-icon.wrap-accordion-icon-right' => 'background-color: {{VALUE}}',
							]
						]
					);	
										
				$this->end_controls_tab();

			$this->end_controls_tabs();
	        
	        $this->end_controls_section();    
	    // /.End Icon Style

	    // Start Title Style 
	        $this->start_controls_section( 
	        	'section_style_title',
	            [
	                'label' => esc_html__( 'Title', 'themesflat-addons' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'label' => esc_html__( 'Typography', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-accordion .accordion-title',
				]
			);			 

			$this->add_responsive_control( 
				'title_padding',
				[
					'label' => esc_html__( 'Padding', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'default' => [
						'top' => '10',
						'right' => '20',
						'bottom' => '10',
						'left' => '20',
						'unit' => 'px',
						'isLinked' => 'false',
					],
					'selectors' => [
						'{{WRAPPER}} .tf-accordion .accordion-title .title-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control( 
				'title_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'default' => [
						'top' => '0',
						'right' => '0',
						'bottom' => '0',
						'left' => '0',
						'unit' => 'px',
						'isLinked' => 'false',
					],
					'selectors' => [
						'{{WRAPPER}} .tf-accordion .accordion-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->start_controls_tabs( 
				'title_style_accordion' 
				);

	        	$this->start_controls_tab( 
	        		'title_style_normal_accordion',
					[
						'label' => esc_html__( 'Normal', 'themesflat-addons' ),
					] );

					$this->add_control( 'title_color',
						[
							'label' => esc_html__( 'Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#ffffff',
							'selectors' => [
								'{{WRAPPER}} .tf-accordion .accordion-title' => 'color: {{VALUE}}',
							],
						]
					);	        		
	        		
					$this->add_control( 'title_background',
						[
							'label' => esc_html__( 'Background Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => 'rgba(37, 38, 40, 0.5)',
							'selectors' => [
								'{{WRAPPER}} .tf-accordion .accordion-title' => 'background-color: {{VALUE}}',
							],
						]
					);

					$this->add_group_control(
						\Elementor\Group_Control_Box_Shadow::get_type(),
						[
							'name' => 'title_box_shadow',
							'label' => esc_html__( 'Box Shadow', 'themesflat-addons' ),
							'selector' => '{{WRAPPER}} .tf-accordion .accordion-title',
						]
					);

					$this->add_group_control(
						\Elementor\Group_Control_Border::get_type(),
						[
							'name' => 'title_border',
							'label' => esc_html__( 'Border', 'themesflat-addons' ),
							'selector' => '{{WRAPPER}} .tf-accordion .accordion-title',
						]
					);

					$this->add_control( 
						'title_border_radius',
						[
							'label' => esc_html__( 'Border Radius', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px' , 'em' , '%' ],
							'selectors' => [
								'{{WRAPPER}} .tf-accordion .accordion-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);	
					
				$this->end_controls_tab();

				$this->start_controls_tab( 
					'title_style_hover_accordion',
					[
						'label' => esc_html__( 'Active', 'themesflat-addons' ),
					] );

					$this->add_control( 'title_color_active',
						[
							'label' => esc_html__( 'Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tf-accordion .accordion-title.active' => 'color: {{VALUE}}',
							],
						]
					);	        		
	        		
					$this->add_control( 'title_background_active',
						[
							'label' => esc_html__( 'Background Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tf-accordion .accordion-title.active' => 'background-color: {{VALUE}}',
							],
						]
					);	

					$this->add_group_control(
						\Elementor\Group_Control_Box_Shadow::get_type(),
						[
							'name' => 'title_box_shadow_active',
							'label' => esc_html__( 'Box Shadow', 'themesflat-addons' ),
							'selector' => '{{WRAPPER}} .tf-accordion .accordion-title.active',
						]
					);

					$this->add_group_control(
						\Elementor\Group_Control_Border::get_type(),
						[
							'name' => 'title_border_active',
							'label' => esc_html__( 'Border', 'themesflat-addons' ),
							'selector' => '{{WRAPPER}} .tf-accordion .accordion-title.active',
						]
					);

					$this->add_control( 
						'title_border_radius_active',
						[
							'label' => esc_html__( 'Border Radius', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px' , 'em' , '%' ],
							'selectors' => [
								'{{WRAPPER}} .tf-accordion .accordion-title.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
										
				$this->end_controls_tab();

			$this->end_controls_tabs();
	        
	        $this->end_controls_section();    
	    // /.End Title Style

	    // Start Content Style 
	        $this->start_controls_section( 
	        	'section_style_content',
	            [
	                'label' => esc_html__( 'Content', 'themesflat-addons' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

	        $this->add_control( 'content_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#000000',
					'selectors' => [
						'{{WRAPPER}} .tf-accordion .accordion-content' => 'color: {{VALUE}}',
					],
				]
			);	        		
    		
			$this->add_control( 'content_background',
				[
					'label' => esc_html__( 'Background Color', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#f7f7f7',
					'selectors' => [
						'{{WRAPPER}} .tf-accordion .accordion-content' => 'background-color: {{VALUE}}',
					],
				]
			);

	        $this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'content_typography',
					'label' => esc_html__( 'Typography', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-accordion .accordion-content',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'content_box_shadow',
					'label' => esc_html__( 'Box Shadow', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-accordion .accordion-content',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'content_border',
					'label' => esc_html__( 'Border', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-accordion .accordion-content',
				]
			);

			$this->add_control( 
				'content_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' , 'em' , '%' ],
					'selectors' => [
						'{{WRAPPER}} .tf-accordion .accordion-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			); 

			$this->add_responsive_control( 
				'content_padding',
				[
					'label' => esc_html__( 'Padding', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'default' => [
						'top' => '20',
						'right' => '20',
						'bottom' => '20',
						'left' => '20',
						'unit' => 'px',
						'isLinked' => 'false',
					],
					'selectors' => [
						'{{WRAPPER}} .tf-accordion .accordion-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control( 
				'content_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'default' => [
						'top' => '0',
						'right' => '0',
						'bottom' => '0',
						'left' => '0',
						'unit' => 'px',
						'isLinked' => 'false',
					],
					'selectors' => [
						'{{WRAPPER}} .tf-accordion .accordion-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

	     	$this->end_controls_section(); 
	    // /.End Content Style 
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();
		
		$accordion_item = $html_title = $icon_title = $icon_accodion_close = $icon_accodion_open = $html_content = $set_active = '';		

		foreach ($settings['accordion_list'] as $key => $value) {
			if ( isset( $settings['icon_accodion']['value'] ) ) {
				if ( !empty( $settings['icon_accodion']['value']['url'] ) ) {
					$icon_accodion_close = sprintf(
			           '<img class="logo_svg" src="%1$s" alt="%2$s"/>',
			             $settings['icon_accodion']['value']['url'],
			             $settings['icon_accodion']['value']['id']
			            
			         ); 
				} else {
					$icon_accodion_close = sprintf(
			             '<i class="%1$s"></i>',
			            $settings['icon_accodion']['value']
			        );  
				}
			} else {
				$icon_accodion_close = sprintf(
		             '<img src="%1$s" alt=""/>',
		            $settings['image_accodion']['url']
		        );  
			}

			if ( isset( $settings['icon_accodion_active']['value'] ) ) {
				if ( !empty( $settings['icon_accodion_active']['value']['url'] ) ) {
					$icon_accodion_open = sprintf(
			           '<img class="logo_svg" src="%1$s" alt="%2$s"/>',
			             $settings['icon_accodion_active']['value']['url'],
			             $settings['icon_accodion_active']['value']['id']
			            
			         ); 
				} else {
					$icon_accodion_open = sprintf(
			             '<i class="%1$s"></i>',
			            $settings['icon_accodion_active']['value']
			        );  
				}
			} else {
				$icon_accodion_open = sprintf(
		             '<img src="%1$s" alt=""/>',
		            $settings['image_accodion_active']['url']
		        );  
			}


			if ( isset( $settings['icon_accodion_right']['value'] ) ) {
				if ( !empty( $settings['icon_accodion_right']['value']['url'] ) ) {
					$icon_accodion_right_close = sprintf(
			           '<img class="logo_svg" src="%1$s" alt="%2$s"/>',
			             $settings['icon_accodion_right']['value']['url'],
			             $settings['icon_accodion_right']['value']['id']
			            
			         ); 
				} else {
					$icon_accodion_right_close = sprintf(
			             '<i class="%1$s"></i>',
			            $settings['icon_accodion_right']['value']
			        );  
				}
			} else {
				$icon_accodion_right_close = sprintf(
		             '<img src="%1$s" alt=""/>',
		            $settings['image_accodion_right']['url']
		        );  
			}

			if ( isset( $settings['icon_accodion_right_active']['value'] ) ) {
				if ( !empty( $settings['icon_accodion_right_active']['value']['url'] ) ) {
					$icon_accodion_right_open = sprintf(
			           '<img class="logo_svg" src="%1$s" alt="%2$s"/>',
			             $settings['icon_accodion_right_active']['value']['url'],
			             $settings['icon_accodion_right_active']['value']['id']
			            
			         ); 
				} else {
					$icon_accodion_right_open = sprintf(
			             '<i class="%1$s"></i>',
			            $settings['icon_accodion_right_active']['value']
			        );  
				}
			} else {
				$icon_accodion_right_open = sprintf(
		            '<img src="%1$s" alt=""/>',
		            $settings['image_accodion_right_active']['url']
		        );  
			}

			if ( $settings['icon_style'] != 'none' ) {
				$icon_title = sprintf('		
				<span class="wrap-accordion-icon wrap-accordion-icon-left">		
				<span class="accordion-icon accordion-icon-close">%1$s</span>
				<span class="accordion-icon accordion-icon-open">%2$s</span>
				</span>'
				, $icon_accodion_close, $icon_accodion_open );

				$icon_title_right = sprintf('		
				<span class="wrap-accordion-icon wrap-accordion-icon-right">		
				<span class="accordion-icon accordion-icon-close">%1$s</span>
				<span class="accordion-icon accordion-icon-open">%2$s</span>
				</span>'
				, $icon_accodion_right_close, $icon_accodion_right_open );
			}

			if ($value['list_title'] != '') {
				if ($settings['icon_position'] == 'icon_before_after') {
					$html_title = sprintf('<div class="accordion-title %4$s %5$s">%2$s <span class="title-text">%1$s</span> %3$s</div>', $value['list_title'], $icon_title, $icon_title_right, $settings['icon_position'], $value['set_active']);
				}else if ($settings['icon_position'] == 'icon_before') {
					$html_title = sprintf('<div class="accordion-title %3$s %4$s">%2$s <span class="title-text">%1$s</span></div>', $value['list_title'], $icon_title, $settings['icon_position'], $value['set_active']);
				}else{
					$html_title = sprintf('<div class="accordion-title %3$s %4$s"><span class="title-text">%1$s</span> %2$s</div>', $value['list_title'], $icon_title_right, $settings['icon_position'], $value['set_active']);
				}
				
			}


			if ( $value['list_content_text_type'] == 'template' ) {

				if ( !empty($value['list_content_template']) ) {
		            $frontend = new \Elementor\Frontend;
		            $html_content = sprintf('<div class="accordion-content">%1$s</div>', $frontend->get_builder_content_for_display($value['list_content_template'], true));
		        }
			}else {
				$html_content = sprintf('<div class="accordion-content">%1$s</div>', do_shortcode( $value['list_content'] ));
			}			

			$accordion_item .= sprintf('<div class="accordion-item %3$s">%1$s %2$s</div>', $html_title, $html_content, $value['set_active']);
		}


		echo sprintf ( 
			'<div class="tf-accordion"> 
				%1$s
            </div>',
            $accordion_item
        );
	}

	protected function content_template() {}

	

}