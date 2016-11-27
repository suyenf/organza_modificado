<html>
    <body>

        <?php
        if ($enviar) {
            // process form
            $con = mysql_connect('localhost', 'root', '');
            mysql_select_db("organza", $con)or die("No se pudo conectar a la base de datos")
            $sql = "INSERT INTO cliente(nombre_c,apellido_c,ci,direccion,telefono)
						   VALUES ('$nombre_c','$apellido_c','$ci','$direccion','$telefono')";
            $result = mysql_query($sql);
            echo "Cliente Registrado!\n";
        } else {

// process form
            $link = mysql_connect("localhost", "root");
            mysql_select_db("mydb", $db);
            $sql = "INSERT INTO agenda (nombre, direccion, telefono, email) " +
                    "VALUES ('$nombre', '$direccion', '$telefono', '$email')";
            $result = mysql_query($sql);
            echo "¡Gracias! Hemos recibido sus datos.\n";

            </body>
            </html>            