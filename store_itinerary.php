<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourly";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$userId = $_POST['userId'];
$destinationId = $_POST['destinationId'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
$budget = $_POST['budget'];

// Prepare and execute SQL statement to insert data into the database
$sql = "INSERT INTO itineraries (user_id, destination_id, start_date, end_date, budget) VALUES ('$userId', '$destinationId', '$startDate', '$endDate', '$budget')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
