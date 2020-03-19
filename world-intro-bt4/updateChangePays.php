<?php
session_start();
require_once 'header.php';
require_once 'inc/manager-db.php';

if (empty($_SESSION['login']) && empty($_SESSION['role'])){
  header ('location: connexion.php');
}

if ($_SESSION['role'] != "teacher") {
  header ('location: index.php');
}

$id = $_GET['id'];
$listeVille = getPaysbyID($id);



?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<link href="css/custom.css" rel="stylesheet">
	<link href="assets/bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet">
  <meta charset="utf-8" />
</head>

<body>

	<h3 align="center">Enter changement for <?= $_GET['pays'] ?></h3>
  <div class="container">
    <div  class="row justify-content-center align-items-center">
      <div id="login-column" class="col-md-6">
        <div id="login-box" class="col-md-12">
          <form id="login-form" class="form" method="post" action="continent.php?continent=<?php echo $listeVille->Continent ?>">
            <div class="form-group">
             <input type="hidden" name="id" value="<?php echo  $listeVille->id ?> "><br>
             
             <h3>Name</h3>
             <input class="form-control" type="text" name="Name" value="<?php echo $listeVille->Name  ?> "><br>
           </div>
           <div class="form-group">
            <h3>Region</h3>
            <input class="form-control" type="text" id="Region" name="Region" value="<?php echo $listeVille->Region ?> "><br>
          </div>
          <div class="form-group">
           <h3>Population</h3>
           <input class="form-control" type="text" id="Population" name="Population" value="<?php echo $listeVille->Population ?> "><br>
          </div>
        </div>
        <button name="update" type="submit" class="btn btn-secondary">Update</button>
      </form>
    </div>
  </div>
</div>
</div>


</body>