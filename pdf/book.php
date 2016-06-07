<?php
include ('../includes/localhost_connection.php');

$domain = getenv('HTTP_HOST');
$hostname = "http://".$domain;

if(filter_has_var(INPUT_GET, "isbn-nummer") !== false && filter_input(INPUT_GET, 'isbn-nummer', FILTER_VALIDATE_INT) !== false)
{
/*** assign the image id ***/
$post_id = filter_input(INPUT_GET, "isbn-nummer", FILTER_SANITIZE_NUMBER_INT);

$sql = "SELECT * FROM `BOEK` WHERE ISBN_nummer = ".$post_id."";

// Voer de query uit en sla het resultaat op
$result = mysqli_query($conn, $sql);
foreach ($result as $key){
    $titel = $key['titel'];
    $src = $key['src'];
}
echo '<html>
          <head>
             <title>'.$titel.'</title>
             <script type="text/javascript" src="'.$hostname.'/assets/js/pdfobject.js"></script>
             <script type="text/javascript">
              window.onload = function (){

                  var myParams = {
                      url: "'.$hostname.'/pdf/'.$src.'",
                      pdfOpenParams: {
                       navpanes: 0,
                        toolbar: 0,
                        statusbar: 0,
                        view: "FitV"
                      }
                    };

                    var myPDF = new PDFObject(myParams);  //returns reference to JavaScript object

                    myPDF.embed();

              };
            </script>
          </head>
          <body>
          '.$src.'
           <!--<p>It appears you don\'t have Adobe Reader or PDF support in this web
            browser.</p> -->
          </body>
        </html>';

}else{
//    echo  "This files does not exist on this server";
    header("Location: 404.php");
}
?>