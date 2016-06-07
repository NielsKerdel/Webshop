<?php

include('../header.php');

?>

<form action="/utoevoegenAd.php" method="POST"  enctype="multipart/form-data">
    <div class="form-group">
        <label for="Input-kvk_nummer">kvk_nummer</label>
        <input type="number" class="form-control" id="Input-kvk_nummer" name="kvk_nummer" placeholder="vul kvk_nummer">
    </div>
    <div class="form-group">
        <label for="Input-plaats_hoofdkantoor">plaats_hoofdkantoor</label>
        <input type="text" class="form-control" id="Input-plaats_hoofdkantoor" name="plaats_hoofdkantoor" placeholder="plaats_hoofdkantoor">
    </div>
    <div class="form-group">
        <label for="Input-telefoonnummer">telefoonnummer</label>
        <input type="text" class="form-control" id="Input-telefoonnummer" name="telefoonnummer" placeholder="telefoonnummer">
    </div>
    <div class="form-group">
        <label for="Input-bhr_medewerkernummer">bhr_medewerkernummer</label>
        <input type="text" class="form-control" id="Input-bhr_medewerkernummer" name="bhr_medewerkernummer" placeholder="bhr_medewerkernummer">
    </div>
    <div class="form-group">
        <label for="Input-boek_ISBN_nummer">boek_ISBN_nummer</label>
        <input type="text" class="form-control" id="Input-boek_ISBN_nummer" name="boek_ISBN_nummer" placeholder="boek_ISBN_nummer">
    </div>

    <button type="submit" value="submit" class="btn btn-default">Submit</button>
</form>

<?php

include('../footer.php');

?>