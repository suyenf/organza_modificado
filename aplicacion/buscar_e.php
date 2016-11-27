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
		<link rel="stylesheet" href="./../css/buscar_empleado.css"/>
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
				<style type="text/css">

			.buscarempleado article:first-child input{
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
				<div class="title"><h2>Buscar Empleado</h2></div>
					<form  name= "form20" method="post" action="buscar_e.php" class="buscarempleado" style="font-size:14px;font-family:Arial;color:#34495E;min-width:150px">     
				<nav>
						<article>
                    <p><input placeholder="  Introduzca C&eacute;dula del Empleado"  type="id" size="28px"name="ci" required pattern="\d\d\d\d\d\d\d\d" title="Introduzca 8 digitos y Si la Cédula contiene 7 coloque 0"></p>
                <?php
               
						if(isset($_POST['ci']) && !empty($_POST['ci'])){
						
						$sql = "SELECT * FROM empleado WHERE ci = %s";
							$sql ="SELECT a.`id_emp`,a.`ci`,a.`nombre`,a.`apellido`,b.`descripcion_car`,c.descripcion
										FROM `empleado` AS a,`cargo` AS b,`estado` AS c 
										WHERE a.`id_cargo`=b.`id_cargo` AND a.`status`=c.`status`  AND a.`status`='1' AND ci = %s LIMIT 1";
						
							
							$sql = sprintf($sql, $_POST['ci']);
							$res = mysql_qry($sql); // se inserta la data ejecutando la consulta sql
							if(mysql_num_rows($res) == 1){
								$fila = mysql_fetch_assoc($res);
								//print_r($fila);
			
										?>
										<p>
								<table border ="2" style="position:absolute;top:422px;left:330px;" >
							<tr>
												<td>C&eacute;dula</td>
												<td>Nombre</td>
												<td>Apellido</td>
											</tr>
											<tr>
												<td>
													<a href="modificar_e.php?id=<?php echo $fila['ci'] ?>">
														<?php echo $fila['ci'] ?>
													</a>
												</td>
												<td><?php echo $fila['apellido'] ?></td>
												<td><?php echo $fila['nombre'] ?></td>
	
											</tr>
										</table>
										</p>
										<?php
										}
						
                   else{

							 $info = 'EL EMPLEADO NO ESTA REGISTRADO'; }
                   }
                ?> 
</article>
        </nav>	

					<button id="button" type="Submit" name="enviar" value="Buscar">Buscar</button>
					
						<?php if (!empty($info)) { ?>
							<div class="content">
							<section id="sun"><?php echo (isset($info)) ? $info : ''; ?></section>	</div>
						</form>
							<?php } ?>
		 </section>	
		</br></br></br>
		<li>
			<?php require_once './fragmentos/pie_de_pagina.php';?>
		</li>
	</body>
</html>
