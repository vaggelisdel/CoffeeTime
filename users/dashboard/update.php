<?php
session_name("session3");
session_start();
	require_once '../../connection.php';
	
	if(isset($_POST['update_btn'])) {
		

						
		$_SESSION['name'] = $_POST['name'];
		$_SESSION['surname'] = $_POST['surname'];
		$_SESSION['City'] = $_POST['city'];
		
		

		
		$userid = $_SESSION['userid'];
		$name = $connect->escape_string($_POST['name']);
		$surname = $connect->escape_string($_POST['surname']);
		$city = $connect->escape_string($_POST['city']);
		
		
		if(!isset($_POST['password']) || trim($_POST['password'])) {
			$password = $connect->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
			$sql = "UPDATE `users` SET `FirstName` = '$name', `Surname` = '$surname', `Password` = '$password' WHERE `UserID` = '$userid';";
			$_SESSION['password'] = $password;
		}else{
			$password = $_SESSION['password'];
			$sql = "UPDATE `users` SET `FirstName` = '$name', `Surname` = '$surname' WHERE `UserID` = '$userid';";		
			}                     
		$connect->query($sql);
		
		
		if ($_FILES['file']['name']== "")
		{
		}else{
			$prevlogo = '../../'.$_SESSION['userimageprev'];
			
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
						$fileDestination = '../../images/users/'.$fileNameNew;
						$filedest = 'images/users/'.$fileNameNew;
						move_uploaded_file($fileTmpName, $fileDestination);
							$result = $connect->query("UPDATE userimages SET `UserImage` = '$filedest' WHERE `UserID`= '$userid'");
							$_SESSION['userimage'] = $filedest;
							if($_SESSION['userimage'] == "images/users/defaultimage.png"){
							}else{
								unlink ($prevlogo);
							}
						$_SESSION['userimageprev'] = $filedest;
					
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
				
		header("location: index.php");
	}
	?>
	
	