<?php
if (is_page() && is_page_template('tpl/front-page.php')) {
    echo '<div class="clearfix"></div>';
    return;
}

$page_title_enabled = themesflat_get_opt('page_title_heading_enabled');
if ($page_title_enabled != 1) return false;

$blog_title = get_the_title();

if (is_home()) {
    if (is_front_page()) {
        $title = esc_html__('Latest News', 'hamela');
    } else {
        $title = esc_html(wp_title('', FALSE));
    }

} elseif (is_archive()) {
    $title = get_the_archive_title();
    if ((class_exists('WooCommerce') && is_shop())) {
        $title = get_the_title(get_option('woocommerce_shop_page_id'));
    }
} elseif (is_singular('post')) {
    $title = $blog_title;
} elseif (is_singular()) {
    if (is_single()) {
        $title = get_the_title();
        if ((class_exists('WooCommerce'))) {
            if (is_product() && is_single()) {
                $title = get_the_title(get_option('woocommerce_shop_page_id'));
            }
        }
    } elseif (is_page_template('tpl/page_single.php')) {
        $title = get_the_title();
    } else {
        $title = get_the_title();
    }
} elseif (is_search()) {
    $title = sprintf(esc_html__('Search results for &quot;%s&quot;', 'hamela'), get_search_query());
} elseif (is_404()) {
    $title = esc_html__('Not Found', 'hamela');
} elseif (is_author()) {
    the_post();
    $title = sprintf(esc_html__('Author Archives: %s', 'hamela'), get_the_author());
    rewind_posts();
} elseif (is_day()) {
    $title = sprintf(esc_html__('Daily Archives: %s', 'hamela'), get_the_date());
} elseif (is_month()) {
    $title = sprintf(esc_html__('Monthly Archives: %s', 'hamela'), get_the_date('F Y'));
} elseif (is_year()) {
    $title = sprintf(esc_html__('Yearly Archives: %s', 'hamela'), get_the_date('Y'));
} elseif (is_tax() || is_category() || is_tag()) {
    $title = single_term_title('', false);
}

?>

<?php
if ($title == '') return;
?>
<!-- Page title -->
<?php
$page_title_styles = 'default';
$page_title_alignment = themesflat_get_opt('page_title_alignment');
$page_title_button_show = 'hide';
$column_page_title_headding = 'col-lg-12';
$column_page_title_button = 'col-lg-12';
if (themesflat_get_opt('page_title_button_show') == 1) {
    $page_title_button_show = 'show';
    $column_page_title_headding = 'col-lg-9';
    $column_page_title_button = 'col-lg-3';
}

?>
<header class="page-header">
    <div class="page-title <?php echo esc_attr($page_title_styles); ?> <?php echo esc_attr($page_title_alignment); ?>">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="page-title-container <?php echo esc_attr($column_page_title_headding); ?>">
                    <?php
                    if ($page_title_enabled == 1) {
                        printf('<h1 class="page-title-heading">%s</h1>', $title);
                    }
                    ?>
                    <?php
                    if (themesflat_get_opt('breadcrumb_enabled') == 1):
                        themesflat_breadcrumb_trail(array(
                            'separator' => themesflat_get_opt('breadcrumb_separator'),
                            'show_browse' => true,
                            'labels' => array(
                                'browse' => themesflat_get_opt('bread_crumb_prefix', esc_html__('', 'hamela')),
                                'home' => esc_html__('Home', 'hamela')
                            )
                        ));

                    endif;
                    ?>
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->

            <div class="row">
                <?php if ($page_title_button_show == 'show'): ?>
                    <div class="<?php echo esc_attr($column_page_title_button); ?>">
                        <div class="tfl-button tfl-style1 tfl-align-left ">
                            <div class="tfl-content-wrapper">
                                <a href="<?php echo esc_url(themesflat_get_opt('page_title_button_url')); ?>">
                                    <span class="text"> <?php echo esc_attr(themesflat_get_opt('text_page_title_button')); ?></span>
                                    <span class="icon"><i class="fas fa-plus"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>


        </div><!-- /.container -->
    </div><!-- /.page-title -->
</header><!-- /.page-header -->
