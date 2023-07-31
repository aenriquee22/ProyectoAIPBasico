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
			<td>ID_REUNION</td>
			<td>FECHA</td>
			<td>HORA</td>
			<td>LUGAR</td>
			<td>OBSERVACIONES</td>	
		</tr>

		<?php 
		$sql="SELECT * from REUNION";
		$result=oci_parse($conn,$sql);
		oci_execute($result);
		while($mostrar=oci_fetch_assoc($result)){
		 ?>

		<tr>
			<td><?php echo $mostrar['ID_REUNION'] ?></td>
			<td><?php echo $mostrar['FECHA'] ?></td>
			<td><?php echo $mostrar['HORA'] ?></td>+
			<td><?php echo $mostrar['LUGAR'] ?></td>
			<td><?php echo $mostrar['OBSERVACIONES'] ?></td>
		</tr>
	<?php 
	}
	 ?>
	</table>
</center>
</body>
</html>