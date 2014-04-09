<?php

$rid = $_GET["rid"];

require_once ('includes/dbconnect.php');

/* grab the posts from the db */
$query = "SELECT * FROM sweetbay_recipes WHERE id = " . $rid;
$result = mysql_query($query, $link) or die('Errant query:  ' . $query);

while ($row = mysql_fetch_array($result)) {
	$title = $row['title'];
	$longtitle = $row['longtitle'];
	$ingredients = $row['ingredients'];
	$directions = $row['directions'];
	$cooktime = $row['cooktime'];
	$preptime = $row['preptime'];
	$image = $row['image'];
	$servings = $row['servings'];
}

function str_replace_once($str_pattern, $str_replacement, $string) {
	if (strpos($string, $str_pattern) !== false) {
		$occurrence = strpos($string, $str_pattern);
		return substr_replace($string, $str_replacement, strpos($string, $str_pattern), strlen($str_pattern));
	}
	return $string;
}
?>
<!DOCTYPE>
<html>
	<head>
		<title><?php echo $title . " - "; include_once('includes/sitetitle.php')
			?></title>
		<?php
		include_once ('includes/head.php');
		?>
	</head>
	<body>
		<div data-role="page" data-theme="s"  data-content-theme="s" id="recipe">
			<?php
			include_once ('includes/header.php');
			?>
			<?php
			include ('includes/backbutton.php');
			?>
			<a href="#" onClick="addToList()" data-role="button" data-icon="plus" data-iconpos="right" class="skinnyButton" id="addButton" data-inline="true">Add To Shopping List</a>
			<!-- /header -->
			<div class="clearfix"></div>
			<div data-role="content" id="contentContainer">
				<img class="recipe" src="<?php echo $image;?>" />
				<h1><?php echo $title;?></h1>
				<?php
				include_once ('includes/social.php');
				?>
				<h2><?php echo $longtitle;?></h2>
				<p>
					Servings: <?php echo $servings;?>
					<br />
					Prep Time: <?php echo $preptime;?>
					<br />
					Cook Time: <?php echo $cooktime;?>
					<br />
				</p>
				<h2>Ingredients</h2>
				<ul class="ingredients">
					<?php
					$explodedIngredients = explode("\n", $ingredients);

					// format the ingredients into a bulleted list, and if there's a second ingredient list, separate it

					foreach ($explodedIngredients as $e) {
						if ($e != "" && !strstr($e, "--")) {
							$e = "<li>" . $e . "</li>";
						} elseif ($e == "") {
							$e = "<br />";
						} elseif (strstr($e, "--")) {
							$e = str_replace_once("--", "</ul><h2>", $e);
							$e = str_replace_once("--", "</h2><ul class=\"ingredients\">", $e);
						}
						echo $e;
					}
				?>
</ul>
<h2>Directions</h2>
<ol class="directions">
<?php

$explodedDirections = explode("\n", $directions);

// format the ingredients into a bulleted list, and if there's a second ingredient list, separate it

foreach ($explodedDirections as $e) {
	if ($e != "" && !strstr($e, "--")) {
		$e = "<li>" . $e . "</li>";
	} elseif ($e == "") {
		$e = "<br />";
	} elseif (strstr($e, "--")) {
		$e = str_replace_once("--", "</ul><h2>", $e);
		$e = str_replace_once("--", "</h2><ol class=\"directions\">", $e);
	}
	echo $e;
}
					?>
					</ol>
			</div>
			<!-- /content -->
			<?php
			include_once ('includes/footer.php');
			?>
					<script type="text/javascript">

			function readCookie(name) {
var nameEQ = name + "=";
var ca = document.cookie.split(';');
for(var i=0;i < ca.length;i++) {
var c = ca[i];
while (c.charAt(0)==' ') c = c.substring(1,c.length);
if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
}
return null;
}

function addToList() {
	//See if cookie exists, if not, create one.
	checkCookie();
	
	//Append ingredients to DB (PHP)
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		//Remove this event
		}
	}

	var rid = "<?php echo $rid;?>";
	var cid = readCookie('cId');
	var url = "includes/addIngredients.php?";
	url += "rid=" + rid;
	url += "&cid=" + cid;
	
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
	
	alert ("<?php echo $title;?> has been added to your shopping list.");
}
		</script>
			<!-- /footer -->
		</div>
		<!-- /page -->
	</body>
</html>