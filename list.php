<!DOCTYPE html>
<html>
	<head>
		<title>Shopping List - <?php
		include_once ('includes/sitetitle.php');
			?></title>
		<?php
		include_once ('includes/head.php');
		?>
		<script type="text/javascript">
			$('#contentContainer').triggerevent(function() {
				$('#contentContainer').page();
			});

		</script>
	</head>
	<body>
		<div data-role="page" data-theme="s"  data-content-theme="s" id="shoppinglist">
			<?php
			include_once ('includes/header.php');
			?>
			<?php
			include ('includes/backbutton.php');
			?>
			<a href="#" onClick="clearAll()" data-role="button" data-icon="delete" data-iconpos="right" class="skinnyButton" id="addButton" data-inline="true">Clear All Items</a>
			<!-- /header -->
			<div data-role="content" id="contentContainer">
				<h1>Shopping List</h1>
				<?php
				include_once ('includes/social.php');
				?>
				<ul class="shoppingList" data-theme="l">
					<?php
					$_GET['cid'] = $_COOKIE['cId'];
					include ('includes/genList.php');

					function str_replace_once($str_pattern, $str_replacement, $string) {
						if (strpos($string, $str_pattern) !== false) {
							$occurrence = strpos($string, $str_pattern);
							return substr_replace($string, $str_replacement, strpos($string, $str_pattern), strlen($str_pattern));
						}
						return $string;
					}

					$explodedIngredients = explode("\n", $ing);

					// format the ingredients into a bulleted list, and if there's a second ingredient list, separate it

					$i = 0;
					foreach ($explodedIngredients as $e) {
						if ($e != "" && !strstr($e, "--")) {
							$e = "<li>" . $e . "<a href=\"#\" data-theme=\"l\" data-role=\"button\" data-icon=\"delete\" data-iconpos=\"notext\" onClick=\"deleteItem($i)\"></a></li>";
							$i++;
						} elseif ($e == "") {
							$e = "<br />";
						} elseif (strstr($e, "--")) {
							$i++;
							$e = str_replace_once("--", "</ul><h1>", $e);
							$e = str_replace_once("--", "</h1><ul class=\"shoppingList\" data-theme=\"l\">", $e);
							//	$e = str_replace_once("--", "</li><li>", $e);
							//		$e = str_replace_once("--", "</li><li>", $e);
						}
						echo $e;
					}
				?>
				</ul>
				<br />
			</div>
			<!-- /content -->
			<?php
			include_once ('includes/footer.php');
					?> <!-- /footer -->
			</div>
			<!-- /page -->
	</body>
</html>