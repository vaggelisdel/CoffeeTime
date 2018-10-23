<?php
include 'same2all/CHECKING_ALL.php';

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CoffeeTime Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta http-equiv="refresh" content="300"> <!-- Refresh every 5 minutes -->
  
  <?php include 'linkfiles.html'; ?>
  
  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


    <!-- Header Navbar: style can be found in header.less -->
    <?php
		include 'same2all/HEADER.php';
	?>
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->


      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">ΜΕΝΟΥ ΠΛΟΗΓΗΣΗΣ</li>
        <li class="active treeview">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Πίνακας Ελέγχου</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-bag"></i><span>Καταστήματα</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="shops.php"><i class="fa fa-circle-o"></i>Προβολή Όλων</a></li>
			<li><a href="createshop.php"><i class="fa fa-circle-o"></i>Δημιουργία</a></li>
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-user-md"></i><span>Διαχειριστές</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="admins.php"><i class="fa fa-circle-o"></i>Προβολή Όλων</a></li>
			<li><a href="createadmin.php"><i class="fa fa-circle-o"></i>Δημιουργία</a></li>
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i><span>Χρήστες</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="users.php"><i class="fa fa-circle-o"></i>Προβολή Όλων</a></li>
			<li><a href="createuser.php"><i class="fa fa-circle-o"></i>Δημιουργία</a></li>
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-flag"></i>
            <span>Ειδοποιήσεις</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="allnotifications.php"><i class="fa fa-circle-o"></i>Προβολή Όλων</a></li>
			<li><a href="addnotification.php"><i class="fa fa-circle-o"></i>Δημιουργία</a></li>
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-star"></i>
            <span>Αξιολογήσεις</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="allratings.php"><i class="fa fa-circle-o"></i>Προβολή Όλων</a></li>
          </ul>
        </li>
        

       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $shops["shopstotal"];?></h3>

              <p>Καταστήματα</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="shops.php" class="small-box-footer">Εμφάνιση όλων <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $users["userstotal"];?></h3>

              <p>Χρήστες</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-contacts"></i>
            </div>
            <a href="users.php?username=&search=" class="small-box-footer">Εμφάνιση όλων <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
		        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $admins["adminstotal"];?></h3>

              <p>Διαχειριστές</p>
            </div>
            <div class="icon">
              <i class="ion ion-settings"></i>
            </div>
            <a href="admins.php" class="small-box-footer">Εμφάνιση όλων <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $msg["msgtotal"];?></h3>

              <p>Ειδοποιήσεις</p>
            </div>
            <div class="icon">
              <i class="ion ion-chatboxes"></i>
            </div>
            <a href="allnotifications.php" class="small-box-footer">Εμφάνιση όλων <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
        
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->
    
          <!-- /.box -->
          <div class="row">
            <!-- /.col -->			
			
			<div class="col-md-7">
			<div class="box box-info">
            <div class="box-header with-border">
                  <h3 class="box-title">Χάρτης καταστημάτων</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
 
                  </div>
                </div>
			  <div class="box-body">
			  <select hidden id="locationSelect" style="width: 100%; visibility: hidden"></select>
		  <div id="map" class="fh5co-map"></div>
	<style>
 #map {
   width: 100%;
   height: 400px;
   background-color: grey;
 }
</style>
</div>

</div>
</div>
			
			
			<div class="col-md-5">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Τελευταίες προσθήκες καταστημάτων</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
 
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    <?php
								$query = $connect->query("SELECT shopimages.*, shops.*, DATE(shops.RegisterDate) AS Regdate FROM shops, shopimages WHERE `Category`='logo' AND shops.ShopID = shopimages.ShopID ORDER BY RegisterDate DESC LIMIT 12;");

if($query->num_rows) {
		while($r = $query->fetch_assoc()) {
			
			?>
					<li>
                      <a target="_blank" href="editshop.php?editinfo=&shopid=<?= $r["ShopID"];?>"> <img src="../../<?php echo $r["Image"]; ?>" alt="Shop Image"></a> 
					  <a target="_blank" href="editshop.php?editinfo=&shopid=<?= $r["ShopID"];?>" class="users-list-name"><?php echo $r["ShopName"]; ?></a>
                      <span class="users-list-date"><?php echo $r["Regdate"]; ?></span>
                    </li>
			<?php 
		}
						} 
			?>
                    
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            
			
			
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Τελευταίες προσθήκες χρηστών</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
 
                  </div>
                </div>
				
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    <?php
								$query = $connect->query("SELECT users.*, userimages.*, DATE(users.RegisterDate) AS Regdate FROM users, userimages WHERE users.UserID = userimages.UserID ORDER BY RegisterDate DESC LIMIT 8;");

if($query->num_rows) {
		while($r = $query->fetch_assoc()) {
			
			?>
					<li>
					<div align="center">
					<a target="_blank" href="editusers.php?edituser=&userid1=<?php echo $r["UserID"]; ?>&username=<?php echo $r["UserName"]; ?>" class="users-list-name">
					<div class="userimage" style="
						background-image:url(../../<?php echo $r["UserImage"]; ?>); 
						background-size:cover;     height: 50px;
						width: 50px;
						border-radius: 50%;
						max-width: 50px;
						max-height: 50px;
					"></div>
					</a>
					  <a target="_blank" href="editusers.php?edituser=&userid1=<?php echo $r["UserID"]; ?>&username=<?php echo $r["UserName"]; ?>" class="users-list-name"><?php echo $r["UserName"]; ?></a>
                      <span class="users-list-date"><?php echo $r["Regdate"]; ?></span>
					</div>
                    </li>
			<?php 
		}
						} 
			?>
                    
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->

                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->


		  
		  


        </div>
        <!-- /.col -->


        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->


<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script type="text/javascript" src="js/markerclusterer.js"></script>



<script>
      var map;
      var markers = [];
      var infoWindow;
      var locationSelect;
	  
	  
	  var icon_cluster = [[{
        url: '../../images/cluster/cluster_icon.png',
        height: 40,
        width: 40,
        anchor: [0, 0],
        textColor: '#ffffff',
        textSize: 12,
        iconAnchor: [15, 48]
      }]];
	  
	  
	  
	  var mylat = 37.9838096;
	  var mylng = 23.727538800000048;

        function initMap() {
		var mylocation = {lat: mylat, lng: mylng};
          map = new google.maps.Map(document.getElementById('map'), {
			  center: mylocation,
            mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU}
          });
          infoWindow = new google.maps.InfoWindow();

         var address = 'Greece' //my city;
         var geocoder = new google.maps.Geocoder();
         geocoder.geocode({address: address}, function(results, status) {
           if (status == google.maps.GeocoderStatus.OK) {
            searchLocationsNear(results[0].geometry.location);
           } else {
             alert(address + ' not found');
           }
         });

          locationSelect = document.getElementById("locationSelect");
          locationSelect.onchange = function() {
            var markerNum = locationSelect.options[locationSelect.selectedIndex].value;
            if (markerNum != "none"){
              google.maps.event.trigger(markers[markerNum], 'click');
            }
          };
		  		  

        }

    

       function clearLocations() {
         infoWindow.close();
         for (var i = 0; i < markers.length; i++) {
           markers[i].setMap(null);
         }
         markers.length = 0;

         locationSelect.innerHTML = "";
         var option = document.createElement("option");
         option.value = "none";
         option.innerHTML = "See all results:";
         locationSelect.appendChild(option);
       }

       function searchLocationsNear(center) {
         clearLocations();

         var radius = 310.685596; //miles radius
         var searchUrl = 'storelocator.php?lat=' + mylat + '&lng=' + mylng + '&radius=' + radius;
         downloadUrl(searchUrl, function(data) {
           var xml = parseXml(data);
           var markerNodes = xml.documentElement.getElementsByTagName("marker");
           var bounds = new google.maps.LatLngBounds();
           for (var i = 0; i < markerNodes.length; i++) {
             var id = markerNodes[i].getAttribute("id");
             var name = markerNodes[i].getAttribute("name");
             var address = markerNodes[i].getAttribute("city");
             var distance = parseFloat(markerNodes[i].getAttribute("distance"));
             var latlng = new google.maps.LatLng(
                  parseFloat(markerNodes[i].getAttribute("lat")),
                  parseFloat(markerNodes[i].getAttribute("lng")));

             createOption(latlng, name, i, id);
             createMarker(latlng, name, id);
            bounds.extend(latlng);
           }		   
		   
		   
		   var mcOptions = {
			   maxZoom: 15,
			   styles: icon_cluster[0],
			   imagePath: '../images/cluster/m'
			   };
		   var markerCluster = new MarkerClusterer(map, markers, mcOptions);

		   
           map.fitBounds(bounds);

    
		   locationSelect.style.visibility = "visible";
           locationSelect.onchange = function() {
             var markerNum = locationSelect.options[locationSelect.selectedIndex].value;
             google.maps.event.trigger(markers[markerNum], 'click');
           };
         });
       }

          function createMarker(latlng, name, id) {
			  var html = '<a href="./editshop.php?editinfo=&shopid='+ id +'">' + name + '</a>';
			  var image = '../../images/map-marker1.png';
			  var marker = new google.maps.Marker({
				icon: image,
				map: map,
				position: latlng
			  });
			  google.maps.event.addListener(marker, 'click', function() {
				infoWindow.setContent(html);
				infoWindow.open(map, marker);
			  });
			  markers.push(marker);
			}


       function createOption(name, distance, num) {
          var option = document.createElement("option");
          option.value = num;
          option.innerHTML = name;
          locationSelect.appendChild(option);
       }

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
  </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkvJXrumdVQLipE-6ZPa-kPoHXkkYjlnU&language=el&callback=initMap">
    </script>



</body>
</html>
