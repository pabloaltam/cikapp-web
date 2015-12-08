<?php include 'structure/navbarFinSession.php'; ?>
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
                <li class="active">
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

                <li>
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
            <?php
            ini_set("display_errors", 1);
            include 'structure/navbar.php';
            require('publicacion.class.php');
            $obj_publicacion = new publicacion();
            ?>
            <div class="container">
                <h2>Ofertas de empleo en tu ciudad</h2>
                <p>Listado de todas las publicaciones realizadas hasta la fecha:</p>  
                <?php
                include './include/ejecutar_en_db.php';
                $OBJ_operaciones = new OperacionesMYSQL();
                if (isset($_GET['idPos']) && !empty($_GET['idPos'])) {
                    if ($OBJ_operaciones->YaPostulo($_SESSION['idUsuario'], $_GET['idPos'])) {
                        ?>

                        <?php
                    } else {
                        if ($OBJ_operaciones->postulacionUsuario($_GET['idPos'], $_SESSION['idUsuario'])) {
                            echo "<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Postulaste con exito!</strong> Puedes hacer un seguimiento de tus publicaciones <a href='mis-publicaciones.php'>Aqui.</a>
</div>";
                        } else {
                            echo 'Lo sentimos pero no podemos hacer valida tu postulacion.';
                        }
                    }
                } else {
                    ?>

                    <?php
                }
                ?>

                <table class="table table-striped table-bordered table-hover table-responsive">
                    <thead>
                        <tr>
                            <th>CARGO</th> 
                            <th>LUGAR DE TRABAJO</th>
                            <th>CONTRATO</th>
                            <th>JORNADA LABORAL</th>
                            <th>DESCRIPCION</th>
                            <th>FECHA PUBLICACIÓN</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $var_publicaciones = $obj_publicacion->obtienePublicacionesPorComunaRegionPais($_SESSION['COMUNA_ID'], "comuna");
                        $var_cantidad_publicaciones = count($var_publicaciones);
                        for ($j = 0; $j < $var_cantidad_publicaciones; $j++) {
                            ?>
                            <tr>
                                <td><?php echo $var_publicaciones[$j][1]; ?></td>
                                <td><?php echo $var_publicaciones[$j][8].", ".$var_publicaciones[$j][6].", ".$var_publicaciones[$j][7]; ?></td>
                                <td><?php echo $var_publicaciones[$j][2]; ?></td>
                                <td><?php echo $var_publicaciones[$j][3]; ?></td>
                                <td><?php echo $var_publicaciones[$j][4]; ?></td>
                                <td><?php echo $var_publicaciones[$j][5]; ?></td>
                                <?php
                                if ($OBJ_operaciones->YaPostulo($_SESSION['idUsuario'], $var_publicaciones[$j][0])) {
                                    ?><td><a href="mis-postulaciones.php">Mis postulaciones</a></td>                
                                    <?php
                                } else {
                                    ?> 
                                    <td><a href="?idPos=<?php echo $var_publicaciones[$j][0] ?>">Postular</a></td>
                                    <?php
                                }
                                ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

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
</div>
<?php include './structure/footer.php';?>



