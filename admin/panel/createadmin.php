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
			<li class="active"><a href="createadmin.php"><i class="fa fa-circle-o"></i>Δημιουργία</a></li>
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


			<form action="confirm_admin_create.php" method="post" autocomplete="off">
			<div class="inlinedisplay">
				<div class="col-sm-6">
					<p>Τωρινή Ημερομηνία: <b><?php echo $datetime["datetime"]; ?></b></p>	
				</div>
				<div class="col-sm-6">
					<button id="addnewadmin" name="addnewadmin" class="btn btn-danger updatechanges">Αποθήκευση και κλείσιμο</button>
					<button id="addnewadminandnew" name="addnewadminandnew" class="btn btn-danger updatechanges">Αποθήκευση και δημιουργία νέου</button>
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
                                    <div class="form-group col-sm-12">
                                        <div class="flex_error"><label>Ψευδώνυμο διαχειριστή</label><span id="availability"></span></div>
                                            <input required type="text" id="username" name="username" value="" class="form-control form-control-line">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Όνομα</label>
                                            <input required type="text" name="firstname" value="" class="form-control form-control-line">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Επώνυμο</label>
                                            <input required type="text" name="surname" value="" class="form-control form-control-line" name="example-email" id="example-email">
                                    </div>
									<div class="form-group col-sm-6">
                                        <label>Κωδικός</label>
                                            <input required type="password" name="password" value="" class="form-control form-control-line">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <div class="flex_error"><label>E-mail</label><span id="availability1"></span></div>
                                            <input required type="email" id="email" name="email" value="" class="form-control form-control-line">
                                    </div>
									<div class="form-group col-sm-12">
                                        <div class="flex_error"><label>Περιγραφή</label><span id="availability1"></span></div>
                                            <input required type="text" name="description" value="" class="form-control form-control-line">
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



  <script>
function myFunctionClosemsg() {
    document.getElementById("msgbox").style.display = "none";
}
</script>

</body>
</html>


<script>  
 $(document).ready(function(){  
   $('#username').blur(function(){

     var username = $(this).val();

     $.ajax({
      url:'check_admin.php',
      method:"POST",
      data:{user_name:username},
      success:function(data)
      {
       if(data != '0')
       {
        $('#availability').html('<span class="text-danger">Μη διαθέσιμο ψευδώνυμο</span>');
        $('#addnewadminandnew').attr("disabled", true);
        $('#addnewadmin').attr("disabled", true);
       }
       else
       {
       $('#availability').html('<span class="text-success">Διαθέσιμο ψευδώνυμο</span>');
        $('#addnewadminandnew').attr("disabled", false);
        $('#addnewadmin').attr("disabled", false);
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
      url:'check_admin.php',
      method:"POST",
      data:{e_mail:email},
      success:function(data)
      {
       if(data != '0')
       {
        $('#availability1').html('<span class="text-danger">Μη διαθέσιμο E-mail</span>');
        $('#addnewadminandnew').attr("disabled", true);
        $('#addnewadmin').attr("disabled", true);
       }
       else
       {
        $('#availability1').html('<span class="text-success">Διαθέσιμο E-mail</span>');
        $('#addnewadminandnew').attr("disabled", false);
        $('#addnewadmin').attr("disabled", false);
       }
      }
     })

  });
 });  
</script>
