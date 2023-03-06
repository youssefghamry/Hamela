<?php
class TFImageBox_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tfimagebox';
    }
    
    public function get_title() {
        return esc_html__( 'TF Image Box', 'themesflat-addons' );
    }

    public function get_icon() {
        return 'eicon-image-box';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

	protected function register_controls() {
		// Start Image        
			$this->start_controls_section( 
				'section_image',
	            [
	                'label' => esc_html__('Image', 'themesflat-addons'),
	            ]
	        );	

	        $this->add_control(
				'image',
				[
					'label' => esc_html__( 'Choose Image', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => URL_THEMESFLAT_ADDONS."assets/img/placeholder.jpg",
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Image_Size::get_type(),
				[
					'name' => 'thumbnail',
					'include' => [],
					'default' => 'large',
				]
			);

	    	$this->end_controls_section();
	    // /.End Image

        // Start Content        
			$this->start_controls_section( 
				'section_content',
	            [
	                'label' => esc_html__('Content', 'themesflat-addons'),
	            ]
	        );	

	        $this->add_control(
				'icon_name',
				[
					'label' => esc_html__( 'Icon', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'hamela-digital-icon-desktop-1',
						'library' => 'hamela_digital_icon',
					],
				]
			);         	

			$this->add_control(
				'title',
				[
					'label' => esc_html__( 'Title', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'default' => esc_html__( 'INFRASTRUCTURE PLAN', 'themesflat-addons' ),
				]
			); 

			$this->add_control(
				'sub_title',
				[
					'label' => esc_html__( 'Sub Title', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'default' => esc_html__( 'STRATEGIES', 'themesflat-addons' ),
				]
			); 

			$this->add_control(
				'description',
				[
					'label' => esc_html__( 'Description', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::WYSIWYG,
					'default' => '<ul>
								 	<li>Video Production</li>
								 	<li>Media Planning &amp; Buying</li>
								 	<li>Advertising</li>
								</ul>',
				]
			); 
					
	        $this->end_controls_section();
        // /.End Content

	    // Start Link        
			$this->start_controls_section( 
				'section_link',
	            [
	                'label' => esc_html__('Link', 'themesflat-addons'),
	            ]
	        );

	        $this->add_control(
				'link',
				[
					'label' => esc_html__( 'Link', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::URL,
					'placeholder' => esc_html__( 'https://your-link.com', 'themesflat-addons' ),
				]
			);

	        $this->end_controls_section();
        // /.End Link	

	    // Start Button        
			$this->start_controls_section( 
				'section_button',
	            [
	                'label' => esc_html__('Button', 'themesflat-addons'),
	            ]
	        );

	        $this->add_control(
				'show_button',
				[
					'label' => esc_html__( 'Show Button', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-addons' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-addons' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);

			$this->add_control( 
				'button_text',
				[
					'label' => esc_html__( 'Button Text', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( '', 'themesflat-addons' ),
					'condition' => [
	                    'show_button'	=> 'yes',
	                ],
				]
			);	        

	        $this->end_controls_section();
        // /.End Button	

	    // Start General Style       
			$this->start_controls_section( 
				'section_style_general',
	            [
	                'label' => esc_html__('General', 'themesflat-addons'),
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
					'selectors' => [
						'{{WRAPPER}} .tf-imagebox' => 'text-align: {{VALUE}}',
					],
				]
			);

	    	$this->end_controls_section();
        // /.End General Style  
        
        // Start Image Style       
			$this->start_controls_section( 
				'section_style_image',
	            [
	                'label' => esc_html__('Image', 'themesflat-addons'),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        ); 

	        $this->add_control(
				'show_image',
				[
					'label' => esc_html__( 'Show Image', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-addons' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-addons' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);

	        $this->add_responsive_control( 
				'image_width',
				[
					'label' => esc_html__( 'Image Width', 'themesflat-addons' ),
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
							'step' => 1,
						],
					],
					'devices' => [ 'desktop', 'tablet', 'mobile' ],
					'desktop_default' => [
						'size' => 100,
						'unit' => '%',
					],
					'tablet_default' => [
						'size' => 100,
						'unit' => '%',
					],
					'mobile_default' => [
						'size' => 100,
						'unit' => '%',
					],
					'selectors' => [
						'{{WRAPPER}} .tf-imagebox .image img' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			); 	  

			$this->add_group_control( 
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'image_border',
					'label' => esc_html__( 'Border', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-imagebox .image',
				]
			);

	        $this->add_responsive_control( 
				'image_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' , '%' ],
					'selectors' => [
						'{{WRAPPER}} .tf-imagebox .image, {{WRAPPER}} .tf-imagebox .image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			); 

			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'image_background',
					'label' => esc_html__( 'Background', 'themesflat-addons' ),
					'types' => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .tf-imagebox .image',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'image_box_shadow',
					'label' => esc_html__( 'Box Shadow', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-imagebox .image',
				]
			);

			$this->add_control( 
				'image_padding',
				[
					'label' => esc_html__( 'Padding', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-imagebox .image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control( 
				'image_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-imagebox .image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->start_controls_tabs( 
				'image_style_tabs' 
				);

	        	$this->start_controls_tab( 
	        		'image_style_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'themesflat-addons' ),
					] );

					$this->add_group_control(
						\Elementor\Group_Control_Css_Filter::get_type(),
						[
							'name' => 'image_css_filters',
							'selector' => '{{WRAPPER}} .tf-imagebox .image img',
						]
					);	
	        		
	        		$this->add_control( 
						'image_opacity',
						[
							'label' => esc_html__( 'Image Opacity', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::SLIDER,
							'size_units' => [ 'px' ],
							'range' => [
								'px' => [
									'min' => 0,
									'max' => 1,
									'step' => 0.01,
								],
							],
							'default' => [
								'unit' => 'px',
								'size' => 1,
							],
							'selectors' => [
								'{{WRAPPER}} .tf-imagebox .image img' => 'opacity: {{SIZE}};',
							],
						]
					);								
					
				$this->end_controls_tab();

				$this->start_controls_tab( 
					'image_style_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'themesflat-addons' ),
					] );

					$this->add_group_control(
						\Elementor\Group_Control_Css_Filter::get_type(),
						[
							'name' => 'image_hover_css_filters',
							'selector' => '{{WRAPPER}}:hover .tf-imagebox .image img',
						]
					);

					$this->add_control( 
						'image_opacity_hover',
						[
							'label' => esc_html__( 'Image Opacity', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::SLIDER,
							'size_units' => [ 'px' ],
							'range' => [
								'px' => [
									'min' => 0,
									'max' => 1,
									'step' => 0.01,
								],
							],
							'default' => [
								'unit' => 'px',
								'size' => 1,
							],
							'selectors' => [
								'{{WRAPPER}} .tf-imagebox:hover .image img' => 'opacity: {{SIZE}}; filter: alpha(opacity={{SIZE}});',
							],
						]
					);

					$this->add_control( 
						'image_scale_hover',
						[
							'label' => esc_html__( 'Image Scale', 'themesflat-addons' ),
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
								'size' => 1,1,
							],
							'selectors' => [
								'{{WRAPPER}} .tf-imagebox:hover .image img' => 'transform: scale({{SIZE}}); -moz-transform: scale({{SIZE}}); -webkit-transform: scale({{SIZE}}); -o-transform: scale({{SIZE}}); -ms-transform: scale({{SIZE}});',
							],
						]
					);	
										
				$this->end_controls_tab();

			$this->end_controls_tabs();

			$this->add_control(
				'image_overlay',
				[
					'label' => esc_html__( 'Overlay', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_control(
				'show_image_overlay',
				[
					'label' => esc_html__( 'Show Overlay', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-addons' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-addons' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);

			$this->add_control(
				'image_overlay_background_color',
				[
					'label' => esc_html__( 'Background Color', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => 'rgba(0, 0, 0, 0.5)',
					'selectors' => [
						'{{WRAPPER}} .tf-imagebox .image .image-overlay' => 'background-color: {{VALUE}};',
					],
					'condition' => [
	                    'show_image_overlay'	=> 'yes',
	                ]
				]
			);

			$this->add_control(
				'image_overlay_effect',
				[
					'label' => esc_html__( 'Effect Overlay', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'fade-in',
					'options' => [
						'default' => esc_html__( 'Default', 'themesflat-addons' ),
						'fade-in' => esc_html__( 'Fade In', 'themesflat-addons' ),
						'fade-in-up' => esc_html__( 'Fade In Up', 'themesflat-addons' ),
						'fade-in-down' => esc_html__( 'Fade In Down', 'themesflat-addons' ),
						'fade-in-left' => esc_html__( 'Fade In Left', 'themesflat-addons' ),
						'fade-in-right' => esc_html__( 'Fade In Right', 'themesflat-addons' ),
					],
					'condition' => [
	                    'show_image_overlay'	=> 'yes',
	                ]
				]
			);	       

	        $this->end_controls_section();
        // /.End Image Style 

        // Start Content Style        
			$this->start_controls_section( 
				'section_style_content',
	            [
	                'label' => esc_html__('Content', 'themesflat-addons'),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        ); 	

	        $this->add_responsive_control( 
				'content_padding',
				[
					'label' => esc_html__( 'Padding', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'default' => [
						'top' => '15',
						'right' => '22',
						'bottom' => '20',
						'left' => '22',
						'unit' => 'px',
						'isLinked' => false,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-imagebox .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);		

			$this->add_responsive_control( 
				'content_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-imagebox .content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			); 

			$this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'content_box_shadow',
					'label' => esc_html__( 'Box Shadow', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-imagebox .content',
				]
			);

			$this->add_control( 
				'content_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'default' => [
						'top' => '5',
						'right' => '5',
						'bottom' => '5',
						'left' => '5',
						'unit' => 'px',
						'isLinked' => false,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-imagebox .content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control( 
				'content_background_color',
				[
					'label' => esc_html__( 'Background Color', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ffffff',
					'selectors' => [
						'{{WRAPPER}} .tf-imagebox .content' => 'background-color: {{VALUE}}',
					],
				]
			); 

			$this->add_control( 
				'content_background_color_hover',
				[
					'label' => esc_html__( 'Background Color Hover', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-imagebox .content:hover' => 'background-color: {{VALUE}}',
					],
				]
			); 

			$this->add_control( 
				'heading_icon',
				[
					'label' => esc_html__( 'Icon', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);	

			$this->add_control( 
				'icon_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ffa800',
					'selectors' => [
						'{{WRAPPER}} .tf-imagebox .content .wrap-icon' => 'color: {{VALUE}}',
						'{{WRAPPER}} .tf-imagebox .content .wrap-icon svg' => 'fill: {{VALUE}}',
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
						'size' => 45,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-imagebox .content .wrap-icon' => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf-imagebox .content .wrap-icon img' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf-imagebox .content .wrap-icon svg' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			); 

			$this->add_responsive_control( 
				'icon_spacer',
				[
					'label' => esc_html__( 'Margin', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'default' => [
						'top' => '0',
						'right' => '23',
						'bottom' => '0',
						'left' => '0',
						'unit' => 'px',
						'isLinked' => false,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-imagebox .content .wrap-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control( 
				'heading_title',
				[
					'label' => esc_html__( 'Title', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_control(
				'wrap_heading',
				[
					'label' => esc_html__( 'Wrap Heading', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'h4',
					'options' => [
						'h1'  => esc_html__( 'H1', 'themesflat-addons' ),
						'h2'  => esc_html__( 'H2', 'themesflat-addons' ),
						'h3'  => esc_html__( 'H3', 'themesflat-addons' ),
						'h4'  => esc_html__( 'H4', 'themesflat-addons' ),
						'h5'  => esc_html__( 'H5', 'themesflat-addons' ),
						'h6'  => esc_html__( 'H6', 'themesflat-addons' ),
					],
				]
			);

	        $this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'label' => esc_html__( 'Typography', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-imagebox .title',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Text_Shadow::get_type(),
				[
					'name' => 'title_text_shadow',
					'label' => esc_html__( 'Text Shadow', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-imagebox .title',
				]
			);

			$this->add_control( 
				'title_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#11161e',
					'selectors' => [
						'{{WRAPPER}} .tf-imagebox .title a' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control( 
				'title_color_hover',
				[
					'label' => esc_html__( 'Color Hover', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ffa800',
					'selectors' => [
						'{{WRAPPER}} .tf-imagebox .title a:hover' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_responsive_control( 
				'title_spacer',
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
						'{{WRAPPER}} .tf-imagebox .content .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control( 
				'heading_sub_title',
				[
					'label' => esc_html__( 'Sub Title', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'sub_title_typography',
					'label' => esc_html__( 'Typography', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-imagebox .sub-title',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Text_Shadow::get_type(),
				[
					'name' => 'sub_title_text_shadow',
					'label' => esc_html__( 'Text Shadow', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-imagebox .sub-title',
				]
			);

			$this->add_control( 
				'sub_title_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#777777',
					'selectors' => [
						'{{WRAPPER}} .tf-imagebox .sub-title' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_responsive_control( 
				'sub_title_spacer',
				[
					'label' => esc_html__( 'Margin', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-imagebox .sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control( 
				'heading_description',
				[
					'label' => esc_html__( 'Description', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'description_typography',
					'label' => esc_html__( 'Typography', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-imagebox .description',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Text_Shadow::get_type(),
				[
					'name' => 'description_text_shadow',
					'label' => esc_html__( 'Text Shadow', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-imagebox .description',
				]
			);

			$this->add_control( 
				'description_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#000000',
					'selectors' => [
						'{{WRAPPER}} .tf-imagebox .description' => 'color: {{VALUE}}',
						'{{WRAPPER}} .tf-imagebox .description a' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control( 
				'description_color_link_hover',
				[
					'label' => esc_html__( 'Link Hover Color', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ffa800',
					'selectors' => [
						'{{WRAPPER}} .tf-imagebox .description a:hover' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_responsive_control( 
				'description_spacer',
				[
					'label' => esc_html__( 'Margin', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-imagebox .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

	    	$this->end_controls_section();
        // /.End Content Style 

	    // Start Button Style 
		    $this->start_controls_section( 
		    	'section_style_button',
	            [
	                'label' => esc_html__( 'Button', 'themesflat-addons' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

	        $this->add_control(
				'button_align',
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
					'default' => 'center',
					'toggle' => true,

				]
			);

	        $this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'button_typography',
					'label' => esc_html__( 'Typography', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-imagebox .tf-button',
				]
			);

			$this->add_responsive_control( 
				'button_padding',
				[
					'label' => esc_html__( 'Padding', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'default' => [
						'top' => '8',
						'right' => '35',
						'bottom' => '40',
						'left' => '35',
						'unit' => 'px',
						'isLinked' => false,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-imagebox .tf-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);		

			$this->add_responsive_control( 
				'button_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'default' => [
						'top' => '17',
						'right' => '0',
						'bottom' => '-42',
						'left' => '0',
						'unit' => 'px',
						'isLinked' => false,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-imagebox .tf-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->start_controls_tabs( 
				'button_style_tabs' 
				);

	        	$this->start_controls_tab( 
	        		'button_style_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'themesflat-addons' ),
					] );	
	        		$this->add_control( 
						'button_color',
						[
							'label' => esc_html__( 'Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#ffffff',
							'selectors' => [
								'{{WRAPPER}} .tf-imagebox .tf-button' => 'color: {{VALUE}}',
								'{{WRAPPER}} .tf-imagebox .tf-button i' => 'color: {{VALUE}}',
								'{{WRAPPER}} .tf-imagebox .tf-button svg' => 'fill: {{VALUE}}',
							],
						]
					);

					$this->add_control( 
						'button_bg_color',
						[
							'label' => esc_html__( 'Background Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#ffa800',
							'selectors' => [
								'{{WRAPPER}} .tf-imagebox .tf-button' => 'background-color: {{VALUE}}',
							],
						]
					);

					$this->add_group_control( 
						\Elementor\Group_Control_Border::get_type(),
						[
							'name' => 'button_border',
							'label' => esc_html__( 'Border', 'themesflat-addons' ),
							'selector' => '{{WRAPPER}} .tf-imagebox .tf-button',
						]
					);

					$this->add_control( 
						'button_border_radius',
						[
							'label' => esc_html__( 'Border Radius', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .tf-imagebox .tf-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);				
					
				$this->end_controls_tab();

				$this->start_controls_tab( 
					'button_style_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'themesflat-addons' ),
					] );

					$this->add_control( 
						'button_color_hover',
						[
							'label' => esc_html__( 'Color Hover', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#ffffff',
							'selectors' => [
								'{{WRAPPER}} .tf-imagebox .tf-button:hover' => 'color: {{VALUE}}',
								'{{WRAPPER}} .tf-imagebox .tf-button:hover i' => 'color: {{VALUE}}',
								'{{WRAPPER}} .tf-imagebox .tf-button:hover svg' => 'fill: {{VALUE}}',
							],
						]
					);

					$this->add_control( 
						'button_bg_color_hover',
						[
							'label' => esc_html__( 'Background Color Hover', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#000000',
							'selectors' => [
								'{{WRAPPER}} .tf-imagebox .hover-default.tf-button:hover, {{WRAPPER}} .tf-imagebox .btn-overlay:after' => 'background-color: {{VALUE}}',
							],
						]
					);

					$this->add_control(
						'button_animation_options',
						[
							'label' => esc_html__( 'Effect Type', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::SELECT,
							'default' => 'default',
							'options' => [
								'default' => esc_html__( 'Default', 'themesflat-addons' ),
								'button' => esc_html__( 'Elementor Button Effect', 'themesflat-addons' ),
								'button-overlay' => esc_html__( 'TF Effect', 'themesflat-addons' ),
							]
						]
					);

					$this->add_control(
						'button_animation_overlay',
						[
							'label' => esc_html__( 'Style', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::SELECT,
							'default' => 'from-top',
							'options' => [								
								'from-top' => esc_html__( 'From Top', 'themesflat-addons' ),
								'from-bottom' => esc_html__( 'From Bottom', 'themesflat-addons' ),
								'from-left' => esc_html__( 'From Left', 'themesflat-addons' ),
								'from-right' => esc_html__( 'From Right', 'themesflat-addons' ),
								'from-center' => esc_html__( 'From Center', 'themesflat-addons' ),
								'skew' => esc_html__( 'Skew', 'themesflat-addons' ),								
							],
							'condition'=> [
								'button_animation_options' => 'button-overlay',
							],
						]
					);	

					$this->add_control(
						'button_animation',
						[
							'label' => esc_html__( 'Hover Animation', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::SELECT,
							'default' => 'elementor-animation-push',
							'options' => [
								'elementor-animation-grow' => esc_html__( 'Grow', 'themesflat-addons' ),
								'elementor-animation-shrink' => esc_html__( 'Shrink', 'themesflat-addons' ),
								'elementor-animation-pulse' => esc_html__( 'Pulse', 'themesflat-addons' ),
								'elementor-animation-pulse-grow' => esc_html__( 'Pulse Grow', 'themesflat-addons' ),
								'elementor-animation-pulse-shrink' => esc_html__( 'Pulse Shrink', 'themesflat-addons' ),
								'elementor-animation-push' => esc_html__( 'Push', 'themesflat-addons' ),
								'elementor-animation-pop' => esc_html__( 'Pop', 'themesflat-addons' ),
								'elementor-animation-bob' => esc_html__( 'Bob', 'themesflat-addons' ),
								'elementor-animation-hang' => esc_html__( 'Hang', 'themesflat-addons' ),
								'elementor-animation-skew' => esc_html__( 'Skew', 'themesflat-addons' ),
								'elementor-animation-wobble-vertical' => esc_html__( 'Wobble Vertical', 'themesflat-addons' ),
								'elementor-animation-wobble-horizontal' => esc_html__( 'Wobble Horizontal', 'themesflat-addons' ),

							],
							'condition'=> [
								'button_animation_options' => 'button',
							],
						]
					);				

					$this->add_group_control( 
						\Elementor\Group_Control_Border::get_type(),
						[
							'name' => 'button_border_hover',
							'label' => esc_html__( 'Border', 'themesflat-addons' ),
							'selector' => '{{WRAPPER}} .tf-imagebox .tf-button:hover',
						]
					);

					$this->add_control( 
						'button_border_radius_hover',
						[
							'label' => esc_html__( 'Border Radius', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .tf-imagebox .tf-button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					
				$this->end_controls_tab();

			$this->end_controls_tabs();

			$this->add_control( 
				'heading_button_icon',
				[
					'label' => esc_html__( 'Icon', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			); 

			$this->add_control( 
				'icon_button',
				[
					'label' => esc_html__( 'Icon Button', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'fa4compatibility' => 'icon_bt',
					'default' => [
						'value' => 'hamela-digital-icon-right',
						'library' => 'hamela_digital_icon',
					],				
				]
			);

			$this->add_control( 
				'button_icon_size',
				[
					'label' => esc_html__( 'Icon Size', 'themesflat-addons' ),
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
						'size' => 20,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-imagebox .tf-button i' => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf-imagebox .tf-button svg' => 'width: {{SIZE}}{{UNIT}}; max-width: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf-imagebox .tf-button img' => 'width: {{SIZE}}{{UNIT}}; max-width: {{SIZE}}{{UNIT}};',
					],
				]
			); 

			$this->add_control( 
				'button_icon_position',
				[
					'label' => esc_html__( 'Icon Position', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'bt_icon_after',
					'options' => [
						'bt_icon_before'  => esc_html__( 'Before', 'themesflat-addons' ),
						'bt_icon_after' => esc_html__( 'After', 'themesflat-addons' ),
					],
				]
			);

			$this->add_control( 
				'button_icon_spacer',
				[
					'label' => esc_html__( 'Icon Spacer', 'themesflat-addons' ),
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
						'size' => 0,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-imagebox .tf-button.bt_icon_before i' => 'margin-right: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf-imagebox .tf-button.bt_icon_before svg' => 'margin-right: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf-imagebox .tf-button.bt_icon_before img' => 'margin-right: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf-imagebox .tf-button.bt_icon_after i' => 'margin-left: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf-imagebox .tf-button.bt_icon_after svg' => 'margin-left: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf-imagebox .tf-button.bt_icon_after img' => 'margin-left: {{SIZE}}{{UNIT}};',
					],
				]
			);

		    $this->end_controls_section();
	    // /.End Button Style
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();

		$class_image_box = '';

		$image =  \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' );		

		$html_title = $html_title_2 = $html_subtitle = $html_description = $html_image_overlay = $button = $icon_button = $icon_name = $html_icon = $has_icon = '';

		ob_start();
		\Elementor\Icons_Manager::render_icon( $settings['icon_button'], [ 'aria-hidden' => 'true' ] );
		$icon_button = ob_get_clean(); 	
		

		$btn_animation = 'hover-default';
		if ($settings['button_animation_options'] == 'button') {
			$btn_animation = 'hover-default ' . $settings['button_animation'];
		}elseif ($settings['button_animation_options'] == 'button-overlay') {
			$btn_animation = 'btn-overlay ' . $settings['button_animation_overlay'];
		}

		if ( $settings['show_button'] == 'yes' ) {
			if ($settings['button_icon_position'] == 'bt_icon_after') {
				$button =  sprintf ('<div class="tf-button-container %4$s"><a class="tf-button %5$s %6$s" href="%3$s">%1$s %2$s</a></div>',$settings['button_text'] , $icon_button, $settings['link']['url'], $settings['button_align'], $settings['button_icon_position'], $btn_animation );
			}else{
				$button =  sprintf ('<div class="tf-button-container %4$s"><a class="tf-button %5$s %6$s" href="%3$s">%2$s %1$s</a></div>',$settings['button_text'] , $icon_button, $settings['link']['url'], $settings['button_align'], $settings['button_icon_position'], $btn_animation );
			}
			
		}		

		if ($settings['show_image_overlay'] == 'yes') {
			$html_image_overlay = sprintf('<div class="image-overlay %1$s"></div>', $settings['image_overlay_effect']);
		}

		if ($settings['title'] != '') {
			$html_title = sprintf('<%2$s class="title"><a href="%3$s">%1$s</a></%2$s>', $settings['title'], $settings['wrap_heading'], $settings['link']['url']);

			$html_title_2 = sprintf('<%2$s class="title">%1$s</%2$s>', $settings['title'], $settings['wrap_heading']);
		}

		if ($settings['sub_title'] != '') {
			$html_subtitle = sprintf('<div class="sub-title">%1$s</div>', $settings['sub_title']);
		}

		if ($settings['description'] != '') {
			$html_description = sprintf('<div class="description">%1$s</div>', $settings['description']);
		}

		if ( $settings['icon_name']['value'] != '' ) {

			$icon_name = \Elementor\Addon_Elementor_Icon_manager_free::render_icon( $settings['icon_name'], [ 'aria-hidden' => 'true' ] );
			$html_icon = sprintf('<div class="wrap-icon">%1$s</div>', $icon_name);

			$has_icon = 'has-icon';
		}

		if ($settings['show_image'] != 'yes') {
			$class_image_box .= ' no-image ';
		}

		echo sprintf ( 
			'<div class="tf-imagebox %8$s"> 
                <div class="image">%1$s %5$s</div>
                <div class="content content-one %7$s">	
                	%6$s
                	<div>
                	%9$s               
					%10$s
					</div>
				</div>
				<div class="content content-two %7$s">	
                	%6$s
                	%9$s               
					%2$s
	                %3$s
	                %4$s
				</div>
            </div>',
            $image,
            $html_title,
            $html_description,           
            $button,
            $html_image_overlay,
            $html_icon,
            $has_icon,
            $class_image_box,
            $html_subtitle,
            $html_title_2
        );
			
	}

	protected function content_template() {}	

}