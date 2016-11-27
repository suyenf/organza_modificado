<?php
	include_once '../nucleo_php/coneccion.php';
	include_once '../nucleo_php/funciones.php';
	
	if(isset($_POST['enviar'])){
		//$i = 0;
		foreach($_POST as $campo => $contenido){ //repite por cada elemento dentro de un array
			if(empty($contenido)){ //verifico por cada uno de los capos cual esta vacio
				//$i++;
			}
		}
		$sql = "SELECT * FROM `producto` WHERE codigo = %s LIMIT 1";
		$sql = sprintf($sql, $_POST['codigo']);
		$i = mysql_qry($sql); // se inserta la data ejecutando la consulta sql
		if(mysql_num_rows($i) == 0){ //si registro $i no existe ingresa los datos si no cliente existe y no lo guarda

			$codprod = $_POST['codigo'];
			$nomprod = $_POST['nombre_p'];
			$punprod = $_POST['precio_unitario'];
			$canprod = $_POST['cant_existencia'];
			$desprod = $_POST['descripcion'];
			$idpprod = $_POST['id_proveedor'];
			$idmprod = $_POST['id_marca'];
			$sttprod = $_POST['status'];
			$finprod = $_POST['fecha_ingreso'];
			
			$sql = "INSERT INTO producto VALUES (NULL, '$codprod','$nomprod', '$punprod', '$canprod', '$desprod', '$idpprod', '$idmprod', '$sttprod', '$finprod')";
			
			//echo $sql;
			mysql_qry($sql); // se inserta la data ejecutando la consulta sql
			$info = 'REGISTRO GUARDADO';
		}else{ //si no manda mensajitos de texto
			$info = 'PRODUCTO EXISTENTE';	
			}
			}		
	
		
		$sql_prov = "SELECT * FROM proveedor WHERE status = 1";
		$res_prov = mysql_qry($sql_prov);
	
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
		
		<link rel="stylesheet" href="./../css/menu.css"/>
		<link rel="stylesheet" href="./../css/producto.css"/>
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
	
			.modproducto article:first-child input{
				font-weight: bold;
				text-align: left;
				color:#000040;
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
		<section id="trabajos" >
		<div class="title"><h2>Registro de Producto</h2></div>
			<form name="form7" method="post" action="registro_pro.php" class="modproducto" style="font-size:14px;font-family:Arial;color:#34495E;min-width:150px">
				 <style type="text/css">
                    select{float: left;}
                    form article {text-align: left;
					color:#000040;
					 font-weight: bold;}
					 
                </style>
				
				<article>

					<div class="fecha">Fecha de Ingreso</div><input type="date" title="Introduzca una Fecha de Ingreso" name="fecha_ingreso"autofocus required></p>
					<p><input placeholder= "C&oacute;digo de Barra"  title="Introduzca un Formato Valido" type="cod"  name="codigo"  required pattern="[0-9]*" /></p>
					<p><input placeholder= "Producto"  title="Introduzca un Producto Valido" type="text" size= "14px" name="nombre_p" required pattern="[a-zA-Z-0-9- - - ]*"></p>
					<p><input placeholder="Marca"  title="Introduzca una Marca Valida" type="Text" size= "12px" name="id_marca" required pattern="[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-   ]*"/></p>
					<p><input placeholder="Descripci&oacute;n"  title="Introduzca una Descripci&oacute;n Valida" type="Text" size= "22px" name="descripcion" required pattern="[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-   ]*"/>
					
					<p></br></br></br></br></br></br><input placeholder= "Cantidad"  title="Solo se Admiten Números" size= "7px" type="decbin"  name="cant_existencia"  required pattern="[0-9]*" />
					
					<input placeholder= "P/U"  title="Introduzca un Formato de Moneda" type="decbin" size="14"  name="precio_unitario"  required pattern="[0-9,00]*" /></p><div class="pu">B.F</div>
					
						<div class="pro">Proveedor</div>
						<select name="id_proveedor" >
							<option value="">------------</option>
							<?php
								while($fila_prov = mysql_fetch_array($res_prov)){
							?>
									<option value="<?php echo $fila_prov['id_proveedor'] ?>">
										<?php echo $fila_prov['razon_social'] ?>
									</option>
							<?php
								}
							?>
						</select>
					</br></br></br></br></br></br></br>
							<p>
							<div class="est">Estado</div><select  id="est" name="status">
							<option value="">--------------</option>
							<?php while($fila_stat= mysql_fetch_array($res_stat) ){ ?>
							<option value="<?php echo $fila_stat['status'] ?>">
								<?php echo $fila_stat['descripcion'] ?>
							</option>	
							<?php } ?>
							</select></p>
				</article>
						<button id="button" type="Submit" name="enviar" value="Guardar">Guardar</button>
						            <button id="button" type="Cancelar" name="cancelar" value="Cancelar" onClick="location.href='../aplicacion/registro_c.php'">Cancelar</button>
								<?php if (!empty($info)) { ?>
							<div class="content">
							<section id="sun"><?php echo (isset($info)) ? $info : ''; ?></section>	</div>
							<?php } ?>
					</form>
		</section>		
			
		</br></br></br>
		<li>
			<?php require_once './fragmentos/pie_de_pagina.php';?>
		</li>
	</body>
</html>