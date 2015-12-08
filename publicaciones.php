<?php
include 'structure/navbarFinSession.php';
include './include/ejecutar_en_db.php';
include './publicacion.class.php';

$Obj_operaciones = new OperacionesMYSQL();

$rutEmpresa = $_SESSION['rutEmpresa'];
?>
<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="assets/img/sidebar-5.jpg">

        <!--
    
            Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
            Tip 2: you can also add an image using data-image tag
    
        -->
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="panel-empresa.php" class="simple-text">
                    Panel de Empresa
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="panel-empresa.php">
                        <i class="pe-7s-home"></i>
                        <p>Control Panel</p>
                    </a>
                </li>
                <li class="active">
                    <a href="publicaciones.php">
                        <i class="pe-7s-portfolio"></i>
                        <p>Ofertas publicadas por mi</p>
                    </a>
                </li>
                <li>
                    <a href="filtro-usuarios.php">
                        <i class="pe-7s-folder"></i>
                        <p>Buscar postulantes</p>
                    </a>
                </li>

                <li>
                    <a href="edit-enterprise-profile.php">
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
                <?php
                $obj_publicacion = new publicacion();
                if (isset($_POST['accion'])) {
                    ?>
                    <div class="row">
                        <?php
                        if ($_POST['accion'] == 'editar') {
                            $var_publicacion = $obj_publicacion->obtieneUnaPublicacion($_POST['id'], $rutEmpresa);
                            ?>
                            <div class="col-md-6">
                                <div class="card ">
                                    <div class="header">

                                        <!-- FORMULARIO -->
                                        <div class="container">
                                            <h2>Editar aviso</h2>
                                            <p>Modifique los datos del aviso.</p>   
                                            <form class="form-horizontal" action="publicaciones.php" method="post">
                                                <div class="control-group">
                                                    <label>Titulo del aviso</label>
                                                    <div class="controls">
                                                        <input type="text" name="titulo" value="<?php echo $var_publicacion[0][9]; ?>" class="form-control" placeholder="Titulo del aviso">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label>Nombre del Cargo</label>
                                                    <div class="controls">
                                                        <input type="text" name="nombreCargo" value="<?php echo $var_publicacion[0][1]; ?>" class="form-control" placeholder="Nombre Puesto o Cargo del Trabajo">
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label>Lugar del trabajo</label>
                                                    <div class="controls">
                                                        <select id="txtCiudad" class="form-control"  name='COMUNA_ID'>
                                                            <option value="-1">Seleccione una ciudad...</option>
                                                            <?php
                                                            require 'include/conexion.php';
                                                            $query = "SELECT * FROM comuna ORDER BY COMUNA_NOMBRE";
                                                            $resultado = $mysqli->query($query);
                                                            while ($rows = $resultado->fetch_assoc()) {
                                                                if ($var_publicacion[0][10] == $rows['COMUNA_ID']) {
                                                                    print("<option value='" . $rows['COMUNA_ID'] . "' selected>" . $rows['COMUNA_NOMBRE'] . "</option>");
                                                                } else {
                                                                    print("<option value='" . $rows['COMUNA_ID'] . "'>" . $rows['COMUNA_NOMBRE'] . "</option>");
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label>Tipo de Contrato</label>
                                                    <div class="controls">
                                                        <select name="tipoContrato" class="form-control">
                                                            <option value="1" <?php if ($var_publicacion[0][3] == 1) echo "selected" ?>>A Plazo Fijo </option>
                                                            <option value="2" <?php if ($var_publicacion[0][3] == 2) echo "selected" ?>>A Plazo Indefinido</option>
                                                            <option value="3" <?php if ($var_publicacion[0][3] == 3) echo "selected" ?>>Por Faena</option>
                                                        </select>
                                                    </div>

                                                    <div class="control-group">
                                                        <label>Tipo de Jornada Laboral</label>
                                                        <div class="controls">
                                                            <select name="tipoJornadaLaboral" class="form-control">
                                                                <option value="1" <?php if ($var_publicacion[0][4] == 1) echo "selected" ?>>Free lance</option>
                                                                <option value="2" <?php if ($var_publicacion[0][4] == 2) echo "selected" ?>>Part time (20 hrs semanales)</option>
                                                                <option value="3" <?php if ($var_publicacion[0][4] == 3) echo "selected" ?>>Part time (30 hrs semanales)</option>
                                                                <option value="4" <?php if ($var_publicacion[0][4] == 4) echo "selected" ?>>Full time (45 ó mas horas semanales)</option>
                                                            </select>
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
                                                                <input type="hidden" name="rut" value="<?php echo $rutEmpresa; ?>"/>
                                                                <button type="submit" class="btn btn-primary btn-fill">
                                                                    Actualizar
                                                                </button>
                                                            </div>

                                                        </div>   



                                                    </div>	
                                                </div>
                                            </form>
                                            <!-- FORMULARIO -->



                                            <?php
                                        } elseif ($_POST['accion'] == 'eliminar') {
                                            try {
                                                if ($obj_publicacion->eliminarPublicacion($_POST['id'], $rutEmpresa)) {
                                                    echo "La Publicacion " . $_POST['id'] . " ha sido eliminada";
                                                }
                                            } catch (Exception $e) {
                                                echo "Se ha producido un error : " . $e->getMessage();
                                            }
                                        } elseif ($_POST['accion'] == 'agregar') {
//VARIABLES PARA AGREGAR PUBLICACION
                                            if (isset($_POST["publicacion"])) {
                                                $rut = $rutEmpresa;
                                                $titulo = $_POST['titulo'];
                                                $COMUNA_ID = $_POST['COMUNA_ID'];
                                                $nombreCargo = $_POST["nombreCargo"];
                                                $tipoContrato = $_POST["tipoContrato"];
                                                $tipoJornadaLaboral = $_POST["tipoJornadaLaboral"];
                                                $fechaInicio = $_POST["fechaInicio"];
                                                $publicacion = $_POST["publicacion"];
                                                $tipoPublicacion = $_POST["tipoPublicacion"];
                                                $pass = $_POST["pass"];
                                            }

                                            if (!isset($publicacion) || trim($publicacion) === '') {
                                                
                                            } else {
                                                try {
                                                    $obj_publicacion->agregarPublicacion($rut, $nombreCargo, $lugarTrabajo, $tipoContrato, $tipoJornadaLaboral, $fechaInicio, $publicacion, $tipoPublicacion, $titulo, $COMUNA_ID);
                                                } catch (Exception $e) {
                                                    echo "Se ha producido un error : " . $e->getMessage();
                                                }
                                            }
                                        } else if ($_POST['accion'] == 'actualizar') {

//VARIABLES PARA ACTUALIZAR PUBLICACION
                                            if (isset($_POST["publicacion"])) {
                                                $id = $_POST['id'];
                                                $rut = $rutEmpresa;
                                                $titulo = $_POST['titulo'];
                                                $COMUNA_ID = $_POST['COMUNA_ID'];
                                                $nombreCargo = $_POST["nombreCargo"];
                                                $tipoContrato = $_POST["tipoContrato"];
                                                $tipoJornadaLaboral = $_POST["tipoJornadaLaboral"];
                                                $fechaInicio = $_POST["fechaInicio"];
                                                $publicacion = $_POST["publicacion"];
                                                $tipoPublicacion = $_POST["tipoPublicacion"];
                                                $pass = $_POST["pass"];
                                            }

                                            if (!isset($publicacion) || trim($publicacion) === '') {
                                                
                                            } else {

                                                try {
                                                    if ($obj_publicacion->editaPublicacion($id, $rut, $nombreCargo, $tipoContrato, $tipoJornadaLaboral, $fechaInicio, $publicacion, $tipoPublicacion, $titulo, $COMUNA_ID)) {
                                                        
                                                    }
                                                } catch (Exception $e) {
                                                    echo "Se ha producido un error : " . $e->getMessage();
                                                }
                                            }
                                        }
//GENERAR LISTA DE PUBLICACIONES
                                        ?>
                                        <?php
                                        if ($_POST['accion'] == 'editar') {
                                            ?>

                                        </div>

                                    </div>


                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">Información</h4>

                                    </div>
                                    <div class="content">
                                        <p>Aqui va la información del aviso</p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <?php
                } else {
                    ?>

                    <?php
                }
                ?>


                <div class="card">
                    <div class="header">
                        <h4 class="title">Últimas Publicaciones</h4>
                        <p class="category">Listado de todas las publicaciones realizadas hasta la fecha:</p>
                    </div>
                    <div class="content">
                        <div class="table-responsive table-full-width">
                            <table class="table">
                                <thead>
                                    <tr>

                                        <th>CARGO</th> 
                                        <th>Ubicación</th>
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
                                    if (isset($rutEmpresa)) {
                                        $var_publicaciones = $obj_publicacion->obtienePublicacionesEmpresa($rutEmpresa);
                                        $var_cantidad_publicaciones = count($var_publicaciones);
                                        ?>
                                        <?php for ($j = 0; $j < $var_cantidad_publicaciones; $j++) { ?>
                                            <tr>

                                                <td><?php echo $var_publicaciones[$j][1]; ?></td>
                                                <td><?php echo $var_publicaciones[$j][2]; ?></td>
                                                <td><?php echo $var_publicaciones[$j][3]; ?></td>
                                                <td><?php echo $var_publicaciones[$j][4]; ?></td>
                                                <td><?php echo $var_publicaciones[$j][5]; ?></td>
                                                <td><?php echo $var_publicaciones[$j][6]; ?></td>
                                                <td><?php echo $var_publicaciones[$j][7]; ?></td>
                                                <td><?php echo $var_publicaciones[$j][8]; ?></td>
                                                <td class="td-actions text-right">
                                                    <form method="post">
                                                        <input type="hidden" value="editar" name="accion">
                                                        <input type="hidden" value="<?php echo $var_publicaciones[$j][0]; ?>" name="id">
                                                        <button type="submit" value="Modificar" class="btn btn-info btn-simple btn-xs" data-original-title="Edit Task" title="Modificar">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                    </form>
                                                    <form method="post">
                                                        <input type="hidden" value="eliminar" name="accion">
                                                        <input type="hidden" value="<?php echo $var_publicaciones[$j][0]; ?>" name="id" >
                                                        <button type="submit" class="btn btn-danger btn-simple btn-xs" title="Eliminar" onclick="return confirm('Esta seguro de eliminar la Publicacion <?php echo $var_publicaciones[$j][0]; ?>? ADVERTENCIA: Esta operación no se puede revertir.');" value="Eliminar">
                                                            <i class="fa fa-times"></i>
                                                        </button>                                                                      
                                                    </form>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
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