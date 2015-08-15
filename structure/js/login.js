/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*
$(document).ready(function () {
    $('#txtRut').Rut({
        on_error: function () {
            $("#campoRut").addClass("has-error");
            $("#imgRut").removeClass("fa-user");
            $("#imgRut").removeClass("fa-check-circle");
            $("#imgRut").addClass("fa-exclamation-circle");
        },
        on_success: function () {
            $("#campoRut").removeClass("has-error");
            $("#campoRut").addClass("has-success");
            $("#imgRut").removeClass("fa-exclamation-circle");
            $("#imgRut").addClass("fa-check-circle");
        },
        format_on: 'keyup'
    });

    $('#txtEmail').focusout(function () {
        if ($('#txtEmail').val() == "") {
            $('#campoEmail').removeClass("has-error");
            $("#imgEmail").removeClass("fa-exclamation-circle ");
            $("#imgEmail").removeClass("fa-check-circle");
            $("#imgEmail").addClass("fa-envelope");
            $('#campoEmail').removeClass("has-error");
            $('#campoEmail').removeClass("has-success");
        } else {
            if ($('#txtEmail').val().indexOf('@', 0) == -1 || $('#txtEmail').val().indexOf('.', 0) == -1)
            {
                $("#imgEmail").addClass("fa-exclamation-circle");
                $('#campoEmail').addClass("has-error");
                $("#imgEmail").removeClass("fa-envelope");
            } else {
                $('#campoEmail').removeClass("has-error");
                $('#campoEmail').addClass("has-success");
                $("#imgEmail").addClass("fa-check-circle");
                $("#imgEmail").removeClass("fa-exclamation-circle");
                $("#imgEmail").removeClass("fa-envelope");
            }
        }

    });

    $("#txtRut").focusout(function () {
        if ($("#txtRut").val() !== "") {
            var parametros = {
                "txtRut": $("#txtRut").val()
            };
            $.ajax({
                data: parametros,
                url: 'include/resultado-ajax.php',
                type: 'post',
                beforeSend: function () {
                    $("#imgRut").removeClass("fa-user");
                    $("#imgRut").removeClass("fa-check-circle");
                    $("#imgRut").removeClass("fa-exclamation-circle");
                    $("#imgRut").addClass("fa-spinner fa-pulse");
                },
                success: function (response) {
                    if (response) {
                        $("#imgRut").removeClass("fa-spinner fa-pulse");
                        $("#campoRut").addClass("has-error");
                        $("#imgRut").removeClass("fa-user");
                        $("#imgRut").removeClass("fa-check-circle");
                        $("#imgRut").addClass("fa-exclamation-circle");
                    } else {
                        $("#imgRut").removeClass("fa-spinner fa-pulse");
                        $("#campoRut").removeClass("has-error");
                        $("#campoRut").addClass("has-success");
                        $("#imgRut").removeClass("fa-exclamation-circle");
                        $("#imgRut").addClass("fa-check-circle");
                    }
                }
            });
        }
    });
});

*/