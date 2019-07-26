$(document).ready(function () {
    // Effet de transition pour la navbar de la page d'accueuil
    $(window).scroll(function () {
        // Je vérifie si le scrolle est supérieur à 850, si c'est le cas j'ajoute la classe solid à ma navbar (qui est en transprente de base dans le css)
        // même chose pour le bouton de connection qui change de couleur.
        if ($(this).scrollTop() > 850) {
            $('.navbar').addClass('solid');
            $('.btn-outline-warning').removeClass('hightBtn');
        } else {
            $('.navbar').removeClass('solid');
            $('.btn-outline-warning').addClass('hightBtn');
        }
    });
});

