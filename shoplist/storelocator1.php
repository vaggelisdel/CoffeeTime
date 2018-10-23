<?php

require("../connection.php");

// Get parameters from URL
$center_lat = $_GET["lat"];
$center_lng = $_GET["lng"];

$center_lat_rad = deg2rad($center_lat);
$center_lng_rad = deg2rad($center_lng);

// Start XML file, create parent node
$dom = new DOMDocument;
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);
// Opens a connection to a mySQL server

// Search the rows in the markers table
$query = "SELECT shops.*, shopimages.*, 
		ABS(ACOS(SIN(radians(shops.Maps_Lat))*SIN($center_lat_rad)+COS(radians(shops.Maps_Lat))*COS($center_lat_rad)*COS($center_lng_rad-(radians(shops.Maps_Lng)))))* 6371 DISTANCE 
		FROM shopimages, shops WHERE shops.ShopID = shopimages.ShopID ";
  
  
if ($_GET['status'] == "opened"){
	$query .= "AND shops.Status = 'Opened' ";
}
if ($_GET['status'] == "closed"){
	$query .= "AND shops.Status = 'Closed' ";
}
$result = mysqli_query($connect, $query);


// Iterate through the rows, adding XML nodes for each
while ($row = mysqli_fetch_array($result)){
if ($row['DISTANCE'] * 1000 > 5000){
	continue;
}else{
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("id", $row['ShopID']);
  $newnode->setAttribute("image", $row['Image']);
  $newnode->setAttribute("name", $row['ShopName']);
  $newnode->setAttribute("country", $row['Country']);
  $newnode->setAttribute("address", $row['ShopAddress']);
  $newnode->setAttribute("addressnum", $row['ShopAddressNumber']);
  $newnode->setAttribute("city", $row['ShopCity']);
  $newnode->setAttribute("tk", $row['ShopTK']);
  $newnode->setAttribute("lat", $row['Maps_Lat']);
  $newnode->setAttribute("lng", $row['Maps_Lng']);
}
}
echo $dom->saveXML();
?>