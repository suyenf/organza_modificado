<?php
include_once '../nucleo_php/coneccion.php';
include_once '../nucleo_php/funciones.php';

if (isset($_POST['enviar'])) {

    $sql = "SELECT * FROM entrada WHERE correlativo_factura = %s";
    $sql = sprintf($sql, $_POST['correlativo_factura']);
    $i = mysql_qry($sql); // se inserta la data ejecutando la consulta sql

    if (mysql_num_rows($i) == 0) {
        $sql = "INSERT INTO entrada VALUES (NULL, %s, %s, '%s', '%s',%s)";
        $sql = sprintf($sql, $_POST['id_proveedor'], $_POST['correlativo_factura'], $_POST['fecha_factura_emitida'], $_POST['observacion'], $_POST['id_producto']);
        mysql_qry($sql);

        $info = 'RECIBO GUARDADO';
    } else {
        $info = 'EL Nro. DE FACTURA YA SE ENCUENTRA REGISTRADO ';
    }
}

$sql_prod = "SELECT * FROM producto WHERE status = 1";
$res_prod = mysql_qry($sql_prod);

$sql_prov = "SELECT * FROM proveedor WHERE status = 1";
$res_prov = mysql_qry($sql_prov);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Sistema de Inventario</title>
        <meta name="viewport" content="width=device-width,initial-scale=1"/>
        <link rel="shortcut icon" type="image/x-icon" href="../favicon2.ico"/>
        <link rel="sitemap" type="aplication/xml" title="sitemap" href="sitemap.xml"/>

        <link rel="stylesheet" href="./../css/menu.css"/>
        <!--	<link rel="stylesheet" style="text/css" href="../css/almacenprods.css" />		-->
        <link rel="stylesheet" style="text/css" href="../css/almacenprods2.css" />
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
        <script language="JavaScript">
            function doPrint() {
                document.all.item("noprint").style.visibility = 'hidden'
                window.print()
                document.all.item("noprint").style.visibility = 'visible'
            }
        </script>


        <!--script de los alertas, se coloca y se quita-->
        <script type="text/javascript" src="../jquery.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                setTimeout(function () {
                    $(".content").fadeOut(1500);
                }, 3000);
            });
        </script>

        <style type="text/css">

            .almaprods article:first-child input{
                font-weight: bold;
                text-align: left;
            }
        </style>	
    </head>
    <body>
        <?php include_once './fragmentos/menu_header.php'; ?>

        <section id="trabajos">
            <div class="title"><h2>Entrada del Producto</h2></div>
            <form name= "form10" method="post" action="">
                <style type="text/css">
                    select{float: left;}
                    form article {text-align: left;
					color:#000040;
					 font-weight: bold;}

                </style>
                <article>

                    <div>
                        <span>  Productos</span>
                        <select id="producto"  name="id_producto" >
                            <?php while ($fila_prod = mysql_fetch_array($res_prod)) { ?>
                                <option  value="<?php echo $fila_prod['id_producto'] ?>" <?php
                                if (isset($_POST['id_producto'])) {
                                    if ($fila_prod['id_producto'] == $_POST['id_producto']) {
                                        echo "selected=\"selected\"";
                                    }
                                }
                                ?>>
                                <?php echo $fila_prod['nombre_p'] ?>
                                </option>
<?php } ?>
                        </select>
                    </div>
                    <div></br>
                           Proveedor
                        <select name="id_proveedor">

                            <?php while ($fila_prov = mysql_fetch_array($res_prov)) { ?>
                                <option value="<?php echo $fila_prov['id_proveedor'] ?>" <?php
                                if (isset($_POST['id_proveedor'])) {
                                    if ($fila_prod['id_proveedor'] == $_POST['id_proveedor']) {
                                        echo "selected=\"selected\"";
                                    }
                                }
                                ?>>
    <?php echo $fila_prov['razon_social'] ?>
                                </option>
<?php } ?>
                        </select>
                    </div></br>
                    <p>
                        <input placeholder="N&ordm; Factura" size="20" value="<?php if (isset($_POST['correlativo_factura'])){ echo $_POST['correlativo_factura'];} ?>" type="text" size="11" title= "Introduzca un N&uacute;mero de Factura Valido" name="correlativo_factura" required pattern="[0-9--]*"/></br></br>
                   </p>
                        <input placeholder="Fecha de Emisi&oacute;n de Factura" title="Fecha de Emisi&oacute;n de Factura"type="date" size="20" value="<?php if (isset($_POST['fecha_factura_emitida'])) { echo $_POST['fecha_factura_emitida'];} ?>" name="fecha_factura_emitida"  required/>
                    </p>
                    <p></br>
                        <textarea placeholder="Observaci&oacute;n" name="observacion" style="text-align: top; height: 80px; width: 260px" required pattern="[a-zA-Z- -  ]*" ><?php if (isset($_POST['observacion'])) { echo $_POST['observacion'];} ?></textarea> 
                    </p>
                </article>
                <br>

                <button id="button" type="Submit" name="enviar" value="Enviar">Enviar</button>
                <a target="_blank" href="recibo_in.php"><span><button id="button">Ver Recibo</button></span></a>
            </form>
        </nav>

<?php if (!empty($info)) { ?>
            <div class="content">
                <section id="sun"><?php echo (isset($info)) ? $info : ''; ?></section>	</div>
    <?php } ?>
    </section>		

    </br></br></br>
<li>
<?php require_once './fragmentos/pie_de_pagina.php'; ?>
</li>
</body>
</html>