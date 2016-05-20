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


	$(document).ready(function(){

		$('a.quick_view').click(function(e){

			e.preventDefault();

			$a = $(this);

			var items = [];

			$.get( $a.attr('href'), function(data){

				//console.log(data);

				if( $(data).find('.images').length ) {
					console.log('adding image');
					
					$(data).find('img').each(function(){
						items.push({src: $(this).attr('src'), type : 'image' })
					});
				}

				if( $(data).find('.video').length ) {
					console.log('adding video');
					
					$(data).find('iframe').each(function(){
						items.push({src: $(this).attr('src'), type : 'iframe' })
					});
				}			

				console.log(items);
				if(items.length) {

					$.magnificPopup.open({
					   items:items,
					   gallery: {
					      enabled: true 
					    }
					});


				}

			});



		});

		

	});

	
})(jQuery, this);
