<?php
include 'same2all/CHECKING_ALL.php';
?>

<?php  
 require '../../connection.php';
 $query ="SELECT shops.*, reviews.*, shopimages.* FROM shops, reviews, shopimages WHERE shops.ShopID = shopimages.ShopID AND shops.ShopID = reviews.ShopID AND shopimages.Category = 'logo' ORDER BY ReviewDate DESC";  
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
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-star"></i>
            <span>Αξιολογήσεις</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="allratings.php"><i class="fa fa-circle-o"></i>Προβολή Όλων</a></li>
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

	
	
  <div class="modal fade" id="ratingmodal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title rating_title">Βαθμολογία: </h4>
        </div>
	<form id="editratings_form" action="edit_rating_actions.php" method="POST">
        <div class="modal-body">
			<div class="card-body">
			<div class="form-group">
                    <label for="exampleInputUser">Κατάστημα</label>
                    <input disabled type="text" id="ShopName" class="form-control">
                  </div>
				<div class="row">
				  <div class="form-group col-sm-4">
                    <label for="exampleInputUser">Απάντηση 1</label>
                    <input disabled type="text" id="Answer1" class="form-control">
                  </div>
				  <div class="form-group col-sm-4">
                    <label for="exampleInputDate">Απάντηση 2</label>
                    <input disabled type="text" id="Answer2" class="form-control">
                  </div>
				  <div class="form-group col-sm-4">
                    <label for="exampleInputScore">Απάντηση 3</label>
                    <input disabled type="text" id="Answer3" class="form-control">
                  </div>
				</div>
				<div class="row">
				  <div class="form-group col-sm-4">
                    <label for="exampleInputDifficulty">Απάντηση 4</label>
                    <input disabled type="text" id="Answer4" class="form-control">
                  </div>
				  <div class="form-group col-sm-4">
                    <label for="exampleInputDifficulty">Απάντηση 5</label>
                    <input disabled type="text" id="Answer5" class="form-control">
                  </div>
				  <div class="form-group col-sm-4">
                    <label for="exampleInputDifficulty">Μ.Ο Βαθμολογίας</label>
                    <input disabled type="text" id="AvgRate" class="form-control">
                  </div>
				</div>
				<div class="form-group">
                    <label for="exampleInputDifficulty">Ημερομηνία</label>
                    <input disabled type="text" id="ReviewDate" class="form-control">
                  </div>
				<div class="row">
				  <div class="form-group col-sm-6">
                    <label for="exampleInputDifficulty">Χρήστης</label>
                    <input disabled type="text" id="ReviewName" class="form-control">
                  </div>
				  <div class="form-group col-sm-6">
                    <label for="exampleInputDifficulty">E-mail</label>
                    <input disabled type="text" id="ReviewEmail" class="form-control">
                  </div>
				</div>
				<div class="row">
				  <div class="form-group col-sm-6 r_fields">
                    <label for="exampleInputReview">Μου αρέσει</label>
                    <textarea disabled id="Liked" class="form-control"></textarea>
                  </div>
				  <div class="form-group col-sm-6 r_fields">
                    <label for="exampleInputReview">Δε μου αρέσει</label>
                    <textarea disabled id="Disliked" class="form-control"></textarea>
                  </div>
				  <input type="hidden" name="action" id="action" value=""/>
				  <input type="hidden" name="reviewid" id="reviewid" value=""/>
				  <input type="hidden" name="shopid" id="shopid" value=""/>
				</div>
            </div>
			<div class="card-footer">
                <center><button type="button" onclick="deleterating_function()" class="btn btn-danger">Διαγραφή αξιολόγησης</button></center>
            </div>
	</form>
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
	

		
		   <div class="box box-info"> 
            <div class="box-header with-border">
              <h3 class="box-title">Αξιολογήσεις</h3>
			  <div class="box-tools pull-right">

              </div>
			  <div class="box-body">
			  
			  
			  
			  <div class="table-responsive">  
			<table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr> 
                                    <td class="firstcol"></td>
                                    <td>Κατάστημα</td>  
                                    <td>Μ.Ο Βαθμολογίας</td>  
                                    <td>Χρήστης</td>  
                                    <td>E-mail</td>  
                                    <td>Ημερομηνία</td>
									<td>Επεξεργασία</td> 									
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
									<td><center><span value="'.$row["ReviewID"] .'" class="label label-primary editrating">Επεξεργασία</span></center></td>
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
<script>
function deleterating_function() {
if (confirm("Διαγραφή αυτής της αξιολόγησης;")) {
		$('#action').val("Delete");
        document.getElementById("editratings_form").submit();
    }else{
		$('#ratingmodal').modal('hide');
		$('#action').val("");
	}
}
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
