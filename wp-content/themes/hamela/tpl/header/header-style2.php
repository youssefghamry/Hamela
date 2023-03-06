<?php $topbar_content = themesflat_get_opt('topbar_content'); ?>

<header id="header" class="header">
    <?php
    $standard_design = themesflat_get_opt('standard_design');
    if ($standard_design == 1):
        ?>
        <div class="icon-header">
            <img src="<?php echo esc_url(THEMESFLAT_LINK.'/images/header-detail1.svg'); ?>" alt="<?php esc_attr_e('header detail 1', 'hamela'); ?>">
        </div>
        <div class="icon-header2">
            <img src="<?php echo esc_url(THEMESFLAT_LINK.'/images/header-detail2.svg'); ?>" alt="<?php esc_attr_e('header detail 2', 'hamela'); ?>">
        </div>
    <?php endif; ?>

    <div class="inner-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between">
                        <div class="header-wrap">
                            <div class="header-ct-left">
                                <?php get_template_part('tpl/header/brand'); ?>
                            </div>

                            <div class="header-ct-right">
                                <?php get_template_part('tpl/header/navigator'); ?>
                                <div class="btn-menu">

                                    <div class="menu-open"><img src="<?php echo esc_url(THEMESFLAT_LINK.'/images/menu.svg'); ?>" alt="<?php esc_attr_e('menu', 'hamela'); ?>"></div>
                                    <div class="menu-close"><img src="<?php echo esc_url(THEMESFLAT_LINK.'/images/menu-close.svg'); ?>" alt="<?php esc_attr_e('close', 'hamela'); ?>"></div>

                                </div>
                            </div>


                        </div>
                        <div class="topbar-content">
                            <?php
                            $topbar = themesflat_get_opt('topbar_show');
                            if ($topbar == 1) echo wp_kses($topbar_content, themesflat_kses_allowed_html());
                            ?>
                        </div>
                    </div>
                </div>


            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>

    <div class="canvas-nav-wrap">
        <div class="overlay-canvas-nav">
            <div class="canvas-menu-close"><span></span></div>
        </div>
        <div class="inner-canvas-nav">
            <?php get_template_part('tpl/header/brand-mobile'); ?>
            <nav id="mainnav_canvas" class="mainnav_canvas" role="navigation">
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
            </nav><!-- #mainnav_canvas -->
            <?php
            $topbar = themesflat_get_opt('topbar_show');
            if ($topbar == 1) echo wp_kses($topbar_content, themesflat_kses_allowed_html());
            ?>
        </div>
    </div><!-- /.canvas-nav-wrap -->

</header><!-- /.header -->
