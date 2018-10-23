<?php
require 'connection.php';

date_default_timezone_set('Europe/Athens');
$mytime = abs(strtotime(date('D') .' '. date('H:i:s' , time())));


$query="SELECT shops.*, shop_hours.*, 
		ABS(ACOS(SIN(radians(shops.Maps_Lat))*SIN($mylat_rad)+COS(radians(shops.Maps_Lat))*COS($mylat_rad)*COS($mylng_rad-(radians(shops.Maps_Lng)))))* 6371 DISTANCE
		FROM shop_hours, shops WHERE shops.ShopID = shop_hours.ShopID";
		
		$output=mysqli_query($connect,$query);

while($fetch = mysqli_fetch_assoc($output))
  {
	
	  if ($fetch['DISTANCE'] <= 5){
	
	
	if ($fetch['ManualStatus'] == "1"){
		
		
	
	switch (date("D")) {
	  case "Mon":
        $opentime = $fetch["Monday_Open"];
		$closetime = $fetch["Monday_Closed"];
        break;
    case "Tue":
        $opentime = $fetch["Tuesday_Open"];
		$closetime = $fetch["Tuesday_Closed"];
        break;
    case "Wed":
        $opentime = $fetch["Wednesday_Open"];
		$closetime = $fetch["Wednesday_Closed"];
        break;
	case "Thu":
        $opentime = $fetch["Thursday_Open"];
		$closetime = $fetch["Thursday_Closed"];
        break;
	case "Fri":
        $opentime = $fetch["Friday_Open"];
		$closetime = $fetch["Friday_Closed"];
        break;
	case "Sat":
        $opentime = $fetch["Saturday_Open"];
		$closetime = $fetch["Saturday_Closed"];
        break;
	case "Sun":
        $opentime = $fetch["Sunday_Open"];
		$closetime = $fetch["Sunday_Closed"];
        break;
    default:
        echo "Error Day";
		break;
	}

	
	
	if ((date("H:i:s") < $closetime) AND ($closetime < date("07:00:00"))){    //change the day after close shop
		$selection = date("D", strtotime( '-1 days' ));
		switch ($selection) {
	  case "Mon":
        $opentime= $fetch["Monday_Open"];
        break;
    case "Tue":
        $opentime = $fetch["Tuesday_Open"];
        break;
    case "Wed":
        $opentime = $fetch["Wednesday_Open"];
        break;
	case "Thu":
        $opentime = $fetch["Thursday_Open"];
        break;
	case "Fri":
        $opentime = $fetch["Friday_Open"];
        break;
	case "Sat":
        $opentime = $fetch["Saturday_Open"];
        break;
	case "Sun":
        $opentime = $fetch["Sunday_Open"];
        break;
    default:
        echo "Error Day";
		break;
	}

		$open1 = abs(strtotime(date("D",strtotime( '-1 week' )).' '.date($opentime , time()))); 
		$open = $open1 - 604800;
		$flag = 1;

	}else{
		
		$open = abs(strtotime(date("D").' '.date($opentime , time())));
		$flag = 0;

	}
	
	

	$closecheck = abs(strtotime(date("D").' '.date($closetime , time())));
	
	
	
	if (($flag == 0) AND ($closecheck <= $open)){
	
		$close = abs(strtotime(date("D",strtotime( '+1 days' )).' '.date($closetime , time()))); 

		
	}else{
		
		$close = abs(strtotime(date("D").' '.date($closetime , time()))); 
	
	}





	
	$shopid = $fetch['ShopID'];
	if ($mytime >= $open AND $mytime < $close){  /* Here check with current time if shop is opened or closed */
		if ($fetch['Status'] == "Opened"){  /* If status is already opened or closed break; else update table with new value */
			continue;
		}else{
			$status = "Opened";
			$query1="UPDATE shops SET Status = '$status' WHERE ShopID = '$shopid' ";
			$output1=mysqli_query($connect,$query1);
		}
	}else{
		if ($fetch['Status'] == "Closed"){
			continue;
		}else{
			$status = "Closed";
			$query1="UPDATE shops SET Status = '$status' WHERE ShopID = '$shopid' ";
			$output1=mysqli_query($connect,$query1);
		}
	}
	
	
	}else{
			$shopid = $fetch['ShopID'];
			$status = "Closed";
			$query1="UPDATE shops SET Status = '$status' WHERE ShopID = '$shopid' ";
			$output1=mysqli_query($connect,$query1);
	}
	
	  }else{
		  continue;
	  }
	  
	  
	
  };
  
  
?>