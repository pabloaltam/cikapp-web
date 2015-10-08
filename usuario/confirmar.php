<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../include/ejecutar_en_db.php';
$OBJ = new OperacionesMYSQL();
if (isset($_GET["cod"]) && isset($_GET["Type"])) {
    if ($_GET["Type"] === "usuario") {
        $resultado = $OBJ->validarCodigo($_GET["cod"]);
        if ($resultado != NULL) {
            if ($resultado) {
                header("Location: ../login.php#user");
            } else {
                print '<h1>Ups...</h1>'
                        . '<p>No hemos podido dar de alta al usuario. </p>';
            }
        } else {
            print "<h1>Ups...</h1>"
                    . "<p>El usuario ya ha sido dado de alta anteriormente. ir a <a href='../login.php#user'>Home</a></p>";
        }
    } elseif ($_GET["Type"] === "empresa") {
        $resultado = $OBJ->validarCodigoEmpresa($_GET["cod"]);
        if ($resultado != NULL) {
            if ($resultado) {
                header("Location: ../edit-company-profile.php?status=1");
            } else {
                print '<h1>Ups...</h1>'
                        . '<p>No hemos podido dar de alta a la empresa. </p>';
            }
        } else {
            print "<h1>Ups...</h1>"
                    . "<p>La empresa ya ha sido dado de alta anteriormente. ir a <a href='../edit-company-profile.php'>Home</a></p>";
        }
    } else {
        print "<h1>Ups...</h1>"
                    . "<p> Su solicitud no es válida. Por favor contáctenos si está teniendo problemas al tratar de validar su sesión."
                . "<br/> ir a <a href='../edit-company-profile.php'>Home</a></p>";
    }
} else {
    print '<h1>Ups...</h1>'
            . '<p> estas perdido? :)</p>';
}