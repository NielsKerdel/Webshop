<?php
/**
 * Created by PhpStorm.
 * User: RuudVanOijen
 * Date: 20-01-15
 * Time: 12:36
 */
include ('../header.php');

$module = "Book";
// prevent caching
include ('../includes/localhost_connection.php');


$sql = "SELECT * FROM `BOEK`";

// Voer de query uit en sla het resultaat op
$result = mysqli_query($conn, $sql);

if($result === false) {
    $_SESSION['message'] = "<p>Er zijn geen producten in de winkel gevonden.</p>\n";
} else {
    $num = 0;
    $num = mysqli_num_rows($result);
    $_SESSION['message'] = "<p>Er zijn ".$num." ".$module." gevonden.</p>\n";
}
echo $_SESSION['file'];
// Laat de producten zien in een form, zodat de gebruiker ze kan selecteren.
// Haal een nieuwe regel op uit het resultaat, zolang er nog regels beschikbaar zijn.
// We gebruiken in dit geval een associatief array.
echo '<div class="table-responsive">
        <table class="table">
        <tbody>
            <tr class="titel">
                <th>ISBN_nummer</th>
                <th>Uitgeverij</th>
                <th>Auteur</th>
                <th>Titel</th>
                <th>Genre</th>
                <th>Uitgave</th>
                <th width="20">PDF</th>
                <th>ugv_KvK_nummer</th>
            </tr>';

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    echo'<tr>
            <td>'.$row["ISBN_nummer"].'</td>
            <td>'.$row["uitgeverij"].'</td>
            <td>'.$row["auteur"].'</td>
            <td>'.$row["titel"].'</td>
            <td>'.$row["genre"].'</td>
            <td>'.$row["uitgave"].'</td>
            <td><a href="book.php?isbn-nummer='.$row["ISBN_nummer"].'">'.$row["src"].'</a></td>
            <td>'.$row["ugv_KvK_nummer"].'</td>
            <td><a href="update.php?isbn-nummer='.$row["ISBN_nummer"].'" title="Update '.$module.'" class="settings">Update '.$module.'</a></td>
            <td><a href="delete.php?isbn-nummer='.$row["ISBN_nummer"].'" title="Delete '.$module.'" class="settings"><span class="fa fa-times"></span></a></td>
        </tr>';
}
echo '</tbody></table></div>';
echo '<a href="add.php">Add '.$module.'</a>';

mysqli_free_result($result);

include ('../footer.php');