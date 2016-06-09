/*BURGER NAV*/

$(".burger-menu").click(function () {
    $(this).toggleClass("menu-on");
    $('.burger .menu-liste').animate({display: 'block', width: 'toggle'});
});

/*SELECTEUR DE RECHERCHE*/

$('.vehicule ul li').click(function () {
    $('.vehicule ul li').removeClass('active');
    $(this).addClass('active');
    var the_id = $(this).attr('id');
    switch (the_id) {
        case 'vehicule':
            $('.par_vehicule').css('display', 'flex');
            $('.par_immatriculation, .par_carte_grise').css('display', 'none');
            break;
        case 'immatriculation':
            $('.par_vehicule, .par_carte_grise').css('display', 'none');
            $('.par_immatriculation').css('display', 'flex');
            break;
        case 'carte_grise':
            $('.par_vehicule, .par_immatriculation').css('display', 'none');
            $('.par_carte_grise').css('display', 'flex');
            break;
    }
});

/* FADE POUR LES CATEGORIES */
$(document).resize(function () {
    if ($(document).width < 640) {
        $('.categorie a').click(function (e) {
            e.preventDefault();
            var the_parents = $(this).parents();
            var para = the_parents[3];
            $(para).find('.moteur').fadeToggle('slow');
        });
    }
});



