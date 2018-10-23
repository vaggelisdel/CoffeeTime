<?php
require '../../connection.php';
session_name("session3");
session_start();

if (isset($_POST['edituserinfobtn'])) {
	
	$adminid1 = $_POST["adminid1"];
	$username = $_POST["username"];
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"];
	$active = $_POST["active"];
	$description = $_POST["description"];
	$lastlogin = $_POST["lastlogin"];
	
	$prevlogo = '../../'.$_SESSION['adminimage'];
	
		
	                    
	if(!isset($_POST['password']) || trim($_POST['password'])) {
		$password = $connect->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));	
		
		$sql = "UPDATE `admins` SET `UserName` = '$username', `FirstName` = '$firstname', `Surname` = '$lastname', `Password` = '$password', `E-mail` = '$email', `Active` = '$active', `Description` = '$description', `LastAdminLogin` = '$lastlogin' WHERE `AdminID` = '$adminid1';";
		$connect->query($sql);
		
				if ($_FILES['file']['name']== ""){
					$samelogo = $_SESSION['adminimage'];
					$result = $connect->query("UPDATE adminimages SET `AdminImage` = '$samelogo' WHERE `AdminID`= '$adminid1'");

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
								$fileDestination = '../../images/admins/'.$fileNameNew;
								$filedest = 'images/admins/'.$fileNameNew;
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
								
								if ($prevlogo == "../../images/admins/defaultimage.png"){
									$result = $connect->query("UPDATE adminimages SET `AdminImage` = '$filedest' WHERE `AdminID`= '$adminid1'");
								}else{
									unlink ($prevlogo);
									$result = $connect->query("UPDATE adminimages SET `AdminImage` = '$filedest' WHERE `AdminID`= '$adminid1'");
								}
								header("location: admins.php");
							} else {
								echo "Your file is too big!";
							}
						} else {
							echo "There was an error uploading your file!";
						}
					}else {
				echo "You cannot upload files of this type!";
			}

		}
		
	}else{
		
		$sql = "UPDATE `admins` SET `UserName` = '$username', `FirstName` = '$firstname', `Surname` = '$lastname', `E-mail` = '$email', `Active` = '$active', `Description` = '$description', `LastAdminLogin` = '$lastlogin' WHERE `AdminID` = '$adminid1';";
		$connect->query($sql);
		
						if ($_FILES['file']['name']== ""){
					$samelogo = $_SESSION['adminimage'];
					$result = $connect->query("UPDATE adminimages SET `AdminImage` = '$samelogo' WHERE `AdminID`= '$adminid1'");

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
								$fileDestination = '../../images/admins/'.$fileNameNew;
								$filedest = 'images/admins/'.$fileNameNew;
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
								
								if ($prevlogo == "../../images/admins/defaultimage.png"){
									$result = $connect->query("UPDATE adminimages SET `AdminImage` = '$filedest' WHERE `AdminID`= '$adminid1'");
								}else{
									unlink ($prevlogo);
									$result = $connect->query("UPDATE adminimages SET `AdminImage` = '$filedest' WHERE `AdminID`= '$adminid1'");
								}
								header("location: admins.php");
							} else {
								echo "Your file is too big!";
							}
						} else {
							echo "There was an error uploading your file!";
						}
					}else {
				echo "You cannot upload files of this type!";
			}

		}
		
		
	}
	
	
	
	$_SESSION['savedchanges'] = 'Οι αλλαγές αποθηκεύτηκαν!';
	
	header("location: admins.php");
}


if ($_POST['deleteadmin_ckeck'] == "1") {
	
	$prevlogo = '../../'.$_SESSION['adminimage'];
	
	$adminid1 = $_POST["adminid1"];
	
	if ($prevlogo == "../../images/admins/defaultimage.png"){
	}else{
		unlink ($prevlogo);
	}
	$sql = "DELETE FROM admins WHERE `AdminID` = '$adminid1';";
	
	$connect->query($sql);
	
	$_SESSION['savedchanges'] = 'Επιτυχής διαγραφή!';
	
	header("location: admins.php");
}