<!DOCTYPE>
<html>
<head>
<title>Add Recipe</title>
	<?php
		include_once ('includes/head.php');
	?>
</head>

<body>
<div data-role="page" data-theme="s"  data-content-theme="s" id="recipe">
<div id="logo" align="center"><img src="images/logo.png" />
</div>
<div data-role="content">
<form action="includes/addRecipe.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <p>
    <label>Recipe Name
      <input type="text" name="title" id="title" />
    </label>
  </p>
  <p>
    <label>Full Recipe Title
      <input type="text" name="longtitle" id="longtitle" />
(Optional)    </label>
  </p>
  <p>
    <label>Image
      <input type="file" name="image" id="image" />
    </label>
  </p>
  <p>
    <label>Servings
      <input type="text" name="servings" id="servings" />
    </label>
  </p>
  <p>
    <label>Prep Time
      <input type="text" name="preptime" id="preptime" />
    </label>
  </p>
  <p>
    <label>Cook Time
      <input type="text" name="cooktime" id="cooktime" />
    </label>
  </p>
  <p>
    <label>Ingredients<br />
<textarea name="ingredients" id="ingredients" cols="45" rows="5"></textarea>
    </label>
  </p>
  <p>
    <label>Directions<br />
<textarea name="directions" id="directions" cols="45" rows="5"></textarea>
    </label>
  </p>
  <p>
    <input type="submit" name="submitBtn" id="submitBtn" value="Add Recipe" />
  </p>
</form>
</div>
	<?php
		include_once ('includes/footer.php');
	?>
</div>
</body>
</html>
