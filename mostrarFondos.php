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
			<td>ID_FONDO</td>
			<td>MONTO</td>
			<td>PUBLICO</td>
			<td>PRIVADO</td>
			<td>ESTADO_FONDO</td>	
		</tr>

		<?php 
		$sql="SELECT * from fondos";
		$result=oci_parse($conn,$sql);
		oci_execute($result);
		while($mostrar=oci_fetch_assoc($result)){
		 ?>

		<tr>
			<td><?php echo $mostrar['ID_FONDO'] ?></td>
			<td><?php echo $mostrar['MONTO'] ?></td>
			<td><?php echo $mostrar['PUBLICO'] ?></td>
			<td><?php echo $mostrar['PRIVADO'] ?></td>
			<td><?php echo $mostrar['ESTADO_FONDO'] ?></td>
		</tr>
	<?php 
	}
	 ?>
	</table>
</center>
</body>
</html>