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
                <li>
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

                <li class="active">
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



                            <?php
                            $obj_publicacion = new publicacion();

                            if ($_GET['accion'] == 'editar') {
                                $var_publicacion = $obj_publicacion->obtieneUnaPublicacion($_GET['id'], '11111111-1');
                                ?>
                                <!-- FORMULARIO -->
                                <div class="container">
                                    <form class="form-horizontal" action="publicaciones.php" method="get">
                                        <div class="control-group">
                                            <label>Nombre del Cargo</label>
                                            <div class="controls">
                                                <input type="text" name="nombreCargo" value="<?php echo $var_publicacion[0][1]; ?>" class="form-control" placeholder="Nombre Puesto o Cargo del Trabajo">
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label>Lugar del trabajo</label>
                                            <div class="controls">
                                                <input type="text" name="lugarTrabajo" value="<?php echo $var_publicacion[0][2]; ?>" class="form-control" placeholder="Lugar del Trabajo">
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label>Tipo de Contrato</label>
                                            <div class="controls">
                                                <input type="text" name="tipoContrato" value="<?php echo $var_publicacion[0][3]; ?>" class="form-control" placeholder="Tipo del Contrato del Trabajo">
                                            </div>

                                            <div class="control-group">
                                                <label>Tipo de Jornada Laboral</label>
                                                <div class="controls">
                                                    <input type="text" name="tipoJornadaLaboral" value="<?php echo $var_publicacion[0][4]; ?>" class="form-control" placeholder="Tipo de Jornada Laboral del Trabajo">
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label>Fecha de Inicio</label>
                                                <div class="controls">
                                                    <input type="date" class="form-control" value="<?php echo substr($var_publicacion[0][5], 0, 10); ?>" name="fechaInicio">
                                                </div>
                                            </div>      
                                            <div class="control-group">
                                                <label>Publicación</label>
                                                <div class="controls">
                                                    <textarea name="publicacion" class="form-control" placeholder="Descripcion breve y funciones"><?php echo $var_publicacion[0][6]; ?></textarea>
                                                </div>
                                            </div> 

                                            <div class="control-group">
                                                <label>Tipo del Plan de Publicacion</label>
                                                <div class="controls">
                                                    <?php if ($var_publicacion[0][7] == 'A') { ?>
                                                        <select name="tipoPublicacion" value="<?php echo $var_publicacion[0][7]; ?>" class="form-control"><option selected>A</option></option><option>AA</option><option>AAA</option><option>Nicho</option></select>
                                                    <?php } else if ($var_publicacion[0][7] == 'AA') {
                                                        ?>
                                                        <select name="tipoPublicacion" value="<?php echo $var_publicacion[0][7]; ?>" class="form-control"><option>A</option></option><option selected>AA</option><option>AAA</option><option>Nicho</option></select>
                                                    <?php } else if ($var_publicacion[0][7] == 'AAA') {
                                                        ?>
                                                        <select name="tipoPublicacion" value="<?php echo $var_publicacion[0][7]; ?>" class="form-control"><option>A</option></option><option>AA</option><option selected>AAA</option><option>Nicho</option></select>
                                                    <?php } else {
                                                        ?>
                                                        <select name="tipoPublicacion" value="<?php echo $var_publicacion[0][7]; ?>" class="form-control"><option>A</option></option><option>AA</option><option>AAA</option><option selected>Nicho</option></select>
                                                    <?php }
                                                    ?>
                                                </div>
                                            </div>    

                                            <div class="control-group">
                                                <label>Confirmar Contraseña</label>
                                                <div class="controls">
                                                    <input type="password" name="pass" class="form-control" placeholder="Clave">

                                                </div>

                                                <div class="control-group">
                                                    <label></label>
                                                    <div class="controls">
                                                        <input type="hidden" name="id" value="<?php echo $var_publicacion[0][0]; ?>"/>
                                                        <input type="hidden" name="accion" value="actualizar"/>
                                                        <input type="hidden" name="rut" value="11111111-1"/>
                                                        <button type="submit" class="btn btn-primary">
                                                            Actualizar
                                                        </button>
                                                    </div>

                                                </div>   

                                                </form>

                                            </div>	

                                            <!-- FORMULARIO -->



                                            <?php
                                        } else if ($_GET['accion'] == 'eliminar') {
                                            try {
                                                $obj_publicacion->eliminarPublicacion($_GET['id'], '11111111-1');
                                            } catch (Exception $e) {
                                                echo "Se ha producido un error : " . $e->getMessage();
                                            }
                                            echo "La Publicacion " . $_GET['id'] . " ha sido eliminada";
                                        } else if ($_GET['accion'] == 'agregar') {
//VARIABLES PARA AGREGAR PUBLICACION
                                            if (isset($_GET["publicacion"])) {
                                                $rut = $_GET['rut'];
                                                $nombreCargo = $_GET["nombreCargo"];
                                                $lugarTrabajo = $_GET["lugarTrabajo"];
                                                $tipoContrato = $_GET["tipoContrato"];
                                                $tipoJornadaLaboral = $_GET["tipoJornadaLaboral"];
                                                $fechaInicio = $_GET["fechaInicio"];
                                                $publicacion = $_GET["publicacion"];
                                                $tipoPublicacion = $_GET["tipoPublicacion"];
                                                $pass = $_GET["pass"];
                                            }

                                            if (!isset($publicacion) || trim($publicacion) === '') {
                                                
                                            } else {
                                                try {
                                                    $obj_publicacion->agregarPublicacion($rut, $nombreCargo, $lugarTrabajo, $tipoContrato, $tipoJornadaLaboral, $fechaInicio, $publicacion, $tipoPublicacion);
                                                } catch (Exception $e) {
                                                    echo "Se ha producido un error : " . $e->getMessage();
                                                }
                                            }
                                        } else if ($_GET['accion'] == 'actualizar') {

//VARIABLES PARA ACTUALIZAR PUBLICACION
                                            if (isset($_GET["publicacion"])) {
                                                $id = $_GET['id'];
                                                $rut = $_GET['rut'];
                                                $nombreCargo = $_GET["nombreCargo"];
                                                $lugarTrabajo = $_GET["lugarTrabajo"];
                                                $tipoContrato = $_GET["tipoContrato"];
                                                $tipoJornadaLaboral = $_GET["tipoJornadaLaboral"];
                                                $fechaInicio = $_GET["fechaInicio"];
                                                $publicacion = $_GET["publicacion"];
                                                $tipoPublicacion = $_GET["tipoPublicacion"];
                                                $pass = $_GET["pass"];
                                            }

                                            if (!isset($publicacion) || trim($publicacion) === '') {
                                                
                                            } else {
                                                echo "Publicacion Actualizada";
                                                try {
                                                    $obj_publicacion->editaPublicacion($id, $rut, $nombreCargo, $lugarTrabajo, $tipoContrato, $tipoJornadaLaboral, $fechaInicio, $publicacion, $tipoPublicacion);
                                                } catch (Exception $e) {
                                                    echo "Se ha producido un error : " . $e->getMessage();
                                                }
                                            }
                                        }


//GENERAR LISTA DE PUBLICACIONES
                                        ?>
                                        <div class="container">
                                            <h2>Últimas Publicaciones</h2>
                                            <p>Listado de todas las publicaciones realizadas hasta la fecha:</p>            
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>CARGO</th> 
                                                        <th>LUGAR DE TRABAJO</th>
                                                        <th>CONTRATO</th>
                                                        <th>JORNADA LABORAL</th>
                                                        <th>FECHA INICIO</th>
                                                        <th>DESCRIPCION</th>
                                                        <th>TIPO</th>
                                                        <th>PUBLICADO EL</th>
                                                        <th>ACCIONES</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
<?php
$var_publicaciones = $obj_publicacion->obtienePublicacionesUsuario($idEmpresa);
$var_cantidad_publicaciones = count($var_publicaciones);
?>
<?php for ($j = 0; $j < $var_cantidad_publicaciones; $j++) { ?>
                                                        <tr>
                                                            <td><?php echo $var_publicaciones[$j][0]; ?></td>
                                                            <td><?php echo $var_publicaciones[$j][1]; ?></td>
                                                            <td><?php echo $var_publicaciones[$j][2]; ?></td>
                                                            <td><?php echo $var_publicaciones[$j][3]; ?></td>
                                                            <td><?php echo $var_publicaciones[$j][4]; ?></td>
                                                            <td><?php echo $var_publicaciones[$j][5]; ?></td>
                                                            <td><?php echo $var_publicaciones[$j][6]; ?></td>
                                                            <td><?php echo $var_publicaciones[$j][7]; ?></td>
                                                            <td><?php echo $var_publicaciones[$j][8]; ?></td>
                                                            <td><a href="publicaciones.php?accion=editar&id=<?php echo $var_publicaciones[$j][0]; ?>"><input type="button" style="-moz-border-radius: 2px;border-radius:2px;color: green;" value="Editar"> </a>&nbsp;<a onclick="return confirm('Esta seguro de eliminar la Publicacion <?php echo $var_publicaciones[$j][0]; ?>?');" href="publicaciones.php?accion=eliminar&id=<?php echo $var_publicaciones[$j][0]; ?>"><input type="button" style="-moz-border-radius: 2px;border-radius:2px;color: red;" value="Eliminar"> </a></td>
                                                        </tr>
<?php }; ?>
                                                </tbody>
                                            </table>
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
            </body>
            </html>