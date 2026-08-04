/* =================================
------------------------------------
	Andres Mekis Templates
 ------------------------------------ 
 ====================================*/

'use strict';

(function($) {

    var width, height, backgroundHeader;

    initHeader();
    addListeners();

    /*------------------
    	Background Set
    --------------------*/
    function pintarFondos(selector) {
        $(selector).each(function() {
            var bg = $(this).data('setbg');
            if (bg) {
                $(this).css('background-image', 'url(' + bg + ')');
            }
        });
    }

    // Los fondos de contenido se pintan de inmediato.
    pintarFondos('.set-bg:not(.background-header)');

    // Los slides del carrusel del header no se ven al entrar: el primero ya
    // viene pintado desde el HTML y el resto recien aparece cuando el carrusel
    // rota, a los ~5 segundos. Cargarlos despues del load evita competir por
    // ancho de banda con lo que si se ve (son ~1.8 MB en la home).
    $(window).on('load', function() {
        pintarFondos('.background-header.set-bg');
    });

    /*------------------
    	Header Background Set
    --------------------*/

    function initHeader() {
        width = window.innerWidth;
        height = window.innerHeight;

        $(".background-header").css("height", height + 'px');

        // btnCollapseNav = document.getElementsByClassName('btn-collapse-nav');
        // collapseNav.style.height = height+'px';
    }

    function addListeners() {
        // window.addEventListener('scroll', scrollCheck);
        window.addEventListener('resize', resize);
    }

    // function scrollCheck() {

    // 	if ($("#background-header").offset().top > 56) {
    // 		$("#background-header").addClass("is-visible");
    // 	} 
    // 	else {
    // 		$("#background-header").removeClass("is-visible");
    // 	}

    // 	if (document.body.scrollTop > 255 || document.documentElement.scrollTop > 255) {
    // 		$('#btn-collapse-nav').trigger('click');
    // 	}
    // }

    function resize() {
        width = window.innerWidth;
        height = window.innerHeight;
        backgroundHeader.style.height = height + 'px';
    }

    $('.btn-collapse-nav').on('click', function() {
        $('.menu-icon').toggleClass('is-clicked');

        if ($('.collapse-nav').hasClass('is-visible')) {
            $('.collapse-nav').removeClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');
        } else {
            $('.collapse-nav').addClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');
        }

        if ($('.no-collapse-nav').hasClass('is-visible')) {
            $('.no-collapse-nav').removeClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');
        } else {
            $('.no-collapse-nav').addClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');
        }

        if ($('.no-collapse-title, .collapse-title').hasClass('is-visible')) {
            $('.no-collapse-title, .collapse-title').removeClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');
        } else {
            $('.no-collapse-title, .collapse-title').addClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');
        }

        if ($('.collapse-header, .collapse-content').hasClass('is-visible')) {
            $('.collapse-header, .collapse-content').removeClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');
        } else {
            $('.collapse-header, .collapse-content').addClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');
        }
    });

})(jQuery);