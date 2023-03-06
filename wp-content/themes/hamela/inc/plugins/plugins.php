<?php
// Register action to declare required plugins
add_action('tgmpa_register', 'themesflat_recommend_plugin');
function themesflat_recommend_plugin() {
    
    $plugins = array(
        array(
            'name' => 'Elementor',
            'slug' => 'elementor',
            'required' => true
        ),
        array(
            'name' => 'Contact Form 7',
            'slug' => 'contact-form-7',
            'required' => true
        ),
        array(
            'name' => 'ThemesFlat',
            'slug' => 'themesflat',
            'source' => THEMESFLAT_DIR . 'inc/plugins/themesflat.zip',
            'required' => true
        ),
        array(
            'name' => 'Themesflat Addons',
            'slug' => 'themesflat-addons',
            'source' => THEMESFLAT_DIR . 'inc/plugins/themesflat-addons.zip',
            'required' => true
        ),
        array(
            'name' => 'Slider Revolution',
            'slug' => 'revslider',
            'source' => esc_url( THEMESFLAT_PROTOCOL . '://surielementor.com/3rdplugin/revslider.zip' ),
            'required' => false
        ),
        array(
            'name' => 'One Click Demo Import',
            'slug' => 'one-click-demo-import',
            'required' => false
        )   
    );
    
    tgmpa($plugins);
}

