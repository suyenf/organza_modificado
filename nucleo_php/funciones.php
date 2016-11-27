<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

if(isset($_GET['logout'])){
	session_destroy();
	header('location: ../');
	//echo 'esto se cierra';
}


function control_login_index() {
    if (isset($_SESSION['login'])) {
        header('location: ./aplicacion/boton_inicio.php');
    } else {
        include_once 'login.php';
    }
}

function mysql_qry($sql) {
    
    $con = coneccion();
    $result = mysql_query($sql, $con);
    
    return $result;
}
