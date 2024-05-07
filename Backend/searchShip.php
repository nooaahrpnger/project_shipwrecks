<?php
require_once 'db_credentials.php';

$conn = new mysqli(DB_HOST, DB_USER, DB_PW, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function sanitize_input($conn, $input) {
    return mysqli_real_escape_string($conn, $input);
}

if (isset($_GET['search'])) {
    $searchTerm = sanitize_input($conn, $_GET['search']);

    $sql = "SELECT * FROM webap_shipwrecks WHERE dtShipName LIKE '%$searchTerm%'";

    $result = $conn->query($sql);

    $shipwrecks = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $shipwrecks[] = array(
                'dtShipName' => $row["dtShipName"],
                'dtWreckageDate' => $row["dtWreckageDate"],
                'dtCountryName' => $row["dtCountryName"],
                'dtDescription' => $row["dtDescription"]
            );
        }
    }

    echo json_encode($shipwrecks);
} else {
    echo "No search term provided.";
}

$conn->close();
?>
