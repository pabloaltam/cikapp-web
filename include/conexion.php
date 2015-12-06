<?php
try {
  require_once 'datos.php';
  $mysqli = new mysqli(HOSTNAME, USERNAME,PASSWORD, DATABASE);
  mysqli_set_charset($mysqli,'utf8');
} catch (mysqli_sql_exception $ex) {
    echo "Lo sentimos... en estos momentos no podemos procesar su información...por favor inténtelo más tarde";
    
}
