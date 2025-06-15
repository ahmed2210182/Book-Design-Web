<?php
$servername = "localhost";  // Your MySQL host
$username = "root";         // Your MySQL username (usually 'root' for XAMPP)
$password = "";             // Your MySQL password (empty by default for XAMPP)
$dbname = "book_marketplace";  // The name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
