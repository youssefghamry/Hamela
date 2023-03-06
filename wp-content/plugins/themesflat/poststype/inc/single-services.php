<?php
get_header(); 
?>
<div class="main-content">
    <div class="container">
        <div class="row">
            <?php while ( have_posts() ) : the_post(); ?>

                <div class="col-lg-12">
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </div>

            <?php endwhile; // end of the loop. ?>

        </div><!-- ./row -->
    </div><!-- ./container -->
</div>

<?php if ( themesflat_get_opt( 'services_show_post_navigator' ) == 1 ): ?>
<!-- Navigation  -->
<div class="container">
	<div class="row">
		<div class="col-lg-12"><?php themesflat_post_navigation(); ?></div>
	</div>			
</div>	
<?php endif; ?>


<!-- Related -->
<?php if ( themesflat_get_opt( 'services_show_related' ) == 1 ) { ?>
	<div class="container">
	<?php
		$grid_columns = themesflat_get_opt( 'services_related_grid_columns' );
		$layout =  'services-grid';

		if ( get_query_var('paged') ) {
		    $paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) {
		    $paged = get_query_var('page');
		} else {
		    $paged = 1;
		}

		$terms = get_the_terms( $post->ID, 'services_category' );
		if ( $terms != '' ){
			$term_ids = wp_list_pluck( $terms, 'term_id' );
			$args = array(
				'post_type' => 'services',
				'posts_per_page'      => -1,
				'tax_query' => array(
					array(
					'taxonomy' => 'services_category',
					'field' => 'term_id',
					'terms' => $term_ids,
					'operator'=> 'IN'
					)),
				'posts_per_page'      => themesflat_get_opt( 'number_related_post_services' ),
				'ignore_sticky_posts' => 1,
				'post__not_in'=> array( $post->ID )
			);

			if ( $layout != '' ) {
			    $class[] = $layout;
			}
			if ( $grid_columns != '' ) {
			    $class[] = 'columns-' . $grid_columns ;
			}

			?>
			<div class="related-services">
			        <div class="themesflat-services-taxonomy">			            
		            	<div class="<?php echo esc_attr( implode( ' ', $class ) ) ?> wrap-services-post row">
				            <?php 
				            $query = new WP_Query($args);
				            if( $query->have_posts() ) {
				                while ( $query->have_posts() ) : $query->the_post(); ?>           
				                    <div class="services-item">

                                        <div class="service-item-inner">
                                            <div class="divider-left"></div>
                                            <div class="box-item">
                                                <span class="<?php echo themesflat_meta('service_icon');?>"></span>
                                                <h6 class="title-box"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a>
                                                </h6>

                                                <div class="content-post"><?php echo get_the_excerpt(); ?></div>

                                                <a href="<?php echo esc_url( get_permalink() ); ?>" class="readmore"><i class="fas fa-chevron-right"></i></a>
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
		<?php } ?>
	</div>	
<?php } ?>

<?php get_footer(); ?>