<?php
require '../connection.php';
session_name("session3");
session_start();

	$count = 0;
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	
	$username_review = $_POST["username_review"];
	$email_review = $_POST["email_review"];
	$shopid = $_POST["shopid"];
	$mylat = $_POST["mylat"];
	$mylng = $_POST["mylng"];

	setcookie($shopid."username_review", $username_review, time()+60*60*24*30*6); //duration of cookie: 6 months
	setcookie($shopid."email_review", $email_review, time()+60*60*24*30*6);
	
	if (isset($_POST['liked'])){
		$liked = $_POST['liked'];
		setcookie($shopid."liked", $liked, time()+60*60*24*30*6);
	}
	if (isset($_POST['disliked'])){
		$disliked = $_POST['disliked'];
		setcookie($shopid."disliked", $disliked, time()+60*60*24*30*6);
	}
	if (isset($_POST['answers1'])){
		$rate1 = $_POST['answers1'];
		$count += 1;
		setcookie($shopid."rate1", $rate1, time()+60*60*24*30*6);
	}
	if (isset($_POST['answers2'])){
		$rate2 = $_POST['answers2'];
		$count += 1;
		setcookie($shopid."rate2", $rate2, time()+60*60*24*30*6);
	}
	if (isset($_POST['answers3'])){
		$rate3 = $_POST['answers3'];
		$count += 1;
		setcookie($shopid."rate3", $rate3, time()+60*60*24*30*6);
	}
	if (isset($_POST['answers4'])){
		$rate4 = $_POST['answers4'];
		$count += 1;
		setcookie($shopid."rate4", $rate4, time()+60*60*24*30*6);
	}
	$avgrate = round(($rate1 + $rate2 + $rate3 + $rate4)/$count, 2);
	
	$sql = "INSERT INTO `reviews` (`ShopID`, `Answer1`, `Answer2`, `Answer3`, `Answer4`, `Answer5`, `AvgRate`, `Liked`, `Disliked`, `ReviewName`, `ReviewE-mail`) 
	                       VALUES ('$shopid', '$rate1', '$rate2', '$rate3', '$rate4', '0', '$avgrate', '$liked', '$disliked', '$username_review', '$email_review');";
	$connect->query($sql);
	
	$sql1 = "SELECT AVG(AvgRate) AS TotalRate FROM `reviews` WHERE `ShopID`= '$shopid'";
	$output=mysqli_query($connect,$sql1);
	while($fetch = mysqli_fetch_assoc($output))
  {
	  $totalrate = $fetch["TotalRate"];
  }
	
	$sql2 = "UPDATE `shops` SET TotalRating = '$totalrate' WHERE `ShopID`= '$shopid'";
	$connect->query($sql2);
	

	header("Location: shop.php?shopid=$shopid&lat=$mylat&lng=$mylng");
	
	
