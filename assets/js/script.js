// ON crée un "alias" sur Jquery

var $ = jQuery;

// Permet de démarrer le carousel
jQuery('#carousel').slick();


// Initialise Isotope

$('.annonces').isotope({
    // options
    itemSelector: '.col-lg-3',
    layoutMode: 'fitRows'
  });

// au clic , on doit faire
//$('.annonces').isotope({filter: '.filter-167'})

// en Jquery
$('.filter-city').click(function () {
    let city = $(this).data('city');

    // On va filtrer par ville avec Isotope
    $('.annonces').isotope({filter: city});
    console.log(city);
});