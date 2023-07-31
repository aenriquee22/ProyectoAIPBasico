<?php 
	//include('OrganizarReunion.php');
	$conn = oci_connect('system', '1305MA', 'xe');
	//$conexion=mysqli_connect('localhost','root','','pruebas');

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>mostrar datos</title>
</head>
<body>

<br>

	<center> <table border="1" >
		<tr>
			<td>ID_USUARIO</td>
			<td>USUARIO</td>
			<td>PASS</td>
		</tr>

		<?php 
		$sql="SELECT * from USUARIO";
		$result=oci_parse($conn,$sql);
		oci_execute($result);
		while($mostrar=oci_fetch_assoc($result)){
		 ?>

		<tr>
			<td><?php echo $mostrar['ID_USUARIO'] ?></td>
			<td><?php echo $mostrar['USUARIO'] ?></td>
			<td><?php echo $mostrar['PASS'] ?></td>+
		</tr>
	<?php 
	}
	 ?>
	</table>
</center>
</body>
</html>