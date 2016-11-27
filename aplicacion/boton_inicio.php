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

		<link rel="stylesheet" href="./../css/menu.css"/>
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
	</head>
    <body>
	   <?php include_once './fragmentos/menu_header.php'; ?>

		<div id="queno"style="position: absolute;top:209px;right:429px;">
		<dl>
		<dt><b>Historia</b></dt>
		<dd>        Es una firma emprendedora en la región Porteña que se encarga del Diseño de Páginas Web,
				Sistemas Automatizados y Marketing, Web Hosting, Asistencia Técnica Personalizada y Remota, Instalación de Redes, 
				Mantenimiento de equipos de computación, Compra y venta de licencias, equipos de computación y Smartphone, 
				Configuración y mantenimientos de servidores.</dd>

		<dt><b>Misi&oacute;n</b>  </dt>
		<dd>       Nuestra Misión es ofrecer un buen servicio y proveer soluciones importantes
		       para el mejoramiento de negocios de nuestros clientes incluyendo tecnología de calidad. </dd>

		<dt><b>Visi&oacute;n </b> </dt>
		<dd>      Nuestra Visión es lograr ser un punto estratégico tanto regional como nacional en el campo de la tecnología,
         		brindado un mayor servicio de gran importancia.</dd>		

	</dl>
	</div>
	<script type="text/javascript"src="./js/jquery-latest.js"></script>
	<script type="text/javascript">
	  $('dl dd').not('dt.activo + dd').hide();
       $('dl dt').click(function(){
          if ($(this).hasClass('activo')) {
               $(this).removeClass('activo');
               $(this).next().slideUp();
          } else {
               $('dl dt').removeClass('activo');
               $(this).addClass('activo');
               $('dl dd').slideUp();
               $(this).next().slideDown();
          }
       });
	</script>
</body>
    <footer><!--Aqui pondremos publicidad y botones de redes sociales -->

    </footer>

    <ul><li>
		<?php require_once './fragmentos/pie_de_pagina.php'; 
		?>
	</li>
	
	


</html>