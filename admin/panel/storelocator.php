<?php

require("../../connection.php");

// Get parameters from URL
$center_lat = $_GET["lat"];
$center_lng = $_GET["lng"];
$radius = $_GET["radius"];

// Start XML file, create parent node
$dom = new DOMDocument;
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);
// Opens a connection to a mySQL server

// Search the rows in the markers table
$query = sprintf("SELECT ShopID, ShopName, Country, Maps_Lat, Maps_Lng, ( 3959 * acos( cos( radians('%s') ) * cos( radians( Maps_Lat ) ) * cos( radians( Maps_Lng ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( Maps_Lat ) ) ) ) AS distance FROM shops HAVING distance < '%s' ORDER BY distance",
  mysqli_real_escape_string($connect, $center_lat),
  mysqli_real_escape_string($connect, $center_lng),
  mysqli_real_escape_string($connect, $center_lat),
  mysqli_real_escape_string($connect, $radius));
  
$result = mysqli_query($connect, $query);


// Iterate through the rows, adding XML nodes for each
while ($row = mysqli_fetch_array($result)){
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("id", $row['ShopID']);
  $newnode->setAttribute("name", $row['ShopName']);
  $newnode->setAttribute("city", $row['Country']);
  $newnode->setAttribute("lat", $row['Maps_Lat']);
  $newnode->setAttribute("lng", $row['Maps_Lng']);
  $newnode->setAttribute("distance", $row['distance']);
}
echo $dom->saveXML();
?>