<?php include 'structure/navbarFinSession.php'; ?>


<div class="container sign-in-up">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <br>
            <!-- Nav tabs -->
            <div class="text-center">
                Iniciar Sesión
            </div>
            <br />
            <form action="" method="POST" autocomplete="off" name="frmIdentificarme" id="frmIdentificarme">
                <?php
                include_once 'include/sign_in.php';

                if (isset($_POST['rut'], $_POST['email'])) {
                    $user = filter_input(INPUT_POST, "rut");
                    $email = filter_input(INPUT_POST, "email");
                    $user = str_replace('.', '', $user);
                    if (!($user == '') and ! ($email == '')) {
                        if (esEmpresa($user) == TRUE) {
                            recuperar_claveEmpresa($email, $user);
                            //if (recuperar_claveEmpresa($email, $user) == TRUE) {
                            //echo '<p>Revise en su correo el email con asunto: "Nueva contraseña para acceder a su cuenta de cikapp."</p>';
                            //} else {
                            // Login failed
                            //echo '<p>No se ha podido realizar la operacion requerida, inténtelo más tarde por favor.</p>';
                            //}
                        } else {
                            recuperar_claveUsuario($email, $user);
                            //if (recuperar_claveUsuario($email, $user) == TRUE) {
                            //echo '<p>Revise en su correo el email con asunto: "Nueva contraseña para acceder a su cuenta de cikapp."</p>';
                            //} else {
                            // Login failed
                            //echo '<p>No se ha podido realizar la operacion requerida, inténtelo más tarde por favor.</p>';
                            //}
                        }
                    } else {
                        echo '<p>Es necesario que llene todos los campos requeridos.</p>';
                    }
                } else {
                    echo '<p>Ingrese su rut y su email para poder enviarle una nueva contraseña con la cual podra volver a ingresar a su cuenta.</p>';
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
                            <input class="form-control input-lg" placeholder="Email" id="email" name="email" type="text">
                        </div>
                    </div>
                </fieldset>
                <br>
                <div class="text-center">
                    <button class="btn btn-primary btn-block btn-fill" type="submit">Solicitar nueva clave</button>
                </div>
            </form>
        </div>
    </div>
</div>



<?php include 'structure/footer.php'; ?>
<script src="structure/js/jquery.Rut.min.js"></script>
<script src="structure/js/login.js"></script>

