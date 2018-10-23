<?php
require '../../connection.php';
session_name("session3");
session_start();

if (isset($_POST['addnewadmin'])) {
	
	$usernamee = $_POST["username"];
	$firstnamee = $_POST["firstname"];
	$surnamee = $_POST["surname"];
	$password = $connect->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
	$email1 = $_POST["email"];
	$description = $_POST["description"];
	$hash = $connect->escape_string( md5( rand(0,1000) ) );
	
		
	$sql = "INSERT INTO `admins` (`UserName`, `FirstName`, `Surname`, `Password`, `E-mail`, `Hash`, `Active`, `Description`) 
	                     VALUES ('$usernamee', '$firstnamee', '$surnamee', '$password', '$email1','$hash', '1', '$description');";
	$connect->query($sql);
	
	$result = $connect->query("SELECT * FROM admins WHERE `UserName`='$usernamee' AND `FirstName`='$firstnamee' AND `Surname`='$surnamee' AND `E-mail`='$email1'");
	$admin = $result->fetch_assoc();
	$adminid = $admin['AdminID'];

	
	$sql = "INSERT INTO `adminimages` (`AdminID`) VALUES ('$adminid');";
	
	$connect->query($sql);
	
	
	$_SESSION['savedchanges'] = "Admin Created!";
	
	header("location: admins.php");

}else if (isset($_POST['addnewadminandnew'])) {
	
		$usernamee = $_POST["username"];
	$firstnamee = $_POST["firstname"];
	$surnamee = $_POST["surname"];
	$password = $connect->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
	$email1 = $_POST["email"];
	$description = $_POST["description"];
	$hash = $connect->escape_string( md5( rand(0,1000) ) );
	
		
	$sql = "INSERT INTO `admins` (`UserName`, `FirstName`, `Surname`, `Password`, `E-mail`, `Hash`, `Active`, `Description`) 
	                     VALUES ('$usernamee', '$firstnamee', '$surnamee', '$password', '$email1','$hash', '1', '$description');";
	$connect->query($sql);
	
	$result = $connect->query("SELECT * FROM admins WHERE `UserName`='$usernamee' AND `FirstName`='$firstnamee' AND `Surname`='$surnamee' AND `E-mail`='$email1'");
	$admin = $result->fetch_assoc();
	$adminid = $admin['AdminID'];

	
	$sql = "INSERT INTO `adminimages` (`AdminID`) VALUES ('$adminid');";
	
	$connect->query($sql);
	
	
	$_SESSION['messagebox'] = "Ο διαχειριστής δημιουργήθηκε!";
	
	header("location: createadmin.php");
	
}
	