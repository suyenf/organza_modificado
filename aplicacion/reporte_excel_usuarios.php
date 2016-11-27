<?php
//Exportar datos de php a Excel
header("Content-Type: application/vnd.ms-excel");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=Reportes_usuarios_registrados.xls");
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

$sql = "SELECT a.`id_us`,b.`nombre_niv`,a.`nombre_us`,a.`clave`,c.`descripcion`FROM `usuario` AS a,`nivel` AS b,`estado` AS c
							WHERE a.`id_nivel`= b.`id_nivel` AND a.`status`= c.`status` AND a.status= '1'  ORDER BY id_us,nombre_us";
//$sql = "SELECT id_us,id_nivel,nombre_us,clave FROM usuario ORDER BY id_us,nombre_us";
				$result=mysql_qry($sql);
?>

<TABLE BORDER=1 align="center" CELLPADDING=1 CELLSPACING=1>
   <tr>
   <a>REPORTE POR USUARIOS</a>		
				<td>Nro.</td>
				<td>NOMBRE DEL USUARIO</td>
				<td>NIVEL</td>
				<td>ESTADO</td>
			</tr>
<?php

while($row = mysql_fetch_array($result)) {
printf("<tr>
<td>&nbsp;%s</td>
<td>&nbsp;%s&nbsp;</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
</tr>", $row["id_us"],$row["nombre_us"],$row["nombre_niv"],$row["descripcion"]);
}
mysql_free_result($result);

?>
</table>
</body>
</html>