<?php

$servidor = "localhost";
$usuario = "oliver";
$contra = "Alexander12";
$BD = "ayd";    

// Create connection
$conn = mysql_connect($servidor, $usuario, $contra, $BD);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}

$sql = "INSERT INTO USUARIO (NOMBRE, PASS, TELEFONO, CORREO)
VALUES (" $usuario,"," $usuario,",55035, "," $contra")";

if (mysql_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysql_error($conn);
}

mysql_close($conn);
?>