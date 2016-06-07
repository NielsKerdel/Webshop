<?php
session_start();

require('includes/localhost_connection.php');

	if ($_SERVER["REQUEST_METHOD"] == "POST")
		{

		$emailadres = $_POST["emailadres"];
		$password = $_POST["password"];
		
		// Stel query op
		$sql = "SELECT * FROM `BEHEER` WHERE email = '".addslashes($emailadres)."' AND wachtwoord = '".addslashes(md5($password))."'";
			$result = mysqli_query($conn, $sql);
		$sql2 = "SELECT * FROM `KLANT` WHERE email = '".addslashes($emailadres)."' AND wachtwoord = '".addslashes(md5($password))."'";
			$result2 = mysqli_query($conn, $sql2);

		$_SESSION['username']=$emailadres;

		if($result->num_rows > 0){
			$_SESSION['account']='Beheer';
			header('Location: ingelogd.php');
		}else if($result2->num_rows > 0){
			$sql3 = "SELECT `betaald` FROM `KLANT` WHERE email = '".addslashes($emailadres)."'";
			$result3 = mysqli_query($conn, $sql3);
			if($result3->num_rows != '1'){
				header('Location: /HTML/iDeal.html');
			}
			$_SESSION['account']='Gebruiker';
			header('Location: ingelogd.php');
		} else{
			$_SESSION['user_melding'] = 'Gebruikersnaam en/of wachtwoord is niet correct';
		}

	}
?>