<?php include('header.php');?>
<div class="container">
  <div class="col-sm-12 col-lg-10 col-lg-offset-1">
  <header>
  <h1>Smart Citizen Kit<br><small>Sensores ciudadanos</small></h1>
  <p><strong>El Smart Citizen Kit es una placa</strong> electrónica basada en Arduino que está <strong>equipada con sensores de calidad de aire, temperatura, sonido, humedad e iluminación</strong>. Esta placa electrónica contiene un cargador solar que permite conectarla paneles fotovoltaicos para poder instalarla en cualquier lugar. La placa viene equipada con una antena WiFi que permite subir los datos de los sensores en tiempo real a plataformas online.</p>
  <p>En lo que sigue consultaremos datos subidos recientemente por algunos Smart Citizen Kit.</p>
  <img src="https://docs.smartcitizen.me/img/case_6.jpg" class="img-responsive">
  <p>Fuente: <a href="http://developer.smartcitizen.me/#devices">http://developer.smartcitizen.me/#devices</a></p>
  </header>
</div>
<div class="col-sm-12 col-lg-10 col-lg-offset-1">
  <section>
    <?php
    $json = file_get_contents('https://api.smartcitizen.me/v0/devices/world_map');
    $json_data = json_decode($json,true);
    ?>
    <hr>
    <p>Lo que ahora nos interesa saber es: cuántos de los <?php echo $all = count($json_data);?> Smart Citizen Kit repartidos por el mundo han subido datos en lo que va del día</p>
    <p>Hagamos un listado, con un bucle <code>for</code> y una condición <code>if</code></p>
    <ol>
    <?php $actualizados = 0;?>
    <?php for ($n = 0; $n < $all; $n++) {?>
        <?php if (substr_count($json_data[$n]['data'][''],'2017-05') > 0){?>
          <li<?php if($json_data[$n]['country_code']=='CL'){?> style="font-weight:bold";<?php };?>>El Smart Citizen Kit <?php echo($json_data[$n]['id']);?> está <?php echo('subiendo datos desde '.$json_data[$n]['city'].' ('.$json_data[$n]['country_code'].')');?>:
            <a href="https://www.google.cl/maps/place/<?php echo($json_data[$n]['latitude'].','.$json_data[$n]['longitude']);?>" rel="nofollow"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Ubicación</a>,
            <a href="smartcitizen-details.php?url=https://api.smartcitizen.me/v0/devices/<?php echo($json_data[$n]['id']);?>.json"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Ver detalles</a></li>
          <?php $actualizados++;?>
        <?php } ;?>
    <?php } ;?>
  </ol>
    <p>De los <?php echo $all;?> Smart Citizen Kit, sólamente <?php echo $porcentanje = round(($actualizados*100)/$all,2);?>% han subido datos recientemente.</p>
  </section>
  <aside>
    <div class="alert alert-danger">
    <p>Para asegurarse de comprender adecuadamente lo que aquí se presenta, se recomienda modificar el <code>smartcitizen.php</code> para:</p>
    <ul>
    <li>excluir de la lista a todos los SCK instalados en España (<strong>ES</strong>)</li>
    <li>crear una nueva lista, que solamente muestren los SCK instalados en España (<strong>ES</strong>)</li>
    <li>no alterar el conteo del número total de SCK que han aportado datos recientemente.</li>
    </ul>
    </div>
  </aside>
</div>
<?php include('footer.php');?>
