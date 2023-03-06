<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package hamela
 */
?>
    <!-- Start Footer -->
    <div class="footer_background">
        <?php
        if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' )) :
        ?> 
            <footer id="footer" class="footer <?php (themesflat_meta( 'footer_class' ) != "" ? esc_attr( themesflat_meta( 'footer_class' ) ):'') ;?>">
                <div class="footer-widgets">
                    <div class="container">                
                        <div class="row">
                            <?php                            
                            $footer_widget_areas = themesflat_get_opt('footer_widget_areas');
                            $columns = themesflat_widget_layout($footer_widget_areas); 
                            $key = 0;
                                foreach ($columns as $key => $column) {
                                    $key = $key +1;
                                    ?>
                                <div class="col-lg-<?php themesflat_esc_attr($column);?> col-md-6 widgets-areas">
                                    <div class="wrap-widgets-<?php themesflat_esc_attr($key);?>">
                                    <?php                                         
                                        $widget = themesflat_get_opt("footer".$key);
                                        themesflat_dynamic_sidebar($widget);
                                    ?>
                                    </div>
                                </div>
                            <?php } ?>        
                        </div><!-- /.row -->                  
                    </div><!-- /.container --> 
                </div><!-- /.footer-widgets -->
            </footer>
        <?php endif; ?>

        <div id="copyright" class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <?php
                    $copyright = themesflat_get_opt('footer_copyright');
                    echo wp_kses($copyright, themesflat_kses_allowed_html());
                    ?>
                </div>
            </div>
        </div>
        <!-- Bottom -->
    </div> <!-- Footer Background Image -->
    <!-- End Footer -->
    <?php if ( themesflat_get_opt( 'go_top') == 1 ) : ?>
        <!-- Go Top -->
        <a class="go-top">
            <i class="fas fa-level-up-alt"></i>
        </a>
    <?php endif; ?>

    </div>
</div><!-- /#boxed -->

<?php wp_footer(); ?>
</body>
</html>