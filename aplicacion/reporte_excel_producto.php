<?php
//Exportar datos de php a Excel
header("Content-Type: application/vnd.ms-excel");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=reporte_productos_registrados.xls");
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

$sql = "SELECT a.`id_producto`,a.`codigo`,a.`nombre_p`,a.`precio_unitario`,a.`cant_existencia`,a.`descripcion_prod`,
b.`razon_social`,a.`id_marca`,c.descripcion,a.`fecha_ingreso` FROM `producto` AS a,`proveedor` AS b,`estado` AS c
WHERE a.`status`= c.`status` AND a.`id_proveedor` = b.`id_proveedor` AND a.status= '1' ORDER BY  id_producto,nombre_p";
//$sql = "SELECT id_producto,nombre_p,precio_unitario,cant_existencia,descripcion,id_proveedor,id_marca,fecha_ingreso FROM producto ORDER BY  id_producto,nombre_p";
				$result=mysql_qry($sql);
?>

<TABLE BORDER=1 align="center" CELLPADDING=1 CELLSPACING=1>
<tr>
		   <a>REPORTE POR PRODUCTO</a>

				<td>Nro.</td>
				<td>NOMBRE DEL PRODUCTO</td>
				<td>P/U</td>
				<td>CANTIDAD</td>
				<td>DESCRIPCI&Oacute;N</td>
				<td>PROVEEDOR</td>
				<td>MARCA</td>
				<td>FECHA DE INGRESO</td>
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
<td>&nbsp;%s</td>
</tr>", $row["id_producto"],$row["nombre_p"],$row["precio_unitario"],$row["cant_existencia"],$row["descripcion"],$row["razon_social"],$row["id_marca"],$row["fecha_ingreso"]);
}
mysql_free_result($result);

?>
</table>
</body>
</html>