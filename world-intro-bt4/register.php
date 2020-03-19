<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
 <link href="css/custom.css" rel="stylesheet">
 <link href="assets/bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet">
 <title>register</title>
</head>
<?php 
if(isset($_GET['message'])){
	$message =$_GET['message'];
  echo $message;
}

?>
<body>
  <h3 align="center">GEOWORLD Registration</h3>
  <div class="container">
    <div  class="row justify-content-center align-items-center">
      <div id="login-column" class="col-md-6">
        <div id="login-box" class="col-md-12">
          <form id="login-form" class="form" method="post" action="connexion.php?register">
            <div class="form-group">
              <h3>Login</h3>
              <input class="form-control" type="text" name="Login"  placeholder="enter your login"><br>
            </div>
            <div class="form-group">
              <h3>Password</h3>
              <input class="form-control" type="password" id="password" name="password" placeholder="enter your password" ><br>
            </div>
            <input type="hidden" name="role" value="user">
            <button name="register" value="register"type="submit" class="btn btn-secondary">REGISTER</button>
          </form>
          
        </div>
      </div>
    </div>
  </div>
</body>
</html>