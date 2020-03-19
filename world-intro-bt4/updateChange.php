<?php
session_start();
require_once 'header.php';
require_once 'inc/manager-db.php';

if (empty($_SESSION['login']) && empty($_SESSION['role'])){
  header ('location: connexion.php');
}

if ($_SESSION['role'] != "admin") {
  header ('location: index.php');
}

$id = $_GET['id'];
$listeUser = getMember($id);



?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<link href="css/custom.css" rel="stylesheet">
	<link href="assets/bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet">
  <meta charset="utf-8" />
</head>

<body>

	<h3 align="center">Enter the changement for the user named : <?= $_GET['login'] ?></h3>
  <div class="container">
    <div  class="row justify-content-center align-items-center">
      <div id="login-column" class="col-md-6">
        <div id="login-box" class="col-md-12">
          <form id="login-form" class="form" method="post" action="update.php">
            <div class="form-group">
             <input type="hidden" name="id" value="<?php echo  $listeUser->id ?> "><br>
             <h3>Login</h3>
             <input class="form-control" type="text" name="Login" value="<?php echo $listeUser->Login  ?> "><br>
           </div>
           <div class="form-group">
            <h3>Password</h3>
            <input class="form-control" type="text" id="password" name="password" value="<?php echo $listeUser->password ?> "><br>
          </div>
          <div class="form-group">
           <h3>Role</h3>
           <div class="form-check">
            <input class="form-check-input" type="radio" name="role" id="exampleRadios1" value="user" checked>
            <label class="form-check-label" for="exampleRadios1">
              User
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="role" id="exampleRadios2" value="admin">
            <label class="form-check-label" for="exampleRadios2">
              Admin
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="role" id="exampleRadios2" value="teacher">
            <label class="form-check-label" for="exampleRadios2">
              Teacher
            </label>
          </div>
        </div>
        <button name="update" type="submit" class="btn btn-secondary">Update</button>
      </form>
      
    </div>
  </div>
</div>
</div>


</body>