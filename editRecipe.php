
<?php
 include ('php/connection.php');

 $recipeID = $_GET['updateid'];
 $sql="SELECT * FROM recipe WHERE id=$recipeID";
 $result = mysqli_query($conn, $sql);
 $row=mysqli_fetch_assoc($result);
 
 $recipeName =$row['recipeName'];
 $recipeImage =$row['recipeThumbnail'];
 $recipeIngredients =$row['recipeIngredients'];
 $recipeSteps =$row['recipeSteps'];
 $hasPoultry =$row['hasPoultry'];
 $hasPork =$row['hasPork'];

 if (isset($_POST['update'])) { 
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
   
   $sql = "UPDATE recipe SET recipeName='".$recipeName."', recipeThumbnail='".$recipeImage."', 
   recipeIngredients='".$recipeIngredients."', recipeSteps='".$recipeSteps."', hasPoultry='".$hasPoultry."', hasPork='".$hasPork."' WHERE id='".$recipeID."'";
   $result = mysqli_query($conn, $sql);
   
   if ($result) {
     echo "<script>location.href=location.href='/cookbookshuffler/index.php'</script>";
   } else {
   die(mysqli_error($conn));
   }
   
   mysqli_close($conn);
   }
?>

<!DOCTYPE html>
<head>
   <title>
      Recipe Shuffler
   </title>
   <link rel="stylesheet" href="css/style.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@200;600&display=swap" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
   <div class="header">
      <div class="m-2 row">
         <div class="col-sm-2"><a href="index.php">BACK</a></div>
         <div class="text-center col-sm-8">RECIPE SHUFFLER</div>
      </div>
   </div>
   <!--Header-->

   <div class="container">
      <form id="addForm" method="post" action="">
         <div class="row">
            <div class="col-sm-10">
            
         <div class="mt-2 form-group">
            <label for="recipeName">Recipe Name</label>
            <br>
            <input type="text" class="form-control bg-light"
               id="recipeName" 
               name="recipe_Name"
               value=<?php echo "'$recipeName'"; ?>>
         </div>

         <div class="mt-2 form-group">
            <label for="recipeImage">Link to recipe image</label>
            <br>
            <input type="text" class="form-control bg-light"
               id="recipeImage" 
               name="recipe_Image"
               value=<?php echo $recipeImage; ?>>
      </div>

         <div class="mt-2 form-group">
            <label for="ingredients">Ingredients</label>
            <textarea class="form-control bg-light" 
               id="ingredients"
               name="recipe_Ingredients" 
               rows="6" 
               columns="20"><?php echo $recipeIngredients; ?></textarea>
         </div>

         <div class="form-group">
            <label for="steps">Instructions</label>
            <textarea class="form-control bg-light" 
               id="steps"
               name="recipe_Steps" 
               rows="10"><?php echo $recipeSteps; ?></textarea>
         </div>
            </div>
            <!---->
            <div class="d-flex flex-column col-sm-2">
               <!---->
            <div class="form-group">
            <label class="mt-3 form-check-label" for="hasPoultry">Contains Poultry</label>
            <input type="checkbox" class="mt-3 form-check-input" id="hasPoultry" name="has_Poultry" value="1" <?php if ($hasPoultry==1) echo "checked='checked'"; ?>>
            <label class="mt-3 form-check-label" for="hasPork">Contains Pork</label>
            <input type="checkbox" class="mt-3 form-check-input" id="hasPork" name="has_Pork" value="1" <?php if ($hasPork==1) echo "checked='checked'"; ?>>
         </div>

         <button class="mt-2 mt-auto btn btn-danger" type="submit" form="addForm" name="update">Update</button>
            </div>
         </div>
   </form>
   </div>

   <!--Bootstrap import-->
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>