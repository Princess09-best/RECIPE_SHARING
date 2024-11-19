<?php
session_start();
include '../Database/config2.php'; // Include database connection

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email and password from the form
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Prepare and execute the SQL query to fetch user data based on email
    $stmt = $conn->prepare("SELECT user_id, fname, lname, email, password, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email); // Bind the email parameter
    $stmt->execute();
    $stmt->store_result();
    
    // Check if a user is found
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $firstName, $lastName, $dbEmail, $dbPassword, $role);
        $stmt->fetch();

        // Verify the entered password against the stored hashed password
        if (password_verify($password, $dbPassword)) {
            // Check if the user role is valid (1 or 2)
            if ($role > 2) {
                // Unauthorized role, redirect to signup
                $_SESSION['error_message'] = "You are unauthorized to access this page. Please sign up.";
                header("Location: ../views/SignUp.php");
                exit();
            }

            // Password is correct, start a session and store user information
            $_SESSION['user_id'] = $id;
            $_SESSION['first_name'] = $firstName;
            $_SESSION['last_name'] = $lastName;
            $_SESSION['role'] = $role;

            // Redirect based on user role
            if ($role == 1) {
                // Super admin
                header("Location: ../views/admin/dashboard.php");
            } elseif ($role == 2) {
                // Regular admin
                header("Location: ../views/admin/dashboard.php");
            }
            exit();
        } else {
            // Incorrect password
            $_SESSION['error_message'] = "Invalid credentials. Please try again.";
            header("Location: ../views/SignIn.php");
            exit();
        }
    } else {
        // No user found with the given email
        $_SESSION['error_message'] = "No user found with that email address.";
        header("Location: ../views/SignIn.php");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
