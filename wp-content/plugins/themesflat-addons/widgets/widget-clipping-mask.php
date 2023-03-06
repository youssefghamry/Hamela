<?php
class TFClipping_Mask_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tfclippingmask';
    }
    
    public function get_title() {
        return esc_html__( 'TF Clipping Mask', 'themesflat-addons' );
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
			    'image_media',
			    [
				    'label' => esc_html__( 'Choose Image', 'themesflat-addons' ),
				    'type' => \Elementor\Controls_Manager::MEDIA,
				    'dynamic' => ['active' => true],
				    'default' => [
					    'url' => URL_THEMESFLAT_ADDONS."assets/img/placeholder.jpg",
				    ],
				    'selectors' => [
					    '{{WRAPPER}} .tf-clipping-mask .image' => 'background-image: url( {{url}} );',
	                ],
			    ]
		    );

		    $this->add_responsive_control(
			    'image_position',
			    [
				    'label' => esc_html__( 'Image Position', 'themesflat-addons' ),
				    'type' => \Elementor\Controls_Manager::SELECT,
				    'default' => 'initial',
				    'options' => [
					    'initial'       => esc_html__( 'Default', 'themesflat-addons' ),
					    'center center' => esc_html__( 'Center Center', 'themesflat-addons' ),
					    'center left'   => esc_html__( 'Center Left', 'themesflat-addons' ),
					    'center right'  => esc_html__( 'Center Right', 'themesflat-addons' ),
					    'top center'    => esc_html__( 'Top Center', 'themesflat-addons' ),
					    'top left'      => esc_html__( 'Top Left', 'themesflat-addons' ),
					    'top right'     => esc_html__( 'Top Right', 'themesflat-addons' ),
					    'bottom center' => esc_html__( 'Bottom Center', 'themesflat-addons' ),
					    'bottom left'   => esc_html__( 'Bottom Left', 'themesflat-addons' ),
					    'bottom right'  => esc_html__( 'Bottom Right', 'themesflat-addons' ),
				    ],
				    'selectors' => [
					    '{{WRAPPER}} .tf-clipping-mask .image' => 'background-position: {{value}};',
				    ],
			    ]
		    );

		    $this->add_responsive_control(
			    'image_attachment',
			    [
				    'label' => esc_html__( 'Image Attachment', 'themesflat-addons' ),
				    'type' => \Elementor\Controls_Manager::SELECT,
				    'default' => 'initial',
				    'options' => [
	                    'initial'   => esc_html__( 'Default', 'themesflat-addons' ),
					    'scroll'    => esc_html__( 'Scroll', 'themesflat-addons' ),
					    'fixed'     => esc_html__( 'Fixed', 'themesflat-addons' ),
				    ],
				    'selectors' => [
					    '{{WRAPPER}} .tf-clipping-mask .image' => 'background-attachment: {{value}};',
				    ],
			    ]
		    );

		    $this->add_responsive_control(
			    'image_repeat',
			    [
				    'label' => esc_html__( 'Image Repeat', 'themesflat-addons' ),
				    'type' => \Elementor\Controls_Manager::SELECT,
				    'default' => 'initial',
				    'options' => [
					    'initial'    => esc_html__( 'Default', 'themesflat-addons' ),
					    'no-repeat'    => esc_html__( 'No-repeat', 'themesflat-addons' ),
					    'repeat'    => esc_html__( 'Repeat', 'themesflat-addons' ),
					    'repeat-x'    => esc_html__( 'Repeat-x', 'themesflat-addons' ),
					    'repeat-y'    => esc_html__( 'Repeat-y', 'themesflat-addons' ),
				    ],
				    'selectors' => [
					    '{{WRAPPER}} .tf-clipping-mask .image' => 'background-repeat: {{value}};',
				    ],
			    ]
		    );

		    $this->add_responsive_control(
			    'image_size',
			    [
				    'label' => esc_html__( 'Image Size', 'themesflat-addons' ),
				    'type' => \Elementor\Controls_Manager::SELECT,
				    'default' => 'initial',
				    'options' => [
					    'initial'    => esc_html__( 'Default', 'themesflat-addons' ),
					    'cover'    => esc_html__( 'Cover', 'themesflat-addons' ),
					    'contain'    => esc_html__( 'Contain', 'themesflat-addons' ),
				    ],
				    'selectors' => [
					    '{{WRAPPER}} .tf-clipping-mask .image' => 'background-size: {{value}};',
				    ],
			    ]
		    );

		    $this->add_control(
				'title',
				[
					'label' => esc_html__( 'Title', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Default title', 'themesflat-addons' ),
					'separator' => 'before',
				]
			); 

			$this->add_control(
				'description',
				[
					'label' => esc_html__( 'Description', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
				]
			);

			$this->add_control(
				'link',
				[
					'label' => esc_html__( 'Link', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::URL,
					'placeholder' => esc_html__( 'https://your-link.com', 'themesflat-addons' ),
					'show_external' => true,
					'default' => [
						'url' => '',
						'is_external' => true,
						'nofollow' => true,
					],
				]
			);
					
	        $this->end_controls_section();
        // /.End Image

	    // Start Clipping Mask        
			$this->start_controls_section( 
				'section_clipping_mask',
	            [
	                'label' => esc_html__('Clipping Mask', 'themesflat-addons'),
	            ]
	        );

		    $this->add_control(
			    'mask',
			    [
				    'label' => esc_html__( 'Mask', 'themesflat-addons' ),
				    'type' => \Elementor\Controls_Manager::SELECT,
				    'default' => 'oval-5',
				    'options' => [
					    'mask1'         => esc_html__( 'Mask Style1', 'themesflat-addons' ),
					    'mask2'         => esc_html__( 'Mask Style2', 'themesflat-addons' ),
					    'mask3'         => esc_html__( 'Mask Style3', 'themesflat-addons' ),
					    'oval-1'         => esc_html__( 'Oval Style1', 'themesflat-addons' ),
					    'oval-2'         => esc_html__( 'Oval Style2', 'themesflat-addons' ),
					    'oval-3'         => esc_html__( 'Oval Style3', 'themesflat-addons' ),
					    'oval-4'         => esc_html__( 'Oval Style4', 'themesflat-addons' ),
					    'oval-5'         => esc_html__( 'Oval Style5', 'themesflat-addons' ),
					    'oval-6'         => esc_html__( 'Oval Style6', 'themesflat-addons' ),
					    'oval-7'         => esc_html__( 'Oval Style7', 'themesflat-addons' ),
					    'oval-8'         => esc_html__( 'Oval Style8', 'themesflat-addons' ),
					    'custom-year'         => esc_html__( 'Custom Year', 'themesflat-addons' ),
					    'custom'            => esc_html__( 'Custom', 'themesflat-addons' ),
				    ],
				    'selectors' => [
					    '{{WRAPPER}} .tf-clipping-mask .image-clipping-mask' => 'mask-image: url( '.URL_THEMESFLAT_ADDONS.'assets/img/{{value}}.svg ); -webkit-mask-image: url( '.URL_THEMESFLAT_ADDONS.'assets/img/{{value}}.svg );',
				    ]
			    ]
		    );

		    $this->add_control(
			    'mask_custom',
			    [
				    'label' => esc_html__( 'Choose Mask', 'themesflat-addons' ),
				    'description' => esc_html__( 'SVG Image Or PNG Image', 'themesflat-addons' ),
				    'type' => \Elementor\Controls_Manager::MEDIA,
				    'dynamic' => ['active' => true],
				    'default' => [
					    'url' => URL_THEMESFLAT_ADDONS."assets/img/placeholder.jpg",
				    ],
				    'selectors' => [
					    '{{WRAPPER}} .tf-clipping-mask .image-clipping-mask' => 'mask-image: url( {{url}} ); -webkit-mask-image: url( {{url}} );',
				    ],
				    'condition' => [ 'mask' => 'custom' ],
			    ]
		    );

		    $this->add_responsive_control(
			    'mask_position',
			    [
				    'label' => esc_html__( 'Mask Position', 'themesflat-addons' ),
				    'type' => \Elementor\Controls_Manager::SELECT,
				    'default' => 'center center',
				    'options' => [
					    'unset'         => esc_html__( 'Default', 'themesflat-addons' ),
					    'center center' => esc_html__( 'Center Center', 'themesflat-addons' ),
					    'center left'   => esc_html__( 'Center Left', 'themesflat-addons' ),
					    'center right'  => esc_html__( 'Center Right', 'themesflat-addons' ),
					    'top center'    => esc_html__( 'Top Center', 'themesflat-addons' ),
					    'top left'      => esc_html__( 'Top Left', 'themesflat-addons' ),
					    'top right'     => esc_html__( 'Top Right', 'themesflat-addons' ),
					    'bottom center' => esc_html__( 'Bottom Center', 'themesflat-addons' ),
					    'bottom left'   => esc_html__( 'Bottom Left', 'themesflat-addons' ),
					    'bottom right'  => esc_html__( 'Bottom Right', 'themesflat-addons' ),
				    ],
				    'selectors' => [
					    '{{WRAPPER}} .tf-clipping-mask .image-clipping-mask' => 'mask-position: {{value}}; -webkit-mask-position: {{value}};',
				    ]
			    ]
		    );

		    $this->add_responsive_control(
			    'mask_repeat',
			    [
				    'label' => esc_html__( 'Mask Repeat', 'themesflat-addons' ),
				    'type' => \Elementor\Controls_Manager::SELECT,
				    'default' => 'no-repeat',
				    'options' => [
					    'no-repeat' => esc_html__( 'No-repeat', 'themesflat-addons' ),
					    'repeat'    => esc_html__( 'Repeat', 'themesflat-addons' ),
					    'repeat-x'  => esc_html__( 'Repeat-x', 'themesflat-addons' ),
					    'repeat-y'  => esc_html__( 'Repeat-y', 'themesflat-addons' ),
				    ],
				    'selectors' => [
					    '{{WRAPPER}} .tf-clipping-mask .image-clipping-mask' => 'mask-repeat: {{value}}; -webkit-mask-repeat: {{value}};',
				    ]
			    ]
		    );

		    $this->add_responsive_control(
			    'mask_size',
			    [
				    'label' => esc_html__( 'Mask Size', 'themesflat-addons' ),
				    'type' => \Elementor\Controls_Manager::SELECT,
				    'default' => 'unset',
				    'options' => [
					    'unset'     => esc_html__( 'Default', 'themesflat-addons' ),
					    'cover'     => esc_html__( 'Cover', 'themesflat-addons' ),
					    'contain'   => esc_html__( 'Contain', 'themesflat-addons' ),
				    ],
				    'selectors' => [
					    '{{WRAPPER}} .tf-clipping-mask .image-clipping-mask' => 'mask-size: {{value}}; -webkit-mask-size: {{value}};',
				    ]
			    ]
		    );

		    $this->add_control(
			    'mask_rotate',
			    [
				    'label' => esc_html__( 'Rotate', 'themesflat-addons' ),
				    'type'  => \Elementor\Controls_Manager::SLIDER,
				    'size_units' => [ 'deg' ],
				    'default' => [
					    'unit' => 'deg',
					    'size' => 0,
				    ],
				    'selectors' => [
					    '{{WRAPPER}} .tf-clipping-mask .image-clipping-mask' => 'transform: rotate( {{SIZE}}{{UNIT}} );',
					    '{{WRAPPER}} .tf-clipping-mask .image-clipping-mask .image' => 'transform: rotate( calc( -1 * {{SIZE}}{{UNIT}} ) );',
				    ],
			    ]
		    );

	    	$this->end_controls_section();
        // /.End Clipping Mask
        
        // Start General Style        
			$this->start_controls_section( 
				'section_style_general',
	            [
	                'label' => esc_html__('General', 'themesflat-addons'),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

	        $this->add_responsive_control(
				'align',
				[
					'label' => esc_html__( 'Alignment', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
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
					],
					'default' => 'center',
					'selectors' => [
						'{{WRAPPER}} .tf-clipping-mask' => 'text-align: {{VALUE}};',
					],
				]
			);

	        $this->add_responsive_control(
			    'margin',
			    [
				    'label' => esc_html__( 'Margin', 'themesflat-addons' ),
				    'type' => \Elementor\Controls_Manager::DIMENSIONS,
				    'size_units' => [ 'px', '%', 'em' ],
				    'selectors' => [
					    '{{WRAPPER}} .tf-clipping-mask' => 'margin: {{top}}{{unit}} {{right}}{{unit}} {{bottom}}{{unit}} {{left}}{{unit}};',
				    ],
			    ]
		    );

		    $this->add_responsive_control(
			    'padding',
			    [
				    'label' => esc_html__( 'Padding', 'themesflat-addons' ),
				    'type' => \Elementor\Controls_Manager::DIMENSIONS,
				    'size_units' => [ 'px', '%', 'em' ],
				    'default' => [
						'top' => '20',
						'right' => '20',
						'bottom' => '20',
						'left' => '20',
						'unit' => 'px',
						'isLinked' => 'true',
					],
				    'selectors' => [
					    '{{WRAPPER}} .tf-clipping-mask' => 'padding: {{top}}{{unit}} {{right}}{{unit}} {{bottom}}{{unit}} {{left}}{{unit}};',
				    ],
			    ]
		    );

		    $this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'box_shadow',
					'label' => esc_html__( 'Box Shadow', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-clipping-mask',
				]
			);   

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border',
					'label' => esc_html__( 'Border', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-clipping-mask',
				]
			);

			$this->add_responsive_control(
			    'border_radius',
			    [
				    'label' => esc_html__( 'Border Radius', 'themesflat-addons' ),
				    'type' => \Elementor\Controls_Manager::DIMENSIONS,
				    'size_units' => [ 'px', '%', 'em' ],
				    'selectors' => [
					    '{{WRAPPER}} .tf-clipping-mask' => 'border-radius: {{top}}{{unit}} {{right}}{{unit}} {{bottom}}{{unit}} {{left}}{{unit}};',
				    ],
				    'toggle' => true,
				    'separator' => 'after'
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

		    $this->add_responsive_control(
			    'image_width',
			    [
				    'label' => esc_html__( 'Width', 'themesflat-addons' ),
				    'type'  => \Elementor\Controls_Manager::SLIDER,
				    'size_units' => [ 'px', '%', 'vw' ],
				    'default' => [
					    'unit' => '%',
					    'size' => 100,
				    ],
				    'selectors' => [
					    '{{WRAPPER}} .tf-clipping-mask .image-clipping-mask' => 'width: {{SIZE}}{{UNIT}};',
				    ],
			    ]
		    );

		    $this->add_responsive_control(
			    'image_height',
			    [
				    'label' => esc_html__( 'Height', 'themesflat-addons' ),
				    'type'  => \Elementor\Controls_Manager::SLIDER,
				    'size_units' => [ 'px', '%', 'vh' ],
				    'range' => [
					    'px' => [
						    'min' => 0,
						    'max' => 1000,
						    'step' => 1,
					    ]
				    ],
				    'default' => [
					    'unit' => 'px',
					    'size' => 320,
				    ],
				    'selectors' => [
					    '{{WRAPPER}} .tf-clipping-mask .image-clipping-mask' => 'height: {{SIZE}}{{UNIT}};',
				    ],
				    'separator' => 'after'
			    ]
		    );  

		    $this->add_control(
				'overlay_heading',
				[
					'label' => esc_html__( 'Overlay', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			); 

			$this->add_control(
				'overlay_background_color',
				[
					'label' => esc_html__( 'Background color', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-clipping-mask .overlay-image' => 'background-color: {{VALUE}}',
					],
				]
			);

	        $this->end_controls_section();
        // /.End Image Style

	    // Start Title & Description Style
	        $this->start_controls_section( 
				'section_style_title_description',
	            [
	                'label' => esc_html__('Title & Description', 'themesflat-addons'),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

	        $this->add_control(
				'title_heading',
				[
					'label' => esc_html__( 'Title', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
				]
			);

	        $this->add_control(
				'title_tag',
				[
					'label' => esc_html__( 'Title Tag', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'h3',
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
					'selector' => '{{WRAPPER}} .tf-clipping-mask .title',
				]
			);

			$this->add_control(
				'title_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#000000',
					'selectors' => [
						'{{WRAPPER}} .tf-clipping-mask .title, {{WRAPPER}} .tf-clipping-mask .title a' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .tf-clipping-mask .title a:hover' => 'color: {{VALUE}}',
					],
					'condition' => [
						'link[url]!' => '', 
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Text_Shadow::get_type(),
				[
					'name' => 'title_shadow',
					'label' => esc_html__( 'Text Shadow', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-clipping-mask .title',
				]
			);

			$this->add_responsive_control(
			    'title_margin',
			    [
				    'label' => esc_html__( 'Margin', 'themesflat-addons' ),
				    'type' => \Elementor\Controls_Manager::DIMENSIONS,
				    'size_units' => [ 'px', '%', 'em' ],
				    'selectors' => [
					    '{{WRAPPER}} .tf-clipping-mask .title' => 'margin: {{top}}{{unit}} {{right}}{{unit}} {{bottom}}{{unit}} {{left}}{{unit}};',
				    ],
			    ]
		    );

		    $this->add_control(
				'description_heading',
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
					'selector' => '{{WRAPPER}} .tf-clipping-mask .description',
				]
			);

			$this->add_control(
				'description_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#000000',
					'selectors' => [
						'{{WRAPPER}} .tf-clipping-mask .description' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Text_Shadow::get_type(),
				[
					'name' => 'description_shadow',
					'label' => esc_html__( 'Text Shadow', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-clipping-mask .description',
				]
			);

			$this->add_responsive_control(
			    'description_margin',
			    [
				    'label' => esc_html__( 'Margin', 'themesflat-addons' ),
				    'type' => \Elementor\Controls_Manager::DIMENSIONS,
				    'size_units' => [ 'px', '%', 'em' ],
				    'selectors' => [
					    '{{WRAPPER}} .tf-clipping-mask .description' => 'margin: {{top}}{{unit}} {{right}}{{unit}} {{bottom}}{{unit}} {{left}}{{unit}};',
				    ],
			    ]
		    );

	        $this->end_controls_section();
	    // /.End Title & Description Style
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();

		$title = $html_description = '';
		
		$target = $settings['link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['link']['nofollow'] ? ' rel="nofollow"' : '';

		if ($settings['title'] != '') {
			$title = '<'.$settings['title_tag'].' class="title">'.$settings['title'].'</'.$settings['title_tag'].'>';
			if ( $settings['link']['url'] != '' ) {
				$title = '<'.$settings['title_tag'].' class="title"><a href="' . $settings['link']['url'] . '"' . $target . $nofollow . '>'.$settings['title'].'</a></'.$settings['title_tag'].'>';
			}
		}
		

		if ($settings['description'] != '') {
			$html_description = '<div class="description">'.$settings['description'].'</div>';
		}

		echo sprintf ( 
			'<div class="tf-clipping-mask"> 
                <div class="image-clipping-mask">                	
                	<div class="image"></div>
                	<div class="overlay-image"></div>
                </div>
                <div class="content">
	                %1$s
	                %2$s
				</div>
            </div>',
            $title,
            $html_description
        );
			
	}

	protected function content_template() {}	

}