<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
echo "Received form data";

$servername = "localhost"; 
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "myportfolio";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST["Name"];
$email = $_POST["Email"];
$message = $_POST["Text"];

// SQL query to insert data into the 'contact' table
$sql = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    // Data inserted successfully
    header("Location: success.html"); // Redirect to a success page
} else {
    // Handle errors
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
