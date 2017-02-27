$(window).load(function () {

    "use strict";
    //------------------------------------------------------------------------
    //						PRELOADER SCRIPT
    //------------------------------------------------------------------------
    $('#preloader').delay(400).fadeOut('slow'); // will fade out the white DIV that covers the website.
    $('#preloader .loading-data').fadeOut(); // will first fade out the loading animation

/*  [ Back to top ]
		- - - - - - - - - - - - - - - - - - - - */
		$(window).scroll(function () {
			if ($(this).scrollTop() > 50) {
				$('.k2t-btt').fadeIn('slow');
			} else {
				$('.k2t-btt').fadeOut('slow');
			}
		});
		$( '.k2t-btt' ).click(function () {
			$("html, body").animate({
				scrollTop: 0
			}, 500);
			return false;
		});
})