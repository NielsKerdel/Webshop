<?php
/**
 * Created by PhpStorm.
 * User: RuudVanOijen
 * Date: 20-01-15
 * Time: 12:36
 */
include ('../header.php');

$module = "Uitgever";
// prevent caching
include ('../includes/localhost_connection.php');


$sql = "SELECT * FROM `UITGEVERIJ`";

// Voer de query uit en sla het resultaat op
$result = mysqli_query($conn, $sql);

if($result === false) {
    $_SESSION['message'] = "<p>Er zijn geen producten in de winkel gevonden.</p>\n";
} else {
    $num = 0;
    $num = mysqli_num_rows($result);
    $_SESSION['message'] = "<p>Er zijn ".$num." ".$module." gevonden.</p>\n";
}

// Laat de producten zien in een form, zodat de gebruiker ze kan selecteren.
// Haal een nieuwe regel op uit het resultaat, zolang er nog regels beschikbaar zijn.
// We gebruiken in dit geval een associatief array.
echo '<div class="table-responsive">
        <table class="table">
        <tbody>
            <tr class="titel">
                <th>kvk_nummer</th>
                <th>Plaats van hoofdkantoor</th>
                <th>Telefoonnummer</th>
                <th>Medewerkernummer</th>
                <th>boek_ISBN_nummer</th>
            </tr>';

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    echo'<tr>
            <td>'.$row["kvk_nummer"].'</td>
            <td>'.$row["plaats_hoofdkantoor"].'</td>
            <td>'.$row["telefoonnummer"].'</td>
            <td>'.$row["bhr_medewerkernummer"].'</td>
            <td>'.$row["boek_ISBN_nummer"].'</td>
            <td><a href="uupdate.php?isbn-nummer='.$row["kvk_nummer"].'" title="Update '.$module.'" class="settings">Update '.$module.'</a></td>
            <td><a href="udelete.php?isbn-nummer='.$row["kvk_nummer"].'" title="Delete '.$module.'" class="settings"><span class="fa fa-times"></span></a></td>
        </tr>';
}
echo '</tbody></table></div>';
echo '<a href="utoevoegen.php">Add '.$module.'</a>';

mysqli_free_result($result);

include ('../footer.php');