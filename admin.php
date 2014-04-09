<!DOCTYPE>
<html>
<head>
<title>Add Recipe</title>
<link rel="stylesheet" type="text/css" href="css/default.css" />
</head>

<body>
<div id="logo" align="center"><img src="images/logo2.png" /></div>
<table width="100%" border="0" cellpadding="0">
  <tr>
    <td width="25%">&nbsp;</td>
    <td width="50%"><h1>&nbsp;</h1>
      <h1>Add A Recipe</h1>
      <p>&nbsp;</p>
      <form action="includes/addRecipe.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <p>
          <label>Recipe Name
            <input style="width:100%" type="text" name="title" id="title" />
          </label>
        </p>
        <p>
          <label>Full Recipe Title
            <em>(Optional)</em>
            <input style="width:100%" type="text" name="longtitle" id="longtitle" />
          </label>
        </p>
        <p>
          <label>Image
            <input style="width:100%" type="file" name="image" id="image" />
          </label>
        </p>
        <p>
          <label>Servings
            <input style="width:100%" type="text" name="servings" id="servings" />
          </label>
        </p>
        <p>
          <label>Prep Time
            <input style="width:100%" type="text" name="preptime" id="preptime" />
          </label>
        </p>
        <p>
          <label>Cook Time
            <input style="width:100%" type="text" name="cooktime" id="cooktime" />
          </label>
        </p>
        <p>
          <label>Ingredients - <em>Separate items with the &quot;Return&quot; key</em><br />
            <textarea style="width:100%" name="ingredients" id="ingredients" cols="45" rows="5"></textarea>
          </label>
        </p>
        <p>
          <label>Directions - <em>Separate steps with the &quot;Return&quot; key</em><br />
            <textarea style="width:100%" name="directions" id="directions" cols="45" rows="5"></textarea>
          </label>
        </p>
        <p>
          <label>Short URL - <em>e.g. livefreshforless.com/recipes/<u><b>pearpecansalad</b></u></em><br />
            <textarea style="width:100%" name="seo" id="seo" cols="45" rows="5"></textarea>
          </label>
        </p>        <p>
          <input style="width:100%" type="submit" name="submitBtn" id="submitBtn" value="Add Recipe" />
        </p>
    </form></td>
    <td width="25%">&nbsp;</td>
  </tr>
</table>
<h1>&nbsp;</h1>
</body>
</html>
