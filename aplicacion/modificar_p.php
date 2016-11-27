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
		$sql="UPDATE proveedor SET razon_social='%s',rif='%s',direccion='%s',telefono=%s,e_mail='%s',status='%s'  WHERE id_proveedor = %s ";
        $sql = sprintf($sql, 
		$_POST['razon_social'], 
		$_POST['rif'] ,
		$_POST['direccion'],
		$_POST['telefono'],
		$_POST['e_mail'],
		$_POST['status'],
		$_GET['id']);
		

        mysql_qry($sql); // se inserta la data ejecutando la consulta sql

        $info = 'REGISTRO  MODIFICADO';
    } else { //si no manda mensajitos de texto
        $info = 'SE ENVIARON DATOS VACIOS';
    }
}
			$sql_stat = "SELECT * FROM estado";
		$res_stat = mysql_qry($sql_stat);
 
$sql_a= "SELECT a.`id_proveedor`,a.`razon_social`,a.`rif`,a.`direccion`,a.`telefono`,a.`e_mail`,b.descripcion FROM `proveedor` AS a,`estado` AS b 
WHERE a.`status`= b.`status` AND  a.id_proveedor =%s AND a.status= '1' ";

     //$sql_a="SELECT * FROM proveedor WHERE id_proveedor= %s";
	 $sql_a= sprintf($sql_a,$_GET['id']);
	$resul= mysql_qry($sql_a);
	$prov= mysql_fetch_array($resul)/*selec los registros en un array por vez*/
	
 
?>
<!DOCTYPE html>
<html lang="es">
 <meta charset="utf-8"/><!--ESTO ES UNIVERSAL-->
        <title>Sistema de Inventario</title><!--NOMBRE QUE SE MUESTRA EN LA PESTANA DEL NAVEGADOR-->
        <meta name="viewport" content="width=device-width,initial-scale=1"/><!--el viewport sirve para que el disp. este viendo la pag web como se le diga en el content...(la linea quiere decir que el ancho del contenido de este sitio se va a ver conforme sea el ancho del dispositivo, la escala inicial va a ser igual a 1)-->
        <link rel="shortcut icon" type="image/x-icon" href="../favicon2.ico"/> <!--enlace para colocar el favicon.ICO-->
        <link rel="sitemap" type="aplication/xml" title="sitemap" href="sitemap.xml"/>
				<link rel="stylesheet" href="./../css/menu.css"/>
        <link rel="stylesheet" href="./../css/modificar_proveedor.css"/><!--enlazamos el slider-->

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

    <!--TRABAJO DE MAQUETADO DE LA CABEZERA-->
    <body>
        <?php include_once './fragmentos/menu_header.php'; ?>
		<section id="trabajos">
		<div class="title"><h2>Modificar Proveedor</h2></div>
         <article>            
                <nav>	                    
				
                   <form  name= "form6"  method="post" action="">
					    <label>Raz&oacute;n S.:</label><input type="Text" name="razon_social"value="<?php echo $prov['razon_social'] ?>"required pattern="[a-zA-Z0-9 . -  ]*" />
						
						<label>Rif. :</label><input type="Text" size="20" name="rif"value="<?php echo $prov['rif'] ?>"required pattern="[a-zA-Z0-9 . -  ]*" />
						
                      <label>Direcci&oacute;n : </label><input type="Text" name="direccion"value="<?php echo $prov['direccion'] ?>"required pattern="[a-zA-Z-0-9- - - ]*">
                        <label>Tel&eacute;fono</label><input type="tel" id="orderTelephone" name="telefono" value="<?php echo $prov['telefono'];?>"pattern="[0-9-/]*" title="Introduzca solo números" />
                         <label>E_mail: </label><input type="email" name="e_mail"value="<?php echo $prov['e_mail'] ?>"required>
						<label>Estado</label><input type="Text" size="4"name="status" value="<?php echo $prov['descripcion'];?>"/><select name="status">
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
							<button id="button" type="Cancelar" name="cancelar" value="Cancelar" onClick="location.href='../aplicacion/modificar_p.php'">Cancelar</button>
							</br></br></br>
       
							<?php if (!empty($info)) { ?>
							<div class="content">
							<section id="sun"><?php echo (isset($info)) ? $info : ''; ?></section>	</div>
							<?php } ?>
				</form>
		 </section>	
<body>

		<li><?php require_once './fragmentos/pie_de_pagina.php'; ?></li>
	</body>	
</html>