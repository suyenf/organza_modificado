<?php
include_once '../nucleo_php/coneccion.php';
include_once '../nucleo_php/funciones.php';
?>

<html>
    <head>
        <meta charset="utf-8"/>
        <title>Sistema de Inventario</title>
        <meta name="viewport" content="width=device-width,initial-scale=1"/>
        <link rel="shortcut icon" type="image/x-icon" href="../favicon2.ico"/>
        <link rel="sitemap" type="aplication/xml" title="sitemap" href="sitemap.xml"/>
        <link rel="stylesheet" href="./../css/menu.css"/>	
        <link rel="stylesheet" href="./../css/reporte_producto.css"/>


        <script type="text/javascript" src="./../js/jquery.js"></script>
        <script type="text/javascript" src="./../js/menu.js"></script>
        <script type="text/javascript" src="./../js/jquery.min.js"></script>
        <script type="text/javascript" src="./../js/jquery-ui-1.10.4.custom.min.js"></script>
        <script src="./../js/jquery.flexslider.js"></script>
        <script>
            $(document).ready(function () {
                $("a").button();
                $(".flexslider").flexslider();
            })
        </script>
    </head>
    <body>
        <?php include_once './fragmentos/menu_header.php'; ?>
        <section id="trabajos">

            <div class="title"><h2>Reporte por Productos </h2></div></br>

            <nav>



                <table style="position:absolute;top:320px;left:117px;border-radius:10;" width="100" border="4">
                    <tr>
                        <td>Nro.</td>
                        <td>NOMBRE DEL PRODUCTO</td>
                        <td>P/U</td>
                        <td>CANTIDAD</td>
                        <td>DESCRIPCI&Oacute;N</td>
                        <td>PROVEEDOR</td>
                        <td>MARCA</td>
                        <td>FECHA DE INGRESO</td>
						<td>ESTADO</td>
                    </tr>
                
                <div  style="overflow-y: scroll; height: 100px">

                   
                        <tbody>
                            <?php
                            $sql = "SELECT a.`id_producto`,a.`codigo`,a.`nombre_p`,a.`precio_unitario`,a.`cant_existencia`,a.`descripcion_prod`,
b.`razon_social`,a.`id_marca`,c.descripcion,a.`fecha_ingreso` FROM `producto` AS a,`proveedor` AS b,`estado` AS c
WHERE a.`status`= c.`status` AND a.`id_proveedor` = b.`id_proveedor` AND a.status= '1' ORDER BY  id_producto,nombre_p";
                            //$sql = "SELECT id_producto,nombre_p,precio_unitario,cant_existencia,descripcion_prod,id_proveedor,id_marca,fecha_ingreso 
                            //	FROM producto ORDER BY  id_producto,nombre_p";
                            $result = mysql_qry($sql);
                            while ($row = mysql_fetch_array($result)) {
                                echo "<tr>
					       	<td>" . $row['id_producto'] . "</td>
						 	<td>" . $row['nombre_p'] . "</td>
						 	<td>" . $row['precio_unitario'] . "</td>
						 	<td>" . $row['cant_existencia'] . "</td>
						 	<td>" . $row['descripcion_prod'] . "</td>
						 	<td>" . $row['razon_social'] . "</td>
							<td>" . $row['id_marca'] . "</td>
							<td>" . $row['fecha_ingreso'] . "</td>	
							<td>" . $row['descripcion'] . "</td>
						 </tr>";
                                
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </nav>	



<!--		<input type="button" name="imprimir" value="Imprimir"  onClick="window.print();"/>-->

            <a target="_blank" href="pdfproducto.php"><button id="button">Exportar a PDF</button></a>
            <a href="reporte_excel_producto.php"><span><button id="button">Exportar a Excel</button></span></a>		
        </section>
    <li>
        <?php require_once './fragmentos/pie_de_pagina.php'; ?>
    </li>
</body>
</html>