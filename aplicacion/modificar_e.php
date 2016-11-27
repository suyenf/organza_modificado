<?php
include_once '../nucleo_php/coneccion.php';
include_once '../nucleo_php/funciones.php';

if (isset($_POST['enviar'])) {
    $i = 0;
    foreach ($_POST as $campo => $contenido) { //repite por cada elemento dentro de un array
        if (empty($contenido)) { //verifico por cada uno de los capos cual esta vacio
            $i++;
        }
    }
				if (isset($_GET['id'])) {
				$id = $_GET['id'];	
				} else {
				$id = "id";
				}
    if ($i == 0) {//si no hay ninguno vacio guarda 
       
		$sql="UPDATE empleado SET  ci=%s,nombre='%s',apellido='%s',id_cargo=%s,status='%s' WHERE id_emp= %s";
        $sql = sprintf($sql, 
		$_POST['ci_e'], 
		$_POST['nombre_e'],
		$_POST['apellido'],
		$_POST['id_cargo'],
		$_POST['status'],
		$id);
        mysql_qry($sql); // se inserta la data ejecutando la consulta sql

        $info = 'REGISTRO  MODIFICADO';
    } else { //si no manda mensajitos de texto
        $info = 'SE ENVIARON DATOS VACIOS';
    }
}
				if (isset($_GET['id'])) {
				$id = $_GET['id'];	
				} else {
				$id = "id";
				}
	$sql_emp = "SELECT * FROM cargo ";
	$res_emp = mysql_qry($sql_emp);
	
	$sql_stat = "SELECT * FROM estado";
	$res_stat = mysql_qry($sql_stat);
	//$sql_e = "SELECT `id_emp`,`ci`,`nombre`,`apellido`,`id_cargo`,`status` FROM empleado WHERE ci= %s";
			$sql_e ="SELECT a.`id_emp`,a.ci,a.`nombre`,a.`apellido`,b.`descripcion_car`,c.`descripcion` FROM `empleado` AS a,`cargo` AS b,`estado` AS c WHERE a.`id_cargo`=b.`id_cargo` AND a.`status`=c.`status`";
						  
		$sql_e= sprintf($sql_e,$id);
		$resul= mysql_qry($sql_e);
		$emp= mysql_fetch_array($resul);
?>
<!DOCTYPE html>
<html lang="es">
 <meta charset="utf-8"/><!--ESTO ES UNIVERSAL-->
        <title>Sistema de Inventario</title><!--NOMBRE QUE SE MUESTRA EN LA PESTANA DEL NAVEGADOR-->
        <meta name="viewport" content="width=device-width,initial-scale=1"/><!--el viewport sirve para que el disp. este viendo la pag web como se le diga en el content...(la linea quiere decir que el ancho del contenido de este sitio se va a ver conforme sea el ancho del dispositivo, la escala inicial va a ser igual a 1)-->
        <link rel="shortcut icon" type="image/x-icon" href="../favicon2.ico"/> <!--enlace para colocar el favicon.ICO-->
        <link rel="sitemap" type="aplication/xml" title="sitemap" href="sitemap.xml"/>
				<link rel="stylesheet" href="./../css/menu.css"/>
        <link rel="stylesheet" href="./../css/modificar_empleado.css"/><!--enlazamos el slider-->

        <!--LINKS PARA LOS JQUERYS QUE DESCARGUE -->
        <script type="text/javascript" src="./../js/jquery.min.js"></script>					
        <script type="text/javascript" src="./../js/jquery-ui-1.10.4.custom.min.js"></script>					
        <!-- FIN DE LOS LINKS PARA LOS JQUERYS QUE DESCARGUE -->
        <script src="./../js/jquery.flexslider.js"></script>
		<script>

            $(document).ready(function() {
                $("a").button();
                $(".flexslider").flexslider();
            })

        </script>
				<style type="text/css">
			.modifempleado article{
				display: inline-block;
			}
			.modifempleado article:first-child input{
				font-weight: bold;
				text-align: left;
			}
		</style>
				</script>
				<style type="text/css">

			.modificarxliente article:first-child input{
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

    <!--TRABAJO DE MAQUETADO DE LA CABEZERA-->
    <body>
        <?php include_once './fragmentos/menu_header.php'; ?>
		<section id="trabajos">
		<div class="title"><h2>Modificar Proveedor</h2></div>
         <article>            
                <nav>	                    
				
                    <form  name= "form21" method="post" action="modificar_e.php" class="modifempleado" style="font-size:14px;font-family:Arial;color:#navy;min-width:150px"> 

                      <label>C&eacute;dula:</label> <input type="Text" name="ci_e"value="<?php echo $emp['ci'] ?>" autofocus required pattern="\d\d\d\d\d\d\d\d" title="Introduzca 8 digitos y Si la Cédula contiene 7 coloque 0">					</br></br></br>
                      <label>Nombre:</label><input type="Text" name="nombre_e"value="<?php echo $emp['nombre'] ?>"required pattern="[a-zA-Z--]*" /></p>
						<label>Apellido:</label> <input type="Text" size="20" name="apellido"value="<?php echo $emp['apellido'] ?>"equired  pattern="[a-zA-Z]*" /></p>
						</br></br></br>
						
						<label>Cargo:</label><input type="Text" size="8"name="id_cargo"value="<?php echo $emp['descripcion_car'] ?>">
							<select name="id_cargo" style="width:17%;">
									<option value="">------------</option>
									<?php while($fila_emp = mysql_fetch_array($res_emp) ){ ?>
									<option value="<?php echo $fila_emp['id_cargo'] ?>">
									<?php echo $fila_emp['descripcion_car'] ?>
									</option>	
									<?php } ?>
							</select>
			
						<label>Estado:</label><input type="Text" size="4"name="status"value="<?php echo $emp['descripcion'] ?>">
							<select name="status" style="width:13%;">
							<option value="">------------</option>
							<?php while($fila_stat= mysql_fetch_array($res_stat) ){ ?>
							<option value="<?php echo $fila_stat['status'] ?>">
								<?php echo $fila_stat['descripcion'] ?>
							</option>	
							<?php } ?>
							</select>
                </nav>

      
      </article>
									<button id="button" type="Submit" name="enviar" value="Guardar">Guardar</button>
						            <button id="button" type="Cancelar" name="cancelar" value="Cancelar" onClick="location.href='../aplicacion/registro_c.php'">Cancelar</button>

		     
							<?php if (!empty($info)) { ?>
							<div class="content">
							<section id="sun"><?php echo (isset($info)) ? $info : ''; ?></section>	</div>
							<?php } ?>
				</form>
		 </section>	
	</body>
		<li>
			<?php require_once './fragmentos/pie_de_pagina.php';?>
		</li>

</html>