<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../include/ejecutar_en_db.php';
$OBJ = new OperacionesMYSQL();
if (isset($_GET["cod"])){
    $resultado=$OBJ ->validarCodigo($_GET["cod"]);
if($resultado!=NULL){
    if($resultado){
     header("Location: home.php?status=1");   
    }  else {
        print '<h1>Ups...</h1>'
        . '<p>No hemos podido dar de alta al usuario. </p>';
    }
    }
    else {
        print '<h1>Ups...</h1>'
        . '<p>El usuario ya ha sido dado de alta anteriormente. </p>';
    }
} else {
    print '<h1>Ups...</h1>'
    . '<p> estas perdido? :)</p>';
}