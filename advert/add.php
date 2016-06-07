<?php

include('../header.php');

?>

<form action="<?php echo $hostname ?>/advert/addAdvert.php" method="POST"  enctype="multipart/form-data">
    <div class="form-group">
        <label for="Input-advertentienummer">Advertentienummer</label>
        <input type="number" class="form-control" id="Input-advertentienr" name="advertentienr" placeholder="vul advertentienr">
    </div>
    <div class="form-group">
        <label for="Input-hoofdkantoor">Plaats Hoofdkantoor</label>
        <input type="text" class="form-control" id="Input-hoofdkantoor" name="hoofdkantoor" placeholder="hoofdkantoor">
    </div>
    <div class="form-group">
        <label for="Input-telefoonnr">Telefoonnummer</label>
        <input type="number" class="form-control" id="Input-telefoonnr" name="telefoonnr" placeholder="telefoonnr">
    </div>
    <div class="form-group">
        <label for="Input-isbn_nr">Boek ISBN Nummer</label>
        <input type="number" class="form-control" id="Input-isbn_nr" name="isbn_nr" placeholder="isbn_nr">
    </div>
        <div class="form-group">
        <label for="exampleInputFile">Bestand Upload</label>
        <input type="file" name="fileToUpload" id="exampleInputFile">
        <p class="help-block">Upload hier de afbeelding</p>
    </div>
    <button type="submit" value="submit" class="btn btn-default">Voeg toe</button>
</form>

<?php

include('../footer.php');

?>