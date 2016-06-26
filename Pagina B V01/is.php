

<?php

$db_host="127.0.0.1";
$db_user="root";
$db_password="root";
$db_name="ayd";
$db_table_name="USUARIO";
   $db_connection = mysql_connect($db_host, $db_user, $db_password);


mysql_select_db($db_name, $db_connection);

// data enviada desde el formulario
$username = $_POST['nombre'];
$password = $_POST['pass'];

$sql= "SELECT*FROM $db_table_name WHERE NOMBRE='$username' and PASS='$password'";

$result=mysql_query($sql);

// counting table row
$count = mysql_num_rows($result);
// If result matched $username and $password

if($count == 1){

 $_SESSION['loggedin'] = true;
 $_SESSION['username'] = $username;
 $_SESSION['start'] = time();
 $_SESSION['expire'] = $_SESSION['start'] + (5 * 60) ;


echo "Bienvenido! " . $_SESSION['username'];
    
    header('Location: user.html');
}
 else {
 echo "Username o Password estan incorrectos.";

 echo "<a href='sesion.html'>Volver a Intentarlo</a>";
}

?>
 