<?php
@session_start();
if (isset($_SESSION['idUsuario'])) {
    
} else {
    header('Location: index.php');
}
include 'structure/navbarFinSession.php';
include './include/ejecutar_en_db.php';

$Obj_operaciones = new OperacionesMYSQL();
?>
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
                <li>
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

                <li class="active">
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
            <div class="container-fluid">

                <div class="row">
                    <div class="card ">
                        <div class="header">
            
                            
                            
<!--                            TODO EL CONTENIDO-->
                            
                            
                            
                            </div>
                        </div>


                    </div>
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

        <?php
    include './structure/footer.php';
    ?> 
</body>
</html>