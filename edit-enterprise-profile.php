<?php include 'structure/navbarFinSession.php'; ?>
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
                <li class="active">
                    <a href="panel-empresa.php">
                        <i class="pe-7s-home"></i>
                        <p>Control Panel</p>
                    </a>
                </li>
                <li>
                    <a href="sistema_mensajes.php">
                        <i class="pe-7s-mail"></i>
                        <p>Mensajes</p>
                    </a>
                </li>
                 <li>
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

    
    
<div class="container-fluid">
    <h1 class="page-header">Edite el perfil de su empresa</h1>
    <?php
    if (isset($_POST['nombre'])) {

        include './include/ejecutar_en_db.php';

        $Obj_operaciones = new OperacionesMYSQL();

        if ($Obj_operaciones->esIgualE($_SESSION['idEmpresa'], $_POST['pwd1']) && $_POST['pwd1'] === $_POST['pwd2']) {
            $idEmpresa = $_SESSION['idEmpresa'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $apellidoM = $_POST['apellidoM'];
            $email = $_POST['email'];
            $cargo = $_POST['cargo'];
            $razonSocial = $_POST['razonSocial'];
            $idTipoEmpresa = $_POST['idTipoEmpresa'];
            $COMUNA_ID = $_POST['COMUNA_ID'];
            $direccionEmpresa = $_POST['direccionEmpresa'];
            $faxEmpresa = $_POST['faxEmpresa'];
            $fonoEmpresa = $_POST['fonoEmpresa'];
            $websiteEmpresa = $_POST['websiteEmpresa'];
            $emailEmpresa = $_POST['emailEmpresa'];
            $pwd1 = $_POST['pwd1'];
            $pwd1 = $_POST['pwd2'];

            if ($_FILES["uploadedfile"]["size"] > 0) {
                $uploadedfileload = true;
                $uploadedfile_size = $_FILES["uploadedfile"]["size"];
                $msg = "";
                if ($_FILES["uploadedfile"]["size"] > 5000000) {
                    $msg = $msg . "El archivo es mayor que 5MB, debes reduzcirlo antes de subirlo<BR>";
                    $uploadedfileload = false;
                }
                if (!($_FILES["uploadedfile"]["type"] == "image/jpeg" OR $_FILES["uploadedfile"]["type"] == "image/gif" OR $_FILES["uploadedfile"]["type"] == "image/png")) {
                    $msg = $msg . " Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos<BR>";
                    $uploadedfileload = false;
                }
                $file_name = $_FILES["uploadedfile"]["name"];
                $add = "uploads/$file_name";
                if ($uploadedfileload) {
                    if (move_uploaded_file($_FILES["uploadedfile"]["tmp_name"], $add)) {
                        if ($Obj_operaciones->editarImagenEmpresa($idEmpresa, $add)) {
                            echo 'ÉXITO: Imagen actualizada, sin embargo la imagen será revisada para ver si cumple con las reglas de Cikapp.<br>';
                        } else {
                            echo 'ERROR: Intentelo más tarde.<br>';
                        }
                    } else {
                        echo "Error al subir el archivo<br>";
                    }
                } else {
                    echo $msg;
                }
            }
            $test = $Obj_operaciones->editarEmpresa($idEmpresa, $email, $cargo, $razonSocial, $faxEmpresa, $fonoEmpresa, $websiteEmpresa, $emailEmpresa, $nombre, $apellido, $apellidoM, $idTipoEmpresa, $COMUNA_ID, $direccionEmpresa);
            if ($test) {
                $_SESSION['nombreEmpleado'] = $nombre;
                $_SESSION['apellidoEmpleado'] = $apellido;

                echo 'ÉXITO: Los datos de la empresa han sido actualizados correctamente.<br>';
            } else {
                echo 'ERROR: Intentelo más tarde por favor.<br>';
            }
        } else {
            echo 'Las contraseñas no coinciden';
        }
    }
    if (isset($_SESSION['idEmpresa'])) {
        $conSession = 'Si';
        include './include/conexion.php';
        $IDempresa = $_SESSION['idEmpresa'];
        $query = "SELECT *FROM empresa WHERE idEmpresa={$IDempresa};";
        $resultado = $mysqli->query($query);
        while ($rows = $resultado->fetch_assoc()) {
            $nombre = $rows['nombre'];
            $apellido = $rows['apellido'];
            $apellidoM = $rows['apellidoM'];
            $email = $rows['email'];
            $cargo = $rows['cargo'];
            $razonSocial = $rows['razonSocial'];
            $idTipoEmpresa = $rows['idTipoEmpresa'];
            $COMUNA_IDempresa = $rows['COMUNA_ID'];
            $direccionEmpresa = $rows['direccionEmpresa'];
            $faxEmpresa = $rows['faxEmpresa'];
            $fonoEmpresa = $rows['fonoEmpresa'];
            $websiteEmpresa = $rows['websiteEmpresa'];
            $emailEmpresa = $rows['emailEmpresa'];
            $pass = $rows['password'];
            $rutaImagen = $rows['rutaImagen'];
        }
    ?>
        <div class="row">
            <form class="form-horizontal" role="form" action="" method="post" name="formDatos" enctype="multipart/form-data">
                <!-- left column -->
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="text-center">
                        
                        <?php
                        if ($rutaImagen === "") {
                            echo '<img src="structure/img/avatar.jpg" class="avatar img-circle img-thumbnail" alt="Foto" id="fotoEmpresa">';
                        } else {
                            echo "<img src='$rutaImagen' class='avatar img-circle img-thumbnail' alt='Foto' id='fotoEmpresa'>";
                        }
                        ?>

                        <div class="alert alert-warning">
                            <i class="fa fa-folder-open"></i>
                            Elige la foto desde tu equipo.
                        </div>
                        <input type="file" class="text-center center-block well well-sm" name="uploadedfile" id="uploadedfile" accept="image/*">
                    </div>
                </div>

                <!-- edit form column -->
                <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
                    <div class="alert alert-info alert-dismissable">
                        <a class="panel-close close" data-dismiss="alert">×</a> 
                        <i class="fa fa-photo"></i>
                        Su foto debe ser tipo <strong>cédula de identidad</strong>, de lo contrario será eliminada.
                    </div>
                    <h3>Información personal</h3>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Nombre:</label>
                        <div class="col-lg-8">
                            <input class="form-control" value="<?php echo $nombre ?>" type="text" name="nombre">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Apellido paterno:</label>
                        <div class="col-lg-8">
                            <input class="form-control" value="<?php echo $apellido ?>" type="text" name="apellido">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Apellido materno:</label>
                        <div class="col-lg-8">
                            <input class="form-control" value="<?php echo $apellidoM ?>" type="text" name="apellidoM">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Correo electrónico:</label>
                        <div class="col-lg-8">
                            <input class="form-control" value="<?php echo $email ?>" type="text" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Nombre de su cargo:</label>
                        <div class="col-lg-8">
                            <input class="form-control" value="<?php echo $cargo ?>" type="text" name="cargo">
                        </div>
                    </div>

                    <h3>Información empresa</h3>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Nombre/Razón social:</label>
                        <div class="col-lg-8">
                            <input class="form-control" value="<?php echo $razonSocial ?>" type="text" name="razonSocial">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Tipo de empresa:</label>
                        <div class="col-lg-3">
                            <div class="ui-select">
                                <select id="tipos" class="form-control" name="idTipoEmpresa">
                                    <?php
                                    require 'include/conexion.php';
                                    $query = "SELECT * FROM tipo_empresa";
                                    if($resultado = $mysqli->query($query)){ //usamos la conexion para dar un resultado a la variable
                                        while ($rows = $resultado->fetch_assoc()) {
                                        $selected = "";
                                        if ($rows['idTipoEmpresa'] === $idTipoEmpresa) {
                                            $selected = "selected='selected'";
                                            }
                                            print(" <option value='".$rows['idTipo_empresa']."' $selected>".$rows['tipoEmpresa']."</option>");//concatenamos los opciones
                                        }
                                    } else {
                                            print("<option>Seleccione un tipo de empresa</option>");
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Pais:</label>
                        <div class="col-lg-3">
                            <div class="ui-select">
                                <select id="pais" class="form-control">
                                    <option value="Chile">Chile</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Región:</label>
                        <div class="col-lg-3">
                            <div class="ui-select">
                                <select id="region" class="form-control">
                                    <?php
                                    require 'include/conexion.php';
                                    $query = "SELECT * FROM region";
                                    if($resultado = $mysqli->query($query)){
                                        $regionID = null;
                                        while ($rows = $resultado->fetch_assoc()) {
                                            $sql = "select REGION_ID from comuna a, provincia b, region c where COMUNA_PROVINCIA_ID = PROVINCIA_ID and PROVINCIA_REGION_ID = REGION_ID and COMUNA_ID=$COMUNA_IDempresa;";
                                            $resultado2 = $mysqli->query($sql);
                                            $selected = null;
                                            while ($rows2 = $resultado2->fetch_assoc()) {
                                                if ($rows['REGION_ID'] === $rows2['REGION_ID']) {
                                                    $selected = "selected='selected'";
                                                    $regionID = $rows2['REGION_ID'];
                                                }
                                            }
                                            print("<option value='" . $rows['REGION_ID'] . "' $selected>" . $rows['REGION_NOMBRE'] . "</option>");
                                        }
                                    } else {
                                            print("<option>Seleccione una region</option>");
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Ciudad:</label>
                        <div class="col-lg-3">
                            <div class="ui-select">
                                <select id="ciudad" class="form-control" name="COMUNA_ID">
                                    <?php
                                    require 'include/conexion.php';
                                    $query = "SELECT COMUNA_ID, COMUNA_NOMBRE FROM comuna, provincia, region where COMUNA_PROVINCIA_ID=provincia.PROVINCIA_ID and provincia.PROVINCIA_REGION_ID=region.REGION_ID and region.REGION_ID=$regionID;";
                                    if ($resultado = $mysqli->query($query)) {
                                        while ($rows = $resultado->fetch_assoc()) {
                                            $selected = "";
                                            if ($rows['COMUNA_ID'] === $COMUNA_IDempresa) {
                                                $selected = "selected='selected'";
                                            }
                                            print("<option value='" . $rows['COMUNA_ID'] . "' $selected>" . $rows['COMUNA_NOMBRE'] . "</option>");
                                        }
                                    } else {
                                        print("<option>Seleccione una ciudad</option>");
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Dirección:</label>
                        <div class="col-lg-8">
                            <input class="form-control" value="<?php echo $direccionEmpresa ?>" type="text" name="direccionEmpresa">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Fax:</label>
                        <div class="col-lg-8">
                            <input class="form-control" value="<?php echo $faxEmpresa ?>" type="text" name="faxEmpresa">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Teléfono:</label>
                        <div class="col-lg-8">
                            <input class="form-control" value="<?php echo $fonoEmpresa ?>" type="text" name="fonoEmpresa">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Sitio web:</label>
                        <div class="col-lg-8">
                            <input class="form-control" value="<?php echo $websiteEmpresa ?>" type="text" name="websiteEmpresa">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email:</label>
                        <div class="col-lg-8">
                            <input class="form-control" value="<?php echo $emailEmpresa ?>" type="text" name="emailEmpresa">
                        </div>
                    </div>
                    <div class="form-group">
                        <p class="col-md-11">Para que los cambios se apliquen debes ingresar tu contraseña en los campos que se encuentran a continuación.</p>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Contraseña:</label>
                        <div class="col-md-8">
                            <input class="form-control" value="" type="password" name="pwd1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Confirmar contraseña:</label>
                        <div class="col-md-8">
                            <input class="form-control" value="" type="password" name="pwd2">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                            <input class="btn btn-primary" value="Guardar cambios" type="submit">
                            <span></span>
                            <input class="btn btn-default" value="Cancelar" type="reset">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
    <script src="structure/jquery/jquery-1.11.3.min.js"></script>
    <script src="structure/js/jquery-perfiles.js"></script>
    <?php
} 
include 'structure/footer.php';
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
<script src="structure/js/tag-it.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>