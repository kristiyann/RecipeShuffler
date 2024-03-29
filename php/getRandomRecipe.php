<?php
include ('connection.php');

if (isset($_POST['action'])) { 
    $sql = "SELECT id, recipeName, recipeThumbnail, recipeSteps, recipeIngredients FROM recipe ORDER BY RAND() LIMIT 1";

    $output = '';

    $result = mysqli_query($conn, $sql);

    while($row=mysqli_fetch_assoc($result)) {
        $output .= '<div class="col-sm-4 mb-3"> <div class="card border-secondary bg-light h-100" style="width: 18rem;"> <img src="'.$row['recipeThumbnail'].'" class="card-img-top" alt="The recipe image"> <div class="card-body d-flex flex-column"> <h5 class="card-title">'.$row['recipeName'].'</h5> <div class="box"> <p class="card-text mb-1">'.$row['recipeIngredients'].' <br> <br>'.$row['recipeSteps'].'</p> </div> <a href="editRecipe.php?updateid='.$row['id'].'" class="btn btn-primary mt-auto">Edit</a> <a href="php/deleteRecipe.php?deleteid='.$row['id'].'" class="btn btn-danger mt-1">Delete</a> </div> </div> </div>';
    }
    echo nl2br($output);

    mysqli_close($conn);
}