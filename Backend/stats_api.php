<?php
/*  Mika Galafate */







    // Setzt den Content-Type auf application/json, um sicherzustellen, dass die Daten korrekt verarbeitet werden
    header('Content-Type: application/json');

    // Datenbankverbindungskonfiguration
    $host = '92.42.47.76';
    $dbname = 'webap_shipwrecks';
    $user = 'webap_project';
    $password = 'webap_123';

    // Verbindung zur Datenbank herstellen
    $conn = mysqli_connect($host, $user, $password, $dbname);

    // Überprüfung der Verbindung
    if (!$conn) {
        // Bei Fehlschlag der Verbindung Fehler als JSON zurückgeben
        echo json_encode(['error' => "Verbindung fehlgeschlagen: " . mysqli_connect_error()]);
        exit;  // Skript beenden
    }

    // SQL-Abfrage definieren, um Daten nach Ländern zu gruppieren
    $query = "SELECT dtCountryName, COUNT(*) as total FROM webap_shipwrecks GROUP BY dtCountryName";
    $result = mysqli_query($conn, $query);

    // Datenarray für Länderdaten vorbereiten
    $countryData = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $countryData[] = $row;
        }
        mysqli_free_result($result);
    } else {
        // Bei einem Fehler in der Abfrage, Fehlermeldung zurückgeben
        echo json_encode(['error' => "Fehler bei der Abfrage der Länderdaten: " . mysqli_error($conn)]);
        exit;
    }

    // SQL-Abfrage definieren, um Daten nach Jahren zu gruppieren
    $query = "SELECT YEAR(dtWreckageDate) as year, COUNT(*) as total FROM webap_shipwrecks GROUP BY YEAR(dtWreckageDate)";
    $result = mysqli_query($conn, $query);

    // Datenarray für Jahresdaten vorbereiten
    $yearData = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $yearData[] = $row;
        }
        mysqli_free_result($result);
    } else {
        // Bei einem Fehler in der Abfrage, Fehlermeldung zurückgeben
        echo json_encode(['error' => "Fehler bei der Abfrage der Jahresdaten: " . mysqli_error($conn)]);
        exit;
    }

    // Datenbankverbindung schließen
    mysqli_close($conn);

    // Daten als JSON kodieren und ausgeben
    echo json_encode(['countryData' => $countryData, 'yearData' => $yearData]);
?>
