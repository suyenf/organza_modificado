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
				   	if (isset($_POST['id_nivel'])) {
				$id_nivel = $_POST['id_nivel'];
				} else {
				$id_nivel = "id_nivel";
				}	
				
			 	if (isset($_POST['status'])) {
				$status = $_POST['status'];
				} else {
				$status = "status";
				}	

	
	
		$sql="UPDATE usuario SET id_nivel=%s,nombre_us='%s',clave='%s',status=%s  WHERE id_us = %s ";
        $sql = sprintf($sql, 
		$id_nivel,
		$_POST['nombre_us'],
		$_POST['clave'],
		$status,
		$_GET['id']);
		

        mysql_qry($sql); // se inserta la data ejecutando la consulta sql

        $info = 'REGISTRO  MODIFICADO';
    } else { //si no manda mensajitos de texto
        $info = 'SE ENVIARON DATOS VACIOS';
    }
}

	$sql_nivel = "SELECT * FROM nivel WHERE status = 1";
	$res_nivel = mysql_qry($sql_nivel);
	
	$sql_stat = "SELECT * FROM estado";
	$res_stat = mysql_qry($sql_stat);
	
			$sql_a ="SELECT a.`id_us`,b.`nombre_niv`,a.`nombre_us`,a.`clave`,c.descripcion
			 FROM `usuario` AS a, `nivel` AS b,`estado` AS c
			 WHERE a.`id_nivel`=b.`id_nivel` AND a.`status`=c.`status` AND  id_us= %s";
		$sql_a= sprintf($sql_a,$_GET['id']);
		$resul= mysql_qry($sql_a);
		$usua= mysql_fetch_array($resul);


?>
<!DOCTYPE html>
<html lang="es">
 <meta charset="utf-8"/><!--ESTO ES UNIVERSAL-->
        <title>Sistema de Inventario</title><!--NOMBRE QUE SE MUESTRA EN LA PESTANA DEL NAVEGADOR-->
        <meta name="viewport" content="width=device-width,initial-scale=1"/><!--el viewport sirve para que el disp. este viendo la pag web como se le diga en el content...(la linea quiere decir que el ancho del contenido de este sitio se va a ver conforme sea el ancho del dispositivo, la escala inicial va a ser igual a 1)-->
        <link rel="shortcut icon" type="image/x-icon" href="../favicon2.ico"/> <!--enlace para colocar el favicon.ICO-->
        <link rel="sitemap" type="aplication/xml" title="sitemap" href="sitemap.xml"/>
				<link rel="stylesheet" href="./../css/menu.css"/>
        <link rel="stylesheet" href="./../css/modificar_usuario.css"/><!--enlazamos el slider-->

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
		
		<!--script de los alertas, se coloca y se quita-->
		<script type="text/javascript" src="../jquery.js"></script>
		<style type="text/css">

		</style>
		
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
		<div class="title"><h2>Modificar Usuario</h2></div>
         <article>            
                <nav>	                    

                 <form  name= "form18" method="post" action="" class="modsuario" style="font-size:14px;font-family:Arial;color:#34495E;min-width:150px">
				
				<label>Usuario: </label><input type="Text" name="nombre_us"value="<?php echo $usua['nombre_us'] ?>"  required pattern="[a-zA-Z. -  ]*" title="Introduzca un Nombre de Usuario Valido">
				<label>Clave:</label><input type="password" name="clave"value="<?php echo $usua['clave'] ?>"pattern="[0-9]*">
                        
				<label>Nivel: </label><input type="Text" size="9" name="nombre"value="<?php echo $usua['nombre_niv'] ?>"pattern="[a-zA-Z. -  ]*" title="Introduzca unTipo de Usuario Valido">
							<select name="id_nivel" style="width:89px;">
							<option value="">Nivel</option>
							<?php while($fila_nivel = mysql_fetch_array($res_nivel) ){ ?>
							<option value="<?php echo $fila_nivel['id_nivel'] ?>">
								<?php echo $fila_nivel['nombre_niv'] ?>
							</option>
							<?php } ?>
						</select>


						<label>Estado:</label><input type="Text" size="7"name="descripcion"value="<?php echo $usua['descripcion'] ?>"pattern="[a-zA-Z. -  ]*"title="Introduzca un Estado Valido">
						
								<select name="status" style="width:80px;">
							<option value="">Estado</option>
							<?php while($fila_stat= mysql_fetch_array($res_stat) ){ ?>
							<option value="<?php echo $fila_stat['status'] ?>">
								<?php echo $fila_stat['descripcion'] ?>
							</option>	
							<?php } ?>
							</select>
                </nav>

</article>
							<button id="button" type="Submit" name="enviar" value="Modificar">Modificar</button>
							<button id="button" type="Cancelar" name="cancelar" value="Cancelar" onClick="location.href='../aplicacion/modificar_us.php'">Cancelar</button>
							</br></br></br>
       
								<?php if (!empty($info)) { ?>
							<div class="content">
							<section id="sun"><?php echo (isset($info)) ? $info : ''; ?></section>	</div>
							<?php } ?>
					</form>
		 </section>	


		<li><?php require_once './fragmentos/pie_de_pagina.php'; ?></li>
	</body>	
</html>