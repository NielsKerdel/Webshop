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
    if(isset($_POST['hoofdkantoor'])){
        $SQL_Post1 = "`hoofdkantoor` = '".$_POST['hoofdkantoor']."'";
    }
    if(isset($_POST['telefoonnr'])){
        $SQL_Post2 = ",`telefoonnr` = '".$_POST['telefoonnr']."'";
    }
    if(isset($_POST['Boek_ISBN_nummer'])){
        $SQL_Post3 = ",`Boek_ISBN_nummer` = '".$_POST['Boek_ISBN_nummer']."'";
    }
    if(isset($_POST["submit"])){
        include('upload.php');
        $SQL_Post4 = ",`src` = '". basename( $_FILES["fileToUpload"]["name"]) ."'";
    }

    $sql2 = "UPDATE `".DB_NAME."`.`ADVERTEERDER` SET ".$SQL_Post1.$SQL_Post2.$SQL_Post3.$SQL_Post4." WHERE `adverteerder`.`advertentienummer` = ".$_POST['advertentienummer']."";

    //echo $sql2."<br />";
    // Voer de query uit en vang fouten op
    if( !mysqli_query($conn, $sql2) ) {
        header("HTTP/1.0 300 Bad Query");
        //echo $sql2;
    } else {
        $_SESSION['message'] = 'Is gelukt.';
        header('Location: select.php');
        // Sluit de connection
        mysqli_close($conn);
    }
}else if(filter_has_var(INPUT_GET, "advertentienummer") !== false && filter_input(INPUT_GET, 'isbn-nummer', FILTER_VALIDATE_INT) !== false)
{
    /*** assign the image id ***/
    $post_id = filter_input(INPUT_GET, "advertentienummer", FILTER_SANITIZE_NUMBER_INT);

        $sql = "SELECT * FROM `ADVERTEERDER` WHERE `adverteerder`.`advertentienummer` = ".$post_id."";
        // Voer de query uit en sla het resultaat op
        $result = mysqli_query($conn, $sql);

        include('header.php');
        // We gebruiken in dit geval een associatief array.
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
            //form wordt nog niet geprint. Moet nog aan gewerkt worden.
        {
            echo '<form action="'.$_SERVER['PHP_SELF'].'" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="Input-advertentienummer">Advertentienummer</label>
                    <div>'.$row["advertentienummer"].'</div>"
                    <input type="hidden" name="ISBN_nummer" value="'.$row["ISBN_nummer"].'" />
                  </div>
                  <div class="form-group">
                    <label for="Input-hoofdkantoor">Plaats hoofdkantoor</label>
                    <input type="text" class="form-control" id="Input-uitgeverij" name="hoofdkantoor" value="'.$row["plaats_hoofdkantoor"].'">
                  </div>
                  <div class="form-group">
                    <label for="Input-telefoonnr">Telefoonnr</label>
                    <input type="text" class="form-control" id="Input-telefoonnr" name="telefoonnr" value="'.$row["telefoonnummer"].'">
                  </div>
                  <div class="form-group">
                    <label for="Input-Boek_ISBN_nummer">ISBN Nummer</label>
                    <input type="text" class="form-control" id="Input-Boek_ISBN_nummer" name="Boek_ISBN_nummer" value="'.$row["Boek_ISBN_nummer"].'">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Bestand Upload</label>
                    <input type="file" name="fileToUpload" id="exampleInputFile">
                    <p class="help-block">Upload hier de afbeelding</p>
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
