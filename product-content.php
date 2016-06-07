<!DOCTYPE html>
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
<!-- [if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif] 

     Add your site or application content here -->
<div class="site-wrapper">

<section class="content-wrapper">
<div class="content-wrapper clearfix">
    <br />
 <div class="products-sort">
            <h3>Filtering</h3>
            <form action="" method="POST" class="form_filter" >
                <fieldset>
                    <div class="radio-holder" ><input type="radio" name="Accountancy" value="Accountancy">Accountancy</div>
					<div class="radio-holder" ><input type="radio" name="Bedrijfskunde" value="Bedrijfskunde">Bedrijfskunde</div>
                    <div class="radio-holder" ><input type="radio" name="Bestuurskunde" value="Bestuurskunde">Bestuurskunde</div>
                </fieldset>
                <fieldset>
                    <div class="radio-holder" >
						<div class="radio-holder" ><input type="radio" name="Bouwkunde" value="Bouwkunde">Bouwkunde</div>
                        <div class="radio-holder" ><input type="radio" name="Chemie" value="Chemie">Chemie</div>
                        <div class="radio-holder" ><input type="radio" name="Civiele Techniek" value="Civiele Techniek">Civiele Techniek</div>                 
                    </div>
                </fieldset>
                <fieldset>
                    <div class="radio-holder" >
                        <div class="radio-holder" ><input type="radio" name="Communicatie" value="Communicatie">Communicatie</div>
						<div class="radio-holder" ><input type="radio" name="Elektrotechniek" value="Elektrotechniek">Elektrotechniek</div>
                        <div class="radio-holder" ><input type="radio" name="Fysiotherapie" value="Fysiotherapie">Fysiotherapie</div>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="radio-holder" >
						<div class="radio-holder" ><input type="radio" name="HBO-Rechten" value="HBO-Rechten">HBO-Rechten</div>
						<div class="radio-holder" ><input type="radio" name="Informatica" value="Informatica">Informatica</div>
						<div class="radio-holder" ><input type="radio" name="Vormgeving" value="Vormgeving">Vormgeving</div>
                    </div>
                </fieldset>
                <div class="radio-holder" >
                    <input type="submit" name="sex" value="Filter" />
                </div>
            </form>
        </div>

<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
		
	
       DEFINE ('DB_USER', 'stdbooks');
       DEFINE ('DB_PASSWORD', 'y5YoiEvE69');
       DEFINE ('DB_HOST', 'localhost');
       DEFINE ('DB_NAME', 'Avans_webshop');

	// Database connection
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	 
	// check connection
	if (mysqli_connect_errno()) {
		printf("<p><b>Fout: verbinding met de database mislukt.</b><br/>\n%s</p>\n", mysqli_connect_error());
		include ('includes/footer.html');
		exit();
	}

	// sql query
	$sql = "SELECT 
        `ISBN_nummer`
	FROM BOEK;"; 
	
	// filter 
	if (isset($_POST['Accountacy'])) {
	$opleiding = $_POST["Accountacy"];
    $sql = "SELECT `boek` . `ISBN_nummer`, `boek` . `src` FROM boek WHERE `boek` . `genre` = '$opleiding';";
	
	} elseif (isset($_POST['Bedrijfskunde'])) {
	$opleiding = $_POST["Bedrijfskunde"];
    $sql = "SELECT `boek` . `ISBN_nummer`, `boek` . `src` FROM boek WHERE `boek` . `genre` = '$opleiding';";
	
	} elseif (isset($_POST['Bestuurskunde'])) {
	$opleiding = $_POST["Bestuurskunde"];
	$sql = "SELECT `boek` . `ISBN_nummer`, `boek` . `src` FROM boek WHERE `boek` . `genre` = '$opleiding';";
	
	} elseif (isset($_POST['Bouwkunde'])) {
	$opleiding = $_POST["Bouwkunde"];
    $sql = "SELECT  `boek` . `ISBN_nummer`, `boek` . `src` FROM boek WHERE `boek` . `genre` = '$opleiding';";
	
	} elseif (isset($_POST['Chemie'])) {
	$opleiding = $_POST["Chemie"];
    $sql = "SELECT `boek` . `ISBN_nummer`, `boek` . `src` FROM boek WHERE `boek` . `genre` = '$opleiding';";
	
	} elseif (isset($_POST['Civiele Techniek'])) {
	$opleiding = $_POST["Civiele Techniek"];
    $sql = "SELECT `boek` . `ISBN_nummer`, `boek` . `src` FROM boek WHERE `boek` . `genre` = '$opleiding';";
	
	} elseif (isset($_POST['Communicatie'])) {
	$opleiding = $_POST["Communicatie"];
    $sql = "SELECT `boek` . `ISBN_nummer`, `boek` . `src` FROM boek WHERE `boek` . `genre` = '$opleiding';";
	
	} elseif (isset($_POST['Elektrotechniek'])) {
	$opleiding = $_POST["Elektrotechniek"];
    $sql = "SELECT `boek` . `ISBN_nummer`, `boek` . `src` FROM boek WHERE `boek` . `genre` = '$opleiding';";
	
	} elseif (isset($_POST['Fysiotherapie'])) {
	$opleiding = $_POST["Fysiotherapie"];
    $sql = "SELECT `boek` . `ISBN_nummer`, `boek` . `src` FROM boek WHERE `boek` . `genre` = '$opleiding';";
	
	} elseif (isset($_POST['HBO-Rechten'])) {
	$opleiding = $_POST["HBO-Rechten"];
    $sql = "SELECT `boek` . `ISBN_nummer`, `boek` . `src` FROM boek WHERE `boek` . `genre` = '$opleiding';";
	
	} elseif (isset($_POST['Informatica'])) {
	$opleiding = $_POST["Informatica"];
    $sql = "SELECT `boek` . `ISBN_nummer`, `boek` . `src` FROM boek WHERE `boek` . `genre` = '$opleiding';";
	
	} elseif (isset($_POST['Vormgeving'])) {
	$opleiding = $_POST["Vormgeving"];
    $sql = "SELECT `boek` . `ISBN_nummer`, `boek` . `src` FROM boek WHERE `boek` . `genre` = '$opleiding';";
	}

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
	echo "<div>";
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
	{
		echo "<!-- ---------------------------------- -->\n";
		echo "<div id=\"product-content\">\n<form action=\"book.php\" method=\"post\">\n";
		echo "<input type=\"hidden\" name=\"ISBN_nummer\" value=\"".$row["ISBN_nummer"]."\" />\n";
		echo '<p3><img id=\'product_image\' value=\"Bestel\" src="showfile.php?image_id='.$row["image_id"].'"></p3>';
		echo "<input type=\"submit\" value=\"Bestel\" name=\"product\" class=\"button\"/>\n";
		echo "</form>\n</div>\n";
	}
	echo "</div>";		
?>
</div>
</section>

</div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="http://stdbooks.nl/assets/js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="http://stdbooks.nl/assets/js/plugins.js"></script>
    <script src="http://stdbooks.nl/assets/js/main.js"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->	
    <script>
        // 	(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        // 	function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        // 	e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        // 	e.src='//www.google-analytics.com/analytics.js';
// 	r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
// 	ga('create','UA-XXXXX-X');ga('send','pageview');
</script>
</body>
</html>