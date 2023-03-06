<?php



use Elementor\Widget_Base;

use Elementor\Controls_Manager;

use Elementor\Utils;

use Elementor\Plugin;

use Elementor\Repeater;

use Elementor\Icons_Manager;

use Elementor\Scheme_Color;

use Elementor\Scheme_Typography;

use Elementor\Group_Control_Typography;

use \Elementor\Group_Control_Image_Size;

use \Elementor\Group_Control_Background;

use \Elementor\Group_Control_Border;

use \Elementor\Group_Control_Box_Shadow as Group_Control_Box_Shadow;

use Elementor\Modules\DynamicTags\Module as TagsModule;





class themesflat_options_elementor

{

    public function __construct()

    {

        add_action('elementor/documents/register_controls', [$this, 'themesflat_elementor_register_options'], 10);

        add_action('elementor/editor/before_enqueue_scripts', function () {

            wp_enqueue_script('elementor-preview-load', THEMESFLAT_LINK . 'js/elementor/elementor-preview-load.js', array('jquery'), null, true);

        }, 10, 3);

    }



    public function themesflat_elementor_register_options($element)

    {

        $post_id = $element->get_id();

        $post_type = get_post_type($post_id);

        $this->themesflat_options_page_header($element);
        $this->themesflat_options_page_pagetitle($element);
        if ( is_singular( 'services' ) ) {
            $this->themesflat_options_services($element);
        }
    }





    public function get_menus()

    {

        $list = ['default' =>  esc_html__('Default', 'hamela')];

        $menus = wp_get_nav_menus();

        foreach ($menus as $menu) {

            $list[$menu->slug] = $menu->name;

        }



        return $list;

    }



    public function themesflat_options_page_header($element)

    {

        // TF Header

        $element->start_controls_section(

            'themesflat_header_options',

            [

                'label' => esc_html__('TF Header', 'hamela'),

                'tab' => Controls_Manager::TAB_SETTINGS,

            ]

        );



        $element->add_control(

            'style_header',

            [

                'label' => esc_html__('Header Style', 'hamela'),

                'type' => Controls_Manager::SELECT,

                'default' => '',

                'options' => [

                    'header-style1' => esc_html__('Header 01', 'hamela'),

                    'header-style2' => esc_html__('Header 02', 'hamela'),

                    'header-style3' => esc_html__('Header 03', 'hamela'),

                    'header-style4' => esc_html__('Header 04', 'hamela'),

                ],

            ]

        );



        // Logo

        $element->add_control(

            'site_logo',

            [

                'label' => esc_html__('Custom Logo', 'hamela'),

                'type' => Controls_Manager::MEDIA,

            ]

        );



        $element->add_control(

            'nav_menu',

            [

                'label' => esc_html__('Select Menu', 'hamela'),

                'type' => Controls_Manager::SELECT,

                'default' => 'default',

                'options' => $this->get_menus(),

            ]

        );      



        $element->add_control(

            'light_mode_header',

            [

                'label' => esc_html__('Light Mode', 'hamela'),

                'type' => Controls_Manager::SWITCHER,

                'label_on' => esc_html__('Yes', 'hamela'),

                'label_off' => esc_html__('No', 'hamela'),

                'return_value' => 'yes',

                'default' => 'no',

            ]

        );



        $element->add_control(

            'hide_page_title',

            [

                'label' => esc_html__('Hide Page Title', 'hamela'),

                'type' => Controls_Manager::SWITCHER,

                'label_on' => esc_html__('Yes', 'hamela'),

                'label_off' => esc_html__('No', 'hamela'),

                'return_value' => 'yes',

                'default' => 'no',

            ]

        );       

        $element->add_control(
            'header_color',
            [
                'label' => esc_html__( 'Header Color', 'hamela' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .nav-wrap .mainnav .menu > li > a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .main-header-contact .text-phone, .main-header-contact .text-phone a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .btn-menu svg, {{WRAPPER}} .btn-menu svg g' => 'fill: {{VALUE}}',
                    '{{WRAPPER}} .show-search > a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $element->add_control(
            'header_color_link_hover',
            [
                'label' => esc_html__( 'Header Link Hover Color', 'hamela' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .nav-wrap .mainnav .menu > li > a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .main-header-contact .text-phone a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .show-search > a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        //Extra Classes Header

        $element->add_control(

            'extra_classes_header',

            [

                'label' => esc_html__('Extra Classes', 'hamela'),

                'type' => Controls_Manager::TEXT,

                'label_block' => true,

            ]

        );



        $element->end_controls_section();

    }

    public function themesflat_options_page_pagetitle($element) {
        // TF Page Title
        $element->start_controls_section(
            'themesflat_pagetitle_options',
            [
                'label' => esc_html__('TF Page Title', 'hamela'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );       

        $element->add_control(
            'hide_pagetitle',
            [
                'label'     => esc_html__( 'Hide Page Title', 'hamela'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'block',
                'options'   => [
                    'none'       => esc_html__( 'Yes', 'hamela'),
                    'block'      => esc_html__( 'No', 'hamela'),
                ],
                'selectors'  => [
                    '{{WRAPPER}} .page-title' => 'display: {{VALUE}};',
                ],
            ]
        ); 

        $element->add_responsive_control(
            'pagetitle_padding',
            [
                'label' => esc_html__( 'Padding', 'hamela' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => [ 'top', 'bottom' ],
                'selectors' => [
                    '{{WRAPPER}} .page-title' => 'padding-top: {{TOP}}{{UNIT}}; padding-bottom: {{BOTTOM}}{{UNIT}};',
                ],
                'condition' => [ 'hide_pagetitle' => 'block' ]
            ]
        ); 

        $element->add_responsive_control(
            'pagetitle_margin',
            [
                'label' => esc_html__( 'Margin', 'hamela' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => [ 'top', 'bottom' ],
                'selectors' => [
                    '{{WRAPPER}} .page-title' => 'margin-top: {{TOP}}{{UNIT}}; margin-bottom: {{BOTTOM}}{{UNIT}};',
                ],
                'condition' => [ 'hide_pagetitle' => 'block' ]
            ]
        );              

        $element->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'pagetitle_bg',
                'label' => esc_html__( 'Background', 'hamela' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .page-title',
                'condition' => [ 'hide_pagetitle' => 'block' ]
            ]
        );

        $element->add_control(
            'pagetitle_overlay_color',
            [
                'label' => esc_html__( 'Overlay Color', 'hamela' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .page-title .overlay' => 'background: {{VALUE}}; opacity: 100%;filter: alpha(opacity=100);',
                ],
                'condition' => [ 'hide_pagetitle' => 'block' ]
            ]
        );

        //Extra Classes Page Title
        $element->add_control(
            'extra_classes_pagetitle',
            [
                'label'   => esc_html__( 'Extra Classes', 'hamela' ),
                'type'    => Controls_Manager::TEXT,
                'label_block' => true,
                'separator' => 'before'
            ]
        );

        $element->end_controls_section();
    }

    public function themesflat_options_services($element) {
        // TF Services
        $element->start_controls_section(
            'themesflat_services_options',
            [
                'label' => esc_html__('TF Services', 'hamela'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $element->add_control(
            'services_post_icon',
            [
                'label' => esc_html__( 'Post Icon', 'hamela' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'hamela-icon-idea-bulb',
                    'library' => 'hamela_icon',
                ],
            ]
        );

        $element->end_controls_section();
    }

}



new themesflat_options_elementor();