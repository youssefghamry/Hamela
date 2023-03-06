<?php 

add_filter( 'elementor/icons_manager/additional_tabs', 'themesflat_iconpicker_register' );



function themesflat_iconpicker_register( $icons = array() ) {

	

	$icons['hamela_icon'] = array(

		'name'          => 'hamela_icon',

		'label'         => esc_html__( 'Hamela Icons', 'themesflat' ),

		'labelIcon'     => 'hamela-icon-vision',

		'prefix'        => 'hamela-icon-',

		'displayPrefix' => '',

		'url'           => THEMESFLAT_LINK . 'css/hamela-icon.css',

		'fetchJson'     => URL_THEMESFLAT_ADDONS . 'assets/css/hamela-icon.json',

		'ver'           => '1.0.0',

	);	

	$icons['hamela_digital_icon'] = array(
		'name'          => 'hamela_digital_icon',
		'label'         => esc_html__( 'Hamela Digital Icons', 'themesflat' ),
		'labelIcon'     => 'hamela-digital-icon-idea',
		'prefix'        => 'hamela-digital-icon-',
		'displayPrefix' => '',
		'url'           => THEMESFLAT_LINK . 'css/hamela-digital-icon.css',
		'fetchJson'     => URL_THEMESFLAT_ADDONS . 'assets/css/hamela-digital-icon.json',
		'ver'           => '1.0.0',
	);	



	return $icons;

}