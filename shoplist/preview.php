<?php
/* Displays user information and some useful messages */
require_once '../connection.php';
	
session_name("session3");
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);

if (($_SESSION['online_shop'] == 1) OR ($_SESSION['adminonline'] == 1)) {
	if ($_SESSION['online_shop'] == 1) {
		$shopid = $_SESSION['shopid'];
		
		$result3 = $connect->query("SELECT * FROM shop_keepers WHERE ShopID ='$shopid'");
		$shop1 = $result3->fetch_assoc();

		$result4 = $connect->query("SELECT * FROM shopimages WHERE ShopID ='$shopid'");
		$shop2 = $result4->fetch_assoc();
		
	}
	if ($_SESSION['adminonline'] == 1) {
		$adminid = $_SESSION['adminid'];
		
		$result5 = $connect->query("SELECT * FROM admins WHERE AdminID ='$adminid'");
		$admin1 = $result5->fetch_assoc();

		$result6 = $connect->query("SELECT * FROM adminimages WHERE AdminID ='$adminid'");
		$admin2 = $result6->fetch_assoc();
	}
}else{
	header("Location: ../404.html");
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


	
	<link href="../css/font-awesome.css" rel="stylesheet">
    <link href="../css/simple-line-icons.css" rel="stylesheet">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/allpages_style.css" rel="stylesheet">
	

	</head>
	
	<div id="header">
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
							<a class="navbar-brand" href="../index.php"> <img src="../images/coffeetime_logo_midi.png" alt=""/> </a>
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
				<img src="../<?= $user2['UserImage']; ?>" height="33" width="33" style="border-radius: 50%;object-fit: cover;object-position: 0 0%;">				
					<button onclick="myFunction1()" class="dropbtnmobile"><?= $user1['UserName']. ' '; ?><i class="fa fa-chevron-circle-down" id="icodrpodn"></i></button>
					<div id="myDropdown1" class="dropdownmobile-content">
					<a href="../users/dashboard"><i class="icon-user2" id="icologout"></i> Το Προφίλ</a>
					<a href="../users/login/logout.php"><i class="icon-log-out" id="icologout"></i> Αποσύνδεση</a>
					</div>
			</div>
		</div>
		<?php
		}else if ( $_SESSION['online_shop'] == 1 ) {
			?>
		<div class="headbar">
			<div class="dropdownmobile">
				<img src="../<?= $shop2['Image']; ?>" height="33" width="33" style="border-radius: 50%;object-fit: cover;object-position: 0 0%;">				
					<button onclick="myFunction1()" class="dropbtnmobile"><?= $shop1['ShopUsername']. ' '; ?><i class="fa fa-chevron-circle-down" id="icodrpodn"></i></button>
					<div id="myDropdown1" class="dropdownmobile-content">
					<a href="../business/panel"><i class="icon-user2" id="icologout"></i> Πίνακας Ελέγχου</a>
					<a href="../business/login/logout.php"><i class="icon-log-out" id="icologout"></i> Αποσύνδεση</a>
					</div>
			</div>
		</div>
		<?php
		}else if ( $_SESSION['adminonline'] == 1 ) {
			?>
		<div class="headbar">
			<div class="dropdownmobile">
				<img src="../<?= $admin2['AdminImage']; ?>" height="33" width="33" style="border-radius: 50%;object-fit: cover;object-position: 0 0%;">				
					<button onclick="myFunction1()" class="dropbtnmobile"><?= $admin1['UserName']. ' '; ?><i class="fa fa-chevron-circle-down" id="icodrpodn"></i></button>
					<div id="myDropdown1" class="dropdownmobile-content">
					<a href="../admin/panel"><i class="icon-user2" id="icologout"></i> Πίνακας Ελέγχου</a>
					<a href="../admin/login/logout.php"><i class="icon-log-out" id="icologout"></i> Αποσύνδεση</a>
					</div>
			</div>
		</div>
		<?php
		}else{
						?>
						<div class="dropdownmobile">		
						<button onclick="location.href='../users/login'" class="dropbtnmobile"><?php echo 'Σύνδεση / Εγγραφή'; ?></button>
						</div>
						<?php
					}
		?>	</li>
							
								<li><a href="../index.php">Αρχική</a></li>
								<li><a href="../about.html">Πληροφορίες</a></li>
								<li><a href="../contact.html">Επικοινωνία</a></li>
								<li>
								<?php
		if ( $_SESSION['onlinee'] == 1 ) {
			?>
			
			<div class="dropdown">
				<img src="../<?= $user2['UserImage']; ?>" height="33" width="33" style="float: left;border-radius: 50%;object-fit: cover;object-position: 0 0%;">				
				
					<button onclick="myFunction()" class="dropbtn"><?= $user1['UserName']. ' '; ?><i class="fa fa-chevron-circle-down" id="icodrpodn"></i></button>
					<div id="myDropdown" class="dropdown-content">
					<a href="../users/dashboard"> Το Προφίλ</a>
					<a href="../users/login/logout.php"> Αποσύνδεση</a>
					</div>
				</div>
		<?php
		}else{
			
					if ( $_SESSION['online_shop'] == 1 ) {
						?>
			
						<div class="dropdown">
						<img src="../<?= $shop2['Image']; ?>" height="33" width="33" style="float: left; border-radius: 50%;object-fit: cover;object-position: 0 0%;">
				
						<button onclick="myFunction()" class="dropbtn"><?= $shop1['ShopUsername']. ' '; ?><i class="fa fa-chevron-circle-down" id="icodrpodn"></i></button>
						<div id="myDropdown" class="dropdown-content">
							<a href="../business/panel"><i class="icon-user2" id="icologout"></i> Πίνακας Ελέγχου</a>
							<a href="../business/login/logout.php"><i class="icon-log-out" id="icologout"></i> Αποσύνδεση</a>
						</div>
						</div>
						<?php
					}elseif ($_SESSION['adminonline'] == 1){
						?>
						<div class="dropdown">
				<img src="../<?= $admin2['AdminImage']; ?>" height="33" width="33" style="float: left;border-radius: 50%;object-fit: cover;object-position: 0 0%;">								
					<button onclick="myFunction()" class="dropbtn"><?= $admin1['UserName']. ' '; ?><i class="fa fa-chevron-circle-down" id="icodrpodn"></i></button>
					<div id="myDropdown" class="dropdown-content">
					<a href="../admin/panel"><i class="icon-user2" id="icologout"></i> Πίνακας Ελέγχου</a>
					<a href="../admin/login/logout.php"><i class="icon-log-out" id="icologout"></i> Αποσύνδεση</a>
					</div>
				</div>
						<?php
					}
					else{
						?>
						<div class="dropdown">		
						<button onclick="location.href='../users/login'" class="dropbtn"><?php echo 'Σύνδεση / Εγγραφή'; ?></button>
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
	
	
	<body>

	<div id="fh5co-page">

	<?php
	
	date_default_timezone_set('Europe/Athens');
	$mytime = abs(strtotime(date('d-m-y') .' '. date('H:i:s' , time())));

	require_once '../connection.php';

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
if(isset($_GET['shopid'])) {

	$shopid = $connect->escape_string($_GET['shopid']);	

		
	$result = $connect->query("SELECT shops.*, shopimages.*, shop_hours.* FROM shops, shopimages, shop_hours WHERE shops.ShopID = '$shopid' AND shopimages.ShopID = '$shopid' AND shop_hours.ShopID = '$shopid'");
	$shop = $result->fetch_assoc();
	
	$result7 = $connect->query("SELECT * FROM social, infosvisibility  WHERE social.ShopID = '$shopid' AND infosvisibility.ShopID = '$shopid'");
	$shop7= $result7->fetch_assoc();

	if ($shop["Active"] == "0"){
		header("location: ../404.html");
	}
	
	$maps_lat = $shop['Maps_Lat'];
	$maps_lng = $shop['Maps_Lng'];
	
	
	switch (date("D")) {
    case "Mon":
        $today = "Mon";
		$opentime = $shop["Monday_Open"];
		$closetime = $shop["Monday_Closed"];
        break;
    case "Tue":
        $today = "Tue";
		$opentime = $shop["Tuesday_Open"];
		$closetime = $shop["Tuesday_Closed"];
        break;
    case "Wed":
        $today = "Wed";
		$opentime = $shop["Wednesday_Open"];
		$closetime = $shop["Wednesday_Closed"];
        break;
	case "Thu":
        $today = "Thu";
		$opentime = $shop["Thursday_Open"];
		$closetime = $shop["Thursday_Closed"];
        break;
	case "Fri":
        $today = "Fri";
		$opentime = $shop["Friday_Open"];
		$closetime = $shop["Friday_Closed"];
        break;
	case "Sat":
        $today = "Sat";
		$opentime = $shop["Saturday_Open"];
		$closetime = $shop["Saturday_Closed"];
        break;
	case "Sun":
        $today = "Sun";
		$opentime = $shop["Sunday_Open"];
		$closetime = $shop["Sunday_Closed"];
        break;
    default:
        echo "Error Day";
		break;
}


	$opentime = abs(strtotime(date("d-m-y ").' '.date($opentime , time()))); 
	$close = abs(strtotime(date("d-m-y ").' '.date($closetime , time()))); 

	if ($close <= $opentime){	
		$closetime = abs(strtotime(date("d")+'1'.'-'.date("m-y").' '.date($closetime , time()))); 
	}else{
		$closetime = abs(strtotime(date("d-m-y ").' '.date($closetime , time()))); 
	}
		
	

	

}

?>

<div class="breadcrumb_nav">
<p><u><a href="./index.php">Αρχική</a></u>  >  <?= $shop['ShopCity'] ?>  >  <?= $shop['ShopAddress'] ?> <?= $shop['ShopAddressNumber'] ?>  >  <?= $shop['ShopName'] ?></p>
</div>

<div class="main_shoppage">


<div class="main_column">


<div id="1" class="shopcard_header shopcards_all">

<img class="coffee-header-logo" src="../<?= $shop['Image'] ?>">

	<div class="info_shopcard">
		<h1><?= $shop['ShopName'] ?></h1>
		<h2 class="info">
			<span style="color:black;font-size:15px;"><?= $shop['ShopAddress'] ?> <?= $shop['ShopAddressNumber'] ?>,</span>
			<span style="color:black;font-size:15px;"><?= $shop['ShopCity'] ?></span>			
		</h2>
					
					<span class="stars-rating">
						<i class="fa fa-star" style="color:#ffd534;"></i>
						<i class="fa fa-star" style="color:#ffd534;"></i>
						<i class="fa fa-star" style="color:#ffd534;"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
					</span>
					<span>(125)</span>
	</div>
	
	<div class="extra_infos info_shopcard">
		<?php
			if ($shop7['VisContactPhone'] == '1'){
				if ($shop['ContactPhone'] != '' OR $shop['ContactPhone'] != NULL){
				?>
					<span class="glyphicon glyphicon-earphone"></span> <span> <?= $shop['ContactPhone'] ?></span><br>
				<?php
				}
			}
			if ($shop7['VisContactPhone2'] == '1'){
				if ($shop['ContactPhone2'] != '' OR $shop['ContactPhone2'] != NULL){
				?>
					<span class="glyphicon glyphicon-earphone"></span> <span> <?= $shop['ContactPhone2'] ?></span><br>
				<?php
				}
			}
			if ($shop7['VisShopE-mail'] == '1'){
				if ($shop['ShopE-mail'] != '' OR $shop['ShopE-mail'] != NULL){
				?>
					<span class="glyphicon glyphicon-envelope"></span> <span> <?= $shop['ShopE-mail'] ?></span><br>
				<?php
				}
			}
			if ($shop7['VisFacebookURL'] == '1'){
				if ($shop7['FacebookURL'] != '' OR $shop7['FacebookURL'] != NULL){
				?>
					<a target="_blank" href="https://www.facebook.com/<?= $shop7['FacebookURL'] ?>"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c2/F_icon.svg/2000px-F_icon.svg.png" class="social_icons"/></a>
				<?php
				}
			}
			if ($shop7['VisInstagramURL'] == '1'){
				if ($shop7['InstagramURL'] != '' OR $shop7['InstagramURL'] != NULL){
				?>
					<a target="_blank" href="https://www.instagram.com/<?= $shop7['InstagramURL'] ?>"><img src="https://instagram-brand.com/wp-content/uploads/2016/11/app-icon2.png" class="social_icons"/></a>
				<?php
				}
			}
			if ($shop7['VisTwitterURL'] == '1'){
				if ($shop7['TwitterURL'] != '' OR $shop7['TwitterURL'] != NULL){
				?>
					<a target="_blank" href="https://www.twitter.com/<?= $shop7['TwitterURL'] ?>"><img src="https://cdn1.iconfinder.com/data/icons/logotypes/32/square-twitter-256.png" class="social_icons"/></a>
				<?php
				}
			}
			if ($shop7['VisWebsite'] == '1'){
				if ($shop7['Website'] != '' OR $shop7['Website'] != NULL){
				?>
					<a target="_blank" href="https://www.<?= $shop7['Website'] ?>"><img src="http://www.adamequipment.co.za/media/catalog/category/International-Websites-Web-Icon.png" class="social_icons"/></a>
				<?php
				}
			}
			if ($shop7['VisDeliverySite'] == '1'){
				if ($shop7['DeliverySite'] != '' OR $shop7['DeliverySite'] != NULL){
				?>
					<a target="_blank" href="https://www.<?= $shop7['DeliverySite'] ?>"><img src="https://d30y9cdsu7xlg0.cloudfront.net/png/858444-200.png" class="social_icons"/></a>
				<?php
				}
			}
				?>
		
		
		
		
		
		
	</div>
	
</div>


<div id="2" class="shopcard_items shopcards_all">

<div class="menu-body">

	<?php
		$query1 = $connect->query("SELECT DISTINCT ItemCategory FROM shopitems WHERE `ShopID` ='$shopid'");

		while($r = $query1->fetch_assoc()) 
		{
			$cur_category = $r['ItemCategory'];
			$query = $connect->query("SELECT * FROM shopitems WHERE `ShopID` ='$shopid' AND `ItemCategory` = '$cur_category' ORDER BY ItemCategory ASC");
			?>
			
			<div class="menu-section">
			<h2 class="menu-section-title"><?= $cur_category; ?></h2>
			
			<?php
			while($row = $query->fetch_assoc()) 
			{
			?>
				
				<div class="menu-item">
				<div class="menu-item-name">
					<?= $row['ItemName']?>
				</div>
				<div class="menu-item-price">
					€ <?= $row['Cost']?>
				</div>
				<div class="menu-item-description">
					<?= $row['Description']?>
				</div>
			  </div>
				
			<?php
			}
			?>
			
			</div>
			
			<?php
		} 
		?>	

</div>		

</div>






<div id="3" class="shopcards_all">

<center>
<table class="timetable">
    <tr class="firstrow">
    <th>Ημέρα</th> 
    <th>  Άνοίγμα &nbsp </th> 
    <th> &nbsp Κλείσιμο </th>
  </tr>  
  <tr id="Mon">
    <td>Δευτέρα</td>
    <td><center><?=$shop['Monday_Open'];?></center></td>
    <td><center><?=$shop['Monday_Closed'];?></center></td>
    </tr>
  <tr id="Tue">
    <td>Τρίτη</td>
    <td><center><?=$shop['Tuesday_Open'];?></center></td>
    <td><center><?=$shop['Tuesday_Closed'];?></center></td>
  </tr>
  <tr id="Wed">
    <td>Τετάρτη</td>
    <td><center><?=$shop['Wednesday_Open'];?></center></td>
    <td><center><?=$shop['Wednesday_Closed'];?></center></td>
  </tr>
  <tr id="Thu">
    <td>Πέμπτη</td>
    <td><center><?=$shop['Thursday_Open'];?></center></td>
    <td><center><?=$shop['Thursday_Closed'];?></center></td>
  </tr>
  <tr id="Fri">
    <td>Παρασκευή</td>
    <td><center><?=$shop['Friday_Open'];?></center></td>
    <td><center><?=$shop['Friday_Closed'];?></center></td>
  </tr>
  <tr id="Sat">
    <td>Σάββατο</td>
    <td><center><?=$shop['Saturday_Open'];?></center></td>
    <td><center><?=$shop['Saturday_Closed'];?></center></td>
  </tr>
  <tr id="Sun">
    <td>Κυριακή</td>
    <td><center><?=$shop['Sunday_Open'];?></center></td>
    <td><center><?=$shop['Sunday_Closed'];?></center></td>
  </tr>
 
    
</table>
</center>


</div>










<div id="4" class="shopcards_all">

<div class="mapclass">
<div id="map"></div>
</div>


</div>













	
</div>




<div class="secondary_column">


<ul class="menu_sidebar">
<li class="item_sidebar"><a href="#1">Στοιχεία Καταστήματος</a></li>
<li class="item_sidebar"><a href="#2">Μενού Προϊόντων</a></li>
<li class="item_sidebar"><a href="#3">Ωράριο Καταστήματος</a></li>
<li class="item_sidebar"><a href="#4">Χάρτης/Πλοήγηση</a></li>
<li class="item_sidebar"><a href="#5">Αξιολογήσεις</a></li>
</ul>





</div>


	</div>


		

		 <script src="js/jquery-2.1.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/jquery.slimscroll.min.js"></script>
	
	<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length} ;
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-border-red", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-border-red";
}
</script>
	
	
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
	
<script>
		//dropdown menu when logged in
	function myFunction(){document.getElementById("myDropdown").classList.toggle("show");}
window.onclick=function(event){if(!event.target.matches('.dropbtn')){var dropdowns=document.getElementsByClassName("dropdown-content");var i;for(i=0;i<dropdowns.length;i++){var openDropdown=dropdowns[i];if(openDropdown.classList.contains('show')){openDropdown.classList.remove('show');}}}}
function myFunction1(){document.getElementById("myDropdown1").classList.toggle("show");}
window.onclick=function(event){if(!event.target.matches('.dropbtnmobile')){var dropdowns=document.getElementsByClassName("dropdownmobile-content");var i;for(i=0;i<dropdowns.length;i++){var openDropdown=dropdowns[i];if(openDropdown.classList.contains('show')){openDropdown.classList.remove('show');}}}}



document.getElementById("<?= $today ?>").style.background = "rgb(236, 236, 236)";



// display shop in map
	      function initMap() {

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
          center: {lat: <?= $maps_lat ?>, lng: <?= $maps_lng ?>},
		  styles: 
			[{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"administrative.country","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"administrative.country","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#656565"}]},{"featureType":"administrative.country","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"administrative.locality","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.attraction","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.government","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.government","elementType":"labels.icon","stylers":[{"visibility":"on"}]},{"featureType":"poi.medical","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"hue":"#1cff00"},{"lightness":"-5"},{"saturation":"5"},{"weight":"1.92"},{"gamma":"1.00"}]},{"featureType":"poi.park","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"poi.place_of_worship","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.place_of_worship","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"poi.school","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#e9e9e9"},{"saturation":"-17"},{"lightness":"-50"},{"gamma":"8.07"}]},{"featureType":"road","elementType":"labels.text","stylers":[{"saturation":"100"},{"color":"#aeaeae"},{"weight":"0.01"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","elementType":"labels","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"labels.text","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"transit.line","elementType":"geometry.fill","stylers":[{"visibility":"off"}]},{"featureType":"transit.line","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"transit.line","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit.station.airport","elementType":"geometry.fill","stylers":[{"visibility":"on"}]},{"featureType":"transit.station.airport","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"transit.station.rail","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"transit.station.rail","elementType":"geometry.fill","stylers":[{"color":"#e50000"}]},{"featureType":"transit.station.rail","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"transit.station.rail","elementType":"labels.icon","stylers":[{"visibility":"on"}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"},{"color":"#00bcff"}]},{"featureType":"water","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"visibility":"on"}]},{"featureType":"water","elementType":"geometry.stroke","stylers":[{"visibility":"on"}]}]
        });

        // Add some markers to the map.
        // Note: The code uses the JavaScript Array.prototype.map() method to
        // create an array of markers based on a given "locations" array.
        // The map() method here has nothing to do with the Google Maps API.
       var image = '../images/map-marker.png';        
       var marker = locations.map(function(location, i) {
          return new google.maps.Marker({
            position: location,
            icon: image,
            map: map,
            title: '<?= $shop['ShopName'] ?>'
          });
        });
        
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map, marker);
        });
        // Add a marker clusterer to manage the markers.
        var markerCluster = new MarkerClusterer(map, marker,
            {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
      }
      var locations = [
        {lat: <?= $maps_lat ?>, lng: <?= $maps_lng ?>}
      ]
	  
	</script>
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkvJXrumdVQLipE-6ZPa-kPoHXkkYjlnU&callback=initMap&language=el"></script>
	

	</body>
</html>
