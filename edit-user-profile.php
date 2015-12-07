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
                    <div class="col-md-4">

                    </div>

                    <div class="col-md-8">

                    </div>
                </div>


                <div class="row">
                    <div class="card ">
                        <div class="header">
                            <h4 class="title">Edita tu Perfil</h4>
                            <!--CODIGO IMAGENES -->
                            <?php
                            if (isset($_POST['nombre'])) {




                                if ($Obj_operaciones->esIgual($_SESSION['idUsuario'], $_POST['pwd1']) && $_POST['pwd1'] === $_POST['pwd2']) {
                                    $idUsuario = $_SESSION['idUsuario'];
                                    $nombre = $_POST['nombre'];
                                    $apellido = $_POST['apellido'];
                                    $apellidoM = $_POST['apellidoM'];
                                    $email = $_POST['email'];
                                    $skype = $_POST['skype'];
                                    $COMUNA_ID = $_POST['COMUNA_ID'];
                                    $video = $_POST['video'];
                                    if (isset($_POST['selEducacion'])) {
                                        $selEducacion = $_POST['selEducacion'];
                                        if ($Obj_operaciones->comprobarUsuario($idUsuario)) {
                                            echo 'Agrego';
                                            $Obj_operaciones->agregarEstudios($idUsuario, $selEducacion);
                                        } else {
                                            echo "Actualizo ";
                                            $Obj_operaciones->actualizarEstudios($idUsuario, $selEducacion);
                                        }
                                    }


//
//                                    if (isset($_POST['chkBasica'])) {
//                                        $chkBasica = $_POST['chkBasica'];
//                                        if ($Obj_operaciones->comprobarUsuarioEducacion($idUsuario, $chkBasica)) {
//                                            $Obj_operaciones->agregarEstudios($idUsuario, $chkBasica);
//                                        }
//                                    }
//                                    if (isset($_POST['chkMedia'])) {
//                                        $chkMedia = $_POST['chkMedia'];
//                                        if ($Obj_operaciones->comprobarUsuarioEducacion($idUsuario, $chkMedia)) {
//                                            $Obj_operaciones->agregarEstudios($idUsuario, $chkMedia);
//                                        }
//                                    }
//                                    if (isset($_POST['chkcft'])) {
//                                        $chkcft = $_POST['chkcft'];
//                                        if ($Obj_operaciones->comprobarUsuarioEducacion($idUsuario, $chkcft)) {
//                                            $Obj_operaciones->agregarEstudios($idUsuario, $chkcft);
//                                        }
//                                    }
//                                    if (isset($_POST['chkIp'])) {
//                                        $chkIp = $_POST['chkIp'];
//                                        if ($Obj_operaciones->comprobarUsuarioEducacion($idUsuario, $chkIp)) {
//                                            $Obj_operaciones->agregarEstudios($idUsuario, $chkIp);
//                                        }
//                                    }
//                                    if (isset($_POST['chkUniversidad'])) {
//                                        $chkUniversidad = $_POST['chkUniversidad'];
//                                        if ($Obj_operaciones->comprobarUsuarioEducacion($idUsuario, $chkUniversidad)) {
//                                            $Obj_operaciones->agregarEstudios($idUsuario, $chkUniversidad);
//                                        }
//                                    }
//                                    if (isset($_POST['chkOtro'])) {
//                                        $chkOtro = $_POST['chkOtro'];
//                                        if ($Obj_operaciones->comprobarUsuarioEducacion($idUsuario, $chkOtro)) {
//                                            $Obj_operaciones->agregarEstudios($idUsuario, $chkOtro);
//                                        }
//                                    }


                                    if (isset($_POST['areasInteres'][0], $_POST['areasInteres'][1], $_POST['areasInteres'][2])) {
                                        $areaInteres = $_POST['areasInteres'][0] . "," . $_POST['areasInteres'][1] . "," . $_POST['areasInteres'][2];
                                    } elseif (isset($_POST['areasInteres'][0], $_POST['areasInteres'][1])) {
                                        $areaInteres = $_POST['areasInteres'][0] . "," . $_POST['areasInteres'][1];
                                    } elseif (isset($_POST['areasInteres'][0], $_POST['areasInteres'][2])) {
                                        $areaInteres = $_POST['areasInteres'][0] . "," . $_POST['areasInteres'][2];
                                    } elseif (isset($_POST['areasInteres'][1], $_POST['areasInteres'][2])) {
                                        $areaInteres = $_POST['areasInteres'][1] . "," . $_POST['areasInteres'][2];
                                    } elseif (isset($_POST['areasInteres'][0])) {
                                        $areaInteres = $_POST['areasInteres'][0];
                                    } elseif (isset($_POST['areasInteres'][1])) {
                                        $areaInteres = $_POST['areasInteres'][1];
                                    } elseif (isset($_POST['areasInteres'][2])) {
                                        $areaInteres = $_POST['areasInteres'][2];
                                    } else {
                                        $areaInteres = "";
                                    }
                                    $idIngles = $_POST['idIngles'];

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
                                                if ($Obj_operaciones->editarImagenUsuario($idUsuario, $add)) {
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


                                    $test = $Obj_operaciones->editarUsuario($idUsuario, $nombre, $apellido, $apellidoM, $email, $skype, $COMUNA_ID, $areaInteres, $idIngles, $video);

                                    if ($test) {
                                        $_SESSION['nombre'] = $nombre;
                                        $_SESSION['apellido'] = $apellido;

                                        echo 'ÉXITO: Los datos del usuario han sido actualizados correctamente.<br>';
                                    } else {
                                        echo 'ERROR: Intentelo más tarde.<br>';
                                    }
                                } else {
                                    echo 'INFO: Las contraseñas no coinciden';
                                }
                            }
                            if (isset($_SESSION['idUsuario'])) {

                                $conSession = 'Si';
                                include './include/conexion.php';
                                $IDusuario = $_SESSION['idUsuario'];
                                $query = "SELECT *FROM usuario WHERE idUsuario={$IDusuario};";
                                $resultado = $mysqli->query($query);
                                while ($rows = $resultado->fetch_assoc()) {
                                    $nombre = $rows['nombre'];
                                    $apellido = $rows['apellido'];
                                    $apellidoM = $rows['apellidoM'];
                                    $email = $rows['email'];
                                    $skype = $rows['skype'];
                                    $COMUNA_IDusuario = $rows['COMUNA_ID'];
                                    $nivelIngles = $rows['idIngles'];
                                    $pass = $rows['password'];
                                    $rutaImagen = $rows['rutaImagen'];
                                    $areaInteres = $rows["areasInteres"];
                                    $video1 = $rows['video'];
                                }
                                ?>
                                <div class="row">
                                    <form class="form-horizontal" role="form" action="" method="post" name="formDatos" enctype="multipart/form-data">
                                        <!-- left column -->
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <div class="text-center">
                                                <?php
                                                if ($rutaImagen === "") {
                                                    echo '<img src="structure/img/avatar.jpg" width="200" height="200" class="avatar img-circle img-thumbnail" alt="Foto" id="fotoUsuario" >';
                                                } else {
                                                    echo "<img src='$rutaImagen' width='200' height='200' class='img-circle img-responsive img-thumbnail' alt='Foto' id='fotoUsuario'>";
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
                                                Tu foto debe ser tipo <strong>cédula de identidad</strong>, de lo contrario será eliminada.
                                            </div>
                                            <fieldset>
                                                <legend>Información personal</legend>

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
                                                                $resultado = $mysqli->query($query);
                                                                $regionID = null;
                                                                while ($rows = $resultado->fetch_assoc()) {
                                                                    $sql = "select REGION_ID from comuna a, provincia b, region c where COMUNA_PROVINCIA_ID = PROVINCIA_ID and PROVINCIA_REGION_ID = REGION_ID and COMUNA_ID=$COMUNA_IDusuario;";
                                                                    $resultado2 = $mysqli->query($sql);
                                                                    $selected = null;
                                                                    if ($resultado2 = $mysqli->query($sql)) {
                                                                        while ($rows2 = $resultado2->fetch_assoc()) {
                                                                            if ($rows['REGION_ID'] == $rows2['REGION_ID']) {
                                                                                $selected = "selected='selected'";
                                                                                $regionID = $rows2['REGION_ID'];
                                                                            }
                                                                        }
                                                                        print("<option value='" . $rows['REGION_ID'] . "' $selected>" . $rows['REGION_NOMBRE'] . "</option>");
                                                                    } else {
                                                                        print("<option value='" . $rows['REGION_ID'] . "'>" . $rows['REGION_NOMBRE'] . "</option>");
                                                                    }
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
                                                                        if ($rows['COMUNA_ID'] === $COMUNA_IDusuario) {
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
                                            </fieldset>
                                            <fieldset>
                                                <legend>Información Academica</legend>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Áreas de intéres:</label>
                                                    <div class="col-md-8">
                                                        <ul id="myTags" class="form-control">
                                                            <!-- Existing list items will be pre-added to the tags -->
                                                            <?php
                                                            $areas = explode(",", $areaInteres);

                                                            foreach ($areas as $area) {
                                                                print "<li>" . $area . '</li>';
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Nivel de Ingles:</label>
                                                    <div class="col-md-8">
                                                        <select id="ingles" class="form-control" name="idIngles">
                                                            <?php
                                                            require 'include/conexion.php';
                                                            $query = "SELECT * FROM nivel_ingles";
                                                            $resultado = $mysqli->query($query);
                                                            $regionID = null;
                                                            while ($rows = $resultado->fetch_assoc()) {
                                                                $selected = null;
                                                                if ($rows['idIngles'] === $nivelIngles) {
                                                                    $selected = "selected='selected'";
                                                                    $regionID = $rows2['REGION_ID'];
                                                                }
                                                                print("<option value='" . $rows['idIngles'] . "' $selected>" . $rows['Nivel'] . "</option>");
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Mi educación:</label>
                                                    <div class="col-md-8">

                                                        <select id="txtEstudios" class="form-control" name="selEducacion">

                                                            <?php
                                                            require 'include/conexion.php';
                                                            $query = "SELECT * FROM educacion;";
                                                            $resultado = $mysqli->query($query);
                                                            while ($rows = $resultado->fetch_assoc()) {
                                                                if ($Obj_operaciones->comprobarUsuarioEducacion($_SESSION['idUsuario'],$rows['educacion_id'])) {
                                                                    print("<option value='" . $rows['educacion_id'] . "' selected='selected'>" . $rows['educacion_nombre'] . "</option>");
                                                                } else {
                                                                    print("<option value='" . $rows['educacion_id'] . "' >" . $rows['educacion_nombre'] . "</option>");
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                        <!--
                                                                                                                <div id="chkBasicaVal" class="checkbox">
                                                                                                                    <label>
                                                                                                                        <span class="icons"><span class="first-icon fa fa-square-o"></span><span class="second-icon fa fa-check-square-o"></span></span>
                                                                                                                        <input name="chkBasica" value="1" type="checkbox" id="chkBasica" >Educación Básica</label>
                                                                                                                </div>
                                                                                                                <div id="chkMediaVal" class="checkbox disabled">
                                                                                                                    <label><span class="icons"><span class="first-icon fa fa-square-o"></span>
                                                                                                                            <span class="second-icon fa fa-check-square-o"></span></span>
                                                                                                                        <input class="chkMedia " type="checkbox" value="2" name="chkMedia" id="chkMedia">Educación Media</label>
                                                                                                                </div>
                                                                                                                <div class="checkbox">
                                                                                                                    <label><span class="icons"><span class="first-icon fa fa-square-o"></span>
                                                                                                                            <span class="second-icon fa fa-check-square-o"></span></span>
                                                                                                                        <input type="checkbox" name="chkcft" value="3" id="chkCft">
                                                                                                                        Centro de formación técnica</label>
                                                                                                                </div>
                                                        
                                                                                                                <div class="checkbox">
                                                                                                                    <label><span class="icons"><span class="first-icon fa fa-square-o"></span>
                                                                                                                            <span class="second-icon fa fa-check-square-o"></span></span>
                                                                                                                        <input class=""  type="checkbox" name="chkIp" id="chkIp" value="4">Instituto Profesional</label>
                                                                                                                </div>
                                                        
                                                                                                                <div class="checkbox">
                                                                                                                    <label><span class="icons"><span class="first-icon fa fa-square-o"></span>
                                                                                                                            <span class="second-icon fa fa-check-square-o"></span>                                                
                                                                                                                        </span><input class="" type="checkbox" name="chkUniversidad" id="chkUniver" value="5">Universidad</label>
                                                                                                                </div>
                                                        
                                                                                                                <div class="checkbox">
                                                                                                                    <label><span class="icons"><span class="first-icon fa fa-square-o"></span><span class="second-icon fa fa-check-square-o"></span></span>
                                                                                                                        <input class="" type="checkbox" name="chkOtro" id="chkOtro" value="6">Otro (especificar)</label>
                                                                                                                </div>
                                                                                                                <br>-->
                                                        <input type="text" name="txtOtros" id="txtOtro"> <button type="submit" id="btnAgregarCurso">Agregar</button>
                                                        <br>

                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>

                                                <legend>Información opcionales</legend>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Skype name:</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control" value="<?php echo $skype ?>" type="text" name="skype">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-3 control-label">Video de presentación: (URL de youtube) <a href="#" title="Info" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Actualmente solo aceptamos videos provenientes de youtube">Más info</a></label>
                                                    <div class="col-lg-8">
                                                        <input class="form-control" value="<?php print "https://www.youtube.com/watch?v=$video1"; ?>" type="text" name="video" id="video">
                                                        <br/>
                                                        <label class="lblVideo">Ej: https://www.youtube.com/watch?v=0vrdgDdPApQ</label>

                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <?php
                                                    if ($video1 === NULL) {
                                                        echo '<iframe id="ifrmVideo" class="" src="" frameborder="0" ></iframe>';
                                                    } else {
                                                        echo "<iframe id='ifrmVideo' class='full-video' src='https://www.youtube.com/embed/$video1' frameborder='0' ></iframe>";
                                                    }
                                                    ?>


                                                </div>
                                            </fieldset>

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
    }
    include './structure/footer.php';
    ?> 
</body>
</html>