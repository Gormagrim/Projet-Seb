$(document).ready(function () {

    $('.likeProduction').click(function () {
        $('.likeProduction').addClass('animated flip');
        $('.likeProduction').css('color', 'firebrick');
        $('.dislikeProduction').removeClass('animated flip');
        $('.dislikeProduction').addClass('animated rubberBand');
        $('.dislikeProduction').css('color', '#ffa000');
    });

    $('.dislikeProduction').click(function () {
        $('.dislikeProduction').addClass('animated flip');
        $('.dislikeProduction').css('color', 'blue');
        $('.likeProduction').removeClass('animated flip');
        $('.likeProduction').addClass('animated rubberBand');
        $('.likeProduction').css('color', '#ffa000');
    });
});
