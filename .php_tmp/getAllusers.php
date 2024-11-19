<?php
/*include'../../Database/config2.php';
function getAllUsers($conn) {
    global $conn;
    $sql = "
        SELECT 
            users.user_id AS user_id, 
            CONCAT(users.fname, ' ', users.lname) AS full_name,
            users.email AS email
        FROM 
            users
        ORDER BY 
            users.user_id ASC;
    ";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query Failed: " . mysqli_error($conn));
    }

    echo '<table>';
    echo '<tr>
            <th>No</th>
            <th>User ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Actions</th>
          </tr>';

    $count = 1; // Serial number
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $count++ . '</td>'; // Serial Number
        echo '<td>' . htmlspecialchars($row['user_id']) . '</td>'; // User ID
        echo '<td>' . htmlspecialchars($row['full_name']) . '</td>'; // Full Name
        echo '<td>' . htmlspecialchars($row['email']) . '</td>'; // Email
        echo '<td><button>Action</button></td>'; // Placeholder for actions
        echo '</tr>';
    }

    echo '</table>';
}*/

include '../../Database/config2.php';

function getAllUsers($conn) {
    global $conn;
    $sql = "
        SELECT 
            users.user_id AS user_id, 
            CONCAT(users.fname, ' ', users.lname) AS full_name,
            users.email AS email
        FROM 
            users
        ORDER BY 
            users.user_id ASC;
    ";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query Failed: " . mysqli_error($conn));
    }

    // Add Bootstrap CSS for styling (if not already included)
    echo '
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/dashboard.css">
    <div class="container-fluid recent-invoices">
    <table class="table table-striped table-hover recent-invoices">';
    echo '<thead>
            <tr>
                <th>No</th>
                <th>User ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
          </thead>
          <tbody>';

    $count = 1; // Serial number
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $count++ . '</td>'; // Serial Number
        echo '<td>' . htmlspecialchars($row['user_id']) . '</td>'; // User ID
        echo '<td>' . htmlspecialchars($row['full_name']) . '</td>'; // Full Name
        echo '<td>' . htmlspecialchars($row['email']) . '</td>'; // Email
        
        // Dropdown Actions
        echo '<td>
                <div class="dropdown ">
                    <button class="btn btn-secondary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton .dropbtn ' . $row['user_id'] . '" data-bs-toggle="dropdown" aria-expanded="false">
                        Actions
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton' . $row['user_id'] . '">
                        <li><a class="dropdown-item" href="viewuser.php?id=' . $row['user_id'] . '">
                            <i class="bi bi-eye"></i> View
                        </a></li>
                        <li><a class="dropdown-item" href="updateuser.php?id=' . $row['user_id'] . '">
                            <i class="bi bi-pencil"></i> Edit
                        </a></li>
                        <li><a class="dropdown-item text-danger" href="#" onclick="confirmDelete(' . $row['user_id'] . ')">
                            <i class="bi bi-trash"></i> Delete
                        </a></li>
                    </ul>
                </div>
              </td>';
        echo '</tr>';
    }

    echo '</tbody></table></div>';
    

    // Add Bootstrap and Popper JS, and a delete confirmation script
    echo '
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <script>
    
    function confirmDelete(userId) {
        if (confirm("Are you sure you want to delete this user? This action cannot be undone.")) {
            window.location.href = "deleteuser.php?id=" + userId;
        }
    }
    </script>';
}

?>