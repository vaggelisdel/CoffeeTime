<?php
/* Displays user information and some useful messages */

session_name("session3");
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
require '../../connection.php';

if ($_SESSION['online_shop'] == 1) {
	$shopid = $_SESSION['shopid'];
		
		
	$result7 = $connect->query("SELECT * FROM shops WHERE `ShopID` ='$shopid'");
	$shop7 = $result7->fetch_assoc();
	
	$result8 = $connect->query("SELECT * FROM shopimages WHERE `Category`='logo' AND `ShopID` ='$shopid'");
	$shop8 = $result8->fetch_assoc();
	
	$result9 = $connect->query("SELECT * FROM shop_keepers WHERE `ShopID` ='$shopid'");
	$shop9 = $result9->fetch_assoc();
	
	$query ="SELECT shops.*, reviews.*, shopimages.* FROM shops, reviews, shopimages WHERE shops.ShopID = shopimages.ShopID AND shops.ShopID = reviews.ShopID AND shopimages.Category = 'logo' AND shops.ShopID = '$shopid' ORDER BY ReviewDate DESC";  
	$result = mysqli_query($connect, $query); 
	
		
	}else{

		$_SESSION['message'] = "You must log in before viewing your profile page!";
		header("location: ../login/error.php");  
		$_SESSION['online_shop'] = 0;
	}
 
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
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  
  <header class="main-header">
<!-- Logo -->
    <a href="../../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img class="homelogo1" src="../../images/coffeetime_logo_mini.png"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img class="homelogo" src="../../images/coffeetime_logo.png"></span>
    </a>
<nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
      
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<img src="../../<?= $shop8["Image"]; ?>" height="25" width="25" style="margin-right: 5px;border-radius: 50%;object-fit: cover;object-position: 0 0%;">				
              <span class="hidden-xs"><?= $shop9["ShopUsername"]; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
				<img src="../../<?= $shop8["Image"]; ?>" height="90" width="90" style="border-radius: 50%;object-fit: cover;object-position: 0 0%;">				

                <p>
                  <?= $shop9["ShopUsername"]; ?>
                  <small>Register Date:  <?= $shop7["RegisterDate"]; ?></small>
				  <small><?= $admindata_1['Description']; ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="../login/logout.php" class="btn btn-danger btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>

    </nav>
</header>
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->


      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Πίνακας Ελέγχου</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
		<li class="active treeview">
          <a href="allratings.php">
            <i class="fa fa-star"></i> <span>Αξιολογήσεις</span>
            <span class="pull-right-container">
            </span>
          </a>
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

	
	
  <div class="modal fade" id="ratingmodal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title rating_title">Rating: </h4>
        </div>
        <div class="modal-body">
			<div class="card-body">
			<div class="form-group">
                    <label for="exampleInputUser">Shop</label>
                    <input disabled type="text" id="ShopName" class="form-control">
                  </div>
				<div class="row">
				  <div class="form-group col-sm-4">
                    <label for="exampleInputUser">Answer 1</label>
                    <input disabled type="text" id="Answer1" class="form-control">
                  </div>
				  <div class="form-group col-sm-4">
                    <label for="exampleInputDate">Answer 2</label>
                    <input disabled type="text" id="Answer2" class="form-control">
                  </div>
				  <div class="form-group col-sm-4">
                    <label for="exampleInputScore">Answer 3</label>
                    <input disabled type="text" id="Answer3" class="form-control">
                  </div>
				</div>
				<div class="row">
				  <div class="form-group col-sm-4">
                    <label for="exampleInputDifficulty">Answer 4</label>
                    <input disabled type="text" id="Answer4" class="form-control">
                  </div>
				  <div class="form-group col-sm-4">
                    <label for="exampleInputDifficulty">Answer 5</label>
                    <input disabled type="text" id="Answer5" class="form-control">
                  </div>
				  <div class="form-group col-sm-4">
                    <label for="exampleInputDifficulty">AVG Rate</label>
                    <input disabled type="text" id="AvgRate" class="form-control">
                  </div>
				</div>
				<div class="form-group">
                    <label for="exampleInputDifficulty">Review Date</label>
                    <input disabled type="text" id="ReviewDate" class="form-control">
                  </div>
				<div class="row">
				  <div class="form-group col-sm-6">
                    <label for="exampleInputDifficulty">Username</label>
                    <input disabled type="text" id="ReviewName" class="form-control">
                  </div>
				  <div class="form-group col-sm-6">
                    <label for="exampleInputDifficulty">Email</label>
                    <input disabled type="text" id="ReviewEmail" class="form-control">
                  </div>
				</div>
				<div class="row">
				  <div class="form-group col-sm-6 r_fields">
                    <label for="exampleInputReview">Liked</label>
                    <textarea disabled id="Liked" class="form-control"></textarea>
                  </div>
				  <div class="form-group col-sm-6 r_fields">
                    <label for="exampleInputReview">Disliked</label>
                    <textarea disabled id="Disliked" class="form-control"></textarea>
                  </div>
				  <input type="hidden" name="action" id="action" value=""/>
				  <input type="hidden" name="reviewid" id="reviewid" value=""/>
				  <input type="hidden" name="shopid" id="shopid" value=""/>
				</div>
            </div>
        </div>
      </div>
      
    </div>
  </div>
	
	
	
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
              <h3 class="box-title">All Reviews</h3>
			  <div class="box-tools pull-right">

              </div>
			  <div class="box-body">
			  
			  
			  
			  <div class="table-responsive">  
			<table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr> 
                                    <td class="firstcol"></td>
                                    <td>Shop</td>  
                                    <td>AVG Rate</td>  
                                    <td>Username</td>  
                                    <td>Email</td>  
                                    <td>Date</td>
									<td>Edit</td> 									
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
							   							   
                               <tr>  
									<td><img src="../../'.$row["Image"].'" style="width: 35px;height: 35px;border-radius:50%;object-fit: cover;"></td>
                                    <td>'.$row["ShopName"].'</td>  
                                    <td>'.$row["AvgRate"].'</td>  
                                    <td>'.$row["ReviewName"].'</td>  
                                    <td>'.$row["ReviewE-mail"].'</td>  
                                    <td>'.$row["ReviewDate"].'</td>  
									<td><center><span value="'.$row["ReviewID"] .'" class="label label-primary editrating">Edit</span></center></td>
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
<script>

$(document).on('click', '.editrating', function(){
	var reviewid = $(this).attr("value");
	var curaction = "Select";
	$.ajax(
            {
                url:'fetch_ratings_view.php',
                type:'POST',
                data:'reviewid=' + reviewid + '&action=' + curaction,
				dataType:'json',

                success:function(data)
                {
					
					$('#ratingmodal').modal('show');
					$('.rating_title').text("Review: " + data.ReviewID);
					$('#reviewid').val(data.ReviewID);
					$('#shopid').val(data.ShopID);
					$('#ShopName').val(data.ShopName);
					$('#Answer1').val(data.Answer1);
					$('#Answer2').val(data.Answer2);
					$('#Answer3').val(data.Answer3);
					$('#Answer4').val(data.Answer4);
					$('#Answer5').val(data.Answer5);
					$('#AvgRate').val(data.AvgRate);
					document.getElementById("Liked").innerHTML = data.Liked;
					document.getElementById("Disliked").innerHTML = data.Disliked;
					$('#ReviewDate').val(data.ReviewDate);
					$('#ReviewName').val(data.ReviewName);
					$('#ReviewEmail').val(data.ReviewEmail);
                },
            });
	
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
