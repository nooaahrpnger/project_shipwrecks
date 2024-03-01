<?php

require_once "../db_credentials.php";
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);
mysqli_set_charset($dbc, "utf8");

if(isset($_POST["createData"])) {
    $wreckDate = mysqli_real_escape_string($dbc, $_POST["wreckDate"]);
    $wreckName = mysqli_real_escape_string($dbc, $_POST["wreckName"]);
    $country = mysqli_real_escape_string($dbc, $_POST["country"]);
    $description = mysqli_real_escape_string($dbc, $_POST["description"]);

    // Prepare statement
    $stmt = mysqli_prepare($dbc, "INSERT INTO webap_shipwrecks (dtWreckageDate, dtShipName, dtCountryName, dtDescription) VALUES (?, ?, ?, ?)");
    
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssss", $wreckDate, $wreckName, $country, $description);

    // Execute statement
    mysqli_stmt_execute($stmt);

    // Check for errors
    if(mysqli_stmt_error($stmt)) {
        die(mysqli_stmt_error($stmt));
    }

    // Close statement
    mysqli_stmt_close($stmt);
}

mysqli_close($dbc);

?>