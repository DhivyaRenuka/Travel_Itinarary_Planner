<?php
// Start session to manage user login state
session_start();

// Check if the form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the username and password are set
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Database connection parameters
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

        // Escape user inputs for security
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        // Query to fetch user from database
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = $conn->query($sql);

        // Check if user exists
        if ($result->num_rows == 1) {
            // Fetch user data
            $row = $result->fetch_assoc();
            $hashed_password = $row['password'];

            // Verify hashed password
            if (password_verify($password, $hashed_password)) {
                // Set session variables to mark user as logged in
                $_SESSION['username'] = $username;
                // You can set more session variables as needed

                // Return success message
                echo "success";
            } else {
                // Return error message if password is incorrect
                echo "failure";
            }
        } else {
            // Return error message if user does not exist
            echo "failure";
        }

        // Close connection
        $conn->close();
    } else {
        // Return error message if username or password is not set
        echo "failure";
    }
} else {
    // Redirect to login page if form data is not submitted
    header("Location: login.html");
}
?>
