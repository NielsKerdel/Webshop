<?php
/**
 * Created by PhpStorm.
 * User: RuudVanOijen
 * Date: 20-01-15
 * Time: 11:59
 */
DEFINE ('DB_USER', 'stdbooks');
DEFINE ('DB_PASSWORD', 'y5YoiEvE69');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'Avans_webshop');

//
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// check connection
if (mysqli_connect_errno()) {
    header("Location: HTTP/1.0 500 Not Found");
    include ('includes/footer.php');
}



?>