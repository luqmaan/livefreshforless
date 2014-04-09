<?php

include_once('includes/dbconnect.php');

?>
<!DOCTYPE>
<html>
	<head>
		<title><?php include_once('includes/sitetitle.php') ?></title>
		<?php
		include_once ('includes/head.php');
		?>
	</head>
	<body>
		<div data-role="page" data-theme="s"  data-content-theme="s" id="home">
			<?php
			include_once ('includes/header.php');
			?>
			<!-- /header -->
			<div data-role="content">
				<ul data-role="listview" data-inset="true" data-theme="h">
					<li data-role="list-divider" role="heading" class="ui-bar-h header">Thanksgiving Recipes With A <span class="cursive">Twist!</span></li>
					<?php

					$query = "SELECT id, title FROM sweetbay_recipes";

					$result = mysql_query($query);

					while ($row = mysql_fetch_assoc($result)) {

						echo "<li><a href=\"recipe.php?rid=" . $row['id'] . "\" data-transition=\"flip\" >" . $row['title'] . "</a></li>";
					}
					?>
				</ul>
			</div>
			<!-- /content -->
			<?php
			include_once ('includes/footer.php');
			?>
			<!-- /footer -->
		</div>
		<!-- /page -->
	</body>
</html>