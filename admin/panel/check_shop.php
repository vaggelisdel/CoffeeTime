<?php  
require '../../connection.php';
if(isset($_POST["user_name"]))
{
 $username = mysqli_real_escape_string($connect, $_POST["user_name"]);
 $query = "SELECT * FROM `shop_keepers` WHERE ShopUsername = '".$username."'";
 $result = mysqli_query($connect, $query);
 echo mysqli_num_rows($result);
}
if(isset($_POST["e_mail"]))
{
 $email = mysqli_real_escape_string($connect, $_POST["e_mail"]);
 $query = "SELECT * FROM `shops` WHERE `ShopE-mail` = '".$email."'";
 $result1 = mysqli_query($connect, $query);
 echo mysqli_num_rows($result1);
}
?>
