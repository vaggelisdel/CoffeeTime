<?php
  
  require_once '../connection.php';

$mylat = $_POST['lat'];
$mylng = $_POST['lng'];

$latitude1 = $mylat;
$longitude1 = $mylng;
	
$mylat_rad = deg2rad($mylat);
$mylng_rad = deg2rad($mylng);;


  $query="SELECT shops.*, shopimages.*, abilities.*,
		ABS(ACOS(SIN(radians(shops.Maps_Lat))*SIN($mylat_rad)+COS(radians(shops.Maps_Lat))*COS($mylat_rad)*COS($mylng_rad-(radians(shops.Maps_Lng)))))* 6371 DISTANCE 
		FROM shopimages, shops, abilities WHERE shops.ShopID = shopimages.ShopID AND shops.ShopID = abilities.ShopID AND shopimages.Category = 'logo'";

  
  if (isset($_POST["open"])){
	  $query .="AND shops.Status = 'Opened' ";
  }
  if (isset($_POST["close"])){
	  $query .="AND shops.Status = 'Closed' ";    
  }
  if (isset($_POST["delivery"])){
	  $query .="AND abilities.Delivery = '1' ";    
  }
  if (isset($_POST["online"])){
	  $query .="AND abilities.OnlineDelivery = '1' ";    
  }
  if (isset($_POST["onhand"])){
	  $query .="AND abilities.StandUpCoffee = '1' ";    
  }
  if (isset($_POST["wifi"])){
	  $query .="AND abilities.WiFi = '1' ";    
  }
  if (isset($_POST["cosmotetv"])){
	  $query .="AND abilities.OTETV = '1' ";    
  }
  if (isset($_POST["nova"])){
	  $query .="AND abilities.Nova = '1' ";    
  }
  
  
  $query .="ORDER BY shops.Status ASC ";
  
  if (isset($_POST["distance_desc"])){
	  $query .=",DISTANCE DESC ";
	    
  }
  if (isset($_POST["distance_asc"])){
	   $query .=",DISTANCE ASC ";
  }
  
  if (isset($_POST["rating_asc"])){
	   $query .=",TotalRating ASC ";
  }
  
  if (isset($_POST["rating_desc"])){
	   $query .=",TotalRating DESC ";
  }
  
    if (isset($_POST["added_recently"])){
	   $query .=",RegisterDate DESC";
  }

  
  if (isset($_POST["distance_desc"]) OR isset($_POST["distance_asc"])){
  }else{
	  $query .=",DISTANCE ASC ";
  }
  
  
  $output=mysqli_query($connect,$query);
  
  $counter = 0;
  echo '<center><p id="shops_found"></p></center>';
		  while($fetch = mysqli_fetch_assoc($output))
		  {
			  
			  
			  $shopid = $fetch['ShopID'];
			  $result = $connect->query("SELECT count(*) as total FROM reviews WHERE ShopID = $shopid");
			  $totalreviews = $result->fetch_assoc();
			  
			  $result = $connect->query("SELECT avg(AvgRate) as avg FROM reviews WHERE ShopID = $shopid");
			  $avgrate = $result->fetch_assoc();


			  
			$today = strtotime(date("D"));	
			$regday = strtotime($fetch['RegisterDate']);
			  
			$distance = $fetch['DISTANCE'] * 1000;
	
	if ($distance > 5000){
						
						continue;
					}
		$counter += 1;			
	if ($fetch['Status'] == "Opened"){
		include 'openedshops.php';
	}else{
		include 'closedshops.php';
	}

  }
  if ($counter == 0){
					echo "<script>document.getElementById('shops_found').innerHTML = 'Δεν βρέθηκαν καφετέριες.';</script>";
				}else{
					echo "<script>document.getElementById('shops_found').innerHTML = 'Bρέθηκαν $counter καφετέριες στην περιοχή σου.';</script>";
				}
  
 ?>