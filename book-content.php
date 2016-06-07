<html>
<!-- [if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif] -->
<!-- [if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif] -->
<!-- [if IE 8]>         <html class="no-js lt-ie9"> <![endif] -->
<!-- [if gt IE 8]>> <html class="no-js"> <![endif] -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>STD Books.nl</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

        <link rel="stylesheet" href="http://stdbooks.nl/assets/css/normalize.css">
        <link rel="stylesheet" href="http://stdbooks.nl/assets/css/main.css">
        <script src="http://stdbooks.nl/assets/js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
<body>
<div id="Content-Wrap">
	<div id="Center-Content">
<?php
// add.php
// stuurt gekozen artikel door naar de winkelwagen cart.php

DEFINE ('DB_USER', 'stdbooks');
       DEFINE ('DB_PASSWORD', 'y5YoiEvE69');
       DEFINE ('DB_HOST', 'localhost');
       DEFINE ('DB_NAME', 'Avans_webshop');

	//
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	 
	// check connection
	if (mysqli_connect_errno()) {
		printf("<p><b>Fout: verbinding met de database mislukt.</b><br/>\n%s</p>\n", mysqli_connect_error());
		include ('includes/footer.html');
		exit();
	}
	
// Het product wat we toevoegen moeten we eerst controleren
if(is_numeric($_POST['ISBN_nummer'])) {
    $productnummer = $_POST['ISBN_nummer'];
}
else {
    echo "<p><a href=\"javascript:history.back()\">Pagina terug!!</a></p>\n";
    exit();
}

$sql = "SELECT 
	`ISBN_nummer`, 
	`uitgeverij`,
	`auteur`,
	 `titel`,
	 `genre`,
	`uitgave`,
	 `ugv_KvK_nummer`,
	`adv_advertentienummer`,
        `src`
	FROM BOEK
	WHERE `ISBN_nummer` = '$productnummer';"; 

// Voer de query uit en sla het resultaat op 
	$result = mysqli_query($conn, $sql);
		
	if($result === false) {
		echo "<p>Er zijn geen producten in de winkel gevonden.</p>\n";
	} else {
		$num = 0;
		$num = mysqli_num_rows($result);
	}

	// Laat de producten zien in een form, zodat de gebruiker ze kan selecteren.
	// Haal een nieuwe regel op uit het resultaat, zolang er nog regels beschikbaar zijn.
	// We gebruiken in dit geval een associatief array.
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
	{
		echo "<!-- ---------------------------------- -->\n";
		echo "<div id=\"product\">\n<form action=\"Login/iDeal.php\" method=\"post\">\n";
		echo '<p><img id=\'plaatje\' value=\"Bestel\" src="showfile.php?src='.$row["src"].'"></p>';
		echo "<div id=\"ISBN_nummer\">ISBN_nummer: ".$row["ISBN_nummer"]."</div>\n";
		echo "<div id=\"uitgeverij\">Uitgeverij: ".$row["uitgeverij"]."</div>\n";
		echo "<div id=\"auteur\">Auteur: ".$row["auteur"]."</div>\n";
		echo "<div id=\"titel\">Titel: ".$row["titel"]."</div>\n";
		echo "<div id=\"genre\">Genre: ".$row["genre"]."</div>\n";
		echo "<div id=\"uitgave\">Uitgave: ".$row["uitgave"]."</div>\n";
		echo "<input type=\"submit\" value=\"Bestel\" name=\"book\" class=\"button\"/></div>\n";
		echo "</form>\n</div>\n";
	}
?> 
	</div>
</div>
</body>
</html>
