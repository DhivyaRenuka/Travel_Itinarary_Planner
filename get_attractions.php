<?php
// Establish database connection (Replace these values with your database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourly";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch attractions data from the database
$sql = "SELECT attraction_id, name, location, description FROM attractions";

$result = $conn->query($sql);

$attractions = array();

if ($result->num_rows > 0) {
    // Fetch data from each row and add it to the $attractions array
    while($row = $result->fetch_assoc()) {
        $attractions[] = $row;
    }
} else {
    echo "No attractions found";
}

// Close database connection
$conn->close();

// Return attractions data in JSON format
header('Content-Type: application/json');
echo json_encode($attractions);
?>
