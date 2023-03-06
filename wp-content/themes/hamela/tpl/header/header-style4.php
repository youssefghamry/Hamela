<?php $topbar_content = themesflat_get_opt('topbar_content'); ?>
<div class="themesflat-top">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="container-inside">
               <div class="content-left">
                  <?php echo wp_kses(themesflat_get_opt('topbar_info'), themesflat_kses_allowed_html()); ?>
               </div>
               <div class="content-right">
                    <div>
                        <?php echo wp_kses(themesflat_get_opt('topbar_questions'), themesflat_kses_allowed_html()); ?>
                    </div>
                    <?php if (themesflat_get_opt('topbar_btn_text') != ''): ?>
                      <div class="wrap-btn-topbar">
                         <a class="btn-topbar" href="<?php echo esc_url(themesflat_get_opt('topbar_btn_link')); ?>"><?php echo themesflat_get_opt('topbar_btn_text'); ?></a>
                      </div>
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<header id="header" class="header">
    <?php
    $standard_design = themesflat_get_opt('standard_design');
    if ($standard_design == 1):
        ?>
        <div class="icon-header">
            <img src="<?php echo esc_url(THEMESFLAT_LINK . '/images/header-detail1.svg'); ?>" alt="<?php esc_attr_e('header detail 1', 'hamela'); ?>">
        </div>
        <div class="icon-header2">
            <img src="<?php echo esc_url(THEMESFLAT_LINK . '/images/header-detail2.svg'); ?>" alt="<?php esc_attr_e('header detail 2', 'hamela'); ?>">
        </div>
    <?php endif; ?>

    <div class="inner-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between">
                        <div class="header-wrap">
                            <div class="header-ct-left">
                                <?php get_template_part('tpl/header/brand'); ?>
                            </div>

                            <div class="header-ct-right">
                                <?php get_template_part('tpl/header/navigator'); ?>

                                <div class="show-search">
                                    <a href="#"><i class="hamela-digital-icon-search-1"></i></a> 
                                    <div class="submenu top-search widget_search">
                                        <?php get_search_form(); ?>
                                    </div>        
                                </div>

                                <div class="btn-menu">
                                    <div class="menu-open"><img src="<?php echo esc_url(THEMESFLAT_LINK . '/images/menu.svg'); ?>" alt="<?php esc_attr_e('menu', 'hamela'); ?>"></div>
                                    <div class="menu-close"><img src="<?php echo esc_url(THEMESFLAT_LINK . '/images/menu-close.svg'); ?>" alt="<?php esc_attr_e('close', 'hamela'); ?>"></div>

                                </div>
                            </div>
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
