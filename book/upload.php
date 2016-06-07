<?php
/**
 * Created by PhpStorm.
 * User: RuudVanOijen
 * Date: 20-01-15
 * Time: 18:10
 */
$target_dir = "pdf/";
$name = basename($_FILES["fileToUpload"]["name"]);
$name = str_replace(' ', '_', $name);
$target_file = $target_dir .$name;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"]) || file_exists($_FILES['fileToUpload']['tmp_name']) || is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {
    // Check if file already exists
    if (file_exists($target_file)) {
        $_SESSION['file'] = "Sorry, file already exists.<br />";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "pdf" ) {
        $_SESSION['file'] = "Sorry, only PDF files are allowed.<br />";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $_SESSION['file'] = "Sorry, your file was not uploaded.<br />";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $_SESSION['file'] = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.<br />";
        } else {
            $_SESSION['file'] = "Sorry, there was an error uploading your file.<br />";
        }
    }
}


?>