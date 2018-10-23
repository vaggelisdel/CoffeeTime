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
	
	$result10 = $connect->query("SELECT * FROM shop_hours WHERE `ShopID` ='$shopid'");
	$shop10 = $result10->fetch_assoc();
	
	$shop11 = $connect->query("SELECT * FROM itemcategories WHERE `ShopID` ='$shopid'");
	
	$result12 = $connect->query("SELECT * FROM social WHERE `ShopID` ='$shopid'");
	$shop12 = $result12->fetch_assoc();
	
	$result13 = $connect->query("SELECT * FROM abilities WHERE `ShopID` ='$shopid'");
	$shop13 = $result13->fetch_assoc();

	$result14 = $connect->query("SELECT * FROM infosvisibility WHERE `ShopID` ='$shopid'");
	$shop14 = $result14->fetch_assoc();
	
	
	$result2 = $connect->query("SELECT count(*) as itemstotal FROM shopitems WHERE `ShopID` ='$shopid'");
	$items = $result2->fetch_assoc();
		
		
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
        <li class="active treeview">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Πίνακας Ελέγχου</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
		<li class="treeview">
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







<form action="editshop_actions.php" method="post" id="bigform" enctype="multipart/form-data">	

		   <div class="box box-info">
            <div class="box-header with-border">


			
			  <div class="box-body">


			  
<div class="row">
	<?php
		if($shop7['Active'] == "0"){
	?>
	<div class="alert alert-danger" >
			Το κατάστημα είναι απενεργοποιημένο!
	</div>	
	<?php
		}
	?>
	</div>	
			<div class="saves">
				<div class="inlinedisplay">
					<div class="col-sm-6 headinfo">
						<p>Τελευταία ενημέρωση: <b><?= $shop7['ModifyDate']; ?></b></p>	
					</div>

					<div class="col-sm-6">
						<button id="editinfobtn" name="editinfobtn" class="btn btn-danger updatechanges">Αποθήκευση αλλαγών</button>
						<a target="_blank" href="../../shoplist/preview.php?shopid=<?= $shopid;?>" class="btn btn-danger updatechanges">Προεπισκόπιση</a>
					</div>
				</div>
			</div>
                    <div class="col-lg-4 col-xlg-3 col-md-5">
						<div class="card">
                            <div class="card-block">
                                <center class="m-t-30"> <img src="../../<?= $shop8['Image']; ?>" class="img-circle" width="150" />
                                    <h4 class="card-title m-t-10"><?= $shop7['ShopName']; ?></h4>
                                    <h6 class="card-subtitle"><?php echo $items["itemstotal"];?> Προϊόντα Συνολικά</h6>
                                    <?php $_SESSION['logoimage'] = $shop8['Image']; ?>
                                </center>
                            </div>
                        </div>
												
						<div class="card">
                            <div class="card-block">
							<input class="uploadform" type="file" name="file"><br>
						</div>
                        </div>
						
						<div class="card">
                            <div class="card-block form-material">
                                    <input type="text" id="address_search" name="address_search" value="" class="form-control form-control-line searchaddress"><br>
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
                            <div class="card-block form-material">
									<input type="file" name="file_image" id="file_image" class="upload_form_input">
									<input type="hidden" id="shopid" value="<?= $shopid;?>"><br>
									<button type="button" class="btn btn-danger" id="insert_img_btn" name="insert_img_btn">Upload image</button>
									<img src="../../images/spinner.gif" id="spinner" class="spinner" style="display:none;"/>
							</div>
                        </div>
						
							<div class="card-block form-material" id="alerts"></div>
						
						<div class="card">
								<?php
								$query = $connect->query("SELECT * FROM shopimages WHERE `Category` = 'others' AND `ShopID` = '$shopid' ;");
								?>
							
									
									<div class="col-sm-12" id="all_images"></div>
														
							
                        </div>
												
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7 divider1">
                        <div class="card">
                            <div class="card-block">
                                <div class="form-horizontal form-material">
								<input type="hidden" name="shopid" value="<?= $shop7['ShopID']; ?>">
                                    <div class="form-group col-sm-12">
                                        <label>Shop Name</label>
                                            <input type="text" name="shopname" value="<?= $shop7['ShopName']; ?>" class="form-control form-control-line">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Shop Address</label>
                                            <input type="text" name="shopaddress" id="route" value="<?= $shop7['ShopAddress']; ?>" class="form-control form-control-line" name="example-email" id="example-email">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Number</label>
                                            <input type="text" name="shopaddressnum" id="street_number" value="<?= $shop7['ShopAddressNumber']; ?>" class="form-control form-control-line">
                                    </div>
									<div class="form-group col-sm-6">
                                        <label>Shop City</label>
                                            <input type="text" name="shopcity" id="locality" value="<?= $shop7['ShopCity']; ?>" class="form-control form-control-line">
                                    </div>
									<div class="form-group col-sm-6">
                                        <label>Shop TK</label>
                                            <input type="text" name="shoptk" id="postal_code" value="<?= $shop7['ShopTK']; ?>" class="form-control form-control-line">
                                    </div>
                                            <input type="hidden" name="maplat" id="lat" value="<?= $shop7['Maps_Lat']; ?>">
                                            <input type="hidden" name="maplng" id="lng" value="<?= $shop7['Maps_Lng']; ?>">
                                </div>
                            </div>
                        </div>
						

						
						<div class="card">
                            <div class="card-block">
                                <div class="form-horizontal form-material">
                                    <div class="form-group col-sm-6">
                                        <div class="flex_error"><label>Username</label><span id="availability"></span></div>
                                            <input type="text" id="username" name="username" value="<?= $shop9['ShopUsername']; ?>" class="form-control form-control-line">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Password</label>
                                        <input type="password" name="password" placeholder="Enter new Password" class="form-control form-control-line" name="example-email" id="example-email">
                                    </div>
                                </div>
                            </div>
                        </div>
						
						
			
						
<div class="card">
    <div class="card-block">
	<div class="form-group col-sm-12 tabledays">	
<table>
  <tr class="firstrow">
    <th>Ημέρα</th>
    <th>Ώρα Ανοίγματος</th>
    <th>Ώρα Κλεισίματος</th>
  </tr>
  <tr>
    <td>Δευτέρα</td>
    <td><center><input type="text" required id="time" name="monday_open" value="<?=$shop10['Monday_Open'];?>"></center></td>
    <td><center><input type="text" required id="time1" name="monday_close" value="<?=$shop10['Monday_Closed'];?>"></center></td>
  </tr>
  <tr>
    <td>Τρίτη</td>
    <td><center><input type="text" required id="time2" name="tuesday_open" value="<?=$shop10['Tuesday_Open'];?>"></center></td>
    <td><center><input type="text" required id="time3" name="tuesday_close"value="<?=$shop10['Tuesday_Closed'];?>"></center></td>
  </tr>
  <tr>
    <td>Τετάρτη</td>
    <td><center><input type="text" required id="time4" name="wednesday_open" value="<?=$shop10['Wednesday_Open'];?>"></center></td>
    <td><center><input type="text" required id="time5" name="wednesday_close" value="<?=$shop10['Wednesday_Closed'];?>"></center></td>
  </tr>
  <tr>
    <td>Πέμπτη</td>
    <td><center><input type="text" required id="time6" name="thursday_open" value="<?=$shop10['Thursday_Open'];?>"></center></td>
    <td><center><input type="text" required id="time7" name="thursday_close" value="<?=$shop10['Thursday_Closed'];?>"></center></td>
  </tr>
  <tr>
    <td>Παρασκευή</td>
    <td><center><input type="text" required id="time8" name="friday_open" value="<?=$shop10['Friday_Open'];?>"></center></td>
    <td><center><input type="text" required id="time9" name="friday_close" value="<?=$shop10['Friday_Closed'];?>"></center></td>
  </tr>
  <tr>
    <td>Σάββατο</td>
    <td><center><input type="text" required id="time10" name="saturday_open" value="<?=$shop10['Saturday_Open'];?>"></center></td>
    <td><center><input type="text" required id="time11" name="saturday_close" value="<?=$shop10['Saturday_Closed'];?>"></center></td>
  </tr>
    <tr>
    <td>Κυριακή</td>
    <td><center><input type="text" required id="time12" name="sunday_open" value="<?=$shop10['Sunday_Open'];?>"></center></td>
    <td><center><input type="text" required id="time13" name="sunday_close" value="<?=$shop10['Sunday_Closed'];?>"></center></td>
  </tr>
</table>


<div class="toggle_shop">
<span class="label_toggle">Εμφάνιση καταστήματος ως κλειστό: </span>


<?php
	if($shop7['ManualStatus'] == "0"){
		?>
		<label class="switch">
			<input id="test_id" type="checkbox" checked>
			<span class="slider round"></span>
		</label>
		<?php
	}else{
		?>
		<label class="switch">
			<input id="test_id" type="checkbox">
			<span class="slider round"></span>
		</label>
		<?php
	}
?>
<input type="hidden" name="manualstatus" id="manualstatus" value="<?= $shop7['ManualStatus']; ?>"><br>

</div>	
</div>
</div>
</div>	




<div class="card">
    <div class="card-block">
        <div class="form-horizontal form-material">
			<div class="form-group col-sm-12 abilities">
				<div class="col-sm-3 ability">
					<img src="https://static.thenounproject.com/png/165055-200.png" class="ability_icon"/>
					<div><input type="checkbox" id="delivery_checkbox" <?php if ($shop13['Delivery'] == '1'){?> checked <?php } ?>> Delivery</div>
					<input type="hidden" name="delivery" id="delivery" value="<?= $shop13['Delivery'] ?>"/>
				</div>
				<div class="col-sm-3 ability">
					<img src="https://cdn1.iconfinder.com/data/icons/e-commerce-set-3-1/256/Buy_Online-512.png" class="ability_icon"/>
					<div><input type="checkbox" id="onlinedelivery_checkbox" <?php if ($shop13['OnlineDelivery'] == '1'){?> checked <?php } ?>> Online Delivery</div>
					<input type="hidden" name="onlinedelivery" id="onlinedelivery" value="<?= $shop13['OnlineDelivery'] ?>"/>
				</div>
				<div class="col-sm-3 ability">
					<img src="http://orchestrateinc.com/cms/wp-content/uploads/2017/05/coffee-icon.png" class="ability_icon"/>
					<div><input type="checkbox" id="standupcoffee_checkbox" <?php if ($shop13['StandUpCoffee'] == '1'){?> checked <?php } ?>> Καφές στο χέρι</div>
					<input type="hidden" name="standupcoffee" id="standupcoffee" value="<?= $shop13['StandUpCoffee'] ?>"/>
				</div>
				<div class="col-sm-3 ability">
					<img src="https://techingreek.com/wp-content/uploads/2017/07/favicon.ico" class="ability_icon"/>
					<div><input type="checkbox" id="cosmotetv_checkbox" <?php if ($shop13['OTETV'] == '1'){?> checked <?php } ?>> Cosmote TV</div>
					<input type="hidden" name="cosmotetv" id="cosmotetv" value="<?= $shop13['OTETV'] ?>"/>
				</div>
				<div class="col-sm-3 ability">
					<img src="https://upload.wikimedia.org/wikipedia/el/thumb/f/ff/Nova_blue_logo.png/180px-Nova_blue_logo.png" class="ability_icon"/>
					<div><input type="checkbox" id="nova_checkbox" <?php if ($shop13['Nova'] == '1'){?> checked <?php } ?>> Nova</div>
					<input type="hidden" name="nova" id="nova" value="<?= $shop13['Nova'] ?>"/>
				</div>
				<div class="col-sm-3 ability">
					<img src="http://jrs-technology.com/wp-content/uploads/2016/05/wifi_logo_256.png" class="ability_icon"/>
					<div><input type="checkbox" id="wifi_checkbox" <?php if ($shop13['WiFi'] == '1'){?> checked <?php } ?>> WiFi</div>
					<input type="hidden" name="wifi" id="wifi" value="<?= $shop13['WiFi'] ?>"/>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="infosvisibility">
	<div class="form-group col-sm-12 tabledays">	
<table>
  <tr class="firstrow">
    <th>#</th>
    <th>Εισαγωγή</th>
    <th>Ορατότητα</th>
  </tr>
  <tr>
    <td>https://www.facebook.com/</td>
    <td><center><input type="text" name="facebook" id="facebook" value="<?= $shop12['FacebookURL']; ?>" autocomplete="off"></center></td>
    <td><center><label class="switch"><input id="facebook_switch" type="checkbox" <?php if($shop14['VisFacebookURL']=='1'){?> checked <?php } ?>><span class="slider round"></span></label></center></td>
    <input type="hidden" name="visfacebook" id="visfacebook" value="<?= $shop14['VisFacebookURL'] ?>">
  </tr>
  <tr>
    <td>https://twitter.com/</td>
    <td><center><input type="text" name="twitter" value="<?= $shop12['TwitterURL']; ?>" autocomplete="off"></center></td>
    <td><center><label class="switch"><input id="twitter_switch" type="checkbox" <?php if($shop14['VisTwitterURL']=='1'){?> checked <?php } ?>><span class="slider round"></span></label></center></td>
	<input type="hidden" name="vistwitter" id="vistwitter" value="<?= $shop14['VisTwitterURL'] ?>">
  </tr>
  <tr>
    <td>https://www.instagram.com/</td>
    <td><center><input type="text" name="instagram" value="<?= $shop12['InstagramURL']; ?>" autocomplete="off"></center></td>
    <td><center><label class="switch"><input id="instagram_switch" type="checkbox" <?php if($shop14['VisInstagramURL']=='1'){?> checked <?php } ?>><span class="slider round"></span></label></center></td>
	<input type="hidden" name="visinstagram" id="visinstagram" value="<?= $shop14['VisInstagramURL'] ?>">
  </tr>
  <tr>
    <td>https://www.</td>
    <td><center><input type="text" name="website" value="<?= $shop12['Website']; ?>" placeholder="Website url" autocomplete="off"></center></td>
    <td><center><label class="switch"><input id="website_switch" type="checkbox" <?php if($shop14['VisWebsite']=='1'){?> checked <?php } ?>><span class="slider round"></span></label></center></td>
	<input type="hidden" name="viswebsite" id="viswebsite" value="<?= $shop14['VisWebsite'] ?>">
  </tr>
  <tr>
    <td>https://www.</td>
    <td><center><input type="text" name="deliverysite" value="<?= $shop12['DeliverySite']; ?>" placeholder="Delivery Site url" autocomplete="off"></center></td>
    <td><center><label class="switch"><input id="delivery_switch" type="checkbox" <?php if($shop14['VisDeliverySite']=='1'){?> checked <?php } ?>><span class="slider round"></span></label></center></td>
	<input type="hidden" name="visdeliverysite" id="visdeliverysite" value="<?= $shop14['VisDeliverySite'] ?>">
  </tr>
    <tr>
    <td>WiFi Password</td>
    <td><center><input type="text" name="wifipassword" value="<?= $shop7['WiFiPassword']; ?>" autocomplete="off"></center></td>
    <td><center><label class="switch"><input id="wifi_switch" type="checkbox" <?php if($shop14['WiFiPassword']=='1'){?> checked <?php } ?>><span class="slider round"></span></label></center></td>
	<input type="hidden" name="viswifi" id="viswifi" value="<?= $shop14['WiFiPassword'] ?>">
  </tr>
  <tr>
    <td>E-mail</td>
    <td><center><input type="text" name="shopemail" value="<?= $shop7['ShopE-mail']; ?>" autocomplete="off"></center></td>
    <td><center><label class="switch"><input id="email_switch" type="checkbox" <?php if($shop14['VisShopE-mail']=='1'){?> checked <?php } ?>><span class="slider round"></span></label></center></td>
	<input type="hidden" name="visemail" id="visemail" value="<?= $shop14['VisShopE-mail'] ?>">
  </tr>
  <tr>
    <td>Contact Phone</td>
    <td><center><input type="text" name="contactphone" value="<?= $shop7['ContactPhone']; ?>" autocomplete="off"></center></td>
    <td><center><label class="switch"><input id="contactphone_switch" type="checkbox" <?php if($shop14['VisContactPhone']=='1'){?> checked <?php } ?>><span class="slider round"></span></label></center></td>
	<input type="hidden" name="viscontactphone" id="viscontactphone" value="<?= $shop14['VisContactPhone'] ?>">
  </tr>
  <tr>
    <td>Contact Phone 2</td>
    <td><center><input type="text" name="contactphone2" value="<?= $shop7['ContactPhone2']; ?>" autocomplete="off"></center></td>
    <td><center><label class="switch"><input id="contactphone2_switch" type="checkbox" <?php if($shop14['VisContactPhone2']=='1'){?> checked <?php } ?>><span class="slider round"></span></label></center></td>
	<input type="hidden" name="viscontactphone2" id="viscontactphone2" value="<?= $shop14['VisContactPhone2'] ?>">
  </tr>
</table>

	
</div>
</div>



                    <!-- Column -->
                </div>
				
</form>
				
				<div class="col-lg-12 col-xlg-9 col-md-12">
				
				<div class="card">
    <div class="card-block">
		<div class="form-group col-sm-12">
		
		<div class="dropdown-holder">
<div class="dropdown">
  <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
   Επιλογή ενέργειας
    <span class="caret caret-search"></span>
  </button>
  <ul class="dropdown-menu dropdownstyle" aria-labelledby="dropdownMenu1">
    <li><button type="button" class="dropbutton" id="addcategorybtn"><span class='glyphicon glyphicon-plus'></span> Προσθήκη Κατηγορίας</button></li>
    <li><button type="button" class="dropbutton" id="editcategorybtn"><span class='glyphicon glyphicon-pencil'></span> Επεξεργασία Κατηγορίας</button></li>
    <li><button type="button" class="dropbutton" id="additembtn"><span class='glyphicon glyphicon-plus'></span> Προσθήκη Προϊόντος</button></li>
  </ul>
</div>
</div>
		

   
    
    <!-- It will show Modal for Create Category !-->


   <div class="modal fade" id="myModalHorizontalCateg" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabelCateg" aria-hidden="true">
    <div class="modal-dialog">
	
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabelCateg">
                    <p id="title-modal-Category" style="margin:0;"></p>
                </h4>
            </div>
            <!-- Modal Body -->

            <div class="modal-body">
				
			
			<input type="hidden" id="shopid1" name="shopid1" value="<?= $shop7["ShopID"]; ?>"/>
			<div class="col-sm-12">
				<label>Όνομα Κατηγορίας *</label><span id="availability2"></span>
				<input type="text" id="categoryname" name="categoryname" class="modalinputs" />
			</div>

		
		</div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
			    <input type="hidden" name="cur_action1" id="cur_action1" />
				<button type="button" name="action1" id="action1" class="btn btn-info"></button>
                <input type="submit" value="Κλείσιμο" id="categ_modal_close" class="btn btn-danger" data-dismiss="modal"/>
            </div>
        </div>
				
    </div>
</div>
   
   
   
   
   
   <!-- It will show Modal for Edit Category !-->
   
      <div class="modal fade" id="myModalHorizontalCategEdit" tabindex="-1" role="dialog" 
     aria-labelledby="myModalHorizontalCategEdit" aria-hidden="true">
    <div class="modal-dialog">
	
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalHorizontalCategEdit">
                    <p id="title-modal-Category-Edit" style="margin:0;"></p>
                </h4>
            </div>
            <!-- Modal Body -->

            <div class="modal-body">
				
			
			<input type="hidden" id="shopid2" value="<?= $shop7["ShopID"]; ?>"/>
			<div class="col-sm-12">

			<div class="container">
  <ul class="nav nav-tabs">
    <li id="edit_tab" class="active"><a data-toggle="tab" href="#edit">Επεξεργασία</a></li>
    <li id="delete_tab"><a data-toggle="tab" href="#delete">Διαγραφή</a></li>
  </ul>
  
  

  <div class="tab-content">
    <div id="edit" class="tab-pane fade in active">
      <center><h4>Αλλαγή Ονόματος Κατηγορίας</h4></center>
			<label>Επιλογή Κατηγορίας *</label>
			<div id="more_categories1"></div>
			<label>Αλλαγή ονόματος κατηγορίας σε *</label><span id="availability3"></span>
			<input type="text" id="updatedcateg" name="updatedcateg" class="modalinputs" />
    </div>
	<div id="delete" class="tab-pane">
		<center><h4>Διαγραφή Κατηγορίας</h4></center>
			<label>Επιλογή Κατηγορίας *</label>
			<div id="more_categories2"></div>
    </div>
  </div>
</div>
			
			
			
			
			</div>

		
		</div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
			    <input type="hidden" name="cur_action2" id="cur_action2" />
                <button type="button" name="action2" id="action2" class="btn btn-info"></button>
                <input type="submit" value="Κλείσιμο" id="categ_modal_close" class="btn btn-danger" data-dismiss="modal"/>
            </div>
        </div>
				
    </div>
</div>
   
   
   
   
   
   
   
<!-- It will show Modal for Create/Edit Item !-->
   
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
                    <p id="title-modal" style="margin:0;"></p>
                </h4>
            </div>
            <!-- Modal Body -->

            <div class="modal-body">
				
			
			<input type="hidden" id="shopid" value="<?= $shop7["ShopID"]; ?>"/>
			<div class="col-sm-12">
				<label>Όνομα Προϊόντος *</label>
				<input type="text" name="itemname" id="itemname" class="modalinputs" />
			</div><br>
			<div class="col-sm-8">
				<label>Κατηγορία *</label>
				<div id="more_categories"></div>
				
											
			</div><br>
			<div class="col-sm-4">
				<label>Κόστος (€) *</label>
				<input type="number" name="cost" id="cost" class="modalinputs two-decimals" min="0" max="100" step="0.10" value="0.00" />
			</div><br>
			<div class="col-sm-12">
				<label>Περιγραφή</label>
				<textarea name="description" id="description" class="textareamodal modalinputs"></textarea>
			</div>

		
		</div>
		
		
            
            <!-- Modal Footer -->
            <div class="modal-footer">
			    <input type="hidden" name="item" id="item" />
			    <input type="hidden" name="cur_action" id="cur_action" />
                <button type="button" name="action" id="action" class="btn btn-info"></button>
                <input type="submit" value="Κλείσιμο" class="btn btn-danger" data-dismiss="modal"/>
            </div>
        </div>
				
    </div>

</div>


<br>




<div class="data_message_action alert alert-success alert-dismissible" style="display:none;">
<span class='glyphicon glyphicon-plus'></span>
&nbsp;<p id="data_message_action"></p>
</div>
<div id="shopitems">
</div>
<br>
<br>



   </div>
</div>
	
	
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






<script src="https://code.jquery.com/jquery-1.12.3.min.js" integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script>
		<script type="text/javascript" src="js/moment-with-locales.min.js"></script>
		<script type="text/javascript" src="js/bootstrap-material-datetimepicker.js"></script>


<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script src="js/classie.js"></script>



<script>
//upload images with ajax
view_images();

function view_images(){
	var shopid = document.getElementById("shopid").value;
	var action = "Load";
	$.ajax(
            {
                url:'ajax_upload_images.php',
                type:'POST',
                data:'shopid=' + shopid + '&action=' + action,
				dataType:'html',

                success:function(data)
                {
					$("#all_images").html(data);
                },
            });
}

$(document).on('click', '#insert_img_btn', function(){
	document.getElementById("spinner").style.display = "inline";
	var fd = new FormData();
    var files = $('#file_image')[0].files[0];
    var shopid = document.getElementById("shopid").value;
    fd.append('file_image',files);
    fd.append('shopid',shopid);
    fd.append('action','Insert');
	

	
	$.ajax(
            {
                url:'ajax_upload_images.php',
                type:'POST',
                data: fd,
				contentType: false,
				processData: false,
				dataType:'html',

                success:function(data)
                {
					setTimeout(
					function() 
					{
						$("#alerts").html(data);
						$("#file_image").val("");
						document.getElementById("spinner").style.display = "none";
						view_images();
					}, 1000);
					
                },
            });
	
});


$(document).on('click', '.deleteimg', function(){
	document.getElementById("spinner").style.display = "inline";
	var imageid = $(this).attr("value");
	var imagepath = $("#imagepath").attr("value");
	var action = "Delete";
	
	if (confirm("Delete this image?")) {
		
		$.ajax(
				{
					url:'ajax_upload_images.php',
					type:'POST',
					data: 'imagepath=' + imagepath + '&imageid=' + imageid + '&action=' + action,
					dataType:'html',

					success:function(data)
					{
						setTimeout(
						  function() 
						  {
							  $("#file_image").val("");
						$("#alerts").html(data);
							document.getElementById("spinner").style.display = "none";
							view_images();
						  }, 1000);
						
					},
				});
				
	}
});
</script>


  
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/jquery.ui.addresspicker.js"></script>
  
  

<script>
$("#test_id").on("change", function () {
    if ($(this).is(":checked")) {
		document.getElementById('manualstatus').value = '0';
    } else {
		document.getElementById('manualstatus').value = '1';
    }
});



//infos sliders

$("#facebook_switch").on("change", function () {
    if ($(this).is(":checked")) {
		document.getElementById('visfacebook').value = '1';
    } else {
		document.getElementById('visfacebook').value = '0';
    }
});
$("#twitter_switch").on("change", function () {
    if ($(this).is(":checked")) {
		document.getElementById('vistwitter').value = '1';
    } else {
		document.getElementById('vistwitter').value = '0';
    }
});
$("#instagram_switch").on("change", function () {
    if ($(this).is(":checked")) {
		document.getElementById('visinstagram').value = '1';
    } else {
		document.getElementById('visinstagram').value = '0';
    }
});
$("#website_switch").on("change", function () {
    if ($(this).is(":checked")) {
		document.getElementById('viswebsite').value = '1';
    } else {
		document.getElementById('viswebsite').value = '0';
    }
});
$("#delivery_switch").on("change", function () {
    if ($(this).is(":checked")) {
		document.getElementById('visdeliverysite').value = '1';
    } else {
		document.getElementById('visdeliverysite').value = '0';
    }
});
$("#wifi_switch").on("change", function () {
    if ($(this).is(":checked")) {
		document.getElementById('viswifi').value = '1';
    } else {
		document.getElementById('viswifi').value = '0';
    }
});
$("#email_switch").on("change", function () {
    if ($(this).is(":checked")) {
		document.getElementById('visemail').value = '1';
    } else {
		document.getElementById('visemail').value = '0';
    }
});
$("#contactphone_switch").on("change", function () {
    if ($(this).is(":checked")) {
		document.getElementById('viscontactphone').value = '1';
    } else {
		document.getElementById('viscontactphone').value = '0';
    }
});
$("#contactphone2_switch").on("change", function () {
    if ($(this).is(":checked")) {
		document.getElementById('viscontactphone2').value = '1';
    } else {
		document.getElementById('viscontactphone2').value = '0';
    }
});



$("#delivery_checkbox").on("change", function () {
    if ($(this).is(":checked")) {
		document.getElementById('delivery').value = '1';
    } else {
		document.getElementById('delivery').value = '0';
    }
});
$("#onlinedelivery_checkbox").on("change", function () {
    if ($(this).is(":checked")) {
		document.getElementById('onlinedelivery').value = '1';
    } else {
		document.getElementById('onlinedelivery').value = '0';
    }
});
$("#standupcoffee_checkbox").on("change", function () {
    if ($(this).is(":checked")) {
		document.getElementById('standupcoffee').value = '1';
    } else {
		document.getElementById('standupcoffee').value = '0';
    }
});
$("#cosmotetv_checkbox").on("change", function () {
    if ($(this).is(":checked")) {
		document.getElementById('cosmotetv').value = '1';
    } else {
		document.getElementById('cosmotetv').value = '0';
    }
});
$("#nova_checkbox").on("change", function () {
    if ($(this).is(":checked")) {
		document.getElementById('nova').value = '1';
    } else {
		document.getElementById('nova').value = '0';
    }
});
$("#wifi_checkbox").on("change", function () {
    if ($(this).is(":checked")) {
		document.getElementById('wifi').value = '1';
    } else {
		document.getElementById('wifi').value = '0';
    }
});
</script>
  
  
    <script>
function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: <?= $shop7['Maps_Lat']; ?>, lng: <?= $shop7['Maps_Lng']; ?>},
      zoom: 16,
	  scrollwheel: true,
	  gestureHandling: 'greedy'
    });
    var input = document.getElementById('address_search');

    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    var marker = new google.maps.Marker({
        map: map,
		draggable: true,
		position: {lat: <?= $shop7['Maps_Lat']; ?>, lng: <?= $shop7['Maps_Lng']; ?>},
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
$(".two-decimals").change(function(){
  this.value = parseFloat(this.value).toFixed(2);
});



	loaddata();
	loadcategories();
	loadcategories1();
	loadcategories2();




//tab panel action2
$('a[href = "#delete"]').click(function(){
	$( "#action2" ).html("Διαγραφή");
	$('#cur_action2').val("Delete");
});

$('a[href = "#edit"]').click(function(){
	$( "#action2" ).val("Ενημέρωση");
	$('#cur_action2').val("Update");
});






function loaddata(){
  var action = "Load";
  $.ajax(
            {
                url:'fetch_items.php',
                type:'POST',
                data:'action=' + action + '&shopid=' + <?= $shopid ?>,
				dataType:'html',

                success:function(data)
                {
					$("#shopitems").html(data);
                },
            });
}








$('#additembtn').on('click', function () {
	
$('#itemname').val("");
$('#items_category').val("");
$('#description').val("");
$('#cost').val("");
$('#action').html("Προσθήκη");
$('#cur_action').val("Insert");
$('#title-modal').html("<span class='glyphicon glyphicon-plus'></span> Προσθήκη Προϊόντος");
$('#myModalHorizontal').modal('show');

});


$("#action").click(function(){

if (itemname.value != '' && items_category != '' && cost.value != ''){
	
				$.ajax(
            {
                url:'fetch_items.php',
                type:'POST',
                data:'itemid=' + item.value + '&description=' + description.value + '&action=' + $('#cur_action').val() + '&itemname=' + itemname.value + '&items_category=' + items_category.value + '&cost=' + cost.value + '&shopid=' + <?= $shopid ?>,
                
                success:function(data)
                {
                    loaddata();
					$('#myModalHorizontal').modal('hide');
					if($('#cur_action').val() == "Insert"){
							setTimeout(function() {
								$('.data_message_action').fadeIn(300);
							}, 300);
							
							setTimeout(function() {
								$('.data_message_action').fadeOut(500);
							}, 4000);
						$('#data_message_action').html("Επιτυχής προσθήκη προϊόντος");
					}else if($('#cur_action').val() == "Update"){
						setTimeout(function() {
								$('.data_message_action').fadeIn(300);
							}, 300);
							
							setTimeout(function() {
								$('.data_message_action').fadeOut(500);
							}, 4000);
						$('#data_message_action').html("Επιτυχής ενημέρωση προϊόντος");
					}
					
                },
            });
			
}else{
	alert("Both Fields are Required");
}
			
        });
	


	
 $(document).on('click', '.update', function(){
	var itemid = $(this).attr("value");
	$('#cur_action').val("Select");
	
	$.ajax(
            {
                url:'fetch_items.php',
                type:'POST',
                data:'itemid=' + itemid + '&action=' + $('#cur_action').val() + '&shopid=' + <?= $shopid ?>,
				dataType:'json',

                success:function(data)
                {
					$('#myModalHorizontal').modal('show');
					 $('#itemname').val(data.ItemName);
					 $('#items_category').val(data.ItemCategory);
					 $('#cost').val(data.Cost);
					 $('#description').val(data.Description);
					 $('#action').html("Ενημέρωση");
					 $('#cur_action').val("Update");
					 $('#title-modal').html("<span class='glyphicon glyphicon-pencil'></span> Ενημέρωση Προϊόντος");
					 $('#item').val(itemid);
                },
            });
	
});



$(document).on('click', '.delete', function(){
  var itemid = $(this).attr("value"); 
  if(confirm("Are you sure you want to remove  item with id: "+itemid+"?"))
  {
   var action = "Delete";
	
	$.ajax(
            {
                url:'fetch_items.php',
                type:'POST',
                data:'itemid=' + itemid + '&action=' + action + '&shopid=' + <?= $shopid ?>,
				dataType:'html',
                success:function(data)
                {
					loaddata();
                },
            });
			
  }
});

$(document).on('click', '.duplicate', function(){
  var itemid = $(this).attr("value"); 
  if(confirm("Are you sure you want to duplicate item with id: "+itemid+"?"))
  {
   var action = "Duplicate";
	
	$.ajax(
            {
                url:'fetch_items.php',
                type:'POST',
                data:'itemid=' + itemid + '&action=' + action + '&shopid=' + <?= $shopid ?>,
				dataType:'html',
                success:function(data)
                {
					loaddata();
                },
            });
			
  }
});









//load categories in create category modal //
function loadcategories(){
  var action1 = "Load";
  $.ajax(
            {
                url:'fetch_categories.php',
                type:'POST',
                data:'action1=' + action1 + '&shopid1=' + <?= $shopid ?>,
				dataType:'html',

                success:function(data)
                {
					$("#more_categories").html(data);
                },
            });
}



//load categories in edit category modal //
function loadcategories1(){
  var action2 = "Load";
  $.ajax(
            {
                url:'fetch_categories.php',
                type:'POST',
                data:'action2=' + action2 + '&shopid2=' + <?= $shopid ?>,
				dataType:'html',

                success:function(data)
                {
					$("#more_categories1").html(data);
                },
            });
}	


//load categories in delete category modal //
function loadcategories2(){
  var action2 = "Loader";
  $.ajax(
            {
                url:'fetch_categories.php',
                type:'POST',
                data:'action2=' + action2 + '&shopid2=' + <?= $shopid ?>,
				dataType:'html',

                success:function(data)
                {
					$("#more_categories2").html(data);
                },
            });
}	
	





$('#addcategorybtn').on('click', function () {
	
$('#categoryname').val("");
$('#cur_action1').val("Insert");
$('#action1').html("Προσθήκη");
$('#title-modal-Category').html("<span class='glyphicon glyphicon-plus'></span> Προσθήκη Κατηγορίας");
$('#myModalHorizontalCateg').modal('show');

});


$("#action1").click(function(){

if (categoryname.value != ''){
	
				$.ajax(
            {
                url:'fetch_categories.php',
                type:'POST',
                data:'categoryname=' + categoryname.value + '&action1=' + $('#cur_action1').val() + '&shopid1=' + <?= $shopid ?>,
                
                success:function(data)
                {
					loaddata();
					loadcategories();
					loadcategories1();
					loadcategories2();
					$('#myModalHorizontalCateg').modal('hide');
					if($('#cur_action1').val() == "Insert"){
							setTimeout(function() {
								$('.data_message_action').fadeIn(300);
							}, 300);
							
							setTimeout(function() {
								$('.data_message_action').fadeOut(500);
							}, 4000);
						$('#data_message_action').html("Επιτυχής προσθήκη κατηγορίας");
					}
					
                },
            });
			
}else{
	alert("Both Fields are Required");
}
			
        });

		
		
		

		
		
		
$('#editcategorybtn').on('click', function () {
	
$("#edit_tab").addClass("active");
$("#delete_tab").removeClass("active");

$("#edit").addClass("active");
$("#edit").addClass("in");
$("#delete").removeClass("active");
$("#delete").removeClass("in");


$('#selectedcategory').val("");
$('#updatedcateg').val("");	
$('#cur_action2').val("Update");
$('#action2').html("Ενημέρωση");
$('#title-modal-Category-Edit').html("<span class='glyphicon glyphicon-plus'></span> Επεξεργασία Κατηγορίας");
$('#myModalHorizontalCategEdit').modal('show');

});	
		
	

$("#action2").click(function(){

if (((updatedcateg.value != '') && ($('#cur_action2').val() == "Update")) || ((selectedcategory1.value != '') && ($('#cur_action2').val() == "Delete"))) {

				$.ajax(
            {
                url:'fetch_categories.php',
                type:'POST',
                data:'selectedcategory=' + selectedcategory.value + '&selectedcategory1=' + selectedcategory1.value + '&updatedcateg=' + updatedcateg.value + '&action2=' + $('#cur_action2').val() + '&shopid2=' + <?= $shopid ?>,
                
                success:function(data)
                {
					loaddata();
					loadcategories();
					loadcategories1();
					loadcategories2();
					$('#myModalHorizontalCategEdit').modal('hide');
					if($('#cur_action2').val() == "Update"){
							setTimeout(function() {
								$('.data_message_action').fadeIn(300);
							}, 300);
							
							setTimeout(function() {
								$('.data_message_action').fadeOut(500);
							}, 4000);
						$('#data_message_action').html("Επιτυχής ενημέρωση κατηγορίας");
					}else if ($('#cur_action2').val() == "Delete"){
						setTimeout(function() {
								$('.data_message_action').fadeIn(300);
							}, 300);
							
							setTimeout(function() {
								$('.data_message_action').fadeOut(500);
							}, 4000);
						$('#data_message_action').html("Επιτυχής διαγραφή κατηγορίας");
					}
					
                },
            });
			
}else{
	alert("Both Fields are Required");
}
			
        });	
		
		

</script>

	

</body>
</html>
<script>  

//create category modal

 $(document).ready(function(){  
   $('#categoryname').blur(function(){

     var categoryname = $(this).val();

	 if ((categoryname == 'Καφέδες') || (categoryname == 'Χυμοί') || (categoryname == 'Μπύρες') || (categoryname == 'Ποτά')){
		 
		$('#availability2').html('<span class="text-danger">This category is not available</span>');
		$('#action1').attr("disabled", true);
		
	 }else{
		 
		$('#availability2').html('<span class="text-danger"></span>');
		
     $.ajax({
      url:'check_category.php',
      method:"POST",
      data:{categ_name:categoryname, shopid:<?= $shopid ?>},
	  
		  
	  
      success:function(data)
      {
       if(data != '0')
       {
        $('#availability2').html('<span class="text-danger">This category is not available</span>');
		$('#action1').attr("disabled", true);
       }
       else
       {
		$('#availability2').html('<span class="text-danger"></span>');
		$('#action1').attr("disabled", false);
       }
      }
	  
     })
	 
	  }

  });
 }); 
 
 
 
 //edit category modal
 
  $(document).ready(function(){  
   $('#updatedcateg').blur(function(){

     var updatedcateg = $(this).val();

	 if ((updatedcateg == 'Καφέδες') || (updatedcateg == 'Χυμοί') || (updatedcateg == 'Μπύρες') || (updatedcateg == 'Ποτά')){
		 
		$('#availability3').html('<span class="text-danger">This category is not available</span>');
		$('#action2').attr("disabled", true);
		
	 }else{
		 
		$('#availability3').html('<span class="text-danger"></span>');
		
     $.ajax({
      url:'check_category.php',
      method:"POST",
      data:{update_categ_name:updatedcateg, shopid:<?= $shopid ?>},
	  
		  
	  
      success:function(data)
      {
       if(data != '0')
       {
        $('#availability3').html('<span class="text-danger">This category is not available</span>');
		$('#action2').attr("disabled", true);
       }
       else
       {
		$('#availability3').html('<span class="text-danger"></span>');
		$('#action2').attr("disabled", false);
       }
      }
	  
     })
	 
	  }

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