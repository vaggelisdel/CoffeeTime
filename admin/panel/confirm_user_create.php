<?php
require '../../connection.php';
session_name("session3");
session_start();

if (isset($_POST['addnewuser'])) {
	
	$usernamee = $_POST["username_new"];
	$firstnamee = $_POST["firstname_new"];
	$surnamee = $_POST["surname_new"];
	$password = $connect->escape_string(password_hash($_POST['password_new'], PASSWORD_BCRYPT));
	$email1 = $_POST["email_new"];
	$description = $_POST["description_new"];
	$hash = $connect->escape_string( md5( rand(0,1000) ) );

	
		
	$sql = "INSERT INTO `users` (`UserName`, `FirstName`, `Surname`, `Password`, `E-mail`, `Hash`, `Active`, `Description`) 
	                     VALUES ('$usernamee', '$firstnamee', '$surnamee', '$password', '$email1','$hash', '1', '$description');";
	$connect->query($sql);
	
	$result = $connect->query("SELECT * FROM users WHERE `UserName`='$usernamee' AND `FirstName`='$firstnamee' AND `Surname`='$surnamee' AND `E-mail`='$email1'");
	$user = $result->fetch_assoc();
	$_SESSION['userid'] = $user['UserID'];
	$userid = $_SESSION['userid'];
	
	$sql = "INSERT INTO `userimages` (`UserID`) VALUES ('$userid');";
	
	$connect->query($sql);
	
	$_SESSION['savedchanges'] = "User Created!";
	
	header("location: users.php");
	
	
}else if (isset($_POST['addnewuserandnew'])) {
		$usernamee = $_POST["username_new"];
	$firstnamee = $_POST["firstname_new"];
	$surnamee = $_POST["surname_new"];
	$password = $connect->escape_string(password_hash($_POST['password_new'], PASSWORD_BCRYPT));
	$email1 = $_POST["email_new"];
	$description = $_POST["description_new"];
	$hash = $connect->escape_string( md5( rand(0,1000) ) );

	
		
	$sql = "INSERT INTO `users` (`UserName`, `FirstName`, `Surname`, `Password`, `E-mail`, `Hash`, `Active`, `Description`) 
	                     VALUES ('$usernamee', '$firstnamee', '$surnamee', '$password', '$email1','$hash', '1', '$description');";
	$connect->query($sql);
	
	$result = $connect->query("SELECT * FROM users WHERE `UserName`='$usernamee' AND `FirstName`='$firstnamee' AND `Surname`='$surnamee' AND `E-mail`='$email1'");
	$user = $result->fetch_assoc();
	$_SESSION['userid'] = $user['UserID'];
	$userid = $_SESSION['userid'];
	
	$sql = "INSERT INTO `userimages` (`UserID`) VALUES ('$userid');";
	
	$connect->query($sql);
	
	$_SESSION['messagebox'] = "User Created!";
	
	header("location: createuser.php");
}
