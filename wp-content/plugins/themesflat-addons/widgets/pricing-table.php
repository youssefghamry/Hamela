<?php

// Exit if accessed directly
class TFL_Pricing_Table_Widget extends \Elementor\Widget_Base
{
    public function __construct($data = array(), $args = null)
    {
        parent::__construct($data, $args);
        add_shortcode('tfl_pricing_item', array($this, 'pricing_item_shortcode'));
    }

    public function pricing_item_shortcode($atts, $content, $tag)
    {
        $title = $value = '';
        $args = shortcode_atts(array(
            'title' => '',
            'value' => '',
        ), $atts);
        $output = tfl_get_template_part('pricing-table/pricing-item', $args, true);
        return $output;
    }

    public function get_name()
    {
        return 'tfl-pricing-table';
    }

    public function get_title()
    {
        return __('TFL Pricing Table', 'themesflat');
    }

    public function get_icon()
    {
        return 'eicon-price-table';
    }

    public function get_categories()
    {
        return [ 'themesflat_addons' ];
    }

    public function get_custom_help_url()
    {
        return 'https://themesflatelementor.com/docs/themesflat-addons/core-addons/pricing-table/';
    }

    public function get_script_depends()
    {
        return ['tfl-waypoints', 'tfl-frontend-scripts'];
    }

    public function get_style_depends()
    {
        return ['tfl-animate-styles', 'tfl-frontend-styles', 'tfl-pricing-plans-styles'];
    }

    protected function register_controls()
    {
        $this->start_controls_section('section_pricing_table', [
            'label' => __('Pricing Table', 'themesflat'),
        ]);
        $this->add_control('pricing_heading', [
            'label' => __('Pricing Plans', 'themesflat'),
            'type' => \Elementor\Controls_Manager::HEADING,
        ]);

        $repeater = new \Elementor\Repeater();

        $repeater->add_control('pricing_title', [
            'type' => \Elementor\Controls_Manager::TEXT,
            'label' => __('Pricing Plan Title', 'themesflat'),
            'default' => 'BASIC PLAN',
            'label_block' => true,
            'dynamic' => [
                'active' => true,
            ],
        ]);
        $repeater->add_control('tagline', [
            'type' => \Elementor\Controls_Manager::TEXT,
            'label' => __('Tagline Text', 'themesflat'),
            'description' => __('Provide any subtitle or taglines like "Most Popular", "Best Value", "Best Selling", "Most Flexible" etc. that you would like to use for this pricing plan.', 'themesflat'),
            'default' => '20% Off',
            'dynamic' => [
                'active' => true,
            ],
        ]);
        $repeater->add_control('pricing_image', [
            'label' => __('Pricing Image', 'themesflat'),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
            'label_block' => true,
            'dynamic' => [
                'active' => true,
            ],
        ]);
        $repeater->add_control('price_tag', [
            'type' => \Elementor\Controls_Manager::TEXT,
            'label' => __('Price Tag', 'themesflat'),
            'description' => __('Enter the price tag for the pricing plan. HTML is accepted.', 'themesflat'),
            'default' => '$50/m',
            'dynamic' => [
                'active' => true,
            ],
        ]);
        $repeater->add_control('button_text', [
            'type' => \Elementor\Controls_Manager::TEXT,
            'label' => __('Text for Pricing Link/Button', 'themesflat'),
            'default' => 'SIGN UP NOW !',
            'dynamic' => [
                'active' => true,
            ],
        ]);
        $repeater->add_control('button_url', [
            'label' => __('URL for the Pricing link/button', 'themesflat'),
            'type' => \Elementor\Controls_Manager::URL,
            'label_block' => true,
            'default' => [
                'url' => '#',
                'is_external' => 'true',
            ],
            'placeholder' => __('http://your-link.com', 'themesflat'),
            'dynamic' => [
                'active' => true,
            ],
        ]);
        $repeater->add_control('highlight', [
            'label' => __('Highlight Pricing Plan', 'themesflat'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_off' => __('No', 'themesflat'),
            'label_on' => __('Yes', 'themesflat'),
            'return_value' => 'yes',
            'default' => 'no',
        ]);
        $repeater->add_control('pricing_content', [
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'label' => __('Pricing Plan Details', 'themesflat'),
            'description' => __('Enter the content for the pricing plan that include information about individual features of the pricing plan. For prebuilt styling, enter shortcodes content like - [tfl_pricing_item title="Storage Space" value="50 GB"] [tfl_pricing_item title="Video Uploads" value="50"][tfl_pricing_item title="Portfolio Items" value="20"]', 'themesflat'),
            'show_label' => true,
            'rows' => 10,
            'default' => '
<ul>
    <li>Full Access</li>
    <li>Unlimited Bandwidth</li>
    <li>50 gb Space</li>
    <li>1 Month Support</li>
</ul>',
            'dynamic' => [
                'active' => true,
            ],
        ]);

        $repeater->add_control('pricing_class', [
            'type' => \Elementor\Controls_Manager::TEXT,
            'label' => __('Pricing Class', 'themesflat'),
            'dynamic' => [
                'active' => true,
            ],
        ]);

        $this->add_control('pricing_plans', [
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'title_field' => '{{{ pricing_title }}}',
            'default' => [
                [ ],
                [ ],
                [ ],
            ],
        ]);
        $this->add_control('upgrade_notice', [
            'type' => \Elementor\Controls_Manager::RAW_HTML,
            'separator' => 'before',
            'raw' => '<div style="text-align:center;line-height:1.6;"><p>' . __('Unlock new possibilities with premium widgets and styles of <strong>Themesflat Addons for Elementor <i>Premium</i></strong>. ', 'themesflat') . '</p><p style="padding-top:15px;"><a class="elementor-button elementor-button-default elementor-button-go-pro" href="https://themesflatelementor.com/pricing/#pricing-plans" target="_blank"><i class="fa fa-hand-o-right" aria-hidden="true"></i>' . __('Go Pro', 'themesflat') . '</a></p></div>',
        ]);
        $this->end_controls_section();


        $this->start_controls_section('section_grid_settings', [
            'label' => __('Grid Settings', 'themesflat'),
            'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
        ]);
        $this->add_control('column_layout', [
            'label' => __('Column Layout', 'themesflat'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                '2' => __('2 Columns', 'themesflat'),
                '3' => __('3 Columns', 'themesflat'),
                '4' => __('4 Columns', 'themesflat'),
            ),
            'default' => '3',
        ]);

        $this->end_controls_section();
        $this->start_controls_section('section_pricing_style', [
            'label' => __('Plan Name', 'themesflat'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);
        $this->add_control('plan_name_tag', [
            'label' => __('HTML Tag', 'themesflat'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'h1' => __('H1', 'themesflat'),
                'h2' => __('H2', 'themesflat'),
                'h3' => __('H3', 'themesflat'),
                'h4' => __('H4', 'themesflat'),
                'h5' => __('H5', 'themesflat'),
                'h6' => __('H6', 'themesflat'),
                'div' => __('div', 'themesflat'),
            ],
            'default' => 'h3',
        ]);
        $this->add_control('plan_name_color', [
            'label' => __('Color', 'themesflat'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tfl-pricing-table .tfl-top-header .tfl-plan-name' => 'color: {{VALUE}};',
            ],
        ]);
        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'plan_name_typography',
            'selector' => '{{WRAPPER}} .tfl-pricing-table .tfl-top-header .tfl-plan-name',
        ]);
        $this->end_controls_section();
        $this->start_controls_section('section_plan_tagline', [
            'label' => __('Plan Tagline', 'themesflat'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);


        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'plan_tagline_typography',
            'selector' => '{{WRAPPER}} .tfl-pricing-table .tfl-pricing-plan-outter .tfl-grid-item .tfl-top-header .tfl-tagline',
        ]);












        $type = 'pricing';
        $this->start_controls_tabs($type.'_tabs');
        //nomal tab
        $this->start_controls_tab(
            $type.'_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'themesflat-elementor' ),
            ]
        );

        $this->add_control('plan_tagline_color', [
            'label' => __('Color', 'themesflat'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tfl-pricing-table .tfl-pricing-plan-outter .tfl-grid-item .tfl-top-header .tfl-tagline' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_control('plan_tagline_bg_color', [
            'label' => __('BG Color', 'themesflat'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tfl-pricing-table .tfl-pricing-plan-outter .tfl-grid-item .tfl-top-header .tfl-tagline' => 'background: {{VALUE}};',
            ],
        ]);
        $this->end_controls_tab();
        //end - nomal tab

        //hover tab
        $this->start_controls_tab(
            $type.'_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'themesflat-elementor' ),
            ]
        );



        $this->add_control('plan_tagline_hover_color', [
            'label' => __('Color', 'themesflat'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tfl-pricing-table .tfl-pricing-plan-outter .tfl-grid-item .tfl-top-header .tfl-tagline:hover' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_control('plan_tagline_bg_hover_color', [
            'label' => __('BG Color', 'themesflat'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tfl-pricing-table .tfl-pricing-plan-outter .tfl-grid-item .tfl-top-header .tfl-tagline:hover' => 'background: {{VALUE}};',
            ],
        ]);


        $this->end_controls_tab();
        //end - hover tab
        $this->end_controls_tabs();

        $this->end_controls_section();


        $this->start_controls_section('section_plan_price', [
            'label' => __('Plan Price', 'themesflat'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);
        $this->add_control('plan_price_tag', [
            'label' => __('HTML Tag', 'themesflat'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'h1' => __('H1', 'themesflat'),
                'h2' => __('H2', 'themesflat'),
                'h3' => __('H3', 'themesflat'),
                'h4' => __('H4', 'themesflat'),
                'h5' => __('H5', 'themesflat'),
                'h6' => __('H6', 'themesflat'),
                'div' => __('div', 'themesflat'),
            ],
            'default' => 'h4',
        ]);
        $this->add_control('plan_price_color', [
            'label' => __('Color', 'themesflat'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tfl-pricing-table .tfl-pricing-plan .tfl-plan-price span' => 'color: {{VALUE}};',
            ],
        ]);
        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'plan_price_typography',
            'selector' => '{{WRAPPER}} .tfl-pricing-table .tfl-pricing-plan .tfl-plan-price span',
        ]);
        $this->end_controls_section();
        $this->start_controls_section('section_item_title', [
            'label' => __('Pricing Item Title', 'themesflat'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);
        $this->add_control('item_title_color', [
            'label' => __('Color', 'themesflat'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tfl-pricing-plan-outter .tfl-grid-item .tfl-plan-price .tfl-text' => 'color: {{VALUE}};',
            ],
        ]);
        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'item_title_typography',
            'selector' => '{{WRAPPER}} .tfl-pricing-plan-outter .tfl-grid-item .tfl-plan-price .tfl-text',
        ]);
        $this->end_controls_section();
        $this->start_controls_section('section_item_value', [
            'label' => __('Pricing Item Value', 'themesflat'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);
        $this->add_control('item_value_color', [
            'label' => __('Color', 'themesflat'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tfl-pricing-table .tfl-pricing-plan-outter .tfl-grid-item .tfl-plan-details .list-table li' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'item_value_typography',
            'selector' => '{{WRAPPER}} .tfl-pricing-table .tfl-pricing-plan-outter .tfl-grid-item .tfl-plan-details .list-table li',
        ]);
        $this->end_controls_section();
        $this->start_controls_section('section_purchase_button', [
            'label' => __('Purchase Button', 'themesflat'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);
        $this->add_control('purchase_button_spacing', [
            'label' => __('Button Spacing', 'themesflat'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'default' => [
                'top' => 15,
                'right' => 15,
                'bottom' => 15,
                'left' => 15,
                'unit' => 'px',
            ],
            'selectors' => [
                '{{WRAPPER}} .tfl-pricing-table .tfl-purchase .tfl-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);


        $this->add_control('purchase_button_color', [
            'label' => __('Label Color', 'themesflat'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tfl-pricing-table .tfl-pricing-plan-outter .tfl-grid-item .tfl-purchase .tfl-button .tfl-content-wrapper a span.text' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_control('purchase_button_bg_color', [
            'label' => __('Background Color', 'themesflat'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tfl-pricing-table .tfl-pricing-plan-outter .tfl-grid-item .tfl-purchase .tfl-button .tfl-content-wrapper a' => 'background: {{VALUE}};',
            ],
        ]);


        $this->add_group_control(\Elementor\Group_Control_Typography::get_type(), [
            'name' => 'purchase_button_typography',
            'selector' => '{{WRAPPER}} .tfl-pricing-table .tfl-pricing-plan-outter .tfl-grid-item .tfl-purchase .tfl-button .tfl-content-wrapper a span.text',
        ]);


        $this->add_control('button_icon', [
            'type' => \Elementor\Controls_Manager::TEXT,
            'label' => __('Button Icon', 'themesflat'),
            'label_block' => true,
            'separator' => 'before',
            'default' => '<i class="fas fa-plus"></i>',
            'dynamic' => [
                'active' => true,
            ],
        ]);

        $this->add_control('icon_color', [
            'label' => __('Icon Color', 'themesflat'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tfl-button a span.icon' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_control('icon_bg_color', [
            'label' => __('Icon Background', 'themesflat'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [

                '{{WRAPPER}} .tfl-button .tfl-content-wrapper a:before' => 'background: {{VALUE}};',
        '{{WRAPPER}}   .tfl-pricing-table .tfl-pricing-plan-outter .tfl-grid-item .tfl-purchase .tfl-button .tfl-content-wrapper a:hover:before' => 'background: {{VALUE}};',
            ],
        ]);







        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $settings = apply_filters('tfl_pricing_table_' . $this->get_id() . '_settings', $settings);
        if (empty($settings['pricing_plans'])) {
            return;
        }
        $args['settings'] = $settings;
        $args['widget_instance'] = $this;
        tfl_get_template_part('pricing-table/loop', $args);
    }

    protected function content_template()
    {
    }

}