<?php
if(!function_exists('tfpost_pagination')){
	function tfpost_pagination($query, $paged, $style, $align) {
		if ( $query->max_num_pages < 2 ) return;

		if($style == 'numeric'){
			?>
			<nav class="navigation navigation-numeric" role="navigation">
				<div class="pagination loop-pagination <?php echo esc_attr($align); ?>">
				<?php	
				if (  $query->max_num_pages > 1 ){		  
					echo paginate_links( array(
					'base' => str_replace( $query->max_num_pages, '%#%', esc_url( get_pagenum_link( $query->max_num_pages ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, $paged ),
					'total' => $query->max_num_pages,
					'prev_next' => false
					));
				}
				?>
				</div>
			</nav>
			<?php
		}elseif ($style == 'numeric-link') {
			?>
			<nav class="navigation navigation-numeric-link" role="navigation">
				<div class="pagination loop-pagination <?php echo esc_attr($align); ?>">
				<?php
				if (  $query->max_num_pages > 1 ){
					echo paginate_links( array(
					'base' => str_replace( $query->max_num_pages, '%#%', esc_url( get_pagenum_link( $query->max_num_pages ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, $paged ),
					'total' => $query->max_num_pages,				
					'prev_text' => ( '<i class="fas fa-angle-left"></i>' ),
					'next_text' => ( '<i class="fas fa-angle-right"></i>' ),
					));
				}
				?>
				</div>
			</nav>
			<?php
		}elseif ($style == 'link') {
			?>
			<nav class="navigation navigation-link" role="navigation">
				<div class="pagination loop-pagination clearfix">
				<?php
				if (  $query->max_num_pages > 1 ){
					echo paginate_links( array(
					'base' => str_replace( $query->max_num_pages, '%#%', esc_url( get_pagenum_link( $query->max_num_pages ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, $paged ),
					'total' => $query->max_num_pages,
					'prev_text' => esc_html__( 'Previous', 'themesflat-addons' ),
					'next_text' => esc_html__( 'Next', 'themesflat-addons' ),
					));
				}
				?>
				</div>
			</nav>
			<?php
		}elseif ($style == 'loadmore') {
			if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
			    ?>
			    <nav class="navigation loadmore" role="navigation">
					<div class="pagination loop-pagination <?php echo esc_attr($align); ?>">			
					<a href=" <?php echo esc_url( get_next_posts_page_link() ); ?> "><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496.54 512" width="25" height="25"><title>Asset 1</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path d="M151.23,0c14,4.68,28,9.41,42,14,16.12,5.3,32.28,10.45,48.4,15.75,9.33,3.07,11.1,10.06,4.29,17q-32.62,33.1-65.32,66.17c-3,3.06-6.21,5.09-10.62,3.81-4.24-1.24-5.76-4.65-6.69-8.57-2.09-8.88-4.28-17.74-6.65-27.47-6.57,3.87-12.94,7.11-18.77,11.13-63.3,43.62-95.44,103.77-92.59,180.8A201.87,201.87,0,0,0,205.35,462.34c69.25,14.55,130.56-3.07,183.21-50.45,1.61-1.45,3.12-3,4.72-4.47,9.63-8.76,23.18-8.53,31.82.54s8.35,22.7-.81,31.83a246.4,246.4,0,0,1-48,37.26c-31,18.46-64.5,29.43-100.26,33.72-2.93.35-5.86.82-8.78,1.23h-37c-4.24-.64-8.47-1.39-12.73-1.91-34.61-4.26-67-15.06-96.58-33.58C50,432.11,9.19,368.41,1.19,284.93c-6-62.75,10.88-119.74,48.21-170.46a240.74,240.74,0,0,1,92-75.73c3.54-1.68,4.56-3.41,3.34-7.23C143,26,142.16,20.14,140.4,14.61c-2-6.24-.62-11,4.83-14.61Z"/><path d="M467.93,183c12-.06,22.17,10.26,22.17,22.38A23,23,0,0,1,467.43,228a22.45,22.45,0,0,1-22.28-22.24C445,192.92,454.89,183.07,467.93,183Z"/><path d="M455.29,132.59a22.38,22.38,0,0,1-44.76,0c-.13-12.73,10.33-22.78,23.54-22.61C445.79,110.15,455.35,120.32,455.29,132.59Z"/><path d="M452.25,386A22.08,22.08,0,0,1,430,363.39c.06-12.66,10.22-22.45,23.21-22.36,11.54.07,21.65,10.54,21.66,22.43A22.68,22.68,0,0,1,452.25,386Z"/><path d="M375.53,53.83a22,22,0,0,1,22,22.32,22.38,22.38,0,1,1-44.76-.1A22.38,22.38,0,0,1,375.53,53.83Z"/><path d="M473.5,308.12a21.94,21.94,0,0,1-21.69-22.59,22.83,22.83,0,0,1,23.37-22.36c11.75.23,21.69,11,21.35,23.19C496.19,299,486.24,308.39,473.5,308.12Z"/><path d="M323.44,43.9a22.25,22.25,0,0,1-44.5-.06,22.25,22.25,0,1,1,44.5.06Z"/></g></g></svg><?php echo esc_html__('Load More...', 'themesflat-addons'); ?></a>
					
					</div>
				</nav>
			    <?php
			} else {
				$icon_svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496.54 512" width="25" height="25"><title>Asset 1</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path d="M151.23,0c14,4.68,28,9.41,42,14,16.12,5.3,32.28,10.45,48.4,15.75,9.33,3.07,11.1,10.06,4.29,17q-32.62,33.1-65.32,66.17c-3,3.06-6.21,5.09-10.62,3.81-4.24-1.24-5.76-4.65-6.69-8.57-2.09-8.88-4.28-17.74-6.65-27.47-6.57,3.87-12.94,7.11-18.77,11.13-63.3,43.62-95.44,103.77-92.59,180.8A201.87,201.87,0,0,0,205.35,462.34c69.25,14.55,130.56-3.07,183.21-50.45,1.61-1.45,3.12-3,4.72-4.47,9.63-8.76,23.18-8.53,31.82.54s8.35,22.7-.81,31.83a246.4,246.4,0,0,1-48,37.26c-31,18.46-64.5,29.43-100.26,33.72-2.93.35-5.86.82-8.78,1.23h-37c-4.24-.64-8.47-1.39-12.73-1.91-34.61-4.26-67-15.06-96.58-33.58C50,432.11,9.19,368.41,1.19,284.93c-6-62.75,10.88-119.74,48.21-170.46a240.74,240.74,0,0,1,92-75.73c3.54-1.68,4.56-3.41,3.34-7.23C143,26,142.16,20.14,140.4,14.61c-2-6.24-.62-11,4.83-14.61Z"/><path d="M467.93,183c12-.06,22.17,10.26,22.17,22.38A23,23,0,0,1,467.43,228a22.45,22.45,0,0,1-22.28-22.24C445,192.92,454.89,183.07,467.93,183Z"/><path d="M455.29,132.59a22.38,22.38,0,0,1-44.76,0c-.13-12.73,10.33-22.78,23.54-22.61C445.79,110.15,455.35,120.32,455.29,132.59Z"/><path d="M452.25,386A22.08,22.08,0,0,1,430,363.39c.06-12.66,10.22-22.45,23.21-22.36,11.54.07,21.65,10.54,21.66,22.43A22.68,22.68,0,0,1,452.25,386Z"/><path d="M375.53,53.83a22,22,0,0,1,22,22.32,22.38,22.38,0,1,1-44.76-.1A22.38,22.38,0,0,1,375.53,53.83Z"/><path d="M473.5,308.12a21.94,21.94,0,0,1-21.69-22.59,22.83,22.83,0,0,1,23.37-22.36c11.75.23,21.69,11,21.35,23.19C496.19,299,486.24,308.39,473.5,308.12Z"/><path d="M323.44,43.9a22.25,22.25,0,0,1-44.5-.06,22.25,22.25,0,1,1,44.5.06Z"/></g></g></svg>';
				?>
			    <nav class="navigation loadmore" role="navigation">
					<div class="pagination loop-pagination <?php echo esc_attr($align); ?>">	
				    	<?php echo next_posts_link( $icon_svg . esc_html__( 'Load More...', 'themesflat-addons' ), $query->max_num_pages ); ?>
				    </div>
				</nav>
			    <?php
			}
			
		}
		
	}
}
