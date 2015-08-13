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
            $resultado = null;
            $con = null;
            print("</table>");
        } catch (PDOException $e) {
//EN caso de ERROR
        }
    }

    function actualizarDatos() {

        require("conexion.php");

        $sql = "UPDATE usuario SET nombre='admin' WHERE idUsuario=1";

        try {

            $count = $con->exec($sql);
            $con = null;
            print($count . " Filas afectadas");
        } catch (PDOException $e) {

# QUE HACER EN CASO DE ERROR
        }
    }

    function crearUsuario($rut, $email, $password, $codigo) {

# Insertando en la Base de Datos con PDOStatement
        $sql = "INSERT INTO usuario (rut, email, password, codigo) VALUES (?,?,?,?)";

        try {
            if ($this->validarRut($rut)) {
                require("conexion.php");
                $count = $con->prepare($sql);
                $count->bindParam(1, $rut, PDO::PARAM_STR);
                $count->bindParam(2, $email, PDO::PARAM_STR);
                $count->bindParam(3, sha1(md5($password)), PDO::PARAM_STR);
                $count->bindParam(4, $codigo, PDO::PARAM_INT);
                $count->execute();
                if (($count->rowCount()) > 0) {
                    $con=NULL;
                    $count=NULL;
                    return TRUE;
                } else {
                    $con=NULL;
                    $count=NULL;
                    return FALSE;
                }
            } else {
                $con=NULL;
                $count=NULL;
                print FALSE;
            }
        } catch (PDOException $e) {

# QUE HACER EN CASO DE ERROR
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
                        $con = NULL;
                        $resultado = NULL;
                        return FALSE;
                    }
                }
                $con = NULL;
                $resultado = NULL;
                return TRUE;
            } else {
                $con = NULL;
                $resultado = NULL;
                return FALSE;
            }
        } catch (PDOException $e) {
//EN caso de ERROR
        }
    }

    function validarCodigo($codigo) {

        require("conexion.php");
        $query = "SELECT * FROM usuario where codigo={$codigo}";

        try {

            $resultado = $con->query($query);
            foreach ($resultado as $rows) {
                if (count($rows) != 0) {
                    $sqlUpdate = "Update usuario SET codigo='1' WHERE idUsuario={$rows['idUsuario']}";
                    $count = $con->exec($sqlUpdate);
                    if ($count == 1) {
                        $resultado = null;
                        $con = null;
                        return TRUE;
                    } else {
                        $resultado = null;
                        $con = null;
                        return FALSE;
                    }
                }
            }

            $resultado = null;
            $con = null;
            return FALSE;
        } catch (PDOException $e) {
            //EN caso de ERROR
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