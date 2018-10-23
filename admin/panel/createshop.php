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
        <li class="treeview">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Πίνακας Ελέγχου</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
		<li class="active treeview">
          <a href="#">
            <i class="fa fa-shopping-bag"></i><span>Καταστήματα</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="shops.php"><i class="fa fa-circle-o"></i>Προβολή Όλων</a></li>
			<li  class="active"><a href="createshop.php"><i class="fa fa-circle-o"></i>Δημιουργία</a></li>
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
		<center>
	<?php 
		if ($_SESSION['messagebox'] == ''){
			?>
			<div style="">
	<?php
		}else{
			?>
			<div id="msgbox" style="background: rgba(40, 210, 40, 0.61);
    font-size: 20px;
	text-shadow: 2px 1.5px 3px black;
    font-family: monospace;
    color: rgb(255, 255, 255);
    padding: 10px;
    margin-bottom: 15px;">
		<button type="button" class="close" id="closemsg" onclick="myFunctionClosemsg()" data-dismiss="modal">&times;</button>
		   <?php echo $_SESSION['messagebox']; 
		   $_SESSION['messagebox'] = '';
		   ?>
		</div>
	<?php
		}
	?>
		
	</center>
		   <div class="box box-info">
            <div class="box-header with-border">


			<form action="confirm_shop_create.php" method="post" enctype="multipart/form-data">
			<div class="inlinedisplay">
				<div class="col-sm-6">
					<p>Τωρινή Ημερομηνία: <b><?php echo $datetime["datetime"]; ?></b></p>	
				</div>
				<div class="col-sm-6">
					<button id="addnewshop" name="addnewshop" class="btn btn-danger updatechanges">Αποθήκευση και κλείσιμο</button>
					<button id="addnewshopandnew" name="addnewshopandnew" class="btn btn-danger updatechanges">Αποθήκευση και δημιουργία νέου</button>
				</div>
			</div>
			  <div class="box-body">


			  
<div class="row">
                    <!-- Column -->
					
					
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-12 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-block">
                                <div class="form-horizontal form-material">
								<input type="hidden" name="createdby" value="<?= $_SESSION['username']; ?>"/>
                                    <div class="form-group col-sm-12">
                                        <label>Όνομα καταστήματος</label>
                                            <input required type="text" name="shopname" value="" class="form-control form-control-line">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <div class="flex_error"><label>Ψευδώνυμο καταστήματος</label><span id="availability"></span></div>
                                            <input required type="text" id="username" name="username" value="" class="form-control form-control-line">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Κωδικός</label>
                                            <input required type="password" name="password" value="" class="form-control form-control-line" name="example-email" id="example-email">
                                    </div>
									<div class="form-group col-sm-6">
                                        <label>Τηλέφωνο επικοινωνίας</label>
                                            <input required type="text" name="phone" value="" class="form-control form-control-line">
                                    </div>
									<div class="form-group col-sm-6">
                                        <label>Τηλέφωνο επικοινωνίας 2</label>
                                            <input type="text" name="phone2" value="" class="form-control form-control-line">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <div class="flex_error"><label>E-mail</label><span id="availability1"></span></div>
                                            <input required type="email" id="email" name="email" value="" class="form-control form-control-line">
                                    </div>
									<div class="form-group col-sm-6">
                                        <div class="flex_error"><label>Αναζήτηση δ/νσης</label></div>
                                            <input type="text" id="address_search" name="address_search" value="" class="form-control form-control-line">
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<div class="card">
                            <div class="card-block">
							
								<div class='map-wrapper'>
      <div id="map"></div>
	  
    </div>

								<style>
							 #map {
							   width: 100%;
							   height: 300px;
							   background-color: grey;
							 }
						</style>
						</div>
                        </div>
						
						
						<div class="card">
                            <div class="card-block">
                                <div class="form-horizontal form-material">
								<div class="form-group col-sm-6">
                                        <label>Οδός</label>
                                            <input required type="text" name="address" id="route" value="" class="form-control form-control-line" name="example-email" id="example-email">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Αριθμός</label>
                                            <input required type="text" name="addressno" id="street_number" value="" class="form-control form-control-line">
                                    </div>
									<div class="form-group col-sm-6">
                                        <label>Πόλη</label>
                                            <input required type="text" name="city" id="locality" value="" class="form-control form-control-line">
                                    </div>
									<div class="form-group col-sm-6">
                                        <label>TK</label>
                                            <input required type="text" name="tk" id="postal_code" value="" class="form-control form-control-line">
                                    </div>
									<div class="form-group col-sm-6">
                                        <label>Latitude</label>
                                            <input required type="text" name="maplat" id="lat" value="" class="form-control form-control-line">
                                    </div>
									<div class="form-group col-sm-6">
                                        <label>Longitude</label>
                                            <input required type="text" name="maplng" id="lng" value="" class="form-control form-control-line">
                                    </div>
								
								</div>
							</div>
						</div>
						
						
						<br>
						<div class="card">
                            <div class="card-block">
							<input required class="uploadform" type="file" name="file"><br>
						</div>
                        </div>
						<br>
						
						
						
<div class="card">
    <div class="card-block">
	<div class="form-group col-sm-12 tabledays">								
<table>
  <tr class="firstrow">
    <th>Ημέρα</th>
    <th>Ανοίγει</th>
    <th>Κλείνει</th>
  </tr>
  <tr>
    <td>Δευτέρα</td>
    <td><center><input type="text" required id="time" name="monday_open" value=""></center></td>
    <td><center><input type="text" required id="time1" name="monday_close" value=""></center></td>
  </tr>
  <tr>
    <td>Τρίτη</td>
    <td><center><input type="text" required id="time2" name="tuesday_open" value=""></center></td>
    <td><center><input type="text" required id="time3" name="tuesday_close"value=""></center></td>
  </tr>
  <tr>
    <td>Τετάρτη</td>
    <td><center><input type="text" required id="time4" name="wednesday_open" value=""></center></td>
    <td><center><input type="text" required id="time5" name="wednesday_close" value=""></center></td>
  </tr>
  <tr>
    <td>Πέμπτη</td>
    <td><center><input type="text" required id="time6" name="thursday_open" value=""></center></td>
    <td><center><input type="text" required id="time7" name="thursday_close" value=""></center></td>
  </tr>
  <tr>
    <td>Παρασκευή</td>
    <td><center><input type="text" required id="time8" name="friday_open" value=""></center></td>
    <td><center><input type="text" required id="time9" name="friday_close" value=""></center></td>
  </tr>
  <tr>
    <td>Σάββατο</td>
    <td><center><input type="text" required id="time10" name="saturday_open" value=""></center></td>
    <td><center><input type="text" required id="time11" name="saturday_close" value=""></center></td>
  </tr>
    <tr>
    <td>Κυριακή</td>
    <td><center><input type="text" required id="time12" name="sunday_open" value=""></center></td>
    <td><center><input type="text" required id="time13" name="sunday_close" value=""></center></td>
  </tr>
</table>
	
</div>
   </div>
</div>	



	<div class="form-group col-sm-2">
			<input type="checkbox" name="delivery" value="0"> Delivery	
	</div>
	<div class="form-group col-sm-2">
			<input type="checkbox" name="standupcoffee" value="0"> Καφές στο χέρι	
    </div>
	<div class="form-group col-sm-2">
		<input type="checkbox" name="onlinedelivery" value="0"> Online παραγγελίες
    </div>
	<div class="form-group col-sm-2">
			<input type="checkbox" name="wifi" value="0"> WiFi	
    </div>	
	<div class="form-group col-sm-2">
			<input type="checkbox" name="otetv" value="0"> Cosmote TV	
    </div>
	<div class="form-group col-sm-2">
			<input type="checkbox" name="nova" value="0"> Nova	
    </div>	




                    <!-- Column -->
                </div>


</div>

</div>
		  
		  

      
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



<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script src="js/classie.js"></script>



		<script type="text/javascript" src="js/moment-with-locales.min.js"></script>
		<script type="text/javascript" src="js/bootstrap-material-datetimepicker.js"></script>


	
  <script src="js/jquery-ui.min.js"></script>
  
  
  <script>
function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 39.63523845279954, lng: 22.418949127197266},
      zoom: 6,
	  scrollwheel: true,
	  gestureHandling: 'greedy'
    });
    var input = document.getElementById('address_search');

    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    var marker = new google.maps.Marker({
        map: map,
		draggable: true,
        anchorPoint: new google.maps.Point(0, -29)
    });
	
	google.maps.event.addListener(marker, 'drag', function() {
		var lat = marker.getPosition().lat();
		var lng = marker.getPosition().lng();
		updateMarkerPosition(lat, lng);
	});
	google.maps.event.addListener(marker, 'dragend', function() {
		var geocoder = new google.maps.Geocoder;
        var lat = document.getElementById('lat').value;
        var lng = document.getElementById('lng').value;
		
		var latlng = {lat: parseFloat(lat), lng: parseFloat(lng)};
        geocoder.geocode({'location': latlng}, function(results, status) {
          if (status === 'OK') {
            if (results[0]) {
			  var route = results[0].address_components[1].long_name;
			  var street_number = results[0].address_components[0].long_name;
			  var locality = results[0].address_components[2].long_name;
			  var postal_code = results[0].address_components[7].long_name;
			  updateMarkerAddress(route, street_number, locality, postal_code);
			  document.getElementById('address_search').value = results[0].formatted_address;
            } else {
              window.alert('No results found');
            }
          } else {
            window.alert('Geocoder failed due to: ' + status);
          }
        });
  });

    autocomplete.addListener('place_changed', function() {
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
        document.getElementById('lat').value = place.geometry.location.lat();
        document.getElementById('lng').value = place.geometry.location.lng();
    });
	
	function updateMarkerPosition(lat, lng){
		document.getElementById('lat').value = lat;
		document.getElementById('lng').value = lng;
	}
	
	function updateMarkerAddress(route, street_number, locality, postal_code){
		document.getElementById('route').value = route;
		document.getElementById('street_number').value = street_number;
		document.getElementById('locality').value = locality;
		document.getElementById('postal_code').value = postal_code;
	}
	
	
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkvJXrumdVQLipE-6ZPa-kPoHXkkYjlnU&libraries=places&callback=initMap&language=el" async defer></script>

  
  
  
  
  
  
  
  
  
  
  
  
  

  <script>
function myFunctionClosemsg() {
    document.getElementById("msgbox").style.display = "none";
}
</script>

</body>
</html>


<script>  
 $(document).ready(function(){  
   $('#email').blur(function(){

     var email = $(this).val();

     $.ajax({
      url:'check_shop.php',
      method:"POST",
      data:{e_mail:email},
      success:function(data)
      {
       if(data != '0')
       {
        $('#availability1').html('<span class="text-danger">Μη διαθέσιμο E-mail</span>');
		$('#addnewshop').attr("disabled", true);
		$('#addnewshopandnew').attr("disabled", true);
       }
       else
       {
        $('#availability1').html('<span class="text-success">Διαθέσιμο E-mail</span>');
		$('#addnewshop').attr("disabled", false);
		$('#addnewshopandnew').attr("disabled", false);
       }
      }
     })

  });
 });  
</script>

<script>  
 $(document).ready(function(){  
   $('#username').blur(function(){

     var username = $(this).val();

     $.ajax({
      url:'check_shop.php',
      method:"POST",
      data:{user_name:username},
      success:function(data)
      {
       if(data != '0')
	   {
        $('#availability').html('<span class="text-danger">Μη διαθέσιμο ψευδώνυμο</span>');
		$('#addnewshop').attr("disabled", true);
		$('#addnewshopandnew').attr("disabled", true);
       }
       else
       {
        $('#availability').html('<span class="text-success">Διαθέσιμο ψευδώνυμο</span>');
		$('#addnewshop').attr("disabled", false);
		$('#addnewshopandnew').attr("disabled", false);
       }
      }
     })

  });
 });  
</script>
<script type="text/javascript">

		$(document).ready(function()
		{
			$('#date').bootstrapMaterialDatePicker
			({
				time: false,
				clearButton: true
			});

			$('#time').bootstrapMaterialDatePicker
			({
				date: false,
				shortTime: false,
				format: 'HH:mm'
			});
			$('#time1').bootstrapMaterialDatePicker
						({
							date: false,
							shortTime: false,
							format: 'HH:mm'
						});
			$('#time2').bootstrapMaterialDatePicker
						({
							date: false,
							shortTime: false,
							format: 'HH:mm'
						});
			$('#time3').bootstrapMaterialDatePicker
						({
							date: false,
							shortTime: false,
							format: 'HH:mm'
						});
			$('#time4').bootstrapMaterialDatePicker
						({
							date: false,
							shortTime: false,
							format: 'HH:mm'
						});
			$('#time5').bootstrapMaterialDatePicker
						({
							date: false,
							shortTime: false,
							format: 'HH:mm'
						});
			$('#time6').bootstrapMaterialDatePicker
						({
							date: false,
							shortTime: false,
							format: 'HH:mm'
						});
			$('#time7').bootstrapMaterialDatePicker
						({
							date: false,
							shortTime: false,
							format: 'HH:mm'
						});
			$('#time8').bootstrapMaterialDatePicker
						({
							date: false,
							shortTime: false,
							format: 'HH:mm'
						});
			$('#time9').bootstrapMaterialDatePicker
						({
							date: false,
							shortTime: false,
							format: 'HH:mm'
						});
			$('#time10').bootstrapMaterialDatePicker
						({
							date: false,
							shortTime: false,
							format: 'HH:mm'
						});
			$('#time11').bootstrapMaterialDatePicker
						({
							date: false,
							shortTime: false,
							format: 'HH:mm'
						});
			$('#time12').bootstrapMaterialDatePicker
						({
							date: false,
							shortTime: false,
							format: 'HH:mm'
						});
			$('#time13').bootstrapMaterialDatePicker
						({
							date: false,
							shortTime: false,
							format: 'HH:mm'
						});

			$('#date-format').bootstrapMaterialDatePicker
			({
				format: 'dddd DD MMMM YYYY - HH:mm'
			});
			$('#date-fr').bootstrapMaterialDatePicker
			({
				format: 'DD/MM/YYYY HH:mm',
				lang: 'fr',
				weekStart: 1, 
				cancelText : 'ANNULER',
				nowButton : true,
				switchOnClick : true
			});

			$('#date-end').bootstrapMaterialDatePicker
			({
				weekStart: 0, format: 'DD/MM/YYYY HH:mm'
			});
			$('#date-start').bootstrapMaterialDatePicker
			({
				weekStart: 0, format: 'DD/MM/YYYY HH:mm', shortTime : true
			}).on('change', function(e, date)
			{
				$('#date-end').bootstrapMaterialDatePicker('setMinDate', date);
			});

			$('#min-date').bootstrapMaterialDatePicker({ format : 'DD/MM/YYYY HH:mm', minDate : new Date() });

			$.material.init()
		});

		</script>