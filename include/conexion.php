<?php
  require_once 'datos.php';
$mysqli = new mysqli(HOSTNAME, USERNAME,PASSWORD, DATABASE);
if ($mysqli -> connect_errno) {
die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno() 
. ") " . $mysqli -> mysqli_connect_error());
}
