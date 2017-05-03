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
    $json = file_get_contents('https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_month.geojson');
    $json_data = json_decode($json,true);
    ?>
    <hr>
    <p>En los últimos 30 días se han registrado <?php echo $all = count($json_data['features']);?> movimiento telúricos alrededor del mundo; Chile es una pequeña parte del mundo:</p>
    <ol>
    <?php $cl = 0; $costacentral = 0;?>
    <?php for ($n = 0; $n < $all; $n++) {?>
    <?php if (substr_count($json_data['features'][$n]['properties']['place'],'Chile') > 0){?>
    <?php $cl++ ;?>
    <li <?php if ($json_data['features'][$n]['properties']['mag'] >= 6){?> style="color:RGB(224, 21, 36);" <?php } elseif($json_data['features'][$n]['properties']['mag'] >= 5){ ?> style="color:RGB(149, 83, 84);" <?php }else{ ?> style="color:RGB(100, 100, 100);" <?php };?>>
    <?php if (substr_count($json_data['features'][$n]['properties']['place'],'Valparaiso') > 0 || substr_count($json_data['features'][$n]['properties']['place'],'Cartagena') > 0) { $costacentral++; };?>
    <?php date_default_timezone_set("America/Santiago"); $date_local = date("d-m-Y H:m:s",$json_data['features'][$n]['properties']['time']/1000);?>
    <?php echo ($date_local.' hora local');?> &bull; M <?php echo ($json_data['features'][$n]['properties']['mag']);?> &bull; <?php $solociudad = substr($json_data['features'][$n]['properties']['place'], strpos($json_data['features'][$n]['properties']['place'], "f") + 1); echo $solociudad;?> &bull; <a href="earthquake-details.php?url=<?php echo ($json_data['features'][$n]['properties']['detail']);?>">Más detalles</a>.
    </li>
    <?php } ;?>
    <?php } ;?>
    </ol>
    <hr>
    <h4>Vamos a calmarnos:</h4>
    <p>En el último mes, el <a href="https://earthquake.usgs.gov/" target="_blank" rel="nofollow">Eartquake Hazards Program</a> de la <a href="https://www.usgs.gov/" target="_blank" rel="nofollow">USGS</a> ha registrado:</p>
<ul>
    <li><?php echo $all;?> movimiento telúricos alrededor del mundo.</li>
    <li><?php echo $cl;?> de estos movimientos se han registrado en Chile.</li>
    <li><?php echo $costacentral;?> de los <?php echo $cl?> se han concentrado en las cercanías de la costa de la quinta región.</li>
</ul>
    <p>Dicho de otro modo, cerca de la costa de la quinta región se ha concentrado el <?php echo round(($costacentral*100/$all),2)?>% de los movimientos telúricos del mundo en el últimos mes.</p>
  </section>
  <aside>
    <div class="alert alert-danger">
    <p>Para asegurarse de comprender adecuadamente lo que aquí se presenta, se recomienda modificar este <code>earthquakes.php</code>:</p>
    <ul>
    <li>agregando variables de estilo condicionadas a las distintas magnitudes registradas (4.5, <strong>5</strong>, 5.5, <strong>6</strong>, 6.5); y</li>
    <li>descartando del listado a los temblores de magnitud menor a 4.0, sin afectar el conteo de todos los temblores ocurridos en Chile.</li>
    </ul>
    </div>
  </aside>
</div>
<?php include('footer.php');?>
