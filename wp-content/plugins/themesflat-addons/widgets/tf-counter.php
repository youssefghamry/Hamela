<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Tf_Register_Widgets extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve oEmbed widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'tfcounter';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve oEmbed widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'TF Counter', 'themesflat-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve oEmbed widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-counter';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'themesflat_addons' ];
	}

	/**
	 * Register oEmbed widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		// Start section Content.
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'themesflat-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Ending number.
		$this->add_control(
			'ending_number',
			[
				'label'     => esc_html__( 'Ending Number', 'themesflat-addons' ),
				'type'      => \Elementor\Controls_Manager::NUMBER,
				'step'      => 1,
				'default'   => 1250
			]
		);

		// Prefix
		$this->add_control(
			'prefix',
			[
				'label'       => esc_html__( 'Prefix', 'themesflat-addons' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Prefix', 'themesflat-addons' )
			]
		);

		// Suffix
		$this->add_control(
			'suffix',
			[
				'label'       => esc_html__( 'Suffix','themesflat-addons' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Suffix', 'themesflat-addons' )
			]
		);

		$this->add_control(
			'separator',
			[
				'label' => esc_html__( 'Separator', 'themesflat-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default'  => esc_html__( 'Default', 'themesflat-addons' ),
					'dot' => esc_html__( 'Dot', 'themesflat-addons' ),
                    'none'  => esc_html__( 'None', 'themesflat-addons' ),
				],
			]
		);

		// Title. 
		$this->add_control(
			'title',
			[
				'label'     => esc_html__( 'Title', 'themesflat-addons' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Title', 'themesflat-addons' ),
				'default'     => 'Project <br> completed'
			]
		);

		// Alignment
		$this->add_responsive_control(
			'counter_alignment',
			[
				'label'        => esc_html__( 'Alignment', 'themesflat-addons'),
				'type'         => \Elementor\Controls_Manager::CHOOSE,
				'label_block'  => true,
				'options'      => [
					'left'     => [
						'title'=> esc_html__( 'Left', 'themesflat-addons'),
						'icon' => 'fa fa-align-left',
					],
					'center'   => [
						'title'=> esc_html__( 'Center', 'themesflat-addons'),
						'icon' => 'fa fa-align-center',
					],
					'right'    => [
						'title'=> esc_html__( 'Right', 'themesflat-addons'),
						'icon' => 'fa fa-align-right',
					],
				],
				'default'      => 'center',
				'prefix_class' => 'tf-content-align-'
			]
		);

		// /.End section Content.
		$this->end_controls_section();


		// START SECTION ICON.
		$this->start_controls_section(
			'icon_section',
			[
				'label'    => esc_html__( 'Icon', 'themesflat-addons' ),
				'type'     => \Elementor\Controls_Manager::TAB_CONTENT
			]
		);

		// Icon Counter
		$this->add_control(
			'icon_type',
			[
				'name' => 'tf_counter_icon_type',
				'label'    => esc_html__( 'Icon','themesflat-addons' ),
				'type'     => \Elementor\Controls_Manager::CHOOSE,
				'options'  => [
					'none' => [
		                'title' => esc_html__('None', 'themesflat-addons'),
		                'icon' => 'fa fa-ban',
		            ],
		            'icon' => [
		                'title' => esc_html__('Icon', 'themesflat-addons'),
		                'icon' => 'fa fa-gear fa-cog',
		            ],
		            'image' => [
		                'title' => esc_html__('Image', 'themesflat-addons'),
		                'icon' => 'fa fa-picture-o fa-file-image-o far fa-file-image',
		            ],
				],
				'default'  => 'icon'
			]
		);
		// Icon 
		$this->add_control(
			'icon_name',
			[
		        'name' => 'icon_name_counter',
		        'label' => esc_html__('Icon', 'themesflat-addons'),
		        'type' => \Elementor\Controls_Manager::ICONS,
		        'default' => [
		            'value' => 'far fa-circle',
		            'library' => 'fa-solid',
		        ],
		        'condition' => [
		            'icon_type' => 'icon',
		        ]
		    ]
		);

		// Images 
		$this->add_control(
			'counter_images',
			[
				'label'  => esc_html__('Counter Images','themesflat-addons'),
				'type'   => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => URL_THEMESFLAT_ADDONS."assets/img/placeholder.jpg",
                ],
                'condition' => [
                    'icon_type' => 'image',
                ],
			]

		);


		// /.END SECTION ICON.
		$this->end_controls_section();

		// START SECTION STYLE GENERAL.
        $this->start_controls_section( 
        	'section_style_general',
            [
                'label' => esc_html__( 'General', 'themesflat-addons' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        	$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'general_background_color',
					'label' => esc_html__( 'Background', 'themesflat-addons' ),
					'types' => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .flat-counter',
				]
			);

			$this->add_control(
				'background_overlay',
				[
					'label' => esc_html__( 'Background Overlay', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .flat-counter .inner' => 'background-color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'general_padding',
				[
					'label' => esc_html__( 'Padding', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .flat-counter' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'general_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .flat-counter' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'general_box_shadow',
					'label' => esc_html__( 'Box Shadow', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .flat-counter',
				]
			);	

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'general_border',
					'label' => esc_html__( 'Border', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .flat-counter',
				]
			);

			$this->add_control(
				'general_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .flat-counter' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);	
        
		$this->end_controls_section();
		// /.END SECTION STYLE GENERAL.

		// START SECTION STYLE.
        $this->start_controls_section( 
        	'section_style',
            [
                'label' => esc_html__( 'Number & Title', 'themesflat-addons' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Heading Ending Number
        $this->add_control(
        	'ending_number_setting',
        	[
        		'label' => esc_html__( 'Number Style', 'themesflat-addons'),
				'type' => \Elementor\Controls_Manager::HEADING,
        	]
        );

        // Typo Number.
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'number_typography',
                'label' => esc_html__( 'Typography', 'themesflat-addons' ),
                'selector' => '{{WRAPPER}} .flat-counter .ending-number, {{WRAPPER}} .flat-counter .numb-count, {{WRAPPER}} .flat-counter .ending-number .odometer-formatting-mark:after',
            ]
        );

        // Color for number
        $this->add_control(
        	'number_color',
        	[
        		'label'        => esc_html__( 'Number Color', 'themesflat-addons' ),
        		'type'         => \Elementor\Controls_Manager::COLOR,
        		'description'  => esc_html__( 'Set color for number','themesflat-addons' ),
        		'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .flat-counter .ending-number' => 'color: {{value}}'
				]
        	]
        );

        // Color for prefix
        $this->add_control(
        	'prefix_color',
        	[
        		'label'        => esc_html__( 'Prefix Color', 'themesflat-addons' ),
        		'type'         => \Elementor\Controls_Manager::COLOR,
        		'description'  => esc_html__( 'Set color for prefix','themesflat-addons' ),
        		'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .numb-prefix' => 'color: {{VALUE}}',
				],
        	]
        );

        // Color for suffix
        $this->add_control(
        	'suffix_color',
        	[
        		'label'        => esc_html__( 'Suffix Color', 'themesflat-addons' ),
        		'type'         => \Elementor\Controls_Manager::COLOR,
        		'description'  => esc_html__( 'Set color for suffix','themesflat-addons' ),
        		'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .numb-suffix' => 'color: {{VALUE}}',
				],
        	]
        );

        $this->add_responsive_control( 
			'number_margin',
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
					'{{WRAPPER}} .flat-counter .numb-count' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
        	'title_setting_style',
        	[
        		'label' => esc_html__( 'Title Style', 'themesflat-addons'),
				'type' => \Elementor\Controls_Manager::HEADING,
        	]
        );

        $this->add_control(
			'title_tag',
			[
				'label' => esc_html__( 'Wrap heading', 'themesflat-addons' ),
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
                'selector' => '{{WRAPPER}} .flat-counter .name-count',
            ]
        );

        // Color for number
        $this->add_control(
        	'title_color',
        	[
        		'label'        => esc_html__( 'Title Color', 'themesflat-addons' ),
        		'type'         => \Elementor\Controls_Manager::COLOR,
        		'default'	=> '#000000',
				'selectors' => [
					'{{WRAPPER}} .flat-counter .name-count' => 'color: {{value}}'
				]
        	]
        );

        $this->add_responsive_control( 
			'title_margin',
			[
				'label' => esc_html__( 'Margin', 'themesflat-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .flat-counter .name-count' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
        $this->end_controls_section();    
	    // /.END SECTION STYLE.


		// START SECTION ICON.
		$this->start_controls_section(
			'icon_section_style',
			[
				'label'    => esc_html__( 'Icon Style', 'themesflat-addons' ),
				'tab'      => \Elementor\Controls_Manager::TAB_STYLE
			]
		);

		// Icon Color
		$this->add_control(
			'icon_color',
			[
				'label'   => esc_html__( 'Icon Color', 'themesflat-addons'),
				'type'    => \Elementor\Controls_Manager::COLOR,
				'selectors'  => [
					'{{WRAPPER}} .flat-counter .flat-icon i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .flat-counter .flat-icon svg' => 'fill: {{VALUE}}',
				],

			]
		);

        // Icon Color
        $this->add_control(
            'icon_hover_color',
            [
                'label'   => esc_html__( 'Icon Hover Color', 'themesflat-addons'),
                'type'    => \Elementor\Controls_Manager::COLOR,
                'selectors'  => [
                    '{{WRAPPER}} .flat-counter:hover .flat-icon i' => 'color: {{VALUE}}!important',
                    '{{WRAPPER}} .flat-counter:hover .flat-icon svg' => 'fill: {{VALUE}}!important',
                ],

            ]
        );

		// Icon Background Color
		$this->add_control(
			'icon_background_color',
			[
				'label'   => esc_html__( 'Icon Background Color', 'themesflat-addons'),
				'type'    => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors'  => [
					'{{WRAPPER}} .flat-counter .flat-icon' => 'background-color: {{VALUE}}',
				],

			]
		);

		// Icon Size
		$this->add_control(
			'icon_size',
			[
				'label'    => esc_html__( 'Icon Size', 'themesflat-addons'),
				'type'     => \Elementor\Controls_Manager::SLIDER,
				'default' => [
            		'size' => '70',
        		],
				'range' => [
					'px' => [
						'min' => 20,
						'max' => 500,
						'step' => 1,
					]
        		],
        		'selectors' => [
					'{{WRAPPER}} .flat-counter .flat-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .flat-counter .flat-icon img' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .flat-counter .flat-icon svg' => 'width: {{SIZE}}{{UNIT}};'
        		]
        	]
		);

		$this->add_responsive_control( 
			'icon_padding',
			[
				'label' => esc_html__( 'Padding', 'themesflat-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'top' => '',
					'right' => '',
					'bottom' => '',
					'left' => '',
					'unit' => 'px',
					'isLinked' => 'true',
				],
				'selectors' => [
					'{{WRAPPER}} .flat-counter .flat-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control( 
			'icon_margin',
			[
				'label' => esc_html__( 'Margin', 'themesflat-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .flat-counter .flat-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'icon_border',
				'label' => esc_html__( 'Border', 'themesflat-addons' ),
				'selector' => '{{WRAPPER}} .flat-counter .flat-icon',
			]
		);

		$this->add_responsive_control( 
			'icon_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'themesflat-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .flat-counter .flat-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'themesflat-addons' ),
				'selector' => '{{WRAPPER}} .flat-counter .flat-icon',
			]
		);

		// /.END SECTION ICON.
		$this->end_controls_section();
	}

	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		$icon_name = $icon_html = $class ="";


		$ending_number = esc_attr( $settings['ending_number']) ? esc_attr($settings['ending_number']):" ";
		$prefix = esc_attr( $settings['prefix']) ? esc_attr($settings['prefix']):" ";
		$suffix = esc_attr( $settings['suffix']) ? esc_attr($settings['suffix']):" ";
		$title =  $settings['title'] ? $settings['title'] :" ";
		
		if ( isset( $settings['icon_name']['value'] ) ) {
			if ( !empty( $settings['icon_name']['value']['url'] ) ) {
				$icon_name .= sprintf(
		           '<img class="logo_svg" src="%1$s" alt="%2$s"/>',
		             $settings['icon_name']['value']['url'],
		             $settings['icon_name']['value']['id']
		            
		         ); 
			} else {
				$icon_name .= sprintf(
		             '<i class="%1$s"></i>',
		            $settings['icon_name']['value']
		        );  
			}
		} else {

		    if (isset($settings['counter_images']['url'])):
                $icon_name .= sprintf(
                     '<img src="%1$s" alt=""/>',
                    $settings['counter_images']['url']
                );
		    endif;
		}

		if(isset($settings['icon_name']) || isset($settings['counter_images'])){
            if ( $settings['icon_name']['value'] != '' || $settings['counter_images']['url'] != '' && $settings['icon_type'] != 'none' ) {
                $icon_html = sprintf ('<div class="flat-icon"><span class="count-circle-sub">%1$s</span></div>', $icon_name);
            }
        }

		echo sprintf ( 
			'<div class="flat-counter %5$s %5$s"> 
				<div class="inner">
	                %6$s
	                <div class="flat-content counter">                	
	                    <div class="numb-count">
	                		<span class="numb-prefix">%2$s</span>
	                		<span class="odometer ending-number %8$s" data-count="%1$s">0</span>
	                		<span class="numb-suffix">%3$s</span>                    	
	                	</div>
	                	<%7$s class="name-count">%4$s</%7$s>
	            	</div>
				</div>
            </div>',
            $ending_number,
            $prefix,
            $suffix,
            $title,
            $class,
            $icon_html,
            $settings['title_tag'],
            $settings['separator']
        );
	}

	protected function content_template() {}

}