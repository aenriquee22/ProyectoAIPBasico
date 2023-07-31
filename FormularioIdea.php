<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="detalles.css">
	<title>
		Formulario Registro Cliente
	</title>


</head>
<body>
	<form action="FormularioIdea.php"  method="POST">
	<section class="form-registro">
		<h4>Formulario Idea</h4>


		<!--<input class= "controls" type="text" name="provincia" id= "provincia" placeholder=" Provincia"> 
		<input class= "controls" type="text" name="distrito" id= "distrito" placeholder=" Distrito">
		<input class= "controls" type="text" name="corregimiento" id="corregimiento" placeholder=" corregimiento">
		<input  class= "controls" type="text" name="calle" id="calle" placeholder="calle">

	 	<p> <input  class="controls" type="text" name="descripcion" placeholder="descripcion"></input></p>-->
   <!--<input class= "controls" type="text" name="id_idea" id="id_idea" placeholder=" id 0000">-->
    <input class= "controls" type="text" name="descripcion" id="descripcion" placeholder=" ingrese descripcion">
    <input  class= "controls" type="text" name="´fondo" id="´fondo" placeholder="ingrese fondo estimado">
	 	<br>
	 	<br>
		<input class= "botons" type="submit" name = "enviar" value="Enviar">
		
		<!--<p> <a href="Log.php">¿Ta tengo cuenta?</a></p>-->

	</section>
	</form>

	<?php
        if(isset($_POST["enviar"])){
           // $PROVINCIA = $_POST["provincia"];
           // $DISTRITO = $_POST["distrito"];
           // $CORREGIMIENTO = $_POST["corregimiento"];
            // $CALLE = $_POST["calle"];
            $DESCRIPCION = $_POST["descripcion"];
             $FONDO = $_POST["fondo"];
            //echo " ".$USUARIO." ".$PASS;



                   $conn = oci_connect('system', '1305MA', 'xe');
        if (!$conn)
        {
                $e = oci_error();
            //trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        }



       $sql = "INSERT INTO  IDEAS (DESCRIPCION, FONDO ) VALUES ('".$DESCRIPCION."', '".$FONDO."' )";



       $stid = oci_parse($conn, $sql);
        oci_execute($stid, OCI_DEFAULT);
        oci_commit($conn);
        header("Location: Webclient.php");



   //oci_free_statement($stid);
       // oci_close($conn);
echo "correct";



       }




        ?>
</body>
</html>