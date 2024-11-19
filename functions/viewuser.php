<?php
include '../Database/config.php';

// Check if an ID is provided
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid user ID");
}

$user_id = intval($_GET['id']);

// Fetch user details
$sql = "SELECT 
            user_id, 
            fname, 
            lname, 
            email, 
            phone, 
            created_at
        FROM 
            users 
        WHERE 
            user_id = ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($user = mysqli_fetch_assoc($result)) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View User Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2>User Details</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <strong>User ID:</strong>
                        <p><?php echo htmlspecialchars($user['user_id']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <strong>Full Name:</strong>
                        <p><?php echo htmlspecialchars($user['fname'] . ' ' . $user['lname']); ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <strong>Email:</strong>
                        <p><?php echo htmlspecialchars($user['email']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <strong>Phone:</strong>
                        <p><?php echo htmlspecialchars($user['phone'] ?? 'N/A'); ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <strong>Account Created:</strong>
                        <p><?php echo htmlspecialchars($user['created_at']); ?></p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href='updateuser.php?id=<?php echo $user_id; ?>" class="btn btn-warning">Edit User</a>
                <a href="../views/admin/usersdisplay.php.php" class="btn btn-secondary">Back to Users List</a>
            </div>
        </div>
    </div>
</body>
</html>
<?php 
} else {
    echo "<div class='alert alert-danger'>User not found.</div>";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>