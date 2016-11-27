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
				<h2>Reporte por Producto</h2>
				<table>
					<thead>
						<tr>
							<th>N</th>
							<th>PRODUCTO</th>
							<th>P.U.</th>
							<th>DESCRIPCI&Oacute;N</th>
							<th>FECHA DE INGRESO</th>
							<th>ESTADO</th>
						</tr>
					</thead>';
					
					$result = mysql_qry("SELECT a.`id_producto`,a.`codigo`,a.`nombre_p`,a.`precio_unitario`,a.`cant_existencia`,a.`descripcion_prod`,
													b.`razon_social`,a.`id_marca`,c.descripcion,a.`fecha_ingreso` FROM `producto` AS a,`proveedor` AS b,`estado` AS c
													WHERE a.`status`= c.`status` AND a.`id_proveedor` = b.`id_proveedor` AND a.status= '1' ORDER BY  id_producto,nombre_p");
						//$result = mysql_qry("SELECT * FROM producto ORDER BY id_producto");
						while($row = mysql_fetch_array($result)){
							$codigo.='<tr>
										<td>'.$row["id_producto"].'</td>
										<td>'.$row["nombre_p"].'</td>
										<td>'.$row["precio_unitario"].'</td>
										<td>'.$row["razon_social"].'</td>
										<td>'.$row["fecha_ingreso"].'</td>
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
	$dompdf->stream("Reporte_por_Producto.pdf");
	

?>