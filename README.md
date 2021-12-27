Installation:
1) Download & install xampp: https://www.apachefriends.org/index.html + PHP.
2) Unzip the github repository in the "c:/xampp/htdocs directory".
3) Run xampp and turn on the Apache and MySQL modules.
4) Open the Admin section of the MySQL module and export the contents of the mysql folder in your phpmyadmin.
5) Run "localhost/{folder where you unzipped the repo in the htdocs folder}/index.php" in your preferred browser.

Home Page:
1) "Add recipe" - redirects to the page where the user adds a recipe.
2) "Random recipe" - returns a single random recipe from the ones available in the database.
3) "Refresh" - Reloads the home page with all recipes available in the database.
4) "Contains Poultry" - Filters the homepage to only show recipes containing poultry.
5) "Contains Pork" - Filters the homepage to only show recipes containing pork.
6) Search bar - Live search that filters the homepage to only show recipes whose names contain the input string.
7) Recipe cards:
7.1) "Update" - Allows the user the edit the information about the given recipe.
7.2) "Delete" - Deletes the recipe from the database.

Add recipe/Edit Recipe pages:
1) "Back" - Redirects to the homepage.
2) Input fields - Realistically all of them are optional except the Recipe Name field, which returns an error if the user tries to add the recipe and has left it empty.
3) Checkboxes - Saves in the database whether the recipe contains any of the given ingredients.
4) "Add/Update" button - Submits the form and saves the new or updated information in the database.

