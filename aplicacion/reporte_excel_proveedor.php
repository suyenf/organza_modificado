<?php
//Exportar datos de php a Excel
header("Content-Type: application/vnd.ms-excel");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=reporte_proveedor_registrados.xls");
?>
<HTML LANG="es">
<TITLE>::. Exportacion de Datos .::</TITLE>
</head>
<body>
<?php
/*$NombreBD = "agenda";
$Servidor = "localhost";
$Usuario = "root";
$Password ="";
$IdConexion = mysql_connect($Servidor, $Usuario, $Password);
mysql_select_db($NombreBD, $IdConexion);*/

    include_once '../nucleo_php/coneccion.php';
	include_once '../nucleo_php/funciones.php';


$sql = "SELECT a.`id_proveedor`,a.`razon_social`,a.`rif`,a.`direccion`,a.`telefono`,a.`e_mail`,b.descripcion FROM `proveedor` AS a,`estado` AS b 
						WHERE a.`status`= b.`status` AND a.status= '1'  ORDER BY `razon_social`,`rif";
				$result=mysql_qry($sql);
?>

<TABLE BORDER=1 align="center" CELLPADDING=1 CELLSPACING=1>
<tr>
 <a>REPORTE POR PROVEEDOR</a>
			
				<td>N</td>
				<td>RIF.:</td>
				<td>RAZON SOCIAL</td>
				<td>E-MAIL</td>
				<td>DIRECCI&Oacute;N</td>
				<td>TEL&Eacute;FONO</td>
				<td>ESTADO</td>
</tr>
<?php

while($row = mysql_fetch_array($result)) {
printf("<tr>
<td>&nbsp;%s</td>
<td>&nbsp;%s&nbsp;</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
</tr>", $row["id_proveedor"],$row["rif"],$row["razon_social"],$row["e_mail"],$row["direccion"],$row["telefono"],$row["descripcion"]);

}
mysql_free_result($result);

?>
</table>
</body>
</html>