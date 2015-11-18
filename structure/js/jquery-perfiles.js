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
                    cache: false,
                    success: function (html)
                    {
                        $("#ciudad").html(html);
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

});