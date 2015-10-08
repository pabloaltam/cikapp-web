<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cikapp - Inicio de sesión</title>
    </head>

    <body>

        <?php include 'structure/navbar.php'; ?>


        <div class="container sign-in-up">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <br>
                    <!-- Nav tabs -->
                    <div class="text-center">
                        <div class="btn-group">
                            <a href="#new" role="tab" data-toggle="tab" class="big btn btn-primary"><i class="fa fa-plus"></i> Nuevo usuario</a>
                            <a href="#user" role="tab" data-toggle="tab" class="big btn btn-danger"><i class="fa fa-user"></i> Tengo una cuenta</a>
                        </div>
                    </div>
                    <p class="click2select">Presiona para elegir</p>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="new">
                            <form action="" method="POST" autocomplete="off" name="frmRegistrar" id="frmRegistrar">
                                <?php
                                if (isset($_POST["txtRut"])) {
                                    include 'include/ejecutar_en_db.php';
                                    $objBD = new OperacionesMYSQL();
                                    $codigoverificacion = rand(0000000000, 9999999999); // Conseguimos un codigo aleatorio de 10 digitos. 
                                    if ($objBD->crearUsuario(filter_input(INPUT_POST, "txtRut"), filter_input(INPUT_POST, "txtEmail"), filter_input(INPUT_POST, "txtPass"),  filter_input(INPUT_POST, "txtRepPass"), $codigoverificacion)) {
                                        $email = filter_input(INPUT_POST, "txtEmail");
                                        $headers = "From: admin@cikapp.com";
                                        $mensaje = "Usted solicito un registro en cikapp.com, para confirmarlo debe hacer click en el siguiente enlace: \r\nhttp://localhost/cikapp-web/usuario/confirmar.php?cod=" . $codigoverificacion."&Type=usuario";
                                        if (!mail("$email", "Confirmacion de registro en www.cikapp.com", "$mensaje", "$headers")) {
                                            echo "<p>No se pudo enviar el email de confirmacion.</p>";
                                        } else {
                                            echo "<p>Tu cuenta ha sido registrada, sin embargo, esta requiere que la confirmes desde el email que ingresaste en el registro.<p>";
                                        }
                                    } else {
                                        print '<p>Tu cuenta no pudo ser registrada, sin embargo puede volver a inténtalo dentro de unos minutos. Si el problema persiste comuníquese con nosotros por medio del formulario de contacto.</p>';
                                    }
                                }
                                ?>
                                <br>
                                <fieldset>
                                    <div class="form-group" id="campoRut">
                                        <div class="right-inner-addon">
                                            <i id="imgRut" class="fa fa-user"></i>
                                            <input class="form-control input-lg" id="txtRut" required placeholder="Rut" name="txtRut" type="text" >
                                        </div>
                                    </div>
                                    <div class="form-group" id="campoEmail">
                                        <div class="right-inner-addon">
                                            <i id="imgEmail" class="fa fa-envelope"></i>
                                            <input id="txtEmail" class="form-control input-lg" required placeholder="Correo electrónico" name="txtEmail" type="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="right-inner-addon">
                                            <i id="imgPass" class="fa fa-key"></i>
                                            <input class="form-control input-lg" required placeholder="Contraseña" name="txtPass" type="password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="right-inner-addon">
                                            <i id="imgPassRep" class="fa fa-key"></i>
                                            <input class="form-control input-lg" required placeholder="Confirmar contraseña" name="txtRepPass" id="" type="password">
                                        </div>
                                        <div id="passwordDescription"></div>
                                        <div id="passwordStrength" class="strength0"></div>
                                </fieldset>
                                <hr>

                                <div class="tab-content">
                                    <div class="tab-pane fade in active text-center" id="pp">
                                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnEnviar">Registrarme</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="user">
                        <form action="" method="POST" autocomplete="off" name="frmIdentificarme" id="frmIdentificarme">
                                
                                <?php
                                    include_once 'include/sign_in.php';
                                    if (isset($_POST['login'])) {
                                        
                                        $user = filter_input(INPUT_POST, "rut");
                                        $pass = filter_input(INPUT_POST, "pass");
                                        
                                        if( !($user == '') and !($pass == '') ){
                                            if (login($user, $pass) == TRUE) {
                                                // Login success
                                                echo "<p> Bienvenido! </p>". $_SESSION['idUsuario']." ". $_SESSION['rut']." ".$_SESSION['email'];
                                                echo '</br><a href="edit-user-profile.php">continuar al perfil usuario</a>';
                                            } else {
                                                // Login failed
                                                echo "<meta http-equiv='Refresh' content='2;url= index.php'>";
                                            }
                                        }else{
                                            echo '<p>Es necesario que ingrese sus datos primero</p>';
                                        }
                                    }                                    
                                ?>
                            <br>
                            <fieldset>
                                <div class="form-group">
                                    <div class="right-inner-addon">
                                        <i class="fa fa-user"></i>
                                        <input class="form-control input-lg" placeholder="Rut" id="rut" name="rut" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="right-inner-addon">
                                        <i class="fa fa-key"></i>
                                        <input class="form-control input-lg" placeholder="Contraseña" id="pass" name="pass" type="password">
                                    </div>
                                </div>
                            </fieldset>
                            <br>
                            <div class=" text-center">
                                <button class="btn btn-primary" type="submit" name="login">Identificarme</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'structure/footer.php'; ?>
        <script src="structure/js/jquery.Rut.min.js"></script>
        <script src="structure/js/login.js"></script>

