<?php
include_once '../nucleo_php/coneccion.php';
include_once '../nucleo_php/funciones.php';

if (isset($_POST['enviar'])) {
    //$i = 0;
    foreach ($_POST as $campo => $contenido) { //repite por cada elemento dentro de un array
        if (empty($contenido)) { //verifico por cada uno de los capos cual esta vacio
          //  $i++;
        }
    }
	
	$sql = "SELECT * FROM `empleado`  WHERE ci = '%s'";
							$sql = sprintf($sql, $_POST['ci']);
							$i = mysql_qry($sql); // se inserta la data ejecutando la consulta sql
							if(mysql_num_rows($i) == 0){ //si registro $i no existe ingresa los datos si no cliente existe y no lo guarda
		

							$cedula = $_POST['ci'];
							$nom = $_POST['nombre'];
							$apell = $_POST['apellido'];
							$cargo = $_POST['id_cargo'];
							$sttemp = $_POST['status'];
			
			
			$sql = "INSERT INTO empleado VALUES (NULL,$cedula, '$nom', '$apell','$cargo', '$sttemp')";

			mysql_qry($sql); // se inserta la data ejecutando la consulta sql
						$info = 'REGISTRO GUARDADO';
		}else{ //si no manda mensajitos de texto
			$info = 'EMPLEADO EXISTE';	
			}
			}	
				$sql_cargo = "SELECT * FROM cargo WHERE Status = 1";
				$res_cargo = mysql_qry($sql_cargo);
				
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

		<link rel="stylesheet" href="./../css/empleado.css"/>
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

			.registroempleado article:first-child input{
				font-weight: bold;
				text-align:left;
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
    <!--TRABAJO DE MAQUETADO DE LA CABEZERA-->
<body>
		<?php include_once './fragmentos/menu_header.php'; ?>
		<section id="trabajos">
			<div class="title"><h2>Agregar Empleado</h2></div>
			<form  name= "form19" method="post" action="registro_e.php" class="registroempleado" style="font-size:14px;font-family:Arial;color:#34495E;min-width:150px">
				<article>
                    <form method="post" action="">
                        <p><input  placeholder="Nombre" title="Introduzca un Nombre Valido" type="text" size= "14px" name="nombre"  autofocus required pattern="[a-zA-Z--]*" /></p>
                       <p><input placeholder="Apellido"  title="Introduzca un Apellido Valido" type="Text" size= "14px" name="apellido"  required  pattern="[a-zA-Z]*" /></p>
                      <p><input placeholder="C.I."  type="id" name="ci" required pattern="\d\d\d\d\d\d\d\d" title="Introduzca 8 digitos y Si la Cédula contiene 7 coloque 0"></p>
                      <p><input placeholder="Direcci&oacute;n"  title="Introduzca una direcci&oacute;n Valida" type="Text" size= "40px" name="direccion" required pattern="[a-zA-Z---0-9-\d ]*"></p>
					<p>
					
											<select name="status" style=" width: 25%">
									<option value="">Estado</option>
									<?php while($fila_stat = mysql_fetch_array($res_stat) ){ ?>
									<option value="<?php echo $fila_stat['status'] ?>">
									<?php echo $fila_stat['descripcion'] ?>
									</option>	
									<?php } ?>
									</select></p></br></br>
						<p>
						<select name="id_cargo" style=" width: 35%">
									<option value="">Cargo</option>
									<?php while($fila_cargo = mysql_fetch_array($res_cargo) ){ ?>
									<option value="<?php echo $fila_cargo['id_cargo'] ?>">
									<?php echo $fila_cargo['descripcion_car'] ?>
									</option>	
									<?php } ?>
									</select>
						</p>
						</br></br></br></br>
				</article>
				
				<button id="button" type="Submit" name="enviar" value="Guardar">Guardar</button>
			    <button id="button" type="Cancelar" name="cancelar" value="Cancelar" onClick="location.href='../aplicacion/registro_p.php'">Cancelar</button>
				<div class="content">
							<?php if (!empty($info)) { ?>
							<div class="content">
							<section id="sun"><?php echo (isset($info)) ? $info : ''; ?></section>	</div>
							<?php } ?>
						</form>
		 </section>	
<body>
		<li>
			<?php require_once './fragmentos/pie_de_pagina.php';?>
		</li>
	</body>
</html>