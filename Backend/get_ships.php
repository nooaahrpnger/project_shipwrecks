<?php
// Database connection
$host = '92.42.47.76';
$username = 'webap_project';
$password = 'webap_123';
$dbName = 'webap_shipwrecks';

header('Content-Type: application/json'); // Ensure JSON header is set early

if (isset($_GET['country'])) {
    $country = $_GET['country'];

    $conn = new mysqli($host, $username, $password, $dbName);

    // Check for connection errors
    if ($conn->connect_error) {
        http_response_code(500);
        echo json_encode(array("message" => "Database connection error", "error" => $conn->connect_error));
        exit;
    }

    // Use prepared statements to avoid SQL injection
    $stmt = $conn->prepare("SELECT dtShipName, dtWreckageDate, dtDescription FROM webap_shipwrecks WHERE dtCountryName = ?");
    $stmt->bind_param("s", $country);
    $stmt->execute();
    $result = $stmt->get_result();

    $ships = [];
    while ($row = $result->fetch_assoc()) {
        $ships[] = $row;
    }

    $stmt->close();
    $conn->close();

    echo json_encode($ships);

} else {
    http_response_code(400);
    echo json_encode(array("message" => "Country parameter is missing"));
}
?>