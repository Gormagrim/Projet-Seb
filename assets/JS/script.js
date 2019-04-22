$(document).ready(function () {
    // Transition effect for navbar 
    $(window).scroll(function () {
        // checks if window is scrolled more than 500px, adds/removes solid class
        if ($(this).scrollTop() > 850) {
            $('.navbar').addClass('solid');
            $('.btn-outline-warning').removeClass('hightBtn');
        } else {
            $('.navbar').removeClass('solid');
            $('.btn-outline-warning').addClass('hightBtn');
        }
    });
});
// A supprimer !
$(document).ready(function() {
	$(".megamenu").on("click", function(e) {
		e.stopPropagation();
	});
});

