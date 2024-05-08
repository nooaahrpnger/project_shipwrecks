<?php
    /* Galafate Mika */










    
    // Fehlerberichterstattung aktivieren, um alle Fehler anzuzeigen
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Datenbankverbindungsinformationen
    $host = '92.42.47.76';
    $dbname = 'webap_shipwrecks';
    $user = 'webap_project';
    $password = 'webap_123';

    // Verbindung zur Datenbank herstellen
    $conn = mysqli_connect($host, $user, $password, $dbname);

    // Überprüfen der Verbindung und Fehlerausgabe, wenn die Verbindung fehlschlägt
    if (!$conn) {
        die("Verbindung fehlgeschlagen: " . mysqli_connect_error());
    }

    // SQL-Abfrage vorbereiten, um Daten für Ereignisse abzurufen
    $sql = "SELECT dtWreckageDate AS start, CONCAT(dtShipName, ' - ', dtCountryName) AS title, dtDescription FROM webap_shipwrecks";
    $result = mysqli_query($conn, $sql);

    $events = array(); // Array für Ereignisdaten

    // Überprüfen, ob Ergebnisse vorhanden sind und Daten verarbeiten
    if (mysqli_num_rows($result) > 0) {
        // Daten aus der Datenbank in das Array $events einfügen
        while($row = mysqli_fetch_assoc($result)) {
            $events[] = $row;
        }
        // Ergebnisdaten als JSON ausgeben
        echo json_encode($events);
    } else {
        // Ausgeben, wenn keine Daten vorhanden sind
        echo "0 Ergebnisse";
    }

    // Datenbankverbindung schließen
    mysqli_close($conn);
?>