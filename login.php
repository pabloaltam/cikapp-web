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
                            <a href="#new" role="tab" data-toggle="tab" class="big btn btn-primary"><i class="fa fa-plus"></i> Nuevo usuario</a>
                            <a href="#user" role="tab" data-toggle="tab" class="big btn btn-danger"><i class="fa fa-user"></i> Tengo una cuenta</a>
                        </div>
                    </div>
                    <p class="click2select">Presiona para elegir</p>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="new">
                            <form action="" method="POST" autocomplete="none" name="frmRegistrar">
                                <?php
                                if (isset($_POST["txtRut"])) {
                                    include './include/ejecutar_en_db.php';
                                    $objBD = new OperacionesMYSQL();
                                    if($objBD->crearUsuario($_POST["txtRut"], $_POST["txtNombre"], $_POST["txtApellidos"], $_POST["txtEmail"],
                                            $_POST["txtPass"], $_POST["txtFechaNacimiento"], $_POST["txtCiudad"], $_POST["txtEstudios"],
                                            $_POST["cboExperiencia"], $_POST["txtAreasInteres"], $_POST["txtIngles"],
                                            $_POST["txtRentaMinima"], $_POST["txtRentaMaxima"])){
                                        print 'Exito';
                                    } else {
                                        print 'Fracaso';
                                    }
                                }
                                ?>
                                <br>
                                <fieldset>

                                    <div class="form-group">
                                        <div class="right-inner-addon">
                                            <i class="fa fa-envelope"></i>
                                            <input class="form-control input-lg" required placeholder="Rut" name="txtRut" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="right-inner-addon">
                                            <i class="fa fa-user"></i>
                                            <input class="form-control input-lg" required placeholder="Nombre" name="txtNombre" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="right-inner-addon">
                                            <i class="fa fa-user"></i>
                                            <input class="form-control input-lg" required placeholder="Apellidos" name="txtApellidos" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="right-inner-addon">
                                            <i class="fa fa-calendar"></i>
                                            <input class="form-control input-lg" required placeholder="Fecha de nacimiento" name="txtFechaNacimiento" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="right-inner-addon">
                                            <i class="fa fa-globe"></i>
                                            <input class="form-control input-lg" required placeholder="Cuidad" name="txtCiudad" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="right-inner-addon">
                                            <i class="fa fa-graduation-cap"></i>
                                            <input class="form-control input-lg" required placeholder="Estudios" name="txtEstudios" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="right-inner-addon">
                                            <i class="fa fa-calendar-check-o"></i>
                                            <select class="form-control input-lg" required placeholder="Seleccione..." name="cboExperiencia">
                                                <option value="0">Años de experiencia</option>
                                                <?php
                                                for ($i = 1; $i <= 50; $i++) {
                                                    if ($i < 10) {
                                                        print "<option value='{$i}'>0{$i}</option>";
                                                    } elseif ($i < 50) {
                                                        print "<option value='{$i}'>{$i}</option>";
                                                    } else {
                                                        print "<option value='51'>50 o más</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="right-inner-addon">
                                            <i class="fa fa-envelope"></i>
                                            <input class="form-control input-lg" required placeholder="Áreas de interés" name="txtAreasInteres" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="right-inner-addon">
                                            <i class="fa fa-envelope"></i>
                                            <input class="form-control input-lg" required placeholder="Nivel de inglés" name="txtIngles" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="right-inner-addon">
                                            <i class="fa fa-minus"></i>
                                            <input class="form-control input-lg" required placeholder="Espectativa de renta minima" name="txtRentaMinima" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="right-inner-addon">
                                            <i class="fa fa-plus"></i>
                                            <input class="form-control input-lg" required placeholder="Espectativa de renta máxima" name="txtRentaMaxima" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="right-inner-addon">
                                            <i class="fa fa-envelope"></i>
                                            <input class="form-control input-lg" required placeholder="Correo electrónico" name="txtEmail" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="right-inner-addon">
                                            <i class="fa fa-key"></i>
                                            <input class="form-control input-lg" required placeholder="Contraseña" name="txtPass" type="password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="right-inner-addon">
                                            <i class="fa fa-key"></i>
                                            <input class="form-control input-lg" required placeholder="Confirmar contraseña" name="txtRepPass" id="" type="password">
                                        </div>
                                    </div>
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
                            <br>
                            <fieldset>
                                <div class="form-group">
                                    <div class="right-inner-addon">
                                        <i class="fa fa-envelope"></i>
                                        <input class="form-control input-lg" placeholder="Rut" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="right-inner-addon">
                                        <i class="fa fa-key"></i>
                                        <input class="form-control input-lg" placeholder="Contraseña" type="password">
                                    </div>
                                </div>
                            </fieldset>
                            <br>
                            <div class=" text-center">
                                <button class="btn btn-primary">Identificarme</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php include 'structure/footer.php'; ?>
    </body>
</html>