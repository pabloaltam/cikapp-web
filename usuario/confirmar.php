<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../include/ejecutar_en_db.php';
$OBJ = new OperacionesMYSQL();
if($OBJ ->validarCodigo($_GET["cod"])){
    print 'Usuario validado';
    }
    else {
        print 'Usuario no validado';
    }
