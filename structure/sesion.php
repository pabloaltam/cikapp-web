<?php
//GUARDA EL NOMBRE DEL ARCHIVO ACTUAL
$estaPagina = \basename($_SERVER["SCRIPT_FILENAME"], '.php');
//MUESTRA ADVERTENCIA SI SE ACCEDE A ESTE ARCHIVO (sesion.php)
if ($estaPagina == 'sesion') {
    echo '<script>alert("Que intentas hacer?");self.location="/index.php"</script>';
    die();
}
session_start();
//Validar si se esta ingresando con sesion correctamente
if (!$_SESSION) {
    //NO HAY SESION Y LA PAGINA QUE SE MUESTRA NO ES PUBLICA
    if (!($estaPagina == 'index' || $estaPagina == 'acerca' || $estaPagina == 'contacto' || $estaPagina == 'sesion')) {
        //MUESTRA MENSAJE PARA INICIAR SESION
        echo '<script>alert("Debes Iniciar Sesion");self.location="/index.php"</script>';
        //DETIENE LA EJECUCION DEL CODIGO
        die();
    }
} else {
//Guarda las variables de la sesion
    $email = $_SESSION['email'];
    $nombre = $_SESSION['nombre'];
    $apellidos = $_SESSION['apellido'];
    $rut = $_SESSION['rut'];
    $idUsuario = $_SESSION['idUsuario'];
    $rutaImagen = $_SESSION['rutaImagen'];
    //Crear Variable para Identificar Persona o Empresa
    if(substr($rut,0,2) >= '72'){
    $tipo="empresa";
    } else {
    $tipo="persona";
    }
}
?>
