<?php
$json = file_get_contents('https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_month.geojson');
$json_data = json_decode($json,true);
?>


<?php
$date_utc = date("d-m-Y H:m:s",$json_data['features'][0]['properties']['time']/1000);
date_default_timezone_set("America/Santiago");
$date_local = date("H:m:s",$json_data['features'][0]['properties']['time']/1000);
echo ($date_utc .' UTC ('.$date_local.' hora local)');
?>
