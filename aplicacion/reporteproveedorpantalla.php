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
		
		<link rel="stylesheet" href="./../css/menu.css"/>
		<link rel="stylesheet" href="./../css/reporte_proveedor.css"/>

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
	
			<div class="title"><h2>Reporte por Proveedores </h2></div></br>
			
			<table style="position:absolute;top:320px;left:117px;border-radius:10;" width="100" border="4">
				<nav>
			<tr>
				<td>N</td>
				<td>RIF.:</td>
				<td>RAZON SOCIAL</td>
				<td>E-MAIL</td>
				<td>DIRECCI&Oacute;N</td>
				<td>TEL&Eacute;FONO</td>
				<td>ESTADO</td>
			</tr>
			</div>
			<?php
			$sql ="SELECT a.`id_proveedor`,a.`razon_social`,a.`rif`,a.`direccion`,a.`telefono`,a.`e_mail`,b.descripcion FROM `proveedor` AS a,`estado` AS b 
						WHERE a.`status`= b.`status` AND a.status= '1'  ORDER BY `razon_social`,`rif` ";
				//$sql = "SELECT id_proveedor,razon_social,rif,direccion,telefono,e_mail FROM Proveedor ORDER BY id_proveedor,rif";
				$result=mysql_qry($sql);
				while($row=mysql_fetch_array($result)){
					echo "<tr>
					       	<td>".$row['id_proveedor']."</td>
						 	<td>".$row['rif']."</td>
						 	<td>".$row['razon_social']. "</td>
						 	<td>".$row['e_mail']."</td>
						 	<td>".$row['direccion']. "</td>
						 	<td>".$row['telefono']."</td>
							<td>".$row['descripcion']."</td>
						 </tr>";
				}
			?>
			
		</nav>	
		</table>
		<a target="_blank" href="pdfproveedor.php"><button id="button">Exportar a PDF</button></a>
		<a href="reporte_excel_proveedor.php"><span><button id="button">Exportar a Excel</button></span></a>
	</section>
<li>
			<?php require_once './fragmentos/pie_de_pagina.php';?>
		</li>
	</body>
</html>