<?php
#display error messages
session_start();
if (isset($_SESSION['error_message'])) {
    echo "<p style='color: red;'>" . $_SESSION['error_message'] . "</p>";
    unset($_SESSION['error_message']); // Clear the error message after displaying
}

if (isset($_SESSION['success_message'])) {
    echo "<p style='color: green;'>" . $_SESSION['success_message'] . "</p>";
    unset($_SESSION['success_message']); // Clear the success message after displaying
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/signin.css">
    <title><RecipeShare-SignIn></RecipeShare-SignIn></title>
    
</head>

<body>
   <div class = 'container'>
    <form name="signInForm" method = "POST" action = "../actions/login_user.php"onsubmit="return validateForm()"">
       
        <div class="formContainer">
            <h1>Welcome Back!</h1>
           
            <label for="email" ">
                <strong>Email</strong>
            </label>
            <input type="email" placeholder="Enter Email" 
                      name="email" required><br><br>
            <label for="password">
                <strong>Password</strong>
            </label>
            <input type="password" 
                      placeholder="Enter Password"
                      name="password" required><br><br>
           
            <div>
                <button type="submit" class="signin">
                    Sign In
                </button><br><br>
                   
                    Forgot <a href="#" style ="color : red">password?</a>
                  
                <p>
                  Oops, You don't have an account yet? <a href="../views/SignUp.php" style="color:yellow">Sign Up</a>  
                   
                       
                </p>
            </div>
        </div>
    
</form>
</div>
</body>
<script>
    // JavaScript form validation function
    function validateForm() {
        const email = document.forms["signInForm"]["email"].value;
        const password = document.forms["signInForm"]["password"].value;

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

        // Password length check (optional)
        if (password.length < 6) {
            alert("Password must be at least 6 characters long.");
            return false;
        }

        // If everything is valid
        return true;
    }
</script>

</html>