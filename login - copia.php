<?php
// Evitar los warnings the variables no definidas!!!
$err = isset($_GET['error']) ? $_GET['error'] : null ;


if (isset($_POST['usuario']) && (isset($_POST['pass']))) {
    if ((!empty($_POST['usuario'])) || (!empty($_POST['pass']))) {

        $sql = "SELECT * FROM usuario WHERE nombre_us = '%s' AND clave = '%s' AND status = 1 LIMIT 1 ";
        $sql = sprintf($sql, $_POST['usuario'], $_POST['pass']);
        $result = mysql_qry($sql);
		if (mysql_num_rows($result) == 1) {
		   $_SESSION['login'] = mysql_fetch_array($result);
			header('location: ./');
		} else{
			$info = 'Datos  Incorrectos o Usuario NO Existe';
		}
	}else { 
		$info = 'Se enviaron datos vacios';
	}
}



/*
if (condición) {comandos}
elseif (condición) {comandos}
else {comandos}*/
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="ventana modal, css, css3, modal" />
<meta name="description" content="INICIO DE SESION" lang="ES" />
<link rel="stylesheet" href="./css/inicio_us.css"/>
<link rel="shortcut icon" type="image/x-icon" href="favicon2.ico"/>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="js/kickstart.js"></script> <!-- KICKSTART -->
<link rel="stylesheet" href="css/kickstart.css" media="all" /> <!-- KICKSTART -->
	<?php  if (!empty($info)){ ?>
       <script type="text/javascript">
            function alerta() {
                alert('<?php echo (isset($info)) ? $info : ''; ?>');
            }
        </script>
   <?php } ?>


 

<title>Sistema de Inventario</title>
</head>
<body>


  
	<h1><a href="#modal1" class="clsVentanaIFrameAcUsu" rel="Accesar al Sistema"><img  src="img/key.png"/></a><li><a style="color:#004080;padding:2px;"> Iniciar Sesi&oacute;n</a></li></h1>
	<div class="center">
	<div id="modal1" class="modalmask">
	<div class="modalbox movedown">
	<img  src="img/INI_32D.png"  alt="descripción" style= "	position: absolute;top: 11px;left: 80px;"/>
	<h1><a href="#modal1" class="clsVentanaIFrameAcUsu" rel="Accesar al Sistema"></a></h1>
	</br></br></br></br></br></br>

		<a href="#close" title="Cerrar" class="close">X</a>	
			<section id="principal">
                            <form method="POST" action=""></br>		
		<div>

		<section>
					<p><label for="usuario">Usuario:</label> 
				</section>
					<a title="Introduzca Usuario">
						<span class="icon-place">
						</span>
					<input title="Introduzco un Nombre de Usuario Valido" name="usuario" id="nombre" type="text"  required />
					<span class=" icon-unlock"></span>
					</a><br></p>
				<section>
					<p><label for="pass">Contrase&ntilde;a:</label> 
				</section>
					<a title="Introduzca su Clave">
					<input title= "Introduzca la Clave Correspondiente" name="pass" id="pass" type="password" required ></a></p>
		</div>
		
			</section>				  
         				
							<ul>   
							<span onclick="alerta();">
							<button id="button">Iniciar Sesi&oacute;n</button>
							</span>
							</ul>       
         </div>		 
      </div>
     </div>    
	 

	 
	 
                         <footer><!--Aqui pondremos publicidad y botones de redes sociales -->
								<article>
									   <p align="center"><p style="color:#1F1F1F;padding:4px;">&copy; BINARY CORP. Todos los Derechos Reservados.</p>
								</article>	   
						</footer>
</body>                              
</html>									