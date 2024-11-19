<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/signup.css">
    <title>RecipeShare - Sign Up</title>

</head>
<body>
    <form name="signUpForm" onsubmit="return validateForm()" method="post" action="../actions/register_user.php">
        <div class="formContainer">
            <h1>Welcome to RecipeShare!</h1>
            
            <label for="firstname">
                <strong>First Name</strong>
            </label>
            <input type="text" placeholder="Enter your first name" name="firstname" required><br><br>
            
            <label for="lastname">
                <strong>Last Name</strong>
            </label>
            <input type="text" placeholder="Enter your last name" name="lastname" required><br><br>
            
        <!--    <label for="username">
                <strong>Username</strong>
            </label>
            <input type="text" placeholder="Enter your preferred username" name="username" required><br><br> -->

            <label for="email">
                <strong>Email</strong>
            </label>
            <input type="email" placeholder="Enter Email" name="email" required><br><br>

            <label for="password">
                <strong>Password</strong>
            </label>
            <input type="password" placeholder="Enter Password" name="password" required><br><br>

            <label for="repeatPassword">
                <strong>Repeat Password</strong>
            </label>
            <input type="password" placeholder="Repeat Password" name="repeatPassword" required><br><br>

           <!--<label>
                <strong>Role</strong>
            </label>
            <select name="role" id="role">
                <option value="default">----</option>
                <option value="User">User</option>
                <option value="Admin">Admin</option>
            </select>
            <br><br>-->

            <label>
                <input type="checkbox" name="remember" id="check">
                Remember me
            </label>

            <p>
                By creating an account you agree to our
                <a href="#" style="color:rgba(70, 79, 17, 0.913)">Terms & Privacy</a>.
            </p>

            <div>
                <button type="submit" class="signup">Sign Up</button>
                <p>
                    Signed Up already? 
                    <a href="SignIn.php" style="color:rgba(70, 79, 17, 0.913)">Sign In</a>
                </p>
            </div>
        </div>
    </form>
</body>

<script>
    // JavaScript form validation function
    function validateForm() {
        const firstName = document.forms["signUpForm"]["firstname"].value;
        const lastName = document.forms["signUpForm"]["lastname"].value;
        const username = document.forms["signUpForm"]["username"].value;
        const email = document.forms["signUpForm"]["email"].value;
        const password = document.forms["signUpForm"]["password"].value;
        const repeatPassword = document.forms["signUpForm"]["repeatPassword"].value;
        const role = document.forms["signUpForm"]["role"].value;

        // Name validation
        if (firstName == "") {
            alert("First name must not be empty.");
            return false;
        }

        if (lastName == "") {
            alert("Last name must not be empty.");
            return false;
        }

        // Username validation
        if (username == "") {
            alert("Username must not be empty.");
            return false;
        }

        // Email validation
        const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
        if (!email.match(emailPattern)) {
            alert("Please enter a valid email address.");
            return false;
        }

        // Password validation
        if (password == "") {
            alert("Password must not be empty.");
            return false;
        }

        if (password.length < 6) {
        alert("Password must be at least 6 characters long.");
        return false;
        }

        // Repeat password validation
        if (repeatPassword == "") {
            alert("Please repeat the password.");
            return false;
        }

        if (password !== repeatPassword) {
            alert("Passwords do not match.");
            return false;
        }

        // Role validation
        if (role === "default") {
            alert("Please select a role.");
            return false;
        }

        // If everything is valid
        return true;
    }
</script>
</html>
