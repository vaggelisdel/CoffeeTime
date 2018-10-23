<?php
  
  require_once '../../connection.php';
  	session_name("session3");
	session_start();
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
  
		
	if ($_POST["action"] == "Load")
	{
		$shopid = $_POST['shopid'];

				$query = $connect->query("SELECT * FROM shopimages WHERE `Category` = 'others' AND `ShopID` = '$shopid' ORDER BY ImageID DESC");

				while($row = $query->fetch_assoc()) 
				{

				echo "<div class='imagebox'>
							<i class='deleteimg fa fa-times-circle' aria-hidden='true' value='".$row['ImageID']."'></i>
							<input type='hidden' id='imagepath' value='".$row['Image']."'/>
							<img src='../../".$row['Image']."' class='shopimages'/>
					  </div>";
				} 
	}
	
	if ($_POST["action"] == "Insert")
	{
	
	$query1 = "UPDATE `shops` SET `ModifyDate` = CURRENT_TIMESTAMP WHERE `ShopID` = '$shopid';)";
	$output1=mysqli_query($connect,$query1);
	
	$shopid = $_POST['shopid'];
		
	$file = $_FILES['file_image'];
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
				$fileDestination = '../../images/shop_photos/'.$fileNameNew;
				$filedest = 'images/shop_photos/'.$fileNameNew;
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
					
				$query = "INSERT INTO `shopimages` (`ShopID`, `Category`, `Image`) VALUES ('$shopid', 'others', '$filedest')";
				$output=mysqli_query($connect,$query);
			} else {
				echo "Πολύ μεγάλο μέγεθος αρχείου!";
			}
		}else {
			echo "Σφάλμα μεταφόρτωσης!";
		}
	}else{
		echo "Μη συμβατός τύπος αρχείου!";
		}
	}		

	if ($_POST["action"] == "Delete")
	{
		$query1 = "UPDATE `shops` SET `ModifyDate` = CURRENT_TIMESTAMP WHERE `ShopID` = '$shopid';)";
		$output1=mysqli_query($connect,$query1);
	
		$imageid = $_POST['imageid'];
		$imagepath = "../../".$_POST['imagepath'];

				$query = "DELETE FROM shopimages WHERE ImageID = $imageid;";
				$output=mysqli_query($connect,$query);
				
				unlink ($imagepath);
				
	}
	