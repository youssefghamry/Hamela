<?php
class TFIconList_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-icon-list';
    }
    
    public function get_title() {
        return esc_html__( 'TF Icon List', 'themesflat-addons' );
    }

    public function get_icon() {
        return 'eicon-bullet-list';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

	protected function register_controls() {
        // Start Setting        
			$this->start_controls_section( 'section_setting',
	            [
	                'label' => esc_html__('Settings', 'themesflat-addons'),
	            ]
	        );      
	        $repeater = new \Elementor\Repeater();
	        
			$repeater->add_control(
				'selected_icon',
				[
					'label' => esc_html__( 'Icon', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'hamela-digital-icon-viral-marketing',
						'library' => 'hamela_digital_icon',
					],
				]
			);
			$repeater->add_control( 'number', [
					'label' => esc_html__( 'Number', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( '01' , 'themesflat-addons' ),
					'label_block' => true,
				]
			);			
	        $repeater->add_control( 'title', [
					'label' => esc_html__( 'Name', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Set Design Planning' , 'themesflat-addons' ),
					'label_block' => true,
				]
			);	
			$repeater->add_control( 'desc', [
					'label' => esc_html__( 'Description', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'default' => esc_html__( 'Amet consectetur adipiscineli  sed do eiusmod tempor incididunt ut labore et dolore magna' , 'themesflat-addons' ),
					'label_block' => true,
				]
			);
	        $this->add_control( 'lists',
				[					
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[
							'selected_icon' => [
								'value' => 'hamela-digital-icon-viral-marketing',
								'library' => 'hamela_digital_icon',
							],
							'number' => esc_html__( '01', 'themesflat-addons' ),
							'title' => esc_html__( 'Set Design Planning', 'themesflat-addons' ),
							'desc' => esc_html__( 'Amet consectetur adipiscineli  sed do eiusmod tempor incididunt ut labore et dolore magna', 'themesflat-addons' ),
						],
						[
							'selected_icon' => [
								'value' => 'hamela-digital-icon-viral-marketing',
								'library' => 'hamela_digital_icon',
							],
							'number' => esc_html__( '02', 'themesflat-addons' ),
							'title' => esc_html__( 'Set Design Planning', 'themesflat-addons' ),
							'desc' => esc_html__( 'Amet consectetur adipiscineli  sed do eiusmod tempor incididunt ut labore et dolore magna', 'themesflat-addons' ),
						],
						[
							'selected_icon' => [
								'value' => 'hamela-digital-icon-viral-marketing',
								'library' => 'hamela_digital_icon',
							],
							'number' => esc_html__( '03', 'themesflat-addons' ),
							'title' => esc_html__( 'Set Design Planning', 'themesflat-addons' ),
							'desc' => esc_html__( 'Amet consectetur adipiscineli  sed do eiusmod tempor incididunt ut labore et dolore magna', 'themesflat-addons' ),
						],
					],
					'title_field' => '{{{ elementor.helpers.renderIcon( this, selected_icon, {}, "i", "panel" ) || \'<i class="{{ icon }}" aria-hidden="true"></i>\' }}} {{{ title }}}',
				]
			);	
			$this->end_controls_section();
        // /.End Setting 

	    // Start Style
	        $this->start_controls_section( 'section_style',
	            [
	                'label' => esc_html__( 'Style', 'themesflat-addons' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );		        

	        $this->add_control( 'h_general',
				[
					'label' => esc_html__( 'General', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_control(
				'style',
				[
					'label' => esc_html__( 'Style', 'plugin-name' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'style1',
					'options' => [
						'default'  => esc_html__( 'Default', 'themesflat-addons' ),
						'style1' => esc_html__( 'Style1', 'themesflat-addons' ),
					],
				]
			); 
			$this->add_control(
				'space_between',
				[
					'label' => esc_html__( 'Space Between', 'themesflat-addons' ),
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
						'size' => 30,
					],
					'selectors' => [
						'{{WRAPPER}} .list-items .list-item:not(:first-child)' => 'margin-top: calc({{SIZE}}{{UNIT}}/2);',
						'{{WRAPPER}} .list-items .list-item:not(:last-child)' => 'padding-bottom: calc({{SIZE}}{{UNIT}}/2);',
					],
				]
			);  
			$this->add_control(
				'text_indent',
				[
					'label' => esc_html__( 'Text Indent', 'themesflat-addons' ),
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
						'size' => 25,
					],
					'selectors' => [
						'{{WRAPPER}} .list-items .list-item .list-content' => 'padding-left: {{SIZE}}{{UNIT}};',
					],
				]
			); 
			$this->add_control(
				'vertical _align',
				[
					'label' => esc_html__( 'Vertical Align', 'plugin-name' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'center',
					'options' => [
						'flex-start'  => esc_html__( 'Top', 'themesflat-addons' ),
						'center' => esc_html__( 'Center', 'themesflat-addons' ),
						'flex-end' => esc_html__( 'Bottom', 'themesflat-addons' ),
					],
					'selectors' => [
						'{{WRAPPER}} .list-items .list-item' => 'align-items: {{VALUE}};',
					],
				]
			); 

	        $this->add_control( 'h_icon',
				[
					'label' => esc_html__( 'Icon', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			); 
			$this->add_control(
				'icon_size',
				[
					'label' => esc_html__( 'Icon Size', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 150,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 81,
					],
					'selectors' => [
						'{{WRAPPER}} .list-items .list-item .list-icon' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}};min-height: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'icon_font_size',
				[
					'label' => esc_html__( 'Icon Font Size', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 45,
					],
					'selectors' => [
						'{{WRAPPER}} .list-items .list-item .list-icon' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			); 
			$this->add_control( 'icon_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ffffff',
					'selectors' => [
						'{{WRAPPER}} .list-items .list-item .list-icon' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_control( 'icon_bgcolor',
				[
					'label' => esc_html__( 'Background', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ffa800',
					'selectors' => [
						'{{WRAPPER}} .list-items .list-item .list-icon' => 'background-color: {{VALUE}}',
						'{{WRAPPER}} .list-items .list-item .list-icon .number' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_responsive_control( 'icon_border_radius',
	            [
	                'label' => esc_html__( 'Border Radius', 'themesflat-addons' ),
	                'type' => \Elementor\Controls_Manager::DIMENSIONS,
	                'size_units' => ['px', 'em', '%'],
	                'default'=> [
						'top' => '50',
						'right' => '50',
						'bottom' => '50',
						'left' => '50',
						'unit' => '%',
						'isLinked' => true,
					],
	                'selectors' => [
	                    '{{WRAPPER}} .list-items .list-item .list-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],	                
	            ]
	        );			        

	        $this->add_control( 'h_title',
				[
					'label' => esc_html__( 'Title', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);				

	        $this->add_group_control( \Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'label' => esc_html__( 'Typography', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .list-items .list-item .title',
				]
			);			
	        $this->add_control( 'title_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#000000',
					'selectors' => [
						'{{WRAPPER}} .list-items .list-item .title' => 'color: {{VALUE}}',
					],
				]
			);
	        $this->add_responsive_control( 'title_margin',
	            [
	                'label' => esc_html__( 'Margin', 'themesflat-addons' ),
	                'type' => \Elementor\Controls_Manager::DIMENSIONS,
	                'size_units' => ['px', 'em', '%'],
	                'selectors' => [
	                    '{{WRAPPER}} .list-items .list-item .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],	                
	            ]
	        );

	        $this->add_control( 'h_desc',
				[
					'label' => esc_html__( 'Description', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
	        $this->add_group_control( \Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'desc_typography',
					'label' => esc_html__( 'Typography', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .list-items .list-item .desc',
				]
			);
			$this->add_control( 'desc_color',
				[
					'label' => esc_html__( 'Color Text', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#b0b0b0',
					'selectors' => [
						'{{WRAPPER}} .list-items .list-item .desc' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_responsive_control( 'desc_margin',
	            [
	                'label' => esc_html__( 'Margin', 'themesflat-addons' ),
	                'type' => \Elementor\Controls_Manager::DIMENSIONS,
	                'size_units' => ['px', 'em', '%'],
	                'selectors' => [
	                    '{{WRAPPER}} .list-items .list-item .desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );
	        
	        $this->end_controls_section();    
	    // /.End Style   
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'tf_icon_list_wrapper', ['id' => "tf-icon-list-{$this->get_id()}", 'class' => ['tf-icon-list'], 'data-tabid' => $this->get_id()] );		
		?>
		<div <?php echo $this->get_render_attribute_string('tf_icon_list_wrapper'); ?>>			
			<ul class="list-items <?php echo esc_attr($settings['style']); ?>">
				<?php foreach ($settings['lists'] as $list):?>
				<li class="list-item">								
					<span class="list-icon">
						<?php \Elementor\Icons_Manager::render_icon( $list['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
						<?php if($list['number'] != ''): ?>
							<span class="number"><?php echo esc_attr($list['number']); ?></span>
						<?php endif; ?>
					</span>	
					<span class="list-content">
						<span class="title"><?php echo esc_html($list['title']); ?></span>
						<span class="desc"><?php echo sprintf('%s',$list['desc']); ?></span>
					</span>	
				</li>
				<?php endforeach;?>
			</ul>			
		</div>		
		<?php
		
	}

	protected function content_template() {}

}