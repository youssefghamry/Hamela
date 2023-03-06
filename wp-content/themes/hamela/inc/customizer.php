<?php
/**
 * hamela Theme Customizer
 *
 * @package hamela
 */

function themesflat_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_section('header_image')->title = esc_html__('Backgound PageTitle', 'hamela');
    $wp_customize->get_section('header_image')->priority = '22';
    $wp_customize->get_section('title_tagline')->priority = '1';
    $wp_customize->get_section('title_tagline')->title = esc_html__('General', 'hamela');
    $wp_customize->get_section('colors')->title = esc_html__('Layout Style', 'hamela');
    $wp_customize->remove_control('display_header_text');
    $wp_customize->remove_control('header_textcolor');
    $wp_customize->remove_control('background_color');
    remove_theme_support('custom-header');

    //Heading
    class themesflat_Info extends WP_Customize_Control
    {
        public $type = 'heading';
        public $label = '';

        public function render_content()
        {
            ?>
            <h3 class="themesflat-title-control"><?php echo esc_html($this->label); ?></h3>
            <?php
        }
    }

    //Title
    class themesflat_Title_Info extends WP_Customize_Control
    {
        public $type = 'title';
        public $label = '';

        public function render_content()
        {
            ?>
            <h4><?php echo esc_html($this->label); ?></h4>
            <?php
        }
    }

    //Desc
    class themesflat_Theme_Info extends WP_Customize_Control
    {
        public $type = 'info';
        public $label = '';

        public function render_content()
        {
            ?>
            <h3><?php echo esc_html($this->label); ?></h3>
            <?php
        }
    }

    //Desc
    class themesflat_Desc_Info extends WP_Customize_Control
    {
        public $type = 'desc';
        public $label = '';

        public function render_content()
        {
            ?>
            <p class="themesflat-desc-control"><?php echo esc_html($this->label); ?></p>
            <?php
        }
    }

    //___General___//
    $wp_customize->add_setting('themesflat_options[info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',
        )
    );

    // Heading site infomation
    $wp_customize->add_control(new themesflat_Info($wp_customize, 'custom-stie-infomation', array(
            'label' => esc_html__('SITE INFORMATION', 'hamela'),
            'section' => 'title_tagline',
            'settings' => 'themesflat_options[info]',
            'priority' => 1
        ))
    );

    // Desc site infomaton
    $wp_customize->add_control(new themesflat_Desc_Info($wp_customize, 'desc_customizer_siteinfomation', array(
            'label' => esc_html__('This section have basic information of your site, just change it to match with you need.', 'hamela'),
            'section' => 'title_tagline',
            'settings' => 'themesflat_options[info]',
            'priority' => 2
        ))
    );

    // Enable Smooth Scroll
    $wp_customize->add_setting(
        'enable_smooth_scroll',
        array(
            'sanitize_callback' => 'themesflat_sanitize_checkbox',
            'default' => themesflat_customize_default('enable_smooth_scroll'),
        )
    );
    $wp_customize->add_control(new themesflat_Checkbox($wp_customize,
            'enable_smooth_scroll',
            array(
                'type' => 'checkbox',
                'label' => esc_html__('Enable Smooth Scroll', 'hamela'),
                'section' => 'title_tagline',
                'priority' => 3,
            ))
    );

    // Enable Preload
    $wp_customize->add_setting(
        'enable_preload',
        array(
            'sanitize_callback' => 'themesflat_sanitize_checkbox',
            'default' => themesflat_customize_default('enable_preload'),
        )
    );
    $wp_customize->add_control(new themesflat_Checkbox($wp_customize,
            'enable_preload',
            array(
                'type' => 'checkbox',
                'label' => esc_html__('Enable Preload', 'hamela'),
                'section' => 'title_tagline',
                'priority' => 4,
            ))
    );

    //go top
    $wp_customize->add_setting(
        'go_top',
        array(
            'sanitize_callback' => 'themesflat_sanitize_checkbox',
            'default' => themesflat_customize_default('go_top'),
        )
    );

    $wp_customize->add_control(new themesflat_Checkbox($wp_customize,
            'go_top',
            array(
                'type' => 'checkbox',
                'label' => esc_html__('Go top', 'hamela'),
                'section' => 'title_tagline',
                'priority' => 4,
            ))
    );

    //less
    $wp_customize->add_setting(
        'enable_less',
        array(
            'sanitize_callback' => 'themesflat_sanitize_checkbox',
            'default' => themesflat_customize_default('enable_less'),
        )
    );

    $wp_customize->add_control(new themesflat_Checkbox($wp_customize,
            'enable_less',
            array(
                'type' => 'checkbox',
                'label' => esc_html__('Enable Less', 'hamela'),
                'section' => 'title_tagline',
                'priority' => 4,
            ))
    );

    //design
    $wp_customize->add_setting(
        'standard_design',
        array(
            'sanitize_callback' => 'themesflat_sanitize_checkbox',
            'default' => themesflat_customize_default('standard_design'),
        )
    );

    $wp_customize->add_control(new themesflat_Checkbox($wp_customize,
            'standard_design',
            array(
                'type' => 'checkbox',
                'label' => esc_html__('Standard Design', 'hamela'),
                'section' => 'title_tagline',
                'priority' => 4,
            ))
    );

    // Preload
    $wp_customize->add_setting(
        'preload',
        array(
            'default' => themesflat_customize_default('preload'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(new themesflat_RadioImages($wp_customize,
            'preload',
            array(
                'type' => 'radio-images',
                'section' => 'title_tagline',
                'priority' => 5,
                'label' => esc_html__('Preload', 'hamela'),
                'choices' => array(
                    'preload-1' => array(
                        'tooltip' => esc_html__('Circle Loaders 1', 'hamela'),
                        'src' => THEMESFLAT_LINK . 'images/controls/preload-1.png'
                    ),
                    'preload-2' => array(
                        'tooltip' => esc_html__('Circle Loaders 2', 'hamela'),
                        'src' => THEMESFLAT_LINK . 'images/controls/preload-2.png'
                    ),
                    'preload-3' => array(
                        'tooltip' => esc_html__('Circle Loaders 3', 'hamela'),
                        'src' => THEMESFLAT_LINK . 'images/controls/preload-3.png'
                    ),
                    'preload-4' => array(
                        'tooltip' => esc_html__('Circle Loaders 4', 'hamela'),
                        'src' => THEMESFLAT_LINK . 'images/controls/preload-4.png'
                    ),
                    'preload-5' => array(
                        'tooltip' => esc_html__('Spinner Loaders', 'hamela'),
                        'src' => THEMESFLAT_LINK . 'images/controls/preload-5.png'
                    ),
                    'preload-6' => array(
                        'tooltip' => esc_html__('Pulse Loaders', 'hamela'),
                        'src' => THEMESFLAT_LINK . 'images/controls/preload-6.png'
                    ),
                    'preload-7' => array(
                        'tooltip' => esc_html__('Square Loaders', 'hamela'),
                        'src' => THEMESFLAT_LINK . 'images/controls/preload-7.png'
                    ),
                    'preload-8' => array(
                        'tooltip' => esc_html__('Line Loaders', 'hamela'),
                        'src' => THEMESFLAT_LINK . 'images/controls/preload-8.png'
                    ),
                    'preload-9' => array(
                        'tooltip' => esc_html__('Percent Loaders', 'hamela'),
                        'src' => THEMESFLAT_LINK . 'images/controls/preload-9.png'
                    ),
                ),
            ))
    );

    $wp_customize->add_setting(
        'preload_percent_color',
        array(
            'default' => themesflat_customize_default('preload_percent_color'),
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'preload_percent_color',
            array(
                'label' => esc_html__('Preload Percent color', 'hamela'),
                'section' => 'title_tagline',
                'settings' => 'preload_percent_color',
                'priority' => 5
            )
        )
    );

    $wp_customize->add_setting(
        'preload_percent_bg',
        array(
            'default' => themesflat_customize_default('preload_percent_bg'),
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'preload_percent_bg',
            array(
                'label' => esc_html__('Preload Percent Background', 'hamela'),
                'section' => 'title_tagline',
                'settings' => 'preload_percent_bg',
                'priority' => 5
            )
        )
    );

    //__social links__//
    $wp_customize->add_section(
        'themesflat_socials',
        array(
            'title' => esc_html__('Socials', 'hamela'),
            'priority' => 2,
            'sanitize_callback' => 'themesflat_sanitize_text',
        )
    );

    // Social Share
    $wp_customize->add_setting(
        'show_social_share',
        array(
            'sanitize_callback' => 'themesflat_sanitize_checkbox',
            'default' => themesflat_customize_default('show_social_share'),
        )
    );
    $wp_customize->add_control(new themesflat_Checkbox($wp_customize,
            'show_social_share',
            array(
                'type' => 'checkbox',
                'label' => esc_html__('Social Share', 'hamela'),
                'description' => esc_html__('Social share only visible on detail pages ( blog detail or shop detail )', 'hamela'),
                'section' => 'themesflat_socials',
                'priority' => 1,
            ))
    );

    //Socials
    $wp_customize->add_setting(
        'social_links',
        array(
            'sanitize_callback' => 'esc_attr',
            'default' => themesflat_customize_default('social_links'),
        )
    );
    $wp_customize->add_control(new themesflat_SocialIcons($wp_customize,
            'social_links',
            array(
                'type' => 'social-icons',
                'label' => esc_html__('Social', 'hamela'),
                'section' => 'themesflat_socials',
                'priority' => 2,
            ))
    );

    //___Topbar___//
    $wp_customize->add_section(
        'themesflat_topbar',
        array(
            'title' => esc_html__('Topbar', 'hamela'),
            'priority' => 2,
        )
    );
    // Topbar Infor
    $wp_customize->add_setting(
        'topbar_info',
        array(
            'default' => themesflat_customize_default('topbar_info'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'topbar_info',
        array(
            'label' => esc_html__('TopBar Info', 'hamela'),
            'section' => 'themesflat_topbar',
            'type' => 'textarea',
            'priority' => 2
        )
    );

    // Topbar Questions
    $wp_customize->add_setting(
        'topbar_questions',
        array(
            'default' => themesflat_customize_default('topbar_questions'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'topbar_questions',
        array(
            'label' => esc_html__('TopBar Questions', 'hamela'),
            'section' => 'themesflat_topbar',
            'type' => 'textarea',
            'priority' => 2
        )
    );

    // Topbar Button Text
    $wp_customize->add_setting(
        'topbar_btn_text',
        array(
            'default' => themesflat_customize_default('topbar_btn_text'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'topbar_btn_text',
        array(
            'label' => esc_html__('TopBar Button Text', 'hamela'),
            'section' => 'themesflat_topbar',
            'type' => 'text',
            'priority' => 2
        )
    );

    // Topbar Button Text
    $wp_customize->add_setting(
        'topbar_btn_link',
        array(
            'default' => themesflat_customize_default('topbar_btn_link'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'topbar_btn_link',
        array(
            'label' => esc_html__('TopBar Button Link', 'hamela'),
            'section' => 'themesflat_topbar',
            'type' => 'text',
            'priority' => 2
        )
    );

    $wp_customize->add_setting(
        'topbar_bgcolor',
        array(
            'default' => themesflat_customize_default('topbar_bgcolor'),
            'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control(
        new themesflat_ColorOverlay(
            $wp_customize,
            'topbar_bgcolor',
            array(
                'label' => esc_html__('TopBar Background', 'hamela'),
                'section' => 'themesflat_topbar',
                'priority' => 2
            )
        )
    );

    $wp_customize->add_setting(
        'topbar_color',
        array(
            'default' => themesflat_customize_default('topbar_color'),
            'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control(
        new themesflat_ColorOverlay(
            $wp_customize,
            'topbar_color',
            array(
                'label' => esc_html__('TopBar Color', 'hamela'),
                'section' => 'themesflat_topbar',
                'priority' => 2
            )
        )
    );

    // Top bar show
    $wp_customize->add_setting(
        'topbar_show',
        array(
            'sanitize_callback' => 'themesflat_sanitize_checkbox',
            'default' => themesflat_customize_default('topbar_show'),
        )
    );
    $wp_customize->add_control(new themesflat_Checkbox($wp_customize,
            'topbar_show',
            array(
                'type' => 'checkbox',
                'label' => esc_html__('Show Top', 'hamela'),
                'section' => 'themesflat_topbar',
                'priority' => 2,
            ))
    );

    // Topbar Content
    $wp_customize->add_setting(
        'topbar_content',
        array(
            'default' => themesflat_customize_default('topbar_content'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'topbar_content',
        array(
            'label' => esc_html__('Content Top', 'hamela'),
            'section' => 'themesflat_topbar',
            'type' => 'textarea',
            'priority' => 4
        )
    );

    //___Header___//
    $wp_customize->add_section(
        'themesflat_header',
        array(
            'title' => esc_html__('Header', 'hamela'),
            'priority' => 2,
        )
    );

    // Heading custom logo
    $wp_customize->add_control(new themesflat_Info($wp_customize, 'custom-logo', array(
            'label' => esc_html__('Custom Logo', 'hamela'),
            'section' => 'themesflat_header',
            'settings' => 'themesflat_options[info]',
            'priority' => 2
        ))
    );
    // Desc custon logo
    $wp_customize->add_control(new themesflat_Desc_Info($wp_customize, 'desc_customizer_logo', array(
            'label' => esc_html__('In this section You can upload your own custom logo, change the way your logo can be displayed', 'hamela'),
            'section' => 'themesflat_header',
            'settings' => 'themesflat_options[info]',
            'priority' => 3
        ))
    );

    //Logo
    $wp_customize->add_setting(
        'site_logo',
        array(
            'default' => themesflat_customize_default('site_logo'),
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'site_logo',
            array(
                'label' => esc_html__('Upload Your Logo ', 'hamela'),
                'description' => esc_html__('If you don\'t display logo please remove it your website display 
                Site Title default in General', 'hamela'),
                'type' => 'image',
                'section' => 'themesflat_header',
                'priority' => 4,
            )
        )
    );

    //Logo
    $wp_customize->add_setting(
        'site_logo_mobile',
        array(
            'default' => themesflat_customize_default('site_logo_mobile'),
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'site_logo_mobile',
            array(
                'label' => esc_html__('Upload Your Logo On Mobile', 'hamela'),
                'description' => esc_html__('If you don\'t display logo please remove it your website display 
                Site Title default in General', 'hamela'),
                'type' => 'image',
                'section' => 'themesflat_header',
                'priority' => 4,
            )
        )
    );

    // Logo Size    
    $wp_customize->add_setting(
        'logo_width',
        array(
            'default' => themesflat_customize_default('logo_width'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(new themesflat_Slide_Control($wp_customize,
            'logo_width',
            array(
                'type' => 'slide-control',
                'section' => 'themesflat_header',
                'label' => 'Logo Size Width(px)',
                'priority' => 5,
                'input_attrs' => array(
                    'min' => 0,
                    'max' => 500,
                    'step' => 1,
                ),
            )

        )
    );

    // Logo Box control
    $wp_customize->add_setting(
        'logo_controls',
        array(
            'default' => themesflat_customize_default('logo_controls'),
            'sanitize_callback' => 'themesflat_sanitize_text',
        )
    );
    $wp_customize->add_control(new themesflat_BoxControls($wp_customize,
            'logo_controls',
            array(
                'label' => esc_html__('Logo Box Controls (px)', 'hamela'),
                'section' => 'themesflat_header',
                'type' => 'box-controls',
                'priority' => 5
            ))
    );

    // Heading custom logo
    $wp_customize->add_control(new themesflat_Info($wp_customize, 'custom-header', array(
            'label' => esc_html__('Custom Header', 'hamela'),
            'section' => 'themesflat_header',
            'settings' => 'themesflat_options[info]',
            'priority' => 6
        ))
    );


    // Enable Header Sticky
    $wp_customize->add_setting(
        'header_sticky',
        array(
            'sanitize_callback' => 'themesflat_sanitize_checkbox',
            'default' => themesflat_customize_default('header_sticky'),
        )
    );
    $wp_customize->add_control(new themesflat_Checkbox($wp_customize,
            'header_sticky',
            array(
                'type' => 'checkbox',
                'label' => esc_html__('Header Sticky', 'hamela'),
                'section' => 'themesflat_header',
                'priority' => 7,
            ))
    );

    $wp_customize->add_setting(
        'style_header',
        array(
            'default' => themesflat_customize_default('style_header'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(new themesflat_RadioImages($wp_customize,
            'style_header',
            array(
                'type' => 'radio-images',
                'section' => 'themesflat_header',
                'priority' => 9,
                'label' => esc_html__('Header Style', 'hamela'),
                'choices' => array(
                    'header-style1' => array(
                        'tooltip' => esc_html__('Header Style 1', 'hamela'),
                        'src' => THEMESFLAT_LINK . 'images/controls/header1.png'
                    ),
                    'header-style2' => array(
                        'tooltip' => esc_html__('Header Style 2', 'hamela'),
                        'src' => THEMESFLAT_LINK . 'images/controls/header2.png'
                    ),
                    'header-style3' => array(
                        'tooltip' => esc_html__('Header Style 3', 'hamela'),
                        'src' => THEMESFLAT_LINK . 'images/controls/header3.png'
                    ),
                    'header-style4' => array(
                        'tooltip' => esc_html__('Header Style 4', 'hamela'),
                        'src' => THEMESFLAT_LINK . 'images/controls/header4.png'
                    ),
                ),
            ))
    );

    //___Footer___//
    $wp_customize->add_section(
        'flat_footer',
        array(
            'title' => esc_html__('Footer', 'hamela'),
            'priority' => 4,
        )
    );

    $wp_customize->remove_control('display_header_text');
    $wp_customize->remove_control('header_textcolor');

    // Footer widget
    $wp_customize->add_control(new themesflat_Info($wp_customize, 'custom-widget-footer', array(
            'label' => esc_html__('footer widgets', 'hamela'),
            'section' => 'flat_footer',
            'settings' => 'themesflat_options[info]',
            'priority' => 9
        ))
    );

    // Desc
    $wp_customize->add_control(new themesflat_Desc_Info($wp_customize, 'desc_customizer_widget_footer', array(
            'label' => esc_html__('This section allow to change the layout and styles of footer widgets to match as you need', 'hamela'),
            'section' => 'flat_footer',
            'settings' => 'themesflat_options[info]',
            'priority' => 10
        ))
    );

    // Columns Footer
    $wp_customize->add_setting(
        'footer_widget_areas',
        array(
            'default' => themesflat_customize_default('footer_widget_areas'),
            'sanitize_callback' => 'themesflat_sanitize_grid_post_related',
        )
    );
    $wp_customize->add_control(
        'footer_widget_areas',
        array(
            'type' => 'select',
            'section' => 'flat_footer',
            'priority' => 14,
            'label' => esc_html__('Columns Footer', 'hamela'),
            'choices' => array(
                1 => esc_html__('1 Columns', 'hamela'),
                2 => esc_html__('2 Columns', 'hamela'),
            )
        )
    );


    // Footer title
    $wp_customize->add_control(new themesflat_Info($wp_customize, 'custom-footer-content', array(
            'label' => esc_html__('BOTTOM', 'hamela'),
            'section' => 'flat_footer',
            'settings' => 'themesflat_options[info]',
            'priority' => 14
        ))
    );


    // Footer Copyright
    $wp_customize->add_setting(
        'footer_copyright',
        array(
            'default' => themesflat_customize_default('footer_copyright'),
            'sanitize_callback' => 'themesflat_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'footer_copyright',
        array(
            'label' => esc_html__('Copyright', 'hamela'),
            'section' => 'flat_footer',
            'type' => 'textarea',
            'priority' => 19
        )
    );




    $wp_customize->add_setting(
        'copyright_color',
        array(
            'default' => themesflat_customize_default('copyright_color'),
            'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control(
        new themesflat_ColorOverlay(
            $wp_customize,
            'copyright_color',
            array(
                'label' => esc_html__('Footer Color', 'hamela'),
                'section' => 'flat_footer',
                'priority' => 19
            )
        )
    );


    $wp_customize->add_setting(
        'copyright_bg',
        array(
            'default' => themesflat_customize_default('copyright_bg'),
            'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control(
        new themesflat_ColorOverlay(
            $wp_customize,
            'copyright_bg',
            array(
                'label' => esc_html__('Footer Background', 'hamela'),
                'section' => 'flat_footer',
                'priority' => 19
            )
        )
    );












    //__Color__//
    $wp_customize->add_panel('color_panel', array(
        'title' => 'Color',
        'description' => 'This is panel Description',
        'priority' => 10,
    ));

    // ADD SECTION GENERAL
    $wp_customize->add_section('color_general', array(
        'title' => 'General',
        'priority' => 10,
        'panel' => 'color_panel',
    ));

    // Heading Color Scheme
    $wp_customize->add_control(new themesflat_Info($wp_customize, 'color_scheme', array(
            'label' => esc_html__('SCHEME COLOR', 'hamela'),
            'section' => 'color_general',
            'settings' => 'themesflat_options[info]',
            'priority' => 1
        ))
    );

    // Desc color scheme
    $wp_customize->add_control(new themesflat_Desc_Info($wp_customize, 'desc_color_schemer', array(
            'label' => esc_html__('Select the color that will be used for theme color.', 'hamela'),
            'section' => 'color_general',
            'settings' => 'themesflat_options[info]',
            'priority' => 2
        ))
    );

    $wp_customize->add_control(new themesflat_Desc_Info($wp_customize, 'desc_color_schemer2', array(
            'label' => esc_html__('Please turn on the less mode to use these functions', 'hamela'),
            'section' => 'color_general',
            'settings' => 'themesflat_options[info]',
            'priority' => 2
        ))
    );

    // body background color
    $wp_customize->add_setting(
        'body_background_color',
        array(
            'default' => themesflat_customize_default('body_background_color'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        new themesflat_ColorOverlay(
            $wp_customize,
            'body_background_color',
            array(
                'label' => esc_html__('Body Background Color', 'hamela'),
                'description' => esc_html__(' Opacity =1 for Background Color', 'hamela'),
                'section' => 'color_general',
                'priority' => 3
            )
        )
    );

    $wp_customize->add_setting(
        'primary_color',
        array(
            'default' => themesflat_customize_default('primary_color'),
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'primary_color',
            array(
                'label' => esc_html__('Primary color', 'hamela'),
                'section' => 'color_general',
                'settings' => 'primary_color',
                'priority' => 3
            )
        )
    );

    $wp_customize->add_setting(
        'accent_color',
        array(
            'default' => themesflat_customize_default('accent_color'),
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'accent_color',
            array(
                'label' => esc_html__('Accent color', 'hamela'),
                'section' => 'color_general',
                'settings' => 'accent_color',
                'priority' => 3
            )
        )
    );

    $wp_customize->add_setting(
        'secondary_color',
        array(
            'default' => themesflat_customize_default('secondary_color'),
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'secondary_color',
            array(
                'label' => esc_html__('Secondary color', 'hamela'),
                'section' => 'color_general',
                'settings' => 'secondary_color',
                'priority' => 3
            )
        )
    );


    // Body Color
    $wp_customize->add_setting(
        'body_text_color',
        array(
            'default' => themesflat_customize_default('body_text_color'),
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'body_text_color',
            array(
                'label' => esc_html__('Body Color', 'hamela'),
                'section' => 'color_general',
                'settings' => 'body_text_color',
                'priority' => 4
            )
        )
    );


    // Top bar text color
    $wp_customize->add_setting(
        'topbar_textcolor',
        array(
            'default' => themesflat_customize_default('topbar_textcolor'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        new themesflat_ColorOverlay(
            $wp_customize,
            'topbar_textcolor',
            array(
                'label' => esc_html__('Topbar Text Color', 'hamela'),
                'section' => 'color_topbar',
                'settings' => 'topbar_textcolor',
                'priority' => 2
            )
        )
    );

    // ADD SECTION HEADER COLOR
    $wp_customize->add_section('color_header', array(
        'title' => 'Header',
        'priority' => 11,
        'panel' => 'color_panel',
    ));

    $wp_customize->add_control(new themesflat_Desc_Info($wp_customize, 'desc_color_schemer3', array(
            'label' => esc_html__('Please turn on the less mode to use these functions', 'hamela'),
            'section' => 'color_header',
            'settings' => 'themesflat_options[info]',
            'priority' => 2
        ))
    );

    // HEADER COLOR
    $wp_customize->add_control(new themesflat_Info($wp_customize, 'header_color', array(
            'label' => esc_html__('HEADER COLOR', 'hamela'),
            'section' => 'color_header',
            'settings' => 'themesflat_options[info]',
            'priority' => 3
        ))
    );

    // Menu Background
    $wp_customize->add_setting(
        'header_backgroundcolor',
        array(
            'default' => themesflat_customize_default('header_backgroundcolor'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(new themesflat_ColorOverlay(
            $wp_customize,
            'header_backgroundcolor',
            array(
                'label' => esc_html__('Header Background', 'hamela'),
                'description' => esc_html__(' Opacity =1 for Background Color', 'hamela'),
                'section' => 'color_header',
                'priority' => 4
            )
        )
    );

    // Header Background sticky
    $wp_customize->add_setting(
        'header_backgroundcolor_sticky',
        array(
            'default' => themesflat_customize_default('header_backgroundcolor_sticky'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(new themesflat_ColorOverlay(
            $wp_customize,
            'header_backgroundcolor_sticky',
            array(
                'label' => esc_html__('Sticky Header Background', 'hamela'),
                'section' => 'color_header',
                'priority' => 5
            )
        )
    );

    // MENU COLOR
    $wp_customize->add_control(new themesflat_Info($wp_customize, 'menu_color', array(
            'label' => esc_html__('MENU COLOR', 'hamela'),
            'section' => 'color_header',
            'settings' => 'themesflat_options[info]',
            'priority' => 5
        ))
    );

    // Menu a color
    $wp_customize->add_setting(
        'mainnav_color',
        array(
            'default' => themesflat_customize_default('mainnav_color'),
            'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control(
        new themesflat_ColorOverlay(
            $wp_customize,
            'mainnav_color',
            array(
                'label' => esc_html__('Mainnav link color', 'hamela'),
                'section' => 'color_header',
                'priority' => 6
            )
        )
    );

    // Menu a:hover color
    $wp_customize->add_setting(
        'mainnav_hover_color',
        array(
            'default' => themesflat_customize_default('mainnav_hover_color'),
            'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control(
        new themesflat_ColorOverlay(
            $wp_customize,
            'mainnav_hover_color',
            array(
                'label' => esc_html__('Mainnav link hover & active color', 'hamela'),
                'section' => 'color_header',
                'priority' => 7
            )
        )
    );

    // Sub menu a color
    $wp_customize->add_setting(
        'sub_nav_color',
        array(
            'default' => themesflat_customize_default('sub_nav_color'),
            'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control(
        new themesflat_ColorOverlay(
            $wp_customize,
            'sub_nav_color',
            array(
                'label' => esc_html__('Sub nav link color', 'hamela'),
                'section' => 'color_header',
                'priority' => 8
            )
        )
    );

    // Sub nav background
    $wp_customize->add_setting(
        'sub_nav_background',
        array(
            'default' => themesflat_customize_default('sub_nav_background'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        new themesflat_ColorOverlay(
            $wp_customize,
            'sub_nav_background',
            array(
                'label' => esc_html__('Sub nav link background color', 'hamela'),
                'section' => 'color_header',
                'priority' => 9
            )
        )
    );

    // Sub nav background hover
    $wp_customize->add_setting(
        'sub_nav_color_hover',
        array(
            'default' => themesflat_customize_default('sub_nav_color_hover'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        new themesflat_ColorOverlay(
            $wp_customize,
            'sub_nav_color_hover',
            array(
                'label' => esc_html__('Sub nav link hover & active color', 'hamela'),
                'section' => 'color_header',
                'priority' => 10
            )
        )
    );

    $wp_customize->add_control(
        'action_box_image_size',
        array(
            'type' => 'select',
            'section' => 'color_action_box',
            'priority' => 12,
            'label' => esc_html__('Background Image Size', 'hamela'),
            'choices' => array(
                'auto' => esc_html__('Original', 'hamela'),
                'contain' => esc_html__('Fit to Screen', 'hamela'),
                'cover' => esc_html__('Fill Screen', 'hamela')
            ),
        )
    );

    // Section Blog
    $wp_customize->add_section(
        'blog_options',
        array(
            'title' => esc_html__('Blog Posts', 'hamela'),
            'priority' => 13,
        )
    );

    // Heading Blog
    $wp_customize->add_control(new themesflat_Info($wp_customize, 'bloglist', array(
            'label' => esc_html__('Blog', 'hamela'),
            'section' => 'blog_options',
            'settings' => 'themesflat_options[info]',
            'priority' => 1
        ))
    );

    // Desc blog
    $wp_customize->add_control(new themesflat_Desc_Info($wp_customize, 'desc_customizer_bloglist', array(
            'label' => esc_html__('All options in this section will be used to make style for blog page.', 'hamela'),
            'section' => 'blog_options',
            'settings' => 'themesflat_options[info]',
            'priority' => 2
        ))
    );

    $wp_customize->add_setting(
        'blog_layout',
        array(
            'default' => themesflat_customize_default('blog_layout'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        'blog_layout',
        array(
            'type' => 'select',
            'section' => 'blog_options',
            'priority' => 3,
            'label' => esc_html__('Sidebar Position', 'hamela'),
            'choices' => array(
                'sidebar-right' => esc_html__('Sidebar Right', 'hamela'),
                'sidebar-left' => esc_html__('Sidebar Left', 'hamela'),
                'fullwidth' => esc_html__('No Sidebar', 'hamela'),
            ),
        )
    );

    $wp_customize->add_setting(
        'blog_archive_layout',
        array(
            'default' => themesflat_customize_default('blog_archive_layout'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        'blog_archive_layout',
        array(
            'type' => 'select',
            'section' => 'blog_options',
            'priority' => 3,
            'label' => esc_html__('Blog Layout', 'hamela'),
            'choices' => array(
                'blog-list' => esc_html__('Blog List', 'hamela'),
                'blog-grid' => esc_html__('Blog Grid', 'hamela'),
            )
        )
    );

    // Gird columns Posts
    $wp_customize->add_setting(
        'blog_grid_columns',
        array(
            'default' => themesflat_customize_default('blog_grid_columns'),
            'sanitize_callback' => 'themesflat_sanitize_grid_post_related',
        )
    );
    $wp_customize->add_control(
        'blog_grid_columns',
        array(
            'type' => 'select',
            'section' => 'blog_options',
            'priority' => 4,
            'label' => esc_html__('Post Grid Columns', 'hamela'),
            'choices' => array(
                2 => esc_html__('2 Columns', 'hamela'),
                3 => esc_html__('3 Columns', 'hamela'),
                4 => esc_html__('4 Columns', 'hamela'),
            )
        )
    );

    $wp_customize->add_setting(
        'blog_sidebar_list',
        array(
            'default' => themesflat_customize_default('blog_sidebar_list'),
            'sanitize_callback' => 'esc_html',
        )
    );

    $wp_customize->add_control(new themesflat_DropdownSidebars($wp_customize,
            'blog_sidebar_list',
            array(
                'type' => 'dropdown',
                'section' => 'blog_options',
                'priority' => 3,
                'label' => esc_html__('List Sidebar Position', 'hamela'),

            ))
    );

    // Excerpt
    $wp_customize->add_setting(
        'blog_archive_post_excepts_length',
        array(
            'default' => themesflat_customize_default('blog_archive_post_excepts_length'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(new themesflat_Slide_Control($wp_customize,
            'blog_archive_post_excepts_length',
            array(
                'type' => 'slide-control',
                'section' => 'blog_options',
                'label' => 'Post Excepts Length',
                'priority' => 4,
                'input_attrs' => array(
                    'min' => 0,
                    'max' => 500,
                    'step' => 1,
                ),
            )
        )
    );

    // Show Content Posts
    $wp_customize->add_setting(
        'show_content',
        array(
            'sanitize_callback' => 'themesflat_sanitize_checkbox',
            'default' => themesflat_customize_default('show_content'),
        )
    );
    $wp_customize->add_control(new themesflat_Checkbox($wp_customize,
            'show_content',
            array(
                'type' => 'checkbox',
                'label' => esc_html__('Show Content Posts', 'hamela'),
                'section' => 'blog_options',
                'priority' => 6,
            ))
    );

    // Show Read More
    $wp_customize->add_setting(
        'blog_archive_readmore',
        array(
            'sanitize_callback' => 'themesflat_sanitize_checkbox',
            'default' => themesflat_customize_default('blog_archive_readmore'),
        )
    );
    $wp_customize->add_control(new themesflat_Checkbox($wp_customize,
            'blog_archive_readmore',
            array(
                'type' => 'checkbox',
                'label' => esc_html__('Show Read More', 'hamela'),
                'section' => 'blog_options',
                'priority' => 6,
            ))
    );

    // Read More Text
    $wp_customize->add_setting(
        'blog_archive_readmore_text',
        array(
            'default' => themesflat_customize_default('blog_archive_readmore_text'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'blog_archive_readmore_text',
        array(
            'type' => 'text',
            'label' => esc_html__('Read More Text', 'hamela'),
            'section' => 'blog_options',
            'priority' => 7
        )
    );

    // Pagination
    $wp_customize->add_setting(
        'blog_archive_pagination_style',
        array(
            'default' => themesflat_customize_default('blog_archive_pagination_style'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        'blog_archive_pagination_style',
        array(
            'type' => 'select',
            'section' => 'blog_options',
            'priority' => 8,
            'label' => esc_html__('Pagination Style', 'hamela'),
            'choices' => array(
                'pager' => esc_html__('Pager', 'hamela'),
                'numeric' => esc_html__('Numeric', 'hamela'),
                'pager-numeric' => esc_html__('Pager & Numeric', 'hamela'),
                'loadmore' => esc_html__('Load More', 'hamela')
            ),
        )
    );

    // Header Blog Single    
    $wp_customize->add_control(new themesflat_Info($wp_customize, 'blogsingle', array(
            'label' => esc_html__('Blog Single', 'hamela'),
            'section' => 'blog_options',
            'settings' => 'themesflat_options[info]',
            'priority' => 9
        ))
    );

    // Desc Blog Single
    $wp_customize->add_control(new themesflat_Desc_Info($wp_customize, 'desc_customizer_blogsingle', array(
            'label' => esc_html__('Also, you can change the style for blog single to make your site unique.', 'hamela'),
            'section' => 'blog_options',
            'settings' => 'themesflat_options[info]',
            'priority' => 10
        ))
    );

    $wp_customize->add_setting(
        'blog_layout_single',
        array(
            'default' => themesflat_customize_default('blog_layout_single'),
            'sanitize_callback' => 'esc_attr',
        )
    );

    $wp_customize->add_control(
        'blog_layout_single',
        array(
            'type' => 'select',
            'section' => 'blog_options',
            'priority' => 11,
            'label' => esc_html__('Sidebar Position', 'hamela'),
            'choices' => array(
                'sidebar-right' => esc_html__('Sidebar Right', 'hamela'),
                'sidebar-left' => esc_html__('Sidebar Left', 'hamela'),
                'fullwidth' => esc_html__('No Sidebar', 'hamela'),
            ),
        )
    );

    $wp_customize->add_setting(
        'blog_single_sidebar_list',
        array(
            'default' => themesflat_customize_default('blog_single_sidebar_list'),
            'sanitize_callback' => 'esc_html',
        )
    );

    $wp_customize->add_control(new themesflat_DropdownSidebars($wp_customize,
            'blog_single_sidebar_list',
            array(
                'type' => 'dropdown',
                'section' => 'blog_options',
                'priority' => 11,
                'label' => esc_html__('List Sidebar Single Position', 'hamela'),

            ))
    );

    // Show Post Navigator
    $wp_customize->add_setting(
        'show_post_navigator',
        array(
            'sanitize_callback' => 'themesflat_sanitize_checkbox',
            'default' => themesflat_customize_default('show_post_navigator'),
        )
    );
    $wp_customize->add_control(new themesflat_Checkbox($wp_customize,
            'show_post_navigator',
            array(
                'type' => 'checkbox',
                'label' => esc_html__('Show Post Navigator', 'hamela'),
                'section' => 'blog_options',
                'priority' => 12
            ))
    );

    // Enable Entry Footer Content
    $wp_customize->add_setting(
        'show_entry_footer_content',
        array(
            'sanitize_callback' => 'themesflat_sanitize_checkbox',
            'default' => themesflat_customize_default('show_entry_footer_content'),
        )
    );

    $wp_customize->add_control(new themesflat_Checkbox($wp_customize,
            'show_entry_footer_content',
            array(
                'type' => 'checkbox',
                'label' => esc_html__('Show Entry Footer Content', 'hamela'),
                'section' => 'blog_options',
                'priority' => 14,
            ))
    );

    // Show Related Posts
    $wp_customize->add_setting(
        'show_related_post',
        array(
            'sanitize_callback' => 'themesflat_sanitize_checkbox',
            'default' => 0,
        )
    );
    $wp_customize->add_control(new themesflat_Checkbox($wp_customize,
            'show_related_post',
            array(
                'type' => 'checkbox',
                'label' => esc_html__('Show Related Posts', 'hamela'),
                'section' => 'blog_options',
                'priority' => 16
            ))
    );

    //Related Posts Style
    $wp_customize->add_setting(
        'related_post_style',
        array(
            'default' => themesflat_customize_default('related_post_style'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        'related_post_style',
        array(
            'type' => 'select',
            'section' => 'blog_options',
            'priority' => 16,
            'label' => esc_html__('Related Posts Style', 'hamela'),
            'choices' => array(
                'blog-list' => esc_html__('Blog List', 'hamela'),
                'blog-grid' => esc_html__('Blog Grid', 'hamela'),
            ))
    );


    // Gird columns Related Posts
    $wp_customize->add_setting(
        'grid_columns_post_related',
        array(
            'default' => 2,
            'sanitize_callback' => 'themesflat_sanitize_grid_post_related',
        )
    );
    $wp_customize->add_control(
        'grid_columns_post_related',
        array(
            'type' => 'select',
            'section' => 'blog_options',
            'priority' => 17,
            'label' => esc_html__('Columns Of Related Posts', 'hamela'),
            'choices' => array(
                2 => esc_html__('2 Columns', 'hamela'),
                3 => esc_html__('3 Columns', 'hamela'),
            )
        )
    );

    // Number Of Related Posts
    $wp_customize->add_setting(
        'number_related_post',
        array(
            'default' => esc_html__('2', 'hamela'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'number_related_post',
        array(
            'type' => 'text',
            'label' => esc_html__('Number Of Related Posts', 'hamela'),
            'section' => 'blog_options',
            'priority' => 18
        )
    );

    // Section portfolio
    $wp_customize->add_section(
        'portfolio_options',
        array(
            'title' => esc_html__('Portfolio', 'hamela'),
            'priority' => 14,
        )
    );
    // Header Portfolio Archive    
    $wp_customize->add_control(new themesflat_Info($wp_customize, 'portfolio', array(
            'label' => esc_html__('PORTFOLIO ARCHIVE', 'hamela'),
            'section' => 'portfolio_options',
            'settings' => 'themesflat_options[info]',
            'priority' => 1
        ))
    );

    // Gird columns portfolio
    $wp_customize->add_setting(
        'portfolio_grid_columns',
        array(
            'default' => themesflat_customize_default('portfolio_grid_columns'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        'portfolio_grid_columns',
        array(
            'type' => 'select',
            'section' => 'portfolio_options',
            'priority' => 1,
            'label' => esc_html('Grid Columns', 'hamela'),
            'choices' => array(
                2 => esc_html('2 Columns', 'hamela'),
                3 => esc_html('3 Columns', 'hamela'),
                4 => esc_html('4 Columns', 'hamela')
            )
        )
    );

    // Order By portfolio
    $wp_customize->add_setting(
        'portfolio_order_by',
        array(
            'default' => themesflat_customize_default('portfolio_order_by'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        'portfolio_order_by',
        array(
            'type' => 'select',
            'label' => esc_html('Order By', 'hamela'),
            'section' => 'portfolio_options',
            'priority' => 3,
            'choices' => array(
                'date' => esc_html('Date', 'hamela'),
                'id' => esc_html('Id', 'hamela'),
                'author' => esc_html('Author', 'hamela'),
                'title' => esc_html('Title', 'hamela'),
                'modified' => esc_html('Modified', 'hamela'),
                'comment_count' => esc_html('Comment Count', 'hamela'),
                'menu_order' => esc_html('Menu Order', 'hamela')
            )
        )
    );

    // Order Direction portfolio
    $wp_customize->add_setting(
        'portfolio_order_direction',
        array(
            'default' => themesflat_customize_default('portfolio_order_direction'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        'portfolio_order_direction',
        array(
            'type' => 'select',
            'label' => esc_html('Order Direction', 'hamela'),
            'section' => 'portfolio_options',
            'priority' => 4,
            'choices' => array(
                'DESC' => esc_html('Descending', 'hamela'),
                'ASC' => esc_html('Assending', 'hamela')
            )
        )
    );

    // Portfolio Exclude Post
    $wp_customize->add_setting(
        'portfolio_exclude',
        array(
            'default' => themesflat_customize_default('portfolio_exclude'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'portfolio_exclude',
        array(
            'type' => 'text',
            'label' => esc_html('Post Ids Will Be Inorged. Ex: 1,2,3', 'hamela'),
            'section' => 'portfolio_options',
            'priority' => 5
        )
    );

    // Change slug for portfolio
    $wp_customize->add_setting(
        'portfolio_slug',
        array(
            'default' => 'portfolio',
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'portfolio_slug',
        array(
            'type' => 'text',
            'label' => esc_html('Change slug ( Display on url ) for portfolio', 'hamela'),
            'section' => 'portfolio_options',
            'priority' => 6
        )
    );

    // Change Name for portfolio
    $wp_customize->add_setting(
        'portfolio_name',
        array(
            'default' => 'portfolio',
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'portfolio_name',
        array(
            'type' => 'text',
            'label' => esc_html('Change Name ( Display on breadcrumb ) for portfolio', 'hamela'),
            'section' => 'portfolio_options',
            'priority' => 7
        )
    );

    // Header Portfolio Single    
    $wp_customize->add_control(new themesflat_Info($wp_customize, 'portfoliosingle', array(
            'label' => esc_html__('PORTFOLIO SINGLE', 'hamela'),
            'section' => 'portfolio_options',
            'settings' => 'themesflat_options[info]',
            'priority' => 10
        ))
    );

    // Show Post Navigator portfolio
    $wp_customize->add_setting(
        'portfolios_show_post_navigator',
        array(
            'sanitize_callback' => 'themesflat_sanitize_checkbox',
            'default' => themesflat_customize_default('portfolios_show_post_navigator'),
        )
    );
    $wp_customize->add_control(new themesflat_Checkbox($wp_customize,
            'portfolios_show_post_navigator',
            array(
                'type' => 'checkbox',
                'label' => esc_html__('Show Single Navigator', 'hamela'),
                'section' => 'portfolio_options',
                'priority' => 12
            ))
    );

    // Show Related Portfolios
    $wp_customize->add_setting(
        'portfolios_show_related',
        array(
            'sanitize_callback' => 'themesflat_sanitize_checkbox',
            'default' => themesflat_customize_default('portfolios_show_related'),
        )
    );
    $wp_customize->add_control(new themesflat_Checkbox($wp_customize,
            'portfolios_show_related',
            array(
                'type' => 'checkbox',
                'label' => esc_html__('Show Related Portfolios', 'hamela'),
                'section' => 'portfolio_options',
                'priority' => 13
            ))
    );

    // Gird columns portfolio related
    $wp_customize->add_setting(
        'portfolios_related_grid_columns',
        array(
            'default' => themesflat_customize_default('portfolios_related_grid_columns'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        'portfolios_related_grid_columns',
        array(
            'type' => 'select',
            'section' => 'portfolio_options',
            'priority' => 16,
            'label' => esc_html__('Columns Related', 'hamela'),
            'choices' => array(
                2 => esc_html__('2 Columns', 'hamela'),
                3 => esc_html__('3 Columns', 'hamela'),
                4 => esc_html__('4 Columns', 'hamela')
            )
        )
    );

    // Number Of Related Posts Portfolios
    $wp_customize->add_setting(
        'number_related_post_portfolios',
        array(
            'default' => 3,
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'number_related_post_portfolios',
        array(
            'type' => 'text',
            'label' => esc_html__('Number Of Related Posts', 'hamela'),
            'section' => 'portfolio_options',
            'priority' => 17
        )
    );

    // Section Services
    $wp_customize->add_section(
        'services_options',
        array(
            'title' => esc_html__('Services', 'hamela'),
            'priority' => 14,
        )
    );

    // Header Services Archive    
    $wp_customize->add_control(new themesflat_Info($wp_customize, 'services', array(
            'label' => esc_html__('SERVICES ARCHIVE', 'hamela'),
            'section' => 'services_options',
            'settings' => 'themesflat_options[info]',
            'priority' => 1
        ))
    );

    // Gird columns portfolio
    $wp_customize->add_setting(
        'services_grid_columns',
        array(
            'default' => themesflat_customize_default('services_grid_columns'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        'services_grid_columns',
        array(
            'type' => 'select',
            'section' => 'services_options',
            'priority' => 1,
            'label' => esc_html('Grid Columns', 'hamela'),
            'choices' => array(
                2 => esc_html('2 Columns', 'hamela'),
                3 => esc_html('3 Columns', 'hamela'),
                4 => esc_html('4 Columns', 'hamela')
            )
        )
    );

    // Number Of Related Posts Service
    $wp_customize->add_setting(
        'number_related_post_services',
        array(
            'default' => esc_html__('3', 'hamela'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'number_related_post_services',
        array(
            'type' => 'text',
            'label' => esc_html__('Number Of Related Posts', 'hamela'),
            'section' => 'services_options',
            'priority' => 17
        )
    );

    // Order By services
    $wp_customize->add_setting(
        'services_order_by',
        array(
            'default' => themesflat_customize_default('services_order_by'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        'services_order_by',
        array(
            'type' => 'select',
            'label' => esc_html('Order By', 'hamela'),
            'section' => 'services_options',
            'priority' => 3,
            'choices' => array(
                'date' => esc_html('Date', 'hamela'),
                'id' => esc_html('Id', 'hamela'),
                'author' => esc_html('Author', 'hamela'),
                'title' => esc_html('Title', 'hamela'),
                'modified' => esc_html('Modified', 'hamela'),
                'comment_count' => esc_html('Comment Count', 'hamela'),
                'menu_order' => esc_html('Menu Order', 'hamela')
            )
        )
    );

    // Order Direction services
    $wp_customize->add_setting(
        'services_order_direction',
        array(
            'default' => themesflat_customize_default('services_order_direction'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        'services_order_direction',
        array(
            'type' => 'select',
            'label' => esc_html('Order Direction', 'hamela'),
            'section' => 'services_options',
            'priority' => 4,
            'choices' => array(
                'DESC' => esc_html('Descending', 'hamela'),
                'ASC' => esc_html('Assending', 'hamela')
            )
        )
    );

    // services Exclude Post
    $wp_customize->add_setting(
        'services_exclude',
        array(
            'default' => themesflat_customize_default('services_exclude'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'services_exclude',
        array(
            'type' => 'text',
            'label' => esc_html('Post Ids Will Be Inorged. Ex: 1,2,3', 'hamela'),
            'section' => 'services_options',
            'priority' => 5
        )
    );

    // Change slug for services
    $wp_customize->add_setting(
        'services_slug',
        array(
            'default' => 'services',
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'services_slug',
        array(
            'type' => 'text',
            'label' => esc_html('Change slug ( Display on url ) for services', 'hamela'),
            'section' => 'services_options',
            'priority' => 6
        )
    );

    // Change Name for services
    $wp_customize->add_setting(
        'services_name',
        array(
            'default' => 'services',
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'services_name',
        array(
            'type' => 'text',
            'label' => esc_html('Change Name ( Display on breadcrumb ) for services', 'hamela'),
            'section' => 'services_options',
            'priority' => 7
        )
    );

    // Header Services Single    
    $wp_customize->add_control(new themesflat_Info($wp_customize, 'servicessingle', array(
            'label' => esc_html__('SERVICES SINGLE', 'hamela'),
            'section' => 'services_options',
            'settings' => 'themesflat_options[info]',
            'priority' => 10
        ))
    );

    // Show Post Navigator services
    $wp_customize->add_setting(
        'services_show_post_navigator',
        array(
            'sanitize_callback' => 'themesflat_sanitize_checkbox',
            'default' => themesflat_customize_default('services_show_post_navigator'),
        )
    );
    $wp_customize->add_control(new themesflat_Checkbox($wp_customize,
            'services_show_post_navigator',
            array(
                'type' => 'checkbox',
                'label' => esc_html__('Show Single Navigator', 'hamela'),
                'section' => 'services_options',
                'priority' => 11
            ))
    );

    // Show Related services
    $wp_customize->add_setting(
        'services_show_related',
        array(
            'sanitize_callback' => 'themesflat_sanitize_checkbox',
            'default' => themesflat_customize_default('services_show_related'),
        )
    );
    $wp_customize->add_control(new themesflat_Checkbox($wp_customize,
            'services_show_related',
            array(
                'type' => 'checkbox',
                'label' => esc_html__('Show Related Services', 'hamela'),
                'section' => 'services_options',
                'priority' => 12
            ))
    );

    // Gird columns services related
    $wp_customize->add_setting(
        'services_related_grid_columns',
        array(
            'default' => themesflat_customize_default('services_related_grid_columns'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        'services_related_grid_columns',
        array(
            'type' => 'select',
            'section' => 'services_options',
            'priority' => 13,
            'label' => esc_html__('Columns Related', 'hamela'),
            'choices' => array(
                2 => esc_html__('2 Columns', 'hamela'),
                3 => esc_html__('3 Columns', 'hamela'),
                4 => esc_html__('4 Columns', 'hamela')
            )
        )
    );

    // Section Typography
    $wp_customize->add_section(
        'flat_typography',
        array(
            'title' => esc_html__('Typography', 'hamela'),
            'priority' => 14,
        )
    );
    // Heading Typography
    $wp_customize->add_control(new themesflat_Info($wp_customize, 'custom-typography', array(
            'label' => esc_html__('BODY FONT', 'hamela'),
            'section' => 'flat_typography',
            'settings' => 'themesflat_options[info]',
            'priority' => 2
        ))
    );

    // Desc Typography
    $wp_customize->add_control(new themesflat_Desc_Info($wp_customize, 'desc_customizer_logo', array(
            'label' => esc_html__('You can modify the font family, size, color, ... for global content.', 'hamela'),
            'section' => 'flat_typography',
            'settings' => 'themesflat_options[info]',
            'priority' => 3
        ))
    );

    //__Page title and breadcrumb__//
    $wp_customize->add_panel('page_title_panel', array(
        'title' => esc_html__('Page Title & Breadcrumb', 'hamela'),
        'description' => 'This is panel Description',
        'priority' => 10,
    ));

    // ADD SECTION PAGE TITLE
    $wp_customize->add_section('page_title_style', array(
        'title' => esc_html__('Page Title Style', 'hamela'),
        'priority' => 10,
        'panel' => 'page_title_panel',
    ));

//     Heading Page Title
    $wp_customize->add_control(new themesflat_Info($wp_customize, 'page_title_style', array(
            'label' => esc_html__('Page Title Style', 'hamela'),
            'section' => 'page_title_style',
            'settings' => 'themesflat_options[info]',
            'priority' => 1
        ))
    );

    $wp_customize->add_setting(
        'page_title_alignment',
        array(
            'default' => themesflat_customize_default('page_title_alignment'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        'page_title_alignment',
        array(
            'type' => 'select',
            'section' => 'page_title_style',
            'priority' => 4,
            'label' => esc_html__('Page Title Alignment', 'hamela'),
            'choices' => array(
                'left' => esc_html__('Left', 'hamela'),
                'center' => esc_html__('Center', 'hamela'),
                'right' => esc_html__('Right', 'hamela')
            ),
        )
    );

    //Page Title Background
    $wp_customize->add_setting(
        'page_title_background_image',
        array(
            'default' => themesflat_customize_default('page_title_background_image'),
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'page_title_background_image',
            array(
                'label' => esc_html__('Upload Your Page Title Background Image', 'hamela'),
                'type' => 'image',
                'section' => 'page_title_style',
                'priority' => 5,
            )
        )
    );

    $wp_customize->add_setting(
        'page_title_image_size',
        array(
            'default' => themesflat_customize_default('page_title_image_size'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        'page_title_image_size',
        array(
            'type' => 'select',
            'section' => 'page_title_style',
            'priority' => 5,
            'label' => esc_html__('Page Title Background Image Size', 'hamela'),
            'choices' => array(
                'auto' => esc_html__('Original', 'hamela'),
                'contain' => esc_html__('Fit to Screen', 'hamela'),
                'cover' => esc_html__('Fill Screen', 'hamela')
            ),
        )
    );


    // Page Title Color
    $wp_customize->add_setting(
        'page_title_text_color',
        array(
            'default' => themesflat_customize_default('page_title_text_color'),
            'sanitize_callback' => 'esc_attr',
        )
    );

    $wp_customize->add_control(
        new themesflat_ColorOverlay(
            $wp_customize,
            'page_title_text_color',
            array(
                'label' => esc_html__('Page Heading Text Color', 'hamela'),
                'section' => 'page_title_style',
                'priority' => 7
            )
        )
    ); 

    // Page Title Link Color
    $wp_customize->add_setting(
        'breadcrumb_color',
        array(
            'default' => themesflat_customize_default('breadcrumb_color'),
            'sanitize_callback' => 'esc_attr',
        )
    );

    $wp_customize->add_control(
        new themesflat_ColorOverlay(
            $wp_customize,
            'breadcrumb_color',
            array(
                'label' => esc_html__('Breadcrumb Color', 'hamela'),
                'section' => 'page_title_style',
                'priority' => 8
            )
        )
    );


    $wp_customize->add_setting(
        'breadcrumb_link_color',
        array(
            'default' => themesflat_customize_default('breadcrumb_link_color'),
            'sanitize_callback' => 'esc_attr',
        )
    );

    $wp_customize->add_control(
        new themesflat_ColorOverlay(
            $wp_customize,
            'breadcrumb_link_color',
            array(
                'label' => esc_html__('Breadcrumb Link Color', 'hamela'),
                'section' => 'page_title_style',
                'priority' => 8
            )
        )
    );

    $wp_customize->add_setting(
        'breadcrumb_link_color_hover',
        array(
            'default' => themesflat_customize_default('breadcrumb_link_color_hover'),
            'sanitize_callback' => 'esc_attr',
        )
    );

    $wp_customize->add_control(
        new themesflat_ColorOverlay(
            $wp_customize,
            'breadcrumb_link_color_hover',
            array(
                'label' => esc_html__('Breadcrumb Link Color Hover', 'hamela'),
                'section' => 'page_title_style',
                'priority' => 8
            )
        )
    );


    $wp_customize->add_setting(
        'breadcrumb_separator_color',
        array(
            'default' => themesflat_customize_default('breadcrumb_separator_color'),
            'sanitize_callback' => 'esc_attr',
        )
    );

    $wp_customize->add_control(
        new themesflat_ColorOverlay(
            $wp_customize,
            'breadcrumb_separator_color',
            array(
                'label' => esc_html__('Breadcrumb Separator Color', 'hamela'),
                'section' => 'page_title_style',
                'priority' => 8
            )
        )
    );

    // Page Title Overlay
    $wp_customize->add_setting(
        'page_title_background_color',
        array(
            'default' => themesflat_customize_default('page_title_background_color'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(new themesflat_ColorOverlay(
            $wp_customize,
            'page_title_background_color',
            array(
                'label' => esc_html__('Page Title Overlay Background Color', 'hamela'),
                'description' => esc_html__(' Opacity =1 for Background Color', 'hamela'),
                'section' => 'page_title_style',
                'priority' => 9
            )
        )
    );

    // Box control
    $wp_customize->add_setting(
        'page_title_controls',
        array(
            'default' => themesflat_customize_default('page_title_controls'),
            'sanitize_callback' => 'themesflat_sanitize_text',
        )
    );
    $wp_customize->add_control(new themesflat_BoxControls($wp_customize,
            'page_title_controls',
            array(
                'label' => esc_html__('Page Title Controls (px)', 'hamela'),
                'section' => 'page_title_style',
                'type' => 'box-controls',
                'priority' => 10
            ))
    );

    // Page title heading
    $wp_customize->add_setting(
        'page_title_heading_enabled',
        array(
            'sanitize_callback' => 'themesflat_sanitize_checkbox',
            'default' => themesflat_customize_default('page_title_heading_enabled'),
        )
    );
    $wp_customize->add_control(new themesflat_Checkbox($wp_customize,
            'page_title_heading_enabled',
            array(
                'type' => 'checkbox',
                'label' => esc_html__('Enable Heading Page Title', 'hamela'),
                'section' => 'page_title_style',
                'priority' => 3,
            ))
    );

    // Heading Button On Page Title
    $wp_customize->add_control(new themesflat_Info($wp_customize, 'page_title_button', array(
            'label' => esc_html__('Button On Page Title', 'hamela'),
            'description' => esc_html__(' Opacity =1 for Background Color', 'hamela'),
            'section' => 'page_title_style',
            'settings' => 'themesflat_options[info]',
            'priority' => 10
        ))
    );

    // Desc Button On Page Title
    $wp_customize->add_control(new themesflat_Desc_Info($wp_customize, 'desc_page_title_button', array(
            'label' => esc_html__('Only show when page title style default and page title align left', 'hamela'),
            'section' => 'page_title_style',
            'settings' => 'themesflat_options[info]',
            'priority' => 10
        ))
    );

    // Enable Header Absolute
    $wp_customize->add_setting(
        'page_title_button_show',
        array(
            'sanitize_callback' => 'themesflat_sanitize_checkbox',
            'default' => themesflat_customize_default('page_title_button_show'),
        )
    );
    $wp_customize->add_control(new themesflat_Checkbox($wp_customize,
            'page_title_button_show',
            array(
                'type' => 'checkbox',
                'label' => esc_html__('Button Show', 'hamela'),
                'section' => 'page_title_style',
                'priority' => 10,
            ))
    );

    $wp_customize->add_setting(
        'text_page_title_button',
        array(
            'default' => themesflat_customize_default('text_page_title_button'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'text_page_title_button',
        array(
            'type' => 'text',
            'section' => 'page_title_style',
            'label' => 'Text Button',
            'priority' => 10
        )
    );

    $wp_customize->add_setting(
        'page_title_button_url',
        array(
            'default' => themesflat_customize_default('page_title_button_url'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'page_title_button_url',
        array(
            'type' => 'text',
            'label' => esc_html__('Button Link', 'hamela'),
            'section' => 'page_title_style',
            'priority' => 10
        )
    );

    // ADD SECTION BREADCRUMB
    $wp_customize->add_section('page_break_crumb_section', array(
        'title' => esc_html__('Page Breadcrumb', 'hamela'),
        'priority' => 10,
        'panel' => 'page_title_panel',
    ));

    // Breadcrumb section
    $wp_customize->add_control(new themesflat_Info($wp_customize, 'page_break_crumb_section', array(
            'label' => esc_html__('Page Breadcrumb', 'hamela'),
            'section' => 'page_break_crumb_section',
            'settings' => 'themesflat_options[info]',
            'priority' => 1
        ))
    );

    // Breadcrumb
    $wp_customize->add_setting(
        'breadcrumb_enabled',
        array(
            'sanitize_callback' => 'themesflat_sanitize_checkbox',
            'default' => themesflat_customize_default('breadcrumb_enabled'),
        )
    );
    $wp_customize->add_control(new themesflat_Checkbox($wp_customize,
            'breadcrumb_enabled',
            array(
                'type' => 'checkbox',
                'label' => esc_html__('Enable Breadcrumb', 'hamela'),
                'section' => 'page_break_crumb_section',
                'priority' => 14,
            ))
    );

    $wp_customize->add_setting(
        'bread_crumb_prefix',
        array(
            'default' => themesflat_customize_default('bread_crumb_prefix'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'bread_crumb_prefix',
        array(
            'type' => 'text',
            'label' => esc_html__('Breadcrumb Prefix', 'hamela'),
            'section' => 'page_break_crumb_section',
            'priority' => 15
        )
    );

    $wp_customize->add_setting(
        'breadcrumb_separator',
        array(
            'default' => themesflat_customize_default('breadcrumb_separator'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'breadcrumb_separator',
        array(
            'type' => 'text',
            'label' => esc_html__('Breadcrumb Separator', 'hamela'),
            'section' => 'page_break_crumb_section',
            'priority' => 16
        )
    );

    // Body fonts
    $wp_customize->add_setting(
        'body_font_name',
        array(
            'default' => themesflat_customize_default('body_font_name'),
            'sanitize_callback' => 'esc_html',
        )
    );
    $wp_customize->add_control(new themesflat_Typography($wp_customize,
            'body_font_name',
            array(
                'label' => esc_html__('Font name/style/sets', 'hamela'),
                'section' => 'flat_typography',
                'type' => 'typography',
                'fields' => array('family', 'style', 'line_height', 'size'),
                'priority' => 4
            ))
    );

    // Headings fonts
    $wp_customize->add_control(new themesflat_Info($wp_customize, 'custom-heading-font', array(
            'label' => esc_html__('Headings fonts', 'hamela'),
            'section' => 'flat_typography',
            'settings' => 'themesflat_options[info]',
            'priority' => 8
        ))
    );

    // Desc font
    $wp_customize->add_control(new themesflat_Desc_Info($wp_customize, 'desc_customizer_heading-font', array(
            'label' => esc_html__('You can modify the font options for your headings. h1, h2, h3, h4, ...', 'hamela'),
            'section' => 'flat_typography',
            'settings' => 'themesflat_options[info]',
            'priority' => 9
        ))
    );

    $wp_customize->add_setting(
        'headings_font_name',
        array(
            'default' => themesflat_customize_default('headings_font_name'),
            'sanitize_callback' => 'esc_html',
        )
    );
    $wp_customize->add_control(new themesflat_Typography($wp_customize,
            'headings_font_name',
            array(
                'label' => esc_html__('Font name/style/sets', 'hamela'),
                'section' => 'flat_typography',
                'type' => 'typography',
                'fields' => array('family', 'style', 'line_height'),
                'priority' => 11
            ))
    );

    // H1 size
    $wp_customize->add_setting(
        'h1_size',
        array(
            'sanitize_callback' => 'absint',
            'default' => themesflat_customize_default('h1_size'),
        )
    );
    $wp_customize->add_control('h1_size', array(
        'type' => 'number',
        'priority' => 13,
        'section' => 'flat_typography',
        'label' => esc_html__('H1 font size (px)', 'hamela'),
        'input_attrs' => array(
            'min' => 10,
            'max' => 60,
            'step' => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ));

    // H2 size
    $wp_customize->add_setting(
        'h2_size',
        array(
            'sanitize_callback' => 'absint',
            'default' => themesflat_customize_default('h2_size'),
        )
    );
    $wp_customize->add_control('h2_size', array(
        'type' => 'number',
        'priority' => 14,
        'section' => 'flat_typography',
        'label' => esc_html__('H2 font size (px)', 'hamela'),
        'input_attrs' => array(
            'min' => 10,
            'max' => 60,
            'step' => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ));

    // H3 size
    $wp_customize->add_setting(
        'h3_size',
        array(
            'sanitize_callback' => 'absint',
            'default' => themesflat_customize_default('h3_size'),
        )
    );
    $wp_customize->add_control('h3_size', array(
        'type' => 'number',
        'priority' => 15,
        'section' => 'flat_typography',
        'label' => esc_html__('H3 font size (px)', 'hamela'),
        'input_attrs' => array(
            'min' => 10,
            'max' => 60,
            'step' => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ));

    // H4 size
    $wp_customize->add_setting(
        'h4_size',
        array(
            'sanitize_callback' => 'absint',
            'default' => themesflat_customize_default('h4_size'),
        )
    );
    $wp_customize->add_control('h4_size', array(
        'type' => 'number',
        'priority' => 16,
        'section' => 'flat_typography',
        'label' => esc_html__('H4 font size (px)', 'hamela'),
        'input_attrs' => array(
            'min' => 10,
            'max' => 60,
            'step' => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ));

    // H5 size
    $wp_customize->add_setting(
        'h5_size',
        array(
            'sanitize_callback' => 'absint',
            'default' => themesflat_customize_default('h5_size'),
        )
    );
    $wp_customize->add_control('h5_size', array(
        'type' => 'number',
        'priority' => 17,
        'section' => 'flat_typography',
        'label' => esc_html__('H5 font size (px)', 'hamela'),
        'input_attrs' => array(
            'min' => 10,
            'max' => 60,
            'step' => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ));

    // H6 size
    $wp_customize->add_setting(
        'h6_size',
        array(
            'sanitize_callback' => 'absint',
            'default' => themesflat_customize_default('h6_size'),
        )
    );
    $wp_customize->add_control('h6_size', array(
        'type' => 'number',
        'priority' => 18,
        'section' => 'flat_typography',
        'label' => esc_html__('H6 font size (px)', 'hamela'),
        'input_attrs' => array(
            'min' => 10,
            'max' => 60,
            'step' => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ));

    // Menu fonts
    $wp_customize->add_setting('themesflat_options[info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(new themesflat_Info($wp_customize, 'menu_fonts', array(
            'label' => esc_html__('Menu fonts', 'hamela'),
            'section' => 'flat_typography',
            'settings' => 'themesflat_options[info]',
            'priority' => 19
        ))
    );

    $wp_customize->add_setting(
        'menu_font_name',
        array(
            'default' => themesflat_customize_default('menu_font_name'),
            'sanitize_callback' => 'esc_html',
        )
    );
    $wp_customize->add_control(new themesflat_Typography($wp_customize,
            'menu_font_name',
            array(
                'label' => esc_html__('Font name/style/sets', 'hamela'),
                'section' => 'flat_typography',
                'type' => 'typography',
                'fields' => array('family', 'style', 'line_height', 'size'),
                'priority' => 20
            ))
    );

    // Sub Menu fonts
    $wp_customize->add_setting('themesflat_options[info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(new themesflat_Info($wp_customize, 'sub_menu_fonts', array(
            'label' => esc_html__('Sub Menu fonts', 'hamela'),
            'section' => 'flat_typography',
            'settings' => 'themesflat_options[info]',
            'priority' => 21
        ))
    );

    $wp_customize->add_setting(
        'sub_menu_font_name',
        array(
            'default' => themesflat_customize_default('sub_menu_font_name'),
            'sanitize_callback' => 'esc_html',
        )
    );
    $wp_customize->add_control(new themesflat_Typography($wp_customize,
            'sub_menu_font_name',
            array(
                'label' => esc_html__('Font name/style/sets', 'hamela'),
                'section' => 'flat_typography',
                'type' => 'typography',
                'fields' => array('family', 'style', 'line_height', 'size'),
                'priority' => 22
            ))
    );

}

add_action('customize_register', 'themesflat_customize_register');

// Text
function themesflat_sanitize_text($input)
{
    return wp_kses($input, themesflat_kses_allowed_html());
}

// Background size
function themesflat_sanitize_bg_size($input)
{
    $valid = array(
        'cover' => esc_html__('Cover', 'hamela'),
        'contain' => esc_html__('Contain', 'hamela'),
    );
    if (array_key_exists($input, $valid)) {
        return $input;
    } else {
        return '';
    }
}

// Blog Layout
function themesflat_sanitize_blog($input)
{
    $valid = array(
        'sidebar-right' => esc_html__('Sidebar right', 'hamela'),
        'sidebar-left' => esc_html__('Sidebar left', 'hamela'),
        'fullwidth' => esc_html__('Full width (no sidebar)', 'hamela')

    );
    if (array_key_exists($input, $valid)) {
        return $input;
    } else {
        return '';
    }
}

// themesflat_sanitize_pagination
function themesflat_sanitize_pagination($input)
{
    $valid = array(
        'pager' => esc_html__('Pager', 'hamela'),
        'numeric' => esc_html__('Numeric', 'hamela'),
        'page_numeric' => esc_html__('Pager & Numeric', 'hamela')
    );
    if (array_key_exists($input, $valid)) {
        return $input;
    } else {
        return '';
    }
}


// themesflat_sanitize_related_post
function themesflat_sanitize_related_post($input)
{
    $valid = array(
        'simple_list' => esc_html__('Simple List', 'hamela'),
        'grid' => esc_html__('Grid', 'hamela')
    );
    if (array_key_exists($input, $valid)) {
        return $input;
    } else {
        return '';
    }
}

// Footer widget areas
function themesflat_sanitize_fw($input)
{
    $valid = array(
        '0' => esc_html__('footer_default', 'hamela'),
        '1' => esc_html__('One', 'hamela'),
        '2' => esc_html__('Two', 'hamela'),
        '3' => esc_html__('Three', 'hamela'),
        '4' => esc_html__('Four', 'hamela')
    );
    if (array_key_exists($input, $valid)) {
        return $input;
    } else {
        return '';
    }
}

// Header style sanitize
function themesflat_sanitize_headerstyle($input)
{
    $valid = themesflat_predefined_header_styles();
    if (array_key_exists($input, $valid)) {
        return $input;
    } else {
        return '';
    }
}

// Checkboxes
function themesflat_sanitize_checkbox($input)
{
    if ($input == 1) {
        return 1;
    } else {
        return '';
    }
}

// Themesflat_sanitize_related_portfolio
function themesflat_sanitize_related_portfolio($input)
{
    $valid = array(
        'grid' => esc_html__('Grid', 'hamela'),
        'grid_masonry' => esc_html__('Grid Masonry', 'hamela'),
        'grid_nomargin' => esc_html__('Grid Masonry No Margin', 'hamela'),
        'carosuel' => esc_html__('Carosuel', 'hamela'),
        'carosuel_nomargin' => esc_html__('Carosuel No Margin', 'hamela')
    );
    if (array_key_exists($input, $valid)) {
        return $input;
    } else {
        return '';
    }
}

// Themesflat_sanitize_portfolio_pagination
function themesflat_sanitize_portfolio_pagination($input)
{
    $valid = array(
        'page_numeric' => esc_html__('Pager & Numeric', 'hamela'),
        'load_more' => esc_html__('Load More', 'hamela')
    );
    if (array_key_exists($input, $valid)) {
        return $input;
    } else {
        return '';
    }
}

// Themesflat_sanitize_portfolio_order
function themesflat_sanitize_portfolio_order($input)
{
    $valid = array(
        'date' => esc_html__('Date', 'hamela'),
        'id' => esc_html__('Id', 'hamela'),
        'author' => esc_html__('Author', 'hamela'),
        'title' => esc_html__('Title', 'hamela'),
        'modified' => esc_html__('Modified', 'hamela'),
        'comment_count' => esc_html__('Comment Count', 'hamela'),
        'menu_order' => esc_html__('Menu Order', 'hamela')
    );
    if (array_key_exists($input, $valid)) {
        return $input;
    } else {
        return '';
    }
}

// Themesflat_sanitize_portfolio_order_direction
function themesflat_sanitize_portfolio_order_direction($input)
{
    $valid = array(
        'DESC' => esc_html__('Descending', 'hamela'),
        'ASC' => esc_html__('Assending', 'hamela')
    );
    if (array_key_exists($input, $valid)) {
        return $input;
    } else {
        return '';
    }
}

// Themesflat_sanitize_grid_portfolio
function themesflat_sanitize_grid_portfolio($input)
{
    $valid = array(
        'portfolio-two-columns' => esc_html__('2 Columns', 'hamela'),
        'portfolio-three-columns' => esc_html__('3 Columns', 'hamela'),
        'portfolio-four-columns' => esc_html__('4 Columns', 'hamela'),
        'portfolio-five-columns' => esc_html__('5 Columns', 'hamela')
    );
    if (array_key_exists($input, $valid)) {
        return $input;
    } else {
        return '';
    }
}

// themesflat_sanitize_grid_portfolio_related
function themesflat_sanitize_grid_portfolio_related($input)
{
    $valid = array(
        'portfolio-one-columns' => esc_html__('1 Columns', 'hamela'),
        'portfolio-two-columns' => esc_html__('2 Columns', 'hamela'),
        'portfolio-three-columns' => esc_html__('3 Columns', 'hamela'),
        'portfolio-four-columns' => esc_html__('4 Columns', 'hamela'),
        'portfolio-five-columns' => esc_html__('5 Columns', 'hamela')
    );
    if (array_key_exists($input, $valid)) {
        return $input;
    } else {
        return '';
    }
}

// Themesflat_sanitize_grid_post_related
function themesflat_sanitize_grid_post_related($input)
{
    $valid = array(
        2 => esc_html__('2 Columns', 'hamela'),
        3 => esc_html__('3 Columns', 'hamela'),
        4 => esc_html__('4 Columns', 'hamela'),
        5 => esc_html__('5 Columns', 'hamela'),
    );
    if (array_key_exists($input, $valid)) {
        return $input;
    } else {
        return '';
    }
}

// themesflat_sanitize_layout_product
function themesflat_sanitize_layout_product($input)
{
    $valid = array(
        'fullwidth' => esc_html__('No Sidebar', 'hamela'),
        'sidebar-right' => esc_html__('Sidebar Right', 'hamela'),
        'sidebar-left' => esc_html__('Sidebar Left', 'hamela')
    );
    if (array_key_exists($input, $valid)) {
        return $input;
    } else {
        return '';
    }
}

