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
	$('.set-bg').each(function() {
		var bg = $(this).data('setbg');
		$(this).css('background-image', 'url(' + bg + ')');
	});

	/*------------------
		Header Background Set
	--------------------*/

	function initHeader() {
		width = window.innerWidth;
		height = window.innerHeight;

		$(".background-header").css("height", height+'px');

		// btnCollapseNav = document.getElementsByClassName('btn-collapse-nav');
        // collapseNav.style.height = height+'px';
	}

	function addListeners() {
        window.addEventListener('scroll', scrollCheck);
        window.addEventListener('resize', resize);
    }

	function scrollCheck() {

		// if ($("#background-header").offset().top > 56) {
		// 	$("#background-header").addClass("is-visible");
		// } 
		// else {
		// 	$("#background-header").removeClass("is-visible");
		// }

		// if (document.body.scrollTop > 255 || document.documentElement.scrollTop > 255) {
		// 	$('#btn-collapse-nav').trigger('click');
		// }
	}

    function resize() {
        width = window.innerWidth;
        height = window.innerHeight;
        backgroundHeader.style.height = height+'px';
	}

	$('.btn-collapse-nav').on('click', function(){
		$('.menu-icon').toggleClass('is-clicked');

		if( $('.collapse-nav').hasClass('is-visible') ) {
			$('.collapse-nav').removeClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');
		} else {
			$('.collapse-nav').addClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');	
		}

		if( $('.collapse-header, .header-index, .header-pages').hasClass('is-visible') ) {
			$('.collapse-header, .header-index, .header-pages').removeClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');
		} else {
			$('.collapse-header, .header-index, .header-pages').addClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');	
		}

		if( $('.no-collapse-title').hasClass('is-visible') ) {
			$('.no-collapse-title').removeClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');
		} else {
			$('.no-collapse-title').addClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');	
		}

		if( $('.collapse-title').hasClass('is-visible') ) {
			$('.collapse-title').removeClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');
		} else {
			$('.collapse-title').addClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');	
		}

		if( $('.collapse-content, .content-index, .collapse-footer, .content-pages').hasClass('is-visible') ) {
			$('.collapse-content, .content-index, .collapse-footer, .content-pages').removeClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');
		} else {
			$('.collapse-content, .content-index, .collapse-footer, .content-pages').addClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');	
		}
	});

})(jQuery);
