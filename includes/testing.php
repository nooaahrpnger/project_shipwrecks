<?php
// Database configuration
$dbHost = '193.41.237.172'; // Change this to your database host if it's different
$dbUsername = 'root'; // Change this to your database username
$dbPassword = 'webap_sw123'; // Change this to your database password
$dbName = 'webap_shipwrecks'; // Change this to your database name

// Create connection
$connection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Perform the database query to fetch all entries
$query = "SELECT * FROM your_table_name";
$result = $connection->query($query);

// Check if query was successful
if ($result->num_rows > 0) {
    // Start building the table
    echo "<table>";
    echo "<tr><th>wreckageDate</th><th>shipName</th><th>countryName</th><th>Description</th></tr>";

    // Loop through each row in the result set
    while ($row = $result->fetch_assoc()) {
        // Output data from each row into table cells
        echo "<tr>";
        echo "<td>" . $row['wreckageDate'] . "</td>";
        echo "<td>" . $row['shipName'] . "</td>";
        echo "<td>" . $row['countryName'] . "</td>";
        echo "<td>" . $row['Description'] . "</td>";
        echo "</tr>";
    }

    // Close the table
    echo "</table>";
} else {
    // If query returned no results, display a message
    echo "No records found";
}

// Close the database connection
$connection->close();
?>