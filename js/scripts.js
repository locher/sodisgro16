(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		// Menu produit
		$('.cat-list > li > a').click(function(event){
			event.preventDefault();
			$('li:not(.current-cat-ancestor) .children').slideUp();
			$(this).parent().find('.children').slideToggle();
		});
		
		//Virer les styles dans les descriptions produits
		$('.product').find('p').removeAttr('style');
		$('.product').find('p').find('span').removeAttr('style');
	});
	
})(jQuery, this);
