<?php
header('Content-Type: application/json'); // Ensure the response is JSON

// Retrieve form data
$destination_id = $_POST['destination'];
$people = $_POST['people'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];

// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourly";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(['error' => 'Connection failed: ' . $conn->connect_error]);
    exit();
}

// Insert form data into table
$sql = "INSERT INTO tour_inquiries (destination_id, people, checkin, checkout) VALUES ('$destination_id', $people, '$checkin', '$checkout')";

if ($conn->query($sql) === TRUE) {
    // Fetch destination details
    $destSql = "SELECT city, country FROM destinations WHERE destination_id = '$destination_id'";
    $destResult = $conn->query($destSql);
    if ($destResult->num_rows > 0) {
        $destination = $destResult->fetch_assoc();
        $location = $destination['city'] . ',' . $destination['country'];

        // Fetch weather data
        $apiKey = "e6030448905a48e3ac360251241805"; // Replace with your actual API key
        $days = (strtotime($checkout) - strtotime($checkin)) / 86400;
        $weatherApiUrl = "https://api.weatherapi.com/v1/forecast.json?key=$apiKey&q=$location&days=$days";

        $weatherData = file_get_contents($weatherApiUrl);
        $weatherArray = json_decode($weatherData, true);

        // Check if weather data is fetched correctly
        if (isset($weatherArray['forecast'])) {
            // Fetch itinerary plan based on destination and date range from your database
            $itinerarySql = "SELECT day_number, activity_time, activity_description FROM itinerary_plan WHERE destination_id = '$destination_id' AND day_number BETWEEN 1 AND $days ORDER BY day_number, activity_time";
            $itineraryResult = $conn->query($itinerarySql);
            $itineraryArray = [];

            if ($itineraryResult->num_rows > 0) {
                while ($row = $itineraryResult->fetch_assoc()) {
                    $itineraryArray[] = $row;
                }
            }

            // Send weather and itinerary data as JSON response
            echo json_encode(['weather' => $weatherArray['forecast'], 'itinerary' => $itineraryArray]);
        } else {
            // Handle the case when weather data is not available
            echo json_encode(['error' => 'Unable to fetch weather data']);
        }
    } else {
        echo json_encode(['error' => 'Invalid destination']);
    }
} else {
    echo json_encode(['error' => 'Error: ' . $sql . "<br>" . $conn->error]);
}

$conn->close();
?>
