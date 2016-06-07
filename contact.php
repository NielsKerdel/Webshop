<?php
include('header.php');

?>
   <div class="content-wrapper2 clearfix">
                	<h1>Contact</h1>
						<p class="beer1" style="width: 200px">
						<b>Adres</b><br>
						<i>Lorem ipsum</i><br>
						<i>Ninnesweg 131, 5981PB</i>
						<br>
						<br>
						<b>Contact opnemen</b><br>
						<i>Tel. 077-3078320</i><br>
						<i>info@stdbooks.nl</i>
						</p>
						<div class="map"><script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script><div style="overflow:hidden;height:250px;width:400px;"><div id="gmap_canvas" style="height:210px;width:400px;"></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style><a class="google-map-code" href="http://www.staubsauger-test.biz" id="get-map-data"></a></div><script type="text/javascript"> function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(51.34939660000001,5.9716620000000376),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(51.34939660000001, 5.9716620000000376)});infowindow = new google.maps.InfoWindow({content:"<b>STDBooks</b><br/>Ninnensweg 131<br/>5981PB Lorem Ipsum" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script></div>
                </div>

<?php

include('footer.php');
?>


