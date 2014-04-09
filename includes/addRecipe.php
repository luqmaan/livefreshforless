<?php

$title = $_POST['title'];
$longtitle = $_POST['longtitle'];
$ingredients = $_POST['ingredients'];
$directions = $_POST['directions'];
$cooktime = $_POST['cooktime'];
$preptime = $_POST['preptime'];
$servings = $_POST['servings'];
$seo = $_POST['seo'];

if ($title != '' && $ingredients != '' && $directions != '' && $servings != '' && $preptime != '' && $cooktime != '' && $_FILES['image']['name'] != '')
{
	function str_replace_once($str_pattern, $str_replacement, $string) {
		if (strpos($string, $str_pattern) !== false) {
			$occurrence = strpos($string, $str_pattern);
			return substr_replace($string, $str_replacement, strpos($string, $str_pattern), strlen($str_pattern));
		}
		return $string;
	}
	
	require_once ('../includes/dbconnect.php');
	
	$image = "../images/recipes/";
	
	$newFile = str_replace_once(" ", "", $title);
	
	/* grab the posts from the db */
	$query = "INSERT INTO sweetbay_recipes (title, longtitle, ingredients, directions, servings, preptime, cooktime, image, seo) VALUES ('$title', '$longtitle', '$ingredients', '$directions', '$servings', '$preptime', '$cooktime', '$image', '$seo')";
	$result = mysql_query($query, $link) or die('Errant query:  ' . $query);
	
	$rid = mysql_insert_id();
	
	$ext = explode(".", $_FILES['image']['name']);
	
	$newFileName = $rid . "_" . $newFile . "." . $ext[1];
	
	$image = $image . $newFileName;
	
	if(move_uploaded_file($_FILES['image']['tmp_name'], $image)) {
		//File Upload Success
		//echo "The file ".  basename( $_FILES['image']['name']). 
		" has been uploaded";
	} else{
		//File Upload Failure
		//echo "There was an error uploading the file, please try again!";
	}
	
	$image = "images/recipes/" . $newFileName;
	
	$query2 = "UPDATE sweetbay_recipes SET image = '$image' WHERE id = '$rid'";
	$result2 = mysql_query($query2, $link) or die('Errant query:  ' . $query2);
	
}
else
{
	echo "One or more required fields were left blank. Please go back and try again.";
}
?>