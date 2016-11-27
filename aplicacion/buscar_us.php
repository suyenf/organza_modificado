<?php
include_once '../nucleo_php/coneccion.php';
include_once '../nucleo_php/funciones.php';

?>
<!DOCTYPE html>
<html lang="es">
    <head> <!-- -->
        <meta charset="utf-8"/><!--ESTO ES UNIVERSAL-->
        <title>Sistema de Inventario</title><!--NOMBRE QUE SE MUESTRA EN LA PESTANA DEL NAVEGADOR-->
        <meta name="viewport" content="width=device-width,initial-scale=1"/><!--el viewport sirve para que el disp. este viendo la pag web como se le diga en el content...(la linea quiere decir que el ancho del contenido de este sitio se va a ver conforme sea el ancho del dispositivo, la escala inicial va a ser igual a 1)-->
        <link rel="shortcut icon" type="image/x-icon" href="../favicon2.ico"/> <!--enlace para colocar el favicon.ICO-->
        <link rel="sitemap" type="aplication/xml" title="sitemap" href="sitemap.xml"/>
        <link rel="stylesheet" href="./../css/flexslider.css"/><!--enlazamos el slider-->
        <link rel="stylesheet" href="./../css/menu.css"/>
		<link rel="stylesheet" href="./../css/buscar_usuario.css"/>


        <!--LINKS PARA LOS JQUERYS QUE DESCARGUE -->
		<script type="text/javascript" src="./../js/jquery.js"></script>
		<script type="text/javascript" src="./../js/menu.js"></script>
        <script type="text/javascript" src="./../js/jquery.min.js"></script>					
        <script type="text/javascript" src="./../js/jquery-ui-1.10.4.custom.min.js"></script>					
          <!--FIN DE LOS LINKS PARA LOS JQUERYS QUE DESCARGUE -->
        <script src="./../js/jquery.flexslider.js"></script>
        <script>

            $(document).ready(function() {
                $("a,.btn").button();
                $(".flexslider").flexslider();
            })

        </script>
    
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
		<div class="title"><h2>Buscar Proveedor</h2></div>				
                <nav>
				<form  name= "form17" method="post" action="buscar_us.php" class="buscarusuario" style="font-size:14px;font-family:Arial;color:#34495E;min-width:150px">
            <article>

				 <input  placeholder="Nombre de Usuario" title="Introduzca un Nombre Valido" type="text" size= "16px" name="nombre_us"autofocus required pattern="[a-zA-Z--]*" /></p>

               <?php
                if (isset($_POST['nombre_us']) && !empty($_POST['nombre_us'])) 
				{

				
					$sql ="SELECT * FROM `usuario` WHERE  nombre_us = '%s'";
					
		$sql ="SELECT a.`id_us`,b.`nombre_niv`,a.`nombre_us`,a.`clave`,c.`descripcion`FROM `usuario` AS a,`nivel` AS b,`estado` AS c
							WHERE a.`id_nivel`= b.`id_nivel` AND a.`status`= c.`status` AND a.status= '1'  AND nombre_us = '%s' LIMIT 1";

							$sql = sprintf($sql, $_POST['nombre_us']);
							$res = mysql_qry($sql); // se inserta la data ejecutando la consulta sql
							if (mysql_num_rows($res) == 1) 
							{
								 $fila = mysql_fetch_assoc($res);
		
										//print_r($fila);
										?>
										<p>
										<table border ="2" style="position:absolute;top:347px;left:490px;" >
                            <tr>
												<td>Usuario</td>
												<td>Estado</td>
												<td>Nivel</td>
										
											</tr>
											<tr>
												<td>
													<a href="modificar_us.php?id=<?php echo $fila['id_us'] ?>">
														<?php echo $fila['nombre_us'] ?>
													</a>
												</td>
												<td><?php echo $fila['descripcion'] ?></td>
												<td><?php echo $fila['nombre_niv'] ?></td>
	
											</tr>
										</table>
										</p>
										<?php
										}
						
                    else{

					   $info = 'USUARIO NO EXISTE' ;}		
					}
                
                ?> 
        </nav>	

</article>
					<button id="button" type="Submit" name="enviar" value="Buscar">Buscar</button>
					
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
