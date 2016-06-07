<?php
/**
 * Created by PhpStorm.
 * User: RuudVanOijen
 * Date: 20-01-15
 * Time: 12:36
 */
include ('../header.php');

$module = "Adverteerder";
// prevent caching
include ('../includes/localhost_connection.php');


$sql = "SELECT * FROM `ADVERTEERDER`";

// Voer de query uit en sla het resultaat op
$result = mysqli_query($conn, $sql);

if($result === false) {
    $_SESSION['message'] = "<p>Er zijn geen adverteerders gevonden.</p>\n";
} else {
    $num = 0;
    $num = mysqli_num_rows($result);
    $_SESSION['message'] = "<p>Er zijn ".$num." ".$module." gevonden.</p>\n";
}

// Laat de adverteerders zien in een form, zodat de beheerder ze kan selecteren.
// Haal een nieuwe regel op uit het resultaat, zolang er nog regels beschikbaar zijn.
// We gebruiken in dit geval een associatief array.
echo '<div class="table-responsive">
        <table class="table">
        <tbody>
            <tr>
                <th>Advertentienummer</th>
                <th>Plaats hoofdkantoor</th>
                <th>Telefoonnummer</th>
                <th>ISBN Nummer</th>
                <th>Afbeelding</th>
            </tr>';

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    echo'<tr>
            <td>'.$row["advertentienummer"].'</td>
            <td>'.$row["plaats_hoofdkantoor"].'</td>
            <td>'.$row["telefoonnummer"].'</td>
            <td>'.$row["Boek_ISBN_nummer"].'</td>
            <td>'.$row["genre"].'</td>
            <td>'.$row["uitgave"].'</td>
            <td><a href="jpeg/'.$row["src"].'">'.$row["src"].'</a></td>
            <td><a href="update.php?advertentienr='.$row["advertentienummer"].'">Update '.$module.'</a></td>
            <td><a href="delete.php?advertentienr='.$row["advertentienummer"].'">Delete '.$module.'</a></td>
        </tr>';
}
echo '</tbody></table></div>';
echo '<a href="add.php">Add '.$module.'</a>';

mysqli_free_result($result);

include ('../footer.php');