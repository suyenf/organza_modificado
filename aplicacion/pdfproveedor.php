<?php
	include_once("../nucleo_php/coneccion.php");
	include_once("../nucleo_php/funciones.php");
	require_once("../dompdf/dompdf_config.inc.php");
	
	$codigo='
		<html>
			<head>
				<link rel="stylesheet" style="text/css" href="../css/reportesprovpdf.css" />
			</head>
			<body>
				<img class="fade" src="../img/logo.png"  style="width=10;height=10"/>
				<h2>Reporte por Proveedor</h2>
				<table>
					<thead>
						<tr>
						    <th>N</th>
							<th>RAZ&Oacute;N SOCIAL</th>
							<th>R.I.F.</th>
							<th>DIRECCI&Oacute;N</th>
							<th>TEL&Eacute;FONO</th>
							<th>E-MAIL</th>
							<th>ESTADO</th>
						</tr>
					</thead>';
						$result = mysql_qry("SELECT a.`id_proveedor`,a.`razon_social`,a.`rif`,a.`direccion`,a.`telefono`,a.`e_mail`,b.descripcion FROM `proveedor` AS a,`estado` AS b 
						WHERE a.`status`= b.`status` AND a.status= '1'  ORDER BY `razon_social`,`rif");
						while($row = mysql_fetch_array($result)){
							$codigo.='<tr>
										<td>'.$row["id_proveedor"].'</td>
										<td>'.$row["razon_social"].'</td>
										<td>'.$row["rif"].'</td>
										<td>'.$row["direccion"].'</td>
										<td>'.$row["telefono"].'</td>
										<td>'.$row["e_mail"].'</td>
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
	$dompdf->stream("Reporte_por_Proveedor.pdf");
?>