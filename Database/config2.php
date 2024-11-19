<?php
$servername = "localhost"; //  database server
$username = "root"; //  database username
$password = ""; //  database password
$dbname = "updated_recipe_sharing"; //  database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>