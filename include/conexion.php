<?php
  require_once 'datos.php';
$mysqli = new mysqli(HOSTNAME, USERNAME,PASSWORD, DATABASE);
if ($mysqli->connect_errno) {
    echo "Fallo la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}?>
