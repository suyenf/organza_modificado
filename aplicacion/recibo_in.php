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
							<th>N&ordm;</th>
							<th>Proveedor</th>
							<th>Nro.de Factura</th>
							<th>Fecha de Emici&oacute;n</th>
							<th>Observaci&oacute;n</th>	
							<th>Producto</th>
						</tr>
					</thead>';
						$result = mysql_qry("SELECT a.id_entrada, b.razon_social, a.correlativo_factura, a.fecha_factura_emitida, a.observacion, c.nombre_p 
FROM entrada AS a,proveedor AS b,producto AS c WHERE a.id_proveedor = b.id_proveedor AND a.id_producto = c.id_producto");
						while($row = mysql_fetch_array($result)){
							$codigo.='<tr>
										<td>'.$row["id_entrada"].'</td>
										<td>'.$row["razon_social"].'</td>
										<td>'.$row["correlativo_factura"].'</td>
										<td>'.$row["fecha_factura_emitida"].'</td>
										<td>'.$row["observacion"].'</td>
										<td>'.$row["nombre_p"].'</td>
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
	$dompdf->stream("Recibo_de_Entrada.pdf");
?>