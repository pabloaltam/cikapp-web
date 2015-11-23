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

$(".input-ajax").change(function () {
    var dataString="";
    
    if ($('#conocimientos').is(':checked')) {
         var conocimientos = $('#txtConocimientos').val();
        dataString += 'Con=' + conocimientos+"&";
    }
    if ($('#estudios').is(':checked')) {
        var estudio = $('#txtEstudios').val();
        dataString += 'Est=' + estudio+"&";
    }
    if ($('#nivIngles').is(':checked')) {
        var nivIngles = $('#txtNivIngles').val();
        dataString += 'Nvi=' + nivIngles+"&";
    }
    if ($('#region').is(':checked')) {
        var region = $('#txtRegion').val();
        dataString += 'Reg=' + region+"&";
    }
    if ($('#ciudad').is(':checked')) {
        var ciudad = $('#txtCiudad').val();
        dataString += 'Ciu=' + ciudad;
    }
    if(dataString!==""){
        $.ajax({
            type: "GET",
            url: "include/resultado-ajax.php?",
            data: dataString,
            cache: false,
            success: function (html)
            {
                $("#scroll").html(html);
            }
        });
    } else {
        $("#scroll").html("<h1>Lo sentimos: </h1>" + dataString);
    }
})
