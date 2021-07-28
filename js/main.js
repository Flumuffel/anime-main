/*  ---------------------------------------------------
    Theme Name: Anime
    Description: Anime video tamplate
    Author: Colorib
    Author URI: https://colorib.com/
    Version: 1.0
    Created: Colorib
---------------------------------------------------------  */

'use strict';

(function ($) {

    /*------------------
        Player Fix
    --------------------*/
    
    setTimeout(function() {
        // Loading
        $('#player')[0].load();

        // Fix Layout
        $('button[data-plyr="play"]')[0].setAttribute("style", "position: absolute; left: 58px; bottom: 8px;");
        $('button[data-plyr="fast-forward"]')[0].setAttribute("style", "position: absolute; left: 85px; bottom: 8px;");
        $('button[data-plyr="mute"]')[0].setAttribute("style", "position: absolute; left: 95px; bottom: 0;");
        $('input[data-plyr="volume"]')[0].setAttribute("style", "position: absolute; left: 120px; bottom: 6px;");

        $('.plyr__time--current')[0].setAttribute("style", "left: 120px;");
    }, 500)

    /*------------------
        Service Worker
    --------------------*/
    async function registerSw() {
        if('serviceWorker' in navigator) {
            try {
                await navigator.serviceWorker.register('sw.js');
            } catch (e) {
                console.log(`SW registration failed`);
            }
        }
    }

    /*------------------
        Preloader
    --------------------*/

    $(window).on('load', function () {
        registerSw();
        $(".loader").fadeOut();
        $("#preloder").delay(550).fadeOut("slow");

        /*------------------
            FIlter
        --------------------*/
        $('.filter__controls li').on('click', function () {
            $('.filter__controls li').removeClass('active');
            $(this).addClass('active');
        });
        if ($('.filter__gallery').length > 0) {
            var containerEl = document.querySelector('.filter__gallery');
            var mixer = mixitup(containerEl);
        }
    });

    /*------------------
        Background Set
    --------------------*/
    setTimeout(function() {
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    }, 200);

    setTimeout(function() {
        $('.toast').toast('show')
        console.log("Show Nitifications")
    }, 700)

    // Search model
    $('.search-switch').on('click', function () {
        $('.search-model').fadeIn(400);
    });

    $('.search-close-switch').on('click', function () {
        $('.search-model').fadeOut(400, function () {
            $('#search-input').val('');
        });
    });
    }, 650)
    /*------------------
		Navigation
	--------------------*/
    $(".mobile-menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });

    /*------------------
		Hero Slider
    --------------------*/
    
    var hero_s = $(".hero__slider");
 
    setTimeout(function() {
        hero_s.owlCarousel({
            loop: true,
            margin: 0,
            items: 1,
            dots: true,
            nav: true,
            navText: ["<span class='arrow_carrot-left'></span>", "<span class='arrow_carrot-right'></span>"],
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            smartSpeed: 1200,
            autoHeight: false,
            autoplay: true,
            mouseDrag: false
        });
    }, 700)



    /*------------------
        Video Player
    --------------------*/
    const player = new Plyr('#player', {
        controls: ['play-large', 'play', 'progress', 'current-time', 'mute', 'captions', 'settings', 'fullscreen'],
        seekTime: 25
    });

    /*------------------
        Niceselect
    --------------------*/
    $('select').niceSelect();

    /*------------------
        Scroll To Top
    --------------------*/
    $("#scrollToTopButton").click(function() {
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
     });

})(jQuery);