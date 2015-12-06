<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$to="viktor_viro@hotmail.com";
$subject = "Mensaje de prueba";
$message ="Esto es una prueba";
if(mail($to, $subject, $message)) 
{
    echo 'Mensaje enviado';
} else {
    echo 'Mensaje no enviado';
}