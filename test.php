<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '/include/ejecutar_en_db.php';
$obj= new OperacionesMYSQL();
if($obj->comprobarUsuarioEducacion(9, 1))
{
    echo 'Existe';
}
else {
    echo 'no existe';
}