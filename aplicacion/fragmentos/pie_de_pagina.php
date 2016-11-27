<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//print_r($_SESSION);

//echo '<br/>';

$niveles = array();
$niveles[1]='Admin';
$niveles[2]='Usuario';
$niveles[3]='Visitante';
//$niveles[4]='Visitante';
// niveles de acceso

$info =  'Usuario: '. $_SESSION['login']['nombre_us']. ' / Tipo: ' . $niveles[$_SESSION['login']['id_nivel']];
//echo 'Usuario: '. $_SESSION['login']['nombre_true'].$_SESSION['login']['nombre_true2']. ' / Tipo: ' . $niveles[$_SESSION['login']['id_nivel']];
?>
		<!DOCTYPE HTML>
	<html>
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="ventana modal, css, css3, modal" />
		<meta name="description" content="INICIO DE SESION" lang="ES" />
		<link rel="stylesheet" href="./css/menu.css"/>
		<link rel="shortcut icon" type="image/x-icon" href="favicon2.ico"/>
		<body>
		
                     <section id="yo">	<?php echo (isset($info)) ? $info : ''; ?></section>	     
					 
					 <footer><!--Aqui pondremos publicidad y botones de redes sociales -->

								  <p>&copy; BINARY CORP,C.A. Todos los Derechos Reservados</p>
								  
						</footer>
		</body>
		</html>
		</head>