<?php
     include("conexion2.php");
     $conn = OCILogon($user, $pass, $db);



    if (!$conn) {
    echo "conexion es invalida" . var_dump(OCIError() );
    die();
         }
         $var1 = $_POST["provincia"];
         $var2 = $_POST["distrito"];
         $var3 = $_POST["corregimiento"];
         $var4 = $_POST["calle"];
         $var5 = $_POST["descripcion"];


        $query = oci_parse($conn, "INSERT INTO FORIDEA VALUES (:dato1 , :dato2, :dato3, :dato4, :dato5)");
         OCIBindByName($query, ":dato1",$var1);
         OCIBindByName($query, ":dato2",$var2);
         OCIBindByName($query, ":dato3",$var3);
         OCIBindByName($query, ":dato4",$var4);
         OCIBindByName($query, ":dato5",$var5);



        OCIExecute($query, OCI_DEFAULT);
         OCICommit($conn);
         OCILogoff($conn);
  ?>