<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="detalles.css">
	<title>
		Formulario Registro Cliente
	</title>


</head>
<body>
	<form action="FormularioInicio.php"  method="POST">
	<section class="form-registro">
		<h4>Formulario Cliente</h4>

		<input class= "controls" type="text" name="nombres" id= "nombres" placeholder=" Ingrese su nombre">
		<input class= "controls" type="text" name="apellidos" id= "apellidos" placeholder=" Ingrese su apellido">
		<input class= "controls" type="email" name="correo" id= "correo" placeholder=" Ingrese su correo">
		<input class= "controls" type="text" name="cedula" id= "cedula" placeholder=" Ingrese su cedula">
		<input class= "controls" type="text" name="celular" id= "celular" placeholder=" Ingrese su celular">
		<input class= "controls" type="text" name="usuario" id= "usuario" placeholder=" Ingrese su usuario">
		<input class= "controls" type="text" name="pass" id= "pass" placeholder=" Ingrese su contrasena">
		<input class= "controls" type="text" name="provincia" id= "provincia" placeholder=" Provincia">
		<input class= "controls" type="text" name="distrito" id= "distrito" placeholder=" Distrito">
		<input class= "controls" type="text" name="corregimiento" id="corregimiento" placeholder=" corregimiento">
		<input class= "controls" type="text" name="role" id="role" placeholder="calle">

		<input class= "botons" type="submit" name = "registrar" value="Registrar">
		<p> <a href="Log.php">¿Ya tienes una cuenta?</a></p>
	</section>
	</form>
<?php
		if(isset($_POST["registrar"])){
			$NOMBRE = $_POST["nombres"];
			$APELLIDO = $_POST["apellidos"];
			$EMAIL = $_POST["correo"];
			$CEDULA = $_POST["cedula"];
			$TELEFONO = $_POST["celular"];
			$USUARIO = $_POST["usuario"];
			$PASS = $_POST["pass"];
			$PROVINCIA= $_POST["provincia"];
			$DISTRITO= $_POST["distrito"];
			$CORREGIMIENTO = $_POST["corregimiento"];
			$ROLE = $_POST["role"];


			//echo " ".$USUARIO." ".$PASS;
		include('VerificacionClient.php');
					$conn = oci_connect('system', '1305MA', 'xe');
		if (!$conn) 
		{
   			 $e = oci_error();
    		//trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
		}

		$sql = '';
		if($ROLE==1)
		{
			$sql = "INSERT INTO CLIENTE (NOMBRE ,APELLIDO, EMAIL, CEDULA,TELEFONO , ID_PROVINCIA, ID_DISTRITO ,ID_CORREGIMIENTO) VALUES ('".$NOMBRE."','".$APELLIDO."','".$EMAIL."','".$CEDULA."','".$TELEFONO."','".$PROVINCIA."','".$DISTRITO."','".$CORREGIMIENTO."')";

		}else if($ROLE == 2){
			$sql = "INSERT INTO Administrador (NOMBRE ,APELLIDO) VALUES ('".$NOMBRE."','".$APELLIDO."')";

		}
				
		$stid = oci_parse($conn, $sql);
		oci_execute($stid, OCI_DEFAULT);
		oci_commit($conn);
		//header("Location: Webclient.php");

		

		oci_free_statement($stid);
		oci_close($conn);
        echo "correct";
        //header("Location: Webclient.php");	

 	}
?>

</body>
</html>