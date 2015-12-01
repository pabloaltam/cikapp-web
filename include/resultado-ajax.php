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
    $unico = TRUE;
    $usuarioRepetido = FALSE;
    $cuantosChecked = 0;
    if (isset($_GET['Con'])) {
        $cuantosChecked++;
        if (isset($idUsuarioRep)) {
            $unico = FALSE;
        }
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
            if (!isset($idUsuarioRep)) {
                echo "<p>No hemos encontrado resultados. Busque con otros parámetros.</p>";
                exit();
            }
        }
    }
    if (isset($_GET['Est'])) {
        $cuantosChecked++;
        if (isset($idUsuarioRep)) {
            $unico = FALSE;
        }
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
        $cuantosChecked++;
        if (isset($idUsuarioRep)) {
            $unico = FALSE;
        }
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
        $cuantosChecked++;
        if (isset($idUsuarioRep)) {
            $unico = FALSE;
        }
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
        $cuantosChecked++;
        if (isset($idUsuarioRep)) {
            $unico = FALSE;
        }
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
    if (isset($idUsuarioRep)) {
        $longitud = count($idUsuarioRep);
        if (!$unico) {
            $repetidos = 0;

            for ($i = 0; $i < $longitud; $i++) {
                $counter = 1;
                for ($j = 0; $j < $i; $j++) {
                    if ($idUsuarioRep[$j] === $idUsuarioRep[$i]) {
                        $counter++;
                        $usuarioRepetido = TRUE;
                    }
                }

                if ($counter > 1) {
                    $repetidos++;
                    if ($counter === $cuantosChecked) {
                        $sql = "SELECT * FROM usuario WHERE idUsuario={$idUsuarioRep[$i]}";
                        if ($result = $mysqli->query($sql)) {
                            while ($rows = $result->fetch_assoc()) {
                                $idUsuario = $rows['idUsuario'];
                                $intereses = $rows['areasInteres'];
                                $nombre = $rows['nombre'];
                                $apellido = $rows['apellido'];
                                $apellidoM = $rows['apellidoM'];
                                $email = $rows['email'];
                                $skype = $rows['skype'];
                                $image = $rows['rutaImagen'];
                                $comuna_ID = $rows['COMUNA_ID'];
                                $locacion ="";
                            $query = "SELECT a.COMUNA_NOMBRE, c.REGION_NOMBRE, d.PAIS_NOMBRE FROM comuna a, provincia b, region c, pais d where a.COMUNA_PROVINCIA_ID=b.PROVINCIA_ID and b.PROVINCIA_REGION_ID=c.REGION_ID and c.REGION_PAIS_ID=d.PAIS_ID and a.COMUNA_ID={$comuna_ID};";
                            $resultado = $mysqli->query($query);
                            while ($rows = $resultado->fetch_assoc()) {
                                $locacion = $rows['COMUNA_NOMBRE'] . ", " . $rows['REGION_NOMBRE'] . ", " . $rows['PAIS_NOMBRE'];
                            }
                                
                                echo "
                <dt ><div class='card card-filtro'>

                    <h4>{$nombre} {$apellido} {$apellidoM}</h4>
                    <div class='row'>
                        <div class='col-sm-9'>
                            <div class='row'>
                                <div class='col-sm-2'><label>Interes</label></div>
                                <div class='col-sm-10'><p>{$intereses}</p></div>
                            </div>
                            <div class='row'>
                                <div class='col-sm-2'><label>Ubicación</label></div>
                                <div class='col-sm-10'><p>{$locacion}</p></div>
                            </div>
                            <div class='row'>
                                <div class='col-sm-2'><label>SKYPE Name</label></div>
                                <div class='col-sm-10'><p>{$skype}</p></div>
                            </div>
                        </div>
                        <div class='col-sm-3'>
                            <img src='{$image}' class='img-responsive center-block img-circle' height='150' width='150'>
                            <br>
                            <a class='btn btn-primary btn-lg' href='perfil-usuario.php?user={$idUsuario}' role='button'>
                                Ver Perfil
                            </a>
                        </div>
                    </div>
                    <p>
                        <a class='btn btn-primary btn-lg' href='#' role='button'>
                            Enviar inbox
                        </a>
                        <a class='btn btn-primary btn-lg' href='mailto:{$email}' target='_top' role='button'>
                            Enviar Correo
                        </a>                        
                    </p>
                </div>                </dt></dl>";
                            }
                        }
                    } else {
                        $repetidos = 0;
                    }
                }
            }
            if ($repetidos !== 0) {
                echo "<h3>Hemos encontrado <span class='badge'>{$repetidos}</span> resultados.</h3>";
            } else {
                echo "<p>No hemos encontrado resultados. Busque con otros parámetros.</p>";
            }
        } else {
            if (!$usuarioRepetido) {
                foreach ($idUsuarioRep as $usuario) {
                    $sql = "SELECT * FROM usuario WHERE idUsuario={$usuario}";
                    if ($result = $mysqli->query($sql)) {
                        while ($rows = $result->fetch_assoc()) {
                            $idUsuario = $rows['idUsuario'];
                            $intereses = $rows['areasInteres'];
                            $nombre = $rows['nombre'];
                            $apellido = $rows['apellido'];
                            $apellidoM = $rows['apellidoM'];
                            $email = $rows['email'];
                            $skype = $rows['skype'];
                            $image = $rows['rutaImagen'];
                            $locacion ="";
                            $comuna_ID = $rows['COMUNA_ID'];
                            $query = "SELECT a.COMUNA_NOMBRE, c.REGION_NOMBRE, d.PAIS_NOMBRE FROM comuna a, provincia b, region c, pais d where a.COMUNA_PROVINCIA_ID=b.PROVINCIA_ID and b.PROVINCIA_REGION_ID=c.REGION_ID and c.REGION_PAIS_ID=d.PAIS_ID and a.COMUNA_ID={$comuna_ID};";
                            $resultado = $mysqli->query($query);
                            while ($rows = $resultado->fetch_assoc()) {
                                $locacion = $rows['COMUNA_NOMBRE'] . ", " . $rows['REGION_NOMBRE'] . ", " . $rows['PAIS_NOMBRE'];
                            }


                            echo "
                <dt ><div class='card card-filtro'>

                    <h4>{$nombre} {$apellido} {$apellidoM}</h4>
                    <div class='row'>
                        <div class='col-sm-9'>
                            <div class='row'>
                                <div class='col-sm-2'><label>Interes</label></div>
                                <div class='col-sm-10'><p>{$intereses}</p></div>
                            </div>
                            <div class='row'>
                                <div class='col-sm-2'><label>Ubicación</label></div>
                                <div class='col-sm-10'><p>{$locacion}</p></div>
                            </div>
                            <div class='row'>
                                <div class='col-sm-2'><label>SKYPE Name</label></div>
                                <div class='col-sm-10'><p>{$skype}</p></div>
                            </div>
                        </div>
                        <div class='col-sm-3'>
                            <img src='{$image}' class='img-responsive center-block img-circle' height='150' width='150'>
                            <br>
                            <a class='btn btn-primary btn-lg' href='perfil-usuario.php?user={$idUsuario}' role='button'>
                                Ver Perfil
                            </a>
                        </div>
                    </div>
                    <p>
                        <a class='btn btn-primary btn-lg' href='#' role='button'>
                            Enviar inbox
                        </a>
                        <a class='btn btn-primary btn-lg' href='mailto:{$email}' target='_top' role='button'>
                            Enviar Correo
                        </a>                        
                    </p>
                </div>                </dt></dl>";
                        }
                    }
                }
                $cantidadDeResultados = count($idUsuarioRep);
                if ($cantidadDeResultados !== 0) {
                    echo "<h3>Hemos encontrado <span class='badge'>{$cantidadDeResultados}</span> resultados.</h3>";
                } else {
                    echo "<p>No hemos encontrado resultados. Busque con otros parámetros.</p>";
                }
            } else {
                echo "<p>No hemos encontrado resultados. Busque con otros parámetros.</p>";
            }
        }
    } else {
        echo "<p>No hemos encontrado resultados. Busque con otros parámetros.</p>";
    }
}
