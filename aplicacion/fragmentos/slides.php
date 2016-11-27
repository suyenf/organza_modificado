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
        <link rel="stylesheet" href="./../css/menu.css"/><!--enlazamos el estilo del menu-->
       <!-- <link rel="stylesheet" href="./../css/estilos.css"/> <!--enlace para el estilo de la pag-->


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
    </head>
    <!--TRABAJO DE MAQUETADO DE LA CABEZERA-->
    <body>
        <?php include_once './fragmentos/menu_header.php'; ?>
    <header>
	
				<article id="galeria-inicio"><!-- En esta parte se colocaran las galerias de JQUERY -->
					<div class="flexslider">
					<ul class="slides">
						<li> 
							<a href="http://bextlan.com/"><img src="img/slide-0.png"/></a>
							<p class="flex-caption">bextlan.com | lugas de bits.....</p>
						</li>
						<li>
							<img src="img/slide-1.png"/>
							<p class="flex-caption">Curso HTML5</p>
						</li>
						<li>
							<img src="img/slide-2.png"/>
						</li>
						<li>
							<a href="htt://bextlan.com/"><img src="img/slide-3.png"/></a>
							<p class="flex-caption">Curso PHP</p>
							
						
						</li>	
					</ul>
					</div>
			</article>
	
	</header>
	</body>
	

	
	
    <footer><!--Aqui pondremos publicidad y botones de redes sociales -->

    </footer>

    <ul><li>
		<?php require_once './fragmentos/pie_de_pagina.php'; 
		?>
	</li>
	
	


</html>