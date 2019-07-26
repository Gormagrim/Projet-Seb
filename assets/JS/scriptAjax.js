$(function () {
    //Etape 1 : Je crée mon évènements (et je le teste)
    $('#search').keyup(function () {
        /**
         * Etape 2 : j'appelle la fonction ajax 
         * J'utilise :
         *      * $.post si je veux envoyer de données en post, cela enverra une variable $_POST
         *      * $.get si je veux en envoyer en get, cela enverra une variable $_GET
         * Je lie mon controller EN PARTANT DU SCRIPT.JS
         * J'envoie ce que je dois envoyer. Ici, je veux envoyer ce que j'ai tapé dans mon champs
         * de recherche ($('#search').val()) et je veux l'envoyer dans une variable qui s'appellera $_POST['search']
         */
        $.post('../../controllers/inserParticularUserCtrl.php', {
            searchCity: $('#search').val()
                    /**
                     * function (data) est la fonction qui s'éxécutera une fois que le contrôleur aura fini
                     * data est le retour du contrôleur (ce qu'on a mis dans echo json_encode())
                     */
        }, function (data) {
            /*
             * Etape 4 : L'affichage
             * Je récupère ce qui a été retourné du PHP grâce au echo json_encode, on le convertit en tableau d'objet js et on le stocke
             * dans la variable results.
             */
            var results = $.parseJSON(data);
            //4.1 : Je vide le tableau pour préparer l'affichage (enlever les résultats déjà présents)
            $('.search').empty();
            $('.cityId').empty();
            //4.2 : Je vérifie que le tableau de résultats n'est pas vide
            if (results.length > 0) {
                //4.3 : Je parcours le tableau (similaire à foreach($results as $key=>$patient). patient est un objet contenu dans le tableau
                $.each(results, function (key, city) {
                    /*
                     * 4.4 : Je crée une variable qui contiendra la concaténation des balises servant à l'affichage (ici des cellules de tableau)
                     * On y injecte les information du patient
                     */
                    var display = '<option class="city" value="' + city.city + ' ' + city.zipcode + '" id="' + city.id + '">' + city.city + ' ' + city.zipcode + '</option>';
                    var idCity = '' + city.id + '';
                    //J'ajoute la ligne que je viens de créer au tableau, cette opération se répètera pour chaque patient dans le tableau results
                    $('.search').append(display);
                    $('.cityId').attr('value', idCity);
                });
            }
        }
        );
    });

    /* Gestion AJAX des listes déroulante de recherche de catégory et type pour la création / modification de chantier */
    $('#category').change(function () {
        $.post('../../controllers/downloadFilesCtrl.php', {
            searchCategory: $('#category option:selected').val()
        }, function (data) {
            var results = $.parseJSON(data);
            $('#productionType').empty();
            $.each(results, function (key, type) {
                var display = '<option value="' + type.id + '">' + type.type + '</option>';
                $('#productionType').append(display);
            });
        });
    });

    /* Gestion AJAX des likes pour les chantiers */
    $('.likeIcon').on('click',function () {
        $.post('../../controllers/productionDetailCtrl.php',{
            placeLike: $(this).attr('data-like')
        }, function(data){
            var like = $('#placeLike_' + data.id);
            $(like).removeClass('likeProduction');
            $(like).addClass('likedProduction');
            $(like).addClass('animated flip');
        },
        'JSON');
    });
    
    /* Gestion AJAX des dislikes pour les chantiers */
    $('.dislikeIcon').on('click',function () {
        $.post('../../controllers/productionDetailCtrl.php',{
            placeDislike: $(this).attr('data-dislike')
        }, function(data){
            var dislike = $('#placeDislike_' + data.id);
            $(dislike).removeClass('dislikeProduction');
            $(dislike).addClass('DislikedProduction');
            $(dislike).addClass('animated flip');
        },
        'JSON');
    });
    
    /* Gestion AJAX des favoris pour les chantiers */
    $('.addFavorite').on('click',function () {
        $.post('../../controllers/productionDetailCtrl.php',{
            placeFavorite: $(this).attr('data-favorite')
        }, function(data){
            var favorite = $('#placeFavorite_' + data.id);
        },
        'JSON');
    });
    
    /* Gestion AJAX des likes pour les entreprises */
    $('.likeComp').on('click',function () {
        $.post('../../controllers/companyFromPartUserCtrl.php',{
            companyLike: $(this).attr('data-companyLike')
        }, function(data){
            
        },
        'JSON');
    });
    
    /* Gestion AJAX des dislikes pour les entreprises */
    $('.dislikeComp').on('click',function () {
        $.post('../../controllers/companyFromPartUserCtrl.php',{
            companyDislike: $(this).attr('data-companyDislike')
        }, function(data){

        },
        'JSON');
    });
    
    /* Gestion AJAX des favoris pour les entreprises */
    $('.addFavoriteComp').on('click',function () {
        $.post('../../controllers/companyFromPartUserCtrl.php',{
            favoriteComp: $(this).attr('data-favoriteCompany')
        }, function(data){
            var favorite = $('#placeFavorite_' + data.id);
        },
        'JSON');
    });
});