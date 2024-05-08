<?php
/* Thierry Cecchini  */






    define("DB_HOST","92.42.47.76");
    define("DB_USER","webap_project");
    define("DB_PW","webap_123");
    define("DB_NAME","webap_shipwrecks");
    
    // Verbindung herstellen
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);

    // Verbindung überprüfen
    if (!$dbc) {
        die("Verbindung fehlgeschlagen: " . mysqli_connect_error());
    }

    // Daten aus der Datenbank abrufen
    if (isset($_GET['category'])) {
        $category = mysqli_real_escape_string($dbc, $_GET['category']); // Vor SQL-Injektionen schützen
        $getProducts = "SELECT * FROM shipwrecks_Items WHERE dtCategory = '$category'";
    } else {
        $getProducts = "SELECT * FROM shipwrecks_Items";
    }

    $result = mysqli_query($dbc, $getProducts);

    if (!$result) {
        die("Abfrage fehlgeschlagen: " . mysqli_error($dbc));
    }

    // Produkte in ein Array speichern
    $products = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }

    // Verbindung schließen
    mysqli_close($dbc);

    // JSON-Ausgabe für die Produkte
    header('Content-Type: application/json');
    echo json_encode($products);


?>