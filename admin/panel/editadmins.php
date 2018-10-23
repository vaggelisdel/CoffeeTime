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
		<li class="active treeview">
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


					<?php

	require_once '../../connection.php';

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
} 

if(isset($_GET['username']) && isset($_GET['editadmin']) && isset($_GET['adminid1'])) {
	$username = $connect->escape_string($_GET['username']);
	$adminid1 = $connect->escape_string($_GET['adminid1']);

	$result7 = $connect->query("SELECT * FROM admins WHERE `AdminID` ='$adminid1'");
	$admin7 = $result7->fetch_assoc();
	
	$result8 = $connect->query("SELECT * FROM adminimages WHERE `AdminID` ='$adminid1'");
	$admin8 = $result8->fetch_assoc();
	
	$result2 = $connect->query("SELECT count(*) as createdshops FROM shops WHERE `CreatedBy` ='$username'");
	$createdshops = $result2->fetch_assoc();
}
?>

<form action="editadmin_actions.php" method="post" id="bigform" enctype="multipart/form-data">
<input type="hidden" name="adminid1" value="<?= $admin7['AdminID']; ?>">
<input type="hidden" id="deleteadmin_ckeck" name="deleteadmin_ckeck" value="0">
		<button type="button" name="deletebtn" class="deleteadmin delete_btns">Διαγραφή αυτού του διαχειριστή</button>
		
		<div class="toggle_shop active_shop">
											<span class="label_toggle1">Ενεργοποίηση διαχειριστή: </span>
											<?php
											
											require_once '../../connection.php';
																	
																	$query = "SELECT * FROM `admins` WHERE `AdminID` = '$adminid1';";


																	$result1 = mysqli_query($connect, $query);
																	while($row1 = mysqli_fetch_array($result1)) 
																	{ 
												if ($admin7['Active'] == '0'){ 
													?>
													<label class="switch">
														<input id="test_id1" type="checkbox">
														<span class="slider round"></span>
													</label>
													
														<?php
												}else{
													?>
													<label class="switch">
														<input id="test_id1" type="checkbox" checked>
														<span class="slider round"></span>
													</label>
													<?php
												}
											}	
											?>
											<br>

										</div>


		   <div class="box box-info">
		   
            <div class="box-header with-border">
									
			  <div class="box-body">
			  <div class="row">
										<?php
											if($admin7['Active'] == "0"){
										?>
										<div class="alert alert-danger" >
												Ο διαχειριστής είναι απενεργοποιημένος!
										</div>	
										<?php
											}
										?>
									</div>
									
			<div class="saves">
			<div class="inlinedisplay">
				 <div class="col-sm-6 headinfo">
					<p>Τελευταία σύνδεση: <b><?= $admin7['LastAdminLogin']; ?></b></p>	
				</div>
				<div class="col-sm-6">
					<button id="edituserinfobtn" name="edituserinfobtn" class="btn btn-danger updatechanges">Αποθήκευση αλλαγών</button>
				</div>
			</div>
			</div>
			  <div class="col-lg-4 col-xlg-3 col-md-5">
						<div class="card">
                            <div class="card-block">
                                <center class="m-t-30"> <img src="../../<?= $admin8['AdminImage']; ?>" class="img-circle" width="150" />
                                    <h4 class="card-title m-t-10"><?= $admin7['UserName']; ?></h4>
									<h6 class="card-subtitle">Δημιούργησε συνολικά <?php echo $createdshops["createdshops"];?> καταστήματα</h6>
                                    <?php $_SESSION['adminimage'] = $admin8['AdminImage']; ?>
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
								<input type="hidden" name="adminid1" value="<?= $admin7['AdminID']; ?>">
								<input type="hidden" name="lastlogin" value="<?= $admin7['LastAdminLogin']; ?>">
                                    <div class="form-group col-sm-6">
                                        <div class="flex_error"><label>Ψευδώνυμο διαχειριστή</label><span id="availability"></span></div>
                                            <input type="text" id="username" name="username" value="<?= $admin7['UserName']; ?>" class="form-control form-control-line">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Όνομα</label>
                                            <input type="text" name="firstname" value="<?= $admin7['FirstName']; ?>" class="form-control form-control-line" name="example-email" id="example-email">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Επώνυμο</label>
                                            <input type="text" name="lastname" value="<?= $admin7['Surname']; ?>" class="form-control form-control-line">
                                    </div>
									<div class="form-group col-sm-6">
                                        <div class="flex_error"><label>E-mail</label><span id="availability1"></span></div>
                                            <input type="email" id="email" name="email" value="<?= $admin7['E-mail']; ?>" class="form-control form-control-line">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Κωδικός</label>
                                            <input type="password" name="password" placeholder="Enter new Password" class="form-control form-control-line" name="example-email" id="example-email">
                                    </div>
									<input type="hidden" name="active" id="active_status" value="<?= $admin7['Active']; ?>">
									<div class="form-group col-sm-12">
                                        <label>Περιγραφή</label>
                                            <input type="text" name="description" value="<?= $admin7["Description"] ?>" class="form-control form-control-line" name="example-email" id="example-email">
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
$(document).on('click', '.deleteadmin', function(){
	
	if (confirm("Διαγραφή αυτού του διαχειριστή;")) {
		
		document.getElementById("deleteadmin_ckeck").value = "1";
		document.getElementById("bigform").submit();
				
	}
});
</script>

<script>  
 $(document).ready(function(){  
   $('#username').blur(function(){

     var username = $(this).val();
     var adminid = <?= $adminid1 ?>;

     $.ajax({
      url:'check_admin_onedit.php',
      method:"POST",
      data:{user_name:username, admin_id:adminid},
      success:function(data)
      {
       if(data != '0')
       {
        $('#availability').html('<span class="text-danger">Μη διαθέσιμο ψευδώνυμο</span>');
       }
       else
       {
        $('#availability').html('<span class="text-success">Διαθέσιμο ψευδώνυμο</span>');
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
	 var adminid = <?= $adminid1 ?>;

     $.ajax({
      url:'check_admin_onedit.php',
      method:"POST",
      data:{e_mail:email, admin_id:adminid},
      success:function(data)
      {
       if(data != '0')
       {
        $('#availability1').html('<span class="text-danger">Μη διαθέσιμο E-mail</span>');
       }
       else
       {
        $('#availability1').html('<span class="text-success">Διαθέσιμο E-mail</span>');
       }
      }
     })

  });
 });  
</script>

<script>
$("#test_id1").on("change", function () {
    if ($(this).is(":checked")) {
		document.getElementById('active_status').value = '1';
    } else {
		document.getElementById('active_status').value = '0';
    }
});
</script>