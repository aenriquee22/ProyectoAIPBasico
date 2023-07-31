<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="detalles.css">
    <title>
       Empleados Reclutados
    </title>


</head>
<body>
    <form action="Empleado.php"  method="POST">
    <section class="form-registro">
        <h4>Empleados</h4> 


        <input class= "controls" type="text" name="nombre" id= "nombre" placeholder=" Nombre Completo">
        <input class= "controls" type="text" name="cargo" id= "cargo" placeholder=" Cargo">
        <input class= "controls" type="text" name="profesion" id="profesion" placeholder=" Profesion">
        <input  class= "controls" type="text" name="telefono" id="telefono" placeholder="Telefono">
        <input  class= "controls" type="text" name="tiposangre" id="tiposangre" placeholder="Tipo de sangre">
        <input  class= "controls" type="text" name="llamar" id="llamar" placeholder="En caso de emergencia llamar al">
        <input  class= "controls" type="text" name="parentesco" id="parentesco" placeholder="Parentesco Emergencia">
        <input class= "controls" type="text" name="provincia" id= "provincia" placeholder=" Provincia">
        <input class= "controls" type="text" name="distrito" id= "distrito" placeholder=" Distrito">
        <input class= "controls" type="text" name="corregimiento" id="corregimiento" placeholder=" Corregimiento">
        <input  class= "controls" type="text" name="calle" id="calle" placeholder="Calle">
        <br>
        <br>
        <input class= "botons" type="submit" name = "enviar" value="Enviar">
        
        <!--<p> <a href="Log.php">¿Ta tengo cuenta?</a></p>-->

    </section>
    </form>

    <?php
        if(isset($_POST["enviar"])){
            $NOMBRE = $_POST["nombre"];
            $CARGO = $_POST["cargo"];
            $PROFESION = $_POST["profesion"];
            $TELEFONO = $_POST["telefono"];
            $T_SANGRE = $_POST["tiposangre"];
            $LLAMAR_EMERGENCIA = $_POST["llamar"];
            $PARENTESCO_EMERGENCIA = $_POST["parentesco"];
            $PROVINCIA = $_POST["provincia"];
            $DISTRITO = $_POST["distrito"];
            $CORREGIMIENTO = $_POST["corregimiento"];
            $CALLE = $_POST["calle"];
            //echo " ".$TELEFONO." ".$NOMBRE.;



                   $conn = oci_connect('system', '1305MA', 'xe');
        if (!$conn)
        {
                $e = oci_error();
            //trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        }



       $sql = "INSERT INTO  EMPLEADO (NOMBRE, CARGO, PROFESION, TELEFONO, T_SANGRE, LLAMAR_EMERGENCIA, PARENTESCO_EMERGENCIA, PROVINCIA, DISTRITO, CORREGIMIENTO, CALLE) VALUES ('".$NOMBRE."','".$CARGO."','".$PROFESION."','".$TELEFONO."','".$T_SANGRE."','".$LLAMAR_EMERGENCIA."','".$PARENTESCO_EMERGENCIA."','".$PROVINCIA."','".$DISTRITO."','".$CORREGIMIENTO."','".$CALLE."')";



       $stid = oci_parse($conn, $sql);
        oci_execute($stid, OCI_DEFAULT);
        oci_commit($conn);
        //header("Location: WebProAip.php");



   oci_free_statement($stid);
        oci_close($conn);
echo "correct";



       }




        ?>
    </body>
</html>