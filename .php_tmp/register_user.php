<?php
session_start();
include '../Database/config2.php'; // Include database connection

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the data from the form
    $firstName = trim($_POST['firstname']);
    $lastName = trim($_POST['lastname']);
   // $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $repeatPassword = trim($_POST['repeatPassword']);
    $role = 2; // Default role is 2 (admin)

    // Check if the passwords match
    if ($password !== $repeatPassword) {
        $_SESSION['error_message'] = "Passwords do not match.";
        header("Location: ../views/SignUp.php");
        exit();
    }

    // Check if email already exists
    $stmt = $conn->prepare("SELECT user_id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['error_message'] = "Email is already taken. Please use a different one.";
        header("Location: ../views/SignUp.php");
        exit();
    }

    // Hash the password before storing it
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute the SQL query to insert the new user into the database
    $stmt = $conn->prepare("INSERT INTO users (fname, lname, /*username,*/ email, password, role, created_at, updated_at) VALUES (?, ?, ?,  ?, ?, NOW(), NOW())");
    $stmt->bind_param("ssssi", $firstName, $lastName, /*$username,*/ $email, $hashedPassword, $role);

    if ($stmt->execute()) {
        // User successfully registered, redirect to login page
        $_SESSION['success_message'] = "Registration successful! You can now log in.";
        header("Location: ../views/SignIn.php");
        exit();
    } else {
        // If there was an error, display it
        $_SESSION['error_message'] = "There was an error during registration. Please try again.";
        header("Location: ../views/SignUp.php");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
