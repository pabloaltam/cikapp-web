        <?php include 'structure/navbar.php'; ?>


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

                                if (isset($_POST['rut'], $_POST['pass'])) {
                                    $user = filter_input(INPUT_POST, "rut");
                                    $pass = filter_input(INPUT_POST, "pass");

                                    if (!($user == '') and ! ($pass == '')) {
                                        if(esEmpresa($user)=TRUE){
                                            if (loginEmpresa($user, $pass) == TRUE) {
                                                echo "<meta http-equiv='Refresh' content='2;url= edit-user-profile.php'>";
                                            } else {
                                                // Login failed
                                                echo '<p>Sus datos son incorrectos, intente nuevamente por favor.</p>';
                                            }
                                        }else{
                                            if (loginUsuario($user, $pass) == TRUE) {
                                                echo "<meta http-equiv='Refresh' content='2;url= edit-enterprise-profile.php'>";
                                            } else {
                                                // Login failed
                                                echo '<p>Datos incorrectos, intente nuevamente por favor.</p>';
                                            }
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
                                    <div class="form-group has-success">
                                        <div class="right-inner-addon">
                                            <i class="fa fa-envelope"></i>
                                            <input class="form-control input-lg" placeholder="Rut" id="rut" name="rut" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group has-success">
                                        <div class="right-inner-addon">
                                            <i class="fa fa-key"></i>
                                            <input class="form-control input-lg" placeholder="Contraseña" id="pass" name="pass" type="password">
                                        </div>
                                    </div>
                                    <p class="text-muted">Olvidé mi contraseña</p>
                                </fieldset>
                                <br>
                                <div class="text-center">
                                    <button class="btn btn-primary btn-block btn-fill" type="submit">Ingresar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



        <?php include 'structure/footer.php'; ?>
        <script src="structure/js/jquery.Rut.min.js"></script>
        <script src="structure/js/login.js"></script>

