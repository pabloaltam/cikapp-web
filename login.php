<?php include 'structure/navbarFinSession.php'; ?>
<div class="container sign-in-up">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <br>
            <!-- Nav tabs -->
            <div class="text-center">
                <h3>INICIAR SESIÓN</h3>
            </div>
            <br />
            <form action="" method="POST" autocomplete="off" name="frmIdentificarme" id="frmIdentificarme">
                <?php
                include_once 'include/sign_in.php';
                if (isset($_POST['rut'], $_POST['pass'])) {
                    $user = filter_input(INPUT_POST, "rut");
                    $pass = filter_input(INPUT_POST, "pass");

                    if (!($user == '') and ! ($pass == '')) {
                        if (esEmpresa($user) == TRUE) {
                            if (loginEmpresa($user, $pass) == TRUE) {
                                ?>
                                <script type="text/javascript">
                                    window.location = "panel-empresa.php";
                                </script>

                                <?php
                            } else {
                                // Login failed
                                echo '<p>Sus datos son incorrectos, intente nuevamente por favor.</p>';
                            }
                        } else {
                            if (loginUsuario($user, $pass) == TRUE) {
                                ?>
                                <script type="text/javascript">
                                    window.location = "panel-usuario.php";
                                </script>
                                <?php
                            } else {
                                // Login failed
                                echo '<p>Datos incorrectos, intente nuevamente por favor.</p>';
                            }
                        }
                    } else {
                        echo '<p>Es necesario que ingrese sus datos primero</p>';
                    }
                } else {
                    echo '<p>Ingrese sus datos a continuación:</p>';
                }
                ?>
                <br>
                <fieldset>
                    <div id="txtRut" class="form-group has-success">
                        <div class="right-inner-addon">
                            <i id="imgRut" class="fa fa-user"></i>
                            <input class="form-control input-lg" placeholder="Rut" id="rut" name="rut" type="text">
                        </div>
                    </div>
                    <div class="form-group has-success">
                        <div class="right-inner-addon">
                            <i class="fa fa-key"></i>
                            <input class="form-control input-lg" placeholder="Contraseña" id="pass" name="pass" type="password">
                        </div>
                    </div>
                </fieldset>
                <br>
                <div class="text-center">
                    <button class="btn btn-primary btn-block btn-fill" type="submit" disabled id="btnIniciar">Ingresar</button>
                    <a href="obtener-clave.php" role="button" class="btn btn-primary btn-block btn-fill">Olvidé mi contraseña</a>
                </div>
            </form>
        </div>
    </div>
</div>


<?php include 'structure/footer.php'; ?>
    

