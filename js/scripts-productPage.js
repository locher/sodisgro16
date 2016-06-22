(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';

		//Gérer les images sur les pages produits
		
		//Flickity
				
		$('.thumbnails').flickity({
			cellAlign: 'left',
			pageDots: false,
			contain: true,
			lazyLoad: true,
			autoPlay: true
		});
		
		if ($('.flickity-slider a').length < 4){
			$('.flickity-prev-next-button').hide();
		}

		
	});
	
})(jQuery, this);
