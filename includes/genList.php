<?php

$cid = $_GET["cid"];

require_once ('dbconnect.php');

$query = "SELECT * FROM sweetbay_shoppinglist WHERE id = $cid";
if ($cid == "")
	echo "Please add a recipe to your shopping list first.";
else {
	$result = mysql_query($query, $link) or die('Errant query:  ' . $query);

	while ($row = mysql_fetch_array($result)) {
		$ingredients = $row['ingredients'];
	}

	if ($ingredients == "")
		echo "Please add a recipe to your shopping list first.";

	$ing = stripslashes($ingredients);
}
//echo ($ing);
?>