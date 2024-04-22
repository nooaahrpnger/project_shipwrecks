<?php

    define("DB_HOST","92.42.47.76");
    define("DB_USER","webap_project");
    define("DB_PW","webap_123");
    define("DB_NAME","webap_shipwrecks");

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);
    if (!$dbc) {
        die("Verbindung fehlgeschlagen: " . mysqli_connect_error());
    }

    // Produktinformationen aus der Datenbank abrufen
    if (isset($_GET['id'])) {
        $productId = $_GET['id'];
        $query = "SELECT * FROM shipwrecks_Items WHERE idItem = $productId"; // Annahme: 'products' ist deine Produkttabelle
        $result = mysqli_query($dbc, $query);
        if (!$result) {
            die("Abfrage fehlgeschlagen: " . mysqli_error($dbc));
        }
        // Produktinformationen ausgeben
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo "<img src='includes/Shop/images/" . $row['dtImage'] . "' alt='" . $row['dtItemName'] . "'><br>";
            echo "<p>Name: " . $row['dtItemName'] . "</p>";
            echo "<p>Description: " . $row['dtDescription'] . "</p>";
            echo "<p>Stock: " . $row['dtStockQuantity'] . "</p>";
        } else {
            echo "Produkt nicht gefunden.";
        }
    }

    // Datenbankverbindung schließen
    mysqli_close($dbc);


?>
