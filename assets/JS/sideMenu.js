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
    });

    $('.reHideOne').click(function () {
        $('.hideOne').hide();
        $('.reHideOne').hide();
    });
    $('.reHideTwo').click(function () {
        $('.hideTwo').hide();
        $('.reHideTwo').hide();
    });
    $('.reHideThree').click(function () {
        $('.hideThree').hide();
        $('.reHideThree').hide();
    });
    $('.reHideFour').click(function () {
        $('.hideFour').hide();
        $('.reHideFour').hide();
    });
    $('.reHideFive').click(function () {
        $('.hideFive').hide();
        $('.reHideFive').hide();
    });
    $('.reHideSix').click(function () {
        $('.hideSix').hide();
        $('.reHideSix').hide();
    });
});