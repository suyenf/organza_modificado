<?php
	include_once '../nucleo_php/coneccion.php';
	include_once '../nucleo_php/funciones.php';
	
	if(isset($_POST['enviar'])){
		$i = 0;
		foreach($_POST as $campo => $contenido){
			if(empty($contenido)){ $i++; }
		}
		if($i == 0){
				if (isset($_POST['nombre_p'])) {
				$nombre_p = $_POST['nombre_p'];
				} else {
				$nombre_p = "nombre_p";
				}
		
		
			$sql = "UPDATE producto SET codigo=%s, nombre_p='%s',precio_unitario=%s,cant_existencia=%s,descripcion_prod='%s',
						id_proveedor=%s,id_marca='%s', status='%s',fecha_ingreso='%s' WHERE id_producto = %s";
			$sql = sprintf($sql, 
			$_POST['codigo'],
			$nombre_p,
			$_POST['precio_unitario'],
			$_POST['cant_existencia'],
			$_POST['descripcion'],
			$_POST['id_proveedor'],
			$_POST['id_marca'],
			$_POST['status'],
			$_POST['fecha_ingreso'],
			$_GET['id']);
			mysql_qry($sql);
			
        $info = 'REGISTRO  MODIFICADO';
    } else { //si no manda mensajitos de texto
        $info = 'SE ENVIARON DATOS VACIOS';
    }
}
	$sql_a="SELECT a.`id_producto`,a.`codigo`,a.`nombre_p`,a.`precio_unitario`,a.`cant_existencia`,a.`descripcion_prod`,
b.`razon_social`,a.`id_marca`,c.descripcion,a.`fecha_ingreso` FROM `producto` AS a,`proveedor` AS b,`estado` AS c
WHERE a.`status`= c.`status` AND a.`id_proveedor` = b.`id_proveedor` AND id_producto = %s";
					
	//$sql_a="SELECT * FROM producto WHERE id_producto= %s";
	$sql_a= sprintf($sql_a,$_GET['id']);
	$resul= mysql_qry($sql_a);
	$producto= mysql_fetch_array($resul);
	
		$sql_prov = "SELECT * FROM proveedor WHERE status= 1";
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
		<link rel="stylesheet" href="./../css/modificar_producto.css"/>
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

			.modproducto article:first-child input{
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
		<div class="title">
			<h2>Modificar Producto</h2>
			<article>

					  <form name="form9" method="post" action="" class="modproducto" style="font-size:14px;font-family:Arial;">
						 
						 <label>C&oacute;digo de Barra:</label><input placeholder type="text" name="codigo" value="<?php echo $producto['codigo'];?>"title="Introduzca un Formato Valido"size="20px" type="cod"  autofocus required pattern="[0-9]*"/>
						 
						 <label>Producto:</label><input placeholder= "Producto"  type="text" title="Introduzca un Producto Valido"size="19px" name="nombre_p" value="<?php echo $producto['nombre_p'];?>"required pattern="[a-zA-Z-0-9- - - ]*">
						</br></br></br>
						 <p><label>Marca:</label><input placeholder="Marca"  title="Introduzca una Marca Valida" type="Text" size= "5px" name="id_marca"  value="<?php echo $producto['id_marca'];?>"required pattern="[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-   ]*"/>
						 <label>P/U:</label><input placeholder= "Precio Unitario"  title="Introduzca un Formato de Moneda" size="10px" type="decbin"  name="precio_unitario" value="<?php echo $producto['precio_unitario'];?>"required pattern="[0-9.00]*" />
						<label>Cantidad:</label><input placeholder= "Cantidad"  title="Introduzca una Cantidad Valida. Solo se Admiten Números" size= "4px" type="decbin"  
						name="cant_existencia" value="<?php echo $producto['cant_existencia'];?>"required pattern="[0-9]*" /></p>
						</br></br>
						<div id="aver">
						<label >Descripci&oacute;n:</label><input  placeholder="Descripci&oacute;n"  title="Introduzca  Descripci&oacute;n " type="Text" size= "39px" name="descripcion" value="<?php echo $producto['descripcion_prod'];?>"required pattern="[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-   ]*"/></div>
                      	</br></br></br>
						 <label>Fecha de Ingreso:</label><input type="date" title="Introduzca Fecha de Ingreso del Producto" name="fecha_ingreso" value="<?php echo $producto['fecha_ingreso'];?>"/>
			
						
						<p> <label>Proveedor:</label><input type="Text" name="id_proveedor" title="Introduzca una Raz&oacute;n Social Validas" size= "16px" value="<?php echo $producto['razon_social'];?>" />
						
						    <select id= "mine" name="id_proveedor" >
							<option value="">-----------</option>
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
					</br></br></br>
							
								 <label>Estado:</label><input type="Text"  size="5px" name="statpro" value="<?php echo $producto['descripcion'];?>"/><select id="stat" name="status">
							<option value="">-----------</option>
							<?php while($fila_stat= mysql_fetch_array($res_stat) ){ ?>
							<option value="<?php echo $fila_stat['status'] ?>">
							<?php echo $fila_stat['descripcion'] ?>
							</option>
							<?php } ?></select></p>	
	

			</article>
							<button id="button" type="Submit" name="enviar" value="Guardar">Modificar</button>
							<button id="button" type="Cancelar" name="cancelar" value="Cancelar" onClick="location.href='../aplicacion/modificar_p.php'">Cancelar</button>
							</br></br></br>
       
							<?php if (!empty($info)) { ?>
							<div class="content">
							<section id="sun"><?php echo (isset($info)) ? $info : ''; ?></section>	</div>
							<?php } ?>
				</form>
		
		 </section>	
<body>

		<li><?php require_once './fragmentos/pie_de_pagina.php'; ?></li>
	</body>	
</html>