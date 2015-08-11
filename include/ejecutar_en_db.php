<?php

class OperacionesMYSQL {

    function traerDatos() {

        # incluir el archivo
        # conexion cada vez que se quiera
        # hacer algun trabajo con la Base de datos
        # NOTA: Al final de cada funcion NO OLVIDAR $con=null

        require("conexion.php");
        $query = "SELECT * FROM usuario";
        print("<table>");

        try {

            $resultado = $con->query($query);

            foreach ($resultado as $rows) {

                print("<tr>");
                print("<td>" . $rows["idUsuario"] . "</td>");
                print("<td>" . $rows["nombre"] . "</td>");
                print("<td>" . $rows["apellido"] . "</td>");
                print("<td>" . $rows["rut"] . "</td>");
                print("<td>" . $rows["password"] . "</td>");
                print("</tr>");
            }

            print("</table>");
        } catch (PDOException $e) {
            //EN caso de ERROR
        } finally {

            $resultado = null;
            $con = null;
        }
    }

    function actualizarDatos() {

        require("conexion.php");

        $sql = "UPDATE usuario SET nombre='admin' WHERE idUsuario=1";

        try {

            $count = $con->exec($sql);
            print($count . " Filas afectadas");
        } catch (PDOException $e) {

            # QUE HACER EN CASO DE ERROR
        } finally {

            # Este codigo se ejecuta siempre
            # Aunque de una PDOException.

            $con = null;
        }
    }

    function crearUsuario($rut, $nombre, $apellido, $email, $password, $fechaNacimiento, $idResidencia, $estudios, $experiencia, $areasInteres, $idIngles, $expectativaRentaMin, $expectativaRentaMax) {

        # Insertando en la Base de Datos con PDOStatement
        $sql = "INSERT INTO `usuario`
  (`rut`,
    `nombre`,
    `apellido`,
    `email`,
    `password`,
    `fechaNacimiento`,
    `idResidencia`,
    `estudios`,
    `experiencia`,
    `areasInteres`,
    `idIngles`,
    `expectativaRentaMin`,
    `expectativaRentaMax`)
      VALUES
      (?,?,?,?,?,?,?,?,?,?,?,?,?)";

        try {
            if ($this->validarRut($rut)) {
                require("conexion.php");
                $count = $con->prepare($sql);
                $count->execute(array($rut, $nombre, $apellido, $email, $password,
                    $fechaNacimiento, $idResidencia, $estudios, $experiencia,
                    $areasInteres, $idIngles, $expectativaRentaMin, $expectativaRentaMax));

                return $count -> rowCount();
            } else {
                print -1;
            }
        } catch (PDOException $e) {

            # QUE HACER EN CASO DE ERROR
        } finally {

            # Este codigo se ejecuta siempre
            # Aunque de una PDOException.

            $con = null;
        }
    }

    function validarRut($rut) {

        require("conexion.php");
        $query = "SELECT rut FROM usuario";
        try {
            
        if (strpos($rut, "-") == false) {
            $RUT[0] = substr($rut, 0, -1);
            $RUT[1] = substr($rut, -1);
        } else {
            $RUT = explode("-", trim($rut));
        }
        $elRut = str_replace(".", "", trim($RUT[0]));
        $factor = 2;
        $suma = 0;
        for ($i = strlen($elRut) - 1; $i >= 0; $i--):
            $factor = $factor > 7 ? 2 : $factor;
            $suma += $elRut{$i} * $factor++;
        endfor;
        $resto = $suma % 11;
        $dv = 11 - $resto;
        if ($dv == 11) {
            $dv = 0;
        } else if ($dv == 10) {
            $dv = "k";
        } else {
            $dv = $dv;
        }
        if ($dv == trim(strtolower($RUT[1]))) {            
            $resultado = $con->query($query);
            foreach ($resultado as $fila) {
                if ($fila["rut"] == $rut) {
                    return FALSE;
                }
            }
            return TRUE;
        } else {
            return FALSE;
        }
        } catch (PDOException $e) {
            //EN caso de ERROR
        } finally {

            $resultado = null;
            $con = null;
        }
    }

}

# Asi se llaman a las funciones desde otras paginas
# no olvidar el include a este archivo

/*$pruebaOBJ = new OperacionesMYSQL();
# Esta insertando pero aun falta todas las validaciones y la seguridad.
# Falta validad si que el usuario no existe.
# IMPORTANTE: El Rut tiene que contener puntos
$pruebaOBJ->crearUsuario("22222222-2", "victor", "muñoz", "viktor_viro@hotmail.com", sha1("hola"), "30-03-1993", 1, "Ingeneria Informatica", 2, "Programación", 2, 1000000, 1200000);
print("</br>");
$pruebaOBJ->traerDatos();
print("</br>");
*/