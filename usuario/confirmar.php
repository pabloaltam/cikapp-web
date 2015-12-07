<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
ini_set("display_errors", 1);
if (isset($_GET["cod"]) && isset($_GET["Type"])) {
    $codigo = $_GET["cod"];
    if ($_GET["Type"] === "usuario") {

        include '../include/sign_in.php';
        include '../include/conexion.php';
        $query = "SELECT * FROM usuario where codigo={$codigo};";
        $result = $mysqli->query($query);
        while ($rows = $result->fetch_assoc()) {
            if (loginUsuarioCon($rows['rut'], $rows['password'])) {
                $OBJ = new OperacionesMYSQL();
                $resultado = $OBJ->validarCodigo($_GET["cod"]);
                if ($resultado != NULL) {
                    if ($resultado) {
                        header("Location: ../edit-user-profile.php?pri=1");
                    } else {
                        print '<h1>Ups...</h1>'
                                . '<p>No hemos podido confirmar su cuenta de usuario.</p>';
                    }
                } else {
                    print "<h1>Ups...</h1>"
                            . "<p>Su cuenta de usuario ya ha sido confirmada anteriormente. ir a <a href='../login.php'>Login</a></p>";
                }
            }
        }
    } elseif ($_GET["Type"] === "empresa") {

        include '../include/sign_in.php';
        include '../include/conexion.php';
        $query = "SELECT * FROM empresa where codigo={$codigo};";
        $result = $mysqli->query($query);
        while ($rows = $result->fetch_assoc()) {
            if (loginEmpresaCon($rows['rut'], $rows['password'])) {
                $OBJ = new OperacionesMYSQL();
                $resultado = $OBJ->validarCodigoEmpresa($_GET["cod"]);
                if ($resultado != NULL) {
                    if ($resultado) {
                        header("Location: ../edit-enterprise-profile.php?pri=1");
                    } else {
                        print '<h1>Ups...</h1>'
                                . '<p>No hemos podido confirmar su cuenta de empresa. </p>';
                    }
                } else {
                    print "<h1>Ups...</h1>"
                            . "<p>La cuenta de su empresa ya ha sido confirmada anteriormente. ir a <a href='../login.php'>Login</a></p>";
                }
            }
        }
    } else {
        print "<h1>Ups...</h1>"
                . "<p> Su solicitud no es válida. Por favor contáctenos si está teniendo problemas al tratar de validar su sesión."
                . "<br/> ir a <a href='../index.php'>Home</a></p>";
    }
} else {
    print '<h1>Ups...</h1>'
            . '<p> estas perdido? :)</p>';
}