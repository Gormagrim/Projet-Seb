$(document).ready(function () {
    var valueOne = $('#Particulier').val();
    var valueTwo = $('#Professionnel').val();

    $('#Particulier').click(function () {
        if (valueOne === 'Particulier') {
            $('.particularUser').css('display', 'block');
            $('.professionnalUser').css('display', 'none');
            $("#companyName").removeAttr("required");
            $("#siretNumber").removeAttr("required");
            $("#leaderLastname").removeAttr("required");
            $("#leaderFirstname").removeAttr("required");
            $("#firstname").addAttr("required");
            $("#lastname").addAttr("required");
            
        }
    });
    $('#Professionnel').click(function () {
        if (valueTwo === 'Professionnel') {
            $('.particularUser').css('display', 'none');
            $('.professionnalUser').css('display', 'block');
            $("#firstname").removeAttr("required");
            $("#lastname").removeAttr("required");
            $("#companyName").addAttr("required");
            $("#siretNumber").addAttr("required");
            $("#leaderLastname").addAttr("required");
            $("#leaderFirstname").addAttr("required");
            
        }
    });
});
