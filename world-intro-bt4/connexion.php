<?php
require_once 'inc/manager-db.php';

if(isset($_POST['register'])){
  register($_POST);
}

if (isset($_GET['message'])) {
  $message = $_GET['message'];
}

?>

<!DOCTYPE html>
<html>
<head>
  <link href="css/custom.css" rel="stylesheet">
  <link href="assets/bootstrap-4.4.1-dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="assets/bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <meta charset="UTF-8">
  <title>session</title>
</head>
<header><h1 class="round1" align="center">GEOWORLD</h1></header>
<?php if(isset($_POST['register'])): ?>
  <p align="center">You are successfully registered now you can log in !</p>
<?php endif;?>
<body>
  <div class="container">
    <div  class="row justify-content-center align-items-center ">
      <div id="login-column" class="col-md-6">
        <div id="login-box" class="col-md-12">
          <?php if(isset($_GET['message'])): ?>
            <p align="center" style="color: red"><?= $message; ?></p>
          <?php endif;?>
          <form id="login-form" class="needs-validation" method="post" action="login.php" novalidate>

            <div class="form-group">
              <h3>Login</h3>
              <input name="login" class="form-control"  placeholder="Enter login" required>
              <div class="invalid-feedback">
                Please fill the area
              </div>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
            <div class="form-group">
              <h3>Password</h3>
              <input name="password" type="password" class="form-control" placeholder="Password" required>
              <div class="invalid-feedback">
                Please fill the area
              </div>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>

            <button name="submit" type="submit" class="btn btn-secondary">Login</button>
            <a href="register.php">or create an accout</a>
          </form>

        </div>
      </div>
    </div>
  </div>


  
  <script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

</body>

</html>
