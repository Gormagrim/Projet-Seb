$(document).ready(function () {
        $('#lastName').focusout(function () {
        var inputLastname = $('#lastname').val();
        if (inputLastname == ' ') {
            $('.form-control.lastname').removeClass('is-invalid');
        }
    });
});