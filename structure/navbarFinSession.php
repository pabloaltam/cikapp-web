<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cikapp - We are working!</title>
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
        <form class="nav navbar-nav navbar-right">

<!--
<div class="btn-group">
  <a class="btn btn-warning btn-round dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user fa-fw"></i>Cuenta <span class="fa fa-caret-down"></span></a>
  <ul class="dropdown-menu">
    <li><a href="#"><i class="fa fa-pencil fa-fw"></i> Persona</a></li>
    <li><a href="#"><i class="fa fa-pencil fa-fw"></i> Empresa</a></li>
  </ul>
</div>
-->
<a class="btn btn-warning btn-round" title="Editar mi perfil" href="./edit-user-profile.php" role="button"><i class="fa fa-user"></i> <?php
            session_start();
            echo $_SESSION['nombre']." ".$_SESSION['apellido'];                        ;
                ?></a>
<a class="btn btn-warning btn-round" href="./logout.php" role="button" title="Salir"><i class="fa fa-sign-in"></i> Cerrar Sesión</a>

        </form>

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
        </ul>
    </div>
    </div>
</nav>

