<?php
	include('OrganizarReunion.php');
	$i = 0;
	$conn = oci_connect('system', '1305MA', 'xe');
	$sql = "SELECT * FROM REUNION (FECHA, HORA, LUGAR, OBSERVACIONES) VALUES ('".$FECHA."','".$HORA."','".$LUGAR."','".$OBSERVACIONES."')";
	$unir = oci_parse($conn, $sql);
	oci_execute($unir);
	while(($sacar = oci_fetch_assoc($unir))!=false){
		$i++;
		echo "<br>".$i." " .$sacar['FECHA'];
	}
	
?>