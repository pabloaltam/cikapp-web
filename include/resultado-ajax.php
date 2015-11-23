<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'conexion.php';
require './ajax.class.php';

if (isset($_POST['txtRut'])) {
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
} elseif (isset($_POST['id'])) {
    $id = $_POST['id'];
    $query = "select c.COMUNA_ID,c.COMUNA_NOMBRE from region a,provincia b, comuna c WHERE b.PROVINCIA_REGION_ID=a.REGION_ID AND  c.COMUNA_PROVINCIA_ID=b.PROVINCIA_ID AND b.PROVINCIA_REGION_ID='{$id}';";
    $resultado = $mysqli->query($query);
    while ($row = $resultado->fetch_assoc()) {
        $id = $row['COMUNA_ID'];
        $data = $row['COMUNA_NOMBRE'];

        echo '<option value="' . $id . '">' . $data . '</option>';
    }
} elseif (isset($_GET['Con']) || isset($_GET['Est']) || isset($_GET['Nvi']) || isset($_GET['Reg']) || isset($_GET['Ciu'])) {

    $cadAux;
    $row_cnt = 0;
    $cadFin;
    $idUsuarioRep;

    if (isset($_GET['Con'])) {
        $ajax = new SelectFiltro();

        $explode = $ajax->traerPorConocimientos($_GET['Con']);
        $usuarios = explode(" ", $explode);
        foreach ($usuarios as $usuario) {

            $sql = "SELECT * FROM usuario WHERE idUsuario={$usuario}";
            if ($result = $mysqli->query($sql)) {
                while ($rows = $result->fetch_assoc()) {
                    $idUsuarioRep[] = $rows['idUsuario'];
                }
            }
        }
    }
    if (isset($_GET['Est'])) {
        $ajax = new SelectFiltro();

        $explode = $ajax->traerPorEstudios($_GET['Est']);
        $usuarios = explode(" ", $explode);
        foreach ($usuarios as $usuario) {

            $sql = "SELECT * FROM usuario WHERE idUsuario={$usuario}";
            if ($result = $mysqli->query($sql)) {
                while ($rows = $result->fetch_assoc()) {
                    $idUsuarioRep[] = $rows['idUsuario'];
                }
            }
        }
    }
    if (isset($_GET['Nvi'])) {
        $ajax = new SelectFiltro();

        $explode = $ajax->traerPorNivelDeIngles($_GET['Nvi']);
        $usuarios = explode(" ", $explode);
        foreach ($usuarios as $usuario) {

            $sql = "SELECT * FROM usuario WHERE idUsuario={$usuario}";
            if ($result = $mysqli->query($sql)) {
                while ($rows = $result->fetch_assoc()) {
                    $idUsuarioRep[] = $rows['idUsuario'];
                }
            }
        }
    }
    if (isset($_GET['Reg'])) {
        $ajax = new SelectFiltro();

        $explode = $ajax->traerPorRegion($_GET['Reg']);
        $usuarios = explode(" ", $explode);
        foreach ($usuarios as $usuario) {

            $sql = "SELECT * FROM usuario WHERE idUsuario={$usuario}";
            if ($result = $mysqli->query($sql)) {
                while ($rows = $result->fetch_assoc()) {
                    $idUsuarioRep[] = $rows['idUsuario'];
                }
            }
        }
    }
    if (isset($_GET['Ciu'])) {
        $ajax = new SelectFiltro();

        $explode = $ajax->traerPorCiudad($_GET['Ciu']);
        $usuarios = explode(" ", $explode);
        foreach ($usuarios as $usuario) {

            $sql = "SELECT * FROM usuario WHERE idUsuario={$usuario}";
            if ($result = $mysqli->query($sql)) {
                while ($rows = $result->fetch_assoc()) {
                    $idUsuarioRep[] = $rows['idUsuario'];
                }
            }
        }
    }

    $longitud = count($idUsuarioRep);
    $repetidos =0;
    for ($i = 0; $i < $longitud; $i++) {
        $counter = 0;
        for ($j = 0; $j < $i; $j++) {
            if ($idUsuarioRep[$j] === $idUsuarioRep[$i]) {
                $counter++;
            }
        }
        if ($counter == 1) {
                $repetidos++;
            $sql = "SELECT * FROM usuario WHERE idUsuario={$idUsuarioRep[$i]}";
            if ($result = $mysqli->query($sql)) {
                while ($rows = $result->fetch_assoc()) {
                    $idUsuario = $rows['idUsuario'];
                    $nombre = $rows['nombre'];
                    $apellido = $rows['apellido'];
                    $apellidoM = $rows['apellidoM'];
                    $email = $rows['email'];
                    $skype = $rows['skype'];


                    echo "
                <dt >
                    <div class=''>
                        <h4>{$nombre} {$apellido} {$apellidoM}</h4>
                            <p><a class='btn btn-primary btn-lg' href='#' role='button'>Enviar inbox</a><a class='btn btn-primary btn-lg' href='#' role='button'>Enviar Correo</a>
                            <div id=\"SkypeButton_Call_{$skype}_1\">
                             <script type=\"text/javascript\">
                             Skype.ui({
                             \"name\": \"call\",
                             \"element\": \"SkypeButton_Call_{$skype}_1\",
                             \"participants\": [\"$skype\"],
                             \"imageSize\": 24
                             });
                             </script>
                            </div>                        
                        </p>
                    </div>
                </dt></dl>";
                }
            }
        }
    }
    echo "<h3>Hemos encontrado <span class='badge'>{$repetidos}</span> resultados.</h3>";
    if($longitud === 0){
        echo "<h3>Hemos encontrado <span class='badge'>0</span> resultados.</h3>";
    }else {
}
}
