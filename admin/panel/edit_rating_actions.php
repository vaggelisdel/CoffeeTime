<?php
require '../../connection.php';
session_name("session3");
session_start();

if (isset($_POST["action"])) {
	
	$reviewid = $_POST["reviewid"];
	$shopid = $_POST["shopid"];
	
		$sql = "DELETE FROM `reviews` WHERE `ReviewID` = '$reviewid';";
		$connect->query($sql);
		
		$sql1 = "SELECT AVG(AvgRate) AS TotalRate FROM `reviews` WHERE `ShopID`= '$shopid'";
		$output=mysqli_query($connect,$sql1);
		while($fetch = mysqli_fetch_assoc($output))
	  {
		  $totalrate = $fetch["TotalRate"];
	  }
		
		$sql2 = "UPDATE `shops` SET TotalRating = '$totalrate' WHERE `ShopID`= '$shopid'";
		$connect->query($sql2);
		
		$_SESSION['return_msg'] = "Material deleted!";
		header("Location: allratings.php");
}else{
	header("Location: index.php");
}