<?php
function getUserFullName($conn, $user_id) {
    $query = "SELECT fname, lname FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        return $user['fname'] . ' ' . $user['lname'];
    } else {
        return "User"; // Default fallback if no user found
    }
}
?>
