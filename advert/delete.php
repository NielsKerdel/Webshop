<?php
// mysqli_connect.php bevat de inloggegevens voor de database.
include ('../includes/localhost_connection.php');

/**
 * Created by PhpStorm.
 * User: RuudVanOijen
 * Date: 20-01-15
 * Time: 14:05
 */
if(filter_has_var(INPUT_GET, "advertentienr") !== false && filter_input(INPUT_GET, 'advertentienr', FILTER_VALIDATE_INT) !== false)
{
/*** assign the image id ***/
$post_id = filter_input(INPUT_GET, "advertentienr", FILTER_SANITIZE_NUMBER_INT);

$sql = "DELETE FROM `".DB_NAME."`.`ADVERTEERDER` WHERE `adverteerder`.`advertentienummer` = ".$post_id."";
//echo $sql;
// Voer de query uit en sla het resultaat op
$result = mysqli_query($conn, $sql);

    if($result === false){
       header("HTTP/1.0 302 Double Primary");
    }else{
       $_SESSION['message'] = "Dit boek is verwijderd";
       header('Location: select.php');
    }

}else{
    header("HTTP/1.0 301 Bad ID");
}

mysqli_free_result($result);
/* sluit de connection */
mysqli_close($conn);
