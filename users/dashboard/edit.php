<?php
/* Displays user information and some useful messages */
session_name("session3");
session_start();

// Check if user is logged in using the session variable
if ($_SESSION['onlinee'] == 1) {
	  	
	$userid = $_SESSION['userid'];
    $active = $_SESSION['active'];

}
else {
	$_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: ../login/error.php");  

}
?>

<?php

	require_once '../../connection.php';

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
} 

	$result2 = $connect->query("SELECT * FROM users WHERE `UserID` ='$userid'");
	$user2 = $result2->fetch_assoc();

	$result3 = $connect->query("SELECT * FROM userimages WHERE `UserID` ='$userid'");
	$user3 = $result3->fetch_assoc();
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Welcome <?= $user2['UserName']; ?></title>
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

	  <?php include '../codefiles/css/css_dashboard.html'; ?>

  </head>
<body>
<div id="fh5co-wrapper">
		<div id="fh5co-page">

		<header id="fh5co-header-section" class="sticky-banner">
			
			<?php
		if ( $_SESSION['onlinee'] == 1 ) {
			?>
		<div class="headbar">
			<div class="dropdownmobile">
				<img src="../../<?= $user3['UserImage']; ?>" height="33" width="33" style="float: left;border-radius: 50%;object-fit: cover;object-position: 0 0%;">				
					<button onclick="myFunction1()" class="dropbtnmobile"><?= $user2['UserName']. ' '; ?><i class="icon-chevron-with-circle-down" id="icodrpodn"></i></button>
					<div id="myDropdown1" class="dropdownmobile-content">
					<a href="index.php"><i class="icon-user2" id="icologout"></i> My Profile</a>
					<a href="../login/logout.php"><i class="icon-log-out" id="icologout"></i> Logout</a>
					</div>
			</div>
		</div>
		<?php
		}
		?>
			
			<div class="container">
				<div class="nav-header">
				
				
				<?php
		if ( $_SESSION['onlinee'] == 1 ) {
			?>
			
			<div class="dropdown">
				<img src="../../<?= $user3['UserImage']; ?>" height="33" width="33" style="float: left; border-radius: 50%;object-fit: cover;object-position: 0 0%;">
				
					<button onclick="myFunction()" class="dropbtn"><?= $user2['UserName']. ' '; ?><i class="icon-chevron-with-circle-down" id="icodrpodn"></i></button>
					<div id="myDropdown" class="dropdown-content">
					<a href="index.php"><i class="icon-user2" id="icologout"></i> My Profile</a>
					<a href="../login/logout.php"><i class="icon-log-out" id="icologout"></i> Logout</a>
					</div>
				</div>
		<?php
		}elseif($_SESSION['onlinee'] == 0){
			?>
			<div class="dropdown">		
					<button onclick="location.href='users/login'" class="dropbtn"><?php echo 'Σύνδεση / Εγγραφή'; ?></button>
			</div>
			<?php
		}
		?>
		
					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
					<center><h1 id="fh5co-logo"><a href="../../index.php"><img src="../../images/coffeetime_logo.png"  style="width:195px;height:80px; margin-right: 6px;"></a></h1></center>
					<!-- START #fh5co-menu-wrap -->
					<nav id="fh5co-menu-wrap" role="navigation">
						<ul class="sf-menu" id="fh5co-primary-menu">
						<?php
							if($_SESSION['onlinee'] == 0){
						?>
						<li class="desktop_hidden"><a href="users/login">Σύνδεση / Εγγραφή</a></li>
						<?php
							}
						?>
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
		
		
		
		<center>
  <div class="box">
			  
    <div class="card hovercard">
		<img src="../../images/picture5.jpg" style="object-fit: cover;height: 220px;width: 100%;filter: blur(5px);">
        <div class="useravatar">
            <img alt="" src="../../<?= $user3['UserImage']; ?>">
        </div>
        <div class="card-info"> <span class="card-title"><?= $user2['FirstName'],' ',$user2['Surname']?></span>

        </div>
    </div>

    
 
<ul class="tab-group">
    <li><a href="index.php"><i class="icon-user3" id="ico_tabs" style="font-weight:100;"></i>Προφίλ</a></li>
    <li><a href="edit.php" class="activetab"><i class="icon-edit2" id="ico_tabs" style="font-weight:100;"></i>Επεξεργασία</a></li>
</ul>

<br>
	
	<form action="update.php" method="post" autocomplete="off" enctype="multipart/form-data">
	
		  


<div class="row" align="center">
											
											
											<div class="col-xxs-12 col-xs-6 mt">
												<label for="class">Name: </label><br>
												<input type="text" name="name" value="<?= $user2['FirstName'] ?>"/>											
											</div>
											
											<div class="col-xxs-12 col-xs-6 mt">
												<label for="class">Surname: </label><br>
												<input type="text" name="surname" value="<?= $user2['Surname'] ?>"/>												
											</div>

											
											
											<div class="col-xxs-12 col-xs-6 mt">
												<label for="class">Password: </label><br>
												<input type="password" name="password" placeholder="Εισάγετε νέο κωδικό πρόσβασης"/>												
											</div>
											
										
												<div hidden class="col-xxs-12 col-xs-6 mt">
														  <?php

																require_once '../../connection.php';

															// Check connection
															if ($connect->connect_error) {
																die("Connection failed: " . $connect->connect_error);
															} 

																

																$result5 = $connect->query("SELECT * FROM userimages WHERE UserID = '$userid'");
																$user5 = $result5->fetch_assoc();
																
															?>
												<label for="class">Avatar: </label><br>
												<input type="text" name="imgavatar"/>
												<?php $_SESSION['userimage'] = $user5['UserImage']; ?>
											</div>
											<div class="col-xxs-12 col-xs-6 mt">
											<label for="class">Upload Image: </label><br>
													<input class="uploadform" type="file" name="file">
											</div>
										</div>		  
		    
		  
		  <center>
          <button class="button button-block" id="savechanges1" name="update_btn">Save Changes</button>
		  
		  



		  </center>
	</form>

	
    </div>
	</center>
	</div>
	</div>
    
<?php include '../codefiles/js/js_dashboard.html'; ?>
	
<script>
setTimeout(function() {
	
    $('.message').fadeOut(500);
}, 5000);
</script>

</body>
</html>

<script>
function myFunction4() {
	document.getElementById("newaddress").style.display= "block";
	document.getElementById("newbtn").style.display= "none";
	window.scrollTo(0,200);
	}
</script>

