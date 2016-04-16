(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		// DOM ready, take it away
		
		$('#nav-icon1').click(function(){
        $(this).toggleClass('open');
        $('.overlay').fadeToggle(250);
        return false;
    });
		
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



	    	//flexslider
		$(window).load(function() {
		  $('.flexslider').flexslider({
		    animation: "slide",
		    prevText: "",
			nextText: "",		    
		  });

		  console.log($.flexslider)
		});    	
	
})(jQuery, this);
