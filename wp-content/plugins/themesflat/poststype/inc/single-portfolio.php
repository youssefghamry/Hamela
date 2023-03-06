<?php
get_header();
?>
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php while (have_posts()) :
                        the_post(); ?>
                        
                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>

                    <?php endwhile; // end of the loop. ?>
                </div>                
                <!-- ./row -->
            </div>
            <!-- ./container -->
        </div>
    </div>

<?php if (themesflat_get_opt('portfolios_show_post_navigator') == 1): ?>
<!-- Navigation  -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12"><?php themesflat_post_navigation(); ?></div>
        </div>
    </div>
<?php endif; ?>


    <!-- Related -->
<?php if (themesflat_get_opt('portfolios_show_related') == 1) { ?>
    <div class="container">
        <?php
        $grid_columns = themesflat_get_opt('portfolios_related_grid_columns');
        $layout = 'portfolios-grid';

        if (get_query_var('paged')) {
            $paged = get_query_var('paged');
        } elseif (get_query_var('page')) {
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }

        $terms = get_the_terms($post->ID, 'portfolios_category');
        if ($terms != '') {
            $term_ids = wp_list_pluck($terms, 'term_id');
            $args = array(
                'post_type' => 'portfolios',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'portfolios_category',
                        'field' => 'term_id',
                        'terms' => $term_ids,
                        'operator' => 'IN'
                    )),
                'posts_per_page' => themesflat_get_opt('number_related_post_portfolios'),
                'ignore_sticky_posts' => 1,
                'post__not_in' => array($post->ID)
            );

            if ($layout != '') {
                $class[] = $layout;
            }
            if ($grid_columns != '') {
                $class[] = 'columns-' . $grid_columns;
            }

            ?>
            <div class="related-portfolios">
                <div class="box-wrapper">
                    <h3 class="box-title mb-5"><?php esc_html_e('Related Portfolios', 'dirtywash') ?></h3>
                    <div class="themesflat-portfolios-taxonomy">
                        <div class="<?php echo esc_attr(implode(' ', $class)) ?> portfolio-items wrap-portfolios-post row">
                            <?php
                            $query = new WP_Query($args);
                            if ($query->have_posts()) {
                                while ($query->have_posts()) : $query->the_post(); ?>
                                    <div class="portfolio-item">
                                        <div class="portfolios-post portfolios-post-<?php the_ID(); ?>">
                                            <div class="featured-post">
                                                <?php
                                                if (has_post_thumbnail()) {
                                                    $themesflat_thumbnail = "themesflat-services";
                                                    the_post_thumbnail($themesflat_thumbnail);
                                                }
                                                ?>

                                            </div>
                                            <div class="portfolio-content">
                                                <div class="portfolio-content-inner">

                                                    <div class="cat">
                                                        <?php echo the_terms(get_the_ID(), 'portfolios_category', '', ' , ', ''); ?>
                                                    </div>
                                                    <h5 class="entry-title">
                                                        <span class="small-detail"></span>
                                                        <a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_attr(get_the_title()); ?>
                                                        </a>
                                                    </h5>
                                                    <div class="big-detail">
                                                        <img
                                                                src="<?php echo get_template_directory_uri(); ?>/images/big-detail1.svg"
                                                                alt="<?php esc_attr_e('big detail', 'tfl'); ?>">

                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                endwhile;
                            }
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } ?>

<?php get_footer(); ?>