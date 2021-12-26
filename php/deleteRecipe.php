<?php
include ('connection.php');

if (isset($_GET['deleteid'])) {
   $recipeID = $_GET['deleteid']; 

   $sql = "DELETE from recipe WHERE id=$recipeID";
   $result = mysqli_query($conn,$sql);

   if ($result) {
      echo "<script>location.href='/cookbookshuffler/index.php'</script>";
   } else {
    die(mysqli_error($conn));
   }
  
  mysqli_close($conn);
}

