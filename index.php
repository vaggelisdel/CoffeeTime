<?php
/* Displays user information and some useful messages */
require_once 'connection.php';
	//adasdad
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


?>


<!DOCTYPE HTML>
<html>
<head>
<title>CoffeeTime</title>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-7192053518977487",
    enable_page_level_ads: true
  });
</script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="keywords" content="Eatery Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->



<!-- Custom Theme files -->
<link href="css/style_home.css" rel='stylesheet' type='text/css' />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">


<link rel="shortcut icon" href="favicon.ico">
<!-- Custom Theme files -->
</head>
<body>
<!--banner-->							
	<div class="banner">
		<!--header-->
		<header>
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
							<a class="navbar-brand" href="index.php"> <img src="images/coffeetime_logo.png" alt=""/> </a>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						
						
						
						
						
						



<div class="side-nav-screen-hold" style="display:none"></div>



	
						
						<div class="side-nav side-nav-container-closed" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
							
							<li>
							<?php
		if ( $_SESSION['onlinee'] == 1 ) {
			?>
		<div class="headbar">
			<div class="dropdownmobile">
				<img src="<?= $user2['UserImage']; ?>" height="33" width="33" style="border-radius: 50%;object-fit: cover;object-position: 0 0%;">				
					<button onclick="myFunction1()" class="dropbtnmobile"><?= $user1['UserName']. ' '; ?><i class="fa fa-chevron-circle-down" id="icodrpodn"></i></button>
					<div id="myDropdown1" class="dropdownmobile-content">
					<a href="users/dashboard"><i class="icon-user2" id="icologout"></i> Το Προφίλ</a>
					<a href="users/login/logout.php"><i class="icon-log-out" id="icologout"></i> Αποσύνδεση</a>
					</div>
			</div>
		</div>
		<?php
		}else if ( $_SESSION['online_shop'] == 1 ) {
			?>
		<div class="headbar">
			<div class="dropdownmobile">
				<img src="<?= $shop2['Image']; ?>" height="33" width="33" style="border-radius: 50%;object-fit: cover;object-position: 0 0%;">				
					<button onclick="myFunction1()" class="dropbtnmobile"><?= $shop1['ShopUsername']. ' '; ?><i class="fa fa-chevron-circle-down" id="icodrpodn"></i></button>
					<div id="myDropdown1" class="dropdownmobile-content">
					<a href="business/panel"><i class="icon-user2" id="icologout"></i> Πίνακας Ελέγχου</a>
					<a href="business/login/logout.php"><i class="icon-log-out" id="icologout"></i> Αποσύνδεση</a>
					</div>
			</div>
		</div>
		<?php
		}else if ( $_SESSION['adminonline'] == 1 ) {
			?>
		<div class="headbar">
			<div class="dropdownmobile">
				<img src="<?= $admin2['AdminImage']; ?>" height="33" width="33" style="border-radius: 50%;object-fit: cover;object-position: 0 0%;">				
					<button onclick="myFunction1()" class="dropbtnmobile"><?= $admin1['UserName']. ' '; ?><i class="fa fa-chevron-circle-down" id="icodrpodn"></i></button>
					<div id="myDropdown1" class="dropdownmobile-content">
					<a href="admin/panel"><i class="icon-user2" id="icologout"></i> Πίνακας Ελέγχου</a>
					<a href="admin/login/logout.php"><i class="icon-log-out" id="icologout"></i> Αποσύνδεση</a>
					</div>
			</div>
		</div>
		<?php
		}else{
						?>
						<div class="dropdownmobile">		
						<button onclick="location.href='users/login'" class="dropbtnmobile"><?php echo 'Σύνδεση / Εγγραφή'; ?></button>
						</div>
						<?php
					}
		?>	</li>
							
								<li><a href="index.php" class="active">Αρχική</a></li>
								<li><a href="about.html">Πληροφορίες</a></li>
								<li><a href="contact.html">Επικοινωνία</a></li>
								<li>
								<?php
		if ( $_SESSION['onlinee'] == 1 ) {
			?>
			
			<div class="dropdown">
				<img src="<?= $user2['UserImage']; ?>" height="33" width="33" style="float: left;border-radius: 50%;object-fit: cover;object-position: 0 0%;">				
				
					<button onclick="myFunction()" class="dropbtn"><?= $user1['UserName']. ' '; ?><i class="fa fa-chevron-circle-down" id="icodrpodn"></i></button>
					<div id="myDropdown" class="dropdown-content">
					<a href="users/dashboard"> Το Προφίλ</a>
					<a href="users/login/logout.php"> Αποσύνδεση</a>
					</div>
				</div>
		<?php
		}else{
			
					if ( $_SESSION['online_shop'] == 1 ) {
						?>
			
						<div class="dropdown">
						<img src="<?= $shop2['Image']; ?>" height="33" width="33" style="float: left; border-radius: 50%;object-fit: cover;object-position: 0 0%;">
				
						<button onclick="myFunction()" class="dropbtn"><?= $shop1['ShopUsername']. ' '; ?><i class="fa fa-chevron-circle-down" id="icodrpodn"></i></button>
						<div id="myDropdown" class="dropdown-content">
							<a href="business/panel"><i class="icon-user2" id="icologout"></i> Πίνακας Ελέγχου</a>
							<a href="business/login/logout.php"><i class="icon-log-out" id="icologout"></i> Αποσύνδεση</a>
						</div>
						</div>
						<?php
					}elseif ($_SESSION['adminonline'] == 1){
						?>
						<div class="dropdown">
				<img src="<?= $admin2['AdminImage']; ?>" height="33" width="33" style="float: left;border-radius: 50%;object-fit: cover;object-position: 0 0%;">								
					<button onclick="myFunction()" class="dropbtn"><?= $admin1['UserName']. ' '; ?><i class="fa fa-chevron-circle-down" id="icodrpodn"></i></button>
					<div id="myDropdown" class="dropdown-content">
					<a href="admin/panel"><i class="icon-user2" id="icologout"></i> Πίνακας Ελέγχου</a>
					<a href="admin/login/logout.php"><i class="icon-log-out" id="icologout"></i> Αποσύνδεση</a>
					</div>
				</div>
						<?php
					}
					else{
						?>
						<div class="dropdown">		
						<button onclick="location.href='users/login'" class="dropbtn"><?php echo 'Σύνδεση / Εγγραφή'; ?></button>
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
		</header>	
		<!--//header-->
	   
		<!--//End-slider-script -->
		<div class="banner-title">
		  <div  id="top" class="callbacks_container">
		    <div class="container">		


<!-- Modal -->
<div class="modal fade" id="myModalHorizontal" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
	
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Aυτόματος εντοπισμός τοποθεσίας
                </h4>
            </div>
            <form action="shoplist/index.php" method="GET">
            <!-- Modal Body -->
			<p id="error"></p>
			<p id="address_full"></p>
            <div class="modal-body">
                  <div class="form-group">
				
			<div style="display:none;">
				<input type="text" name="lat" id="lat" value=""><br>
				<input type="text" name="lng" id="lng" value="">
				<input type="text" id="latlng1" value="">
			</div>	  

		
			

            <div id="map"></div>

					
                  </div>
				 
			
		
		</div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button id="finishbtn" class="btn btn-primary">
                    Επιβεβαίωση
                </button>
            </div>
			</form>
        </div>
				
    </div>
</div>

			
		  	<ul class="rslides" id="slider3">

			 <li>
		  	  <div class="slide_text">
			  
			  <center>
			  		<div role="tabpanel" id="addresspanel" class="tab-pane active fadeIn">
					
					<form action="shoplist/index.php" method="GET">

					
					<center><p class="slogan">LIFE BEGINS AFTER COFFEE!</p></center>
			    		<div class="form-group">
					<div class="icon-addon addon-lg">
						<input class="form-control" id="searchInput" type="text" placeholder="Εισάγετε τη διεύθυνσή σας...">
						<label class="glyphicon glyphicon-map-marker"></label>
					</div>
					<input type="submit" name="" id="searchshops" class="searchshops" value="Αναζητηση"><br>
				</div>
							
									 
									 <center>
									 <div class="auto">
									 <label class="labels_auto">ή</label><br>
									 <label class="labels_auto">Επιλέξτε τον αυτόματο εντοπισμό τοποθεσίας <button type="button" id="map-address" class="findme">εδώ <i id="position" class="fa fa-street-view" aria-hidden="true"></i></button></label>
									 </div>
									 </center>
									 
            <div hidden id="map"></div>
			<div style="display:none;">
          	<input type="text" name="" id="location" value=""><br>
			<input type="text" name="" id="route" value=""><br>
			<input type="text" name="" id="street_number" value=""><br>
			<input type="text" name="" id="postal_code" value=""><br>
			<input type="text" name="" id="locality" value=""><br>
			<input type="text" name="lat" id="lat1" value=""><br>
			<input type="text" name="lng" id="lng1" value="">
			</div>
			
			</form>
</div>
</center>
			    
			  </div>
			 </li>
			</ul>
		  </div>
		</div>
	</div>
  </div>
<!--//banner-->
<div class="grid_1">
	<div class="col-md-6 image-container1">
       <img src="images/coffee1.jpeg" class="img-responsive" alt=""/>
    </div>
    <div class="col-md-6 content-wrap1">
        <h2>Our chef recommends</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mollis in ipsum eu pretium. Sed auctor augue at vestibulum euismod. Integer feugiat nisi id lectus rhoncus euismod ac vel urna. Nunc non venenatis magna, quis congue justo. Cras rhoncus arcu dolor, vitae semper elit tincidunt vel..</p>
		<p>Morbi mi massa, condimentum in imperdiet vel, pretium at nisl. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam erat volutpat. Curabitur nec est quis eros rhoncus molestie. Pellentesque at placerat mass.</p>
		<a class="hvr-bounce-to-top" href="#">Check our Offer</a>
    </div><!-- /.col-md-6 -->
    <div class="clearfix"> </div>
</div>		
<div class="grid_2">
	<div class="col-md-6 content-wrap">
        <h2>Our chef recommends</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mollis in ipsum eu pretium. Sed auctor augue at vestibulum euismod. Integer feugiat nisi id lectus rhoncus euismod ac vel urna. Nunc non venenatis magna, quis congue justo. Cras rhoncus arcu dolor, vitae semper elit tincidunt vel..</p>
		<p>Morbi mi massa, condimentum in imperdiet vel, pretium at nisl. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam erat volutpat. Curabitur nec est quis eros rhoncus molestie. Pellentesque at placerat mass.</p>
		<a class="hvr-bounce-to-top" href="#">Check our Offer</a>
    </div><!-- /.col-md-6 -->
    <div class="col-md-6 image-container">
       <img src="images/coffee2.jpeg" class="img-responsive" alt=""/>
    </div>
    <div class="clearfix"> </div>
</div>
<div class="menu">
  <div class="container">
     <div class="image-right-top"><img src="images/2_2.png" alt=""/></div>
        <div class="menu_box">
           <!--Column-->
    	     <div class="col-md-4 col_1">
        	<!--Block-->
                <div class="title-icon"><span class="icon_2">1</span></div>
                <div class="title"><h3>− Breakfast −</h3></div>
                
                <h4>Here will be food name</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                <h5>$6.66</h5>
                
                <h4>Here will be food name</h4>
                <p>Lorem Ipsum is simply dummy text.</p>
                <h5>$7.66</h5>
                
                <h4>Here will be food name</h4>
                <h5>$2.66</h5>
                
                <h4>Here will be food name</h4>
                <h5>$5.66</h5>
                
                <h4>Here will be food name</h4>
                <p>Lorem Ipsum is simply dummy.</p>
                <h5>$8.66</h5>
                
                <h4>Here will be food name</h4>
                <h5>$7.66</h5>
           </div>
           <!--Column-->
           <div class="col-md-4 col_1">
        	<!--Menu Block-->
                <div class="title-icon"><span class="icon_2">2</span></div>
                <div class="title"><h3>− Lunch −</h3></div>
                
                <h4>Here will be food name</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                <h5>$8.66</h5>
                
                <h4>Here will be food name</h4>
                <p>Lorem Ipsum is simply dummy text.</p>
                <h5>$5.66</h5>
                
                <h4>Here will be food name</h4>
                <h5>$9.66</h5>
                
                <h4>Here will be food name</h4>
                <h5>$10.66</h5>
                
                <h4>Here will be food name</h4>
                <p>Lorem Ipsum is simply dummy.</p>
                <h5>$15.66</h5>
                
                <h4>Here will be food name</h4>
                <h5>$25.66</h5>
          </div>
          <div class="col-md-4 col_1">
        	<!--Menu Block-->
                <div class="title-icon"><span class="icon_2">3</span></div>
                <div class="title"><h3>− Dinner −</h3></div>
                
                <h4>Here will be food name</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                <h5>$15.66</h5>
                
                <h4>Here will be food name</h4>
                <p>Lorem Ipsum is simply dummy text.</p>
                <h5>$8.66</h5>
                
                <h4>Here will be food name</h4>
                <h5>$5.66</h5>
                
                <h4>Here will be food name</h4>
                <h5>$15.66</h5>
                
                <h4>Here will be food name</h4>
                <p>Lorem Ipsum is simply dummy.</p>
                <h5>$35.66</h5>
                
                <h4>Here will be food name</h4>
                <h5>$45.66</h5>
          </div>
          <div class="clearfix"> </div>
        </div>
    </div>
</div>

<div class="footer">
	<div class="container">
	    <div class="col-md-6 col_2">
		  <ul><li><h5>Tuesday to Friday</h5><p>Lunch: <span>12pm – 03pm</span></p><p>Dinner: <span>05pm – 10pm</span></p></li>
		    <li><h5>Saturday &amp; Sunday</h5><p>Lunch: <span>11pm – 05pm</span></p><p>Dinner: <span>04pm – 11pm</span></p></li>
		  </ul>
		</div>
		<div class="col-md-6 col_3">
		  <div class="col_3">
		  <ul class="menu">
            <li><a href="#">Home</a></li> |
            <li><a href="#">About</a></li> |
            <li><a href="#">Services</a></li> |
            <li><a href="#">Gallery</a></li> |
            <li><a href="#">Contact</a></li>
		  </ul>
		   <p>Copyright © 2015 Eatery. All Rights Reserved.Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
		  </div>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>



<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>


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
	
	//Dropdown menu when logged in
	
	function myFunction(){document.getElementById("myDropdown").classList.toggle("show");}
window.onclick=function(event){if(!event.target.matches('.dropbtn')){var dropdowns=document.getElementsByClassName("dropdown-content");var i;for(i=0;i<dropdowns.length;i++){var openDropdown=dropdowns[i];if(openDropdown.classList.contains('show')){openDropdown.classList.remove('show');}}}}
function myFunction1(){document.getElementById("myDropdown1").classList.toggle("show");}
window.onclick=function(event){if(!event.target.matches('.dropbtnmobile')){var dropdowns=document.getElementsByClassName("dropdownmobile-content");var i;for(i=0;i<dropdowns.length;i++){var openDropdown=dropdowns[i];if(openDropdown.classList.contains('show')){openDropdown.classList.remove('show');}}}}


//Static header

$(window).scroll(function(){
    if ($(window).scrollTop() >= 50) {
       $('header').addClass('fixed-header');
    }
    else {
       $('header').removeClass('fixed-header');
    }
});
</script>
<!------ Eng Light Box ------>	   

	
	
	

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkvJXrumdVQLipE-6ZPa-kPoHXkkYjlnU&libraries=places&language=el&callback=initMap" async defer></script>


	<script defer>
// Get lat long from geolocation

			if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function (p) {
        var LatLng = new google.maps.LatLng(p.coords.latitude, p.coords.longitude);


		
		document.getElementById("lat").value = p.coords.latitude;
		document.getElementById("lng").value = p.coords.longitude; 
		document.getElementById("latlng1").value = p.coords.latitude + "," + p.coords.longitude;


    });
} else {
    alert('Geo Location feature is not supported in this browser.');
}



//Autocomplete form address

		document.getElementById("searchshops").disabled = true;
function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 39.63523845279954, lng: 22.418949127197266},
      zoom: 13
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
  map: map,
  radius: 200,    // 10 miles in metres
  strokeWeight: 0,
  fillColor: 'blue',
  fillOpacity: 0.2
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
        marker.setIcon(({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
        }));
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);
    
        var address = '';
        if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }
    
        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        infowindow.open(map, marker);
      
        //Location details
        for (var i = 0; i < place.address_components.length; i++) {
            if(place.address_components[i].types[0] == 'postal_code'){
                document.getElementById('postal_code').value = place.address_components[i].long_name;
            }
			if(place.address_components[i].types[0] == 'locality'){
                document.getElementById('locality').value = place.address_components[i].long_name;
            }
			if(place.address_components[i].types[0] == 'route'){
                document.getElementById('route').value = place.address_components[i].long_name;
            }
			if(place.address_components[i].types[0] == 'street_number'){
                document.getElementById('street_number').value = place.address_components[i].long_name;
            }
        }
        document.getElementById('location').value = place.formatted_address;
		document.getElementById('lat1').value = place.geometry.location.lat();
        document.getElementById('lng1').value= place.geometry.location.lng();
		document.getElementById("searchshops").disabled = false;
    });
	
}



//Automatic find your location
	
	$('#map-address').on('click', function () {
		

    
    $('#myModalHorizontal').modal({
        backdrop: 'static',
        keyboard: true
    }).on('shown.bs.modal', function () {
		
		    
		  
		var geocoder = new google.maps.Geocoder;
        var infowindow = new google.maps.InfoWindow;

        var input = document.getElementById('latlng1').value;
        var latlngStr = input.split(',', 2);
        var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
        geocoder.geocode({'location': latlng}, function(results, status) {
          if (status === 'OK') {
            if (results[0]) {
			  document.getElementById('address_full').innerHTML = results[0].formatted_address;
            } else {
              window.alert('No results found');
            }
          }
        });
				  
			  
		
      var lat = parseFloat(document.getElementById("lat").value);
	  var lng = parseFloat(document.getElementById("lng").value);
	  
	  if (document.getElementById("lat").value == ""){
		var uluru = {lat: 39.639022, lng: 22.419125};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 6,
          center: uluru,
		  scrollwheel: false
        });
		document.getElementById('error').innerHTML = "Δυστυχώς δεν βρέθηκε η τοποθεσία σας. <br>Εισάγετε την διεύθυνσή σας χειροκίνητα.";
		document.getElementById('map').style.filter = "grayscale(100%)";
		document.getElementById('address_full').style.display = "none";
		document.getElementById("finishbtn").disabled = true;
	  }else{
		document.getElementById('error').style.display = "none";
        var uluru = {lat: lat, lng: lng};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
		  styles: 
		  [
    {
        "featureType": "administrative",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#444444"
            }
        ]
    },
    {
        "featureType": "administrative.country",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "administrative.country",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#656565"
            }
        ]
    },
    {
        "featureType": "administrative.country",
        "elementType": "labels.text",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "administrative.locality",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "all",
        "stylers": [
            {
                "color": "#f2f2f2"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.attraction",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.business",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.government",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "poi.government",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "poi.medical",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "hue": "#1cff00"
            },
            {
                "lightness": "-5"
            },
            {
                "saturation": "5"
            },
            {
                "weight": "1.92"
            },
            {
                "gamma": "1.00"
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "poi.place_of_worship",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "poi.place_of_worship",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.school",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "all",
        "stylers": [
            {
                "saturation": -100
            },
            {
                "lightness": 45
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#e9e9e9"
            },
            {
                "saturation": "-17"
            },
            {
                "lightness": "-50"
            },
            {
                "gamma": "8.07"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels.text",
        "stylers": [
            {
                "saturation": "100"
            },
            {
                "color": "#aeaeae"
            },
            {
                "weight": "0.01"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "labels.text",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit.line",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit.line",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit.line",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit.station.airport",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "transit.station.airport",
        "elementType": "labels.text",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "transit.station.rail",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "transit.station.rail",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#e50000"
            }
        ]
    },
    {
        "featureType": "transit.station.rail",
        "elementType": "labels.text",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "transit.station.rail",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#00bcff"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    }
],
          center: uluru
        });
		var home = 'images/home_marker.ico';
        var marker = new google.maps.Marker({
          position: uluru,
		  icon: home,
          map: map
        });

	  }
	
    });
});


    </script>
	
	
</body>
</html>