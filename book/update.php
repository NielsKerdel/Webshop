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
    if(isset($_POST['uitgeverij'])){
        $SQL_Post1 = "`uitgeverij` = '".$_POST['uitgeverij']."'";
    }
    if(isset($_POST['auteur'])){
        $SQL_Post2 = ",`auteur` = '".$_POST['auteur']."'";
    }
    if(isset($_POST['titel'])){
        $SQL_Post3 = ",`titel` = '".$_POST['titel']."'";
    }
    if(isset($_POST["submit"]) && $_FILES["fileToUpload"]["size"] != 0){
        include('upload.php');
        $SQL_Post7 = ",`src` = '". basename( $_FILES["fileToUpload"]["name"]) ."'";
    }
    if(isset($_POST["submit"]) && $_FILES["fileToUpload2"]["size"] != 0){
        include('upload2.php');
        $SQL_Post8 = ",`image_src` = '".basename( $_FILES["fileToUpload2"]["name"])."'";
    }
    if(isset($_POST['genre'])){
        $SQL_Post4 = ",`genre` = '".$_POST['genre']."'";
    }
    if(isset($_POST['uitgave'])){
        $SQL_Post5 = ",`uitgave` = '".$_POST['uitgave']."'";
    }
    if(isset($_POST['ugv_KvK_nummer'])){
        $SQL_Post5 = ",`ugv_KvK_nummer` = '".$_POST['ugv_KvK_nummer']."'";
    }
    if(isset($_POST['adv_advertentienummer'])){
        $SQL_Post6 = ",`adv_advertentienummer` = '".$_POST['adv_advertentienummer']."'";
    }

    $sql2 = "UPDATE `".DB_NAME."`.`BOEK` SET ".$SQL_Post1.$SQL_Post2.$SQL_Post3.$SQL_Post4.$SQL_Post5.$SQL_Post6.$SQL_Post7.$SQL_Post8." WHERE `ISBN_nummer` = ".$_POST['ISBN_nummer']."";

    //echo $sql2."<br />";
    // Voer de query uit en vang fouten op
    if( !mysqli_query($conn, $sql2) ) {
        header("Location: HTTP/1.0 300 Bad Query");
        //echo $sql2;
    } else {
        $_SESSION['message'] = 'Is gelukt.';
        header('Location: index.php');
        session_write_close();
        // Sluit de connection
        mysqli_close($conn);
    }
}else if(filter_has_var(INPUT_GET, "isbn-nummer") !== false && filter_input(INPUT_GET, 'isbn-nummer', FILTER_VALIDATE_INT) !== false)
{

    /*** assign the image id ***/
    $post_id = filter_input(INPUT_GET, "isbn-nummer", FILTER_SANITIZE_NUMBER_INT);

        $sql = "SELECT * FROM `BOEK` WHERE `ISBN_nummer` = ".$post_id."";

        // Voer de query uit en sla het resultaat op
        $result = mysqli_query($conn, $sql);

        include('../header.php');

        // We gebruiken in dit geval een associatief array.
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            echo '<form action="'.$_SERVER['PHP_SELF'].'" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="Input-ISBN-nummer">ISBN_nummer</label>
                    <div>'.$row["ISBN_nummer"].'</div>"
                    <input type="hidden" name="ISBN_nummer" value="'.$row["ISBN_nummer"].'" />
                  </div>
                  <div class="form-group">
                    <label for="Input-uitgeverij">uitgeverij</label>
                    <input type="text" class="form-control" id="Input-uitgeverij" name="uitgeverij" value="'.$row["uitgeverij"].'">
                  </div>
                  <div class="form-group">
                    <label for="Input-auteur">auteur</label>
                    <input type="text" class="form-control" id="Input-auteur" name="auteur" value="'.$row["auteur"].'">
                  </div>
                  <div class="form-group">
                    <label for="Input-titel">titel</label>
                    <input type="text" class="form-control" id="Input-titel" name="titel" value="'.$row["titel"].'">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Bestand Upload PDF</label>
                    <input type="file" name="fileToUpload" id="exampleInputFile">
                    <p class="help-block">Upload hier de PDF</p>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Bestand Upload Image</label>
                    <input type="file" name="fileToUpload2" id="exampleInputFile">
                    <p class="help-block">Upload hier de Image</p>
                  </div>
                  <div class="form-group">
                    <label for="Input-genre">genre</label>
                    <input type="text" class="form-control" id="Input-genre" name="genre" value="'.$row["genre"].'">
                  </div>
                  <div class="form-group">
                    <label for="Input-uitgave">uitgave</label>
                    <input type="text" class="form-control" id="Input-uitgave" name="uitgave" value="'.$row["uitgave"].'">
                  </div>
                  <div class="form-group">
                    <label for="Input-ugv-KvK-nummer">ugv_KvK_nummer</label>
                    <input type="number" class="form-control" id="Input-ugv-KvK-nummer" name="ugv_KvK_nummer" value="'.$row["ugv_KvK_nummer"].'">
                  </div>
                  <div class="form-group">
                    <label for="Input-adv-advertentienummer">adv_advertentienummer</label>
                    <input type="number" class="form-control" id="Input-adv-advertentienummer" name="adv_advertentienummer" value="'.$row["adv_advertentienummer"].'">
                  </div>
                  <button type="submit" name="submit" class="btn btn-default">Submit</button>
                </form>';
        }
    include('../footer.php');

    mysqli_free_result($result);
    /* sluit de connection */
    mysqli_close($conn);

}else{
    header("Location: HTTP/1.0 301 Bad ID");
}

