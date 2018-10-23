<?php
require '../../connection.php';
// Escape email to protect against SQL injections
$username = $connect->escape_string($_POST['username']);
$result = $connect->query("SELECT * FROM shop_keepers WHERE `ShopUsername`='$username'");

if ( $result->num_rows == 0 ){ // shopkeeper doesn't exist
    $_SESSION['message'] = "Shop with that username doesn't exist!";
    header("location: error.php");
}
else { // shopkeeper exists
    $shopkeeper = $result->fetch_assoc();
	

    if ( password_verify($_POST['password'], $shopkeeper['ShopPassword'])) {
		
		$shopid = $shopkeeper['ShopID'];
		$_SESSION['shopid'] = $shopkeeper['ShopID'];
        // This is how we'll know the shopkeeper is logged in
		
			$_SESSION['online_shop'] = 1;
			
			$result4 = $connect->query("UPDATE shop_keepers SET `LastShopLogin` = CURRENT_TIMESTAMP WHERE `ShopID` ='$shopid'");
			
			header("location: ../panel/index.php");
	}else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: error.php");
    }
}

