<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="detalles.css">
	<title>
		Formulario Registro Cliente
	</title>


</head>
<body>
	<form action="SELECTCLIENT.php"  method="POST">
	<section class="form-registro">
		<h4>Formulario Cliente</h4>

		

		<input class= "botons" type="submit" name = "mostrar" value="Mostrar">
	</section>
	</form>


<?php

if(isset($_POST["mostrar"])){

$conn = oci_connect('system', '1305MA', 'xe');
if (!$conn) {
$e = oci_error();
trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$sql = 'SELECT ID_FORIDEA, PROVINCIA, DISTRITO, CORREGIMIENTO, CALLE, DESCRIPCION FROM FORIDEA WHERE ID_FORIDEA < 1200';
$stid = oci_parse($conn, $sql);
oci_execute($stid, OCI_DEFAULT);;
oci_commit($conn);

while (oci_fetch($stid)) {
    echo oci_result($stid, 'ID_FORIDEA') . "  ";
    echo oci_result($stid, 'PROVINCIA') . "  ";
    echo oci_result($stid, 'DISTRITO') . "  ";
    echo oci_result($stid, 'CORREGIMIENTO') . "  ";
     echo oci_result($stid, 'CALLE') . "  ";
    echo oci_result($stid, 'DESCRIPCION') . "<br>\n";
}
}
// Muestra:
//   1000 es Roma
//   1100 es Venice

oci_free_statement($stid);
oci_close($conn);


?>

</body>
</html>
