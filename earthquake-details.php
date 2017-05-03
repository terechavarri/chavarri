<?php include('header.php');?>
<div class="container">
  <div class="col-sm-12 col-lg-10 col-lg-offset-1">
  <header>
  <h1>All Earthquakes<br><small>Temblores registrados alrededor del mundo</small></h1>
  <p>Fuente: <a href="https://earthquake.usgs.gov/earthquakes/feed/v1.0/geojson.php" target="_blank" rel="nofollow">https://earthquake.usgs.gov/earthquakes/feed/v1.0/geojson.php</a></p>
  <p>La fuente se actualiza cada 15 minutos.</p>
  </header>
</div>
<div class="col-sm-12 col-lg-10 col-lg-offset-1">
<section>
<?php
$la_url = $_GET['url'];
$json = file_get_contents($la_url);
$json_data = json_decode($json,true);
?>
<hr>

<p>El recuadro que continúa nos muestra toda la información que me entrega un nuevo JSON, que se encuentra en <code>$la_url</code> que obtengo después de hacer clic en cualquier vínculo de la página <code>earthquake.php</code></p>
<pre><code><?php print_r($json_data)?></code></pre>
<h3>¿Y ahora qué?</h3>
<p>Podemos fijarnos en <code>mag</code> dentro de <code>properties</code>, para obtener la magnitud:</p>
<pre><code><?php echo $la_magnitud = ($json_data['properties']['mag']);?></code></pre>
<p>Podemos fijarnos en <code>place</code> dentro de <code>properties</code>, para obtener el lugar:</p>
<pre><code><?php echo $el_place = ($json_data['properties']['place']);?></code></pre>
<p>Podemos fijarnos en <code>title</code> dentro de <code>properties</code>, para obtener una "concatenación" de magnitud y lugar:</p>
<pre><code><?php echo $el_title = ($json_data['properties']['title']);?></code></pre>
<p>Y si queremos ser más precisos, podemos fijarnos en la <code>geometry</code>, para obtener:</p>
<pre><code><?php print_r($json_data['geometry']);?></code></pre>
<p>Luego podríamos decir que:</p>
<blockquote>
Con epicentro en las coordenadas de <strong>latitud <?php echo $latitud = $json_data['geometry']['coordinates'][1];?></strong> y <strong>longitud <?php echo $longitud = $json_data['geometry']['coordinates'][0];?></strong>, el movimiento telúrico a <strong><?php echo $el_place;?></strong>, tuvo una <strong>magnitud de <?php echo $la_magnitud;?></strong>.
</blockquote>

<p>Pero lo dicho queda más claro si lo vemos en un mapa:</p>

<div id="mapid"></div>
<script>
	var mymap = L.map('mapid').setView([<?php echo $latitud;?>, <?php echo $longitud;?>], 9);
	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 11,
		id: 'mapbox.streets'
	}).addTo(mymap);
	L.circle([<?php echo $latitud;?>, <?php echo $longitud;?>], {
	color: 'red',
	fillColor: '#f03',
	fillOpacity: 0.5,
	radius: 500*<?php echo $la_magnitud;?>
}).addTo(mymap).bindPopup("<?php echo $el_title;?>");
</script>

</section>
<aside>
<div class="alert alert-danger">
<p>Para asegurarse de comprender adecuadamente lo que aquí se presenta, se recomienda modificar este <code>earthquake-details.php</code>. En la modificación:</p>
<ul>
  <li>intenta hacer algunos cambios en la información desplegada tanto en la frase como en el mapa; y</li>
  <li>elimina el recuadro que muestra el contenido en la variable <code>$json_data</code>, contenido que es tomado del JSON en <code>$la_url</code>.</li>
</ul>
</div>
</aside>
</div>
<?php include('footer.php');?>
