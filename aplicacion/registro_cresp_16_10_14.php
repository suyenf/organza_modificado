<?php
	include_once '../nucleo_php/coneccion.php';
	include_once '../nucleo_php/funciones.php';
	
	if(isset($_POST['enviar'])){
		$i = 0;
		foreach($_POST as $campo => $contenido){ //repite por cada elemento dentro de un array
			if(empty($contenido)){ //verifico por cada uno de los capos cual esta vacio
				$i++;
			}
		}
		if($i == 0){//si no hay ninguno vacio guarda
			$sql = "INSERT INTO cliente VALUES(NULL, %s, '%s', '%s', '%s', %s)";
			$sql = sprintf($sql, $_POST['ci'],
							 $_POST['nombre_c'],
							 $_POST['apellido_c'],
							 $_POST['direccion'],
							 $_POST['telefono']);
			//echo $sql;
			mysql_qry($sql); // se inserta la data ejecutando la consulta sql
			$info = 'Registro Guardado';
		}else{ //si no manda mensajitos de texto
			$info = 'se enviaron campos vacios';
		}
	}
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<title>Sistema de Inventario</title>
		<meta name="viewport" content="width=device-width,initial-scale=1"/>
		<link rel="shortcut icon" type="image/x-icon" href="../favicon2.ico"/>
		<link rel="sitemap" type="aplication/xml" title="sitemap" href="sitemap.xml"/>
		<link rel="stylesheet" href="./../css/flexslider.css"/>
		<link rel="stylesheet" href="./../css/menu.css"/>
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
		<h1>AGREGAR CLIENTE</h1>
		</br></br>
		<article>
			<section id="colmo">
				<nav>
					<form method="post" action="">
						Nombre   : <input type="Text" name="nombre_c"><br><br>
						Apellido : <input type="Text" name="apellido_c"><br><br>
						Cédula : <input type="Text" name="ci"><br><br>
						Dirección : <input type="Text" name="direccion"><br><br>
						Tel&eacute;fono: <input type="Text" name="telefono"><br><br><br>
						<input type="Submit" name="enviar" value="Guardar">
					</form>
				</nav>
			</section>
			<?php echo (isset($info)) ? $info : ''; ?>
		</article>
		</br></br></br>
		<li><?php require_once './fragmentos/pie_de_pagina.php'; ?></li>
	</body>
</html>