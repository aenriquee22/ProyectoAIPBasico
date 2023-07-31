 <?php 
 	include("conexion2.php");
 	$conn = OCILogon($user, $pass, $db);

 	if (!$conn) {
	echo "conexion es invalida" . var_dump(OCIError() );
	die();
	 	}
	 	$var1 = $_POST["usuarios"];
	 	$var2 = $_POST["contrasena"];

	 	$query = oci_parse($conn, "INSERT INTO USUARIO VALUES (:dato1 , :dato2)");
	 	OCIBindByName($query, ":dato1",$var1);
	 	OCIBindByName($query, ":dato2",$var2);
	 	OCIExecute($query, OCI_DEFAULT);
	 	OCICommit($conn);
	 	OCILogoff($conn);
  ?>