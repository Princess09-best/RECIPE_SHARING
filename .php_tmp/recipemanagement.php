<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> RecipeManagement-User</title>
    <link rel="stylesheet" href="../../assets/css/recipemanagement.css">
    <script>
        // Recipe form validation
        function validateRecipeForm() {
            const title = document.forms["recipeForm"]["title"].value;
            const cookingTime = document.forms["recipeForm"]["cookingTime"].value;
            const servingSize = document.forms["recipeForm"]["servingSize"].value;
            const calories = document.forms["recipeForm"]["calories"].value;
            const fileInput = document.forms["recipeForm"]["recipeImage"];

            if (!title) {
                alert("Recipe title is required.");
                return false;
            }

            if (isNaN(cookingTime) || cookingTime <= 0) {
                alert("Cooking time must be a positive number.");
                return false;
            }

            if (isNaN(servingSize) || servingSize <= 0) {
                alert("Serving size must be a positive number.");
                return false;
            }

            if (isNaN(calories) || calories <= 0) {
                alert("Calories per serving must be a positive number.");
                return false;
            }

            if (!fileInput.files.length) {
                alert("Please upload a recipe image.");
                return false;
            }

            return true;
        }

        // Confirmation dialog for recipe deletion
        function confirmRecipeDeletion() {
            return confirm("Are you sure you want to delete this recipe?");
        }

        // Toggle view more recipe details
        function toggleRecipeDetails(recipeId) {
            const details = document.getElementById(`recipe-details-${recipeId}`);
            details.style.display = details.style.display === "none" ? "block" : "none";
        }
    </script>
</head>
<body>
    <h1>Manage your recipes!</h1>

    <!-- Form for adding a new recipe -->
    <form name="recipeForm" class="recipe-form recipe-list" onsubmit="return validateRecipeForm()"  enctype="multipart/form-data">
        <label for="title">Recipe Title:</label>
        <input type="text" name="title" placeholder="Enter recipe title" required><br><br>

        <label for="ingredients">Ingredients (separate with commas):</label>
        <textarea name="ingredients" placeholder="Enter ingredients" required></textarea><br><br>

        <label for="origin">Origin:</label>
        <input type="text" name="origin" placeholder="Enter origin (e.g., country or region)" required><br><br>

        <label for="nutritionalValue">Nutritional Value:</label>
        <textarea name="nutritionalValue" placeholder="Enter nutritional value of ingredients" required></textarea><br><br>

        <label for="allergens">Allergen Information:</label>
        <textarea name="allergens" placeholder="List any common allergens (e.g., nuts, dairy)" required></textarea><br><br>

        <label for="shelfLife">Shelf Life (days):</label>
        <input type="number" name="shelfLife" placeholder="Enter shelf life in days" required><br><br>

        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" placeholder="Enter quantity (e.g., 2 for 2 cups of flour)" required><br><br>

        <label for="unit">Unit of Measurement:</label>
        <input type="text" name="unit" placeholder="Enter unit (e.g., cups, grams)" required><br><br>

        <label for="recipeImage">Recipe Image:</label>
        <input type="file" name="recipeImage" accept="image/*" required><br><br>

        <label for="preparationTime">Preparation Time (minutes):</label>
        <input type="number" name="preparationTime" placeholder="Enter preparation time in minutes" required><br><br>

        <label for="cookingTime">Cooking Time (minutes):</label>
        <input type="number" name="cookingTime" placeholder="Enter cooking time in minutes" required><br><br>

        <label for="servingSize">Serving Size:</label>
        <input type="number" name="servingSize" placeholder="Enter serving size per person" required><br><br>

        <label for="foodDescription">Food Description:</label>
        <textarea name="foodDescription" placeholder="Enter a brief summary of the dish, its flavor, and appeal" required></textarea><br><br>

        <label for="calories">Calories per Serving:</label>
        <input type="number" name="calories" placeholder="Enter number of calories per serving" required><br><br>

        <label for="foodOrigin">Food Origin:</label>
        <input type="text" name="foodOrigin" placeholder="Enter food origin (e.g., cultural or geographical origin)" required><br><br>

        <label for="instructions">Instructions:</label>
        <textarea name="instructions" placeholder="Enter step-by-step instructions for preparing and cooking" required></textarea><br><br>

        <button type="submit">Add Recipe</button>
    </form>

    <h2>Recipe List</h2>
    <ul>
        <li>
            Spaghetti Bolognese 
            <button onclick="toggleRecipeDetails(1)">View More</button> 
            <button onclick="return confirmRecipeDeletion()">Delete</button>
            <div id="recipe-details-1" style="display:none;">
                <p>Cooking Time: 45 minutes</p>
                <p>Ingredients: Spaghetti, Beef, Tomatoes</p>
                <p>Calories per Serving: 500</p>
                <!-- Add more recipe details here -->
            </div>
        </li>
        
    </ul>
</body>
</html>
