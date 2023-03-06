<?php

use Elementor\Utils;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// list($animate_class, $animation_attr) = tfl_get_animation_atts($settings['widget_animation']);
?>

<div class="tfl-button tfl-<?php echo $settings['style']; ?> tfl-align-<?php echo $settings['tfl_align']; ?> <?php //echo $animate_class; ?>" <?php //echo $animation_attr; ?>>
    <div class="tfl-content-wrapper">
        <a href="<?php echo $settings['link']['url']; ?>">
        	<span class="text"> <?php echo $settings['button_text']; ?></span>
            <span class="icon">
                 <?php echo $settings['button_icon']; ?>
            </span>
        </a>
    </div>
</div>