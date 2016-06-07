<?php

require('includes/localhost_connection.php');

include ('header.php');

if(isset($_POST['submit']) && isset($_POST['search']))
{
    $invoer = $_POST["search"];
    $sql = "SELECT * FROM `BOEK` WHERE 'ISBN_nummer' LIKE '%".$invoer."%' OR 'uitgeverij' LIKE '%".$invoer."%' OR 'auteur' LIKE '%".$invoer."%' OR 'titel' LIKE '%".$invoer."%' OR 'genre' LIKE '%".$invoer."%'";
    $result = mysqli_query($conn, $sql);


    if($result){
        echo "<h1>Zoekresultaten</h1>";
        echo '<ul class="products-wrap" >';
        foreach($result as $key){
             echo '<li class="product-wrapper" ><table><tr>
                    <td>ISBN Nummer</td>
                    <td>:</td>
                    <td>'.$key["ISBN_nummer"].'
                    </td>
                    </tr>
                    <tr>
                    <td>Uitgeverij</td>
                    <td>:</td>
                    <td>'.$key['uitgeverij'].'</td>
                    </tr>
                    <tr>
                    <td valign="top">Auteur</td>
                    <td valign="top">:</td>
                    <td>'.$key['auteur'].'</td>
                    </tr>
                    <tr>
                    <td valign="top">titel </td>
                    <td valign="top">:</td>
                    <td>'.$key['titel'].'</td>
                    </tr>
                    <tr>
                    <td valign="top">Genre </td>
                    <td valign="top">:</td>
                    <td>'.$key['genre'].'</td>
                    </tr>
                    <tr>
                    <td valign="top">Uitgave </td>
                    <td valign="top">:</td>
                    <td>'.$key['uitgave'].'</td>
                    </tr></table></li>';
        }
        echo "</ul>";
    }else{
	    header("Location: HTTP/1.0 300 Bad Query");
    }
}else{
    $_SESSION['message'] = "Deze zoekopdracht heeft geen resultaten opgeleverd";
}

include('footer.php');


