

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

$sql = "select * from USUARIO"; 
$result = mysql_query($sql, $conn);//REALIZA LA CONSULTA

echo "<table>"; //EMPIEZA A CREAR LA TABLA CON LOS ENCABEZADOS DE TABLA
echo "<tr>";//<tr> CREA UNA NUEVA FILA
echo "<td>ID</td>";//<td> CREA NUEVA COLUMNA
echo "<td>NOMBRE</td>";
echo "<td>APELLIDO</td>";
echo "<td>TELEFONO</td>";
echo "<td>Correo</td>";
echo "</tr>";
if($result === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
//LA VARIABLE $REG GUARDA LOS REGISTROS DE LA CONSULTA REALIZADA
while($reg = mysql_fetch_array($result, $conn))
{
echo "<tr>";
echo "<td>".$reg['NOMBRE']."</td>";//EN CADA CELDA SE COLOCA EL CONTENIDO DE REG
echo "<td>".$reg['PASS']."</td>";
echo "<td>".$reg['TELEFONO']."</td>";
echo "<td>".$reg['CORREO']."</td>";

echo "</tr>";
}
echo "</table>";//FINALIZA LA TABLA
mysql_close($conn);
?>