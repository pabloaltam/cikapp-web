/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function (){
$('#txtRut').Rut({
    on_error: function(){ 
        $("#campoRut").addClass("has-error");
    },
    on_success: function(){ 
        $("#campoRut").removeClass("has-error");
        $("#campoRut").addClass("has-success");
    } ,
  format_on: 'keyup'
});

$('#txtEmail').focusout(function (){
   if($('#txtEmail').val().indexOf('@', 0) == -1 || $('#txtEmail').val().indexOf('.', 0) == -1)
   {
       $('#campoEmail').addClass("has-error");
   }else {
       $('#campoEmail').removeClass("has-error");
        $('#campoEmail').addClass("has-success");
   }
});
});

