<?php
session_start();
$mi_id = $_SESSION['idUsuario']; 
$usuario = $_POST['user'];
$idUsuario = $_POST['user'];
$mensaje = $_POST['message'];
require('./include/conexion.php');

$obtener_hash = "SELECT hash FROM grupo_mensajes WHERE usuario_uno='$mi_id' AND usuario_dos='$usuario' OR usuario_dos=
'$mi_id' OR usuario_uno='$usuario' ";
$resultado = $mysqli->query($obtener_hash);

$row = mysqli_fetch_assoc($resultado);

$hash = $row['hash'];
                           

$mensajes = "SELECT id_remitente, mensaje FROM mensajes WHERE grupo_hash='$hash'";
$outcome = $mysqli->query($mensajes);
    while ($listar_mensajes = $outcome->fetch_assoc()) {
          $id_remitente = $listar_mensajes['id_remitente'];
          $mensaje = $listar_mensajes['mensaje'];
          
          $obtener_usuario = "SELECT `nombre`,`apellido` FROM usuario WHERE idUsuario='$id_remitente' ";
          $resultado = $mysqli->query($obtener_usuario);
          while ($rows = $resultado->fetch_assoc()) {
          $seleccionar_nombre = $rows['nombre'];
          $seleccionar_apellido = $rows['apellido'];
      	}
          $usuario_remitente = $seleccionar_nombre ." " . $seleccionar_apellido;
          echo "<p><b>$usuario_remitente</b><br/>$mensaje</p>";
                                        
  }



?>