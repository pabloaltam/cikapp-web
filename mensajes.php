<?php
@session_start();
if (isset($_SESSION['idUsuario'])) {
    
} else {
    header('Location: index.php');
}
include 'structure/navbarFinSession.php';
include './include/ejecutar_en_db.php';

$Obj_operaciones = new OperacionesMYSQL();
?>
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

                <li >
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
                    <div class="card ">
                        <div class="header">


                            <div  class="container-fluid">
                                <section  style="padding: 5%;">			
                                    <div class="row">				
                                        <h1 class="text-center">Sistema de mensajería<small></small></h1>	
                                        <hr>
                                    </div>	
                                    <div class="row">
                                        <form method="post" id="formChat" role="form">
                                            <div class="form-group">
                                                <?php
                                                include("include/conexion.php");
                                                $mi_id = $_SESSION['idUsuario'];
                                                $usuario = $_GET['usuario'];
                                                $random_number = rand();

                                                if (isset($_POST['message']) && !empty($_POST['message'])) {
                                                  
                                                    $usuario = $_POST['user'];
                                                    $mensaje = $_POST['message'];
                                                    $revisar_conversacion = "SELECT `hash` FROM `grupo_mensajes` WHERE (`usuario_uno`='$mi_id' AND `usuario_dos`='$usuario') OR (`usuario_uno`='$usuario' AND `usuario_dos`='$mi_id')";
                                                    $resultado = $mysqli->query($revisar_conversacion);
                                                    $row_cnt = mysqli_num_rows($resultado);
                                                    echo "<p>$row_cnt</p>";
                                                    while ($rows = $resultado->fetch_assoc()) {
                                                        $old_hash = $rows['hash'];
                                                    }

                                                    if ($row_cnt >= 1) {

                                                        $guardar_msj = "INSERT INTO `mensajes` VALUES ('', '$old_hash', '$mi_id', '$mensaje',NOW())";
                                                        $resultado = $mysqli->query($guardar_msj);
                                                    } else {

                                                        $iniciar_conversacion = "INSERT INTO `grupo_mensajes` VALUES ('$mi_id', '$usuario','$random_number')";
                                                        $guardar_mensaje = "INSERT INTO `mensajes` VALUES ('', '$random_number', '$mi_id', '$mensaje',NOW())";

                                                        $resultado = $mysqli->query($iniciar_conversacion);
                                                        $resultado = $mysqli->query($guardar_mensaje);
                                                    }
                                                }
                                                $id = $_GET['usuario'];
                                                $consulta_usuarios = "SELECT nombre,apellido,apellidoM,idUsuario FROM usuario WHERE idUsuario = '$id' ";
                                                $resultado = $mysqli->query($consulta_usuarios);
                                                while ($rows = $resultado->fetch_assoc()) {
                                                    $nombre = $rows['nombre'];
                                                    $apellido = $rows['apellido'];
                                                    $apellidoM = $rows['apellidoM'];
                                                    $idUsuario = $rows['idUsuario'];
                                                }
                                                ?>

                                                <p class="help-block">Enviar mensaje a</p>
                                                <input type="hidden" class="form-control" id="user" name="user" value="<?php echo $idUsuario ?>">
                                                <label for="user"><?php echo $nombre . " " . $apellido . " " . $apellidoM; ?></label>
                                            </div>
                                            <div class="form-group">							
                                                <div class="row">
                                                    <div class="col-md-12" >
                                                        <div id="conversation" style="height:200px; border: 1px solid #CCCCCC; padding: 12px;  border-radius: 5px; overflow-x: hidden;">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" value="<?php $usuario?>" name="usuario">
                                                <label for="message">Mensaje</label>
                                                <textarea id="message" name="message" placeholder="Ingresar mensaje"  class="form-control" rows="3"></textarea>
                                            </div>
                                            <input id="send" type="submit" class="btn btn-primary" value="Enviar">			
                                        </form>
                                    </div>
                                </section>	
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

    <?php
    include './structure/footer.php';
    ?> 
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="structure/js/mensaje.min.js"></script>
</body>
</html>

</body>
</html>