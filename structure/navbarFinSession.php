<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cikapp - We are working!</title>

        <link href="structure/bstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="structure/css/estiloVictor.css" rel="stylesheet">

        <!--  PANEL CSS    -->
        <link href="structure/css/animate.min.css" rel="stylesheet"/>
        <link href="structure/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
        <link href="structure/css/iconstrokes.css" rel="stylesheet" />

        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/flick/jquery-ui.css">
        <link href="structure/css/jquery.tagit.css" rel="stylesheet" type="text/css">
        <link href="structure/css/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">


        <link href="structure/bstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="structure/css/shit.css" rel="stylesheet">


    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Navegar</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Cikapp</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">

                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Inicio</a></li>
                        <li><a href="#">Nosotros</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Nuestros servicios <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Para ti</a></li>
                                <li><a href="#">Para empresas</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">Otros</li>
                                <li><a href="#">Avisos</a></li>
                                <li><a href="#">Otros</a></li>
                            </ul>
                        </li>
                        <li role="separator" class="divider"></li>
                        <?php
                        //hola
                        @session_start();
                        if (isset($_SESSION['nombre'])) {
                            ?>
                            <li>
                                <a title="Ver mi perfil" href="./perfil-usuario.php" ><i class="fa fa-user"></i></a>
                            </li>
                            <li>
                                <a title="Editar mi perfil" href="./edit-user-profile.php"><i class="fa fa-user"></i>
                                    <?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido']; ?>
                                </a>
                            </li>
                            <li>
                                <a href="./logout.php" title="Salir"><i class="fa fa-sign-out"></i> Cerrar Sesión</a>

                            </li>
                            <?php
                        } elseif (isset($_SESSION['nombreEmpleado'])) {
                            ?>
                            <li>
                                <a title="Ver mi perfil" href="./perfil-empresa.php" role="button"><i class="fa fa-user"></i></a>
                            </li>
                            <li>
                                <a title="Editar mi perfil" href="./edit-enterprise-profile.php" role="button"><i class="fa fa-user"></i>
                                    <?php echo $_SESSION['nombreEmpleado'] . " " . $_SESSION['apellidoEmpleado'] . " ({$_SESSION["razonSocial"]})"; ?>
                                </a>
                            </li>
                            <li>
                                <a href="./logout.php" role="button" title="Salir"><i class="fa fa-sign-in"></i> Cerrar Sesión</a>

                            </li>
                            <?php
                        } else {
                            ?>
                            <li>
                                <a href="registro.php" role="button"><i class="fa fa-user"></i> Registrarse</a>    
                            </li>
                            <li>
                                <a href="login.php" role="button"><i class="fa fa-sign-in"></i> Iniciar Sesión</a>    
                            </li>
                            <?php
                        }
                        ?>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
