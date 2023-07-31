<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="detalles.css">
    <title>
        Organizar reuniones
    </title>


</head>
<body>
    <form action="OrganizarReunion.php"  method="POST">
    <section class="form-registro">
        <h4>Reuniones</h4> 


        <input class= "controls" type="text" name="fecha" id= "fecha" placeholder=" Fecha">
        <input class= "controls" type="text" name="hora" id= "hora" placeholder=" Hora">
        <input class= "controls" type="text" name="lugar" id="lugar" placeholder=" lugar">
        <input  class= "controls" type="text" name="observaciones" id="observaciones" placeholder="observacion reunion">

        <br>
        <br>
        <input class= "botons" type="submit" name = "enviar" value="Enviar">
        
        <!--<p> <a href="Log.php">¿Ta tengo cuenta?</a></p>-->

    </section>
    </form>

    <?php
        if(isset($_POST["enviar"])){
            $FECHA = $_POST["fecha"];
            $HORA = $_POST["hora"];
            $LUGAR = $_POST["lugar"];
            $OBSERVACIONES = $_POST["observaciones"];
            //echo " ".$USUARIO." ".$PASS;



                   $conn = oci_connect('system', '1305MA', 'xe');
        if (!$conn)
        {
                $e = oci_error();
            //trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        }



       $sql = "INSERT INTO  REUNION (FECHA, HORA, LUGAR, OBSERVACIONES) VALUES ('".$FECHA."','".$HORA."','".$LUGAR."','".$OBSERVACIONES."')";



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