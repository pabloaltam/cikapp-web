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
                <li>
                    <a href="panel-usuario.php">
                        <i class="pe-7s-home"></i>
                        <p>Escritorio</p>
                    </a>
                </li>
                <li class="active">
                    <a href="#">
                        <i class="pe-7s-mail"></i>
                        <p>Mensajes</p>
                    </a>
                </li>
                <li>
                    <a href="edit-user-profile.php">
                        <i class="pe-7s-magic-wand"></i>
                        <p>Editar perfil</p>
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
                                <p class="category">...</p>
                                <a href="mensajes.php">Conversaciones</a>
                                <a href="enviar.php">Comenzar conversación</a>
                            </div>
                            <div class="content">
                                
                                <?php
                                    if(isset($_GET['id']) && !empty($_GET['id'])){
                                ?>
                                        <form method='post'>
                                <?php
                                            if(isset($_POST['mensaje']) && !empty($_POST['mensaje'])) {
                                                require './include/conexion.php';
                                                $mi_id = $_SESSION['idUsuario'];
                                                $usuario = $_GET['id'];
                                                $random_number = rand();
                                                $mensaje = $_POST['mensaje'];
                                                $revisar_conversacion = "SELECT `hash` FROM `grupo_mensajes` WHERE (`usuario_uno`='$mi_id' AND `usuario_dos`='$usuario') OR (`usuario_uno`='$usuario' AND `usuario_dos`='$mi_id')";
                                                $resultado = $mysqli->query($revisar_conversacion);
                                                $row_cnt = mysqli_num_rows($resultado);
                                                echo "<p>$row_cnt</p>";
                                                                                  
                                                    if($row_cnt == 1){
                                                    echo "<p>Conversación ya iniciada!</p>";
                                                    
                                                } else {
                                                $iniciar_conversacion = "INSERT INTO `grupo_mensajes` VALUES ('$mi_id', '$usuario','$random_number')";
                                                $guardar_mensaje = "INSERT INTO `mensajes` VALUES ('', '$random_number', '$mi_id', '$mensaje')";
                                                
                                                $resultado = $mysqli->query($iniciar_conversacion);
                                                $resultado = $mysqli->query($guardar_mensaje);
                                                echo "<p>Conversación iniciada</p>";                                   
                                                }
                                            }
                                                ?>
                                            
                                            Insertar mensaje: <br/>
                                                <textarea name='mensaje' rows='7' cols='60'></textarea>
                                                <br/><br/>
                                                <input type='submit' value='Enviar mensaje' />
                                        </form>
                                <?php
                                    } else {
                                        echo "<b>Seleccionar usuario</b>";
                                        require './include/conexion.php';
                                        
                                         $query = "SELECT `idUsuario`, `nombre`, `apellido` FROM `usuario`";

                                            $resultado = $mysqli->query($query);

                                            while ($usuarios = $resultado->fetch_assoc()) {
                                                
                                            $id = $usuarios['idUsuario'];
                                            $nombre = $usuarios['nombre'];
                                            $apellido = $usuarios['apellido'];
                                            
                                            echo "<p><a href='enviar_mensaje.php?id=$id'>$nombre $apellido</a></p>";
                                        }
                                        
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