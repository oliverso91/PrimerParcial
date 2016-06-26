<?php
$db_host="127.0.0.1";
$db_user="root";
$db_password="root";
$db_name="ayd";
$db_table_name="USUARIO";
   $db_connection = mysql_connect($db_host, $db_user, $db_password);


if (!$db_connection) {
	die('No se ha podido conectar a la base de datos');
} else 
{
    mysql_select_db($db_name, $db_connection);
}
$subs_name = utf8_decode($_POST['nombre']);
$subs_pass = utf8_decode($_POST['pass']);
$subs_telefono = utf8_decode($_POST['telefono']);
$subs_email = utf8_decode($_POST['correo']);

$resultado=mysql_query("SELECT * FROM ".$db_table_name." WHERE Email = '".$subs_email."'", $db_connection);

if (mysql_num_rows($resultado)>0)
{

header('Location: registro.html');

} else {
	
	$insert_value = 'INSERT INTO `' . $db_name . '`.`'.$db_table_name.'` (`NOMBRE` , `PASS` , `TELEFONO`,`CORREO` ) VALUES ("' . $subs_name . '", "' . $subs_pass . '", "' . $subs_telefono .'", "' . $subs_email . '")';

mysql_select_db($db_name, $db_connection);
$retry_value = mysql_query($insert_value, $db_connection);

if (!$retry_value) {
   die('Error: ' . mysql_error());
}
	
header('Location: user.html');

}

mysql_close($db_connection);

		
?>