<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourly";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$username = $_POST['name']; // Change 'name' to 'username'
$email = $_POST['email'];

// Sanitize the data (for illustration purposes; use prepared statements for production)
$username = mysqli_real_escape_string($connection, $username);
$email = mysqli_real_escape_string($connection, $email);

// Insert data into users table
$sql = "INSERT INTO users (username, email) VALUES ('$username', '$email')"; // Change 'name' to 'username'

if (mysqli_query($connection, $sql)) {
    echo "Data inserted successfully!";
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}

// Close database connection
mysqli_close($connection);
?>
