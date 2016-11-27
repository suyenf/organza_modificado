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
        <link rel="stylesheet" href="./../css/buscar_proveedor.css"/><!--enlazamos el slider-->
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
	
	<body>
		<?php include_once './fragmentos/menu_header.php'; ?>
		<section id="trabajos">
		<div class="title"><h2>Buscar Proveedor</h2></div>				
                <nav>
				<form  name= "form5" method="post" action="buscar_p.php" class="buscarproveedor" style="font-size:14px;font-family:Arial;color:#34495E;min-width:150px">
            <article>
				<p><input  placeholder="Introduzca R.I.F.del Proveedor:"  title="Introduzca un RIF Valido" type="id" size= "20px" name="rif" required pattern="[a-zA-Z0-9 . -  ]*" /></p></br></br></br></br></br>
               
                <?php
                if (isset($_POST['rif']) && !empty($_POST['rif'])) {
                    $sql = "SELECT id_proveedor, razon_social, rif,direccion,telefono,e_mail ,STATUS FROM proveedor WHERE rif = '%s' AND STATUS='1'";
                    $sql = sprintf($sql, $_POST['rif']);
                    $res = mysql_qry($sql); // se inserta la data ejecutando la consulta sql
                    if (mysql_num_rows($res) == 1) {
                        $fila = mysql_fetch_assoc($res);
                        //print_r($fila);
                        ?>
						<p>
						<table border ="2" style="position:absolute;top:422px;left:330px;" >
                            <tr>
                                <td>Rif </td>
								  
                   
                                <td>Raz&oacute;n Social</td>
						

                            </tr>
                            <tr>
                                <td>
                                    <a href="modificar_p.php?id=<?php echo $fila['id_proveedor'] ?>">
                                        <?php echo $fila['rif'] ?>
                                    </a>
                                </td>
                                <td><?php echo $fila['razon_social'] ?></td>
								
                            </tr>
                        </table>
                        </p>
                       <?php
							}else{

							$info = 'PROVEEDOR NO REGISTRADO';
							}
						}
					?>
				</nav>	

</article>
					<button id="button" type="Submit" name="enviar" value="Enviar">Buscar</button>	
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
