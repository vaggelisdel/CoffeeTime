<?php
  
  require_once '../../connection.php';
  error_reporting(E_ERROR | E_WARNING | E_PARSE);
  
  
  if ($_POST["action1"] == "Insert")
	{
		  $shopid1 = $_POST['shopid1'];
		  $categoryname = $_POST['categoryname'];

		  $query="INSERT INTO itemcategories (ShopID, CategoryName) VALUE ('$shopid1', '$categoryname') ";
		  
		  
		  $output=mysqli_query($connect,$query);
		  

	}	
	
	
	
	/** Load categories to create items modal **/
	
	if ($_POST["action1"] == "Load")
	{
		$shopid1 = $_POST['shopid1'];
		
		
		echo "<select class='items_category modalinputs' name='items_category' id='items_category'>
												<option selected disabled></option>
												<option value='Καφέδες'>Καφέδες</option>
												<option value='Χυμοί'>Χυμοί</option>
												<option value='Μπύρες'>Μπύρες</option>
												<option value='Ποτά'>Ποτά</option>";
		
		
		$query = $connect->query("SELECT * FROM itemcategories WHERE `ShopID` ='$shopid1' ");
		
		
		while($r = $query->fetch_assoc()) {	
		
			
			echo "<option value='".$r["CategoryName"]."'>".$r["CategoryName"]."</option>";
			
		}
		
		
		echo "</select>";
	}
	
	
	
	
	
	/** Load categories to edit category modal **/
	
	if ($_POST["action2"] == "Load")
	{
		$shopid2 = $_POST['shopid2'];
		
		
		echo "<select class='items_category modalinputs' name='selectedcategory' id='selectedcategory'>
												<option selected disabled></option>";
		
		
		$query = $connect->query("SELECT * FROM itemcategories WHERE `ShopID` ='$shopid2'");
		
		
		while($r = $query->fetch_assoc()) {	
		
			
			echo "<option value='".$r["CategoryName"]."'>".$r["CategoryName"]."</option>";
			
		}
		
		
		echo "</select>";
	}
	
	
	
	
	if ($_POST["action2"] == "Loader")
	{
		$shopid2 = $_POST['shopid2'];
		
		
		echo "<select class='items_category modalinputs' name='selectedcategory1' id='selectedcategory1'>
												<option selected disabled></option>";
		
		
		$query = $connect->query("SELECT * FROM itemcategories WHERE `ShopID` ='$shopid2'");
		
		
		while($r = $query->fetch_assoc()) {	
		
			
			echo "<option value='".$r["CategoryName"]."'>".$r["CategoryName"]."</option>";
			
		}
		
		
		echo "</select>";
	}
	
	
	
	if ($_POST["action2"] == "Update")
	{
		  $shopid2 = $_POST['shopid2'];
		  $selectedcategory = $_POST['selectedcategory'];
		  $updatedcateg = $_POST['updatedcateg'];

		  $query="UPDATE itemcategories SET CategoryName = '$updatedcateg' WHERE `CategoryName` = '$selectedcategory' AND `ShopID` = '$shopid2'";
		  
		  
		  $output=mysqli_query($connect,$query);
		  
		  $query="UPDATE shopitems SET ItemCategory = '$updatedcateg' WHERE `ItemCategory` = '$selectedcategory' AND `ShopID` = '$shopid2'";
		  
		  
		  $output=mysqli_query($connect,$query);

	}	
	
	
	
	
	if ($_POST["action2"] == "Delete")
	{
		  $shopid2 = $_POST['shopid2'];
		  $selectedcategory1 = $_POST['selectedcategory1'];
		  
		  $query="UPDATE shopitems SET ItemCategory = 'Δεν υπάρχει κατηγορία' WHERE `ItemCategory` = '$selectedcategory1' AND `ShopID` = '$shopid2'";
		  
		  
		  $output=mysqli_query($connect,$query);

		  $query="DELETE FROM itemcategories WHERE `CategoryName` = '$selectedcategory1' AND `ShopID` = '$shopid2'";
		  
		  
		  $output=mysqli_query($connect,$query);
		  
		 

	}	
	
?>