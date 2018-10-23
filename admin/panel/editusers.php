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
		<li class="active treeview">
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


					<?php

	require_once '../../connection.php';

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
} 

if(isset($_GET['username']) && isset($_GET['edituser']) && isset($_GET['userid1'])) {
	$username = $connect->escape_string($_GET['username']);
	$userid1 = $connect->escape_string($_GET['userid1']);

	$result7 = $connect->query("SELECT * FROM users WHERE `UserID` ='$userid1'");
	$user7 = $result7->fetch_assoc();
	
	$result8 = $connect->query("SELECT * FROM userimages WHERE `UserID` ='$userid1'");
	$user8 = $result8->fetch_assoc();

}
?>

<form action="edituser_actions.php" method="post">
<input type="hidden" name="userid1" value="<?= $user7['UserID']; ?>">
		<button onclick="myFunctionDelete()" type="button" class="delete_btns">Διαγραφή αυτού του χρήστη</button>

		<div id="displayoptions" style="display:none;">
		<button name="deletebtnyes" class="btn1 btn-lg btn-success">ΝΑΙ  <span class="glyphicon glyphicon-thumbs-up"></span></button>
		  <button onclick="myFunctionDeleteNo()" type="button" id="deleteno" class="btn1 btn-lg btn-danger">ΟΧΙ  <span class="glyphicon glyphicon-thumbs-down"></span></button>
		</div>
		
		</form>


		   <div class="box box-info">
            <div class="box-header with-border">
              
			  <form action="edituser_actions.php" method="post" enctype="multipart/form-data">
			  <div class="inlinedisplay">
				  <div class="col-sm-6 headinfo">
					<p>Τελευταία σύνδεση: <b><?= $user7['LastUserLogin']; ?></b></p>	
				</div>
				<div class="col-sm-6">
					<button id="edituserinfobtn" name="edituserinfobtn" class="btn btn-danger updatechanges">Αποθήκευση αλλαγών</button>
				</div>
			</div>

	

			  <div class="box-body">

<div class="row">
					<div class="col-lg-4 col-xlg-3 col-md-5">
						<div class="card">
                            <div class="card-block">
                                <center class="m-t-30"> <img src="../../<?= $user8['UserImage']; ?>" class="img-circle" width="150" />
                                    <h4 class="card-title m-t-10"><?= $user7['UserName']; ?></h4>
                                    <?php $_SESSION['userimage'] = $user8['UserImage']; ?>
                                </center>
                            </div>
                        </div>
												
						<div class="card">
                            <div class="card-block">
							<input class="uploadform" type="file" name="file"><br>
						</div>
                        </div>
						
												
                    </div>
					
					<div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-block">
                                <div class="form-horizontal form-material">
								<input type="hidden" name="userid1" value="<?= $user7['UserID']; ?>">
								<input type="hidden" name="lastlogin" value="<?= $user7['LastUserLogin']; ?>">
                                    <div class="form-group col-sm-6">
                                        <div class="flex_error"><label>User Name</label><span id="availability"></span></div>
                                            <input type="text" id="username" name="username" value="<?= $user7['UserName']; ?>" class="form-control form-control-line">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>First Name</label>
                                            <input type="text" name="firstname" value="<?= $user7['FirstName']; ?>" class="form-control form-control-line" name="example-email" id="example-email">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Last Name</label>
                                            <input type="text" name="lastname" value="<?= $user7['Surname']; ?>" class="form-control form-control-line">
                                    </div>
									<div class="form-group col-sm-6">
                                        <div class="flex_error"><label>Email</label><span id="availability1"></span></div>
                                            <input type="email" id="email" name="email" value="<?= $user7['E-mail']; ?>" class="form-control form-control-line">
                                    </div>
									<div class="form-group col-sm-6">
                                        <label>Birthday</label>
                                            <input type="date" name="birthday" value="<?= $user7['Birthday']; ?>" class="form-control form-control-line">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Password</label>
                                            <input type="password" name="password" placeholder="Enter new Password" class="form-control form-control-line" name="example-email" id="example-email">
                                    </div>
									<div class="form-group col-sm-6">
										<label>Status</label>
										<select class="editinput" name="active" style="background: transparent; border: 1px solid #d9d9d9; color: #7b7b7b; width: 100% !important; font-weight: 300 !important;text-transform: unset !important;">
																	<?php
																	require_once '../../connection.php';
																	
																	$query = "SELECT * FROM `users` WHERE `UserID` = '$userid1';";


																	$result1 = mysqli_query($connect, $query);
																	while($row1 = mysqli_fetch_array($result1)) 
																	{ 
	
																	if ($row1[8] == '1'){
																		?>
																		<option selected name="active" value="1">Active</option>
																		<option name="active" value="0">Inactive</option>
																		<?php
																	}else{
																		?>
																		<option selected name="active" value="0">Inactive</option>
																		<option name="active" value="1">Active</option>
																		<?php
																	}
																	?>
	
																	<?php 
																		} 
																			?>
	
																</select>
									</div>
									<div class="form-group col-sm-6">
                                        <label>Description</label>
                                            <input type="text" name="description" value="<?= $user7["Description"] ?>" class="form-control form-control-line" name="example-email" id="example-email">
                                    </div>
									</div>
                            </div>
                        </div>
                                
						

</form>


                    <!-- Column -->
                </div>
					
					
</div>

</div>

</div>
		  
		  

      
        </div>
        <!-- /.col -->
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

<script>
function myFunctionDelete(){
   $("#displayoptions").fadeIn();
	document.getElementById('displayoptions').style.display = "inline";
}
function myFunctionDeleteNo(){
	$("#displayoptions").fadeOut();
}
</script>


<script>



      function initMap() {
	
	$('#map-address').on('click', function () {
    
    $('#myModalHorizontal').modal({
        backdrop: 'static',
        keyboard: true
    }).on('shown.bs.modal', function () {
		
		var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 6,
		  scrollwheel: false,
          center: {lat: 39.639010, lng: 22.418669}
        });

	
    });
});





      }

      function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('autocomplete').value;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location
            });
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
		
      }
    </script>
	
	
		
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkvJXrumdVQLipE-6ZPa-kPoHXkkYjlnU&callback=initMap">
    </script>
	
	
	
	 <script>
	 document.getElementById("finishbtn").disabled = true;
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }
		


        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
		
		

		var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
		  scrollwheel: false
        });
        var geocoder = new google.maps.Geocoder();
          geocodeAddress(geocoder, map);
		
		      function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('autocomplete').value;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location
            });
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
		
      }
		
		document.getElementById("finishbtn").disabled = false;
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>
	
	
	
	   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkvJXrumdVQLipE-6ZPa-kPoHXkkYjlnU&libraries=places&callback=initAutocomplete"
        async defer></script>



<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Google Map -->
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>

<script src="dist/js/app.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="js/index.js"></script>
</body>
</html>


<script>  
 $(document).ready(function(){  
   $('#username').blur(function(){

     var username = $(this).val();

     $.ajax({
      url:'check_user.php',
      method:"POST",
      data:{user_name:username},
      success:function(data)
      {
       if(data != '0')
       {
        $('#availability').html('<span class="text-danger">Username not available</span>');
       }
       else
       {
        $('#availability').html('<span class="text-success">Username Available</span>');
       }
      }
     })

  });
 });  
</script>
<script>  
 $(document).ready(function(){  
   $('#email').blur(function(){

     var email = $(this).val();

     $.ajax({
      url:'check_user.php',
      method:"POST",
      data:{e_mail:email},
      success:function(data)
      {
       if(data != '0')
       {
        $('#availability1').html('<span class="text-danger">Email not available</span>');
       }
       else
       {
        $('#availability1').html('<span class="text-success">Email Available</span>');
       }
      }
     })

  });
 });  
</script>