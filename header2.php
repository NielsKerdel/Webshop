<?php
include ('includes/sessions.php');
$domain = getenv('HTTP_HOST');
$hostname = "http://".$domain;

var_dump($_SESSION);

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
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

        <link rel="stylesheet" href="<?php echo $hostname.'/assets/css/normalize.css'; ?>">
        <link rel="stylesheet" href="<?php echo $hostname.'/assets/css/main.css'; ?>">
        <script src="<?php echo $hostname.'/assets/js/vendor/modernizr-2.6.2.min.js'; ?>"></script>
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

    </div>
</header>
<section class="content-wrapper">
<?php
if(isset($_SESSION['Username'])) {
    echo $_SESSION['Username'];
    unset($_SESSION['Username']);
}

if(isset($_SESSION['Specificatie'])) {
    echo $_SESSION['Specificatie'];
    unset($_SESSION['Specificatie']);
}
if(isset($_SESSION['message']) || isset($_SESSION['file'])) {
    echo "<h1>".$_SESSION['file']."</h1>";
    echo "<h1>".$_SESSION['message']."</h1>";
}