<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "scholarsphere";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted for deletion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $srNo = $_POST['srNo'];

    // SQL query to delete record
    $sql = "DELETE FROM bookchaptersbyfaculty WHERE srNo = '$srNo'";

    if ($conn->query($sql) === TRUE) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
