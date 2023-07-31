<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" href="detalles.css">
<body>
	    <form action="Log.php" method='POST' >
		<section class="form-registro">
		<h4>INICIAR SESION</h4>

		<input class= "controls" type="text" name="usuarios" id= "usuarios" placeholder=" Ingrese su usuario">
		<input class= "controls" type="password" name="contrasena" id= "contrasena" placeholder=" Ingrese su contraseña">

		<input type="submit" name ="envio" value="Enviar">
		</section>
		</form>

		<?php

		if(isset($_POST["envio"])){
			$USUARIO = $_POST["usuarios"];
			$PASS = $_POST["contrasena"];

			//echo " no existe ".$USUARIO." ".$PASS;
			//include('VerificacionClient.php');
					$conn = oci_connect('system', '1305MA', 'xe');
		if (!$conn) 
		{
   			 $e = oci_error();
    		//trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
		}

		$sql = "SELECT * FROM usuario WHERE USUARIO='".$USUARIO."' AND PASS='".$PASS."'";
		$stid = oci_parse($conn, $sql);
		oci_execute($stid, OCI_DEFAULT);
		$USUARIO_VALIDADO = '';
		$PASS_VALIDADO = '';
		$ROLE = '';
		while (oci_fetch($stid)) {
    		$USUARIO_VALIDADO =  oci_result($stid, 'USUARIO') /*. " es "*/;
    		$PASS_VALIDADO = oci_result($stid, 'PASS') /*. "<br>\n"*/;
    		$ROLE = oci_result($stid, 'ROLEUSUARIO');
		}
		echo "<h1> ". $USUARIO_VALIDADO." ".$PASS_VALIDADO." ".$ROLE."</h1>";

		if($USUARIO_VALIDADO== $USUARIO && $PASS_VALIDADO == $PASS && $ROLE == 1){
			//header("Location: WebProAip.php");
			header("Location: Webclient.php");
			//echo "error";
		}else if($USUARIO_VALIDADO== $USUARIO && $PASS_VALIDADO == $PASS && $ROLE == 2){
			//header("Location: WebProAip.php");
			header("Location: WebProAip.php");
			//echo "error";
		}

		oci_free_statement($stid);
		oci_close($conn);
		}


		?>
</body>
</html>