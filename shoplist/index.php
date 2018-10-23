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
	

$mylat = $_GET['lat'];
$mylng = $_GET['lng'];

if (($mylat == "") OR ($mylng == "")){
	header("location: ../index.php");
}

		
?>
<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <title>CoffeeTime Shops</title>

        <link href="../css/font-awesome.css" rel="stylesheet">
        <link href="../css/simple-line-icons.css" rel="stylesheet">
		<link href="../css/app.css" rel="stylesheet">
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
						
<!-- Collect the nav links, forms, and other content for toggling -->

					</div>	
				</nav>				
			</div>	
            			
            <div class="clearfix"></div>
        </div>
<body class="notransition">
<div id="wrapper">




			<input id="searchInput" class="new_location" type="text" placeholder="Εισάγετε νέα διεύθυνση">
            <div id="mapView" class="min">
                <div class="mapPlaceholder"><span class="fa fa-spin fa-spinner"></span> Loading map...</div>
            </div>

<div class="filter-nav filter-nav-container-closed" id="bs-example-navbar-collapse-1">

<div class="filter">
                <div class="clearfix"></div>        
				<form action="javascript:void(0);" class="form cf filterForm">
					<section class="plan cf">
					<h3>Ταξινόμηση :</h3>
						<select class="sorting_list" id="fetchval">
							<option selected value="distance_asc">Απόσταση: Αύξουσα</option>
							<option value="distance_desc">Απόσταση: Φθίνουσα</option>
							<option value="rating_asc">Βαθμολογία: Αύξουσα</option>
							<option value="rating_desc">Βαθμολογία: Φθίνουσα</option>
							<option value="added_recently">Προστέθηκαν Πρόσφατα</option>
							<option value="alphabetical_sort">A-Z Ταξινόμηση</option>
						</select><br>
					</section><br>
					<section class="payment-plan cf">
						<h3>Κατάσταση :</h3>
						<input type="radio" name="radio2" id="open" value="open"><label class="open-label four col" for="open">Ανοιχτά</label>
						<input type="radio" name="radio2" id="close" value="close"><label class="close-label four col" for="close">Κλειστά</label>
					</section><br>
					<section class="plan cf">
						<h3>Δυνατότητες :</h3>
						<input type="radio" name="radio1" id="delivery" value="delivery"><label class="delivery-label four col" for="delivery">Delivery</label>
						<input type="radio" name="radio3" id="online" value="online"><label class="online-label four col" for="online">Online Delivery</label>
						<input type="radio" name="radio4" id="onhand" value="onhand"><label class="onhand-label four col" for="onhand">Καφέ στο χέρι</label>
					</section><br>
					<section class="plan cf">
						<h3>Παροχές :</h3>
						<input type="radio" name="radio5" id="wifi" value="wifi"><label class="wifi-label four col" for="wifi">WiFi</label>
						<input type="radio" name="radio6" id="cosmotetv" value="cosmotetv"><label class="cosmotetv-label four col" for="cosmotetv">Cosmote TV</label>
						<input type="radio" name="radio7" id="nova" value="nova"><label class="nova-label four col" for="nova">Nova</label>
					</section><br>
					<input class="clear_filters" type="submit" id="clearall" value="Καθαρισμος Φιλτρων"/>
					<select id="locationSelect" style="width: 100%; visibility: hidden;display:none;"></select>
				</form>
             </div>
								
</div>
			
			
            <div class="filter_banner">
				<button class="btn btn-default handleFilter">
					<span>Φίλτρα και ταξινόμηση &nbsp;</span>
					<span class="icon-equalizer"></span>
				</button>
			</div>
			
            <div id="content" class="max">
			<div id="map24" style="display:none;"></div>
            
				
				
				
				
		<div class="preload" id="preload">
			<div class="resultsList">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <a href="" class="card">
						<div class="figure">
							<div class="preload-general preload-image"></div>									
						</div>
						<h2 class="preload-general preload-title"></h2>
						<div class="preload-general preload-address"></div>
						<div class="preload-general preload-rating"></div>
						<ul class="preload-general preload-distance"></ul>
						<div class="clearfix"></div>
					</a>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <a href="" class="card">
						<div class="figure">
							<div class="preload-general preload-image"></div>									
						</div>
						<h2 class="preload-general preload-title"></h2>
						<div class="preload-general preload-address"></div>
						<div class="preload-general preload-rating"></div>
						<ul class="preload-general preload-distance"></ul>
						<div class="clearfix"></div>
					</a>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <a href="" class="card">
						<div class="figure">
							<div class="preload-general preload-image"></div>									
						</div>
						<h2 class="preload-general preload-title"></h2>
						<div class="preload-general preload-address"></div>
						<div class="preload-general preload-rating"></div>
						<ul class="preload-general preload-distance"></ul>
						<div class="clearfix"></div>
					</a>
                </div>
			</div>
		</div>
			
			
                <div class="resultsList" id="resultsList" style="display:none">
			<center><p id="shops_found"></p></center>
				<?php

	
$latitude1 = $mylat;
$longitude1 = $mylng;
	
$mylat_rad = deg2rad($mylat);
$mylng_rad = deg2rad($mylng);


require '../times.php';

  $query="SELECT shops.*, shopimages.*,
		ABS(ACOS(SIN(radians(shops.Maps_Lat))*SIN($mylat_rad)+COS(radians(shops.Maps_Lat))*COS($mylat_rad)*COS($mylng_rad-(radians(shops.Maps_Lng)))))* 6371 DISTANCE 
		FROM shopimages, shops WHERE shops.ShopID = shopimages.ShopID AND shopimages.Category = 'logo' ORDER BY shops.Status ASC, DISTANCE ASC";
  $output=mysqli_query($connect,$query);
  
  $counter = 0;
  
  while($fetch = mysqli_fetch_assoc($output))
  {
	$shopid = $fetch['ShopID'];
		if ($fetch["Active"] == "1"){
			
$result = $connect->query("SELECT count(*) as total FROM reviews WHERE ShopID = $shopid");
$totalreviews = $result->fetch_assoc();


$result = $connect->query("SELECT avg(AvgRate) as avg FROM reviews WHERE ShopID = $shopid");
$avgrate = $result->fetch_assoc();
			
$today = strtotime(date("D-m-y"));	
$regday = $fetch['RegisterDate']." + 1 week";

    $distance = $fetch['DISTANCE'] * 1000;
	
	if ($distance > 5000){
						
						continue;
					}
			$counter += 1;
    if ($fetch['Status'] == "Opened"){ ?>
		<form action="shop.php" method="GET" style="margin:0;">
			<?php include 'openedshops.php'; ?>
		</form>
		<?php
	}else{
		?>
		<form action="shop.php" method="GET" style="margin:0;">
			<?php include 'closedshops.php'; ?>
		</form>
		<?php
	}			
	
		}
		else{
			continue;
		}
		

	
  };
				
				if ($counter == 0){
					echo "<script>document.getElementById('shops_found').innerHTML = 'Δεν βρέθηκαν καφετέριες.';</script>";
				}else{
					echo "<script>document.getElementById('shops_found').innerHTML = 'Bρέθηκαν $counter καφετέριες στην περιοχή σου.';</script>";
				}
				?>
                    
                </div>

            </div>
            <div class="clearfix"></div>

        </div>
		
		
		<script type="text/javascript" src="js/markerclusterer.js"></script>

		 <script src="js/jquery-2.1.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/jquery.slimscroll.min.js"></script>
		
		




		
<script>
setTimeout(
	function() 
		{
			document.getElementById("preload").style.display = "none";
			$("#resultsList").fadeToggle(1000);
		}, 1000);
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
	$(".handleFilter").on("click",function()
{
	$(".filter-nav").removeClass("filter-nav-container-closed");
	$(".filter-nav").addClass("filter-nav-container");
	$(".side-nav-screen-hold").fadeIn("fast");
});

$(".side-nav-screen-hold").on("click", function()
{
	$(".filter-nav").removeClass("filter-nav-container");
	$(".filter-nav").addClass("filter-nav-container-closed");
	$(".side-nav-screen-hold").fadeOut("fast");
});
</script>
	
	
	
	<script>
		function myFunction(){document.getElementById("myDropdown").classList.toggle("show");}
window.onclick=function(event){if(!event.target.matches('.dropbtn')){var dropdowns=document.getElementsByClassName("dropdown-content");var i;for(i=0;i<dropdowns.length;i++){var openDropdown=dropdowns[i];if(openDropdown.classList.contains('show')){openDropdown.classList.remove('show');}}}}
function myFunction1(){document.getElementById("myDropdown1").classList.toggle("show");}
window.onclick=function(event){if(!event.target.matches('.dropbtnmobile')){var dropdowns=document.getElementsByClassName("dropdownmobile-content");var i;for(i=0;i<dropdowns.length;i++){var openDropdown=dropdowns[i];if(openDropdown.classList.contains('show')){openDropdown.classList.remove('show');}}}}
</script>


<script>
	// filters for shops
	$('#fetchval').prop('selectedIndex',0);			
	$('#delivery').attr('checked', false);
	$('#online').attr('checked', false);
	$('#onhand').attr('checked', false);
	$('#wifi').attr('checked', false);
	$('#cosmotetv').attr('checked', false);
	$('#nova').attr('checked', false);
	$('#open').attr('checked', false);
	$('#close').attr('checked', false);
	delivery.value = "";
	online.value = "";
	onhand.value = "";
	open.value = "";
	close.value = "";
	wifi.value = "";
	cosmotetv.value = "";
	nova.value = "";
	
	
	
	
$("#fetchval").change(function(){			   
	run_ajax_fetch();
});	

$("#open").change(function(){	
	var status = 'open';
	if(document.getElementById('open').checked) {
		close.value = "";
		$('#close').attr('checked', false);	
		open.value = status;
		run_ajax_fetch();
	}else{
		open.value = "";
	}
});

$("#close").change(function(){	
	var status = 'close';
	if(document.getElementById('close').checked) {
		open.value = "";
		$('#open').attr('checked', false);	
		close.value = status;
		run_ajax_fetch();
	}else{
		close.value = "";
	}
});

$("#delivery").change(function(){	
	if(document.getElementById('delivery').checked) {
		delivery.value = "delivery";
		run_ajax_fetch();
	}
});
$("#online").change(function(){	
	if(document.getElementById('online').checked) {
		online.value = "online";
		run_ajax_fetch();
	}
});
$("#onhand").change(function(){	
	if(document.getElementById('onhand').checked) {
		onhand.value = "onhand";
		run_ajax_fetch();
	}
});
$("#wifi").change(function(){	
	if(document.getElementById('wifi').checked) {
		wifi.value = "wifi";
		run_ajax_fetch();
	}
});
$("#cosmotetv").change(function(){	
	if(document.getElementById('cosmotetv').checked) {
		cosmotetv.value = "cosmotetv";
		run_ajax_fetch();
	}
});
$("#nova").change(function(){	
	if(document.getElementById('nova').checked) {
		nova.value = "nova";
		run_ajax_fetch();
	}
});


$("#clearall").click(function(){	
	$('#fetchval').prop('selectedIndex',0);			
	$('#delivery').attr('checked', false);
	$('#online').attr('checked', false);
	$('#onhand').attr('checked', false);
	$('#wifi').attr('checked', false);
	$('#cosmotetv').attr('checked', false);
	$('#nova').attr('checked', false);
	$('#open').attr('checked', false);
	$('#close').attr('checked', false);
	delivery.value = "";
	online.value = "";
	onhand.value = "";
	open.value = "";
	close.value = "";
	wifi.value = "";
	cosmotetv.value = "";
	nova.value = "";					 
	run_ajax_fetch();
});
	
		
function run_ajax_fetch(){
	$.ajax(
            {
                url:'fetch.php',
                type:'POST',
                data:open.value + '&' + close.value + '&' + delivery.value + '&' + online.value + '&' + wifi.value + '&' + cosmotetv.value + '&' + nova.value + '&' + onhand.value + '&' + fetchval.value + '&' + 'lat=<?= $mylat ?>' + '&' + 'lng=<?= $mylng ?>',
				dataType:'html',
                
                beforeSend:function()
                {	
                    $("#resultsList").html('');
					document.getElementById("preload").style.display = "inline";
					setTimeout(
					function() 
						{
							document.getElementById("preload").style.display = "none";
						}, 500);

					},
                success:function(data)
                {
					document.getElementById("resultsList").style.display = "none";
					setTimeout(
					function() 
						{
							$("#resultsList").html(data);
							$("#resultsList").fadeToggle(500);
						}, 500);
                    
                },
            });	
}
	
</script>


	<script>
	//script for height of map
	
	window.onload = function(){
		initMap();
	}
				
				
	var windowHeight;
    var windowWidth;
    var contentHeight;
    var contentWidth;
    var isDevice = true;
	
		var windowResizeHandler = function() {
        windowHeight = window.innerHeight;
        windowWidth = $(window).width();
        contentHeight = windowHeight - $('#header').height() - $('.filter_banner').height() - 30 //paddings 15px & 15px;
		mapheight = windowHeight - $('#header').height()
        contentWidth = $('#content').width();

        $('#leftSide').height(contentHeight);
        $('.closeLeftSide').height(contentHeight);
        $('#wrapper').height(contentHeight);
        $('#mapView').height(mapheight);
        $('#content').height(contentHeight);

        
            $('.bigNav').slimScroll({
                height : contentHeight
            });
    }

    windowResizeHandler();
	$('body').removeClass('notransition');


	</script>
	
	
	<script>	

	// the map
	
	  var mylat = <?= $mylat ?>;
	  var mylng = <?= $mylng ?>;
		//Markers in map
      var map;
      var markers = [];
      var infoWindow;
	  
	  
	var options = {
            mapTypeId : 'Styled',
			gestureHandling: 'greedy',
            disableDefaultUI: false,
            mapTypeControlOptions : {
                mapTypeIds : [ '' ]
            }
        };
    var styles = [];
	
	
	var icon_cluster = [[{
        url: '../images/cluster/cluster_icon.png',
        height: 40,
        width: 40,
        anchor: [0, 0],
        textColor: '#ffffff',
        textSize: 12,
        iconAnchor: [15, 48]
      }]];
	
	
	
    // calculations for elements that changes size on window resize
    function initMap(status1) {
	   map = new google.maps.Map(document.getElementById('mapView'), options);
        var styledMapType = new google.maps.StyledMapType(styles, {
            name : 'Styled'
        });

        map.mapTypes.set('Styled', styledMapType);


        map.setCenter(new google.maps.LatLng(mylat,mylng));

	 

	var controlDiv = document.createElement('div');
	
	var firstChild = document.createElement('button');
	firstChild.style.backgroundColor = '#fff';
	firstChild.style.border = 'none';
	firstChild.style.outline = 'none';
	firstChild.style.width = '28px';
	firstChild.style.height = '28px';
	firstChild.style.borderRadius = '2px';
	firstChild.style.boxShadow = '0 1px 4px rgba(0,0,0,0.3)';
	firstChild.style.cursor = 'pointer';
	firstChild.style.marginRight = '10px';
	firstChild.style.padding = '0px';
	firstChild.title = 'Your Location';
	controlDiv.appendChild(firstChild);
	
	var secondChild = document.createElement('div');
	secondChild.style.margin = '5px';
	secondChild.style.width = '18px';
	secondChild.style.height = '18px';
	secondChild.style.backgroundImage = 'url(https://maps.gstatic.com/tactile/mylocation/mylocation-sprite-1x.png)';
	secondChild.style.backgroundSize = '180px 18px';
	secondChild.style.backgroundPosition = '0px 0px';
	secondChild.style.backgroundRepeat = 'no-repeat';
	secondChild.id = 'you_location_img';
	firstChild.appendChild(secondChild);


firstChild.addEventListener('click', function() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function (p) {
			var LatLng = new google.maps.LatLng(p.coords.latitude, p.coords.longitude);
			
			var cur_url = window.location.pathname ;
		
			window.open(cur_url + "?lat=" + p.coords.latitude + "&lng=" + p.coords.longitude,"_self");
    });
} else {
    alert('Geo Location feature is not supported in this browser.');
}
		
	});
	
	controlDiv.index = 1;
	map.controls[google.maps.ControlPosition.RIGHT_TOP].push(controlDiv);

       

		
        infoWindow = new google.maps.InfoWindow();

         var address = 'Greece' //my city;
         var geocoder = new google.maps.Geocoder();
         geocoder.geocode({address: address}, function(results, status) {
           if (status == google.maps.GeocoderStatus.OK) {
            searchLocationsNear(results[0].geometry.location);
           } else {
             alert('Error!! Please refresh the page');
           }
         });


		
		

    
	
       function clearLocations() {
         infoWindow.close();
         for (var i = 0; i < markers.length; i++) {
           markers[i].setMap(null);
         }
         markers.length = 0;
       }
	
       function searchLocationsNear(center) {
         clearLocations();

		 var status = status1;
         var searchUrl = 'storelocator1.php?lat=' + mylat + '&lng=' + mylng + '&status=' + status;
         downloadUrl(searchUrl, function(data) {
           var xml = parseXml(data);
           var markerNodes = xml.documentElement.getElementsByTagName("marker");
           var bounds = new google.maps.LatLngBounds();
           for (var i = 0; i < markerNodes.length; i++) {
             var id = markerNodes[i].getAttribute("id");
             var logo = markerNodes[i].getAttribute("image");
             var name = markerNodes[i].getAttribute("name");
             var address = markerNodes[i].getAttribute("country");
             var address1 = markerNodes[i].getAttribute("address");
             var addressnum = markerNodes[i].getAttribute("addressnum");
             var city = markerNodes[i].getAttribute("city");
             var tk = markerNodes[i].getAttribute("tk");
             var distance = parseFloat(markerNodes[i].getAttribute("distance"));
             var latlng = new google.maps.LatLng(
                  parseFloat(markerNodes[i].getAttribute("lat")),
                  parseFloat(markerNodes[i].getAttribute("lng")));

			 var fulladress = address1 + ' ' + addressnum + ', ' + city + ', ' + tk;
             createMarker(latlng, name, fulladress, logo, id);
            bounds.extend(latlng);
           }
		   
		  
		   var mcOptions = {
			   maxZoom: 14,
			   styles: icon_cluster[0],
			   imagePath: '../images/cluster/m'
			   };
		   var markerCluster = new MarkerClusterer(map, markers, mcOptions);
		   
		   
		   
		   if (markerNodes.length == 0){
				map = new google.maps.Map(document.getElementById('mapView'), options);
        var styledMapType = new google.maps.StyledMapType(styles, {
            name : 'Styled'
        });

        map.mapTypes.set('Styled', styledMapType);


        map.setCenter(new google.maps.LatLng(mylat,mylng));
				map.setZoom(14);
				
				var home = '../images/home_marker.ico';
		   		var marker = new google.maps.Marker({
				  position: {lat: mylat, lng: mylng},
				  icon: home,
				  map: map
				});
				var html = "<b>Βρίσκεστε εδώ</b>";
					google.maps.event.addListener(marker, 'click', function() {
					infoWindow.setContent(html);
					infoWindow.open(map, marker);
				  });
				var latlng = new google.maps.LatLng(mylat , mylng);
				 bounds.extend(latlng);
				die();
		   }
		   
				var home = '../images/home_marker.ico';
		   		var marker = new google.maps.Marker({
				  position: {lat: mylat, lng: mylng},
				  icon: home,
				  map: map
				});
				var html = "<b>Βρίσκεστε εδώ</b> ";
					google.maps.event.addListener(marker, 'click', function() {
					infoWindow.setContent(html);
					infoWindow.open(map, marker);
				  });
				var latlng = new google.maps.LatLng(mylat , mylng);
				 bounds.extend(latlng);

		  

		   
           map.fitBounds(bounds);

            });
       }

              function createMarker(latlng, name, fulladress, logo, id) {
          var infoboxContent = '<div class="infoW">' +
                                    '<a href="shop.php?shopid='+ id + '&shopname='+ name + '&lat=' + mylat + '&lng=' + mylng +'"><div class="propImg">' +
                                        '<img src="../'+ logo +'">' +
                                        '<div class="propBg">' +
                                        '</div>' +
                                    '</div></a>' +
                                    '<div class="paWrapper">' +
                                        '<div class="propTitle">' + 
										'<a href="shop.php?shopid='+ id + '&shopname='+ name + '&lat=' + mylat + '&lng=' + mylng +'">' + name + '</a></div>' +
                                        '<div class="propAddress"> '+ fulladress +' </div>' +
                                    '</div>' +
                                    '<div class="clearfix"></div>' +
                                    '<div class="infoButtons">' +
                                    '</div>' +
                                 '</div>';
		  var image = '../images/map-marker1.png';
          var marker = new google.maps.Marker({
			icon: image,
            map: map,
            position: latlng
          });
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(infoboxContent);
            infoWindow.open(map, marker);
          });
          markers.push(marker);
        }
		$(document).on('click', '.closeInfo', function() {
                infoWindow.open(null,null);
            });
			
		google.maps.event.addListener(map, 'click', function() {
			infoWindow.close();
		});



	
       function downloadUrl(url, callback) {
          var request = window.ActiveXObject ?
              new ActiveXObject('Microsoft.XMLHTTP') :
              new XMLHttpRequest;

          request.onreadystatechange = function() {
            if (request.readyState == 4) {
              request.onreadystatechange = doNothing;
              callback(request.responseText, request.status);
            }
          };

          request.open('GET', url, true);
          request.send(null);
       }

       function parseXml(str) {
          if (window.ActiveXObject) {
            var doc = new ActiveXObject('Microsoft.XMLDOM');
            doc.loadXML(str);
            return doc;
          } else if (window.DOMParser) {
            return (new DOMParser).parseFromString(str, 'text/xml');
          }
       }
		
       function doNothing() {}
	}	

		</script>
		
		
  <script>	
function newaddress() {
    var map = new google.maps.Map(document.getElementById('map24'), {
    });
    var input = document.getElementById('searchInput');

    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    var infowindow = new google.maps.InfoWindow();
    var marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29)
    });
	var circle = new google.maps.Circle({
});
circle.bindTo('center', marker, 'position');

    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }
  
        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }
        //Location details
        var url_lat = place.geometry.location.lat();
        var url_lon = place.geometry.location.lng();
		
		var cur_url = window.location.pathname ;
		
		window.open(cur_url + "?lat=" + url_lat + "&lng=" + url_lon,"_self");	
    });
}
</script>	
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkvJXrumdVQLipE-6ZPa-kPoHXkkYjlnU&libraries=places&callback=newaddress&language=el" async defer></script>
	

		
</body>
</html>