$(document).ready(function () {

    // para sitios de escritorios
    $('#show').mousedown(function () { 
        $('#pass').removeAttr('type');
    });
    $('#show').mouseup(function () { 
        $('#pass').attr('type','password');
    });


    // para moviles 

});