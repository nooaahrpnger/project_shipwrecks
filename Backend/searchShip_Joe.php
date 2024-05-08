<?php
/* Kohnen Joe */





require_once '../db_credentials.php';

$conn = new mysqli(DB_HOST, DB_USER, DB_PW, DB_NAME);

// Verbindung überprüfen
if ($conn->connect_error) {
    // Wenn die Verbindung fehlschlägt, Fehlermeldung anzeigen und Skriptausführung stoppen
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

function sanitize_input($conn, $input) {
    // Funktion zur Bereinigung der Eingabe, um SQL-Injection zu verhindern
    return mysqli_real_escape_string($conn, $input);
}

if (isset($_GET['search'])) {
    // Wenn ein Suchbegriff in der URL angegeben ist

    // Eingabe bereinigen, um SQL-Injection zu verhindern
    $searchTerm = sanitize_input($conn, $_GET['search']);

    // SQL-Abfrage konstruieren, um nach Schiffsnamen zu suchen, die den angegebenen Suchbegriff enthalten
    $sql = "SELECT * FROM webap_shipwrecks WHERE dtShipName LIKE '%$searchTerm%'";

    // Abfrage ausführen
    $result = $conn->query($sql);

    // Array zum Speichern der gefundenen Schiffswracks
    $shipwrecks = array();

    // Wenn Ergebnisse vorhanden sind
    if ($result->num_rows > 0) {
        // Durchlaufe jede Zeile im Ergebnisdatensatz
        while ($row = $result->fetch_assoc()) {
            // Füge jede Zeile dem Schiffswrack-Array hinzu
            $shipwrecks[] = array(
                'dtShipName' => $row["dtShipName"],
                'dtWreckageDate' => $row["dtWreckageDate"],
                'dtCountryName' => $row["dtCountryName"],
                'dtDescription' => $row["dtDescription"]
            );
        }
    }

    // Kodiere das Schiffswrack-Array als JSON und gib es aus
    echo json_encode($shipwrecks);
} else {
    // Wenn kein Suchbegriff in der URL angegeben ist
    echo "Kein Suchbegriff angegeben.";
}

// Schließe die Datenbankverbindung
$conn->close();
?>
