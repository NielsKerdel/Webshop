<?php
/**
 * Created by PhpStorm.
 * User: RuudVanOijen
 * Date: 20-01-15
 * Time: 12:01
 */
// mysqli_connect.php bevat de inloggegevens voor de database.
include('../includes/localhost_connection.php');


//print_r( $_REQUEST );
$sql = "SELECT `ISBN_nummer` FROM `BOEK` ";
// Voer de query uit en sla het resultaat op
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

foreach($row as $key){
    if($key === $_POST['ISBN_nummer']) {
        $isbnNummer = false;
    } else {
        $isbnNummer = true;
    }
}

mysqli_free_result($result);

if ( $_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST) && $isbnNummer)
{
    // for each post check if data has changed
    if(isset($_POST['ISBN_nummer'])){
        $ISBN_nummer = '`ISBN_nummer`';
        $ISBN_nummer_name = "'".$_POST['ISBN_nummer']."'";
    }
    if(isset($_POST['uitgeverij'])){
        $uitgeverij = ', `uitgeverij`';
        $uitgeverij_name = ", '".$_POST['uitgeverij']."'";
    }
    if(isset($_POST['auteur'])){
        $auteur = ', `auteur`';
        $auteur_name = ", '".$_POST['auteur']."'";
    }
    if(isset($_POST['titel'])){
        $titel = ', `titel`';
        $titel_name = ", '".$_POST['titel']."'";
    }
    if( file_exists($_FILES['fileToUpload']['tmp_name']) || is_uploaded_file($_FILES['fileToUpload']['tmp_name'])){
        include('upload.php');
        $name = basename($_FILES["fileToUpload"]["name"]);
        $name = str_replace(' ', '_', $name);
        $file = ', `src`';
        $file_name = ", '".$name."'";
    }
	if( file_exists($_FILES['fileToUpload2']['tmp_name']) || is_uploaded_file($_FILES['fileToUpload2']['tmp_name'])){
		include('upload2.php');
		$name2 = basename($_FILES["fileToUpload2"]["name"]);
		$name2 = str_replace(' ', '_', $name2);
		$file2 = ', `image_src`';
		$file_name2 = ", '".$name2."'";
	}

    if(isset($_POST['genre'])){
        $genre = ', `genre`';
        $genre_name = ", '".$_POST['genre']."'";
    }
    if(isset($_POST['uitgave'])){
        $uitgave = ', `uitgave`';
        $uitgave_name = ", '".$_POST['uitgave']."'";
    }
    if(isset($_POST['ugv_KvK_nummer'])){
        $ugv_kvk_nummer = ', `ugv_KvK_nummer`';
        $ugv_kvk_nummer_name = ", '".$_POST['ugv_KvK_nummer']."'";
    }
    if(isset($_POST['adv_advertentienummer'])){
        $adv_advertentienummer = ', `adv_advertentienummer`';
        $adv_advertentienummer_name = ", '".$_POST['adv_advertentienummer']."'";
    }
    $sql2 = "INSERT INTO `".DB_NAME."`.`BOEK` (".$ISBN_nummer.$uitgeverij.$auteur.$titel.$file.$file2.$genre.$uitgave.$ugv_kvk_nummer.$adv_advertentienummer.") VALUES (".$ISBN_nummer_name.$uitgeverij_name.$auteur_name.$titel_name.$file_name.$file_name2.$genre_name.$uitgave_name.$ugv_kvk_nummer_name.$adv_advertentienummer_name.");";

    // Voer de query uit en vang fouten op
    if( !mysqli_query($conn, $sql2) ) {
        header("Location: HTTP/1.0 300 Bad Query");
    //  echo $sql2;
    } else {
        $_SESSION['message'] = 'Is gelukt.';
        // Sluit de connection
        mysqli_close($conn);
        header('Location: index.php');
        session_write_close();
    }
}else{
    header("Location: HTTP/1.0 302 Double Primary");
}
/* sluit de connection */
mysqli_close($conn);
?>

