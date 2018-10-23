<?php
include 'same2all/CHECKING_ALL.php';
?>

<?php  
 require '../../connection.php';
 $query ="SELECT * FROM shops, shopimages WHERE shops.ShopID = shopimages.ShopID AND shopimages.Category = 'logo' ORDER BY shops.RegisterDate DESC";  
 $result = mysqli_query($connect, $query);  
 ?>  

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CoffeeTime Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
           
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  
  <?php include 'linkfiles.html'; ?>
  
  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini"
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
            <li class="active"><a href="shops.php"><i class="fa fa-circle-o"></i>Προβολή Όλων</a></li>
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
		if ($_SESSION['savedchanges'] == ''){
			?>
			<div style="">
	<?php
		}else{
			?>
			<div id="msgbox" style="background: rgb(51, 122, 183);
    font-size: 20px;
    text-shadow: 1px 1px 3px black;
    color: rgb(255, 255, 255);
    padding: 10px;
    margin-bottom: 15px;">
		<button type="button" class="close" id="closemsg" onclick="myFunctionClosemsg()" data-dismiss="modal">&times;</button>
		   <?php echo $_SESSION['savedchanges']; 
		   $_SESSION['savedchanges'] = '';
		   ?>
		</div>
	<?php
		}
	?>
		
		   <div class="box box-info"> 
            <div class="box-header with-border">
              <h3 class="box-title">Καταστήματα</h3>
			  <div class="box-tools pull-right">

              </div>
			  <div class="box-body">
			  
			  
			  
			  <div class="table-responsive">  
			<table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr> 
									<td class="firstcol"></td>
                                    <td>Όνομα</td>  
                                    <td>Δ/νση</td>  
                                    <td>No.</td>  
                                    <td>Πόλη</td>  
                                    <td>Εγγεγραμμένο</td>
									<td>Επεξεργασμένο</td> 
									<td>Κατάσταση</td>
									<td></td> 									
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
							   							   
                               <tr>  
							   <td><a href="'.dirname($_SERVER['REQUEST_URI']).'/editshop.php?editinfo=&shopid='.$row["ShopID"].'"><img src="../../'.$row["Image"].'" style="width: 35px;height: 35px;border-radius:50%;object-fit: cover;"></a></td> 
                                    <td><a class="shoplinks" href="'.dirname($_SERVER['REQUEST_URI']).'/editshop.php?editinfo=&shopid='.$row["ShopID"].'">'.$row["ShopName"].'</a></td>  
                                    <td>'.$row["ShopAddress"].'</td>  
                                    <td>'.$row["ShopAddressNumber"].'</td>  
                                    <td>'.$row["ShopCity"].'</td>  
                                    <td>'.$row["RegisterDate"].'</td>  
									<td>'.$row["ModifyDate"].'</td>
									<td>'; if ($row["Active"] == '1'){ 
					echo '<span class="label label-success">Ενεργό</span>'; 
					}
						else{ 
							echo '<span class="label label-danger">Ανενεργό</span>';
					} echo '</td>
									<td><center><a href="'.dirname($_SERVER['REQUEST_URI']).'/editshop.php?editinfo=&shopid='.$row["ShopID"].'"><span class="label label-primary">Επεξεργασία</span></a></center></td>
                               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>  
					 </div>

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
<!-- ./wrapper -->


<script>
function myFunctionClosemsg() {
    document.getElementById("msgbox").style.display = "none";
}
</script>
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  


<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>   

</body>
</html>
