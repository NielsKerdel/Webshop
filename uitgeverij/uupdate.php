<?php
/**
 * Created by PhpStorm.
 * User: RuudVanOijen
 * Date: 20-01-15
 * Time: 14:17
 */

// mysqli_connect.php bevat de inloggegevens voor de database.
include ('../includes/localhost_connection.php');


// Gebruiker in database registreren.

/*** some basic sanity checks ***/
if( $_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST) ){

    // for each post check if data has changed
    if(isset($_POST['kvk_nummer'])){
        $SQL_Post1 = "`kvk_nummer` = '".$_POST['kvk_nummer']."'";
    }
    if(isset($_POST['plaats_hoofdkantoor'])){
        $SQL_Post2 = ",`plaats_hoofdkantoor` = '".$_POST['plaats_hoofdkantoor']."'";
    }
    if(isset($_POST['telefoonnummer'])){
        $SQL_Post3 = ",`telefoonnummer` = '".$_POST['telefoonnummer']."'";
    }
    if(isset($_POST["submit"])){
        include('uupload.php');
        $SQL_Post7 = ",`src` = '". basename( $_FILES["fileToUpload"]["name"]) ."'";
    }
    if(isset($_POST['bhr_medewerkernummer'])){
        $SQL_Post4 = ",`bhr_medewerkernummer` = '".$_POST['bhr_medewerkernummer']."'";
    }
    if(isset($_POST['boek_kvk_nummer'])){
        $SQL_Post5 = ",`boek_kvk_nummer` = '".$_POST['boek_kvk_nummer']."'";
    }
    $sql2 = "UPDATE `".DB_NAME."`.`UITGEVERIJ` SET ".$SQL_Post1.$SQL_Post2.$SQL_Post3.$SQL_Post4.$SQL_Post5." WHERE `UITGEVERIJ`.`kvk_nummer` = ".$_POST['kvk_nummer']."";

    //echo $sql2."<br />";
    // Voer de query uit en vang fouten op
    if( !mysqli_query($conn, $sql2) ) {
        header("HTTP/1.0 300 Bad Query");
        //echo $sql2;
    } else {
        $_SESSION['message'] = 'Is gelukt.';
        header('Location: uselect.php');
        // Sluit de connection
        mysqli_close($conn);
    }
}else if(filter_has_var(INPUT_GET, "kvk_nummer") !== false && filter_input(INPUT_GET, 'kvk_nummer', FILTER_VALIDATE_INT) !== false)
{
    /*** assign the image id ***/
    $post_id = filter_input(INPUT_GET, "kvk_nummer", FILTER_SANITIZE_NUMBER_INT);

        $sql = "SELECT * FROM `UITGEVERIJ` WHERE `UITGEVERIJ`.`kvk_nummer` = ".$post_id."";
        // Voer de query uit en sla het resultaat op
        $result = mysqli_query($conn, $sql);

        include('header.php');
        // We gebruiken in dit geval een associatief array.
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            echo '<form action="'.$_SERVER['PHP_SELF'].'" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="Input-kvk_nummer">kvk_nummer</label>
                    <div>'.$row["kvk_nummer"].'</div>"
                    <input type="hidden" name="kvk_nummer" value="'.$row["kvk_nummer"].'" />
                  </div>
                  <div class="form-group">
                    <label for="Input-kvk_nummer">kvk_nummer</label>
                    <input type="text" class="form-control" id="Input-kvk_nummer" name="kvk_nummer" value="'.$row["kvk_nummer"].'">
                  </div>
                  <div class="form-group">
                    <label for="Input-plaats_hoofdkantoor">plaats_hoofdkantoor</label>
                    <input type="text" class="form-control" id="Input-plaats_hoofdkantoor" name="plaats_hoofdkantoor" value="'.$row["plaats_hoofdkantoor"].'">
                  </div>
                  <div class="form-group">
                    <label for="Input-telefoonnummer">telefoonnummer</label>
                    <input type="text" class="form-control" id="Input-telefoonnummer" name="telefoonnummer" value="'.$row["telefoonnummer"].'">
                  <div class="form-group">
                    <label for="Input-bhr_medewerkernummer">bhr_medewerkernummer</label>
                    <input type="text" class="form-control" id="Input-bhr_medewerkernummer" name="bhr_medewerkernummer" value="'.$row["bhr_medewerkernummer"].'">
                  </div>
                  <div class="form-group">
                    <label for="Input-boek_kvk_nummer">boek_kvk_nummer</label>
                    <input type="text" class="form-control" id="Input-boek_kvk_nummer" name="boek_kvk_nummer" value="'.$row["boek_kvk_nummer"].'">
                  </div>
               
                  <button type="submit" name="submit" class="btn btn-default">Submit</button>
                </form>';
        }
    include('../footer.php');
    mysqli_free_result($result);
    /* sluit de connection */
    mysqli_close($conn);

}else{
    header("HTTP/1.0 301 Bad ID");
}
