
<?php include 'structure/navbarFinSession.php'; ?>
<div class="container sign-in-up">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <br>
            <!-- Nav tabs -->
            <div class="text-center">
                <div class="btn-group">
                </div>
            </div>
            <form action="" method="POST" autocomplete="off" name="frmRegistrar" id="frmRegistrar">
                <?php
                if (isset($_POST["txtRut"])) {
                    if (substr($_POST['txtRut'], 0, 2) < 75) {
                        $codigoverificacion = rand(0000000000, 9999999999);
                        
                        include 'include/ejecutar_en_db.php';
                        $objBD = new OperacionesMYSQL();
                        if ($objBD->crearUsuario(filter_input(INPUT_POST, "txtRut"), filter_input(INPUT_POST, "txtEmail"), filter_input(INPUT_POST, "txtPass"), filter_input(INPUT_POST, "txtRepPass"), $codigoverificacion)) {
                            $email = filter_input(INPUT_POST, "txtEmail");
                            
                            $headers = "From: Cikapp <admin@cikapp.tk>";
                            $mensaje = "Usted solicito un registro en cikapp.com, para confirmarlo debe hacer click en el siguiente enlace: \r\nhttp://www.cikapp.tk/usuario/confirmar.php?cod=" . $codigoverificacion . "&Type=usuario";
                            if (!mail("$email", "Confirmacion de registro en www.cikapp.com", "$mensaje", "$headers")) {
                                echo "<p>No se pudo enviar el email de confirmacion.</p>";
                            } else {
                                echo "<p>Tu cuenta ha sido registrada, sin embargo, esta requiere que la confirmes desde el email que ingresaste en el registro.<p>";
                            }
                        } else {
                            print '<p>Tu cuenta no pudo ser registrada, sin embargo puede volver a inténtalo dentro de unos minutos. Si el problema persiste comuníquese con nosotros por medio del formulario de contacto.</p>';
                        }
                    } else {
                        $codigoverificacion = rand(0000000000, 9999999999);
                        echo 'codeEmpresa=' . $codigoverificacion . " - ";
                        include 'include/ejecutar_en_db.php';
                        $objBD = new OperacionesMYSQL();
                        if ($objBD->crearEmpresa(filter_input(INPUT_POST, "txtRut"), filter_input(INPUT_POST, "txtEmail"), filter_input(INPUT_POST, "txtPass"), filter_input(INPUT_POST, "txtRepPass"), $codigoverificacion)) {
                            $email = filter_input(INPUT_POST, "txtEmail");
                            echo 'codeEmpresadentrodelemail=' . $codigoverificacion . " - ";
                            $headers = "From: admin@cikapp.tk";
                            $mensaje = "Usted solicito un registro en cikapp.com, para confirmarlo debe hacer click en el siguiente enlace: \r\nhttp://www.cikapp.tk/usuario/confirmar.php?cod=" . $codigoverificacion . "&Type=empresa";
                            if (!mail("$email", "Confirmacion de registro en www.cikapp.com", "$mensaje", "$headers")) {
                                echo "<p>No se pudo enviar el email de confirmacion.</p>";
                            } else {
                                echo "<p>Tu cuenta ha sido registrada, sin embargo, esta requiere que la confirmes desde el email que ingresaste en el registro.<p>";
                            }
                        } else {
                            print '<p>Tu cuenta no pudo ser registrada, sin embargo puede volver a inténtalo dentro de unos minutos. Si el problema persiste comuníquese con nosotros por medio del formulario de contacto.</p>';
                        }
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
                        <button class="btn btn-primary btn-lg btn-block btn-fill" type="submit" name="btnEnviar">Registrarme</button>
                    </div>
                </div>
            </form>
        </div>	
    </div>
</div>
</div>
</div>
<a href="panel.php">Panel</a>
<?php include 'structure/footer.php'; ?>
<script src="structure/js/jquery.Rut.min.js"></script>
<script src="structure/js/login.js"></script>

