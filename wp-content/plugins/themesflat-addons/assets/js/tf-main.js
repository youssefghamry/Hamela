;(function($) {

    "use strict";    

    var responsive_menu = function() {
        
        $('.tf-nav-menu').each(function(){
            var $this = $(this).data('id_random'),
            $tf_nav_menu = $('.'+$this),
            $btn_menu_mobile = $('.'+$this).find('.btn-menu-mobile'),
            $close_menu_panel_style_default = $('.'+$this).find('.close-menu-panel-style-default'),
            $btn_menu_only = $('.'+$this).find('.btn-menu-only'),
            $mobile_menu_overlay = $('.'+$this).find('.mobile-menu-overlay');

            $('.'+$this).find('.btn-submenu').remove();
            var hasChildMenu = $tf_nav_menu.find('.mainnav-mobi').find('li:has(ul)');
            hasChildMenu.children('ul').hide();                                    
            hasChildMenu.children('a').after('<span class="btn-submenu"><i class="fa fa-angle-down" aria-hidden="true"></i></span>');

            var menuType = 'desktop';
            $(window).on('load resize', function() {
                var currMenuType = 'desktop';

                if ( matchMedia( 'only screen and (max-width: 991px)' ).matches ) {                
                    currMenuType = 'mobile';
                }

                if ( currMenuType !== menuType ) {
                    menuType = currMenuType;
                } else {                             
                    $('.'+$this).find('.mobile-menu-overlay').removeClass('active');
                    $('.'+$this).find('.nav-panel').removeClass('active');      
                }

            });

            $(document).on('click', '.mainnav-mobi li .btn-submenu', function(e) {
                $(this).toggleClass('active').next('ul').slideToggle(300);
                e.stopImmediatePropagation();
                e.preventDefault();
            }); 

            //Open Nav
            $($btn_menu_mobile).on('click', function() {                
                $(this).addClass('active');
                $(this).siblings().addClass('active');
            });             

            //Close Nav
            $($close_menu_panel_style_default).on('click', function() {             
                $(this).closest('.nav-panel').removeClass('active');             
                $(this).closest('.nav-panel').siblings().removeClass('active');           
            });

            $($mobile_menu_overlay).on('click', function() {             
                $(this).siblings().removeClass('active');            
                $(this).removeClass('active');            
            }); 

            $($btn_menu_only).on('click', function() { 
                $(this).siblings().addClass('active');
            });


            
        });        
                         
    }

    var logo_svg = function() {
        // Elements to inject
        var mySVGsToInject = document.querySelectorAll('img.logo_svg');

        // Trigger the injection
        SVGInjector(mySVGsToInject, {
            pngFallback: 'assets/png'
        });
    }

    var search_form = function(){
        $('.tf-widget-search').each(function(){
            $(this).find('.tf-icon-search').on('click' , function(){
                $(this).siblings('.tf-modal-search-panel').addClass('show');
            });
        });
        $(document).on('click', '.tf-widget-search .tf-modal-search-panel', function() {
            $(this).removeClass('show');
        });
        $(document).on('click', '.tf-widget-search .tf-search-form', function(e) {
            e.stopImmediatePropagation();
        });
    };

    var onepage_nav = function () {
        $('.tf-nav-menu.has-one-page .mainnav > ul > li > a').on('click',function(e) {

            var anchor = $(this).attr('href').split('#')[1];            
            var largeScreen = matchMedia('only screen and (min-width: 992px)').matches;
            var headerHeight = 0;
            headerHeight = $('.header').height();        
            if ( anchor ) {
                if ( $('#'+anchor).length > 0 ) {
                   if ( $('.header-shadow').length > 0 ) {
                        headerHeight = headerHeight;
                   } else {
                        headerHeight = 0;
                   }                   
                   var target = $('#'+anchor).offset().top - headerHeight;
                   $('html,body').animate({scrollTop: target}, 1000, 'easeInOutExpo');
                }
            }

            e.preventDefault();

        });
    } 

    var carousel_Box = function() {

        if ( $().owlCarousel ) {

            $('.tf-carousel-box').each(function(){

                var
                $this = $(this),
                item = $this.data("column"),
                item2 = $this.data("column2"),
                item3 = $this.data("column3"),
                spacer = Number($this.data("spacer")),
                prev_icon = $this.data("prev_icon"),
                next_icon = $this.data("next_icon");

                var loop = false;
                if ($this.data("loop") == 'yes') {
                    loop = true;
                }

                var arrow = false;
                if ($this.data("arrow") == 'yes') {
                    arrow = true;
                } 

                var auto = false;
                if ($this.data("auto") == 'yes') {
                    auto = true;
                }                

                $this.find('.owl-carousel').owlCarousel({
                    loop: loop,
                    margin: spacer,
                    nav: true,
                    pagination: true,
                    autoplay: auto,
                    autoplayTimeout: 5000,
                    smartSpeed: 850,
                    autoplayHoverPause: true,
                    navText : ["<i class=\""+prev_icon+"\"></i>","<i class=\""+next_icon+"\"></i>"],
                    responsive: {
                        0:{
                            items:item3
                        },
                        768:{
                            items:item2
                        },
                        1000:{
                            items:item
                        }
                    }
                });
            });
        }
    }

    var blogPostsOwl = function() {
        if ( $().owlCarousel ) {
            $('.tf-posts-wrap.has-carousel').each(function(){
                var
                $this = $(this),
                item = $this.data("column"),
                item2 = $this.data("column2"),
                item3 = $this.data("column3"),
                spacer = Number($this.data("spacer")),
                prev_icon = $this.data("prev_icon"),
                next_icon = $this.data("next_icon");

                var loop = false;
                if ($this.data("loop") == 'yes') {
                    loop = true;
                }

                var arrow = false;
                if ($this.data("arrow") == 'yes') {
                    arrow = true;
                } 

                var auto = false;
                if ($this.data("auto") == 'yes') {
                    auto = true;
                }                

                $this.find('.owl-carousel').owlCarousel({
                    loop: loop,
                    margin: spacer,
                    nav: true,
                    pagination: false,
                    autoplay: auto,
                    autoplayTimeout: 5000,
                    autoplayHoverPause: true,
                    animateIn: 'fadeIn',
                    animateOut: 'fadeOut',
                    navText : ["<i class=\""+prev_icon+"\"></i>","<i class=\""+next_icon+"\"></i>"],
                    responsive: {
                        0:{
                            items:item3
                        },
                        768:{
                            items:item2
                        },
                        1000:{
                            items:item
                        }
                    }
                });

            });
        }
    }

    var blogLoadMore = function() {

        var $container_wrap = $('.tf-posts-wrap'); 
        var $container = $('.tf-posts-wrap').find('.tf-posts');  

        $('.navigation.loadmore a').on('click', function(e) {
            e.preventDefault(); 

            $container.after('<div class="tfpost-loading"><span></span></div>');

            $.ajax({
                type: "GET",
                url: $(this).attr('href'),
                dataType: "html",
                success: function( out ) {
                    var result = $(out).find('.column');  
                    var nextlink = $(out).find('.navigation.loadmore a').attr('href');

                    result.css({ opacity: 0 , visibility: 'hidden' });
                    if ($container.hasClass('masonry')) {
                        $container.append(result).imagesLoaded(function () {
                            result.css({ opacity: 1 , visibility: 'visible' });
                            $container.isotope('appended', result);
                        });
                    }
                    else {
                        $container.append(result).imagesLoaded(function () {
                            result.css({ opacity: 1 , visibility: 'visible' });
                            $container.isotope('appended', result);
                        });                         
                    }

                    if ( nextlink != undefined ) {
                        $('.navigation.loadmore a').attr('href', nextlink);
                        $container_wrap.find('.tfpost-loading').remove();
                    } else {
                        $container_wrap.find('.tfpost-loading').addClass('no-ajax').text('All posts loaded').delay(2000).queue(function() {$(this).remove();});
                        $('.navigation.loadmore a').remove();
                    }
                }
            });
        });
             
    }

    var blogMasonry = function() {
        $('.tf-posts-wrap .tf-posts').each(function(){
            var $this = $(this);
            if ($this.hasClass('masonry')) {
                var $grid = $this.isotope({
                    itemSelector: '.column',
                    percentPosition: true,
                    masonry: {
                    columnWidth: '.grid-sizer'
                    }
                });
                
                $grid.imagesLoaded().progress( function() {
                    $grid.isotope('layout');
                });
            } 
        });            
    } 

    var tf_accordion = function() {
        $('.tf-accordion').each(function () {
            var speed = {duration: 400};            
            $(this).find('.accordion-content').hide();
            $(this).find('.accordion-item .accordion-title.active').siblings('.accordion-content').show();
            $(this).find('.accordion-item .accordion-title').on('click', function() { 
                
                $(this).closest('.tf-accordion').find('.accordion-item .accordion-title').removeClass('active');
                $(this).addClass('active');
                $(this).closest('.tf-accordion').find('.accordion-item').removeClass('active');
                $(this).closest('.accordion-item').addClass('active');
                $(this).next().slideDown();
                if ($(this).is('.active')) {

                    $(this).closest('.tf-accordion').find(".accordion-content").not($(this).next()).slideUp(speed);
                }
            });
        });         
    }

    var animated_headline = function() {
        var highlightedWave = $('.tf-highlighted-wave'),
            highlightedDrop = $('.tf-highlighted-drop-in'),
            highlightedSlide = $('.tf-highlighted-slide');

        if ( highlightedWave.length ) {
            highlightedWave.each(function (index ,item) {
                item.innerHTML = $(this).text().replace(/\S/g, "<span class='letter'>$&</span>");
            });

            anime.timeline({loop: true})
                .add({
                    targets: '.tf-highlighted-wave .letter',
                    scale: [4,1],
                    opacity: [0,1],
                    translateZ: 0,
                    easing: "easeOutExpo",
                    duration: 950,
                    delay: (el, i) => 70*i
                }).add({
                targets: '.tf-highlighted-wave',
                opacity: 0,
                duration: 1000,
                easing: "easeOutExpo",
                delay: 1000
            });
        }

        if(highlightedDrop.length){
            highlightedDrop.each(function (index ,item) {
                item.innerHTML = $(this).text().replace(/\S/g, "<span class='letter'>$&</span>");
            });

            anime.timeline({loop: true})
                .add({
                    targets: '.tf-highlighted-drop-in .letter',
                    scale: [0, 1],
                    duration: 1500,
                    elasticity: 600,
                    delay: (el, i) => 45 * (i+1)
                }).add({
                targets: '.tf-highlighted-drop-in',
                opacity: 0,
                duration: 1000,
                easing: "easeOutExpo",
                delay: 1000
            });
        }

        if(highlightedDrop.length){
            highlightedDrop.each(function (index ,item) {
                item.innerHTML = $(this).text().replace(/\S/g, "<span class='letter'>$&</span>");
            });

            anime.timeline({loop: true})
                .add({
                    targets: '.tf-highlighted-drop-in .letter',
                    scale: [0, 1],
                    duration: 1500,
                    elasticity: 600,
                    delay: (el, i) => 45 * (i+1)
                }).add({
                targets: '.tf-highlighted-drop-in',
                opacity: 0,
                duration: 1000,
                easing: "easeOutExpo",
                delay: 1000
            });
        }

        if(highlightedSlide.length){
            highlightedSlide.each(function (index ,item) {
                item.innerHTML = $(this).text().replace(/\S/g, "<span class='letter'>$&</span>");
            });

            anime.timeline({loop: true})
                .add({
                    targets: '.tf-highlighted-slide .letter',
                    translateX: [40,0],
                    translateZ: 0,
                    opacity: [0,1],
                    easing: "easeOutExpo",
                    duration: 1200,
                    delay: (el, i) => 500 + 30 * i
                }).add({
                targets: '.tf-highlighted-slide .letter',
                translateX: [0,-30],
                opacity: [1,0],
                easing: "easeInExpo",
                duration: 1100,
                delay: (el, i) => 100 + 30 * i
            });
        }

    }

    var tfcounter = function() {        
        $(window).scroll(function() {
            var oTop = $('.counter').offset().top - window.innerHeight;
            if ($(window).scrollTop() > oTop) {
                var odo = $(".odometer");
                odo.each(function() {
                    var countNumber = $(this).data("count");
                    $(this).html(countNumber);                                    
                });
            }            
        });
    }

    var tftabs = function() {   
     
        $('.tf-tabs').each( function() {
            
            $(this).find('.tf-tabnav ul > li').filter(':first').addClass('active').removeClass('inactive');
            $(this).find('.tf-tabcontent').children().filter(':first').addClass('active');

            
            if ( $(this).find('.tf-tabnav ul > li').hasClass('set-active-tab') ) {
                $(this).find('.tf-tabnav ul > li').siblings().removeClass('active');                
            }
            if ( $(this).find('.tf-tabcontent').children().hasClass('set-active-tab') ) {
                $(this).find('.tf-tabcontent').children().siblings().removeClass('active');
            }

            $(this).find('.tf-tabnav ul > li').on('click', function(){
                var tab_id = $(this).attr('data-tab');

                $(this).siblings().removeClass('active').removeClass('set-active-tab').addClass('inactive');
                $(this).closest('.tf-tabs').find('.tf-tabcontent').children().removeClass('active').removeClass('set-active-tab').addClass('inactive');

                $(this).addClass('active').removeClass('inactive');
                $(this).closest('.tf-tabs').find('.tf-tabcontent').children('#'+tab_id).addClass('active').removeClass('inactive');
            });
        });
    }

    var blogFilterIsotope = function() { 
        $(window).on('load resize', function() {
            $('.tf-posts-wrap').each(function(){
                if ( $(this).hasClass('show_filter_portfolio') ) {
                    if ( $().isotope ) {           
                        var $container = $(this).find('.tf-posts');
                        $container.imagesLoaded(function(){
                            $container.isotope({
                                itemSelector: '.column',
                                transitionDuration: '1s'
                            });
                        });
                        $(this).find('.post-filter li').on('click',function() {                           
                            var selector = $(this).find("a").attr('data-filter');
                            $('.post-filter li').removeClass('active');
                            $(this).addClass('active');
                            $container.isotope({ filter: selector });
                            return false;
                        });            
                    };
                };  
            });
        });         
    };

    var TF_Sticky = function() { 
        $(window).on('load resize', function() {
            if ( matchMedia( 'only screen and (min-width: 992px)' ).matches ) {   
                $('section').each(function() { 
                    var section =  $(this),
                        section_id =  section.data('id'),
                        wpadminbar = $('#wpadminbar').height();
                    if (section.hasClass('tf-sticky-yes')) {
                        var element_class_sticky = '.elementor-element-'+section_id;
                        var tfsticky = $(element_class_sticky),
                            offset = tfsticky.offset(),
                            tfsticky_offset_top = offset.top;  
                        var hd_height = $('section.tf-sticky-yes').outerHeight(),                                         
                            injectSpace = $('<div />', { height: hd_height }).insertAfter($('section.tf-sticky-yes'));  
                            injectSpace.hide();
                        $(window).on('scroll', function() { 
                            if ( $(window).scrollTop() >= tfsticky_offset_top + hd_height ) { 
                                tfsticky.addClass('tf-element-sticky');
                                injectSpace.show();
                            } else {  
                                tfsticky.removeClass('tf-element-sticky');
                                injectSpace.hide();
                            } 
                        }) 
                    }
                });
            }
        })             
    } 

    var tfpiechart = function() {
        if ($('.tf-pie-chart .chart').length > 0) {
            var $pieChart = $('.tf-pie-chart .chart');
            $pieChart.each(function () {
            var $elem = $(this),
                  pieChartSize = $elem.attr('data-size') || "120",
                  pieChartAnimate = $elem.attr('data-animate') || "2100",
                  pieChartWidth = $elem.attr('data-width') || "6",
                  pieChartColor = $elem.attr('data-color') || "#2e52c2",
                  pieChartTrackColor = $elem.attr('data-trackcolor') || "rgba(0,0,0,0.1)";
            $elem.find('span, i').css({
                  'width': pieChartSize + 'px',
                  'height': pieChartSize + 'px',
                  'line-height': pieChartSize + 'px'
            });
            $elem.appear(function () {
                $elem.easyPieChart({
                      size: Number(pieChartSize),
                      animate: Number(pieChartAnimate),
                      trackColor: pieChartTrackColor,
                      lineWidth: Number(pieChartWidth),
                      barColor: pieChartColor,
                      scaleColor: false,
                      lineCap: 'round',
                      onStep: function (from, to, percent) {
                          $elem.find('span.percent').text(Math.round(percent));
                      }
                    });
                });
            });
        };
    };

    var widget_cavas_mini_cart = function() { 
        $('#mini-cart-click, #mini-cart-click a, .products .ajax_add_to_cart').on('click', function(e){            
            $('#canvas-mini-cart').addClass('canvas-cart-open');
            $('.mini-cart .overlay-mini-cart').addClass('canvas-overlay-open');
            e.preventDefault();       
        });

        $('.mini-cart .overlay-mini-cart, #canvas-mini-cart .cart-close').on('click', function(e){            
            $('#canvas-mini-cart').removeClass('canvas-cart-open');
            $('.mini-cart .overlay-mini-cart').removeClass('canvas-overlay-open');
            e.preventDefault();
        });
    }

    var testimonial_Carousel = function() {
        if ( $().owlCarousel ) {
            $('.tf-testimonial-carousel').each(function(){
                var
                    $this = $(this),
                    item = $this.data("column"),
                    item2 = $this.data("column2"),
                    item3 = $this.data("column3"),
                    spacer = Number($this.data("spacer")),
                    prev_icon = $this.data("prev_icon"),
                    next_icon = $this.data("next_icon");

                var loop = false;
                if ($this.data("loop") == 'yes') {
                    loop = true;
                }

                var arrow = false;
                if ($this.data("arrow") == 'yes') {
                    arrow = true;
                }

                var bullets = false;
                if ($this.data("bullets") == 'yes') {
                    bullets = true;
                }

                var auto = false;
                if ($this.data("auto") == 'yes') {
                    auto = true;
                }

                $this.find('.owl-carousel').owlCarousel({
                    loop: loop,
                    margin: spacer,
                    nav: arrow,
                    dots: bullets,
                    autoplay: auto,
                    autoplayTimeout: 5000,
                    smartSpeed: 850,
                    autoplayHoverPause: true,
                    navText : ["<i class=\""+prev_icon+"\"></i>","<i class=\""+next_icon+"\"></i>"],
                    responsive: {
                        0:{
                            items:item3
                        },
                        768:{
                            items:item2
                        },
                        1000:{
                            items:item
                        }
                    }
                });
            });
        }
    }

    var portfolioFilterIsotope = function() { 
        $(window).on('load resize', function() {
            $('.tfl-portfolios-grid').each(function(){
                if ( $(this).hasClass('show_filter_portfolio') ) {
                    if ( $().isotope ) {           
                        var $container = $(this).find('.portfolio-items');
                        $container.find('.portfolio-item').removeClass('animated');
                        $container.imagesLoaded(function(){
                            $container.isotope({
                                itemSelector: '.portfolio-item',
                                transitionDuration: '1s'
                            });
                        });
                        $(this).find('.portfolio-filter li').on('click',function() {                           
                            var selector = $(this).find("a").attr('data-filter');
                            $('.portfolio-filter li').removeClass('active');
                            $(this).addClass('active');
                            $container.isotope({ filter: selector });
                            return false;
                        });            
                    };
                };  
            });
        });         
    };

    $(window).on('elementor/frontend/init', function(){
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tf-nav-menu.default', responsive_menu );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tf-nav-menu.default', onepage_nav );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tf-nav-menu.default', logo_svg );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tf-search.default', logo_svg );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tf-search.default', search_form );
        // elementorFrontend.hooks.addAction( 'frontend/element_ready/tfcarousel.default', carousel_Box );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tfposts.default', blogPostsOwl );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tfposts.default', blogLoadMore );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tfposts.default', blogMasonry );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tfposts.default', blogFilterIsotope );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tfaccordion.default', tf_accordion );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tfanimated_headline.default', animated_headline );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tfcounter.default', tfcounter );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tftabs.default', tftabs );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tfpiechart.default', tfpiechart );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tf-mini-cart.default', widget_cavas_mini_cart );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tf-testimonial-carousel.default', testimonial_Carousel );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tfl-portfolio-grid.default', portfolioFilterIsotope );
    });

    $(function() {    
        TF_Sticky();
        carousel_Box();
    });

})(jQuery);
