<?php
$servername = "169.239.251.102"; //  database server
$username = "princess.balogun"; //  database username
$password = "ZyxB09$$"; //  database password
$dbname = " webtech_fall2024_princess_balogun"; //  database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>