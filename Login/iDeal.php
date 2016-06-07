<?php
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST))
{
	$username = $_SESSION['Username'];
	echo $username;
	// Connect met database
	$DataBase = "inloggen";
	mysql_connect("localhost", "root", "") or die(mysql_error());
	mysql_select_db($DataBase) or die(mysql_error());
		
	// Stel query op
	$query = "UPDATE users SET permissie='Ja' WHERE username='$username';";
	$result = mysql_query($query);
		if(mysql_num_rows($result) == 0) {
			header('Location: test.php');
		} else {
			header('Location: test.php');
		}
		
}
?>