<?php
include ('php/connection.php');
?>

<!DOCTYPE html>
<head>
    <title>
        Recipe Shuffler
    </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <link rel="stylesheet" href="css/style.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@200;600&display=swap" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="header">
      <div class="m-2 row">
         <div class="col-sm-2"></div>
         <div class="text-center col-sm-8">RECIPE SHUFFLER</div>
         <div class="col-sm-2"><a href="addRecipe.php">ADD RECIPE</a></div>
      </div>
   </div>
   <!--Header-->

   <!--Main body content-->
   <div class="container wrapper mb-5">
   <div class="mt-3 row" id="content">
   <?php
   //READ SECTION
   $sql = "SELECT id, recipeName, recipeThumbnail, recipeSteps, recipeIngredients FROM recipe";
   $result=mysqli_query($conn, $sql);
   if ($result) {
       while($row=mysqli_fetch_assoc($result)) {
           echo nl2br('<div class="col-sm-4 mb-3"> <div class="card border-secondary bg-light h-100" style="width: 18rem;"> <img src="'.$row['recipeThumbnail'].'" class="card-img-top" alt="The recipe image"> <div class="card-body d-flex flex-column"> <h5 class="card-title">'.$row['recipeName'].'</h5> <div class="box"> <p class="card-text mb-1">'.$row['recipeIngredients'].' <br> <br>'.$row['recipeSteps'].'</p> </div> <a href="editRecipe.php?updateid='.$row['id'].'" class="btn btn-primary mt-auto">Edit</a> <a href="php/deleteRecipe.php?deleteid='.$row['id'].'" class="btn btn-danger mt-1">Delete</a> </div> </div> </div>');
       }
       mysqli_close($conn);   
   }
   ?>
   </div>
   </div>
   <!--Main body content end-->

     <!--Footer-->
     <div class="footer position-fixed">
         <div class="m-1 row">
             <div class="text-center col-sm-3"><a href="#" class="randomiser">RANDOM RECIPE</a></div>
             <div class="text-center col-sm-3"><a href="index.php">REFRESH</a></div>
             <div class="col-sm-3">
             <div class="form-group text-center">
            <label class="form-check-label" for="hasPoultry">Contains Poultry</label>
            <input type="checkbox" class="form-check-input containsCheckbox" id="hasPoultry" name="has_Poultry" value="1">
            <label class="form-check-label" for="hasPork">Contains Pork</label>
            <input type="checkbox" class="form-check-input containsCheckbox" id="hasPork" name="has_Pork" value="1">
         </div>
             </div>
             <div class="col-sm-3">
                    <input type="text" id="searchButton" class="form-control search" name="search" placeholder="Search">
             </div>
         </div>
    </div>

    <!--JS/JQUERY-->
    <script type="text/javascript"> 
    $(document).ready(function() {
        //filtering
        $(".containsCheckbox").click(function(){
            let action = 'data';
            let hasPoultry = filterRecipes('hasPoultry');
            let hasPork = filterRecipes('hasPork');

            $.ajax({
                url: 'php/filterRecipes.php',
                method: 'POST',
                data: {action:action, hasPoultry:hasPoultry, 
                hasPork:hasPork},
                success:function(response) {
                    $("#content").html(response);
                }
            });
        });

        function filterRecipes(id) {
            let filterData = [];
            $('#'+id+':checked').each(function() {
                filterData.push($(this).val());
            });
            return filterData;
        }

        //randomiser
        $(".randomiser").click(function(){
            let action = 'data';

            $.ajax({
                url: 'php/getRandomRecipe.php',
                method: 'POST',
                data: {action:action},
                success:function(response) {
                    $("#content").html(response);
                }
            });
        });

        //search
        $("#searchButton").keyup(function(){
            let txt = $(this).val();           
                $.ajax({
                method: 'POST',
                url: 'php/searchRecipe.php',
                data: {
                    search:txt
                    },
                success:function(response) {
                    $("#content").html(response);
                }
                })
        });
        //
    });
    </script>

    <!--Bootstrap import-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>