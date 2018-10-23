<?php
/* Displays user information and some useful messages */
require_once '../connection.php';
	
session_name("session3");
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);

if (($_SESSION['onlinee'] == 1) OR ($_SESSION['online_shop'] == 1) OR ($_SESSION['adminonline'] == 1)) {
	if ($_SESSION['onlinee'] == 1) {
		$userid = $_SESSION['userid'];
		
		$result1 = $connect->query("SELECT * FROM users WHERE `UserID` ='$userid'");
		$user1 = $result1->fetch_assoc();

		$result2 = $connect->query("SELECT * FROM userimages WHERE `UserID` ='$userid'");
		$user2 = $result2->fetch_assoc();
	
	}
	if ($_SESSION['online_shop'] == 1) {
		$shopid = $_SESSION['shopid'];
		
		$result3 = $connect->query("SELECT * FROM shop_keepers WHERE `ShopID` ='$shopid'");
		$shop1 = $result3->fetch_assoc();

		$result4 = $connect->query("SELECT * FROM shopimages WHERE `ShopID` ='$shopid'");
		$shop2 = $result4->fetch_assoc();
		
	}
	if ($_SESSION['adminonline'] == 1) {
		$adminid = $_SESSION['adminid'];
		
		$result5 = $connect->query("SELECT * FROM admins WHERE `AdminID` ='$adminid'");
		$admin1 = $result5->fetch_assoc();

		$result6 = $connect->query("SELECT * FROM adminimages WHERE `AdminID` ='$adminid'");
		$admin2 = $result6->fetch_assoc();
	}
}

if ($_GET["lat"] == "" OR $_GET["lng"] == ""){
	header("Location: ../index.php");
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
	
	$result8 = $connect->query("SELECT * FROM abilities WHERE ShopID = '$shopid'");
	$shop8= $result8->fetch_assoc();

	if ($shop["Active"] == "0"){
		header("location: ../404.html");
	}
	
	$maps_lat = $shop['Maps_Lat'];
	$maps_lng = $shop['Maps_Lng'];
	
	
	
	$mylat = $_GET["lat"];
	$mylng = $_GET["lng"];
	
	$shoplat = $shop["Maps_Lat"];
	$shoplng = $shop["Maps_Lng"];
	
	


$result = $connect->query("SELECT avg(AvgRate) as avg FROM reviews WHERE ShopID = $shopid");
$avgrate = $result->fetch_assoc();

$result = $connect->query("SELECT count(*) as total FROM reviews WHERE ShopID = $shopid");
$totalreviews = $result->fetch_assoc();

$result = $connect->query("SELECT avg(Answer1) as answer1 FROM reviews WHERE ShopID = $shopid");
$answer1 = $result->fetch_assoc();

$result = $connect->query("SELECT avg(Answer2) as answer2 FROM reviews WHERE ShopID = $shopid");
$answer2 = $result->fetch_assoc();

$result = $connect->query("SELECT avg(Answer3) as answer3 FROM reviews WHERE ShopID = $shopid");
$answer3 = $result->fetch_assoc();

$result = $connect->query("SELECT avg(Answer4) as answer4 FROM reviews WHERE ShopID = $shopid");
$answer4 = $result->fetch_assoc();

$result = $connect->query("SELECT count(Liked) as liked FROM reviews WHERE ShopID = $shopid");
$liked = $result->fetch_assoc();

$result = $connect->query("SELECT count(Disliked) as disliked FROM reviews WHERE ShopID = $shopid");
$disliked = $result->fetch_assoc();

	
	
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
	

}else{
	header("location: ../404.html");
}

?>

<div class="breadcrumb_nav">
	<p id="breadcrumb_address"></p>
</div>


<div id="main_shoppage" class="main_shoppage">


<div class="main_column">


<div id="1" class="shopcards_all">

<?php
	if ($shop["ManualStatus"] == "0" OR $shop["Status"] == "Closed"){
?>
<div id="shopalert" class="shopalert alert alert-danger">
	<strong>Προσοχή!</strong> Το κατάστημα είναι κλειστό αυτή τη στιγμή.
</div><br>
<?php
	}
?>

<div class="shopcard_header">

	<img class="coffee-header-logo" src="../<?= $shop['Image'] ?>">

	<div class="info_shopcard">
		<h1><?= $shop['ShopName'] ?></h1>
		<h2 class="info">
			<span style="color:black;font-size:15px;"><?= $shop['ShopAddress'] ?> <?= $shop['ShopAddressNumber'] ?>,</span>
			<span style="color:black;font-size:15px;"><?= $shop['ShopCity'] ?></span>			
		</h2>
					
					<span class="stars-rating">
						<i id="star1" class="fa fa-star-o"></i>
						<i id="star2" class="fa fa-star-o"></i>
						<i id="star3" class="fa fa-star-o"></i>
						<i id="star4" class="fa fa-star-o"></i>
						<i id="star5" class="fa fa-star-o"></i>
					</span>
						<span>(<?= $totalreviews["total"] ?>)</span>
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


</div>



<div id="2" class="shopcards_all">
<?php if ($shop8['Delivery'] == '1' OR $shop8['OnlineDelivery'] == '1' OR $shop8['StandUpCoffee'] == '1' OR $shop8['OTETV'] == '1' OR $shop8['Nova'] == '1' OR $shop8['WiFi'] == '1'){
	?>
	<span>Το κατάστημα διαθέτει επίσης: </span>
	<div class="shop_abilities">
			<?php if ($shop8['Delivery'] == '1'){
				?>	
				<div class="ability">
					<img src="https://static.thenounproject.com/png/165055-200.png" class="ability_icon"/>
					<div>Delivery</div>
				</div>
			<?php
			}
			?>
			
			<?php if ($shop8['OnlineDelivery'] == '1'){
				?>	
				<div class="ability">
					<img src="https://cdn1.iconfinder.com/data/icons/e-commerce-set-3-1/256/Buy_Online-512.png" class="ability_icon"/>
					<div>Online Delivery</div>
				</div>
			<?php
			}
			?>
			
			<?php if ($shop8['StandUpCoffee'] == '1'){
				?>		
				<div class="ability">
					<img src="http://orchestrateinc.com/cms/wp-content/uploads/2017/05/coffee-icon.png" class="ability_icon"/>
					<div>Καφές στο χέρι</div>
				</div>
			<?php
			}
			?>
			
			<?php if ($shop8['OTETV'] == '1'){
				?>	
				<div class="ability">
					<img src="https://techingreek.com/wp-content/uploads/2017/07/favicon.ico" class="ability_icon"/>
					<div>Cosmote TV</div>
				</div>
			<?php
			}
			?>	
				
			<?php if ($shop8['Nova'] == '1'){
				?>
				<div class="ability">
					<img src="https://upload.wikimedia.org/wikipedia/el/thumb/f/ff/Nova_blue_logo.png/180px-Nova_blue_logo.png" class="ability_icon"/>
					<div>Nova</div>
				</div>
			<?php
			}
			?>
			
			<?php if ($shop8['WiFi'] == '1'){
				?>
				<div class="ability">
					<img src="http://jrs-technology.com/wp-content/uploads/2016/05/wifi_logo_256.png" class="ability_icon"/>
					<div>WiFi 
						<?php if ($shop['WiFiPassword'] != '' OR $shop['WiFiPassword'] != NULL){
							if ($shop7['WiFiPassword'] == '1'){
							?>
								<br><span>(<?= $shop['WiFiPassword'] ?>)</span>
							<?php
							}
						}
						?>
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


<div id="3" class="shopcard_items shopcards_all">

<?php
		$query5 = $connect->query("SELECT DISTINCT ItemCategory FROM shopitems WHERE `ShopID` ='$shopid'");
		$countitems=$query5->num_rows;
		
		if ($countitems==0){
			?>
			<center><p>Δεν υπάρχουν διαθέσιμα προϊόντα</p></center>
			<?php
		}
		else{
			

		?>
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


<?php
}
?>
</div>






<div id="4" class="shopcards_all">

<center>
<table class="timetable">
    <tr class="firstrow">
    <th>Ημέρα</th> 
    <th>  Ανοίγει &nbsp </th> 
    <th> &nbsp Κλείνει </th>
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





<div id="5" class="shopcards_all">


<div class="container-gallery">

<?php
		$query3 = $connect->query("SELECT * FROM shopimages WHERE `ShopID` ='$shopid' AND `Category` = 'others'");
		$count_imgs = $query3->num_rows;
		
		$i = 1;
		while($row = $query3->fetch_assoc()) 
		{
			?>
			
			  <div class="mySlides">
				<div class="numbertext"><?= $i; ?> / <?= $count_imgs; ?></div>
				<img class="bigimage" src="../<?= $row['Image']; ?>">
			  </div>
		<?php
			$i++;
		}
		?>

    
  <a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>


  <div class="sameline_img">
  
  
  <?php
		$query4 = $connect->query("SELECT * FROM shopimages WHERE `ShopID` ='$shopid' AND `Category` = 'others'");
		
		$i = 1;
		while($row = $query4->fetch_assoc()) 
		{
			?>
			  <div class="column">
					<img class="demo cursor" src="../<?= $row['Image']; ?>" onclick="currentSlide(<?= $i; ?>)" alt="The Woods">
			  </div>
		<?php
			$i++;
		}
		?>

  </div>
</div>


</div>







		
<div id="6" class="shopcards_all">
<div class="row map_banner">
	<div id="walking" class="directions walk odd col-sm-6">
		<i class="fa fa-child"></i> Περπάτημα: <p class="results_map" id="walkingdistance"></p> (<p class="results_map" id="walkingtime"></p>) 
	</div>
	<div id="driving" class="directions drive even col-sm-6">
		<i class="fa fa-car"></i> Οδήγηση: <p class="results_map" id="drivingdistance"></p> (<p class="results_map" id="drivingtime"></p>)
	</div>
</div>

<div class="mapclass">
<div id="map"></div>
<div hidden id="map1"></div>
<p hidden id="shopaddress"></p>
<p hidden id="myaddress"></p>
<div id="right-panel"></div>
</div>


</div>





<div id="7" class="shopcards_all">

<form id="review-form" action="submit_review.php" onsubmit="return validateForm()" accept-charset="UTF-8" method="post">

<div id="skureview-form" class="sku-review-form">

<?php if ($avgrate["avg"] != 0){
?>
	  <p>Συνολική βαθμολογία καταστήματος: &nbsp;<b><?= number_format(round($avgrate["avg"],2),1) ?></b></p>
<?php 
}
?>
      <ul class="form-nav cf">
        <li class="question_avg"><p>Ερώτηση 1: &nbsp;(<?= number_format(round($answer1["answer1"], 1),1) ?>)</p></li>
        <li class="question_avg"><p>Ερώτηση 2: &nbsp;(<?= number_format(round($answer2["answer2"], 1),1) ?>)</p></li>
        <li class="question_avg"><p>Ερώτηση 3: &nbsp;(<?= number_format(round($answer3["answer3"], 1),1) ?>)</p></li>
        <li class="question_avg"><p>Ερώτηση 4: &nbsp;(<?= number_format(round($answer4["answer4"], 1),1) ?>)</p></li>
        <li class="question_avg"><p>Σχόλια "Μου αρέσουν": &nbsp;(<?= $liked["liked"] ?>)</p></li>
        <li class="question_avg"><p>Σχόλια "Δεν μου αρέσουν": &nbsp;(<?= $disliked["disliked"] ?>)</p></li>
      </ul>

      <ul id="questions" class="questions cf questions-8" data-sku="9225441" style="left: 0%;">
          <li class="question question-current" data-id="561" data-index="0">
            <h3><b>Ερώτηση 1:</b>&nbsp; Πόσο καλή είναι η σχέση ποιότητας σε σχέση με την τιμή των προϊόντων;</h3>
		<ul class="cf">
		  <li>
			<input type="radio" name="answers1" id="answer_11" value="1" class="answer1 js-answer">
			<label class="icon answer" for="answer_11"><div><img class="cup-icons" src="../images/cups/cup1.png"/></div><div>Καθόλου</div></label>
		  </li>

		  <li>
			<input type="radio" name="answers1" id="answer_12" value="2" class="answer1 js-answer">
			<label class="icon answer" for="answer_12"><div><img class="cup-icons" src="../images/cups/cup2.png"/></div><div>Λίγο</div></label>
			
		  </li>

		  <li>
			<input type="radio" name="answers1" id="answer_13" value="3" class="answer1 js-answer">
			<label class="icon answer" for="answer_13"><div><img class="cup-icons" src="../images/cups/cup3.png"/></div><div>Αρκετά</div></label>
		  </li>

		  <li>
			<input type="radio" name="answers1" id="answer_14" value="4" class="answer1 js-answer">
			<label class="icon answer" for="answer_14"><div><img class="cup-icons" src="../images/cups/cup4.png"/></div><div>Πολύ</div></label>
		  </li>
		  
		  <li>
			<input type="radio" name="answers1" id="answer_15" value="5" class="answer1 js-answer">
			<label class="icon answer" for="answer_15"><div><img class="cup-icons" src="../images/cups/cup5.png"/></div><div>Πάρα πολύ</div></label>
		  </li>
		</ul>

          </li>
          <li class="question" data-id="562" data-index="1">
            <h3><b>Ερώτηση 2:</b>&nbsp; Πόσο καλή είναι η εξυπηρέτηση του καταστήματος;</h3>
		<ul class="cf">
		  <li>
			<input type="radio" name="answers2" id="answer_21" value="1" class="answer2 js-answer">
			<label class="icon answer" for="answer_21"><div><img class="cup-icons" src="../images/cups/cup1.png"/></div><div>Καθόλου</div></label>
		  </li>

		  <li>
			<input type="radio" name="answers2" id="answer_22" value="2" class="answer2 js-answer">
			<label class="icon answer" for="answer_22"><div><img class="cup-icons" src="../images/cups/cup2.png"/></div><div>Λίγο</div></label>
			
		  </li>

		  <li>
			<input type="radio" name="answers2" id="answer_23" value="3" class="answer2 js-answer">
			<label class="icon answer" for="answer_23"><div><img class="cup-icons" src="../images/cups/cup3.png"/></div><div>Αρκετά</div></label>
		  </li>

		  <li>
			<input type="radio" name="answers2" id="answer_24" value="4" class="answer2 js-answer">
			<label class="icon answer" for="answer_24"><div><img class="cup-icons" src="../images/cups/cup4.png"/></div><div>Πολύ</div></label>
		  </li>
		  
		  <li>
			<input type="radio" name="answers2" id="answer_25" value="5" class="answer2 js-answer">
			<label class="icon answer" for="answer_25"><div><img class="cup-icons" src="../images/cups/cup5.png"/></div><div>Πάρα πολύ</div></label>
		  </li>
		</ul>

          </li>
          <li class="question" data-id="563" data-index="2">
            <h3><b>Ερώτηση 3:</b>&nbsp; Πόσο έγκυρες είναι οι πληροφορίες του καταστήματος;</h3>
               <ul class="cf">
		  <li>
			<input type="radio" name="answers3" id="answer_31" value="1" class="answer3 js-answer">
			<label class="icon answer" for="answer_31"><div><img class="cup-icons" src="../images/cups/cup1.png"/></div><div>Καθόλου</div></label>
		  </li>

		  <li>
			<input type="radio" name="answers3" id="answer_32" value="2" class="answer3 js-answer">
			<label class="icon answer" for="answer_32"><div><img class="cup-icons" src="../images/cups/cup2.png"/></div><div>Λίγο</div></label>
			
		  </li>

		  <li>
			<input type="radio" name="answers3" id="answer_33" value="3" class="answer3 js-answer">
			<label class="icon answer" for="answer_33"><div><img class="cup-icons" src="../images/cups/cup3.png"/></div><div>Αρκετά</div></label>
		  </li>

		  <li>
			<input type="radio" name="answers3" id="answer_34" value="4" class="answer3 js-answer">
			<label class="icon answer" for="answer_34"><div><img class="cup-icons" src="../images/cups/cup4.png"/></div><div>Πολύ</div></label>
		  </li>
		  
		  <li>
			<input type="radio" name="answers3" id="answer_35" value="5" class="answer3 js-answer">
			<label class="icon answer" for="answer_35"><div><img class="cup-icons" src="../images/cups/cup5.png"/></div><div>Πάρα πολύ</div></label>
		  </li>
		</ul>

          </li>
		  <li class="question" data-id="564" data-index="2">
            <h3><b>Ερώτηση 4:</b>&nbsp; Πόση κίνηση είχε το κατάστημα;</h3>
               <ul class="cf">
		  <li>
			<input type="radio" name="answers4" id="answer_41" value="1" class="answer4 js-answer">
			<label class="icon answer" for="answer_41"><div><img class="cup-icons" src="../images/cups/cup1.png"/></div><div>Καθόλου</div></label>
		  </li>

		  <li>
			<input type="radio" name="answers4" id="answer_42" value="2" class="answer4 js-answer">
			<label class="icon answer" for="answer_42"><div><img class="cup-icons" src="../images/cups/cup2.png"/></div><div>Λίγο</div></label>
			
		  </li>

		  <li>
			<input type="radio" name="answers4" id="answer_43" value="3" class="answer4 js-answer">
			<label class="icon answer" for="answer_43"><div><img class="cup-icons" src="../images/cups/cup3.png"/></div><div>Αρκετά</div></label>
		  </li>

		  <li>
			<input type="radio" name="answers4" id="answer_44" value="4" class="answer4 js-answer">
			<label class="icon answer" for="answer_44"><div><img class="cup-icons" src="../images/cups/cup4.png"/></div><div>Πολύ</div></label>
		  </li>
		  
		  <li>
			<input type="radio" name="answers4" id="answer_45" value="5" class="answer4 js-answer">
			<label class="icon answer" for="answer_45"><div><img class="cup-icons" src="../images/cups/cup5.png"/></div><div>Πάρα πολύ</div></label>
		  </li>
		</ul>

          </li>
		  
		  <li class="question" data-id="565" data-index="2">
            <h3><b>Σχόλια:</b></h3>
               <ul class="cf">
		  <li class="comments">
			<textarea name="liked" id="liked" placeholder="Μου άρεσε (προεραιτικά)"><?= $_COOKIE[$shopid.'liked'] ?></textarea>
			<textarea name="disliked" id="disliked" placeholder="Δεν μου άρεσε (προεραιτικά)"><?= $_COOKIE[$shopid.'disliked'] ?></textarea>
		  </li>
		</ul>

          </li>
      </ul>
	  
</div>

<div class="userinfo">
	<p>Εισαγωγή στοιχείων: </p>
	<input required type="text" class="" name="username_review" id="username_review" placeholder="Ψευδώνυμο" value="<?= $_COOKIE[$shopid.'username_review'] ?>">
	<input required type="email" class="" name="email_review" id="email_review" placeholder="E-mail" value="<?= $_COOKIE[$shopid.'email_review'] ?>">
	<input type="hidden" name="shopid" value="<?= $shopid ?>">
	<input type="hidden" name="mylat" value="<?= $mylat ?>">
	<input type="hidden" name="mylng" value="<?= $mylng ?>">
</div>

<div class="controls">
	<p><span id="counter_questions"></span> από 5</p>
	<button type="button" class="btn btn-warning" id="previousquestion">Προηγούμενο</button>
	<button type="button" class="btn btn-warning" id="nextquestion">Επόμενο</button>
	<button class="btn btn-warning" id="saverating">Υποβολή</button>
</div>

</form>

<div class="all_reviews">
	  <?php
		$query2 = $connect->query("SELECT * FROM reviews WHERE `ShopID` ='$shopid' ORDER BY ReviewDate DESC");
		
		while($row = $query2->fetch_assoc()) 
		{
			?>
				<div class="review">
					<div class="review_details">
						<img src="../images/users/defaultimage.png" class="userphoto"/>
						<span><b>Ψευδώνυμο:</b> &nbsp;<?= $row['ReviewName'] ?></span> &nbsp;
						<span><b>E-mail:</b> &nbsp;<?= $row['ReviewE-mail'] ?></span>
					</div>
					<div class="review_details">
						<span><b>Ερώτηση 1:</b> &nbsp;<?= $row['Answer1'] ?></span>
						<span><b>Ερώτηση 2:</b> &nbsp;<?= $row['Answer2'] ?></span>
						<span><b>Ερώτηση 3:</b> &nbsp;<?= $row['Answer3'] ?></span>
						<span><b>Ερώτηση 4:</b> &nbsp;<?= $row['Answer4'] ?></span>
						<span><b>Μ.Ο:</b> &nbsp;<?= $row['AvgRate'] ?></span>
					</div>
					<div class="review_details">
					<?php if ($row['Liked'] != "" OR $row['Liked'] != NULL){ ?>
						<p><b>Μου αρέσει:</b> &nbsp;<?= $row['Liked'] ?></p>
					<?php } ?>
					<?php if ($row['Disliked'] != "" OR $row['Disliked'] != NULL){ ?>
						<p><b>Δεν μου αρέσει:</b> &nbsp;<?= $row['Disliked'] ?></p>
					<?php } ?>
					</div>
				</div>
			<?php
		}
	  ?>
	  
</div>
	  
</div>












	
</div>




<div class="secondary_column">


<ul class="menu_sidebar">
<li class="item_sidebar"><a href="#1">Στοιχεία Καταστήματος</a></li>
<li class="item_sidebar"><a href="#2">Επιπλέον Παροχές</a></li>
<li class="item_sidebar"><a href="#3">Μενού Προϊόντων</a></li>
<li class="item_sidebar"><a href="#4">Ωράριο Καταστήματος</a></li>
<li class="item_sidebar"><a href="#5">Φωτογραφίες</a></li>
<li class="item_sidebar"><a href="#6">Χάρτης/Πλοήγηση</a></li>
<li class="item_sidebar"><a href="#7">Αξιολογήσεις  <?php if ($avgrate["avg"] != 0){
												    ?>(<?= $totalreviews["total"] ?>)
													<?php } ?>
												   </a></li>
</ul>





</div>


	</div>


		

		 <script src="js/jquery-2.1.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/jquery.slimscroll.min.js"></script>


		
<script>


       
      
    </script>

	
	
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
		
		
<script>
var myrate = "<?= number_format(round($avgrate["avg"],1),1) ?>";
var getnum = myrate.split('.', 2);
var integernum = parseFloat(getnum[0]);
var floatnum = parseFloat("0." + getnum[1]);

for (i = 1; i <= myrate; i++){
	document.getElementById("star"+i).className = "fa fa-star";
	document.getElementById("star"+i).style.color = "#ffd534";
}
if (floatnum < 0.7 && floatnum > 0.3){
	var halfnum = integernum + 1;
	document.getElementById("star"+halfnum).className = "fa fa-star-half-o";
	document.getElementById("star"+halfnum).style.color = "#ffd534";
}
else if (floatnum > 0.7){
	var fullnum = integernum + 1;
	document.getElementById("star"+fullnum).className = "fa fa-star";
	document.getElementById("star"+fullnum).style.color = "#ffd534";
}

</script>


<script>
<?php if ( isset($_COOKIE[$shopid.'rate1'] , $_COOKIE[$shopid.'rate2'], $_COOKIE[$shopid.'rate3'], $_COOKIE[$shopid.'rate4'])){
	?>
	var saverating = document.getElementById('saverating');
    saverating.parentNode.removeChild(saverating);
	

	for (i=1; i<=5; i++){
		if (<?= $_COOKIE[$shopid.'rate1'] ?> == i){
			$("#answer_1" + i).prop("checked", true);
		}
		$("#answer_1" + i).prop("disabled", true);
	}
	for (i=1; i<=5; i++){
		if (<?= $_COOKIE[$shopid.'rate2'] ?> == i){
			$("#answer_2" + i).prop("checked", true);
		}
		$("#answer_2" + i).prop("disabled", true);
	}
	for (i=1; i<=5; i++){
		if (<?= $_COOKIE[$shopid.'rate3'] ?> == i){
			$("#answer_3" + i).prop("checked", true);
		}
		$("#answer_3" + i).prop("disabled", true);
	}
	for (i=1; i<=5; i++){
		if (<?= $_COOKIE[$shopid.'rate4'] ?> == i){
			$("#answer_4" + i).prop("checked", true);
		}
		$("#answer_4" + i).prop("disabled", true);
	}
	
	document.getElementById("username_review").disabled = true;
	document.getElementById("email_review").disabled = true;
	
	<?php
		if ( isset($_COOKIE[$shopid.'liked'])){
		?>
			document.getElementById("liked").disabled = true;
		<?php
		}
	
		if ( isset($_COOKIE[$shopid.'disliked'])){
		?>
			document.getElementById("disliked").disabled = true;
		<?php
		}
	?>
	
	
<?php
}
?>
</script>


<script>
var leftsize = document.getElementById('questions').style.left;
var getnum = leftsize.split('%', 2);
var oldsize = parseFloat(getnum[0]);
if (oldsize == 0){
	document.getElementById('previousquestion').disabled = true;
	document.getElementById('counter_questions').innerHTML = "1";
}

$(document).on('click', '#nextquestion', function(){
	var prev_counter_quest = parseFloat(document.getElementById('counter_questions').innerHTML);
	var next_counter_quest = prev_counter_quest + 1;
	document.getElementById('counter_questions').innerHTML = next_counter_quest;
	
	document.getElementById('previousquestion').disabled = false;
	var leftsize = document.getElementById('questions').style.left;
    var getnum = leftsize.split('%', 2);
	var oldsize = parseFloat(getnum[0]);
	var converter = oldsize - 100 + '%';
	var newsize = converter;
	if (newsize <= '-400%'){
		document.getElementById('questions').style.left = newsize;
		if (newsize == '-400%'){
			document.getElementById('nextquestion').disabled = true;
		}
	}
	
});
$(document).on('click', '#previousquestion', function(){
	var prev_counter_quest = parseFloat(document.getElementById('counter_questions').innerHTML);
	var next_counter_quest = prev_counter_quest - 1;
	document.getElementById('counter_questions').innerHTML = next_counter_quest;
	
	document.getElementById('nextquestion').disabled = false;
	var leftsize = document.getElementById('questions').style.left;
    var getnum = leftsize.split('%', 2);
	var oldsize = parseFloat(getnum[0]);
	var converter = oldsize + 100 + '%';
	var newsize = converter;
	if (newsize <= '0%'){
		document.getElementById('questions').style.left = newsize;
		if (newsize == '0%'){
			document.getElementById('previousquestion').disabled = true;
		}
	}
});



document.getElementById('saverating').disabled = true;
document.getElementById('saverating').style.display = "none";

var count = 0;

$('.answer1').click(function(){
	if ($("#answer_11").is(':checked') || $("#answer_12").is(':checked') || $("#answer_13").is(':checked') || $("#answer_14").is(':checked') || $("#answer_15").is(':checked')){
		count +=1;
	}
	if (count == 4){
		document.getElementById('saverating').disabled = false;
		document.getElementById('saverating').style.display = "inline";
	}
});
$('.answer2').click(function(){
	if ($("#answer_21").is(':checked') || $("#answer_22").is(':checked') || $("#answer_23").is(':checked') || $("#answer_24").is(':checked') || $("#answer_25").is(':checked')){
		count +=1;
	}
	if (count == 4){
		document.getElementById('saverating').disabled = false;
		document.getElementById('saverating').style.display = "inline";
	}
});
$('.answer3').click(function(){
	if ($("#answer_31").is(':checked') || $("#answer_32").is(':checked') || $("#answer_33").is(':checked') || $("#answer_34").is(':checked') || $("#answer_35").is(':checked')){
		count +=1;
	}
	if (count == 4){
		document.getElementById('saverating').disabled = false;
		document.getElementById('saverating').style.display = "inline";
	}
});
$('.answer4').click(function(){
	if ($("#answer_41").is(':checked') || $("#answer_42").is(':checked') || $("#answer_43").is(':checked') || $("#answer_44").is(':checked') || $("#answer_45").is(':checked')){
		count +=1;
	}
	if (count == 4){
		document.getElementById('saverating').disabled = false;
		document.getElementById('saverating').style.display = "inline";
	}
});

$(document).on('click', '#saverating', function(){
	var username_review = document.getElementById("username_review").value;
	var email_review = document.getElementById("email_review").value;
	if (count == 4){
		if (username_review != "" && email_review != ""){
			document.getElementById("review-form").submit();
		}else{
			alert("Συμπληρώστε τα στοιχεία σας");
		}
	}else{
		alert("Δεν απαντήσατε όλες τις ερωτήσεις");
	}
});

</script>




<script>
if (<?= $shop["ManualStatus"] ?> == "0" || <?= $shop["Status"] == "Closed" ?>){
	document.getElementById('main_shoppage').style.filter = "grayscale()";
}else{
	document.getElementById('main_shoppage').style.filter = "";
}
</script>


<script>
$(document).on('click', '.walk', function(){
	var mode = "WALKING";
	calculateAndDisplayRoute(mode);
	document.getElementById('walking').style.background = "#a7a7a7";
	document.getElementById('driving').style.background = "rgb(247, 247, 247)";
});
$(document).on('click', '.drive', function(){
	var mode = "DRIVING";
	calculateAndDisplayRoute(mode);
	document.getElementById('driving').style.background = "#a7a7a7";
	document.getElementById('walking').style.background = "rgb(247, 247, 247)";
});
</script>

	
	
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




	</script>
	
<script>
	
      function initMap() {
  
  
   var geocoder = new google.maps.Geocoder;
        var infowindow = new google.maps.InfoWindow;

      


        var rev_lat = <?= $mylat ?>;
        var rev_lng = <?= $mylng ?>;
        var rev_latlng = {lat: parseFloat(rev_lat), lng: parseFloat(rev_lng)};
        geocoder.geocode({'location': rev_latlng}, function(results, status) {
          if (status === 'OK') {
            if (results[0]) {
				var route = results[0].address_components[1].long_name;
				var street_number = results[0].address_components[0].long_name;
				var locality = results[0].address_components[2].long_name;
				var postal_code = results[0].address_components[7].long_name;
				var full_address = route + ' ' + street_number + ', ' + locality;
			  document.getElementById('breadcrumb_address').innerHTML = "<u><a href='./index.php'>Αρχική</a></u>  >  <u><a href='index.php?lat=<?= $mylat ?>&lng=<?= $mylng ?>'>"+ full_address + "</a></u>  >  <?= $shop['ShopName'] ?>";
            } else {
              window.alert('No results found');
            }
          } else {
            window.alert('Geocoder failed due to: ' + status);
          }
        });
  
  
  
  
        var bounds = new google.maps.LatLngBounds;
		
		var lat =  <?= $mylat ?>;
		var lng =  <?= $mylng ?>;
		
		var shoplat = <?= $shoplat ?>;
		var shoplng = <?= $shoplng ?>;
	
        var markersArray = [];

		
        var origin1 = {lat: lat, lng: lng}; //MyLocation
        var destinationB = {lat: shoplat, lng: shoplng}; //shop
 
        var destinationIcon = 'https://chart.googleapis.com/chart?' +
            'chst=d_map_pin_letter&chld=D|FF0000|000000';
        var originIcon = 'https://chart.googleapis.com/chart?' +
            'chst=d_map_pin_letter&chld=O|FFFF00|000000';
        var map = new google.maps.Map(document.getElementById('map1'), {

        });
        var geocoder = new google.maps.Geocoder;

        var service = new google.maps.DistanceMatrixService;
        service.getDistanceMatrix({
          origins: [origin1],
          destinations: [destinationB],
          travelMode: 'WALKING',
          unitSystem: google.maps.UnitSystem.METRIC,
          avoidHighways: false,
          avoidTolls: false
        }, function(response, status) {
          if (status !== 'OK') {
            alert('Error was: ' + status);
          } else {
            var originList = response.originAddresses;
            var destinationList = response.destinationAddresses;
            deleteMarkers(markersArray);

            var showGeocodedAddressOnMap = function(asDestination) {
              var icon = asDestination ? destinationIcon : originIcon;
              return function(results, status) {
                if (status === 'OK') {
                  map.fitBounds(bounds.extend(results[0].geometry.location));
                  markersArray.push(new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location,
                    icon: icon
                  }));
                } else {
                  alert('Geocode was not successful due to: ' + status);
                }
              };
            };

            for (var i = 0; i < originList.length; i++) {
              var results = response.rows[i].elements;
              geocoder.geocode({'address': originList[i]},
                  showGeocodedAddressOnMap(false));
              for (var j = 0; j < results.length; j++) {
                geocoder.geocode({'address': destinationList[j]},
                    showGeocodedAddressOnMap(true));
				walkingdistance.innerHTML = results[j].distance.value + ' μ.';
				walkingtime.innerHTML = results[j].duration.text;
              }
            }
          }
        });
		
		var service = new google.maps.DistanceMatrixService;
        service.getDistanceMatrix({
          origins: [origin1],
          destinations: [destinationB],
          travelMode: 'DRIVING',
          unitSystem: google.maps.UnitSystem.METRIC,
          avoidHighways: false,
          avoidTolls: false
        }, function(response, status) {
          if (status !== 'OK') {
            alert('Error was: ' + status);
          } else {
            var originList = response.originAddresses;
            var destinationList = response.destinationAddresses;
            deleteMarkers(markersArray);

            var showGeocodedAddressOnMap = function(asDestination) {
              var icon = asDestination ? destinationIcon : originIcon;
              return function(results, status) {
                if (status === 'OK') {
                  map.fitBounds(bounds.extend(results[0].geometry.location));
                  markersArray.push(new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location,
                    icon: icon
                  }));
                } else {
                  alert('Geocode was not successful due to: ' + status);
                }
              };
            };

            for (var i = 0; i < originList.length; i++) {
              var results = response.rows[i].elements;
              geocoder.geocode({'address': originList[i]},
                  showGeocodedAddressOnMap(false));
              for (var j = 0; j < results.length; j++) {
                geocoder.geocode({'address': destinationList[j]},
                    showGeocodedAddressOnMap(true));
				drivingdistance.innerHTML = results[j].distance.value + ' μ.';
				drivingtime.innerHTML = results[j].duration.text;
              }
            }
          }
        });
		
		
	    var geocoder = new google.maps.Geocoder;
        var infowindow = new google.maps.InfoWindow;

      


        var shoplat = <?= $shoplat ?>;
        var shoplng = <?= $shoplng ?>;
        var shoplatlng = {lat: parseFloat(shoplat), lng: parseFloat(shoplng)};
        geocoder.geocode({'location': shoplatlng}, function(results, status) {
          if (status === 'OK') {
            if (results[0]) {
			  document.getElementById('shopaddress').innerHTML = results[0].formatted_address;
            } else {
              window.alert('No results found');
            }
          } else {
            window.alert('Geocoder failed due to: ' + status);
          }
        });
		
		
		var mylat = <?= $mylat ?>;
        var mylng = <?= $mylng ?>;
        var mylatlng = {lat: parseFloat(mylat), lng: parseFloat(mylng)};
        geocoder.geocode({'location': mylatlng}, function(results, status) {
          if (status === 'OK') {
            if (results[0]) {
			  document.getElementById('myaddress').innerHTML = results[0].formatted_address;
			  var mode = "WALKING";
			  calculateAndDisplayRoute(mode);
			  document.getElementById('walking').style.background = "#a7a7a7";
			  document.getElementById('driving').style.background = "#e8e8e8";
            } else {
              window.alert('No results found');
            }
          } else {
            window.alert('Geocoder failed due to: ' + status);
          }
        });
		
		
		
		
	
		
      }

	  
	  
	  function calculateAndDisplayRoute(mode) {
		var directionsDisplay = new google.maps.DirectionsRenderer;
        var directionsService = new google.maps.DirectionsService;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 6,
		  scrollwheel: false,
		  gestureHandling: 'greedy',
          disableDefaultUI: false,
          center: {lat: 39.63, lng: 22.41}
        });
        directionsDisplay.setMap(map);
        directionsDisplay.setPanel(document.getElementById('right-panel'));
		  
        var start = document.getElementById('myaddress').innerHTML;
        var end = document.getElementById('shopaddress').innerHTML;
        directionsService.route({
          origin: start,
          destination: end,
          travelMode: mode
        }, function(response, status) {
          if (status == 'OK') {
			  document.getElementById('right-panel').style.display = "block";
            directionsDisplay.setDirections(response);
          }else{
			  document.getElementById('right-panel').style.display = "none";
			  var mode = "WALKING";
			  calculateAndDisplayRoute(mode);
		  }
        });
		document.getElementById('right-panel').innerHTML = "";
      }
	  
	  
      function deleteMarkers(markersArray) {
        for (var i = 0; i < markersArray.length; i++) {
          markersArray[i].setMap(null);
        }
        markersArray = [];
      }

	      

    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkvJXrumdVQLipE-6ZPa-kPoHXkkYjlnU&callback=initMap&language=el">
    </script>
	

	
	
	</body>
</html>
