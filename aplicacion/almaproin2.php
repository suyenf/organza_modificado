<?php
	include_once '../nucleo_php/coneccion.php';
	include_once '../nucleo_php/funciones.php';
	
	if(isset($_POST['enviar'])){
		//$i = 0;
		foreach($_POST as $campo => $contenido){
			if(empty($contenido)){
			//	$i++;
			}
		}

		/*		$sql = "SELECT * FROM entrada WHERE correlativo_factura = %s";
							$sql = sprintf($sql, $_POST['correlativo_factura']);
							$i = mysql_qry($sql); // se inserta la data ejecutando la consulta sql*/
							if(mysql_num_rows($i) == 0){
		

	$sql = "UPDATE `entrada`SET `id_entrada` = %s,`id_proveedor` = %s,`correlativo_factura` = %s,`fecha_factura_emitida` = '%s',`observacion` = '%s',`id_producto` = %s	WHERE `id_entrada` = %s";
			$sql = sprintf($sql, $_POST['id_proveedor'],
							 $_POST['correlativo_factura'],
							 $_POST['fecha_factura_emitida'],
							 $_POST['observacion'],
							 $_POST['id_producto'],
							 $_GET['id']);
			mysql_qry($sql);
			$info = 'RECIBO GUARDADO';
		}else{
			$info = 'EL Nro. DE FACTURA YA SE ENCUENTRA REGISTRADO ';
		}
	}
						 	if (isset($_POST['id'])) {
				$id = $_POST['id'];
				} else {
				$id = "id";
				}
		
	
	$sql_a="SELECT a.`id_entrada`,b.`razon_social`,a.`correlativo_factura`,a.`fecha_factura_emitida`, a.`observacion`,c.`nombre_p`
FROM `entrada` AS a,`proveedor` AS b,`producto` AS c
WHERE a.`id_proveedor`= b.`id_proveedor` AND a.`id_producto` = c.`id_producto` AND `id_entrada` = %s";
					
	//$sql_a="SELECT * FROM producto WHERE id_producto= %s";
	$sql_a= sprintf($sql_a,$id);
	$resul= mysql_qry($sql_a);
	$producto= mysql_fetch_array($resul);
	
	
	

		$sql_prod = "SELECT * FROM producto WHERE status = 1";
		$res_prod = mysql_qry($sql_prod);
		
		$sql_prov = "SELECT * FROM proveedor WHERE status = 1";
		$res_prov = mysql_qry($sql_prov);	

		
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
	<!--	<link rel="stylesheet" style="text/css" href="../css/almacenprods.css" />		-->
		<link rel="stylesheet" style="text/css" href="../css/almacenprods2.css" />
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
		<script language="JavaScript">
		function doPrint(){
		document.all.item("noprint").style.visibility='hidden' 
		window.print()
		document.all.item("noprint").style.visibility='visible'
		}
		</script>
				
		<style type="text/css">
	
			.almaprods article:first-child input{
				font-weight: bold;
				text-align: left;
			}
		</style>	
		
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
			<div class="title"><h2>Entrada del Producto</h2></div>
					<form name= "form10_1" method="post">

						<article>
						<input type="Text"  size="7px" name="statpro" value="<?php echo $producto['nombre_p'];?>"/>
						
						<p><input type="Text"  size="7px" name="statpro" value="<?php echo $producto['razon_social'];?>"/></p>
						
					<p><input placeholder="N&ordm; Factura" type="text"value="<?php echo $producto['correlativo_factura'];?>" size="11" title= "Introduzca un N&uacute;mero de Factura Valido"name="correlativo_factura" required pattern="[0-9--]*"/></p>
							<p><input placeholder="Fecha de Emisi&oacute;n de Factura" type="date"value="<?php echo $producto['fecha_factura_emitida'];?>"  size="20" name="fecha_factura_emitida"  required/></p>
						<p><input placeholder="Observaci&oacute;n" type="text" value="<?php echo $producto['observacion'];?>" size="22" name="observacion" style="text-align: top; height: 80px; width: 260px" required pattern="[a-zA-Z- -  ]*" /></p>
						</article>
						</br>

									<button id="button" type="Submit" name="enviar" value="Enviar">Enviar</button>
						         	<a target="_blank"href="recibo_in.php"/><span><button id="button">Ver Recibo</button></span></a>
									<a target="_blank" href="recibo_in.php"><button id="button">EVer Recibo</button></a>
										
						<!--			<input type="submit" onclick = "this.form.action = 'almaproin.php'" value="accion 1" />
								<input type="submit" onclick = "this.form.action = 'recibo_in.php'" value="accion 2" />		
										
	<!--				<form action="pdfcliente.php">

<input type="button" name="imprimir" value="Imprimir"  onClick="window.print();"/>
</form>
					-->
					
					
					</form>
				</nav>
	
			
							<div class="content">
							<section id="sun">	<?php echo (isset($info)) ? $info : ''; ?></section>	</div>
		</section>		
			
		</br></br></br>
		<li>
			<?php require_once './fragmentos/pie_de_pagina.php';?>
		</li>
	</body>
</html>