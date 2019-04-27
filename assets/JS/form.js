$(document).ready(function () {
    var valueOne = $('#Particulier').val();
    var valueTwo = $('#Professionnel').val();

    $('#Particulier').click(function () {
        if (valueOne === 'Particulier') {
            $('.particularUser').css('display', 'block');
            $('.professionnalUser').css('display', 'none');
        }
    });
    $('#Professionnel').click(function () {
        if (valueTwo === 'Professionnel') {
            $('.particularUser').css('display', 'none');
            $('.professionnalUser').css('display', 'block');
        }
    });
});
