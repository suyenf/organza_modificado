<!DOCTYPE html>
<html lang="es">
    <head> <!-- -->
        <meta charset="utf-8"/><!--ESTO ES UNIVERSAL-->
        <title>Sistema de Inventario</title><!--NOMBRE QUE SE MUESTRA EN LA PESTANA DEL NAVEGADOR-->
        <meta name="viewport" content="widh=device-width,initial-scale=1"/><!--el viewport sirve para que el disp. este viendo la pag web como se le diga en el content...(la linea quiere decir que el ancho del contenido de este sitio se va a ver conforme sea el ancho del dispositivo, la escala inicial va a ser igual a 1)-->
        <link rel="shortcut icon" type="image/x-icon" href="favicon2.ico"/> <!--enlace para colocar el favicon.ICO-->
        <link rel="sitemap" type="aplication/xml" title="sitemap" href="sitemap.xml"/>
        <link rel="stylesheet" href="css/flexslider.css"/><!--enlazamos el slider-->
        <link rel="stylesheet" href="css/menu2.css"/><!--enlazamos el estilo del menu-->
        <link rel="stylesheet" href="css/estilos.css"/> <!--enlace para el estilo de la pag-->


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <!--LINKS PARA LOS JQUERYS QUE DESCARGUE -->
        <link type="text/css" href="css/le-frog/jquery-ui-1.8.1.custom.css" rel="Stylesheet" />      
        <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.1.custom.min.js"></script>								   
        <!-- FIN DE LOS LINKS PARA LOS JQUERYS QUE DESCARGUE -->
        <script>
            !window.jQuery && document.write("<script src='js/jquery.min.js'><\/script>");
        </script>
        <script src="js/jquery.flexslider.js"></script>
        <script src="js/jquery.scripts_m.js"></script>
        <script>
            $(window).load(function() {
                $(".flexslider").flexslider();
            });
        </script>

        <!--[if lt IE 9]
             <script>
                 src="http://html5shiv.googlecode.com/svn/trunk/html5.js"</scribt>
        <![endif]-->	

    </head>
    <!--TRABAJO DE MAQUETADO DE LA CABEZERA-->
    <body>
        <header> 

            <h1><!--Encabezado tipo 1 que sera EL LOGO-->
                <a href="index.html"> <!--enlace que nos va a direccionar a la pagina de inicio, con solo pulsar el logo--><!--fade: clase del css, texto alternativo: es el que dice bexlan.com, lugar de bits y pixeles-->
                </a>
            </h1>
            <nav><!--MENU DE NAVEGACION-->	
                <script>
                    $(document).ready(function() {
                        $("a").button();
                    })

                </script>


                <ul id="menu"><!--MENU DE NAVEGACION-->

                    <a><li>Clientes</a>   <!-- li: DENTRO DEL CADA LIST ITEN DEL MENU VA UN ENLACE -->
                    <ul>
                        </br>
                        <li><a href="registro_c.php">Reg. Cliente</a></li>
                        <li><a href="buscar_c.php">Buscar Cliente</a></li></br>
                    </ul>
                    </li>

                    <a><li>Proveedores</a>
                    <ul>
                        <li><a href="registro_cliente.php">Reg. Proveedor</a></li>
                        <li><a href="registro_cliente.php">Buscar Proveedor</a></li>
                        <li><a href="registro_cliente.php">Modificar Proveedor</a></li>
                    </ul>
                    </li>

                    <a><li>Productos</a>
                    <ul>
                        <li><a href="registro_cliente.php">Reg. Productos</a></li>
                        <li><a href="registro_cliente.php">Buscar Productos</a></li>
                        <li><a href="registro_cliente.php">Modificar Productos</a></li>
                    </ul>
                    </li>	

                    <a><li>Almacén</a>
                    <ul>
                        <li><a href="registro_cliente.php">Entrada de Producto</a></li>
                        <li><a href="registro_cliente.php">Salida de Producto</a></li>
                    </ul>
                    </li>	

                    <li><a>Reportes</a></li>


                    <a><li>Configuración</a>
                    <ul>
                        <li><a href="registro_cliente.php">Usuario</a></li>
                        <li><a href="registro_cliente.php">Empleado</a></li>
                        <li><a href="registro_cliente.php">Respaldos</a></li>
                    </ul>
                    </li>

                    <li><a>Ayuda</a></li>


                </ul>	
            </nav>
        </header>
        <footer>
            <!--Aqui pondremos publicidad y botones de redes sociales -->
            <!-- Aprendiendo HTM5,CSS3, JQuery y Responsive web design con <a rel="author" href="http://twitter.com/bextlan" target="_blank">@bextlan</a>-->
        </footer><!--EL TARGET SE ENCARGA DE ABRIR EL lINK DE TWITTER EN UNA PAG O EN OTRA PESTAÑA --> 	
    </body>


    </br></br></br>			  				  
    <h1>BUSCAR CLIENTE</h1>
    </br>
    </br>
    <article>
        <section id="colmo">
            <nav>
                <?php
                if ($enviar) {
                    // process form
                    include("conexion.php")
                    $sql = "INSERT INTO cliente(nombre_c,apellido_c,ci,direccion,telefono)
						   VALUES ('$nombre','$apellido','$ci','$direccion','$telefono')";
                    $result = mysql_query($sql);
                    echo "Cliente Registrado!\n";
                } else {


                    include("conexion.php")
                    // insertarmos el registro
                    mysql_query("INSERT INTO cliente(nombre, direccion) VALUES ('Apple', '1 Infinite Loop')");
                    // mostramos el ID del registro
                    echo mysql_insert_id();
                    ?> 

                    <form method="post" action="registro_c.php">
                        <br> 
                        Nombre   : <input name="Nombre" type="text"><br><br>
                        Apellido : <input type="Text" name="apellido"><br><br>
                        Cédula : <input type="Text" name="ci"><br><br>
                        Dirección : <input type="Text" name="direccion"><br><br>
                        Teléfon: <input type="Text" name="telefono"><br><br><br>	  

                        <li><a href="buscar_c2.php">Imprimir</a></li>
                        <li><a href="excel.php">Exportar</a></li>


                    </form> 
                    <?php
                } //end if 
                ?>
            </nav>


        </section>	

    </article>



    </br>
    </br>
    </br>
    <ul><li>Admin: Su-yen Faudito</li>
</html>