<?php  
session_start();

if (empty($_SESSION['login']) && empty($_SESSION['role'])){
	header ('location: connexion.php');


}

require_once 'header.php';
require_once 'inc/manager-db.php';


?>

<html lang="fr" class="h-100">
<head>
	<link href="css/custom.css" rel="stylesheet">
	<link href="assets/bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet">
	<meta charset="utf-8">
</head>

<h3 align="center">Select a query to try it out</h3>
<div class="container">
	<div  class="row justify-content-center align-items-center">
		<div id="login-column" class="col-md-6">
			<div id="login-box" class="col-md-12">
				<form id="login-form" class="form" method="get" action="query.php">
					<div class="form-group">
						<select class="form-control form-control-lg" name="select" id="select">
							<option value="SELECT * FROM country">SELECT * FROM country</option>
							<option value=" Name FROM country">SELECT Name FROM country</option>
						</select><br>
						<button id="try" type="submit" class="btn btn-secondary">TRY</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>