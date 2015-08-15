<?php

class OperacionesMYSQL {

    function traerDatos() {

# incluir el archivo
# conexion cada vez que se quiera
# hacer algun trabajo con la Base de datos
# NOTA: Al final de cada funcion NO OLVIDAR $con=null

        require './include/conexion.php';
        $query = "SELECT * FROM usuario";
        print("<table>");

        $resultado = $mysqli->query($query);

        while ($rows = $resultado->fetch_assoc()) {

            print("<tr>");
            print("<td>" . $rows["idUsuario"] . "</td>");
            print("<td>" . $rows["nombre"] . "</td>");
            print("<td>" . $rows["apellido"] . "</td>");
            print("<td>" . $rows["rut"] . "</td>");
            print("<td>" . $rows["password"] . "</td>");
            print("</tr>");
        }
        print("</table>");
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

    function crearUsuario($rut, $email, $password1, $password2, $codigo) {

# Insertando en la Base de Datos con PDOStatement
        $sql = "INSERT INTO usuario (rut, email, password, codigo) VALUES (?,?,?,?);";
        $rut = str_replace('.', '', $rut);
        if ($this->RutValidate($rut)) {
            if ($this->emailValidate($email)) {

                if ($this->passwordValidate($password1, $password2)) {

                    require("conexion.php");
                    if ($stmt = $mysqli->prepare($sql)) {
                        /* ligar parámetros para marcadores */
                        $stmt->bind_param("sssi", $rut, $email, sha1(md5($password1)), $codigo);
                        /* ejecutar la consulta */
                        $stmt->execute();
                        /* cerrar sentencia */
                        $stmt->close();
                        return TRUE;
                    } else {
                        return FALSE;
                    }
                } else {
                    return FALSE;
                }
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    /**
     * Validador de RUT con digito verificador 
     *
     * @param string $rut
     * @return boolean
     */
    function RutValidate($rut) {
        $rut = str_replace('.', '', $rut);
        if (preg_match('/^(\d{1,9})-((\d|k|K){1})$/', $rut, $d)) {
            $s = 1;
            $r = $d[1];
            for ($m = 0; $r != 0; $r/=10)
                $s = 1;$r = $d[1];
            for ($m = 0; $r != 0; $r/=10)
                $s = ($s + $r % 10 * (9 - $m++ % 6)) % 11;
            if (chr($s ? $s + 47 : 75) == strtoupper($d[2])) {
                require("conexion.php");
                $query = "SELECT rut FROM usuario";
                $resultado = $mysqli->query($query);
                while ($rows = $resultado->fetch_assoc()) {
                    if ($rows["rut"] == $rut) {
                        return FALSE;
                    }
                }
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    function emailValidate($email) {
        require 'conexion.php';
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $query = "SELECT email FROM usuario WHERE email='{$email}'";
            $resultado = $mysqli->query($query);
            while ($rows = $resultado->fetch_assoc()) {
                if ($rows["email"] === $email) {
                    return FALSE;
                }
            }
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function passwordValidate($password1, $password2) {
        if (trim($password1) == TRUE && trim($password2) == TRUE) {
            if ($password1 === $password2) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    function validarCodigo($codigo) {

        require 'conexion.php';
        $query = "SELECT * FROM usuario where codigo={$codigo};";
        $resultado = $mysqli->query($query);
        while ($rows = $resultado->fetch_assoc()) {
            if (count($rows) != 0) {
                $sqlUpdate = "Update usuario SET codigo='1' WHERE idUsuario={$rows['idUsuario']}";
                if ($mysqli->query($sqlUpdate)) {
                    return TRUE;
                } else {
                    return FALSE;
                }
            }
        }
        return NULL;
    }

}
