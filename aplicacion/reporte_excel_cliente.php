<?php
//Exportar datos de php a Excel
header("Content-Type: application/vnd.ms-excel");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=reporte_clientes_registrados.xls");
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


$sql = "SELECT a.`id_cliente`,a.`ci`,a.`nombre_c`,a.`apellido_c`,a.`direccion`,a.`telefono`,b.`descripcion` FROM `cliente` AS a,`estado` AS b
			WHERE  a.`status`= b.`status` AND a.status= '1'  ORDER BY id_cliente,ci";
$result=mysql_qry($sql);

?>
<TABLE BORDER=1 align="center" CELLPADDING=1 CELLSPACING=1>
<tr>
 <a>REPORTE POR CLIENTE</a>

<TD>Nro</TD>
<TD>NOMBRE</TD>
<TD>APELLIDO</TD>
<TD>CEDULA</TD>
<TD>DIRECCION</TD>
<TD>ESTADO</TD>

</TR>
<?php

while($row = mysql_fetch_array($result)) {
printf("<tr>
<td>&nbsp;%s</td>
<td>&nbsp;%s&nbsp;</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
</tr>", $row["id_cliente"],$row["nombre_c"],$row["apellido_c"],$row["ci"],$row["direccion"],$row["descripcion"]);
}
mysql_free_result($result);

?>
</table>
</body>
</html>