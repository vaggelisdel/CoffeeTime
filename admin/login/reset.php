<?php
/* The password reset form, the link to this page is included
   from the forgot.php email message
*/
require '../../connection.php';
session_name("session3");
session_start();

// Make sure email and hash variables aren't empty
if( isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']) )
{
    $email = $connect->escape_string($_GET['email']); 
    $hash = $connect->escape_string($_GET['hash']); 

    // Make sure user email with matching hash exist
    $result = $connect->query("SELECT * FROM admins WHERE `E-mail`='$email' AND `Hash`='$hash'");

    if ( $result->num_rows == 0 )
    { 
        $_SESSION['message'] = "You have entered invalid URL for password reset!";
        header("location: error.php");
    }
}
else {
    $_SESSION['message'] = "Sorry, verification failed, try again!";
    header("location: error.php");  
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
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

          <h1>Choose Your New Password</h1>
          
          <form action="reset_password.php" method="post">
              
          <div class="field-wrap">
            <input type="password"required name="newpassword" autocomplete="off" placeholder="New Password  *"/>
          </div>
              
          <div class="field-wrap">
            <input type="password"required name="confirmpassword" autocomplete="off" placeholder="Confirm New Password  *"/>
          </div>
          
          <!-- This input field is needed, to get the email of the user -->
          <input type="hidden" name="email" value="<?= $email ?>">    
          <input type="hidden" name="hash" value="<?= $hash ?>">    
              
          <button class="btn btn-primary btn-block btn-flat"/>Apply</button>
          
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
