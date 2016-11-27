<?php
	include_once("../nucleo_php/coneccion.php");
	include_once("../nucleo_php/funciones.php");
	require_once("../dompdf/dompdf_config.inc.php");
	
	$codigo='
		<html>
			<head></head>
			<body>
				<table>
					<tr>
						<td>N&ordm;</td>
						<td>C.I.</td>
						<td>NOMBRE</td>
						<td>APELLIDO</td>
						<td>DIRECCI&Oacute;N</td>
						<td>TEL&Eacute;FONO</td>
					</tr>';
						$result = mysql_query("SELECT * FROM cliente ORDER BY id_cliente");
						while($row = mysql_fetch_array($result)){
							$codigo.='<tr>
										<td>'.$row["id_cliente"].'</td>
										<td>'.$row["ci"].'</td>
										<td>'.$row["nombre_c"].'</td>
										<td>'.$row["apellido_c"].'</td>
										<td>'.$row["direccion"].'</td>
										<td>'.$row["telefono"].'</td>
									</tr>';
						}
				$codigo.='</table>
			</body>
		</html>
	';
	$codigo = utf8_decode($codigo);
	$dompdf = new DOMPDF();
	$dompdf->load_html($codigo);
	ini_set("memory_limit", "512M");
	$dompdf->render();
	$dompdf->stream("Reporte_por_Cliente.pdf");
?>