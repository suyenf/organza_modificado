
<!DOCTYPE html>
<html lang="es">
 <meta charset="utf-8"/><!--ESTO ES UNIVERSAL-->
        <title>Sistema de Inventario</title><!--NOMBRE QUE SE MUESTRA EN LA PESTANA DEL NAVEGADOR-->
        <meta name="viewport" content="width=device-width,initial-scale=1"/><!--el viewport sirve para que el disp. este viendo la pag web como se le diga en el content...(la linea quiere decir que el ancho del contenido de este sitio se va a ver conforme sea el ancho del dispositivo, la escala inicial va a ser igual a 1)-->
        <link rel="shortcut icon" type="image/x-icon" href="../favicon2.ico"/> <!--enlace para colocar el favicon.ICO-->
        <link rel="sitemap" type="aplication/xml" title="sitemap" href="sitemap.xml"/>
        <link rel="stylesheet" href="./../css/modificar_proveedor.css"/><!--enlazamos el slider-->
		<link rel="stylesheet" href="./../css/menu.css"/><!--enlazamos el estilo del menu-->
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
		<div class="title"><h2>Modificar Proveedor</h2></div>
         <article>            
                <nav>	                    
					<form  name= "form4" method="post" action="modificar_p.php" class="modificarproveedor" style="font-size:14px;font-family:Arial bold;color:#162029;min-width:150px">
                     	<label>Raz&oacute;n S.:</label><input type="Text" name="razon_social"value="<?php echo $prov['razon_social'] ?>"required pattern="[a-zA-Z0-9 . -  ]*" />
						
						<label>Rif. :</label><input type="Text" size="20" name="rif"value="<?php echo $prov['rif'] ?>"required pattern="[a-zA-Z0-9 . -  ]*" />
						
                      <label>Direcci&oacute;n : </label><input type="Text" name="direccion"value="<?php echo $prov['direccion'] ?>"required pattern="[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-   ]*"/>
					  
                      <label>Tel&eacute;fono : </label><input type="Text" name="telefono"value="<?php echo $prov['telefono'] ?>"pattern="\d\d\d\d\d\d\d\d\d\d\d" title="Introduzca solo 11 digitos con Código de Área" />
					  
                        <label>E_mail: </label><input type="email" name="e_mail"value="<?php echo $prov['e_mail'] ?>"required>
						
						<label>Estado</label><input type="Text" size="4"name="status" value="<?php echo $prov['descripcion'];?>"/><select name="status">
							<option value="">------------</option>
							<?php while($fila_stat= mysql_fetch_array($res_stat) ){ ?>
							<option value="<?php echo $fila_stat['status'] ?>">
							<?php echo $fila_stat['descripcion'] ?>
							</option>	
							<?php } ?>
							
			             </select>
                </nav>
</article>
							<button id="button" type="Submit" name="enviar" value="Guardar">Modificar</button>
							<button id="button" type="Cancelar" name="cancelar" value="Cancelar" onClick="location.href='../aplicacion/modificar_p.php'">Cancelar</button>
							</br></br></br>
       
							<div class="content">
							<section id="sun">	<?php echo (isset($info)) ? $info : ''; ?></section>	</div>
				</form>
		 </section>	
<body>

		<li><?php require_once './fragmentos/pie_de_pagina.php'; ?></li>
	</body>	
</html>