<?php 
/* Reset your password form, sends reset.php password link */
require '../../connection.php';
session_name("session3");
session_start();

// Check if form submitted with method="post"
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) 
{   
    $email = $connect->escape_string($_POST['email']);
    $result = $connect->query("SELECT * FROM admins WHERE `E-mail` ='$email'");

    if ( $result->num_rows == 0 ) // User doesn't exist
    { 
        $_SESSION['message'] = "Admin with that email doesn't exist!";
        header("location: error.php");
    }
    else { // User exists (num_rows != 0)

        $admin = $result->fetch_assoc(); // $user becomes array with user data
        
        $email = $admin['E-mail'];
        $hash = $admin['Hash'];
        $name = $admin['FirstName'];
		$username = $admin['UserName'];
		$domain = $_SERVER['SERVER_NAME'];

        // Session message to display on success.php
        $_SESSION['message'] = "<p>Please check your email <span>$email</span>"
        . " for a confirmation link to complete your password reset!</p>";

        // Send registration confirmation link (reset.php)
        $to      = $email;
        $subject = 'Password Reset Link ( clevertechie.com )';
        $message_body = '
        Hello '.$username.',

        You have requested password reset!

        Please click this link to reset your password:

        http://'.$domain.'/admin/login/reset.php?email='.$email.'&hash='.$hash;

        mail($to, $subject, $message_body);

        header("location: success.php");
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Reset Your Password</title>
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

  <div class="form">

    <h1>Reset Your Password</h1>

    <form action="forgot.php" method="post">
     <div class="form-group has-feedback">
        <input required type="email" class="form-control" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
    <button class="btn btn-primary btn-block btn-flat"/>Reset</button>
    </form>
  </div>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- Bootstrap 3.3.6 -->
<script src="../panel/bootstrap/js/bootstrap.min.js"></script>


</body>
		

  

</html>
