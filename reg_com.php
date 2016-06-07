<?php

require('includes/localhost_connection.php');

session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);

	if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST))
		{
			$name = $_POST["naam"];
			$email = $_POST["emailadres"];
			$password = $_POST["password"];
			$password_again = $_POST["password_again"];
			$school = $_POST["school"];
			$adres = $_POST["adres"];
			$algemenevoorwaarden = $_POST["av"];

			foreach($_POST as $post){
				if(empty($post)){
					echo 'Je hebt niet alles ingevuld';
					header('Location: registreren.php');
				}
			}

			if($password === $password_again){
				if(!empty($algemenevoorwaarden)){
					$sql = "INSERT INTO `KLANT`(`naam`, `email`, `wachtwoord`, `school`, `adres`) VALUES ('".addslashes($name)."','".addslashes($email)."','".addslashes(md5($password))."','".addslashes($school)."','".addslashes($adres)."')";

					if( !mysqli_query($conn, $sql) ) {
						header("Location: HTTP/1.0 300 Bad Query");
					} else {
						$_SESSION['message'] = 'Is gelukt.';
						// Sluit de connection
						mysqli_close($conn);
						header('Location: login.php');
						session_write_close();
					}

				}else{
					echo 'Je bent niet akkoord gegaan met de voorwaarden';
					header('Location: registreren.php');
				}

			}else{
				echo 'Je wachtwoorden komen niet overeen';
				header('Location: registreren.php');
			}
		}
		else{
			header('Location: registreren.php');
		}
?>