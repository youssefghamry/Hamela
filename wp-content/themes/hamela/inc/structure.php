<?php
if ( ! function_exists( 'themesflat_body_classes' ) ) {
	add_filter( 'body_class', 'themesflat_body_classes' );

	function themesflat_body_classes( $classes ) {

        global $sidebar_id, $post, $is_IE;

        if (is_active_sidebar($sidebar_id)) {
            $classes[] = 'has-sidebar';
        }

        if (!$is_IE) {
            if (class_exists('Elementor\Plugin')) {
                if (\Elementor\Plugin::$instance->preview->is_preview_mode()) {
                    $classes[] = 'tfl_reviewing';
                } else {
                    $classes[] = 'tfl_not_reviewing';
                }
            }
        }

		$custom_page_class = themesflat_meta('custom_page_class');

		$classes[] = $custom_page_class;

        if (isset($post)) {
            $classes[] = $post->post_type . '-' . $post->post_name;
        }

		/**
		 * Header Sticky
		 */
	    $header_sticky = themesflat_get_opt('header_sticky');		
		if ( $header_sticky == 1 ) {
			$classes[] = 'header_sticky';
		}

        $standard_design = themesflat_get_opt('standard_design');
        if ( $standard_design == 1 ) {
            $classes[] = 'standard_design';
        }

        if ( themesflat_get_opt('enable_preload') == 1 && themesflat_get_opt('preload') == "preload-9" ) {
            $classes[] = 'logo_preloader';
        }

		/**
		 * No Sidebar
		 */
		$sidebar = themesflat_get_opt( 'blog_sidebar_list' );
		switch ($sidebar) {
	        case 'blog-sidebar':
	        	if ( ! is_active_sidebar( 'blog-sidebar' ) ) {
					$classes[] = 'no-sidebar';
				}
	            break;
	        case 'footer-1':
	        	if ( ! is_active_sidebar( 'footer-1' ) ) {
					$classes[] = 'no-sidebar';
				}
	            break;
	        case 'footer-2':
	        	if ( ! is_active_sidebar( 'footer-2' ) ) {
					$classes[] = 'no-sidebar';
				}
	            break;
            case 'footer-3':
	        	if ( ! is_active_sidebar( 'footer-3' ) ) {
					$classes[] = 'no-sidebar';
				}
	            break;
            case 'footer-4':
	        	if ( ! is_active_sidebar( 'footer-4' ) ) {
					$classes[] = 'no-sidebar';
				}
	            break;
	    }		

		/**
		 * Portfolio template
		 */
		if ( is_page_template( 'tpl/portfolio.php' ) ) $classes[] = 'page-portfolio';

		return $classes;
	}
}