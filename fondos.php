<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="detalles.css">
    <title>
        Fondos
    </title>


</head>
<body>
    <form action="fondos.php"  method="POST">
    <section class="form-registro">
        <h4>Agregar Fondos</h4> 

		<input class= "controls" type="text" name="dinero" id= "dinero" placeholder=" monto$ sin comas">
        <input class= "controls" type="text" name="publico" id= "publico" placeholder=" fondo publico: si / no">
        <input class= "controls" type="text" name="privado" id= "privado" placeholder=" fondo privado: si / no">
        <input class= "controls" type="text" name="estado_fondo" id="estado_fondo" placeholder=" estado fondo: estable/inestable">

        <br>
        <br>
        <input class= "botons" type="submit" name = "enviar" value="Enviar">
        
        <!--<p> <a href="Log.php">¿Ta tengo cuenta?</a></p>-->

    </section>
    </form>

<?php
 if(isset($_POST["enviar"])){
            $MONTO = $_POST["dinero"];
            $PUBLICO = $_POST["publico"];
            $PRIVADO = $_POST["privado"];
            $ESTADO_FONDO = $_POST["estado_fondo"];
            //echo " ".$USUARIO." ".$PASS;



                   $conn = oci_connect('system', '1305MA', 'xe');
        if (!$conn)
        {
                $e = oci_error();
            //trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        }



       $sql = "INSERT INTO  FONDOS (MONTO, PUBLICO, PRIVADO, ESTADO_FONDO) VALUES ('".$MONTO."','".$PUBLICO."','".$PRIVADO."','".$ESTADO_FONDO."')";



       $stid = oci_parse($conn, $sql);
        oci_execute($stid, OCI_DEFAULT);
        oci_commit($conn);
        header("Location: WebProAip.php");



   oci_free_statement($stid);
        oci_close($conn);
echo "correct";



       }

?>

</body>
</html>