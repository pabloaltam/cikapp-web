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
                <li>
                    <a href="panel-empresa.php">
                        <i class="pe-7s-home"></i>
                        <p>Control Panel</p>
                    </a>
                </li>
                <li>
                    <a href="publicaciones.php">
                        <i class="pe-7s-portfolio"></i>
                        <p>Ofertas publicadas por mi</p>
                    </a>
                </li>
                <li class="active">
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
                    <div class="card">
                        <!-- Nav tabs -->

                        <div class="header">
                            <h3 class="text-center">Filtro de postulantes</h3>
                        </div>
                        <br />
                        <div class="content">
                            <form action="" method="POST" autocomplete="off" name="frmIdentificarme" id="frmIdentificarme">
                                <fieldset>
                                    <div class="form-group">
                                        <input type="checkbox" class="" id="conocimientos">
                                        <label for="conocimientos"> Conocimientos</label>
                                        <br>
                                        <input id="txtConocimientos" class="form-control input-ajax" disabled>
                                        <br>
                                        <input type="checkbox" class="" id="estudios">
                                        <label for="estudios">Estudios</label>
                                        <br>

                                        <div class="ui-select">
                                            <select id="txtEstudios" class="form-control input-ajax" disabled>
                                                <option value="-1">Seleccione...</option>
                                                <?php
                                                require 'include/conexion.php';
                                                $query = "SELECT * FROM educacion;";
                                                $resultado = $mysqli->query($query);
                                                while ($rows = $resultado->fetch_assoc()) {
                                                    print("<option value='" . $rows['educacion_id'] . "'>" . $rows['educacion_nombre'] . "</option>");
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <br>
                                        <input type="checkbox" class="" id="nivIngles">
                                        <label for="nivIngles">Nivel de Ingles</label>
                                        <br>

                                        <div class="ui-select">
                                            <select id="txtNivIngles" class="form-control input-ajax" disabled>
                                                <option value="-1">Seleccione...</option>
                                                <?php
                                                require 'include/conexion.php';
                                                $query = "SELECT * FROM nivel_ingles;";
                                                $resultado = $mysqli->query($query);
                                                while ($rows = $resultado->fetch_assoc()) {
                                                    print("<option value='" . $rows['idIngles'] . "'>" . $rows['Nivel'] . "</option>");
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <br>
                                        <input type="checkbox" class="" id="region">
                                        <label for="region">Region</label>
                                        <br>
                                        <div class="ui-select">
                                            <select id="txtRegion" class="form-control input-ajax" disabled>
                                                <option value="-1">Seleccione...</option>
                                                <?php
                                                require 'include/conexion.php';
                                                $query = "SELECT * FROM region";
                                                $resultado = $mysqli->query($query);
                                                while ($rows = $resultado->fetch_assoc()) {
                                                    print("<option value='" . $rows['REGION_ID'] . "'>" . $rows['REGION_NOMBRE'] . "</option>");
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <br>
                                        <input type="checkbox" class="" id="ciudad">
                                        <label for="ciudad">Ciudad</label>
                                        <br>

                                        <div class="ui-select">
                                            <select id="txtCiudad" class="form-control input-ajax" disabled>
                                                <option value="-1">Seleccione...</option>
                                                <?php
                                                require 'include/conexion.php';
                                                $query = "SELECT * FROM comuna ORDER BY COMUNA_NOMBRE";
                                                $resultado = $mysqli->query($query);
                                                while ($rows = $resultado->fetch_assoc()) {
                                                    print("<option value='" . $rows['COMUNA_ID'] . "'>" . $rows['COMUNA_NOMBRE'] . "</option>");
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <br>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <br>
                <br/>
                <br />

                <div class="col-md-7 col-md-offset-1">
                    <div class="scroll" id="scroll">
                        <p>Seleccione al menos una opción y escriba o elija segun corresponda...</p>
                        <!---->

                        <!---->
                    </div>

                </div>
            </div>



        </div>
        </div>
    </div>
</div>
<?php include 'structure/footer.php'; ?>


