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
	

	
    if ($i == 0) {//si no hay ninguno vacio guarda
        

		$sql = "UPDATE cliente SET nombre_c='%s',apellido_c='%s',ci=%s,direccion='%s',telefono=%s,status='%s'  WHERE id_cliente = %s";
        $sql = sprintf($sql, 
		$_POST['nombre'], 
		$_POST['apellido'],
		$_POST['ci'], 
		$_POST['direccion'],
		$_POST['telefono'],
    	$_POST['status'],
		$_GET['id']);
        mysql_qry($sql); // se inserta la data ejecutando la consulta sql

        $info = 'REGISTRO  MODIFICADO';
    } else { //si no manda mensajitos de texto
        $info = 'SE ENVIARON DATOS VACIOS';
    }
}
//echo $_GET['id'];

		$sql_stat = "SELECT * FROM estado";
		$res_stat = mysql_qry($sql_stat);
				
				if (isset($_GET['ci'])) {
				$id = $_GET['ci'];	
				} else {
				$id = "ci";
				}
	$sql_a="SELECT a.`id_cliente`,a.`ci`,a.`nombre_c`,a.`apellido_c`,a.`direccion`,a.`telefono`,b.`descripcion` FROM `cliente` AS a,`estado` AS b
				WHERE  a.`status`= b.`status` AND  id_cliente = %s";
	 $sql_a= sprintf($sql_a,$_GET['id']);
	$resul= mysql_qry($sql_a);
	$cliente= mysql_fetch_array($resul);/*selec los registros en un array por vez*/

?>
<!DOCTYPE html>
<html lang="es">
 <meta charset="utf-8"/><!--ESTO ES UNIVERSAL-->
        <title>Sistema de Inventario</title><!--NOMBRE QUE SE MUESTRA EN LA PESTANA DEL NAVEGADOR-->
        <meta name="viewport" content="width=device-width,initial-scale=1"/><!--el viewport sirve para que el disp. este viendo la pag web como se le diga en el content...(la linea quiere decir que el ancho del contenido de este sitio se va a ver conforme sea el ancho del dispositivo, la escala inicial va a ser igual a 1)-->
        <link rel="shortcut icon" type="image/x-icon" href="../favicon2.ico"/> <!--enlace para colocar el favicon.ICO-->
        <link rel="sitemap" type="aplication/xml" title="sitemap" href="sitemap.xml"/>
      <!--  <link rel="stylesheet" href="./../css/menu.css"/><!--enlazamos el estilo del menu-->
         <link rel="stylesheet" href="./../css/modificar_cliente.css"/>

        <!--LINKS PARA LOS JQUERYS QUE DESCARGUE -->
        <script type="text/javascript" src="./../js/jquery.min.js"></script>					
        <script type="text/javascript" src="./../js/jquery-ui-1.10.4.custom.min.js"></script>					
        <!-- FIN DE LOS LINKS PARA LOS JQUERYS QUE DESCARGUE -->
        <script src="./../js/jquery.flexslider.js"></script>
        <!--Script para darle un solo color a las letras del menu-->
		<script>

            $(document).ready(function() {
                $("a").button();
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
				<style type="text/css">

			.modificarxliente article:first-child input{
				font-weight: bold;
				text-align: left;
			}
		</style>

    <!--TRABAJO DE MAQUETADO DE LA CABEZERA-->
    <body>
        <?php include_once './fragmentos/menu_header.php'; ?>

<section id="trabajos">
		<div class="title"><h2>Modificar Cliente</h2></div>		
        <article>            
                <nav>	               
				    	<form name=form3 method="post" action="modifiar_c.php" class="modificarxliente"  style="font-size:14px;font-family:Arial bold;color:#162029;min-width:150px">
                      <label>Nombre:</label><input type="Text" size= "14px" name="nombre" value="<?php echo $cliente['nombre_c'];?>" autofocus required pattern="[a-zA-Z--]*" />
					  <label>Apellido:</label><input type="Text" size= "14px" name="apellido" value="<?php echo $cliente['apellido_c'];?>" required  pattern="[a-zA-Z]*" />
					  <label>C&eacute;dula</label><input  type="id" name="ci" value="<?php echo $cliente['ci'];?>"required pattern="\d\d\d\d\d\d\d\d" title="Introduzca 8 digitos y Si la Cédula contiene 7 coloque 0"/></br></br></br></br></br>
	                   <label>Direcci&oacute;n:</label><input type="Text" size= "40px" name="direccion" value="<?php echo $cliente['direccion'];?>" required pattern="[a-zA-Z-  ]*"/> </br></br></br></br></br>
					   <label>Tel&eacute;fono</label><input type="tel" id="orderTelephone" name="telefono" value="<?php echo $cliente['telefono'];?>"pattern="[0-9-/]*" title="Introduzca solo números" />
					   <label>Estado</label><input type="Text" size="4"name="status" value="<?php echo $cliente['descripcion'];?>"/><select name="status">
							<option value="">Estado</option>
							<?php while($fila_stat= mysql_fetch_array($res_stat) ){ ?>
							<option value="<?php echo $fila_stat['status'] ?>">
							<?php echo $fila_stat['descripcion'] ?>
							</option>	
							<?php } ?>
							
			             </select>
                    
                </nav>
				</article>
							<button id="button" type="Submit" name="enviar" value="Guardar">Modificar</button>
							<button id="button" type="Cancelar" name="cancelar" value="Cancelar" onClick="location.href='../aplicacion/modificar_c.php'">Cancelar</button>
							</br></br></br>
       
							<div class="content">
							<section id="sun">	<?php echo (isset($info)) ? $info : ''; ?></section>	</div>
				</form>
		 </section>	
<body>

		<li><?php require_once './fragmentos/pie_de_pagina.php'; ?></li>
	</body>	
</html>