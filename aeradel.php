<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "atmdhs";

// Create connection
$conn = new mysqli("localhost", "root", "", "atmdhs");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // SQL query to delete a record based on the 'id' parameter
    $sql = "DELETE FROM aeration_dpt WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the page where you display the updated table
        header("Location: dashaera.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>