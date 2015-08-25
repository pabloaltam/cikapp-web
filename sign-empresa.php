<!DOCTYPE html>
<html lang="en">
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
                            <a href="#new" role="tab" data-toggle="tab" class="big btn btn-primary"><i class="fa fa-plus"></i> Nueva empresa</a>
                            <a href="#user" role="tab" data-toggle="tab" class="big btn btn-danger"><i class="fa fa-user"></i> Tenemos una cuenta</a>
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
                                    if ($objBD->crearEmpresa(filter_input(INPUT_POST, "txtRut"), filter_input(INPUT_POST, "txtEmail"), filter_input(INPUT_POST, "txtPass"), filter_input(INPUT_POST, "txtRepPass"), $codigoverificacion)) {
                                        $email = filter_input(INPUT_POST, "txtEmail");
                                        $headers = "From: admin@cikapp.com";
                                        $mensaje = "Usted solicito un registro en cikapp.com, para confirmarlo debe hacer click en el siguiente enlace: \r\nhttp://localhost/cikapp-web/usuario/confirmar.php?cod=" . $codigoverificacion . "&Type=empresa";
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
                                    <div class="form-group">
                                        <div class="right-inner-addon">
                                            <i class="fa fa-envelope"></i>
                                            <input class="form-control input-lg" placeholder="Rut empresa" type="text" name="txtRut">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="right-inner-addon">
                                            <i class="fa fa-envelope"></i>
                                            <input class="form-control input-lg" placeholder="Razón social" type="text" name="txtRut">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="right-inner-addon">
                                            <i class="fa fa-envelope"></i>
                                            <input class="form-control input-lg" placeholder="Correo electrónico" type="text" name="txtEmail">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="right-inner-addon">
                                            <i class="fa fa-key"></i>
                                            <input class="form-control input-lg" placeholder="Contraseña" type="password" name="txtPass">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="right-inner-addon">
                                            <i class="fa fa-key"></i>
                                            <input class="form-control input-lg" placeholder="Confirmar contraseña" id="" type="password" name="txtRepPass">
                                        </div>
                                    </div>
                                </fieldset>
                                <hr>

                                <div class="tab-content">
                                    <div class="tab-pane fade in active text-center" id="pp">
                                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnEnviar">Registrar empresa</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="user">
                            <form action="" method="POST" autocomplete="off" name="frmIdentificarme" id="frmIdentificarme">
                                <?php
                                include_once 'include/sign_in.php';

                                if (isset($_POST['rut'], $_POST['pass'])) {
                                    $user = filter_input(INPUT_POST, "rut");
                                    $pass = filter_input(INPUT_POST, "pass");

                                    if (!($user == '') and ! ($pass == '')) {
                                        //$res = login($user, $pass);
                                        if (login($user, $pass) == TRUE) {
                                            // Login success
                                            //echo "<p> Bienvenido! </p>";//. $_SESSION['usuario'];
                                            //header('Location: edit-user-profile.php');
                                            echo "<meta http-equiv='Refresh' content='2;url= edit-user-profile.php'>";
                                        } else {
                                            // Login failed
                                            echo '<p>Datos incorrectos, intente nuevamente por favor.</p>';
                                            //header('Location: ../index.php?error=1');
                                            //echo "<meta http-equiv='Refresh' content='2;url= index.php'>";
                                        }
                                    } else {
                                        echo '<p>Es necesario que ingrese sus datos primero</p>';
                                    }
                                } else {
                                    echo '<p>Si cuenta con un registro previo a continuación ingrese sus datos.</p>';
                                }
                                ?>
                                <br>
                                <fieldset>
                                    <div class="form-group">
                                        <div class="right-inner-addon">
                                            <i class="fa fa-envelope"></i>
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
                                    <button class="btn btn-primary">Entrar</button>
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
    </body>
</html>
