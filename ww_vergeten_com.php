<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			//$_SESSION['email_melding'] = 'Geef een geldig email adres op.';
			// Kijk of de email voor het wachtwoord is
			function check_valid($result) {
				if (mysql_num_rows($result) == 0) {
					return false;
				} else {
					return true;
				}
			}
			// Connect met database
			$DataBase = "inloggen";
			mysql_connect("localhost", "root", "") or die(mysql_error());
			mysql_select_db($DataBase) or die(mysql_error());
			
			//print_r($_POST);
			if  (!empty($_POST["wachtwoord"]) && isset($_POST["wachtwoord"])) { 
				$email = $_POST["wachtwoord"];			
				
				// Stel query op
				$query = ("SELECT * FROM users WHERE email = '".$email."';");
				$result = mysql_query($query);

				
				// Zet functie om in variabele
				$wachtwoord_vergeten = check_valid($result);
				if ($wachtwoord_vergeten == true) {
					echo 'Er is een email verstuurd met uw wachtwoord';
				} else {
					echo 'Geef een geldig email adres op.';
				}
				
			} 	
			elseif (!empty($_POST["gebruikersnaam"]) && isset($_POST["gebruikersnaam"])) { 
				$email = $_POST["gebruikersnaam"];
			
				// Stel query op
				$query_2 = ("SELECT * FROM users WHERE email = '".$email."';") or die (mysql_error());
				$result_2 = mysql_query($query_2);

				// Zet functie om in variabele
				$gebruikersnaam_vergeten = check_valid($result_2);
				echo $gebruikersnaam_vergeten;
				if ($gebruikersnaam_vergeten == true) {
					echo 'Er is een email verstuurd met uw gebruikersnaam';
				} else {
					echo 'Geef een geldig email adres op.';
				}
			}
		}
?>