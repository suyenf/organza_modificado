<?php
$conexion =include_once '../nucleo_php/coneccion.php';
include_once '../nucleo_php/funciones.php';

 
$matricula = $_GET['nombre_us']; 
$consulta = "SELECT nombre_us FROM usuario WHERE nombre_us LIKE '%$nombre_us%'"; 

$result = $conexion->query($consulta); 

if($result->num_rows > 0){ 
    while($fila = $result->fetch_array()){ 
        $matriculas[] = $fila['matricula'];         
    } 
    echo json_encode($matriculas); 
} 

?>
