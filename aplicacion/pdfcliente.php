<?php
	include_once("../nucleo_php/coneccion.php");
	include_once("../nucleo_php/funciones.php");
	require_once("../dompdf/dompdf_config.inc.php");
	
	$codigo='
		<html>
			<head>
				<link rel="stylesheet" style="text/css" href="../css/reportesclientepdf.css" />
			</head>
			<body>
			<img class="fade" src="../img/logo.png"  style="width=10;height=10"/>
				<h2>Reporte por Cliente</h2>
				<table>
					<thead>
						<tr>
							<th>N&ordm;</th>
							<th>C.I.</th>
							<th>NOMBRE</th>
							<th>APELLIDO</th>
							<th>DIRECCI&Oacute;N</th>
							<th>TEL&Eacute;FONO</th>
							<th>ESTADO</th>
						</tr>
					</thead>';
						$result = mysql_qry("SELECT a.`id_cliente`,a.`ci`,a.`nombre_c`,a.`apellido_c`,a.`direccion`,a.`telefono`,b.`descripcion` FROM `cliente` AS a,`estado` AS b
													WHERE  a.`status`= b.`status` AND a.status= '1'  ORDER BY id_cliente,ci");
						while($row = mysql_fetch_array($result)){
							$codigo.='<tr>
										<td>'.$row["id_cliente"].'</td>
										<td>'.$row["ci"].'</td>
										<td>'.$row["nombre_c"].'</td>
										<td>'.$row["apellido_c"].'</td>
										<td>'.$row["direccion"].'</td>
										<td>'.$row["telefono"].'</td>
										<td>'.$row["descripcion"].'</td>
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
	$dompdf->stream("Reporte_por_Cliente.pdf");
?>