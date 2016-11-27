<?php

if (isset($_POST["info"])){

    $info = $_POST["info"];
	echo "<br /> <span class='info' >$info</span><br />";
}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
	        <script type="text/javascript">
            function alerta() {
                alert('<?php echo (isset($info)) ? $info : ''; ?>');
            }
        </script>
	
	</head>
	</html>