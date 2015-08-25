/**
 * Created by Victor on 25-08-2015.
 */
$(document).ready(function (){
    $("#region").change(function()
    {
        var id=$(this).val();
        var dataString = 'id='+ id;

        $.ajax
        ({
            type: "POST",
            url: "include/resultado-ajax.php",
            data: dataString,
            cache: false,
            success: function(html)
            {
                $("#ciudad").html(html);
            }
        });

    });
});