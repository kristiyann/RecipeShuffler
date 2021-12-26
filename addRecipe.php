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
      <form id="addForm" method="post" action="php/insertRecipe.php">
         <div class="row">
            <div class="col-sm-10">
            
            <?php if (isset($_GET['error'])) {?>
            <div class="alert alert-danger mt-2" role="alert">
            <?php echo $_GET['error']; ?>
            </div>
            <?php } ?>
      
            
         <div class="mt-2 form-group">
            <label for="recipeName">Recipe Name</label>
            <br>
            <input type="text" class="form-control bg-light"
               id="recipeName" 
               name="recipe_Name">
         </div>

         <div class="mt-2 form-group">
            <label for="recipeImage">Link to recipe image</label>
            <br>
            <input type="text" class="form-control bg-light"
               id="recipeImage" 
               name="recipe_Image" placeholder="(Optional)">
      </div>

         <div class="mt-2 form-group">
            <label for="ingredients">Ingredients</label>
            <textarea class="form-control bg-light" 
               id="ingredients"
               name="recipe_Ingredients" 
               rows="6" 
               columns="20"></textarea>
         </div>

         <div class="form-group">
            <label for="steps">Instructions</label>
            <textarea class="form-control bg-light" 
               id="steps"
               name="recipe_Steps" 
               rows="10"></textarea>
         </div>
            </div>
            <!---->
            <div class="d-flex flex-column col-sm-2">
               <!---->
            <div class="form-group">
            <label class="mt-3 form-check-label" for="hasPoultry">Contains Poultry</label>
            <input type="checkbox" class="mt-3 form-check-input" id="hasPoultry" name="has_Poultry" value="1">
            <label class="mt-3 form-check-label" for="hasPork">Contains Pork</label>
            <input type="checkbox" class="mt-3 form-check-input" id="hasPork" name="has_Pork" value="1">
         </div>

         <button class="mt-2 mt-auto btn btn-danger" type="submit" form="addForm" name="add">Add</button>
            </div>
         </div>
   </form>
   </div>

   <!--Bootstrap import-->
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>