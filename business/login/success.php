<?php
/* Displays all successful messages */
session_name("session3");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Success</title>
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
    <h1><?= 'Success'; ?></h1>
    <p>
    <?php 
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ):
        echo $_SESSION['message']; 
		$_SESSION['message'] = "";
    else:
        header( "location: ../panel/index.php" );
    endif;
    ?>
    </p>
    <a href="index.php"><button class="btn btn-primary btn-block btn-flat"/>Login</button></a>
</div>
	
	</div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- Bootstrap 3.3.6 -->
<script src="../panel/bootstrap/js/bootstrap.min.js"></script>


</body>
</html>
