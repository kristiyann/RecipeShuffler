<?php
include ('connection.php');

if (isset($_POST['action'])) {
    $sql = "SELECT id, recipeName, recipeThumbnail, recipeSteps, recipeIngredients FROM recipe WHERE recipeName IS NOT NULL";
    $output = '';

    if (isset($_POST['hasPoultry'])) {
        $sql .= " AND hasPoultry = 1";
    }

    if (isset($_POST['hasPork'])) {
        $sql .= " AND hasPork = 1";
    }

    $result = mysqli_query($conn, $sql);
    
    if($result->num_rows>0) {
        while($row=mysqli_fetch_assoc($result)) {
            $output .= '<div class="col-sm-4 mb-3">
            <div class="card border-secondary bg-light h-100" style="width: 18rem;">
            <img src="'.$row['recipeThumbnail'].'" class="card-img-top" alt="The recipe image">
            <div class="card-body d-flex flex-column">
            <h5 class="card-title">'.$row['recipeName'].'</h5>
            <div class="scrollable overflow-scroll">
            <p class="card-text"><a>'.$row['recipeIngredients'].'</a> <br> <br> <a>'.$row['recipeSteps'].'</a></p> </div>
            <a href="editRecipe.php?updateid='.$row['id'].'" class="btn btn-primary mt-auto">Edit</a> <a href="php/deleteRecipe.php?deleteid='.$row['id'].'" class="btn btn-danger">Delete</a>
            </div>
            </div>
            </div>';
        }
    }
    else {
        $output = "<h3>No Recipes Found.</h3>"; 
    }
    echo $output;

    mysqli_close($conn);
}