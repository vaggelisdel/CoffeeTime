<?php
/* Displays user information and some useful messages */

session_name("session3");
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
require '../../connection.php';

if ($_SESSION['adminonline'] == 1) {
		$username = $_SESSION['username'];
		$firstname = $_SESSION['name'];
		$surname = $_SESSION['surname'];
		$regdate = $_SESSION['RegisterDate'];
		$adminid = $_SESSION['adminid'];
		$adminimage = $_SESSION['adminimage'];
		
		$result_1 = $connect->query("SELECT * FROM admins WHERE AdminID = '$adminid'");
		$admindata_1 = $result_1->fetch_assoc();
		$result_2 = $connect->query("SELECT * FROM adminimages WHERE AdminID = '$adminid'");
		$admindata_2 = $result_2->fetch_assoc();
		
	}else{

		$_SESSION['message'] = "You must log in before viewing your profile page!";
		header("location: ../login/error.php");  
		$_SESSION['adminonline'] = 0;
	}
          
?>
<?php
$result = $connect->query("SELECT count(*) as shopstotal FROM shops");
$shops = $result->fetch_assoc();
$result1 = $connect->query("SELECT count(*) as userstotal FROM users");
$users = $result1->fetch_assoc();
$result2 = $connect->query("SELECT count(*) as msgtotal FROM notifications");
$msg = $result2->fetch_assoc();
$result31 = $connect->query("SELECT count(*) as adminstotal FROM admins");
$admins = $result31->fetch_assoc();
$result3 = $connect->query("SELECT CURRENT_TIMESTAMP as datetime;");
$datetime = $result3->fetch_assoc();
?>