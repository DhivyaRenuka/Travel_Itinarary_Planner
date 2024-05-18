<?php
// Assuming you have established a database connection

// Check if the attractionName query parameter is set
if(isset($_GET['attractionName'])) {
    // Get the attractionName from the query parameter
    $attractionName = $_GET['attractionName'];

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

    // Prepare the SQL statement
    $sql = "SELECT destination_id FROM destinations WHERE name = ?";

    // Prepare and bind the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $attractionName);

    // Execute the query
    $stmt->execute();

    // Bind the result
    $stmt->bind_result($destination_id);

    // Fetch the result
    $stmt->fetch();

    // Output the destination_id as the response
    echo $destination_id;

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If the attractionName query parameter is not set, output an error message
    echo 'Error: Attraction name parameter is missing.';
}
?>
