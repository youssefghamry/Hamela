<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package hamela
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="profile" href="<?php echo THEMESFLAT_PROTOCOL ?>://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>    
<?php wp_body_open(); ?>
<div class="themesflat-boxed">
    <?php
    $header = themesflat_get_opt('style_header');
    $style_opt_elementor = themesflat_get_opt_elementor('style_header');
    if ($style_opt_elementor != '') {
        $header = $style_opt_elementor;
    }

    echo '<div class="themesflat_header_wrap ' . esc_attr($header) . ' light-mode-'.themesflat_get_opt_elementor('light_mode_header').'">';
    get_template_part('tpl/header/' . $header);
    echo '</div>';
    ?>

    <!-- Page Title -->
    <?php
    if(themesflat_get_opt_elementor('hide_page_title') != 'yes'){
        get_template_part('tpl/page-title');
    }
    ?>
    <div id="themesflat-content" class="page-wrap">
