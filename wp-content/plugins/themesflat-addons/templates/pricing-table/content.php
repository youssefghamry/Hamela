<?php
/**
 * Content - Pricing Table Template
 *
 * This template can be overridden by copying it to mytheme/addons-for-elementor/addons/pricing-table/content.php
 *
 */

use Elementor\Utils;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$pricing_title = esc_html($pricing_plan['pricing_title']);
$pricing_class = esc_attr($pricing_plan['pricing_class']);
$tagline = $pricing_plan['tagline'];
$price_tag = htmlspecialchars_decode(wp_kses_post($pricing_plan['price_tag']));
$pricing_img = $pricing_plan['pricing_image'];
$pricing_url = (empty($pricing_plan['button_url']['url'])) ? '#' : esc_url($pricing_plan['button_url']['url']);
$pricing_button_text = esc_html($pricing_plan['button_text']);
$button_new_window = esc_html($pricing_plan['button_url']['is_external']);
$highlight = ($pricing_plan['highlight'] == 'yes');

$price_tag = (empty($price_tag)) ? '' : $price_tag;


?>
<div class="tfl-pricing-plan-outter  <?php //echo $pricing_plan['column_layout']; ?>">
    <div class="tfl-grid-item tfl-pricing-plan <?php echo($highlight ? ' tfl-highlight' : ''); ?> <?php echo $pricing_class;//echo $animate_class; ?>" <?php //echo $animation_attr; ?>>

        <div class="tfl-top-header">

            <?php if (!empty($pricing_img)) : ?>

                <?php echo wp_get_attachment_image($pricing_img['id'], 'full', false, array('class' => 'tfl-image full', 'alt' => $pricing_title)); ?>

            <?php endif; ?>

            <?php if (!empty($tagline)): ?>

                <p class="tfl-tagline center"><?php echo $tagline; ?></p>

            <?php endif; ?>

            <<?php echo Utils::validate_html_tag($settings['plan_name_tag']); ?> class="tfl-plan-name tfl-center"><?php echo $pricing_title; ?>
            </<?php echo Utils::validate_html_tag($settings['plan_name_tag']); ?>>


        </div>

        <<?php echo Utils::validate_html_tag($settings['plan_price_tag']); ?> class="tfl-plan-price tfl-plan-header
        tfl-center">

            <span class="tfl-text"><?php echo wp_kses_post($price_tag); ?></span>

        </<?php echo Utils::validate_html_tag($settings['plan_price_tag']); ?>>

        <div class="tfl-plan-details">

            <?php echo $pricing_plan['pricing_content']; ?>

        </div><!-- .tfl-plan-details -->

        <div class="tfl-purchase">

            <div class="tfl-button tfl-style1 tfl-align ">
                <div class="tfl-content-wrapper">
                    <a href="<?php echo esc_url($pricing_url); ?>" <?php echo(!empty($button_new_window) ? ' target="_blank"' : ''); ?>>
                        <span class="text"> <?php echo esc_html($pricing_button_text); ?></span>
                        <span class="icon">
                             <?php echo $settings['button_icon']; ?>
                        </span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div><!-- .tfl-pricing-plan -->