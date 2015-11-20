/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$('#conocimientos').click(function () {
    if ($(this).is(':checked')) {
        $('#txtConocimientos').removeProp('disabled');
    } else {
        $('#txtConocimientos').prop('disabled', true)
    }
});
$('#estudios').click(function () {
    if ($(this).is(':checked')) {
        $('#txtEstudios').removeProp('disabled');
    } else {
        $('#txtEstudios').prop('disabled', true)
    }
});
$('#nivIngles').click(function () {
    if ($(this).is(':checked')) {
        $('#txtNivIngles').removeProp('disabled');
    } else {
        $('#txtNivIngles').prop('disabled', true)
    }
});
$('#region').click(function () {
    if ($(this).is(':checked')) {
        $('#txtRegion').removeProp('disabled');
    } else {
        $('#txtRegion').prop('disabled', true)
    }
});
$('#ciudad').click(function () {
    if ($(this).is(':checked')) {
        $('#txtCiudad').removeProp('disabled');
    } else {
        $('#txtCiudad').prop('disabled', true)
    }
});

$("#txtConocimientos").keypress(function () {
    if ($(this).val().length !== 0) {
        var conocimientos = $(this).val();
        var dataString = 'con=' + conocimientos;
        $.ajax({
            type: "POST",
            url: "include/resultado-ajax.php",
            data: dataString,
            cache: false,
            success: function (html)
            {
                $("#scroll").html(html);
            }
        });
    }
});
