<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management-RecipeShare</title>
    <link rel="stylesheet" href="../../assets/css/recipemanagement.css">
    <script>
        // Email validation
        function validateEmail(email) {
            const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            return email.match(emailPattern);
        }

        // User form validation
        function validateUserForm() {
            const email = document.forms["userForm"]["email"].value;
            const name = document.forms["userForm"]["name"].value;

            if (!name) {
                alert("Name is required.");
                return false;
            }

            if (!validateEmail(email)) {
                alert("Please enter a valid email address.");
                return false;
            }

            return true;
        }

        // Confirmation dialog for deletion
        function confirmDeletion() {
            return confirm("Are you sure you want to delete this user?");
        }

        // Toggle view more details
        function toggleViewMore(userId) {
            const details = document.getElementById(`details-${userId}`);
            details.style.display = details.style.display === "none" ? "block" : "none";
        }
    </script>
</head>
<body>
    <h1>User Management</h1>
    <div class="form-container">
    <form name="userForm" onsubmit="return validateUserForm()" class=".recipe-form recipe-list">
        <label for="name">Name:</label>
        <input type="text" name="name" placeholder="Enter name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" placeholder="Enter email" required><br><br>

        <button type="submit">Edit User</button>
    </form>

    <h2>User List</h2>
    <ul>
        <li class="user">
            John Doe <button onclick="toggleViewMore(1)">View More</button> 
            <button onclick="return confirmDeletion()">Delete</button>
            <div id="details-1" style="display:none;">
                <p>Email: johndoe@example.com</p>
                <p>Role: Admin</p>
            </div>
        </li>
        
        <li class="user">
            John Doe <button onclick="toggleViewMore(1)">View More</button> 
            <button onclick="return confirmDeletion()">Delete</button>
            <div id="details-1" style="display:none;">
                <p>Email: johndoe@example.com</p>
                <p>Role: Admin</p>
            </div>
        </li>
        
        <li class="user">
            John Doe <button onclick="toggleViewMore(1)">View More</button> 
            <button onclick="return confirmDeletion()">Delete</button>
            <div id="details-1" style="display:none;">
                <p>Email: johndoe@example.com</p>
                <p>Role: Admin</p>
            </div>
        </li>
        
        <li class="user">
            John Doe <button onclick="toggleViewMore(1)">View More</button> 
            <button onclick="return confirmDeletion()">Delete</button>
            <div id="details-1" style="display:none;">
                <p>Email: johndoe@example.com</p>
                <p>Role: Admin</p>
            </div>
        </li>
     
    </ul>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</html>
