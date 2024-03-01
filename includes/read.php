<?php

require_once '../db_credentials.php';
require_once '/Functions/DB_connection_function.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Authorization, Content-Type, Accept");
header('Content-Type: application/json');

// Connect to the database





if (!isset($_GET['functionType'])) {

    echo json_encode(array("error" => "Function type not specified"));
    exit();
}

if (!$dbc) {

    echo json_encode(array("error" => "Database connection failed"));
    exit();
}

$functionType = $_GET['functionType'];
switch ($functionType) {
    case 'showBoats':
        showBoats();
        break;
    case 'showCountry':
        showCountry();
        break;
    default:
        echo json_encode(array("error" => "Unknown function type"));
        exit();
}


function showBoats() {
}


function showCountry() {
    global $dbc; 
    
    $query = "SELECT * FROM webap_shipwrecks";
    
    $result = mysqli_query($dbc, $query);
    if ($result) {
        $data = array();
        
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        mysqli_free_result($result);
        
        echo json_encode($data);
    } else {
        echo json_encode(array("error" => "Query failed: " . mysqli_error($dbc)));
        exit();
    }
}
?>
