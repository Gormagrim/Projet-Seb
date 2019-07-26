$(document).ready(function () {
        // Js pour la gestion des likes
    $('.likeProduction').on('click',function () {
        $(this).addClass('animated flip');
        $(this).css('color', 'firebrick');
        $('.dislikeProduction').removeClass('animated flip');
        $('.dislikeProduction').addClass('animated rubberBand');
        $('.dislikeProduction').css('color', '#ffa000');
    });

    $('.dislikeProduction').on('click',function () {
        $(this).addClass('animated flip');
        $(this).css('color', 'lightblue');
        $('.likeProduction').removeClass('animated flip');
        $('.likeProduction').addClass('animated rubberBand');
        $('.likeProduction').css('color', '#ffa000');
        $('.likeProduction').removeClass('likedProduction');
    });
    
    $('.addFavorite').on('click',function () {
        $(this).addClass('shake animated');
        $(this).css('color', 'lightgreen');
    });
    
    $('.likeCompany').on('click',function () {
        $(this).addClass('animated flip');
        $(this).css('color', 'firebrick');
        $('.dislikeCompany').removeClass('animated flip');
        $('.dislikeCompany').addClass('animated rubberBand');
        $('.dislikeCompany').css('color', '#ffa000');
    });
    
    $('.dislikeCompany').on('click',function () {
        $(this).addClass('animated flip');
        $(this).css('color', 'lightblue');
        $('.likeCompany').removeClass('animated flip');
        $('.likeCompany').addClass('animated rubberBand');
        $('.likeCompany').css('color', '#ffa000');
        $('.likeCompany').removeClass('dislikedProduction');
    });
    
    $('.favoriteCompany').on('click',function () {
        $(this).addClass('shake animated');
        $(this).css('color', 'lightgreen');
    });
});
