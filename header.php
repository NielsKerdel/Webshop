<?php
include ('includes/sessions.php');
$domain = getenv('HTTP_HOST');
$hostname = "http://".$domain;

//var_dump($_SESSION);

/**
 * Created by PhpStorm.
 * User: RuudVanOijen
 * Date: 20-01-15
 * Time: 16:22
 */
// Zet het niveau van foutmeldingen zo dat warnings niet getoond worden.
//error_reporting(E_ERROR | E_PARSE);
error_reporting(E_ALL); ini_set('display_errors', 'On');

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>STD Books.nl</title>
        <meta name="description" content="Schoolboeken Avans PDF">
		<meta name="robots" content="PDF, Schoolboeken, Avans, StdBooks, PDF boeken, boeken, Gratis schoolboeken, Gratis PDF, Avans boeken, boekenlijst Avans, Schoolboeken Avans, 
				Avans PDF, PDF Avans, Avans Hogeschool, Avans boekenlijst, boekenlijst, Gratis PDF, PDF schoolboeken, Gratis PDF schoolboeken, online boeken,
						online PDF, Avans online, Online boeken bestellen" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

        <link rel="stylesheet" href="<?php echo $hostname ?>/assets/css/normalize.css">
        <link rel="stylesheet" href="<?php echo $hostname ?>/assets/css/main.css">
        <script src="<?php echo $hostname ?>/assets/js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
<body>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

    <!-- Add your site or application content here -->
<div class="site-wrapper">
<header>
<?php

?>
    <div class="navigation-wrapper">
        <div class="topbar-nav">
            <a href="/" title="home"><h2 class="logo-title"><b>STD</b> Books</h2></a>
            <nav class="top-nav-holder">
                <ul class="top-nav">
                    <li><a href="<?php echo $hostname ?>/login.php" title="">Inlog</a></li>
                    <li><a href="<?php echo $hostname ?>/contact.php" title="">Contact</a></li>
                </ul>
            </nav>
        </div>
        <div class="head-nav-wrapper">
            <nav class="head-nav-holder">
                <ul class="head-nav">
                    <li><a href="/" title="" class="active">Home</a></li>
                    <li><a href="<?php echo $hostname ?>/overons.php" title="">Over ons</a></li>
                    <li><a href="<?php echo $hostname ?>/product.php" title="">Product</a></li>
                </ul>
            </nav>
<?php

?>
            <form action="<?php echo $hostname ?>/search.php" method="POST" class="search-nav">
                <input type="text" placeholder="Zoeken" name="search" class="search"/>
                <button type="submit" name="submit" class="search-btn"><span class="fa fa-search"></span></button>
            </form>
        </div>
    </div>
</header>
<section class="content-wrapper">
<?php

if(isset($_SESSION['message']) || isset($_SESSION['file'])) {
    echo "<h1>".$_SESSION['file']."</h1>";
    echo "<h1>".$_SESSION['message']."</h1>";
}