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
		
		//Afficher le overlay pour ajouter au devis
		$('.bt_add_devis').click(function(){
			$('.overlay_product').removeClass('open');
			$(this).parent().find('.overlay_product').toggleClass('open');
			closeOverlay_echap();
		});
		
		//Close le overlay
		$('.close_overlay').click(function(){
			$(this).parent().toggleClass('open');
			closeOverlay_echap();
		});
		
		//Mise en page des Excerpts produits pour virer les style érités.
		$('.products').find('div[itemprop="description"] *').removeAttr('align').removeAttr('style');
		
		//Virer la popup à l'appui sur échap
		
		function closeOverlay_echap(){
			if($('.overlay_product').hasClass('open')){
				$('html').keypress(function(e){
					if(e.keyCode == 27){
						$('.overlay_product').removeClass('open');
				   	}
				});
			}
		}
		
		//Sticky menu
		//$(".sidemenu").sticky({topSpacing:50});
		
		
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
	juizScrollTo('a[href^="#"]');

	});
	
})(jQuery, this);
