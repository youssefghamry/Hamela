<?php

 use Elementor\Utils;

 if (!defined('ABSPATH')) {
     exit; // Exit if accessed directly
 }

// list($animate_class, $animation_attr) = tfl_get_animation_atts($settings['widget_animation']);

?>

<div class="tfl-heading tfl-<?php echo $settings['style']; ?> tfl-align<?php echo $settings['align']; ?> <?php //echo $animate_class; ?>" <?php //echo $animation_attr; ?>>
    <?php if (!empty($settings['subtitle'])): ?>
        <div class="tfl-subtitle">
            <?php echo esc_html($settings['subtitle']); ?>

        </div>
    <?php endif; ?>
    <<?php echo Utils::validate_html_tag($settings['title_tag']); ?> class="tfl-title">
    <?php echo $settings['heading']; ?>

    <?php if($settings['show_detail'] == 'yes'): ?>
        <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html($settings, 'full', 'image_detail'); ?>
    <?php endif; ?>

</<?php echo Utils::validate_html_tag($settings['title_tag']); ?>>
</div>