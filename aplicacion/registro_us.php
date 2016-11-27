<?php
include_once '../nucleo_php/coneccion.php';
include_once '../nucleo_php/funciones.php';

if (isset($_POST['enviar'])) {
  //  $i = 0;
    foreach ($_POST as $campo => $contenido) { //repite por cada elemento dentro de un array
        if (empty($contenido)) { //verifico por cada uno de los capos cual esta vacio
    //        $i++;
        }
    }
    //if ($i == 0) {//si no hay ninguno vacio guarda
				 	if (isset($_POST['status'])) {
				$status = $_POST['status'];
				} else {
				$status = "status";
				}

				
	$sql = "SELECT * FROM `usuario`  WHERE nombre_us = '%s'";
							$sql = sprintf($sql, $_POST['nombre_us']);
							$i = mysql_qry($sql); // se inserta la data ejecutando la consulta sql
							if(mysql_num_rows($i) == 0){ //si registro $i no existe ingresa los datos si no cliente existe y no lo guarda
				$id_nivel=$_POST['id_nivel'];
				$nombre_us=$_POST['nombre_us'];
				$clave=$_POST['clave'];
	     		$status = $_POST['status'];
							
$sql = "INSERT INTO usuario VALUES(NULL,'$id_nivel','$nombre_us','$clave','$status')";
        
			mysql_qry($sql); // se inserta la data ejecutando la consulta sql
						$info = 'REGISTRO GUARDADO';
		}else{ //si no manda mensajitos de texto
			$info = 'USUARIO YA EXISTE';	
			}
			}		
				$sql_emp = "SELECT * FROM empleado WHERE status = 1";
				$sql_emp = mysql_qry($sql_emp);
		
				$sql_nivel = "SELECT * FROM nivel WHERE status = 1";
				$res_nivel = mysql_qry($sql_nivel);
				
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

		<link rel="stylesheet" href="./../css/usuario.css"/>
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

			.regusuario article:first-child input{
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
    <!--TRABAJO DE MAQUETADO DE LA CABEZERA-->
    <body>
				<?php include_once './fragmentos/menu_header.php'; ?>	
	
				  <section id="trabajos">
			<div class="title"><h2>Agregar Usuario</h2></div>
			<form  name= "form16" method="post" action="registro_us.php" class="regusuario" style="font-size:14px;font-family:Arial;color:#34495E;min-width:150px">
				<article>
											<p><input placeholder="Introduzca Nombre de Usuario" size="30px" type="id" name="ci" required pattern="\d\d\d\d\d\d\d\d" title="Introduzca un nombre de usuario Valido"></p>
											<input type="submit" value="*****"><br><br><br>

						
						<?php
									if (isset($_POST['ci']) && !empty($_POST['ci'])) {
										$sql = "SELECT ci,nombre,apellido FROM empleado WHERE ci = %s LIMIT 1";
											$sql = sprintf($sql, $_POST['ci']);

										$res = mysql_qry($sql); // se inserta la data ejecutando la consulta sql
										if (mysql_num_rows($res) == 1) {
											$usua = mysql_fetch_assoc($res);
											//print_r($fila);
			
											?>
											<p>
										<table border ="1" style="position:absolute;top:324px;left:522px;border-radius:10px;" >
								
										<tr>
											<td>C&eacute;dula</td>
											<td>Nombre</td>
											<td>Apellido</td>
										</tr>
										<tr>
											<td><?php echo $usua['ci'] ?> </td>
											<td><?php echo $usua['nombre'] ?></td>
											<td><?php echo $usua['apellido'] ?></td>
										</tr>	
                        </table>
                     	<?php
										}
						
                   else{

							 $info = 'EL EMPLEADO NO ESTA REGISTRADO'; }
                   }
                ?> 
					</form>
                       <form method="post" action=""> 

                     <input  placeholder="Nombre de Usuario" title="Introduzca un Nombre Valido" type="text" size= "16px" name="nombre_us"autofocus required pattern="[a-zA-Z--]*" /></p>
					 
					 <input placeholder="Clave"  title="No se permiten Letras para la Clave" type="Password" size= "10px" name="clave" required pattern="[0-9]*"/></p>
</br></br></br>
						<select name="id_nivel">
								<option value="">Nivel</option>
								<?php while($fila_nivel = mysql_fetch_array($res_nivel) ){ ?>
								<option value="<?php echo $fila_nivel['id_nivel'] ?>">
								<?php echo $fila_nivel['nombre_niv'] ?>
								</option>
								<?php } ?>
						</select>
						<select name="status">
									<option value="">Estado</option>
									<?php while($fila_stat = mysql_fetch_array($res_stat) ){ ?>
									<option value="<?php echo $fila_stat['status'] ?>">
									<?php echo $fila_stat['descripcion'] ?>
									</option>	
									<?php } ?>
									</select>
	
					
					</article>
				
				<button id="button" type="Submit" name="enviar" value="Guardar">Guardar</button>
			    <button id="button" type="Cancelar" name="cancelar" value="Cancelar" onClick="location.href='../aplicacion/registro_us.php'">Cancelar</button>
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