function slide_open() {
    document.getElementById("main").style.marginLeft = "15%";
    document.getElementById("mySidebar").style.width = "15%";
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("openNav").style.display = 'none';
}
function slide_close() {
    document.getElementById("main").style.marginLeft = "0%";
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("openNav").style.display = "inline-block";
}

$(function () {
    $('#go').click(function () {
        $('.hideOne').show();
        $('.reHideOne').show();
        $('.hideTwo').hide();
        $('.reHideTwo').hide();
        $('.hideThree').hide();
        $('.reHideThree').hide();
        $('.hideFour').hide();
        $('.reHideFour').hide();
        $('.hideFive').hide();
        $('.reHideFive').hide();
        $('.hideSix').hide();
        $('.reHideSix').hide();
        $('.hideMenu').addClass('animated zoomIn');
        $('.hideMenuTwo').removeClass('animated zoomIn');
        $('.hideMenuThree').removeClass('animated zoomIn');
        $('.hideMenuFour').removeClass('animated zoomIn');
        $('.hideMenuFive').removeClass('animated zoomIn');
        $('.hideMenuSix').removeClass('animated zoomIn');
    });
    $('#charp').click(function () {
        $('.hideTwo').show();
        $('.reHideTwo').show();
        $('.hideOne').hide();
        $('.reHideOne').hide();
        $('.hideThree').hide();
        $('.reHideThree').hide();
        $('.hideFour').hide();
        $('.reHideFour').hide();
        $('.hideFive').hide();
        $('.reHideFive').hide();
        $('.hideSix').hide();
        $('.reHideSix').hide();
        $('.hideMenu').removeClass('animated zoomIn');
        $('.hideMenuTwo').addClass('animated zoomIn');
        $('.hideMenuThree').removeClass('animated zoomIn');
        $('.hideMenuFour').removeClass('animated zoomIn');
        $('.hideMenuFive').removeClass('animated zoomIn');
        $('.hideMenuSix').removeClass('animated zoomIn');
    });
    $('#wall').click(function () {
        $('.hideThree').show();
        $('.reHideThree').show();
        $('.hideOne').hide();
        $('.reHideOne').hide();
        $('.hideTwo').hide();
        $('.reHideTwo').hide();
        $('.hideFour').hide();
        $('.reHideFour').hide();
        $('.hideFive').hide();
        $('.reHideFive').hide();
        $('.hideSix').hide();
        $('.reHideSix').hide();
        $('.hideMenu').removeClass('animated zoomIn');
        $('.hideMenuTwo').removeClass('animated zoomIn');
        $('.hideMenuThree').addClass('animated zoomIn');
        $('.hideMenuFour').removeClass('animated zoomIn');
        $('.hideMenuFive').removeClass('animated zoomIn');
        $('.hideMenuSix').removeClass('animated zoomIn');
    });
    $('#menui').click(function () {
        $('.hideFour').show();
        $('.reHideFour').show();
        $('.hideOne').hide();
        $('.reHideOne').hide();
        $('.hideTwo').hide();
        $('.reHideTwo').hide();
        $('.hideThree').hide();
        $('.reHideThree').hide();
        $('.hideFive').hide();
        $('.reHideFive').hide();
        $('.hideSix').hide();
        $('.reHideSix').hide();
        $('.hideMenu').removeClass('animated zoomIn');
        $('.hideMenuTwo').removeClass('animated zoomIn');
        $('.hideMenuThree').removeClass('animated zoomIn');
        $('.hideMenuFour').addClass('animated zoomIn');
        $('.hideMenuFive').removeClass('animated zoomIn');
        $('.hideMenuSix').removeClass('animated zoomIn');
    });
    $('#plomb').click(function () {
        $('.hideFive').show();
        $('.reHideFive').show();
        $('.hideOne').hide();
        $('.reHideOne').hide();
        $('.hideTwo').hide();
        $('.reHideTwo').hide();
        $('.hideThree').hide();
        $('.reHideThree').hide();
        $('.hideFour').hide();
        $('.reHideFour').hide();
        $('.hideSix').hide();
        $('.reHideSix').hide();
        $('.hideMenu').removeClass('animated zoomIn');
        $('.hideMenuTwo').removeClass('animated zoomIn');
        $('.hideMenuThree').removeClass('animated zoomIn');
        $('.hideMenuFour').removeClass('animated zoomIn');
        $('.hideMenuFive').addClass('animated zoomIn');
        $('.hideMenuSix').removeClass('animated zoomIn');
    });
    $('#out').click(function () {
        $('.hideSix').show();
        $('.reHideSix').show();
        $('.hideOne').hide();
        $('.reHideOne').hide();
        $('.hideTwo').hide();
        $('.reHideTwo').hide();
        $('.hideThree').hide();
        $('.reHideThree').hide();
        $('.hideFour').hide();
        $('.reHideFour').hide();
        $('.hideFive').hide();
        $('.reHideFive').hide();
        $('.hideMenu').removeClass('animated zoomIn');
        $('.hideMenuTwo').removeClass('animated zoomIn');
        $('.hideMenuThree').removeClass('animated zoomIn');
        $('.hideMenuFour').removeClass('animated zoomIn');
        $('.hideMenuFive').removeClass('animated zoomIn');
        $('.hideMenuSix').addClass('animated zoomIn');
    });

    $('.reHideOne').click(function () {
        $('.hideOne').hide();
        $('.reHideOne').hide();
        $('.hideMenu').removeClass('animated zoomIn');
    });
    $('.reHideTwo').click(function () {
        $('.hideTwo').hide();
        $('.reHideTwo').hide();
        $('.hideMenuTwo').removeClass('animated zoomIn');
    });
    $('.reHideThree').click(function () {
        $('.hideThree').hide();
        $('.reHideThree').hide();
        $('.hideMenuThree').removeClass('animated zoomIn');
    });
    $('.reHideFour').click(function () {
        $('.hideFour').hide();
        $('.reHideFour').hide();
        $('.hideMenuFour').removeClass('animated zoomIn');
    });
    $('.reHideFive').click(function () {
        $('.hideFive').hide();
        $('.reHideFive').hide();
        $('.hideMenuFive').removeClass('animated zoomIn');
    });
    $('.reHideSix').click(function () {
        $('.hideSix').hide();
        $('.reHideSix').hide();
        $('.hideMenuSix').removeClass('animated zoomIn');
    });
});