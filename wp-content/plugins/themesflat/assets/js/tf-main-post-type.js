(function( $ ) {
    "use strict";
   
    
    var iziModal = function(){
        if ($('body').find('div').hasClass('izimodal')) {
            $(".izimodal").iziModal({
                width: 850,
                top: null,
                bottom: null,
                borderBottom: false,
                padding: 0,
                radius: 3,
                zindex: 999999,
                iframe: false,
                iframeHeight: 400,
                iframeURL: null,
                focusInput: false,
                group: '',
                loop: false,
                arrowKeys: true,
                navigateCaption: true,
                navigateArrows: true, // Boolean, 'closeToModal', 'closeScreenEdge'
                history: false,
                restoreDefaultContent: true,
                autoOpen: 0, // Boolean, Number
                bodyOverflow: false,
                fullscreen: false,
                openFullscreen: false,
                closeOnEscape: true,
                closeButton: true,
                appendTo: 'body', // or false
                appendToOverlay: 'body', // or false
                overlay: true,
                overlayClose: true,
                overlayColor: 'rgba(0, 0, 0, .7)',
                timeout: false,
                timeoutProgressbar: false,
                pauseOnHover: false,
                timeoutProgressbarColor: 'rgba(255,255,255,0)',
                transitionIn: 'comingIn',
                transitionOut: 'comingOut',
                transitionInOverlay: 'fadeIn',
                transitionOutOverlay: 'fadeOut',
                onFullscreen: function(){},
                onResize: function(){},
                onOpening: function(){},
                onOpened: function(){},
                onClosing: function(){},
                onClosed: function(){},
                afterRender: function(){}
            });

            $(document).on('click', '.trigger', function (event) {
                event.preventDefault();
                $('.izimodal').iziModal('setZindex', 99999999);
                $('.izimodal').iziModal('open', { zindex: 99999999 });
                $('.izimodal').iziModal('open');
            });
        }
    } 

    var customizable_carousel = function() {
        var owl_carousel = $("div.customizable-carousel");
        if (owl_carousel.length > 0) {
            owl_carousel.each(function() {
                var $this = $(this),
                    $items = ($this.data('items')) ? $this.data('items') : 1,
                    $loop = ($this.attr('data-loop')) ? $this.data('loop') : true,
                    $navdots = ($this.data('nav-dots')) ? $this.data('nav-dots') : false,
                    $navarrows = ($this.data('nav-arrows')) ? $this.data('nav-arrows') : false,
                    $autoplay = ($this.attr('data-autoplay')) ? $this.data('autoplay') : false,
                    $autospeed = ($this.attr('data-autospeed')) ? $this.data('autospeed') : 3500,
                    $smartspeed = ($this.attr('data-smartspeed')) ? $this.data('smartspeed') : 950,
                    $autohgt = ($this.data('autoheight')) ? $this.data('autoheight') : false,
                    $space = ($this.attr('data-space')) ? $this.data('space') : 15;

                $(this).owlCarousel({
                    loop: $loop,
                    items: $items,
                    responsive: {
                        0: {
                            items: ($this.data('xs-items')) ? $this.data('xs-items') : 1,
                            nav: false
                        },
                        600: {
                            items: ($this.data('sm-items')) ? $this.data('sm-items') : 2,
                            nav: false
                        },
                        1000: {
                            items: ($this.data('md-items')) ? $this.data('md-items') : 3
                        },
                        1240:{
                            items: $items
                        }
                    },
                    dots: $navdots,
                    autoplayTimeout: $autospeed,
                    smartSpeed: $smartspeed,
                    autoHeight: $autohgt,
                    margin: $space,
                    nav: $navarrows,
                    navText: ['<i class="fas fa-angle-double-left"></i>','<i class="fas fa-angle-double-right"></i>'],
                    autoplay: $autoplay,
                    autoplayHoverPause: true
                });
            });
        }
    }; 

    var filterPortfolioIsotope = function() { 
        if ( $( '.container-filter' ).hasClass('show-filter') ) {
            if ( $().isotope ) {           
                var $container = $('.container-filter');
                $container.imagesLoaded(function(){
                    $container.isotope({
                        itemSelector: '.item',
                        transitionDuration: '1s'
                    });
                });

                $('.posttype-filter li').on('click',function() {                           
                    var selector = $(this).find("a").attr('data-filter');
                    $('.posttype-filter li').removeClass('active');
                    $(this).addClass('active');
                    $container.isotope({ filter: selector });
                    return false;
                });            
            };
        };        
    };

    var tflLoadCategories = function(){
        $('.tfl_widget_categories .load-more-cats').on('click', function (){
            $(this).closest('.tfl_widget_categories').toggleClass('loaded');
        });
    }

    $(function() {
        tflLoadCategories();
        iziModal();
        customizable_carousel();
        filterPortfolioIsotope();
    })

})(jQuery);