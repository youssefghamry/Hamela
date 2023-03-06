<?php

class TF_SimpleMenu_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'tf-simple-menu';
    }

    public function get_title()
    {
        return esc_html__('TF Simple Menu', 'themesflat-addons');
    }

    public function get_icon()
    {
        return 'eicon-nav-menu';
    }

    public function get_categories()
    {
        return array('themesflat_addons');
    }

    public function get_menus()
    {
        $list = [];
        $menus = wp_get_nav_menus();
        foreach ($menus as $menu) {
            $list[$menu->slug] = $menu->name;
        }

        return $list;
    }

    protected function register_controls()
    {
        // Start Menu Settings        
        $this->start_controls_section(
            'section_menu_setting',
            [
                'label' => esc_html__('Menu Settings', 'themesflat-addons'),
            ]
        );

        $this->add_control('title', [
            'type' => \Elementor\Controls_Manager::TEXT,
            'label' => __('Widget Title', 'themesflat'),
            'label_block' => true,
            'separator' => 'before',
            'default' => __('Widget Title', 'themesflat'),
            'dynamic' => [
                'active' => true,
            ],
        ]);


        $this->add_control(
            'nav_menu',
            [
                'label' => esc_html__('Select menu', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => $this->get_menus(),
            ]
        );


        $this->end_controls_section();
        // /.End Menu Settings

        // Start Main Menu Style 
        $this->start_controls_section(
            'section_style_menu',
            [
                'label' => esc_html__('Main Menu', 'themesflat-addons'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'item_menu_typography',
                'label' => esc_html__('Typography', 'themesflat-addons'),
                'selector' => '{{WRAPPER}} ul.simple-menu li a',
                'separator' => 'before',
            ]
        );

        $this->start_controls_tabs('item_menu_tabs');

        $this->start_controls_tab(
            'item_menu_normal_tab',
            [
                'label' => esc_html__('Normal', 'themesflat-addons'),
            ]
        );

        $this->add_control(
            'item_menu_color',
            [
                'label' => esc_html__('Color', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#11161e',
                'selectors' => [
                    '{{WRAPPER}} ul.simple-menu li a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'item_menu_hover_tab',
            [
                'label' => esc_html__('Hover', 'themesflat-addons'),
            ]
        );

        $this->add_control(
            'item_menu_color_hover',
            [
                'label' => esc_html__('Color', 'themesflat-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffa800',
                'selectors' => [
                    '{{WRAPPER}} ul.simple-menu li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );






        $this->end_controls_tabs();


        $this->end_controls_section();
        // /.End Main Menu Style


    }

    protected function render($instance = [])
    {
        $settings = $this->get_settings_for_display();

        $args = array(
            'menu' => $settings['nav_menu'],
            'theme_location' => 'primary',
            'menu_class' => 'simple-menu',
            'fallback_cb' => 'themesflat_menu_fallback',
            'container' => false
        );

        if (!empty($settings['title'])): ?>
            <h5 class="widget-title"><?php echo esc_html($settings['title']); ?></h5>
        <?php endif;

       wp_nav_menu($args);
    }

    protected function content_template()
    {
    }

}
