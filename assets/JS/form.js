$(document).ready(function () {
    var valueOne = $('#Particulier').val();
    var valueTwo = $('#Professionnel').val();

    $('#Particulier').click(function () {
        if (valueOne === '2') {
            $('.particularUser').css('display', 'block');
            $('.professionnalUser').css('display', 'none');
            $("#companyName").removeAttr("required");
            $("#siret").removeAttr("required");
            $("#leaderLastname").removeAttr("required");
            $("#leaderFirstname").removeAttr("required");
            $("#firstname").addAttr("required");
            $("#lastname").addAttr("required");
            
        }
    });
    $('#Professionnel').click(function () {
        if (valueTwo === '3') {
            $('.particularUser').css('display', 'none');
            $('.professionnalUser').css('display', 'block');
            $("#firstname").removeAttr("required");
            $("#lastname").removeAttr("required");
            $("#companyName").addAttr("required");
            $("#siret").addAttr("required");
            $("#leaderLastname").addAttr("required");
            $("#leaderFirstname").addAttr("required");
            
        }
    });
    
    $('#phoneNumber').mask('00 00 00 00 00');
});
