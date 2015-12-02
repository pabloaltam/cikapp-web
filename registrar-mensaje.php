<?php 
require('./include/conexion.php');

$idUsuario = $_POST['user'];
$mensaje = $_POST['message'];

$insertar_mensaje ="INSERT INTO conversacion (idUsuario, mensaje) VALUES ('$idUsuario', '$mensaje') ";
$resultado = $mysqli->query($insertar_mensaje);

if($resultado) {
	echo "Mensaje enviado.";
}

?>