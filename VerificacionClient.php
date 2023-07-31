<?php
		
			$conn = oci_connect('system', '1305MA', 'xe');
		if (!$conn) 
		{
   			 $e = oci_error();
    		//trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
		}

		$sql = "INSERT INTO USUARIO (USUARIO,  PASS, ROLEUSUARIO) VALUES ('".$USUARIO."','".$PASS."','".$ROLE."')";

		$stid = oci_parse($conn, $sql);
		oci_execute($stid, OCI_DEFAULT);
		oci_commit($conn);
		//header("Location: Webclient.php");

		//oci_free_statement($stid);
		//oci_close($conn);
        echo "correct";
?>