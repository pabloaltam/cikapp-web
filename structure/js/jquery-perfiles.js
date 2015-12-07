/**
 * Created by Victor on 25-08-2015.
 */
$(document).ready(function () {
    $("#region").change(function ()
    {
        var id = $(this).val();
        var dataString = 'id=' + id;

        $.ajax
                ({
                    type: "POST",
                    url: "include/resultado-ajax.php",
                    data: dataString,
                    beforeSend:
                            function (){
                                $("#ciudad").html("<option>Espere...</option>");
                                $("#ciudad").attr("disabled",true);
                            },
                    cache: false,
                    success: function (html)
                    {
                        $("#ciudad").html(html);
                        $('#ciudad').removeAttr("disabled");
                    }
                });

    });
    
    

    function mostrarImagen(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#fotoUsuario').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            $('#fotoUsuario').attr('src', "structure/img/avatar.jpg");
        }
    }

    $('#uploadedfile').change(function () {
        mostrarImagen(this);
    });
    $('[data-toggle="popover"]').popover();
    
    $('#chkBasica').change(function (){
            $('.chkMedia').removeClass('disabled'); 
    });
    
    $('#video').change(function (){
        var ifrmVideo =  $('#video').val();
        var urlVideo = "https://www.youtube.com/embed/" + ifrmVideo.substring(32);
        $('#ifrmVideo').attr('src', urlVideo)
        $('#ifrmVideo').addClass("full-video")
    });

});
 $( window ).load(function() {
        console.log( "window loaded" );
    });