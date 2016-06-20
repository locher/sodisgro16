(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		// Centrer horizontalement le header
		
		function alignTextHeader(){
			var slider_height = $('.wrapperBigHeader').height();
			var conteneur_slider_height = $('.bigHeader-fond').height();		
			var mgt_slider = conteneur_slider_height/2 - slider_height/2 - 45; //45 c'est le padding top

			$('.ie .wrapperBigHeader').css('margin-top', mgt_slider);
		}
		
		alignTextHeader();
		
		$(window).resize(function(){
			alignTextHeader();
		});
		
	});
	
})(jQuery, this);
