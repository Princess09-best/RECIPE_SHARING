<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require '../Database/config2.php';

    // Collect and sanitize inputs
    $firstName = trim($_POST['firstname']);
    $lastName = trim($_POST['lastname']);
   // $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $repeatPassword = trim($_POST['repeatPassword']);

    // Default role for all new users
    $role = 2; // Regular Admin

    // Validation
    if (empty($firstName) || empty($lastName) /*|| empty($username)*/ || empty($email) || empty($password) || empty($repeatPassword)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid email format.']);
        exit;
    }

    if ($password !== $repeatPassword) {
        echo json_encode(['status' => 'error', 'message' => 'Passwords do not match.']);
        exit;
    }

    if (strlen($password) < 6) {
        echo json_encode(['status' => 'error', 'message' => 'Password must be at least 6 characters long.']);
        exit;
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Timestamps
    $createdAt = $updatedAt = date("Y-m-d H:i:s");

    // Check for duplicate email
    $checkStmt = $conn->prepare("SELECT user_id FROM users WHERE email = ?");
    $checkStmt->bind_param("s", $email);
    $checkStmt->execute();
    $checkStmt->store_result();
    if ($checkStmt->num_rows > 0) {
        echo json_encode(['status' => 'error', 'message' => 'Email already exists.']);
        exit;
    }
    $checkStmt->close();

    // Insert user into the database with role = 2
    $stmt = $conn->prepare("INSERT INTO users (fname, lname, /*username,*/ email, password, role, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssisss", $firstName, $lastName, /*$username,*/ $email, $hashedPassword, $role, $createdAt, $updatedAt);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Registration successful.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to register user.']);
    }

    $stmt->close();
    $conn->close();
}
?>
