<?php
	include_once("../nucleo_php/coneccion.php");
	include_once("../nucleo_php/funciones.php");
	require_once("../dompdf/dompdf_config.inc.php");
	
	$codigo='
		<html>
			<head>
				<link rel="stylesheet" style="text/css" href="../css/reportespdf.css" />
			</head>
			<body>
			<img class="fade" src="../img/logo.png"  style="width=10;height=10"/>
				<h2>Reporte por Usuario</h2>
				<table>
					<thead>
						<tr>
						<td>Nro.</td>
						<td>NOMBRE DEL USUARIO</td>
						<td>NIVEL</td>
						<td>ESTADO</td>
					</tr>
					</thead>';
					$result = mysql_qry("SELECT a.`id_us`,b.`nombre_niv`,a.`nombre_us`,a.`clave`,c.`descripcion`FROM `usuario` AS a,`nivel` AS b,`estado` AS c
							WHERE a.`id_nivel`= b.`id_nivel` AND a.`status`= c.`status` AND a.status= '1'  ORDER BY id_us,nombre_us");
				//$result = mysql_qry("SELECT * FROM usuario ORDER BY id_us");
						while($row = mysql_fetch_array($result)){
							$codigo.= '<tr>
					       	<td>'.$row['id_us'].'</td>
						 	<td>'.$row['nombre_us'].'</td>
						 	<td>'.$row['nombre_niv'].'</td>
							<td>'.$row['descripcion'].'</td>
						 </tr>';
						}
				$codigo.='</table>
			</body>
		</html>
	';
	$codigo = utf8_decode($codigo);
	$dompdf = new DOMPDF();
	$dompdf->load_html($codigo);
	$dompdf->set_paper('8.5x11', 'portrait');
	ini_set("memory_limit", "512M");
	$dompdf->render();
	$dompdf->stream("Reporte_por_Usuario.pdf");
?>