<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'conexion.php';

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
} elseif (isset($_POST['con'])) {

    $conocimientos = $_POST['con'];
    $query = "SELECT * FROM usuario WHERE areasInteres LIKE '%{$conocimientos}%';";
    if ($resultado = $mysqli->query($query)) {
        $row_cnt = $resultado->num_rows;

        echo "<h3>Hemos encontrado <span class='badge'>{$row_cnt}</span> resultados.</h3>
            <dl>";
        while ($rows = $resultado->fetch_assoc()) {
            $educacion = "";
            $idUsuario = $rows['idUsuario'];
            $nombre = $rows['nombre'];
            $apellido = $rows['apellido'];
            $apellidoM = $rows['apellidoM'];
            $email = $rows['email'];
            $skype = $rows['skype'];
            $COMUNA_IDusuario = $rows['COMUNA_ID'];
            $nivelIngles = $rows['idIngles'];
            $pass = $rows['password'];
            $rutaImagen = $rows['rutaImagen'];
            $areaInteres = $rows["areasInteres"];

            $query2 = "SELECT b.educacion_nombre FROM usuario_educacion a, educacion b where a.educacion_id=b.educacion_id and usuario_id={$idUsuario};";

            if ($result2 = $mysqli->query($query2)) {
                $row_cnt2 = $result2->num_rows;
                if ($row_cnt2 === 0) {
                    $educacion = "No registrado";
                }
                while ($rows2 = $result2->fetch_assoc()) {
                    $educacion .= $rows2['educacion_nombre'] . ", ";
                }
            }
            echo "
                <dt >
                    <div class=''>
                        <h4>{$nombre} {$apellido} {$apellidoM}</h4>
                        <h5>
                        Estudios
                    </h5>
                        <label>{$educacion}</label>
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
                </dt>";
        }
        echo '</dl>';
    } else {
        echo "<h3>Hemos encontrado <span class='badge'>0</span> resultados.</h3>";
    }
}
