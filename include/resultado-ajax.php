<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'conexion.php';

if (isset($_POST['txtRut'])){
    $rut = filter_input(INPUT_POST, "txtRut");
    $query = "SELECT rut FROM usuario WHERE rut='{$rut}';";
        $resultado = $mysqli->query($query);
        while ($rows = $resultado->fetch_assoc()) {
        if (count($rows) != 0) {
        echo TRUE;
        die();
        }
        }
        echo FALSE;
} else {
    echo 'chau';
}
