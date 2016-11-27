<?php
	include_once '../nucleo_php/coneccion.php';
	include_once '../nucleo_php/funciones.php';
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8"/>
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
		<a href="reporte_excel_usuarios.php"><span>Descargar</span></a>
	</body>
</html>