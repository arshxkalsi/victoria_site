<?php
// Database connection parameters
$servername = "localhost"; // Change this if your database server is running on a different host
$username = "root"; // Change this if you have a different MySQL username
$password = ""; // Change this if your MySQL password is set
$database = "week14"; // Change this to the name of your database
$table = "contact"; // Change this to the name of your table

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

// Insert data into database
$sql = "INSERT INTO $table (name, email, message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
