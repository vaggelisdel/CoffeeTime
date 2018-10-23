<?php
require '../../connection.php';
session_name("session3");
session_start();

if (isset($_POST['notificationbtn'])) {
	
	$adminid = $_POST['adminid'];
	$message = $_POST['message'];
	
	$sql = "INSERT INTO `notifications` (`AdminID`,`Message`) 
	                     VALUES ('$adminid', '$message');";
	$connect->query($sql);
	
	header("location: allnotifications.php");
}