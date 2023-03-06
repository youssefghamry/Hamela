<?php


class TFL_Divider_Widget extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'tfl-divider';
    }

    public function get_title()
    {
        return __('TFL Divider', 'themesflat');
    }

    public function get_icon()
    {
        return 'eicon-divider';
    }

    public function get_categories()
    {
        return array('themesflat_addons');
    }

    public function get_custom_help_url()
    {
        return 'https://themesflatelementor.com/docs/themesflat-addons/core-addons/divider-addon/';
    }

    public function get_script_depends()
    {
        return ['tfl-waypoints', 'tfl-frontend-scripts'];
    }

    public function get_style_depends()
    {
        return ['tfl-animate-styles', 'tfl-frontend-styles', 'tfl-divider-styles'];
    }

    protected function register_controls()
    {
        $this->start_controls_section('section_divider', [
            'label' => __('Divider', 'themesflat'),
        ]);
        $this->add_control('style', [
            'type' => \Elementor\Controls_Manager::SELECT,
            'label' => __('Choose Style', 'themesflat'),
            'default' => 'style1',
            'options' => [
                'style1' => __('Style 1', 'themesflat'),
            ],
        ]);

        $this->add_control('divider_bg', [
            'label' => __('Divider Background', 'themesflat'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tfl-divider.tfl-style1 .divider-separator:before' => 'background: {{VALUE}};',
            ],
        ]);

        $this->add_control('divider_border_color', [
            'label' => __('Divider Border Color', 'themesflat'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tfl-divider.tfl-style1 .divider-separator' => 'border-color: {{VALUE}};',
            ],
        ]);

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $settings = apply_filters('tfl_divider_' . $this->get_id() . '_settings', $settings);
        ?>
        <div class="tfl-divider tfl-<?php echo $settings['style']; ?> <?php //echo $animate_class; ?>" <?php //echo $animation_attr; ?>>
            <div class="divider-separator"></div>
        </div>
<?php
    }

    protected function content_template()
    {
    }

}