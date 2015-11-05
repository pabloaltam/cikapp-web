<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include './include/sign_in.php';

if(sesion_iniciada()){
    logout();
    header("Location: ./index.php");
} else {
    header("Location: ./index.php");
}

