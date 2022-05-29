<?php
$dbhost="localhost";
$dbuser="root";
$dbpassword="";
$dbname="dblibreria";
function connetti()
{
	global $dbhost,$dbuser,$dbpassword,$dbname;
	$conn=mysqli_connect($dbhost,$dbuser,$dbpassword) or die("Connessione fallita");
	mysqli_select_db($conn,$dbname);
	return $conn;
}

?>