<?php
// Assuming you have established a database connection

// Check if the username query parameter is set
if(isset($_GET['username'])) {
    // Get the username from the query parameter
    $username_param = $_GET['username']; // Use a different variable name

    // Perform a database query to fetch the user_id based on the username
    $servername = "localhost";
    $db_username = "root"; // Use a different variable name for the database connection username
    $password = "";
    $dbname = "tourly";

    // Create connection
    $conn = new mysqli($servername, $db_username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement
    $sql = "SELECT user_id FROM users WHERE username = '$username_param'"; // Use the variable containing the username

    // Execute the query
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result) {
        // Check if any rows were returned
        if ($result->num_rows > 0) {
            // Fetch the user_id from the first row
            $row = $result->fetch_assoc();
            $user_id = $row['user_id'];
            
            // Output the user_id as the response
            echo $user_id;
        } else {
            // If no rows were returned, the username doesn't exist
            echo 'null';
        }
    } else {
        // If there was an error executing the query, output an error message
        echo 'Error: ' . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the username query parameter is not set, output an error message
    echo 'Error: Username parameter is missing.';
}
?>
