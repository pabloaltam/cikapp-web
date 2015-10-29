<?php include 'structure/navbar.php'; ?>

<div class="container">
    <h1 class="page-header">Edita tu perfil</h1>
    
    
                <?php
                session_start();
                if (isset($_POST['nombre'])) {
                    include './include/ejecutar_en_db.php';
                    $Obj_operaciones = new OperacionesMYSQL();
                    $idUsuario = $_SESSION['idUsuario'];
                    $nombre = $_POST['nombre'];
                    $apellido = $_POST['apellido'];
                    $apellidoM = $_POST['apellidoM'];
                    $email = $_POST['email'];
                    $skype = $_POST['skype'];
                    $COMUNA_ID = $_POST['COMUNA_ID'];


                    $uploadedfileload = true;
                    $uploadedfile_size = $_FILES["uploadedfile"]["size"];
                    $msg="";
                    if ($_FILES["uploadedfile"]["size"] > 200000) {
                        $msg = $msg . "El archivo es mayor que 200KB, debes reduzcirlo antes de subirlo<BR>";
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


                    $test = $Obj_operaciones->editarUsuario($idUsuario, $nombre, $apellido, $apellidoM, $email, $skype, $COMUNA_ID);
                    if ($test) {
                        echo 'ÉXITO: Los datos del usuario han sido actualizados correctamente.<br>';
                    } else {
                        echo 'ERROR: Intentelo más tarde.<br>';
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
                    if($rutaImagen===""){
                        echo '<img src="structure/img/avatar.jpg" class="avatar img-circle img-thumbnail" alt="Foto" id="fotoUsuario">';    
                    } else {
                        echo "<img src='$rutaImagen' class='avatar img-circle img-thumbnail' alt='Foto' id='fotoUsuario'>";
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
                                    while ($rows = $resultado->fetch_assoc()) {
                                        $sql = "select REGION_ID from comuna a, provincia b, region c where COMUNA_PROVINCIA_ID = PROVINCIA_ID and PROVINCIA_REGION_ID = REGION_ID and COMUNA_ID=$COMUNA_IDusuario;";
                                        $resultado2 = $mysqli->query($sql);
                                        while ($rows2 = $resultado2->fetch_assoc()) {
                                            if($rows['REGION_ID']===$rows2['REGION_ID'])
                                            {
                                              print("<option value='" . $rows['REGION_ID'] . "' selected='selected'>" . $rows['REGION_NOMBRE'] . "</option>");
                                              break;
                                            }
                                        }
                                        
                                        print("<option value='" . $rows['REGION_ID'] . "'>" . $rows['REGION_NOMBRE'] . "</option>");
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
                                    
                                    
                                    
                                    ?>
                                    
                                    <option value="0">Seleccione ciudad...</option>
                                </select>
                                        
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Skype:</label>
                        <div class="col-md-8">
                            <input class="form-control" value="<?php echo $skype ?>" type="text" name="skype">
                        </div>
                    </div>
                    <div class="form-group">
                        <p class="col-md-11">Para que los cambios se apliquen debes ingresar tu contraseña en los campos que se encuentran a continuación.</p>

                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Contraseña:</label>
                        <div class="col-md-8">
                            <input class="form-control" value="" type="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Confirmar contraseña:</label>
                        <div class="col-md-8">
                            <input class="form-control" value="" type="password">
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
    <script src="structure/jquery/jquery-1.11.3.min.js"></script>
    <script src="structure/js/jquery-perfiles.js"></script>

    <?php
} else {
    echo 'sin sesion valida';
}
include 'structure/footer.php';
?>