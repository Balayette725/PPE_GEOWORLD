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

$idC = $_GET['idC'];
$country = getPaysById($idC);


?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<link href="css/custom.css" rel="stylesheet">
	<link href="assets/bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet">
  <meta charset="utf-8" />
</head>

<body>
  <h3 align="center">Enter changement for <?= $_GET['language'] ?></h3>
    <div class="container">
      <div  class="row justify-content-center align-items-center">
        <div id="login-column" class="col-md-6">
          <div id="login-box" class="col-md-12">
            <form id="login-form" class="form" method="post" action="Pays.php?pays=<?php echo $country->Name ?>&id=<?= $country->id ?>&capitale=<?= $country->Capital ?>&flag=<?= $country->Code2 ?>">
              <div class="form-group">
               <input type="hidden" name="id" value="<?php echo  $_GET['id'] ?> "><br>
               
               <h3>Name</h3>
               <input  class="form-control" type="text" name="Name" value="<?php echo $_GET['language']?>"><br>
             </div>
             <div class="form-group">
              <h3>Percentage</h3>
              <input class="form-control" type="text" id="Percentage" name="Percentage" value="<?php echo $_GET['percentage'] ?>"><br>
            </div>
          </div>
          <button name="updateL" type="submit" class="btn btn-secondary">Update</button>
        </form>
      </div>
    </div>
  </div>
</body>