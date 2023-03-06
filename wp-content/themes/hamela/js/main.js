/**
 * isMobile
 * headerFixed
 * responsiveMenu
 * themesflatSearch
 * detectViewport
 * blogLoadMore
 * commingsoon
 * goTop
 * retinaLogos
 * customizable_carousel
 * parallax
 * iziModal
 * bg_particles
 * pagetitleVideo
 * toggleExtramenu
 * removePreloader
 */

;(function ($) {

    "use strict";

    var isMobile = {
        Android: function () {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function () {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function () {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function () {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function () {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function () {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };

    var responsiveMenu = function () {
        var menuType = 'desktop';

        $(window).on('load resize', function () {
            var currMenuType = 'desktop';
            var adminbar = $('#wpadminbar').height();

            if (matchMedia('only screen and (max-width: 1199px)').matches) {
                currMenuType = 'mobile';
            }

            if (currMenuType !== menuType) {
                menuType = currMenuType;

                if (currMenuType === 'mobile') {
                    var $mobileMenu = $('#mainnav').hide();
                    var hasChildMenu = $('#mainnav_canvas').find('li:has(ul)');
                    hasChildMenu.children('ul').hide();
                    if (hasChildMenu.find(">span").length == 0) {
                        hasChildMenu.children('a').after('<span class="btn-submenu"><i class="fas fa-plus"></i></span>');
                    }
                    $('.btn-menu').removeClass('active');
                    $('.canvas-nav-wrap .inner-canvas-nav').css({'padding-top': adminbar});
                    $('.canvas-nav-wrap .canvas-menu-close').css({'top': (adminbar + 30)});
                } else {
                    var $mobileMenu = $('#mainnav').show();
                    $('.canvas-nav-wrap .inner-canvas-nav').css({'padding-top': adminbar});
                    $('.canvas-nav-wrap .canvas-menu-close').css({'top': (adminbar + 30)});
                    $('#header').find('.canvas-nav-wrap').removeClass('active');
                }
            }

        });


        $('.btn-menu').on('click', function () {
            $('body').toggleClass('menu-opened');
        });

        $('.canvas-nav-wrap .overlay-canvas-nav').on('click', function (e) {
            $('body').removeClass('menu-opened');
        });

        $(document).on('click', '#mainnav_canvas li .btn-submenu', function (e) {
            $(this).toggleClass('active').next('ul').slideToggle();
            e.stopImmediatePropagation();
        });

    };

    var headerFixed = function () {
        if ($('body').hasClass('header_sticky')) {
            var header = $('.themesflat_header_wrap'),
                hd_height = $('.themesflat_header_wrap').height(),
                injectSpace = $('<div />', {height: hd_height}).insertAfter($('.themesflat_header_wrap'));
            injectSpace.hide();
            $(window).on('load scroll resize', function () {

                var top_height = $('.themesflat-top').height();
                if (typeof top_height == 'undefined') top_height = 0;
                if ($(window).scrollTop() >= top_height + hd_height) {
                    header.addClass('header-sticky');
                    injectSpace.show();
                } else {
                    $('.header-sticky').removeAttr('style');
                    header.removeClass('header-sticky');
                    injectSpace.hide();
                }
            })
        }
    }

    var themesflatSearch = function () {
        $(document).on('click', function (e) {
            var clickID = e.target.id;
            if ((clickID != 's')) {
                $('.top-search').removeClass('show');
                $('.show-search').removeClass('active');
            }
        });

        $('.show-search').on('click', function (event) {
            event.stopPropagation();
        });

        $('.search-form').on('click', function (event) {
            event.stopPropagation();
        });

        $('.show-search').on('click', function (e) {
            if (!$(this).hasClass("active"))
                $(this).addClass('active');
            else
                $(this).removeClass('active');
            e.preventDefault();

            if (!$('.top-search').hasClass("show"))
                $('.top-search').addClass('show');
            else
                $('.top-search').removeClass('show');
        });
    };

    var parallax = function () {
        if ($().parallax && isMobile.any() == null) {
            $('.parallax').parallax("50%", -0.5);
        }
    };

    var pagetitleVideo = function () {
        if ($('.page-title').hasClass('video')) {
            jQuery(function () {
                jQuery("#ptbgVideo").YTPlayer();
            });
        }
    };

    var blogLoadMore = function () {
        var $container = $('.wrap-blog-article'),
            $container_faq = $('.wrap-faq');
        if ($('body').hasClass('page-template')) {
            var $container = $('.wrap-blog-article');
        }

        $('.navigation.loadmore a').on('click', function (e) {
            e.preventDefault();
            var $item = '.wrap-blog-article .item';
            if ($(this).parents('nav').hasClass("faq")) {
                $container = $container_faq;
                $item = '.wrap-blog-article .item';
            }

            $('<span/>', {
                class: 'infscr-loading',
                text: 'Loading...',
            }).appendTo($container);

            $.ajax({
                type: "GET",
                url: $(this).attr('href'),
                dataType: "html",
                success: function (out) {
                    var result = $(out).find($item);

                    console.log(result);

                    var nextlink = $(out).find('.navigation.loadmore a').attr('href');

                    result.css({opacity: 0});
                    if ($container.hasClass('blog-masonry')) {
                        $container.append(result).imagesLoaded(function () {
                            result.css({opacity: 1});
                            $container.masonry('appended', result);
                        });
                    } else {
                        result.css({opacity: 1});
                        $container.append(result);
                    }

                    if (nextlink != undefined) {
                        $('.navigation.loadmore a').attr('href', nextlink);
                        $container.find('.infscr-loading').fadeOut();
                    } else {
                        $container.find('.infscr-loading').addClass('no-ajax').text('All posts loaded.').fadeOut(2000);
                        $('.navigation.loadmore a').remove();
                    }
                }
            })
        })
    }

    var goTop = function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 500) {
                $('.go-top').addClass('show');
            } else {
                $('.go-top').removeClass('show');
            }
        });

        $('.go-top').on('click', function (event) {
            event.preventDefault();
            $("html, body").animate({scrollTop: 0}, 1000);
        });
    };

    var customizable_carousel_div = function () {
        var owl_carousel = $("div.customizable-carousel");
        if (owl_carousel.length > 0) {
            owl_carousel.each(function () {
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
                        1240: {
                            items: $items
                        }
                    },
                    dots: $navdots,
                    autoplayTimeout: $autospeed,
                    smartSpeed: $smartspeed,
                    autoHeight: $autohgt,
                    margin: $space,
                    nav: $navarrows,
                    navText: ['<i class="fa fa-angle-double-left"></i>', '<i class="fa fa-angle-double-right"></i>'],
                    autoplay: $autoplay,
                    autoplayHoverPause: true
                });
            });
        }
    };

    var tfl_animation_fadeup = function (container, item) {
        $(window).on("load", function () {
            console.log('load');
            $(window).scroll(function () {
                var windowBottom = $(this).scrollTop() + $(this).innerHeight();
                $(container).each(function (index, value) {
                    /* Check the location of each desired element */
                    var objectBottom = $(this).offset().top + $(this).outerHeight() * 0.1;

                    /* If the element is completely within bounds of the window, fade it in */
                    if (objectBottom < windowBottom) { //object comes into view (scrolling down)
                        var seat = $(this).find(item);
                        for (var i = 0; i < seat.length; i++) {
                            (function (index) {
                                setTimeout(function () {
                                    seat.eq(index).addClass('animated');
                                }, 100 * index);
                            })(i);
                        }
                    }
                });
            }).scroll(); //invoke scroll-handler on page-load
        });
    };

    var tfl_animation_classes = function () {
        tfl_animation_fadeup("section.elementor-section > .elementor-container", '.elementor-column');
        tfl_animation_fadeup(".service-grid", '.services-item');
        tfl_animation_fadeup(".portfolio-items", '.portfolio-item');
    };

    var tfl_svgConvert = function () {
        /*
        * Replace all SVG images with inline SVG
        */
        jQuery('img').each(function () {
            var $img = jQuery(this);
            var imgID = $img.attr('id');
            var imgClass = $img.attr('class');
            var imgURL = $img.attr('src');

            jQuery.get(imgURL, function (data) {
                // Get the SVG tag, ignore the rest
                var $svg = jQuery(data).find('svg');

                // Add replaced image's ID to the new SVG
                if (typeof imgID !== 'undefined') {
                    $svg = $svg.attr('id', imgID);
                }
                // Add replaced image's classes to the new SVG
                if (typeof imgClass !== 'undefined') {
                    $svg = $svg.attr('class', imgClass + ' replaced-svg');
                }

                // Remove any invalid XML tags as per http://validator.w3.org
                $svg = $svg.removeAttr('xmlns:a');

                // Replace image with new SVG
                $img.replaceWith($svg);

            }, 'xml');

        });

    };

    var removePreloader = function () {
        $("#preloader").fadeOut('slow', function () {
            setTimeout(function () {
                $("#preloader").remove();
            }, 1000);
        });

        tfl_animation_fadeup(".elementor-section-wrap > section.elementor-section > .elementor-container", '.elementor-column');
    };

    var tfl_niceSelect = function () {
        $('select:not(#billing_country):not(.country_select):not(#billing_state)').niceSelect();

    }

    /* Logo Preload*/
    if ($('body').hasClass('logo_preloader')) {
        var JQ = jQuery;
        window.requestAnimFrame = function() {
            return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || function(a) {
                window.setTimeout(a, 1E3 / 60)
            }
        }();
        window.transitionEnd = function(a, c) {
            var b = !1,
                d = document.createElement("div");
            JQ(["transition", "WebkitTransition", "MozTransition", "msTransition"]).each(function(a, c) {
                if (void 0 !== d.style[c]) return b = !0, !1
            });
            b ? a.bind("webkitTransitionEnd oTransitionEnd MSTransitionEnd transitionend", function(b) {
                a.unbind("webkitTransitionEnd oTransitionEnd MSTransitionEnd transitionend");
                c(b, a)
            }) : setTimeout(function() {
                c(null, a)
            }, 0);
            return a
        };

        var TF_Preloader = {
            _overlay: null,
            _loader: null,
            _name: null,
            _percentage: null,
            _on_complete: null,
            _text_loader: null,
            _text_loader_overlay: null,
            _logo_loader: null,
            _logo_loader_meter: null,
            _total: 0,
            _loaded: 0,
            _image_queue: [],
            _percentage_loaded: 0,
            _mode: "number",
            _text: "loading...",
            _text_colour: "#FFFFFF",
            _images: [],
            _show_progress: !0,
            _show_percentage: !0,
            _background: "#000000",
            _logo: "",
            _logo_size: [80, 80],
            _cookie: !1,
            _timeout: 10,
            _init: function() {
                JQ("img").each(function(a) {
                    JQ(this).attr("src") && TF_Preloader._images.push(JQ(this).attr("src"))
                });
                if (TF_Preloader._cookie) {
                    if (docCookies.getItem("melonhtml5_logo_preloader_" + TF_Preloader._cookie)) {
                        JQ("#logo_preloader").remove();
                        JQ(document.body).removeClass("logo_preloader");
                        return
                    }
                    docCookies.setItem("melonhtml5_logo_preloader_" + TF_Preloader._cookie, (new Date).getTime(), Infinity)
                }
                TF_Preloader._total = TF_Preloader._images.length;
                TF_Preloader._build();
                TF_Preloader._load()
            },
            _build: function() {
                this._overlay = JQ("#logo_preloader");
                this._overlay.length || (this._overlay = JQ("<div>").attr("id", "logo_preloader").prependTo(JQ(document.body)));
                this._overlay.addClass("logo_preloader_" + this._mode);
                "line" !== this._mode && this._overlay.css("background-color", this._background);
                switch (this._mode) {
                    case "number":
                        var a = this._hexToRgb(this._text_colour);
                        this._percentage = JQ("<div>").html("<div></div><span></span>").css({
                            color: this._text_colour,
                            "border-color": a ? "rgba(" + a.r + ", " + a.g + ", " + a.b + ", 0.7)" : this._text_colour
                        }).addClass("logo_preloader_percentage").appendTo(this._overlay);
                        this._percentage.children("div").css("border-left-color", this._text_colour);
                        break;
                    case "text":
                        this._text_loader = JQ("<div>").addClass("logo_preloader_loader").text(this._text).css("color", this._text_colour).appendTo(this._overlay);
                        this._text_loader_overlay = JQ("<div>").css("background-color", this._background).appendTo(this._text_loader);
                        break;
                    case "scale_text":
                        for (var a = "", c = 0; c < this._text.length; c++) a += "<span>" + this._htmlentities(this._text.charAt(c)) + "</span>";
                        this._text_loader = JQ("<div>").addClass("logo_preloader_loader").html(a).css("color", this._text_colour).appendTo(this._overlay);
                        break;
                    case "logo":
                        this._logo_loader = JQ("<div>").css({
                            width: this._logo_size[0],
                            height: this._logo_size[1],
                            "margin-left": this._logo_size[0] / 2 * -1,
                            "margin-top": this._logo_size[1] / 2 * -1,
                            "background-image": 'url("' + this._logo + '")'
                        }).addClass("logo_preloader_loader").appendTo(this._overlay);
                        this._logo_loader_meter = JQ("<div>").css("background-color", this._background).appendTo(this._logo_loader);
                        this._show_progress && (this._percentage = JQ("<div>").css({
                            color: this._text_colour,
                            width: this._logo_size[0],
                            height: this._logo_size[1],
                            "margin-left": this._logo_size[0] / 2 * -1,
                            "margin-top": this._logo_size[1] / 2,
                            "background-color": this._background
                        }).addClass("logo_preloader_percentage").appendTo(this._overlay));
                        break;
                    case "line":
                        this._line_loader = JQ("<div>").addClass("logo_preloader_loader").css("background-color", this._background).appendTo(this._overlay);
                        JQ("<div>").addClass("logo_preloader_peg").css("box-shadow", "0 0 10px " + this._background).appendTo(this._line_loader);
                        JQ(document.body).css("visibility", "visible");
                        break;
                    case "progress":
                        this._progress_loader = JQ("<div>").addClass("logo_preloader_loader").appendTo(this._overlay), this._progress_loader_meter = JQ("<div>").addClass("logo_preloader_meter").appendTo(this._progress_loader), this._show_progress && (this._percentage = JQ("<div>").addClass("logo_preloader_percentage").text(0).appendTo(this._overlay))
                }
                this._overlay.appendTo(JQ(document.body));
                "text" !== this._mode && "scale_text" !== this._mode || this._text_loader.css("margin-left", this._text_loader.width() / 2 * -1)
            },
            _load: function() {
                if (("number" === this._mode || "logo" === this._mode || "progress" === this._mode) && this._show_progress) {
                    this._percentage.data("num", 0);
                    var a = "0" + (TF_Preloader._show_percentage ? "%" : "");
                    "number" === this._mode ? this._percentage.children("span").text(a) : this._percentage.text(a)
                }
                JQ.each(this._images, function(a, b) {
                    var d = function() {
                            TF_Preloader._imageOnLoad(b)
                        },
                        e = new Image;
                    e.src = b;
                    e.complete ? d() : (e.onload = d, e.onerror = d)
                });
                setTimeout(function() {
                    TF_Preloader._overlay && TF_Preloader._animatePercentage(TF_Preloader._percentage_loaded, 100)
                }, this._images.length ? 1E3 * this._timeout : 0)
            },
            _hexToRgb: function(a) {
                return (a = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(a)) ? {
                    r: parseInt(a[1], 16),
                    g: parseInt(a[2], 16),
                    b: parseInt(a[3], 16)
                } : null
            },
            _htmlentities: function(a) {
                return a.toString().replace(/&/g, "&amp;").replace(/\"/g, "&quot;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/ /g, "&nbsp;")
            },
            _animatePercentage: function(a, c) {
                TF_Preloader._percentage_loaded = a;
                a < c && (a++, setTimeout(function() {
                    switch (TF_Preloader._mode) {
                        case "text":
                            TF_Preloader._text_loader_overlay.css("left", a + "%");
                            break;
                        case "scale_text":
                            var b = parseInt(TF_Preloader._text.length * a * .01, 10);
                            TF_Preloader._text_loader.children("span").eq(b).addClass("loaded");
                            break;
                        case "line":
                            TF_Preloader._line_loader.width(a + "%");
                            break;
                        case "number":
                            TF_Preloader._show_progress && (b = a + (TF_Preloader._show_percentage ? "%" : ""), TF_Preloader._percentage.children("span").text(b));
                            break;
                        case "logo":
                            TF_Preloader._show_progress && (b = a + (TF_Preloader._show_percentage ? "%" : ""), TF_Preloader._percentage.text(b));
                            TF_Preloader._logo_loader_meter.css("bottom", a + "%");
                            break;
                        case "progress":
                            TF_Preloader._show_progress && (b = a + (TF_Preloader._show_percentage ? "%" : ""), TF_Preloader._percentage.text(b)), TF_Preloader._progress_loader_meter.width(a + "%")
                    }
                    TF_Preloader._animatePercentage(a, c)
                }, 5), 100 === a && TF_Preloader._loadFinish())
            },
            _imageOnLoad: function(a) {
                this._image_queue.push(a);
                this._image_queue.length && this._image_queue[0] === a && this._processQueue()
            },
            _reQueue: function() {
                TF_Preloader._image_queue.splice(0, 1);
                TF_Preloader._processQueue()
            },
            _processQueue: function() {
                0 !== this._image_queue.length && (this._loaded++, TF_Preloader._animatePercentage(TF_Preloader._percentage_loaded, parseInt(this._loaded / this._total * 100, 10)), this._reQueue())
            },
            _loadFinish: function() {
                transitionEnd(this._overlay, function(a, c) {
                    TF_Preloader._overlay && (TF_Preloader._overlay.remove(), TF_Preloader._overlay = null)
                });
                this._overlay.addClass("complete");
                JQ(document.body).removeClass("logo_preloader");
                this._on_complete && this._on_complete()
            },
            config: function(a) {
                "undefined" !== typeof a.mode && (this._mode = a.mode);
                "undefined" !== typeof a.text && (this._text = a.text);
                "undefined" !== typeof a.text_colour && (this._text_colour = a.text_colour);
                "undefined" !== typeof a.timeout && (this._timeout = parseInt(a.timeout, 10));
                "undefined" !== typeof a.showProgress && (this._show_progress = a.showProgress ? !0 : !1);
                "undefined" !== typeof a.showPercentage && (this._show_percentage = a.showPercentage ? !0 : !1);
                "undefined" !== typeof a.background && (this._background = a.background);
                "undefined" !== typeof a.logo && (this._logo = a.logo);
                "undefined" !== typeof a.logo_size && (this._logo_size = a.logo_size);
                "undefined" !== typeof a.onComplete && (this._on_complete = a.onComplete);
                "undefined" !== typeof a.images && (this._images = a.images);
                "undefined" !== typeof a.cookie && (this._cookie = a.cookie)
            }
        };
        
        setTimeout(function() {
            JQ(document).ready(TF_Preloader._init)
        });

        if ($('#logo_preloader').length) {
            var $selector = $('#logo_preloader'),
                $width = $selector.data('width'),
                $height = $selector.data('height'),
                $color = $selector.data('color'),
                $bgcolor = $selector.data('bgcolor'),
                $logourl = $selector.data('url');
            TF_Preloader.config({
                mode: 'logo',
                logo: $logourl,
                logo_size: [$width, $height],
                showProgress: !0,
                showPercentage: !0,
                text_colour: $color,
                background: $bgcolor,
            });             
        }
    }

// Dom Ready
    $(function () {
        tfl_niceSelect();
        responsiveMenu();
        headerFixed();
        themesflatSearch();
        parallax();
        pagetitleVideo();
        blogLoadMore();
        tfl_svgConvert();
        goTop();
        customizable_carousel_div();
        removePreloader();
        tfl_animation_classes();
    });
})(jQuery);