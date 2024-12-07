<?php
$database_host = "localhost";
$database_username = "root";
$database_password = "simple";
$database_name = "atmdhs";

$conn = new mysqli($database_host, $database_username, $database_password, $database_name);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// Close the connection when done
$conn->close();


?>