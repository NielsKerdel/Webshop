<?php
/**
 * Created by PhpStorm.
 * User: RuudVanOijen
 * Date: 20-01-15
 * Time: 12:01
 */
// mysqli_connect.php bevat de inloggegevens voor de database.
include ('includes/localhost_connection.php');


//print_r( $_REQUEST );
$sql = "SELECT `boek_ISBN_nummer` FROM `UITGEVERIJ` ";
// Voer de query uit en sla het resultaat op
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

foreach($row as $key){
    if($key === $_POST['boek_ISBN_nummer']) {
        $isbnNummer = false;
    } else {
        $isbnNummer = true;
    }
}

mysqli_free_result($result);

if ( $_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST) && $isbnNummer)
{
    // for each post check if data has changed
    if(isset($_POST['boek_ISBN_nummer'])){
        $boek_ISBN_nummer = '`boek_ISBN_nummer`';
        $boek_ISBN_nummer_name = "'".$_POST['boek_ISBN_nummer']."'";
    }
    if(isset($_POST['kvk_nummer'])){
        $kvk_nummer = ', `kvk_nummer`';
        $kvk_nummer_name = ", '".$_POST['kvk_nummer']."'";
    }
    if(isset($_POST['plaats_hoofdkantoor'])){
        $plaats_hoofdkantoor = ', `plaats_hoofdkantoor`';
        $plaats_hoofdkantoor_name = ", '".$_POST['plaats_hoofdkantoor']."'";
    }
    if(isset($_POST['telefoonnummer'])){
        $telefoonnummer = ', `telefoonnummer`';
        $telefoonnummer_name = ", '".$_POST['telefoonnummer']."'";
    }
    if(isset($_POST['bhr_medewerkernummer'])){
        $bhr_medewerkernummer = ', `bhr_medewerkernummer`';
        $bhr_medewerkernummer_name = ", '".$_POST['bhr_medewerkernummer']."'";
    }
    $sql2 = "INSERT INTO `".DB_NAME."`.`UITGEVERIJ` (".$boek_ISBN_nummer.$kvk_nummer.$plaats_hoofdkantoor.$telefoonnummer.$bhr_medewerkernummer.") VALUES (".$boek_ISBN_nummer_name.$kvk_nummer_name.$plaats_hoofdkantoor_name.$telefoonnummer_name.$bhr_medewerkernummer_name.");";

    // Voer de query uit en vang fouten op
    if( !mysqli_query($conn, $sql2) ) {
        header("HTTP/1.0 300 Bad Query");
    //  echo $sql2;
    } else {
        $_SESSION['message'] = 'Is gelukt.';
        // Sluit de connection
        mysqli_close($conn);
        header('Location: index.php');
        session_write_close();
    }
}else{
    header("HTTP/1.0 302 Double Primary");
}
/* sluit de connection */
mysqli_close($conn);
?>

