<?php
/**
 * @package hamela
 */
global $themesflat_thumbnail;
$themesflat_thumbnail = 'themesflat-blog';
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post blog-single' ); ?>>
		<!-- begin feature-post single  -->
		<?php get_template_part( 'tpl/feature-post-single'); ?>
		<!-- end feature-post single-->
		<div class="entry-box-title clearfix">
			<div class="wrap-entry-title">			
				<?php
                printf('<div class="meta-category-list">%s</div>', get_the_category_list(' '));
                ?>
									
			</div><!-- /.wrap-entry-title -->
		</div>		
		<div class="main-post">		
			<div class="entry-content">
				<?php the_content(); ?>
				<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hamela' ),
					'after'  => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>'
					) );
					?>
			</div><!-- .entry-content -->	
			<div class="clearfix"></div>
			<?php

            if( themesflat_get_opt('show_entry_footer_content') == 1 ): ?>
                <footer class="entry-footer clearfix">
                    <?php themesflat_entry_footer(); ?>
                </footer><!-- .entry-footer -->
                <div class="clearfix"></div>
			<?php endif; ?>		
		</div><!-- /.main-post -->
	</article><!-- #post-## -->
	<?php 
	if ( themesflat_get_opt('show_social_share') == 1 ) {
		echo '<div class="wrap-social-share-article">';
			get_template_part('tpl/social-share');
		echo '</div>';
	}
	?>