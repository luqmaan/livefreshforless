<?php
require_once( 'dbconnect.php');

$query = "INSERT INTO sweetbay_shoppinglist (ingredients) VALUES ('')";
$result = mysql_query($query) or die('Errant query:  ' . $query);

$cookieID = mysql_insert_id();
echo $cookieID;
?>