/**
* flexslider_img_woo
* quantity_adjust
*/

;(function($) {

    'use strict'

    var flexslider_img_woo = function() { 
        if ($('.themesflat-slider .slides').data('gallery_image_product') === true) {
            $(window).load(function() {
                $('.themesflat-slider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails",
                    nextText: '<i class="fa fa-angle-right" aria-hidden="true"></i>',
                    prevText: '<i class="fa fa-angle-left" aria-hidden="true"></i>'
                });
            });
        } 
         
    };

    var quantity_adjust = function() {        
        $('.plus').on('click', function () {
            $(this).parents('.quantity').find('input[type="number"]').get(0).stepUp();
        });
        $('.minus').on('click', function () {
            $(this).parents('.quantity').find('input[type="number"]').get(0).stepDown();
        });
    }

    var cavas_mini_cart = function() { 
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


// Dom Ready
$(function() {
    flexslider_img_woo(); 
    quantity_adjust();
});
$(window).on('load', function() {
    cavas_mini_cart();
});
})(jQuery);