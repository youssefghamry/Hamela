<?php
/**
 * Loop - Pricing Table Template
 *
 * This template can be overridden by copying it to mytheme/addons-for-elementor/addons/pricing-table/loop.php
 *
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

?>

<div class="tfl-pricing-table tfl-uber-grid-container <?php //echo tfl_get_grid_classes($settings); ?> grid-<?php echo $settings['column_layout']; ?>-columns">

    <?php foreach ($settings['pricing_plans'] as $pricing_plan) : ?>

        <?php $args['pricing_plan'] = $pricing_plan; ?>

        <?php tfl_get_template_part("pricing-table/content", $args); ?>

    <?php endforeach; ?>

</div><!-- .tfl-pricing-table -->

<div class="tfl-clear"></div>