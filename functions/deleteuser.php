<?php
include '../../Database/config.php';

// Check if an ID is provided
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid user ID");
}

$user_id = intval($_GET['id']);

// Prepare DELETE statement
$sql = "DELETE FROM users WHERE user_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);

// Execute the delete
if (mysqli_stmt_execute($stmt)) {
    // Redirect with success message
    session_start();
    $_SESSION['success_message'] = "User deleted successfully!";
    header("Location: users_list.php");
    exit();
} else {
    // Handle deletion error
    session_start();
    $_SESSION['error_message'] = "Failed to delete user: " . mysqli_error($conn);
    header("Location: users_list.php");
    exit();
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>