<?php
if (isset($_POST['add'])) {
  include ('connection.php');
    function validate($data) {
      $data = trim($data); //removes whitespaces from beginning and end
      $data = stripslashes($data); //removes "/"
      $data = htmlspecialchars($data); //converts to html entities
      return $data;
    }

$recipeImage = mysqli_real_escape_string($conn, validate($_POST['recipe_Image']));
$recipeIngredients = mysqli_real_escape_string($conn, validate($_POST['recipe_Ingredients']));
$recipeSteps = mysqli_real_escape_string($conn, validate($_POST['recipe_Steps']));
$recipeName = mysqli_real_escape_string($conn, validate($_POST['recipe_Name']));
$hasPoultry = mysqli_real_escape_string($conn, validate($_POST['has_Poultry']));
$hasPork = mysqli_real_escape_string($conn, validate($_POST['has_Pork']));

if (empty($recipeName)) {
header("Location: ../addRecipe.php?error=Recipe name is required!");
} else {
$sql = "INSERT INTO recipe (recipeName, recipeThumbnail, recipeIngredients, recipeSteps, hasPoultry, hasPork) 
VALUES ('"."$recipeName"."','"."$recipeImage"."','".$recipeIngredients."','".$recipeSteps."','".$hasPoultry."','".$hasPork."')";
$result = mysqli_query($conn, $sql);

if ($result) {
  echo "<script>location.href='/cookbookshuffler/index.php'</script>";
} else {
die(mysqli_error($conn));
}
}

mysqli_close($conn);
}



