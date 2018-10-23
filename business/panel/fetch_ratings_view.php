<?php
  
  require_once '../../connection.php';
  	session_name("session3");
	session_start();
	error_reporting(E_ERROR | E_WARNING | E_PARSE);

	if ($_SESSION['online_shop'] == 1){
  
  	if($_POST["action"] == "Select")
	{
		$reviewid = $_POST["reviewid"];
		
		$query = $connect->query("SELECT shops.*, reviews.* FROM shops, reviews WHERE shops.ShopID = reviews.ShopID AND reviews.ReviewID = '$reviewid'");
		$review = $query->fetch_assoc();
		
		  $values = array('ShopID' => $review["ShopID"], 'ShopName' => $review["ShopName"], 'ReviewID' => $review["ReviewID"], 'Answer1' => $review["Answer1"], 'Answer2' => $review["Answer2"], 'Answer3' => $review["Answer3"], 'Answer4' => $review["Answer4"], 'Answer5' => $review["Answer5"], 'AvgRate' => $review["AvgRate"], 'Liked' => $review["Liked"], 'Disliked' => $review["Disliked"], 'ReviewDate' => $review["ReviewDate"], 'ReviewName' => $review["ReviewName"], 'ReviewEmail' => $review["ReviewE-mail"]);
		  echo json_encode($values);  
	}
	
	}else{
		header("Location: index.php");
	}
?>