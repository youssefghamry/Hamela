<?php
get_header();
$term_slug = $wp_query->tax_query->queries[0]['terms'][0];
$columns = themesflat_get_opt('portfolio_grid_columns');
?>
    <div class="main-content">
        <div class="container">
            <div class="themesflat-portfolios-taxonomy">
                <?php
                $args = array(
                    'post_type' => 'portfolios',
                    'posts_per_page' => -1,
                    'paged' => $paged,
                );
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'portfolios_category',
                        'field' => 'slug',
                        'terms' => $term_slug
                    ),
                );
                ?>
                <div class="portfolio-items row grid-<?php echo esc_attr($columns); ?>-columns ">
                    <?php
                    $query = new WP_Query($args);
                    if ($query->have_posts()) {
                        while ($query->have_posts()) : $query->the_post();

                            $termsArray = get_the_terms(get_the_ID(), 'portfolios_category');
                            $termsString = "";

                            if ($termsArray) {
                                foreach ($termsArray as $term) {
                                    $itemname = strtolower($term->slug);
                                    $itemname = str_replace(' ', '-', $itemname);
                                    $termsString .= $itemname . ' ';
                                }
                            }
                            ?>
                            <div class="portfolio-item <?php echo esc_attr($termsString); ?>">
                                <div class="portfolios-post portfolios-post-<?php the_ID(); ?>">
                                    <div class="featured-post">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            $themesflat_thumbnail = "themesflat-portfolios";
                                            the_post_thumbnail($themesflat_thumbnail);
                                        }
                                        ?>
                                    </div>

                                    <div class="portfolio-content">
                                        <div class="portfolio-content-inner">
                                            <div class="list-items">
                                                <div class="cat">
                                                    <?php echo the_terms(get_the_ID(), 'portfolios_category', '', ' , ', ''); ?>
                                                </div>
                                                <h5 class="entry-title">
                                                    <div class="small-detail"></div>
                                                    <a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_attr(get_the_title()); ?>
                                                    </a>
                                                </h5>
                                                <div class="big-detail">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/images/big-detail1.svg"
                                                         alt="<?php esc_attr_e('big detail', 'tfl'); ?>">
                                                </div>
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
            </div><!-- /.themesflat-portfolios-taxonomy -->
        </div><!-- /.container -->
    </div>
<?php get_footer(); ?>