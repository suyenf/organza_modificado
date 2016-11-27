<?php
include_once '../nucleo_php/coneccion.php';
include_once '../nucleo_php/funciones.php';

if (isset($_POST['enviar'])) {
    //$i = 0;
    foreach ($_POST as $campo => $contenido) { //repite por cada elemento dentro de un array
        if (empty($contenido)) { //verifico por cada uno de los capos cual esta vacio
        //    $i++;
        }
    }
					/*if (isset($_POST['id_emp'])) {
				$id_emp = $_POST['id_emp'];
				} else {
				$id_emp = "";
				}*/
	$sql = "SELECT * FROM `usuario`  WHERE nombre_us = '%s' ";
							$sql = sprintf($sql, $_POST['nombre_us']);
							$i = mysql_qry($sql); // se inserta la data ejecutando la consulta sql
							if(mysql_num_rows($i) == 0){ //si registro $i no existe ingresa los datos si no cliente existe y no lo guarda

				$id_nivel=$_POST['id_nivel'];
				$nombre_us=$_POST['nombre_us'];
				$clave=$_POST['clave'];
			//	$id_emp=$_POST['id_emp'];
				$status=$status = $_POST['status'];
				mysql_qry($sql); // se inserta la data ejecutando la consulta sql
	
	
 	/* 	   if ($i == 0) {//si no hay ninguno vacio guarda
		if (isset($_POST['status'])) {
				$status = $_POST['status'];
				} else {
				$status = "status";
				}
				
				if (isset($_POST['nombre_true'])) {
					$nombre_true = $_POST['nombre_true'];
				} else {
					$nombre_true = "";
				}*/

	
				$sql = "INSERT INTO usuario VALUES(NULL,$id_nivel,'$nombre_us','$clave','$status')";
        
	/*			$sql = sprintf($sql,
				$_POST['id_nivel'],
				$_POST['nombre_us'], 
				$_POST['clave'],
				$_POST['id_emp'],
				$status = $_POST['status']);
				mysql_qry($sql); // se inserta la data ejecutando la consulta sql*/
			

			$info = 'REGISTRO GUARDADO';
		}else{ //si no manda mensajitos de texto
			$info = 'EL USUARIO EXISTE';	
			}
			}	

				$sql_nivel = "SELECT * FROM nivel ";
				$res_nivel = mysql_qry($sql_nivel);
				
				$sql_stat = "SELECT * FROM estado";
				$res_stat = mysql_qry($sql_stat);
?>

<!DOCTYPE html>
<html lang="es">
<html lang="es">
    <head> <!-- -->
        <meta charset="utf-8"/><!--ESTO ES UNIVERSAL-->
        <title>Sistema de Inventario</title><!--NOMBRE QUE SE MUESTRA EN LA PESTANA DEL NAVEGADOR-->
        <link rel="shortcut icon" type="image/x-icon" href="../favicon2.ico"/> <!--enlace para colocar el favicon.ICO-->
        <link rel="sitemap" type="aplication/xml" title="sitemap" href="sitemap.xml"/>
        <link rel="stylesheet" href="./../css/menu.css"/><!--enlazamos el estilo del menu-->
        <!--LINKS PARA LOS JQUERYS QUE DESCARGUE -->
		<script type="text/javascript" src="./../js/jquery.js"></script>
		<script type="text/javascript" src="./../js/menu.js"></script>
        <script type="text/javascript" src="./../js/jquery.min.js"></script>					
        <script type="text/javascript" src="./../js/jquery-ui-1.10.4.custom.min.js"></script>					
        <!--FIN DE LOS LINKS PARA LOS JQUERYS QUE DESCARGUE -->
        <script src="./../js/jquery.flexslider.js"></script>
        <script>
            $(document).ready(function() {
                $("a").button();
                $(".flexslider").flexslider();
            })

        </script>
</head>
    <!--TRABAJO DE MAQUETADO DE LA CABEZERA-->
    <body>
				<?php include_once './fragmentos/menu_header.php'; ?>	
		<!--	<section id="trabajos">		//// ESTO ES PARA EL BORDE-->
				  <h1>AGREGAR USUARIO</h1>
				  </br>
				  </br>
		<article>
			
						<nav>
							<form method="post" action="">
											Introduzca C&eacute;dula   : <input type="Text" name="ci"> 
											<input type="submit" value="*****"><br><br>

						
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
											
											C&eacute;dula : <?php echo $usua['ci'] ?><br><br>
											Nombre   : <?php echo $usua['nombre'] ?><br><br>
											Apellido. :  <?php echo $usua['apellido'] ?><br><br>
                        <?php
                    }
                }
                ?>
					</form>
                       <form method="post" action=""> 

                        Nombre de Usuario : <input type="Text" name="nombre_us"><br><br>
                        Clave : <input type="Password" name="clave"><br><br>
						Nivel : 
						<select name="id_nivel">
								<option value="">------------</option>
								<?php while($fila_nivel = mysql_fetch_array($res_nivel) ){ ?>
								<option value="<?php echo $fila_nivel['id_nivel'] ?>">
								<?php echo $fila_nivel['nombre_niv'] ?>
								</option>
								<?php } ?>
						</select>
						<br><br>				
						Estado : 
						<select name="status">
									<option value="">------------</option>
									<?php while($fila_stat = mysql_fetch_array($res_stat) ){ ?>
									<option value="<?php echo $fila_stat['status'] ?>">
									<?php echo $fila_stat['descripcion'] ?>
									</option>	
									<?php } ?>
									</select>
					
					<br><br><input type="Submit" name="enviar" value="Guardar">
					
					</form>
					</nav>

              <?php echo (isset($info)) ? $info : ''; ?> 
                </section>
        </article>
				</br></br></br>
	</body>
				</br></br> </br>
				<footer>
					<?php require_once './fragmentos/pie_de_pagina.php'; ?>
				</footer>		
		
</html>