<?php
class TFCarousel_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tfcarousel';
    }
    
    public function get_title() {
        return esc_html__( 'TF Carousel', 'themesflat-addons' );
    }

    public function get_icon() {
        return 'eicon-slider-push';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

	protected function register_controls() {
        // Start Carousel Setting        
		$this->start_controls_section( 
			'section_carousel',
            [
                'label' => esc_html__('Carousel', 'themesflat-addons'),
            ]
        );	    

		$repeater = new \Elementor\Repeater();

		$repeater->add_control( 
			'list_content_type',
			[
				'label' => esc_html__( 'Content type', 'themesflat-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'content',
				'options' => [
					'content'  => esc_html__( 'Content', 'themesflat-addons' ),
					'template' => esc_html__( 'Template', 'themesflat-addons' ),
				],
			]
		);

		$repeater->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'themesflat-addons' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => URL_THEMESFLAT_ADDONS."assets/img/brand-demo.jpg",
				],
				'condition' => [
					'list_content_type' => 'content',
				],
			]
		);

		$repeater->add_control( 
			'list_content_template',
			[
				'label' => esc_html__( 'Template', 'themesflat-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => ThemesFlat_Addons::tf_get_template_elementor(),
				'condition' => [
					'list_content_type' => 'template',
				],				
			]
		);	

		$this->add_control( 
			'carousel_list',
				[					
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[ ],
						[ ],
						[ ],
                        [ ],
                        [ ],
					],					
				]
			);
		
		$this->end_controls_section();
        // /.End Carousel	

        // Start Setting        
		$this->start_controls_section( 
			'section_setting',
            [
                'label' => esc_html__('Setting', 'themesflat-addons'),
            ]
        );	

		$this->add_control( 
			'carousel_loop',
			[
				'label' => esc_html__( 'Loop', 'themesflat-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'On', 'themesflat-addons' ),
				'label_off' => esc_html__( 'Off', 'themesflat-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',				
			]
		);

		$this->add_control( 
			'carousel_auto',
			[
				'label' => esc_html__( 'Auto Play', 'themesflat-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'On', 'themesflat-addons' ),
				'label_off' => esc_html__( 'Off', 'themesflat-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',				
			]
		);	

		$this->add_control(
			'carousel_spacer',
			[
				'label' => esc_html__( 'Spacer', 'themesflat-addons' ),
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
				'label' => esc_html__( 'Columns Desktop', 'themesflat-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '4',
				'options' => [
					'1' => esc_html__( '1', 'themesflat-addons' ),
					'2' => esc_html__( '2', 'themesflat-addons' ),
					'3' => esc_html__( '3', 'themesflat-addons' ),
					'4' => esc_html__( '4', 'themesflat-addons' ),
					'5' => esc_html__( '5', 'themesflat-addons' ),
					'6' => esc_html__( '6', 'themesflat-addons' ),
				],				
			]
		);

		$this->add_control( 
        	'carousel_column_tablet',
			[
				'label' => esc_html__( 'Columns Tablet', 'themesflat-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1' => esc_html__( '1', 'themesflat-addons' ),
					'2' => esc_html__( '2', 'themesflat-addons' ),
					'3' => esc_html__( '3', 'themesflat-addons' ),
					'4' => esc_html__( '4', 'themesflat-addons' ),
					'5' => esc_html__( '5', 'themesflat-addons' ),
					'6' => esc_html__( '6', 'themesflat-addons' ),
				],				
			]
		);

		$this->add_control( 
        	'carousel_column_mobile',
			[
				'label' => esc_html__( 'Columns Mobile', 'themesflat-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1' => esc_html__( '1', 'themesflat-addons' ),
					'2' => esc_html__( '2', 'themesflat-addons' ),
					'3' => esc_html__( '3', 'themesflat-addons' ),
					'4' => esc_html__( '4', 'themesflat-addons' ),
					'5' => esc_html__( '5', 'themesflat-addons' ),
					'6' => esc_html__( '6', 'themesflat-addons' ),
				],				
			]
		);		
        $this->end_controls_section();
        // /.End Setting

        // Start Arrow        
		$this->start_controls_section( 
			'section_arrow',
            [
                'label' => esc_html__('Arrow', 'themesflat-addons'),
            ]
        );

        $this->add_control( 
			'carousel_arrow',
			[
				'label' => esc_html__( 'Arrow', 'themesflat-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'themesflat-addons' ),
				'label_off' => esc_html__( 'Hide', 'themesflat-addons' ),
				'return_value' => 'yes',
				'default' => 'no',
				'description'	=> 'Just show when you have two slide',
				'separator' => 'before',
			]
		);

        $this->add_control( 
			'carousel_prev_icon', [
                'label' => esc_html__( 'Prev Icon', 'themesflat-addons' ),
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
                'label' => esc_html__( 'Next Icon', 'themesflat-addons' ),
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
					'label' => esc_html__( 'Normal', 'themesflat-addons' ),						
				]
			);

			$this->add_control( 
				'carousel_arrow_color',
	            [
	                'label' => esc_html__( 'Color', 'themesflat-addons' ),
	                'type' => \Elementor\Controls_Manager::COLOR,
	                'default' => '#ffffff',
	                'selectors' => [
						'{{WRAPPER}} .tf-carousel-box .owl-nav .owl-prev, {{WRAPPER}} .tf-carousel-box .owl-nav .owl-next' => 'color: {{VALUE}}',
					],
					'condition' => [
	                    'carousel_arrow' => 'yes',
	                ]
	            ]
	        );

	        $this->add_control( 
	        	'carousel_arrow_bg_color',
	            [
	                'label' => esc_html__( 'Background Color', 'themesflat-addons' ),
	                'type' => \Elementor\Controls_Manager::COLOR,
	                'default' => '#ffa800',
	                'selectors' => [
						'{{WRAPPER}} .tf-carousel-box .owl-nav .owl-prev, {{WRAPPER}} .tf-carousel-box .owl-nav .owl-next' => 'background-color: {{VALUE}};',
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
					'label' => esc_html__( 'Hover', 'themesflat-addons' ),
				]
			);

	    	$this->add_control( 
	    		'carousel_arrow_color_hover',
	            [
	                'label' => esc_html__( 'Color', 'themesflat-addons' ),
	                'type' => \Elementor\Controls_Manager::COLOR,
	                'default' => '#ffffff',
	                'selectors' => [
						'{{WRAPPER}} .tf-carousel-box .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-carousel-box .owl-nav .owl-next:hover' => 'color: {{VALUE}}',
					],
					'condition' => [
	                    'carousel_arrow' => 'yes',
	                ]
	            ]
	        );

	        $this->add_control( 
	        	'carousel_arrow_hover_bg_color',
	            [
	                'label' => esc_html__( 'Background Color', 'themesflat-addons' ),
	                'type' => \Elementor\Controls_Manager::COLOR,
	                'default' => '#11161e',
	                'selectors' => [
						'{{WRAPPER}} .tf-carousel-box .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-carousel-box .owl-nav .owl-next:hover' => 'background-color: {{VALUE}};',
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

        // Start Arrow        
		$this->start_controls_section( 
			'section_bullets',
            [
                'label' => esc_html__('Bullets', 'themesflat-addons'),
            ]
        );

		$this->add_control( 
			'carousel_bullets',
            [
                'label'         => esc_html__( 'Bullets', 'themesflat-addons' ),
                'type'          => \Elementor\Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Show', 'themesflat-addons' ),
                'label_off'     => esc_html__( 'Hide', 'themesflat-addons' ),
                'return_value'  => 'yes',
                'default'       => 'no',
                'separator' => 'before',
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
					'label' => esc_html__( 'Normal', 'themesflat-addons' ),						
				]
			);


			$this->add_control( 
				'carousel_bullets_bg_color',
	            [
	                'label' => esc_html__( 'Background Color', 'themesflat-addons' ),
	                'type' => \Elementor\Controls_Manager::COLOR,
	                'default' => '#ffa800',
	                'selectors' => [
						'{{WRAPPER}} .tf-carousel-box .owl-dots .owl-dot' => 'background-color: {{VALUE}}',
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
					'label' => esc_html__( 'Active', 'themesflat-addons' ),
				]
			);


        	$this->add_control( 
        		'carousel_bullets_hover_bg_color',
	            [
	                'label' => esc_html__( 'Background Color', 'themesflat-addons' ),
	                'type' => \Elementor\Controls_Manager::COLOR,
	                'default' => '#000000',
	                'selectors' => [
						'{{WRAPPER}} .tf-carousel-box .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-carousel-box .owl-dots .owl-dot.active' => 'background-color: {{VALUE}}',
					],
					'condition' => [
	                    'carousel_bullets' => 'yes',
	                ]
	            ]
	        );


			$this->end_controls_tab();

	    $this->end_controls_tabs();	

        $this->end_controls_section();
        // /.End Arrow    
	    
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
		<div class="tf-carousel-box <?php echo esc_attr($carousel_arrow); ?> <?php echo esc_attr($carousel_bullets); ?>" data-loop="<?php echo esc_attr($settings['carousel_loop']); ?>" data-auto="<?php echo esc_attr($settings['carousel_auto']); ?>" data-column="<?php echo esc_attr($settings['carousel_column_desk']); ?>" data-column2="<?php echo esc_attr($settings['carousel_column_tablet']); ?>" data-column3="<?php echo esc_attr($settings['carousel_column_mobile']); ?>" data-spacer="<?php echo esc_attr($settings['carousel_spacer']); ?>" data-prev_icon="<?php echo esc_attr($settings['carousel_prev_icon']) ?>" data-next_icon="<?php echo esc_attr($settings['carousel_next_icon']) ?>">
			<div class="owl-carousel owl-theme">
			<?php foreach ($settings['carousel_list'] as $carousel): ?>
				<?php if($carousel['list_content_type'] == 'content') : ?>
					<div class="item"><img src="<?php echo esc_attr($carousel['image']['url']); ?>" alt="image"></div>
				<?php elseif($carousel['list_content_type'] == 'template') : ?>
					<div class="item">
						<?php 
						if ( !empty($carousel['list_content_template']) ) {
				            $post_id = flat_get_post_page_content($carousel['list_content_template']);
				            $frontend = new \Elementor\Frontend;

                            $htmlstring = $frontend->get_builder_content_for_display($post_id, true);
//                            $newstr = preg_replace('/<!--code-->.*?<!--\/code-->/is', '', $htmlstring);
//                            $newstr = preg_replace('#(<[a-z ]*)(style=("|\')(.*?)("|\'))([a-z ]*>)#', '\\1\\6', $htmlstring);
                            $text = preg_replace('#<style>.*?</style>#s', '', $htmlstring);

//                            $text = preg_replace('#(<[a-z ]*)(style=("|\')(.*?)("|\'))([a-z ]*>)#', '\\1\\6', $htmlstring);
//                            $newstr = preg_replace('/ style=("|\')(.*?)("|\')/','',$htmlstring);

                            echo  $text;
				        }
						?>
					</div>
				<?php endif; ?>
			<?php endforeach;?>
			</div>
		</div>
		<?php	
	}

	protected function content_template() {}

}