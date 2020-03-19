<?php  
session_start();

if (empty($_SESSION['login']) && empty($_SESSION['role'])){
	header ('location: connexion.php');


}

require_once 'header.php';
require_once 'inc/manager-db.php';
$select = htmlspecialchars($_GET['select']);
$custom = customQuery($_GET['select']);
var_dump($custom);
?>

<html lang="fr" class="h-100">
<head>
	<link href="css/custom.css" rel="stylesheet">
	<link href="assets/bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet">
	<meta charset="utf-8">
</head>
