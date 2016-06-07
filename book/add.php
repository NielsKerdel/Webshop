<?php

include('../header.php');

?>
<form action="<?php echo $hostname ?>/book/addBook.php" method="POST"  enctype="multipart/form-data">
    <div class="form-group">
        <label for="Input-ISBN-nummer">ISBN_nummer</label>
        <input type="number" class="form-control" id="Input-ISBN-nummer" name="ISBN_nummer" placeholder="vul ISBN_nummer">
    </div>
    <div class="form-group">
        <label for="Input-uitgeverij">uitgeverij</label>
        <input type="text" class="form-control" id="Input-uitgeverij" name="uitgeverij" placeholder="uitgeverij">
    </div>
    <div class="form-group">
        <label for="Input-auteur">auteur</label>
        <input type="text" class="form-control" id="Input-auteur" name="auteur" placeholder="auteur">
    </div>
    <div class="form-group">
        <label for="Input-titel">titel</label>
        <input type="text" class="form-control" id="Input-titel" name="titel" placeholder="titel">
    </div>
    <div class="form-group">
        <label for="exampleInputFile">Bestand Upload PDF</label>
        <input type="file" name="fileToUpload" id="exampleInputFile">
        <p class="help-block">Upload hier de PDF</p>
    </div>
	<div class="form-group">
		<label for="exampleInputFile2">Bestand Upload JPG</label>
		<input type="file" name="fileToUpload2" id="exampleInputFile2">
		<p class="help-block">Upload hier de JPG</p>
	</div>
    <div class="form-group">
        <label for="Input-genre">genre</label>
        <input type="text" class="form-control" id="Input-genre" name="genre" placeholder="genre">
    </div>
    <div class="form-group">
        <label for="Input-uitgave">uitgave</label>
        <input type="text" class="form-control" id="Input-uitgave" name="uitgave" placeholder="uitgave">
    </div>
    <div class="form-group">
        <label for="Input-ugv-KvK-nummer">ugv_KvK_nummer</label>
        <input type="number" class="form-control" id="Input-ugv-KvK-nummer" name="ugv_KvK_nummer" placeholder="ugv_KvK_nummer">
    </div>
    <div class="form-group">
        <label for="Input-adv-advertentienummer">adv_advertentienummer</label>
        <input type="number" class="form-control" id="Input-adv-advertentienummer" name="adv_advertentienummer" placeholder="adv_advertentienummer">
    </div>
    <button type="submit" value="submit" class="btn btn-default">Submit</button>
</form>
<?php

include('../footer.php');

?>