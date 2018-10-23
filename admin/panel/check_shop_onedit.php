<?php  
require '../../connection.php';
if(isset($_POST["user_name"]))
{
 $username = mysqli_real_escape_string($connect, $_POST["user_name"]);
 $shopid = mysqli_real_escape_string($connect, $_POST["shop_id"]);
 $query = "SELECT * FROM `shop_keepers` WHERE ShopUsername = '".$username."' AND ShopID <> '$shopid'";
 $result = mysqli_query($connect, $query);
 echo mysqli_num_rows($result);
}
if(isset($_POST["e_mail"]))
{
 $email = mysqli_real_escape_string($connect, $_POST["e_mail"]);
 $shopid = mysqli_real_escape_string($connect, $_POST["shop_id"]);
 $query = "SELECT * FROM `shops` WHERE `ShopE-mail` = '".$email."' AND ShopID <> '$shopid'";
 $result1 = mysqli_query($connect, $query);
 echo mysqli_num_rows($result1);
}
?>
