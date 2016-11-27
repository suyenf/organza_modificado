<?php
	include_once '../nucleo_php/coneccion.php';
	include_once '../nucleo_php/funciones.php';
	

		if(isset($_POST['enviar'])){
		$i = 0;
		foreach($_POST as $campo => $contenido){ //repite por cada elemento dentro de un array
			if(empty($contenido)){ //verifico por cada uno de los capos cual esta vacio
				$i++;
			}
		}
		if($i == 0){//si no hay ninguno vacio guarda
			$sql = "INSERT INTO cliente VALUES(NULL, %s, '%s', '%s', '%s', %s,%s)";
			$sql = sprintf($sql,
							$_POST['ci'],
							 $_POST['nombre_c'],
							 $_POST['apellido_c'],
							 $_POST['direccion'],
							 $_POST['telefono'],
							 $_POST['status']);
			//echo $sql;
			mysql_qry($sql); // se inserta la data ejecutando la consulta sql
			$info = 'Registro Guardado';
		}else{ //si no manda mensajitos de texto
			$info = 'se enviaron campos vacios';
		}
	}
					$sql_stat = "SELECT * FROM estado";
				$res_stat = mysql_qry($sql_stat);
		
	
	
	
	

?>