<?php
require_once "db_credentials.php";

function insertShipwreck($wreckDate, $wreckName, $country, $description) {
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);
    mysqli_set_charset($dbc, "utf8");

    // Prepare statement
    $insertQuery = mysqli_prepare($dbc, "INSERT INTO webap_shipwrecks (dtWreckageDate, dtShipName, dtCountryName, dtDescription) VALUES (?, ?, ?, ?)");

    // Bind parameters
    mysqli_stmt_bind_param($insertQuery, "ssss", $wreckDate, $wreckName, $country, $description);

    // Execute statement
    mysqli_stmt_execute($insertQuery);

    // Check for errors
    if(mysqli_stmt_error($insertQuery)) {
        die(mysqli_stmt_error($insertQuery));
    }

    // Close statement
    mysqli_stmt_close($insertQuery);

    // Close database connection
    mysqli_close($dbc);
}

?>