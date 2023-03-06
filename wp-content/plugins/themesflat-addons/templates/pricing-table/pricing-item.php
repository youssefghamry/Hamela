<?php

/**
 * Loop - Pricing Item Shortcode Template
 *
 * This template can be overridden by copying it to mytheme/addons-for-elementor/addons/pricing-table/pricing-item.php
 *
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

?>

<div class="tfl-pricing-item">

    <div class="tfl-title"><?php echo htmlspecialchars_decode(wp_kses_post($title)); ?></div>

    <div class="tfl-value-wrap">

        <div class="tfl-value">

            <?php echo htmlspecialchars_decode(wp_kses_post($value)); ?>

        </div>

    </div>

</div>
