<?php include 'structure/navbarFinSession.php'; ?>

<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    Panel de usuario
                </a>
            </div>

            <ul class="nav">
                 <li >
                    <a href="panel-usuario.php">
                        <i class="pe-7s-home"></i>
                        <p>Escritorio</p>
                    </a>
                </li>
                <li class="active">
                    <a href="sistema_mensajes.php">
                        <i class="pe-7s-mail"></i>
                        <p>Mensajes</p>
                    </a>
                </li>
                 <li>
                    <a href="mostrar-avisos.php">
                        <i class="pe-7s-portfolio"></i>
                        <p>Ofertas de empleos</p>
                    </a>
                </li>
                 <li>
                    <a href="mis-postulaciones.php">
                        <i class="pe-7s-folder"></i>
                        <p>Mis postulaciones</p>
                    </a>
                </li>
                
                <li>
                    <a href="edit-user-profile.php">
                        <i class="pe-7s-magic-wand"></i>
                        <p>Editar perfil</p>
                    </a>
                </li>
                <li>
                    <a href="mostrar-usuarios.php">
                        <i class="pe-7s-users"></i>
                        <p>Personas</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button> -->
                    <a class="navbar-brand" href="#">Usuario</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">

                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-envelope"></i>
                                    <b class="caret"></b>
                                    <span class="notification">1</span>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Mensaje 1</a></li>
                                <li><a href="#">Mensaje 2</a></li>
                              </ul>
                        </li>
                                                <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li>

                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">

                    </div>

                    <div class="col-md-8">

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Sistema de mensajes privados</h4>
                                <p class="category">Conversaciones</p>
                            </div>
                            <div class="content">
                            <?php
                                $mi_id = $_SESSION['idUsuario']; 
                                    require './include/conexion.php';
                                    $obtener_mensajes = "SELECT `hash`, `usuario_uno`, `usuario_dos` FROM grupo_mensajes WHERE usuario_uno='$mi_id' OR usuario_dos='$mi_id' ";
                                    $mostrar_usuarios = $mysqli->query($obtener_mensajes);

                                    while ($rows = $mostrar_usuarios->fetch_assoc()) {
                                        $hash = $rows['hash'];
                                        $usuario_uno = $rows['usuario_uno'];
                                        $usuario_dos = $rows['usuario_dos'];
                                        
                                        if($usuario_uno == $mi_id){
                                            $seleccionar_id = $usuario_dos;
                                        } else {
                                            $seleccionar_id = $usuario_uno;
                                        }
                                            $obtener_usuario = "SELECT `nombre`,`apellido` FROM usuario WHERE idUsuario='$seleccionar_id' ";
                                            $resultado = $mysqli->query($obtener_usuario);
                                            while ($rows = $resultado->fetch_assoc()) {
                                            $seleccionar_nombre = $rows['nombre'];
                                            $seleccionar_apellido = $rows['apellido'];
                                        }
                                        
                                        echo "<p><a href='mensajes.php?usuario=$usuario_dos'>$seleccionar_nombre $seleccionar_apellido</a></p>";
                                    }
                                
                            ?>

                                <div class="footer">
                                    <div class="legend">
                                        <i class="fa fa-circle text-info"></i> Hoy
                                        <i class="fa fa-circle text-danger"></i> Ayer
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-check"></i> Cikapp noticias
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">Tareas</h4>
                                <p class="category">Cosas por hacer</p>
                            </div>
                            <div class="content">
                                <div class="table-full-width">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label class="checkbox">
                                                        <input type="checkbox" value="" data-toggle="checkbox">
                                                    </label>
                                                </td>
                                                <td>Tarea1</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkbox">
                                                        <input type="checkbox" value="" data-toggle="checkbox" checked="">
                                                    </label>
                                                </td>
                                                <td>Tarea1</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkbox">
                                                        <input type="checkbox" value="" data-toggle="checkbox" checked="">
                                                    </label>
                                                </td>
                                                <td>Tarea1
</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkbox">
                                                        <input type="checkbox" value="" data-toggle="checkbox">
                                                    </label>
                                                </td>
                                                <td>Tarea1</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkbox">
                                                        <input type="checkbox" value="" data-toggle="checkbox">
                                                    </label>
                                                </td>
                                                <td>Tarea1</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="checkbox">
                                                        <input type="checkbox" value="" data-toggle="checkbox">
                                                    </label>
                                                </td>
                                                <td>Tarea1</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="footer">
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> Actualizado hace 3 minutos
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Inicio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Nosotros
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Nosotros
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; 2015 <a href="http://www.creative-tim.com">Cikapp</a>
                </p>
            </div>
        </footer>

    </div>
</div>

    <script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            $.notify({
                icon: 'pe-7s-gift',
                message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

            },{
                type: 'info',
                timer: 4000
            });

        });
    </script>
<?php include 'structure/footer.php';?>


