<?php include('header.php');?>
<div class="container">
  <div class="col-sm-12 col-lg-10 col-lg-offset-1">
  <header>
  <h1>IMDb<br><small>Una lista increíblemente mala de peliculas, ni siquiera las vi todas</small></h1>
  <h1><small>Lo lamento</small></h1>
  <p>Fuente: <a href="http://www.imdb.com/search/title?year=2016,2016&title_type=feature&sort=num_votes,desc" target="_blank" rel="nofollow">http://www.imdb.com/search/title?year=2016,2016&title_type=feature&sort=num_votes,desc</a></p>
  </header>
</div>
<div class="col-sm-12 col-lg-10 col-lg-offset-1">
  <section>
    <?php
    // basta con la línea de PHP para llamar al imdb-movies.csv y asignarlo a la variable $csv
    $csv = array_map('str_getcsv', file('data/imdb-movies.csv'));
    // pero debo hacer un pequeño ajuste, para eliminar del arreglo el encabezado del imdb-movies.csv
    array_walk($csv, function(&$a) use ($csv) {$a = array_combine($csv[0], $a);});
    array_shift($csv);
    // ahora puedo crear un bucle "for(){}" que examine lo asignado como contenido a la variable $csv
    // lo que esté contenido en la variable se repetirá tantas veces como arreglos tenga la variable $csv
    for($a = 0; $a < $total = count($csv); $a++){?>
      <article class="row">
        <hr>
        <div class="col-xs-5 col-sm-3 col-md-2"><img src="<?php echo $csv[$a]['Imagen'];?>" class="img-responsive"></div>
        <div class="col-xs-7 col-sm-9 col-md-10">
          <h3><?php echo($a+1);?>. <?php echo $csv[$a]['Nombre'];?></h3>
          <h5>Dirigida por <?php echo $csv[$a]['Director'];?> </h5>
          <h6><?php echo $csv[$a]['Data'];?></h6>
          <p><?php echo $csv[$a]['Storyline'];?></p>
          <h6><?php echo $csv[$a]['Visto'];?></h6>
        </div>
      </article>
    <?php };?>
  </section>
  <aside>
    <div class="alert alert-danger">
    <p>Para asegurarse de comprender adecuadamente lo que aquí se presenta, se recomienda:</p>
    <ul>
    <li>modificar este <code>index.php</code> agrando, entre el <code>Director</code> y el  <code>Storyline</code>, un título de sexto nivel con la información en <code>Data</code>; y</li>
    <li>revisar la fuente, para copiar y pegar la información que sea necesaria para llegar a las 15 películas del 2016 más votadas en <code>data/imdb-movies.csv</code></li>
    </ul>
    </div>
    <p>Para que tengan una referencia, de esta manera es que PHP está "re-escribiendo" la información contenida en <code>data/imdb-movies.csv</code>:</p>
    <pre><code><?php print_r($csv);?></code></pre>
  </aside>
</div>
<?php include('footer.php');?>
