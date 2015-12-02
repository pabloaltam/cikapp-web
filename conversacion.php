<?php
session_start();
$mi_id = $_SESSION['idUsuario'];  
require('./include/conexion.php');

$query = "SELECT idUsuario, mensaje FROM conversacion order by idConversation asc;";
$resultado = $mysqli->query($query);

while ($data = $resultado->fetch_assoc()) {
	echo "<p><b>".$mi_id ."</b> dice ".$data["mensaje"]."</p>";
}

?>