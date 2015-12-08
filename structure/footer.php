
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="structure/js/light-bootstrap-dashboard.js"></script>
<script src="structure/bstrap/js/bootstrap.min.js"></script>

<script src="structure/js/tag-it.js" type="text/javascript" charset="utf-8"></script>
<script src="structure/js/jquery.Rut.min.js"></script>
<script src="structure/js/filtro.js"></script>
<script src="structure/js/jquery-perfiles.js"></script>


<link href="structure/fawesome/css/font-awesome.min.css" rel="stylesheet">
<!--  Checkbox, Radio & Switch Plugins -->
<script src="structure/js/bootstrap-checkbox-radio-switch.js"></script>
<!--  Charts Plugin -->
<script src="structure/js/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="structure/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="structure/js/login.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#exito').alert();
        demo.initChartist();

        $.notify({
            icon: 'pe-7s-gift',
            message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

        }, {
            type: 'info',
            timer: 4000
        });

    });
</script>
<script type="text/javascript" >
    $("#myTags").tagit({
        fieldName: "areasInteres[]",
        availableTags: ["Tecnologia", "Agronomia", "Salud", "Finanzas", "Contabilidad", "Programación", "Proyectos", "Informática", "Redes y Telecomunicaciones", "Innovación", "Pesca"],
        caseSensitive: true,
        allowSpaces: true,
        tagLimit: 3
    });
</script>
</body>
</html>

