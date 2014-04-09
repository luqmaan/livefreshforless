<?php

$rowId = $_GET["rowId"];
$cid = $_COOKIE["cId"];

require_once( 'dbconnect.php');

//loop through DB values and append to string

$query = "SELECT * FROM sweetbay_shoppinglist WHERE id = '$cid'";
$result = mysql_query($query, $link) or die('Errant query:  ' . $query);

while ($row = mysql_fetch_array($result)) {
	$ingredients = $row['ingredients'];
}

$eIng = explode("\n", $ingredients);

unset($eIng[$rowId]);

$newIng = array_values($eIng);

$ing = implode("\n", $newIng);

$query2 = "UPDATE sweetbay_shoppinglist SET ingredients='$ing' WHERE id = '$cid'";
$result2 = mysql_query($query2, $link) or die('Errant query:  ' . $query);

?>