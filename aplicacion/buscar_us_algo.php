<?php
include_once '../nucleo_php/coneccion.php';
include_once '../nucleo_php/funciones.php';
?>
<!DOCTYPE html>
<html lang="es">
    <head> <!-- -->

<script src="jquery-1.5.1.min.js" type="text/javascript"></script>
<script src="jquery-ui-1.8.9.custom.min.js" type="text/javascript"></script>
/*CODIGO JAVASRIPT*/
<script>
  $(function(){
    var autocompletar = new Array();
    <?php //Esto es un poco de php para obtener lo que necesitamos
     for($p = 0;$p < count($arreglo_php); $p++){ //usamos count para saber cuantos elementos hay ?>
       autocompletar.push('<?php echo $arreglo_php[$p]; ?>');
     <?php } ?>
     $("#buscar").autocomplete({ //Usamos el ID de la caja de texto donde lo queremos
       source: autocompletar //Le decimos que nuestra fuente es el arreglo
     });
  });
</script>




/*CODIGO PHP*/

<?php
$sql = "SELECT nombre_us FROM usuario";
$res = mysql_query($sql);
$arreglo_php = array();
if(mysql_num_rows($res)==0)
   array_push($arreglo_php, "No hay datos");
else{
  while($palabras = mysql_fetch_array($res)){
    array_push($arreglo_php, $palabras["nombre_us"]);
  }
}


?>
<input type="text" id="buscar" />





</head>