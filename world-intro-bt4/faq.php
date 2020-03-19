<?php  
session_start();

if (empty($_SESSION['login']) && empty($_SESSION['role'])){
	header ('location: connexion.php');


}

require_once 'header.php';
require_once 'inc/manager-db.php';


?>

<!doctype html>
<html lang="fr" class="h-100">
<head>
	<link href="css/custom.css" rel="stylesheet">
	<link href="assets/bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet">
	<meta charset="utf-8">
</head>

<body>

	<center><h1>This is a Q&A page where you can ask to your teachers some question about the World</h1></center><br>

	<div class="container">
		<form>
			<div class="form-group">
				<label for="exampleFormControlTextarea1">Question : </label>
				<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea><br>
				<input type="submit" name="submit" class="btn btn-secondary" value="Send">
			</div>
		</form>
	</div>
</body>