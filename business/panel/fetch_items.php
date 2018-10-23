<?php
  
  require_once '../../connection.php';

  
  	if($_POST["action"] == "Select")
	{
		$itemid = $_POST["itemid"];
		$shopid = $_POST["shopid"];
		
		$query = $connect->query("SELECT * FROM shopitems 
		   WHERE ItemID = '$itemid' AND ShopID = '$shopid' 
		   LIMIT 1");
		$item = $query->fetch_assoc();
		
		  $values = array('ItemName' => $item["ItemName"], 'ItemCategory' => $item["ItemCategory"], 'Cost' => $item["Cost"], 'Description' => $item["Description"]);

		  echo json_encode($values);  
	}
	
	
	
	
	if ($_POST["action"] == "Update")
	{
		$shopid = $_POST['shopid'];
		$items_category = $_POST['items_category'];
		$itemname = $_POST['itemname'];
		$cost = $_POST['cost'];
		$itemid = $_POST['itemid'];
		$description = $_POST['description'];

		$query="UPDATE shopitems SET ShopID = '$shopid', ItemCategory = '$items_category', ItemName = '$itemname', Cost = '$cost', Description = '$description' WHERE ItemID = '$itemid'";
		    
		$output=mysqli_query($connect,$query);
	}
	
	
	
	
	if ($_POST["action"] == "Delete")
	{
		$shopid = $_POST['shopid'];
		$itemid = $_POST['itemid'];

		$query="DELETE FROM shopitems WHERE ItemID = '$itemid'";
		    
		$output=mysqli_query($connect,$query);
  
	}
	
		if ($_POST["action"] == "Duplicate")
	{
		$shopid = $_POST['shopid'];
		$itemid = $_POST['itemid'];
		$query = $connect->query("SELECT * FROM shopitems 
		   WHERE ItemID = '$itemid' AND ShopID = '$shopid' 
		   LIMIT 1");
		$item = $query->fetch_assoc();
		$values = array('ItemName' => $item["ItemName"], 'ItemCategory' => $item["ItemCategory"], 'Cost' => $item["Cost"], 'Description' => $item["Description"]);
		
		$query="INSERT INTO shopitems (ShopID, ItemCategory, ItemName, Cost, Description) VALUES ('$shopid', '$values[ItemCategory]', '$values[ItemName]', '$values[Cost]', '$values[Description]') ";
		    
		$output=mysqli_query($connect,$query);
  
	}
	
	
	
	
	if ($_POST["action"] == "Insert")
	{
		  $shopid = $_POST['shopid'];
		  $items_category = $_POST['items_category'];
		  $itemname = $_POST['itemname'];
		  $cost = $_POST['cost'];
		  $description = $_POST['description'];

		  $query="INSERT INTO shopitems (ShopID, ItemCategory, ItemName, Cost, Description) VALUE ('$shopid', '$items_category', '$itemname', '$cost', '$description') ";
		  
		  
		  $output=mysqli_query($connect,$query);
		  

	}	
	
	
	
	
	if ($_POST["action"] == "Load")
	{
		$shopid = $_POST['shopid'];
	echo "<table>
					<tr>
						<th width='5%'>Κωδ.</th>
						<th width='20%'>Προϊόν</th>
						<th width='15%'>Κατηγορία</th>
						<th width='10%'>Τιμή</th>
						<th width='40%'>Περιγραφή</th>
						<th width='10%'>Ενέργειες</th>
					</tr>";

				$query = $connect->query("SELECT * FROM shopitems WHERE `ShopID` ='$shopid' ORDER BY ItemCategory ASC");

				while($r = $query->fetch_assoc()) 
				{

				echo "<tr>
					<td>".$r['ItemID']."</td>
					<td>".$r['ItemName']."</td>
					<td>".$r['ItemCategory']."</td>
					<td>".$r['Cost']." €</td>
					<td>".$r['Description']."</td>
					<td><center><button type='button' value=".$r["ItemID"]." class='item_btns update'><span class='glyphicon glyphicon-pencil'></span></button>
						<button type='button' value=".$r["ItemID"]." class='item_btns delete'><span class='glyphicon glyphicon-remove'></span></button>
						<button type='button' value=".$r["ItemID"]." class='item_btns duplicate'><span class='glyphicon glyphicon-duplicate'></span></button></center></td>
					</tr>";
				} 
				echo "</table>";
	}
	
 ?>