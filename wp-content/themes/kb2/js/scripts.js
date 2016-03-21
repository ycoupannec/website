(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		// DOM ready, take it away
		
		var  nm = $("#nav-main");
      	var nms = "nav-main-scrolled";
      	var hdr = $('header').height();
      	var nvHght = $('#nav-main').height();
    	$(window).scroll(function() {
	        if( $(this).scrollTop() > (hdr - nvHght)) {
	        nm.addClass(nms);
	        } else {
	        nm.removeClass(nms);
	        }
    	});

	});
	
})(jQuery, this);
