(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		// Smooth scrooll
		
		function juizScrollTo(element){			
		$(element).click(function(){
			var goscroll = false;
			var the_hash = $(this).attr("href");
			var regex = new RegExp("\#(.*)","gi");
			var the_element = '';

			if(the_hash.match("\#(.+)")) {
				the_hash = the_hash.replace(regex,"$1");

				if($("#"+the_hash).length>0) {
					the_element = "#" + the_hash;
					goscroll = true;
				}
				else if($("a[name=" + the_hash + "]").length>0) {
					the_element = "a[name=" + the_hash + "]";
					goscroll = true;
				}

				if(goscroll) {
					$('html, body').animate({
						scrollTop:$(the_element).offset().top
					}, 'slow');
					return false;
				}
			}
		});					
	};
	juizScrollTo('.sidemenu a[href^="#"]');
		
		// Centrer horizontalement le header
		
		function alignTextHeader(){
			var slider_height = $('.wrapperBigHeader').height();
			var conteneur_slider_height = $('.bigHeader-fond').height();		
			var mgt_slider = conteneur_slider_height/2 - slider_height/2 - 45; //45 c'est le padding top

			$('.wrapperBigHeader').css('margin-top', mgt_slider);
		}
		
		alignTextHeader();
		
		$(window).resize(function(){
			alignTextHeader();
		});

	});
	
})(jQuery, this);
