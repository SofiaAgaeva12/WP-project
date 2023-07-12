;
(function($) {
    "use strict";

    //Mobile Menu
    $("#primary-menu").slicknav({
        allowParentLinks: true,
        prependTo: '#mobile',
        label: 'Menu',
    });
    
    var sf = $('#primary-menu').superfish({
        delay: 500, // one second delay on mouseout
        animation: { opacity: 'show', height: 'show' }, // fade-in and slide-down animation
        speed: 'fast', // faster animation speed
    });
    
    // Header Search
    if ($(".search-open").length) {
        $(".search-open").on("click", function(e) {
            e.preventDefault();
            $(".header-search-popup").toggleClass("active");
        });
    }

    // Sticky Menu Premium
    $(window).on('scroll', function() {
        var scroll = $(window).scrollTop();
        if (scroll < 100) {
            $("#sticky-header").removeClass("sticky-bar");
        } else {
            $("#sticky-header").addClass("sticky-bar");
        }
    });


    // Theme Preloader
    $(window).on("load", function() {
        if ($(".preloader-area").length) {
            $(".preloader-area").fadeOut();
        }
    });

    // Post Slider
    function bloghub_rtl(){
        if ($('body').hasClass("rtl")) {
           return true;
        } else {
           return false;
        }
    }
    if( $(".post-slider-box").length ){
        function GrowupMainSlider() {
            var GrowupSlider = $('.post-slider-box');
            GrowupSlider.on('init', function (e, slick) {
                var $firstAnimatingElements = $('.post-slide-item:first-child').find('[data-animation]');
                doAnimations($firstAnimatingElements);
            });
            GrowupSlider.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
                var $animatingElements = $('.post-slide-item[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
                doAnimations($animatingElements);
            });
            GrowupSlider.slick({
                autoplay: true,
                autoplaySpeed: 8000,
                dots: false,
                fade: true,
                arrows: true,
                rtl: bloghub_rtl(),
                prevArrow: '<i class="slick-arrow slick-prev fas fa-angle-double-left"></i>',
                nextArrow: '<i class="slick-arrow slick-next fas fa-angle-double-right"></i>',
                
            });

            function doAnimations(elements) {
                var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
                elements.each(function () {
                    var $this = $(this);
                    var $animationDelay = $this.data('delay');
                    var $animationType = 'animated ' + $this.data('animation');
                    $this.css({
                        'animation-delay': $animationDelay,
                        '-webkit-animation-delay': $animationDelay
                    });
                    $this.addClass($animationType).one(animationEndEvents, function () {
                        $this.removeClass($animationType);
                    });
                });
            }
        }
        GrowupMainSlider();
    }

    // Bottom to top 
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 300) {
            $('#back-top').fadeIn();
        } else {
            $('#back-top').fadeOut();
        }
    });

    $('#back-top').on('click', function() {
        $("html, body").animate({
            scrollTop: 0
        }, 1000);
        return false;
    });

    // PopUp Video
    if( $(".mfp-iframe").length ){
        $('.mfp-iframe').magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
    }
    // Post Gallerly
    if ($('.post-gallery').length) {
        $('.post-gallery').slick({
            dots: false,
            infinite: true,
            speed: 700,
            cssEase: 'linear',
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: true,
            rtl: bloghub_rtl(),
            prevArrow: '<i class="slick-arrow slick-prev fas fa-angle-double-left"></i>',
            nextArrow: '<i class="slick-arrow slick-next fas fa-angle-double-right"></i>',
        });
    }
    
    // Theme Dark And Light Mode Options
    const darkSwitch = document.querySelector('#darkswitch');

    const htmlElement = document.querySelector('html');

    function setThemeMode(mode) {
    htmlElement.setAttribute('data-theme-mode', mode);
    }

    function loadThemeMode() {
    const storedTheme = localStorage.getItem('themeMode');

    if (storedTheme) {
        setThemeMode(storedTheme);
        if (darkSwitch) {
        darkSwitch.checked = storedTheme === 'dark';
        }
    } else {
        setThemeMode(defaultTheme);
        if (darkSwitch) {
        darkSwitch.checked = defaultTheme === 'dark';
        }
    }
    }

    if (darkSwitch) {
    darkSwitch.addEventListener('click', function () {
        if (darkSwitch.checked) {
        setThemeMode('dark');
        } else {
        setThemeMode('light');
        }
    });
    }

    // Get the value of the theme mode from the hidden input field.
    const themeMode = document.querySelector('input[name="theme_mode"]').value;

    // Set the theme mode.
    setThemeMode(themeMode);
    
    // WooCommerce product Popup
    var $rtl = $('body').hasClass("rtl") ? true : false;
    if ($('.woo-spimg').length) {
        $('.woo-spimg').magnificPopup({
            delegate: 'a',
            type: 'image',
            mainClass: 'mfp-zoom-out', // this class is for CSS animation below
            gallery: { enabled: true },
            zoom: {
                enabled: true,
                duration: 300,
                easing: 'ease-in-out',
                opener: function(openerElement) {
                    return openerElement.is('img') ? openerElement : openerElement.find('img');
                }
            }
        });
    }
    // WooCommerce Big Image
    if ($('.woo-product-big-img').length) {
        $('.woo-product-big-img').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.woo-product-small-img',
            rtl: $rtl,
        });
    }

    // WooCommerce Small Image
    if ($('.woo-product-small-img').length) {
        $('.woo-product-small-img').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: '.woo-product-big-img',
            dots: true,
            arrows: false,
            focusOnSelect: true,
            centerMode: true,
            centerPadding: '60px',
            rtl: $rtl,
        });
    }
    // Grid View and List View
    if ($('#bloghub-shop-view-mode li').length) {
        $('#bloghub-shop-view-mode li').on('click', function() {
            $('body').removeClass('bloghub-product-grid-view').removeClass('bloghub-product-list-view');

            if ($(this).hasClass('bloghub-shop-list')) {
                $('body').addClass('bloghub-product-list-view');
                Cookies.set('bloghub-shop-view', 'list');
            } else {
                $('body').addClass('bloghub-product-grid-view');
                Cookies.remove('bloghub-shop-view');
            }
            return false;
        });
    }

}(jQuery))