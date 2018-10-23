<?php 
/* Main page with two forms: sign up and log in */
require '../../connection.php';
session_name("session3");
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);

if ($_SESSION['adminonline'] == 1){
	header("location: ../../index.php");
}
else{
	$_SESSION['adminonline'] = 0;
}
?>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['login'])) { //user logging in

        require 'login.php';
        
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>CoffeeTime Login / Register</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="CoffeeTime" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="CoffeeTime" />


  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../panel/bootstrap/css/bootstrap14.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../panel/dist/css/AdminLTE6.min.css">


</head>


<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index.php"><b>Coffee</b>Time</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to Admin Panel</p>

    <form action="index.php" method="post" autocomplete="off">
      <div class="form-group has-feedback">
        <input required type="email" autocomplete="on" class="form-control" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input required type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- ELSE -</p>
      <a href="../../" class="btn btn_homepage"><i class="fa fa-home"></i> Back to Homepage</a>

    </div>
    <!-- /.social-auth-links -->

    <center><a href="forgot.php">I forgot my password</a><br></center>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- Bootstrap 3.3.6 -->
<script src="../panel/bootstrap/js/bootstrap.min.js"></script>


</body>
</html>
