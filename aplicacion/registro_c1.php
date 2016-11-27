<?php
	include_once '../nucleo_php/coneccion.php';
	include_once '../nucleo_php/funciones.php';
	
	if(isset($_POST['enviar'])){
		
		foreach($_POST as $campo => $contenido){ //repite por cada elemento dentro de un array
			if(empty($contenido)){ //verifico por cada uno de los capos cual esta vacio
				
			}
		}		
							$sql = "SELECT id_cliente, nombre_c, apellido_c,ci FROM cliente WHERE ci = %s";
							$sql = sprintf($sql, $_POST['ci']);
							$i = mysql_qry($sql); // se inserta la data ejecutando la consulta sql
							if(mysql_num_rows($i) == 0){ //si registro $i no existe ingresa los datos si no cliente existe y no lo guarda

			//$sql = "INSERT INTO cliente VALUES(NULL, %s, '%s', '%s', '%s', %s,%s)";
					$cedula = $_POST['ci'];
					$nombre_c = $_POST['nombre_c'];
					$apellido_c = $_POST['apellido_c'];
					$direccion = $_POST['direccion'];
					$telefono = $_POST['telefono'];
					$status = $_POST['status'];
					
			$sql = "INSERT INTO cliente VALUES (NULL, '$cedula', '$nombre_c', '$apellido_c', '$direccion', '$telefono', '$status')";
					//echo $sql;
			mysql_qry($sql); // se inserta la data ejecutando la consulta sql
						$info = 'REGISTRO GUARDADO';
		}else{ //si no manda mensajitos de texto
			$info = 'CLIENTE EXISTE';	
			}
			}		
	
      			$sql_stat = "SELECT * FROM estado";
				$res_stat = mysql_qry($sql_stat);

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
		<link rel="stylesheet" href="./../css/cliente.css"/>
		<link rel="stylesheet" href="./../css/style.css"/>
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
		<style type="text/css">
			/*.agregcliente article{
				text-align: center;
			}
			.agregcliente article{
				background-color: #E5A91E;
				display: inline-block;
			}
			.agregcliente article:first-child input{
				color: black;
				font-weight: bold;
				text-align: right;
				height: 40px;
				margin: 3px;
			}
			.identelementos input, .identelementos select{
				height: 40px;
				margin: 3px;
				width: 250px;
			}
			.bbotones{
				display: inline-block;
			}*/
		</style>
		<script src="/path/to/jquery.js" type="text/javascript"></script>
		<script src="/path/to/jquery.ui.draggable.js" type="text/javascript"></script>

		<script src="/path/to/jquery.alerts.js" type="text/javascript"></script>
		<link href="/path/to/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />
		
		<!--script de los alertas, se coloca y se quita-->
		<script type="text/javascript" src="../jquery.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			setTimeout(function() {
				$(".content").fadeOut(1500);
			},3000);
		});
		</script>

		
	</head>
	<body>
		<?php include_once './fragmentos/menu_header.php'; ?>
		<section id="trabajos">
		<div class="title"><h2>Registro de Cliente</h2></div>
			<form  name= "form1" method="post" action="registro_c.php" class="agregcliente" style="font-size:14px;font-family:Arial;color:#34495E;min-width:150px">
				<article>
				<!--<article class="identificacion">
					<p><input type="text" value="C.I.:" disabled="disabled" /></p>
					<p><input type="text" value="Nombre:" disabled="disabled" /></p>
					<p><input type="text" value="Apellido:" disabled="disabled" /></p>
					<p><input type="text" value="Direcci&oacute;n:" disabled="disabled" /></p>
					<p><input type="text" value="Tel&eacute;fono:" disabled="disabled" /></p>
					<p><input type="text" value="Estado:" disabled="disabled" /></p>
				</article>-->
				<!--<article class="identelementos">-->
					<p><input type="text" name="nombre_c" placeholder="Nombre" title="Introduzca un Nombre Valido" autofocus required pattern="[a-zA-Z- - -]*" /></p>
					<p><input type="text" name="apellido_c" placeholder="Apellido" title="Introduzca un Apellido Valido" required pattern="[a-zA-Z- - -]*" /></p>
					<p><input type="id" name="ci" placeholder="C.I." required pattern="\d\d\d\d\d\d\d\d" title="Introduzca 8 digitos y Si la Cédula contiene 7 coloque 0"></p>
					<p><input type="text" name="direccion" placeholder="Direcci&oacute;n" title="Introduzca una direcci&oacute;n Valida" required pattern="[a-zA-Z-0-9- - - ]*"></p>
					<p><input type="tel" name="telefono" placeholder="Tel&eacute;fono" id="orderTelephone"pattern="[0-9-/]*" title="Introduzca solo números" /></p>
					<p>
						<select name="status">
							<option value="">Estado</option>
							<?php while($fila_stat = mysql_fetch_array($res_stat)){ ?>
								<option value="<?php echo $fila_stat['status'] ?>">
									<?php echo $fila_stat['descripcion'] ?>
								</option>
							<?php } ?>
						</select>
					</p>
					</br></br></br></br>
				</article>
				<!--</article>-->
				<button type="submit" name="enviar" id="button"  value="Guardar">Guardar</button>
				<button type="cancelar" name="cancelar" id="button"  value="Cancelar" onClick="location.href='../aplicacion/registro_c.php'">Cancelar</button>
				<?php if (!empty($info)) { ?>
					<div class="content">
						<section id="sun"> <?php echo (isset($info)) ? $info : ''; ?> </section>
					</div>
				<?php } ?>
   
					</form>
					
				
		</section>		
			
		</br></br></br>
		<li>
			<?php require_once './fragmentos/pie_de_pagina.php';?>
		</li>
	</body>
</html>