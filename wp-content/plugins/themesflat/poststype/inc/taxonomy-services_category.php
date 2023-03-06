<?php
get_header();
$term_slug = $wp_query->tax_query->queries[0]['terms'][0];
?>
    <div class="main-content">
        <div class="container">
            <div class="themesflat-services-taxonomy">
                <?php
                $args = array(
                    'post_type' => 'services',
                    'posts_per_page' => -1,
                    'paged' => $paged,
                );
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'services_category',
                        'field' => 'slug',
                        'terms' => $term_slug
                    ),
                );
                ?>
                <div class="wrap-services-post row column-3">
                    <?php
                    $query = new WP_Query($args);
                    if ($query->have_posts()) {
                        while ($query->have_posts()) : $query->the_post(); ?>
                            <div class="item">
                                <div class="services-post services-post-<?php the_ID(); ?>">
                                    <div class="featured-post">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            $themesflat_thumbnail = "themesflat-services";
                                            the_post_thumbnail($themesflat_thumbnail);
                                        }
                                        ?>
                                        <div class="overlay"></div>
                                        <a href="<?php echo get_the_permalink(); ?>" class="overlay zoom">
                                    <span class="inner-overlay">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="21"><title>Asset 1</title><g
                                                    id="Layer_2" data-name="Layer 2"><g id="Layer_1-2"
                                                                                        data-name="Layer 1"><path
                                                            d="M26,0V24H50v1H26V50H25V25H0V24H25V0Z"></path></g></g></svg>
                                    </span>
                                        </a>
                                    </div>
                                    <div class="content">
                                        <div class="inner-content-left">
                                            <ul class="post-meta">
                                                <li class="post-category">
                                                    <?php echo the_terms(get_the_ID(), 'services_category', '', ' , ', ''); ?>
                                                </li>
                                            </ul>
                                            <h2 class="title">
                                                <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                            </h2>
                                        </div>
                                        <div class="inner-content-right">
                                            <div class="tf-button-container">
                                                <a href="<?php echo esc_url(get_permalink()); ?>"
                                                   class="tf-button bt_icon_after">
                                                    <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1"
                                                         data-name="Layer 1" viewBox="0 0 69.3 47.51" width="25"><title>
                                                            right-arrow [Converted]</title>
                                                        <path class="cls-1" d="M0,23H67.45v1.67H0Z"></path>
                                                        <path class="cls-1"
                                                              d="M45.59,0,69.3,23.67l-1.18,1.18L44.41,1.18Z"></path>
                                                        <path class="cls-1"
                                                              d="M44.35,46.33,68,22.64l1.19,1.18L45.53,47.51Z"></path>
                                                    </svg>
                                                </a>
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
            </div><!-- /.themesflat-services-taxonomy -->
        </div><!-- /.container -->
    </div>
<?php get_footer(); ?>