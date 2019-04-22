function w3_open() {
    document.getElementById("main").style.marginLeft = "15%";
    document.getElementById("mySidebar").style.width = "15%";
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("openNav").style.display = 'none';
}
function w3_close() {
    document.getElementById("main").style.marginLeft = "0%";
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("openNav").style.display = "inline-block";
}

$(function () {
    $('#go').click(function () {
        $('.hideOne').css('display', 'block');
        $('.reHideOne').css('display', 'block');
    });
    $('#charp').click(function () {
        $('.hideTwo').css('display', 'block');
        $('.reHideTwo').css('display', 'block');
    });
    $('#wall').click(function () {
        $('.hideThree').css('display', 'block');
        $('.reHideThree').css('display', 'block');
    });
    $('#menui').click(function () {
        $('.hideFour').css('display', 'block');
        $('.reHideFour').css('display', 'block');
    });
    $('#plomb').click(function () {
        $('.hideFive').css('display', 'block');
        $('.reHideFive').css('display', 'block');
    });
    $('#out').click(function () {
        $('.hideSix').css('display', 'block');
        $('.reHideSix').css('display', 'block');
    });
    $('.reHideOne').click(function () {
        $('.hideOne').css('display', 'none');
        $('.reHideOne').css('display', 'none');
    });
    $('.reHideTwo').click(function () {
        $('.hideTwo').css('display', 'none');
        $('.reHideTwo').css('display', 'none');
    });
    $('.reHideThree').click(function () {
        $('.hideThree').css('display', 'none');
        $('.reHideThree').css('display', 'none');
    });
    $('.reHideFour').click(function () {
        $('.hideFour').css('display', 'none');
        $('.reHideFour').css('display', 'none');
    });
    $('.reHideFive').click(function () {
        $('.hideFive').css('display', 'none');
        $('.reHideFive').css('display', 'none');
    });
    $('.reHideSix').click(function () {
        $('.hideSix').css('display', 'none');
        $('.reHideSix').css('display', 'none');
    });
});