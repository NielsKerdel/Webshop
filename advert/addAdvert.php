<?php
/**
 * Created by PhpStorm.
 * User: RuudVanOijen
 * Date: 20-01-15
 * Time: 12:01
 */
// mysqli_connect.php bevat de inloggegevens voor de database.
include ('../includes/localhost_connection.php');


//print_r( $_REQUEST );
$sql = "SELECT `advertentienummer` FROM `ADVERTEERDER`";
// Voer de query uit en sla het resultaat op
$result = mysqli_query($conn, $sql);

foreach($result as $key){
    if($key === $_POST['advertentienr']) {
        $advertentienr = false;
    } else {
        $advertentienr = true;
    }

}
mysqli_free_result($result);

if ( $_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST) && $advertentienr == true)
{
    // for each post check if data has changed
    if(isset($_POST['advertentienr'])){
        $advertentienr = '`advertentienr`';
        $advertentienr_name = "'".$_POST['advertentienr']."'";
    }
    if(isset($_POST['hoofdkantoor'])){
        $hoofdkantoor = ', `hoofdkantoor`';
        $hoofdkantoor_name = ", '".$_POST['hoofdkantoor']."'";
    }
    if(isset($_POST['telefoonnr'])){
        $telefoonnr = ', `telefoonnr`';
        $telefoonnr_name = ", '".$_POST['telefoonnr']."'";
    }
    if(isset($_POST['isbn_nr'])){
        //include('uploadimg.php');
        $Boek_ISBN_nummer = ', `Boek_ISBN_nummer`';
        $Boek_ISBN_nummer_name = ", '".$_POST['isbn_nr']."'";
    }

    $sql2 = "INSERT INTO `".DB_NAME."`.`ADVERTEERDER` (".$advertentienr.$hoofdkantoor.$telefoonnr.$Boek_ISBN_nummer.") VALUES (".$advertentienr_name.$hoofdkantoor_name.$telefoonnr_name.$Boek_ISBN_nummer_name.");";

    // Voer de query uit en vang fouten op
    if( !mysqli_query($conn, $sql2) ) {
        header("HTTP/1.0 300 Bad Query");
    //  echo $sql2;
    } else {
        $_SESSION['message'] = 'Is gelukt.';
        // Sluit de connection
        mysqli_close($conn);
        header('Location: ìndex.php');
        session_write_close();
    }
	
} elseif($advertentienr == false) {
	
	echo "advertentienr is al in gebruik";
	header('Location: ìndex.php');
	
} else{
	
    echo "kom er niet in";
    //header("HTTP/1.0 302 Double Primary");
}
/* sluit de connection */
mysqli_close($conn);
?>

