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
		<link rel="stylesheet" href="./../css/reporte_empleado.css"/>
		<link rel="stylesheet" style="text/css" href="../css/almacenprods.css" />
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
		</br></br></br></br>
		<title>Reporte de Usuario por Pantalla</title>
	</head>
	<body>
		<?php include_once './fragmentos/menu_header.php'; ?>
		<table>
		   <a>REPORTE POR USUARIOS</a>
			<tr>
				<td>N</td>
				<td>NOMBRE DEL USUARIO</td>
				<td>CLAVE</td>
				<td>NIVEL</td>
				
			</tr>
			<?php
				$sql = "SELECT id_us,id_nivel,nombre_us,clave FROM usuario ORDER BY id_us,nombre_us";
				$result=mysql_qry($sql);
				while($row=mysql_fetch_array($result)){
					echo "<tr>
					       	<td>".$row['id_us']."</td>
						 	<td>".$row['nombre_us']."</td>
						 	<td>".$row['clave']. "</td>
						 	<td>".$row['id_nivel']."</td>

						 </tr>";
				}
			?>
			
		</table>
		<a href="pdfusuario.php"><button id="button">Imprimir</button></a>
		<a href="reporte_excel_usuarios.php"><span><button id="button">Exportar a Excel</button></span></a>
		</body>
</html>