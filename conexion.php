<?php
$dbhost = "IP_Address";
$dbuser = "User";
$dbpass = "Password";
$dbname = "DataBase_Name";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) 
{
	die("No hay conexión: ".mysqli_connect_error());
}

?>
