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
} elseif (isset($_POST['id'])){
    $id=$_POST['id'];
    $query="select c.COMUNA_ID,c.COMUNA_NOMBRE from region a,provincia b, comuna c WHERE b.PROVINCIA_REGION_ID=a.REGION_ID AND  c.COMUNA_PROVINCIA_ID=b.PROVINCIA_ID AND b.PROVINCIA_REGION_ID='{$id}';";
    $resultado = $mysqli->query($query);
    while($row= $resultado->fetch_assoc())
        {
            $id=$row['COMUNA_ID'];
            $data=$row['COMUNA_NOMBRE'];
            echo '<option value="'.$id.'">'.$data.'</option>';
        }

}
