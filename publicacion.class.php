<?php

// id,rut,cargo,lugar_trabajo,tipo_contrato,tipo_jornada,fecha_inicio,publicacion,tipo_publicacion,fecha_publicacion
class publicacion {

    function obtienePublicacionesUsuario($rut) {
        include("include/conexion.php");
        $consulta_publicaciones = "SELECT * FROM publicaciones WHERE rut='$rut' ORDER BY fecha_publicacion DESC";
        $resultado = $mysqli->query($consulta_publicaciones);
        $i = 0;
        while ($fila = $resultado->fetch_assoc()) {
            $arreglo[$i] = array($fila['id'], $fila['cargo'], $fila['lugar_trabajo'], $fila['tipo_contrato'], $fila['tipo_jornada'], $fila['fecha_inicio'], $fila['publicacion'], $fila['tipo_publicacion'], $fila['fecha_publicacion']);
            $i++;
        }
        return $arreglo;
    }

    function agregarPublicacion($rut, $cargo, $lugar_trabajo, $tipo_contrato, $tipo_jornada, $fecha_inicio, $publicacion, $tipo_publicacion) {
        include("include/conexion.php");
        $hora = date("Y-m-d H:i:s");
        $agrega_publicacion = "insert into publicaciones(rut,cargo,lugar_trabajo,tipo_contrato,tipo_jornada,fecha_inicio,publicacion,tipo_publicacion,fecha_publicacion)
		values('$rut','$cargo','$lugar_trabajo','$tipo_contrato','$tipo_jornada','$fecha_inicio','$publicacion','$tipo_publicacion','$hora')";
        $resultado = $mysqli->query($agrega_publicacion);
        $mysqli->close();
    }

    function eliminarPublicacion($id, $rut) {
        include("include/conexion.php");
        $elimina_publicacion = "DELETE FROM publicaciones WHERE id='$id' AND rut='$rut'";
        $resultado = $mysqli->query($elimina_publicacion);
        $mysqli->close();
    }

    function editaPublicacion($id, $rut, $cargo, $lugar_trabajo, $tipo_contrato, $tipo_jornada, $fecha_inicio, $publicacion, $tipo_publicacion) {
        include("include/conexion.php");
        $edita_publicacion = "UPDATE publicaciones set cargo='$cargo',lugar_trabajo='$lugar_trabajo',tipo_contrato='$tipo_contrato',tipo_jornada='$tipo_jornada',fecha_inicio='$fecha_inicio',publicacion='$publicacion',tipo_publicacion='$tipo_publicacion' WHERE id='$id' AND rut='$rut'";
        $resultado = $mysqli->query($edita_publicacion);
        $mysqli->close();
    }

    function obtieneUnaPublicacion($id, $rut) {
        include("include/conexion.php");
        $consulta_publicacion = "SELECT * FROM publicaciones WHERE id='$id' AND rut='$rut'";
        $resultado = $mysqli->query($consulta_publicacion);
        $i = 0;
        while ($fila = $resultado->fetch_assoc()) {
            $arreglo[$i] = array($fila['id'], $fila['cargo'], $fila['lugar_trabajo'], $fila['tipo_contrato'], $fila['tipo_jornada'], $fila['fecha_inicio'], $fila['publicacion'], $fila['tipo_publicacion'], $fila['fecha_publicacion']);
            $i++;
        }
        return $arreglo;
    }

    //AGREGADO POR: Victor Muñoz.
    //Funcion utilizada en mostrar-avisos.php
    function obtienePublicacionesPorComunaRegionPais($id, $tipo) {
        include("include/conexion.php");

        switch ($tipo) {
            case "comuna":
                $consulta_publicaciones = "SELECT * FROM publicaciones,comuna,region,provincia,pais WHERE publicaciones.COMUNA_ID=comuna.COMUNA_ID and provincia.PROVINCIA_ID=comuna.COMUNA_PROVINCIA_ID and provincia.PROVINCIA_REGION_ID=region.REGION_ID and region.REGION_PAIS_ID=pais.PAIS_ID and publicaciones.COMUNA_ID=$id ORDER BY fecha_publicacion DESC; ";
                $resultado = $mysqli->query($consulta_publicaciones);
                $i = 0;
                while ($fila = $resultado->fetch_assoc()) {
                    $arreglo[$i] = array($fila['id'], $fila['cargo'], $fila['tipo_contrato'], $fila['tipo_jornada'], $fila['publicacion'], $fila['fecha_publicacion'], $fila['REGION_NOMBRE'],$fila['PAIS_NOMBRE'], $fila['COMUNA_NOMBRE'],);
                    $i++;
                }
                break;
                $consulta_publicaciones = "SELECT * FROM publicaciones,comuna,region,provincia WHERE publicaciones.COMUNA_ID=comuna.COMUNA_ID and provincia.PROVINCIA_ID=comuna.COMUNA_PROVINCIA_ID and provincia.PROVINCIA_REGION_ID=region.REGION_ID and region.REGION_ID={$id};";
                $resultado = $mysqli->query($consulta_publicaciones);
                $i = 0;
                while ($fila = $resultado->fetch_assoc()) {
                    $arreglo[$i] = array($fila['id'], $fila['cargo'], $fila['lugar_trabajo'], $fila['tipo_contrato'], $fila['tipo_jornada'], $fila['fecha_inicio'], $fila['publicacion'], $fila['tipo_publicacion'], $fila['fecha_publicacion']);
                    $i++;
                }
                break;
            case "pais":
                $consulta_publicaciones = "SELECT * FROM publicaciones,comuna,region,provincia,pais WHERE publicaciones.COMUNA_ID=comuna.COMUNA_ID and provincia.PROVINCIA_ID=comuna.COMUNA_PROVINCIA_ID and provincia.PROVINCIA_REGION_ID=region.REGION_ID and region.REGION_PAIS_ID=pais.PAIS_ID and pais.PAIS_ID={$id};";
                $resultado = $mysqli->query($consulta_publicaciones);
                $i = 0;
                while ($fila = $resultado->fetch_assoc()) {
                    $arreglo[$i] = array($fila['id'], $fila['cargo'], $fila['lugar_trabajo'], $fila['tipo_contrato'], $fila['tipo_jornada'], $fila['fecha_inicio'], $fila['publicacion'], $fila['tipo_publicacion'], $fila['fecha_publicacion']);
                    $i++;
                }
                break;

            default:
                break;
        }


        return $arreglo;
    }

}

?>
