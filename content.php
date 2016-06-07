<?php
/**
 * Created by PhpStorm.
 * User: RuudVanOijen
 * Date: 21-01-15
 * Time: 13:31
 */

?>
<div class="content-wrapper clearfix">
<?php
$sql = "SELECT * FROM `BOEK`";
$result = mysqli_query($conn, $sql);

if($result){
    echo "<h1>Onze Boeken</h1>";
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
    echo "HTTP/1.0 300 Bad Query";
}
?>
<!--    <div class="products-sort">-->
<!--        <h3>Filtering</h3>-->
<!--        <form action="" method="POST" class="form_filter" >-->
<!--            <fieldset>-->
<!--                <div class="radio-holder" ><input type="radio" name="sex" value="male" checked />Male</div>-->
<!--                <div class="radio-holder" ><input type="radio" name="sex" value="male" checked />Male</div>-->
<!--                <div class="radio-holder" ><input type="radio" name="sex" value="male" checked />Male</div>-->
<!--            </fieldset>-->
<!--            <fieldset>-->
<!--                <div class="radio-holder" >-->
<!--                    <div class="radio-holder" ><input type="radio" name="sex" value="male" checked />Male</div>-->
<!--                    <div class="radio-holder" ><input type="radio" name="sex" value="male" checked />Male</div>-->
<!--                    <div class="radio-holder" ><input type="radio" name="sex" value="male" checked />Male</div>-->
<!--                </div>-->
<!--            </fieldset>-->
<!--            <fieldset>-->
<!--                <div class="radio-holder" >-->
<!--                    <div class="radio-holder" ><input type="radio" name="sex" value="male" checked />Male</div>-->
<!--                    <div class="radio-holder" ><input type="radio" name="sex" value="male" checked />Male</div>-->
<!--                    <div class="radio-holder" ><input type="radio" name="sex" value="male" checked />Male</div>-->
<!--                </div>-->
<!--            </fieldset>-->
<!--            <fieldset>-->
<!--                <div class="radio-holder" >-->
<!--                    <div class="radio-holder" ><input type="radio" name="sex" value="male" checked />Male</div>-->
<!--                    <div class="radio-holder" ><input type="radio" name="sex" value="male" checked />Male</div>-->
<!--                    <div class="radio-holder" ><input type="radio" name="sex" value="male" checked />Male</div>-->
<!--                </div>-->
<!--            </fieldset>-->
<!--            <div class="radio-holder" >-->
<!--                <input type="submit" name="sex" value="verzenden" />-->
<!--            </div>-->
<!--        </form>-->
<!--    </div>-->
</div>