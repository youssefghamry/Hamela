<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package hamela
 */


/**
 * Prints HTML with meta information for the current post-date/time, post categories and author.
 */

function themesflat_widget_layout($columns) {
	$layout = array();
	switch ($columns) {
		case 1:
			$layout = array(12);
			break;
		case 2:
			$layout = array(6,6);
			break;
		case 3:
			$layout = array(4,4,4);
			break;
		default:
			$layout = array(12);
			break;
		
	}
	return $layout;
}

if ( ! function_exists( 'themesflat_posted_on' ) ) :
function themesflat_posted_on( $layout = '' ) { 
	?>
	<ul class="meta-left">

		

		<?php if ( $layout == 'blog-grid' ) {
			printf(
				'<li class="post-author"><span class="gravatar">%s</span> %s <span class="author"><a href="%s" title="%s" rel="author">%s</a></span></li>',
				get_avatar( get_the_author_meta( 'user_email' ), 20 ),
				esc_html__('Written by', 'hamela'),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) )),
				esc_attr( sprintf( esc_html__( 'View all posts by %s', 'hamela' ), get_the_author() ) ), get_the_author() );
		} ?>

		<li class="post-date"><?php if ( $layout == '' || $layout == 'blog-list' ): ?><?php endif; ?>
			<?php
			$archive_year  = get_the_time('Y'); 
			$archive_month = get_the_time('m'); 
			$archive_day   = get_the_time('d'); 
			?>
			<a href="<?php echo get_day_link( $archive_year, $archive_month, $archive_day); ?>"><?php echo get_the_date();?></a>			
		</li>

		<?php
			echo'<li class="post-comments">';
				comments_popup_link( esc_html__( '0 Com', 'hamela' ), esc_html__(  '1 Com', 'hamela' ), esc_html__( '% Com', 'hamela' ) );
                if (comments_open()) {
                    echo '<i class="fas fa-comment-alt padding-left-10"></i></li>';
                }
		?>
					
	</ul>
<?php
}
endif;

if ( ! function_exists( 'themesflat_posted_category' ) ) :
function themesflat_posted_category( $layout = '' ) { 

		if ( $layout == '' || $layout == 'blog-list' ) {
			if ( has_category() ) {
				echo '<h5 class="post-categories">'.esc_html__("In - ",'hamela');
					the_category( ', ' );
				echo '</h5>';
			}
		}

	
}
endif;

if ( ! function_exists( 'themesflat_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function themesflat_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', ', ' );
		if ( $tags_list && is_single() ) {
			printf( '<div class="tags-links"><h5>Tags:</h5>' . esc_html__( ' %1$s', 'hamela' ) . '</div>', 
				$tags_list );
		}			
	}
}
endif;

if ( ! function_exists( 'themesflat_post_navigation' ) ) :
function themesflat_post_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation posts-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'hamela' ); ?></h2>
		<ul class="nav-links <?php if (!get_next_post()) {echo esc_attr('no-nextlink');} if(!get_previous_post()){ echo esc_attr('no-prevlink');} ?>">
			<?php
			if ( is_attachment() ) :
				previous_post_link( '<li>%link</li>', sprintf( '<span class="meta-nav">%s</span> %%title', esc_html__( 'Published In', 'hamela' ) ) );
			else :
				previous_post_link( '<li class="previous-post">%link</li>', sprintf( '<span class="meta-nav"><i class="fas fa-angle-double-left"></i> %s</span> %%title', esc_html__( 'Prev Post', 'hamela' ) ) );
				next_post_link( '<li class="next-post">%link</li>', sprintf( '<span class="meta-nav">%s <i class="fas fa-angle-double-right"></i></span> %%title', esc_html__( 'Next Post', 'hamela' ) ) );
			endif;
			?>
		</ul><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;