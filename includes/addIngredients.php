<?php

$rid = $_GET["rid"];
$cid = $_GET["cid"];

require_once( 'dbconnect.php');

//loop through DB values and append to string

$query = "SELECT * FROM sweetbay_recipes WHERE id = " . $rid;
$result = mysql_query($query, $link) or die('Errant query:  ' . $query);

while ($row = mysql_fetch_array($result)) {
	$ingredients = $row['grocerylist'];
	$title = $row['title'];
}

function str_replace_once($str_pattern, $str_replacement, $string) {
	if (strpos($string, $str_pattern) !== false) {
		$occurrence = strpos($string, $str_pattern);
		return substr_replace($string, $str_replacement, strpos($string, $str_pattern), strlen($str_pattern));
	}
	return $string;
}

$newIngredients = stripslashes($ingredients);
$newTitle = stripslashes($title);

$query2 = "UPDATE sweetbay_shoppinglist SET ingredients = CONCAT( ingredients, '--' , '$newTitle', '--\n' ,'$newIngredients', '\n' ) WHERE id = $cid";
$result2 = mysql_query($query2, $link) or die('Errant query:  ' . $query2);
?>