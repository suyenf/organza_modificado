<?php
	include_once '../nucleo_php/coneccion.php';
	include_once '../nucleo_php/funciones.php';
	
	
	if(isset($_POST['enviar'])){
		//$i = 0;
		foreach($_POST as $campo => $contenido){
			if(empty($contenido)){
			//	$i++;
			}
		}
		$sql = "SELECT * FROM salidas WHERE correlativo_factura = %s";
							$sql = sprintf($sql, $_POST['correlativo_factura']);
							$i = mysql_qry($sql); // se inserta la data ejecutando la consulta sql
							if(mysql_num_rows($i) == 0){
							
			$sql = "INSERT INTO salidas VALUES (NULL,'%s', '%s','%s', %s, %s)";
			$sql = sprintf($sql, $_POST['fecha_salida'],
							 $_POST['observacion'],
							 $_POST['fecha_registro'],
							 $_POST['id_cliente'],
							 $_POST['correlativo_factura']);
			mysql_qry($sql);
			$info = 'RECIBO GUARDADO';
		}else{
			$info = 'EL PRODUCTO CON ESTE Nro. DE FACTURA YA FUE RETIRADO ';
		}
	}
	
		$sql_cliente = "SELECT * FROM cliente";
		$res_cliente = mysql_qry($sql_cliente);	
	
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Sistema de Inventario</title>
		<meta name="viewport" content="width=device-width,initial-scale=1"/>
		<link rel="shortcut icon" type="image/x-icon" href="../favicon2.ico"/>
		<link rel="sitemap" type="aplication/xml" title="sitemap" href="sitemap.xml"/>
		<link rel="stylesheet" style="text/css" href="../css/almacenprods3.css" />
		<link rel="stylesheet" href="./../css/menu.css"/>
		<link rel="stylesheet" style="text/css" href="../css/almacenprods.css" />
		<script type="text/javascript" src="./../js/jquery.js"></script>
		<script type="text/javascript" src="./../js/menu.js"></script>
		<script type="text/javascript" src="./../js/jquery.min.js"></script>
		<script type="text/javascript" src="./../js/jquery-ui-1.10.4.custom.min.js"></script>
		<script src="./../js/jquery.flexslider.js"></script>
		<script>
			$(document).ready(function(){
				$("a").button();
				$(".flexslider").flexslider();
			})
		</script>

		<script language="JavaScript">
		function doPrint(){
		document.all.item("noprint").style.visibility='hidden' 
		window.print()
		document.all.item("noprint").style.visibility='visible'
		}
		</script>
		
				                <style type="text/css">
                    select{float: left;}
                    form article {text-align: right;
					color:#000040;
					 font-weight: bold;}

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
		
	</head>
	<body>
		<?php include_once './fragmentos/menu_header.php'; ?>

		<section id="trabajos">
		<div class="title"><h2>Salida del Producto</h2></div>

			<section id="colmo">
				<nav>
					<form action="" method="post" class="almaprods">
			
							
		
						<article>
							<p><div class="fe">Fecha de Salida</div><input placeholder="Fecha de Salida" type="date" title="Fecha de Salida" value="<?php if (isset($_POST['fecha_salida'])) { echo $_POST['fecha_salida'];} ?>"name="fecha_salida" id="fecsal" /></p>
							</br><p><div class="fe2">Fecha Registro</div><input placeholder="Fecha de Registro" title="Fecha de Registro" type="date"  value="<?php if (isset($_POST['fecha_registro'])) { echo $_POST['fecha_registro'];} ?>" name="fecha_registro" id="fecreg" /></p>
							</br><p>	

							<div class="clin">Cliente</div>
							<select id="cliente" name="id_cliente" >
								<?php while($fila_cliente = mysql_fetch_array($res_cliente) ){ ?>
								<option value="<?php echo $fila_cliente['nombre_c'] ?>"<?php
                                
                                if (isset($_POST['id_cliente'])) {
                                    if ($fila_cliente['id_cliente'] == $_POST['id_cliente']) {
                                        echo "selected=\"selected\"";
                                    }
                                }
                                ?>>
								<?php echo $fila_cliente['nombre_c'] ?> <?php echo $fila_cliente['apellido_c'] ?>
								</option>
								<?php } ?>
						</select></br>
							
						
						
								<p><div class="cor">Correlativo</div><input placeholder="N&ordm; Factura" type="text" size="11" title= "Introduzca un N&uacute;mero de Factura Valido"value="<?php if (isset($_POST['correlativo_factura'])){ echo $_POST['correlativo_factura'];} ?>"name="correlativo_factura" required pattern="[0-9--]*"/></p>
							                  <p>
                        <textarea placeholder="Observaci&oacute;n" name="observacion" style="text-align: top; height: 62px; width: 260px" required pattern="[a-zA-Z- -  ]*" ><?php if (isset($_POST['observacion'])) { echo $_POST['observacion'];} ?></textarea> 
                    </p>
                </article>
  
						</br>
						            <button id="button" type="Submit" name="enviar" value="Enviar">Enviar</button>
						            <button href="recipo_out.php" id="button" type="Cancelar"  name="enviar" value="Imprimir Recibo">Ver Recibo</button>
									<!--<a href="javascript:void(0);" onclick="window.print();"id="button">Ver Recibo</a>-->
					<form action="pdfcliente.php">
					<button type="application/x-google-chrome-print-preview-pdf" src="chrome://print/8/0/print.pdf" class="preview-area-plugin" aria-live="polite" aria-atomic="true" id="pdf-viewer">

<!--<input type="button" name="imprimir" value="Imprimir"  onClick="window.print();"/>
</form>
					-->
					
					
					</form>
				</nav>
	
			
							<?php if (!empty($info)) { ?>
            <div class="content">
                <section id="sun"><?php echo (isset($info)) ? $info : ''; ?></section>	</div>
    <?php } ?>
		</section>		
			

		<li>
			<?php require_once './fragmentos/pie_de_pagina.php';?>
		</li>
	</body>
</html>