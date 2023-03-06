<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package hamela
 */


$blog_layout = themesflat_get_opt('blog_layout');
$sidebar_single = themesflat_get_opt('blog_single_sidebar_list');
$sidebar = themesflat_get_opt('blog_sidebar_list');
if (is_page()) {
    $sidebar = themesflat_get_opt('page_sidebar_list');
} elseif (is_singular('portfolios')) {
    $sidebar = 'portfolios-sidebar';
} elseif (is_single()) {
    $sidebar = themesflat_get_opt('blog_single_sidebar_list');
    $blog_layout_single = themesflat_get_opt('blog_layout_single');
    if ($blog_layout_single == 'fullwidth') return false;
}

if (!is_active_sidebar($sidebar)) {
    return false;
}

?>
<div class="col-lg-4 tfl-sidebar-block">
    <?php
    switch ($sidebar) {
        case 'portfolios-sidebar':
            ?>
            <div id="secondary" class="widget-area" role="complementary">
                <div class="sidebar">
                    <?php
                    themesflat_dynamic_sidebar($sidebar);
                    ?>
                </div>
            </div><!-- #secondary -->
            <?php
            break;

        case 'blog-sidebar':
            ?>
            <div id="secondary" class="widget-area" role="complementary">
                <div class="sidebar">
                    <?php
                    themesflat_dynamic_sidebar($sidebar);
                    ?>
                </div>
            </div><!-- #secondary -->
            <?php
            break;
        case 'blog-single-sidebar':
            ?>
            <div id="secondary" class="widget-area" role="complementary">
                <div class="sidebar">
                    <?php
                    themesflat_dynamic_sidebar($sidebar);
                    ?>
                </div>
            </div><!-- #secondary -->
            <?php
            break;
    }
    ?>

</div>
