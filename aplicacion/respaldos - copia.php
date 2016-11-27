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
        <link rel="stylesheet" href="./../css/respaldo.css"/><!--enlazamos el slider-->
        <link rel="stylesheet" href="./../css/menu.css"/><!--enlazamos el estilo del menu-->



        <!--LINKS PARA LOS JQUERYS QUE DESCARGUE -->
        <script type="text/javascript" src="./../js/jquery.js"></script>
        <script type="text/javascript" src="./../js/menu.js"></script>
        <script type="text/javascript" src="./../js/jquery.min.js"></script>					
        <script type="text/javascript" src="./../js/jquery-ui-1.10.4.custom.min.js"></script>					
        <!--FIN DE LOS LINKS PARA LOS JQUERYS QUE DESCARGUE -->
        <script src="./../js/jquery.flexslider.js"></script>
        <script>

            $(document).ready(function () {
                $("a").button();
                $(".flexslider").flexslider();
            })

        </script>
		
    </head>
    <!--TRABAJO DE MAQUETADO DE LA CABEZERA-->
	<body>
		<?php include_once './fragmentos/menu_header.php'; ?>
		<section id="trabajos">
			<!--<div class="title">-->
				<h2>Respaldo</h2>

				<p><h2><a href="respaldo.php"  style="position:absolute;top:420px;left:997px;border-radius:10;"class="linkrespaldo">Generar Respaldo</a></h2></p>
				<?php
					$lista = file_get_contents('lista.txt');
					$lista = explode("\n", $lista);
					unset($lista[count($lista) - 1]);
					//print_r($lista);
				?>
				<table style="position:absolute;top:320px;left:197px;border-radius:10;" width="100" border="4">
				
					<tr>
						<th>N&ordm;</th>
						<th>Descripci&oacute;n</th>
						<th colspan="2">Acciones</th>
						<!--<th>Eliminar</th>-->
					</tr>
					<?php foreach($lista as $indice => $desc){ ?>
						<tr>
							<td><?php echo $indice + 1; ?></td>
							<td><?php echo $desc; ?></td>
							<td>
								<a href="backups/<?php echo $desc; ?>">
									<img src="./../img/view.png" alt="Vista Previa" title="Vista Previa" height="18" width="18" />
								</a>
							</td>
							<td>
								<a>
								<input type="reset" value="Borrar información">
									<img src="./../img/delete.png" alt="Eliminar" title="Eliminar" height="16" width="16" />
								</a>
							</td>
						</tr>
					<?php } ?>
				</table>
			<!--</div>-->
		</section>
		<!--<a><button id="button" type="reset" value="Borrar Atiguos">Borrar Atiguos</button></a>-->
		</br>
		<?php require_once './fragmentos/pie_de_pagina.php'; ?>
	</body>
</html>
