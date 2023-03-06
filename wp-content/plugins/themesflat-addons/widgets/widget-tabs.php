<?php
class TFTabs_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tftabs';
    }
    
    public function get_title() {
        return esc_html__( 'TF Tabs Testimonial', 'themesflat-addons' );
    }

    public function get_icon() {
        return 'eicon-tabs';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['tf-style'];
	}

	protected function register_controls() {
        // Start Tab Setting        
			$this->start_controls_section( 'section_tabs',
	            [
	                'label' => esc_html__('Tabs', 'themesflat-addons'),
	            ]
	        );      
	        $repeater = new \Elementor\Repeater();
	        $repeater->add_control( 'set_active',
				[
					'label' => esc_html__( 'Set Active Tab', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Yes', 'themesflat-addons' ),
					'label_off' => esc_html__( 'No', 'themesflat-addons' ),
					'return_value' => 'set-active-tab',
					'default' => 'inactive',
				]
			);
			$repeater->add_control(
				'image',
				[
					'label' => esc_html__( 'Choose Avatar', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => URL_THEMESFLAT_ADDONS."assets/img/avatar.jpg",
					],
				]
			);
	        $repeater->add_control( 'list_name', [
					'label' => esc_html__( 'Name', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'KAMRUL ISLAM' , 'themesflat-addons' ),
					'label_block' => true,
				]
			);
			$repeater->add_control( 'list_position', [
					'label' => esc_html__( 'Position', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Exclusive at UX/UI' , 'themesflat-addons' ),
					'label_block' => true,
				]
			);	
			$repeater->add_control( 'list_desc', [
					'label' => esc_html__( 'Description', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'default' => esc_html__( 'Pellentesque vel dolor consectetur, ate eros vitae, molestie felis. Vivamus orna reague lorem.' , 'themesflat-addons' ),
					'label_block' => true,
				]
			);
	        $this->add_control( 'tab_list',
				[					
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[
							'list_name' => esc_html__( 'KAMRUL ISLAM', 'themesflat-addons' ),
							'list_position' => esc_html__( 'Exclusive at UX/UI', 'themesflat-addons' ),
							'list_desc' => esc_html__( 'Pellentesque vel dolor consectetur, ate eros vitae, molestie felis. Vivamus orna reague lorem.', 'themesflat-addons' ),
						],
						[
							'list_name' => esc_html__( 'MICHAEL KING', 'themesflat-addons' ),
							'list_position' => esc_html__( 'Exclusive at UX/UI', 'themesflat-addons' ),
							'list_desc' => esc_html__( 'Pellentesque vel dolor consectetur, ate eros vitae, molestie felis. Vivamus orna reague lorem.', 'themesflat-addons' ),
						],
						[
							'list_name' => esc_html__( 'ROMEO ALVAREZ', 'themesflat-addons' ),
							'list_position' => esc_html__( 'Exclusive at UX/UI', 'themesflat-addons' ),
							'list_desc' => esc_html__( 'Pellentesque vel dolor consectetur, ate eros vitae, molestie felis. Vivamus orna reague lorem.', 'themesflat-addons' ),
						],
					],
					'title_field' => '{{{ list_name }}}',
				]
			);	
			$this->end_controls_section();
        // /.End Tab Setting 

	    // Start Style Testimonial
	        $this->start_controls_section( 'section_style_title',
	            [
	                'label' => esc_html__( 'Tab Nav', 'themesflat-addons' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
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
					'name' => 'name_typography',
					'label' => esc_html__( 'Typography', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-tabs .testimonial .name',
				]
			);			
	        $this->add_control( 'name_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-tabs .testimonial .description' => 'color: {{VALUE}}',
					],
				]
			);
	        $this->add_responsive_control( 'name_margin',
	            [
	                'label' => esc_html__( 'Margin', 'themesflat-addons' ),
	                'type' => \Elementor\Controls_Manager::DIMENSIONS,
	                'size_units' => ['px', 'em', '%'],
	                'selectors' => [
	                    '{{WRAPPER}} .tf-tabs .testimonial .name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],	                
	            ]
	        );

	        $this->add_control( 'h_position',
				[
					'label' => esc_html__( 'Position', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_group_control( \Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'position_typography',
					'label' => esc_html__( 'Typography', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-tabs .testimonial .position',
				]
			);			
	        $this->add_control( 'position_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-tabs .testimonial .position' => 'color: {{VALUE}}',
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
					'selector' => '{{WRAPPER}} .tf-tabs .testimonial .description',
				]
			);
			$this->add_control( 'desc_color',
				[
					'label' => esc_html__( 'Color Text', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-tabs .testimonial .description' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_responsive_control( 'desc_margin',
	            [
	                'label' => esc_html__( 'Margin', 'themesflat-addons' ),
	                'type' => \Elementor\Controls_Manager::DIMENSIONS,
	                'size_units' => ['px', 'em', '%'],
	                'selectors' => [
	                    '{{WRAPPER}} .tf-tabs .testimonial .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );
	        
	        $this->end_controls_section();    
	    // /.End Style Testimonial 

	    // Start Tab Style Nav 
	        $this->start_controls_section( 'section_style_nav',
	            [
	                'label' => esc_html__( 'Nav & Content Tab', 'themesflat-addons' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

	        $this->add_control( 'h_nav_tab',
				[
					'label' => esc_html__( 'Nav', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
				]
			);

	        $this->add_control( 'nav_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ffffff',
					'selectors' => [
						'{{WRAPPER}} .tf-tabs .tf-tabnav ul li' => 'background-color: {{VALUE}}',
					],
				]
			);

			$this->add_control( 'nav_color_hover',
				[
					'label' => esc_html__( 'Color Active', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ffa800',
					'selectors' => [
						'{{WRAPPER}} .tf-tabs .tf-tabnav ul li.active' => 'background-color: {{VALUE}}',
						'{{WRAPPER}} .tf-tabs .tf-tabnav ul li.set-active-tab' => 'background-color: {{VALUE}}',
					],
				]
			); 	

			$this->add_control( 'h_content_tab',
				[
					'label' => esc_html__( 'Content Tab', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_control( 'content_tab_background',
				[
					'label' => esc_html__( 'Background', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#a5acb2',
					'selectors' => [
						'{{WRAPPER}} .tf-tabs .tf-tabcontent-inner .testimonial' => 'background-color: {{VALUE}}',
					],
				]
			);

			$this->add_control( 'content_tab_background_hover',
				[
					'label' => esc_html__( 'Background Active', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ffffff',
					'selectors' => [
						'{{WRAPPER}} .tf-tabs .tf-tabcontent-inner.active .testimonial' => 'background-color: {{VALUE}}',
					],
				]
			); 	
	        
	        $this->end_controls_section();    
	    // /.End Tab Style Nav  
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'tf_tabs_wrapper', ['id' => "tf-tabs-{$this->get_id()}", 'class' => ['tf-tabs'], 'data-tabid' => $this->get_id()] );

		$count_li = 0;
		$count_content = 0;		
		?>
		<div <?php echo $this->get_render_attribute_string('tf_tabs_wrapper'); ?>>
			<div class="tf-tabnav">
				<ul>
					<?php foreach ($settings['tab_list'] as $tab): $count_li ++;?>
					<li class="tablinks <?php echo esc_attr($tab['set_active']); ?>" data-tab="tab-<?php echo esc_attr($count_li); ?>">										
						
					</li>
					<?php endforeach;?>
				</ul>
			</div>
			<div class="tf-tabcontent">
				<?php foreach ($settings['tab_list'] as $tab): $count_content ++; ?>
				<div id="tab-<?php echo esc_attr($count_content); ?>" class="tf-tabcontent-inner <?php echo esc_attr($tab['set_active']); ?>">
					<div class="testimonial">
						<div class="wrap-author">
							<?php if(isset($tab['image']['url'])): ?>
							<div class="avatar">
								<img width="82" height="82" src="<?php echo esc_attr($tab['image']['url']); ?>" alt="image">
							</div>
							<?php endif; ?>

					      	<div class="content">
					      		<?php if ( $tab['list_name'] != '' ) : ?>
						        <div class="name">						        	
									<?php echo esc_attr($tab['list_name']); ?>									
						        </div>
						        <?php endif; ?>

						        <?php if ( $tab['list_position'] != '' ) : ?>
						        <div class="position">						        	
									<?php echo esc_attr($tab['list_position']); ?>									
						        </div>
						        <?php endif; ?>
					      	</div>
					   </div>

					   <?php if ( $tab['list_desc'] != '' ) : ?>
						<div class="description">							
							<?php echo esc_attr($tab['list_desc']); ?>							
					    </div>
					    <?php endif; ?>		    
					</div>
				</div>
				<?php endforeach;?>
			</div>
		</div>
		
		<?php
		
	}

	protected function content_template() {}

}