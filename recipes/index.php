<?php

$seo = $_GET['seo'];

//1. check to see if a "real" file exists..

if(file_exists($DOCUMENT_ROOT.$REQUEST_URI)
and ($SCRIPT_FILENAME!=$DOCUMENT_ROOT.$REQUEST_URI)
and ($REQUEST_URI!="/")){
$url=$REQUEST_URI;
include($DOCUMENT_ROOT.$url);
exit();
}

/*//2. if not, go ahead and check for dynamic content.
$url=strip_tags($REQUEST_URI);
$url_array=explode("/",$url);
array_shift($url_array); //the first one is empty anyway

if(empty($url_array)){ //we got a request for the index
header( 'Location: ../index.php') ;
 
exit();
}

//Look if anything in the Database matches the request 
//This is an empty prototype. Insert your solution here.

require_once ('../includes/dbconnect.php');

foreach ($url_array as $item) {
	
	echo($item);
	
	//$query = "SELECT * FROM sweetbay_recipes WHERE seo = " . $item;
	//$result = mysql_query($query, $link);
	
	//while($row = mysql_fetch_array($result))
  	//{
  	//	header( 'Location: http://www.squareoneapps.com/sweetbay/recipe.php?rid=' . $row['seo']) ;
  	//	exit();
  	//}
}
*/

require_once ('../includes/dbconnect.php');
	$query = "SELECT * FROM sweetbay_recipes WHERE seo = '$seo'";
	$result = mysql_query($query, $link);
	
	if($result != null)
	{
		while($row = mysql_fetch_array($result))
  		{
  			header( 'Location: http://www.livefreshforless.com/recipe.php?rid=' . $row['id']) ;
  			exit();
  		}
  	}
  	else{
  		echo"null";
  	}
?>