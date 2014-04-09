<?php

$cid = $_GET["cid"];

require_once( 'dbconnect.php');

$query = "UPDATE sweetbay_shoppinglist SET ingredients = '' WHERE id = $cid";
$result = mysql_query($query, $link) or die('Errant query:  ' . $query2);
?>