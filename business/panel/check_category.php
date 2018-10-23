<?php  
//check.php  
require '../../connection.php';
if(isset($_POST["categ_name"]))
{
 $categ_name = $_POST['categ_name'];
 $shopid = $_POST['shopid'];
	
		 $query = "SELECT * FROM itemcategories WHERE CategoryName = '$categ_name' AND ShopID = '$shopid'";
		 $result = mysqli_query($connect, $query);
		 echo mysqli_num_rows($result);
}

if(isset($_POST["update_categ_name"]))
{
 $update_categ_name = $_POST['update_categ_name'];
 $shopid = $_POST['shopid'];
	
		 $query = "SELECT * FROM itemcategories WHERE CategoryName = '$update_categ_name' AND ShopID = '$shopid'";
		 $result = mysqli_query($connect, $query);
		 echo mysqli_num_rows($result);
}
?>
