<?php
// Database connection
$host = '92.42.47.76';
$username = 'webap_project';
$password = 'webap_123';
$dbName = 'webap_shipwrecks';

// Check if country parameter exists in the URL
if(isset($_GET['country'])) {
    // Get the country name from the URL
    $country = $_GET['country'];

    $conn = new mysqli($host, $username, $password, $dbName);
    if ($conn->connect_error) {
        // If there's a database connection error, return error response
        http_response_code(500);
        echo json_encode(array("message" => "Database connection error"));
        exit;
    }

    // Retrieve ships for the selected country
    $sql = "SELECT dtShipName, dtWreckageDate, dtDescription FROM webap_shipwrecks WHERE dtCountryName='$country'";
    $result = $conn->query($sql);
    $ships = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $ships[] = $row;
        }
    }

    // Close connection
    $conn->close();

    // Convert PHP array to JSON for JavaScript
    $ships_json = json_encode($ships);

    // Output JSON
    header('Content-Type: application/json');
    echo $ships_json;
} else {
    // If country parameter is not provided in the URL, return empty response or handle error as needed
    http_response_code(400);
    echo json_encode(array("message" => "Country parameter is missing"));
}
?>
