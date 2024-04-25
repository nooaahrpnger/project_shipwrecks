<?php
// Database connection
$host = '92.42.47.76';
$username = 'webap_project';
$password = 'webap_123';
$dbName = 'webap_shipwrecks';

$conn = new mysqli($host, $username, $password, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function retrieves every Country in the Database (unique)
$sql = "SELECT DISTINCT dtCountryName FROM webap_shipwrecks";
$result = $conn->query($sql);
$countries = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $country = $row["dtCountryName"];
        // Retrieve ships for each country
        $sql_ships = "SELECT dtShipName, dtWreckageDate, dtDescription FROM webap_shipwrecks WHERE dtCountryName='$country'";
        $result_ships = $conn->query($sql_ships);
        $ships = [];
        if ($result_ships->num_rows > 0) {
            while($row_ships = $result_ships->fetch_assoc()) {
                $ships[] = $row_ships;
            }
        }
        $countries[$country] = $ships;
    }
}


$conn->close();


$countries_json = json_encode($countries);


header('Content-Type: application/json');
echo $countries_json;
?>
