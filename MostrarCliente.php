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
			<td>ID_CLIENTE</td>
			<td>NOMBRE</td>
			<td>APELLIDO</td>
			<td>EMAIL</td>
			<td>CEDULA</td>	
			<td>TELEFONO</td>
			<td>ID_USUARIO</td>
			<td>ID_PROVINCIA</td>
			<td>ID_DISTRITO</td>
			<td>ID_CORREGIMIENTO</td>	
		</tr>

		<?php 
		$sql="SELECT * from CLIENTE";
		$result=oci_parse($conn,$sql);
		oci_execute($result);
		while($mostrar=oci_fetch_assoc($result)){
		 ?>

		<tr>
			<td><?php echo $mostrar['ID_CLIENTE'] ?></td>
			<td><?php echo $mostrar['NOMBRE'] ?></td>
			<td><?php echo $mostrar['APELLIDO'] ?></td>+
			<td><?php echo $mostrar['EMAIL'] ?></td>
			<td><?php echo $mostrar['CEDULA'] ?></td>
			<td><?php echo $mostrar['TELEFONO'] ?></td>
			<td><?php echo $mostrar['ID_USUARIO'] ?></td>
			<td><?php echo $mostrar['ID_PROVINCIA'] ?></td>+
			<td><?php echo $mostrar['ID_DISTRITO'] ?></td>
			<td><?php echo $mostrar['ID_CORREGIMIENTO'] ?></td>
		</tr>
	<?php 
	}
	 ?>
	</table>
</center>
</body>
</html>