<?php
require '../../connection.php';
session_name("session3");
session_start();

if (isset($_POST['deletemsgbtn'])) {
	
	$notificationid = $_POST['notificationid'];
	
	$query = $connect->query("DELETE FROM `notifications` WHERE `notifications`.`Notification_ID` = '$notificationid';");
	
	header("location: allnotifications.php");
}