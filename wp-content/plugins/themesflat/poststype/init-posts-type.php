<?php 
/* Custom Post Type
===================================*/
if ( ! class_exists( 'themesflat_custom_post_type' ) ) {
    class themesflat_custom_post_type {
        function __construct() {
            
            require_once THEMESFLAT_PATH . '/poststype/register-portfolio.php';
            require_once THEMESFLAT_PATH . '/poststype/register-services.php';
            //require_once THEMESFLAT_PATH . '/poststype/register-gallery.php';           

            add_filter( 'single_template', array( $this,'themesflat_single_portfolio' ) );  
            add_filter( 'taxonomy_template', array( $this,'themesflat_taxonomy_portfolio' ) );

            add_filter( 'single_template', array( $this,'themesflat_single_services' ) );
            add_filter( 'taxonomy_template', array( $this,'themesflat_taxonomy_services' ) );      
        }        

        /* Temlate Portfolio */
        function themesflat_single_portfolio( $single_template ) {
            global $post;
            if ( $post->post_type == 'portfolios' ) $single_template = THEMESFLAT_PATH . '/poststype/inc/single-portfolio.php';
            return $single_template;
        }
        function themesflat_taxonomy_portfolio( $taxonomy_template ) {
            global $post;
            if ( $post->post_type == 'portfolios' ) $taxonomy_template = THEMESFLAT_PATH . '/poststype/inc/taxonomy-portfolios_category.php';
            return $taxonomy_template;
        }

        /* Temlate Services */
        function themesflat_single_services( $single_template ) {
            global $post;
            if ( $post->post_type == 'services' ) $single_template = THEMESFLAT_PATH . '/poststype/inc/single-services.php';
            return $single_template;
        }
        function themesflat_taxonomy_services( $taxonomy_template ) {
            global $post;
            if ( $post->post_type == 'services' ) $taxonomy_template = THEMESFLAT_PATH . '/poststype/inc/taxonomy-services_category.php';
            return $taxonomy_template;
        }

    }
    
}
new themesflat_custom_post_type;


/* Custom Pagination Shortcodes
===================================*/
function themesflat_pagination_shortcodes( $query = '', $echo = true ) {    
    $prev_arrow = 'fa fa-angle-left';
    $next_arrow = 'fa fa-angle-right';
    
    // Get global $query
    if ( ! $query ) {
        global $wp_query;
        $query = $wp_query;
    }

    // Set vars
    $total  = $query->max_num_pages;
    $big    = 999999999;

    // Display pagination
    if ( $total > 1 ) {

        // Get current page
        if ( $current_page = get_query_var( 'paged' ) ) {
            $current_page = $current_page;
        } elseif ( $current_page = get_query_var( 'page' ) ) {
            $current_page = $current_page;
        } else {
            $current_page = 1;
        }

        // Get permalink structure
        if ( get_option( 'permalink_structure' ) ) {
            if ( is_page() ) {
                $format = 'page/%#%/';
            } else {
                $format = '/%#%/';
            }
        } else {
            $format = '&paged=%#%';
        }

        $args = array(
            'base'      => str_replace( $big, '%#%', html_entity_decode( get_pagenum_link( $big ) ) ),
            'format'    => $format,
            'current'   => max( 1, $current_page ),
            'total'     => $total,
            'mid_size'  => 3,
            'prev_text' => '<i class="'. $prev_arrow .'"></i>',
            'next_text' => '<i class="'. $next_arrow .'"></i>',
        );

        // Output pagination
        if ( $echo ) {
            echo paginate_links( $args );
        } else {
            return paginate_links( $args );
        }

    }
}

