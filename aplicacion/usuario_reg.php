<?php
$conexion =include_once '../nucleo_php/coneccion.php';
include_once '../nucleo_php/funciones.php';


     
    //$conexion = new mysqli('localhost','root','27310424','bootstrap',3306); 
    $matricula = $_POST['nombre_us']; 
    $consulta = "SELECT nombre_us FROM usuario WHERE nombre_us = '%$nombre_us%'"; 

    $result = $conexion->query($consulta); 
     
    $respuesta = new stdClass(); 
    if($result->num_rows > 0){ 
        $fila = $result->fetch_array(); 
        $respuesta->nombre = $fila['nombre_us']; 
    
               
    } 
    echo json_encode($respuesta); 

?>

