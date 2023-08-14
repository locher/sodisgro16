(function ($, root, undefined) {

    $(function () {

        'use strict';

        // Menu produit
        $('.cat-list > li > a').hover(function (event) {
            
            if($(this).parent().has('.children')){
                event.preventDefault();
            }
            

            if ($(this).hasClass('is-open')) {
                $(this).removeClass('is-open');
                $(this).parent().find('.children').slideToggle();
            } else {
                $(this).addClass('is-open');
                $('li:not(.current-cat-ancestor) .children').slideUp();
                $(this).parent().find('.children').slideToggle();
            }

        });

        //Virer les styles dans les descriptions produits
        $('.product').find('p').removeAttr('style');
        $('.product').find('p').find('span').removeAttr('style');

        //Afficher le overlay pour ajouter au devis
        $('.bt_add_devis').click(function () {
            $('.overlay_product').removeClass('open');
            $(this).parent().find('.overlay_product').toggleClass('open');
            closeOverlay_echap();
        });

        //Close le overlay
        $('.close_overlay').click(function () {
            $(this).parent().toggleClass('open');
            closeOverlay_echap();
        });

        //Mise en page des Excerpts produits pour virer les style érités.
        $('.products').find('div[itemprop="description"] *').removeAttr('align').removeAttr('style');

        //Virer la popup à l'appui sur échap

        function closeOverlay_echap() {
            if ($('.overlay_product').hasClass('open')) {
                $('html').keypress(function (e) {
                    if (e.keyCode == 27) {
                        $('.overlay_product').removeClass('open');
                    }
                });
            }
        }

        //Sticky menu	

        var hauteur_menu = $('.header').height();

        var waypoints = $('.sidemenu').waypoint({
            handler: function (direction) {
                console.log(this.element.id + ' hit');
                $('.sidemenu').toggleClass('sticky-menu');
            },
            offset: hauteur_menu
        })

    });

})(jQuery, this);