<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $site_title = "PHP: Hypertext Preprocessor";?></title>
<meta name="robots" content="noindex">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
<?php if((basename($_SERVER['PHP_SELF']))=='earthquake-details.php'){?>
<link rel="stylesheet" href="css/leaflet.css" />
<script src="js/leaflet.js"></script>
<?php };?>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.php"><?php echo $site_title;?></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right">
    <li<?php if((basename($_SERVER['PHP_SELF']))=='index.php'){?> class="active" <?php };?>><a href="index.php">Portada</a></li>
    <li<?php if((basename($_SERVER['PHP_SELF']))=='earthquakes.php'){?> class="active" <?php };?>><a href="earthquakes.php">All Earthquakes</a></li>
    <li<?php if((basename($_SERVER['PHP_SELF']))=='smartcitizen.php'){?> class="active" <?php };?>><a href="smartcitizen.php">Smart Citizen Kit</a></li>
    </ul>
    </div>
  </div>
</nav>
