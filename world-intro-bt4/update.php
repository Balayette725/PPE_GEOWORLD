<?php
session_start();

if ($_SESSION['role'] != "admin") {
  header ('location: index.php');
}

require_once 'header.php';
require_once 'inc/manager-db.php';



if (isset($_POST['update'])){
    //print_r($_POST);
  updateUser($_POST);
}

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  deleteUser($id);
}

$listeUser = getAllUser($pdo);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <link rel="stylesheet" type="text/css" href="bootstrap.css">
  <meta charset="utf-8" />
</head>

<center>
  <div class="container">
    <table class="table table-hover table-bordered">
      <thead class="thead-dark">
        <th>id</th>
        <th>login</th>
        <th>password</th>
        <th>role</th>
        <th>update</th> 
        <th>delete</th>
      </thead>

      <?php foreach ($listeUser as $leUser): ?> 
        <tr> 

          <td><?php echo $leUser->id ?></td> 
          <td><?php echo $leUser->login ?></td> 
          <td><?php echo $leUser->password ?></td>
          <td><?php echo $leUser->role ?></td>
          <td><a href="updateChange.php?id=<?php echo $leUser->id ?>&login=<?php echo $leUser->login ?>">update</a></td> 
          <td><a href="update.php?delete=<?php echo $leUser->id ?>" onClick="return(confirm('Are you sure you want to delete <?php echo $leUser->Login ?> ?'));">delete</a></td>    
        </tr>
      <?php endforeach ; ?>

    </table>
  </div>
</center>

