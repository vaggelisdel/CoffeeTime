<?php
require '../../connection.php';
session_name("session3");
session_start();


if (isset($_POST['addnewshop'])) {
	
	$checked = 1;

	$_SESSION['savedchanges'] = "Το κατάστημα δημιουργήθηκε!";
	
	header("location: shops.php");
	
}

else if (isset($_POST['addnewshopandnew'])) {
	
	$checked = 1;
	$_SESSION['messagebox'] = "Το κατάστημα δημιουργήθηκε!";
	
	header("location: createshop.php");
	
}

if ($checked == 1){

	$shopname = $connect->escape_string($_POST["shopname"]);
	$address = $connect->escape_string($_POST["address"]);
	$addressno = $connect->escape_string($_POST["addressno"]);
	$city = $connect->escape_string($_POST["city"]);
	$tk = $connect->escape_string($_POST["tk"]);
	$phone = $connect->escape_string($_POST["phone"]);
	$phone2 = $connect->escape_string($_POST["phone2"]);
	$email = $connect->escape_string($_POST["email"]);
	$maplat = $connect->escape_string($_POST["maplat"]);
	$maplng = $connect->escape_string($_POST["maplng"]);
	$createdby = $connect->escape_string($_POST["createdby"]);
	
	
		
	$sql = "INSERT INTO `shops` (`ShopName`, `ShopAddress`, `ShopAddressNumber`, `ShopCity`, `ShopTK`, `ContactPhone`, `ContactPhone2`, `ShopE-mail`, `Maps_Lat`, `Maps_Lng`, `CreatedBy`) 
	                     VALUES ('$shopname', '$address', '$addressno', '$city', '$tk', '$phone', '$phone2', '$email', '$maplat', '$maplng', '$createdby');";
	$connect->query($sql);
	
	$result1 = $connect->query("SELECT * FROM shops WHERE `ShopName` = '$shopname' AND `Maps_Lat` = '$maplat' AND `Maps_Lng` ='$maplng'");
	$getid = $result1->fetch_assoc();
	
	
	
	
	$shopid = $getid['ShopID'];
	$username = $connect->escape_string($_POST["username"]);
	$password = $connect->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
	
	$sql = "INSERT INTO `shop_keepers` (`ShopID`, `ShopUsername`, `ShopPassword`) 
	                     VALUES ('$shopid', '$username', '$password');";
	$connect->query($sql);
	
	
	
	
	$monday_open = $connect->escape_string($_POST['monday_open']);
	$monday_close = $connect->escape_string($_POST['monday_close']);
	
	$tuesday_open = $connect->escape_string($_POST['tuesday_open']);
	$tuesday_close = $connect->escape_string($_POST['tuesday_close']);
	
	$wednesday_open = $connect->escape_string($_POST['wednesday_open']);
	$wednesday_close = $connect->escape_string($_POST['wednesday_close']);
	
	$thursday_open = $connect->escape_string($_POST['thursday_open']);
	$thursday_close = $connect->escape_string($_POST['thursday_close']);
	
	$friday_open = $connect->escape_string($_POST['friday_open']);
	$friday_close = $connect->escape_string($_POST['friday_close']);
	
	$saturday_open = $connect->escape_string($_POST['saturday_open']);
	$saturday_close = $connect->escape_string($_POST['saturday_close']);
	
	$sunday_open = $connect->escape_string($_POST['sunday_open']);
	$sunday_close = $connect->escape_string($_POST['sunday_close']);
	
	$sql = "INSERT INTO `shop_hours` (`ShopID`,`Monday_Open`, `Monday_Closed`, `Tuesday_Open`, `Tuesday_Closed`, `Wednesday_Open`, `Wednesday_Closed`, `Thursday_Open`, `Thursday_Closed`, `Friday_Open`, `Friday_Closed`, `Saturday_Open`, `Saturday_Closed`, `Sunday_Open`, `Sunday_Closed`)
							 VALUES ('$shopid', '$monday_open', '$monday_close', '$tuesday_open', '$tuesday_close', '$wednesday_open', '$wednesday_close', '$thursday_open', '$thursday_close', '$friday_open', '$friday_close', '$saturday_open', '$saturday_close', '$sunday_open', '$sunday_close');";
	$connect->query($sql);
	
	$delivery = $connect->escape_string($_POST["delivery"]);
	$standupcoffee = $connect->escape_string($_POST["standupcoffee"]);
	$onlinedelivery = $connect->escape_string($_POST["onlinedelivery"]);
	$wifi = $connect->escape_string($_POST["wifi"]);
	$otetv = $connect->escape_string($_POST["otetv"]);
	$nova = $connect->escape_string($_POST["nova"]);
	
		if (!isset($_POST['delivery'])){
			$delivery=0;
		}
		else if (isset($_POST['delivery'])){
			$delivery=1;
		}
		
		if (!isset($_POST['standupcoffee'])){
			$standupcoffee=0;
		}
		
		else if (isset($_POST['standupcoffee'])){
			$standupcoffee=1;
		}
		
		if (!isset($_POST['onlinedelivery'])){
			$onlinedelivery=0;
		}
		
		else if (isset($_POST['onlinedelivery'])){
			$onlinedelivery=1;
		}
		
		if (!isset($_POST['wifi'])){
			$wifi=0;
		}
		
		else if (isset($_POST['wifi'])){
			$wifi=1;
		}
		
		if (!isset($_POST['otetv'])){
			$otetv=0;
		}
		
		else if (isset($_POST['otetv'])){
			$otetv=1;
		}
		
		if (!isset($_POST['nova'])){
			$nova=0;
		}
		
		else if (isset($_POST['nova'])){
			$nova=1;
		}
		
	$sql = "INSERT INTO `abilities` (`ShopID`, `Delivery`, `StandUpCoffee`, `OnlineDelivery`, `WiFi`, `OTETV`, `Nova`) 
	        VALUES ('$shopid', '$delivery' ,'$standupcoffee', '$onlinedelivery', '$wifi', '$otetv', '$nova');";
	$connect->query($sql);
	
	
	
	
	
	if ($_FILES['file']['name']== ""){
			$result = $connect->query("INSERT INTO `shopimages` (`ShopID`, `Category`) VALUES ('$shopid', 'logo');");
	}else{
	$file = $_FILES['file'];
	
	$fileName = $file['name'];
	$fileTmpName = $file['tmp_name'];
	$fileSize = $file['size'];
	$fileError = $file['error'];
	$fileType = $file['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg', 'jpeg', 'png', 'pdf');

	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
			if ($fileSize < 1000000) {
				$fileNameNew = uniqid('', true).".".$fileActualExt;
				$fileDestination = '../../images/logos/'.$fileNameNew;
				$filedest = 'images/logos/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
				
						function compress_image($source_url, $destination_url, $quality) {
						$info = getimagesize($source_url);
					 
						if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
						elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
						elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
					 
						//save it
						imagejpeg($image, $destination_url, $quality);
					 
						//return destination file url
						return $destination_url;
						}
						 
						$source_photo = $fileDestination;
						 
						$d = compress_image($source_photo, $source_photo, 50);
				
				$result = $connect->query("INSERT INTO `shopimages` (`ShopID`, `Category`, `Image`) VALUES ('$shopid', 'logo', '$filedest');");
				$_SESSION['logoimage'] = $filedest;
			} else {
				$result = $connect->query("INSERT INTO `shopimages` (`ShopID`, `Category`) VALUES ('$shopid', 'logo');");
			}
		} else {
			$result = $connect->query("INSERT INTO `shopimages` (`ShopID`, `Category`) VALUES ('$shopid', 'logo');");
		}
	} else {
		$result = $connect->query("INSERT INTO `shopimages` (`ShopID`, `Category`) VALUES ('$shopid', 'logo');");
	}
}

}else{
	header("Location: createshop.php");
}

