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
    $result = $connect->query("SELECT * FROM users WHERE `E-mail`='$email' AND `Hash`='$hash'");

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


  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	  <?php include '../codefiles/css/css_login.html'; ?>
</head>

<body>
<div id="fh5co-wrapper">
		<div id="fh5co-page">

		<header id="fh5co-header-section" class="sticky-banner">
			
			<div class="container">
				<div class="nav-header">
					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
					<center><h1 id="fh5co-logo"><a href="../../index.php"><img src="../../images/coffeetime_logo.png"  style="width:195px;height:80px; margin-right: 6px;"></a></h1></center>
					<!-- START #fh5co-menu-wrap -->
					<nav id="fh5co-menu-wrap" role="navigation">
						<ul class="sf-menu" id="fh5co-primary-menu">
							<li><a href="../../index.php">Home</a></li>
							<li>
								<a href="vacation.html" class="fh5co-sub-ddown">Vacations</a>
								<ul class="fh5co-sub-menu">
									<li><a href="#">Family</a></li>
									<li><a href="#">CSS3 &amp; HTML5</a></li>
									<li><a href="#">Angular JS</a></li>
									<li><a href="#">Node JS</a></li>
									<li><a href="#">Django &amp; Python</a></li>
								</ul>
							</li>
							
							<li><a href="contact.html">Contact</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</header>
		
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
              
          <button class="button button-block"/>Apply</button>
          
          </form>

    </div>
	
	</div>
	</div>
	
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
 <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script type="text/javascript" src="../codefiles/../codefiles/js/jquery-2.1.4.min.js"></script>
	<script src="../codefiles/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="../codefiles/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="../codefiles/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="../codefiles/js/jquery.waypoints.min.js"></script>
	<script src="../codefiles/js/sticky.js"></script>

	<!-- Stellar -->
	<script src="../codefiles/js/jquery.stellar.min.js"></script>
	<!-- Superfish -->
	<script src="../codefiles/js/hoverIntent.js"></script>
	<script src="../codefiles/js/superfish.js"></script>
	<!-- Magnific Popup -->
	<script src="../codefiles/js/jquery.magnific-popup.min.js"></script>
	<script src="../codefiles/js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="../codefiles/js/bootstrap-datepicker.min.js"></script>
	<!-- CS Select -->
	<script src="../codefiles/js/classie.js"></script>
	<script src="../codefiles/js/selectFx.js"></script>
	
	<!-- Main JS -->
	<script src="../codefiles/js/main.js"></script>
	<script src="../codefiles/js/dropdownmenu2.js"></script>
	<script src="../codefiles/js/dropdownmenu3.js"></script>
    <script src="../codefiles/js/index.js"></script>

</body>
</html>
