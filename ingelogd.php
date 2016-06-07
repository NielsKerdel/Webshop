<?php
/**
 * Created by PhpStorm.
 * User: RuudVanOijen
 * Date: 22-01-15
 * Time: 18:20
 */

//if(array_key_exists('username', $_SESSION)){
	include('header2.php');

	?>
	<div>
		<?php echo $_SESSION['username'] ?>
		Hier is een overzicht
	</div>

	<?php
	if ($_SESSION['account'] == 'Beheer') {
		header('Location: /advert');
	} elseif ($_SESSION['account']) == 'Gebruiker' {
		header('Location: /book.php');
	}
	
	include('footer2.php');
//}else{
//	$_SESSION['melding'] = "U bent niet ingelogd";
//	header('Location: index.php');
//}
