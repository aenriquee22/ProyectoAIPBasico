 <?php 
 	include("conexion2.php");
 	$conn = OCILogon($user, $pass, $db);



 	if (!$conn) {
	echo "conexion es invalida" . var_dump(OCIError() );
	die();
	 	}
	 	$var1 = $_POST["nombres"];
	 	$var2 = $_POST["apellidos"];
	 	$var3 = $_POST["correo"];
	 	$var4 = $_POST["cedula"];
	 	$var5 = $_POST["celular"];
	 	$var6 = $_POST["usuario"];
	 	$var7 = $_POST["pass"];
	 	$var8 = $_POST["provincia"];
	 	$var9 = $_POST["distrito"];
	 	$var10 = $_POST["corregimiento"];
	 	$var11 = $_POST["calle"];

	 	$query = oci_parse($conn, "INSERT INTO CLIENTE VALUES (:dato1 , :dato2, :dato3, :dato4, :dato5, :dato6, :dato7, :dato8, :dato9, :dato10, :dato11)");
	 	OCIBindByName($query, ":dato1",$var1);
	 	OCIBindByName($query, ":dato2",$var2);
	 	OCIBindByName($query, ":dato3",$var3);
	 	OCIBindByName($query, ":dato4",$var4);
	 	OCIBindByName($query, ":dato5",$var5);
	 	OCIBindByName($query, ":dato6",$var6);
	 	OCIBindByName($query, ":dato7",$var7);
	 	OCIBindByName($query, ":dato8",$var8);
	 	OCIBindByName($query, ":dato9",$var9);
	 	OCIBindByName($query, ":dato10",$var10);
	 	OCIBindByName($query, ":dato11",$var11);

	 	OCIExecute($query, OCI_DEFAULT);
	 	OCICommit($conn);
	 	OCILogoff($conn);
  ?>