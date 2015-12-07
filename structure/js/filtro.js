/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    $('#conocimientos').click(function () {
  
        if ($(this).is(':checked')) {
            $('#txtConocimientos').removeAttr('disabled');
        } else {
            $('#txtConocimientos').attr('disabled', true);
            $('#txtConocimientos').val("");
            ajax();
        }
    });
    $('#estudios').click(function () {
   
        if ($(this).is(':checked')) {
            $('#txtEstudios').removeAttr('disabled');
        } else {
            $('#txtEstudios').attr('disabled', true);
            $('#txtEstudios').val("-1");
            ajax();
        }
    });
    $('#nivIngles').click(function () {
 
        if ($(this).is(':checked')) {
            $('#txtNivIngles').removeAttr('disabled');
        } else {
            $('#txtNivIngles').attr('disabled', true);
            $('#txtNivIngles').val("-1");
        ajax();
        }
    });
    $('#region').click(function () {
 
        if ($(this).is(':checked')) {
            $('#txtRegion').removeAttr('disabled');
        } else {
            $('#txtRegion').attr('disabled', true);
            $('#txtRegion').val("-1");
            ajax();
        }
    });
    $('#ciudad').click(function () {

        if ($(this).is(':checked')) {
            $('#txtCiudad').removeAttr('disabled');
        } else {
            $('#txtCiudad').attr('disabled', true);
            $('#txtCiudad').val("-1");
            ajax();
        }
    });

    $('#txtConocimientos').on("keyup", function () {
        ajax();
    });
    $('#txtEstudios').change(function () {
        ajax();
    });
    $('#txtNivIngles').change(function () {
        ajax();
    });
    $('#txtRegion').change(function () {
        ajax();
    });
    $('#txtCiudad').change(function () {
        ajax();
    });

    function ajax() {
        var dataString = "";

        if ($('#conocimientos').is(':checked')) {
            
            var conocimientos = $('#txtConocimientos').val();
            if(conocimientos != "" )
            dataString += 'Con=' + conocimientos + "&";
        }
        if ($('#estudios').is(':checked')) {
            var estudio = $('#txtEstudios').val();
            if(estudio != "-1" )
            dataString += 'Est=' + estudio + "&";
        }
        if ($('#nivIngles').is(':checked')) {
            var nivIngles = $('#txtNivIngles').val();
            if(nivIngles != "-1" )
            dataString += 'Nvi=' + nivIngles + "&";
        }
        if ($('#region').is(':checked')) {
            var region = $('#txtRegion').val();
            if(region != "-1" )
            dataString += 'Reg=' + region + "&";
        }
        if ($('#ciudad').is(':checked')) {
            var ciudad = $('#txtCiudad').val();
            if(ciudad != "-1" )
            dataString += 'Ciu=' + ciudad;
        }
        if (dataString !== "") {
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
            $("#scroll").html("<p>Seleccione al menos una opción y escriba o elija segun corresponda...</p>");
        }
    }
    $(document).ajaxSend(function(){
        $("#scroll").html("<p>Seleccione al menos una opción y escriba o elija segun corresponda...</p>");
    $("#scroll").html("<p>Buscando a los mejores postulantes...</p>");
});
})