<?php

function connectToDatabase() {
    $host = '193.41.237.172';
    $username = 'webap_project';
    $password = 'webap_123';
    $dbName = 'webap_shipwrecks';
    
    // Create connection
    $conn = new mysqli($host, $username, $password, $dbName);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    echo "Connected successfully";
    return $conn;
}


?>