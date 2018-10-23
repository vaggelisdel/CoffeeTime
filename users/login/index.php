<?php 
/* Main page with two forms: sign up and log in */
require '../../connection.php';
session_name("session3");
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);

if ($_SESSION['onlinee'] == 1){
	header("location: ../../index.php");
}
else{
	$_SESSION['onlinee'] = 0;
}
?>
<!DOCTYPE html>

	<html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>CoffeeTime</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="CoffeeTime" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="CoffeeTime" />


	
	<link href="../../css/font-awesome.css" rel="stylesheet">
    <link href="../../css/simple-line-icons.css" rel="stylesheet">
    <link href="../../css/bootstrap.css" rel="stylesheet">
    <link href="../../css/allpages_style.css" rel="stylesheet">
    <link href="../../css/login_style.css" rel="stylesheet">
	

	</head>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['login'])) { //user logging in

        require 'login.php';
        
    }
    
    elseif (isset($_POST['register'])) { //user registering
        
        require 'register.php';
        
    }
}

?>
	<div id="header" class="loginheader">
		<div class="container">				
				<nav class="navbar navbar-default">
					<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed toggle-sidebar">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="../../index.php"> <img src="../../images/coffeetime_logo_midi.png" alt=""/> </a>
						</div>
						
					<div class="side-nav-screen-hold" style="display:none"></div>	
						
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="side-nav side-nav-container-closed" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
							
							<li>
							<?php
		if ( $_SESSION['onlinee'] == 1 ) {
			?>
		<div class="headbar">
			<div class="dropdownmobile">
				<img src="../../<?= $user2['UserImage']; ?>" height="33" width="33" style="border-radius: 50%;object-fit: cover;object-position: 0 0%;">				
					<button onclick="myFunction1()" class="dropbtnmobile"><?= $user1['UserName']. ' '; ?><i class="fa fa-chevron-circle-down" id="icodrpodn"></i></button>
					<div id="myDropdown1" class="dropdownmobile-content">
					<a href="../../users/dashboard"><i class="icon-user2" id="icologout"></i> Το Προφίλ</a>
					<a href="../../users/login/logout.php"><i class="icon-log-out" id="icologout"></i> Αποσύνδεση</a>
					</div>
			</div>
		</div>
		<?php
		}else if ( $_SESSION['online_shop'] == 1 ) {
			?>
		<div class="headbar">
			<div class="dropdownmobile">
				<img src="../../<?= $shop2['Image']; ?>" height="33" width="33" style="border-radius: 50%;object-fit: cover;object-position: 0 0%;">				
					<button onclick="myFunction1()" class="dropbtnmobile"><?= $shop1['ShopUsername']. ' '; ?><i class="fa fa-chevron-circle-down" id="icodrpodn"></i></button>
					<div id="myDropdown1" class="dropdownmobile-content">
					<a href="../../business/dashboard"><i class="icon-user2" id="icologout"></i> Πίνακας Ελέγχου</a>
					<a href="../../business/login/logout.php"><i class="icon-log-out" id="icologout"></i> Αποσύνδεση</a>
					</div>
			</div>
		</div>
		<?php
		}else if ( $_SESSION['adminonline'] == 1 ) {
			?>
		<div class="headbar">
			<div class="dropdownmobile">
				<img src="../../<?= $admin2['AdminImage']; ?>" height="33" width="33" style="border-radius: 50%;object-fit: cover;object-position: 0 0%;">				
					<button onclick="myFunction1()" class="dropbtnmobile"><?= $admin1['UserName']. ' '; ?><i class="fa fa-chevron-circle-down" id="icodrpodn"></i></button>
					<div id="myDropdown1" class="dropdownmobile-content">
					<a href="../../admin/panel"><i class="icon-user2" id="icologout"></i> Πίνακας Ελέγχου</a>
					<a href="../../admin/login/logout.php"><i class="icon-log-out" id="icologout"></i> Αποσύνδεση</a>
					</div>
			</div>
		</div>
		<?php
		}else{
						?>
						<div class="dropdownmobile">		
						<button onclick="location.href='../../users/login'" class="dropbtnmobile"><?php echo 'Σύνδεση / Εγγραφή'; ?></button>
						</div>
						<?php
					}
		?>	</li>
							
								<li><a href="../../index.php">Αρχική</a></li>
								<li><a href="../../about.html">Πληροφορίες</a></li>
								<li><a href="../../contact.html">Επικοινωνία</a></li>
								<li>
								<?php
		if ( $_SESSION['onlinee'] == 1 ) {
			?>
			
			<div class="dropdown">
				<img src="../../<?= $user2['UserImage']; ?>" height="33" width="33" style="float: left;border-radius: 50%;object-fit: cover;object-position: 0 0%;">				
				
					<button onclick="myFunction()" class="dropbtn"><?= $user1['UserName']. ' '; ?><i class="fa fa-chevron-circle-down" id="icodrpodn"></i></button>
					<div id="myDropdown" class="dropdown-content">
					<a href="../../users/dashboard"> Το Προφίλ</a>
					<a href="../../users/login/logout.php"> Αποσύνδεση</a>
					</div>
				</div>
		<?php
		}else{
			
					if ( $_SESSION['online_shop'] == 1 ) {
						?>
			
						<div class="dropdown">
						<img src="../../<?= $shop2['Image']; ?>" height="33" width="33" style="float: left; border-radius: 50%;object-fit: cover;object-position: 0 0%;">
				
						<button onclick="myFunction()" class="dropbtn"><?= $shop1['ShopUsername']. ' '; ?><i class="fa fa-chevron-circle-down" id="icodrpodn"></i></button>
						<div id="myDropdown" class="dropdown-content">
							<a href="../../business/dashboard"><i class="icon-user2" id="icologout"></i> Πίνακας Ελέγχου</a>
							<a href="../../business/login/logout.php"><i class="icon-log-out" id="icologout"></i> Αποσύνδεση</a>
						</div>
						</div>
						<?php
					}elseif ($_SESSION['adminonline'] == 1){
						?>
						<div class="dropdown">
				<img src="../../<?= $admin2['AdminImage']; ?>" height="33" width="33" style="float: left;border-radius: 50%;object-fit: cover;object-position: 0 0%;">								
					<button onclick="myFunction()" class="dropbtn"><?= $admin1['UserName']. ' '; ?><i class="fa fa-chevron-circle-down" id="icodrpodn"></i></button>
					<div id="myDropdown" class="dropdown-content">
					<a href="../../admin/panel"><i class="icon-user2" id="icologout"></i> Πίνακας Ελέγχου</a>
					<a href="../../admin/login/logout.php"><i class="icon-log-out" id="icologout"></i> Αποσύνδεση</a>
					</div>
				</div>
						<?php
					}
					else{
						?>
						<div class="dropdown">		
						<button onclick="location.href='../../users/login'" class="dropbtn"><?php echo 'Σύνδεση / Εγγραφή'; ?></button>
						</div>
						<?php
					}
		
		}
		?></li>
							</ul>	
						</div>	
						<div class="clearfix"> </div>
					</div>	
				</nav>				
			</div>	
            
			
            <div class="clearfix"></div>
        </div>
	
	
	<body id="loginbody">


	



<div class="form">
      
      <ul class="tab-group">
	  <li class="tab active"><a href="#login">Log In</a></li>
        <li class="tab"><a href="#signup">Sign Up</a></li>
      </ul>
      
      <div class="tab-content">

         <div id="login">   
          <h1>Welcome To CoffeeTime!</h1>
          
          <form action="index.php" method="post" autocomplete="off">
          
            <div class="field-wrap col-sm-12">
            <input type="email" required autocomplete="on" name="email" placeholder="E-mail  *"/>
          </div>
          
          <div class="field-wrap col-sm-12">
            <input type="password" required autocomplete="off" name="password" placeholder="Password  *"/>
          </div>
          
          <p class="forgot"><a href="forgot.php">Forgot Password?</a></p>
          
          <button class="button button-block" name="login" />Log In</button>
		  
          <p class="business-login"><a href="../../business/login">Σύνδεση επιχείρησης</a></p>
          <p class="business-login"><a href="../../admin/login">Σύνδεση διαχειριστή</a></p>
		  
          </form>

        </div>
          
        <div id="signup">   
          <h1>Sign Up for Free</h1>
          
          <form action="index.php" method="post" autocomplete="off">
          
          <div class="top-row">
            <div class="field-wrap col-sm-6">
              <input type="text" required autocomplete="off" name='name' placeholder="First Name"/>
            </div>
        
            <div class="field-wrap col-sm-6">
              <input type="text"required autocomplete="off" name='surname' placeholder="Last Name"/>
            </div>
          </div>

		  <div class="field-wrap col-sm-12">
              <input type="text"required autocomplete="off" name='username' placeholder="UserName"/>
            </div>
		  
          <div class="field-wrap col-sm-12">
            <input type="email"required autocomplete="off" name='email' placeholder="E-mail"/>
          </div>
          
          <div class="field-wrap col-sm-12">
            <input type="password"required autocomplete="off" name='password' placeholder="Set A Password"/>
          </div>
		  
          
          <button type="submit" class="button button-block" name="register" />Register</button>
          
          </form>

        </div>  
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->


		

		 <script src="js/jquery-2.1.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/jquery.slimscroll.min.js"></script>


	
	
	<script>
	$(document).ready(function() {
		$('.menu_sidebar a[href*=#]').bind('click', function(e) {
				e.preventDefault(); // prevent hard jump, the default behavior

				var target = $(this).attr("href"); // Set the target as variable
				var distance = $(target).offset().top - 100;
				// perform animated scrolling by getting top-position of target-element and set it as scroll target
				$('html, body').stop().animate({
						scrollTop: distance
						
				}, 600, function() {
						
				});

				return false;
		});
});

$(window).scroll(function() {
		var scrollDistance = $(window).scrollTop();
		

		// Show/hide menu on scroll
		//if (scrollDistance >= 850) {
		//		$('nav').fadeIn("fast");
		//} else {
		//		$('nav').fadeOut("fast");
		//}
	
		// Assign active class to nav links while scolling
		$('.shopcards_all').each(function(i) {
				if ($(this).position().top <= scrollDistance + 80) {
						$('.item_sidebar a.active').removeClass('active');
						$('.item_sidebar a').eq(i).addClass('active');
				}
		});
}).scroll();
	</script>

	
	<script>
	$(".toggle-sidebar").on("click",function()
{
	$(".side-nav").removeClass("side-nav-container-closed");
	$(".side-nav").addClass("side-nav-container");
	$(".side-nav-screen-hold").fadeIn("fast");
});

$(".side-nav-screen-hold").on("click", function()
{
	$(".side-nav").removeClass("side-nav-container");
	$(".side-nav").addClass("side-nav-container-closed");
	$(".side-nav-screen-hold").fadeOut("fast");
});
</script>

<script type="text/javascript" src="../codefiles/js/jquery-2.1.4.min.js"></script>
<script src="../codefiles/js/index.js"></script>

	

	
	
	</body>
</html>
