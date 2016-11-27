<?php
	include_once '../nucleo_php/coneccion.php';
	include_once '../nucleo_php/funciones.php';
	
	if(isset($_POST['enviar'])){
		
		foreach($_POST as $campo => $contenido){ //repite por cada elemento dentro de un array
			if(empty($contenido)){ //verifico por cada uno de los capos cual esta vacio
				
			}
		}		
							$sql = "SELECT * FROM `proveedor`  WHERE rif = '%s'";
							$sql = sprintf($sql, $_POST['rif']);
							$i = mysql_qry($sql); // se inserta la data ejecutando la consulta sql
							if(mysql_num_rows($i) == 0){ //si registro $i no existe ingresa los datos si no cliente existe y no lo guarda

					$razon_social = $_POST['razon_social'];
					$rif = $_POST['rif'];
					$direccion = $_POST['direccion'];
					$telefono = $_POST['telefono'];
					$e_mail = $_POST['e_mail'];
					$status = $_POST['status'];

					
			$sql = "INSERT INTO proveedor VALUES (NULL, '$razon_social', '$rif', '$direccion', '$telefono', '$e_mail', '$status')";
					//echo $sql;
			mysql_qry($sql); // se inserta la data ejecutando la consulta sql
						$info = 'REGISTRO GUARDADO';
		}else{ //si no manda mensajitos de texto
			$info = 'PROVEEDOR EXISTE';	
			}
			}		
      			$sql_stat = "SELECT * FROM estado";
				$res_stat = mysql_qry($sql_stat);

?>

<!DOCTYPE html>
<html lang="es">
    <head> <!-- -->
        <meta charset="utf-8"/><!--ESTO ES UNIVERSAL-->
        <title>Sistema de Inventario</title><!--NOMBRE QUE SE MUESTRA EN LA PESTANA DEL NAVEGADOR-->
        <link rel="shortcut icon" type="image/x-icon" href="../favicon2.ico"/> <!--enlace para colocar el favicon.ICO-->
        <link rel="sitemap" type="aplication/xml" title="sitemap" href="sitemap.xml"/>
        <link rel="stylesheet" href="./../css/flexslider.css"/><!--enlazamos el slider-->
        <link rel="stylesheet" href="./../css/menu.css"/><!--enlazamos el estilo del menu-->

		<link rel="stylesheet" href="./../css/proveedor.css"/>
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
		
		<style type="text/css">

			.modproveedor article:first-child input{
				font-weight: bold;
				text-align: left;
			}
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
			<div class="title"><h2>Agregar Proveedor</h2></div>
			<form  name= "form4" method="post" action="registro_p.php" class="modproveedor" style="font-size:14px;font-family:Arial;color:#34495E;min-width:150px">
				<article>
					<p><input  placeholder="Raz&oacute;n Social:" title="Introduzca un Nombre de Empresa Valido" type="text" size= "25px" name="razon_social"  autofocus required pattern="[a-zA-Z- -  -0-9-]*" /></p>
					
					<p><input  placeholder="R.I.F.:"  title="Introduzca un RIF Valido" type="id" size= "20px" name="rif" required pattern="[a-zA-Z0-9 . -  ]*" /></p>
					
					<p><input placeholder="Direcci&oacute;n"  title="Introduzca una Direcci&oacute;n Valida" type="Text" size= "40px" name="direccion"  required pattern="[a-zA-Z-0-9- - - ]*"></p></br>
					
					<p><input placeholder="Tel&eacute;fono" name="telefono" type="tel" id="orderTelephone"pattern="[0-9-/]*" title="Introduzca solo Números" /></p></br></br></br></br>
					<p><input  placeholder="E-mail: " type="email" name="e_mail" required />
					<p>
						<select name="status">
							<option value="">Estado</option>
							<?php
								while($fila_stat = mysql_fetch_array($res_stat)){
							?>
									<option value="<?php echo $fila_stat['status'] ?>">
										<?php echo $fila_stat['descripcion'] ?>
									</option>
							<?php
								}
							?>
						</select>
					</p></p></br></br></br></br>
				</article>
				
				<button id="button" type="Submit" name="enviar" value="Guardar">Guardar</button>
			    <button id="button" type="Cancelar" name="cancelar" value="Cancelar" onClick="location.href='../aplicacion/registro_p.php'">Cancelar</button>
							<?php if (!empty($info)) { ?>
							<div class="content">
							<section id="sun"><?php echo (isset($info)) ? $info : ''; ?></section>	</div>
							<?php } ?>
					</form>
		</section>		
			
		
		<li>
			<?php require_once './fragmentos/pie_de_pagina.php';?>
		</li>
	</body>
</html>