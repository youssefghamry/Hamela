<div class="nav-wrap">
    <nav id="mainnav" class="mainnav" role="navigation">
        <?php
        $args = array(
            'theme_location' => 'primary',
            'fallback_cb' => 'themesflat_menu_fallback',
            'container' => false
        );

        $menu_opt_elementor = themesflat_get_opt_elementor('nav_menu');
        if ($menu_opt_elementor != 'default') {
            $args['menu'] = $menu_opt_elementor;
        }
        wp_nav_menu($args);
        ?>
    </nav><!-- #site-navigation -->
</div><!-- /.nav-wrap -->   