<?php
class TFAnimated_Headline_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tfanimated_headline';
    }
    
    public function get_title() {
        return esc_html__( 'TF Animated Headline', 'themesflat-addons' );
    }

    public function get_icon() {
        return 'eicon-animated-headline';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

	protected function register_controls() {
        // Start Headline Setting
		$this->start_controls_section( 
			'section_headline',
            [
                'label' => esc_html__('Headline', 'themesflat-addons'),
            ]
        );		

        $this->add_control(
            'headline_shape_highlight',
            [
                'label' => esc_html__( 'Shape', 'themesflat-addons' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'clip',
                'options' => [
                    'type' => esc_html__( 'Type', 'themesflat-addons' ),
                    'clip' => esc_html__( 'Clip', 'themesflat-addons' ),
                    'scale' => esc_html__( 'Scale', 'themesflat-addons' ),
                    'rotate-1' => esc_html__( 'Rotate 1', 'themesflat-addons' ),
                    'rotate-2' => esc_html__( 'Rotate 2', 'themesflat-addons' ),
                    'rotate-3' => esc_html__( 'Rotate 3', 'themesflat-addons' ),
                    'zoom' => esc_html__( 'Zoom', 'themesflat-addons' ),
                    'slide' => esc_html__( 'Slide', 'themesflat-addons' ),
                ],
            ]
        );

        $this->add_control(
            'section_separator_content',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->add_control(
            'headline_before_text',
            [
                'label' => esc_html__( 'Before Text', 'themesflat-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => 'Your Headline',
                'default' => 'Before Text',
                'label_block' => true,
                'separator' => 'none',
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control( 
            'headline_text_animation',
            [
                'label' => esc_html__( 'Highlighted Text', 'themesflat-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Highlighted Text',
                'placeholder' => 'Your Headline',
                'label_block' => true,
            ]
        );
        $this->add_control( 'repeater_list',
            [                   
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'headline_text_animation' => esc_html__( 'Highlighted Text 1', 'tf-addon-for-elementer' ),                        
                    ],
                    [
                        'headline_text_animation' => esc_html__( 'Highlighted Text 2', 'tf-addon-for-elementer' ),                        
                    ],
                    [
                        'headline_text_animation' => esc_html__( 'Highlighted Text 3', 'tf-addon-for-elementer' ),                        
                    ],
                ],
                'title_field' => '{{{ headline_text_animation }}}',
            ]
        );

        $this->add_control(
            'headline_after_text',
            [
                'label' => esc_html__( 'After Text', 'themesflat-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => 'Your Headline',
                'default' => 'After Text',
                'label_block' => true,
                'separator' => 'none',
            ]
        );

        $this->end_controls_section();
        // .End Headline

        // Start Setting
        $this->start_controls_section(
            'section_setting',
            [
                'label' => esc_html__('Setting', 'themesflat-addons'),
            ]
        );


        $this->add_control(
            'alignment_text',
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
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $possible_tags = [
            'div',
            'section',
            'span',
            'h1',
            'h2',
            'h3',
            'h4',
            'h5',
            'h6',
        ];

        $options = [
                '' => esc_html__( 'Default', 'themesflat-addons' ),
            ] + array_combine( $possible_tags, $possible_tags );

        $this->add_control(
            'headline_html_tag',
            [
                'label' => esc_html__( 'HTML Tag', 'themesflat-addons' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'div',
                'options' => $options,
            ]
        );

        $this->add_control(
            'headline_break',
            [
                'label' => esc_html__( 'Break', 'themesflat-addons' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no',
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'headline_break_tablet',
            [
                'label' => esc_html__( 'Tablet Break', 'themesflat-addons' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no',
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'headline_break_mobile',
            [
                'label' => esc_html__( 'Mobile Break', 'themesflat-addons' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no',
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'section_separator_setting',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->end_controls_section();
        // .End Setting

        // Section Style.
        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__( 'Style', 'themesflat-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'headline_color_default',
            [
                'label' => esc_html__( 'Default Color', 'themesflat-addons' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .tf-headline' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'headline_color_highlight',
            [
                'label' => esc_html__( 'Highlight Color', 'themesflat-addons' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffa800',
                'selectors' => [
                    '{{WRAPPER}} .tf-highlighted-text' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'typography_default',
                'label' => esc_html__( 'Typography Default', 'themesflat-addons' ),
                'selector' => '{{WRAPPER}} .tf-headline',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'typography_highlight',
                'label' => esc_html__( 'Typography Highlight', 'themesflat-addons' ),
                'selector' => '{{WRAPPER}} .tf-highlighted-text',
            ]
        );

        $this->add_control(
            'spacing_highlight',
            [
                'label' => esc_html__( 'Spacing Highlight', 'themesflat-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'default' => [
                    'size' => 0,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tf-highlighted-text' => 'margin-left: {{SIZE}}{{UNIT}}; margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        // .End Style
        
	}

	protected function render($instance = []) {
		$settings = apply_filters('tf_settings_for_display', $this->get_settings_for_display());

        $html_animation = $html_words = $break = $highlight = '';
        foreach ($settings['repeater_list'] as $key => $repeater_list) {
            if ( $repeater_list['headline_text_animation'] != '' ){
                if($key == 0){
                    $html_words .= '<span class="item-text is-visible">'.$repeater_list['headline_text_animation'].'</span>';
                }else{
                    $html_words .= '<span class="item-text ">'.$repeater_list['headline_text_animation'].'</span>';
                }                
            }            
        }
        
        $highlight = 'tf-highlighted ';
        
        switch ( $settings['headline_shape_highlight'] ) {
            case 'type':
                $highlight .= 'animationtext letters type'; 
                $html_animation = '<span class="cd-words-wrapper">'.$html_words.'</span>';                   
                break;
            case 'rotate-2':
                $highlight .= 'animationtext letters rotate-2';
                $html_animation = '<span class="cd-words-wrapper">'.$html_words.'</span>'; 
                break;
            case 'rotate-3':
                $highlight .= 'animationtext letters rotate-3';
                $html_animation = '<span class="cd-words-wrapper">'.$html_words.'</span>'; 
                break;
            case 'scale':
                $highlight .= 'animationtext  scale';
                $html_animation = '<span class="cd-words-wrapper">'.$html_words.'</span>'; 
                break;

            case 'clip':
                $highlight .= 'animationtext clip';
                $html_animation = '<span class="cd-words-wrapper">'.$html_words.'</span>';
                break;                
            case 'rotate-1':
                $highlight .= 'animationtext rotate-1';
                $html_animation = '<span class="cd-words-wrapper">'.$html_words.'</span>';
                break;
            case 'slide':
                $highlight .= 'animationtext slide';
                $html_animation = '<span class="cd-words-wrapper">'.$html_words.'</span>';
                break;
            case 'zoom':
                $highlight .= 'animationtext zoom';
                $html_animation = '<span class="cd-words-wrapper">'.$html_words.'</span>'; 
                break;
            default:
                break;
        }
                
       

        if($settings['headline_break'] == 'yes'){
            $break .= ' tf-headline-break ';
        }

        if($settings['headline_break_tablet'] == 'yes'){
            $break .= ' tf-headline-break-tablet ';
        }

        if($settings['headline_break_mobile'] == 'yes'){
            $break .= ' tf-headline-break-mobi ';
        }

        echo sprintf (
            '<div class="tf-headline-wrap tf-headline-%1$s %6$s">
                <%2$s class="tf-headline">
                    <span class="tf-text tf-before-text">
                        %3$s
                    </span>
                    <span class="tf-text tf-highlighted-text %7$s">
                        %4$s 
                    </span>
                    <span class="tf-text tf-after-text">
                        %5$s
                    </span>
                </%2$s>
            </div>',
            $settings['alignment_text'],
            $settings['headline_html_tag'],
            $settings['headline_before_text'],
            $html_animation,
            $settings['headline_after_text'],           
            $break,
            $highlight
        );

    }

	protected function content_template() {}
}