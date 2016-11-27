<?php

	/*
	CONFIGURACION:	
	*/
	
	$USUARIO_MYSQL="root";
	$PASS_MYSQL="";
	$BASE_DATOS_A_RESPALDAR="controlestudio";
	
	$direccion_mysql=getcwd();	
	$dbname=$BASE_DATOS_A_RESPALDAR."_";
	$fecha = time ();
	$fecha_partir1=date ( "h" , $fecha ) ;
	$fecha_partir2=date ( "i" , $fecha ) ;
	$fecha_partir3=$fecha_partir1-1;
	$filename = $dbname . date("Y-m-d")."_". $fecha_partir3.':'.$fecha_partir2. '.sql';			
	
	header("Pragma: no-cache");
	header("Expires: 0");
	header("Content-Transfer-Encoding: binary");
	header("Content-type: application/force-download");
	header("Content-Disposition: attachment; filename=$filename");
	$executa = $direccion_mysql."/bin_mysql/mysqldump --password=".$PASS_MYSQL." --user=".$USUARIO_MYSQL."  ".$BASE_DATOS_A_RESPALDAR."";	
	system($executa, $resultado);		
	
?> 
