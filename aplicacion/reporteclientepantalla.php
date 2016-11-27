<?php
	include_once '../nucleo_php/coneccion.php';
	include_once '../nucleo_php/funciones.php';
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Sistema de Inventario</title>
		<meta name="viewport" content="width=device-width,initial-scale=1"/>
		<link rel="shortcut icon" type="image/x-icon" href="../favicon2.ico"/>
		<link rel="sitemap" type="aplication/xml" title="sitemap" href="sitemap.xml"/>
		<link rel="stylesheet" href="./../css/flexslider.css"/>
		<link rel="stylesheet" href="./../css/menu.css"/>
		<link rel="stylesheet" href="./../css/reporte_cliente.css"/>
		

		<script type="text/javascript" src="./../js/jquery.js"></script>
		<script type="text/javascript" src="./../js/menu.js"></script>
		<script type="text/javascript" src="./../js/jquery.min.js"></script>
		<script type="text/javascript" src="./../js/jquery-ui-1.10.4.custom.min.js"></script>
		<script src="./../js/jquery.flexslider.js"></script>
		<script>
			$(document).ready(function(){
				$("a").button();
				$(".flexslider").flexslider();
			})
		</script>
	</head>
	<body>
		<?php include_once './fragmentos/menu_header.php'; ?>
		<section id="trabajos">
	
			<div class="title"><h2>Reporte por Cliente </h2></div></br>
			
			<table style="position:absolute;top:320px;left:117px;border-radius:10;" width="100" border="4">
				<nav>
			<tr>
				<td>N</td>
				<td>C.I.</td>
				<td>NOMBRE</td>
				<td>APELLIDO</td>
				<td>DIRECCI&Oacute;N</td>
				<td>TEL&Eacute;FONO</td>
				<td>ESTADO</td>
			</tr>
			</div>
			<?php
				$sql = "SELECT a.`id_cliente`,a.`ci`,a.`nombre_c`,a.`apellido_c`,a.`direccion`,a.`telefono`,b.`descripcion` FROM `cliente` AS a,`estado` AS b
							WHERE  a.`status`= b.`status` AND a.status= '1'  ORDER BY id_cliente,ci";
				//$sql = "SELECT id_cliente, nombre_c, apellido_c,ci,direccion,telefono FROM cliente ORDER BY id_cliente,ci";
				$result=mysql_qry($sql);
				while($row=mysql_fetch_array($result)){
					echo "<tr>
					       	<td>".$row['id_cliente']."</td>
						 	<td>".$row['ci']."</td>
						 	<td>".$row['nombre_c']. "</td>
						 	<td>".$row['apellido_c']."</td>
						 	<td>".$row['direccion']. "</td>
						 	<td>".$row['telefono']."</td>
							<td>".$row['descripcion']."</td>
						 </tr>";
				}
			?>
		</nav>	
		</table>
		<a target="_blank" href="pdfcliente.php"><button id="button">Exportar a PDF</button></a>
		<a href="reporte_excel_cliente.php"><span><button id="button">Exportar a Excel</button></span></a>
</section>
<li>
			<?php require_once './fragmentos/pie_de_pagina.php';?>
		</li>
	</body>
</html>