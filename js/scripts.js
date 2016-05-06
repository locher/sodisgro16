(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		$('.cat-list > li > a').click(function(event){
			event.preventDefault();
			$('li:not(.current-cat-ancestor) .children').slideUp();
			$(this).parent().find('.children').slideToggle();
		});
	});
	
})(jQuery, this);
