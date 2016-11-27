<?php

function coneccion(){
    // user pass host db
    $u = 'root';
    $p = '';
    $h = 'localhost';
    $d = 'organza'; // pendiente con este nomnbre
    
    $conexion = mysql_connect($h, $u, $p) or die(mysql_errno().": ".mysql_error());
    if (is_resource($conexion)) {
        mysql_select_db($d) or die(mysql_errno().": ".mysql_error());
    }
    
    return $conexion;
}

