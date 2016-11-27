<?php
	include_once("../nucleo_php/coneccion.php");
	include_once("../nucleo_php/funciones.php");
	require_once("../dompdf/dompdf_config.inc.php");
	
	$codigo='
		<html>
			<head>
				<link rel="stylesheet" style="text/css" href="../css/recibo_in_pdf.css" />
			</head>
			<body>
			<img class="fade" src="../img/logo.png"  style="width=10;height=10"/>
				<h2>Recibo de Entrada</h2>
				<table border="2">
					<thead>
						<tr>
							<th>Fecha de Salida</th>
							<th>Fecha de Emici&oacute;n</th>
							<th>Cliente;</th>
							<th>Nro.de Factura</th>
							<th>Observaci&oacute;n</th>	
							</tr>
					</thead>';
						$result = mysql_qry("SELECT a.id_salida,a.`fecha_salida`, a.`fecha_registro`, a.observacion, c.nombre_c,a.`correlativo_factura` 
													   FROM `salidas` AS a,`cliente` AS c WHERE a.id_cliente = c.id_cliente ");
						while($row = mysql_fetch_array($result)){
							$codigo.='<tr>
										<td>'.$row["id_salida"].'</td>
										<td>'.$row["fecha_salida"].'</td>
										<td>'.$row["fecha_registro"].'</td>
										<td>'.$row["correlativo_factura"].'</td>
										<td>'.$row["observacion"].'</td>
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
	$dompdf->stream("Recibo_de_Salida.pdf");
?>