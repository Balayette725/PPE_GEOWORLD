<?php
require_once 'inc/manager-db.php';
$continents = getContinents();
?>

<!doctype html>
<html lang="fr" class="h-100">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <title>Continent : GeoWorld</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="css/custom.css" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">
<header>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="index.php">GeoWorld</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
             aria-expanded="false">Continents</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <?php foreach($continents as $continent) : ?>
              <?php echo"<a class=\"dropdown-item\" href=\"continent.php?continent=$continent->Continent\">$continent->Continent</a>" ?>
            <?php endforeach;?>
          </div>
        </li>
      </ul>

        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Disconnect</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="faq.php">Q&A</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="requete.php">Query</a>
        </li>
        <?php if($_SESSION['role'] == "admin"): ?>
          <li class="nav-item">
            <a class="nav-link" href="update.php">Update</a>
          </li>
        <?php endif;?>
      </ul>
          </div>
  </nav>
</header>
