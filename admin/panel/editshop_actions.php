<?php
require '../../connection.php';
session_name("session3");
session_start();


if (isset($_POST['editinfobtn'])) {
	
	$shopid = $connect->escape_string($_POST["shopid"]);
	$shopname = $connect->escape_string($_POST["shopname"]);
	$shopaddress = $connect->escape_string($_POST["shopaddress"]);
	$shopaddressnum = $connect->escape_string($_POST["shopaddressnum"]);
	$shopcity = $connect->escape_string($_POST["shopcity"]);
	$shoptk = $connect->escape_string($_POST["shoptk"]);
	$contactphone = $connect->escape_string($_POST["contactphone"]);
	$contactphone2 = $connect->escape_string($_POST["contactphone2"]);
	$shopemail = $connect->escape_string($_POST["shopemail"]);
	$maplat = $connect->escape_string($_POST["maplat"]);
	$maplng = $connect->escape_string($_POST["maplng"]);
	$manualstatus = $connect->escape_string($_POST["manualstatus"]);
	$active = $connect->escape_string($_POST["active_status"]);
	
	$shopusername = $connect->escape_string($_POST['username']);
	
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
	

	$delivery = $connect->escape_string($_POST['delivery']);
	$standupcoffee = $connect->escape_string($_POST['standupcoffee']);
	$onlinedelivery = $connect->escape_string($_POST['onlinedelivery']);
	$wifi = $connect->escape_string($_POST['wifi']);
	$cosmotetv = $connect->escape_string($_POST['cosmotetv']);
	$nova = $connect->escape_string($_POST['nova']);
	
	
	$prevlogo = '../../'.$_SESSION['logoimage'];
	
	$facebookurl = $connect->escape_string($_POST['facebook']);
	$instagramurl = $connect->escape_string($_POST['instagram']);
	$twitterurl = $connect->escape_string($_POST['twitter']);
	$website = $connect->escape_string($_POST['website']);
	$deliverysite = $connect->escape_string($_POST['deliverysite']);
	$wifipassword = $connect->escape_string($_POST['wifipassword']);
	
	
	$visfacebook = $connect->escape_string($_POST["visfacebook"]);
	$vistwitter = $connect->escape_string($_POST["vistwitter"]);
	$visinstagram = $connect->escape_string($_POST["visinstagram"]);
	$viswebsite = $connect->escape_string($_POST["viswebsite"]);
	$visdeliverysite = $connect->escape_string($_POST["visdeliverysite"]);
	$viswifi = $connect->escape_string($_POST["viswifi"]);
	$visemail = $connect->escape_string($_POST["visemail"]);
	$viscontactphone = $connect->escape_string($_POST["viscontactphone"]);
	$viscontactphone2 = $connect->escape_string($_POST["viscontactphone2"]);
	
	
	
	if(!isset($_POST['password']) || trim($_POST['password'])) {
		$sql = "UPDATE `shops` SET `ModifyDate` = CURRENT_TIMESTAMP WHERE `ShopID` = '$shopid';";
		$connect->query($sql);
		
		$shoppassword = $connect->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
		
		$sql = "UPDATE `shops` SET `ShopName` = '$shopname', `ShopAddress` = '$shopaddress', `ShopAddressNumber` = '$shopaddressnum', `ShopCity` = '$shopcity', `ShopTK` = '$shoptk', `ManualStatus` = '$manualstatus', `ContactPhone` = '$contactphone', `ContactPhone2` = '$contactphone2', `ShopE-mail` = '$shopemail', `Maps_Lat` = '$maplat', `Maps_Lng` = '$maplng', `Active` = '$active', `WiFiPassword` = '$wifipassword' WHERE `ShopID` = '$shopid';";
		$connect->query($sql);
		
		$sql = "UPDATE `shop_keepers` SET `ShopUsername` = '$shopusername', `ShopPassword` = '$shoppassword' WHERE `ShopID` = '$shopid';";
		$connect->query($sql);
		
		$sql = "UPDATE `shop_hours` SET `Monday_Open` = '$monday_open', `Monday_Closed` = '$monday_close', `Tuesday_Open` = '$tuesday_open', `Tuesday_Closed` = '$tuesday_close', `Wednesday_Open` = '$wednesday_open', `Wednesday_Closed` = '$wednesday_close', `Thursday_Open` = '$thursday_open', `Thursday_Closed` = '$thursday_close', `Friday_Open` = '$friday_open', `Friday_Closed` = '$friday_close', `Saturday_Open` = '$saturday_open', `Saturday_Closed` = '$saturday_close', `Sunday_Open` = '$sunday_open', `Sunday_Closed` = '$sunday_close' WHERE `ShopID` = '$shopid';";
		$connect->query($sql);
		
		$sql = "UPDATE `social` SET `FacebookURL` = '$facebookurl', `InstagramURL` = '$instagramurl', `TwitterURL` = '$twitterurl', `Website` = '$website', `DeliverySite` = '$deliverysite', `WiFiPassword` = '$wifipassword'  WHERE `ShopID` = '$shopid';";
		$connect->query($sql);
		
		$sql = "UPDATE `infosvisibility` SET `VisFacebookURL` = '$visfacebook', `VisTwitterURL` = '$vistwitter', 
		`VisInstagramURL` = '$visinstagram', `VisWebsite` = '$viswebsite', `VisDeliverySite` = '$visdeliverysite', 
		`WiFiPassword` = '$viswifi', `VisContactPhone` = '$viscontactphone', `VisContactPhone2` = '$viscontactphone2', 
		`VisShopE-mail` = '$visemail'  WHERE `ShopID` = '$shopid';";
		$connect->query($sql);
		
		$sql = "UPDATE `abilities` SET `Delivery` = '$delivery', `OnlineDelivery` = '$onlinedelivery', `StandUpCoffee` = '$standupcoffee', `WiFi` = '$wifi', `OTETV` = '$cosmotetv', `Nova` = '$nova' WHERE `ShopID` = '$shopid';";
		$connect->query($sql);
		
		
		
		
		  

		if ($_FILES['file']['name']== ""){
			$samelogo = $_SESSION['logoimage'];
			$result = $connect->query("UPDATE shopimages SET `Image` = '$samelogo' WHERE `ShopID`= '$shopid'");

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
					if ($fileSize < 55000000) {
						$fileNameNew = uniqid('', true).".".$fileActualExt;
						$fileDestination = '../../images/logos/'.$fileNameNew;
						$filedest = 'images/logos/'.$fileNameNew;
						
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
						
						move_uploaded_file($fileTmpName, $fileDestination);
						unlink ($prevlogo);
						$result = $connect->query("UPDATE shopimages SET `Image` = '$filedest' WHERE `ShopID`= '$shopid'  AND Category = 'logo'");
						header("location: shops.php");
					} else {
						echo "Your file is too big!";
					}
				} else {
					echo "There was an error uploading your file!";
				}
			} else {
				echo "You cannot upload files of this type!";
			}
		

				}
		
	}else{
		
		$sql = "UPDATE `shops` SET `ModifyDate` = CURRENT_TIMESTAMP WHERE `ShopID` = '$shopid';";
		$connect->query($sql);
		
		$sql = "UPDATE `shops` SET `ShopName` = '$shopname', `ShopAddress` = '$shopaddress', `ShopAddressNumber` = '$shopaddressnum', `ShopCity` = '$shopcity', `ShopTK` = '$shoptk', `ManualStatus` = '$manualstatus', `ContactPhone` = '$contactphone', `ContactPhone2` = '$contactphone2', `ShopE-mail` = '$shopemail', `Maps_Lat` = '$maplat', `Maps_Lng` = '$maplng', `Active` = '$active', `WiFiPassword` = '$wifipassword' WHERE `ShopID` = '$shopid';";
		$connect->query($sql);
		
		$sql = "UPDATE `shop_keepers` SET `ShopUsername` = '$shopusername' WHERE `ShopID` = '$shopid';";
		$connect->query($sql);
		
		$sql = "UPDATE `shop_hours` SET `Monday_Open` = '$monday_open', `Monday_Closed` = '$monday_close', `Tuesday_Open` = '$tuesday_open', `Tuesday_Closed` = '$tuesday_close', `Wednesday_Open` = '$wednesday_open', `Wednesday_Closed` = '$wednesday_close', `Thursday_Open` = '$thursday_open', `Thursday_Closed` = '$thursday_close', `Friday_Open` = '$friday_open', `Friday_Closed` = '$friday_close', `Saturday_Open` = '$saturday_open', `Saturday_Closed` = '$saturday_close', `Sunday_Open` = '$sunday_open', `Sunday_Closed` = '$sunday_close' WHERE `ShopID` = '$shopid';";
		$connect->query($sql);
		
		$sql = "UPDATE `social` SET `FacebookURL` = '$facebookurl', `InstagramURL` = '$instagramurl', `TwitterURL` = '$twitterurl', `Website` = '$website', `DeliverySite` = '$deliverysite'  WHERE `ShopID` = '$shopid';";
		$connect->query($sql);
		
		$sql = "UPDATE `infosvisibility` SET `VisFacebookURL` = '$visfacebook', `VisTwitterURL` = '$vistwitter', 
		`VisInstagramURL` = '$visinstagram', `VisWebsite` = '$viswebsite', `VisDeliverySite` = '$visdeliverysite', 
		`WiFiPassword` = '$viswifi', `VisContactPhone` = '$viscontactphone', `VisContactPhone2` = '$viscontactphone2', 
		`VisShopE-mail` = '$visemail'  WHERE `ShopID` = '$shopid';";
		$connect->query($sql);
		
		$sql = "UPDATE `abilities` SET `Delivery` = '$delivery', `OnlineDelivery` = '$onlinedelivery', `StandUpCoffee` = '$standupcoffee', `WiFi` = '$wifi', `OTETV` = '$cosmotetv', `Nova` = '$nova' WHERE `ShopID` = '$shopid';";
		$connect->query($sql);
		
		
		if ($_FILES['file']['name']== ""){
			$samelogo = $_SESSION['logoimage'];
			$result = $connect->query("UPDATE shopimages SET `Image` = '$samelogo' WHERE `ShopID`= '$shopid'");
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
					if ($fileSize < 55000000) {
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
						
						
						unlink ($prevlogo);
						$result = $connect->query("UPDATE shopimages SET `Image` = '$filedest' WHERE `ShopID`= '$shopid' AND Category = 'logo'");
						header("location: shops.php");
					} else {
						echo "Your file is too big!";
					}
				} else {
					echo "There was an error uploading your file!";
				}
			} else {
				echo "You cannot upload files of this type!";
			}

				}
	
	
	
	
	
	
	
	
	
}
	$_SESSION['savedchanges'] = 'Οι αλλαγές αποθηκεύτηκαν!';
	header("location: shops.php");
}









if ($_POST['deleteshop_ckeck'] == "1") {
	
	$prevlogo = '../../'.$_SESSION['logoimage'];
	
	$shopid = $connect->escape_string($_POST["shopid"]);
	
	if ($prevlogo == "../../images/logos/defaultimg.png"){
		
	}else{
		unlink ($prevlogo);
	}

	$sql = "DELETE FROM shops WHERE `ShopID` = '$shopid';";
	
	$connect->query($sql);
	
	$_SESSION['savedchanges'] = 'Επιτυχής διαγραφή!';
	
	header("location: shops.php");
}


?>

