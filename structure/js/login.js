/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    $('.collapse').collapse();
    $('#rut').Rut({
        on_error: function () {
             $('#btnIniciar').prop("disabled",true);
            $("#txtRut").addClass("has-error");
            $("#imgRut").removeClass("fa-user");
            $("#imgRut").removeClass("fa-check-circle");
            $("#imgRut").addClass("fa-exclamation-circle");
           
        },
        on_success: function () {
            
            $("#txtRut").removeClass("has-error");
            $("#rut").addClass("has-success");
            $("#imgRut").removeClass("fa-exclamation-circle");
            $("#imgRut").addClass("fa-check-circle");
            if ($('#pass').val() != "") {
                $('#btnIniciar').removeAttr("disabled");
                $('#pass').focus();
            }
        },
        format_on: 'keyup'
    });

    $('#pass').keyup(function () {
        if(!$('#txtRut').hasClass('has-error')){
            $('#btnIniciar').removeAttr("disabled");
        }
    });
    $('#pass').focusin(function (){
         if($('#pass').val()=="")
         {
              $('#btnIniciar').prop("disabled",true);
         }
    });
    
    $('#pass').focusout(function (){
         if($('#pass').val()=="")
         {
              $('#btnIniciar').prop("disabled",true);
         }
    });
    
});