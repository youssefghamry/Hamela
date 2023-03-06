<?php
/**
 * Register options ACF
 * 
 */
function themesflat_register_options_acf() {
    if( function_exists('acf_add_local_field_group') ){ 
        acf_add_local_field_group(array(
            'key' => 'group_606aab8425e81',
            'title' => 'Services Options',
            'fields' => array(
                array(
                    'key' => 'field_606aabbb14212',
                    'label' => 'Discount price of the service.',
                    'name' => 'discount',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '0%',
                    'placeholder' => 'Minimum 0% and maximum 100%. (For example: 50%)',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'services',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
        ));
    }
}

add_action('acf/init', 'themesflat_register_options_acf');
