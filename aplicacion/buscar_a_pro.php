<?php
	include_once '../nucleo_php/coneccion.php';
	include_once '../nucleo_php/funciones.php';
?>

<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<title>Sistema de Inventario</title>
		<meta name="viewport" content="width=device-width,initial-scale=1"/>
		<link rel="shortcut icon" type="image/x-icon" href="../favicon2.ico"/>
		<link rel="sitemap" type="aplication/xml" title="sitemap" href="sitemap.xml"/>
		
		<link rel="stylesheet" href="./../css/menu.css"/>
		<link rel="stylesheet" href="./../css/buscar_cliente.css"/>
		<script type="text/javascript" src="./../js/jquery.js"></script>
		<script type="text/javascript" src="./../js/menu.js"></script>
		<script type="text/javascript" src="./../js/jquery.min.js"></script>
		<script type="text/javascript" src="./../js/jquery-ui-1.10.4.custom.min.js"></script>
		<script src="./../js/jquery.flexslider.js"></script>
		<script>
			$(document).ready(function(){
				$("a,.btn").button();
				$(".flexslider").flexslider();
			})
		</script>
		
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
	
	<!--TRABAJO DE MAQUETADO DE LA CABEZERA-->
	<body>
		<?php include_once './fragmentos/menu_header.php'; ?>
		<section id="trabajos">
				<div class="title"><h2>Buscar Producto</h2></div>
				<nav>
					   <form  name= "form8"  method="post" action="">
               	<article>
			<input placeholder= "Introduzca el C&oacute;digo de Barra del Producto"  title="Introduzca un Formato Valido" size= "35px" type="cod"  name="codigo" autofocus required pattern="[0-9]*" /></p>
            </br></br></br></br></br>    
					
					<?php
						if(isset($_POST['codigo']) && !empty($_POST['codigo'])){
							$sql = "SELECT * FROM producto WHERE codigo = %s AND status='1' LIMIT 1";
							$sql = sprintf($sql, $_POST['codigo']);
							$res = mysql_qry($sql); // se inserta la data ejecutando la consulta sql
							if(mysql_num_rows($res) == 1){
								$fila = mysql_fetch_assoc($res);
								//print_r($fila);
					?>
				

						 <p>
						<table border ="2" style="position:absolute;top:422px;left:330px;" >
							<tr>
								<td>Tipo</td>
								<td>Precio</td>
								<td>Cantidad</td>
							</tr>
							<tr>
								<td>
									<a href="modificar_pro.php?id=<?php echo $fila['id_producto'] ?>">
										<?php echo $fila['nombre_p'] ?>
									</a>
								</td>
								<td><?php echo $fila['precio_unitario'] ?></td>
								<td><?php echo $fila['cant_existencia'] ?></td>
							</tr>
						</table>
					</p>
				<?php
							}else{
								$info = 'EL PRODUCTO NO ESTA REGISTRADO';}
						}
					?>
				</nav>	
			</article>
			<button id="button" type="Submit" name="enviar" value="Enviar">Buscar</button>
	</form>			
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
