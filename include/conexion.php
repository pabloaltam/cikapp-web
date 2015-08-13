<?php

require_once 'datos.php';
  try {
  $con = new PDO('mysql:host='.HOSTNAME.';dbname='.DATABASE.';port=3306', USERNAME, PASSWORD);
  }
  catch (PDOException $e) {
  print "¡Error!: " . $e->getMessage();
  die();
  }
 ?>
